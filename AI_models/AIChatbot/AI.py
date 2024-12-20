import json
import numpy as np
import tensorflow as tf
from fastapi import FastAPI, HTTPException
from pydantic import BaseModel
from nltk.stem import WordNetLemmatizer
import nltk
import random

# Tải dữ liệu NLTK
nltk.download("punkt")
nltk.download("wordnet")
lemmatizer = WordNetLemmatizer()

# Khởi tạo FastAPI
app = FastAPI()

# Phần huấn luyện mô hình
try:
    # Tải dữ liệu huấn luyện
    with open("training_data.json", "r", encoding="utf-8") as file:
        intents = json.load(file)

    words = []
    classes = []
    documents = []
    ignore_words = ["?", "!", ".", ","]

    for intent in intents["intents"]:
        for pattern in intent["patterns"]:
            word_list = nltk.word_tokenize(pattern)
            words.extend(word_list)
            documents.append((word_list, intent["tag"]))
            if intent["tag"] not in classes:
                classes.append(intent["tag"])

    words = [lemmatizer.lemmatize(w.lower()) for w in words if w not in ignore_words]
    words = sorted(list(set(words)))

    classes = sorted(list(set(classes)))

    training = []

    # Tạo bag of words và đầu ra tương ứng
    for doc in documents:
        bag = [0] * len(words)  # Đảm bảo mỗi bag có kích thước cố định bằng số lượng từ
        pattern_words = [lemmatizer.lemmatize(word.lower()) for word in doc[0]]

        for w in words:
            bag[words.index(w)] = 1 if w in pattern_words else 0

        output_row = [0] * len(classes)
        output_row[classes.index(doc[1])] = 1

        training.append([bag, output_row])

    # Chuyển sang NumPy array
    training = np.array(training, dtype=object)
    train_x = np.array(list(training[:, 0]), dtype=float)  # Đảm bảo mỗi phần tử là vector float
    train_y = np.array(list(training[:, 1]), dtype=float)

    # Xây dựng mô hình
    model = tf.keras.Sequential([
        tf.keras.layers.Dense(128, input_shape=(len(train_x[0]),), activation="relu"),
        tf.keras.layers.Dropout(0.5),
        tf.keras.layers.Dense(64, activation="relu"),
        tf.keras.layers.Dropout(0.5),
        tf.keras.layers.Dense(len(train_y[0]), activation="softmax")
    ])

    model.compile(optimizer="adam", loss="categorical_crossentropy", metrics=["accuracy"])

    # Huấn luyện mô hình
    model.fit(np.array(train_x), np.array(train_y), epochs=200, batch_size=8, verbose=1)

    # Lưu mô hình và dữ liệu
    model.save("chatbot_model.h5")

    with open("chatbot_words.json", "w", encoding="utf-8") as file:
        json.dump(words, file)

    with open("chatbot_classes.json", "w", encoding="utf-8") as file:
        json.dump(classes, file)

except Exception as e:
    print(f"Error in training: {e}")

# Nạp mô hình và dữ liệu đã lưu
model = tf.keras.models.load_model("chatbot_model.h5")

with open("chatbot_words.json", "r", encoding="utf-8") as file:
    words = json.load(file)

with open("chatbot_classes.json", "r", encoding="utf-8") as file:
    classes = json.load(file)

with open("training_data.json", "r", encoding="utf-8") as file:
    data = json.load(file)

# Xử lý câu đầu vào
def clean_up_sentence(sentence):
    sentence_words = nltk.word_tokenize(sentence)
    sentence_words = [lemmatizer.lemmatize(word.lower()) for word in sentence_words]
    return sentence_words

def bag_of_words(sentence, words):
    sentence_words = clean_up_sentence(sentence)
    bag = [0] * len(words)
    for s in sentence_words:
        for i, w in enumerate(words):
            if w == s:
                bag[i] = 1
    return np.array(bag)

def predict_class(sentence, model):
    bow = bag_of_words(sentence, words)
    res = model.predict(np.array([bow]))[0]
    ERROR_THRESHOLD = 0.25
    results = [[i, r] for i, r in enumerate(res) if r > ERROR_THRESHOLD]
    results.sort(key=lambda x: x[1], reverse=True)
    return [{"intent": classes[r[0]], "probability": str(r[1])} for r in results]

def get_response(intents_list, intents_json):
    if not intents_list:
        return "Xin lỗi, tôi không hiểu câu hỏi của bạn."
    tag = intents_list[0]["intent"]
    for i in intents_json["intents"]:
        if i["tag"] == tag:
            return random.choice(i["responses"])
    return "Xin lỗi, tôi không thể trả lời câu hỏi của bạn."

# Định nghĩa cấu trúc dữ liệu API
class Question(BaseModel):
    question: str

# Endpoint trả lời câu hỏi
@app.post("/chatbot/")
def chatbot_response(question: Question):
    try:
        user_message = question.question
        intents = predict_class(user_message, model)
        response = get_response(intents, data)
        return {"message": response}
    except Exception as e:
        raise HTTPException(status_code=500, detail=str(e))

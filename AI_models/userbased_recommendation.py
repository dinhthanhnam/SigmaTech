import pandas as pd
from surprise import Reader, Dataset, SVD
from surprise.model_selection import cross_validate
from fastapi import FastAPI, HTTPException
from pydantic import BaseModel
import requests

# Tạo ứng dụng FastAPI
app = FastAPI()

# Schema cho request
class UserRequest(BaseModel):
    user_id: int

# Hàm lấy dữ liệu từ Laravel API
def fetch_data_from_laravel():
    url = "http://localhost:8000/get-dataset?limit=20"  # Thay bằng URL đúng
    response = requests.get(url)
    if response.status_code != 200:
        raise HTTPException(status_code=500, detail="Failed to fetch data from Laravel API")
    return pd.DataFrame(response.json())

# Hàm huấn luyện model SVD
def train_svd_model(data):
    # Chuẩn bị dữ liệu cho Surprise

    reader = Reader()
    data = Dataset.load_from_df(data[['user_id', 'product_identifier', 'interaction_score']], reader)

    model = SVD()
    cross_validate(model, data, measures=['RMSE', 'MAE'], cv=2)

    trainset = data.build_full_trainset()
    model.fit(trainset)

    return model

# Hàm gợi ý sản phẩm cho một user cụ thể
def get_recommendations_for_user(model, data, user_id, top_n=6):
    # Lấy tất cả các sản phẩm
    all_products = data['product_identifier'].unique()

    # Lấy các sản phẩm user đã tương tác
    user_interacted = data[data['user_id'] == user_id]['product_identifier'].unique()

    # Lọc các sản phẩm chưa tương tác
    products_to_predict = [p for p in all_products if p not in user_interacted]

    # Dự đoán điểm cho từng sản phẩm
    predictions = [
        (product, model.predict(user_id, product).est)
        for product in products_to_predict
    ]

    # Sắp xếp theo điểm dự đoán
    predictions.sort(key=lambda x: x[1], reverse=True)

    # Trả về top N sản phẩm
    return [product for product, _ in predictions[:top_n]]

# Endpoint để nhận user_id và trả về gợi ý
@app.post("/recommend")
def recommend(user_request: UserRequest):
    user_id = user_request.user_id

    # Lấy dataset từ Laravel
    data = fetch_data_from_laravel()

    # Huấn luyện model SVD
    model = train_svd_model(data)

    # Lấy gợi ý cho user
    recommendations = get_recommendations_for_user(model, data, user_id)

    return {
        "user_id": user_id,
        "recommendations": recommendations
    }

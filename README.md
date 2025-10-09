## 1. Tiên quyết
    Cài đặt Composer : get.composer.org
    Cài đặt xampp hoặc laragon
    Sau khi clone, chạy composer update
## 2. Thực hiện (Theo xampp)
    git clone https://github.com/dinhthanhnam/SigmaTech
    clone xong thì mở bằng code .
    Start apache và mysql trong xampp lên
    Vào lại thư mục dự án, thực hiện các bước:
        Chuẩn bị môi trường {
            Kiểm tra xem có file .env chưa
            Chạy lệnh composer install trong terminal 
        }
        Chạy thử localhost {
            Chạy php artisan serve trong terminal
            Bấm vào link xem đã lên web chưa
        }
        Dữ liệu csdl {
            Tại thời điểm này chưa có dữ liệu
            Quay lại thư mục dự án chạy: php artisan migrate:fresh --seed
            Quay lại trang web xem đã có dữ liệu chưa.
            (ngoài ra có thể tự vào phpmyadmin để xem dữ liệu)
        }
        
## 3. Dữ liệu sẵn
    Tài khoản: 
        admin@example.com admin
        user1@example.com user1
    Sản phẩm:
        Laptop:
            laptops/Gaming/1 {2,3,4,5,6,...}
            laptops/Office/1 {2,3,4,5,6 ...}
            pc-parts/cpu/1
## 4. Đăng nhập
    Đăng nhập bằng user thì khi click vào biểu tượng user sẽ vào giao diện quản lý tài khoản
    Đăng nhập bằng admin thì click vào biểu tượng user vào trang admin CMS

## 5. AI model
    Đi đến thư mục chứa dự án AI: AI_models/AIChatbot
    Mở terminal tại vị trí này, rồi chạy: pip install -r requirement.txt
    Chạy con AI: python -m uvicorn AI:app --port 9000
    Sau khi chạy con AI thì có thể cơ bản trả lời được các câu hỏi liene quan đến website trên web
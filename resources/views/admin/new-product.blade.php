@extends('admin.app')
@section('content')
    <main class="app-content">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item">Danh sách sản phẩm</li>
                <li class="breadcrumb-item"><a href="#">Thêm sản phẩm</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <h3 class="tile-title">Tạo mới sản phẩm</h3>
                    <form id="productForm" action="{{ route('admin.save-product') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="productType" class="control-label">Loại sản phẩm</label>
                                <select class="form-control" id="productType" name = "producttype" required>
                                    <option value="">-- Chọn loại sản phẩm --</option>
                                    <option value="laptop">Laptop</option>
                                    <option value="cpu">Cpu</option>
                                    <option value="gpu">Gpu</option>
                                    <option value="monitor">Monitor</option>
                                </select>
                            </div>
                        </div>

                        <div id="form-chung" class="product-form d-none">
                            <div class="row">
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group col-md-9">
                                        <label class="control-label">Tên sản phẩm</label>
                                        <input class="form-control" type="text" name="name" required>
                                    </div>
                                    <div class="form-group col-md-9">
                                        <label class="control-label">Brand</label>
                                        <input class="form-control" type="text" name="brand" required>
                                    </div>
                                    <div class="form-group col-md-9">
                                        <label class="control-label">Model</label>
                                        <input class="form-control" type="text" name="model" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">

                                    <div class="form-group col-md-9">
                                        <label class="control-label">Price</label>
                                        <input class="form-control" type="text" placeholder="đ" id="price"
                                            name="price" required>
                                    </div>
                                    <div class="form-group col-md-9">
                                        <label class="control-label">Deal Price</label>
                                        <input class="form-control" type="text" placeholder="đ" id="dealprice"
                                            name="dealprice" required>
                                    </div>
                                    <div class="form-group col-md-9">
                                        <label class="control-label">On top</label><br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="ontop" id="ontop_yes"
                                                value="yes" required>
                                            <label class="form-check-label" for="ontop_yes">Có</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="ontop" id="ontop_no"
                                                value="no" checked required>
                                            <label class="form-check-label" for="ontop_no">Không</label>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group col-md-9">
                                        <label class="control-label">Thumbnail (1 ảnh duy nhất)</label>
                                        <input type="file" class="form-control-file" id="productThumbnail"
                                            name="productThumbnail" required>
                                        <small id="imageHelp" class="form-text text-muted">1 ảnh duy nhất.</small>
                                    </div>
                                    <div class="form-group col-md-9">
                                        <label class="control-label">Thumbnail small (1 ảnh duy nhất)</label>
                                        <input type="file" class="form-control-file" id="productThumbnailSmall"
                                            name="productThumbnailSmall" required>
                                        <small id="imageHelp" class="form-text text-muted">1 ảnh duy nhất.</small>
                                    </div>
                                    <div class="form-group col-md-9">
                                        <label class="control-label">Ảnh sản phẩm (tối đa 5 ảnh)</label>
                                        <input type="file" class="form-control-file" id="productImages"
                                            name="productImages[]" multiple accept="image/*" required>
                                        <small id="imageHelp" class="form-text text-muted">Tối đa 5 ảnh.</small>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <br>
                        <br>
                        <!-- Form Laptop -->
                        <div id="form-laptop" class="product-form d-none">
                            <div class="row">
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group col-md-9">
                                        <label for="laptopType" class="control-label">Loại laptop</label>
                                        <select class="form-control" id="laptopType" name="laptoptype" required>
                                            <option value="">-- Chọn loại laptop --</option>
                                            <option value="laptopGaming">Laptop Gaming</option>
                                            <option value="laptopOffice">Laptop văn phòng</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-9">
                                        <label class="control-label">Pin</label>
                                        <input class="form-control" type="text" name="pin" required>
                                    </div>
                                    <div class="form-group col-md-9">
                                        <label class="control-label">Cân nặng</label>
                                        <input class="form-control" type="text" name="kg" required>
                                    </div>
                                    <div class="form-group col-md-9">
                                        <label class="control-label">Màu sắc</label>
                                        <input class="form-control" type="text" name="color" required>
                                    </div>
                                    <div class="form-group col-md-9">
                                        <label class="control-label">Os</label>
                                        <input class="form-control" type="text" name="os" required>
                                    </div>
                                    <div class="form-group col-md-9">
                                        <label class="control-label">Camera</label>
                                        <input class="form-control" type="text" name="cam" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group col-md-9">
                                        <label class="control-label">Card đồ họa</label>
                                        <input class="form-control" type="text" name="card" required>
                                    </div>
                                    <div class="form-group col-md-9">
                                        <label class="control-label">Vi xử lý</label>
                                        <input class="form-control" type="text" name="vixuly" required>
                                    </div>
                                    <div class="form-group col-md-9">
                                        <label class="control-label">Số nhân</label>
                                        <input class="form-control" type="text" id="nhan" name="nhan"
                                            required>
                                    </div>
                                    <div class="form-group col-md-9">
                                        <label class="control-label">Số luồng</label>
                                        <input class="form-control" type="text" id="luong" name="luong"
                                            required>
                                    </div>
                                    <div class="form-group col-md-9">
                                        <label class="control-label">Tốc độ tối đa</label>
                                        <input class="form-control" type="text" name="tocdo" required>
                                    </div>
                                    <div class="form-group col-md-9">
                                        <label class="control-label">Bộ nhớ đệm</label>
                                        <input class="form-control" type="text" name="dem" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group col-md-9">
                                        <label class="control-label">Dung lượng RAM</label>
                                        <input class="form-control" type="text" name="ram" required>
                                    </div>
                                    <div class="form-group col-md-9">
                                        <label class="control-label">Loại RAM</label>
                                        <input class="form-control" type="text" name="ramtype" required>
                                    </div>
                                    <div class="form-group col-md-9">
                                        <label class="control-label">Bus RAM</label>
                                        <input class="form-control" type="text" name="busram" required>
                                    </div>
                                    <div class="form-group col-md-9">
                                        <label class="control-label">Số khe cắm RAM</label>
                                        <input class="form-control" type="text" name="kheram" required>
                                    </div>
                                    <div class="form-group col-md-9">
                                        <label class="control-label">Hỗ trợ RAM tối đa</label>
                                        <input class="form-control" type="text" name="maxram" required>
                                    </div>
                                </div>

                            </div>
                            <br>
                            <br>
                            <div class="row">
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group col-md-9">
                                        <label class="control-label">Kích thước màn hình</label>
                                        <input class="form-control" type="text" name="sizeman" required>
                                    </div>
                                    <div class="form-group col-md-9">
                                        <label class="control-label">Độ phân giải</label>
                                        <input class="form-control" type="text" name="dophangiai" required>
                                    </div>
                                    <div class="form-group col-md-9">
                                        <label class="control-label">Tần số quét</label>
                                        <input class="form-control" type="text" name="hz" required>
                                    </div>
                                    <div class="form-group col-md-9">
                                        <label class="control-label">Công nghệ màn hình</label>
                                        <input class="form-control" type="text" name="cnman" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group col-md-9">
                                        <label class="control-label">Ổ cứng</label>
                                        <input class="form-control" type="text" name="ssd" required>
                                    </div>
                                    <div class="form-group col-md-9">
                                        <label class="control-label">Dung lượng ổ cứng</label>
                                        <input class="form-control" type="text" name="gb" required>
                                    </div>
                                    <div class="form-group col-md-9">
                                        <label class="control-label">Số khe ổ cứng</label>
                                        <input class="form-control" type="text" name="khessd" required>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <button class="btn btn-save" type="submit">Lưu lại</button>
                        <a class="btn btn-cancel" href="table-data-product.html">Hủy bỏ</a>
                    </form>
                </div>

            </div>
        </div>
    </main>

    <script>
        function validatePositiveInteger(input) {
            const value = input.value;
            if (!/^[1-9]\d*$/.test(value)) {
                input.setCustomValidity('Vui lòng nhập số nguyên dương');
                input.reportValidity(); // Shows the validation message
                return false;
            } else {
                input.setCustomValidity('');
                return true;
            }
        }

        // Attach input event listeners to check integer fields in real time
        document.getElementById('nhan').addEventListener('input', function() {
            validatePositiveInteger(this);
        });
        document.getElementById('luong').addEventListener('input', function() {
            validatePositiveInteger(this);
        });
        document.getElementById('price').addEventListener('input', function() {
            validatePositiveInteger(this);
        });
        document.getElementById('dealprice').addEventListener('input', function() {
            validatePositiveInteger(this);
        });

        document.getElementById('productType').addEventListener('change', function() {
            // Ẩn tất cả các form sản phẩm
            document.querySelectorAll('.product-form').forEach(form => {
                form.classList.add('d-none');
            });
            document.querySelectorAll('.form-chung').forEach(form => {
                form.classList.add('d-none');
            });

            // Hiển thị form tương ứng với lựa chọn
            const selectedType = this.value;
            if (selectedType) {
                document.getElementById(`form-chung`).classList.remove('d-none');
                document.getElementById(`form-${selectedType}`).classList.remove('d-none');
            }
        });
        document.getElementById('productThumbnail').addEventListener('change', function() {
            if (this.files.length > 1) {
                alert('Bạn chỉ có thể tải lên 1 ảnh duy nhất.');
                this.value = ''; // Xóa lựa chọn nếu vượt quá số lượng
            }
        });
        document.getElementById('productThumbnailSmall').addEventListener('change', function() {
            if (this.files.length > 1) {
                alert('Bạn chỉ có thể tải lên 1 ảnh duy nhất.');
                this.value = ''; // Xóa lựa chọn nếu vượt quá số lượng
            }
        });
        document.getElementById('productImages').addEventListener('change', function() {
            if (this.files.length > 5) {
                alert('Bạn chỉ có thể tải lên tối đa 5 ảnh.');
                this.value = ''; // Xóa lựa chọn nếu vượt quá số lượng
            }
        });
        document.querySelector('.btn-save').addEventListener('click', function(event) {
            let isValid = true;
            const requiredFields = document.querySelectorAll('input[required], select[required]');

            requiredFields.forEach(field => {
                if (!field.value) {
                    isValid = false;
                    field.classList.add('is-invalid'); // Thêm lớp để làm nổi bật trường bị lỗi
                } else {
                    field.classList.remove('is-invalid'); // Gỡ lớp nếu đã điền đúng
                }
            });

            if (!isValid) {
                event.preventDefault(); // Ngăn không cho gửi form
                alert('Vui lòng điền đầy đủ tất cả các trường!'); // Hiển thị thông báo lỗi
            }
        });
    </script>

    <style>
        .product-form {
            margin-top: 20px;
        }
    </style>
@endsection

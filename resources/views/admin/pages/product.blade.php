@extends('admin.app')

@section('content')
    <main class="app-content">
        <div class="app-title">
            <ul class="app-breadcrumb ">
                <li class="breadcrumb-item"><a href="#"><b>Danh sách sản phẩm</b></a></li>
            </ul>
            <div id="clock"></div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <div class="row element-button">
                            <div class="col-sm-2">
                                <a class="btn btn-info btn-sm" id="btn-laptop">
                                    <i class="fas fa-laptop"></i> Laptop
                                </a>
                            </div>
                            <div class="col-sm-2">
                                <a class="btn btn-info btn-sm" id="btn-linh-kien">
                                    <i class="fas fa-gear"></i> Linh kiện
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-right"> <!-- Thêm text-right để căn phải -->
                                <a class="btn btn-info btn-sm" href="form-add-san-pham.html" title="Thêm">
                                    <i class="fas fa-plus"></i> Tạo mới sản phẩm
                                </a>
                            </div>
                        </div>
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th width="10"><input type="checkbox" id="all"></th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Brand</th>
                                    <th>Mẫu</th>
                                    <th>Price</th>
                                    <th>Deal Price</th>
                                    <th>Loại laptop</th>
                                    <th>Vi xử lý</th>
                                    <th>Số nhân</th>
                                    <th>Số luồng</th>
                                    <th>Tốc độ tối đa</th>
                                    <th>Bộ nhớ đệm</th>
                                    <th>Card đồ họa</th>
                                    <th>Kích thước màn hình</th>
                                    <th>Độ phân giải</th>
                                    <th>Tần số quét</th>
                                    <th>Công nghệ màn hình</th>
                                    <th>Dung lượng RAM</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="product-list">
                                <!-- Dữ liệu sản phẩm sẽ được hiển thị ở đây -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Hàm để cập nhật bảng sản phẩm
            function loadProducts(category) {
                fetch(`/api/products?category=${category}`)
                    .then(response => response.json())
                    .then(data => {
                        const productList = document.getElementById('product-list');
                        productList.innerHTML = ''; // Xóa nội dung hiện tại

                        // Thêm dữ liệu sản phẩm vào bảng
                        data.forEach(product => {
                            const row = document.createElement('tr');
                            row.innerHTML = `
                                <td><input type="checkbox"></td>
                                <td>${product.code}</td>
                                <td>${product.name}</td>
                                <td><img src="${product.image}" alt="${product.name}" width="50"></td>
                                <td>${product.quantity}</td>
                                <td>${product.status}</td>
                                <td>${product.price}</td>
                                <td>${product.category}</td>
                                <td><!-- Thêm chức năng tại đây --></td>
                            `;
                            productList.appendChild(row);
                        });
                    })
                    .catch(error => console.error('Error loading products:', error));
            }

            // Tải dữ liệu mặc định
            loadProducts('all');

            // Sự kiện cho nút Laptop
            document.getElementById('btn-laptop').addEventListener('click', function() {
                loadProducts('laptop');
            });

            // Sự kiện cho nút Linh kiện
            document.getElementById('btn-linh-kien').addEventListener('click', function() {
                loadProducts('linh-kien');
            });
        });
    </script>
@endsection
@endsection

@extends('admin.app')

@section('content')
    <main class="app-content">
        <div class="app-title">
            <ul class="app-breadcrumb ">
                <li class="breadcrumb-item" style = "list-style: none"><a href="#"><b>Danh sách sản phẩm</b></a></li>
            </ul>
            <div id="clock"></div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <div id="sampleTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                            <div class="row d-flex justify-content-between align-items-center">
                                <div class="col-sm-12 col-md-6 text-left">
                                    <div id="sampleTable_filter" class="dataTables_filter">
                                        <label>Tìm kiếm:
                                            <input type="search" class="form-control form-control-sm" placeholder=""
                                                aria-controls="sampleTable">
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 d-flex text-right justify-content-end">
                                    <!-- Thêm text-right để căn phải -->
                                    <a class="btn btn-info btn-sm d-flex align-items-center justify-content-center"
                                        href="{{ route('admin.new-product') }}" title="Thêm"
                                        style = "width: 150px; height: 50px; font-size: 14px;"
                                        onclick="handleCreateProductClick(event)">
                                        <i class="fas fa-plus mr-2"></i> Tạo mới sản phẩm
                                    </a>
                                </div>
                            </div>
                            <table class="table table-hover table-bordered" id="sampleTable">
                                <thead>
                                    <tr>
                                        <th width="10"><input type="checkbox" id="all"></th>
                                        <th width="10">ID</th>
                                        <th width="250">Name</th>
                                        <th width="300">Image</th>
                                        <th width="250">Category</th>
                                        <th width="50">Brand</th>
                                        <th width="50">Model</th>
                                        <th width="150">Price</th>
                                        <th width="150">Deal Price</th>
                                        <th>Chức năng</th>
                                        <!-- Thêm các cột khác nếu cần -->
                                    </tr>
                                </thead>
                                <tbody id="product-list">
                                    @foreach ($products as $product)
                                        <tr>
                                            <td><input type="checkbox"></td>
                                            <td>{{ $product->id }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td><img src="{{ $product->attributes->firstWhere('name', 'Image1')->pivot->value ?? 'N/A' }}"
                                                    alt="{{ $product->name }}" width="150"></td>
                                            <td>{{ $product->categories->name ?? 'N/A' }}</td>
                                            </td>
                                            <td>{{ $product->attributes->firstWhere('name', 'Brand')->pivot->value ?? 'N/A' }}
                                            </td>
                                            <td>{{ $product->attributes->firstWhere('name', 'Model')->pivot->value ?? 'N/A' }}
                                            </td>
                                            <td>{{ number_format($product->attributes->firstWhere('name', 'Price')->pivot->value ?? 'N/A', 0, ',', '.') }}
                                                đ
                                            </td>
                                            <td>{{ number_format($product->attributes->firstWhere('name', 'Deal Price')->pivot->value ?? 'N/A', 0, ',', '.') }}
                                                đ
                                            </td>
                                            <td><button class="btn btn-primary btn-sm trash" type="button" title="Xóa"
                                                    onclick="myFunction(this)"><i class="fas fa-trash-alt"></i>
                                                </button>
                                                <button class="btn btn-primary btn-sm edit" type="button" title="Sửa"
                                                    id="show-emp" data-toggle="modal" data-target="#ModalUP"><i
                                                        class="fas fa-edit"></i></button>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div class="modal fade" id="ModalUP" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static"
        data-keyboard="false">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-body">
                    <div class="row">
                        <div class="form-group  col-md-12">
                            <span class="thong-tin-thanh-toan">
                                <h5>Chỉnh sửa thông tin sản phẩm cơ bản</h5>
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="control-label">Mã sản phẩm </label>
                            <input class="form-control" type="number" value="71309005">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label">Tên sản phẩm</label>
                            <input class="form-control" type="text" required value="Bàn ăn gỗ Theresa">
                        </div>
                        <div class="form-group  col-md-6">
                            <label class="control-label">Số lượng</label>
                            <input class="form-control" type="number" required value="20">
                        </div>
                        <div class="form-group col-md-6 ">
                            <label for="exampleSelect1" class="control-label">Tình trạng sản phẩm</label>
                            <select class="form-control" id="exampleSelect1">
                                <option>Còn hàng</option>
                                <option>Hết hàng</option>
                                <option>Đang nhập hàng</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label">Giá bán</label>
                            <input class="form-control" type="text" value="5.600.000">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleSelect1" class="control-label">Danh mục</label>
                            <select class="form-control" id="exampleSelect1">
                                <option>Bàn ăn</option>
                                <option>Bàn thông minh</option>
                                <option>Tủ</option>
                                <option>Ghế gỗ</option>
                                <option>Ghế sắt</option>
                                <option>Giường người lớn</option>
                                <option>Giường trẻ em</option>
                                <option>Bàn trang điểm</option>
                                <option>Giá đỡ</option>
                            </select>
                        </div>
                    </div>
                    <BR>
                    <a href="#" style="    float: right;
    font-weight: 600;
    color: #ea0000;">Chỉnh sửa sản
                        phẩm
                        nâng cao</a>
                    <BR>
                    <BR>
                    <button class="btn btn-save" type="button">Lưu lại</button>
                    <a class="btn btn-cancel" data-dismiss="modal" href="#">Hủy bỏ</a>
                    <BR>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
@endsection

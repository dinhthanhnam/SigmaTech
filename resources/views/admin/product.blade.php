@extends('admin.app')

@section('content')
  <main class="app-content">
    <div class="app-title">
      <ul class="app-breadcrumb">
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
                  <div class="dataTables_filter">
                    <label>Tìm kiếm:
                      <input type="text" id="searchQuery" class="form-control form-control-sm"
                        placeholder="Tìm kiếm sản phẩm" aria-controls="sampleTable">
                    </label>
                  </div>
                </div>
                <div class="col-sm-12 col-md-6 d-flex text-right justify-content-end">
                  <!-- Thêm text-right để căn phải -->
                  <a class="btn btn-info btn-sm d-flex align-items-center justify-content-center"
                    href="{{ route('admin.new-product') }}" title="Thêm"
                    style = "width: 150px; height: 50px; font-size: 14px;" onclick="handleCreateProductClick(event)">
                    <i class="fas fa-plus mr-2"></i> Tạo mới sản phẩm
                  </a>
                </div>
              </div>
              <table class="table table-hover table-bordered" id="resultTable">
                <thead>
                  <tr>
                    {{-- <th width="10"><input type="checkbox" id="all"></th> --}}
                    <th width="10">Mã</th>
                    <th width="250">Tên sản phẩm</th>
                    <th width="300">Hình ảnh</th>
                    <th width="250">Loại hàng</th>
                    <th width="50">Thương hiệu</th>
                    <th width="50">Mã Model</th>
                    <th width="150">Giá</th>
                    <th width="150">Giá niêm yết</th>
                    <th>Chức năng</th>
                    <!-- Thêm các cột khác nếu cần -->
                  </tr>
                </thead>
                <tbody id="product-list">
                  @foreach ($paginatedProducts as $product)
                    <tr>
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
                      <td>
                        {{ number_format($product->attributes->firstWhere('name', 'Price')->pivot->value ?? 'N/A', 0, ',', '.') }}
                        đ
                      </td>
                      <td>
                        {{ number_format($product->attributes->firstWhere('name', 'Deal Price')->pivot->value ?? 'N/A', 0, ',', '.') }}
                        đ
                      </td>
                      <td><button class="btn btn-primary btn-sm trash" type="button" title="Xóa"
                          data-id="{{ $product->id }}" data-table="{{ $product->data_table }}"><i
                            class="fas fa-trash-alt"></i>
                        </button>
                        <button class="btn btn-primary btn-sm edit" type="button" title="Sửa" data-toggle="modal"
                          data-target="#ModalUP"><i class="fas fa-edit"></i>
                        </button>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
              <div class="paging bg-white mx-auto" id="paginationLinks">
                @if ($paginatedProducts->currentPage() > 1)
                  <a href="{{ $paginatedProducts->previousPageUrl() }}">
                    <i class="fa fa-angle-left"></i>
                  </a>
                @endif
                <a href="{{ $paginatedProducts->url(1) }}"
                  class="{{ $paginatedProducts->onFirstPage() ? 'current' : '' }}">
                  1
                </a>
                @for ($page = 2; $page <= $paginatedProducts->lastPage(); $page++)
                  <a href="{{ $paginatedProducts->url($page) }}"
                    class="{{ $page == $paginatedProducts->currentPage() ? 'current' : '' }}">
                    {{ $page }}
                  </a>
                @endfor
                @if ($paginatedProducts->hasMorePages())
                  <a href="{{ $paginatedProducts->nextPageUrl() }}">
                    <i class="fa fa-angle-right"></i>
                  </a>
                @endif
              </div>
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
          <a href="#" style="float: right;font-weight: 600;color: #ea0000;">Chỉnh sửa sản phẩm nâng cao</a>
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

@push('scripts')
  <script>
    // Hàm gọi AJAX để xóa sản phẩm
    $(document).on('click', '.trash', function() {
      var table = $(this).data('table'); // Lấy giá trị 'table' từ thuộc tính data-table
      var id = $(this).data('id'); // Lấy giá trị 'id' từ thuộc tính data-id
      var $row = $(this).closest('tr'); // Lưu tham chiếu đến dòng tr cần xóa

      // Gửi yêu cầu xóa thông qua AJAX
      $.ajax({
        url: '/delete-product/' + table + '/' + id,
        type: 'DELETE',
        data: {
          _token: '{{ csrf_token() }}',
        },
        success: function(response) {
          if (response.success) {
            alert(response.success); // Hiển thị thông báo thành công
            // Xóa dòng trong bảng
            $row.remove(); // Dùng biến $row để xóa thẻ <tr>
          } else if (response.error) {
            alert(response.error); // Hiển thị thông báo lỗi
          }
        },
        error: function(xhr, status, error) {
          alert('An error occurred: ' + xhr.responseText); // Hiển thị lỗi từ server nếu có
        }
      });
    });
  </script>
  <script>
    document.getElementById('searchQuery').addEventListener('input', function() {
      const searchQuery = this.value.trim();
      
      fetchProducts(searchQuery);

    });

    function fetchProducts(searchQuery) {
      fetch(`/search-products?search=${searchQuery}`)
        .then(response => response.json())
        .then(data => {
          updateProductList(data.products); // Cập nhật danh sách sản phẩm
        })
        .catch(error => console.error('Error:', error));
    }

    function updateProductList(products) {
      const productList = document.getElementById('product-list');
      productList.innerHTML = ''; // Xóa danh sách sản phẩm hiện tại

      if (products.length > 0) {
        products.forEach(product => {
          const productRow = document.createElement('tr');

          // Cập nhật các thông tin sản phẩm (tùy chỉnh các thuộc tính bạn cần hiển thị)
          productRow.innerHTML = `
        <td>${product.id}</td>
        <td>${product.name}</td>
        <td><img src="${product.image || 'N/A'}" alt="${product.name}" width="150"></td>
        <td>${product.category || 'N/A'}</td>
        <td>${product.brand || 'N/A'}</td>
        <td>${product.model || 'N/A'}</td>
        <td>${product.price ? new Intl.NumberFormat().format(product.price) : 'N/A'} đ</td>
        <td><button class="btn btn-primary btn-sm trash" type="button" title="Xóa" data-id="${product.id}"><i class="fas fa-trash-alt"></i></button></td>
        <td><button class="btn btn-primary btn-sm edit" type="button" title="Sửa" data-toggle="modal" data-target="#ModalUP"><i class="fas fa-edit"></i></button></td>
      `;

          productList.appendChild(productRow);
        });
      } else {
        productList.innerHTML = '<tr><td colspan="8">Không tìm thấy sản phẩm nào.</td></tr>';
      }
    }
  </script>
@endpush

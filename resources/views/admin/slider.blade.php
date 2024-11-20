@extends('admin.app')

@section('content')
  <main class="app-content">
    <div class="app-title">
      <ul class="app-breadcrumb">
        <li class="breadcrumb-item" style = "list-style: none"><a href="#"><b>Danh sách slider</b></a></li>
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
                  <div id="sampleTable_filter" class="dataTables_filter" style="display: none">
                    <label>Tìm kiếm:
                      <input type="search" class="form-control form-control-sm" placeholder=""
                        aria-controls="sampleTable">
                    </label>
                  </div>
                </div>
                <div class="col-sm-12 col-md-6 d-flex text-right justify-content-end">
                  <!-- Thêm text-right để căn phải -->
                  <a class="btn btn-info btn-sm d-flex align-items-center justify-content-center"
                    href="{{ route('admin.new-slider') }}" title="Thêm"
                    style = "width: 150px; height: 50px; font-size: 14px;" onclick="handleCreateProductClick(event)">
                    <i class="fas fa-plus mr-2"></i> Tạo mới slider
                  </a>
                </div>
              </div>
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    {{-- <th width="10"><input type="checkbox" id="all"></th> --}}
                    <th width="10">Mã</th>
                    <th width="250">Tên </th>
                    <th width="300">Hình ảnh</th>
                    <th>Chức năng</th>
                    <!-- Thêm các cột khác nếu cần -->
                  </tr>
                </thead>
                <tbody id="slider-list">
                    @foreach ($paginatedSliders as $slider)
                        <tr>
                            <td>{{ $slider->id }}</td>
                            <td>{{ $slider->name }}</td>
                            <td>
                                <img src="{{ asset($slider->image) }}" alt="{{ $slider->name }}" width="150">
                            </td>
                            <td>
                                <button class="btn btn-primary btn-sm trash" type="button" title="Xóa"
                                    data-id="{{ $slider->id }}"><i class="fas fa-trash-alt"></i></button>
                                <button class="btn btn-primary btn-sm edit" type="button" title="Sửa" data-toggle="modal"
                                    data-target="#ModalUP"><i class="fas fa-edit"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                
              </table>
              <div class="paging bg-white mx-auto">
                @if ($paginatedSliders->currentPage() > 1)
                    <a href="{{ $paginatedSliders->previousPageUrl() }}">
                        <i class="fa fa-angle-left"></i>
                    </a>
                @endif
                <a href="{{ $paginatedSliders->url(1) }}" class="{{ $paginatedSliders->onFirstPage() ? 'current' : '' }}">
                    1
                </a>
                @for ($page = 2; $page <= $paginatedSliders->lastPage(); $page++)
                    <a href="{{ $paginatedSliders->url($page) }}" class="{{ $page == $paginatedSliders->currentPage() ? 'current' : '' }}">
                        {{ $page }}
                    </a>
                @endfor
                @if ($paginatedSliders->hasMorePages())
                    <a href="{{ $paginatedSliders->nextPageUrl() }}">
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
@endpush

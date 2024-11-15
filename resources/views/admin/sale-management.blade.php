@extends('admin.app')
@section('content')
  <main class="app-content">
    <div class="app-title">
      <ul class="app-breadcrumb">
        <li class="breadcrumb-item" style = "list-style: none"><a href="#"><b>Danh sách Flash Sale</b></a></li>
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
                    style = "width: 200px; height: 50px; font-size: 14px;" onclick="handleCreateProductClick(event)">
                    <i class="fas fa-plus mr-2"></i> Thêm sản phẩm sale
                  </a>
                </div>
              </div>
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th width="10"><input type="checkbox" id="all"></th>
                    <th width="10">ID</th>
                    <th width="200">Name</th>
                    <th width="200">Image</th>
                    <th width="200">Category</th>
                    <th width="50">Brand</th>
                    <th width="50">Model</th>
                    <th width="150">Sale Price</th>
                    <th width="150">Thời điểm kết thúc</th>
                    <th width="100">Đếm ngược</th>
                    <th>Chức năng</th>
                    <!-- Thêm các cột khác nếu cần -->
                  </tr>
                </thead>
                <tbody id="product-list">
                  @foreach ($flashSaleItems as $product)
                    @php
                      $endDate = Carbon\Carbon::parse($product->attributes->firstWhere('name', 'Sale End Date')->pivot->value)->setTime(0, 0, 0);
                      $remainingTime = $endDate->timestamp - now()->timestamp;
                    @endphp
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
                      <td>
                        {{ number_format($product->attributes->firstWhere('name', 'Sale Price')->pivot->value ?? 'N/A', 0, ',', '.') }} đ
                        <br>
                        giảm <b style="color: red;"> 
                          {{number_format($product->attributes->firstWhere('name', 'Deal Price')->pivot->value - $product->attributes->firstWhere('name', 'Sale Price')->pivot->value, 0, ',', '.')}} đ
                          </b>
                      </td>
                      <td>{{ Carbon\Carbon::parse($product->attributes->firstWhere('name', 'Sale End Date')->pivot->value)->setTime(0, 0, 0)}}
                      </td>
                      <td>
                        <span id="countdown-{{ $product->id }}" data-remaining-time="{{ $remainingTime }}">
                            <!-- Đặt giá trị thời gian còn lại ở đây, ví dụ "00:00:00" -->
                        </span>
                      </td>
                      <td><button class="btn btn-primary btn-sm trash" type="button" title="Xóa"
                          onclick="myFunction(this)"><i class="fas fa-trash-alt"></i>
                        </button>
                        <button class="btn btn-primary btn-sm edit" type="button" title="Sửa" id="show-emp"
                          data-toggle="modal" data-target="#ModalUP"><i class="fas fa-edit"></i></button>
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
@endsection
@push('scripts')
  <script>
    // Hàm khởi tạo bộ đếm ngược cho tất cả các sản phẩm
    document.querySelectorAll('[id^="countdown-"]').forEach(element => {
        let remainingTime = parseInt(element.getAttribute('data-remaining-time'), 10);

        // Thiết lập bộ đếm ngược, mỗi giây cập nhật một lần
        const countdown = setInterval(() => {
            // Tính số giờ, phút và giây còn lại
            const hours = Math.floor(remainingTime / 3600);
            const minutes = Math.floor((remainingTime % 3600) / 60);
            const seconds = remainingTime % 60;

            // Cập nhật nội dung của thẻ <span>
            element.innerText = `${String(hours).padStart(2, '0')}:${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;

            // Giảm thời gian còn lại
            remainingTime--;

            // Kiểm tra khi hết thời gian
            if (remainingTime < 0) {
                clearInterval(countdown);
                element.innerText = "Đã kết thúc"; // Hiển thị khi hết thời gian
            }
        }, 1000);
    });
  </script>
@endpush
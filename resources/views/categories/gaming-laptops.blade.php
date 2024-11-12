@extends('layouts.app')
@section('content')
  <section class="product-page">
    <div class="container">
      <div aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="{{ route('home.index') }}">
              <i class="fa fa-home"></i> Trang chủ
            </a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">
            <a href="{{ url('/laptops/Gaming') }}">Laptop Gaming </a>
          </li>
        </ol>
      </div>
      <div class="product-collection-related-container">
        <div class="group-title">
          <h2 class="title">Laptop Gaming Được Mua Nhiều Nhất 2024</h2>
        </div>
      </div>
      <div class="p-container bg-white js-box-container" style="min-height: 400px" data-id="395-850">
        <div class="container custom-nav owl-carousel owl-theme">
          @foreach ($topGamingLaptops as $laptop)
            @include('partials.detailed-p-item', ['product' => $laptop])
          @endforeach
        </div>
      </div>

      <div class="product-collection-related-container">
        <div class="filter-height" style="display: none;"></div>
        <div class="filter-container">
          <p class="filter-group-title"> BỘ LỌC </p>
          <div class="filter-list-container">
            <div class="filter-item js-filter-item" data-type="brand">
              <a href="#" class="filter-name"> Hãng </a>
              <div class="filter-content-group">
                <div class="filter-group-middle">
                  <a href="#" class="image filter-title js-filter-title" title="Acer" data-check="0"
                    data-filter_code="brand" data-value="acer">
                    <span style="background-image: url('{{ asset('assets/img/brand/acer.jpg') }}');"></span>
                  </a>
                  <a href="#" class="image filter-title js-filter-title" title="Asus" data-check="0"
                    data-filter_code="brand" data-value="asus">
                    <span style="background-image: url('{{ asset('assets/img/brand/asus.jpg') }}');"></span>
                  </a>
                  <a href="#" class="image filter-title js-filter-title" title="Dell" data-check="0"
                    data-filter_code="brand" data-value="lenovo">
                    <span style="background-image: url('{{ asset('assets/img/brand/lenovo.jpg') }}');"></span>
                  </a>
                  <a href="#" class="image filter-title js-filter-title" title="Lenovo" data-check="0"
                    data-filter_code="brand" data-value="dell">
                    <span style="background-image: url('{{ asset('assets/img/brand/dell.jpg') }}');"></span>
                  </a>
                </div>
                <div class="filter-group-bottom">
                  <a href="#" onclick=""> Bỏ chọn </a>
                  <a href="#" class="js-open-url"> Xem kết quả </a>
                </div>
              </div>
            </div>
            <div class="filter-item js-filter-item" data-type="price">
              <a href="#" class="filter-name "> Giá </a>
              <div class="filter-content-group">
                <div class="filter-group-middle ">
                  <a href="#" class="filter-title js-filter-title" data-filter_code="price"
                    data-value="min=0&max=15000000"> Dưới 15 triệu </a>
                  <a href="#" class="filter-title js-filter-title" data-filter_code="price"
                    data-value="min=15000000&max=20000000"> 15 triệu - 20 triệu </a>
                  <a href="#" class="filter-title js-filter-title" data-filter_code="price"
                    data-value="min=20000000&max=25000000"> 20 triệu - 25 triệu </a>
                  <a href="#" class="filter-title js-filter-title" data-filter_code="price"
                    data-value="min=25000000&max=30000000"> 25 triệu - 30 triệu </a>
                  <a href="#" class="filter-title js-filter-title" data-filter_code="price"
                    data-value="min=30000000&max=35000000"> 30 triệu - 35 triệu </a>
                  <a href="#" class="filter-title js-filter-title" data-filter_code="price"
                    data-value="min=35000000&max=40000000"> 35 triệu - 40 triệu </a>
                  <a href="#" class="filter-title js-filter-title" data-filter_code="price"
                    data-value="min=40000000&max=50000000"> 40 triệu - 50 triệu </a>
                  <a href="#" class="filter-title js-filter-title" data-filter_code="price"
                    data-value="min=50000000&max=60000000"> 50 triệu - 60 triệu </a>
                  <a href="#" class="filter-title js-filter-title" data-filter_code="price"
                    data-value="min=60000000&max=1000000000000"> Trên 60 triệu </a>
                </div>
                <div class="filter-group-bottom">
                  <a href="#" onclick=""> Bỏ chọn </a>
                  <a href="#" class="js-open-url"> Xem kết quả </a>
                </div>
              </div>
            </div>
            <div class="filter-item js-filter-item" data-type="cpu">
              <a href="#" class="filter-name "> Bộ vi xử lý </a>
              <div class="filter-content-group">
                <div class="filter-group-middle ">
                  <a href="#" class="filter-title js-filter-title" data-filter_code="cpu" data-value="Intel Core i3">Intel Core i3 </a>
                  <a href="#" class="filter-title js-filter-title" data-filter_code="cpu" data-value="Intel Core i5">Intel Core i5 </a>
                  <a href="#" class="filter-title js-filter-title" data-filter_code="cpu" data-value="Intel Core i7">Intel Core i7 </a>
                  <a href="#" class="filter-title js-filter-title" data-filter_code="cpu" data-value="Intel Core i9">Intel Core i9 </a>
                  <a href="#" class="filter-title js-filter-title" data-filter_code="cpu" data-value="AMD Ryzen 5">AMD Ryzen 5 </a>
                  <a href="#" class="filter-title js-filter-title" data-filter_code="cpu" data-value="AMD Ryzen 7">AMD Ryzen 7 </a>
                  <a href="#" class="filter-title js-filter-title" data-filter_code="cpu" data-value="AMD Ryzen 9">AMD Ryzen 9 </a>
                </div>
                <div class="filter-group-bottom">
                  <a href="#" onclick="BuildFilterUrl.clearFilter.call(this, '')"> Bỏ chọn </a>
                  <a href="/gaming-laptop.html" class="js-open-url"> Xem kết quả
                  </a>
                </div>
              </div>
            </div>
            <div class="filter-item js-filter-item" data-type="attribute">
              <a href="#" class="filter-name "> Kích thước màn hình </a>
              <div class="filter-content-group">
                <div class="filter-group-middle ">
                  <a href="#" class="filter-title js-filter-title" data-filter_code="screensize"data-value="14">14.0 inch </a>
                  <a href="#" class="filter-title js-filter-title" data-filter_code="screensize"data-value="14.5 inch">14.5 inch </a>
                  <a href="#" class="filter-title js-filter-title" data-filter_code="screensize"data-value="15.0 inch">15 inch </a>
                  <a href="#" class="filter-title js-filter-title" data-filter_code="screensize"data-value="15.6 inch">15.6 inch </a>
                  <a href="#" class="filter-title js-filter-title" data-filter_code="screensize"data-value="16 inch">16 inch </a>
                </div>
                <div class="filter-group-bottom">
                  <a href="#" onclick="BuildFilterUrl.clearFilter.call(this, '')"> Bỏ chọn </a>
                  <a href="/gaming-laptop.html" class="js-open-url"> Xem kết quả
                  </a>
                </div>
              </div>
            </div>
            <div class="filter-item js-filter-item" data-type="attribute">
              <a href="#" class="filter-name "> Card đồ họa (VGA) </a>
              <div class="filter-content-group">
                <div class="filter-group-middle ">
                  <a href="#" class="filter-title js-filter-title" data-filter_code="vga" data-value="RTX 2050">NVIDIA GeForce RTX 2050 </a>
                  <a href="#" class="filter-title js-filter-title" data-filter_code="vga" data-value="RTX 3050">NVIDIA GeForce RTX 3050 </a>
                  <a href="#" class="filter-title js-filter-title" data-filter_code="vga" data-value="RTX 4050">NVIDIA GeForce RTX 4050 </a>
                  <a href="#" class="filter-title js-filter-title" data-filter_code="vga" data-value="RTX 4060">NVIDIA GeForce RTX 4060 </a>
                  <a href="#" class="filter-title js-filter-title" data-filter_code="vga" data-value="RTX 4070">NVIDIA GeForce RTX 4070 </a>
                  <a href="#" class="filter-title js-filter-title" data-filter_code="vga" data-value="RTX 4080">NVIDIA GeForce RTX 4080 </a>
                </div>
                <div class="filter-group-bottom">
                  <a href="#" onclick="BuildFilterUrl.clearFilter.call(this, '')"> Bỏ chọn </a>
                  <a href="/gaming-laptop.html" class="js-open-url"> Xem kết quả
                  </a>
                </div>
              </div>
            </div>
            <div class="filter-item js-filter-item" data-type="attribute">
              <a href="#" class="filter-name "> Bộ nhớ trong (RAM) </a>
              <div class="filter-content-group">
                <div class="filter-group-middle ">
                  <a href="#" class="filter-title js-filter-title" data-filter_code="ram" data-value="8GB">8GB </a>
                  <a href="#" class="filter-title js-filter-title" data-filter_code="ram" data-value="16GB">16GB </a>
                  <a href="#" class="filter-title js-filter-title" data-filter_code="ram" data-value="32GB">32GB </a>
                </div>
                <div class="filter-group-bottom">
                  <a href="#" onclick="BuildFilterUrl.clearFilter.call(this, '')"> Bỏ chọn </a>
                  <a href="/gaming-laptop.html" class="js-open-url"> Xem kết quả
                  </a>
                </div>
              </div>
            </div>
            <div class="filter-item js-filter-item" data-type="attribute">
              <a href="#" class="filter-name "> Dung lượng ổ cứng </a>
              <div class="filter-content-group">
                <div class="filter-group-middle ">
                  <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="512GB">
                    512GB </a>
                  <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="1TB">
                    1TB </a>
                  <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="2TB">
                    2TB </a>
                </div>
                <div class="filter-group-bottom">
                  <a href="#" onclick="BuildFilterUrl.clearFilter.call(this, '')"> Bỏ chọn </a>
                  <a href="/gaming-laptop.html" class="js-open-url"> Xem kết quả
                  </a>
                </div>
              </div>
            </div>
            <div class="filter-item js-filter-item" data-type="attribute">
              <a href="#" class="filter-name "> Hệ điều hành </a>
              <div class="filter-content-group">
                <div class="filter-group-middle ">
                  <a href="#" class="filter-title js-filter-title" data-filter_code="os"
                    data-value="Windows 10">
                    Windows 10 </a>
                  <a href="#" class="filter-title js-filter-title" data-filter_code="os"
                    data-value="Windows 11">
                    Windows 11 </a>
                </div>
                <div class="filter-group-bottom">
                  <a href="#" onclick="BuildFilterUrl.clearFilter.call(this, '')"> Bỏ chọn </a>
                  <a href="/gaming-laptop.html" class="js-open-url"> Xem kết quả
                  </a>
                </div>
              </div>
            </div>
            <div class="filter-item js-filter-item" data-type="attribute">
              <a href="#" class="filter-name "> Trọng lượng </a>
              <div class="filter-content-group">
                <div class="filter-group-middle ">
                  <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="1272"> 1.0kg<2.0kg </a>
                  <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="1273"> 2.0kg<2.4kg </a>
                  <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="1274"> 2.4<3kg </a>
                  <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="1275"> >3kg </a>
                </div>
                <div class="filter-group-bottom">
                  <a href="#" onclick="BuildFilterUrl.clearFilter.call(this, '')"> Bỏ chọn </a>
                  <a href="/gaming-laptop.html" class="js-open-url"> Xem kết quả
                  </a>
                </div>
              </div>
            </div>
            <div class="filter-item js-filter-item" data-type="attribute">
              <a href="#" class="filter-name "> Màu sắc </a>
              <div class="filter-content-group">
                <div class="filter-group-middle ">
                  <a href="#" class="filter-title js-filter-title" data-filter_code="color" data-value="Eclipse Gray">Eclipse Gray </a>
                  <a href="#" class="filter-title js-filter-title" data-filter_code="color" data-value="Obsidian black">Obsidian black </a>
                  <a href="#" class="filter-title js-filter-title" data-filter_code="color" data-value="Xám">Xám </a>
                  <a href="#" class="filter-title js-filter-title" data-filter_code="color" data-value="Đen">Đen </a>
                </div>
                <div class="filter-group-bottom">
                  <a href="#" onclick="BuildFilterUrl.clearFilter.call(this, '')"> Bỏ chọn </a>
                  <a href="/gaming-laptop.html" class="js-open-url"> Xem kết quả
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="p-container bg-white">
          <div class="sort-container d-flex align-items-center justify-content-between flex-wrap">
            <div class="d-flex align-items-center">
              <b style="font-size:16px;margin-right: 20px"> ? Laptop Gaming - Đồ Họa </b>
              <div class="sort-by-group">
                <a href="javascript:void(0)">
                  <i class="mb-icons icon-in-stock"></i>
                  <span> Còn hàng </span>
                </a>
                <a href="javascript:void(0)">
                  <i class="mb-icons icon-new"></i>
                  <span> Mới nhất </span>
                </a>
                <a href="javascript:void(0)">
                  <i class="mb-icons icon-increase"></i>
                  <span> Giá tăng dần </span>
                </a>
                <a href="javascript:void(0)" class="current">
                  <i class="mb-icons icon-decrease"></i>
                  <span> Giá giảm dần </span>
                </a>
              </div>
            </div>
          </div>
          <div class="p-list-container d-flex flex-wrap">
            @foreach ($gamingLaptops as $laptop)
              @include('partials.detailed-p-item', ['product' => $laptop])
            @endforeach
          </div>
        </div>
        <!-- paging -->
        <div class="paging bg-white mx-auto">
          {{-- Trang đầu tiên --}}
          <a href="{{ $gamingLaptops->url(1) }}" class="{{ $gamingLaptops->onFirstPage() ? 'current' : '' }}">
            1
          </a>
          {{-- Các trang tiếp theo --}}
          @for ($page = 2; $page <= $gamingLaptops->lastPage(); $page++)
            <a href="{{ $gamingLaptops->url($page) }}"
              class="{{ $page == $gamingLaptops->currentPage() ? 'current' : '' }}">
              {{ $page }}
            </a>
          @endfor
          {{-- Nút chuyển sang trang tiếp theo --}}
          @if ($gamingLaptops->hasMorePages())
            <a href="{{ $gamingLaptops->nextPageUrl() }}">
              <i class="fa fa-angle-right"></i>
            </a>
          @endif
        </div>
      </div>
  </section>
@endsection

@push('scripts')
  <script>
    // Đóng filter-item hiện tại khi click ra ngoài và giữ trạng thái của filter-title
    document.addEventListener('click', function(e) {
      const currentFilterItem = document.querySelector('.js-filter-item.current');

      // Nếu click không nằm trong một filter item
      if (!e.target.closest('.js-filter-item') && currentFilterItem) {
        currentFilterItem.classList.remove('current'); // Xóa class 'current'
      }
    });

    // Xử lý click vào các filter item
    document.querySelectorAll('.js-filter-item').forEach(filterItem => {
      filterItem.addEventListener('click', function(e) {
        e.preventDefault();
        e.stopPropagation(); // Ngăn sự kiện truyền lên body

        // Toggle class 'current' cho filter-item hiện tại
        const isCurrent = this.classList.toggle('current');

        // Nếu có filter khác đang là 'current', bỏ class 'current' của filter đó
        document.querySelectorAll('.js-filter-item').forEach(item => {
          if (item !== this && item.classList.contains('current')) {
            item.classList.remove('current');
          }
        });

        // Kiểm tra nếu có ít nhất một js-filter-title được chọn
        const selectedTitles = this.querySelectorAll('.js-filter-title.selected');
        if (selectedTitles.length > 0) {
          this.classList.add(
            'selected'); // Thêm class 'selected' nếu có ít nhất một title được chọn
        } else {
          this.classList.remove(
            'selected'); // Xóa class 'selected' nếu không có title nào được chọn
        }
      });
    });

    // Xử lý click vào các filter title
    document.querySelectorAll('.js-filter-title').forEach(filterTitle => {
      filterTitle.addEventListener('click', function(e) {
        e.preventDefault();
        e.stopPropagation(); // Ngăn sự kiện truyền lên filter item

        const parentFilterItem = this.closest('.js-filter-item');
        const dataType = parentFilterItem.getAttribute('data-type');

        if (dataType === 'price') {
          // Nếu là loại price, chỉ cho phép chọn một
          parentFilterItem.querySelectorAll('.js-filter-title.selected').forEach(title => {
            title.classList.remove('selected'); // Bỏ chọn tất cả
          });
          this.classList.add('selected'); // Chọn item hiện tại
        } else {
          // Cho phép chọn nhiều item
          this.classList.toggle('selected'); // Toggle class 'selected'
        }

        // Kiểm tra nếu có ít nhất một js-filter-title được chọn
        const selectedTitles = parentFilterItem.querySelectorAll('.js-filter-title.selected');
        if (selectedTitles.length > 0) {
          parentFilterItem.classList.add(
            'selected'); // Thêm class 'selected' nếu có ít nhất một title được chọn
        } else {
          parentFilterItem.classList.remove(
            'selected'); // Xóa class 'selected' nếu không có title nào được chọn
        }
      });
    });
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <script>
    $(document).ready(function() {
      $('.owl-carousel').owlCarousel({
        loop: false,
        margin: 10,
        nav: true,
        dots: true,
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 2
          },
          1000: {
            items: 5
          }

        }
      });
    });
  </script>

  {{-- filter --}}
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      let selectedValue = '';
      let selectedMin = null;
      let selectedMax = null;
      let selectedFilterType = '';

      document.querySelectorAll('.js-filter-title').forEach(function(element) {
        element.addEventListener('click', function(e) {
          e.preventDefault();

          selectedFilterType = element.getAttribute('data-filter_code');
          const dataValue = element.getAttribute('data-value');

          if (selectedFilterType === 'price') {
            const params = new URLSearchParams(dataValue);
            selectedMin = parseInt(params.get('min'), 10);
            selectedMax = parseInt(params.get('max'), 10);
            console.log("Selected Min:", selectedMin);
            console.log("Selected Max:", selectedMax);
            console.log("Selected:", selectedFilterType);
          } else {
            selectedValue = dataValue;
          }
          element.closest('.filter-content-group').querySelectorAll('.js-filter-title').forEach(el => el
            .classList.remove('selected'));
          element.classList.add('selected');
        });
      });

      // Xử lý khi click vào "Xem kết quả" cho bộ lọc
      document.querySelectorAll('.js-open-url').forEach(function(element) {
        element.addEventListener('click', function(e) {
          e.preventDefault();

          if (selectedFilterType === 'price' && selectedMin !== null && selectedMax !== null) {
            console.log(
              `/laptops/filter?min=${encodeURIComponent(selectedMin)}&max=${encodeURIComponent(selectedMax)}`
              );
            window.location.href =
              `/laptops/filter?min=${encodeURIComponent(selectedMin)}&max=${encodeURIComponent(selectedMax)}`;


          } else {
            window.location.href =
              `/laptops/filter?${selectedFilterType}=${encodeURIComponent(selectedValue)}`;
          }
        });
      });
    });
  </script>
@endpush

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
          <li class="breadcrumb-item" aria-current="page">
            <a href="{{ url('/pc-parts') }}">Linh kiện máy tính </a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">
            <a href="{{ url('/pc-parts/cpu/Intel') }}">CPU Intel </a>
          </li>
        </ol>
      </div>
      <div class="product-collection-related-container">
        <div class="group-title">
          <h2 class="title">CPU Được Mua Nhiều Nhất 2024</h2>
        </div>
      </div>
      <div class="p-container bg-white js-box-container" style="min-height: 400px" data-id="395-850">
        <div class="container custom-nav owl-carousel owl-theme">
          @foreach ($topCpus as $cpu)
            @include('partials.simple-p-item', ['product' => $cpu])
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
                  <a href="#" class="image filter-title js-filter-title" title="AMD" data-check="0"
                    data-filter_code="brand" data-value="amd">
                    <span style="background-image: url('{{ asset('assets/img/brand/amd.jpg') }}');"></span>
                  </a>
                  <a href="#" class="image filter-title js-filter-title" title="Intel" data-check="0"
                    data-filter_code="brand" data-value="intel">
                    <span style="background-image: url('{{ asset('assets/img/brand/intel.jpg') }}');"></span>
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
                    data-value="min=0&max=15000000"> Dưới 5 triệu </a>
                  <a href="#" class="filter-title js-filter-title" data-filter_code="price"
                    data-value="min=5000000&max=10000000"> 5 triệu - 10 triệu </a>
                  <a href="#" class="filter-title js-filter-title" data-filter_code="price"
                    data-value="min=10000000&max=15000000"> 10 triệu - 15 triệu </a>
                  <a href="#" class="filter-title js-filter-title" data-filter_code="price"
                    data-value="min=15000000&max=20000000"> 15 triệu - 20 triệu </a>
                </div>
                <div class="filter-group-bottom">
                  <a href="#" onclick=""> Bỏ chọn </a>
                  <a href="#" class="js-open-url"> Xem kết quả </a>
                </div>
              </div>
            </div>
            <div class="filter-item js-filter-item" data-type="cpu">
              <a href="#" class="filter-name "> Dòng CPU </a>
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
          </div>
        </div>

        <div class="p-container bg-white">
          <div class="sort-container d-flex align-items-center justify-content-between flex-wrap">
            <div class="d-flex align-items-center">
              <b style="font-size:16px;margin-right: 20px"> ? CPU - Vi xử lý </b>
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
            @foreach ($cpus as $cpu)
              @include('partials.simple-p-item', ['product' => $cpu])
            @endforeach
          </div>
        </div>
        <!-- paging -->
        <div class="paging bg-white mx-auto">
          <a href="{{ $cpus->url(1) }}" class="{{ $cpus->onFirstPage() ? 'current' : '' }}">
            1
          </a>
          @for ($page = 2; $page <= $cpus->lastPage(); $page++)
            <a href="{{ $cpus->url($page) }}"
              class="{{ $page == $cpus->currentPage() ? 'current' : '' }}">
              {{ $page }}
            </a>
          @endfor
          @if ($cpus->hasMorePages())
            <a href="{{ $cpus->nextPageUrl() }}">
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

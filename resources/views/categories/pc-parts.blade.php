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
            <a href="{{ url('/pc-parts') }}">Linh kiện máy tính</a>
          </li>
        </ol>
      </div>

      <div class="product-cat-child-group mb-3">
        <a href="{{ url('pc-parts/cpu')}}">
          <i class="image lazy"
            style="background-image: url('{{ url('assets/img/pcparts/cpu.jpg') }}');"></i>
          <span class="title">CPU</span>
        </a>

        <a href="{{ url('pc-parts/gpu')}}">
          <i class="image lazy"
            style="background-image: url('{{ url('assets/img/pcparts/gpu.jpg') }}');"></i>
          <span class="title">VGA</span>
        </a>

        <a href="#">
          <i class="image lazy"
            style="background-image: url('{{ url('assets/img/pcparts/main.jpg') }}');"></i>
          <span class="title">Mainboard</span>
        </a>
        <a href="#">
          <i class="image lazy"
            style="background-image: url('{{ url('assets/img/pcparts/ram.png') }}');"></i>
          <span class="title">RAM</span>
        </a>
        <a href="#">
          <i class="image lazy"
            style="background-image: url('{{ url('assets/img/pcparts/ssd.jpg') }}');"></i>
          <span class="title">SSD</span>
        </a>
        <a href="#">
          <i class="image lazy"
            style="background-image: url('{{ url('assets/img/pcparts/case.jfif') }}');"></i>
          <span class="title">Vỏ CASE</span>
        </a>
      </div>

      <div class="product-collection-related-container">
        <div class="filter-height" style="display: none;"></div>

        <div class="p-container bg-white">
          <div class="sort-container d-flex align-items-center justify-content-between flex-wrap">
            <div class="d-flex align-items-center">
              <b id="product-count-display" style="font-size:16px;margin-right: 20px"> Tất cả linh kiện máy tính </b>
              <div class="sort-by-group">
                <a href="/pc-parts/filter?sort=newest">
                  <i class="mb-icons icon-new" data-filter_code = "sort" data-value="newest"></i>
                  <span> Mới nhất </span>
                </a>
                <a href="/pc-parts/filter?sort=asc">
                  <i class="mb-icons icon-increase" data-filter_code = "sort" data-value="asc"></i>
                  <span> Giá tăng dần </span>
                </a>
                <a href="/pc-parts/filter?sort=desc">
                  <i class="mb-icons icon-decrease" data-filter_code = "sort" data-value="desc"></i>
                  <span> Giá giảm dần </span>
                </a>
              </div>
            </div>
          </div>
          <div class="p-list-container d-flex flex-wrap">
            @foreach ($paginatedPcparts as $pcpart)
              @include('partials.simple-p-item', ['product' => $pcpart])
            @endforeach
          </div>
        </div>
        <!-- paging -->
        <div class="paging bg-white mx-auto">
          <!-- Trang đầu tiên -->
          <a href="{{ $paginatedPcparts->url(1) }}" class="{{ $paginatedPcparts->onFirstPage() ? 'current' : '' }}">
            1
          </a>

          <!-- Lặp qua các trang khác -->
          @for ($page = 2; $page <= $paginatedPcparts->lastPage(); $page++)
            <a href="{{ $paginatedPcparts->url($page) }}"
              class="{{ $page == $paginatedPcparts->currentPage() ? 'current' : '' }}">
              {{ $page }}
            </a>
          @endfor

          <!-- Nút Next -->
          @if ($paginatedPcparts->hasMorePages())
            <a href="{{ $paginatedPcparts->nextPageUrl() }}">
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

  {{-- Count --}}
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Tìm container chứa danh sách sản phẩm
      const productListContainer = document.querySelector('.p-list-container');

      // Đếm số lượng sản phẩm bên trong
      const productCount = productListContainer.children.length;

      // Cập nhật nội dung của phần tử <b> với id là 'product-count-display'
      const productCountDisplay = document.getElementById('product-count-display');
      productCountDisplay.textContent = `${productCount} Laptop Gaming - Đồ Họa`;
    });
  </script>
@endpush

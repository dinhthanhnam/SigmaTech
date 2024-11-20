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
            <a href="{{ url('/gaminggears') }}">Gaming Gear </a>
          </li>
        </ol>
      </div>
      <div class="product-collection-related-container">
        <div class="group-title">
          <h2 class="title">Gaming Gear Được Mua Nhiều Nhất 2024</h2>
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
                  <a href="#" class="image filter-title js-filter-title" title="Razer" data-check="0"
                    data-filter_code="brand" data-value="Razer">
                    <span style="background-image: url('{{ asset('assets/img/brand/razer.png') }}');"></span>
                  </a>
                  <a href="#" class="image filter-title js-filter-title" title="Corsair" data-check="0"
                    data-filter_code="brand" data-value="Corsair">
                    <span style="background-image: url('{{ asset('assets/img/brand/corsair.png') }}');"></span>
                  </a>
                  <a href="#" class="image filter-title js-filter-title" title="SteelSeries" data-check="0"
                    data-filter_code="brand" data-value="SteelSeries">
                    <span style="background-image: url('{{ asset('assets/img/brand/steelseries.png') }}');"></span>
                  </a>
                  <a href="#" class="image filter-title js-filter-title" title="Keychron" data-check="0"
                    data-filter_code="brand" data-value="Keychron">
                    <span style="background-image: url('{{ asset('assets/img/brand/keychron.png') }}');"></span>
                  </a>
                  <a href="#" class="image filter-title js-filter-title" title="HyperX" data-check="0"
                    data-filter_code="brand" data-value="HyperX">
                    <span style="background-image: url('{{ asset('assets/img/brand/hyperx.png') }}');"></span>
                  </a>
                  <a href="#" class="image filter-title js-filter-title" title="Logitech" data-check="0"
                    data-filter_code="brand" data-value="Logitech">
                    <span style="background-image: url('{{ asset('assets/img/brand/logitech.png') }}');"></span>
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
                    data-value="min=0&max=1000000"> Dưới 1 triệu </a>
                  <a href="#" class="filter-title js-filter-title" data-filter_code="price"
                    data-value="min=1500000&max=2000000"> 1 triệu - 2 triệu </a>
                  <a href="#" class="filter-title js-filter-title" data-filter_code="price"
                    data-value="min=2000000&max=2500000"> 2 triệu - 2,5 triệu </a>
                  <a href="#" class="filter-title js-filter-title" data-filter_code="price"
                    data-value="min=2500000&max=3000000"> 2,5 triệu - 3 triệu </a>
                  <a href="#" class="filter-title js-filter-title" data-filter_code="price"
                    data-value="min=3000000&max=5000000"> 3 triệu - 5 triệu </a>
                  <a href="#" class="filter-title js-filter-title" data-filter_code="price"
                    data-value="min=5000000&max=1000000000000"> Trên 5 triệu </a>
                </div>
                <div class="filter-group-bottom">
                  <a href="#" onclick=""> Bỏ chọn </a>
                  <a href="#" class="js-open-url"> Xem kết quả </a>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="p-container bg-white">
          <div class="sort-container d-flex align-items-center justify-content-between flex-wrap">
            <div class="d-flex align-items-center">
              <b id="product-count-display" style="font-size:16px;margin-right: 20px"> Gaming Gear </b>
              <div class="sort-by-group">
                <a href="/gaminggears/filter?sort=newest">
                  <i class="mb-icons icon-new" data-filter_code = "sort" data-value="newest"></i>
                  <span> Mới nhất </span>
                </a>
                <a href="/gaminggears/filter?sort=asc">
                  <i class="mb-icons icon-increase" data-filter_code = "sort" data-value="asc"></i>
                  <span> Giá tăng dần </span>
                </a>
                <a href="/gaminggears/filter?sort=desc">
                  <i class="mb-icons icon-decrease" data-filter_code = "sort" data-value="desc"></i>
                  <span> Giá giảm dần </span>
                </a>
              </div>
            </div>
          </div>
          <div class="p-list-container d-flex flex-wrap">
            @foreach ($gaminggears as $gaminggear)
              @include('partials.simple-p-item', ['product' => $gaminggear])
            @endforeach
          </div>
        </div>
        <!-- paging -->
        <div class="paging bg-white mx-auto">
          {{-- Trang đầu tiên --}}
          <a href="{{ $gaminggears->url(1) }}" class="{{ $gaminggears->onFirstPage() ? 'current' : '' }}">
            1
          </a>
          {{-- Các trang tiếp theo --}}
          @for ($page = 2; $page <= $gaminggears->lastPage(); $page++)
            <a href="{{ $gaminggears->url($page) }}"
              class="{{ $page == $gaminggears->currentPage() ? 'current' : '' }}">
              {{ $page }}
            </a>
          @endfor
          {{-- Nút chuyển sang trang tiếp theo --}}
          @if ($gaminggears->hasMorePages())
            <a href="{{ $gaminggears->nextPageUrl() }}">
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
              `/gaminggears/filter?min=${encodeURIComponent(selectedMin)}&max=${encodeURIComponent(selectedMax)}`
              );
            window.location.href =
              `/gaminggears/filter?min=${encodeURIComponent(selectedMin)}&max=${encodeURIComponent(selectedMax)}`;
          } 
          else {
            window.location.href =
              `/gaminggears/filter?${selectedFilterType}=${encodeURIComponent(selectedValue)}`;
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
    productCountDisplay.textContent = `${productCount} Gaming Gear`;
  });
</script>

@endpush

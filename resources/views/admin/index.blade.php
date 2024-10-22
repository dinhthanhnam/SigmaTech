@extends('admin.app')
@section('content')
  <div class="header-main-container">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center header-main">
        <a href="/" class="logo">
          <img src="{{ asset('assets/img/sigmatech-yellow.png') }}" alt="SigmaTech Logo" class="logo-img w-auto h-auto" />
        </a>
        <div class="header-search">
          <form method="get" action="/tim" enctype="multipart/form-data" class="clearfix search-form bg-white">
            <select name="scat_id">
              <option value="">Tất cả danh mục</option>
              <option value="1614">Laptop Gaming - Đồ Họa</option>
              <option value="395">Laptop Văn Phòng</option>
              <option value="1253">Linh Kiện Máy Tính</option>
              <option value="1052">Màn Hình Máy Tính</option>
              <option value="1255">Bàn phím, Chuột - Gaming Gear</option>
              <option value="393">Loa, Tai Nghe, Webcam, Tivi</option>
              <option value="397">Cooling, Tản nhiệt</option>
              <option value="2112">Phụ Kiện Laptop, PC, Khác</option>
            </select>
            <div class="searh-form-container">
              <input type="text" id="js-search" class="text_search" value="" name="q"
                placeholder="Tìm kiếm sản phẩm..." autocomplete="off">
              <button type="submit" class="submit-search">
                <i class="fa fa-search"></i> Tìm kiếm
              </button>
            </div>
          </form>

          <div class="autocomplete-suggestions"></div>
        </div>
        <div class="header-icon-right d-flex justify-content-end">
          <div class="item clearfix px-2">
            <a href="#" title="Thông báo" class="d-flex">
              <i class="fa-solid fa-bell fa-2x"></i>
            </a>
          </div>
          <div class="item clearfix px-2">
            <img src="{{ asset('assets/img/header-icon-right/user.png') }}" alt="account" />
            <div class="icon-text m-0 text-14">
              <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Main Container -->
  <div class="container d-flex">
    <!-- Left Sidebar -->
    <div class="admin-menu">
      <div style="display: flex; justify-content: center; align-items: center; height: 5vh;">
        <span style="font-size: 16px; font-weight: 800; color: gray;">ADMIN MENU</span>
      </div>   
      <div class="menu-item bg-white">
        <button class="menu-dropdown-item" onclick="toggleDropdown(event)"
          style="display: flex; align-items: center; height: 100%; width: 100%; background: none; border: none; cursor: pointer;">
          <span class="admin-thumb-icon" style="width: 35px; text-align: center">
            <i class="fa-solid fa-square-poll-vertical"></i>
          </span>
          <span class="title" title="Sản phẩm"> Dashboard</span>
          <span class="fa-solid fa-chevron-left toggle-icon"></span>
        </button>
        <!-- Dropdown Content -->
        <div class="dropdown-content">
          <a href="#">Thêm sản phẩm</a>
          <a href="#">Xem toàn bộ sản phẩm</a>
        </div>
      </div>
      <div class="menu-item bg-white">
        <button class="menu-dropdown-item" onclick="toggleDropdown(event)"
          style="display: flex; align-items: center; height: 100%; width: 100%; background: none; border: none; cursor: pointer;">
          <span class="admin-thumb-icon" style="width: 35px; text-align: center">
            <i class="fa-solid fa-table"></i>
          </span>
          <span class="title" title="Sản phẩm"> Quản lý sản phẩm</span>
          <span class="fa-solid fa-chevron-left toggle-icon"></span>
        </button>
        <!-- Dropdown Content -->
        <div class="dropdown-content">
          <a href="#">Thêm sản phẩm</a>
          <a href="#">Xem toàn bộ sản phẩm</a>
        </div>
      </div>

      <div class="menu-item bg-white">
        <button class="menu-dropdown-item" onclick="toggleDropdown(event)"
          style="display: flex; align-items: center; height: 100%; width: 100%; background: none; border: none; cursor: pointer;">
          <span class="admin-thumb-icon" style="width: 35px; text-align: center">
            <i class="fa-solid fa-network-wired"></i>
          </span>
          <span class="title" title="Sản phẩm"> Quản lý danh mục</span>
          <span class="fa-solid fa-chevron-left toggle-icon"></span>
        </button>
        <!-- Dropdown Content -->
        <div class="dropdown-content">
          <a href="#">Thêm sản phẩm</a>
          <a href="#">Xem toàn bộ sản phẩm</a>
        </div>
      </div>

      <div class="menu-item bg-white">
        <button class="menu-dropdown-item" onclick="toggleDropdown(event)"
          style="display: flex; align-items: center; height: 100%; width: 100%; background: none; border: none; cursor: pointer;">
          <span class="admin-thumb-icon" style="width: 35px; text-align: center">
            <i class="fa-solid fa-tags"></i>
          </span>
          <span class="title" title="Sản phẩm"> Flash Sale & Khuyến mãi</span>
          <span class="fa-solid fa-chevron-left toggle-icon"></span>
        </button>
        <!-- Dropdown Content -->
        <div class="dropdown-content">
          <a href="#">Thêm sản phẩm</a>
          <a href="#">Xem toàn bộ sản phẩm</a>
        </div>
      </div>

    </div>

    <!-- Main Content -->
    <div class="main-content">
      <p>abc</p>
      @yield('content')
    </div>
  </div>
@endsection

@push('scripts')
  <script>
    function toggleDropdown(event) {
      event.stopPropagation(); // Ngăn chặn sự kiện click từ các phần tử con

      const dropdownContent = event.currentTarget.nextElementSibling;
      const toggleIcon = event.currentTarget.querySelector('.toggle-icon');

      if (dropdownContent.style.display === 'block') {
        dropdownContent.style.display = 'none';
        toggleIcon.classList.remove('rotate');
      } else {
        dropdownContent.style.display = 'block';
        toggleIcon.classList.add('rotate');
      }

      // Đảm bảo icon luôn hiển thị
      toggleIcon.style.display = 'block';
    }
  </script>
@endpush

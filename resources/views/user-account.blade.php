@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/user_account.css') }}">
@endpush

@section('content')
    <div class="account-container">
        <div class="account-sidebar">
            <div class="user-info">
                <img src="{{ asset('assets/img/login/profile-user.png') }}" alt="User Icon" class="user-icon">
                <span class="user-name">{{ Auth::user()->name }}</span>
            </div>
            <hr class="sidebar-divider">
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <ul class="account-menu">
                <li>
                    <span class="menu-icon">
                        <i class="fas fa-user"></i>
                    </span>
                    <a href="#profile">Thông tin tài khoản</a>
                </li>
                <li>
                    <span class="menu-icon">
                        <i class="fas fa-box"></i>
                    </span>
                    <a href="#orders">Quản lý đơn hàng</a>
                </li>
                <li>
                    <span class="menu-icon">
                        <i class="fas fa-heart"></i>
                    </span>
                    <a href="#saved-products">Sản phẩm đang lưu</a>
                </li>
                <li>
                    <span class="menu-icon">
                        <i class="fas fa-wrench"></i>
                    </span>
                    <a href="#orders">Cấu hình của tôi</a>
                </li>
                <li>
                    <span class="menu-icon">
                        <i class="fas fa-key"></i>
                    </span>
                    <a href="#orders">Đổi mật khẩu</a>
                </li>
                <li>
                    <span class="menu-icon">
                        <i class="fas fa-sign-out-alt"></i>
                    </span>
                    <a href="#"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Đăng xuất</a>
                </li>
            </ul>

        </div>

        <div class="account-content">
            <section id="profile">
                <h2>Thông tin tài khoản</h2>
                <form id="profile-form">
                    <div class="form-group">
                        <div class="form-row">
                            <label for="full-name">Họ tên</label>
                            <input type="text" id="full-name" value="{{ Auth::user()->name }}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <label>Giới tính</label>
                            <div class="gender-options">
                                <input type="radio" id="male" name="gender" value="male" checked>
                                <label for="male">Nam</label>
                                <input type="radio" id="female" name="gender" value="female">
                                <label for="female">Nữ</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <label for="phone">Số điện thoại</label>
                            <input type="tel" id="phone" value="{{ Auth::user()->phone }}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <label for="email">Email</label>
                            <input type="email" id="email" value="{{ Auth::user()->email }}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <label for="address">Địa chỉ</label>
                            <input type="text" id="address" value="{{ Auth::user()->address }}"class="form-control">
                        </div>
                    </div>
                    <div class="form-row">
                        <label> </label>
                        <button type="submit" class="btn-save">Lưu thay đổi</button>
                    </div>
                </form>
            </section>


            <section id="orders" style="display: none;">
                <h2>Quản lý đơn hàng</h2>
                <p>Không có đơn hàng nào.</p>
            </section>
            <section id="saved-products" style="display: none;">
                <h2>Sản phẩm đang lưu</h2>
                <p>Không có sản phẩm nào đang lưu.</p>
            </section>
            <section id="logout" style="display: none;">
                <h2>Đăng xuất</h2>
                <p>Bạn đã đăng xuất thành công.</p>
            </section>
        </div>

    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/UserAccount.js') }}"></script>
@endpush

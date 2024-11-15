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
                        <i class="fas fa-box"></i>
                    </span>
                    <a href="#orders">Quản lý đơn hàng</a>
                </li>
                <li>
                    <span class="menu-icon">
                        <i class="fas fa-user"></i>
                    </span>
                    <a href="#profile">Thông tin tài khoản</a>
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
            </ul>

        </div>

        <div class="account-content">
            <section id="orders">
                <h2>Quản lý đơn hàng</h2>
                @if ($orders)
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Thời gian đặt hàng</th>
                                <th>Người nhận</th>
                                <th>Số điện thoại</th>
                                <th>Địa chỉ giao hàng</th>
                                <th>Phương thức thanh toán</th>
                                <th>Lưu ý</th>
                                <th>Tổng tiền</th>
                                <th>Trạng thái</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->created_at }}</td>
                                    <td>{{ $order->customer_name }}</td>
                                    <td>{{ $order->phone_number }}</td>
                                    <td> {{ $order->shipping_address }} </td>
                                    @if ($order->payment_method === 'cod')
                                        <td>Thanh toán khi nhận hàng</td>
                                    @else
                                        <td>{{ $order->payment_method }}</td>
                                    @endif

                                    @if ($order->note === null)
                                        <td>Trống</td>
                                    @else
                                        <td>{{ $order->note }}</td>
                                    @endif
                                    <td>{{ number_format($order->total_price, 0, ',', '.') }}
                                        đ</td>
                                    @if ($order->status === '0')
                                        <td><span class="badge bg-secondary">Chờ xác nhận</span></td>
                                    @elseif ($order->status === '1')
                                        <td><span class="badge bg-info">Đang vận chuyển</span></td>
                                    @elseif ($order->status === '2')
                                        <td><span class="badge bg-warning">Chờ thanh toán</span></td>
                                    @elseif ($order->status === '3')
                                        <td><span class="badge bg-success">Hoàn thành</span></td>
                                    @elseif ($order->status === '4')
                                        <td><span class="badge bg-danger">Đã hủy</span></td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p>Bạn chưa có đơn hàng nào.</p>
                @endif

            </section>
            <section id="profile" style="display: none;">
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
                                <input type="radio" id="male" name="gender" value="male"
                                    @if (Auth::user()->gender == 1) checked @endif>
                                <label for="male">Nam</label>

                                <input type="radio" id="female" name="gender" value="female"
                                    @if (Auth::user()->gender == 0) checked @endif>
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



            <section id="saved-products" style="display: none;">
                <h2>Sản phẩm đang lưu</h2>
                <p>Không có sản phẩm nào đang lưu.</p>
            </section>
        </div>
        @if (session('orderSuccess'))
            @push('scripts')
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Đặt hàng thành công!',
                        text: 'Cảm ơn bạn đã mua sắm tại SigmaTech.',
                        confirmButtonText: 'Đóng',
                        timer: 5000
                    });
                </script>
            @endpush
        @endif
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuItems = document.querySelectorAll('.account-menu li a');
            const sections = document.querySelectorAll('.account-content section');

            sections[0].style.display = 'block';
            menuItems[0].parentElement.classList.add('active');

            menuItems.forEach(item => {
                item.addEventListener('click', function(e) {
                    e.preventDefault();

                    sections.forEach(section => {
                        section.style.display = 'none';
                    });

                    const targetId = item.getAttribute('href').substring(1);
                    const targetSection = document.getElementById(targetId);
                    if (targetSection) {
                        targetSection.style.display = 'block';
                    }

                    menuItems.forEach(menuItem => {
                        menuItem.parentElement.classList.remove('active');
                    });

                    item.parentElement.classList.add('active');
                });
            });
        });
    </script>
@endpush

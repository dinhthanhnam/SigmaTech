@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/user_account.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/cart.css') }}">
@endpush
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
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
                    <a href="#password-change">Đổi mật khẩu</a>
                </li>
            </ul>

        </div>

        <div class="account-content">
            <section id="orders">
                <h2>Quản lý đơn hàng</h2>
                @if ($orders)
                    <table class="table orders-table">
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
                                <tr class="order-row" data-order-id="{{ $order->id }}">
                                    <td>{{ $order->created_at }}</td>
                                    <td>{{ $order->customer_name }}</td>
                                    <td>{{ $order->phone_number }}</td>
                                    <td> {{ $order->shipping_address }} </td>
                                    @if ($order->payment_method === 'cod')
                                        <td>Thanh toán khi nhận hàng</td>
                                    @elseif ($order->payment_method === 'banking')
                                        <td>Chuyển khoản ngân hàng</td>
                                    @endif

                                    @if ($order->note === null)
                                        <td>Không có</td>
                                    @else
                                        <td>{{ $order->note }}</td>
                                    @endif
                                    <td>{{ number_format($order->total_price, 0, ',', '.') }}
                                        đ</td>
                                    @if ($order->status === '0')
                                        <td><span class="badge bg-secondary" style="color: white">Chờ xác nhận</span></td>
                                    @elseif ($order->status === '1')
                                        <td><span class="badge bg-info">Đang vận chuyển</span></td>
                                    @elseif ($order->status === '2')
                                        <td><span class="badge bg-warning">Đã thanh toán, chờ vận chuyển</span></td>
                                    @elseif ($order->status === '3')
                                        <td><span class="badge bg-success">Hoàn thành</span></td>
                                    @elseif ($order->status === '4')
                                        <td><span class="badge bg-danger">Đã hủy</span></td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pagination-container">
                        {{ $orders->links('pagination::bootstrap-5') }}
                    </div>
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

            <section id="password-change" style="display: none;">
                @include('auth.passwords.change')
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
<div style="display: none;" id="orderDetailModal">
    <div class="order-detail-content">
        <div id="order-detail"></div>
    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const orderRows = document.querySelectorAll('.order-row');

            orderRows.forEach(row => {
                row.addEventListener('click', function() {
                    const orderId = row.getAttribute('data-order-id');

                    // Gửi yêu cầu AJAX để lấy chi tiết đơn hàng
                    fetch(`/account/order/${orderId}`)
                        .then(response => response.json())
                        .then(data => {
                            const orderDetailContent = document.getElementById('order-detail');

                            let orderDetailsHtml = `
                                <ul class="list-group mb-3">
                                    `;
                            data.order_details.forEach(item => {
                                orderDetailsHtml += `
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div class="item-image" style="width: 100px;">
                                        <img src="${item.image}" alt="${item.name}">
                                    </div>
                                    <div class="item-info flex-grow-1">
                                        <strong>${item.name}</strong> x ${item.quantity}
                                    </div>
                                    <span class="text-danger fw-bold">
                                        ${item.price} đ
                                    </span>
                                </li>                                
                                `;
                            });

                            orderDetailsHtml += '</ul>';

                            orderDetailContent.innerHTML = `
                                <p><strong>Người nhận:</strong> ${data.customer_name}</p>
                                <p><strong>Số điện thoại:</strong> ${data.phone_number}</p>
                                <p><strong>Địa chỉ giao hàng:</strong> ${data.shipping_address}</p>
                                <p><strong>Phương thức thanh toán:</strong> 
                                    ${
                                        data.payment_method === 'cod'
                                            ? 'Thanh toán khi nhận hàng'
                                            : data.payment_method
                                    }
                                </p>
                                <p><strong>Lưu ý:</strong> ${data.note || 'Không có'}</p>
                                <p><strong>Tổng tiền:</strong> ${data.total_price} đ</p>
                                <p><strong>Trạng thái:</strong> ${
                                    data.status === '0'
                                        ? '<span class="badge bg-secondary" style="color: white">Chờ xác nhận</span>'
                                        : data.status === '1'
                                        ? '<span class="badge bg-info">Đang vận chuyển</span>'
                                        : data.status === '2'
                                        ? '<span class="badge bg-warning">Đã thanh toán, chờ vận chuyển</span>'
                                        : data.status === '3'
                                        ? '<span class="badge bg-success">Hoàn thành</span>'
                                        : data.status === '4'
                                        ? '<span class="badge bg-danger">Đã hủy</span>'
                                        : 'Không xác định'
                                }</p>
                                <h4>Chi tiết đơn hàng:</h4>
                                ${orderDetailsHtml}
                            `;


                            // Mở Fancybox
                            Fancybox.show([{
                                src: '#orderDetailModal',
                                type: 'inline'
                            }]);
                        })
                        .catch(error => console.error('Lỗi khi lấy chi tiết đơn hàng:', error));
                });
            });
        });

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

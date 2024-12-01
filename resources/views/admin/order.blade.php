@extends('admin.app')
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/cart.css') }}">
@endpush

@section('content')
    <main class="app-content">
        <div class="app-title">
            <ul class="app-breadcrumb ">
                <li class="breadcrumb-item" style = "list-style: none"><a href="#"><b>Danh sách đơn hàng</b></a></li>
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
                                        style = "width: 150px; height: 50px; font-size: 14px;"
                                        onclick="handleCreateProductClick(event)">
                                        <i class="fas fa-plus mr-2"></i> Tạo đơn hàng
                                    </a>
                                </div>
                            </div>
                            <table class="table table-hover table-bordered" id="sampleTable">
                                <thead>
                                    <tr>
                                        <th width="100">Tài khoản</th>
                                        <th width="160">Thời gian đặt hàng</th>
                                        <th width="160">Nguời nhận</th>
                                        <th width="100">Số điện thoại</th>
                                        <th width="300">Địa chỉ giao hàng</th>
                                        <th width="230">Phương thức thanh toán</th>
                                        <th width="150">Lưu ý</th>
                                        <th width="130">Tổng tiền</th>
                                        <th width="150">Trạng thái</th>
                                        <th>Chức năng</th>
                                        <!-- Thêm các cột khác nếu cần -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr class="order-row" data-order-id="{{ $order->id }}">
                                            <td>{{ $order->user->name }}</td>
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
                                                <td><span class="badge bg-secondary" style="color: white">Chờ xác
                                                        nhận</span></td>
                                            @elseif ($order->status === '1')
                                                <td><span class="badge bg-info">Đang vận chuyển</span></td>
                                            @elseif ($order->status === '2')
                                                <td><span class="badge bg-warning">Đã thanh toán, chờ vận chuyển</span></td>
                                            @elseif ($order->status === '3')
                                                <td><span class="badge bg-success">Hoàn thành</span></td>
                                            @elseif ($order->status === '4')
                                                <td><span class="badge bg-danger">Đã hủy</span></td>
                                            @endif
                                            <td><button class="btn btn-primary btn-sm trash" type="button" title="Xóa"
                                                    onclick="myFunction(this)"><i class="fas fa-trash-alt"></i>
                                                </button>
                                                <button class="btn btn-primary btn-sm edit" type="button" title="Sửa"><i
                                                        class="fas fa-edit"></i></button>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-container">
                                {{ $orders->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
<div style="display: none;" id="orderDetailModal">
    <div class="order-detail-content">
        <div id="order-detail"></div>

    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const editButtons = document.querySelectorAll('.btn.edit');

            editButtons.forEach(button => {
                button.addEventListener('click', function(event) {
                    // Ngăn sự kiện click lan sang các phần tử cha

                    event.stopPropagation();
                    const orderRow = button.closest('.order-row');
                    const orderId = orderRow.getAttribute('data-order-id');

                    fetch(`/admin/order/${orderId}`)
                        .then(response => response.json())
                        .then(data => {
                            const orderDetailContent = document.getElementById('order-detail');

                            let orderDetailsHtml = `
                                <ul class="list-group mb-3">
                                `;
                            data.order_details.forEach(item => {
                                orderDetailsHtml += `
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div class="item-image" style="width: 50px;">
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
                                <form id="edit-order-form">
                                    <p><strong>Người nhận:</strong> <input type="text" class="form-control" name="customer_name" value="${data.customer_name}" /></p>
                                    <p><strong>Số điện thoại:</strong> <input type="text" class="form-control" name="phone_number" value="${data.phone_number}" /></p>
                                    <p><strong>Địa chỉ giao hàng:</strong> <textarea class="form-control" name="shipping_address">${data.shipping_address}</textarea></p>
                                    <p><strong>Phương thức thanh toán:</strong> 
                                        <select class="form-control" name="payment_method">
                                            <option value="cod" ${data.payment_method === 'cod' ? 'selected' : ''}>Thanh toán khi nhận hàng</option>
                                            <option value="banking" ${data.payment_method === 'banking' ? 'selected' : ''}>Chuyển khoản ngân hàng</option>
                                        </select>
                                    </p>
                                    <p><strong>Lưu ý:</strong> <textarea class="form-control" name="note">${data.note || ''}</textarea></p>
                                    <p><strong>Tổng tiền:</strong> <span id="total-price">${data.total_price} đ</span></p>
                                    <p><strong>Trạng thái:</strong>
                                        <select class="form-control" name="status">
                                            <option value="0" ${data.status === '0' ? 'selected' : ''}>Chờ xác nhận</option>
                                            <option value="1" ${data.status === '1' ? 'selected' : ''}>Đang vận chuyển</option>
                                            <option value="2" ${data.status === '2' ? 'selected' : ''}>Đã thanh toán, chờ vận chuyển</option>
                                            <option value="3" ${data.status === '3' ? 'selected' : ''}>Hoàn thành</option>
                                            <option value="4" ${data.status === '4' ? 'selected' : ''}>Đã hủy</option>
                                        </select>
                                    </p>
                                    <h4>Chi tiết đơn hàng:</h4>
                                    ${orderDetailsHtml}
                                    <div class="mt-3 d-flex justify-content-between">
                                        <button type="button" class="btn btn-secondary cancel-edit">Hủy bỏ</button>
                                        <button type="submit" class="btn btn-primary save-edit">Lưu thay đổi</button>
                                    </div>
                                </form>
                            `;
                            document.getElementById('edit-order-form').addEventListener(
                                'submit',
                                function(event) {
                                    event.preventDefault(); // Ngăn reload trang

                                    const formData = new FormData(event.target);

                                    fetch(`/admin/order/${orderId}`, {
                                            method: 'POST',
                                            body: formData,
                                            headers: {
                                                'X-CSRF-TOKEN': document.querySelector(
                                                        'meta[name="csrf-token"]')
                                                    .content
                                            }
                                        })
                                        .then(response => response.json())
                                        .then(result => {
                                            if (result.success) {
                                                console.log(formData);
                                                alert('Cập nhật đơn hàng thành công!');
                                                Fancybox.close();
                                                location.reload();
                                            } else {
                                                alert('Cập nhật thất bại!');
                                            }
                                        })
                                        .catch(error => console.error('Lỗi khi cập nhật:',
                                            error));
                                });

                            document.querySelector('.cancel-edit').addEventListener('click',
                                function() {
                                    Fancybox.close();
                                });
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
    </script>
@endpush

@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/cart.css') }}">
@endpush

@section('content')
    <div class="container">
        {{-- Breadcrumb --}}
        <div aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}">
                        <i class="fa fa-home"></i> Trang chủ
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Giỏ hàng</li>
            </ol>
        </div>

        <div class="cart-page bg-white p-4">
            <h3 class="text-center mb-4">Giỏ hàng của bạn</h3>
            @if (isset($cartItems) && count($cartItems) === 0)
                <div class="text-center">
                    <p>Giỏ hàng trống</p>
                    <a href="{{ url('/') }}" class="btn btn-primary mt-3">Mua sắm ngay</a>
                </div>
            @else
                <div class="cart-items">
                    <div class="select-all mb-3">
                        <input type="checkbox" id="select-all" onclick="toggleSelectAll(this)">
                        <label for="select-all">Chọn tất cả</label>
                    </div>
                    @php $totalPrice = 0; @endphp
                    @foreach ($cartItems as $item)
                        @php
                            $itemTotal = $item->dealprice * $item->quantity;
                        @endphp
                        <section class="cart-item d-flex p-3 border-none">
                            <div class="align-self-center me-3">
                                <input type="checkbox" class="select-item" data-price="{{ $itemTotal }}"
                                    onclick="updateTotalPriceCheckbox()">
                            </div>

                            <div class="item-image" style="width: 130px;">
                                <img src="{{ asset($item->image) }}" alt="{{ $item->name }}">
                                <button class="btn mt-2 delete-btn"
                                    onclick="remove('{{ $item->product_type }}', {{ $item->product_id }})">
                                    <i class="fa fa-trash"></i> Xóa
                                </button>
                            </div>

                            <!-- Thông tin sản phẩm -->
                            <div class="item-info flex-grow-1 ms-3">
                                <!-- Tên sản phẩm -->
                                <div class="item-name mb-1">
                                    <h5>{{ $item->name }}</h5>
                                </div>
                            </div>
                            <!-- Giá sản phẩm -->
                            <div class="item-price ">
                                <span class="text-danger fw-bold me-2">{{ number_format($item->dealprice, 0, ',', '.') }}
                                    đ</span>
                                <div>
                                    <del class="text-muted">{{ number_format($item->price, 0, ',', '.') }} đ</del>

                                </div>
                                <div class="item-quantity d-flex">
                                    <button class="qtyminus qty-btn"
                                        onclick="updateQuantity('{{ $item->product_type }}', {{ $item->product_id }}, -1)"
                                        {{ $item->quantity <= 1 ? 'disabled' : '' }} data-type="{{ $item->product_type }}"
                                        data-id="{{ $item->product_id }}">-</button>
                                    <input type="text" class="form text-center quantity-input" style="width: 50px;"
                                        value="{{ $item->quantity }}" readonly data-type="{{ $item->product_type }}"
                                        data-id="{{ $item->product_id }}">
                                    <button class="qtyplus qty-btn"
                                        onclick="updateQuantity('{{ $item->product_type }}', {{ $item->product_id }}, 1)"
                                        data-type="{{ $item->product_type }}" data-id="{{ $item->product_id }}">+</button>
                                </div>
                            </div>
                        </section>
                    @endforeach
                </div>

                {{-- Total Price and Order Button --}}
                <div class="total-price-section d-flex justify-content-between align-items-center mt-4">
                    <h5 class="total-label">Tổng tiền:</h5>
                    <h5 id="total-amount" class="total-amount text-danger">{{ number_format($totalPrice, 0, ',', '.') }} đ
                    </h5>
                </div>
                <div class = "custom-order-btn">
                    <a href="#" class="btn w-100">ĐẶT HÀNG NGAY</a>
                </div>
            @endif
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function toggleSelectAll(checkbox) {
            document.querySelectorAll('.select-item').forEach(itemCheckbox => {
                itemCheckbox.checked = checkbox.checked;
            });
            updateTotalPriceCheckbox();
        }

        function updateQuantity(productType, productId, adjustment) {
            // Lấy ô input số lượng dựa trên cả productType và productId
            const quantityInput = document.querySelector(
                `input.quantity-input[data-type="${productType}"][data-id="${productId}"]`
            );

            // Lấy số lượng hiện tại và tính toán số lượng mới
            let currentQuantity = parseInt(quantityInput.value);
            let newQuantity = currentQuantity + adjustment;

            // Kiểm tra nếu số lượng mới hợp lệ
            if (newQuantity < 1) {
                alert("Số lượng không thể nhỏ hơn 1");
                return;
            }

            // Cập nhật giá trị số lượng mới vào ô input
            quantityInput.value = newQuantity;


            const minusButton = document.querySelector(
                `button.qtyminus[data-type="${productType}"][data-id="${productId}"]`
            );
            minusButton.disabled = newQuantity <= 1;

            let cartChanges = JSON.parse(localStorage.getItem('cartChanges')) || {};
            cartChanges[`${productType}_${productId}`] = newQuantity;
            localStorage.setItem('cartChanges', JSON.stringify(cartChanges));
            updateTotalPriceCheckbox();
        }

        function updateTotalPriceCheckbox() {
            let totalPrice = 0;
            document.querySelectorAll('.cart-item').forEach(item => {
                const checkbox = item.querySelector('.select-item');
                if (checkbox && checkbox.checked) {
                    const dealPrice = parseFloat(item.querySelector('.item-price .text-danger').innerText.replace(
                        /\./g, '').replace(' đ', ''));
                    const quantity = parseInt(item.querySelector('.item-quantity input').value);
                    totalPrice += dealPrice * quantity;
                }
            });
            document.getElementById('total-amount').innerText = numberWithCommas(totalPrice) + ' đ';
        }

        function numberWithCommas(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }
        window.addEventListener('beforeunload', function() {
            const cartChanges = JSON.parse(localStorage.getItem('cartChanges'));

            if (cartChanges) {
                // Gửi yêu cầu AJAX cập nhật số lượng trong database
                fetch('/cart/update-bulk', {
                        method: 'PATCH',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({
                            items: cartChanges
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Xóa các thay đổi khỏi localStorage sau khi đã cập nhật thành công
                            localStorage.removeItem('cartChanges');
                        }
                    })
                    .catch(error => console.error('Lỗi:', error));
            }
        });

        function remove(productType, productId) {
            if (confirm('Bạn có chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng?')) {
                fetch(`/cart/${productType}/${productId}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            location.reload(); // Tải lại trang để cập nhật giỏ hàng
                        } else {
                            alert(data.error);
                        }
                    })
                    .catch(error => console.error('Lỗi:', error));
            }
        }
    </script>
@endpush

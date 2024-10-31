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
                    @php $totalPrice = 0; @endphp
                    @foreach ($cartItems as $item)
                        @php
                            $itemTotal = $item->dealprice * $item->quantity;
                            $totalPrice += $itemTotal;
                        @endphp
                        <section class="cart-item d-flex p-3 border-none">
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
                                        onclick="update('{{ $item->product_type }}', {{ $item->product_id }}, {{ $item->quantity - 1 }})"
                                        {{ $item->quantity <= 1 ? 'disabled' : '' }}
                                        data-id="{{ $item->product_id }}">-</button>
                                    <input type="text" class="form text-center quantity-input" style="width: 50px;"
                                        value="{{ $item->quantity }}" readonly data-id="{{ $item->product_id }}">
                                    <button class="qtyplus qty-btn"
                                        onclick="update('{{ $item->product_type }}', {{ $item->product_id }}, {{ $item->quantity + 1 }})"
                                        data-id="{{ $item->product_id }}">+</button>
                                </div>

                            </div>
                        </section>
                    @endforeach
                </div>

                {{-- Total Price and Order Button --}}
                <div class="total-price-section d-flex justify-content-between align-items-center mt-4">
                    <h5 class="total-label">Tổng tiền:</h5>
                    <h5 class="total-amount text-danger">{{ number_format($totalPrice, 0, ',', '.') }} đ</h5>
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
        function update(productType, productId, newQuantity) {
            if (newQuantity < 1) {
                alert("Số lượng không thể nhỏ hơn 1");
                return;
            }

            fetch(`/cart/${productType}/${productId}`, {
                    method: 'PATCH',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        quantity: newQuantity
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const quantityInput = document.querySelector(`input.quantity-input[data-id="${productId}"]`);
                        quantityInput.value = newQuantity;
                        const minusButton = document.querySelector(`button.qtyplus[data-id="${productId}"]`);
                        minusButton.disabled = newQuantity <= 1;
                        location.reload();
                    } else {
                        alert(data.error);
                    }
                })
                .catch(error => console.error('Lỗi:', error));
        }

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

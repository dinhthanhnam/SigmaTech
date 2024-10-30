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
                        <section class="cart-item d-flex p-3 border-bottom">
                            <div class="item-image" style="width: 150px;">
                                <img src="https://anphat.com.vn/media/product/75_49891_laptop_asus_rog_strix_g16_g614ji_n4125w__2_.jpg"
                                    alt="{{ $item->name }}">
                                <button class="btn mt-2 delete-btn" onclick="removeItem({{ $item->id }})">
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
                                    <button class="qtyplus qty-btn"
                                        onclick="decreaseQuantity({{ $item->id }})">-</button>
                                    <input type="text" class="form text-center quantity-input" style="width: 50px;"
                                        value="{{ $item->quantity }}" readonly>
                                    <button class="qtyminus qty-btn"
                                        onclick="increaseQuantity({{ $item->id }})">+</button>
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

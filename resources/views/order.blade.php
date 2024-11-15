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
                <li class="breadcrumb-item"><a href="{{ route('cart') }}">
                        Giỏ hàng
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Thông tin đặt hàng</li>
            </ol>
        </div>

        <div class="order-info bg-white p-4">
            <h4 class="text-center mb-4">Thông tin đặt hàng</h4>

            <form action="{{ route('order.place') }}" method="POST">
                @csrf
                <h5 class="mt-4">Thông tin khách mua hàng</h5>

                <div class="mb-3">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="male" value="male"
                            @if (Auth::user()->gender == 1) checked @endif>
                        <label class="form-check-label" for="male">Anh</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="female" value="female"
                            @if (Auth::user()->gender == 0) checked @endif>
                        <label class="form-check-label" for="female">Chị</label>
                    </div>

                </div>

                <div class="mb-3">
                    <label class="form-label">Họ tên</label>
                    <input type="text" name="fullname" class="form-control" value="{{ Auth::user()->name }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Số điện thoại</label>
                    <input type="tel" name="phone" class="form-control" value="{{ Auth::user()->phone }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Địa chỉ giao hàng</label>
                    <input type="text" name="address" class="form-control" rows="2"
                        value="{{ Auth::user()->address }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Lưu ý (không bắt buộc)</label>
                    <input name="note" class="form-control" rows="2"></input>
                </div>

                <h5 class="mt-4">Phương thức thanh toán</h5>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="payment_method" value="cod" id="paymentCOD"
                        checked>
                    <label class="form-check-label" for="paymentCOD">
                        Thanh toán khi nhận hàng
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="payment_method" value="other" id="paymentOther">
                    <label class="form-check-label" for="paymentOther">
                        Khác
                    </label>
                </div>

                <h5 class="mt-4">Thông tin đơn hàng</h5>
                <div class="cart-summary mt-4">
                    <ul class="list-group mb-3">
                        @php
                            $totalPrice = 0;
                        @endphp
                        @foreach ($cartItems as $item)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div class="item-image" style="width: 130px;">
                                    <img src="{{ asset($item->image) }}" alt="{{ $item->name }}">
                                </div>
                                <div class="item-info flex-grow-1 ms-3">
                                    {{ $item->name }} x {{ $item->quantity }}
                                </div>
                                <span class="text-danger fw-bold me-2">
                                    {{ number_format($item->dealprice, 0, ',', '.') }}
                                    đ</span>
                            </li>
                            @php
                                $totalPrice += $item->dealprice * $item->quantity;
                            @endphp
                        @endforeach
                    </ul>

                </div>
                <div class="total-price-section d-flex justify-content-between align-items-center mt-4">
                    <h5 class="total-label">Tổng tiền:</h5>
                    <h5 class="text-danger fw-bold">{{ number_format($totalPrice, 0, ',', '.') }} đ</h5>
                    <input name = "totalPrice" value={{ $totalPrice }} style="display: none">
                </div>
                <div class="custom-order-btn">
                    <button type="submit" class="btn w-100">ĐẶT HÀNG</button>
                </div>
            </form>
        </div>

    </div>
@endsection

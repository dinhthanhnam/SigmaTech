@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/cart.css') }}">
@endpush

@section('content')
    <div class="container">
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
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Ảnh</th>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                            <th>Tổng giá</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $totalPrice = 0; @endphp
                        @foreach ($cartItems as $item)
                            @php $itemTotal = $item->price * $item->quantity; @endphp
                            <tr>
                                <td><img src="{{ $item->image }}" alt="{{ $item->name }}" style="width: 60px;"></td>
                                <td>{{ $item->product_name }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ number_format($item->price, 0, ',', '.') }} đ</td>
                                <td>{{ number_format($itemTotal, 0, ',', '.') }} đ</td>
                            </tr>
                            @php $totalPrice += $itemTotal; @endphp
                        @endforeach
                    </tbody>
                </table>

                <div class="d-flex justify-content-between align-items-center mt-4">
                    <h5>Tổng tiền: <span class="text-danger">{{ number_format($totalPrice, 0, ',', '.') }} đ</span></h5>
                    <a href="" class="btn btn-success">Đặt hàng ngay</a>
                </div>
            @endif
        </div>
    </div>
@endsection

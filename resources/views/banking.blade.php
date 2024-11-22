@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/user_account.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/cart.css') }}">
@endpush

@section('content')
    <div class="order-info bg-white p-4">
        <h4 class="text-center mb-4">Quét mã QR để thanh toán</h4>

        <div class="qr-code text-center">
            <img src="{{ $qrUrl }}" alt="QR Code" class="img-fluid">
        </div>

        {{-- <div class="custom-order-btn">
            <form action="{{ route('order.confirm-payment') }}" method="POST">
                @csrf
                <button type="submit" class="btn w-100">Đã thanh toán cho đơn hàng</button>
            </form>
        </div> --}}

    </div>
@endsection

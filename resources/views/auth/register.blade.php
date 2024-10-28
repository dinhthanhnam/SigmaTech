@extends('layouts.app')

@section('content')
    <div class="container">
        <div aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}">
                        <i class="fa fa-home"></i> Trang chủ
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Đăng ký</li>
            </ol>
        </div>
        <div class="bg-white customer-page">
            <h3 style="text-align: center; padding-top: 30px;">Đăng ký tài khoản SigmaTech</h3>
            <form method="post" action="{{ route('register') }}" style="max-width: 600px; margin: auto;">
                @csrf
                <fieldset style="border: none;" class="shadow cor">
                    <div class="form-group">
                        <label for="name">Họ và tên <b style="color: #ff0000;">*</b></label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="email">Địa chỉ Email <b style="color: #ff0000;">*</b></label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="password">Mật khẩu <b style="color: #ff0000;">*</b></label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Xác nhận mật khẩu <b style="color: #ff0000;">*</b></label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Giới tính</label>
                        <div class="gender-options">
                            <label for="male">
                                <input type="radio" name="gender" value="1" id="male"> Nam
                            </label>
                            <label for="female">
                                <input type="radio" name="gender" value="0" id="female"> Nữ
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="address">Địa chỉ nhận hàng</label>
                        <input type="text" name="address" id="address" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="phone">Điện thoại di động</label>
                        <input type="text" name="phone" id="phone" class="form-control">
                    </div>

                    <div class="form-group">
                        <small style="color: #ff0000;">(*) Thông tin bắt buộc</small>
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary">TẠO TÀI KHOẢN</button>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
    </div>
@endsection

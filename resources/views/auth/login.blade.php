@extends('layouts.app')

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
                <li class="breadcrumb-item active" aria-current="page">Đăng nhập</li>
            </ol>
        </div>
        <div class="bg-white customer-page">
            <h3 style="text-align: center; padding-top: 30px;">Đăng nhập SigmaTech</h3>
            <form action="{{ route('login') }}" method="post" class="login-form bg-white mb-3"
                style="max-width: 600px; margin: auto;">
                @csrf
                <div class="form-group">
                    <label for="email">Email đăng nhập</label>
                    <input id="email" type="email" name="email" class="form-control" required autofocus>
                </div>

                <div class="form-group">
                    <label for="password">Mật khẩu</label>
                    <input id="password" type="password" name="password" class="form-control"
                        autocomplete="current-password">
                </div>

                <div class="form-group">
                    <input type="submit" value="Đăng nhập" class="btn btn-primary">
                    <a href="{{ route('password.request') }}" class="forgot-password">Quên mật khẩu?</a>
                </div>

                <div class="form-group">
                    <a href="#">
                        <img src="{{ asset('assets/img/login/log-in-with-google.jpg') }}" alt="Đăng nhập với Google"
                            class="social-login">
                    </a>
                    <a href="#">
                        <img src="{{ asset('assets/img/login/log-in-with-facebook.jpg') }}" alt="Đăng nhập với Facebook"
                            class="social-login">
                    </a>
                </div>

                <div class="register-info">
                    <p><strong>Bạn chưa là thành viên?</strong> Đăng ký là thành viên để hưởng nhiều lợi ích và đặt mua
                        hàng dễ dàng hơn.</p>
                    <a href="{{ route('register') }}" class="btn btn-link blue">Đăng ký tài khoản</a>
                </div>
            </form>
        </div>
    </div>
@endsection

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

    {{-- Login Form --}}
    <div class="box_common">
      <div class="title_box_center" style="border-color: #546ce8">
        <h1 class="h_title" style="background:#546ce8;padding: 0 20px;border-radius: 0 15px 0px 0;">Đăng nhập</h1>
      </div>

      <form method="POST" action="{{ route('login') }}" class="bg-white mb-3">
        @csrf {{-- Bảo vệ chống tấn công CSRF --}}
        
        {{-- Email --}}
        <div class="form-group mx-5">
          <label for="email" class="mx-2 my-2">Email đăng nhập</label>
          <input type="email" class="form-control" id="email" name="email" required autofocus>
        </div>

        {{-- Password --}}
        <div class="form-group mx-5">
          <label for="password" class="mx-2 my-2">Mật khẩu</label>
          <input type="password" class="form-control" id="password" name="password" required>
        </div>

        {{-- Remember Me --}}
        <div class="form-group form-check mx-5">
          <input type="checkbox" class="form-check-input" id="remember" name="remember">
          <label class="form-check-label" for="remember">Nhớ mật khẩu</label>
        </div>

        {{-- Login Button --}}
        <div class="form-group ml-5 mb-5">
          <button type="submit" class="btn btn-primary">Đăng nhập</button>
          <a href="{{ route('password.request') }}" class="float-right">Quên mật khẩu?</a>
        </div>
      </form>
      {{-- Social Login --}}
      <div class="text-center">
        <a href="" class="btn btn-danger">Đăng nhập bằng Google</a>
        <a href="" class="btn btn-primary">Đăng nhập bằng Facebook</a>
      </div>

      {{-- Register --}}
      <div class="mt-3">
        <p>Bạn chưa là thành viên? <a href="{{ route('register') }}" class="font-weight-bold">Đăng ký tài khoản</a></p>
      </div>
    </div>
  </div>
@endsection

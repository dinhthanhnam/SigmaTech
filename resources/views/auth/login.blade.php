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

    <div class="box_common">
      <div class="title_box_center" style="border-color: #546ce8">
        <h1 class="h_title" style="background:#546ce8;padding: 0 20px;border-radius: 0 15px 0px 0;">Đăng nhập</h1>
      </div>
      <form action="{{ route('login') }}" method="post" class="bg-white mb-3" >
        @csrf 
        <table class="shadow cor" cellspacing="0" cellpadding="6" style="width:100%;">
          <tbody>
            <tr>
              <td style="width: 50%;" id="login_col">
                <div id="login_title" style="padding: 5px 0px 10px; font-size: 13px; color: rgb(88, 88, 88);"><b>Thông tin
                    khách hàng đăng nhập hệ thống</b></div>
                <table cellpadding="5" cellspacing="0" width="80%">
                  <tbody>
                    <tr>
                      <td>Email đăng nhập</td>
                      <td>
                        <input id="email" type="email" size="35" name="email" required autofocus>
                      </td>
                    </tr>
                    <tr>
                      <td>Mật khẩu</td>
                      <td>
                        <input id="password" type="password" size="35" name="password" autocomplete="current-password">
                      </td>
                    </tr>
                    <tr>
                      <td></td>
                      <td>
                        <div style="position: relative;">
                          <input type="submit" value="Đăng nhập">
                          <span style=""><a href=" {{ route('password.request') }}">Quên mật khẩu?</a></span>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td></td>
                      <td>
                        <a href="#"><img src="{{ asset('assets/img/login/log-in-with-google.jpg') }}"
                            alt="" style="display:block; margin:10px 0; margin-right:5px; float:left;"></a>
                        <a href="j#"><img
                            src="{{ asset('assets/img/login/log-in-with-facebook.jpg') }}" alt=""
                            style="display:block; margin:10px 0;"></a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </td>
              <td width="10px">&nbsp;</td>
              <td valign="top" style="line-height: 18px;">
                <div style="padding: 5px 0px 10px; font-size: 13px; color: rgb(88, 88, 88);"><b>Bạn chưa là thành viên</b>
                </div>
                Đăng ký là thành viên để hưởng nhiều lợi ích và đặt mua hàng dễ dàng hơn.
                <p><a title="Click đăng ký tài khoản miễn phí" href="{{ route('register')}}"
                    style="font-weight: bold; text-decoration: none;" class="blue">Đăng ký tài khoản</a></p>
              </td>
            </tr>

          </tbody>
        </table>
      </form>
    </div>
    {{-- <div class="box_common">
      <div class="title_box_center" style="border-color: #546ce8">
        <h1 class="h_title" style="background:#546ce8;padding: 0 20px;border-radius: 0 15px 0px 0;">Đăng nhập</h1>
      </div>

      <form method="POST" action="{{ route('login') }}" class="bg-white mb-3">
        @csrf 
    
        <div class="form-group mx-5">
          <label for="email" class="mx-2 my-2">Email đăng nhập</label>
          <input type="email" class="form-control" id="email" name="email" required autofocus>
        </div>

        <div class="form-group mx-5">
          <label for="password" class="mx-2 my-2">Mật khẩu</label>
          <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <div class="form-group form-check mx-5">
          <input type="checkbox" class="form-check-input" id="remember" name="remember">
          <label class="form-check-label" for="remember">Nhớ mật khẩu</label>
        </div>

        <div class="form-group ml-5 mb-5">
          <button type="submit" class="btn btn-primary">Đăng nhập</button>
          <a href="{{ route('password.request') }}" class="float-right">Quên mật khẩu?</a>
        </div>
      </form>

      <div class="text-center">
        <a href="" class="btn btn-danger">Đăng nhập bằng Google</a>
        <a href="" class="btn btn-primary">Đăng nhập bằng Facebook</a>
      </div>

      <div class="mt-3">
        <p>Bạn chưa là thành viên? <a href="{{ route('register') }}" class="font-weight-bold">Đăng ký tài khoản</a></p>
      </div>
    </div> --}}
  </div>
@endsection

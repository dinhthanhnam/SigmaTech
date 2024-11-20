@extends('layouts.app')

@section('content')
  <div class="container" style="padding-top: 50px; padding-bottom: 50px; min-height: 500px">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card shadow">
            <div class="card-header">{{ __('Xác nhận Email của bạn để tiếp tục') }}</div>

            <div class="card-body">
              @if (session('resent'))
                <div class="alert alert-success" role="alert">
                  {{ __('Một link xác nhận mới đã được gửi đến Email của bạn.') }}
                </div>
              @endif

              {{ __('Trước khi đến với trang mua sắm, bạn cần phải xác thực Email đăng ký của mình.') }}
              {{ __('Nếu chưa nhận được Email xác thực') }},
              <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <button type="submit"
                  class="btn btn-link p-0 m-0 align-baseline">{{ __('vui lòng ấn vào đây để gửi lại') }}</button>.
              </form>
              <div style="padding-top:50px;"><h5>Chào mừng bạn đến với Sigmatech.</h5></div>
              
              <img src="{{ asset('assets/img/sigmatech-big.png')}}" alt="Card Image" class="card-img">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

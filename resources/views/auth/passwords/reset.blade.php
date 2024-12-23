@extends('layouts.app')

@section('content')
  <div class="container" style="padding-top: 50px; padding-bottom: 50px; min-height: 500px">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card shadow">
            <div class="card-header">Đặt lại mật khẩu</div>
            <div class="card-body">
              <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="row mb-3">
                  <label for="email" class="col-md-4 col-form-label text-md-end">Địa chỉ Email</label>
                  <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                      name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="password" class="col-md-4 col-form-label text-md-end">Mật khẩu mới</label>

                  <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                      name="password" required autocomplete="new-password">
                    @error('password')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="password-confirm"
                    class="col-md-4 col-form-label text-md-end">Xác nhận mật khẩu</label>

                  <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                  </div>
                </div>

                <div class="row mb-0">
                  <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                      Đặt lại mật khẩu
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
@endsection

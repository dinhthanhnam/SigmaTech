<div>
  <h2>Đổi mật khẩu</h2>
  <form method="POST" action="{{ route('password.change') }}">
    @csrf
    @if (session('status'))
      <div class="form-group">  
        <div class="alert alert-success text-center"> {{ session('status') }} </div>
      </div>
    @endif
    <div class="form-group">
      <div class="form-row">
        <label for="current_password">Mật khẩu hiện tại</label>
        <input type="password" name="current_password" id="current_password"
          class="form-control @error('current_password') is-invalid @enderror" required>
        @error('current_password')
          <span class="invalid-feedback text-center" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
    </div>
    <div class="form-group">
      <div class="form-row">
        <label for="new_password">Mật khẩu mới</label>
        <input type="password" name="new_password" id="new_password"
          class="form-control @error('new_password') is-invalid @enderror" required>
        @error('new_password')
          <span class="invalid-feedback text-center" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
    </div>
    <div class="form-group">
      <div class="form-row">
        <label for="new_password_confirmation">Xác nhận lại</label>
        <input type="password" name="new_password_confirmation" id="new_password_confirmation"
          class="form-control @error('new_password_confirmation') is-invalid @enderror" required>
        @error('new_password_confirmation')
          <span class="invalid-feedback text-center" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
    </div>
    <div class="form-row">
      <label> </label>
      <button type="submit" class="btn-save">Đổi mật khẩu</button>
    </div>
  </form>
</div>

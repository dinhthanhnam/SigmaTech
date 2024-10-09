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
      <form method="post" action="{{ route('register') }}">
        <fieldset style="border: none;" class="shadow cor">
          <div class="bgg_in_spm"></div>
          <table width="100%" id="register">
            <tbody>
              <tr>
                <td valign="top">
                  <table cellpadding="4" cellspacing="0" id="tb_register" style="width: 100%;">
                    <tbody>
                      <tr>
                        <td width="150px">Địa chỉ Email</td>
                        <td>
                          <input type="text" name="email" id="email" class="boxInput" size="20">
                          <b style="color: #ff0000;">*</b> 
                        </td>
                      </tr>
                      <tr>
                        <td>Mật khẩu</td>
                        <td>
                          <input type="password" name="password" id="password" class="boxInput" size="20">
                          <b style="color: #ff0000;">*</b> 
                          <span class="explain"></span>
                        </td>
                      </tr>
                      <tr>
                        <td>Nhập lại mật khẩu</td>
                        <td>
                          <input type="password" name="password1" id="password1" class="boxInput" size="20">
                          <b style="color: #ff0000;">*</b>
                          <span class="explain"></span>
                        </td>
                      </tr>
                      <tr>
                        <td>Họ và tên</td>
                        <td>
                          <input type="text" name="name" id="name" class="boxInput" size="40">
                          <b style="color: #ff0000;">*</b>
                        </td>
                      </tr>
                      <tr>
                        <td>Giới tính</td>
                        <td>
                          <input type="radio" checked="checked" name="gender" value="1">Nam 
                          <input type="radio" name="gender" value="0">Nữ
                        </td>
                      </tr>
                      <tr>
                        <td>Tỉnh/Tp</td>
                        <td>
                          <select name="info[province]">

                            <option value="1">Hà Nội</option>

                            <option value="2">TP HCM</option>

                            <option value="5">Hải Phòng</option>

                            <option value="4">Đà Nẵng</option>

                            <option value="6">An Giang</option>

                            <option value="7">Bà Rịa-Vũng Tàu</option>

                            <option value="13">Bình Dương</option>

                            <option value="15">Bình Phước</option>

                            <option value="16">Bình Thuận</option>

                            <option value="14">Bình Định</option>

                            <option value="8">Bạc Liêu</option>

                            <option value="10">Bắc Giang</option>

                            <option value="9">Bắc Kạn</option>

                            <option value="11">Bắc Ninh</option>

                            <option value="12">Bến Tre</option>

                            <option value="18">Cao Bằng</option>

                            <option value="17">Cà Mau</option>

                            <option value="3">Cần Thơ</option>

                            <option value="24">Gia Lai</option>

                            <option value="25">Hà Giang</option>

                            <option value="26">Hà Nam</option>

                            <option value="27">Hà Tĩnh</option>

                            <option value="30">Hòa Bình</option>

                            <option value="28">Hải Dương</option>

                            <option value="29">Hậu Giang</option>

                            <option value="31">Hưng Yên</option>

                            <option value="32">Khánh Hòa</option>

                            <option value="33">Kiên Giang</option>

                            <option value="34">Kon Tum</option>

                            <option value="35">Lai Châu</option>

                            <option value="38">Lào Cai</option>

                            <option value="36">Lâm Đồng</option>

                            <option value="37">Lạng Sơn</option>

                            <option value="39">Long An</option>

                            <option value="40">Nam Định</option>

                            <option value="41">Nghệ An</option>

                            <option value="42">Ninh Bình</option>

                            <option value="43">Ninh Thuận</option>

                            <option value="44">Phú Thọ</option>

                            <option value="45">Phú Yên</option>

                            <option value="46">Quảng Bình</option>

                            <option value="47">Quảng Nam</option>

                            <option value="48">Quảng Ngãi</option>

                            <option value="49">Quảng Ninh</option>

                            <option value="50">Quảng Trị</option>

                            <option value="51">Sóc Trăng</option>

                            <option value="52">Sơn La</option>

                            <option value="53">Tây Ninh</option>

                            <option value="56">Thanh Hóa</option>

                            <option value="54">Thái Bình</option>

                            <option value="55">Thái Nguyên</option>

                            <option value="57">Thừa Thiên-Huế</option>

                            <option value="58">Tiền Giang</option>

                            <option value="59">Trà Vinh</option>

                            <option value="60">Tuyên Quang</option>

                            <option value="61">Vĩnh Long</option>

                            <option value="62">Vĩnh Phúc</option>

                            <option value="63">Yên Bái</option>

                            <option value="19">Đắk Lắk</option>

                            <option value="22">Đồng Nai</option>

                            <option value="23">Đồng Tháp</option>

                            <option value="21">Điện Biên</option>

                            <option value="20">Đăk Nông</option>

                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td>Địa chỉ nhận hàng</td>
                        <td>
                          <input type="text" name="address" id="address" class="boxInput" size="50">
                        </td>
                      </tr>
                      <tr>
                        <td>Điện thoại di động</td>
                        <td>
                          <input type="text" name="phonenumber" id="phonenumber" class="boxInput" size="40">
                        </td>
                      </tr>
                      <tr>
                        <td>
                          (*) Thông tin bắt buộc
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <input type="submit" value="Đăng ký" class="btn_red">
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </td>
              </tr>
            </tbody>
          </table>
        </fieldset>
      </form>
    </div>
  </div>
@endsection

@push('scripts')
  {{-- script cùi chưa dùng được, handle lại --}}
  <script type="text/javascript">
    function check_user_email(email) {
      $('#check_user').html("... đang kiểm tra");
      $.post("/ajax/check_user.php", {
        action: 'check-email',
        email: email
      }, function(data) {
        $('#check_user').html(data);
        console.log("data user name:" + data);
      });
    }

    function check_user_captcha(captcha) {
      $('#check_user2').html("... đang kiểm tra");
      $.post("/ajax/check_user.php", {
        action: 'check-captcha',
        captcha: captcha
      }, function(data) {
        $('#check_user2').html(data);
      });
    }

    function check_field() {
      var error = "";
      var email = document.getElementById('email').value;
      if (email.length < 4) error += "- Bạn chưa nhập email\n";
      var password = document.getElementById('password').value;
      if (password.length < 5) error += "- Bạn chưa nhập mật khẩu\n";
      var password1 = document.getElementById('password1').value;
      if (password != password1) error += "- Mật khẩu nhập lại không chính xác\n";
      var full_name = document.getElementById('full_name').value;
      if (full_name.length < 3) error += "- Bạn chưa nhập tên";

      var mobile = document.getElementById('mobile').value;
      if (mobile.length <= 6) {
        error += "- Điện thoại không hợp lệ\n";
      }

      if (error != "") {
        alert(error);
        return false;
      }
      return true;
    }
  </script>
@endpush

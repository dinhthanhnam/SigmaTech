@extends('layouts.app')

@section('content')
<div class="container">
    <div id="breadcrumb">
        <ol class="ul clearfix" itemscope="" itemtype="http://schema.org/BreadcrumbList">
            <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                <a href="/" itemprop="item" class="nopad-l">
                    <span itemprop="name"><i class="fa fa-home"></i> <span style="font-size: 0px">trang
                            chủ</span></span>
                </a>
                <meta itemprop="position" content="1">
            </li>

            <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                <a href="" itemprop="item" class="nopad-l">
                    <span itemprop="name">
                        <h1>Đăng ký</h1>
                    </span>
                </a>
                <meta itemprop="position" content="2">
            </li>
        </ol>
    </div>
    
    <div class="bg-white customer-page">
        <form method="post" action="/ajax/customer_register.php" enctype="multipart/form-data" onsubmit="return check_field();" data-gtm-form-interact-id="0">
            <fieldset style="border: none;" class="shadow cor">
                <div class="bgg_in_spm"></div>
                <table width="100%" id="register">
                  <tbody><tr>
                    <td valign="top">

                      <table cellpadding="4" cellspacing="0" id="tb_register" style="width: 100%;">
                        <tbody><tr>
                          <td width="150px">Địa chỉ Email</td>
                          <td>
                            <input type="text" name="info[email]" id="email" class="boxInput" size="20" value="" onkeyup="check_user_email(this.value)" data-gtm-form-interact-field-id="0"><b style="color: #ff0000;">*</b>
                            <span id="check_user">Email thanhnamak@gmail.com đã được đăng ký ở tài khoản khác</span>
                          </td>
                        </tr>
                        <tr>
                          <td>Mật khẩu</td>
                          <td><input type="password" name="info[password]" id="password" class="boxInput" size="20" data-gtm-form-interact-field-id="1"> <b style="color: #ff0000;">*</b> <span class="explain"></span></td>
                        </tr>
                        <tr>
                          <td>Nhập lại mật khẩu</td>
                          <td><input type="password" name="password1" id="password1" class="boxInput" size="20"><b style="color: #ff0000;">*</b> <span class="explain"></span></td>
                        </tr>

                        <!--
                        <tr>
                          <td>Ảnh đại diện (nếu có)</td>
                          <td><input type="file" name="avatar" id="avatar" class="boxInput" size="40"  value=""/> (dung lượng file tối đa 100KB, ảnh PJG hoặc GIF)</td>
                        </tr>
                        -->
                        <tr>
                          <td>Họ và tên</td>
                          <td><input type="text" name="info[name]" id="full_name" class="boxInput" size="40" value=""><b style="color: #ff0000;">*</b></td>
                        </tr>
                        <tr>
                          <td>Giới tính</td>
                          <td>
                            <input type="radio" checked="checked" name="info[gender]" value="male">Nam <input type="radio" name="info[gender]" value="female">Nữ
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
                          <td><input type="text" name="info[address]" id="address" class="boxInput" size="50" value=""></td>
                        </tr>

                        <tr>
                          <td>Điện thoại di động</td>
                          <td><input type="text" name="info[mobile]" id="mobile" class="boxInput" size="40" value=""></td>
                        </tr>

                        <!--<tr>
                          <td>Mã bảo mật</td>
                          <td>
                            <span id="check_user2" style="color: #ff0000;"></span><br/>
                            <img id="captchaimg" src="/includes/captcha/captcha.php?v=" /><br />
                            <input type="text" size="10" name="register_captcha" onkeyup="check_user_captcha(this.value)"/>  (<a id="change-image" onclick="document.getElementById('captchaimg').src='/includes/captcha/captcha.php?'+Math.random();" href="javascript:;">Xem mã khác</a>)
                          </td>
                        </tr>-->

                        <tr>
                          <td></td>
                          <td>
                            (*) Thông tin bắt buộc

                          </td>
                        </tr>

                        <tr>
                          <td></td>
                          <td>
                            <input type="hidden" name="return_url" value="https://www.anphatpc.com.vn/dang-ky">
                            <input type="submit" value="Đăng ký" class="btn_red">
                          </td>
                        </tr>
                      </tbody></table>
                    </td>

                  </tr>
                </tbody></table>
            </fieldset>
        </form>
    </div>

      
      <script type="text/javascript">
        function check_user_email(email){
          $('#check_user').html("... đang kiểm tra");
          $.post("/ajax/check_user.php", {action : 'check-email', email : email}, function(data){
            $('#check_user').html(data);
            console.log("data user name:" + data);
          });
        }

        function check_user_captcha(captcha){
          $('#check_user2').html("... đang kiểm tra");
          $.post("/ajax/check_user.php", {action : 'check-captcha', captcha : captcha}, function(data){ $('#check_user2').html(data); });
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
          if (mobile.length <= 6){
            error += "- Điện thoại không hợp lệ\n";
          }

          if (error != "") {
            alert(error);
            return false;
          }
          return true;
        }
      </script> 

    </div>

@endsection
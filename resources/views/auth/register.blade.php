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
        @csrf
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
                        <td>Xác nhận mật khẩu</td>
                        <td>
                          <input type="password" name="password_confirmation" id="password_confirmation" class="boxInput" size="20">
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
                          <input type="radio" name="gender" value="1">Nam
                          <input type="radio" name="gender" value="0">Nữ
                        </td>
                      </tr>
                      <tr>
                        <td>Tỉnh/Tp</td>
                        <td>
                          <select name="province">

                            <option value="Hà Nội">Hà Nội</option>

                            <option value="TP HCM">TP HCM</option>

                            <option value="Hải Phòng">Hải Phòng</option>

                            <option value="Đà Nẵng">Đà Nẵng</option>

                            <option value="An Giang">An Giang</option>

                            <option value="Bà Rịa-Vũng Tàu">Bà Rịa-Vũng Tàu</option>

                            <option value="Bình Dương">Bình Dương</option>

                            <option value="Bình Phước">Bình Phước</option>

                            <option value="Bình Thuận">Bình Thuận</option>

                            <option value="Bình Định">Bình Định</option>

                            <option value="Bạc Liêu">Bạc Liêu</option>

                            <option value="Bắc Giang">Bắc Giang</option>

                            <option value="Bắc Kạn">Bắc Kạn</option>

                            <option value="Bắc Ninh">Bắc Ninh</option>

                            <option value="Bến Tre">Bến Tre</option>

                            <option value="Cao Bằng">Cao Bằng</option>

                            <option value="Cà Mau">Cà Mau</option>

                            <option value="Cần Thơ">Cần Thơ</option>

                            <option value="Gia Lai">Gia Lai</option>

                            <option value="Hà Giang">Hà Giang</option>

                            <option value="Hà Nam">Hà Nam</option>

                            <option value="Hà Tĩnh">Hà Tĩnh</option>

                            <option value="Hòa Bình">Hòa Bình</option>

                            <option value="Hải Dương">Hải Dương</option>

                            <option value="Hậu Giang">Hậu Giang</option>

                            <option value="Hưng Yên">Hưng Yên</option>

                            <option value="Khánh Hòa">Khánh Hòa</option>

                            <option value="Kiên Giang">Kiên Giang</option>

                            <option value="Kon Tum">Kon Tum</option>

                            <option value="Lai Châu">Lai Châu</option>

                            <option value="Lào Cai">Lào Cai</option>

                            <option value="Lâm Đồng">Lâm Đồng</option>

                            <option value="Lạng Sơn">Lạng Sơn</option>

                            <option value="Long An">Long An</option>

                            <option value="Nam Địn">Nam Định</option>

                            <option value="Nghệ An">Nghệ An</option>

                            <option value="Ninh Bình">Ninh Bình</option>

                            <option value="Ninh Thuận">Ninh Thuận</option>

                            <option value="Phú Thọ">Phú Thọ</option>

                            <option value="Phú Yên">Phú Yên</option>

                            <option value="Quảng Bình">Quảng Bình</option>

                            <option value="Quảng Nam">Quảng Nam</option>

                            <option value="Quảng Ngãi">Quảng Ngãi</option>

                            <option value="Quảng Ninh">Quảng Ninh</option>

                            <option value="Quảng Trị">Quảng Trị</option>

                            <option value="Sóc Trăng">Sóc Trăng</option>

                            <option value="Sơn La">Sơn La</option>

                            <option value="Tây Ninh">Tây Ninh</option>

                            <option value="Thanh Hóa">Thanh Hóa</option>

                            <option value="Thái Bình">Thái Bình</option>

                            <option value="Thái Nguyên">Thái Nguyên</option>

                            <option value="Thừa Thiên-Huế">Thừa Thiên-Huế</option>

                            <option value="Tiền Giang">Tiền Giang</option>

                            <option value="Trà Vinh">Trà Vinh</option>

                            <option value="Tuyên Quang">Tuyên Quang</option>

                            <option value="Vĩnh Long">Vĩnh Long</option>

                            <option value="Vĩnh Phúc">Vĩnh Phúc</option>

                            <option value="Yên Bái">Yên Bái</option>

                            <option value="Đắk Lắk">Đắk Lắk</option>

                            <option value="Đồng Nai">Đồng Nai</option>

                            <option value="Đồng Tháp">Đồng Tháp</option>

                            <option value="Điện Biên">Điện Biên</option>

                            <option value="Đăk Nôn">Đăk Nông</option>

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
                          <input type="text" name="phone" id="phone" class="boxInput" size="40">
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


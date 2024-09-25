@extends('layouts.app')

@section('login')
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
                            <h1>Đăng nhập</h1>
                        </span>
                    </a>
                    <meta itemprop="position" content="2">
                </li>
            </ol>
        </div>

        <div class="box_common">
            <div class="title_box_center" style="border-color: #546ce8">
                <h1 class="h_title" style="background:#546ce8;padding: 0 20px;border-radius: 0 15px 0px 0;">Đăng nhập</h1>
            </div>
            <form action="/ajax/customer_login.php" method="post" name="loginForm" enctype="multipart/form-data"
                class="bg-white mb-3" data-gtm-form-interact-id="0">
                <!--important-->
                <input type="hidden" name="return_url" id="return_url" value="">
                <input type="hidden" name="store_id" value="">
                <input type="hidden" name="secure_key" value="a6e2b6573ae32e67b6ee618004f5f1ad">

                <table class="shadow cor" cellspacing="0" cellpadding="6" style="width:100%;">
                    <tbody>
                        <tr>
                            <td style="width: 50%;" id="login_col">


                                <div id="login_title"
                                    style="padding: 5px 0px 10px; font-size: 13px; color: rgb(88, 88, 88);"><b>Thông tin
                                        khách hàng đăng nhập hệ thống</b></div>


                                <input type="hidden" name="login" id="login" value="yes">
                                <table cellpadding="5" cellspacing="0" width="80%">
                                    <tbody>
                                        <tr>
                                            <td>Email đăng nhập</td>
                                            <td><input type="text" size="35" name="email" id="email"
                                                    data-gtm-form-interact-field-id="0"></td>
                                        </tr>
                                        <tr>
                                            <td>Mật khẩu</td>
                                            <td><input type="password" size="35" name="password" id="password"
                                                    data-gtm-form-interact-field-id="1"></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <div style="position: relative;">
                                                    <input type="submit" value="Đăng nhập" class="btn_red">
                                                    <span style=""><a href="/quen-mat-khau">Quên mật khẩu</a></span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <a href="javascript:open_oauth('Google')"><img
                                                        src="/template/2024/images/log-in-with-google.jpg" alt=""
                                                        style="display:block; margin:10px 0; margin-right:5px; float:left;"></a>
                                                <a href="javascript:open_oauth('Facebook')"><img
                                                        src="/template/2024/images/log-in-with-facebook.jpg" alt=""
                                                        style="display:block; margin:10px 0;"></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                            </td>
                            <td width="10px">&nbsp;</td>
                            <td valign="top" style="line-height: 18px;">


                                <div style="padding: 5px 0px 10px; font-size: 13px; color: rgb(88, 88, 88);"><b>Bạn chưa là
                                        thành viên</b></div>
                                Đăng ký là thành viên để hưởng nhiều lợi ích và đặt mua hàng dễ dàng hơn.
                                <p><a title="Click đăng ký tài khoản miễn phí" href="/dang-ky"
                                        style="font-weight: bold; text-decoration: none;" class="blue">Đăng ký tài
                                        khoản</a></p>


                            </td>
                        </tr>

                    </tbody>
                </table>

            </form>
        </div>

    </div>
@endsection

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
                            <h1>Chính sách Giao hàng</h1>
                        </span>
                    </a>
                    <meta itemprop="position" content="2">
                </li>
            </ol>
        </div>

        <div id="static-page">
            <div class="left-side">
                <div class="static-page-box-left">
                    <div class="title-box">Thông tin chung</div>
                    <div class="content-box">
                        <a href="{{ route('pages.shipping-policy') }}">Chính sách giao hàng</a>
                        <a href="{{ route('pages.warranty-policy') }} ">Bảo hành - đổi trả</a>
                    </div>
                </div>
            </div>

            <div class="right-side">
                <h1 class="title-page">Chính sách Giao hàng</h1>
                <div class="divtin">
                    <div>
                        <h1 style="text-align: center;"><span
                                style="color: #0000ff; font-family: arial, helvetica, sans-serif; font-size: 12pt;">CHÍNH
                                SÁCH VẬN CHUYỂN HÀNG HÓA</span></h1>
                        <p><span style="font-family: arial, helvetica, sans-serif; font-size: 12pt;"><img
                                    style="display: block; margin-left: auto; margin-right: auto;"
                                    src="{{ asset('assets/img/policy/chinh-sach-van-chuyen-hang-hoa-1331x911-2.jpg') }}"
                                    alt="" width="NaN" height="NaN"></span></p>
                        <h3 style="text-align: center;"><span
                                style="color: #0000ff; font-family: arial, helvetica, sans-serif; font-size: 12pt;">BẢNG GIÁ
                                DỊCH VỤ VẬN CHUYỂN HÀNG HÓA</span></h3>
                    </div>
                    <div><span style="font-family: arial, helvetica, sans-serif; font-size: 12pt;"><span
                                style="font-family: arial, helvetica, sans-serif;">&nbsp;</span></span>
                        <table border="1" width="100%">
                            <tbody>
                                <tr style="height: 38.25pt;">
                                    <td style="font-family: Roboto, RobotoDraft, Helvetica, Arial, sans-serif; margin: 0px; width: 113pt; border: 1pt solid black; padding: 0in 5.4pt; height: 38.25pt;"
                                        width="151">
                                        <p style="margin: 0px; text-align: center;"><span
                                                style="font-size: 12pt;"><strong><span
                                                        style="font-family: Arial, sans-serif; color: #222222;">Theo giá trị
                                                        đơn hàng</span></strong></span></p>
                                    </td>
                                    <td style="font-family: Roboto, RobotoDraft, Helvetica, Arial, sans-serif; margin: 0px; width: 161pt; border-top: 1pt solid black; border-right: 1pt solid black; border-bottom: 1pt solid black; border-left: none; padding: 0in 5.4pt; height: 38.25pt;"
                                        width="215">
                                        <p style="margin: 0px; text-align: center;"><span
                                                style="font-size: 12pt;"><strong><span
                                                        style="font-family: Arial, sans-serif; color: #222222;">Số Km được
                                                        Miễn Phí</span></strong></span></p>
                                    </td>
                                    <td style="font-family: Roboto, RobotoDraft, Helvetica, Arial, sans-serif; margin: 0px; width: 151pt; border-top: 1pt solid black; border-right: 1pt solid black; border-bottom: 1pt solid black; border-left: none; padding: 0in 5.4pt; height: 38.25pt;"
                                        width="201">
                                        <p style="margin: 0px; text-align: center;"><span
                                                style="font-size: 12pt;"><strong><span
                                                        style="font-family: Arial, sans-serif; color: #222222;">Thời gian
                                                        đáp ứng</span></strong></span></p>
                                    </td>
                                    <td style="font-family: Roboto, RobotoDraft, Helvetica, Arial, sans-serif; margin: 0px; width: 128pt; border-top: 1pt solid black; border-right: 1pt solid black; border-bottom: 1pt solid black; border-left: none; padding: 0in 5.4pt; height: 38.25pt;"
                                        width="171">
                                        <p style="margin: 0px; text-align: center;"><span
                                                style="font-size: 12pt;"><strong><span
                                                        style="font-family: Arial, sans-serif; color: #222222;">Thu
                                                        phí</span></strong></span></p>
                                    </td>
                                </tr>
                                <tr style="height: 25.5pt;">
                                    <td style="font-family: Roboto, RobotoDraft, Helvetica, Arial, sans-serif; margin: 0px; width: 113pt; border-right: 1pt solid black; border-bottom: 1pt solid black; border-left: 1pt solid black; border-top: none; padding: 0in 5.4pt; height: 25.5pt;"
                                        rowspan="3" width="151">
                                        <p style="margin: 0px; text-align: center;"><span
                                                style="font-family: Arial, sans-serif; color: #222222; font-size: 12pt;">Từ
                                                200.000đ đến 500.000đ</span></p>
                                    </td>
                                    <td style="font-family: Roboto, RobotoDraft, Helvetica, Arial, sans-serif; margin: 0px; width: 161pt; border-top: none; border-left: none; border-bottom: 1pt solid black; border-right: 1pt solid black; padding: 0in 5.4pt; height: 25.5pt;"
                                        rowspan="3" width="215">
                                        <p style="margin: 0px; text-align: center;"><span
                                                style="font-family: Arial, sans-serif; color: #222222; font-size: 12pt;">&nbsp;</span>
                                        </p>
                                    </td>
                                    <td style="font-family: Roboto, RobotoDraft, Helvetica, Arial, sans-serif; margin: 0px; width: 151pt; border-top: none; border-left: none; border-bottom: 1pt solid black; border-right: 1pt solid black; padding: 0in 5.4pt; height: 25.5pt;"
                                        rowspan="3" width="201">
                                        <p style="margin: 0px; text-align: center;"><span
                                                style="font-family: Arial, sans-serif; color: black; font-size: 12pt;">Giao
                                                trong ngày</span></p>
                                    </td>
                                    <td style="font-family: Roboto, RobotoDraft, Helvetica, Arial, sans-serif; margin: 0px; width: 128pt; border-top: none; border-bottom: none; border-left: none; border-right: 1pt solid black; padding: 0in 5.4pt; height: 25.5pt;"
                                        width="171">
                                        <p style="margin: 0px; text-align: center;"><span
                                                style="font-family: Arial, sans-serif; color: black; font-size: 12pt;">30.000đ
                                                /1 lần giao (trong vòng 10km)</span></p>
                                    </td>
                                </tr>
                                <tr style="height: 15pt;">
                                    <td style="font-family: Roboto, RobotoDraft, Helvetica, Arial, sans-serif; margin: 0px; width: 128pt; border-top: none; border-bottom: none; border-left: none; border-right: 1pt solid black; padding: 0in 5.4pt; height: 15pt;"
                                        width="171">
                                        <p style="margin: 0px; text-align: center;"><span
                                                style="font-family: Arial, sans-serif; color: black; font-size: 12pt;">&nbsp;</span>
                                        </p>
                                    </td>
                                </tr>
                                <tr style="height: 25.5pt;">
                                    <td style="font-family: Roboto, RobotoDraft, Helvetica, Arial, sans-serif; margin: 0px; width: 128pt; border-top: none; border-left: none; border-bottom: 1pt solid black; border-right: 1pt solid black; padding: 0in 5.4pt; height: 25.5pt;"
                                        width="171">
                                        <p style="margin: 0px; text-align: center;"><span
                                                style="font-family: Arial, sans-serif; color: #222222; font-size: 12pt;">Từ
                                                km thứ 11 thu phí 6.000/km .</span></p>
                                    </td>
                                </tr>
                                <tr style="height: 43.5pt;">
                                    <td style="font-family: Roboto, RobotoDraft, Helvetica, Arial, sans-serif; margin: 0px; width: 113pt; border-right: 1pt solid black; border-bottom: 1pt solid black; border-left: 1pt solid black; border-top: none; padding: 0in 5.4pt; height: 43.5pt;"
                                        width="151">
                                        <p style="margin: 0px; text-align: center;"><span
                                                style="font-family: Arial, sans-serif; color: #222222; font-size: 12pt;">Trên
                                                500.000đ</span></p>
                                    </td>
                                    <td style="font-family: Roboto, RobotoDraft, Helvetica, Arial, sans-serif; margin: 0px; width: 161pt; border-top: none; border-left: none; border-bottom: 1pt solid black; border-right: 1pt solid black; padding: 0in 5.4pt; height: 43.5pt;"
                                        width="215">
                                        <p style="margin: 0px; text-align: center;"><span
                                                style="font-family: Arial, sans-serif; color: #222222; font-size: 12pt;">10km</span>
                                        </p>
                                    </td>
                                    <td style="font-family: Roboto, RobotoDraft, Helvetica, Arial, sans-serif; margin: 0px; width: 151pt; border-top: none; border-left: none; border-bottom: 1pt solid black; border-right: 1pt solid black; padding: 0in 5.4pt; height: 43.5pt;"
                                        width="201">
                                        <p style="margin: 0px; text-align: center;"><span
                                                style="font-family: Arial, sans-serif; color: #222222; font-size: 12pt;">Giao
                                                hàng trong 4h</span></p>
                                    </td>
                                    <td style="font-family: Roboto, RobotoDraft, Helvetica, Arial, sans-serif; margin: 0px; width: 128pt; border-top: none; border-left: none; border-bottom: 1pt solid black; border-right: 1pt solid black; padding: 0in 5.4pt; height: 43.5pt;"
                                        width="171">
                                        <p style="margin: 0px; text-align: center;"><span
                                                style="font-family: Arial, sans-serif; color: #222222; font-size: 12pt;">Từ
                                                km thứ 11 thu phí 6.000/km.</span></p>
                                    </td>
                                </tr>
                                <tr style="height: 38.25pt;">
                                    <td style="font-family: Roboto, RobotoDraft, Helvetica, Arial, sans-serif; margin: 0px; width: 113pt; border-right: 1pt solid black; border-bottom: 1pt solid black; border-left: 1pt solid black; border-top: none; padding: 0in 5.4pt; height: 38.25pt;"
                                        width="151">
                                        <p style="margin: 0px; text-align: center;"><span
                                                style="font-family: Arial, sans-serif; color: #222222; font-size: 12pt;">Trên
                                                3 triệu đồng</span></p>
                                    </td>
                                    <td style="font-family: Roboto, RobotoDraft, Helvetica, Arial, sans-serif; margin: 0px; width: 161pt; border-top: none; border-left: none; border-bottom: 1pt solid black; border-right: 1pt solid black; padding: 0in 5.4pt; height: 38.25pt;"
                                        width="215">
                                        <p style="margin: 0px; text-align: center;"><span
                                                style="font-family: Arial, sans-serif; color: #222222; font-size: 12pt;">20km</span>
                                        </p>
                                    </td>
                                    <td style="font-family: Roboto, RobotoDraft, Helvetica, Arial, sans-serif; margin: 0px; width: 151pt; border-top: none; border-left: none; border-bottom: 1pt solid black; border-right: 1pt solid black; padding: 0in 5.4pt; height: 38.25pt;"
                                        width="201">
                                        <p style="margin: 0px; text-align: center;"><span
                                                style="font-family: Arial, sans-serif; color: #222222; font-size: 12pt;">Giao
                                                hàng trong 4h</span></p>
                                    </td>
                                    <td style="font-family: Roboto, RobotoDraft, Helvetica, Arial, sans-serif; margin: 0px; width: 128pt; border-top: none; border-left: none; border-bottom: 1pt solid black; border-right: 1pt solid black; padding: 0in 5.4pt; height: 38.25pt;"
                                        width="171">
                                        <p style="margin: 0px; text-align: center;"><span
                                                style="font-family: Arial, sans-serif; color: #222222; font-size: 12pt;">Từ
                                                km thứ 21 thu phí 6.000/km (chở hàng bằng ô tô thu phí 10.000đ/km).</span>
                                        </p>
                                    </td>
                                </tr>
                                <tr style="height: 46.5pt;">
                                    <td style="font-family: Roboto, RobotoDraft, Helvetica, Arial, sans-serif; margin: 0px; width: 113pt; border-right: 1pt solid black; border-bottom: 1pt solid black; border-left: 1pt solid black; border-top: none; padding: 0in 5.4pt; height: 46.5pt;"
                                        width="151">
                                        <p style="margin: 0px; text-align: center;"><span
                                                style="font-family: Arial, sans-serif; color: #222222; font-size: 12pt;">Trên
                                                10 triệu đồng</span></p>
                                    </td>
                                    <td style="font-family: Roboto, RobotoDraft, Helvetica, Arial, sans-serif; margin: 0px; width: 161pt; border-top: none; border-left: none; border-bottom: 1pt solid black; border-right: 1pt solid black; padding: 0in 5.4pt; height: 46.5pt;"
                                        width="215">
                                        <p style="margin: 0px; text-align: center;"><span
                                                style="font-family: Arial, sans-serif; color: #222222; font-size: 12pt;">30km</span>
                                        </p>
                                    </td>
                                    <td style="font-family: Roboto, RobotoDraft, Helvetica, Arial, sans-serif; margin: 0px; width: 151pt; border-top: none; border-left: none; border-bottom: 1pt solid black; border-right: 1pt solid black; padding: 0in 5.4pt; height: 46.5pt;"
                                        width="201">
                                        <p style="margin: 0px; text-align: center;"><span
                                                style="font-family: Arial, sans-serif; color: #222222; font-size: 12pt;">Giao
                                                hàng trong 4h</span></p>
                                    </td>
                                    <td style="font-family: Roboto, RobotoDraft, Helvetica, Arial, sans-serif; margin: 0px; width: 128pt; border-top: none; border-left: none; border-bottom: 1pt solid black; border-right: 1pt solid black; padding: 0in 5.4pt; height: 46.5pt;"
                                        width="171">
                                        <p style="margin: 0px; text-align: center;"><span
                                                style="font-family: Arial, sans-serif; color: #222222; font-size: 12pt;">Từ
                                                km thứ 31 thu phí 6.000/km (chở hàng bằng ô tô thu phí 10.000đ/km).</span>
                                        </p>
                                    </td>
                                </tr>
                                <tr style="height: 38.25pt;">
                                    <td style="font-family: Roboto, RobotoDraft, Helvetica, Arial, sans-serif; margin: 0px; width: 113pt; border-right: 1pt solid black; border-bottom: 1pt solid black; border-left: 1pt solid black; border-top: none; padding: 0in 5.4pt; height: 38.25pt;"
                                        width="151">
                                        <p style="margin: 0px; text-align: center;"><span
                                                style="font-family: Arial, sans-serif; color: #222222; font-size: 12pt;">Trên
                                                50 triệu đồng</span></p>
                                    </td>
                                    <td style="font-family: Roboto, RobotoDraft, Helvetica, Arial, sans-serif; margin: 0px; width: 161pt; border-top: none; border-left: none; border-bottom: 1pt solid black; border-right: 1pt solid black; padding: 0in 5.4pt; height: 38.25pt;"
                                        width="215">
                                        <p style="margin: 0px; text-align: center;"><span
                                                style="font-family: Arial, sans-serif; color: #222222; font-size: 12pt;">40km</span>
                                        </p>
                                    </td>
                                    <td style="font-family: Roboto, RobotoDraft, Helvetica, Arial, sans-serif; margin: 0px; width: 151pt; border-top: none; border-left: none; border-bottom: 1pt solid black; border-right: 1pt solid black; padding: 0in 5.4pt; height: 38.25pt;"
                                        width="201">
                                        <p style="margin: 0px; text-align: center;"><span
                                                style="font-family: Arial, sans-serif; color: #222222; font-size: 12pt;">Theo
                                                thỏa thuận với khách hàng</span></p>
                                    </td>
                                    <td style="font-family: Roboto, RobotoDraft, Helvetica, Arial, sans-serif; margin: 0px; width: 128pt; border-top: none; border-left: none; border-bottom: 1pt solid black; border-right: 1pt solid black; padding: 0in 5.4pt; height: 38.25pt;"
                                        width="171">
                                        <p style="margin: 0px; text-align: center;"><span
                                                style="font-family: Arial, sans-serif; color: #222222; font-size: 12pt;">Từ
                                                km thứ 41 thu phí 10.000/km hoặc theo tư vấn từ nhân viên bán hàng.</span>
                                        </p>
                                    </td>
                                </tr>
                                <tr style="height: 38.25pt;">
                                    <td style="font-family: Roboto, RobotoDraft, Helvetica, Arial, sans-serif; margin: 0px; width: 113pt; border-right: 1pt solid black; border-bottom: 1pt solid black; border-left: 1pt solid black; border-top: none; padding: 0in 5.4pt; height: 38.25pt;"
                                        width="151">
                                        <p style="margin: 0px; text-align: center;"><span
                                                style="font-family: Arial, sans-serif; color: #222222; font-size: 12pt;">Trên
                                                100 triệu đồng</span></p>
                                    </td>
                                    <td style="font-family: Roboto, RobotoDraft, Helvetica, Arial, sans-serif; margin: 0px; width: 161pt; border-top: none; border-left: none; border-bottom: 1pt solid black; border-right: 1pt solid black; padding: 0in 5.4pt; height: 38.25pt;"
                                        width="215">
                                        <p style="margin: 0px; text-align: center;"><span
                                                style="font-family: Arial, sans-serif; color: #222222; font-size: 12pt;">100km</span>
                                        </p>
                                    </td>
                                    <td style="font-family: Roboto, RobotoDraft, Helvetica, Arial, sans-serif; margin: 0px; width: 151pt; border-top: none; border-left: none; border-bottom: 1pt solid black; border-right: 1pt solid black; padding: 0in 5.4pt; height: 38.25pt;"
                                        width="201">
                                        <p style="margin: 0px; text-align: center;"><span
                                                style="font-family: Arial, sans-serif; color: #222222; font-size: 12pt;">Theo
                                                thỏa thuận với khách hàng</span></p>
                                    </td>
                                    <td style="font-family: Roboto, RobotoDraft, Helvetica, Arial, sans-serif; margin: 0px; width: 128pt; border-top: none; border-left: none; border-bottom: 1pt solid black; border-right: 1pt solid black; padding: 0in 5.4pt; height: 38.25pt;"
                                        width="171">
                                        <p style="margin: 0px; text-align: center;"><span
                                                style="font-family: Arial, sans-serif; color: #222222; font-size: 12pt;">Từ
                                                km thứ 101 thu phí 10.000/km hoặc theo tư vấn từ nhân viên bán hàng.</span>
                                        </p>
                                    </td>
                                </tr>
                                <tr style="height: 38.25pt;">
                                    <td style="font-family: Roboto, RobotoDraft, Helvetica, Arial, sans-serif; margin: 0px; width: 113pt; border-right: 1pt solid black; border-bottom: 1pt solid black; border-left: 1pt solid black; border-top: none; padding: 0in 5.4pt; height: 38.25pt;"
                                        width="151">
                                        <p style="margin: 0px; text-align: center;"><span
                                                style="font-family: Arial, sans-serif; font-size: 12pt;">Trên 200 triệu
                                                đồng</span></p>
                                    </td>
                                    <td style="font-family: Roboto, RobotoDraft, Helvetica, Arial, sans-serif; margin: 0px; width: 161pt; border-top: none; border-left: none; border-bottom: 1pt solid black; border-right: 1pt solid black; padding: 0in 5.4pt; height: 38.25pt;"
                                        width="215">
                                        <p style="margin: 0px; text-align: center;"><span
                                                style="font-family: Arial, sans-serif; font-size: 12pt;">200km</span></p>
                                    </td>
                                    <td style="font-family: Roboto, RobotoDraft, Helvetica, Arial, sans-serif; margin: 0px; width: 151pt; border-top: none; border-left: none; border-bottom: 1pt solid black; border-right: 1pt solid black; padding: 0in 5.4pt; height: 38.25pt;"
                                        width="201">
                                        <p style="margin: 0px; text-align: center;"><span
                                                style="font-family: Arial, sans-serif; font-size: 12pt;">Theo thỏa thuận
                                                với khách hàng</span></p>
                                    </td>
                                    <td style="font-family: Roboto, RobotoDraft, Helvetica, Arial, sans-serif; margin: 0px; width: 128pt; border-top: none; border-left: none; border-bottom: 1pt solid black; border-right: 1pt solid black; padding: 0in 5.4pt; height: 38.25pt;"
                                        width="171">
                                        <p style="margin: 0px; text-align: center;"><span
                                                style="font-family: Arial, sans-serif; font-size: 12pt;">Từ km thứ 201 thu
                                                phí 10.000/km hoặc theo tư vấn từ nhân viên bán hàng.</span></p>
                                    </td>
                                </tr>
                                <tr style="height: 38.25pt;">
                                    <td style="font-family: Roboto, RobotoDraft, Helvetica, Arial, sans-serif; margin: 0px; width: 113pt; border-right: 1pt solid black; border-bottom: 1pt solid black; border-left: 1pt solid black; border-top: none; padding: 0in 5.4pt; height: 38.25pt;"
                                        width="151">
                                        <p style="margin: 0px; text-align: center;"><span
                                                style="font-family: Arial, sans-serif; font-size: 12pt;">Trên 300 triệu
                                                đồng</span></p>
                                    </td>
                                    <td style="font-family: Roboto, RobotoDraft, Helvetica, Arial, sans-serif; margin: 0px; width: 161pt; border-top: none; border-left: none; border-bottom: 1pt solid black; border-right: 1pt solid black; padding: 0in 5.4pt; height: 38.25pt;"
                                        width="215">
                                        <p style="margin: 0px; text-align: center;"><span
                                                style="font-family: Arial, sans-serif; font-size: 12pt;">300km</span></p>
                                    </td>
                                    <td style="font-family: Roboto, RobotoDraft, Helvetica, Arial, sans-serif; margin: 0px; width: 151pt; border-top: none; border-left: none; border-bottom: 1pt solid black; border-right: 1pt solid black; padding: 0in 5.4pt; height: 38.25pt;"
                                        width="201">
                                        <p style="margin: 0px; text-align: center;"><span
                                                style="font-family: Arial, sans-serif; font-size: 12pt;">Theo thỏa thuận
                                                với khách hàng</span></p>
                                    </td>
                                    <td style="font-family: Roboto, RobotoDraft, Helvetica, Arial, sans-serif; margin: 0px; width: 128pt; border-top: none; border-left: none; border-bottom: 1pt solid black; border-right: 1pt solid black; padding: 0in 5.4pt; height: 38.25pt;"
                                        width="171">
                                        <p style="margin: 0px; text-align: center;"><span
                                                style="font-family: Arial, sans-serif; font-size: 12pt;">Từ km thứ 301 thu
                                                phí 10.000/km hoặc theo tư vấn từ nhân viên bán</span></p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <br><span style="font-family: arial, helvetica, sans-serif; font-size: 12pt;">- Trong trường hợp
                            Quý khách có thắc mắc vui lòng liên hệ tổng đài:&nbsp;<strong>1900 0323 - Nhấn phím
                                0</strong>.</span>
                    </div>
                    <div>
                        <p style="line-height: 150%;"><span style="font-size: 12pt;"><span
                                    style="color: black; background: white;">- Trách nhiệm của bên giao hàng (cung cấp dịch
                                    vụ Logistic): chịu trách nhiệm về thời gian giao hàng, tình trạng hàng hóa đảm bảo khi
                                    đến tay khách hàng. Trường hợp xảy ra sự cố do lỗi của bên giao hàng hoàn toàn chịu
                                    trách nhiệm và chịu bồi thường theo giá trị sản phẩm. <strong><span
                                            style="background: white;">anphatpc.com.vn</span></strong></span><span
                                    style="color: black; background: white;">&nbsp;</span><span
                                    style="color: black; background: white;">sẽ không chịu trách nhiệm do lỗi phát sinh chủ
                                    quan của bên giao hàng, trường hợp bất khả kháng </span><span
                                    style="color: black; background: white;">chúng tôi</span><span
                                    style="color: black; background: white;"> sẽ hỗ trợ 50% tổn thất.</span></span></p>
                        <p style="margin: 0cm; margin-bottom: .0001pt; line-height: 150%; background: white;"><span
                                style="color: black; font-size: 12pt;">-Trường hợp phát sinh chậm trễ trong việc giao hàng,
                                <strong><span style="background: white;">anphatpc.com.vn </span></strong>sẽ liên hệ, thông
                                tin kịp thời cho khách hàng và tạo cơ hội để khách hàng có thể hủy hợp đồng nếu muốn.</span>
                        </p>
                    </div>
                </div>
            </div><!--right-side-->
        </div><!--static-page-->
    </div>
@endsection

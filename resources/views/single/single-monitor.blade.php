@extends('layouts.app')
@php
    $monitor_id = $monitor->id;
    $name = $monitor->name;
    $type = $monitor->attributes->firstWhere('name', '[Laptop] Loại monitor')->pivot->value ?? 'N/A';
    $price = $monitor->attributes->firstWhere('name', 'Price')->pivot->value ?? 'N/A';

    $dealprice = $monitor->attributes->firstWhere('name', 'Deal Price')->pivot->value ?? 'N/A';
    $rating = $monitor->attributes->firstWhere('name', 'Rating')->pivot->value ?? 'N/A';
    $brand = $monitor->attributes->firstWhere('name', 'Brand')->pivot->value ?? 'N/A';
    $model = $monitor->attributes->firstWhere('name', 'Model')->pivot->value ?? 'N/A';
    $mon_shape = $monitor->attributes->firstWhere('name', '[MON] Kiểu dáng màn hình')->pivot->value ?? 'N/A';
    $mon_ratio = $monitor->attributes->firstWhere('name', '[MON] Tỉ lệ khung hình')->pivot->value ?? 'N/A';
    $mon_size = $monitor->attributes->firstWhere('name', '[MON] Kích thước mặc định')->pivot->value ?? 'N/A';
    $mon_panel = $monitor->attributes->firstWhere('name', '[MON] Công nghệ tấm nền')->pivot->value ?? 'N/A';
    $mon_resolution = $monitor->attributes->firstWhere('name', '[MON] Phân giải điểm ảnh')->pivot->value ?? 'N/A';
    $mon_brightness = $monitor->attributes->firstWhere('name', '[MON] Độ sáng hiển thị')->pivot->value ?? 'N/A';
    $mon_refreshrate = $monitor->attributes->firstWhere('name', '[MON] Tần số quét')->pivot->value ?? 'N/A';
    $mon_respond = $monitor->attributes->firstWhere('name', '[MON] Thời gian đáp ứng')->pivot->value ?? 'N/A';
    $mon_color = $monitor->attributes->firstWhere('name', '[MON] Chỉ số màu sắc')->pivot->value ?? 'N/A';
    $mon_standards = $monitor->attributes->firstWhere('name', '[MON] Hỗ trợ tiêu chuẩn')->pivot->value ?? 'N/A';
    $mon_ports = $monitor->attributes->firstWhere('name', '[MON] Cổng cắm kết nối')->pivot->value ?? 'N/A';
    $mon_accessories = $monitor->attributes->firstWhere('name', '[MON] Phụ kiện trọng hộp')->pivot->value ?? 'N/A';
    $mon_powerconsumption = $monitor->attributes->firstWhere('name', '[MON] Điện năng tiêu thụ')->pivot->value ?? 'N/A';
    $mon_mechanicaldesign = $monitor->attributes->firstWhere('name', '[MON] Thiết kế cơ học')->pivot->value ?? 'N/A';
    $mon_audiofeature = $monitor->attributes->firstWhere('name', '[MON] Tính năng âm thanh')->pivot->value ?? 'N/A';
    $mon_weight = $monitor->attributes->firstWhere('name', '[MON] Trọng lượng')->pivot->value ?? 'N/A';

    $saleprice = $monitor->attributes->firstWhere('name', 'Sale Price')->pivot->value ?? 'N/A';
    $sale_start_date = $monitor->attributes->firstWhere('name', 'Sale Start Date')->pivot->value ?? 'N/A';
    $sale_end_date = $monitor->attributes->firstWhere('name', 'Sale End Date')->pivot->value ?? 'N/A';
    $sale_end_time = strtotime($sale_end_date);

@endphp
@section('content')
    <section class="product-detail-page">
        <div class="container">
            <div aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('home.index') }}">
                            <i class="fa fa-home"></i> Trang chủ
                        </a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a href="/monitors">Màn hình máy tính </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <a href="/monitors/{{ $brand }}}">{{ $brand }}</a>
                    </li>
                </ol>
            </div>
            <div class="bg-white product-info-container">
                <!-- pro images-left -->
                <div class="pro-image-gallery">
                    <div class="box-anh-sp" id="js-box-anh"></div>
                    <a href="javascript:void(0)" class="box-gallery d-block text-center blue text-12" id="box-open-gallery"
                        onclick="openBoxGallery(this);" data-id="anh_sp">
                        <i class="fa fa-search-plus"></i>
                        <p class="m-0 d-inline-block"> Phóng to Hình sản phẩm </p>
                        <span class="count js-dots" style="color: #222;">6 / 7</span>
                    </a>
                    <div class="image-type-container clearfix list-image-title">
                        <a href="javascript:void(0)" onclick="openBoxGallery(this);" data-id="anh_sp"
                            data-name="Hình sản phẩm" class="js-img-type current">
                            <span class="img">
                                <img src="{{ $monitor->attributes->firstWhere('name', 'Thumbnail Small')->pivot->value ?? 'N/A' }}"
                                    alt="Hình sản phẩm" class="fit-img">
                            </span>
                            <span class="name"> Hình sản phẩm </span>
                        </a>
                        <a href="javascript:void(0)" class="blue text-center" data-fancybox="" data-src="#pro-spec">
                            <img src="{{ asset('assets/img/sprites/icon-thongso.png') }}" alt=""
                                style="width: 50px;height: 50px;border: 1px solid #eee;padding: 5px 10px;">
                            <span style="font-weight: bold;color: #000">Mô tả chi tiết</span>
                        </a>
                    </div>
                    <div class="product-spec-group mb-4 font-300">
                        <h2 class="title" style="font-size: 20px;text-align: center;font-weight: 700;margin-bottom: 10px;">
                            MÔ TẢ CHI TIẾT</h2>
                        <div class="item-content position-relative">
                            <table style="width: 100.0%;" border="1" width="100%">
                                <tbody>
                                    <tr>
                                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                            <p><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">
                                                    <strong>
                                                        <span style="line-height: 115%; color: black;">
                                                            Hãng sản xuất
                                                        </span>
                                                    </strong>
                                                </span>
                                            </p>
                                        </td>
                                        <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                                            <p style="text-align: center;">
                                                <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">
                                                    <strong>
                                                        <a href="#">
                                                            {{ $brand }}
                                                        </a>
                                                    </strong>
                                                </span>
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                            <p>
                                                <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">
                                                    <strong>
                                                        <span style="line-height: 115%; color: black;">Tên sản phẩm&nbsp;
                                                            &nbsp;
                                                        </span>
                                                    </strong>
                                                </span>
                                            </p>
                                        </td>
                                        <td style="width: 578.2pt; padding: 0.75pt; text-align: center;" width="771">
                                            <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><a
                                                    href="#" target="_blank">{{ $name }}</a></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                            <p>
                                                <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">
                                                    <strong>
                                                        <span style="line-height: 115%; color: black;">Model
                                                        </span>
                                                    </strong>
                                                </span>
                                            </p>
                                        </td>
                                        <td style="width: 578.2pt; padding: 0.75pt; text-align: center;" width="771">
                                            <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><a
                                                    href="#" target="_blank">{{ $model }}</a></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                            <p>
                                                <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">
                                                    <strong>
                                                        <span style="line-height: 115%; color: black;">Kích thước màn hình
                                                        </span>
                                                    </strong>
                                                </span>
                                            </p>
                                        </td>
                                        <td style="width: 578.2pt; padding: 0.75pt; text-align: center;" width="771">
                                            <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><a
                                                    href="#" target="_blank">{{ $mon_size }}</a></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                            <p>
                                                <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">
                                                    <strong>
                                                        <span style="line-height: 115%; color: black;">Độ phân giải
                                                        </span>
                                                    </strong>
                                                </span>
                                            </p>
                                        </td>
                                        <td style="width: 578.2pt; padding: 0.75pt; text-align: center;" width="771">
                                            <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><a
                                                    href="#" target="_blank">{{ $mon_resolution }}</a></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                            <p>
                                                <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">
                                                    <strong>
                                                        <span style="line-height: 115%; color: black;">Tỉ lệ
                                                        </span>
                                                    </strong>
                                                </span>
                                            </p>
                                        </td>
                                        <td style="width: 578.2pt; padding: 0.75pt; text-align: center;" width="771">
                                            <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><a
                                                    href="#" target="_blank">{{ $mon_ratio }}</a></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                            <p>
                                                <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">
                                                    <strong>
                                                        <span style="line-height: 115%; color: black;">Tấn nền màn hình
                                                        </span>
                                                    </strong>
                                                </span>
                                            </p>
                                        </td>
                                        <td style="width: 578.2pt; padding: 0.75pt; text-align: center;" width="771">
                                            <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><a
                                                    href="#" target="_blank">{{ $mon_panel }}</a></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                            <p>
                                                <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">
                                                    <strong>
                                                        <span style="line-height: 115%; color: black;">Màu sắc hiển thị
                                                        </span>
                                                    </strong>
                                                </span>
                                            </p>
                                        </td>
                                        <td style="width: 578.2pt; padding: 0.75pt; text-align: center;" width="771">
                                            <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><a
                                                    href="#" target="_blank">{{ $mon_brightness }}</a></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                            <p>
                                                <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">
                                                    <strong>
                                                        <span style="line-height: 115%; color: black;">Màu sắc hiển thị
                                                        </span>
                                                    </strong>
                                                </span>
                                            </p>
                                        </td>
                                        <td style="width: 578.2pt; padding: 0.75pt; text-align: center;" width="771">
                                            <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><a
                                                    href="#" target="_blank">{{ $mon_color }}</a></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                            <p>
                                                <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">
                                                    <strong>
                                                        <span style="line-height: 115%; color: black;">Tần số quét
                                                        </span>
                                                    </strong>
                                                </span>
                                            </p>
                                        </td>
                                        <td style="width: 578.2pt; padding: 0.75pt; text-align: center;" width="771">
                                            <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><a
                                                    href="#" target="_blank">{{ $mon_refreshrate }}</a></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                            <p>
                                                <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">
                                                    <strong>
                                                        <span style="line-height: 115%; color: black;">Cổng kết nối
                                                        </span>
                                                    </strong>
                                                </span>
                                            </p>
                                        </td>
                                        <td style="width: 578.2pt; padding: 0.75pt; text-align: center;" width="771">
                                            <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><a
                                                    href="#" target="_blank">{{ $mon_ports }}</a></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                            <p>
                                                <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">
                                                    <strong>
                                                        <span style="line-height: 115%; color: black;">Thời gian đáp ứng
                                                        </span>
                                                    </strong>
                                                </span>
                                            </p>
                                        </td>
                                        <td style="width: 578.2pt; padding: 0.75pt; text-align: center;" width="771">
                                            <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><a
                                                    href="#" target="_blank">{{ $mon_respond }}</a></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                            <p>
                                                <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">
                                                    <strong>
                                                        <span style="line-height: 115%; color: black;">Tính năng âm thanh
                                                        </span>
                                                    </strong>
                                                </span>
                                            </p>
                                        </td>
                                        <td style="width: 578.2pt; padding: 0.75pt; text-align: center;" width="771">
                                            <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><a
                                                    href="#" target="_blank">{{ $mon_audiofeature }}</a></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                            <p>
                                                <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">
                                                    <strong>
                                                        <span style="line-height: 115%; color: black;">Điện năng tiêu thụ
                                                        </span>
                                                    </strong>
                                                </span>
                                            </p>
                                        </td>
                                        <td style="width: 578.2pt; padding: 0.75pt; text-align: center;" width="771">
                                            <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><a
                                                    href="#" target="_blank">{{ $mon_powerconsumption }}</a></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                            <p>
                                                <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">
                                                    <strong>
                                                        <span style="line-height: 115%; color: black;">Phụ kiện
                                                        </span>
                                                    </strong>
                                                </span>
                                            </p>
                                        </td>
                                        <td style="width: 578.2pt; padding: 0.75pt; text-align: center;" width="771">
                                            <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><a
                                                    href="#" target="_blank">{{ $mon_accessories }}</a></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                            <p>
                                                <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">
                                                    <strong>
                                                        <span style="line-height: 115%; color: black;">Cân nặng
                                                        </span>
                                                    </strong>
                                                </span>
                                            </p>
                                        </td>
                                        <td style="width: 578.2pt; padding: 0.75pt; text-align: center;" width="771">
                                            <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><a
                                                    href="#" target="_blank">{{ $mon_weight }}</a></span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <a href="javascript:void(0)" class="blue item-button" data-fancybox="" data-src="#pro-spec"> XEM
                            THÊM THÔNG SỐ <i class="fa fa-angle-double-down"></i></a>
                    </div>
                </div>

                <!-- pro-info-center -->
                <div class="pro-info-center">
                    <h1 class="pro-name js-product-name"> {{ $name }}
                        ( {{ $mon_size }}
                        | {{ $mon_color }}
                        )
                    </h1>
                    <div style="border-bottom: 1px solid #edeef2;margin-bottom: 7px;padding-bottom: 3px;font-size: 13px;">
                        <span>
                            <b>Mã SP: </b><span class="js-product-sku">{{ $model }}</span>
                        </span>
                        <span style="margin-left: 20px;">
                            <i class="icon-star star-0"></i>
                            ? đánh giá
                        </span>
                        <span style="margin: 0 20px;">
                            Lượt xem: ?
                        </span>
                        <a href="javascript:void(0)" class="js-p-compare blue" id="js-pd-item"
                            onclick="CompareProduct.compare_addProduct(49891)" data-id="49891"><i
                                class="fa fa-plus-circle"></i> So
                            sánh</a>
                    </div>

                    <div class="pro-info-summary">
                        <!--0-->
                        <span class="item ">
                            <i class="fa fa-check-circle"></i>Kiểu dáng màn hình: {{ $mon_shape }}
                        </span>
                        <!--1-->
                        <span class="item ">
                            <i class="fa fa-check-circle"></i>Tỉ lệ khung hình: {{ $mon_ratio }}
                        </span>
                        <!--2-->
                        <span class="item ">
                            <i class="fa fa-check-circle"></i>Kích thước mặc định: {{ $mon_size }}
                        </span>
                        <!--3-->
                        <span class="item ">
                            <i class="fa fa-check-circle"></i>Công nghệ tấm nền: {{ $mon_panel }}
                        </span>
                        <!--4-->
                        <span class="item hide d-block">
                            <i class="fa fa-check-circle"></i>Phân giải điểm ảnh: {{ $mon_resolution }}
                        </span>
                        <!--5-->
                        <span class="item hide d-block">
                            <i class="fa fa-check-circle"></i>Độ sáng hiển thị: {{ $mon_brightness }}
                        </span>
                        <!--6-->
                        <span class="item hide d-block">
                            <i class="fa fa-check-circle"></i>Tần số quét: {{ $mon_refreshrate }}
                        </span>
                        <span class="item hide d-block">
                            <i class="fa fa-check-circle"></i>Thời gian đáp ứng: {{ $mon_respond }}
                        </span>
                        <span class="item hide d-block">
                            <i class="fa fa-check-circle"></i>Chỉ số màu sắc: {{ $mon_color }}
                        </span>
                        <!--9-->
                        <span class="item hide d-block">
                            <i class="fa fa-check-circle"></i>Hỗ trợ tiêu chuẩn: {{ $mon_standards }}
                        </span>
                        <span class="item hide d-block">
                            <i class="fa fa-check-circle"></i>Cổng cắm kết nối: {{ $mon_ports }}
                        </span>
                        <span class="item hide d-block">
                            <i class="fa fa-check-circle"></i>Phụ kiện trong hộp: {{ $mon_accessories }}
                        </span>
                    </div>
                    <p><a href="javascript:void(0)" id="js-viewmore-summary" class="red">&lt; Thu gọn</a></p>
                    @if ($saleprice != 'N/A' && now()->lessThan(Carbon\Carbon::parse($sale_end_date)))
                        <div class="deal-count-container text-12 font-300 text-right" id="js-deal-container">Kết thúc sau
                            <span class="js-day"> 00 </span>
                            <span class="js-hour"> 00 </span>
                            <span class="js-minute"> 00 </span>
                            <span class="js-seconds"> 00 </span>
                        </div>
                    @endif
                    <div class="pro_info-price-container">
                        <div class="spec-count" id="js-promotion-price-countdown"> <!-- js countdown --></div>
                        <table>
                            <tbody>

                                <tr>
                                    <td width="160px" class="font-500"> Giá niêm yết: </td>
                                    <td>
                                        <del style="color: #888888;" class="font-500">
                                            {{ number_format($price, 0, ',', '.') }} đ </del>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="160px" class="font-500"> Giá khuyến mại: </td>
                                    <td>
                                        <b style="color: #ce0707" class="text-18 js-pro-total-price"
                                            data-price="42990000">
                                            {{ number_format($dealprice, 0, ',', '.') }} đ
                                        </b>
                                        <span style="color: #888888;" class="text-12">
                                            [Giá đã có VAT]
                                        </span>
                                    </td>
                                </tr>

                                @if ($saleprice != 'N/A' && now()->lessThan(Carbon\Carbon::parse($sale_end_date)))
                                    <tr>
                                        <td width="160px" class="font-500"> GIÁ SỐC: </td>
                                        <td>
                                            <b style="color: #ce0707" class="text-18 js-pro-total-price"
                                                data-price="42990000">
                                                {{ number_format($saleprice, 0, ',', '.') }} đ
                                            </b>
                                            <span style="color: #888888;" class="text-12">
                                                [Giá đã có VAT]
                                            </span>
                                        </td>
                                    </tr>
                                @endif
                                <tr>
                                    <td></td>
                                    <td>
                                        <span style="color: #0030f2;" class="font-500">👉Quét ZALOPAY - Giảm liền tay ưu
                                            đãi lên tới 150.000
                                            VNĐ (Không áp dụng các sản phẩm của Apple-CPU). Áp dụng từ 01/10/2024 đến
                                            30/11/2024. <a href="#" target="_blank">Xem chi
                                                tiết</a></span>
                                    </td>
                                </tr>
                                <tr>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="store-address-container">
                        <b class="d-block mb-2">
                            Bảo hành: 24 tháng (Pin 12 Tháng) Quốc Tế, Đổi mới trong 15 ngày
                        </b>
                    </div>
                    <br>
                    <!-- button -->
                    <div class="pro-button-container d-flex flex-wrap text-center justify-content-between">
                        <!-- Button Mua hàng -->
                        <a href="javascript:void(0)" class="w-49 btn-buyNow js-buy-now"
                            onclick="document.getElementById('buyNowForm').submit();">
                            <b class="d-block text-18 font-500"> ĐẶT MUA NGAY </b>
                            <span class="text-12 d-block"> Nhanh chóng, thuận tiện </span>
                        </a>
                        <a href="javascript:void(0)" class="w-49 btn-addCart blue order-1 js-addCart"
                            onclick="document.getElementById('addCartForm').submit();">
                            <b class="d-block text-18 font-500">THÊM VÀO GIỎ HÀNG</b>
                            <span class="text-12 d-block">Mua tiếp sản phẩm khác</span>
                        </a>

                        <form id="addCartForm" action="{{ route('cart.add') }}" method="POST" style="display: none;">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $monitor_id }}">
                            <input type="hidden" name="product_type" value="monitor">
                            <input type="hidden" name="product_name" value="{{ $name }}">
                            <input type="hidden" name="quantity" value="1" min="1">
                        </form>
                        <form id="buyNowForm" action="{{ route('buynow') }}" method="POST" style="display: none;">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $monitor_id }}">
                            <input type="hidden" name="product_type" value="monitor">
                            <input type="hidden" name="product_name" value="{{ $name }}">
                            <input type="hidden" name="quantity" value="1" min="1">
                        </form>
                    </div>
                </div>
                <div class="product-detail-info-right">
                    <!-- kho hàng -->
                    <div class="store-address-container">
                        <p style="display: flex;">
                            <i class="fa fa-map-marker" style="margin: 4px 10px 0 0;"></i>
                            <b style="color:red;display: inline-block;">Mua hàng Online toàn quốc: <br> (Hotline: 1900.0323
                                - Phím 1
                                hoặc
                                0913.367.005)</b>
                        </p>
                    </div>
                    {{-- Nếu có thể thì nên làm phần này Dynamic --}}
                    <div class="pd-static-item">
                        <p class="title"> Hiện đang có tại showroom:</p>

                        <div class="static-info">
                            <div class="store-address font-500" id="js-in-stock">
                                <b class="d-block" style="color: #000">* Showroom miền Bắc:</b>
                                <div class="mb-2" id="js-mien-bac">
                                    <a href="#" target="_blank" class="blue">
                                        <span>
                                            12 Chùa Bộc - Q.Đống Đa - Hà Nội<br>
                                            (Hotline: 0918.557.006)
                                        </span>
                                    </a>
                                    <a href="#" target="_blank" class="blue">
                                        <span>
                                            331 Ngô Gia Tự - P. Tiền An - Bắc Ninh <br>
                                            (Hotline: 0862.136.488)
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <div id="js-out-stock" style="display: none;font-weight: bold;">
                                Kho hàng: <span class="red">Liên hệ</span>
                            </div>
                        </div>
                    </div>
                    <div class="pd-static-item">
                        <p class="title">Trợ giúp</p>
                        <div class="static-info">
                            <ul class="ul" style="line-height:25px;">
                                <li> <i class="fa fa-check"></i> <a href="#">Hướng dẫn đặt hàng Flash Sale</a> </li>
                                <li> <i class="fa fa-check"></i> <a href="#">Hướng dẫn mua hàng</a> </li>
                                <li> <i class="fa fa-check"></i> <a href=" {{ route('pages.warranty-policy') }}">Chính
                                        sách bảo hành đổi trả</a> </li>
                                <li> <i class="fa fa-check"></i> <a href="3">Chính sách mua trả góp</a> </li>
                                <li> <i class="fa fa-check"></i> <a href="{{ route('pages.shipping-policy') }}">Chính
                                        sách giao hàng</a> </li>
                                <li> <i class="fa fa-check"></i> <a href="#">Chính sách bảo hành tận nhà</a> </li>
                                <li> <i class="fa fa-check"></i> <a href="#">Hỗ trợ khách hàng dự án, doanh nghiệp
                                    </a> </li>
                            </ul>
                        </div>
                    </div>
                    <div class="pd-static-item">
                        <p class="title">MUA HÀNG NHANH CHÓNG, TIỆN LỢI</p>
                        <div class="static-info">
                            <ul class="ul" style="line-height:25px;">
                                <li>- Mua online - Giao hàng nhanh chóng</li>
                                <li>- Ship hàng toàn quốc</li>
                                <li>- Nhận hàng và thanh toán tại nhà ( ship COD)</li>
                            </ul>
                        </div>
                    </div>
                    <div>
                        <p><b>
                                <font color="red">➤ KHUYẾN MẠI CỰC HOT ĐỪNG BỎ LỠ !!!</font>
                            </b></p>
                        <a href="#" target="new"><img src="{{ asset('assets/img/deal/nbln0887.jpg') }}"></a>
                    </div>
                    <div>
                        <a href="#" target="new"><img
                                src="{{ asset('assets/img/deal/msi-katana-15-b13vfk.jpg') }}"></a>
                    </div>
                    <div>
                        <a href="#" target="new"><img src="{{ asset('assets/img/deal/nbac0386.jpg') }}"></a>
                    </div>
                </div>
            </div>
        </div>
        <div style="display: none;" id="pro-spec">
            <table style="width: 100.0%;" border="1" width="100%">
                <tbody>
                    <tr>
                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                            <p><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">
                                    <strong>
                                        <span style="line-height: 115%; color: black;">
                                            Hãng sản xuất
                                        </span>
                                    </strong>
                                </span>
                            </p>
                        </td>
                        <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                            <p style="text-align: center;">
                                <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">
                                    <strong>
                                        <a href="#">
                                            {{ $brand }}
                                        </a>
                                    </strong>
                                </span>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                            <p>
                                <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">
                                    <strong>
                                        <span style="line-height: 115%; color: black;">Tên sản phẩm&nbsp;
                                            &nbsp;
                                        </span>
                                    </strong>
                                </span>
                            </p>
                        </td>
                        <td style="width: 578.2pt; padding: 0.75pt; text-align: center;" width="771">
                            <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><a href="#"
                                    target="_blank">{{ $name }}</a></span>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                            <p>
                                <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">
                                    <strong>
                                        <span style="line-height: 115%; color: black;">Model
                                        </span>
                                    </strong>
                                </span>
                            </p>
                        </td>
                        <td style="width: 578.2pt; padding: 0.75pt; text-align: center;" width="771">
                            <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><a href="#"
                                    target="_blank">{{ $model }}</a></span>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                            <p>
                                <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">
                                    <strong>
                                        <span style="line-height: 115%; color: black;">Kích thước màn hình
                                        </span>
                                    </strong>
                                </span>
                            </p>
                        </td>
                        <td style="width: 578.2pt; padding: 0.75pt; text-align: center;" width="771">
                            <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><a href="#"
                                    target="_blank">{{ $mon_size }}</a></span>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                            <p>
                                <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">
                                    <strong>
                                        <span style="line-height: 115%; color: black;">Độ phân giải
                                        </span>
                                    </strong>
                                </span>
                            </p>
                        </td>
                        <td style="width: 578.2pt; padding: 0.75pt; text-align: center;" width="771">
                            <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><a href="#"
                                    target="_blank">{{ $mon_resolution }}</a></span>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                            <p>
                                <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">
                                    <strong>
                                        <span style="line-height: 115%; color: black;">Tỉ lệ
                                        </span>
                                    </strong>
                                </span>
                            </p>
                        </td>
                        <td style="width: 578.2pt; padding: 0.75pt; text-align: center;" width="771">
                            <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><a href="#"
                                    target="_blank">{{ $mon_ratio }}</a></span>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                            <p>
                                <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">
                                    <strong>
                                        <span style="line-height: 115%; color: black;">Tấn nền màn hình
                                        </span>
                                    </strong>
                                </span>
                            </p>
                        </td>
                        <td style="width: 578.2pt; padding: 0.75pt; text-align: center;" width="771">
                            <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><a href="#"
                                    target="_blank">{{ $mon_panel }}</a></span>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                            <p>
                                <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">
                                    <strong>
                                        <span style="line-height: 115%; color: black;">Màu sắc hiển thị
                                        </span>
                                    </strong>
                                </span>
                            </p>
                        </td>
                        <td style="width: 578.2pt; padding: 0.75pt; text-align: center;" width="771">
                            <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><a href="#"
                                    target="_blank">{{ $mon_brightness }}</a></span>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                            <p>
                                <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">
                                    <strong>
                                        <span style="line-height: 115%; color: black;">Màu sắc hiển thị
                                        </span>
                                    </strong>
                                </span>
                            </p>
                        </td>
                        <td style="width: 578.2pt; padding: 0.75pt; text-align: center;" width="771">
                            <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><a href="#"
                                    target="_blank">{{ $mon_color }}</a></span>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                            <p>
                                <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">
                                    <strong>
                                        <span style="line-height: 115%; color: black;">Tần số quét
                                        </span>
                                    </strong>
                                </span>
                            </p>
                        </td>
                        <td style="width: 578.2pt; padding: 0.75pt; text-align: center;" width="771">
                            <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><a href="#"
                                    target="_blank">{{ $mon_refreshrate }}</a></span>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                            <p>
                                <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">
                                    <strong>
                                        <span style="line-height: 115%; color: black;">Cổng kết nối
                                        </span>
                                    </strong>
                                </span>
                            </p>
                        </td>
                        <td style="width: 578.2pt; padding: 0.75pt; text-align: center;" width="771">
                            <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><a href="#"
                                    target="_blank">{{ $mon_ports }}</a></span>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                            <p>
                                <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">
                                    <strong>
                                        <span style="line-height: 115%; color: black;">Thời gian đáp ứng
                                        </span>
                                    </strong>
                                </span>
                            </p>
                        </td>
                        <td style="width: 578.2pt; padding: 0.75pt; text-align: center;" width="771">
                            <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><a href="#"
                                    target="_blank">{{ $mon_respond }}</a></span>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                            <p>
                                <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">
                                    <strong>
                                        <span style="line-height: 115%; color: black;">Tính năng âm thanh
                                        </span>
                                    </strong>
                                </span>
                            </p>
                        </td>
                        <td style="width: 578.2pt; padding: 0.75pt; text-align: center;" width="771">
                            <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><a href="#"
                                    target="_blank">{{ $mon_audiofeature }}</a></span>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                            <p>
                                <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">
                                    <strong>
                                        <span style="line-height: 115%; color: black;">Điện năng tiêu thụ
                                        </span>
                                    </strong>
                                </span>
                            </p>
                        </td>
                        <td style="width: 578.2pt; padding: 0.75pt; text-align: center;" width="771">
                            <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><a href="#"
                                    target="_blank">{{ $mon_powerconsumption }}</a></span>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                            <p>
                                <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">
                                    <strong>
                                        <span style="line-height: 115%; color: black;">Phụ kiện
                                        </span>
                                    </strong>
                                </span>
                            </p>
                        </td>
                        <td style="width: 578.2pt; padding: 0.75pt; text-align: center;" width="771">
                            <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><a href="#"
                                    target="_blank">{{ $mon_accessories }}</a></span>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                            <p>
                                <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">
                                    <strong>
                                        <span style="line-height: 115%; color: black;">Cân nặng
                                        </span>
                                    </strong>
                                </span>
                            </p>
                        </td>
                        <td style="width: 578.2pt; padding: 0.75pt; text-align: center;" width="771">
                            <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><a href="#"
                                    target="_blank">{{ $mon_weight }}</a></span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        @if (session('addToCartSuccess'))
            @push('scripts')
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Thêm sản phẩm vào giỏ hàng thành công!',
                        text: 'Cảm ơn bạn đã mua sắm tại SigmaTech.',
                        confirmButtonText: 'Đóng',
                        timer: 5000
                    });
                </script>
            @endpush
        @endif
    </section>
@endsection
@php
    $images = collect(['Image1', 'Image2', 'Image3', 'Image4', 'Image5'])
        ->map(function ($name) use ($monitor) {
            $attribute = $monitor->attributes->firstWhere('name', $name);
            return $attribute ? asset($attribute->pivot->value) : null;
        })
        ->filter()
        ->values(); // Lọc bỏ giá trị null và reset lại các chỉ số
@endphp

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.min.css">
@endpush

@push('scripts')
    <script>
        const listImage = {
            anh_sp: [
                @foreach ($images as $image)
                    {
                        image: `{{ $image }}`
                    },
                @endforeach
            ]

        };

        $(document).ready(function() {
            buildSliderImage('.box-anh-sp', listImage['anh_sp']);
        });

        function counter(event) {
            var element = event.target;
            var items = event.item.count;
            var item = event.item.index + 1;
            $('.js-dots').html(item + " / " + items);
        }

        function buildSliderImage(holder, data) {
            if (data.length < 1) return;

            var owlOptions;
            if (data.length == 1) {
                owlOptions = {
                    items: 1,
                    loop: false,
                    margin: 10,
                    nav: false,
                    dots: false,
                    lazyLoad: true,
                    mouseDrag: false,
                    touchDrag: false,
                    pullDrag: false,
                    freeDrag: true,
                    onInitialized: counter,
                    onTranslated: counter
                }
            } else owlOptions = {
                items: 1,
                loop: false,
                margin: 10,
                nav: true,
                dots: false,
                lazyLoad: true,
                onInitialized: counter,
                onTranslated: counter,
                navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>']
            }

            var htmlSlider = ['<div class="owl-carousel owl-2019 custom-nav" id="list-image-slider">']
            data.forEach(function(item) {
                htmlSlider.push('<div class="item" style="text-align:center"><img src="' + item.image +
                    '"> </div>');
            })
            htmlSlider.push('</div>');
            $(holder).html(htmlSlider.join(''));

            $('#list-image-slider').owlCarousel(owlOptions)
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
    <script>
        // Khởi tạo Fancybox với các tùy chọn tùy chỉnh (không bắt buộc)
        Fancybox.bind("[data-fancybox]", {
            Toolbar: false,
            closeButton: "top",
            dragToClose: false,
            animated: true,
        });

        function openBoxGallery(element) {
            var imageId = element.getAttribute("data-id");
            var images = listImage[imageId];

            if (images && images.length > 0) {
                var fancyboxImages = images.map(function(image) {
                    return {
                        src: image.image,
                        type: "image",
                        opts: {
                            caption: "Hình ảnh sản phẩm",
                            thumb: image.image
                        }
                    };
                });

                Fancybox.show(fancyboxImages);
            } else {
                console.warn("Không tìm thấy hình ảnh cho ID: " + imageId);
            }
        }
    </script>
    <script>
        $(function() {
            $("#js-viewmore-summary").click(function() {
                $('.pro-info-summary .item.hide').toggleClass("d-block");
                if ($(this).text() == 'Xem thêm >') {
                    $(this).text('< Thu gọn');
                } else {
                    $(this).text('Xem thêm >');
                }
            });

            $(".js-product-carousel").owlCarousel(optionProductCarousel);

            $('#js-tab-1').owlCarousel({
                items: 5,
                margin: 10,
                loop: true,
                autoplayHoverPause: false,
                autoplay: true,
                autoplayTimeout: 3000,
                autoplaySpeed: 1500,
                dots: false,
                lazyLoad: true,
                nav: true,
                navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
                responsive: {
                    1200: {
                        items: 5,
                    },
                    1600: {
                        items: 6,
                    }
                }
            })

            // Tab san pham
            $(".js-tab-title:first-child").addClass("active");
            $(".product-tab-item:first-child").addClass("active");
            // End Tab san pham

            $('.js-items-variant').owlCarousel({
                items: 3,
                loop: false,
                margin: 8,
                autoplay: false,
                autoplayTimeout: 3000,
                nav: true,
                navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
                lazyLoad: true,
                dots: false,
                responsive: {
                    1200: {
                        items: 3,
                    },
                    1600: {
                        items: 4,
                    }
                }
            });

            $('.image-title-item').on('click', function() {
                var src = $(this).attr('data-img');
                var html = `<img src="` + src + `" alt="image" />`;
                $("#js-box-anh").html(html)
            })
        });
    </script>
    {{-- countdown --}}
    <script>
        // Xác định thời gian kết thúc (thời gian đích)
        const endTime = {{ $sale_end_time }} * 1000;

        // Cập nhật đồng hồ đếm ngược mỗi giây
        const countdown = setInterval(function() {
            const now = new Date().getTime();
            const timeLeft = endTime - now;

            // Tính ngày, giờ, phút và giây từ timeLeft
            const days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
            const hours = Math.floor((timeLeft / (1000 * 60 * 60)) % 24);
            const minutes = Math.floor((timeLeft / (1000 * 60)) % 60);
            const seconds = Math.floor((timeLeft / 1000) % 60);

            // Hiển thị kết quả trong các phần tử tương ứng
            document.querySelector('.js-day').innerText = String(days).padStart(2, '0');
            document.querySelector('.js-hour').innerText = String(hours).padStart(2, '0');
            document.querySelector('.js-minute').innerText = String(minutes).padStart(2, '0');
            document.querySelector('.js-seconds').innerText = String(seconds).padStart(2, '0');

            // Nếu thời gian kết thúc, dừng bộ đếm ngược
            if (timeLeft < 0) {
                clearInterval(countdown);
                document.querySelector('#js-deal-container').innerText = "Đã kết thúc";
            }
        }, 1000); // Cập nhật mỗi giây (1000 milliseconds)
    </script>
@endpush

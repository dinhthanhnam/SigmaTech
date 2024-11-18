@extends('layouts.app')
@php
    $cooling_id = $cooling->id;
    $name = $cooling->name;
    $brand = $cooling->attributes->firstWhere('name', 'Brand')->pivot->value ?? 'N/A';
    $model = $cooling->attributes->firstWhere('name', 'Model')->pivot->value ?? 'N/A';
    $price = $cooling->attributes->firstWhere('name', 'Price')->pivot->value ?? 'N/A';
    $dealprice = $cooling->attributes->firstWhere('name', 'Deal Price')->pivot->value ?? 'N/A';
    $rating = $cooling->attributes->firstWhere('name', 'Rating')->pivot->value ?? 'N/A';

    // Các thuộc tính Cooling
    $cooling_type = $cooling->attributes->firstWhere('name', '[Cooling] Loại làm mát')->pivot->value ?? 'N/A';
    $fan_size = $cooling->attributes->firstWhere('name', '[Cooling] Kích thước quạt')->pivot->value ?? 'N/A';
    $fan_speed = $cooling->attributes->firstWhere('name', '[Cooling] Tốc độ quạt')->pivot->value ?? 'N/A';
    $noise_level = $cooling->attributes->firstWhere('name', '[Cooling] Độ ồn')->pivot->value ?? 'N/A';
    $tdp_support = $cooling->attributes->firstWhere('name', '[Cooling] TDP hỗ trợ')->pivot->value ?? 'N/A';
    $dimensions = $cooling->attributes->firstWhere('name', '[Cooling] Kích thước')->pivot->value ?? 'N/A';
    $socket_compatibility = $cooling->attributes->firstWhere('name', '[Cooling] Tương thích socket')->pivot->value ?? 'N/A';
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
                    <li class="breadcrumb-item active" aria-current="page">
                        <a
                            href="{{ url('/cooling/' . '/' . $brand) }}">{{ $cooling->attributes->firstWhere('id', '1')->pivot->value }}</a>
                    </li>
                </ol>
            </div>

            <div class="bg-white product-info-container">
                <!-- pro images-left -->
                <div class="pro-image-gallery">
                    <div class="box-anh-sp" id="js-box-anh">
                        <div class="owl-carousel owl-2019 custom-nav owl-loaded owl-drag" id="list-image-slider">
                            <div class="owl-stage-outer">
                                <div class="owl-stage"
                                    style="transform: translate3d(-1950px, 0px, 0px); transition: all; width: 2730px;">
                                </div>
                            </div>
                            <div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><i
                                        class="fa fa-chevron-left"></i></button><button type="button" role="presentation"
                                    class="owl-next"><i class="fa fa-chevron-right"></i></button></div>
                            <div class="owl-dots disabled"></div>
                            <div class="owl-thumbs"></div>
                        </div>
                    </div>
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
                                <img src="https://anphat.com.vn/media/product/35621_product_16068738908cd568ef83d0797d67da2eeb5689a3c1.png"
                                    alt="Hình sản phẩm" class="fit-img">
                            </span>
                            <span class="name"> Hình sản phẩm </span>
                        </a>
                        <a href="javascript:void(0)" class="blue text-center" data-fancybox="" data-src="#pro-spec">
                            <img src="{{ asset('assets/img/sprites/icon-thongso.png') }}" alt=""
                                style="width: 50px;height: 50px;border: 1px solid #eee;padding: 5px 10px;">
                            <span style="font-weight: bold;color: #000">Thông số kỹ thuật</span>
                        </a>
                    </div>

                    <div class="product-spec-group mb-4 font-300">
                        <h2 class="title" style="font-size: 20px;text-align: center;font-weight: 700;margin-bottom: 10px;">
                            THÔNG SỐ KỸ THUẬT</h2>
                            <div class="item-content position-relative">
                                <table style="width: 100.0%;" border="1" width="100%">
                                    <tbody>
                                        <tr>
                                            <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                                <p><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">
                                                        <strong><span style="line-height: 115%; color: black;">Hãng sản xuất</span></strong>
                                                    </span>
                                                </p>
                                            </td>
                                            <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                                                <p style="text-align: center;">
                                                    <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">
                                                        <strong>
                                                            <a href="https://www.anphatpc.com.vn/cooling-asus_dm1058.html">{{ $brand }}</a>
                                                        </strong>
                                                    </span>
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                                <p><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">
                                                        <strong><span style="line-height: 115%; color: black;">Tên sản phẩm</span></strong>
                                                    </span>
                                                </p>
                                            </td>
                                            <td style="width: 578.2pt; padding: 0.75pt; text-align: center;" width="771">
                                                <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">
                                                    <a href="https://www.anphatpc.com.vn/cooling-asus-rog-strix-g16-g614ji-n4125w.html" target="_blank">{{ $name }}</a>
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                                <p><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">
                                                        <strong><span style="line-height: 115%; color: black;">Loại làm mát</span></strong>
                                                    </span>
                                                </p>
                                            </td>
                                            <td style="width: 578.2pt; padding: .75pt; text-align: center;" width="771">
                                                <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{ $cooling_type }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                                <p><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">
                                                        <strong><span style="line-height: 115%; color: black;">Kích thước quạt</span></strong>
                                                    </span>
                                                </p>
                                            </td>
                                            <td style="width: 578.2pt; padding: .75pt; text-align: center;" width="771">
                                                <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{ $fan_size }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                                <p><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">
                                                        <strong><span style="line-height: 115%; color: black;">Độ ồn</span></strong>
                                                    </span>
                                                </p>
                                            </td>
                                            <td style="width: 578.2pt; padding: .75pt; text-align: center;" width="771">
                                                <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{ $noise_level }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                                <p><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">
                                                        <strong><span style="line-height: 115%; color: black;">Tốc độ quạt</span></strong>
                                                    </span>
                                                </p>
                                            </td>
                                            <td style="width: 578.2pt; padding: .75pt; text-align: center;" width="771">
                                                <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{  $fan_speed }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                                <p><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">
                                                        <strong><span style="line-height: 115%; color: black;">TDP hỗ trợ</span></strong>
                                                    </span>
                                                </p>
                                            </td>
                                            <td style="width: 578.2pt; padding: .75pt; text-align: center;" width="771">
                                                <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{ $tdp_support }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                                <p><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">
                                                        <strong><span style="line-height: 115%; color: black;">Kích thước</span></strong>
                                                    </span>
                                                </p>
                                            </td>
                                            <td style="width: 578.2pt; padding: .75pt; text-align: center;" width="771">
                                                <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{ $dimensions }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                                <p><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">
                                                        <strong><span style="line-height: 115%; color: black;">Tương thích socket</span></strong>
                                                    </span>
                                                </p>
                                            </td>
                                            <td style="width: 578.2pt; padding: .75pt; text-align: center;" width="771">
                                                <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{ $socket_compatibility }}</span>
                                            </td>
                                        </tr>
            
                                    </tbody>
                                </table>
                            </div>
                            

                        <a href="javascript:void(0)" class="blue item-button" data-fancybox="" data-src="#pro-spec"> XEM
                            THÊM THÔNG SỐ <i class="fa fa-angle-double-down"></i></a>
                    </div>
                </div>

                <div class="pro-info-center">
                    <h1 class="pro-name js-product-name">{{ $name }}
                        |  {{ $cooling_type }} | {{$socket_compatibility}}
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
                            onclick="CompareProduct.compare_addProduct(49891)" data-id="49891">
                            <i class="fa fa-plus-circle"></i> So sánh
                        </a>
                    </div>

                    <div class="pro-info-summary">
                        <span class="item">
                            <i class="fa fa-check-circle"></i>Loại làm mát: {{ $cooling_type }}
                        </span>
                        <span class="item">
                            <i class="fa fa-check-circle"></i>Kích thước quạt: {{ $fan_size }}
                        </span>
                        <span class="item">
                            <i class="fa fa-check-circle"></i>Tốc độ quạt: {{ $fan_speed }}
                        </span>
                        <span class="item">
                            <i class="fa fa-check-circle"></i>Độ ồn: {{ $noise_level }}
                        </span>
                        <span class="item hide d-block">
                            <i class="fa fa-check-circle"></i>TDP hỗ trợ: {{ $tdp_support }}
                        </span>
                        <span class="item hide d-block">
                            <i class="fa fa-check-circle"></i>Kích thước: {{ $dimensions }}
                        </span>
                        <span class="item hide d-block">
                            <i class="fa fa-check-circle"></i>Tương thích socket: {{ $socket_compatibility }}
                        </span>
                    </div>
                    

                    <p><a href="javascript:void(0)" id="js-viewmore-summary" class="red">&lt; Thu gọn</a></p>
                    <div class="pro_info-price-container">
                        <div class="spec-count" id="js-promotion-price-countdown"></div>
                        <table>
                            <tbody>
                                <tr>
                                    <td width="160px" class="font-500">Giá niêm yết:</td>
                                    <td>
                                        <del style="color: #888888;" class="font-500">{{ $price }} đ</del>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="160px" class="font-500">Giá khuyến mại:</td>
                                    <td>
                                        <b style="color: #ce0707" class="text-18 js-pro-total-price"
                                            data-price="42990000">
                                            {{ $dealprice }} đ
                                        </b>
                                        <span style="color: #888888;" class="text-12">
                                            [Giá đã có VAT]
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <span style="color: #0030f2;" class="font-500">👉Quét ZALOPAY - Giảm liền tay ưu
                                            đãi lên tới 150.000 VNĐ (Không áp dụng các sản phẩm của Apple-CPU). Áp dụng từ
                                            01/10/2024 đến 30/11/2024. <a
                                                href="https://www.anphatpc.com.vn/quet-zalopay-san-ngay-uu-dai.html"
                                                target="_blank">Xem chi tiết</a></span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="store-address-container">
                        <b class="d-block mb-2">
                            Bảo hành: 24 tháng (Pin 12 Tháng) Quốc Tế, Đổi mới trong 15 ngày
                        </b>
                    </div>

                    <div class="pro-variant-container">
                        <div class="variant-item" id="new-config-holder">
                            <div class="list items-variant items-variant-noSlider d-flex flex-wrap"></div>
                        </div>
                    </div>

                    <div class="pro-special-offer-container"></div>
                    <br>
                    <div class="pro-button-container d-flex flex-wrap text-center justify-content-between">
                        <a href="javascript:void(0)" class="w-100 btn-buyNow js-buy-now"
                            onclick="addConfigToShoppingCart(49891,0,1,'/cart')">
                            <b class="d-block text-18 font-500">ĐẶT MUA NGAY</b>
                            <span class="text-12 d-block">Nhanh chóng, thuận tiện</span>
                        </a>
                        <a href="javascript:void(0)" class="btn-addCart blue order-1 js-addCart"
                            onclick="document.getElementById('addCartForm').submit();">
                            <b class="d-block text-18 font-500">THÊM VÀO GIỎ HÀNG</b>
                            <span class="text-12 d-block">Mua tiếp sản phẩm khác</span>
                        </a>

                        <form id="addCartForm" action="{{ route('cart.add') }}" method="POST" style="display: none;">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $cooling_id }}">
                            <input type="hidden" name="product_type" value="cooling">
                            <input type="hidden" name="product_name" value="{{ $name }}">
                            <input type="hidden" name="quantity" value="1" min="1">
                        </form>
                        <a href="javascript:void(0)" class="btn-payinstall order-0 js-buy-tragop"
                            onclick="addConfigToShoppingCart(49891,0,1,'payinstall');">
                            <b class="d-block text-18 font-500">MUA TRẢ GÓP</b>
                            <span class="text-12 d-block">Thẻ tín dụng, Visa, Master</span>
                        </a>
                    </div>
                    <p class="blue icon-payment-container">
                        <b>Chấp nhận thanh toán:</b>
                        <i class="icon icon-payment"></i>
                    </p>
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
                                <li> <i class="fa fa-check"></i> <a
                                        href="https://www.anphatpc.com.vn/tin-khuyen-mai/huong-dan-dat-hang-flash-sale_idtin5339.html"
                                        target="blank">Hướng dẫn đặt hàng Flash Sale</a> </li>
                                <li> <i class="fa fa-check"></i> <a
                                        href="https://www.anphatpc.com.vn/huong-dan-dat-hang.html" target="blank">Hướng
                                        dẫn mua hàng</a> </li>
                                <li> <i class="fa fa-check"></i> <a
                                        href="https://www.anphatpc.com.vn/trung-tam-bao-hanh.html" target="blank">Chính
                                        sách bảo hành đổi trả</a> </li>
                                <li> <i class="fa fa-check"></i> <a href="https://www.anphatpc.com.vn/mua-tra-gop.html"
                                        target="blank">Chính sách mua trả góp</a> </li>
                                <li> <i class="fa fa-check"></i> <a href="https://www.anphatpc.com.vn/giao-hang.html"
                                        target="blank">Chính sách giao hàng</a> </li>
                                <li> <i class="fa fa-check"></i> <a
                                        href="https://www.anphatpc.com.vn/chinh-sach-bao-hanh-tan-nha.html"
                                        target="blank">Chính sách bảo hành tận nhà</a> </li>
                                <li> <i class="fa fa-check"></i> <a
                                        href="https://www.anphatpc.com.vn/phong-du-an-va-khach-hang-doanh-nghiep.html"
                                        target="blank">Hỗ trợ
                                        khách hàng dự án, doanh nghiệp </a> </li>
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
                <div style="display: none;" id="pro-spec">
                    <table style="width: 100.0%;" border="1" width="100%">
                        <tbody>
                            <tr>
                                <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                    <p><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">
                                            <strong><span style="line-height: 115%; color: black;">Hãng sản xuất</span></strong>
                                        </span>
                                    </p>
                                </td>
                                <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                                    <p style="text-align: center;">
                                        <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">
                                            <strong>
                                                <a href="https://www.anphatpc.com.vn/cooling-asus_dm1058.html">{{ $brand }}</a>
                                            </strong>
                                        </span>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                    <p><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">
                                            <strong><span style="line-height: 115%; color: black;">Tên sản phẩm</span></strong>
                                        </span>
                                    </p>
                                </td>
                                <td style="width: 578.2pt; padding: 0.75pt; text-align: center;" width="771">
                                    <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">
                                        <a href="https://www.anphatpc.com.vn/cooling-asus-rog-strix-g16-g614ji-n4125w.html" target="_blank">{{ $name }}</a>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                    <p><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">
                                            <strong><span style="line-height: 115%; color: black;">Loại làm mát</span></strong>
                                        </span>
                                    </p>
                                </td>
                                <td style="width: 578.2pt; padding: .75pt; text-align: center;" width="771">
                                    <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{ $cooling_type }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                    <p><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">
                                            <strong><span style="line-height: 115%; color: black;">Kích thước quạt</span></strong>
                                        </span>
                                    </p>
                                </td>
                                <td style="width: 578.2pt; padding: .75pt; text-align: center;" width="771">
                                    <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{ $fan_size }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                    <p><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">
                                            <strong><span style="line-height: 115%; color: black;">Độ ồn</span></strong>
                                        </span>
                                    </p>
                                </td>
                                <td style="width: 578.2pt; padding: .75pt; text-align: center;" width="771">
                                    <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{ $noise_level }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                    <p><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">
                                            <strong><span style="line-height: 115%; color: black;">Tốc độ quạt</span></strong>
                                        </span>
                                    </p>
                                </td>
                                <td style="width: 578.2pt; padding: .75pt; text-align: center;" width="771">
                                    <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{  $fan_speed }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                    <p><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">
                                            <strong><span style="line-height: 115%; color: black;">TDP hỗ trợ</span></strong>
                                        </span>
                                    </p>
                                </td>
                                <td style="width: 578.2pt; padding: .75pt; text-align: center;" width="771">
                                    <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{ $tdp_support }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                    <p><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">
                                            <strong><span style="line-height: 115%; color: black;">Kích thước</span></strong>
                                        </span>
                                    </p>
                                </td>
                                <td style="width: 578.2pt; padding: .75pt; text-align: center;" width="771">
                                    <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{ $dimensions }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                    <p><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">
                                            <strong><span style="line-height: 115%; color: black;">Tương thích socket</span></strong>
                                        </span>
                                    </p>
                                </td>
                                <td style="width: 578.2pt; padding: .75pt; text-align: center;" width="771">
                                    <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{ $socket_compatibility }}</span>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
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
        ->map(function ($name) use ($cooling) {
            $attribute = $cooling->attributes->firstWhere('name', $name);
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
    {{-- <script>
        // Xác định thời gian kết thúc (thời gian đích) - ví dụ là 1 giờ từ thời gian hiện tại
        const endTime = {{ $sale_end_time }} * 1000; // 1 giờ = 3600000 milliseconds

        // Cập nhật đồng hồ đếm ngược mỗi giây
        const countdown = setInterval(function() {
            const now = new Date().getTime();
            const timeLeft = endTime - now;

            // Tính giờ, phút và giây từ timeLeft
            const hours = Math.floor((timeLeft / (1000 * 60 * 60)) % 24);
            const minutes = Math.floor((timeLeft / (1000 * 60)) % 60);
            const seconds = Math.floor((timeLeft / 1000) % 60);

            // Hiển thị kết quả trong các phần tử tương ứng
            document.querySelector('.js-hour').innerText = String(hours).padStart(2, '0');
            document.querySelector('.js-minute').innerText = String(minutes).padStart(2, '0');
            document.querySelector('.js-seconds').innerText = String(seconds).padStart(2, '0');

            // Nếu thời gian kết thúc, dừng bộ đếm ngược
            if (timeLeft < 0) {
                clearInterval(countdown);
                document.querySelector('#js-deal-container').innerText = "Đã kết thúc";
            }
        }, 1000); // Cập nhật mỗi giây (1000 milliseconds)
    </script> --}}
@endpush

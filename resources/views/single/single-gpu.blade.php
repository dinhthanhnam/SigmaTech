@extends('layouts.app')
@php
    $gpu_id = $gpu->id;
    $name = $gpu->name;
    $brand = $gpu->attributes->firstWhere('name', 'Brand')->pivot->value ?? 'N/A';
    $model = $gpu->attributes->firstWhere('name', 'Model')->pivot->value ?? 'N/A';
    $price = $gpu->attributes->firstWhere('name', 'Price')->pivot->value ?? 'N/A';
    $dealprice = $gpu->attributes->firstWhere('name', 'Deal Price')->pivot->value ?? 'N/A';
    $rating = $gpu->attributes->firstWhere('name', 'Rating')->pivot->value ?? 'N/A';

    // Các thuộc tính GPU
     $memory= $gpu->attributes->firstWhere('name', '[GPU] Bộ nhớ')->pivot->value ?? 'N/A';
    $core_clock = $gpu->attributes->firstWhere('name', '[GPU] Core Clock')->pivot->value ?? 'N/A';
    $cores = $gpu->attributes->firstWhere('name', '[GPU] Lõi')->pivot->value ?? 'N/A';
    $memory_clock = $gpu->attributes->firstWhere('name', '[GPU] Clock bộ nhớ')->pivot->value ?? 'N/A';
    $memory_interface = $gpu->attributes->firstWhere('name', '[GPU] Giao diện bộ nhớ')->pivot->value ?? 'N/A';
    $max_resolution = $gpu->attributes->firstWhere('name', '[GPU] Độ phân giải')->pivot->value ?? 'N/A';
    $connectors = $gpu->attributes->firstWhere('name', '[GPU] Kết nối')->pivot->value ?? 'N/A';
    $dimensions = $gpu->attributes->firstWhere('name', '[GPU] Kích thước')->pivot->value ?? 'N/A';
    $recommended_psu = $gpu->attributes->firstWhere('name', '[GPU] PSU đề nghị')->pivot->value ?? 'N/A';
    $power_connectors = $gpu->attributes->firstWhere('name', '[GPU] Power Connectors')->pivot->value ?? 'N/A';
    $sli_support = $gpu->attributes->firstWhere('name', '[GPU] Hỗ trợ SLI')->pivot->value ?? 'N/A';
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
                            href="{{ url('/gpu/' . '/' . $brand) }}">{{ $gpu->attributes->firstWhere('id', '1')->pivot->value }}</a>
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
                                                        <a href="https://www.anphatpc.com.vn/laptop-asus_dm1058.html">{{ $brand }}</a>
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
                                                <a href="https://www.anphatpc.com.vn/laptop-asus-rog-strix-g16-g614ji-n4125w.html" target="_blank">{{ $name }}</a>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                            <p><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">
                                                    <strong><span style="line-height: 115%; color: black;">Bộ nhớ</span></strong>
                                                </span>
                                            </p>
                                        </td>
                                        <td style="width: 578.2pt; padding: .75pt; text-align: center;" width="771">
                                            <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{ $memory }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                            <p><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">
                                                    <strong><span style="line-height: 115%; color: black;">Core Clock</span></strong>
                                                </span>
                                            </p>
                                        </td>
                                        <td style="width: 578.2pt; padding: .75pt; text-align: center;" width="771">
                                            <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{ $core_clock }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                            <p><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">
                                                    <strong><span style="line-height: 115%; color: black;">Lõi</span></strong>
                                                </span>
                                            </p>
                                        </td>
                                        <td style="width: 578.2pt; padding: .75pt; text-align: center;" width="771">
                                            <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{ $cores }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                            <p><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">
                                                    <strong><span style="line-height: 115%; color: black;">Clock bộ nhớ</span></strong>
                                                </span>
                                            </p>
                                        </td>
                                        <td style="width: 578.2pt; padding: .75pt; text-align: center;" width="771">
                                            <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{ $memory_clock }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                            <p><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">
                                                    <strong><span style="line-height: 115%; color: black;">Giao diện bộ nhớ</span></strong>
                                                </span>
                                            </p>
                                        </td>
                                        <td style="width: 578.2pt; padding: .75pt; text-align: center;" width="771">
                                            <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{ $memory_interface }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                            <p><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">
                                                    <strong><span style="line-height: 115%; color: black;">Độ phân giải</span></strong>
                                                </span>
                                            </p>
                                        </td>
                                        <td style="width: 578.2pt; padding: .75pt; text-align: center;" width="771">
                                            <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{ $max_resolution }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                            <p><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">
                                                    <strong><span style="line-height: 115%; color: black;">Kết nối</span></strong>
                                                </span>
                                            </p>
                                        </td>
                                        <td style="width: 578.2pt; padding: .75pt; text-align: center;" width="771">
                                            <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{ $connectors }}</span>
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
                                                    <strong><span style="line-height: 115%; color: black;">PSU đề nghị</span></strong>
                                                </span>
                                            </p>
                                        </td>
                                        <td style="width: 578.2pt; padding: .75pt; text-align: center;" width="771">
                                            <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{ $recommended_psu }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                            <p><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">
                                                    <strong><span style="line-height: 115%; color: black;">Power Connectors</span></strong>
                                                </span>
                                            </p>
                                        </td>
                                        <td style="width: 578.2pt; padding: .75pt; text-align: center;" width="771">
                                            <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{ $power_connectors }}</span>
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
                        {{ $memory }} 
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
                            <i class="fa fa-check-circle"></i>Bộ nhớ: {{ $memory }}
                        </span>
                        <span class="item">
                            <i class="fa fa-check-circle"></i>Core Clock: {{ $core_clock }}
        
                        </span>
                        <span class="item">
                            <i class="fa fa-check-circle"></i>Số nhân CUDA: {{ $cores }}
        
                        </span>
                        <span class="item">
                            <i class="fa fa-check-circle"></i>Clock bộ nhớ: {{ $memory_clock }}
                        </span>
                        <span class="item hide d-block">
                            <i class="fa fa-check-circle"></i>Giao diện bộ nhớ {{ $memory_interface }}
                        </span>
                        <span class="item hide d-block">
                            <i class="fa fa-check-circle"></i>Độ phân giải: {{ $max_resolution }}
                        </span>
                        <span class="item hide d-block">
                            <i class="fa fa-check-circle"></i>Kết nối: {{ $connectors }}
                        </span>
                        <span class="item hide d-block">
                            <i class="fa fa-check-circle"></i>Kích thước:
                            {{ $dimensions }}
                        </span>
                        <span class="item hide d-block">
                            <i class="fa fa-check-circle"></i>PSU đề nghị: {{ $recommended_psu }}
                        </span>
                        <span class="item hide d-block">
                            <i class="fa fa-check-circle"></i>Nguồn: {{ $power_connectors }}
                        </span>
                        <span class="item hide d-block">
                            <i class="fa fa-check-circle"></i>Hỗ trợ SLI: {{ $sli_support }}
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
                            <input type="hidden" name="product_id" value="{{ $gpu_id }}">
                            <input type="hidden" name="product_type" value="gpu">
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
                                                <a href="https://www.anphatpc.com.vn/laptop-asus_dm1058.html">{{ $brand }}</a>
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
                                        <a href="https://www.anphatpc.com.vn/laptop-asus-rog-strix-g16-g614ji-n4125w.html" target="_blank">{{ $name }}</a>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                    <p><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">
                                            <strong><span style="line-height: 115%; color: black;">Bộ nhớ</span></strong>
                                        </span>
                                    </p>
                                </td>
                                <td style="width: 578.2pt; padding: .75pt; text-align: center;" width="771">
                                    <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{ $memory }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                    <p><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">
                                            <strong><span style="line-height: 115%; color: black;">Core Clock</span></strong>
                                        </span>
                                    </p>
                                </td>
                                <td style="width: 578.2pt; padding: .75pt; text-align: center;" width="771">
                                    <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{ $core_clock }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                    <p><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">
                                            <strong><span style="line-height: 115%; color: black;">Lõi</span></strong>
                                        </span>
                                    </p>
                                </td>
                                <td style="width: 578.2pt; padding: .75pt; text-align: center;" width="771">
                                    <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{ $cores }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                    <p><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">
                                            <strong><span style="line-height: 115%; color: black;">Clock bộ nhớ</span></strong>
                                        </span>
                                    </p>
                                </td>
                                <td style="width: 578.2pt; padding: .75pt; text-align: center;" width="771">
                                    <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{ $memory_clock }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                    <p><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">
                                            <strong><span style="line-height: 115%; color: black;">Giao diện bộ nhớ</span></strong>
                                        </span>
                                    </p>
                                </td>
                                <td style="width: 578.2pt; padding: .75pt; text-align: center;" width="771">
                                    <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{ $memory_interface }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                    <p><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">
                                            <strong><span style="line-height: 115%; color: black;">Độ phân giải</span></strong>
                                        </span>
                                    </p>
                                </td>
                                <td style="width: 578.2pt; padding: .75pt; text-align: center;" width="771">
                                    <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{ $max_resolution }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                    <p><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">
                                            <strong><span style="line-height: 115%; color: black;">Kết nối</span></strong>
                                        </span>
                                    </p>
                                </td>
                                <td style="width: 578.2pt; padding: .75pt; text-align: center;" width="771">
                                    <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{ $connectors }}</span>
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
                                            <strong><span style="line-height: 115%; color: black;">PSU đề nghị</span></strong>
                                        </span>
                                    </p>
                                </td>
                                <td style="width: 578.2pt; padding: .75pt; text-align: center;" width="771">
                                    <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{ $recommended_psu }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                    <p><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">
                                            <strong><span style="line-height: 115%; color: black;">Power Connectors</span></strong>
                                        </span>
                                    </p>
                                </td>
                                <td style="width: 578.2pt; padding: .75pt; text-align: center;" width="771">
                                    <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{ $power_connectors }}</span>
                                </td>
                            </tr>
                        </tbody>
                        
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script>
        const listImage = {
            anh_sp: [{
                    image: `https://anphat.com.vn/media/product/35621_product_1606829537a7c1043ecae4c427658234e19dcdf1e5.png`
                },
                {
                    image: `https://anphat.com.vn/media/product/35621_product_160687389023627e893ba99aa830d5a4f93dafb6b4.png`
                },
                {
                    image: `https://anphat.com.vn/media/product/35621_product_1606873892083b1c7a337f16ec20071c3408b15b0f.png`
                },
                {
                    image: `https://anphat.com.vn/media/product/35621_product_16068738925b25e7b328cf7e7eaca5d86f06599de6.png`
                },
                {
                    image: `https://anphat.com.vn/media/product/35621_product_16068738908cd568ef83d0797d67da2eeb5689a3c1.png`
                },
            ],
        }

        const listTab = [
            //{ key : "tinh_nang_noi_bat", title : " Tính năng nổi bật "},
            //{ key : "anh_mo_hop", title : " Ảnh mở hộp "},
            {
                key: "anh_sp",
                title: " Ảnh sản phẩm "
            },
            //}
        ]

        $(document).ready(function() {
            buildSliderImage('.box-anh-sp', listImage['anh_sp']);
        });

        function changeGallery(holder) {
            var name = $(holder).data('name');
            var key = $(holder).data('key');
            if (!$(holder).hasClass('active')) {
                $(".list-image-title .image-title-item").addClass("active").not(holder).removeClass("active");

                $('#box-open-gallery').attr('data-id', key);
                $("#box-open-gallery .btnname").html(name);
            }
            //xay lai html anh
            $('.box-anh-sp').empty();
            //console.log(key);
            buildSliderImage('.box-anh-sp', listImage[key]);
        }

        function buildTabs(key, data) {
            var html = ['<div class="box-gallery-tab" id="gallery-tabs">'];
            data.map(function(item, index) {
                var active = '';
                (item.key === key) ? active = 'active': '';
                return html.push('<div onclick="changeTabGallery(' + index + ', this)" class="tab ' + active +
                    '" id="tab-' + index + '" data-key="' + item.key + '">' + item.title + '</div>');
            })
            html.push('</div>');
            return html.join('');
        }

        function openVideoBox() {
            let key = 'video';
            let tabs = buildTabs(key, listTab);
            console.log(listImage[key][0].image)

            var imageHtml = '<iframe src="https://www.youtube.com/embed/' + listImage[key][0].image +
                '?rel=0&autoplay=1&mute=1" width="560" height="315" frameborder="0" allowfullscreen></iframe>';

            $('#box-gallery .tab-wrapper').html(tabs);
            $('#box-gallery .content-gallery').html(imageHtml);

            $('body').addClass('overflow-hidden');
            $('.button-buy-fixed-bottom').hide();
            $('#box-gallery').show();
        }

        function openBoxGallery(holder) {
            var id = $(holder).data('id');
            $('#box-gallery').show();
            $('#tab-' + id).addClass('active').not('#tab-' + id).removeClass("active");

            //build list anh fotorama
            var key = $(holder).attr('data-id');
            var tabs = buildTabs(key, listTab);

            var fotoramaHtml = buildFotoramaImage(listImage[key]);

            $("body").append(fotoramaHtml);


            // chay fotorama
            var fotorama = $('.fotorama')
                .on('fotorama:ready', function(e, fotorama) {

                    $(".fotorama__wrap").prepend(tabs)
                    $("#gallery-tabs").css("z-index", "1");
                    $(".fotorama--fullscreen").css("z-index", "999999999");
                    $(".fotorama__wrap").css("padding-top", "50px");

                    var stageH = $('.fotorama__stage').height();
                    $('.fotorama__stage').css('height', stageH - 50);
                })
                .on('fotorama:fullscreenexit', function(n, t) {
                    t.destroy();
                    $("#foto").remove();
                    $('body').removeClass('fullscreen');
                    closeGallery();
                })
                .fotorama({
                    allowfullscreen: true
                }).data('fotorama');
            fotorama.requestFullScreen();

            // end chay fotorama
        }

        function changeTabGallery(index, holder) {

            $("#gallery-tabs .tab").addClass("active").not(holder).removeClass("active");

            $(".list-image-title .image-title-item.active").length === 0 && $(".list-image-title .image-title-item").eq(
                index).addClass("active")


            // xoa fotorama
            $("#foto").data('fotorama').destroy()
            $("#foto").remove();
            //build lai hien thi anh

            var key = $(holder).attr('data-key');
            if (key == 'video') {
                var fotoramaHtml = buildVideo(listImage[key]);
            } else {
                var fotoramaHtml = buildFotoramaImage(listImage[key]);
            }


            var tabs = buildTabs(key, listTab);
            $("body").append(fotoramaHtml);
            // chay fotorama
            var fotorama = $('.fotorama')
                .on('fotorama:ready', function(e, fotorama) {

                    $(".fotorama__wrap").prepend(tabs)
                    $("#gallery-tabs").css("z-index", "1");
                    $(".fotorama--fullscreen").css("z-index", "999999999");
                    $(".fotorama__wrap").css("padding-top", "50px");

                    var stageH = $('.fotorama__stage').height();
                    $('.fotorama__stage').css('height', stageH - 50);
                })
                .on('fotorama:fullscreenexit', function(n, t) {
                    $('body').removeClass('fullscreen');

                    t.destroy();
                    $("#foto").remove();
                    closeGallery();
                })
                .fotorama({
                    allowfullscreen: true
                }).data('fotorama');
            fotorama.requestFullScreen();

            // end chay fotorama
        }

        function closeGallery() {
            $('#box-gallery').hide();
            $('body').removeClass('overflow-hidden');
        }

        function buildVideo(data) {

            var html = [
                '<div id="foto" class="fotorama" data-auto="false" data-autoplay="true" data-autoplay="3000" data-allowfullscreen="true" data-nav="thumbs" data-fit="scaledown" data-thumbwidth="100" data-arrows="always" data-click="true" data-swipe="true"  data-maxheight="500">'
            ]
            data.forEach(function(item) {
                html.push('<a href="https://www.youtube.com/embed/' + item.image +
                    '?rel=0&autoplay=1&mute=1" allow="autoplay" data-type="iframe" data-video="true" data-img="' +
                    item.image + '"><img src="http://img.youtube.com/vi/' + item.image + '/hqdefault.jpg"></a> '
                )
            })
            html.push('</div>')

            return html.join('');
        }

        function buildFotoramaImage(data) {
            var html = [
                '<div id="foto" class="fotorama" data-auto="false" data-allowfullscreen="true" data-nav="thumbs" data-fit="scaledown" data-thumbwidth="100" data-arrows="always" data-click="true" data-swipe="true"  data-maxheight="500">'
            ]
            data.forEach(function(item) {
                html.push('<img src="' + item.image + '" style="" >');
            })
            html.push('</div>')

            return html.join('')
        }

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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
    <script>
        // Khởi tạo Fancybox với các tùy chọn tùy chỉnh (không bắt buộc)
        Fancybox.bind("[data-fancybox]", {
            Toolbar: false,
            closeButton: "top",
            dragToClose: false,
            animated: true,
        });
    </script>
@endpush

@push('scripts')
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

            // 12/2021 thêm chức năng
            checkContentHeight(650);

            // kiểm tra hiển thị giá appay theo thời gian

            checkAllPriceDisplay();

            getListPhone('');

            searchDanhSachDangKy();

            calculateAddOnSelected(); // addon

            // 10-2020 -====- Đổi tab sản phẩm
            changeProductTab();

            calculatorVoucher();

            save_product_view_history('48568');

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

            $(window).scroll(function() {
                loadArtRelatedProduct();
            });
            // End 10-2020

            $('#img_thumb li').click(function() {
                $(this).addClass('current').siblings().removeClass('current');
                return false;
            });

            // Review - Comment
            $("#btn-open-rating-form").click(function() {
                $("#rating-content").focus();
                var top = $("#rating-content").offset().top;
                $("#review-bottom .rowr").show();
                $('html,body').animate({
                    scrollTop: top - 150
                }, 500);

                return false;
            });

            $("#review-bottom #rating-content").click(function() {
                $(".rowr").show();
                return false;
            });

            $('body').click(function(e) {
                var targ = $(".rating-form");
                if (!targ.is(e.target) && targ.has(e.target).length === 0) {
                    $(".rowr").fadeOut(300);
                }
            });

            $(".comment-form textarea").focus(function() {
                $(this).parent().find(".form-input").show();
            });


            // End Review - Comment


        });
    </script>
    <!-- Thêm CSS Fotorama -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet">
    <!-- Thêm JavaScript Fotorama -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script>
@endpush



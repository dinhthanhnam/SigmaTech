@extends('layouts.app')
@php
    $laptop_id = $laptop->id;
<<<<<<< HEAD
=======
    $name = $laptop->name;
>>>>>>> 30124982a380ea3fdf2ceebef69632b7993c4e06
    $type = $laptop->attributes->firstWhere('name', '[Laptop] Loại laptop')->pivot->value ?? 'N/A';
    $price = $laptop->attributes->firstWhere('name', 'Price')->pivot->value ?? 'N/A';
    $dealprice = $laptop->attributes->firstWhere('name', 'Deal Price')->pivot->value ?? 'N/A';
    $rating = $laptop->attributes->firstWhere('name', 'Rating')->pivot->value ?? 'N/A';
    $brand = $laptop->attributes->firstWhere('name', 'Brand')->pivot->value ?? 'N/A';
    $model = $laptop->attributes->firstWhere('name', 'Model')->pivot->value ?? 'N/A';
    $cpu = $laptop->attributes->firstWhere('name', '[Laptop] Vi xử lý')?->pivot->value ?? 'N/A';
    $cpu_core = $laptop->attributes->firstWhere('name', '[Laptop] Số nhân')?->pivot->value ?? 'N/A';
    $cpu_thread = $laptop->attributes->firstWhere('name', '[Laptop] Số luồng')?->pivot->value ?? 'N/A';
    $cpu_clock = $laptop->attributes->firstWhere('name', '[Laptop] Tốc độ tối đa')?->pivot->value ?? 'N/A';
    $cpu_cache = $laptop->attributes->firstWhere('name', '[Laptop] Bộ nhớ đệm')?->pivot->value ?? 'N/A';

    $gpu = $laptop->attributes->firstWhere('name', '[Laptop] Card đồ hoạ')?->pivot->value ?? 'N/A';
    $mon_size = $laptop->attributes->firstWhere('name', '[Laptop] Kích thước màn hình')?->pivot->value ?? 'N/A';
    $mon_res = $laptop->attributes->firstWhere('name', '[Laptop] Độ phân giải')?->pivot->value ?? 'N/A';
    $mon_refreshrate = $laptop->attributes->firstWhere('name', '[Laptop] Tần số quét')?->pivot->value ?? 'N/A';
    $mon_fea = $laptop->attributes->firstWhere('name', '[Laptop] Công nghệ màn hình')?->pivot->value ?? 'N/A';
    $color = $laptop->attributes->firstWhere('name', '[Laptop] Màu sắc')?->pivot->value ?? 'N/A';

    $ram = $laptop->attributes->firstWhere('name', '[Laptop] Dung lượng RAM')?->pivot->value ?? 'N/A';
    $ram_type = $laptop->attributes->firstWhere('name', '[Laptop] Loại RAM')?->pivot->value ?? 'N/A';
    $ram_bus = $laptop->attributes->firstWhere('name', '[Laptop] Bus RAM')?->pivot->value ?? 'N/A';

    $ssd = $laptop->attributes->firstWhere('name', '[Laptop] Ổ cứng')?->pivot->value ?? 'N/A';

    $pin = $laptop->attributes->firstWhere('name', '[Laptop] Pin')?->pivot->value ?? 'N/A';

    $weight = $laptop->attributes->firstWhere('name', '[Laptop] Cân nặng')?->pivot->value ?? 'N/A';

    $os = $laptop->attributes->firstWhere('name', '[Laptop] OS')?->pivot->value ?? 'N/A';

    $color = $laptop->attributes->firstWhere('name', '[Laptop] Màu sắc')?->pivot->value ?? 'N/A';
<<<<<<< HEAD
=======

    $camera = $laptop->attributes->firstWhere('name', '[Laptop] Camera')?->pivot->value ?? 'N/A';
>>>>>>> 30124982a380ea3fdf2ceebef69632b7993c4e06

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
                        <a href="{{ url('/laptops/' . $type) }}">Laptop {{ $type }} </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <a
                            href="{{ url('/laptops/' . $type . '/' . $brand) }}">{{ $laptop->attributes->firstWhere('id', '1')->pivot->value }}</a>
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
                                    <div class="owl-item" style="width: 380px; margin-right: 10px;">
                                        <div class="item" style="text-align:center"><img
                                                src="https://anphat.com.vn/media/product/49891_laptop_asus_rog_strix_g16_g614ji_n4125w__2_.jpg">
                                        </div>
                                    </div>
                                    <div class="owl-item" style="width: 380px; margin-right: 10px;">
                                        <div class="item" style="text-align:center"><img
                                                src="https://anphat.com.vn/media/product/49891_44497_1256nm__10_.jpg">
                                        </div>
                                    </div>
                                    <div class="owl-item" style="width: 380px; margin-right: 10px;">
                                        <div class="item" style="text-align:center"><img
                                                src="https://anphat.com.vn/media/product/49891_44497_1256nm__9_.jpg"> </div>
                                    </div>
                                    <div class="owl-item" style="width: 380px; margin-right: 10px;">
                                        <div class="item" style="text-align:center"><img
                                                src="https://anphat.com.vn/media/product/49891_44497_1256nm__8_.jpg"> </div>
                                    </div>
                                    <div class="owl-item" style="width: 380px; margin-right: 10px;">
                                        <div class="item" style="text-align:center"><img
                                                src="https://anphat.com.vn/media/product/49891_44497_1256nm__7_.jpg"> </div>
                                    </div>
                                    <div class="owl-item active" style="width: 380px; margin-right: 10px;">
                                        <div class="item" style="text-align:center"><img
                                                src="https://anphat.com.vn/media/product/49891_laptop_asus_rog_strix_g16_g614ji_n4125w__1_.jpg">
                                        </div>
                                    </div>
                                    <div class="owl-item" style="width: 380px; margin-right: 10px;">
                                        <div class="item" style="text-align:center"><img
                                                src="https://anphat.com.vn/media/product/49891_laptop_asus_rog_strix_g16_g614ji_n4125w__3_.jpg">
                                        </div>
                                    </div>
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
                                <img src="https://anphat.com.vn/media/product/75_49891_laptop_asus_rog_strix_g16_g614ji_n4125w__2_.jpg"
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
<<<<<<< HEAD

=======
>>>>>>> 30124982a380ea3fdf2ceebef69632b7993c4e06
                        <h2 class="title" style="font-size: 20px;text-align: center;font-weight: 700;margin-bottom: 10px;">
                            THÔNG SỐ KỸ THUẬT</h2>
                        <div class="item-content position-relative">
                            <table style="width: 100.0%;" border="1" width="100%">
                                <tbody>
                                    <tr>
                                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
<<<<<<< HEAD
                                            <p><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span
                                                            style="line-height: 115%; color: black;">Hãng sản
                                                            xuất</span></strong></span></p>
                                        </td>
                                        <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                                            <p style="text-align: center;"><span
                                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><a
                                                            href="https://www.anphatpc.com.vn/laptop-asus_dm1058.html">Laptop
                                                            Asus</a></strong></span>
=======
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
                                                        <a href="https://www.anphatpc.com.vn/laptop-asus_dm1058.html">
                                                            {{ $brand }}
                                                        </a>
                                                    </strong>
                                                </span>
>>>>>>> 30124982a380ea3fdf2ceebef69632b7993c4e06
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
<<<<<<< HEAD
                                            <p><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span
                                                            style="line-height: 115%; color: black;">Tên sản phẩm&nbsp;
                                                            &nbsp;</span></strong></span>
=======
                                            <p>
                                                <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">
                                                    <strong>
                                                        <span style="line-height: 115%; color: black;">Tên sản phẩm&nbsp;
                                                            &nbsp;
                                                        </span>
                                                    </strong>
                                                </span>
>>>>>>> 30124982a380ea3fdf2ceebef69632b7993c4e06
                                            </p>
                                        </td>
                                        <td style="width: 578.2pt; padding: 0.75pt; text-align: center;" width="771">
                                            <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><a
                                                    href="https://www.anphatpc.com.vn/laptop-asus-rog-strix-g16-g614ji-n4125w.html"
<<<<<<< HEAD
                                                    target="_blank">Laptop Asus ROG Strix G16 G614JI-N4125W</a></span>
=======
                                                    target="_blank">{{ $name }}</a></span>
>>>>>>> 30124982a380ea3fdf2ceebef69632b7993c4e06
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                            <p><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span
                                                            style="line-height: 115%; color: black;">Dòng
                                                            Laptop</span></strong></span></p>
                                        </td>
                                        <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                                            <p style="text-align: center;"><span
                                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><a
<<<<<<< HEAD
                                                        href="https://www.anphatpc.com.vn/may-tinh-xach-tay-laptop.html"><strong><span
                                                                style="line-height: 115%;">Laptop</span></strong></a><strong><span
                                                            style="line-height: 115%; color: black;">&nbsp;|&nbsp;<a
                                                                href="https://www.anphatpc.com.vn/republic-of-gamers_dm1062.html"
                                                                target="_blank">Asus
                                                                ROG
                                                                Series</a> |&nbsp;<a
                                                                href="https://www.anphatpc.com.vn/gaming-laptop.html"
                                                                target="_blank">Laptop Gaming</a>&nbsp;|&nbsp;<a
                                                                href="https://www.anphatpc.com.vn/laptop-cho-lap-trinh-vien.html"
                                                                target="_blank">Laptop
                                                                cho lập trình viên</a>&nbsp;</span></strong><span
                                                        style="line-height: 115%; color: black;"><br></span></span></p>
=======
                                                        href="#"></a><strong><span
                                                            style="line-height: 115%; color: black;">
                                                            <a href="#" target="_blank">Laptop {{$type}}
                                                              </a>
                                                            </span>
                                                          </strong>
                                                          </span>
                                                        </p>
>>>>>>> 30124982a380ea3fdf2ceebef69632b7993c4e06
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" colspan="2"
                                            width="303">
                                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span
                                                            style="color: black;">Bộ vi xử lý</span></strong><span
                                                        style="color: black;">&nbsp;</span></span></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                                    style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">Công
                                                    nghệ
                                                    CPU</span></p>
                                        </td>
                                        <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                                            <p style="margin: 0cm; margin-bottom: .0001pt; text-align: center;"><span
<<<<<<< HEAD
                                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Intel®
                                                    Core™
                                                    i7-13650HX&nbsp;Processor</span></p>
=======
                                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{$cpu}}</span></p>
>>>>>>> 30124982a380ea3fdf2ceebef69632b7993c4e06
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                                    style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">Số
                                                    nhân</span>
                                            </p>
                                        </td>
                                        <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                                            <p style="text-align: center;"><span
<<<<<<< HEAD
                                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">14</span>
=======
                                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{$cpu_core}}</span>
>>>>>>> 30124982a380ea3fdf2ceebef69632b7993c4e06
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                                    style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">Số
                                                    luồng</span>
                                            </p>
                                        </td>
                                        <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                                            <p style="margin: 0cm; margin-bottom: .0001pt; text-align: center;"><span
<<<<<<< HEAD
                                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">20</span>
=======
                                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{$cpu_thread}}</span>
>>>>>>> 30124982a380ea3fdf2ceebef69632b7993c4e06
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                                    style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">Tốc
                                                    độ tối
                                                    đa</span></p>
                                        </td>
                                        <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                                            <p style="text-align: center;"><span
<<<<<<< HEAD
                                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">upto
                                                    4.90 GHz</span></p>
=======
                                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{$cpu_clock}}</span></p>
>>>>>>> 30124982a380ea3fdf2ceebef69632b7993c4e06
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                                    style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">Bộ
                                                    nhớ
                                                    đệm</span></p>
                                        </td>
                                        <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                                            <p style="margin: 0cm; margin-bottom: .0001pt; text-align: center;"><span
<<<<<<< HEAD
                                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">24
                                                    MB</span></p>
=======
                                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{$cpu_cache}}</span></p>
>>>>>>> 30124982a380ea3fdf2ceebef69632b7993c4e06
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 806.65pt; padding: .75pt .75pt .75pt .75pt;" colspan="2"
                                            width="1076">
                                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span
                                                            style="color: black;">Bộ nhớ trong (RAM)</span></strong></span>
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                                    style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">RAM</span>
                                            </p>
                                        </td>
                                        <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                                            <p style="margin: 0cm; margin-bottom: .0001pt; text-align: center;"><span
<<<<<<< HEAD
                                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">16GB&nbsp;</span>
=======
                                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{$ram}}&nbsp;</span>
>>>>>>> 30124982a380ea3fdf2ceebef69632b7993c4e06
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                                    style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">Loại
                                                    RAM</span>
                                            </p>
                                        </td>
                                        <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                                            <p style="margin: 0cm; margin-bottom: .0001pt; text-align: center;"><span
<<<<<<< HEAD
                                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">DDR5</span>
=======
                                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{$ram_type}}</span>
>>>>>>> 30124982a380ea3fdf2ceebef69632b7993c4e06
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                                    style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">Tốc
                                                    độ Bus
                                                    RAM</span></p>
                                        </td>
                                        <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                                            <p style="text-align: center;"><span
<<<<<<< HEAD
                                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">4800Mhz</span>
=======
                                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{$ram_bus}}</span>
>>>>>>> 30124982a380ea3fdf2ceebef69632b7993c4e06
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                                    style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">Số
                                                    khe
                                                    cắm</span></p>
                                        </td>
                                        <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                                            <p style="text-align: center;"><span
                                                    style="line-height: 115%; font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">2
                                                    khe (đã sử dụng 1)</span></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                                    style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">Hỗ
                                                    trợ RAM
                                                    tối
                                                    đa</span></p>
                                        </td>
                                        <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                                            <p style="text-align: center;"><span
                                                    style="line-height: 115%; font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">&nbsp;Nâng
                                                    cấp&nbsp;tối đa 32GB</span></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 806.65pt; padding: .75pt .75pt .75pt .75pt;" colspan="2"
                                            width="1076">
                                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span
                                                            style="color: black;">Ổ cứng&nbsp;</span></strong></span></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                                    style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">Dung
                                                    lượng</span></p>
                                        </td>
                                        <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                                            <p style="margin: 0cm; margin-bottom: .0001pt; text-align: center;"><span
                                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong>512GB
                                                        SSD</strong>&nbsp;PCIe® 4.0 NVMe™ M.2</span></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                                    style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">Tốc
                                                    độ vòng
                                                    quay</span></p>
                                        </td>
                                        <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                                    style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">&nbsp;</span>
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span
                                                            style="color: black;">Khe cắm SSD mở
                                                            rộng</span></strong></span></p>
                                        </td>
                                        <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                                            <p style="margin: 0cm 0cm 0.0001pt; text-align: center;"><span
                                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">2
                                                    slots SSD PCIe (Đã sử
                                                    dụng
                                                    1)</span></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span
                                                            style="color: black;">Ổ đĩa quang
                                                            (ODD)&nbsp;</span></strong></span></p>
                                        </td>
                                        <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                                            <p style="margin: 0cm; margin-bottom: .0001pt; text-align: center;"><span
                                                    style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">Không
                                                    có</span>
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 806.65pt; padding: .75pt .75pt .75pt .75pt;" colspan="2"
                                            width="1076">
                                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span
                                                            style="color: black;">Màn hình</span></strong></span></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                                    style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">Kích
                                                    thước
                                                    màn
                                                    hình</span></p>
                                        </td>
                                        <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                                            <p style="margin: 0cm; margin-bottom: .0001pt; text-align: center;"><span
                                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">16-inch</span>
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                                    style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">Độ
                                                    phân
                                                    giải</span></p>
                                        </td>
                                        <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                                            <p style="margin: 0cm; margin-bottom: .0001pt; text-align: center;"><span
                                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">QHD+
                                                    (2560 x 1600,
                                                    WQXGA)</span></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                                    style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">Tần
                                                    số
                                                    quét</span></p>
                                        </td>
                                        <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                                            <p style="text-align: center;"><span
                                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">240Hz</span>
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                                    style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">Công
                                                    nghệ màn
                                                    hình</span></p>
                                        </td>
                                        <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                                            <p style="text-align: center;"><span
                                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">16:10,
                                                    3ms IPS-level, 500
                                                    nits, 100% DCI-P3, anti-glare display</span></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 806.65pt; padding: .75pt .75pt .75pt .75pt;" colspan="2"
                                            width="1076">
                                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span
                                                            style="color: black;">Đồ Họa (VGA)&nbsp;</span></strong></span>
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                                    style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">Card
                                                    màn
                                                    hình</span></p>
                                        </td>
                                        <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                                            <p style="margin: 0cm; margin-bottom: .0001pt; text-align: center;"><span
                                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">&nbsp;NVIDIA
                                                    GeForce&nbsp;RTX&nbsp;4070&nbsp;8GB GDDR6</span></p>
                                        </td>
                                    </tr>
                                    <tr>
<<<<<<< HEAD
                                        <td style="width: 806.65pt; padding: .75pt .75pt .75pt .75pt;" colspan="2"
                                            width="1076">
                                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span
                                                            style="color: black;">Kết nối
                                                            (Network)&nbsp;</span></strong></span></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                                    style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">Wireless</span>
                                            </p>
                                        </td>
                                        <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                                            <p style="margin: 0cm; margin-bottom: .0001pt; text-align: center;"><span
                                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Wi-Fi
                                                    6E(802.11ax) (Triple
                                                    band) 2*2</span></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                                    style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">LAN</span>
                                            </p>
                                        </td>
                                        <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                                            <p style="margin: 0cm 0cm 0.0001pt; text-align: center;"><span
                                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">1x
                                                    RJ45 LAN port</span></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                                    style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">Bluetooth</span>
                                            </p>
                                        </td>
                                        <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                                            <p style="margin: 0cm; margin-bottom: .0001pt; text-align: center;"><span
                                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">
                                                    Bluetooth 5.2</span></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 806.65pt; padding: .75pt .75pt .75pt .75pt;" colspan="2"
                                            width="1076">
                                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span
                                                            style="color: black;">Bàn phím ,
                                                            Chuột&nbsp;</span></strong></span></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                                    style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">Kiểu
                                                    bàn
                                                    phím</span></p>
                                        </td>
                                        <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                                            <p style="margin: 0cm; margin-bottom: .0001pt; text-align: center;"><span
                                                    style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">Bàn
                                                    phím tiêu
                                                    chuẩn -&nbsp;Backlit Chiclet Keyboard Per-Key RGB</span></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                                    style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">Chuột</span>
                                            </p>
                                        </td>
                                        <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                                            <p style="margin: 0cm; margin-bottom: .0001pt; text-align: center;"><span
                                                    style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">Cảm
                                                    ứng đa
                                                    điểm, numpad</span></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 806.65pt; padding: .75pt .75pt .75pt .75pt;" colspan="2"
                                            width="1076">
                                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span
                                                            style="color: black;">Giao tiếp mở
                                                            rộng&nbsp;</span></strong></span></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                                    style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">Kết
                                                    nối
                                                    USB</span></p>
                                        </td>
                                        <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                                            <p style="text-align: center;"><span
                                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">1x
                                                    Thunderbolt™ 4 support
                                                    DisplayPort™</span><br><span
                                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">1x
                                                    USB 3.2 Gen 2 Type-C
                                                    support DisplayPort™ / power delivery / G-SYNC</span><br><span
                                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">2x
                                                    USB 3.2 Gen 2
                                                    Type-A</span></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                                    style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">Kết
                                                    nối
                                                    HDMI/VGA</span></p>
                                        </td>
                                        <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                                            <p style="margin: 0cm; margin-bottom: .0001pt; text-align: center;"><span
                                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">1x
                                                    HDMI 2.1 FRL</span></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                                    style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">Tai
                                                    nghe</span>
                                            </p>
                                        </td>
                                        <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                                            <p style="margin: 0cm; margin-bottom: .0001pt; text-align: center;"><span
                                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">1x&nbsp;3.5mm&nbsp;Combo&nbsp;Audio&nbsp;Jack</span>
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
=======
>>>>>>> 30124982a380ea3fdf2ceebef69632b7993c4e06
                                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                                    style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">Camera</span>
                                            </p>
                                        </td>
                                        <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                                            <p style="margin: 0cm; margin-bottom: .0001pt; text-align: center;"><span
<<<<<<< HEAD
                                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">720P
                                                    HD camera</span></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                                    style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">Card
                                                    mở
                                                    rộng</span></p>
                                        </td>
                                        <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                                            <p style="margin: 0cm; margin-bottom: .0001pt; text-align: center;"><span
                                                    style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">-</span>
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span
                                                            style="color: black;">LOA</span></strong></span></p>
                                        </td>
                                        <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                                            <p style="margin: 0cm; margin-bottom: .0001pt; text-align: center;"><span
                                                    style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">2
                                                    Loa</span>
                                            </p>
=======
                                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{$camera}}</span></p>
>>>>>>> 30124982a380ea3fdf2ceebef69632b7993c4e06
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span
                                                            style="color: black;">Kiểu Pin</span></strong></span></p>
                                        </td>
                                        <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                                            <p style="margin: 0cm; margin-bottom: .0001pt; text-align: center;"><span
<<<<<<< HEAD
                                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">4-cell,
                                                    90WHrs</span></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span
                                                            style="color: black;">Sạc pin</span></strong></span></p>
                                        </td>
                                        <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                                            <p style="margin: 0cm; margin-bottom: .0001pt; text-align: center;"><span
                                                    style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">Đi
                                                    kèm</span>
                                            </p>
=======
                                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{$pin}}</span></p>
>>>>>>> 30124982a380ea3fdf2ceebef69632b7993c4e06
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span
                                                            style="color: black;">Hệ điều hành&nbsp;(bản quyền) đi
                                                            kèm&nbsp;</span></strong></span></p>
                                        </td>
                                        <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                                            <p style="margin: 0cm; margin-bottom: .0001pt; text-align: center;"><span
<<<<<<< HEAD
                                                    style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">Windows
                                                    11
                                                    Home</span></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span
                                                            style="color: black;">Kích thước (Dài x Rộng x
                                                            Cao)</span></strong></span></p>
                                        </td>
                                        <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                                            <p style="text-align: center;"><span
                                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">35.4
                                                    x 26.4 x 2.26 ~ 3.04
                                                    cm</span></p>
=======
                                                    style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">{{$os}}</span></p>
>>>>>>> 30124982a380ea3fdf2ceebef69632b7993c4e06
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span
                                                            style="color: black;">Trọng Lượng</span></strong></span></p>
                                        </td>
                                        <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                                            <p style="margin: 0cm; margin-bottom: .0001pt; text-align: center;"><span
<<<<<<< HEAD
                                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">2.50
                                                    Kg</span></p>
=======
                                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{$weight}}</span></p>
>>>>>>> 30124982a380ea3fdf2ceebef69632b7993c4e06
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span
                                                            style="color: black;">Màu sắc</span></strong></span></p>
                                        </td>
                                        <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                                            <p style="margin: 0cm; margin-bottom: .0001pt; text-align: center;"><span
<<<<<<< HEAD
                                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Eclipse
                                                    Gray</span></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span
                                                            style="color: black;">Xuất Xứ</span></strong></span></p>
                                        </td>
                                        <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                                            <p style="margin: 0cm; margin-bottom: .0001pt; text-align: center;"><span
                                                    style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">Trung
                                                    Quốc</span></p>
=======
                                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{$color}}</span></p>
>>>>>>> 30124982a380ea3fdf2ceebef69632b7993c4e06
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

<<<<<<< HEAD

                        <a href="javascript:void(0)" class="blue item-button" data-fancybox="" data-src="#pro-spec"> XEM
                            THÊM
                            THÔNG
                            SỐ <i class="fa fa-angle-double-down"></i></a>


=======
                        <a href="javascript:void(0)" class="blue item-button" data-fancybox="" data-src="#pro-spec"> XEM THÊM THÔNG SỐ <i class="fa fa-angle-double-down"></i></a>
>>>>>>> 30124982a380ea3fdf2ceebef69632b7993c4e06
                    </div>
                </div>

                <!-- pro-info-center -->
                <div class="pro-info-center">
<<<<<<< HEAD
                    <h1 class="pro-name js-product-name"> {{ $laptop->name }}
=======
                    <h1 class="pro-name js-product-name"> {{ $name }}
>>>>>>> 30124982a380ea3fdf2ceebef69632b7993c4e06
                        ( {{ $cpu }}
                        | {{ $gpu }}
                        | {{ $mon_size }}
                        | {{ $mon_res }}
                        | {{ $color }}
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
                            <i class="fa fa-check-circle"></i>CPU: {{ $cpu }}
                            ({{ $cpu_clock }}
                            , {{ $cpu_cache }})
                        </span>
                        <!--1-->
                        <span class="item ">
                            <i class="fa fa-check-circle"></i>VGA: {{ $gpu }}
                        </span>
                        <!--2-->
                        <span class="item ">
                            <i class="fa fa-check-circle"></i>Màn hình:
                            {{ $mon_size . ' ' . $mon_res . ' ' . $mon_refreshrate }}
                        </span>
                        <!--3-->
                        <span class="item ">
                            <i class="fa fa-check-circle"></i>RAM: {{ $ram . ' ' . $ram_type . '-' . $ram_bus }}
                        </span>
                        <!--4-->
                        <span class="item hide d-block">
                            <i class="fa fa-check-circle"></i>Ổ cứng: {{ $ssd }}
                        </span>
                        <!--5-->
                        <span class="item hide d-block">
                            <i class="fa fa-check-circle"></i>Pin: {{ $pin }}
                        </span>
                        <!--6-->
                        <span class="item hide d-block">
                            <i class="fa fa-check-circle"></i>Cân nặng: {{ $weight }}
                        </span>
                        <!--7-->
<<<<<<< HEAD
                        {{-- <span class="item hide d-block">
            <i class="fa fa-check-circle"></i>Tính năng: Đèn nền bàn phím Led RGB
          </span> --}}
=======
                        
>>>>>>> 30124982a380ea3fdf2ceebef69632b7993c4e06
                        <!--8-->
                        <span class="item hide d-block">
                            <i class="fa fa-check-circle"></i>Màu sắc: {{ $color }}
                        </span>
                        <!--9-->
                        <span class="item hide d-block">
                            <i class="fa fa-check-circle"></i>OS: {{ $os }}
                        </span>
                    </div>

                    <p><a href="javascript:void(0)" id="js-viewmore-summary" class="red">&lt; Thu gọn</a></p>
                    <div class="pro_info-price-container">
                        <div class="spec-count" id="js-promotion-price-countdown"> <!-- js countdown --></div>
                        <table>
                            <tbody>
                                <tr>
                                    <td width="160px" class="font-500"> Giá niêm yết: </td>
                                    <td>
                                        <del style="color: #888888;" class="font-500"> {{ $price }} đ </del>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="160px" class="font-500"> Giá khuyến mại: </td>
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
                                            đãi lên tới 150.000
                                            VNĐ (Không áp dụng các sản phẩm của Apple-CPU). Áp dụng từ 01/10/2024 đến
                                            30/11/2024. <a
                                                href="https://www.anphatpc.com.vn/quet-zalopay-san-ngay-uu-dai.html"
                                                target="_blank">Xem chi
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

                    <!-- Cấu hình -->
                    <div class="pro-variant-container">
                        <div class="variant-item" id="new-config-holder">
                            <div class="list items-variant items-variant-noSlider d-flex flex-wrap">
                            </div>
                        </div>
                    </div>
                    {{-- Khuyến mại - @Đinh Nam Nhớ làm --}}
                    <div class="pro-special-offer-container">
<<<<<<< HEAD
                        {{-- <div class="spec-title d-flex align-items-center justify-content-between">
              <div class="spec-price font-weight-bold">
                KHUYẾN MẠI
              </div>
              <div class="spec-count" id="js-promotion-price-countdown">
                <!-- js countdown -->
              </div>
            </div>
            <ul class="ul">
              <li>
                <span class="text" style="white-space: pre-line;">Tặng Thêm 1 năm bảo hành mở rộng tại Việt
                  Nam(PHDV0211). Áp dụng từ ngày 15.10.2024 tới 31.10.2024 hoặc đến khi hết gói bảo hành mà không cần báo
                  trước.</span>
              </li>
              <li>
                <span class="text" style="white-space: pre-line;">🎁Tặng Balo công nghệ ROG Ranger Backpack
                  16(BALO0012)
                  Trị giá 1,990,000 VND đến hết 31/10/2024.Xem chi tiết <a
                    href="https://www.anphatpc.com.vn/dai-tiec-rog-khai-deal-tuu-truong.html" target="_blank">
                    <font color="blue">tại đây</font>
                  </a></span>
              </li>
              <li>
                <span class="text" style="white-space: pre-line;">✦ Túi chống sốc (TUNB0007,TUNB0001)</span>
              </li>
            </ul> --}}
=======
                        
>>>>>>> 30124982a380ea3fdf2ceebef69632b7993c4e06
                    </div>
                    <br>
                    <!-- button -->
                    <div class="pro-button-container d-flex flex-wrap text-center justify-content-between">
                        <!-- Button Mua hàng -->
                        <a href="javascript:void(0)" class="w-100 btn-buyNow js-buy-now"
                            onclick="addConfigToShoppingCart(49891,0,1,'/cart')">
                            <b class="d-block text-18 font-500"> ĐẶT MUA NGAY </b>
                            <span class="text-12 d-block"> Nhanh chóng, thuận tiện </span>
                        </a>
                        <a href="javascript:void(0)" class="btn-addCart blue order-1 js-addCart"
                            onclick="addConfigToShoppingCart(49891,0,1);showCartSummary('.js-cart-count');">
<<<<<<< HEAD
                            <b class="d-block text-18 font-500"> THÊM VÀO GIỎ HÀNG </b>
=======
                            <b class="d-block text-18 font-500"> CHO VÀO GIỎ </b>
>>>>>>> 30124982a380ea3fdf2ceebef69632b7993c4e06
                            <span class="text-12 d-block"> Mua tiếp sản phẩm khác </span>
                        </a>
                        <!-- End Button Mua hàng -->
                        <!-- Button trả góp -->
                        <a href="javascript:void(0)" class="btn-payinstall order-0 js-buy-tragop"
                            onclick="addConfigToShoppingCart(49891,0,1,'payinstall');">
                            <b class="d-block text-18 font-500"> MUA TRẢ GÓP </b>
                            <span class="text-12 d-block"> Thẻ tín dụng, Visa, Master </span>
                        </a>
                        <!-- End Button trả góp -->
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
            </div>
        </div>
        <div style="display: none;" id="pro-spec">
<<<<<<< HEAD
            <table style="width: 100.0%;" border="1" width="100%">
                <tbody>
                    <tr>
                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                            <p><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span
                                            style="line-height: 115%; color: black;">Hãng sản xuất</span></strong></span>
                            </p>
                        </td>
                        <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                            <p style="text-align: center;"><span
                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><a
                                            href="https://www.anphatpc.com.vn/laptop-asus_dm1058.html">Laptop
                                            Asus</a></strong></span>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                            <p><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span
                                            style="line-height: 115%; color: black;">Tên sản phẩm&nbsp;
                                            &nbsp;</span></strong></span>
                            </p>
                        </td>
                        <td style="width: 578.2pt; padding: 0.75pt; text-align: center;" width="771"><span
                                style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><a
                                    href="https://www.anphatpc.com.vn/laptop-asus-rog-strix-g16-g614ji-n4125w.html"
                                    target="_blank">Laptop Asus ROG Strix G16 G614JI-N4125W</a></span></td>
                    </tr>
                    <tr>
                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                            <p><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span
                                            style="line-height: 115%; color: black;">Dòng Laptop</span></strong></span></p>
                        </td>
                        <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                            <p style="text-align: center;"><span
                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><a
                                        href="https://www.anphatpc.com.vn/may-tinh-xach-tay-laptop.html"><strong><span
                                                style="line-height: 115%;">Laptop</span></strong></a><strong><span
                                            style="line-height: 115%; color: black;">&nbsp;|&nbsp;<a
                                                href="https://www.anphatpc.com.vn/republic-of-gamers_dm1062.html"
                                                target="_blank">Asus
                                                ROG
                                                Series</a> |&nbsp;<a href="https://www.anphatpc.com.vn/gaming-laptop.html"
                                                target="_blank">Laptop Gaming</a>&nbsp;|&nbsp;<a
                                                href="https://www.anphatpc.com.vn/laptop-cho-lap-trinh-vien.html"
                                                target="_blank">Laptop
                                                cho lập trình viên</a>&nbsp;</span></strong><span
                                        style="line-height: 115%; color: black;"><br></span></span></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" colspan="2" width="303">
                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span
                                            style="color: black;">Bộ vi xử lý</span></strong><span
                                        style="color: black;">&nbsp;</span></span></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                    style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">Công
                                    nghệ
                                    CPU</span></p>
                        </td>
                        <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                            <p style="margin: 0cm; margin-bottom: .0001pt; text-align: center;"><span
                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Intel® Core™
                                    i7-13650HX&nbsp;Processor</span></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                    style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">Số
                                    nhân</span>
                            </p>
                        </td>
                        <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                            <p style="text-align: center;"><span
                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">14</span></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                    style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">Số
                                    luồng</span>
                            </p>
                        </td>
                        <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                            <p style="margin: 0cm; margin-bottom: .0001pt; text-align: center;"><span
                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">20</span></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                    style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">Tốc
                                    độ tối
                                    đa</span></p>
                        </td>
                        <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                            <p style="text-align: center;"><span
                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">upto 4.90
                                    GHz</span></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                    style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">Bộ
                                    nhớ
                                    đệm</span></p>
                        </td>
                        <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                            <p style="margin: 0cm; margin-bottom: .0001pt; text-align: center;"><span
                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">24 MB</span></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 806.65pt; padding: .75pt .75pt .75pt .75pt;" colspan="2" width="1076">
                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span
                                            style="color: black;">Bộ nhớ trong (RAM)</span></strong></span></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                    style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">RAM</span>
                            </p>
                        </td>
                        <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                            <p style="margin: 0cm; margin-bottom: .0001pt; text-align: center;"><span
                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">16GB&nbsp;</span>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                    style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">Loại
                                    RAM</span>
                            </p>
                        </td>
                        <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                            <p style="margin: 0cm; margin-bottom: .0001pt; text-align: center;"><span
                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">DDR5</span></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                    style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">Tốc
                                    độ Bus
                                    RAM</span></p>
                        </td>
                        <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                            <p style="text-align: center;"><span
                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">4800Mhz</span></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                    style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">Số
                                    khe
                                    cắm</span></p>
                        </td>
                        <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                            <p style="text-align: center;"><span
                                    style="line-height: 115%; font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">2
                                    khe (đã sử dụng 1)</span></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                    style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">Hỗ
                                    trợ RAM
                                    tối
                                    đa</span></p>
                        </td>
                        <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                            <p style="text-align: center;"><span
                                    style="line-height: 115%; font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">&nbsp;Nâng
                                    cấp&nbsp;tối đa 32GB</span></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 806.65pt; padding: .75pt .75pt .75pt .75pt;" colspan="2" width="1076">
                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span
                                            style="color: black;">Ổ cứng&nbsp;</span></strong></span></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                    style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">Dung
                                    lượng</span></p>
                        </td>
                        <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                            <p style="margin: 0cm; margin-bottom: .0001pt; text-align: center;"><span
                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong>512GB
                                        SSD</strong>&nbsp;PCIe® 4.0 NVMe™ M.2</span></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                    style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">Tốc
                                    độ vòng
                                    quay</span></p>
                        </td>
                        <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                    style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">&nbsp;</span>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span
                                            style="color: black;">Khe cắm SSD mở rộng</span></strong></span></p>
                        </td>
                        <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                            <p style="margin: 0cm 0cm 0.0001pt; text-align: center;"><span
                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">2 slots SSD PCIe
                                    (Đã sử
                                    dụng
                                    1)</span></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span
                                            style="color: black;">Ổ đĩa quang (ODD)&nbsp;</span></strong></span></p>
                        </td>
                        <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                            <p style="margin: 0cm; margin-bottom: .0001pt; text-align: center;"><span
                                    style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">Không
                                    có</span>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 806.65pt; padding: .75pt .75pt .75pt .75pt;" colspan="2" width="1076">
                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span
                                            style="color: black;">Màn hình</span></strong></span></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                    style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">Kích
                                    thước
                                    màn
                                    hình</span></p>
                        </td>
                        <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                            <p style="margin: 0cm; margin-bottom: .0001pt; text-align: center;"><span
                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">16-inch</span></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                    style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">Độ
                                    phân
                                    giải</span></p>
                        </td>
                        <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                            <p style="margin: 0cm; margin-bottom: .0001pt; text-align: center;"><span
                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">QHD+ (2560 x 1600,
                                    WQXGA)</span></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                    style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">Tần
                                    số
                                    quét</span></p>
                        </td>
                        <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                            <p style="text-align: center;"><span
                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">240Hz</span></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                    style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">Công
                                    nghệ màn
                                    hình</span></p>
                        </td>
                        <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                            <p style="text-align: center;"><span
                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">16:10, 3ms
                                    IPS-level, 500
                                    nits, 100% DCI-P3, anti-glare display</span></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 806.65pt; padding: .75pt .75pt .75pt .75pt;" colspan="2" width="1076">
                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span
                                            style="color: black;">Đồ Họa (VGA)&nbsp;</span></strong></span></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                    style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">Card
                                    màn
                                    hình</span></p>
                        </td>
                        <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                            <p style="margin: 0cm; margin-bottom: .0001pt; text-align: center;"><span
                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">&nbsp;NVIDIA
                                    GeForce&nbsp;RTX&nbsp;4070&nbsp;8GB GDDR6</span></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 806.65pt; padding: .75pt .75pt .75pt .75pt;" colspan="2" width="1076">
                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span
                                            style="color: black;">Kết nối (Network)&nbsp;</span></strong></span></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                    style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">Wireless</span>
                            </p>
                        </td>
                        <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                            <p style="margin: 0cm; margin-bottom: .0001pt; text-align: center;"><span
                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Wi-Fi 6E(802.11ax)
                                    (Triple
                                    band) 2*2</span></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                    style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">LAN</span>
                            </p>
                        </td>
                        <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                            <p style="margin: 0cm 0cm 0.0001pt; text-align: center;"><span
                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">1x RJ45 LAN
                                    port</span></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                    style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">Bluetooth</span>
                            </p>
                        </td>
                        <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                            <p style="margin: 0cm; margin-bottom: .0001pt; text-align: center;"><span
                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"> Bluetooth
                                    5.2</span></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 806.65pt; padding: .75pt .75pt .75pt .75pt;" colspan="2" width="1076">
                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span
                                            style="color: black;">Bàn phím , Chuột&nbsp;</span></strong></span></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                    style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">Kiểu
                                    bàn
                                    phím</span></p>
                        </td>
                        <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                            <p style="margin: 0cm; margin-bottom: .0001pt; text-align: center;"><span
                                    style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">Bàn
                                    phím tiêu
                                    chuẩn -&nbsp;Backlit Chiclet Keyboard Per-Key RGB</span></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                    style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">Chuột</span>
                            </p>
                        </td>
                        <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                            <p style="margin: 0cm; margin-bottom: .0001pt; text-align: center;"><span
                                    style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">Cảm
                                    ứng đa
                                    điểm, numpad</span></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 806.65pt; padding: .75pt .75pt .75pt .75pt;" colspan="2" width="1076">
                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span
                                            style="color: black;">Giao tiếp mở rộng&nbsp;</span></strong></span></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                    style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">Kết
                                    nối
                                    USB</span></p>
                        </td>
                        <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                            <p style="text-align: center;"><span
                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">1x Thunderbolt™ 4
                                    support
                                    DisplayPort™</span><br><span
                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">1x USB 3.2 Gen 2
                                    Type-C
                                    support DisplayPort™ / power delivery / G-SYNC</span><br><span
                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">2x USB 3.2 Gen 2
                                    Type-A</span></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                    style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">Kết
                                    nối
                                    HDMI/VGA</span></p>
                        </td>
                        <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                            <p style="margin: 0cm; margin-bottom: .0001pt; text-align: center;"><span
                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">1x HDMI 2.1
                                    FRL</span></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                    style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">Tai
                                    nghe</span>
                            </p>
                        </td>
                        <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                            <p style="margin: 0cm; margin-bottom: .0001pt; text-align: center;"><span
                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">1x&nbsp;3.5mm&nbsp;Combo&nbsp;Audio&nbsp;Jack</span>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                    style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">Camera</span>
                            </p>
                        </td>
                        <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                            <p style="margin: 0cm; margin-bottom: .0001pt; text-align: center;"><span
                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">720P HD
                                    camera</span></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                    style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">Card
                                    mở
                                    rộng</span></p>
                        </td>
                        <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                            <p style="margin: 0cm; margin-bottom: .0001pt; text-align: center;"><span
                                    style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">-</span>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span
                                            style="color: black;">LOA</span></strong></span></p>
                        </td>
                        <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                            <p style="margin: 0cm; margin-bottom: .0001pt; text-align: center;"><span
                                    style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">2
                                    Loa</span>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span
                                            style="color: black;">Kiểu Pin</span></strong></span></p>
                        </td>
                        <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                            <p style="margin: 0cm; margin-bottom: .0001pt; text-align: center;"><span
                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">4-cell,
                                    90WHrs</span></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span
                                            style="color: black;">Sạc pin</span></strong></span></p>
                        </td>
                        <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                            <p style="margin: 0cm; margin-bottom: .0001pt; text-align: center;"><span
                                    style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">Đi
                                    kèm</span>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span
                                            style="color: black;">Hệ điều hành&nbsp;(bản quyền) đi
                                            kèm&nbsp;</span></strong></span></p>
                        </td>
                        <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                            <p style="margin: 0cm; margin-bottom: .0001pt; text-align: center;"><span
                                    style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">Windows
                                    11
                                    Home</span></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span
                                            style="color: black;">Kích thước (Dài x Rộng x Cao)</span></strong></span></p>
                        </td>
                        <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                            <p style="text-align: center;"><span
                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">35.4 x 26.4 x 2.26
                                    ~ 3.04
                                    cm</span></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span
                                            style="color: black;">Trọng Lượng</span></strong></span></p>
                        </td>
                        <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                            <p style="margin: 0cm; margin-bottom: .0001pt; text-align: center;"><span
                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">2.50 Kg</span></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span
                                            style="color: black;">Màu sắc</span></strong></span></p>
                        </td>
                        <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                            <p style="margin: 0cm; margin-bottom: .0001pt; text-align: center;"><span
                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Eclipse
                                    Gray</span></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span
                                            style="color: black;">Xuất Xứ</span></strong></span></p>
                        </td>
                        <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                            <p style="margin: 0cm; margin-bottom: .0001pt; text-align: center;"><span
                                    style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">Trung
                                    Quốc</span></p>
                        </td>
                    </tr>
                </tbody>
            </table>
=======
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
                                    <a href="https://www.anphatpc.com.vn/laptop-asus_dm1058.html">
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
                                href="https://www.anphatpc.com.vn/laptop-asus-rog-strix-g16-g614ji-n4125w.html"
                                target="_blank">{{ $name }}</a></span>
                    </td>
                </tr>
                <tr>
                    <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                        <p><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span
                                        style="line-height: 115%; color: black;">Dòng
                                        Laptop</span></strong></span></p>
                    </td>
                    <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                        <p style="text-align: center;"><span
                                style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><a
                                    href="#"></a><strong><span
                                        style="line-height: 115%; color: black;">
                                        <a href="#" target="_blank">Laptop {{$type}}
                                          </a>
                                        </span>
                                      </strong>
                                      </span>
                                    </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" colspan="2"
                        width="303">
                        <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span
                                        style="color: black;">Bộ vi xử lý</span></strong><span
                                    style="color: black;">&nbsp;</span></span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                        <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">Công
                                nghệ
                                CPU</span></p>
                    </td>
                    <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                        <p style="margin: 0cm; margin-bottom: .0001pt; text-align: center;"><span
                                style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{$cpu}}</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                        <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">Số
                                nhân</span>
                        </p>
                    </td>
                    <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                        <p style="text-align: center;"><span
                                style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{$cpu_core}}</span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                        <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">Số
                                luồng</span>
                        </p>
                    </td>
                    <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                        <p style="margin: 0cm; margin-bottom: .0001pt; text-align: center;"><span
                                style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{$cpu_thread}}</span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                        <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">Tốc
                                độ tối
                                đa</span></p>
                    </td>
                    <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                        <p style="text-align: center;"><span
                                style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{$cpu_clock}}</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                        <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">Bộ
                                nhớ
                                đệm</span></p>
                    </td>
                    <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                        <p style="margin: 0cm; margin-bottom: .0001pt; text-align: center;"><span
                                style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{$cpu_cache}}</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 806.65pt; padding: .75pt .75pt .75pt .75pt;" colspan="2"
                        width="1076">
                        <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span
                                        style="color: black;">Bộ nhớ trong (RAM)</span></strong></span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                        <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">RAM</span>
                        </p>
                    </td>
                    <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                        <p style="margin: 0cm; margin-bottom: .0001pt; text-align: center;"><span
                                style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{$ram}}&nbsp;</span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                        <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">Loại
                                RAM</span>
                        </p>
                    </td>
                    <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                        <p style="margin: 0cm; margin-bottom: .0001pt; text-align: center;"><span
                                style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{$ram_type}}</span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                        <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">Tốc
                                độ Bus
                                RAM</span></p>
                    </td>
                    <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                        <p style="text-align: center;"><span
                                style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{$ram_bus}}</span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                        <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">Số
                                khe
                                cắm</span></p>
                    </td>
                    <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                        <p style="text-align: center;"><span
                                style="line-height: 115%; font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">2
                                khe (đã sử dụng 1)</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                        <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">Hỗ
                                trợ RAM
                                tối
                                đa</span></p>
                    </td>
                    <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                        <p style="text-align: center;"><span
                                style="line-height: 115%; font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">&nbsp;Nâng
                                cấp&nbsp;tối đa 32GB</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 806.65pt; padding: .75pt .75pt .75pt .75pt;" colspan="2"
                        width="1076">
                        <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span
                                        style="color: black;">Ổ cứng&nbsp;</span></strong></span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                        <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">Dung
                                lượng</span></p>
                    </td>
                    <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                        <p style="margin: 0cm; margin-bottom: .0001pt; text-align: center;"><span
                                style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong>512GB
                                    SSD</strong>&nbsp;PCIe® 4.0 NVMe™ M.2</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                        <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">Tốc
                                độ vòng
                                quay</span></p>
                    </td>
                    <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                        <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">&nbsp;</span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                        <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span
                                        style="color: black;">Khe cắm SSD mở
                                        rộng</span></strong></span></p>
                    </td>
                    <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                        <p style="margin: 0cm 0cm 0.0001pt; text-align: center;"><span
                                style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">2
                                slots SSD PCIe (Đã sử
                                dụng
                                1)</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                        <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span
                                        style="color: black;">Ổ đĩa quang
                                        (ODD)&nbsp;</span></strong></span></p>
                    </td>
                    <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                        <p style="margin: 0cm; margin-bottom: .0001pt; text-align: center;"><span
                                style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">Không
                                có</span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 806.65pt; padding: .75pt .75pt .75pt .75pt;" colspan="2"
                        width="1076">
                        <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span
                                        style="color: black;">Màn hình</span></strong></span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                        <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">Kích
                                thước
                                màn
                                hình</span></p>
                    </td>
                    <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                        <p style="margin: 0cm; margin-bottom: .0001pt; text-align: center;"><span
                                style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">16-inch</span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                        <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">Độ
                                phân
                                giải</span></p>
                    </td>
                    <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                        <p style="margin: 0cm; margin-bottom: .0001pt; text-align: center;"><span
                                style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">QHD+
                                (2560 x 1600,
                                WQXGA)</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                        <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">Tần
                                số
                                quét</span></p>
                    </td>
                    <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                        <p style="text-align: center;"><span
                                style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">240Hz</span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                        <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">Công
                                nghệ màn
                                hình</span></p>
                    </td>
                    <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                        <p style="text-align: center;"><span
                                style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">16:10,
                                3ms IPS-level, 500
                                nits, 100% DCI-P3, anti-glare display</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 806.65pt; padding: .75pt .75pt .75pt .75pt;" colspan="2"
                        width="1076">
                        <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span
                                        style="color: black;">Đồ Họa (VGA)&nbsp;</span></strong></span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                        <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">Card
                                màn
                                hình</span></p>
                    </td>
                    <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                        <p style="margin: 0cm; margin-bottom: .0001pt; text-align: center;"><span
                                style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">&nbsp;NVIDIA
                                GeForce&nbsp;RTX&nbsp;4070&nbsp;8GB GDDR6</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                        <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">Camera</span>
                        </p>
                    </td>
                    <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                        <p style="margin: 0cm; margin-bottom: .0001pt; text-align: center;"><span
                                style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{$camera}}</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                        <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span
                                        style="color: black;">Kiểu Pin</span></strong></span></p>
                    </td>
                    <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                        <p style="margin: 0cm; margin-bottom: .0001pt; text-align: center;"><span
                                style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{$pin}}</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                        <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span
                                        style="color: black;">Hệ điều hành&nbsp;(bản quyền) đi
                                        kèm&nbsp;</span></strong></span></p>
                    </td>
                    <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                        <p style="margin: 0cm; margin-bottom: .0001pt; text-align: center;"><span
                                style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">{{$os}}</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                        <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span
                                        style="color: black;">Trọng Lượng</span></strong></span></p>
                    </td>
                    <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                        <p style="margin: 0cm; margin-bottom: .0001pt; text-align: center;"><span
                                style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{$weight}}</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                        <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span
                                        style="color: black;">Màu sắc</span></strong></span></p>
                    </td>
                    <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                        <p style="margin: 0cm; margin-bottom: .0001pt; text-align: center;"><span
                                style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{$color}}</span></p>
                    </td>
                </tr>
            </tbody>
        </table>
>>>>>>> 30124982a380ea3fdf2ceebef69632b7993c4e06
        </div>

    </section>
@endsection
@push('scripts')
    <script>
        const listImage = {
            anh_sp: [{
                    image: `https://anphat.com.vn/media/product/47463_laptop_lenovo_legion_pro_5_16irx9_83df0047vn__intel_core_i9_14900hx__4_.jpg`
                },

                {
                    image: `https://anphat.com.vn/media/product/47463_laptop_lenovo_legion_pro_5_16irx9_83df0047vn__intel_core_i9_14900hx__1_.jpg`
                },

                {
                    image: `https://anphat.com.vn/media/product/47463_laptop_lenovo_legion_pro_5_16irx9_83df0047vn__intel_core_i9_14900hx__3_.jpg`
                },

                {
                    image: `https://anphat.com.vn/media/product/47463_laptop_lenovo_legion_pro_5_16irx9_83df0047vn__intel_core_i9_14900hx__2_.jpg`
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
@endpush

@extends('layouts.app')
@php
    $laptop_id = $laptop->id;
    $name = $laptop->name;
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
    $ram_slots = $laptop->attributes->firstWhere('name', '[Laptop] Số khe cắm RAM')?->pivot->value ?? 'N/A';
    $ram_max = $laptop->attributes->firstWhere('name', '[Laptop] Hỗ trợ RAM tối đa')?->pivot->value ?? 'N/A';

    $ssd = $laptop->attributes->firstWhere('name', '[Laptop] Ổ cứng')?->pivot->value ?? 'N/A';
    $ssd_slots = $laptop->attributes->firstWhere('name', '[Laptop] Số khe ổ cứng')?->pivot->value ?? 'N/A';

    $pin = $laptop->attributes->firstWhere('name', '[Laptop] Pin')?->pivot->value ?? 'N/A';

    $weight = $laptop->attributes->firstWhere('name', '[Laptop] Cân nặng')?->pivot->value ?? 'N/A';

    $os = $laptop->attributes->firstWhere('name', '[Laptop] OS')?->pivot->value ?? 'N/A';

    $color = $laptop->attributes->firstWhere('name', '[Laptop] Màu sắc')?->pivot->value ?? 'N/A';

    $camera = $laptop->attributes->firstWhere('name', '[Laptop] Camera')?->pivot->value ?? 'N/A';

    $saleprice = $laptop->attributes->firstWhere('name', 'Sale Price')->pivot->value ?? 'N/A';
    $sale_start_date = $laptop->attributes->firstWhere('name', 'Sale Start Date')->pivot->value ?? 'N/A';
    $sale_end_date = $laptop->attributes->firstWhere('name', 'Sale End Date')->pivot->value ?? 'N/A';
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
                        <a href="/laptops/{{ $type }}">Laptop {{ $type }} </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <a href="/laptops/{{ $type }}/{{ $brand }}}">{{ $brand }}</a>
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
                                <img src="{{ $laptop->attributes->firstWhere('name', 'Thumbnail Small')->pivot->value ?? 'N/A' }}"
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
                                                            <a href="#" target="_blank">Laptop {{ $type }}
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
                                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{ $cpu }}</span>
                                            </p>
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
                                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{ $cpu_core }}</span>
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
                                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{ $cpu_thread }}</span>
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
                                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{ $cpu_clock }}</span>
                                            </p>
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
                                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{ $cpu_cache }}</span>
                                            </p>
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
                                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{ $ram }}&nbsp;</span>
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
                                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{ $ram_type }}</span>
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
                                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{ $ram_bus }}</span>
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
                                                    style="line-height: 115%; font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">
                                                    {{ $ram_slots }}</span></p>
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
                                                    style="line-height: 115%; font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">{{ $ram_max }}</span>
                                            </p>
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
                                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{ $ssd }}</span>
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
                                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{ $ssd_slots }}</span>
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
                                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{ $mon_size }}</span>
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
                                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{ $mon_res }}</span>
                                            </p>
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
                                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{ $mon_refreshrate }}</span>
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
                                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{ $mon_fea }}</span>
                                            </p>
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
                                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{ $gpu }}</span>
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                                    style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;"><strong>Camera</strong></span>
                                            </p>
                                        </td>
                                        <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                                            <p style="margin: 0cm; margin-bottom: .0001pt; text-align: center;"><span
                                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{ $camera }}</span>
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
                                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{ $pin }}</span>
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
                                                    style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">{{ $os }}</span>
                                            </p>
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
                                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{ $weight }}</span>
                                            </p>
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
                                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{ $color }}</span>
                                            </p>
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
                        <span class="item hide d-block">
                            <i class="fa fa-check-circle"></i>Màu sắc: {{ $color }}
                        </span>
                        <!--9-->
                        <span class="item hide d-block">
                            <i class="fa fa-check-circle"></i>OS: {{ $os }}
                        </span>
                    </div>
                    <p><a href="javascript:void(0)" id="js-viewmore-summary" class="red">&lt; Thu gọn</a></p>
                    @if ($saleprice != 'N/A' && now()->lessThan(Carbon\Carbon::parse($sale_end_date)))
                        <div class="deal-count-container text-12 font-300 text-right" id="js-deal-container">Kết thúc sau
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
                    <br>
                    <!-- button -->
                    <div class="pro-button-container d-flex flex-wrap text-center justify-content-between">
                        <!-- Button Mua hàng -->
                        <a href="javascript:void(0)" class="w-49 btn-buyNow js-buy-now"
                            onclick="addConfigToShoppingCart(49891,0,1,'/cart')">
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
                            <input type="hidden" name="product_id" value="{{ $laptop_id }}">
                            <input type="hidden" name="product_type" value="laptop">
                            <input type="hidden" name="product_name" value="{{ $name }}">
                            <input type="hidden" name="quantity" value="1" min="1">
                        </form>

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
                                        href="#"></a><strong><span style="line-height: 115%; color: black;">
                                            <a href="#" target="_blank">Laptop {{ $type }}
                                            </a>
                                        </span>
                                    </strong>
                                </span>
                            </p>
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
                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{ $cpu }}</span>
                            </p>
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
                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{ $cpu_core }}</span>
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
                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{ $cpu_thread }}</span>
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
                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{ $cpu_clock }}</span>
                            </p>
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
                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{ $cpu_cache }}</span>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 806.65pt; padding: .75pt .75pt .75pt .75pt;" colspan="2" width="1076">
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
                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{ $ram }}&nbsp;</span>
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
                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{ $ram_type }}</span>
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
                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{ $ram_bus }}</span>
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
                                    style="line-height: 115%; font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">
                                    {{ $ram_slots }}</span></p>
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
                                    style="line-height: 115%; font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">{{ $ram_max }}</span>
                            </p>
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
                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{ $ssd }}</span>
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
                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{ $ssd_slots }}</span>
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
                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{ $mon_size }}</span>
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
                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{ $mon_res }}</span>
                            </p>
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
                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{ $mon_refreshrate }}</span>
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
                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{ $mon_fea }}</span>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 806.65pt; padding: .75pt .75pt .75pt .75pt;" colspan="2" width="1076">
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
                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{ $gpu }}</span>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 226.95pt; padding: .75pt .75pt .75pt .75pt;" width="303">
                            <p style="margin: 0cm; margin-bottom: .0001pt;"><span
                                    style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;"><strong>Camera</strong></span>
                            </p>
                        </td>
                        <td style="width: 578.2pt; padding: .75pt .75pt .75pt .75pt;" width="771">
                            <p style="margin: 0cm; margin-bottom: .0001pt; text-align: center;"><span
                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{ $camera }}</span>
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
                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{ $pin }}</span>
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
                                    style="font-family: arial, helvetica, sans-serif; color: black; font-size: 10pt;">{{ $os }}</span>
                            </p>
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
                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{ $weight }}</span>
                            </p>
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
                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">{{ $color }}</span>
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </section>
@endsection
@php
    $images = collect(['Image1', 'Image2', 'Image3', 'Image4', 'Image5'])
        ->map(function ($name) use ($laptop) {
            $attribute = $laptop->attributes->firstWhere('name', $name);
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
    </script>
@endpush

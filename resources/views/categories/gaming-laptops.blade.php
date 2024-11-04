@extends('layouts.app')
@section('content')
  <section class="product-page">
    <div class="container">
      <div aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="{{ route('home.index') }}">
              <i class="fa fa-home"></i> Trang chủ
            </a>
          </li>
          <li class="breadcrumb-item" aria-current="page">
            <a href="{{ url('/laptops/Gaming') }}">Laptop </a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">
            <a href="{{ url('/laptops/Gaming') }}">Gaming </a>
          </li>
        </ol>
      </div>
      
      <div class="product-collection-related-container">
        <div class="group-title">
          <h2 class="title">Laptop Gaming Được Mua Nhiều Nhất 2024</h2>
        </div>
        <!-- Thêm sản phẩm được mua nhiều nhất vào đây-->
      </div>
      <div class="p-container bg-white js-box-container" style="min-height: 400px" data-id="395-850">
        <div class="container custom-nav owl-carousel owl-theme" >
          @foreach($gamingLaptops as $laptop)
            @include('partials.detailed-p-item', ['product' => $laptop])
          @endforeach
        </div>
      </div>
        
      <div class="product-collection-related-container">
        <div class="filter-height" style="display: none;"></div>
      <div class="filter-container">
        <p class="filter-group-title"> BỘ LỌC </p>
        <div class="filter-list-container">
          <div class="filter-item js-filter-item" data-type="brand">
            <a href="#" class="filter-name"> Hãng </a>
            <div class="filter-content-group">
              <div class="filter-group-middle">
                <a href="#" class="image filter-title js-filter-title" title="Acer" data-check="0"
                  data-filter_code="brand" data-value="acer">
                  <span style="background-image: url('{{ asset('assets/img/brand/acer.jpg') }}');"></span>
                </a>
                <a href="#" class="image filter-title js-filter-title" title="Asus" data-check="0"
                  data-filter_code="brand" data-value="asus">
                  <span style="background-image: url('{{ asset('assets/img/brand/asus.jpg') }}');"></span>
                </a>
                <a href="#" class="image filter-title js-filter-title" title="Dell" data-check="0"
                  data-filter_code="brand" data-value="levono">
                  <span style="background-image: url('{{ asset('assets/img/brand/lenovo.jpg') }}');"></span>
                </a>
                <a href="#" class="image filter-title js-filter-title" title="Lenovo" data-check="0"
                  data-filter_code="brand" data-value="dell">
                  <span style="background-image: url('{{ asset('assets/img/brand/dell.jpg') }}');"></span>
                </a>
              </div>
              <div class="filter-group-bottom">
                <a href="#" onclick=""> Bỏ chọn </a>
                <a href="#" class="js-open-url"> Xem kết quả </a>
              </div>
            </div>
          </div>
          <div class="filter-item js-filter-item" data-type="price">
            <a href="#" class="filter-name "> Giá </a>
            <div class="filter-content-group">
              <div class="filter-group-middle ">
                <a href="#" class="filter-title js-filter-title" data-filter_code="price"
                  data-value="min=0&max=15000000"> Dưới 15 triệu </a>
                <a href="#" class="filter-title js-filter-title" data-filter_code="price"
                  data-value="min=15000000&max=20000000"> 15 triệu - 20 triệu </a>
                <a href="#" class="filter-title js-filter-title" data-filter_code="price"
                  data-value="min=20000000&max=25000000"> 20 triệu - 25 triệu </a>
                <a href="#" class="filter-title js-filter-title" data-filter_code="price"
                  data-value="min=25000000&max=30000000"> 25 triệu - 30 triệu </a>
                <a href="#" class="filter-title js-filter-title" data-filter_code="price"
                  data-value="min=30000000&max=35000000"> 30 triệu - 35 triệu </a>
                <a href="#" class="filter-title js-filter-title" data-filter_code="price"
                  data-value="min=35000000&max=40000000"> 35 triệu - 40 triệu </a>
                <a href="#" class="filter-title js-filter-title" data-filter_code="price"
                  data-value="min=40000000&max=50000000"> 40 triệu - 50 triệu </a>
                <a href="#" class="filter-title js-filter-title" data-filter_code="price"
                  data-value="min=50000000&max=60000000"> 50 triệu - 60 triệu </a>
                <a href="#" class="filter-title js-filter-title" data-filter_code="price"
                  data-value="min=60000000&max=0"> Trên 60 triệu </a>
              </div>
              <div class="filter-group-bottom">
                <a href="#" onclick=""> Bỏ chọn </a>
                <a href="#" class="js-open-url"> Xem <span class="js-show-total">381</span> kết
                  quả </a>
              </div>
            </div>
          </div>

          <div class="filter-item js-filter-item" data-type="attribute">
            <a href="#" class="filter-name "> Bộ vi xử lý </a>

            <div class="filter-content-group">

              <div class="filter-group-middle ">

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="322">
                  Core i3 </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="156">
                  Core i5 </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="157">
                  Core i7 </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="2495">
                  Core i9 </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="178">
                  AMD </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="2553">
                  Ryzen 5 </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="2554">
                  Ryzen 7 </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="2920">
                  Ryzen 9 </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3660">
                  8845HS </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3583">
                  Apple M3 Pro </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3757">
                  8645HS </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3625">
                  13420H </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3679">
                  13500H </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3646">
                  7535HS </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3751">
                  8945HS </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3614">
                  1235U </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3664">
                  12450H </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3590">
                  Apple M3 Max </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3641">
                  1165G7 </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3760">
                  AMD Ryzen AI 9 HX 370 </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3746">
                  125H </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3626">
                  13620H </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3707">
                  8945H </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3609">
                  13450HX </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3636">
                  14650HX </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3752">
                  155U </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3729">
                  Intel Core 7 150U </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3615">
                  1135G7 </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3665">
                  12500H </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3596">
                  Core Ultra 5 </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3643">
                  12450HX </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3748">
                  7735HS </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3627">
                  13700H </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3708">
                  185H </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3610">
                  1360P </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3651">
                  Core Ultra 9 </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3637">
                  1315U </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3753">
                  7435HS </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3740">
                  13900H </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3617">
                  1355U </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3598">
                  Core Ultra 7 </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3644">
                  5700U </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3629">
                  14900HX </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3658">
                  14700HX </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3582">
                  Apple M3 </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3638">
                  13650HX </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3618">
                  11500H </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3671">
                  1334U </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3645">
                  155H </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3613">
                  1335U </a>

              </div>

              <div class="filter-group-bottom">
                <a href="#" onclick="BuildFilterUrl.clearFilter.call(this, '')"> Bỏ chọn </a>
                <a href="/gaming-laptop.html" class="js-open-url"> Xem <span class="js-show-total">381</span> kết quả
                </a>
              </div>
            </div>
          </div>

          <div class="filter-item js-filter-item" data-type="attribute">
            <a href="#" class="filter-name "> Kích thước màn hình </a>

            <div class="filter-content-group">

              <div class="filter-group-middle ">

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="187">
                  13.3 inch </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="2944">
                  13.4 inch </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="182">
                  14.0 inch </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3227">
                  14.2 inch </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3028">
                  14.5 inch </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="183">
                  15.6 inch </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="2868">
                  16 inch </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3014">
                  16.1 inch </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="184">
                  17.0 inch </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="1645">
                  17.3 inch </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3423">
                  16.2 inch </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3747">
                  QHD+ </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3669">
                  250Hz </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3630">
                  WQXGA </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3655">
                  OLED </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3608">
                  60Hz </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3758">
                  180Hz </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3670">
                  1000 nits </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3631">
                  240Hz </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3730">
                  2.2K </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3656">
                  2.8K </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3612">
                  WUXGA </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3759">
                  UHD+ </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3705">
                  250 nits </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3639">
                  165Hz </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3602">
                  FHD </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3731">
                  3.2K </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3661">
                  45%NTSC </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3616">
                  IPS </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3408">
                  18 inch </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3781">
                  WQUXGA </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3706">
                  2.5K </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3642">
                  FHD+ </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3606">
                  144Hz </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3743">
                  3K </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3666">
                  2K </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3628">
                  WQXGA+ </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3654">
                  120Hz </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3607">
                  100%sRGB </a>

              </div>

              <div class="filter-group-bottom">
                <a href="#" onclick="BuildFilterUrl.clearFilter.call(this, '')"> Bỏ chọn </a>
                <a href="/gaming-laptop.html" class="js-open-url"> Xem <span class="js-show-total">381</span> kết quả
                </a>
              </div>
            </div>
          </div>

          <div class="filter-item js-filter-item" data-type="attribute">
            <a href="#" class="filter-name "> Card đồ họa (VGA) </a>

            <div class="filter-content-group">

              <div class="filter-group-middle ">

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3013">
                  Intel UHD Graphics </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3127">
                  Iris Xe Graphics </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3199">
                  GeForce MX570 </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3125">
                  GTX 1650 </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3123">
                  RTX 3050 </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3124">
                  RTX 3050 Ti </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3213">
                  RTX 3070Ti </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3262">
                  RTX 3080 8GB </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3281">
                  RTX 4070 </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3282">
                  RTX 4080 </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3283">
                  RTX 4090 </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3154">
                  AMD Radeon </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="1778">
                  AMD radeon HD </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3585">
                  14 GPU </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="2719">
                  6GB GDDR6 </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3597">
                  Intel Arc Graphics </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3526">
                  RX 7600S 8GB </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3428">
                  RTX 4060 8GB </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3586">
                  10 GPU </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="2720">
                  8GB GDDR6 </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3620">
                  Quadro T600 4GB GDDR6 </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="443">
                  2GB </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3429">
                  RTX 4070 8GB </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3764">
                  RTX 500 Ada </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3587">
                  18 GPU </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3673">
                  RTX 4060 </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="1194">
                  4GB </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3572">
                  RTX 2000 Ada 8GB </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3344">
                  Geforce RTX 2050 </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3288">
                  AMD Radeon 660M </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3780">
                  RTX 1000 Ada </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3588">
                  30 GPU </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3513">
                  RTX A500 4GB </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3698">
                  Intel Arc A530M 4GB GDDR6 </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3573">
                  RTX A1000 6GB </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3411">
                  Quadro T550 4GB </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="2416">
                  16GB </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3594">
                  40 GPU </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3427">
                  RTX 4050 6GB </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3015">
                  4GB GDDR6 </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3733">
                  Intel Graphics </a>

              </div>

              <div class="filter-group-bottom">
                <a href="#" onclick="BuildFilterUrl.clearFilter.call(this, '')"> Bỏ chọn </a>
                <a href="/gaming-laptop.html" class="js-open-url"> Xem <span class="js-show-total">381</span> kết quả
                </a>
              </div>
            </div>
          </div>

          <div class="filter-item js-filter-item" data-type="attribute">
            <a href="#" class="filter-name "> Bộ nhớ trong (RAM) </a>

            <div class="filter-content-group">

              <div class="filter-group-middle ">

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="1257">
                  8GB </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="1550">
                  12GB </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="1283">
                  16GB </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="2374">
                  24GB </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="1702">
                  32GB </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="2315">
                  64GB </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="2841">
                  128GB </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3595">
                  48 GB </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3776">
                  96GB </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3584">
                  18GB </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3589">
                  36 GB </a>

              </div>

              <div class="filter-group-bottom">
                <a href="#" onclick="BuildFilterUrl.clearFilter.call(this, '')"> Bỏ chọn </a>
                <a href="/gaming-laptop.html" class="js-open-url"> Xem <span class="js-show-total">381</span> kết quả
                </a>
              </div>
            </div>
          </div>

          <div class="filter-item js-filter-item" data-type="attribute">
            <a href="#" class="filter-name "> Dung lượng ổ cứng </a>

            <div class="filter-content-group">

              <div class="filter-group-middle ">

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3552">
                  1TB </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="769"> 2
                  TB </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="175"> 1
                  TB </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3549">
                  512GB </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3550">
                  256GB </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="859">
                  256GB SSD </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="2437">
                  1TB SSD </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="1675">
                  512GB SSD </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3432">
                  4 TB </a>

              </div>

              <div class="filter-group-bottom">
                <a href="#" onclick="BuildFilterUrl.clearFilter.call(this, '')"> Bỏ chọn </a>
                <a href="/gaming-laptop.html" class="js-open-url"> Xem <span class="js-show-total">381</span> kết quả
                </a>
              </div>
            </div>
          </div>

          <div class="filter-item js-filter-item" data-type="attribute">
            <a href="#" class="filter-name "> Hệ điều hành </a>

            <div class="filter-content-group">

              <div class="filter-group-middle ">

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="2021">
                  Windows 10 </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="325">
                  Mac OS </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3091">
                  Windows 11 </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3653">
                  Windows 11 Home </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="2250">
                  Ubuntu </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3212">
                  Non-OS </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3254">
                  Windows 11 Pro </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="2562">
                  FreeDos </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3274">
                  OFFICE HOME </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3619">
                  Windows 10 Pro </a>

              </div>

              <div class="filter-group-bottom">
                <a href="#" onclick="BuildFilterUrl.clearFilter.call(this, '')"> Bỏ chọn </a>
                <a href="/gaming-laptop.html" class="js-open-url"> Xem <span class="js-show-total">381</span> kết quả
                </a>
              </div>
            </div>
          </div>


          <div class="filter-item js-filter-item" data-type="attribute">
            <a href="#" class="filter-name "> Trọng lượng </a>

            <div class="filter-content-group">

              <div class="filter-group-middle ">

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="1272">
                  1.0kg<2.0kg </a>

                    <a href="#" class="filter-title js-filter-title" data-filter_code="filter"
                      data-value="1273"> 2.0kg<2.4kg </a>

                        <a href="#" class="filter-title js-filter-title" data-filter_code="filter"
                          data-value="1274"> 2.4<3kg </a>

                            <a href="#" class="filter-title js-filter-title" data-filter_code="filter"
                              data-value="1275"> >3kg </a>

              </div>

              <div class="filter-group-bottom">
                <a href="#" onclick="BuildFilterUrl.clearFilter.call(this, '')"> Bỏ chọn </a>
                <a href="/gaming-laptop.html" class="js-open-url"> Xem <span class="js-show-total">381</span> kết quả
                </a>
              </div>
            </div>
          </div>

          <div class="filter-item js-filter-item" data-type="attribute">
            <a href="#" class="filter-name "> Màu sắc </a>

            <div class="filter-content-group">

              <div class="filter-group-middle ">

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3659">
                  Cosmos Gray </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="330">
                  Vàng </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="331">
                  Bạc </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3558">
                  Jaeger Gray </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="332">
                  Trắng </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3559">
                  Sunshiny Gold </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="328">
                  Xanh </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3501">
                  Grey </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="333">
                  Đen </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="3581">
                  Iron Grey </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="1195">
                  Xám </a>

              </div>

              <div class="filter-group-bottom">
                <a href="#" onclick="BuildFilterUrl.clearFilter.call(this, '')"> Bỏ chọn </a>
                <a href="/gaming-laptop.html" class="js-open-url"> Xem <span class="js-show-total">381</span> kết quả
                </a>
              </div>
            </div>
          </div>

          <div class="filter-item js-filter-item" data-type="attribute">
            <a href="#" class="filter-name "> Dung lượng SSD </a>

            <div class="filter-content-group">

              <div class="filter-group-middle ">

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="2663">
                  8GB </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="2639">
                  256GB </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="2643">
                  512GB </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="2642">
                  1TB </a>

                <a href="#" class="filter-title js-filter-title" data-filter_code="filter" data-value="2821">
                  2TB </a>

              </div>

              <div class="filter-group-bottom">
                <a href="#" onclick="BuildFilterUrl.clearFilter.call(this, '')"> Bỏ chọn </a>
                <a href="/gaming-laptop.html" class="js-open-url"> Xem <span class="js-show-total">381</span> kết quả
                </a>
              </div>
            </div>
          </div>



          
        </div>
      </div>

      <div class="p-container bg-white">
        <div class="sort-container d-flex align-items-center justify-content-between flex-wrap">
          <div class="d-flex align-items-center">
            <b style="font-size:16px;margin-right: 20px"> 373 Laptop Gaming - Đồ Họa </b>
            <div class="sort-by-group">
              <select onchange="location.href = this.value">
                <option value="" class="js-select-path"> Sắp xếp theo </option>
                <option value="javascript:void(0)"> Lượt xem
                </option>
                <option value="javascript:void(0)"> Đánh giá
                </option>
                <option value="javascript:void(0)"> Tên A-&gt;Z
                </option>
              </select>
              <a href="javascript:void(0)">
                <i class="mb-icons icon-in-stock"></i>
                <span> Còn hàng </span>
              </a>
              <a href="javascript:void(0)">
                <i class="mb-icons icon-new"></i>

                <span> Mới nhất </span>
              </a>
              <a href="javascript:void(0)">
                <i class="mb-icons icon-increase"></i>
                <span> Giá tăng dần </span>
              </a>
              <a href="javascript:void(0)" class="current">
                <i class="mb-icons icon-decrease"></i>
                <span> Giá giảm dần </span>
              </a>
            </div>
          </div>
          <div class="choose-price-holder">
            <input type="text" placeholder="Giá thấp nhất" value=""
              onkeyup="this.value = Hura.Util.writeStringToPrice(this.value)" size="9"
              class="text-center price-range js-price-range" id="js-min-range">
            <input type="text" placeholder="Giá cao nhất" value=""
              onkeyup="this.value = Hura.Util.writeStringToPrice(this.value)" size="9"
              class="text-center price-range js-price-range" id="js-max-range">
            <a href="javascript:void(0)" class="btn-submit-filter" id="js-submit-filter"> </a>
          </div>
          <span
            style="display: block;width: 100%;text-align: right;margin-top: 10px;color: #f00;font-weight: 600;display: none;"
            id="js-filter-note"></span>
        </div>
        <div class="p-list-container d-flex flex-wrap">
          @foreach($gamingLaptops as $laptop)
            @include('partials.detailed-p-item', ['product' => $laptop])
          @endforeach
        </div>
      </div>
      <!-- paging -->
      <div class="paging">
        @if ($gamingLaptops->onFirstPage())
            <span class="current">1</span>
        @else
            <a href="{{ $gamingLaptops->url(1) }}">1</a>
        @endif
    
        @for ($page = 2; $page <= $gamingLaptops->lastPage(); $page++)
            @if ($page == $gamingLaptops->currentPage())
                <span class="current">{{ $page }}</span>
            @else
                <a href="{{ $gamingLaptops->url($page) }}">{{ $page }}</a>
            @endif
        @endfor
    
        @if ($gamingLaptops->hasMorePages())
            <a href="{{ $gamingLaptops->nextPageUrl() }}">
                <i class="fa fa-angle-right"></i>
            </a>
        @else
            <span class="disabled">
                <i class="fa fa-angle-right"></i>
            </span>
        @endif
    </div>
    
      
  </section>
@endsection

@push('scripts')
  <script>
    // Đóng filter-item hiện tại khi click ra ngoài và giữ trạng thái của filter-title
    document.addEventListener('click', function(e) {
      const currentFilterItem = document.querySelector('.js-filter-item.current');

      // Nếu click không nằm trong một filter item
      if (!e.target.closest('.js-filter-item') && currentFilterItem) {
        currentFilterItem.classList.remove('current'); // Xóa class 'current'
      }
    });

    // Xử lý click vào các filter item
    document.querySelectorAll('.js-filter-item').forEach(filterItem => {
      filterItem.addEventListener('click', function(e) {
        e.preventDefault();
        e.stopPropagation(); // Ngăn sự kiện truyền lên body

        // Toggle class 'current' cho filter-item hiện tại
        const isCurrent = this.classList.toggle('current');

        // Nếu có filter khác đang là 'current', bỏ class 'current' của filter đó
        document.querySelectorAll('.js-filter-item').forEach(item => {
          if (item !== this && item.classList.contains('current')) {
            item.classList.remove('current');
          }
        });

        // Kiểm tra nếu có ít nhất một js-filter-title được chọn
        const selectedTitles = this.querySelectorAll('.js-filter-title.selected');
        if (selectedTitles.length > 0) {
          this.classList.add(
            'selected'); // Thêm class 'selected' nếu có ít nhất một title được chọn
        } else {
          this.classList.remove(
            'selected'); // Xóa class 'selected' nếu không có title nào được chọn
        }
      });
    });

    // Xử lý click vào các filter title
    document.querySelectorAll('.js-filter-title').forEach(filterTitle => {
      filterTitle.addEventListener('click', function(e) {
        e.preventDefault();
        e.stopPropagation(); // Ngăn sự kiện truyền lên filter item

        const parentFilterItem = this.closest('.js-filter-item');
        const dataType = parentFilterItem.getAttribute('data-type');

        if (dataType === 'price') {
          // Nếu là loại price, chỉ cho phép chọn một
          parentFilterItem.querySelectorAll('.js-filter-title.selected').forEach(title => {
            title.classList.remove('selected'); // Bỏ chọn tất cả
          });
          this.classList.add('selected'); // Chọn item hiện tại
        } else {
          // Cho phép chọn nhiều item
          this.classList.toggle('selected'); // Toggle class 'selected'
        }

        // Kiểm tra nếu có ít nhất một js-filter-title được chọn
        const selectedTitles = parentFilterItem.querySelectorAll('.js-filter-title.selected');
        if (selectedTitles.length > 0) {
          parentFilterItem.classList.add(
            'selected'); // Thêm class 'selected' nếu có ít nhất một title được chọn
        } else {
          parentFilterItem.classList.remove(
            'selected'); // Xóa class 'selected' nếu không có title nào được chọn
        }
      });
    });
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <script>
    $(document).ready(function(){
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            dots: true, 
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 5
                }
                
            }
        });
    });
  </script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
    let selectedBrand = '';

    // Thêm sự kiện click vào từng tùy chọn brand
    document.querySelectorAll('.js-filter-title').forEach(function (element) {
        element.addEventListener('click', function (e) {
            e.preventDefault();
            
            // Lấy giá trị brand từ thuộc tính data-value
            selectedBrand = element.getAttribute('data-value');
            
            // Bỏ chọn các brand khác
            document.querySelectorAll('.js-filter-title').forEach(el => el.classList.remove('selected'));
            
            // Đánh dấu brand này là đã chọn
            element.classList.add('selected');
        });
    });

    // Xử lý khi click vào "Xem kết quả"
    document.querySelector('.js-open-url').addEventListener('click', function (e) {
        e.preventDefault();
        
        if (selectedBrand) {
            // Chuyển hướng đến route có brand đã chọn
            window.location.href = `/laptops/filter/${selectedBrand}`;
        } else {
            alert('Vui lòng chọn một hãng để xem kết quả.');
        }
      });
    });
  </script>
@endpush

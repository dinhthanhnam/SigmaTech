@php
  //biến chung
  $product_id = $product->id;
  $category_id = $product->category_id;
  $name = $product->name;
  $type = $product->attributes->firstWhere('name', '[Laptop] Loại laptop')->pivot->value ?? 'N/A';
  $price = $product->attributes->firstWhere('name', 'Price')->pivot->value ?? 'N/A';
  $dealprice = $product->attributes->firstWhere('name', 'Deal Price')->pivot->value ?? 'N/A';
  $rating = $product->attributes->firstWhere('name', 'Rating')->pivot->value ?? 'N/A';
  $brand = $product->attributes->firstWhere('name', 'Brand')->pivot->value ?? 'N/A';
  $model = $product->attributes->firstWhere('name', 'Model')->pivot->value ?? 'N/A';
  //biến riêng, cho laptop
  $laptop_cpu = $product->attributes->firstWhere('name', '[Laptop] Vi xử lý')?->pivot->value ?? 'N/A';
  $laptop_ssd_capacity = $product->attributes->firstWhere('name', '[Laptop] Dung lượng ổ cứng')?->pivot->value ?? 'N/A';
  $laptop_gpu = $product->attributes->firstWhere('name', '[Laptop] Card đồ hoạ')?->pivot->value ?? 'N/A';
  $laptop_mon_size = $product->attributes->firstWhere('name', '[Laptop] Kích thước màn hình')?->pivot->value ?? 'N/A';
  $laptop_mon_res = $product->attributes->firstWhere('name', '[Laptop] Độ phân giải')?->pivot->value ?? 'N/A';
  $laptop_ram = $product->attributes->firstWhere('name', '[Laptop] Dung lượng RAM')?->pivot->value ?? 'N/A';
  $laptop_ssd = $product->attributes->firstWhere('name', '[Laptop] Ổ cứng')?->pivot->value ?? 'N/A';
  $laptop_os = $product->attributes->firstWhere('name', '[Laptop] OS')?->pivot->value ?? 'N/A';
  //biến riêng, cho linh kiện
@endphp
@php
  $discountPercentage = 0;

  if (isset($dealprice)) {
      $discountPercentage = round((1 - $dealprice / $price) * 100);
  }
@endphp
<div class="p-item js-p-item summary-loaded" data-id="49710">
  <a href="/laptops/{{ $type }}/{{ $brand }}/{{ $product_id }}" class="p-img">
    <img src="{{ $product->attributes->firstWhere('name', 'Thumbnail')?->pivot->value ?? 'N/A' }}"
      alt="{{ $name }} ({{ $laptop_cpu }} | {{ $laptop_gpu }} | {{ $laptop_mon_size }} {{ $laptop_mon_res }} | {{ $laptop_ram }} | {{ $laptop_ssd_capacity }} | {{ $laptop_os }})"
      class="fit-img">
    <span class="p-icon-holder js-icon-49710"><!-- // icon promotion --></span>
  </a>

  <div class="p-text">
    <span class="p-sku" style="font-size: 12px;">Mã SP: {{ $model }}</span>
    <a href="/laptops/{{ $type }}/{{ $brand }}/{{ $product_id }}" class="p-name">
      <h3>{{ $name }} ({{ $laptop_cpu }} | {{ $laptop_gpu }} | {{ $laptop_mon_size }}
        {{ $laptop_mon_res }} | {{ $laptop_ram }} | {{ $laptop_ssd_capacity }} | {{ $laptop_os }})</h3>
    </a>

    <div class="price-container">
      <del class="p-old-price"> {{ number_format($price, 0, ',', '.') }} đ </del>
      <span class="p-discount"> {{ $discountPercentage }} % </span>
      <span class="p-price"> {{ number_format($dealprice, 0, ',', '.') }} đ </span>
    </div>

    <div class="p-special-container">? khuyến mại</div>

    <div class="box-config">
      <div class="product-spec-group font-300">
        <div class="thongso d-flex flex-wrap">
          <div class="item d-flex align-items">
            <div class="item-icon">
              <i class="icon-thongso icon-bo-vi-xu-ly"></i>
            </div>
            <div class="txt">{{ $laptop_cpu }}</div>
          </div>

          <div class="item d-flex align-items">
            <div class="item-icon">
              <i class="icon-thongso icon-kich-thuoc-man-hinh-laptop"></i>
            </div>
            <div class="txt">{{ $laptop_mon_size }}</div>
          </div>

          <div class="item d-flex align-items">
            <div class="item-icon">
              <i class="icon-thongso icon-card-do-hoa-laptop"></i>
            </div>
            <div class="txt">{{ $laptop_gpu }}</div>
          </div>

          <div class="item d-flex align-items">
            <div class="item-icon">
              <i class="icon-thongso icon-dung-luong-o-cung-laptop"></i>
            </div>
            <div class="txt">{{ $laptop_ssd }}</div>
          </div>
          <div class="item d-flex align-items">
            <div class="item-icon">
              <i class="icon-thongso icon-bo-nho-trong"></i>
            </div>
            <div class="txt">{{ $laptop_ram }}</div>
          </div>
        </div>
      </div>
    </div>
    <div class="box-config">
      <div class="product-promo" style="padding-top: 0">
        <div class="content d-flex align-items">
          <div class="item active">
            <div class="icon-promo"> <img
                src="{{ asset('assets/img/promo/promo_15d608aee7549de20124715432213768.jpg') }}"
                alt="Tặng ngay gói Bảo hành mở rộng"> </div>
          </div>

          <div class="item">
            <div class="icon-promo"> <img
                src="{{ asset('assets/img/promo/promo_958b22c753b16542820be4a2f030e8f3.jpg') }}"
                alt="Nhận ngay lót chuột ROG Sheath Electro Punk trị giá 1.190.000đ "> </div>
          </div>
        </div>
      </div>
    </div>
    <div class="d-flex align-items-centet justify-content-between">
      <div class="d-flex align-items-center justify-content-between">
        <a href="javascript:void(0)" class="p-conpare js-p-compare" id="js-pd-item-49710"
          onclick="CompareProduct.compare_addProduct(49710)" data-id="49710">So sánh</a>
        <span class="btn-in-stock"> <i class="fa fa-check"></i> Còn hàng </span>
      </div>
      <a href="javascript:void(0)" class="p-add-btn fa fa-shopping-cart"
        onclick="addProduct('49710', 'Laptop Asus Gaming ROG Zephyrus G16 GA605WI-QR090WS (AMD Ryzen AI 9 HX 370 | RTX 4070 8GB | 16 inch WQXGA OLED | 32 GB | 1 TB | Win 11)', '81990000')"></a>
    </div>
  </div>
  {{-- <div class="p-tooltip">
        <p class="tooltip-title"> Laptop Asus Gaming ROG Zephyrus G16 GA605WI-QR090WS (AMD Ryzen AI 9 HX 370 | RTX 4070
            8GB | 16 inch WQXGA OLED | 32 GB | 1 TB | Win 11) </p>

        <div class="tooltip-content">
            <div class="tooltip-specialOffer">
                <div class="spec-title"><span class="title-text"> KHUYẾN MÃI</span></div>
                <ul class="ul">
                    <li> <span class="text">🎁 <font size="3pt">
                                <font color="Crimson"><b> Bộ quà tặng bao gồm:</b></font>
                            </font>
                        </span></li>
                    <li> <span class="text">✦ Túi chống sốc (TUNB0007,TUNB0001)
                        </span></li>
                    <li> <span class="text">🎁 <font size="3pt">
                                <font color="Crimson"><b>Ưu đãi mua kèm giá hấp dẫn:</b></font>
                            </font>
                        </span></li>
                    <li> <span class="text">✦ Ưu đãi Ram laptop Crucial 32GB DDR5 bus 4800Mhz CL40 ( RACR0006) chỉ với
                            giá 2.590.000 đ
                        </span></li>
                    <li> <span class="text">✦ Ưu đãi Ram laptop Crucial 16GB DDR5 bus 4800Mhz CL40 (RACR0008) chỉ với
                            giá 1.450.000 đ
                        </span></li>
                    <li> <span class="text">✦ Ưu đãi Ram laptop Crucial DDR5 8GB 4800 (CT8G48C40S5) (RACR0007) chỉ với
                            giá 820.000 đ
                        </span></li>
                </ul>
            </div>
            <div class="tooltip-summary"><span class="item"><i class="fa fa-check-circle"></i>CPU: AMD Ryzen AI 9 HX
                    370 (2.00GHz up to 5.10GHz, 24MB Cache)
                </span><span class="item"><i class="fa fa-check-circle"></i>VGA: NVIDIA® GeForce RTX™ 4070 8GB GDDR6
                    (AI TOPS: 321)
                </span><span class="item"><i class="fa fa-check-circle"></i>Màn hình: 16-inch OLED 2.5K 16:10 (2560 x
                    1600, WQXGA) 240Hz 0.2ms, 100% DCI-P3, màn hình bóng, G-Sync / Adaptive-Sync, đạt chuẩn Pantone, ROG
                    Nebula Display
                </span><span class="item"><i class="fa fa-check-circle"></i>RAM: 32GB LPDDR5X on board
                </span><span class="item"><i class="fa fa-check-circle"></i>HDD: 1TB PCIe® 4.0 NVMe™ M.2 SSD
                </span></div>

            <div class="position-relative">

                <p class="p-price" style="margin: 0;">
                    <span style="font-size: 14px;color: #000;font-weight: normal;">Giá khuyến mãi:</span>
                    <span class="tooltip-price-text">81.990.000 đ</span>
                </p>
            </div>
        </div>
    </div> --}}
</div>

@php
  //biến chung
  $product_id = $product->id;
  $category_id = $product->category_id;
  $name = $product->name;
  
  $price = $product->attributes->firstWhere('name', 'Price')->pivot->value ?? 'N/A';
  $dealprice = $product->attributes->firstWhere('name', 'Deal Price')->pivot->value ?? 'N/A';
  $rating = $product->attributes->firstWhere('name', 'Rating')->pivot->value ?? 'N/A';
  $brand = $product->attributes->firstWhere('name', 'Brand')->pivot->value ?? 'N/A';
  $model = $product->attributes->firstWhere('name', 'Model')->pivot->value ?? 'N/A';
  $pcpart_type = $product->attributes->firstWhere('name', 'Loại linh kiện')->pivot->value ?? 'N/A';
  //biến riêng, cho laptop
  $laptop_type = $product->attributes->firstWhere('name', '[Laptop] Loại laptop')->pivot->value ?? 'N/A';
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
<div class="p-item js-p-item summary-loaded">
  <a href="{{ url($product->link) }}" class="p-img">
    <img src="{{ $product->attributes->firstWhere('name', 'Thumbnail')?->pivot->value ?? 'N/A' }}"
      alt="{{ $name }} "
      class="fit-img">
    <span class="p-icon-holder"><!-- // icon promotion --></span>
  </a>
  <div class="p-text">
    <span class="p-sku" style="font-size: 12px;">Mã SP: {{ $model }}</span>
    <a href="{{ url($product->link) }}" class="p-name">
      <h3>{{ $name }}</h3>
    </a>
    
    <div class="price-container">
      <del class="p-old-price"> {{ number_format($price, 0, ',', '.') }} đ </del>
      <span class="p-discount"> {{ $discountPercentage }} % </span>
      <span class="p-price"> {{ number_format($dealprice, 0, ',', '.') }} đ </span>
    </div>

    <div class="p-special-container">? khuyến mại</div>

    <div class="box-config">
      <div class="product-promo" style="padding-top: 0">
        <div class="content d-flex align-items">
          <div class="item">
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
    <div class="d-flex justify-content-between">
      <span class="btn-in-stock"> <i class="fa fa-check"></i> Còn hàng </span>
      <a href="javascript:void(0)" class="p-add-btn fa fa-shopping-cart"
        onclick="addProduct()">
      </a>
    </div>
  </div>
</div>

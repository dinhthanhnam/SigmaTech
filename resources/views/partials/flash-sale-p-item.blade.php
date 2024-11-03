@php
  //biến chung
  $product_id = $product->id;
  $category_id = $product->category_id;
  $name = $product->name;
  $price = $product->attributes->firstWhere('name', 'Price')->pivot->value ?? 'N/A';
  $saleprice = $product->attributes->firstWhere('name', 'Sale Price')->pivot->value ?? 'N/A';
  $dealprice = $product->attributes->firstWhere('name', 'Deal Price')->pivot->value ?? 'N/A';
  $rating = $product->attributes->firstWhere('name', 'Rating')->pivot->value ?? 'N/A';
  $brand = $product->attributes->firstWhere('name', 'Brand')->pivot->value ?? 'N/A';
  $model = $product->attributes->firstWhere('name', 'Model')->pivot->value ?? 'N/A';
  
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
  $laptop_color = $product->attributes->firstWhere('name', '[Laptop] Màu sắc')->pivot->value ?? 'N/A';
  
  //biến riêng, cho linh kiện
@endphp
@php
  $discountPercentage = 0;

  if (isset($dealprice)) {
      $discountPercentage = round((1 - $dealprice / $price) * 100);
  }
@endphp
<div class="deal-item">
  <a href="/laptops/{{$laptop_type}}/{{$brand}}/{{$product_id}}" class="p-name" target="_blank">
    <img src="{{ $product->attributes->firstWhere('name', 'Thumbnail')?->pivot->value ?? 'N/A' }}" class="mx-auto"
      alt="{{ $name }} ({{ $laptop_cpu}} | {{ $laptop_ram }} | {{ $laptop_ssd_capacity}} | {{ $laptop_gpu }} | {{ $laptop_mon_size }} | {{ $laptop_os }} | {{$laptop_color}})">
  </a>
  <div class="p-text">
    @if ($product->attributes->firstWhere('name', '[Laptop] Loại laptop')->value)
      <a href="/laptops/{{$laptop_type}}/{{$brand}}/{{$product_id}}" class="p-name" target="_blank"
        title="{{ $name }} ({{ $laptop_cpu}} | {{ $laptop_ram }} | {{ $laptop_ssd_capacity}} | {{ $laptop_gpu }} | {{ $laptop_mon_size }} | {{ $laptop_os }} | {{$laptop_color}})">
          {{ $name }} ({{ $laptop_cpu}} | {{ $laptop_ram }} | {{ $laptop_ssd_capacity}} | {{ $laptop_gpu }} | {{ $laptop_mon_size }} | {{ $laptop_os }} | {{$laptop_color}})
      </a>
    @endif
    <div class="p-price-group">
      <span class="p-price">{{ number_format($saleprice, 0, ',', '.') }}<u>đ</u></span>
      <span class="p-discount">{{ $discountPercentage }} %</span>
      <p class="p-old-price">{{ number_format($price, 0, ',', '.') }}<u>đ</u></p>
    </div>

    <div class="p-status-group">
      <span> Còn lại ? sản phẩm </span>
      <span class="p-deal-line" style="width: 100%"></span>
    </div>

    <div class="p-deal-countdown js-deal-time-holder" data-time="30-09-2024, 11:30 pm" data-type="active">
      <span style="margin-right: 3px">Kết thúc sau </span>
      <b>05 <span>Ngày</span> </b> :
      <b>09</b> :
      <b>48</b> :
      <b>34</b>
    </div>

    <a href="javascript:void(0)" class="p-btn-buy"
      onclick="addProduct(49837, 'Laptop Acer Aspire Lite AL14-51M-36MH_NX.KTVSV.001 (Intel Core i3-1215U | 8GB | 256GB | Intel UHD | 14 inch WUXGA | Win 11 | Bạc)', '8990000')">MUA
      GIÁ SỐC</a>

    <a href="/laptop-acer-aspire-lite-al14-51m-36mh_nx.ktvsv.001.html" class="p-link" target="_blank">Xem sản
      phẩm</a>
  </div>
</div>

@php
    //biến chung
    $product_id = $product->id;
    $category_id = $product->category_id;
    $name = $product->name;
    $product_type = '';
    $price = $product->attributes->firstWhere('name', 'Price')->pivot->value ?? 1;
    $dealprice = $product->attributes->firstWhere('name', 'Deal Price')->pivot->value ?? 1;
    $saleprice = $product->attributes->firstWhere('name', 'Sale Price')->pivot->value ?? 1;
    $sale_end_date = $product->attributes->firstWhere('name', 'Sale End Date')->pivot->value ?? null;
    $rating = $product->attributes->firstWhere('name', 'Rating')->pivot->value ?? 0;
    $brand = $product->attributes->firstWhere('name', 'Brand')->pivot->value ?? 'N/A';
    $model = $product->attributes->firstWhere('name', 'Model')->pivot->value ?? 'N/A';
    $pcpart_type = $product->attributes->firstWhere('name', 'Loại linh kiện')->pivot->value ?? 'N/A';
    //biến riêng, cho laptop
    $laptop_type = $product->attributes->firstWhere('name', '[Laptop] Loại laptop')->pivot->value ?? 'N/A';
    $laptop_cpu = $product->attributes->firstWhere('name', '[Laptop] Vi xử lý')?->pivot->value ?? 'N/A';
    $laptop_ssd_capacity =
        $product->attributes->firstWhere('name', '[Laptop] Dung lượng ổ cứng')?->pivot->value ?? 'N/A';
    $laptop_gpu = $product->attributes->firstWhere('name', '[Laptop] Card đồ hoạ')?->pivot->value ?? 'N/A';
    $laptop_mon_size = $product->attributes->firstWhere('name', '[Laptop] Kích thước màn hình')?->pivot->value ?? 'N/A';
    $laptop_mon_res = $product->attributes->firstWhere('name', '[Laptop] Độ phân giải')?->pivot->value ?? 'N/A';
    $laptop_ram = $product->attributes->firstWhere('name', '[Laptop] Dung lượng RAM')?->pivot->value ?? 'N/A';
    $laptop_ssd = $product->attributes->firstWhere('name', '[Laptop] Ổ cứng')?->pivot->value ?? 'N/A';
    $laptop_os = $product->attributes->firstWhere('name', '[Laptop] OS')?->pivot->value ?? 'N/A';
    $thumbnail = $product->attributes->firstWhere('name', 'Thumbnail')?->pivot->value ?? 'N/A';
    //biến riêng, cho linh kiện
@endphp
@php
    $discountPercentage = 0;

    if ($saleprice != 'N/A' && strtotime($sale_end_date) > Carbon\Carbon::now()->timestamp) {
        $discountPercentage = round((1 - $saleprice / $price) * 100);
    } else {
        $discountPercentage = round((1 - $dealprice / $price) * 100);
    }
@endphp
<div class="p-item js-p-item summary-loaded">
    <a href="{{ url("$product->link") }}" class="p-img">
        <img src="{{ url("$thumbnail") }}"
            alt="{{ $name }} " class="fit-img">
        <span class="p-icon-holder"><!-- // icon promotion --></span>
    </a>
    <div class="p-text">
        <span class="p-sku" style="font-size: 12px;">Mã SP: {{ $model }}</span>
        <a href="{{ url("$product->link") }}" class="p-name">
            <h3>{{ $name }}</h3>
        </a>

        <div class="price-container">
            <del class="p-old-price"> {{ number_format($price, 0, ',', '.') }} đ </del>
            <span class="p-discount"> {{ $discountPercentage }} % </span>
            @if ($saleprice != 'N/A' && strtotime($sale_end_date) > Carbon\Carbon::now()->timestamp)
                <span class="p-price"> {{ number_format($dealprice, 0, ',', '.') }} đ <span
                        style="padding-left: 5px; color: rgb(255, 85, 0); font-weight:700; font-style: italic; font-size:18px; display:inline;">Sale
                    </span></span>
            @else
                <span class="p-price"> {{ number_format($dealprice, 0, ',', '.') }} đ </span>
            @endif
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
                onclick="document.getElementById('addCartForm-{{ $product_id }}-{{ $category_id }}').submit();">
            </a>

            <form id="addCartForm-{{ $product_id }}-{{ $category_id }}" action="{{ route('cart.add') }}"
                method="POST" style="display: none;">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product_id }}">
                @if ($category_id == 1 || $category_id == 2)
                    {{ $product_type = 'laptop' }}
                @elseif ($category_id == 4)
                    {{ $product_type = 'monitor' }}
                @elseif ($pcpart_type == 'cpu')
                    {{ $product_type = 'cpu' }}
                @elseif ($pcpart_type == 'gpu')
                    {{ $product_type = 'gpu' }}
                @elseif ($category_id == 5)
                    {{ $product_type = 'gaminggear' }}
                @elseif ($category_id == 6)
                    {{ $product_type = 'media' }}
                @elseif ($category_id == 7)
                    {{ $product_type = 'cooling' }}
                @elseif ($category_id == 8)
                    {{ $product_type = 'accessory' }}
                @endif
                <input type="hidden" name="product_type" value="{{ $product_type }}">
                <input type="hidden" name="product_name" value="{{ $name }}">
                <input type="hidden" name="quantity" value="1" min="1">

            </form>
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
</div>

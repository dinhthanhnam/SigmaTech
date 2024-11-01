@foreach ($laptops as $product)
    <div class="p-item js-p-item" data-id="{{ $product->id }}">
        <a href="#" class="p-img">
            <img src="{{ $product->attributes->where('name', 'Thumbnail')->first()->pivot->value ?? '/default/path/to/image.jpg' }}" 
                 alt="{{ $product->name }}" class="fit-img">
            <span class="p-icon-holder js-icon-{{ $product->id }}"><!-- // icon promotion --></span>
        </a>
        <div class="p-text">
            <a href="{{ route('home.index') }}" class="p-name">
                <h3>{{ $product->name }}</h3>
            </a>
            <div class="d-flex align-items">
                <i class="icon-star star-{{ $product->attributes->where('name', 'Rating')->first()->pivot->value }}"></i>(1)
            </div>
            <span class="p-sku" style="font-size: 12px;">Model: {{ $product->attributes->where('name', 'Model')->first()->pivot->value }}</span>
            <div class="price-container">
                <del class="p-old-price">{{ number_format($product->attributes->where('name', 'Price')->first()->pivot->value, 0, ',', '.') }} đ</del>
                <span class="p-discount"> -{{ 100 - round(($product->attributes->where('name', 'Deal Price')->first()->pivot->value / $product->attributes->where('name', 'Price')->first()->pivot->value) * 100) }}% </span>
                <span class="p-price">{{ number_format($product->attributes->where('name', 'Deal Price')->first()->pivot->value, 0, ',', '.') }} đ</span>
            </div>
            <div class="p-special-container">Khuyến mại hấp dẫn</div>
            <div class="d-flex align-items-center justify-content-between">
                <a href="javascript:void(0)" class="p-conpare js-p-compare" id="js-pd-item-{{ $product->id }}"
                   onclick="CompareProduct.compare_addProduct({{ $product->id }})" data-id="{{ $product->id }}">So sánh</a>
                <span class="btn-in-stock">
                    <i class="fa fa-check"></i> Còn hàng
                </span>
            </div>
            <a href="javascript:void(0)" class="p-add-btn fa fa-shopping-cart"
               onclick="addProduct('{{ $product->id }}', '{{ $product->name }}', '{{ $product->attributes->where('name', 'Deal Price')->first()->pivot->value }}')"></a>
        </div>
    </div>
@endforeach

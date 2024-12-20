@php
    $name = $recommendeditem['name'];
    $thumbnail = $recommendeditem['thumbnail'];
    $price = $recommendeditem['price'];
    $deal_price = $recommendeditem['deal_price'];
    //biến riêng, cho linh kiện
@endphp

<div class="p-item js-p-item summary-loaded">
    <a href="" class="p-img">
        <img src="{{ url("$thumbnail") }}"
            alt="{{ $name }} " class="fit-img">
        <span class="p-icon-holder"><!-- // icon promotion --></span>
    </a>
    <div class="p-text">
        <span class="p-sku" style="font-size: 12px;">Mã SP: abc</span>
        <a href="" class="p-name">
            <h3>{{ $name }}</h3>
        </a>

        <div class="price-container">
            <del class="p-old-price"> {{ $price }} đ </del>
            <span class="p-price"> {{ number_format($deal_price, 0, ',', '.') }} đ 
            </span>
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

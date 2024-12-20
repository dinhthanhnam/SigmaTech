@extends('layouts.app')
@section('content')
  <section class="homepage">
    <div class="container">
      <div class="home-banner-container clearfix position-relative">
        <div class="banner-slider-top">
          <div class="home-banner-left">
            <div class="custom-dots owl-carousel owl-theme" id="js-home-slider">
              @foreach($slides as $slide)
                  <div class="item">
                      <a href="#" target='_blank' rel='nofollow'>
                          <img border="0" 
                               src="{{ asset($slide->image) }}" 
                               alt="{{ $slide->name }}" />
                      </a>
                  </div>
              @endforeach
          </div>
          
          </div>
          <div class="home-banner-right">
            <a href="#" target='_blank' rel='nofollow'><img
              src="{{ asset('assets/img/banner/01_Jul89646a1bf29bc2857060630315ce42da.png') }}" alt=""
              width="385" height="251" /></a>
            <a href="{{route('gaming-laptops.show')}}" target='_blank' rel='nofollow'><img
              src="{{ asset('assets/img/banner/18_Sepd0e3021672aa5eab9ac35addb573e511.png') }}" alt=""
              width="385" height="252" /></a>
          </div>
        </div>

        <div class="clearfix">
          <a href="#" target='_blank' rel='nofollow'><img
            src="{{ asset('assets/img/banner/01_Jul9ae198dee31c9df7259fb87d5b57c4b9.png') }}" alt=""
            width="437" height="180" /></a>
          <a href="#" target='_blank' rel='nofollow'><img
            src="{{ asset('assets/img/banner/01_Jul0603d458859790fb1099a51b8e815e70.png') }}" alt=""
            width="437" height="180" /></a>
          <a href="#" target='_blank' rel='nofollow'><img
            src="{{ asset('assets/img/banner/01_Julefdd70592ce2091c05ca2ff057403636.png') }}" alt=""
            width="437" height="180" /></a>
        </div>
      </div>

      <div class="home-deal-container" id="js-home-deal-container">
        <div class="deal-title-group lazy">
          <i class="icon-clock lazy" data-bg="{{ asset('assets/img/deal/deal-clock.png') }}"></i>
          <p>FLASH SALE</p>
        </div>
        <img src="{{ asset('assets/img/deal/deal-moi-ngay---3001.jpg') }}" alt="Flash sale 8-8"
          class="img-double-deal loading" data-was-processed="true">

        <div class="deal-date-group">
          <div class="deal-date-list" id="js-deal-date-holder">
            <a href="javascript:void(0)" class="current js-current-date" data-from_time="">
              <!-- Ngày sẽ được gán vào đây -->
              <span>Đang diễn ra</span>
            </a>
          </div>
        </div>


        <div class="deal-product-holder">
          <!-- // Deal nổi bật đang diễn ra -->
          <div class="product-deal-list d-flex flex-wrap justify-content-between active" id="js-active-group">
            @foreach ($top5FlashSaleItems as $item)
              @include('partials.flash-sale-p-item', ['product' => $item])
            @endforeach
          </div>
          {{-- <div class="product-deal-list" id="js-inactive-group"> </div> --}}
        </div>

        <div class="home-deal-btn">
          <a href="{{ route('flash-sale') }}">Xem thêm</a>
        </div>
      </div>
      <!-- Gợi ý cá nhân hoá-->
      <div class="box-pro-container bg-white js-box-container" style="min-height: 400px" data-id="395-850">
        <div class="box-title-container">
          <h2 class="box-title"> Gợi ý cho bạn</h2>
        </div>
        <div class="p-container custom-nav owl-carousel owl-theme" id="recommendations">
          @foreach ($gamingLaptops as $product)
            @include('partials.simple-p-item', ['product' => $product])
          @endforeach
          @foreach ($officeLaptops as $product)
            @include('partials.simple-p-item', ['product' => $product])
          @endforeach
        </div>
        {{-- @include('partials.userbased-recommendation', ['recommendedItems' => $recommendedItems]) --}}
      </div>
      <!-- Laptop gaming -->
      <div class="box-pro-container bg-white js-box-container" style="min-height: 400px" data-id="395-850">
        <div class="box-title-container">
          <h2 class="box-title"> Laptop Gaming - Đồ hoạ </h2>
          <div class="child-title">
            <a href="{{ url('/laptops/filter?brand=acer')}}">ACER</a>
            <a href="{{ url('/laptops/filter?brand=asus')}}">ASUS</a>
            <a href="{{ url('/laptops/filter?brand=dell')}}">DELL</a>
            <a href="{{ url('/laptops/filter?brand=lenovo')}}">LENOVO</a>
          </div>
        </div>
        <div class="p-container custom-nav owl-carousel owl-theme">
          @foreach ($gamingLaptops as $product)
            @include('partials.simple-p-item', ['product' => $product])
          @endforeach
        </div>
        <a href="{{ route('gaming-laptops.show') }}" class="view-cate"> XEM TẤT CẢ <i
            class="fa fa-angle-double-right"></i></a>
      </div>

      <!-- Laptop văn phòng -->
      <div class="box-pro-container bg-white js-box-container" style="min-height: 400px" data-id="395-850">
        <div class="box-title-container">
          <h2 class="box-title"> Laptop văn phòng </h2>
          <div class="child-title">
            <a href="{{ url('/laptops/filter?brand=acer')}}">ACER</a>
            <a href="{{ url('/laptops/filter?brand=asus')}}">ASUS</a>
            <a href="{{ url('/laptops/filter?brand=dell')}}">DELL</a>
            <a href="{{ url('/laptops/filter?brand=lenovo')}}">LENOVO</a>
          </div>
        </div>
        <div class="p-container custom-nav owl-carousel owl-theme">
          @foreach ($officeLaptops as $product)
            @include('partials.simple-p-item', ['product' => $product])
          @endforeach
        </div>
        <a href="{{ route('office-laptops.show') }}" class="view-cate"> XEM TẤT CẢ <i
            class="fa fa-angle-double-right"></i></a>
      </div>

      <!-- Linh kiện máy tính -->
      <div class="box-pro-container bg-white js-box-container" style="min-height: 400px" data-id="1253-848">
        <div class="box-title-container">
          <h2 class="box-title"> Linh Kiện Máy Tính </h2>
          <div class="child-title">
            <!---thay số là id danh mục sản phẩm-->
            <a href="/pc-parts/cpu">CPU</a>
            <a href="/pc-parts/gpu">GPU</a>
          </div>
        </div>
        <div class="p-container custom-nav owl-carousel owl-theme">
          @foreach ($cpus as $product)
            @include('partials.simple-p-item', ['product' => $product])
          @endforeach
        </div>
        <a href="{{ route('pc-parts.show') }}" class="view-cate"> XEM TẤT CẢ <i class="fa fa-angle-double-right"></i>
        </a>
      </div>

      <!-- // Màn Hình Máy Tính  -->
      <div class="box-pro-container bg-white js-box-container" style="min-height: 400px" data-id="1052-849">
        <div class="box-title-container">
          <h2 class="box-title"> Màn Hình Máy Tính </h2>
          <div class="child-title">
          </div>
        </div>
        <div class="p-container custom-nav owl-carousel owl-theme" id="js-collection-849" data-id="849">
          @foreach ($monitors as $product)
            @include('partials.simple-p-item', ['product' => $product])
          @endforeach
        </div>
        <a href="{{ route('monitors.show') }}" class="view-cate"> XEM TẤT CẢ <i class="fa fa-angle-double-right"></i>
        </a>
      </div>

      <!-- Bàn phím, Chuột - Gaming Gear  -->
      <div class="box-pro-container bg-white js-box-container" style="min-height: 400px" data-id="1255-1255">
        <div class="box-title-container">
          <h2 class="box-title"> Bàn phím, Chuột - Gaming Gear </h2>
          <div class="child-title">
            <!---thay số là id danh mục sản phẩm-->
            <!---ket thuc danh muc GAMING GEAR --->
          </div>
        </div>
        <div class="p-container custom-nav owl-carousel owl-theme" id="js-holder-1255" data-id="1255">
          @foreach ($gamingGears as $product)
            @include('partials.simple-p-item', ['product' => $product])
          @endforeach
        </div>
        <a href="{{ route('gaming-gears.show') }}" class="view-cate"> XEM TẤT CẢ <i
            class="fa fa-angle-double-right"></i> </a>
      </div>

      <!-- Cooling, Tản nhiệt  -->
      <div class="box-pro-container bg-white js-box-container" style="min-height: 400px" data-id="397-397">
        <div class="box-title-container">
          <h2 class="box-title"> Cooling, Tản nhiệt </h2>
          <div class="child-title">
          </div>
        </div>
        <div class="p-container custom-nav owl-carousel owl-theme" id="js-holder-397" data-id="397">
          @foreach ($coolings as $product)
            @include('partials.simple-p-item', ['product' => $product])
          @endforeach
        </div>
        <a href="coolings" class="view-cate"> XEM TẤT CẢ <i class="fa fa-angle-double-right"></i>
        </a>
      </div>
    </div>
  </section>
@endsection
@push('scripts')
  <script>
    fetch(`http:/127.0.0.1:9100?user_id={{ Auth::user()->id }}`)
    .then(response => response.json())
    .then(data => {
        console.log(data);
    })
    .catch(error => console.error(error));

  </script>
  <script>
    $(document).ready(function() {
      $("#js-home-slider").owlCarousel({
        items: 1,
        loop: false,
        autoplay: true,
        autoplayTimeout: 5000,
        nav: false,
        dots: true
      });
    });
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <script>
    $(document).ready(function() {
      $('.owl-carousel').owlCarousel({
        loop: false,
        margin: 10,
        nav: true,
        dots: true,
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 5
          },
          1000: {
            items: 6
          }

        }
      });
    });
  </script>
@endpush

@push('scripts')
  <script>
    // Lấy tất cả các thẻ có class .js-deal-time-holder
    document.querySelectorAll('.js-deal-time-holder').forEach((element) => {
      // Lấy thời gian kết thúc từ thuộc tính sale-end-time và chuyển đổi thành mili giây
      const endTime = element.getAttribute('sale-end-time') * 1000;

      // Thiết lập bộ đếm ngược cho từng thẻ
      const countdown = setInterval(function() {
        const now = new Date().getTime();
        const timeLeft = endTime - now;

        // Tính giờ, phút và giây từ timeLeft
        const totalHours = Math.floor(timeLeft / (1000 * 60 * 60));
        const totalMinutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
        const totalSeconds = Math.floor((timeLeft % (1000 * 60)) / 1000);

        // Cập nhật nội dung hiển thị cho từng thẻ
        element.querySelector('.js-hour').innerText = String(totalHours).padStart(2, '0');
        element.querySelector('.js-minute').innerText = String(totalMinutes).padStart(2, '0');
        element.querySelector('.js-seconds').innerText = String(totalSeconds).padStart(2, '0');

        // Kiểm tra khi hết thời gian
        if (timeLeft < 0) {
          clearInterval(countdown);
          element.innerText = "Đã kết thúc";
        }
      }, 1000);
    });
  </script>

@endpush

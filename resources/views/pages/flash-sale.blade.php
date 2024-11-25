@extends('layouts.app')
@dd($flashSaleItems)
@section('content')
  <div class="deal-page">
    <div class="container">
      <div class="owl-carousel owl-theme custom-dots deal-slider-group" id="js-deal-slider">
        <div><img src="{{ asset('assets/img/banner/08_Augc1485ca00a01839d8b12f775afcd1f6e.jpg') }}" alt=""></div>
        <div><img src="{{ asset('assets/img/banner/08_Augc1485ca00a01839d8b12f775afcd1f6e.jpg') }}" alt=""></div>
        <div><img src="{{ asset('assets/img/banner/08_Augc1485ca00a01839d8b12f775afcd1f6e.jpg') }}" alt=""></div>
      </div>

      <div class="deal-date-group">
        <div class="deal-date-list" id="js-deal-date-holder">
          <a href="javascript:void(0)" class="current js-current-date" data-from_time="">
            <!-- Ngày sẽ được gán vào đây -->
            <span>Đang diễn ra</span>
          </a>
        </div>
      </div>

      <div class="product-deal-holder active" id="js-active-group">
        <!-- // Deal đang diễn ra -->
        <div class="d-flex flex-wrap" id="js-deal-runing-holder" style="width: 100%">
          @foreach ($flashSaleItems as $item)
            @include('partials.flash-sale-p-item', ['product' => $item])
          @endforeach
        </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script>
    $(document).ready(function() {
      $("#js-deal-slider").owlCarousel({
        items: 1,
        loop: true,
        autoplay: false,
        nav: false,
        dots: true
      });
    });
  </script>
  <!-- jQuery (necessary for Owl Carousel) -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <!-- Owl Carousel JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
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

@extends('layouts.app')

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

          <a href="javascript:void(0)" class="current js-current-date" data-from_time="03-11-2024"
            data-id="js-active-group">03/11<span>Đang diễn ra</span></a>
        </div>
      </div>
      
      <div class="product-deal-holder active" id="js-active-group">
        <!-- // Deal đang diễn ra -->
        <div class="d-flex flex-wrap" id="js-deal-runing-holder" style="width: 100%">
          @for ($i = 0; $i < 10; $i++)
            @include('partials.flash-sale-p-item')
          @endfor
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
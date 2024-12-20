@extends('layouts.app')
@section('content')
<div class="container"></div>
    <div class="box-pro-container bg-white js-box-container" style="min-height: 400px" data-id="395-850">
        <div class="box-title-container">
            <h2 class="box-title"> Gợi ý cho bạn</h2>
        </div>
        <div class="p-container custom-nav owl-carousel owl-theme">
            @foreach ($recommendedItems as $recommendeditem)
                @include('partials.userbased-recommended-p-item', ['recommendeditem' => $recommendeditem])
            @endforeach
        </div>
    </div>
  </div>
@endsection
@push('scripts')
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



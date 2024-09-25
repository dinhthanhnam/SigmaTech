<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta http-equiv="content-language" content="vi" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SigmaTech - Siêu Thị PC , Laptop giá tốt nhất Việt Nam</title>

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('assets/css/lib_2020.css') }}" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('assets/css/web_pc_2020.css') }}" type="text/css"/> 
    <link rel="stylesheet" href="{{ asset('assets/css/lib.css') }}" type="text/css"/> 
    <link rel="stylesheet" href="{{ asset('assets/css/icon_marketing.css') }}" type="text/css"/> 
    <link rel="stylesheet" href="{{ asset('assets/css/iconthongso.css') }}" type="text/css"/> 
    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" 
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" 
    crossorigin="anonymous" 
    referrerpolicy="no-referrer">
    @stack('styles')

</head>
<body>
    <header>
        @include('layouts.header')
    </header>

    @include('layouts.header-global')

    <main>
        @if (Request::is('/')) 
            @yield('content')
        @elseif (Request::is('laptops')) 
            @yield('laptops')
        @elseif (Request::is('gaming-laptops'))
            @yield('gaming-laptops')
        @elseif (Request::is('shipping-policy'))
            @yield('shipping-policy')
        @elseif (Request::is('warranty-policy'))
            @yield('warranty-policy')
        @elseif (Request::is('flash-sale'))
            @yield('flash-sale')
        @elseif (Request::is('laptop-outlet'))
            @yield('laptop-outlet')
        @elseif (Request::is('login'))
            @yield('login')
        @elseif (Request::is('signup'))
            @yield('signup')
        @endif
    </main>

    <footer class="bg-white">
        
        @include('layouts.footer')
    </footer>

    <script src="https://code.jquery.com/jquery-3.7.1.js" 
    integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" 
    crossorigin="anonymous"></script>
    <script src="{{asset('assets/js/lib.js')}}"></script>
    <script>
        $(document).ready(function() {
            $(window).scroll(function() {
                menu_fixed();
            });
            var currentUrl = window.location.pathname;
            // Kiểm tra nếu không phải là trang chính ("/" là trang index)
            if (currentUrl !== "/") {
                $(".header-menu-holder").hide(); // Ẩn phần tử
            }
        });

        function menu_fixed() {
            var height = 700;

            if ($(window).scrollTop() > height) {
                $('.header-main-container').addClass("header-fixed");
                $('.header-global-block').show();
            } else {
                $('.header-main-container').removeClass("header-fixed");
                $('.header-global-block').hide();
            }
        }
    </script>

    @stack('scripts')
</body>
</html>

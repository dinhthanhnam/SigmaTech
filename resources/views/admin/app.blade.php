<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    @csrf

    <meta http-equiv="content-language" content="vi" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SigmaTech CMS</title>
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('assets/css/web_pc_2020.css') }}" type="text/css"/> 
    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" 
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" 
    crossorigin="anonymous" 
    referrerpolicy="no-referrer">
    @stack('styles')

</head>
<body>
    <main>
        @yield('content')
    </main>
    
    @stack('scripts')
</body>
</html>

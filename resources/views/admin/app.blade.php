<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @csrf
    <meta http-equiv="content-language" content="vi" />
    <title>SigmaTech CMS</title>
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <!-- or -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
    @stack('styles')
</head>

<body onload="time()" class="app sidebar-mini rtl">
    <div class="app-container d-flex flex-column">
        <header class="app-header">
            <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
            <div class="d-flex align-items-center justify-content-between w-100 header-main">
                <a href="/" class="logo mx-auto">
                    <img src="{{ asset('assets/img/sigmatech-yellow.png') }}" alt="SigmaTech Logo" class="logo-img"
                        style = "width: auto; height: 50px;" />
                </a>
                <div class="header-right d-flex align-items-center">
                    <div class="item clearfix px-2">
                        <a href="#" title="Thông báo" class="d-flex">
                            <i class="fa-solid fa-bell"></i>
                        </a>
                    </div>
                    <li style = "list-style: none;">
                        <a class="app-nav__item d-flex align-items-center"
                            onclick="document.getElementById('logOut').submit();">
                            <i class="fa-solid fa-right-from-bracket "></i>
                        </a>
                    </li>
                </div>
            </div>
            <form id="logOut" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </header>

        <div class="flex-grow-1">
            <aside class="app-sidebar">
                <div class="app-sidebar__user">
                    <img class="app-sidebar__user-avatar" src="{{ asset('assets/img/header-icon-right/user.png') }}"
                        width="50px" alt="User Image">
                    <div>
                        <p class="app-sidebar__user-name"><b>Admin SigmaTech</b></p>
                        <p class="app-sidebar__user-designation">Chào mừng bạn trở lại</p>
                    </div>
                </div>
                <hr style="background-color: white">
                <ul class="app-menu">
                    <li><a class="app-menu__item" href="{{ route('admin.dashboard') }}"><i
                                class='app-menu__icon fa-solid fa-square-poll-vertical'></i><span
                                class="app-menu__label">Dashboard</span></a></li>
                    <li><a class="app-menu__item" href="{{ route('admin.show-product') }}"><i
                                class='app-menu__icon fa-solid fa-table'></i><span class="app-menu__label">Quản lý sản
                                phẩm</span></a></li>
                    <li><a class="app-menu__item" href="table-data-oder.html"><i
                                class='app-menu__icon fa-solid fa-cart-shopping'></i><span class="app-menu__label">Quản
                                lý đơn hàng</span></a></li>
                    <li><a class="app-menu__item" href="table-data-banned.html"><i
                                class='app-menu__icon fa-solid fa-network-wired'></i><span class="app-menu__label">Quản
                                lý danh mục</span></a></li>
                    <li><a class="app-menu__item" href="table-data-money.html"><i
                                class='app-menu__icon fa-solid fa-tags'></i><span class="app-menu__label">Flash Sale &
                                Khuyến mãi</span></a></li>
                    <li><a class="app-menu__item" href="#"><i class='app-menu__icon fa-solid fa-user'></i><span
                                class="app-menu__label">Quản lý tài khoản</span></a></li>
                </ul>
            </aside>

            <main class="content-area flex-grow-1">
                @yield('content')
            </main>
        </div>
    </div>

    @stack('scripts')
    <script>
        //Thời Gian
        function time() {
            var today = new Date();
            var weekday = new Array(7);
            weekday[0] = "Chủ Nhật";
            weekday[1] = "Thứ Hai";
            weekday[2] = "Thứ Ba";
            weekday[3] = "Thứ Tư";
            weekday[4] = "Thứ Năm";
            weekday[5] = "Thứ Sáu";
            weekday[6] = "Thứ Bảy";
            var day = weekday[today.getDay()];
            var dd = today.getDate();
            var mm = today.getMonth() + 1;
            var yyyy = today.getFullYear();
            var h = today.getHours();
            var m = today.getMinutes();

            m = checkTime(m);

            nowTime = h + " giờ " + m + " phút ";
            if (dd < 10) {
                dd = '0' + dd
            }
            if (mm < 10) {
                mm = '0' + mm
            }
            today = day + ', ' + dd + '/' + mm + '/' + yyyy;
            tmp = '<span class="date"> ' + today + ' - ' + nowTime + '</span>';
            document.getElementById("clock").innerHTML = tmp;
            clocktime = setTimeout("time()", "1000", "Javascript");

            function checkTime(i) {
                if (i < 10) {
                    i = "0" + i;
                }
                return i;
            }
        }
    </script>
</body>

</html>

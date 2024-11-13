<div class="header-main-container">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center header-main">
            <a href="/" class="logo">
                <img src="{{ asset('assets/img/sigmatech-yellow.png') }}" alt="SigmaTech Logo"
                    class="logo-img w-auto h-auto" />
            </a>
            <!-- search -->
            <div class="header-search">
                <form method="get" action="/tim" enctype="multipart/form-data" class="clearfix search-form bg-white">
                    <select name="scat_id">
                        <option value="">Tất cả danh mục</option>
                        <option value="1614">Laptop Gaming - Đồ Họa</option>
                        <option value="395">Laptop Văn Phòng</option>
                        <option value="1253">Linh Kiện Máy Tính</option>
                        <option value="1052">Màn Hình Máy Tính</option>
                        <option value="1255">Bàn phím, Chuột - Gaming Gear</option>
                        <option value="393">Loa, Tai Nghe, Webcam, Tivi</option>
                        <option value="397">Cooling, Tản nhiệt</option>
                        <option value="2112">Phụ Kiện Laptop, PC, Khác</option>
                    </select>
                    <div class="searh-form-container">
                        <input type="text" id="js-search" class="text_search" value="" name="q"
                            placeholder="Tìm kiếm sản phẩm..." autocomplete="off">
                        <button type="submit" class="submit-search">
                            <i class="fa fa-search"></i> Tìm kiếm
                        </button>
                    </div>
                </form>

                <div class="autocomplete-suggestions"></div>
            </div>

            <!-- icon right -->
            <div class="header-icon-right d-flex align-items-center justify-content-between">
                <div class="item clearfix">
                    <a href="#" title="Mua hàng online" class="header-icon-phone d-flex"
                        style="align-items:center;">
                        <img src="{{ asset('assets/img/header-icon-right/phone.png') }}" class="mr-1"
                            alt="support" />
                        <p class="icon-text m-0" style="line-height: 1.2;">
                            <b><span class="text-15 d-block">1900 0323</span></b>
                            <span class="text-15 d-block">0862 136 488</span> </b>
                            <b><span class="text-15 d-block">0931 105 498</span> </b>
                        </p>
                    </a>
                </div>

                @if (Auth::guest())
                    <div class="item clearfix">
                        <img src="{{ asset('assets/img/header-icon-right/user.png') }}" class="mr-1 my-1"
                            alt="account" />
                        <div class="icon-text m-0 text-14">
                            <a href="{{ route('register') }}" class="d-block"> Đăng ký </a>
                            <a href="{{ route('login') }}" class="d-block"> Đăng nhập </a>
                        </div>
                    </div>
                @else
                    <div class="item clearfix">
                        <a href="{{ Auth::user()->utype === 'ADM' ? route('admin.index') : route('user-account') }}"
                            title="Tài khoản">
                            <img src="{{ asset('assets/img/header-icon-right/user.png') }}" class="mr-1 my-1" />
                            <div class="icon-text m-0 text-14">
                                <b>
                                    <a href="{{ Auth::user()->utype === 'ADM' ? route('admin.index') : route('user-account') }}"
                                        class="d-block">{{ Auth::user()->name }}</a>
                                </b>
                                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                                    @csrf
                                    <button type="submit"
                                        style="background:none;color:aliceblue;border:none;cursor:pointer;text-align:left;padding:0;font-size:13px;text-decoration:underline;">
                                        Đăng xuất
                                    </button>
                                </form>
                            </div>
                        </a>
                    </div>
                @endif

                <div class="item clearfix">
                    <a href="{{ Auth::check() ? route('cart') : route('login') }}" class="d-block position-relative"
                        title="Giỏ hàng của bạn" id="cart-icon">
                        <img src="{{ asset('assets/img/header-icon-right/cart.png') }}" class="my-2"
                            alt="cart" />
                        <span id="cart-count" class="badge badge-danger position-absolute" style="top: 0; right: 0;">
                            0
                        </span>
                    </a>
                </div>

            </div>
            <!-- mennu -->
            <div class="header-menu d-flex align-items-center">
                <div class="header-menu-container">
                    <a href="#" class="d-block font-weight-light text-white menu-title" style="font-size: 15px;">
                        <i class="fa fa-bars"></i> DANH MỤC SẢN PHẨM
                    </a>
                    <div class="header-menu-holder">
                        <div class="item bg-white" data-id="1614">
                            <a href="{{ route('gaming-laptops.show') }}" class="pro-cate-1">
                                <span class="cat-thumb-item" style="width: 35px;text-align: center">
                                    <img src="{{ asset('assets/img/cat/cat_3dcc022e961d90ea6b636f367e5e5f9d.png') }}"
                                        alt="Laptop Gaming - Đồ Họa" />
                                </span>
                                <span class="title" title="Laptop Gaming - Đồ Họa"> Laptop Gaming - Đồ Họa</span>
                            </a>
                            <div class="sub-menu  no-big-img">
                                <div class="cat-child-holder" id="js-menu-container">
                                    <div class="cat-child-items">
                                        <a href="#" class="cate-2" title="Laptop Theo Hãng"
                                            id="">Laptop Theo Hãng</a>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" title="Laptop Asus"
                                                class="js-menu" data-filter_code="brand" data-value="asus">Laptop Asus</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" title="Laptop Lenovo"
                                                    class="js-menu" data-filter_code="brand" data-value="lenovo">Laptop
                                                    Lenovo</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" title="Laptop Dell"
                                                class="js-menu" data-filter_code="brand" data-value="dell">Laptop Dell</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" title="Laptop Acer"
                                                class="js-menu" data-filter_code="brand" data-value="acer">Laptop Acer</a>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="cat-child-items">
                                        <a href="#" class="cate-2" title="Laptop Theo Khoảng Giá"
                                            id="js-menu-2386">Laptop Theo Khoảng Giá</a>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#"
                                                    title="Laptop Từ 10 - 15 Triệu" class="js-menu" data-filter_code="price"
                                                    data-value="min=10000000&max=15000000">Laptop Từ 10 - 15 Triệu</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#"
                                                    title="Laptop Từ 15 - 20 Triệu" class="js-menu" data-filter_code="price"
                                                    data-value="min=15000000&max=20000000">Laptop Từ 15 - 20 Triệu</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#"
                                                    title="Laptop Từ 20 - 25 Triệu" class="js-menu" data-filter_code="price"
                                                    data-value="min=20000000&max=25000000">Laptop Từ 20 - 25 Triệu</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#"
                                                    title="Laptop Từ 25 - 30 Triệu" class="js-menu" data-filter_code="price"
                                                    data-value="min=25000000&max=30000000">Laptop Từ 25 - 30 Triệu</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#"
                                                    title="Laptop Từ 30 - 35 Triệu" class="js-menu" data-filter_code="price"
                                                    data-value="min=30000000&max=35000000">Laptop Từ 30 - 35 Triệu</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#"
                                                    title="Laptop Từ 35 - 40 Triệu" class="js-menu" data-filter_code="price"
                                                    data-value="min=35000000&max=40000000">Laptop Từ 35 - 40 Triệu</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" title="Laptop Từ 40 - 60 Triệu" class="js-menu" data-filter_code="price" data-value="min=40000000&max=60000000">Laptop Từ 40 - 60 Triệu</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" title="Laptop Trên 60 Triệu" class="js-menu" data-filter_code="price" data-value="min=60000000&max=150000000">Laptop Trên 60 Triệu</a>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="cat-child-items">
                                        <a href="#" class="cate-2" title="Laptop Theo Cấu Hình CPU" id="js-menu-2377">Laptop Theo Cấu Hình CPU</a>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" class="js-menu" data-filter_code="cpu" data-value="Intel Core i3">Intel Core i3</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" class="js-menu" data-filter_code="cpu" data-value="Intel Core i5">Intel Core i5</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" class="js-menu" data-filter_code="cpu" data-value="Intel Core i7">Intel Core i7</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" class="js-menu" data-filter_code="cpu" data-value="Intel Core i9">Intel Core i9</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" class="js-menu" data-filter_code="cpu" data-value="Ryzen 3">Ryzen 3</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" class="js-menu" data-filter_code="cpu" data-value="Ryzen 5">Ryzen 5</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" class="js-menu" data-filter_code="cpu" data-value="Ryzen 7">Ryzen 7</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" class="js-menu" data-filter_code="cpu" data-value="Ryzen 9">Ryzen 9</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cat-child-items">
                                        <a href="#" class="cate-2"
                                            title="Laptop Theo Kích Thước Màn" id="js-menu-2398">Laptop Theo Kích Thước Màn</a>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#"
                                                    title="Laptop Khoảng 17 inch" class="js-menu" data-filter_code="screensize" data-value="17">Laptop Khoảng 17 inch</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#"
                                                    title="Laptop Khoảng 16 inch" class="js-menu" data-filter_code="screensize" data-value="16">Laptop Khoảng 16 inch</a>
                                            </div>
                                        </div>

                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#"
                                                    title="Laptop Khoảng 15 inch" class="js-menu" data-filter_code="screensize" data-value="15">Laptop Khoảng 15 inch</a>
                                            </div>
                                        </div>

                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#"
                                                    title="Laptop Khoảng 14 inch" class="js-menu" data-filter_code="screensize" data-value="14">Laptop Khoảng 14 inch</a>
                                            </div>
                                        </div>

                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#"
                                                    title="Laptop Khoảng 13 inch" class="js-menu" data-filter_code="screensize" data-value="13">Laptop Khoảng 13 inch</a>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="cat-child-items">
                                        <a href="#" class="cate-2" id="js-menu-2378">Laptop Theo VGA</a>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" class="js-menu" data-filter_code="vga" data-value="RTX 2050" id="js-menu-1613">
                                                    NVIDIA GeForce RTX 2050
                                                </a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" class="js-menu" data-filter_code="vga" data-value="RTX 3050" id="js-menu-1905">
                                                    NVIDIA GeForce RTX 3050
                                                </a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" class="js-menu" data-filter_code="vga" data-value="RTX 4050" id="js-menu-1905">
                                                    NVIDIA GeForce RTX 4050
                                                </a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" class="js-menu" data-filter_code="vga" data-value="RTX 4060" id="js-menu-1905">
                                                    NVIDIA GeForce RTX 4060
                                                </a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" class="js-menu" data-filter_code="vga" data-value="RTX 4070" id="js-menu-1905">
                                                    NVIDIA GeForce RTX 4070
                                                </a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" class="js-menu" data-filter_code="vga" data-value="RTX 4080" id="js-menu-1907">
                                                    NVIDIA GeForce RTX 4080
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item bg-white" data-id="395">
                            <a href="{{ route('office-laptops.show') }}" class="pro-cate-1">
                                <span class="cat-thumb-item" style="width: 35px;text-align: center">
                                    <img src="{{ asset('assets/img/cat/cat_b706c0f50035bddb63ca6e91efef7703.png') }}"
                                        alt="Laptop - Tablet - Mobile" />
                                </span>
                                <span class="title" title="Laptop - Tablet - Mobile">Laptop Văn Phòng</span>
                            </a>
                            <div class="sub-menu  no-big-img">
                                <div class="cat-child-holder" id="js-menu-container">
                                    <div class="cat-child-items">
                                        <a href="#" class="cate-2" title="Laptop Theo Hãng"
                                            id="">Laptop Theo Hãng</a>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" title="Laptop Asus"
                                                    id="js-menu-1058">Laptop Asus</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" title="Laptop Lenovo"
                                                    id="js-menu-1059">Laptop Lenovo</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" title="Laptop Dell"
                                                    id="js-menu-1012">Laptop Dell</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" title="Laptop Acer"
                                                    id="js-menu-1060">Laptop Acer</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cat-child-items">
                                        <a href="#" class="cate-2" title="Laptop Theo Khoảng Giá"
                                            id="js-menu-2386">Laptop Theo Khoảng Giá</a>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/laptop-tu-10-15-trieu_dm2388.html"
                                                    title="Laptop Từ 10 - 15 Triệu" id="js-menu-2388">Laptop Từ 10 - 15 Triệu</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/laptop-tu-15-20-trieu_dm2389.html"
                                                    title="Laptop Từ 15 - 20 Triệu" id="js-menu-2389">Laptop Từ 15 - 20 Triệu</a>
                                            </div>
                                        </div>

                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/laptop-tu-20-25-trieu_dm2390.html"
                                                    title="Laptop Từ 20 - 25 Triệu" id="js-menu-2390">Laptop Từ 20 - 25 Triệu</a>
                                            </div>
                                        </div>

                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/laptop-tu-25-30-trieu_dm2391.html"
                                                    title="Laptop Từ 25 - 30 Triệu" id="js-menu-2391">Laptop Từ 25 - 30 Triệu</a>
                                            </div>
                                        </div>

                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/laptop-tu-30-35-trieu_dm2392.html"
                                                    title="Laptop Từ 30 - 35 Triệu" id="js-menu-2392">Laptop Từ 30 - 35 Triệu</a>
                                            </div>
                                        </div>

                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/laptop-tu-35-40-trieu_dm2393.html"
                                                    title="Laptop Từ 35 - 40 Triệu" id="js-menu-2393">Laptop Từ 35 - 40 Triệu</a>
                                            </div>
                                        </div>

                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/laptop-tu-40-60-trieu.html" title="Laptop Từ 40 - 60 Triệu" id="js-menu-2452">Laptop Từ 40 - 60 Triệu</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/laptop-tren-60-trieu.html" title="Laptop Trên 60 Triệu"
                                                    id="js-menu-2453">Laptop Trên 60 Triệu</a>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="cat-child-items">
                                        <a href="/laptop-theo-cau-hinh-cpu_dm2377.html" class="cate-2"
                                            title="Laptop Theo Cấu Hình CPU" id="js-menu-2377">Laptop Theo Cấu Hình CPU</a>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/laptop-core-i3_dm2286.html" title="Laptop Core i3"
                                                    id="js-menu-2286">Intel Core i3</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/laptop-core-i5_dm2287.html" title="Laptop Core i5"
                                                    id="js-menu-2287">Intel Core i5</a>
                                            </div>
                                        </div>

                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/laptop-core-i7_dm2288.html" title="Laptop Core i7"
                                                    id="js-menu-2288">Intel Core i7</a>
                                            </div>
                                        </div>

                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/laptop-core-i9_dm2381.html" title="Laptop Core i9"
                                                    id="js-menu-2381">Intel Core i9</a>
                                            </div>
                                        </div>

                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/laptop-ryzen-3_dm2382.html" title="Laptop Ryzen 3"
                                                    id="js-menu-2382">Ryzen 3</a>
                                            </div>
                                        </div>

                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/laptop-ryzen-5_dm2383.html" title="Laptop Ryzen 5"
                                                    id="js-menu-2383">Ryzen 5</a>
                                            </div>
                                        </div>

                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/laptop-ryzen-7_dm2384.html" title="Laptop Ryzen 7"
                                                    id="js-menu-2384">Ryzen 7</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/laptop-ryzen-9_dm2385.html" title="Laptop Ryzen 9"
                                                    id="js-menu-2385">Ryzen 9</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cat-child-items">
                                        <a href="/laptop-theo-kich-thuoc-man-hinh_dm2398.html" class="cate-2"
                                            title="Laptop Theo Kích Thước Màn" id="js-menu-2398">Laptop Theo Kích Thước Màn</a>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/laptop-khoang-17-inch_dm2405.html"
                                                    title="Laptop Khoảng 17 inch" id="js-menu-2405">Laptop Khoảng 17 inch</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/laptop-khoang-16-inch_dm2404.html"
                                                    title="Laptop Khoảng 16 inch" id="js-menu-2404">Laptop Khoảng 16 inch</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/laptop-khoang-15-inch_dm2403.html"
                                                    title="Laptop Khoảng 15 inch" id="js-menu-2403">Laptop Khoảng 15 inch</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/laptop-khoang-14-inch_dm2402.html"
                                                    title="Laptop Khoảng 14 inch" id="js-menu-2402">Laptop Khoảng 14 inch</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/laptop-khoang-13-inch_dm2401.html"
                                                    title="Laptop Khoảng 13 inch" id="js-menu-2401">Laptop Khoảng 13 inch</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cat-child-items">
                                        <a href="#" class="cate-2"
                                            title="Laptop Theo Ngành Nghề" id="js-menu-2378">Laptop Theo Ngành Nghề</a>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#"
                                                    title="Laptop Văn Phòng" id="js-menu-1613">Laptop Văn Phòng</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#"
                                                    title="Laptop Sinh Viên" id="js-menu-1612">Laptop Sinh Viên</a>
                                                <div class="cat-4-list">
                                                    <a href="#" title="Laptop Cho Sinh Viên Thiết Kế Đồ Họa" id="js-menu-1903">Laptop Cho Sinh Viên Thiết Kế Đồ Họa</a>
                                                    <a href="#" title="Laptop Cho Sinh Viên Kinh Tế" id="js-menu-1904">Laptop Cho Sinh Viên Kinh Tế</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#"
                                                    title="Laptop Cho Lập Trình Viên" id="js-menu-1905">Laptop Cho Lập Trình Viên</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/laptop-cho-ke-toan.html" title="Laptop Cho Kế Toán" id="js-menu-1907">Laptop Cho Kế Toán</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/laptop-doanh-nhan.html" title="Laptop Doanh Nhân" id="js-menu-1908">Laptop Doanh Nhân</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/laptop-cho-data-analystic.html" title="Laptop Cho Data Analystic" id="js-menu-2958">Laptop Cho Data Analystic</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item bg-white" data-id="1253">
                            <a href="{{ route('pc-parts.show') }}" class="pro-cate-1">
                                <span class="cat-thumb-item" style="width: 35px;text-align: center">
                                    <img src="{{ asset('assets/img/cat/cat_cf48adbcc24dd52850830b617fdce703.png') }}"
                                        alt="Linh Kiện Máy Tính" />
                                </span>
                                <span class="title" title="Linh Kiện Máy Tính"> Linh Kiện Máy Tính</span>
                            </a>
                            <div class="sub-menu no-big-img">
                                <div class="cat-child-holder" id="js-menu-container">

                                    <div class="cat-child-items">
                                        <a href="/cpu-bo-vi-xu-ly.html" class="cate-2" title="CPU - Bộ Vi Xử Lý"
                                            id="js-menu-1025">CPU - Bộ Vi Xử Lý</a>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/cpu/Intel" title="Cpu Intel" id="js-menu-1307">CPU INTEL</a>
                                                <div class="cat-4-list">
                                                    <a href="/cpu-intel-core-i9_dm1688.html" title="CPU Intel Core i9"
                                                        id="js-menu-1688">CPU Intel Core i9</a>
                                                    <a href="/cpu-intel-core-i7_dm1661.html" title="CPU Intel Core i7"
                                                        id="js-menu-1661">CPU Intel Core i7</a>
                                                    <a href="/cpu-intel-core-i5_dm1660.html" title="CPU Intel Core i5"
                                                        id="js-menu-1660">CPU Intel Core i5</a>
                                                    <a href="/cpu-intel-core-i3_dm1659.html" title="CPU Intel Core i3"
                                                        id="js-menu-1659">CPU Intel Core i3</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/cpu/AMD" title="CPU AMD" id="js-menu-1308">CPU AMD</a>
                                                <div class="cat-4-list">
                                                    <a href="/cpu-amd-ryzen-9_dm1743.html" title="AMD Ryzen 9"
                                                        id="js-menu-1743">AMD Ryzen 9</a>
                                                    <a href="/amd-ryzen-7_dm1644.html" title="AMD Ryzen 7"
                                                        id="js-menu-1644">AMD Ryzen 7</a>
                                                    <a href="/amd-ryzen-5_dm1642.html" title="AMD Ryzen 5"
                                                        id="js-menu-1642">AMD Ryzen 5</a>
                                                    <a href="/amd-ryzen-3_dm1643.html" title="AMD Ryzen 3"
                                                        id="js-menu-1643">AMD Ryzen 3</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cat-child-items">
                                        <a href="/bo-mach-chu.html" class="cate-2" title="Mainboard - Bo Mạch Chủ"
                                            id="js-menu-1024">Mainboard - Bo Mạch Chủ</a>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/mainboard-intel.html" title="Mainboard cho CPU INTEL"
                                                    id="js-menu-1316">Mainboard
                                                    cho CPU INTEL</a>
                                                <div class="cat-4-list">
                                                    <a href="/mainboard-x299.html" title="MAINBOARD X299"
                                                        id="js-menu-1998">MAINBOARD X299</a>
                                                    <a href="/mainboard-z690_dm2327.html" title="MAINBOARD Z690"
                                                        id="js-menu-2327">MAINBOARD Z690</a>
                                                    <a href="/mainboard-b560.html" title="MAINBOARD B560"
                                                        id="js-menu-2092">MAINBOARD B560</a>
                                                    <a href="/mainboard-h510_dm2199.html" title="MAINBOARD H510"
                                                        id="js-menu-2199">MAINBOARD H510</a>
                                                    <a href="/mainboard-h410.html" title="MAINBOARD H410"
                                                        id="js-menu-2004">MAINBOARD H410</a>
                                                    <a href="/mainboard-b760.html" title="MAINBOARD B760"
                                                        id="js-menu-2649">MAINBOARD B760</a>
                                                    <a href="/mainboard-z790.html" title="MAINBOARD Z790"
                                                        id="js-menu-2640">MAINBOARD Z790</a>
                                                    <a href="/mainboard-h610_dm2376.html" title="MAINBOARD H610"
                                                        id="js-menu-2376">MAINBOARD H610</a>
                                                    <a href="/mainboard-b660_dm2375.html" title="MAINBOARD B660"
                                                        id="js-menu-2375">MAINBOARD B660</a>
                                                    <a href="/mainboard-h470.html" title="MAINBOARD H470"
                                                        id="js-menu-2190">MAINBOARD H470</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/mainboard-amd.html" title="Mainboard cho CPU AMD"
                                                    id="js-menu-1315">Mainboard cho
                                                    CPU AMD</a>
                                                <div class="cat-4-list">
                                                    <a href="/mainboard-trx40.html" title="MAINBOARD TRX40"
                                                        id="js-menu-2006">MAINBOARD
                                                        TRX40</a>
                                                    <a href="/mainboard-x570.html" title="MAINBOARD X570"
                                                        id="js-menu-2007">MAINBOARD X570</a>
                                                    <a href="/mainboard-b550.html" title="MAINBOARD B550"
                                                        id="js-menu-2008">MAINBOARD B550</a>
                                                    <a href="/mainboard-b450.html" title="MAINBOARD B450"
                                                        id="js-menu-2009">MAINBOARD B450</a>
                                                    <a href="/mainboard-a520.html" title="MAINBOARD A520"
                                                        id="js-menu-2010">MAINBOARD A520</a>
                                                    <a href="/mainboard-a320.html" title="MAINBOARD A320"
                                                        id="js-menu-2011">MAINBOARD A320</a>
                                                    <a href="/mainboard-x670.html" title="MAINBOARD X670"
                                                        id="js-menu-2620">MAINBOARD X670</a>
                                                    <a href="/mainboard-x670e.html" title="MAINBOARD X670E"
                                                        id="js-menu-2621">MAINBOARD X670E</a>
                                                    <a href="/mainboard-b650.html" title="MAINBOARD B650"
                                                        id="js-menu-2638">MAINBOARD B650</a>
                                                    <a href="/mainboard-b650e.html" title="MAINBOARD B650E"
                                                        id="js-menu-2639">MAINBOARD B650E</a>
                                                    <a href="/mainboard-a620.html" title="MAINBOARD A620"
                                                        id="js-menu-2764">MAINBOARD A620</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cat-child-items">
                                        <a href="/pc-parts/vga" class="cate-2" title="VGA - Card Màn Hình"
                                            id="js-menu-1155">VGA - Card Màn Hình</a>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/card-man-hinh-nvidia.html" title="VGA NVIDIA"
                                                    id="js-menu-1963">VGA NVIDIA</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/card-man-hinh-amd.html" title="VGA AMD"
                                                    id="js-menu-1965">VGA AMD</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cat-child-items">
                                        <a href="/pc-parts/ram" class="cate-2" title="Ram - Bộ Nhớ Trong"
                                            id="js-menu-1234">Ram - Bộ Nhớ Trong</a>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" title="Ram PC"
                                                    id="js-menu-2015">RAM - PC</a>
                                                <div class="cat-4-list">
                                                    <a href="/ram-bus-1600.html" title=""
                                                        id="js-menu-2028">DDR3</a>
                                                    <a href="/ram-bus-2400.html" title=""
                                                        id="js-menu-2029">DDR4</a>
                                                    <a href="/ram-bus-2666.html" title=""
                                                        id="js-menu-2030">DDR5</a>
                                                    <a href="/ram-bus-2800.html" title=""
                                                        id="js-menu-2031">DDR6</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" title="Ram Laptop"
                                                    id="js-menu-2012">Ram Laptop</a>
                                                <div class="cat-4-list">
                                                    <a href="/ram-corsair.html" title=""
                                                        id="js-menu-1420">DDR3L</a>
                                                    <a href="/ram-gskill.html" title=""
                                                        id="js-menu-1306">DDR4L</a>
                                                    <a href="/ram-kingston.html" title=""
                                                        id="js-menu-1304">DDR5L</a>
                                                    <a href="/ram-kingmax.html" title=""
                                                        id="js-menu-1305">DDR6L</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/ram-theo-dung-luong.html" title="RAM theo Dung Lượng"
                                                    id="js-menu-2014">RAM theo Dung Lượng</a>
                                                <div class="cat-4-list">
                                                    <a href="/ram-4gb.html" title="RAM 4GB" id="js-menu-2023">RAM 4GB</a>
                                                    <a href="/ram-8gb.html" title="RAM 8GB" id="js-menu-2024">RAM 8GB</a>
                                                    <a href="/ram-16gb.html" title="RAM 16GB" id="js-menu-2025">RAM 16GB</a>
                                                    <a href="/ram-32gb.html" title="RAM 32GB" id="js-menu-2026">RAM 32GB</a>
                                                    <a href="/ram-64gb.html" title="RAM 64GB" id="js-menu-2027">RAM 64GB</a>
                                                    <a href="/ram-96gb.html" title="RAM 96GB" id="js-menu-2754">RAM 96GB</a>
                                                    <a href="/ram-48gb.html" title="RAM 48GB" id="js-menu-2757">RAM 48GB</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cat-child-items">
                                        <a href="/pc-parts/psu" class="cate-2"
                                            title="PSU - Nguồn Máy Tính" id="js-menu-1051">PSU - Nguồn Máy Tính</a>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/nguon-may-tinh-cac-hang.html" title="Nguồn theo hãng"
                                                    id="js-menu-1648">Nguồn theo hãng</a>
                                                <div class="cat-4-list">
                                                    <a href="/nguon-gigabyte.html" title="Nguồn Gigabyte"
                                                        id="js-menu-2100">Nguồn Gigabyte</a>
                                                    <a href="/nguon-msi.html-1" title="Nguồn MSI"
                                                        id="js-menu-2513">Nguồn MSI</a>
                                                    <a href="/nguon-xigmatek.html" title="Nguồn Xigmatek"
                                                        id="js-menu-1429">Nguồn Xigmatek</a>
                                                    <a href="/nguon-cooler-master.html" title="Nguồn Cooler Master"
                                                        id="js-menu-1432">Nguồn Cooler Master</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/cong-suat-nguon.html" title="Công Suất Nguồn"
                                                    id="js-menu-2084">Công Suất Nguồn</a>
                                                <div class="cat-4-list">
                                                    <a href="/nguon-duoi-400w.html" title="Dưới 400W" id="js-menu-1650">Dưới 400W</a>
                                                    <a href="/nguon-may-tinh-tu-400w-550w.html" title="400W - 550W" id="js-menu-1651">400W - 550W</a>
                                                    <a href="/nguon-may-tinh-tu-550w-650w.html" title="550W - 650W" id="js-menu-1652">550W - 650W</a>
                                                    <a href="/nguon-may-tinh-tu-650w-800w.html" title="650W - 800W" id="js-menu-1654">650W - 800W</a>
                                                    <a href="/nguon-tu-800w-den-1000w.html" title="800W - 1000W" id="js-menu-1738">800W - 1000W</a>
                                                    <a href="/nguon-tren-1000w.html" title="Trên 1000W" id="js-menu-1739">Trên 1000W</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/chuan-nguon.html" title="Chuẩn Nguồn"
                                                    id="js-menu-2085">Chuẩn Nguồn</a>
                                                <div class="cat-4-list">
                                                    <a href="/80-plus.html" title="80 plus" id="js-menu-2088">80 plus</a>
                                                    <a href="/80-plus-bronze.html" title="80 Plus Bronze" id="js-menu-2089">80 Plus Bronze</a>
                                                    <a href="/80-plus-gold.html" title="80 Plus Gold" id="js-menu-2090">80 Plus Gold</a>
                                                    <a href="/80-plus-platinum.html" title="80 Plus Platinum" id="js-menu-2091">80 Plus Platinum</a>
                                                    <a href="/80-plus-titaninum.html" title="80 Plus Titaninum" id="js-menu-2093">80 Plus Titaninum</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/kieu-day-nguon.html" title="Kiểu Dây Nguồn"
                                                    id="js-menu-2086">Kiểu Dây Nguồn</a>
                                                <div class="cat-4-list">
                                                    <a href="/full-modular.html" title="Full Modular"
                                                        id="js-menu-2094">Full Modular</a>
                                                    <a href="/semi-modular.html" title="Semi Modular"
                                                        id="js-menu-2095">Semi Modular</a>
                                                    <a href="/non-modular.html" title="Non Modular"
                                                        id="js-menu-2096">Non Modular</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/kich-co.html" title="Kích Cỡ" id="js-menu-2087">Kích
                                                    Cỡ</a>
                                                <div class="cat-4-list">
                                                    <a href="/nguon-atx.html" title="ATX"
                                                        id="js-menu-2097">ATX</a>
                                                    <a href="/nguon-sfx.html" title="SFX"
                                                        id="js-menu-2098">SFX</a>
                                                    <a href="/flex-atx.html" title="Flex ATX"
                                                        id="js-menu-2099">Flex ATX</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item bg-white" data-id="1052">
                            <a href="{{ route('monitors.show') }}" class="pro-cate-1">
                                <span class="cat-thumb-item" style="width: 35px;text-align: center">
                                    <img src="{{ asset('assets/img/cat/cat_095cb4be732b3d094b1ad78b0577a33a.png') }}"
                                        alt="Màn Hình Máy Tính" />
                                </span>
                                <span class="title" title="Màn Hình Máy Tính"> Màn Hình Máy Tính</span>
                            </a>
                            <div class="sub-menu no-big-img">
                                <div class="cat-child-holder" id="js-menu-container">
                                    <div class="cat-child-items">
                                        <a href="/man-hinh-may-tinh-theo-hang.html" class="cate-2"
                                            title="Màn Hình Theo Hãng" id="js-menu-1690">Màn Hình Theo Hãng</a>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/monitors/Asus" title="Màn Hình Asus"
                                                    id="js-menu-1319">Màn Hình Asus</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/monitors/LG" title="Màn Hình LG"
                                                    id="js-menu-1354">Màn Hình LG</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/monitors/Dell" title="Màn Hình Dell"
                                                    id="js-menu-1317">Màn Hình Dell</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/man-hinh-benq_dm1357.html" title="Màn Hình BenQ"
                                                    id="js-menu-1357">Màn Hình BenQ</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cat-child-items">
                                        <a href="/man-hinh-theo-nhu-cau_dm1692.html" class="cate-2"
                                            title="Màn Hình Theo Nhu Cầu" id="js-menu-1692">Màn Hình Theo Nhu Cầu</a>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/man-hinh-may-tinh-chuyen-gaming_dm1694.html" title="Màn Hình Gaming" id="js-menu-1694">Màn Hình Gaming</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/man-hinh-may-tinh-ultrawide-sieu-rong_dm1698.html"
                                                    title="Màn Hình Ultrawide" id="js-menu-1698">Màn Hình Ultrawide</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/man-hinh-may-tinh-oled.html" title="Màn Hình OLED"id="js-menu-2831">Màn Hình OLED</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/man-hinh-di-dong.html" title="Màn Hình Di Động"
                                                    id="js-menu-2843">Màn Hình Di
                                                    Động</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cat-child-items">
                                        <a href="/man-hinh-theo-kich-thuoc_dm1691.html" class="cate-2"
                                            title="Màn Hình Theo Kích Thước" id="js-menu-1691">Màn Hình Theo Kích Thước</a>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/man-hinh-156-inch.html" title="Màn Hình 15.6 inch"
                                                    id="js-menu-2709">Màn Hình 15.6 inch</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/man-hinh-195-inch.html" title="Màn Hình 19.5 inch"
                                                    id="js-menu-2468">Màn Hình
                                                    19.5 inch</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/man-hinh-215-inch.html" title="Màn Hình 21.5 inch"
                                                    id="js-menu-2469">Màn Hình
                                                    21.5 inch</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/man-hinh-may-tinh-22-inch-24-inch_dm1705.html"
                                                    title="Màn Hình 22 inch" id="js-menu-1705">Màn Hình 22 inch</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/man-hinh-238-inch.html" title="Màn Hình 23.8 inch"
                                                    id="js-menu-2467">Màn Hình
                                                    23.8 inch</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/man-hinh-24-inch.html" title="Màn Hình 24 inch"
                                                    id="js-menu-2425">Màn Hình 24
                                                    inch</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/man-hinh-may-tinh-245-inch.html"
                                                    title="Màn Hình 24.5 inch" id="js-menu-2481">Màn Hình 24.5
                                                    inch</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/man-hinh-27-inch.html" title="Màn Hình 27 inch"
                                                    id="js-menu-2427">Màn Hình 27
                                                    inch</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/man-hinh-may-tinh-28-inch-32-inch_dm1707.html"
                                                    title="Màn Hình 28 inch" id="js-menu-1707">Màn Hình 28 inch</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/man-hinh-315-inch.html" title="Màn Hình 31.5 inch" id="js-menu-2470">Màn Hình 31.5 inch</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/man-hinh-may-tinh-32-inch-49-inch_dm1708.html"
                                                    title="Màn Hình 32 inch" id="js-menu-1708">Màn Hình 32 inch</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cat-child-items">
                                        <a href="/tan-so-quet-man-hinh.html" class="cate-2"
                                            title="Tần Số Quét Màn Hình" id="js-menu-1693">Tần Số Quét Màn Hình</a>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/man-hinh-may-tinh-60hz_dm1709.html" title="Màn Hình 60Hz"
                                                    id="js-menu-1709">Màn Hình 60Hz</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/man-hinh-may-tinh-75hz_dm1710.html" title="Màn Hình 75Hz"
                                                    id="js-menu-1710">Màn Hình 75Hz</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/man-hinh-may-tinh-100hz_dm1711.html"
                                                    title="Màn Hình 100Hz" id="js-menu-1711">Màn Hình 100Hz</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/man-hinh-may-tinh-120hz_dm1712.html"
                                                    title="Màn Hình 120Hz" id="js-menu-1712">Màn Hình 120Hz</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/man-hinh-may-tinh-144hz_dm1713.html"
                                                    title="Màn Hình 144Hz" id="js-menu-1713">Màn Hình 144Hz</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/man-hinh-may-tinh-165hz_dm1714.html"
                                                    title="Màn Hình 165Hz" id="js-menu-1714">Màn Hình 165Hz</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/man-hinh-160hz.html" title="Màn Hình 160Hz"
                                                    id="js-menu-2742">Màn Hình 160Hz</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/man-hinh-may-tinh-240hz_dm1715.html"
                                                    title="Màn Hình 240Hz" id="js-menu-1715">Màn Hình 240Hz</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cat-child-items">
                                        <a href="/man-hinh-may-tinh-theo-do-phan-giai_dm1699.html" class="cate-2"
                                            title="Độ Phân Giải Màn Hình" id="js-menu-1699">Độ Phân Giải Màn Hình</a>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/man-hinh-may-tinh-hd_dm1700.html"
                                                    title="Màn Hình HD (1366x768)" id="js-menu-1700">Màn Hình HD (1366x768)</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/man-hinh-hd-1600x900.html" title="Màn Hình HD+ (1600x900)"
                                                    id="js-menu-2432">Màn Hình HD+ (1600x900)</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/man-hinh-may-tinh-full-hd_dm1701.html"
                                                    title="Màn Hình Full HD (1920x1080)" id="js-menu-1701">Màn Hình Full HD (1920x1080)</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/man-hinh-may-tinh-wuxga-1920x1200.html"
                                                    title="Màn Hình WUXGA (1920x1200)" id="js-menu-2434">Màn Hình WUXGA (1920x1200)</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/man-hinh-may-tinh-ultra-wide-uwhd-2560x1080.html"
                                                    title="Màn Hình UWHD (2560x1080)" id="js-menu-2433">Màn Hình UWHD (2560x1080)</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/man-hinh-may-tinh-2k-qhd_dm1702.html"
                                                    title="Màn Hình 2K QHD (2560x1440)" id="js-menu-1702">Màn Hình 2K QHD (2560x1440)</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/man-hinh-may-tinh-wqhd-3440x1440.html"
                                                    title="Màn Hình WQHD (3440x1440)" id="js-menu-2435">Màn Hình WQHD (3440x1440)</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/man-hinh-uqhd-3840-x-1600.html"
                                                    title="Màn Hình UQHD (3840x1600)" id="js-menu-2493">Màn Hình UQHD (3840x1600)</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/man-hinh-may-tinh-4k-uhd_dm1703.html"
                                                    title="Màn Hình 4K UHD (3840x2160)" id="js-menu-1703">Màn Hình 4K UHD (3840x2160)</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/man-hinh-wqxga-2560-x-1600.html"
                                                    title="Màn Hình WQXGA (2560 x 1600)" id="js-menu-2646">Màn Hình WQXGA (2560 x 1600)</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item bg-white" data-id="1255">
                            <a href="{{ route('gaming-gears.show') }}" class="pro-cate-1">
                                <span class="cat-thumb-item" style="width: 35px;text-align: center">
                                    <img src="{{ asset('assets/img/cat/cat_8a7100a2bf10de1685a042557ef4ee77.png') }}"
                                        alt="Bàn phím, Chuột - Gaming Gear" />
                                </span>
                                <span class="title" title="Bàn phím, Chuột - Gaming Gear"> Bàn phím, Chuột - Gaming Gear </span>
                            </a>
                            <div class="sub-menu  no-big-img  ">
                                <div class="cat-child-holder" id="js-menu-container">
                                    <div class="cat-child-items">
                                        <a href="/ban-phim-chuot_dm1293.html" class="cate-2"
                                            title="Bàn Phím - Chuột" id="js-menu-1293">Bàn Phím - Chuột</a>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/chuot-may-tinh_dm1291.html" title="Chuột Máy Tính"
                                                    id="js-menu-1291">Chuột Máy Tính</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/chuot-khong-day_dm2367.html" title="Chuột Không Dây"
                                                    id="js-menu-2367">Chuột Không Dây</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/ban-phim-may-tinh_dm1027.html" title="Bàn phím Máy Tính"
                                                    id="js-menu-1027">Bàn phím Máy Tính</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cat-child-items">
                                        <a href="/ban-phim-co-choi-game.html" class="cate-2"
                                            title="Bàn phím cơ chơi game" id="js-menu-1257">Bàn phím cơ chơi game</a>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/ban-phim-co-gia-re.html" title="Bàn phím cơ giá rẻ"
                                                    id="js-menu-1494">Bàn phím cơ giá rẻ</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/ban-phim-logitech.html" title="Bàn phím Logitech"
                                                    id="js-menu-1871">Bàn phím Logitech</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/ban-phim-razer.html" title="Bàn phím Razer"
                                                    id="js-menu-1359">Bàn phím Razer</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/ban-phim-akko.html" title="Bàn phím AKKO"
                                                    id="js-menu-1755">Bàn phím AKKO</a>
                                            </div>
                                        </div>

                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/ban-phim-aula.html" title="Bàn phím AULA"
                                                    id="js-menu-2921">Bàn phím AULA</a>
                                            </div>
                                        </div>

                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/ban-phim-fuhlen.html" title="Bàn phím Fuhlen"
                                                    id="js-menu-1493">Bàn phím Fuhlen</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cat-child-items">
                                        <a href="/chuot-choi-game.html" class="cate-2" title="Chuột chơi game"
                                            id="js-menu-1256">Chuột chơi game</a>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/chuot-logitech.html" title="Chuột Logitech"
                                                    id="js-menu-1398">Chuột Logitech</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/chuot-razer.html" title="Chuột Razer"
                                                    id="js-menu-1370">Chuột Razer</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/chuot-corsair.html" title="Chuột Corsair"
                                                    id="js-menu-1373">Chuột Corsair</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/chuot-dareu.html" title="Chuột DareU"
                                                    id="js-menu-2894">Chuột DareU</a>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="cat-child-items">
                                        <a href="/tai-nghe-choi-game.html" class="cate-2"
                                            title="Tai nghe chơi game" id="js-menu-1258">Tai nghe chơi game</a>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/tai-nghe-gaming-gia-re.html"
                                                    title="Tai nghe Gaming giá rẻ" id="js-menu-1776">Tai nghe Gaming giá rẻ</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/tai-nghe-razer.html" title="Tai nghe Razer"
                                                    id="js-menu-1378">Tai nghe Razer</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/tai-nghe-logitech.html" title="Tai nghe Logitech"
                                                    id="js-menu-1748">Tai nghe Logitech</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/tai-nghe-dareu.html" title="Tai nghe DareU"
                                                    id="js-menu-1891">Tai nghe DareU</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item bg-white" data-id="393">
                            <a href="{{ route('media-devices.show') }}" class="pro-cate-1">
                                <span class="cat-thumb-item" style="width: 35px;text-align: center">
                                    <img src="{{ asset('assets/img/cat/cat_f9fc468337e44b7e6b994b32dc8b8d44.png') }}"
                                        alt="Loa, Tai Nghe, Webcam, Tivi" />
                                </span>
                                <span class="title" title="Loa, Tai Nghe, Webcam, Tivi"> Loa, Tai Nghe, Webcam</span>
                            </a>
                            <div class="sub-menu  no-big-img  ">
                                <div class="cat-child-holder" id="js-menu-container">
                                    <div class="cat-child-items">
                                        <a href="/loa.html" class="cate-2" title="Phân Loại Loa"
                                            id="js-menu-2530">Phân Loại Loa</a>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/loa-may-tinh_dm1042.html" title="Loa vi tính"
                                                    id="js-menu-1042">Loa vi tính</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/loa-vi-tinh-tich-hop-bluetooth.html"
                                                    title="Loa vi tính tích hợp Bluetooth" id="js-menu-2529">Loa vi
                                                    tính tích hợp Bluetooth</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/loa-di-dong-bluetooth.html" title="Loa di động bluetooth"
                                                    id="js-menu-2531">Loa di động bluetooth</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/loa-hoi-nghi_dm2273.html" title="Loa hội nghị"
                                                    id="js-menu-2273">Loa hội nghị</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/loa-tro-giang.html" title="Loa trợ giảng"
                                                    id="js-menu-2532">Loa trợ giảng</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/loa-keo-karaoke.html" title="Loa kéo Karaoke"
                                                    id="js-menu-2533">Loa kéo Karaoke</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cat-child-items">
                                        <a href="/kieu-loa.html" class="cate-2" title="Kiểu Loa"
                                            id="js-menu-2536">Kiểu Loa</a>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/loa-20.html" title="Loa 2.0" id="js-menu-2537">Loa 2.0</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/loa-21.html" title="Loa 2.1" id="js-menu-2545">Loa 2.1</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/loa-41.html" title="Loa 4.1" id="js-menu-2539">Loa 4.1</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/loa-51.html" title="Loa 5.1" id="js-menu-2540">Loa 5.1</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/loa-71.html" title="Loa 7.1" id="js-menu-2541">Loa 7.1</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cat-child-items">
                                        <a href="/kieu-theo-hang.html" class="cate-2" title="Loa theo hãng" id="js-menu-2534">Loa theo hãng</a>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/loa-logitech_dm1803.html" title="Loa LOGITECH"
                                                    id="js-menu-1803">Loa LOGITECH</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/loa-microlab_dm1805.html" title="Loa MICROLAB"
                                                    id="js-menu-1805">Loa MICROLAB</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cat-child-items">
                                        <a href="/webcam_dm1181.html" class="cate-2" title="Webcam"
                                            id="js-menu-1181">Webcam</a>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/webcam-logitech_dm2226.html" title="Webcam Logitech"
                                                    id="js-menu-2226">Webcam Logitech</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item bg-white" data-id="397">
                            <a href="{{ route('coolings.show') }}" class="pro-cate-1">
                                <span class="cat-thumb-item" style="width: 35px;text-align: center">
                                    <img src="{{ asset('assets/img/cat/cat_30c65344cf0043629e4907d5c2120af3.png') }}"
                                        alt="Cooling, Tản nhiệt" />
                                </span>
                                <span class="title" title="Cooling, Tản nhiệt"> Cooling, Tản nhiệt</span>
                            </a>
                        </div>
                        <div class="item bg-white" data-id="2112">
                            <a href="{{ route('accessories.show') }}" class="pro-cate-1">
                                <span class="cat-thumb-item" style="width: 35px;text-align: center">
                                    <img src="{{ asset('assets/img/cat/cat_5804bb2ce092a894cf86a82c17affb54.png') }}"
                                        alt="Phụ Kiện Laptop, PC, Khác" />
                                </span>
                                <span class="title" title="Phụ Kiện Laptop, PC, Khác"> Phụ Kiện Laptop, PC, Khác
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div
                    class="menu-text-right d-flex align-items-center justify-content-between font-weight-light text-13">
                    <a href="#" target="_blank" class="header-history"> Sản phẩm bạn đã xem </a>
                    <a href="{{ route('flash-sale') }}"> <img
                            src="{{ asset('assets/img/header-menu-icon/flash.png') }}" class="mr-1" /> Flash sale
                    </a>
                    <div class="header-support-container" style="line-height: 38px;">
                        <a href="#"> <img src="{{ asset('assets/img/header-menu-icon/support.png') }}"
                                class="mr-1" /> Tư vấn bán hàng </a>
                        <div class="global-support-container" style="display: none">
                            <div class="col-item">
                                <p class="title">Khách hàng Online</p>
                                <div class="support-list">
                                    <a href="https://zalo.me/0966.45.45.03" target="_blank" rel="nofollow">Hotline
                                        1 - 024.35160888</a>
                                    <a href="https://zalo.me/0913.367.005" target="_blank" rel="nofollow">Hotline
                                        2 - 0913.367.005</a>
                                </div>
                            </div>
                            <div class="col-item">
                                <p class="title">Khách hàng Showroom Hà Nội</p>
                                <div class="support-list">
                                    <div class="item-left">
                                        <div class="support-box">
                                            <p class="box-title">◆ 49 Thái Hà</p>
                                            <a href="https://zalo.me/0918.557.006" target="_blank"
                                                rel="nofollow">Hotline - 0918.557.006</a>
                                        </div>
                                    </div>
                                    <div class="item-right">
                                        <div class="support-box">
                                            <p class="box-title">◆ 63 Trần Thái Tông</p>
                                            <a href="https://zalo.me/0862.136.488" target="_blank"
                                                rel="nofollow">Hotline - 0862.136.488</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('pages.laptop-outlet') }}"> <img
                            src="{{ asset('assets/img/header-menu-icon/medal.png') }}" class="mr-1" /> Laptop Xả Kho </a>
                    <a href="{{ route('pages.warranty-policy') }}"> <img
                            src="{{ asset('assets/img/header-menu-icon/package.png') }}" class="mr-1" /> Đổi trả miễn phí </a>
                    <a href="{{ route('pages.shipping-policy') }}"> <img
                            src="{{ asset('assets/img/header-menu-icon/delivery.png') }}" class="mr-1" /> Miễn phí vận chuyển </a>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            fetchCartCount();
        });

        function fetchCartCount() {
            fetch('{{ route('cart.count') }}')
                .then(response => response.json())
                .then(data => {
                    document.getElementById('cart-count').innerText = data.cartItemCount;
                });
        }
    </script>
    {{-- filter --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
        let selectedValue = '';
        let selectedMin = null;
        let selectedMax = null;
        let selectedFilterType = ''; 
        
        document.querySelectorAll('.js-menu').forEach(function (element) {
            element.addEventListener('click', function (e) {
                e.preventDefault();

                selectedFilterType = element.getAttribute('data-filter_code');
                const dataValue = element.getAttribute('data-value');

                if (selectedFilterType === 'price') {
                    const params = new URLSearchParams(dataValue);
                    selectedMin = parseInt(params.get('min'), 10);
                    selectedMax = parseInt(params.get('max'), 10);
                    console.log("Selected Min:", selectedMin);
                    console.log("Selected Max:", selectedMax);
                    console.log("Selected:", selectedFilterType);
                    console.log(`/laptops/filter?min=${encodeURIComponent(selectedMin)}&max=${encodeURIComponent(selectedMax)}`);
                    window.location.href = `/laptops/filter?min=${encodeURIComponent(selectedMin)}&max=${encodeURIComponent(selectedMax)}`;
                } else {
                    selectedValue = dataValue;
                    window.location.href = `/laptops/filter?${selectedFilterType}=${encodeURIComponent(selectedValue)}`;
                }

            });
        });
    });
    </script>

    {{-- Thanh tim kiem --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('js-search');
            const suggestionsContainer = document.querySelector('.autocomplete-suggestions');

            searchInput.addEventListener('input', function() {
                const query = searchInput.value;

                // Xóa gợi ý nếu không có từ khóa
                if (query.length < 2) {
                    suggestionsContainer.innerHTML = '';
                    suggestionsContainer.style.display = 'none';
                    return;
                }

                // Gửi yêu cầu tới endpoint `/search-suggestions`
                fetch(`/search-suggestions?query=${query}`)
                    .then(response => response.json())
                    .then(data => {
                        suggestionsContainer.innerHTML = ''; // Xóa nội dung cũ
                        if (data.length === 0) {
                            suggestionsContainer.style.display = 'none';
                            return;
                        }
                        
                        // Hiển thị gợi ý
                        data.forEach(item => {
                            const suggestion = document.createElement('div');
                            suggestion.classList.add('list');

                            const link = document.createElement('a');
                            link.href = item.link;

                            const image = document.createElement('img');
                            image.src = item.image; // đảm bảo item chứa thuộc tính `image` với URL hình ảnh

                            const info = document.createElement('span');
                            info.classList.add('info');

                            const name = document.createElement('span');
                            name.classList.add('name');
                            name.textContent = item.name;

                            const priceAttribute = item.attributes.find(attr => attr.name === 'Price');
                            const price = priceAttribute ? `${priceAttribute.pivot.value} VNĐ` : 'N/A';

                            const priceSpan = document.createElement('span');
                            priceSpan.classList.add('price');
                            priceSpan.textContent = price;

                            info.appendChild(name);
                            info.appendChild(priceSpan);

                            link.appendChild(image);
                            link.appendChild(info);
                            suggestion.appendChild(link);

                            suggestionsContainer.appendChild(suggestion);
                        });
                        console.log(data);
                        
                        suggestionsContainer.style.display = 'block';
                    })
                    .catch(error => {
                        console.error('Lỗi:', error);
                    });
            });

            // Ẩn container gợi ý khi người dùng nhấp ra ngoài
            document.addEventListener('click', function(event) {
                if (!suggestionsContainer.contains(event.target) && event.target !== searchInput) {
                    suggestionsContainer.style.display = 'none';
                }
            });

            // Hiện lại container gợi ý khi người dùng nhấp vào ô tìm kiếm
            searchInput.addEventListener('focus', function() {
                if (suggestionsContainer.innerHTML !== '') {
                    suggestionsContainer.style.display = 'block';
                }
            });
        });


    </script>
@endpush

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
                                            title="Màn Hình Theo Nhu Cầu" id="js-menu-1692">Màn Hình Theo Nhu
                                            Cầu</a>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/man-hinh-may-tinh-chuyen-gaming_dm1694.html"
                                                    title="Màn Hình Gaming" id="js-menu-1694">Màn Hình Gaming</a>
                                                <div class="cat-4-list">
                                                    <a href="/man-hinh-gaming-180hz.html"
                                                        title="Màn Hình Gaming 180Hz" id="js-menu-2856">Màn Hình
                                                        Gaming 180Hz</a>
                                                    <a href="/man-hinh-gaming-240hz.html"
                                                        title="Màn Hình Gaming 240Hz" id="js-menu-2857">Màn Hình
                                                        Gaming 240Hz</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/man-hinh-may-tinh-ultrawide-sieu-rong_dm1698.html"
                                                    title="Màn Hình Ultrawide" id="js-menu-1698">Màn Hình
                                                    Ultrawide</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/man-hinh-may-tinh-oled.html" title="Màn Hình OLED"
                                                    id="js-menu-2831">Màn Hình
                                                    OLED</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/man-hinh-may-tinh-van-phong_dm1716.html"
                                                    title="Màn Hình Văn Phòng" id="js-menu-1716">Màn Hình Văn
                                                    Phòng</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/man-hinh-may-tinh-chuyen-thiet-ke_dm1695.html"
                                                    title="Màn Hình Đồ Họa" id="js-menu-1695">Màn Hình Đồ Họa</a>
                                                <div class="cat-4-list">
                                                    <a href="/man-hinh-do-hoa-60hz.html"
                                                        title="Màn Hình Đồ Họa 60Hz" id="js-menu-2858">Màn
                                                        Hình Đồ
                                                        Họa 60Hz</a>
                                                    <a href="/man-hinh-do-hoa-120hz.html"
                                                        title="Màn Hình Đồ Họa 120Hz" id="js-menu-2859">Màn Hình Đồ
                                                        Họa 120Hz</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/man-hinh-thong-minh_dm2197.html"
                                                    title="Màn Hình Thông Minh" id="js-menu-2197">Màn Hình Thông
                                                    Minh</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/man-hinh-di-dong.html" title="Màn Hình Di Động"
                                                    id="js-menu-2843">Màn Hình Di
                                                    Động</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/man-hinh-may-tinh-cong-curved_dm1696.html"
                                                    title="Màn Hình Cong" id="js-menu-1696">Màn Hình Cong</a>
                                                <div class="cat-4-list">
                                                    <a href="/man-hinh-cong-ips.html" title="Màn Hình Cong IPS"
                                                        id="js-menu-2860">Màn Hình
                                                        Cong IPS</a>
                                                    <a href="/man-hinh-cong-oled.html" title="Màn Hình Cong OLED"
                                                        id="js-menu-2861">Màn Hình
                                                        Cong OLED</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/man-hinh-usb-type-c_dm1877.html"
                                                    title="Màn Hình USB Type C" id="js-menu-1877">Màn Hình USB Type
                                                    C</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cat-child-items">
                                        <a href="/man-hinh-theo-kich-thuoc_dm1691.html" class="cate-2"
                                            title="Màn Hình Theo Kích Thước" id="js-menu-1691">Màn Hình Theo Kích
                                            Thước</a>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/man-hinh-156-inch.html" title="Màn Hình 15.6 inch"
                                                    id="js-menu-2709">Màn Hình
                                                    15.6 inch</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/man-hinh-may-tinh-17-inch-21-inch_dm1704.html"
                                                    title="Màn Hình 17 inch" id="js-menu-1704">Màn Hình 17 inch</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/man-hinh-185-inch.html" title="Màn Hình 18.5 inch"
                                                    id="js-menu-2490">Màn Hình
                                                    18.5 inch</a>
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
                                                <a href="/man-hinh-23-inch.html" title="Màn Hình 23 inch"
                                                    id="js-menu-2424">Màn Hình 23
                                                    inch</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/man-hinh-236-inch.html" title="Màn Hình 23.6 inch"
                                                    id="js-menu-2466">Màn Hình
                                                    23.6 inch</a>
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
                                                <a href="/man-hinh-may-tinh-25-inch-27-inch_dm1706.html"
                                                    title="Màn Hình 25 inch" id="js-menu-1706">Màn Hình 25 inch</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/man-hinh-26-inch.html" title="Màn Hình 26 inch"
                                                    id="js-menu-2918">Màn Hình 26
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
                                                <a href="/man-hinh-29-inch.html" title="Màn Hình 29 inch"
                                                    id="js-menu-2428">Màn Hình 29
                                                    inch</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/man-hinh-30-inch.html" title="Màn Hình 30 inch"
                                                    id="js-menu-2429">Màn Hình 30
                                                    inch</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/man-hinh-315-inch.html" title="Màn Hình 31.5 inch"
                                                    id="js-menu-2470">Màn Hình
                                                    31.5 inch</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/man-hinh-may-tinh-32-inch-49-inch_dm1708.html"
                                                    title="Màn Hình 32 inch" id="js-menu-1708">Màn Hình 32 inch</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/man-hinh-tren-32-inch.html" title="Màn Hình Trên 32 inch"
                                                    id="js-menu-2862">Màn
                                                    Hình Trên 32 inch</a>
                                                <div class="cat-4-list">
                                                    <a href="/man-hinh-34-inch.html" title="Màn Hình 34 inch"
                                                        id="js-menu-2431">Màn Hình 34
                                                        inch</a>
                                                    <a href="/man-hinh-35-inch.html" title="Màn Hình 35 inch"
                                                        id="js-menu-2491">Màn Hình 35
                                                        inch</a>
                                                    <a href="/man-hinh-375-inch.html" title="Màn Hình 37.5 inch"
                                                        id="js-menu-2492">Màn Hình
                                                        37.5 inch</a>
                                                    <a href="/man-hinh-43-inch.html" title="Màn Hình 43 inch"
                                                        id="js-menu-2494">Màn Hình 43
                                                        inch</a>
                                                    <a href="/man-hinh-48-inch.html" title="Màn Hình 48 inch"
                                                        id="js-menu-2642">Màn Hình 48
                                                        inch</a>
                                                    <a href="/man-hinh-may-tinh-49-inch.html"
                                                        title="Màn Hình 49 inch" id="js-menu-2480">Màn
                                                        Hình 49
                                                        inch</a>
                                                    <a href="/man-hinh-55-inch.html" title="Màn Hình 55 inch"
                                                        id="js-menu-2644">Màn Hình 55
                                                        inch</a>
                                                    <a href="/man-hinh-45-inch.html" title="Màn Hình 45 inch"
                                                        id="js-menu-2730">Màn Hình 45
                                                        inch</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cat-child-items">
                                        <a href="/tan-so-quet-man-hinh.html" class="cate-2"
                                            title="Tần Số Quét Màn Hình" id="js-menu-1693">Tần Số Quét Màn Hình</a>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/man-hinh-may-tinh-60hz_dm1709.html" title="Màn Hình 60Hz"
                                                    id="js-menu-1709">Màn
                                                    Hình 60Hz</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/man-hinh-may-tinh-75hz_dm1710.html" title="Màn Hình 75Hz"
                                                    id="js-menu-1710">Màn
                                                    Hình 75Hz</a>
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
                                                <a href="/man-hinh-152hz.html" title="Màn Hình 152Hz"
                                                    id="js-menu-2489">Màn Hình 152Hz</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/man-hinh-155hz.html" title="Màn Hình 155Hz"
                                                    id="js-menu-2711">Màn Hình 155Hz</a>
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
                                                <a href="/man-hinh-may-tinh-170hz.html" title="Màn Hình 170Hz"
                                                    id="js-menu-2035">Màn Hình
                                                    170Hz</a>
                                            </div>
                                        </div>

                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/man-hinh-185hz.html" title="Màn Hình 185Hz"
                                                    id="js-menu-2961">Màn Hình 185Hz</a>


                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/man-hinh-180hz.html" title="Màn Hình 180Hz"
                                                    id="js-menu-2758">Màn Hình 180Hz</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/man-hinh-200hz_dm2210.html" title="Màn Hình 200Hz"
                                                    id="js-menu-2210">Màn Hình
                                                    200Hz</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/man-hinh-may-tinh-240hz_dm1715.html"
                                                    title="Màn Hình 240Hz" id="js-menu-1715">Màn Hình 240Hz</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/man-hinh-250hz.html" title="Màn Hình 250Hz"
                                                    id="js-menu-2908">Màn Hình 250Hz</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/man-hinh-may-tinh-360hz.html" title="Màn Hình 360Hz"
                                                    id="js-menu-2036">Màn Hình
                                                    360Hz</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/man-hinh-380hz.html" title="Màn hình 380Hz"
                                                    id="js-menu-2737">Màn hình 380Hz</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/man-hinh-400hz.html" title="Màn Hình 400Hz"
                                                    id="js-menu-2863">Màn Hình 400Hz</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/man-hinh-500hz.html" title="Màn Hình 500Hz"
                                                    id="js-menu-2864">Màn Hình 500Hz</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/man-hinh-540hz.html" title="Màn Hình 540Hz"
                                                    id="js-menu-2865">Màn Hình 540Hz</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cat-child-items">
                                        <a href="/man-hinh-may-tinh-theo-do-phan-giai_dm1699.html" class="cate-2"
                                            title="Độ Phân Giải Màn Hình" id="js-menu-1699">Độ Phân Giải Màn
                                            Hình</a>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/man-hinh-may-tinh-hd_dm1700.html"
                                                    title="Màn Hình HD (1366x768)" id="js-menu-1700">Màn Hình HD
                                                    (1366x768)</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/man-hinh-hd-1600x900.html" title="Màn Hình HD+ (1600x900)"
                                                    id="js-menu-2432">Màn
                                                    Hình HD+ (1600x900)</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/man-hinh-may-tinh-full-hd_dm1701.html"
                                                    title="Màn Hình Full HD (1920x1080)" id="js-menu-1701">Màn Hình
                                                    Full HD (1920x1080)</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/man-hinh-may-tinh-wuxga-1920x1200.html"
                                                    title="Màn Hình WUXGA (1920x1200)" id="js-menu-2434">Màn Hình
                                                    WUXGA (1920x1200)</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/man-hinh-may-tinh-ultra-wide-uwhd-2560x1080.html"
                                                    title="Màn Hình UWHD (2560x1080)" id="js-menu-2433">Màn Hình
                                                    UWHD (2560x1080)</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/man-hinh-may-tinh-2k-qhd_dm1702.html"
                                                    title="Màn Hình 2K QHD (2560x1440)" id="js-menu-1702">Màn Hình
                                                    2K QHD (2560x1440)</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/man-hinh-may-tinh-wqhd-3440x1440.html"
                                                    title="Màn Hình WQHD (3440x1440)" id="js-menu-2435">Màn Hình
                                                    WQHD (3440x1440)</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/man-hinh-uqhd-3840-x-1600.html"
                                                    title="Màn Hình UQHD (3840x1600)" id="js-menu-2493">Màn Hình
                                                    UQHD (3840x1600)</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/man-hinh-may-tinh-4k-uhd_dm1703.html"
                                                    title="Màn Hình 4K UHD (3840x2160)" id="js-menu-1703">Màn Hình
                                                    4K UHD (3840x2160)</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/man-hinh-may-tinh-dualqhd-5120x1440.html"
                                                    title="Màn Hình DualQHD (5120x1440)" id="js-menu-2436">Màn Hình
                                                    DualQHD (5120x1440)</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/man-hinh-wqxga-2560-x-1600.html"
                                                    title="Màn Hình WQXGA (2560 x 1600)" id="js-menu-2646">Màn Hình
                                                    WQXGA (2560 x 1600)</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/man-hinh-5k-5120x2880.html"
                                                    title="Màn Hình 5K (5120x2880)" id="js-menu-2800">Màn Hình 5K
                                                    (5120x2880)</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/man-hinh-duhd-7680-x-2160.html"
                                                    title="Màn Hình DUHD (7680 x 2160)" id="js-menu-2895">Màn Hình
                                                    DUHD (7680 x 2160)</a>
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
                                <span class="title" title="Bàn phím, Chuột - Gaming Gear"> Bàn phím, Chuột - Gaming
                                    Gear </span>
                            </a>
                            <div class="sub-menu  no-big-img  ">
                                <div class="cat-child-holder" id="js-menu-container">
                                    <div class="cat-child-items">
                                        <a href="/ban-phim-chuot_dm1293.html" class="cate-2"
                                            title="Bàn Phím - Chuột" id="js-menu-1293">Bàn Phím - Chuột</a>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/chuot-may-tinh_dm1291.html" title="Chuột Máy Tính"
                                                    id="js-menu-1291">Chuột Máy
                                                    Tính</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/chuot-khong-day_dm2367.html" title="Chuột Không Dây"
                                                    id="js-menu-2367">Chuột
                                                    Không Dây</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/ban-phim-may-tinh_dm1027.html" title="Bàn phím Máy Tính"
                                                    id="js-menu-1027">Bàn
                                                    phím Máy Tính</a>
                                            </div>
                                        </div>

                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/bo-ban-phim-chuot_dm1292.html" title="Bộ bàn phím - chuột"
                                                    id="js-menu-1292">Bộ
                                                    bàn phím - chuột</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cat-child-items">
                                        <a href="/ban-phim-co-choi-game.html" class="cate-2"
                                            title="Bàn phím cơ chơi game" id="js-menu-1257">Bàn phím cơ chơi
                                            game</a>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/ban-phim-co-gia-re.html" title="Bàn phím cơ giá rẻ"
                                                    id="js-menu-1494">Bàn phím
                                                    cơ giá rẻ</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/ban-phim-logitech.html" title="Bàn phím Logitech"
                                                    id="js-menu-1871">Bàn phím
                                                    Logitech</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/ban-phim-asus_dm1368.html" title="Bàn phím Asus"
                                                    id="js-menu-1368">Bàn phím
                                                    Asus</a>
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
                                                    id="js-menu-1493">Bàn phím
                                                    Fuhlen</a>


                                            </div>
                                        </div>

                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/ban-phim-e-dra.html" title="Bàn phím E-Dra"
                                                    id="js-menu-1801">Bàn phím E-Dra</a>


                                            </div>
                                        </div>

                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/ban-phim-dareu.html" title="Bàn phím DareU"
                                                    id="js-menu-1887">Bàn phím DareU</a>


                                            </div>
                                        </div>

                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/ban-phim-fl-esports_dm2329.html"
                                                    title="Bàn phím FL-Esports" id="js-menu-2329">Bàn phím
                                                    FL-Esports</a>


                                            </div>
                                        </div>

                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/ban-phim-corsair.html" title="Bàn phím Corsair"
                                                    id="js-menu-1362">Bàn phím
                                                    Corsair</a>


                                            </div>
                                        </div>

                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/ban-phim-cac-hang-khac_dm1369.html"
                                                    title="Bàn phím các hãng khác" id="js-menu-1369">Bàn phím các
                                                    hãng khác</a>


                                            </div>
                                        </div>

                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/ban-phim-rapoo.html" title="Bàn phím Rapoo"
                                                    id="js-menu-2643">Bàn phím Rapoo</a>


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
                                                <a href="/chuot-asus.html" title="Chuột Asus"
                                                    id="js-menu-1376">Chuột Asus</a>


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
                                                <a href="/chuot-pulsar.html" title="Chuột Pulsar"
                                                    id="js-menu-2645">Chuột Pulsar</a>


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
                                                <a href="/chuot-cac-hang-khac_dm1377.html"
                                                    title="Chuột các hãng khác" id="js-menu-1377">Chuột các hãng
                                                    khác</a>


                                            </div>
                                        </div>

                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/chuot-zowie.html" title="Chuột Zowie"
                                                    id="js-menu-1641">Chuột Zowie</a>


                                            </div>
                                        </div>

                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/chuot-akko.html" title="Chuột Akko"
                                                    id="js-menu-1756">Chuột Akko</a>


                                            </div>
                                        </div>

                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/chuot-hyperx_dm1875.html" title="Chuột HyperX"
                                                    id="js-menu-1875">Chuột
                                                    HyperX</a>


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
                                                    title="Tai nghe Gaming giá rẻ" id="js-menu-1776">Tai nghe Gaming
                                                    giá rẻ</a>
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
                                                <a href="/tai-nghe-asus_dm1383.html" title="Tai nghe Asus"
                                                    id="js-menu-1383">Tai nghe
                                                    Asus</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/tai-nghe-kingston.html" title="Tai nghe HyperX"
                                                    id="js-menu-1380">Tai nghe
                                                    HyperX</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/tai-nghe-corsair.html" title="Tai nghe Corsair"
                                                    id="js-menu-1744">Tai nghe
                                                    Corsair</a>
                                            </div>
                                        </div>

                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/tai-nghe-logitech.html" title="Tai nghe Logitech"
                                                    id="js-menu-1748">Tai nghe
                                                    Logitech</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/tai-nghe-dareu.html" title="Tai nghe DareU"
                                                    id="js-menu-1891">Tai nghe DareU</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/tai-nghe-e-dra_dm2239.html" title="Tai nghe E-Dra"
                                                    id="js-menu-2239">Tai nghe
                                                    E-Dra</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/tai-nghe-cac-hang-khac_dm1384.html"
                                                    title="Tai nghe các hãng khác" id="js-menu-1384">Tai nghe các
                                                    hãng khác</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/tai-nghe-astro_dm1689.html" title="Tai nghe Astro"
                                                    id="js-menu-1689">Tai nghe
                                                    Astro</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/ghe-speed.html" title="Ghế SPEED" id="js-menu-2525">Ghế
                                                    SPEED</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cat-child-items">
                                        <a href="/ghe-choi-game.html" class="cate-2" title="Ghế chơi game"
                                            id="js-menu-1434">Ghế
                                            chơi game</a>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/ghe-choi-game-gia-re.html" title="Ghế chơi game giá rẻ"
                                                    id="js-menu-1451">Ghế
                                                    chơi game giá rẻ</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/ghe-noblechairs.html" title="Ghế NOBLECHAIRS"
                                                    id="js-menu-1491">Ghế
                                                    NOBLECHAIRS</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/ghe-dxracer.html" title="Ghế DXRACER"
                                                    id="js-menu-1436">Ghế DXRACER</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/ghe-akracing.html" title="Ghế AKRACING"
                                                    id="js-menu-1435">Ghế AKRACING</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/ghe-warrior.html" title="Ghế WARRIOR"
                                                    id="js-menu-1802">Ghế WARRIOR</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/ghe-e-dra.html" title="Ghế E-DRA" id="js-menu-1761">Ghế
                                                    E-DRA</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/ghe-anda-seat.html" title="Ghế ANDA SEAT"
                                                    id="js-menu-1548">Ghế ANDA SEAT</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/ghe-corsair.html" title="Ghế CORSAIR"
                                                    id="js-menu-1518">Ghế CORSAIR</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/ghe-soleseat.html" title="Ghế SOLESEAT"
                                                    id="js-menu-1636">Ghế SOLESEAT</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/ghe-cougar_dm2276.html" title="Ghế COUGAR"
                                                    id="js-menu-2276">Ghế COUGAR</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/ghe-msi_dm1847.html" title="Ghế MSI"
                                                    id="js-menu-1847">Ghế MSI</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/ghe-asus_dm1874.html" title="Ghế Asus"
                                                    id="js-menu-1874">Ghế Asus</a>
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
                                <span class="title" title="Loa, Tai Nghe, Webcam, Tivi"> Loa, Tai Nghe, Webcam,
                                    Tivi</span>
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
                                                    id="js-menu-2531">Loa
                                                    di động bluetooth</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/loa-hoi-nghi_dm2273.html" title="Loa hội nghị"
                                                    id="js-menu-2273">Loa hội
                                                    nghị</a>
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
                                                    id="js-menu-2533">Loa kéo
                                                    Karaoke</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cat-child-items">
                                        <a href="/kieu-loa.html" class="cate-2" title="Kiểu Loa"
                                            id="js-menu-2536">Kiểu Loa</a>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/loa-20.html" title="Loa 2.0" id="js-menu-2537">Loa
                                                    2.0</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/loa-21.html" title="Loa 2.1" id="js-menu-2545">Loa
                                                    2.1</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/loa-41.html" title="Loa 4.1" id="js-menu-2539">Loa
                                                    4.1</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/loa-51.html" title="Loa 5.1" id="js-menu-2540">Loa
                                                    5.1</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/loa-71.html" title="Loa 7.1" id="js-menu-2541">Loa
                                                    7.1</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/soundbar.html" title="Soundbar"
                                                    id="js-menu-2543">Soundbar</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cat-child-items">
                                        <a href="/kieu-theo-hang.html" class="cate-2" title="Loa theo hãng"
                                            id="js-menu-2534">Loa
                                            theo hãng</a>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/loa-logitech_dm1803.html" title="Loa LOGITECH"
                                                    id="js-menu-1803">Loa
                                                    LOGITECH</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/loa-microlab_dm1805.html" title="Loa MICROLAB"
                                                    id="js-menu-1805">Loa
                                                    MICROLAB</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/loa-edifier.html" title="Loa EDIFIER"
                                                    id="js-menu-2546">Loa EDIFIER</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/loa-creative_dm1806.html" title="Loa CREATIVE"
                                                    id="js-menu-1806">Loa
                                                    CREATIVE</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/loa-klipsch.html" title="loa KLIPSCH"
                                                    id="js-menu-2547">loa KLIPSCH</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/loa-marshall.html" title="Loa Marshall"
                                                    id="js-menu-2548">Loa Marshall</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/loa-jbl.html" title="Loa JBL" id="js-menu-2549">Loa
                                                    JBL</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/loa-audioengine.html" title="Loa Audioengine"
                                                    id="js-menu-2550">Loa
                                                    Audioengine</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/loa-soundmax_dm1804.html" title="Loa SoundMax"
                                                    id="js-menu-1804">Loa
                                                    SoundMax</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/loa-hang-khac_dm1807.html" title="Loa hãng khác"
                                                    id="js-menu-1807">Loa hãng
                                                    khác</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/loa-soundmax.html" title="Loa SOUNDMAX"
                                                    id="js-menu-2916">Loa SOUNDMAX</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cat-child-items">
                                        <a href="/webcam_dm1181.html" class="cate-2" title="Webcam"
                                            id="js-menu-1181">Webcam</a>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/webcam-logitech_dm2226.html" title="Webcam Logitech"
                                                    id="js-menu-2226">Webcam
                                                    Logitech</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/webcam-asus_dm2221.html" title="Webcam Asus"
                                                    id="js-menu-2221">Webcam Asus</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/webcam-thronmax_dm2228.html" title="Webcam Thronmax"
                                                    id="js-menu-2228">Webcam
                                                    Thronmax</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/webcam-hikvsion_dm2225.html" title="Webcam Hikvsion"
                                                    id="js-menu-2225">Webcam
                                                    Hikvsion</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/webcam-rapoo_dm2238.html" title="Webcam Rapoo"
                                                    id="js-menu-2238">Webcam
                                                    Rapoo</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/webcam-dahua_dm2222.html" title="Webcam Dahua"
                                                    id="js-menu-2222">Webcam
                                                    Dahua</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/webcam-genius_dm2223.html" title="Webcam Genius"
                                                    id="js-menu-2223">Webcam
                                                    Genius</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/webcam-e-dra_dm2224.html" title="Webcam E-Dra"
                                                    id="js-menu-2224">Webcam
                                                    E-Dra</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/webcam-razer_dm2227.html" title="Webcam Razer"
                                                    id="js-menu-2227">Webcam
                                                    Razer</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cat-child-items">
                                        <a href="/Tivi_dm1264.html" class="cate-2"
                                            title="Tivi Led - Smart Tivi - Tivi LCD" id="js-menu-1264">Tivi Led -
                                            Smart Tivi - Tivi LCD</a>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/sony_dm1299.html" title="Sony"
                                                    id="js-menu-1299">Sony</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/samsung_dm1300.html" title="Samsung"
                                                    id="js-menu-1300">Samsung</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/lg_dm1301.html" title="LG" id="js-menu-1301">LG</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/panasonic_dm1302.html" title="Panasonic"
                                                    id="js-menu-1302">Panasonic</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cat-child-items">
                                        <a href="/tai-nghe_dm1180.html" class="cate-2" title="Tai nghe"
                                            id="js-menu-1180">Tai
                                            nghe</a>
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
                            <div class="sub-menu  no-big-img  ">
                                <div class="cat-child-holder" id="js-menu-container">
                                    <div class="cat-child-items">
                                        <a href="/tan-nhiet-nuoc-watercooling_dm1388.html" class="cate-2"
                                            title="Tản nước - Watercooling" id="js-menu-1388">Tản nước -
                                            Watercooling</a>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/bo-tan-nhiet-nuoc-custom_dm1389.html"
                                                    title="Bộ tản nước Custom" id="js-menu-1389">Bộ tản nước
                                                    Custom</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/tan-nhiet-nuoc-ekwb-made-in-eu_dm1520.html"
                                                    title="Tản nhiệt nước EKWB" id="js-menu-1520">Tản nhiệt nước
                                                    EKWB</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/tan-nhiet-nuoc-barrow_dm1521.html"
                                                    title="Tản nhiệt nước Barrow" id="js-menu-1521">Tản nhiệt nước
                                                    Barrow</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/tan-nhiet-nuoc-bykski_dm1522.html"
                                                    title="Tản nhiệt nước Bykski" id="js-menu-1522">Tản nhiệt nước
                                                    Bykski</a>
                                            </div>
                                        </div>

                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/tan-nhiet-nuoc-cac-hang_dm1540.html"
                                                    title="Tản nhiệt nước các hãng" id="js-menu-1540">Tản nhiệt nước
                                                    các hãng</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cat-child-items">
                                        <a href="/bo-tan-nhiet-nuoc-all-in-one_dm1390.html" class="cate-2"
                                            title="Tản nhiệt nước All in One" id="js-menu-1390">Tản nhiệt nước All
                                            in One</a>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/tan-nhiet-nuoc-asus_dm1878.html"
                                                    title="Tản nhiệt nước Asus" id="js-menu-1878">Tản nhiệt nước
                                                    Asus</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/tan-nhiet-nuoc-gigabyte_dm1911.html"
                                                    title="Tản nước Gigabyte" id="js-menu-1911">Tản nước
                                                    Gigabyte</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/tan-nhiet-nuoc-msi_dm1912.html" title="Tản nhiệt nước MSI"
                                                    id="js-menu-1912">Tản
                                                    nhiệt nước MSI</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/tan-nhiet-nuoc-corsair_dm1523.html"
                                                    title="Tản nước Corsair" id="js-menu-1523">Tản nước Corsair</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/tan-nhiet-nuoc-nzxt_dm1524.html"
                                                    title="Tản nhiệt nước NZXT" id="js-menu-1524">Tản nhiệt nước
                                                    NZXT</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/tan-nhiet-nuoc-deepcool_dm1525.html"
                                                    title="Tản nhiệt nước DeepCool" id="js-menu-1525">Tản nhiệt nước
                                                    DeepCool</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/tan-nhiet-nuoc-id-cooling_dm1526.html"
                                                    title="Tản nhiệt nước ID-Cooling" id="js-menu-1526">Tản nhiệt
                                                    nước ID-Cooling</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/tan-nhiet-nuoc-coolermaster_dm1527.html"
                                                    title="Tản nước CoolerMaster" id="js-menu-1527">Tản nước
                                                    CoolerMaster</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/tan-nhiet-nuoc-xigmatek_dm1601.html"
                                                    title="Tản nhiệt nước Xigmatek" id="js-menu-1601">Tản nhiệt nước
                                                    Xigmatek</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/tan-nhiet-nuoc-thermaltake_dm1729.html"
                                                    title="Tản nước Thermaltake" id="js-menu-1729">Tản nước
                                                    Thermaltake</a>
                                            </div>
                                        </div>

                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/tan-nhiet-nuoc-sama.html" title="Tản nhiệt nước SAMA"
                                                    id="js-menu-2743">Tản
                                                    nhiệt nước SAMA</a>


                                            </div>
                                        </div>

                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/tan-nhiet-nuoc-lian-li.html"
                                                    title="Tản nhiệt nước Lian Li" id="js-menu-2735">Tản nhiệt nước
                                                    Lian Li</a>


                                            </div>
                                        </div>

                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/tan-nhiet-nuoc-thermalright_dm2350.html"
                                                    title="Tản nước Thermalright" id="js-menu-2350">Tản nước
                                                    Thermalright</a>


                                            </div>
                                        </div>

                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/tan-nhiet-nuoc-jonsbo.html" title="Tản nhiệt nước JONSBO"
                                                    id="js-menu-2760">Tản
                                                    nhiệt nước JONSBO</a>


                                            </div>
                                        </div>

                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/tan-nhiet-nuoc-segotep.html"
                                                    title="Tản nhiệt nước Segotep" id="js-menu-2802">Tản nhiệt nước
                                                    Segotep</a>


                                            </div>
                                        </div>

                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/tan-nhiet-nuoc-cac-hang_dm1528.html"
                                                    title="Tản nhiệt nước các hãng" id="js-menu-1528">Tản nhiệt nước
                                                    các hãng</a>


                                            </div>
                                        </div>

                                    </div>

                                    <div class="cat-child-items">
                                        <a href="/tan-nhiet-khi-aircooling_dm1392.html" class="cate-2"
                                            title="Tản nhiệt khí - Aircooling" id="js-menu-1392">Tản nhiệt khí -
                                            Aircooling</a>


                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/tan-nhiet-khi-id-cooling_dm1530.html"
                                                    title="Tản nhiệt khí ID-Cooling" id="js-menu-1530">Tản nhiệt khí
                                                    ID-Cooling</a>


                                            </div>
                                        </div>

                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/tan-nhiet-khi-coolermaster_dm1531.html"
                                                    title="Tản khí CoolerMaster" id="js-menu-1531">Tản khí
                                                    CoolerMaster</a>


                                            </div>
                                        </div>

                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/tan-nhiet-khi-deepcool_dm1529.html"
                                                    title="Tản nhiệt khí DeepCool" id="js-menu-1529">Tản nhiệt khí
                                                    DeepCool</a>


                                            </div>
                                        </div>

                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/tan-nhiet-khi-gamemax_dm1766.html"
                                                    title="Tản nhiệt khí Gamemax" id="js-menu-1766">Tản nhiệt khí
                                                    Gamemax</a>


                                            </div>
                                        </div>

                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/tan-nhiet-khi-noctua_dm1881.html"
                                                    title="Tản nhiệt khí Noctua" id="js-menu-1881">Tản nhiệt khí
                                                    Noctua</a>


                                            </div>
                                        </div>

                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/tan-khi-thermalright_dm1882.html"
                                                    title="Tản khí Thermalright" id="js-menu-1882">Tản khí
                                                    Thermalright</a>


                                            </div>
                                        </div>

                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/tan-nhiet-khi-jonsbo.html" title="Tản nhiệt khí JONSBO"
                                                    id="js-menu-2761">Tản
                                                    nhiệt khí JONSBO</a>


                                            </div>
                                        </div>

                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/tan-nhiet-khi-segotep.html" title="Tản nhiệt khí Segotep"
                                                    id="js-menu-2803">Tản
                                                    nhiệt khí Segotep</a>


                                            </div>
                                        </div>

                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/tan-nhiet-khi-xigmatek.html"
                                                    title="Tản nhiệt khí Xigmatek" id="js-menu-2817">Tản nhiệt khí
                                                    Xigmatek</a>


                                            </div>
                                        </div>

                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/tan-nhiet-khi-cac-hang_dm1532.html"
                                                    title="Tản nhiệt khí các hãng" id="js-menu-1532">Tản nhiệt khí
                                                    các hãng</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="cat-child-items">
                                        <a href="/quat-tan-nhiet_dm1519.html" class="cate-2"
                                            title="Quạt tản nhiệt" id="js-menu-1519">Quạt tản nhiệt</a>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/quat-asus_dm1870.html" title="Quạt Asus"
                                                    id="js-menu-1870">Quạt Asus</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/quat-tan-nhiet-nzxt_dm1534.html" title="Quạt NZXT"
                                                    id="js-menu-1534">Quạt
                                                    NZXT</a>
                                            </div>
                                        </div>

                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/quat-tan-nhiet-corsair_dm1533.html" title="Quạt Corsair"
                                                    id="js-menu-1533">Quạt
                                                    Corsair</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/quat-tan-nhiet-thermaltake_dm1730.html"
                                                    title="Quạt Thermaltake" id="js-menu-1730">Quạt Thermaltake</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/quat-tan-nhiet-cooler-master_dm1746.html"
                                                    title="Quạt Cooler Master" id="js-menu-1746">Quạt Cooler
                                                    Master</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/quat-tan-nhiet-deepcool_dm1764.html"
                                                    title="Quạt tản nhiệt Deepcool" id="js-menu-1764">Quạt tản nhiệt
                                                    Deepcool</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/quat-xigmatek_dm1765.html" title="Quạt Xigmatek"
                                                    id="js-menu-1765">Quạt
                                                    Xigmatek</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/quat-jonsbo.html" title="Quạt JONSBO"
                                                    id="js-menu-2762">Quạt JONSBO</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/quat-lian-li.html" title="Quạt Lian Li"
                                                    id="js-menu-2964">Quạt Lian Li</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/quat-id-cooling.html" title="Quạt ID Cooling"
                                                    id="js-menu-2965">Quạt ID
                                                    Cooling</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/quat-tan-nhiet-cac-hang_dm1535.html" title="Quạt các hãng"
                                                    id="js-menu-1535">Quạt các hãng</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cat-child-items">
                                        <a href="/keo-tan-nhiet.html" class="cate-2" title="Keo Tản Nhiệt"
                                            id="js-menu-2819">Keo Tản
                                            Nhiệt</a>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/keo-coolermaster.html" title="Keo CoolerMaster"
                                                    id="js-menu-2820">Keo
                                                    CoolerMaster</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/keo-noctua.html" title="Keo Noctua"
                                                    id="js-menu-2821">Keo Noctua</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/keo-arctic.html" title="Keo Arctic"
                                                    id="js-menu-2822">Keo Arctic</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/keo-corsair.html" title="Keo Corsair"
                                                    id="js-menu-2823">Keo Corsair</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/keo-thermal-grizzly.html" title="Keo Thermal Grizzly"
                                                    id="js-menu-2824">Keo
                                                    Thermal Grizzly</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/keo-thermalright.html" title="Keo Thermalright"
                                                    id="js-menu-2825">Keo
                                                    Thermalright</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                            <div class="sub-menu  no-big-img  ">
                                <div class="cat-child-holder" id="js-menu-container">
                                    <div class="cat-child-items">
                                        <a href="/linh-kien-mtxt_dm1022.html" class="cate-2"
                                            title="Linh kiện Laptop" id="js-menu-1022">Linh kiện Laptop</a>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/hdd-laptop_dm1135.html" title="HDD Laptop"
                                                    id="js-menu-1135">HDD Laptop</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/ram-laptop.html" title="Ram Laptop"
                                                    id="js-menu-1136">Ram Laptop</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/sac-pin-laptop-adapter_dm1174.html" title="Sạc Laptop"
                                                    id="js-menu-1174">Sạc
                                                    Laptop</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/ssd-laptop_dm1909.html" title="SSD Laptop"
                                                    id="js-menu-1909">SSD Laptop</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cat-child-items">
                                        <a href="/thiet-bi-chuyen-doi.html" class="cate-2"
                                            title="Thiết bị chuyển đổi" id="js-menu-2123">Thiết bị chuyển đổi</a>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/tu-usb-sang-cac-loai.html" title="Từ USB Sang Các Loại"
                                                    id="js-menu-2135">Từ USB
                                                    Sang Các Loại</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/tu-hdmi-sang-cac-loai.html" title="Từ HDMI Sang Các Loại"
                                                    id="js-menu-2136">Từ
                                                    HDMI Sang Các Loại</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/tu-mini-displayport-sang-cac-loai.html"
                                                    title="Từ Mini Displayport Sang Các Loại" id="js-menu-2137">Từ
                                                    Mini Displayport Sang Các Loại</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/tu-type-c-sang-cac-loai.html"
                                                    title="Từ Type C Sang Các Loại" id="js-menu-2138">Từ Type C Sang
                                                    Các Loại</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/tu-dvi-sang-cac-loai.html" title="Từ DVI Sang Các Loại"
                                                    id="js-menu-2140">Từ DVI
                                                    Sang Các Loại</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/tu-displayport-sang-cac-loai.html"
                                                    title="Từ Displayport Sang Các Loại" id="js-menu-2141">Từ
                                                    Displayport Sang Các Loại</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/tu-vga-sang-cac-loai.html" title="Từ VGA Sang Các Loại"
                                                    id="js-menu-2139">Từ VGA
                                                    Sang Các Loại</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/thiet-bi-chuyen-doi-khac.html"
                                                    title="Thiết Bị Chuyển Đổi Khác" id="js-menu-2142">Thiết Bị
                                                    Chuyển Đổi Khác</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cat-child-items">
                                        <a href="/sac-du-phong_dm1289.html" class="cate-2" title="Sạc dự phòng"
                                            id="js-menu-1289">Sạc dự phòng</a>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/sac-du-phong-xiaomi.html" title="Sạc Dự Phòng Xiaomi"
                                                    id="js-menu-2502">Sạc Dự
                                                    Phòng Xiaomi</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cat-child-items">
                                        <a href="/day-cap-cac-loai.html" class="cate-2" title="Dây Cáp Các Loại"
                                            id="js-menu-2113">Dây Cáp Các Loại</a>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/cap-hdmi.html" title="Cáp HDMI" id="js-menu-2122">Cáp
                                                    HDMI</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/cap-vga.html" title="Cáp VGA" id="js-menu-2125">Cáp
                                                    VGA</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/cap-dvi.html" title="Cáp DVI" id="js-menu-2126">Cáp
                                                    DVI</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/cap-displayport.html" title="Cáp Displayport"
                                                    id="js-menu-2127">Cáp
                                                    Displayport</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/cap-chuyen-doi-cac-loai.html"
                                                    title="Cáp Chuyển Đổi Các Loại" id="js-menu-2129">Cáp Chuyển Đổi
                                                    Các Loại</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/cap-usb.html" title="Cáp USB" id="js-menu-2130">Cáp
                                                    USB</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/cap-khac.html" title="Cáp Khác" id="js-menu-2131">Cáp
                                                    Khác</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/cap-nguon-cac-loai.html" title="Cáp nguồn các loại"
                                                    id="js-menu-2133">Cáp nguồn
                                                    các loại</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/cap-am-thanh.html" title="Cáp Âm Thanh"
                                                    id="js-menu-2132">Cáp Âm Thanh</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/cap-mang.html" title="Cáp mạng" id="js-menu-2134">Cáp
                                                    mạng</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                                rel="nofollow">Hotline -
                                                0918.557.006</a>
                                        </div>
                                    </div>
                                    <div class="item-right">
                                        <div class="support-box">
                                            <p class="box-title">◆ 63 Trần Thái Tông</p>
                                            <a href="https://zalo.me/0862.136.488" target="_blank"
                                                rel="nofollow">Hotline -
                                                0862.136.488</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="col-item">
                                <p class="title">Khách hàng Showroom TP.HCM</p>
                                <div class="support-list">
                                    <div class="item-left">
                                        <div class="support-box">
                                            <p class="box-title">◆158-160 Lý Thường Kiệt</p>
                                            <a href="https://zalo.me/0917.948.081" target="_blank"
                                                rel="nofollow">Hotline -
                                                0917.948.081</a>
                                        </div>
                                    </div>
                                    <div class="item-right">
                                        <div class="support-box">
                                            <p class="box-title">◆ 330-332 Võ Văn Tần</p>
                                            <a href="https://zalo.me/0931.105.498" target="_blank"
                                                rel="nofollow">Hotline -
                                                0931.105.498</a>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}

                            {{-- <div class="col-item">
                                <p class="title">Khách hàng Doanh nghiệp - Dự án</p>

                                <div class="support-list">
                                    <div class="support-box">
                                        <p class="box-title">◆ Hà Nội</p>

                                        <a href="https://zalo.me/0919.917.001" target="_blank"
                                            rel="nofollow">Hotline -
                                            0919.917.001</a>
                                        <a href="https://zalo.me/0904.155.568" target="_blank"
                                            rel="nofollow">Hotline -
                                            0904.155.568</a>
                                    </div>

                                    <div class="support-box">
                                        <p class="box-title">◆ TP. HCM</p>

                                        <a href="https://zalo.me/0901.118.414" target="_blank"
                                            rel="nofollow">Hotline -
                                            0901.118.414</a>
                                        <a href="https://zalo.me/0909.143.970" target="_blank"
                                            rel="nofollow">Hotline -
                                            0909.143.970</a>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <a href="{{ route('pages.laptop-outlet') }}"> <img
                            src="{{ asset('assets/img/header-menu-icon/medal.png') }}" class="mr-1" /> Laptop Xả
                        Kho </a>
                    <a href="{{ route('pages.warranty-policy') }}"> <img
                            src="{{ asset('assets/img/header-menu-icon/package.png') }}" class="mr-1" /> Đổi trả
                        miễn phí </a>
                    <a href="{{ route('pages.shipping-policy') }}"> <img
                            src="{{ asset('assets/img/header-menu-icon/delivery.png') }}" class="mr-1" /> Miễn
                        phí vận chuyển </a>
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

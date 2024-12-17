<div class="header-main-container">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center header-main">
            <a href="/" class="logo">
                <img src="{{ asset('assets/img/sigmatech-yellow.png') }}" alt="SigmaTech Logo"
                    class="logo-img w-auto h-auto" />
            </a>
            <!-- search -->
            <div class="header-search">
                <form method="get" action="/search" enctype="multipart/form-data" class="clearfix search-form bg-white">
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
                                                <a href="#" title="Laptop Asus" class="js-menu"
                                                    data-filter_code="brand" data-value="asus">Laptop Asus</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" title="Laptop Lenovo" class="js-menu"
                                                    data-filter_code="brand" data-value="lenovo">Laptop
                                                    Lenovo</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" title="Laptop Dell" class="js-menu"
                                                    data-filter_code="brand" data-value="dell">Laptop Dell</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" title="Laptop Acer" class="js-menu"
                                                    data-filter_code="brand" data-value="acer">Laptop Acer</a>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="cat-child-items">
                                        <a href="#" class="cate-2" title="Laptop Theo Khoảng Giá"
                                            id="js-menu-2386">Laptop Theo Khoảng Giá</a>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" title="Laptop Từ 10 - 15 Triệu" class="js-menu"
                                                    data-filter_code="price"
                                                    data-value="min=10000000&max=15000000">Laptop Từ 10 - 15 Triệu</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" title="Laptop Từ 15 - 20 Triệu" class="js-menu"
                                                    data-filter_code="price"
                                                    data-value="min=15000000&max=20000000">Laptop Từ 15 - 20 Triệu</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" title="Laptop Từ 20 - 25 Triệu" class="js-menu"
                                                    data-filter_code="price"
                                                    data-value="min=20000000&max=25000000">Laptop Từ 20 - 25 Triệu</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" title="Laptop Từ 25 - 30 Triệu" class="js-menu"
                                                    data-filter_code="price"
                                                    data-value="min=25000000&max=30000000">Laptop Từ 25 - 30 Triệu</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" title="Laptop Từ 30 - 35 Triệu" class="js-menu"
                                                    data-filter_code="price"
                                                    data-value="min=30000000&max=35000000">Laptop Từ 30 - 35 Triệu</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" title="Laptop Từ 35 - 40 Triệu" class="js-menu"
                                                    data-filter_code="price"
                                                    data-value="min=35000000&max=40000000">Laptop Từ 35 - 40 Triệu</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" title="Laptop Từ 40 - 60 Triệu" class="js-menu"
                                                    data-filter_code="price"
                                                    data-value="min=40000000&max=60000000">Laptop Từ 40 - 60 Triệu</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" title="Laptop Trên 60 Triệu" class="js-menu"
                                                    data-filter_code="price"
                                                    data-value="min=60000000&max=150000000">Laptop Trên 60 Triệu</a>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="cat-child-items">
                                        <a href="#" class="cate-2" title="Laptop Theo Cấu Hình CPU"
                                            id="js-menu-2377">Laptop Theo Cấu Hình CPU</a>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" class="js-menu" data-filter_code="cpu"
                                                    data-value="Intel Core i3">Intel Core i3</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" class="js-menu" data-filter_code="cpu"
                                                    data-value="Intel Core i5">Intel Core i5</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" class="js-menu" data-filter_code="cpu"
                                                    data-value="Intel Core i7">Intel Core i7</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" class="js-menu" data-filter_code="cpu"
                                                    data-value="Intel Core i9">Intel Core i9</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" class="js-menu" data-filter_code="cpu"
                                                    data-value="Ryzen 3">Ryzen 3</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" class="js-menu" data-filter_code="cpu"
                                                    data-value="Ryzen 5">Ryzen 5</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" class="js-menu" data-filter_code="cpu"
                                                    data-value="Ryzen 7">Ryzen 7</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" class="js-menu" data-filter_code="cpu"
                                                    data-value="Ryzen 9">Ryzen 9</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cat-child-items">
                                        <a href="#" class="cate-2" title="Laptop Theo Kích Thước Màn"
                                            id="js-menu-2398">Laptop Theo Kích Thước Màn</a>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" title="Laptop Khoảng 17 inch" class="js-menu"
                                                    data-filter_code="screensize" data-value="17">Laptop Khoảng 17
                                                    inch</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" title="Laptop Khoảng 16 inch" class="js-menu"
                                                    data-filter_code="screensize" data-value="16">Laptop Khoảng 16
                                                    inch</a>
                                            </div>
                                        </div>

                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" title="Laptop Khoảng 15 inch" class="js-menu"
                                                    data-filter_code="screensize" data-value="15">Laptop Khoảng 15
                                                    inch</a>
                                            </div>
                                        </div>

                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" title="Laptop Khoảng 14 inch" class="js-menu"
                                                    data-filter_code="screensize" data-value="14">Laptop Khoảng 14
                                                    inch</a>
                                            </div>
                                        </div>

                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" title="Laptop Khoảng 13 inch" class="js-menu"
                                                    data-filter_code="screensize" data-value="13">Laptop Khoảng 13
                                                    inch</a>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="cat-child-items">
                                        <a href="#" class="cate-2" id="js-menu-2378">Laptop Theo VGA</a>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" class="js-menu" data-filter_code="vga"
                                                    data-value="RTX 2050" id="js-menu-1613">
                                                    NVIDIA GeForce RTX 2050
                                                </a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" class="js-menu" data-filter_code="vga"
                                                    data-value="RTX 3050" id="js-menu-1905">
                                                    NVIDIA GeForce RTX 3050
                                                </a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" class="js-menu" data-filter_code="vga"
                                                    data-value="RTX 4050" id="js-menu-1905">
                                                    NVIDIA GeForce RTX 4050
                                                </a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" class="js-menu" data-filter_code="vga"
                                                    data-value="RTX 4060" id="js-menu-1905">
                                                    NVIDIA GeForce RTX 4060
                                                </a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" class="js-menu" data-filter_code="vga"
                                                    data-value="RTX 4070" id="js-menu-1905">
                                                    NVIDIA GeForce RTX 4070
                                                </a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" class="js-menu" data-filter_code="vga"
                                                    data-value="RTX 4080" id="js-menu-1907">
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
                                                <a href="#" title="Laptop Asus" class="js-menu"
                                                    data-filter_code="brand" data-value="asus">Laptop Asus</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" title="Laptop Lenovo" class="js-menu"
                                                    data-filter_code="brand" data-value="lenovo">Laptop
                                                    Lenovo</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" title="Laptop Dell" class="js-menu"
                                                    data-filter_code="brand" data-value="dell">Laptop Dell</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" title="Laptop Acer" class="js-menu"
                                                    data-filter_code="brand" data-value="acer">Laptop Acer</a>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="cat-child-items">
                                        <a href="#" class="cate-2" title="Laptop Theo Khoảng Giá"
                                            id="js-menu-2386">Laptop Theo Khoảng Giá</a>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" title="Laptop Từ 10 - 15 Triệu" class="js-menu"
                                                    data-filter_code="price"
                                                    data-value="min=10000000&max=15000000">Laptop Từ 10 - 15 Triệu</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" title="Laptop Từ 15 - 20 Triệu" class="js-menu"
                                                    data-filter_code="price"
                                                    data-value="min=15000000&max=20000000">Laptop Từ 15 - 20 Triệu</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" title="Laptop Từ 20 - 25 Triệu" class="js-menu"
                                                    data-filter_code="price"
                                                    data-value="min=20000000&max=25000000">Laptop Từ 20 - 25 Triệu</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" title="Laptop Từ 25 - 30 Triệu" class="js-menu"
                                                    data-filter_code="price"
                                                    data-value="min=25000000&max=30000000">Laptop Từ 25 - 30 Triệu</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" title="Laptop Từ 30 - 35 Triệu" class="js-menu"
                                                    data-filter_code="price"
                                                    data-value="min=30000000&max=35000000">Laptop Từ 30 - 35 Triệu</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" title="Laptop Từ 35 - 40 Triệu" class="js-menu"
                                                    data-filter_code="price"
                                                    data-value="min=35000000&max=40000000">Laptop Từ 35 - 40 Triệu</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" title="Laptop Từ 40 - 60 Triệu" class="js-menu"
                                                    data-filter_code="price"
                                                    data-value="min=40000000&max=60000000">Laptop Từ 40 - 60 Triệu</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" title="Laptop Trên 60 Triệu" class="js-menu"
                                                    data-filter_code="price"
                                                    data-value="min=60000000&max=150000000">Laptop Trên 60 Triệu</a>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="cat-child-items">
                                        <a href="#" class="cate-2" title="Laptop Theo Cấu Hình CPU"
                                            id="js-menu-2377">Laptop Theo Cấu Hình CPU</a>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" class="js-menu" data-filter_code="cpu"
                                                    data-value="Intel Core i3">Intel Core i3</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" class="js-menu" data-filter_code="cpu"
                                                    data-value="Intel Core i5">Intel Core i5</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" class="js-menu" data-filter_code="cpu"
                                                    data-value="Intel Core i7">Intel Core i7</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" class="js-menu" data-filter_code="cpu"
                                                    data-value="Intel Core i9">Intel Core i9</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" class="js-menu" data-filter_code="cpu"
                                                    data-value="Ryzen 3">Ryzen 3</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" class="js-menu" data-filter_code="cpu"
                                                    data-value="Ryzen 5">Ryzen 5</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" class="js-menu" data-filter_code="cpu"
                                                    data-value="Ryzen 7">Ryzen 7</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" class="js-menu" data-filter_code="cpu"
                                                    data-value="Ryzen 9">Ryzen 9</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cat-child-items">
                                        <a href="#" class="cate-2" title="Laptop Theo Kích Thước Màn"
                                            id="js-menu-2398">Laptop Theo Kích Thước Màn</a>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" title="Laptop Khoảng 17 inch" class="js-menu"
                                                    data-filter_code="screensize" data-value="17">Laptop Khoảng 17
                                                    inch</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" title="Laptop Khoảng 16 inch" class="js-menu"
                                                    data-filter_code="screensize" data-value="16">Laptop Khoảng 16
                                                    inch</a>
                                            </div>
                                        </div>

                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" title="Laptop Khoảng 15 inch" class="js-menu"
                                                    data-filter_code="screensize" data-value="15">Laptop Khoảng 15
                                                    inch</a>
                                            </div>
                                        </div>

                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" title="Laptop Khoảng 14 inch" class="js-menu"
                                                    data-filter_code="screensize" data-value="14">Laptop Khoảng 14
                                                    inch</a>
                                            </div>
                                        </div>

                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" title="Laptop Khoảng 13 inch" class="js-menu"
                                                    data-filter_code="screensize" data-value="13">Laptop Khoảng 13
                                                    inch</a>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="cat-child-items">
                                        <a href="#" class="cate-2" id="js-menu-2378">Laptop Theo VGA</a>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" class="js-menu" data-filter_code="vga"
                                                    data-value="RTX 2050" id="js-menu-1613">
                                                    NVIDIA GeForce RTX 2050
                                                </a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" class="js-menu" data-filter_code="vga"
                                                    data-value="RTX 3050" id="js-menu-1905">
                                                    NVIDIA GeForce RTX 3050
                                                </a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" class="js-menu" data-filter_code="vga"
                                                    data-value="RTX 4050" id="js-menu-1905">
                                                    NVIDIA GeForce RTX 4050
                                                </a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" class="js-menu" data-filter_code="vga"
                                                    data-value="RTX 4060" id="js-menu-1905">
                                                    NVIDIA GeForce RTX 4060
                                                </a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" class="js-menu" data-filter_code="vga"
                                                    data-value="RTX 4070" id="js-menu-1905">
                                                    NVIDIA GeForce RTX 4070
                                                </a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="#" class="js-menu" data-filter_code="vga"
                                                    data-value="RTX 4080" id="js-menu-1907">
                                                    NVIDIA GeForce RTX 4080
                                                </a>
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
                                        <a href="{{ url('pc-parts/cpu') }}" class="cate-2" title="CPU - Bộ Vi Xử Lý"
                                            id="js-menu-1025">CPU - Bộ Vi Xử Lý</a>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/cpu/Intel" title="Cpu Intel" id="js-menu-1307">CPU
                                                    INTEL</a>
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
                                        <a href="{{ url('pc-parts/gpu/') }}" class="cate-2" title="VGA - Card Màn Hình"
                                            id="js-menu-1155">VGA - Card Màn Hình</a>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/pc-parts/gpu/NVIDIA" title="VGA NVIDIA"
                                                    id="js-menu-1963">VGA NVIDIA</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cat-child-last">
                                                <a href="/pc-parts/gpu/AMD" title="VGA AMD" id="js-menu-1965">VGA
                                                    AMD</a>
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
                            
                        </div>
                        <div class="item bg-white" data-id="393">
                            <a href="{{ route('media_devices.show') }}" class="pro-cate-1">
                                <span class="cat-thumb-item" style="width: 35px;text-align: center">
                                    <img src="{{ asset('assets/img/cat/cat_f9fc468337e44b7e6b994b32dc8b8d44.png') }}"
                                        alt="Loa, Tai Nghe, Webcam, Tivi" />
                                </span>
                                <span class="title" title="Loa, Tai Nghe, Webcam, Tivi"> Loa, Tai Nghe,
                                    Webcam</span>
                            </a>
                            
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
                        <a href="{{ route('pages.botman') }}"> <img src="{{ asset('assets/img/header-menu-icon/support.png') }}"
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
        document.addEventListener('DOMContentLoaded', function() {
            let selectedValue = '';
            let selectedMin = null;
            let selectedMax = null;
            let selectedFilterType = '';

            document.querySelectorAll('.js-menu').forEach(function(element) {
                element.addEventListener('click', function(e) {
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
                        console.log(
                            `/laptops/filter?min=${encodeURIComponent(selectedMin)}&max=${encodeURIComponent(selectedMax)}`
                        );
                        window.location.href =
                            `/laptops/filter?min=${encodeURIComponent(selectedMin)}&max=${encodeURIComponent(selectedMax)}`;
                    } else {
                        selectedValue = dataValue;
                        window.location.href =
                            `/laptops/filter?${selectedFilterType}=${encodeURIComponent(selectedValue)}`;
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
                fetch(window.location.origin + `/search-suggestions?query=${query}`)
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
                            image.src = item.image;

                            const info = document.createElement('span');
                            info.classList.add('info');

                            const name = document.createElement('span');
                            name.classList.add('name');
                            name.textContent = item.name;

                            const priceAttribute = item.attributes.find(attr => attr.name ===
                                'Deal Price');
                            const price = priceAttribute ?
                                `${new Intl.NumberFormat('vi-VN').format(priceAttribute.pivot.value)} VNĐ` :
                                'N/A';

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
                        item.link = '';
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
            document.querySelectorAll('.js-search').forEach(function(element) {
                element.addEventListener('click', function(e) {

                    const query = searchInput.value;
                    window.location.href = `/filter?=${encodeURIComponent(query)}`;
        
                });
            });
        });
    </script>
@endpush

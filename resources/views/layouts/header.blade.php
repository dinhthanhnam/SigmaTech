<div class="header-main-container">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center header-main">
      <a href="/" class="logo">
        <img src="{{ asset('assets/img/sigmatech-yellow.png') }}" alt="SigmaTech Logo" class="logo-img w-auto h-auto" />
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
          <a href="#" title="Mua hàng online" class="header-icon-phone d-flex" style="align-items:center;">
            <img src="{{ asset('assets/img/header-icon-right/phone.png') }}" class="mr-1" />
            <p class="icon-text m-0" style="line-height: 1.2;">
              <b><span class="text-15 d-block">1900 0323</span></b>
              <span class="text-15 d-block">0862 136 488</span> </b>
              <b><span class="text-15 d-block">0931 105 498</span> </b>
            </p>
          </a>
        </div>

        <div class="item clearfix">
          <a href="#" title="Xây dựng máy tính" class="d-flex" style="align-items:center;">
            <img src="{{ asset('assets/img/header-icon-right/buildpc.png') }}" class="mr-1 my-1" />
            <p class="icon-text m-0 text-12">Xây dựng<br>cấu hình PC</p>
          </a>
        </div>

        @if (Auth::guest())
          <div class="item clearfix">
            <img src="{{ asset('assets/img/header-icon-right/user.png') }}" class="mr-1 my-1" />
            <div class="icon-text m-0 text-14">
              <a href="{{ route('register') }}" class="d-block"> Đăng ký </a>
              <a href="{{ route('login') }}" class="d-block"> Đăng nhập </a>
            </div>
          </div>
        @else
          <div class="item clearfix">
            <a href="{{ Auth::user()->utype === 'ADM' ? route('admin.index') : route('useraccount')}}" title="Tài khoản">
              <img src="{{ asset('assets/img/header-icon-right/user.png') }}" class="mr-1 my-1" />
              <div class="icon-text m-0 text-14">
                <b>
                  <a href="{{ Auth::user()->utype === 'ADM' ? route('admin.index') : route('useraccount')}}" class="d-block">{{ Auth::user()->name }}</a>
                </b>
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                  @csrf
                  <button type="submit" style="background:none;color:aliceblue;border:none;cursor:pointer;text-align:left;padding:0;font-size:13px;text-decoration:underline;">
                    Đăng xuất
                  </button>
                </form>
              </div>
            </a>
          </div>
        @endif

        <div class="item clearfix">
          <a href="#" class="d-block position-relative" title="Giỏ hàng của bạn">
            <img src="{{ asset('assets/img/header-icon-right/cart.png') }}" class="my-2" />
            {{-- <span class="js-cart-count cart-count"> 0</span> --}}
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
              <a href="{{ route('categories.gaming-laptops') }}" class="pro-cate-1">
                <span class="cat-thumb-item" style="width: 35px;text-align: center">
                  <img src="{{ asset('assets/img/cat/cat_3dcc022e961d90ea6b636f367e5e5f9d.png') }}"
                    alt="Laptop Gaming - Đồ Họa" />
                </span>
                <span class="title" title="Laptop Gaming - Đồ Họa"> Laptop Gaming - Đồ Họa</span>
              </a>
              <div class="sub-menu  no-big-img">
                <div class="cat-child-holder" id="js-menu-container">
                  <div class="cat-child-items">
                    <a href="#" class="cate-2" title="Laptop Gaming Acer" id="">Laptop Gaming
                      Acer</a>
                    <div>
                      <div class="cat-child-last">
                        <a href="#" title="Laptop Gaming Aspire" id="">Laptop
                          Gaming Aspire</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="#" title="Laptop Gaming Nitro" id="">Laptop
                          Gaming Nitro</a>
                        <div class="cat-4-list">
                          <a href="/laptop-acer-nitro-5_dm1632.html" title="Acer Nitro 5 Gaming"
                            id="js-menu-1632">Acer Nitro 5
                            Gaming</a>
                          <a href="/nitro-phoenix.html" title="Laptop Acer Nitro Phoenix" id="js-menu-2731">Laptop
                            Acer Nitro Phoenix</a>
                          <a href="/laptop-acer-nitro-5-tiger.html" title="Laptop Acer Nitro 5 Tiger"
                            id="js-menu-2437">Laptop
                            Acer Nitro 5 Tiger</a>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/laptop-acer-predator-helios-neo.html" title="Laptop Gaming Predator"
                          id="js-menu-2732">Laptop Gaming
                          Predator</a>


                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/laptop-acer-helios-neo-16.html" title="Laptop Acer Helios Neo 16"
                          id="js-menu-2906">Laptop Acer
                          Helios Neo 16</a>
                      </div>
                    </div>
                  </div>
                  <div class="cat-child-items">
                    <a href="#" class="cate-2" title="Laptop Gaming Asus" id="js-menu-1684">Laptop Gaming
                      Asus</a>
                    <div>
                      <div class="cat-child-last">
                        <a href="/asus-tuf-gaming-series_dm1821.html" title="Asus TUF Gaming" id="js-menu-1821">Asus
                          TUF Gaming</a>


                        <div class="cat-4-list">

                          <a href="/laptop-asus-tuf-gaming-f15.html" title="Laptop Asus TUF Gaming F15"
                            id="js-menu-2565">Laptop
                            Asus TUF Gaming F15</a>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/republic-of-gamers_dm1062.html" title="Asus ROG Series" id="js-menu-1062">Asus ROG
                          Series</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/asus-zephyrus-gaming_dm1822.html" title="Asus Zephyrus Gaming"
                          id="js-menu-1822">Asus Zephyrus
                          Gaming</a>
                      </div>
                    </div>
                  </div>
                  <div class="cat-child-items">
                    <a href="#" class="cate-2" title="Laptop Gaming Lenovo" id="js-menu-1901">Laptop Gaming
                      Lenovo</a>
                    <div>
                      <div class="cat-child-last">
                        <a href="/laptop-lenovo-legion_dm1625.html" title="Lenovo Legion Gaming"
                          id="js-menu-1625">Lenovo Legion
                          Gaming</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/lenovo-loq.html" title="Lenovo LOQ" id="js-menu-2736">Lenovo LOQ</a>
                      </div>
                    </div>
                  </div>
                  <div class="cat-child-items">
                    <a href="#" class="cate-2" title="Laptop Gaming Dell" id="js-menu-1672">Laptop Gaming
                      Dell</a>
                    <div>
                      <div class="cat-child-last">
                        <a href="/laptop-dell-gaming-g15.html" title="Laptop Dell Gaming G15"
                          id="js-menu-2717">Laptop Dell Gaming G15</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/laptop-dell-gaming-g3-3500_dm1888.html" title="Laptop Dell Gaming G3 3500"
                          id="js-menu-1888">Laptop Dell
                          Gaming G3 3500</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/laptop-dell-gaming-g5_dm1889.html" title="Laptop Dell Gaming G5"
                          id="js-menu-1889">Laptop Dell Gaming
                          G5</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/laptop-dell-gaming-g7_dm1890.html" title="Laptop Dell Gaming G7"
                          id="js-menu-1890">Laptop Dell Gaming
                          G7</a>
                      </div>
                    </div>
                  </div>
                  <div class="cat-child-items">
                    <a href="/laptop-theo-cau-hinh-vga.html" class="cate-2" title="Laptop Theo Cấu Hình VGA"
                      id="js-menu-2408">Laptop Theo Cấu Hình
                      VGA</a>
                    <div>
                      <div class="cat-child-last">
                        <a href="/laptop-gtx-1650.html" title="Laptop GTX 1650 / 1650Ti" id="js-menu-2414">Laptop GTX
                          1650 / 1650Ti</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/laptop-vga-gtx-1660.html" title="Laptop GTX 1660" id="js-menu-2462">Laptop GTX
                          1660</a>


                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/laptop-rtx-2050.html" title="Laptop RTX 2050/2050Ti" id="js-menu-2415">Laptop RTX
                          2050/2050Ti</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/laptop-rtx-3050.html" title="Laptop RTX 3050 / 3050Ti" id="js-menu-2409">Laptop RTX
                          3050 / 3050Ti</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/laptop-rtx-3060.html" title="Laptop RTX 3060" id="js-menu-2410">Laptop RTX 3060</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/laptop-rtx-3070.html" title="Laptop RTX 3070 / 3070Ti" id="js-menu-2411">Laptop RTX
                          3070 / 3070Ti</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/laptop-rtx-3080.html" title="Laptop RTX 3080 / 3080Ti" id="js-menu-2412">Laptop RTX
                          3080 / 3080Ti</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/laptop-rtx-4070.html" title="Laptop RTX 4070" id="js-menu-2696">Laptop RTX 4070</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/laptop-rtx-4080.html" title="Laptop RTX 4080" id="js-menu-2660">Laptop RTX 4080</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/laptop-rtx-4090.html" title="Laptop RTX 4090" id="js-menu-2663">Laptop RTX 4090</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/laptop-rtx-4050.html" title="Laptop RTX 4050" id="js-menu-2694">Laptop RTX 4050</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/laptop-rtx-4060.html" title="Laptop RTX 4060" id="js-menu-2695">Laptop RTX 4060</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/laptop-amd-radeon-rx-5000m-series-all-5300m5500m.html"
                          title="Laptop AMD RX 5000M Series" id="js-menu-2457">Laptop AMD RX
                          5000M Series</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/laptop-amd-radeon-rx-6000m-series-all-6300m6500m6600m.html"
                          title="Laptop AMD RX 6000M Series" id="js-menu-2458">Laptop AMD RX
                          6000M Series</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/laptop-amd-radeon-rx-6000s-series-all-6000s-new.html"
                          title="Laptop AMD RX 6000S Series" id="js-menu-2459">Laptop AMD RX
                          6000S Series</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/rtx-500-ada.html" title="RTX 500 Ada" id="js-menu-2962">RTX
                          500 Ada</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/rtx-a500.html" title="RTX A500" id="js-menu-2835">RTX
                          A500</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item bg-white" data-id="395">
              <a href="{{ route('categories.laptops') }}" class="pro-cate-1">
                <span class="cat-thumb-item" style="width: 35px;text-align: center">
                  <img src="{{ asset('assets/img/cat/cat_b706c0f50035bddb63ca6e91efef7703.png') }}"
                    alt="Laptop - Tablet - Mobile" />
                </span>
                <span class="title" title="Laptop - Tablet - Mobile">Laptop Văn Phòng</span>
              </a>
              <div class="sub-menu  no-big-img">
                <div class="cat-child-holder" id="js-menu-container">
                  <div class="cat-child-items">
                    <a href="#" class="cate-2" title="Laptop Theo Hãng" id="">Laptop Theo Hãng</a>
                    <div>
                      <div class="cat-child-last">
                        <a href="/laptop-asus_dm1058.html" title="Laptop Asus" id="js-menu-1058">Laptop Asus</a>
                        <div class="cat-4-list">
                          <a href="/laptop-asus-vivobook_dm1609.html" title="Asus Vivobook" id="js-menu-1609">Asus
                            Vivobook</a>
                          <a href="/laptop-asus-zenbook_dm1610.html" title="Asus Zenbook" id="js-menu-1610">Asus
                            Zenbook</a>
                          <a href="/laptop-asus-expertbook_dm1899.html" title="Asus ExpertBook"
                            id="js-menu-1899">Asus ExpertBook</a>
                          <a href="/laptop-asus-proart_dm1900.html" title="Asus ProArt" id="js-menu-1900">Asus
                            ProArt</a>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/laptop-lenovo_dm1059.html" title="Laptop Lenovo" id="js-menu-1059">Laptop
                          Lenovo</a>
                        <div class="cat-4-list">
                          <a href="/laptop-lenovo-ideapad_dm1623.html" title="Lenovo IdeaPad"
                            id="js-menu-1623">Lenovo IdeaPad</a>
                          <a href="/laptop-lenovo-yoga_dm1624.html" title="Lenovo Yoga" id="js-menu-1624">Lenovo
                            Yoga</a>
                          <a href="/laptop-ideapad-gaming.html" title="Ideapad Gaming" id="js-menu-2476">Ideapad
                            Gaming</a>
                          <a href="/laptop-lenovo-v-series.html" title="Lenovo V Series" id="js-menu-2475">Lenovo V
                            Series</a>
                          <a href="/laptop-lenovo-thinkbook_dm1762.html" title="Lenovo ThinkBook"
                            id="js-menu-1762">Lenovo
                            ThinkBook</a>
                          <a href="/laptop-lenovo-thinkpad_dm1622.html" title="Lenovo ThinkPad"
                            id="js-menu-1622">Lenovo ThinkPad</a>
                          <a href="/laptop-thinkpad-mobile-workstation-thinkpad-p-series.html"
                            title="ThinkPad Mobile Workstation - ThinkPad P Series" id="js-menu-2674">ThinkPad Mobile
                            Workstation - ThinkPad P
                            Series</a>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/laptop-hp_dm1013.html" title="Laptop HP" id="js-menu-1013">Laptop HP</a>
                        <div class="cat-4-list">
                          <a href="/laptop-hp-pho-thong.html" title="HP Phổ Thông" id="js-menu-2471">HP Phổ Thông</a>
                          <a href="/laptop-hp-pavilion_dm1626.html" title="HP Pavilion" id="js-menu-1626">HP
                            Pavilion</a>
                          <a href="/laptop-hp-envy_dm1656.html" title="HP Envy / Spectre" id="js-menu-1656">HP Envy /
                            Spectre</a>
                          <a href="/laptop-hp-probook_dm1627.html" title="HP Probook" id="js-menu-1627">HP
                            Probook</a>
                          <a href="/laptop-hp-elitebook_dm1629.html" title="HP Elitebook" id="js-menu-1629">HP
                            Elitebook</a>
                          <a href="/laptop-gaming-hp.html" title="HP Victus" id="js-menu-2472">HP Victus</a>
                          <a href="/laptop-hp-workstation.html" title="HP Workstation" id="js-menu-2473">HP
                            Workstation</a>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/laptop-dell_dm1012.html" title="Laptop Dell" id="js-menu-1012">Laptop Dell</a>
                        <div class="cat-4-list">
                          <a href="/laptop-dell-inspiron_dm1618.html" title="Dell Inspiron" id="js-menu-1618">Dell
                            Inspiron</a>
                          <a href="/laptop-dell-vostro_dm1620.html" title="Dell Vostro" id="js-menu-1620">Dell
                            Vostro</a>
                          <a href="/laptop-dell-xps_dm1621.html" title="Dell XPS" id="js-menu-1621">Dell XPS</a>
                          <a href="/laptop-dell-gaming-g-series.html" title="Dell Gaming G series"
                            id="js-menu-2474">Dell Gaming G
                            series</a>
                          <a href="/latop-dell-alienware_dm2355.html" title="Dell Alienware" id="js-menu-2355">Dell
                            Alienware</a>
                          <a href="/laptop-dell-latitude_dm1619.html" title="Dell Latitude" id="js-menu-1619">Dell
                            Latitude</a>
                          <a href="/laptop-dell-precision-workstation_dm2289.html" title="Dell Workstation"
                            id="js-menu-2289">Dell
                            Workstation</a>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/laptop-acer_dm1060.html" title="Laptop Acer" id="js-menu-1060">Laptop Acer</a>
                        <div class="cat-4-list">
                          <a href="/laptop-acer-aspire_dm1630.html" title="Acer Aspire" id="js-menu-1630">Acer
                            Aspire</a>
                          <a href="/laptop-acer-swift_dm1631.html" title="Acer Swift" id="js-menu-1631">Acer
                            Swift</a>
                          <a href="/laptop-acer-nitro-5_dm1787.html" title="Acer Nitro V" id="js-menu-1787">Acer
                            Nitro V</a>
                          <a href="/laptop-acer-predator_dm1634.html" title="Acer Predator" id="js-menu-1634">Acer
                            Predator</a>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/Laptop-msi_dm1065.html" title="Laptop MSI" id="js-menu-1065">Laptop MSI</a>
                        <div class="cat-4-list">
                          <a href="/laptop-msi-modern.html" title="MSI Modern 14 - 15" id="js-menu-2477">MSI Modern
                            14 - 15</a>
                          <a href="/msi-prestige-series_dm1823.html" title="MSI Prestige" id="js-menu-1823">MSI
                            Prestige</a>
                          <a href="/laptop-msi-gf-series_dm1674.html" title="MSI Gaming GF" id="js-menu-1674">MSI
                            Gaming GF</a>
                          <a href="/msi-summit_dm1886.html" title="MSI Summit" id="js-menu-1886">MSI Summit</a>
                          <a href="/msi-bravo-series_dm1825.html" title="MSI Alpha/Bravo Series"
                            id="js-menu-1825">MSI
                            Alpha/Bravo Series</a>
                          <a href="/laptop-msi-ge-series_dm1668.html" title="MSI GE Series" id="js-menu-1668">MSI GE
                            Series</a>
                          <a href="/laptop-msi-gl-series_dm1671.html" title="MSI GL Series" id="js-menu-1671">MSI GL
                            Series</a>
                          <a href="/laptop-msi-gs-series_dm1669.html" title="MSI GS Series" id="js-menu-1669">MSI GS
                            Series</a>
                          <a href="/laptop-msi-gp-series_dm1670.html" title="MSI GP Series" id="js-menu-1670">MSI GP
                            Series</a>
                          <a href="/laptop-msi-gt-series.html" title="MSI GT Series" id="js-menu-2478">MSI GT
                            Series</a>
                          <a href="/laptop-msi-creator.html" title="MSI Creator" id="js-menu-2479">MSI Creator</a>
                          <a href="/msi-cyborg.html" title="MSI Cyborg" id="js-menu-2708">MSI Cyborg</a>
                          <a href="/msi-stealth-15-series_dm1913.html" title="MSI Stealth" id="js-menu-1913">MSI
                            Stealth</a>
                          <a href="/laptop-msi-workstation_dm2212.html" title="MSI Workstation" id="js-menu-2212">MSI
                            Workstation</a>
                        </div>

                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/laptop-gigabyte_dm2267.html" title="Laptop Gigabyte" id="js-menu-2267">Laptop
                          Gigabyte</a>


                        <div class="cat-4-list">

                          <a href="/laptop-gigabyte-g5_dm2271.html" title="Laptop Gigabyte G5"
                            id="js-menu-2271">Laptop Gigabyte
                            G5</a>

                          <a href="/laptop-gigabyte-g7_dm2272.html" title="Laptop Gigabyte G7"
                            id="js-menu-2272">Laptop Gigabyte
                            G7</a>

                          <a href="/laptop-gigabyte-a5.html" title="Laptop Gigabyte A5" id="js-menu-2673">Laptop
                            Gigabyte A5</a>

                          <a href="/laptop-gigabyte-aero_dm2268.html" title="Laptop Gigabyte AERO"
                            id="js-menu-2268">Laptop Gigabyte
                            AERO</a>

                          <a href="/laptop-gigabyte-aorus_dm2269.html" title="Laptop Gigabyte AORUS"
                            id="js-menu-2269">Laptop
                            Gigabyte AORUS</a>

                          <a href="/laptop-gigabyte-u4.html" title="Laptop Gigabyte U4" id="js-menu-2521">Laptop
                            Gigabyte U4</a>

                          <a href="/laptop-gigabyte-g6.html" title="Laptop Gigabyte G6" id="js-menu-2801">Laptop
                            Gigabyte G6</a>

                        </div>

                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/laptop-may-tinh-xach-tay-lg_dm1480.html" title="Laptop LG" id="js-menu-1480">Laptop
                          LG</a>


                        <div class="cat-4-list">

                          <a href="/laptop-lg-gram-2024.html" title="Laptop LG Gram 2024" id="js-menu-2907">Laptop LG
                            Gram 2024</a>

                          <a href="/laptop-lg-gram-2023.html" title="Laptop LG Gram 2023" id="js-menu-2715">Laptop LG
                            Gram 2023</a>

                          <a href="/laptop-lg-gram-17-inch_dm1839.html" title="Laptop LG Gram 17 inch"
                            id="js-menu-1839">Laptop LG
                            Gram 17 inch</a>

                          <a href="/laptop-lg-gram-16-inch_dm2230.html" title="Laptop LG Gram 16 inch"
                            id="js-menu-2230">Laptop LG
                            Gram 16 inch</a>

                          <a href="/laptop-lg-gram-15-inch.html" title="Laptop LG Gram 15 inch"
                            id="js-menu-2716">Laptop LG
                            Gram 15 inch</a>

                          <a href="/laptop-lg-gram-14-inch_dm1837.html" title="Laptop LG Gram 14 inch"
                            id="js-menu-1837">Laptop LG
                            Gram 14 inch</a>

                        </div>

                      </div>
                    </div>
                  </div>
                  <div class="cat-child-items">
                    <a href="#" class="cate-2" title="Laptop Theo Khoảng Giá" id="js-menu-2386">Laptop Theo
                      Khoảng Giá</a>
                    <div>
                      <div class="cat-child-last">
                        <a href="/laptop-tu-10-15-trieu_dm2388.html" title="Laptop Từ 10 - 15 Triệu"
                          id="js-menu-2388">Laptop Từ 10 -
                          15 Triệu</a>


                      </div>
                    </div>

                    <div>
                      <div class="cat-child-last">
                        <a href="/laptop-tu-15-20-trieu_dm2389.html" title="Laptop Từ 15 - 20 Triệu"
                          id="js-menu-2389">Laptop Từ 15 -
                          20 Triệu</a>


                      </div>
                    </div>

                    <div>
                      <div class="cat-child-last">
                        <a href="/laptop-tu-20-25-trieu_dm2390.html" title="Laptop Từ 20 - 25 Triệu"
                          id="js-menu-2390">Laptop Từ 20 -
                          25 Triệu</a>


                      </div>
                    </div>

                    <div>
                      <div class="cat-child-last">
                        <a href="/laptop-tu-25-30-trieu_dm2391.html" title="Laptop Từ 25 - 30 Triệu"
                          id="js-menu-2391">Laptop Từ 25 -
                          30 Triệu</a>


                      </div>
                    </div>

                    <div>
                      <div class="cat-child-last">
                        <a href="/laptop-tu-30-35-trieu_dm2392.html" title="Laptop Từ 30 - 35 Triệu"
                          id="js-menu-2392">Laptop Từ 30 -
                          35 Triệu</a>


                      </div>
                    </div>

                    <div>
                      <div class="cat-child-last">
                        <a href="/laptop-tu-35-40-trieu_dm2393.html" title="Laptop Từ 35 - 40 Triệu"
                          id="js-menu-2393">Laptop Từ 35 -
                          40 Triệu</a>


                      </div>
                    </div>

                    <div>
                      <div class="cat-child-last">
                        <a href="/laptop-tu-40-60-trieu.html" title="Laptop Từ 40 - 60 Triệu"
                          id="js-menu-2452">Laptop Từ 40 - 60 Triệu</a>


                      </div>
                    </div>

                    <div>
                      <div class="cat-child-last">
                        <a href="/laptop-tren-60-trieu.html" title="Laptop Trên 60 Triệu" id="js-menu-2453">Laptop
                          Trên 60 Triệu</a>


                      </div>
                    </div>

                  </div>

                  <div class="cat-child-items">
                    <a href="/laptop-theo-cau-hinh-cpu_dm2377.html" class="cate-2" title="Laptop Theo Cấu Hình CPU"
                      id="js-menu-2377">Laptop Theo Cấu Hình
                      CPU</a>


                    <div>
                      <div class="cat-child-last">
                        <a href="/laptop-core-i3_dm2286.html" title="Laptop Core i3" id="js-menu-2286">Laptop Core
                          i3</a>


                      </div>
                    </div>

                    <div>
                      <div class="cat-child-last">
                        <a href="/laptop-core-i5_dm2287.html" title="Laptop Core i5" id="js-menu-2287">Laptop Core
                          i5</a>


                      </div>
                    </div>

                    <div>
                      <div class="cat-child-last">
                        <a href="/laptop-core-i7_dm2288.html" title="Laptop Core i7" id="js-menu-2288">Laptop Core
                          i7</a>


                      </div>
                    </div>

                    <div>
                      <div class="cat-child-last">
                        <a href="/laptop-core-i9_dm2381.html" title="Laptop Core i9" id="js-menu-2381">Laptop Core
                          i9</a>


                      </div>
                    </div>

                    <div>
                      <div class="cat-child-last">
                        <a href="/laptop-ryzen-3_dm2382.html" title="Laptop Ryzen 3" id="js-menu-2382">Laptop Ryzen
                          3</a>


                      </div>
                    </div>

                    <div>
                      <div class="cat-child-last">
                        <a href="/laptop-ryzen-5_dm2383.html" title="Laptop Ryzen 5" id="js-menu-2383">Laptop Ryzen
                          5</a>


                      </div>
                    </div>

                    <div>
                      <div class="cat-child-last">
                        <a href="/laptop-ryzen-7_dm2384.html" title="Laptop Ryzen 7" id="js-menu-2384">Laptop Ryzen
                          7</a>


                      </div>
                    </div>

                    <div>
                      <div class="cat-child-last">
                        <a href="/laptop-ryzen-9_dm2385.html" title="Laptop Ryzen 9" id="js-menu-2385">Laptop Ryzen
                          9</a>


                      </div>
                    </div>

                    <div>
                      <div class="cat-child-last">
                        <a href="/snapdragon-x-elite.html" title="Snapdragon X Elite" id="js-menu-2920">Snapdragon X
                          Elite</a>


                      </div>
                    </div>

                  </div>

                  <div class="cat-child-items">
                    <a href="/laptop-theo-kich-thuoc-man-hinh_dm2398.html" class="cate-2"
                      title="Laptop Theo Kích Thước Màn" id="js-menu-2398">Laptop Theo Kích
                      Thước Màn</a>


                    <div>
                      <div class="cat-child-last">
                        <a href="/laptop-khoang-17-inch_dm2405.html" title="Laptop Khoảng 17 inch"
                          id="js-menu-2405">Laptop Khoảng 17
                          inch</a>


                      </div>
                    </div>

                    <div>
                      <div class="cat-child-last">
                        <a href="/laptop-khoang-16-inch_dm2404.html" title="Laptop Khoảng 16 inch"
                          id="js-menu-2404">Laptop Khoảng 16
                          inch</a>


                      </div>
                    </div>

                    <div>
                      <div class="cat-child-last">
                        <a href="/laptop-khoang-15-inch_dm2403.html" title="Laptop Khoảng 15 inch"
                          id="js-menu-2403">Laptop Khoảng 15
                          inch</a>


                      </div>
                    </div>

                    <div>
                      <div class="cat-child-last">
                        <a href="/laptop-khoang-14-inch_dm2402.html" title="Laptop Khoảng 14 inch"
                          id="js-menu-2402">Laptop Khoảng 14
                          inch</a>


                      </div>
                    </div>

                    <div>
                      <div class="cat-child-last">
                        <a href="/laptop-khoang-13-inch_dm2401.html" title="Laptop Khoảng 13 inch"
                          id="js-menu-2401">Laptop Khoảng 13
                          inch</a>


                      </div>
                    </div>

                  </div>

                  <div class="cat-child-items">
                    <a href="/laptop-theo-nganh-nghe_dm2378.html" class="cate-2" title="Laptop Theo Ngành Nghề"
                      id="js-menu-2378">Laptop Theo Ngành
                      Nghề</a>


                    <div>
                      <div class="cat-child-last">
                        <a href="/laptop-van-phong-gia-re_dm1613.html" title="Laptop Văn Phòng"
                          id="js-menu-1613">Laptop Văn Phòng</a>


                      </div>
                    </div>

                    <div>
                      <div class="cat-child-last">
                        <a href="/laptop-sinh-vien-gia-re_dm1612.html" title="Laptop Sinh Viên"
                          id="js-menu-1612">Laptop Sinh Viên</a>


                        <div class="cat-4-list">

                          <a href="/laptop-cho-sinh-vien-thiet-ke-do-hoa_dm1903.html"
                            title="Laptop Cho Sinh Viên Thiết Kế Đồ Họa" id="js-menu-1903">Laptop Cho Sinh Viên Thiết
                            Kế Đồ Họa</a>

                          <a href="/laptop-cho-sinh-vien-kinh-te_dm1904.html" title="Laptop Cho Sinh Viên Kinh Tế"
                            id="js-menu-1904">Laptop
                            Cho Sinh Viên Kinh Tế</a>

                        </div>

                      </div>
                    </div>

                    <div>
                      <div class="cat-child-last">
                        <a href="/laptop-cho-lap-trinh-vien.html" title="Laptop Cho Lập Trình Viên"
                          id="js-menu-1905">Laptop Cho Lập
                          Trình Viên</a>


                      </div>
                    </div>

                    <div>
                      <div class="cat-child-last">
                        <a href="/laptop-cho-ke-toan.html" title="Laptop Cho Kế Toán" id="js-menu-1907">Laptop Cho Kế
                          Toán</a>


                      </div>
                    </div>

                    <div>
                      <div class="cat-child-last">
                        <a href="/laptop-doanh-nhan.html" title="Laptop Doanh Nhân" id="js-menu-1908">Laptop Doanh
                          Nhân</a>


                      </div>
                    </div>

                    <div>
                      <div class="cat-child-last">
                        <a href="/laptop-cho-data-analystic.html" title="Laptop Cho Data Analystic"
                          id="js-menu-2958">Laptop Cho
                          Data Analystic</a>


                      </div>
                    </div>

                  </div>

                </div>



              </div>

            </div>
            <div class="item bg-white" data-id="1253">
              <a href="#" class="pro-cate-1">
                <span class="cat-thumb-item" style="width: 35px;text-align: center">
                  <img src="{{ asset('assets/img/cat/cat_cf48adbcc24dd52850830b617fdce703.png') }}"
                    alt="Linh Kiện Máy Tính" />
                </span>
                <span class="title" title="Linh Kiện Máy Tính"> Linh Kiện Máy Tính</span>
              </a>
              <div class="sub-menu no-big-img">
                <div class="cat-child-holder" id="js-menu-container">

                  <div class="cat-child-items">
                    <a href="/cpu-bo-vi-xu-ly.html" class="cate-2" title="CPU - Bộ Vi Xử Lý" id="js-menu-1025">CPU -
                      Bộ Vi Xử Lý</a>
                    <div>
                      <div class="cat-child-last">
                        <a href="/cpu-intel.html" title="CPU INTEL" id="js-menu-1307">CPU
                          INTEL</a>
                        <div class="cat-4-list">
                          <a href="/cpu-intel-core-i9_dm1688.html" title="CPU Intel Core i9" id="js-menu-1688">CPU
                            Intel Core i9</a>
                          <a href="/cpu-intel-core-i7_dm1661.html" title="CPU Intel Core i7" id="js-menu-1661">CPU
                            Intel Core i7</a>
                          <a href="/cpu-intel-core-i5_dm1660.html" title="CPU Intel Core i5" id="js-menu-1660">CPU
                            Intel Core i5</a>
                          <a href="/cpu-intel-core-i3_dm1659.html" title="CPU Intel Core i3" id="js-menu-1659">CPU
                            Intel Core i3</a>
                          <a href="/cpu-intel-pentium_dm1662.html" title="CPU Intel Pentium" id="js-menu-1662">CPU
                            Intel Pentium</a>
                          <a href="/cpu-intel-celeron_dm1663.html" title="CPU Intel Celeron" id="js-menu-1663">CPU
                            Intel Celeron</a>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/cpu-amd.html" title="CPU AMD" id="js-menu-1308">CPU AMD</a>
                        <div class="cat-4-list">
                          <a href="/amd-ryzen-threadripper.html" title="AMD RYZEN THREADRIPPER" id="js-menu-1996">AMD
                            RYZEN
                            THREADRIPPER</a>
                          <a href="/cpu-amd-ryzen-9_dm1743.html" title="AMD Ryzen 9" id="js-menu-1743">AMD Ryzen
                            9</a>
                          <a href="/amd-ryzen-7_dm1644.html" title="AMD Ryzen 7" id="js-menu-1644">AMD Ryzen 7</a>
                          <a href="/amd-ryzen-5_dm1642.html" title="AMD Ryzen 5" id="js-menu-1642">AMD Ryzen 5</a>
                          <a href="/amd-ryzen-3_dm1643.html" title="AMD Ryzen 3" id="js-menu-1643">AMD Ryzen 3</a>
                          <a href="/amd-athlon.html" title="AMD ATHLON" id="js-menu-1995">AMD ATHLON</a>
                        </div>

                      </div>
                    </div>
                  </div>
                  <div class="cat-child-items">
                    <a href="/bo-mach-chu.html" class="cate-2" title="Mainboard - Bo Mạch Chủ"
                      id="js-menu-1024">Mainboard - Bo Mạch Chủ</a>
                    <div>
                      <div class="cat-child-last">
                        <a href="/mainboard-intel.html" title="Mainboard cho CPU INTEL" id="js-menu-1316">Mainboard
                          cho CPU INTEL</a>
                        <div class="cat-4-list">
                          <a href="/mainboard-x299.html" title="MAINBOARD X299" id="js-menu-1998">MAINBOARD X299</a>
                          <a href="/mainboard-z690_dm2327.html" title="MAINBOARD Z690" id="js-menu-2327">MAINBOARD
                            Z690</a>
                          <a href="/mainboard-b560.html" title="MAINBOARD B560" id="js-menu-2092">MAINBOARD B560</a>
                          <a href="/mainboard-h510_dm2199.html" title="MAINBOARD H510" id="js-menu-2199">MAINBOARD
                            H510</a>
                          <a href="/mainboard-h410.html" title="MAINBOARD H410" id="js-menu-2004">MAINBOARD H410</a>
                          <a href="/mainboard-b760.html" title="MAINBOARD B760" id="js-menu-2649">MAINBOARD B760</a>
                          <a href="/mainboard-z790.html" title="MAINBOARD Z790" id="js-menu-2640">MAINBOARD Z790</a>
                          <a href="/mainboard-h610_dm2376.html" title="MAINBOARD H610" id="js-menu-2376">MAINBOARD
                            H610</a>
                          <a href="/mainboard-b660_dm2375.html" title="MAINBOARD B660" id="js-menu-2375">MAINBOARD
                            B660</a>
                          <a href="/mainboard-h470.html" title="MAINBOARD H470" id="js-menu-2190">MAINBOARD H470</a>
                        </div>

                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/mainboard-amd.html" title="Mainboard cho CPU AMD" id="js-menu-1315">Mainboard cho
                          CPU AMD</a>
                        <div class="cat-4-list">
                          <a href="/mainboard-trx40.html" title="MAINBOARD TRX40" id="js-menu-2006">MAINBOARD
                            TRX40</a>
                          <a href="/mainboard-x570.html" title="MAINBOARD X570" id="js-menu-2007">MAINBOARD X570</a>
                          <a href="/mainboard-b550.html" title="MAINBOARD B550" id="js-menu-2008">MAINBOARD B550</a>
                          <a href="/mainboard-b450.html" title="MAINBOARD B450" id="js-menu-2009">MAINBOARD B450</a>
                          <a href="/mainboard-a520.html" title="MAINBOARD A520" id="js-menu-2010">MAINBOARD A520</a>
                          <a href="/mainboard-a320.html" title="MAINBOARD A320" id="js-menu-2011">MAINBOARD A320</a>
                          <a href="/mainboard-x670.html" title="MAINBOARD X670" id="js-menu-2620">MAINBOARD X670</a>
                          <a href="/mainboard-x670e.html" title="MAINBOARD X670E" id="js-menu-2621">MAINBOARD
                            X670E</a>
                          <a href="/mainboard-b650.html" title="MAINBOARD B650" id="js-menu-2638">MAINBOARD B650</a>
                          <a href="/mainboard-b650e.html" title="MAINBOARD B650E" id="js-menu-2639">MAINBOARD
                            B650E</a>
                          <a href="/mainboard-a620.html" title="MAINBOARD A620" id="js-menu-2764">MAINBOARD A620</a>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/mainboard-theo-hang.html" title="MAINBOARD theo hãng" id="js-menu-1997">MAINBOARD
                          theo hãng</a>
                        <div class="cat-4-list">
                          <a href="/mainboard-asus.html" title="MAINBOARD ASUS" id="js-menu-1664">MAINBOARD ASUS</a>
                          <a href="/mainboard-gigabyte.html" title="MAINBOARD GIGABYTE" id="js-menu-1666">MAINBOARD
                            GIGABYTE</a>
                          <a href="/mainboard-msi_dm1665.html" title="MAINBOARD MSI" id="js-menu-1665">MAINBOARD
                            MSI</a>
                          <a href="/mainboard-asrock.html" title="MAINBOARD Asrock" id="js-menu-1667">MAINBOARD
                            Asrock</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="cat-child-items">
                    <a href="/vga-card-man-hinh.html" class="cate-2" title="VGA - Card Màn Hình"
                      id="js-menu-1155">VGA - Card Màn Hình</a>
                    <div>
                      <div class="cat-child-last">
                        <a href="/card-man-hinh-nvidia.html" title="VGA NVIDIA" id="js-menu-1963">VGA NVIDIA</a>
                        <div class="cat-4-list">
                          <a href="/vga-rtx-4090.html" title="VGA RTX 4090" id="js-menu-2624">VGA RTX 4090</a>
                          <a href="/vga-rtx-4080.html" title="VGA RTX 4080" id="js-menu-2623">VGA RTX 4080</a>
                          <a href="/vga-rtx-4080-super.html" title="VGA RTX 4080 SUPER" id="js-menu-2841">VGA RTX
                            4080 SUPER</a>
                          <a href="/vga-rtx-4070.html-1" title="VGA RTX 4070 Ti" id="js-menu-2650">VGA RTX 4070
                            Ti</a>
                          <a href="/vga-rtx-4070.html" title="VGA RTX 4070" id="js-menu-2622">VGA RTX 4070</a>
                          <a href="/vga-rtx-4060ti.html" title="VGA RTX 4060Ti" id="js-menu-2739">VGA RTX 4060Ti</a>
                          <a href="/vga-rtx-4060.html" title="VGA RTX 4060" id="js-menu-2755">VGA RTX 4060</a>
                          <a href="/vga-rtx-4070-super.html" title="VGA RTX 4070 SUPER" id="js-menu-2840">VGA RTX
                            4070 SUPER</a>
                          <a href="/vga-rtx-4070-ti-super.html" title="VGA RTX 4070 TI SUPER" id="js-menu-2842">VGA
                            RTX 4070
                            TI SUPER</a>
                          <a href="/vga-rtx-3070.html" title="VGA RTX 3070" id="js-menu-1883">VGA RTX 3070</a>
                          <a href="/vga-rtx-3060-ti.html" title="VGA RTX 3060 Ti" id="js-menu-1924">VGA RTX 3060
                            Ti</a>
                          <a href="/vga-rtx-3060.html" title="VGA RTX 3060" id="js-menu-1942">VGA RTX 3060</a>
                          <a href="/vga-rtx-3050.html" title="VGA RTX 3050" id="js-menu-2455">VGA RTX 3050</a>
                          <a href="/vga-rtx-2060.html" title="VGA RTX 2060" id="js-menu-1969">VGA RTX 2060</a>
                          <a href="/vga-gtx-1660-super.html" title="VGA GTX 1660 SUPER" id="js-menu-1970">VGA GTX
                            1660 SUPER</a>
                          <a href="/vga-gtx-1660ti_dm2352.html" title="VGA GTX 1660Ti" id="js-menu-2352">VGA GTX
                            1660Ti</a>
                          <a href="/vga-gtx-1660.html" title="VGA GTX 1660" id="js-menu-1971">VGA GTX 1660</a>
                          <a href="/vga-gtx-1650-super.html" title="VGA GTX 1650 SUPER" id="js-menu-1972">VGA GTX
                            1650 SUPER</a>
                          <a href="/vga-gtx-1650.html" title="VGA GTX 1650" id="js-menu-1973">VGA GTX 1650</a>
                          <a href="/vga-gtx-1050ti_dm2353.html" title="VGA GTX 1050Ti" id="js-menu-2353">VGA GTX
                            1050Ti</a>
                          <a href="/vga-gt-1030.html" title="VGA GT 1030" id="js-menu-1974">VGA GT 1030</a>
                          <a href="/vga-gt-730.html" title="VGA GT 730" id="js-menu-2728">VGA GT 730</a>
                          <a href="/vga-gt-710.html" title="VGA GT 710" id="js-menu-1975">VGA GT 710</a>
                          <a href="/vga-nvidia-quadro.html" title="VGA QUADRO" id="js-menu-1976">VGA QUADRO</a>
                          <a href="/rtx-6000.html" title="RTX 6000" id="js-menu-2768">RTX
                            6000</a>
                          <a href="/rtx-a5500.html" title="RTX A5500" id="js-menu-2769">RTX
                            A5500</a>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/card-man-hinh-amd.html" title="VGA AMD" id="js-menu-1965">VGA AMD</a>
                        <div class="cat-4-list">
                          <a href="/rx-7900-xtx.html" title="RX 7900 XTX" id="js-menu-2647">RX 7900 XTX</a>
                          <a href="/rx-7900-xt.html" title="RX 7900 XT" id="js-menu-2648">RX 7900 XT</a>
                          <a href="/vga-rx-6900-xt.html" title="VGA RX 6900 XT" id="js-menu-1920">VGA RX 6900 XT</a>
                          <a href="/vga-rx-68006800-xt.html" title="VGA RX 6800 XT" id="js-menu-1919">VGA RX 6800
                            XT</a>
                          <a href="/vga-rx-6800.html" title="VGA RX 6800" id="js-menu-1977">VGA RX 6800</a>
                          <a href="/vga-rx-6700-xt_dm2200.html" title="VGA RX 6700 XT" id="js-menu-2200">VGA RX 6700
                            XT</a>
                          <a href="/vga-rx-6600-xt_dm2290.html" title="VGA RX 6600 XT" id="js-menu-2290">VGA RX 6600
                            XT</a>
                          <a href="/vga-rx-6600_dm2326.html" title="VGA RX 6600" id="js-menu-2326">VGA RX 6600</a>
                          <a href="/vga-rx-5700-xt.html" title="VGA RX 5700 XT" id="js-menu-1978">VGA RX 5700 XT</a>
                          <a href="/vga-rx-5700.html" title="VGA RX 5700" id="js-menu-1979">VGA RX 5700</a>
                          <a href="/vga-rx-5600-xt.html" title="VGA RX 5600 XT" id="js-menu-1980">VGA RX 5600 XT</a>
                          <a href="/vga-rx-5500-xt.html-1" title="VGA RX 5500 XT" id="js-menu-1981">VGA RX 5500
                            XT</a>
                          <a href="/vga-rx-550.html" title="VGA RX 550" id="js-menu-1982">VGA RX 550</a>
                          <a href="/rx-6500-xt.html" title="VGA RX 6500 XT" id="js-menu-2419">VGA RX 6500 XT</a>
                          <a href="/vga-rx-6650-xt.html" title="VGA RX 6650 XT" id="js-menu-2516">VGA RX 6650 XT</a>
                          <a href="/vga-rx-6750-xt.html" title="VGA RX 6750 XT" id="js-menu-2517">VGA RX 6750 XT</a>
                          <a href="/vga-rx-6950-xt.html" title="VGA RX 6950 XT" id="js-menu-2518">VGA RX 6950 XT</a>
                          <a href="/rx-7600.html" title="RX 7600" id="js-menu-2767">RX
                            7600</a>
                          <a href="/rx-7800-xt.html" title="RX 7800 XT" id="js-menu-2798">RX 7800 XT</a>
                          <a href="/rx-7700-xt.html" title="RX 7700 XT" id="js-menu-2917">RX 7700 XT</a>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/vga-chuyen-ai.html" title="VGA Chuyên AI" id="js-menu-2971">VGA Chuyên AI</a>
                        <div class="cat-4-list">
                          <a href="/nhap-mon-ai.html" title="Nhập môn AI" id="js-menu-2972">Nhập môn AI</a>
                          <a href="/chuyen-gia-ai.html" title="Chuyên gia AI" id="js-menu-2973">Chuyên gia AI</a>
                          <a href="/ki-su-ai.html" title="Kĩ sư AI" id="js-menu-2974">Kĩ sư
                            AI</a>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/vga-theo-hang.html" title="VGA theo Hãng" id="js-menu-1961">VGA theo Hãng</a>
                        <div class="cat-4-list">
                          <a href="/vga-asus.html" title="VGA ASUS" id="js-menu-1309">VGA
                            ASUS</a>
                          <a href="/vga-gigabyte.html" title="VGA GIGABYTE" id="js-menu-1311">VGA GIGABYTE</a>
                          <a href="/vga-msi.html" title="VGA MSI" id="js-menu-1312">VGA
                            MSI</a>
                          <a href="/vga-colorful.html" title="VGA COLORFUL" id="js-menu-1771">VGA COLORFUL</a>
                          <a href="/vga-pny.html" title="VGA PNY" id="js-menu-1848">VGA
                            PNY</a>
                          <a href="/vga-card-man-hinh-inno3d.html" title="VGA INNO3D" id="js-menu-1763">VGA
                            INNO3D</a>
                          <a href="/vga-sapphire.html" title="VGA SAPPHIRE" id="js-menu-1966">VGA SAPPHIRE</a>
                          <a href="/vga-powercolor.html" title="VGA POWERCOLOR" id="js-menu-1779">VGA POWERCOLOR</a>

                          <a href="/vga-intel.html" title="VGA INTEL" id="js-menu-2714">VGA
                            INTEL</a>

                          <a href="/vga-yeston.html" title="VGA Yeston" id="js-menu-2729">VGA Yeston</a>

                          <a href="/vga-gainward.html" title="VGA GAINWARD" id="js-menu-2733">VGA GAINWARD</a>

                          <a href="/vga-leadtek.html" title="VGA LEADTEK" id="js-menu-1983">VGA LEADTEK</a>

                          <a href="/vga-asrock.html" title="VGA ASROCK" id="js-menu-2017">VGA ASROCK</a>

                          <a href="/vga-palit_dm2229.html" title="VGA PALIT" id="js-menu-2229">VGA PALIT</a>

                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/vga-theo-dung-luong.html" title="VGA theo Dung Lượng" id="js-menu-1964">VGA theo
                          Dung Lượng</a>
                        <div class="cat-4-list">
                          <a href="/card-man-hinh-1gb.html" title="VGA 1GB" id="js-menu-1985">VGA 1GB</a>
                          <a href="/card-man-hinh-2gb.html" title="VGA 2GB" id="js-menu-1986">VGA 2GB</a>
                          <a href="/card-man-hinh-4gb.html" title="VGA 4GB" id="js-menu-1984">VGA 4GB</a>
                          <a href="/card-man-hinh-6gb.html" title="VGA 6GB" id="js-menu-1987">VGA 6GB</a>
                          <a href="/card-man-hinh-8gb.html" title="VGA 8GB" id="js-menu-1988">VGA 8GB</a>
                          <a href="/card-man-hinh-10gb.html" title="VGA 10GB" id="js-menu-1989">VGA 10GB</a>
                          <a href="/card-man-hinh-12gb.html" title="VGA 12GB" id="js-menu-1990">VGA 12GB</a>
                          <a href="/vga-20gb.html" title="VGA 20GB" id="js-menu-2651">VGA 20GB</a>
                          <a href="/card-man-hinh-16gb.html" title="VGA 16GB" id="js-menu-1991">VGA 16GB</a>
                          <a href="/card-man-hinh-24gb.html" title="VGA 24GB" id="js-menu-1992">VGA 24GB</a>
                          <a href="/card-man-hinh-48gb.html" title="VGA 48GB" id="js-menu-1993">VGA 48GB</a>
                          <a href="/vga-32gb.html" title="VGA 32GB" id="js-menu-2866">VGA 32GB</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="cat-child-items">
                    <a href="/bo-nho-trong.html" class="cate-2" title="Ram - Bộ Nhớ Trong" id="js-menu-1234">Ram
                      - Bộ Nhớ Trong</a>
                    <div>
                      <div class="cat-child-last">
                        <a href="/ram-theo-toc-do-bus.html" title="RAM theo Tốc Độ (bus)" id="js-menu-2015">RAM
                          theo Tốc Độ (bus)</a>
                        <div class="cat-4-list">
                          <a href="/ram-bus-1600.html" title="RAM bus 1600" id="js-menu-2028">RAM bus 1600</a>
                          <a href="/ram-bus-2400.html" title="RAM bus 2400" id="js-menu-2029">RAM bus 2400</a>
                          <a href="/ram-bus-2666.html" title="RAM bus 2666" id="js-menu-2030">RAM bus 2666</a>
                          <a href="/ram-bus-2800.html" title="RAM bus 2800" id="js-menu-2031">RAM bus 2800</a>
                          <a href="/ram-bus-3000.html" title="RAM bus 3000" id="js-menu-2032">RAM bus 3000</a>
                          <a href="/ram-bus-3200.html" title="RAM bus 3200" id="js-menu-2033">RAM bus 3200</a>
                          <a href="/ram-bus-3600.html" title="RAM bus 3600" id="js-menu-2034">RAM bus 3600</a>
                          <a href="/ram-bus-3733.html" title="RAM bus 3733" id="js-menu-2420">RAM bus 3733</a>
                          <a href="/ram-bus-4800_dm2345.html" title="RAM bus 4800" id="js-menu-2345">RAM bus
                            4800</a>
                          <a href="/ram-bus-5200_dm2346.html" title="RAM bus 5200" id="js-menu-2346">RAM bus
                            5200</a>
                          <a href="/ram-bus-5600_dm2347.html" title="RAM bus 5600" id="js-menu-2347">RAM bus
                            5600</a>
                          <a href="/ram-bus-6000_dm2366.html" title="RAM bus 6000" id="js-menu-2366">RAM bus
                            6000</a>
                          <a href="/ram-bus-6200mhz.html" title="RAM bus 6200" id="js-menu-2454">RAM bus 6200</a>
                          <a href="/ram-bus-7600.html" title="RAM bus 7600" id="js-menu-2967">RAM bus 7600</a>
                          <a href="/ram-bus-6400.html" title="RAM bus 6400" id="js-menu-2740">RAM bus 6400</a>
                          <a href="/ram-bus-6600.html" title="RAM bus 6600" id="js-menu-2813">RAM bus 6600</a>
                          <a href="/ram-bus-7200.html" title="RAM bus 7200" id="js-menu-2814">RAM bus 7200</a>
                          <a href="/ram-bus-7000.html" title="RAM bus 7000" id="js-menu-2815">RAM bus 7000</a>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/ram-theo-hang.html" title="Ram Theo Hãng" id="js-menu-2012">Ram Theo Hãng</a>
                        <div class="cat-4-list">
                          <a href="/ram-corsair.html" title="RAM CORSAIR" id="js-menu-1420">RAM CORSAIR</a>
                          <a href="/ram-gskill.html" title="RAM GSKILL" id="js-menu-1306">RAM GSKILL</a>
                          <a href="/ram-kingston.html" title="RAM KINGSTON" id="js-menu-1304">RAM KINGSTON</a>
                          <a href="/ram-kingmax.html" title="RAM KINGMAX" id="js-menu-1305">RAM KINGMAX</a>
                          <a href="/ram-adata.html" title="RAM ADATA" id="js-menu-1396">RAM ADATA</a>
                          <a href="/ram-may-tinh-apacer.html" title="RAM APACER" id="js-menu-1736">RAM APACER</a>
                          <a href="/ram-pny.html" title="RAM PNY" id="js-menu-1849">RAM
                            PNY</a>
                          <a href="/ram-geil.html" title="RAM GEIL" id="js-menu-1449">RAM GEIL</a>
                          <a href="/ram-may-tinh-teamgroup.html" title="RAM TEAMGROUP" id="js-menu-1735">RAM
                            TEAMGROUP</a>
                          <a href="/ram-micron.html" title="RAM Micron" id="js-menu-2970">RAM Micron</a>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/ram-theo-tinh-nang.html" title="RAM theo Tính Năng" id="js-menu-2013">RAM theo
                          Tính Năng</a>
                        <div class="cat-4-list">
                          <a href="/ram-co-tan-nhiet.html" title="RAM có Tản Nhiệt" id="js-menu-2016">RAM có Tản
                            Nhiệt</a>
                          <a href="/ram-co-led.html" title="RAM có LED" id="js-menu-2018">RAM có LED</a>
                          <a href="/ram-ddr3.html" title="RAM DDR3" id="js-menu-2019">RAM DDR3</a>
                          <a href="/ram-ddr4.html" title="RAM DDR4" id="js-menu-2020">RAM DDR4</a>
                          <a href="/ram-ddr5_dm2344.html" title="RAM DDR5" id="js-menu-2344">RAM DDR5</a>
                          <a href="/ram-cho-pc.html" title="RAM cho PC" id="js-menu-2021">RAM cho PC</a>
                          <a href="/ram-cho-laptop.html" title="RAM cho LAPTOP" id="js-menu-2022">RAM cho
                            LAPTOP</a>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/ram-theo-dung-luong.html" title="RAM theo Dung Lượng" id="js-menu-2014">RAM theo
                          Dung Lượng</a>
                        <div class="cat-4-list">
                          <a href="/ram-4gb.html" title="RAM 4GB" id="js-menu-2023">RAM
                            4GB</a>
                          <a href="/ram-8gb.html" title="RAM 8GB" id="js-menu-2024">RAM
                            8GB</a>
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
                    <a href="/nguon-dien-may-tinh-psu.html" class="cate-2" title="PSU - Nguồn Máy Tính"
                      id="js-menu-1051">PSU - Nguồn Máy Tính</a>
                    <div>
                      <div class="cat-child-last">
                        <a href="/nguon-may-tinh-cac-hang.html" title="Nguồn theo hãng" id="js-menu-1648">Nguồn
                          theo hãng</a>
                        <div class="cat-4-list">
                          <a href="/nguon-may-tinh-asus.html" title="Nguồn Asus" id="js-menu-1747">Nguồn Asus</a>
                          <a href="/nguon-gigabyte.html" title="Nguồn Gigabyte" id="js-menu-2100">Nguồn
                            Gigabyte</a>
                          <a href="/nguon-msi.html-1" title="Nguồn MSI" id="js-menu-2513">Nguồn MSI</a>
                          <a href="/nguon-seasonic.html" title="Nguồn Seasonic" id="js-menu-1424">Nguồn
                            Seasonic</a>
                          <a href="/nguon-corsair.html" title="Nguồn Corsair" id="js-menu-1421">Nguồn Corsair</a>
                          <a href="/nguon-nzxt.html" title="Nguồn NZXT" id="js-menu-2514">Nguồn NZXT</a>
                          <a href="/nguon-acbel.html" title="Nguồn Acbel" id="js-menu-1410">Nguồn Acbel</a>
                          <a href="/nguon-xigmatek.html" title="Nguồn Xigmatek" id="js-menu-1429">Nguồn
                            Xigmatek</a>
                          <a href="/nguon-cooler-master.html" title="Nguồn Cooler Master" id="js-menu-1432">Nguồn
                            Cooler Master</a>
                          <a href="/nguon-gamemax.html" title="Nguồn Gamemax" id="js-menu-2102">Nguồn Gamemax</a>
                          <a href="/nguon-antec.html" title="Nguồn Antec" id="js-menu-1428">Nguồn Antec</a>
                          <a href="/nguon-deepcool_dm2374.html" title="Nguồn Deepcool" id="js-menu-2374">Nguồn
                            Deepcool</a>
                          <a href="/lian-li.html" title="Nguồn Lian Li" id="js-menu-2734">Nguồn Lian Li</a>
                          <a href="/segotep.html-1-2" title="Nguồn Segotep" id="js-menu-2809">Nguồn Segotep</a>
                          <a href="/aigo.html-1" title="Nguồn Aigo" id="js-menu-2810">Nguồn Aigo</a>
                          <a href="/kenoo.html-1" title="Nguồn Kenoo" id="js-menu-2811">Nguồn Kenoo</a>
                          <a href="/thermaltake.html-1" title="Nguồn Thermaltake" id="js-menu-2812">Nguồn
                            Thermaltake</a>
                          <a href="/nguon-hang-khac.html" title="Nguồn hãng khác" id="js-menu-2105">Nguồn hãng
                            khác</a>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/cong-suat-nguon.html" title="Công Suất Nguồn" id="js-menu-2084">Công Suất
                          Nguồn</a>
                        <div class="cat-4-list">
                          <a href="/nguon-duoi-400w.html" title="Dưới 400W" id="js-menu-1650">Dưới 400W</a>
                          <a href="/nguon-may-tinh-tu-400w-550w.html" title="400W - 550W" id="js-menu-1651">400W -
                            550W</a>
                          <a href="/nguon-may-tinh-tu-550w-650w.html" title="550W - 650W" id="js-menu-1652">550W -
                            650W</a>
                          <a href="/nguon-may-tinh-tu-650w-800w.html" title="650W - 800W" id="js-menu-1654">650W -
                            800W</a>
                          <a href="/nguon-tu-800w-den-1000w.html" title="800W - 1000W" id="js-menu-1738">800W -
                            1000W</a>
                          <a href="/nguon-tren-1000w.html" title="Trên 1000W" id="js-menu-1739">Trên 1000W</a>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/chuan-nguon.html" title="Chuẩn Nguồn" id="js-menu-2085">Chuẩn Nguồn</a>
                        <div class="cat-4-list">
                          <a href="/80-plus.html" title="80 plus" id="js-menu-2088">80
                            plus</a>
                          <a href="/80-plus-bronze.html" title="80 Plus Bronze" id="js-menu-2089">80 Plus
                            Bronze</a>
                          <a href="/80-plus-gold.html" title="80 Plus Gold" id="js-menu-2090">80 Plus Gold</a>
                          <a href="/80-plus-platinum.html" title="80 Plus Platinum" id="js-menu-2091">80 Plus
                            Platinum</a>
                          <a href="/80-plus-titaninum.html" title="80 Plus Titaninum" id="js-menu-2093">80 Plus
                            Titaninum</a>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/kieu-day-nguon.html" title="Kiểu Dây Nguồn" id="js-menu-2086">Kiểu Dây Nguồn</a>
                        <div class="cat-4-list">
                          <a href="/full-modular.html" title="Full Modular" id="js-menu-2094">Full Modular</a>
                          <a href="/semi-modular.html" title="Semi Modular" id="js-menu-2095">Semi Modular</a>
                          <a href="/non-modular.html" title="Non Modular" id="js-menu-2096">Non Modular</a>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/kich-co.html" title="Kích Cỡ" id="js-menu-2087">Kích
                          Cỡ</a>
                        <div class="cat-4-list">
                          <a href="/nguon-atx.html" title="ATX" id="js-menu-2097">ATX</a>
                          <a href="/nguon-sfx.html" title="SFX" id="js-menu-2098">SFX</a>
                          <a href="/flex-atx.html" title="Flex ATX" id="js-menu-2099">Flex ATX</a>

                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="cat-child-items">
                    <a href="/o-cung-ssd_dm1030.html" class="cate-2" title="SSD" id="js-menu-1030">SSD</a>
                    <div>
                      <div class="cat-child-last">
                        <a href="/ssd-theo-hang_dm2296.html" title="SSD theo hãng" id="js-menu-2296">SSD theo
                          hãng</a>
                        <div class="cat-4-list">
                          <a href="/o-cung-the-ran-ssd-samsung_dm1482.html" title="SSD Samsung"
                            id="js-menu-1482">SSD Samsung</a>
                          <a href="/o-cung-the-ran-ssd-kingston_dm1484.html" title="SSD Kingston"
                            id="js-menu-1484">SSD Kingston</a>
                          <a href="/o-cung-ssd-kingmax_dm1895.html" title="SSD Kingmax" id="js-menu-1895">SSD
                            Kingmax</a>
                          <a href="/o-cung-the-ran-ssd-western-digital_dm1487.html" title="SSD Western Digital"
                            id="js-menu-1487">SSD Western
                            Digital</a>
                          <a href="/o-cung-the-ran-ssd-apacer_dm1600.html" title="SSD Apacer"
                            id="js-menu-1600">SSD Apacer</a>
                          <a href="/o-cung-the-ran-ssd-plextor_dm1483.html" title="SSD Plextor"
                            id="js-menu-1483">SSD Plextor</a>
                          <a href="/o-cung-the-ran-ssd-adata_dm1485.html" title="SSD ADATA" id="js-menu-1485">SSD
                            ADATA</a>
                          <a href="/o-cung-ssd-colorful_dm1846.html" title="SSD Colorful" id="js-menu-1846">SSD
                            Colorful</a>
                          <a href="/o-cung-ssd-corsair_dm1893.html" title="SSD Corsair" id="js-menu-1893">SSD
                            Corsair</a>
                          <a href="/o-cung-ssd-gigabyte_dm1894.html" title="SSD Gigabyte" id="js-menu-1894">SSD
                            Gigabyte</a>
                          <a href="/o-cung-ssd-kingspec_dm1896.html" title="SSD Kingspec" id="js-menu-1896">SSD
                            Kingspec</a>
                          <a href="/o-cung-ssd-lexar_dm1897.html" title="SSD LEXAR" id="js-menu-1897">SSD
                            LEXAR</a>
                          <a href="/o-cung-ssd-pny_dm1898.html" title="SSD PNY" id="js-menu-1898">SSD PNY</a>
                          <a href="/o-cung-ssd-patriot_dm2258.html" title="SSD PATRIOT" id="js-menu-2258">SSD
                            PATRIOT</a>
                          <a href="/o-cung-ssd-msi.html" title="SSD MSI" id="js-menu-2523">SSD MSI</a>
                          <a href="/ssd-teamgroup.html" title="SSD TeamGroup" id="js-menu-2829">SSD TeamGroup</a>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/dung-luong-ssd_dm2298.html" title="Dung lượng SSD" id="js-menu-2298">Dung lượng
                          SSD</a>
                        <div class="cat-4-list">
                          <a href="/o-cung-ssd-120gb-128gb_dm2300.html" title="SSD 120GB - 128GB"
                            id="js-menu-2300">SSD 120GB -
                            128GB</a>
                          <a href="/o-cung-ssd-240gb-250gb-256gb_dm2301.html" title="SSD 240GB - 250GB - 256GB"
                            id="js-menu-2301">SSD
                            240GB - 250GB - 256GB</a>
                          <a href="/o-cung-ssd-480gb-500gb-512gb_dm2302.html" title="SSD 480GB - 500GB - 512GB"
                            id="js-menu-2302">SSD
                            480GB - 500GB - 512GB</a>
                          <a href="/ssd-960gb-1tb_dm2303.html" title="SSD 1TB" id="js-menu-2303">SSD 1TB</a>
                          <a href="/o-cung-ssd-2tb_dm2304.html" title="SSD 2TB" id="js-menu-2304">SSD 2TB</a>
                          <a href="/o-cung-ssd-4tb_dm2305.html" title="SSD 4TB" id="js-menu-2305">SSD 4TB</a>
                          <a href="/o-cung-ssd-8tb_dm2306.html" title="SSD 8TB" id="js-menu-2306">SSD 8TB</a>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/chuan-ssd_dm2307.html" title="Chuẩn SSD" id="js-menu-2307">Chuẩn SSD</a>
                        <div class="cat-4-list">
                          <a href="/o-cung-ssd-25-inch_dm2308.html" title="SSD 2.5 inch" id="js-menu-2308">SSD 2.5
                            inch</a>
                          <a href="/o-cung-ssd-m2-sata_dm2309.html" title="SSD M.2 SATA" id="js-menu-2309">SSD M.2
                            SATA</a>
                          <a href="/o-cung-ssd-m2-pcie_dm2310.html" title="SSD M.2 NVMe" id="js-menu-2310">SSD M.2
                            NVMe</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="cat-child-items">
                    <a href="/o-cung-desktop_dm1047.html" class="cate-2" title="HDD - Ổ Cứng"
                      id="js-menu-1047">HDD - Ổ Cứng</a>
                    <div>
                      <div class="cat-child-last">
                        <a href="/hdd-theo-hang_dm2297.html" title="HDD theo hãng" id="js-menu-2297">HDD theo
                          hãng</a>
                        <div class="cat-4-list">
                          <a href="/o-cung-hdd-western-digital_dm1488.html" title="Ổ cứng HDD Western Digital"
                            id="js-menu-1488">Ổ cứng
                            HDD Western Digital</a>
                          <a href="/o-cung-hdd-seagate_dm1489.html" title="Ổ cứng HDD SEAGATE" id="js-menu-1489">Ổ
                            cứng HDD
                            SEAGATE</a>
                          <a href="/o-cung-hdd-toshiba_dm1490.html" title="Ổ cứng HDD Toshiba" id="js-menu-1490">Ổ
                            cứng HDD
                            Toshiba</a>
                        </div>

                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/dung-luong-hdd_dm2299.html" title="Dung lượng HDD" id="js-menu-2299">Dung lượng
                          HDD</a>
                        <div class="cat-4-list">
                          <a href="/hdd-1tb_dm2315.html" title="HDD 1TB" id="js-menu-2315">HDD 1TB</a>
                          <a href="/hdd-2t_dm2316.html" title="HDD 2TB" id="js-menu-2316">HDD 2TB</a>
                          <a href="/hdd-4tb_dm2317.html" title="HDD 4TB" id="js-menu-2317">HDD 4TB</a>
                          <a href="/hdd-6tb_dm2343.html" title="HDD 6TB" id="js-menu-2343">HDD 6TB</a>
                          <a href="/hdd-8tb_dm2318.html" title="HDD 8TB" id="js-menu-2318">HDD 8TB</a>
                          <a href="/hdd-10tb-12tb_dm2319.html" title="HDD 10TB - 12TB" id="js-menu-2319">HDD 10TB
                            - 12TB</a>
                          <a href="/hdd-14tb-hdd-18tb_dm2320.html" title="HDD 14 - 18TB" id="js-menu-2320">HDD 14
                            - 18TB</a>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/o-nas-o-cung-luu-tru-mang_dm2274.html" title="Ổ NAS (Ổ cứng lưu trữ mạng)"
                          id="js-menu-2274">Ổ NAS (Ổ
                          cứng lưu trữ mạng)</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/o-cung-chuyen-camera_dm2275.html" title="Ổ cứng chuyên Camera"
                          id="js-menu-2275">Ổ cứng chuyên
                          Camera</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/o-cung-server.html" title="Ổ cứng Server" id="js-menu-2741">Ổ cứng Server</a>
                      </div>
                    </div>
                  </div>
                  <div class="cat-child-items">
                    <a href="/vo-may-tinh-case.html" class="cate-2" title="Case - Vỏ Máy Tính"
                      id="js-menu-1050">Case - Vỏ Máy Tính</a>
                    <div>
                      <div class="cat-child-last">
                        <a href="/vo-case-theo-hang.html" title="Vỏ Case Theo Hãng" id="js-menu-2037">Vỏ Case Theo
                          Hãng</a>
                        <div class="cat-4-list">
                          <a href="/vo-case-asus.html" title="Vỏ Case ASUS" id="js-menu-2066">Vỏ Case ASUS</a>
                          <a href="/vo-case-gigabyte.html" title="Vỏ Case GIGABYTE" id="js-menu-2067">Vỏ Case
                            GIGABYTE</a>
                          <a href="/vo-case-msi.html" title="Vỏ Case MSI" id="js-menu-2068">Vỏ Case MSI</a>
                          <a href="/vo-case-phantek.html" title="Vỏ Case PHANTEK" id="js-menu-2070">Vỏ Case
                            PHANTEK</a>
                          <a href="/cougar.html" title="Vỏ Case COUGAR" id="js-menu-2706">Vỏ Case COUGAR</a>
                          <a href="/vo-case-corsair.html" title="Vỏ Case CORSAIR" id="js-menu-2071">Vỏ Case
                            CORSAIR</a>
                          <a href="/vo-case-nzxt.html" title="Vỏ Case NZXT" id="js-menu-2072">Vỏ Case NZXT</a>
                          <a href="/vo-case-lian-li.html" title="Vỏ Case LIAN-LI" id="js-menu-2073">Vỏ Case
                            LIAN-LI</a>
                          <a href="/vo-case-cooler-master.html" title="Vỏ Case COOLER MASTER" id="js-menu-2074">Vỏ
                            Case
                            COOLER MASTER</a>
                          <a href="/vo-case-deepcool_dm2373.html" title="Vỏ Case DEEPCOOL" id="js-menu-2373">Vỏ
                            Case DEEPCOOL</a>
                          <a href="/vo-case-thermaltake.html" title="Vỏ Case THERMALTAKE" id="js-menu-2075">Vỏ
                            Case THERMALTAKE</a>
                          <a href="/vo-case-xigmatake.html" title="Vỏ Case XIGMATAKE" id="js-menu-2076">Vỏ Case
                            XIGMATAKE</a>
                          <a href="/vo-case-gamemax.html" title="Vỏ Case GAMEMAX" id="js-menu-2077">Vỏ Case
                            GAMEMAX</a>
                          <a href="/vo-case-kenoo.html" title="Vỏ Case KENOO" id="js-menu-2078">Vỏ Case KENOO</a>
                          <a href="/vo-case-xtech.html" title="Vỏ Case XTECH" id="js-menu-2080">Vỏ Case XTECH</a>
                          <a href="/vo-case-sama.html" title="Vỏ Case SAMA" id="js-menu-2081">Vỏ Case SAMA</a>
                          <a href="/vo-case-mik.html" title="Vỏ Case MIK" id="js-menu-2083">Vỏ Case MIK</a>
                          <a href="/jonsbo.html" title="Vỏ Case JONSBO" id="js-menu-2759">Vỏ Case JONSBO</a>
                          <a href="/vo-case-hyte.html" title="Vỏ Case HYTE" id="js-menu-2771">Vỏ Case HYTE</a>
                          <a href="/aigo.html" title="Vỏ Case AIGO" id="js-menu-2805">Vỏ
                            Case AIGO</a>
                          <a href="/kenoo.html" title="Vỏ Case KENOO" id="js-menu-2806">Vỏ Case KENOO</a>
                          <a href="/thermaltake.html" title="Vỏ Case THERMALTAKE" id="js-menu-2807">Vỏ Case
                            THERMALTAKE</a>
                          <a href="/segotep.html-1" title="Vỏ Case SEGOTEP" id="js-menu-2808">Vỏ Case SEGOTEP</a>
                          <a href="/vo-case-hang-khac.html" title="Vỏ Case HÃNG KHÁC" id="js-menu-2082">Vỏ Case
                            HÃNG KHÁC</a>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/vo-case-theo-kich-thuoc.html" title="Kích Thước" id="js-menu-2038">Kích
                          Thước</a>
                        <div class="cat-4-list">
                          <a href="/vo-case-atx-super-tower.html" title="ATX Super Tower" id="js-menu-2043">ATX
                            Super Tower</a>
                          <a href="/vo-case-atx-full-tower.html" title="ATX Full Tower" id="js-menu-2044">ATX Full
                            Tower</a>
                          <a href="/vo-case-atx-mid-tower.html" title="ATX Mid Tower" id="js-menu-2045">ATX Mid
                            Tower</a>
                          <a href="/vo-case-micro-atx.html" title="Micro ATX" id="js-menu-2046">Micro ATX</a>
                          <a href="/vo-case-mini-itx.html" title="Mini ITX" id="js-menu-2047">Mini ITX</a>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/vo-case-theo-chat-lieu.html" title="Chất Liệu" id="js-menu-2039">Chất Liệu</a>
                        <div class="cat-4-list">
                          <a href="/vo-case-bang-thep.html" title="Thép" id="js-menu-2048">Thép</a>
                          <a href="/vo-case-bang-nhom.html" title="Nhôm" id="js-menu-2049">Nhôm</a>
                          <a href="/vo-case-bang-kinh-cuong-luc.html" title="Kính Cường Lực"
                            id="js-menu-2050">Kính Cường Lực</a>
                          <a href="/vo-case-bang-nhua.html" title="Nhựa" id="js-menu-2051">Nhựa</a>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/vo-case-theo-kich-thuoc-mainboard.html" title="Kích Thước Mainboard"
                          id="js-menu-2040">Kích Thước
                          Mainboard</a>
                        <div class="cat-4-list">
                          <a href="/vo-case-theo-kich-thuoc-main-e-atx.html" title="E-ATX"
                            id="js-menu-2052">E-ATX</a>
                          <a href="/vo-case-theo-kich-thuoc-main-atx.html" title="ATX"
                            id="js-menu-2053">ATX</a>
                          <a href="/vo-case-theo-kich-thuoc-main-micro-atx.html" title="Micro ATX"
                            id="js-menu-2054">Micro ATX</a>
                          <a href="/vo-case-theo-kich-thuoc-main-mini-itx.html" title="Mini ITX"
                            id="js-menu-2055">Mini ITX</a>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/vo-case-theo-so-quat-di-kem.html" title="Số Quạt Đi Kèm" id="js-menu-2041">Số
                          Quạt Đi Kèm</a>
                        <div class="cat-4-list">
                          <a href="/vo-case-co-0-fan-di-kem.html" title="0 Fan" id="js-menu-2056">0 Fan</a>
                          <a href="/vo-case-co-1-fan-di-kem.html" title="1 Fan" id="js-menu-2057">1 Fan</a>
                          <a href="/vo-case-co-2-fan-di-kem.html" title="2 Fan" id="js-menu-2058">2 Fan</a>
                          <a href="/vo-case-co-3-fan-di-kem.html" title="3 Fan" id="js-menu-2059">3 Fan</a>
                          <a href="/vo-case-co-4-fan-di-kem.html" title="4 Fan" id="js-menu-2060">4 Fan</a>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/vo-case-theo-mau-sac.html" title="Màu Sắc" id="js-menu-2042">Màu Sắc</a>
                        <div class="cat-4-list">
                          <a href="/vo-case-mau-den.html" title="Đen" id="js-menu-2061">Đen</a>
                          <a href="/vo-case-mau-trang.html" title="Trắng" id="js-menu-2062">Trắng</a>
                          <a href="/vo-case-mau-do.html" title="Đỏ" id="js-menu-2063">Đỏ</a>
                          <a href="/vo-case-mau-hong.html" title="Hồng" id="js-menu-2064">Hồng</a>
                          <a href="/vo-case-mau-xanh.html" title="Xanh" id="js-menu-2065">Xanh</a>
                          <a href="/bac.html" title="Bạc" id="js-menu-2763">Bạc</a>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/vo-case-doc-la.html" title="Vỏ Case Độc Lạ" id="js-menu-2707">Vỏ Case Độc Lạ</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item bg-white" data-id="1052">
              <a href="/man-hinh-may-tinh.html-1" class="pro-cate-1">
                <span class="cat-thumb-item" style="width: 35px;text-align: center">
                  <img src="{{ asset('assets/img/cat/cat_095cb4be732b3d094b1ad78b0577a33a.png') }}"
                    alt="Màn Hình Máy Tính" />
                </span>
                <span class="title" title="Màn Hình Máy Tính"> Màn Hình Máy Tính</span>
              </a>
              <div class="sub-menu no-big-img">
                <div class="cat-child-holder" id="js-menu-container">
                  <div class="cat-child-items">
                    <a href="/man-hinh-may-tinh-theo-hang.html" class="cate-2" title="Màn Hình Theo Hãng"
                      id="js-menu-1690">Màn Hình Theo Hãng</a>
                    <div>
                      <div class="cat-child-last">
                        <a href="/man-hinh-asus_dm1319.html" title="Màn Hình Asus" id="js-menu-1319">Màn Hình
                          Asus</a>
                        <div class="cat-4-list">
                          <a href="/man-hinh-asus-gaming.html" title="Màn Hình Asus Gaming" id="js-menu-2844">Màn
                            Hình Asus
                            Gaming</a>
                          <a href="/man-hinh-asus-do-hoa.html" title="Màn Hình Asus Đồ Họa" id="js-menu-2845">Màn
                            Hình Asus
                            Đồ Họa</a>
                          <a href="/man-hinh-asus-van-phong.html" title="Màn Hình Asus Văn Phòng"
                            id="js-menu-2846">Màn Hình
                            Asus Văn Phòng</a>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/man-hinh-lg_dm1354.html" title="Màn Hình LG" id="js-menu-1354">Màn Hình LG</a>
                        <div class="cat-4-list">
                          <a href="/man-hinh-lg-gaming.html" title="Màn Hình LG Gaming" id="js-menu-2847">Màn Hình
                            LG Gaming</a>
                          <a href="/man-hinh-lg-do-hoa.html" title="Màn Hình LG Đồ Họa" id="js-menu-2848">Màn Hình
                            LG Đồ Họa</a>
                          <a href="/man-hinh-lg-van-phong.html" title="Màn Hình LG Văn Phòng"
                            id="js-menu-2849">Màn Hình LG
                            Văn Phòng</a>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/man-hinh-dell_dm1317.html" title="Màn Hình Dell" id="js-menu-1317">Màn Hình
                          Dell</a>
                        <div class="cat-4-list">
                          <a href="/man-hinh-dell-van-phong.html" title="Màn Hình Dell Văn Phòng"
                            id="js-menu-2850">Màn Hình
                            Dell Văn Phòng</a>
                          <a href="/man-hinh-dell-do-hoa.html" title="Màn Hình Dell Đồ Họa" id="js-menu-2851">Màn
                            Hình Dell
                            Đồ Họa</a>
                          <a href="/man-hinh-dell-gaming.html" title="Màn Hình Dell Gaming" id="js-menu-2852">Màn
                            Hình Dell
                            Gaming</a>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/man-hinh-samsung_dm1318.html" title="Màn Hình SAMSUNG" id="js-menu-1318">Màn
                          Hình SAMSUNG</a>
                        <div class="cat-4-list">
                          <a href="/man-hinh-samsung-gaming.html" title="Màn Hình SAMSUNG Gaming"
                            id="js-menu-2853">Màn Hình
                            SAMSUNG Gaming</a>
                          <a href="/man-hinh-samsung-do-hoa.html" title="Màn Hình SAMSUNG Đồ Họa"
                            id="js-menu-2854">Màn Hình
                            SAMSUNG Đồ Họa</a>
                          <a href="/man-hinh-samsung-van-phong.html" title="Màn Hình SAMSUNG Văn Phòng"
                            id="js-menu-2855">Màn
                            Hình SAMSUNG Văn Phòng</a>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/man-hinh-viewsonic_dm1320.html" title="Màn Hình ViewSonic" id="js-menu-1320">Màn
                          Hình ViewSonic</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/man-hinh-gigabyte_dm1850.html" title="Màn Hình GIGABYTE" id="js-menu-1850">Màn
                          Hình GIGABYTE</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/man-hinh-may-tinh-msi_dm1658.html" title="Màn Hình MSI" id="js-menu-1658">Màn
                          Hình MSI</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/man-hinh-e-dra_dm2211.html" title="Màn Hình EDRA" id="js-menu-2211">Màn Hình
                          EDRA</a>
                        <div class="cat-4-list">
                          <a href="/man-hinh-edra-gaming.html" title="Màn Hình EDRA Gaming" id="js-menu-2886">Màn
                            Hình EDRA
                            Gaming</a>
                          <a href="/man-hinh-edra-do-hoa.html" title="Màn Hình EDRA Đồ Họa" id="js-menu-2887">Màn
                            Hình EDRA
                            Đồ Họa</a>
                          <a href="/man-hinh-edra-van-phong.html" title="Màn Hình EDRA Văn Phòng"
                            id="js-menu-2888">Màn Hình
                            EDRA Văn Phòng</a>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/man-hinh-aoc_dm1423.html" title="Màn Hình AOC" id="js-menu-1423">Màn Hình
                          AOC</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/man-hinh-dahua.html" title="Màn Hình Dahua" id="js-menu-2499">Màn Hình Dahua</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/man-hinh-lenovo_dm1352.html" title="Màn Hình Lenovo" id="js-menu-1352">Màn Hình
                          Lenovo</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/man-hinh-hp_dm1351.html" title="Màn Hình HP" id="js-menu-1351">Màn Hình HP</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/man-hinh-cooler-master_dm1910.html" title="Màn Hình Cooler Master"
                          id="js-menu-1910">Màn Hình Cooler
                          Master</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/man-hinh-philips_dm1395.html" title="Màn Hình Philips" id="js-menu-1395">Màn
                          Hình Philips</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/man-hinh-benq_dm1357.html" title="Màn Hình BenQ" id="js-menu-1357">Màn Hình
                          BenQ</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/man-hinh-acer_dm1433.html" title="Màn Hình Acer" id="js-menu-1433">Màn Hình
                          Acer</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/man-hinh-hkc_dm1599.html" title="Màn Hình HKC" id="js-menu-1599">Màn Hình
                          HKC</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/man-hinh-vsp.html" title="Màn hình VSP" id="js-menu-2766">Màn hình VSP</a>
                      </div>
                    </div>
                  </div>
                  <div class="cat-child-items">
                    <a href="/man-hinh-theo-nhu-cau_dm1692.html" class="cate-2" title="Màn Hình Theo Nhu Cầu"
                      id="js-menu-1692">Màn Hình Theo Nhu
                      Cầu</a>
                    <div>
                      <div class="cat-child-last">
                        <a href="/man-hinh-may-tinh-chuyen-gaming_dm1694.html" title="Màn Hình Gaming"
                          id="js-menu-1694">Màn Hình Gaming</a>
                        <div class="cat-4-list">
                          <a href="/man-hinh-gaming-180hz.html" title="Màn Hình Gaming 180Hz"
                            id="js-menu-2856">Màn Hình
                            Gaming 180Hz</a>
                          <a href="/man-hinh-gaming-240hz.html" title="Màn Hình Gaming 240Hz"
                            id="js-menu-2857">Màn Hình
                            Gaming 240Hz</a>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/man-hinh-may-tinh-ultrawide-sieu-rong_dm1698.html" title="Màn Hình Ultrawide"
                          id="js-menu-1698">Màn Hình
                          Ultrawide</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/man-hinh-may-tinh-oled.html" title="Màn Hình OLED" id="js-menu-2831">Màn Hình
                          OLED</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/man-hinh-may-tinh-van-phong_dm1716.html" title="Màn Hình Văn Phòng"
                          id="js-menu-1716">Màn Hình Văn
                          Phòng</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/man-hinh-may-tinh-chuyen-thiet-ke_dm1695.html" title="Màn Hình Đồ Họa"
                          id="js-menu-1695">Màn Hình Đồ Họa</a>
                        <div class="cat-4-list">
                          <a href="/man-hinh-do-hoa-60hz.html" title="Màn Hình Đồ Họa 60Hz" id="js-menu-2858">Màn
                            Hình Đồ
                            Họa 60Hz</a>
                          <a href="/man-hinh-do-hoa-120hz.html" title="Màn Hình Đồ Họa 120Hz"
                            id="js-menu-2859">Màn Hình Đồ
                            Họa 120Hz</a>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/man-hinh-thong-minh_dm2197.html" title="Màn Hình Thông Minh"
                          id="js-menu-2197">Màn Hình Thông
                          Minh</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/man-hinh-di-dong.html" title="Màn Hình Di Động" id="js-menu-2843">Màn Hình Di
                          Động</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/man-hinh-may-tinh-cong-curved_dm1696.html" title="Màn Hình Cong"
                          id="js-menu-1696">Màn Hình Cong</a>
                        <div class="cat-4-list">
                          <a href="/man-hinh-cong-ips.html" title="Màn Hình Cong IPS" id="js-menu-2860">Màn Hình
                            Cong IPS</a>
                          <a href="/man-hinh-cong-oled.html" title="Màn Hình Cong OLED" id="js-menu-2861">Màn Hình
                            Cong OLED</a>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/man-hinh-usb-type-c_dm1877.html" title="Màn Hình USB Type C"
                          id="js-menu-1877">Màn Hình USB Type
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
                        <a href="/man-hinh-156-inch.html" title="Màn Hình 15.6 inch" id="js-menu-2709">Màn Hình
                          15.6 inch</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/man-hinh-may-tinh-17-inch-21-inch_dm1704.html" title="Màn Hình 17 inch"
                          id="js-menu-1704">Màn Hình 17 inch</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/man-hinh-185-inch.html" title="Màn Hình 18.5 inch" id="js-menu-2490">Màn Hình
                          18.5 inch</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/man-hinh-195-inch.html" title="Màn Hình 19.5 inch" id="js-menu-2468">Màn Hình
                          19.5 inch</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/man-hinh-215-inch.html" title="Màn Hình 21.5 inch" id="js-menu-2469">Màn Hình
                          21.5 inch</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/man-hinh-may-tinh-22-inch-24-inch_dm1705.html" title="Màn Hình 22 inch"
                          id="js-menu-1705">Màn Hình 22 inch</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/man-hinh-23-inch.html" title="Màn Hình 23 inch" id="js-menu-2424">Màn Hình 23
                          inch</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/man-hinh-236-inch.html" title="Màn Hình 23.6 inch" id="js-menu-2466">Màn Hình
                          23.6 inch</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/man-hinh-238-inch.html" title="Màn Hình 23.8 inch" id="js-menu-2467">Màn Hình
                          23.8 inch</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/man-hinh-24-inch.html" title="Màn Hình 24 inch" id="js-menu-2425">Màn Hình 24
                          inch</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/man-hinh-may-tinh-245-inch.html" title="Màn Hình 24.5 inch"
                          id="js-menu-2481">Màn Hình 24.5
                          inch</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/man-hinh-may-tinh-25-inch-27-inch_dm1706.html" title="Màn Hình 25 inch"
                          id="js-menu-1706">Màn Hình 25 inch</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/man-hinh-26-inch.html" title="Màn Hình 26 inch" id="js-menu-2918">Màn Hình 26
                          inch</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/man-hinh-27-inch.html" title="Màn Hình 27 inch" id="js-menu-2427">Màn Hình 27
                          inch</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/man-hinh-may-tinh-28-inch-32-inch_dm1707.html" title="Màn Hình 28 inch"
                          id="js-menu-1707">Màn Hình 28 inch</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/man-hinh-29-inch.html" title="Màn Hình 29 inch" id="js-menu-2428">Màn Hình 29
                          inch</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/man-hinh-30-inch.html" title="Màn Hình 30 inch" id="js-menu-2429">Màn Hình 30
                          inch</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/man-hinh-315-inch.html" title="Màn Hình 31.5 inch" id="js-menu-2470">Màn Hình
                          31.5 inch</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/man-hinh-may-tinh-32-inch-49-inch_dm1708.html" title="Màn Hình 32 inch"
                          id="js-menu-1708">Màn Hình 32 inch</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/man-hinh-tren-32-inch.html" title="Màn Hình Trên 32 inch" id="js-menu-2862">Màn
                          Hình Trên 32 inch</a>
                        <div class="cat-4-list">
                          <a href="/man-hinh-34-inch.html" title="Màn Hình 34 inch" id="js-menu-2431">Màn Hình 34
                            inch</a>
                          <a href="/man-hinh-35-inch.html" title="Màn Hình 35 inch" id="js-menu-2491">Màn Hình 35
                            inch</a>
                          <a href="/man-hinh-375-inch.html" title="Màn Hình 37.5 inch" id="js-menu-2492">Màn Hình
                            37.5 inch</a>
                          <a href="/man-hinh-43-inch.html" title="Màn Hình 43 inch" id="js-menu-2494">Màn Hình 43
                            inch</a>
                          <a href="/man-hinh-48-inch.html" title="Màn Hình 48 inch" id="js-menu-2642">Màn Hình 48
                            inch</a>
                          <a href="/man-hinh-may-tinh-49-inch.html" title="Màn Hình 49 inch" id="js-menu-2480">Màn
                            Hình 49
                            inch</a>
                          <a href="/man-hinh-55-inch.html" title="Màn Hình 55 inch" id="js-menu-2644">Màn Hình 55
                            inch</a>
                          <a href="/man-hinh-45-inch.html" title="Màn Hình 45 inch" id="js-menu-2730">Màn Hình 45
                            inch</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="cat-child-items">
                    <a href="/tan-so-quet-man-hinh.html" class="cate-2" title="Tần Số Quét Màn Hình"
                      id="js-menu-1693">Tần Số Quét Màn Hình</a>
                    <div>
                      <div class="cat-child-last">
                        <a href="/man-hinh-may-tinh-60hz_dm1709.html" title="Màn Hình 60Hz" id="js-menu-1709">Màn
                          Hình 60Hz</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/man-hinh-may-tinh-75hz_dm1710.html" title="Màn Hình 75Hz" id="js-menu-1710">Màn
                          Hình 75Hz</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/man-hinh-may-tinh-100hz_dm1711.html" title="Màn Hình 100Hz"
                          id="js-menu-1711">Màn Hình 100Hz</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/man-hinh-may-tinh-120hz_dm1712.html" title="Màn Hình 120Hz"
                          id="js-menu-1712">Màn Hình 120Hz</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/man-hinh-may-tinh-144hz_dm1713.html" title="Màn Hình 144Hz"
                          id="js-menu-1713">Màn Hình 144Hz</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/man-hinh-152hz.html" title="Màn Hình 152Hz" id="js-menu-2489">Màn Hình 152Hz</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/man-hinh-155hz.html" title="Màn Hình 155Hz" id="js-menu-2711">Màn Hình 155Hz</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/man-hinh-may-tinh-165hz_dm1714.html" title="Màn Hình 165Hz"
                          id="js-menu-1714">Màn Hình 165Hz</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/man-hinh-160hz.html" title="Màn Hình 160Hz" id="js-menu-2742">Màn Hình 160Hz</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/man-hinh-may-tinh-170hz.html" title="Màn Hình 170Hz" id="js-menu-2035">Màn Hình
                          170Hz</a>
                      </div>
                    </div>

                    <div>
                      <div class="cat-child-last">
                        <a href="/man-hinh-185hz.html" title="Màn Hình 185Hz" id="js-menu-2961">Màn Hình 185Hz</a>


                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/man-hinh-180hz.html" title="Màn Hình 180Hz" id="js-menu-2758">Màn Hình 180Hz</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/man-hinh-200hz_dm2210.html" title="Màn Hình 200Hz" id="js-menu-2210">Màn Hình
                          200Hz</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/man-hinh-may-tinh-240hz_dm1715.html" title="Màn Hình 240Hz"
                          id="js-menu-1715">Màn Hình 240Hz</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/man-hinh-250hz.html" title="Màn Hình 250Hz" id="js-menu-2908">Màn Hình 250Hz</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/man-hinh-may-tinh-360hz.html" title="Màn Hình 360Hz" id="js-menu-2036">Màn Hình
                          360Hz</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/man-hinh-380hz.html" title="Màn hình 380Hz" id="js-menu-2737">Màn hình 380Hz</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/man-hinh-400hz.html" title="Màn Hình 400Hz" id="js-menu-2863">Màn Hình 400Hz</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/man-hinh-500hz.html" title="Màn Hình 500Hz" id="js-menu-2864">Màn Hình 500Hz</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/man-hinh-540hz.html" title="Màn Hình 540Hz" id="js-menu-2865">Màn Hình 540Hz</a>
                      </div>
                    </div>
                  </div>
                  <div class="cat-child-items">
                    <a href="/man-hinh-may-tinh-theo-do-phan-giai_dm1699.html" class="cate-2"
                      title="Độ Phân Giải Màn Hình" id="js-menu-1699">Độ Phân Giải Màn
                      Hình</a>
                    <div>
                      <div class="cat-child-last">
                        <a href="/man-hinh-may-tinh-hd_dm1700.html" title="Màn Hình HD (1366x768)"
                          id="js-menu-1700">Màn Hình HD
                          (1366x768)</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/man-hinh-hd-1600x900.html" title="Màn Hình HD+ (1600x900)" id="js-menu-2432">Màn
                          Hình HD+ (1600x900)</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/man-hinh-may-tinh-full-hd_dm1701.html" title="Màn Hình Full HD (1920x1080)"
                          id="js-menu-1701">Màn Hình
                          Full HD (1920x1080)</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/man-hinh-may-tinh-wuxga-1920x1200.html" title="Màn Hình WUXGA (1920x1200)"
                          id="js-menu-2434">Màn Hình
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
                        <a href="/man-hinh-may-tinh-2k-qhd_dm1702.html" title="Màn Hình 2K QHD (2560x1440)"
                          id="js-menu-1702">Màn Hình
                          2K QHD (2560x1440)</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/man-hinh-may-tinh-wqhd-3440x1440.html" title="Màn Hình WQHD (3440x1440)"
                          id="js-menu-2435">Màn Hình
                          WQHD (3440x1440)</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/man-hinh-uqhd-3840-x-1600.html" title="Màn Hình UQHD (3840x1600)"
                          id="js-menu-2493">Màn Hình
                          UQHD (3840x1600)</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/man-hinh-may-tinh-4k-uhd_dm1703.html" title="Màn Hình 4K UHD (3840x2160)"
                          id="js-menu-1703">Màn Hình
                          4K UHD (3840x2160)</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/man-hinh-may-tinh-dualqhd-5120x1440.html" title="Màn Hình DualQHD (5120x1440)"
                          id="js-menu-2436">Màn Hình
                          DualQHD (5120x1440)</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/man-hinh-wqxga-2560-x-1600.html" title="Màn Hình WQXGA (2560 x 1600)"
                          id="js-menu-2646">Màn Hình
                          WQXGA (2560 x 1600)</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/man-hinh-5k-5120x2880.html" title="Màn Hình 5K (5120x2880)"
                          id="js-menu-2800">Màn Hình 5K
                          (5120x2880)</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/man-hinh-duhd-7680-x-2160.html" title="Màn Hình DUHD (7680 x 2160)"
                          id="js-menu-2895">Màn Hình
                          DUHD (7680 x 2160)</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item bg-white" data-id="1255">
              <a href="/gaming-gear.html" class="pro-cate-1">
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
                    <a href="/ban-phim-chuot_dm1293.html" class="cate-2" title="Bàn Phím - Chuột"
                      id="js-menu-1293">Bàn Phím - Chuột</a>
                    <div>
                      <div class="cat-child-last">
                        <a href="/chuot-may-tinh_dm1291.html" title="Chuột Máy Tính" id="js-menu-1291">Chuột Máy
                          Tính</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/chuot-khong-day_dm2367.html" title="Chuột Không Dây" id="js-menu-2367">Chuột
                          Không Dây</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/ban-phim-may-tinh_dm1027.html" title="Bàn phím Máy Tính" id="js-menu-1027">Bàn
                          phím Máy Tính</a>
                      </div>
                    </div>

                    <div>
                      <div class="cat-child-last">
                        <a href="/bo-ban-phim-chuot_dm1292.html" title="Bộ bàn phím - chuột" id="js-menu-1292">Bộ
                          bàn phím - chuột</a>
                      </div>
                    </div>
                  </div>
                  <div class="cat-child-items">
                    <a href="/ban-phim-co-choi-game.html" class="cate-2" title="Bàn phím cơ chơi game"
                      id="js-menu-1257">Bàn phím cơ chơi
                      game</a>
                    <div>
                      <div class="cat-child-last">
                        <a href="/ban-phim-co-gia-re.html" title="Bàn phím cơ giá rẻ" id="js-menu-1494">Bàn phím
                          cơ giá rẻ</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/ban-phim-logitech.html" title="Bàn phím Logitech" id="js-menu-1871">Bàn phím
                          Logitech</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/ban-phim-asus_dm1368.html" title="Bàn phím Asus" id="js-menu-1368">Bàn phím
                          Asus</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/ban-phim-razer.html" title="Bàn phím Razer" id="js-menu-1359">Bàn phím Razer</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/ban-phim-akko.html" title="Bàn phím AKKO" id="js-menu-1755">Bàn phím AKKO</a>


                      </div>
                    </div>

                    <div>
                      <div class="cat-child-last">
                        <a href="/ban-phim-aula.html" title="Bàn phím AULA" id="js-menu-2921">Bàn phím AULA</a>


                      </div>
                    </div>

                    <div>
                      <div class="cat-child-last">
                        <a href="/ban-phim-fuhlen.html" title="Bàn phím Fuhlen" id="js-menu-1493">Bàn phím
                          Fuhlen</a>


                      </div>
                    </div>

                    <div>
                      <div class="cat-child-last">
                        <a href="/ban-phim-e-dra.html" title="Bàn phím E-Dra" id="js-menu-1801">Bàn phím E-Dra</a>


                      </div>
                    </div>

                    <div>
                      <div class="cat-child-last">
                        <a href="/ban-phim-dareu.html" title="Bàn phím DareU" id="js-menu-1887">Bàn phím DareU</a>


                      </div>
                    </div>

                    <div>
                      <div class="cat-child-last">
                        <a href="/ban-phim-fl-esports_dm2329.html" title="Bàn phím FL-Esports"
                          id="js-menu-2329">Bàn phím
                          FL-Esports</a>


                      </div>
                    </div>

                    <div>
                      <div class="cat-child-last">
                        <a href="/ban-phim-corsair.html" title="Bàn phím Corsair" id="js-menu-1362">Bàn phím
                          Corsair</a>


                      </div>
                    </div>

                    <div>
                      <div class="cat-child-last">
                        <a href="/ban-phim-cac-hang-khac_dm1369.html" title="Bàn phím các hãng khác"
                          id="js-menu-1369">Bàn phím các
                          hãng khác</a>


                      </div>
                    </div>

                    <div>
                      <div class="cat-child-last">
                        <a href="/ban-phim-rapoo.html" title="Bàn phím Rapoo" id="js-menu-2643">Bàn phím Rapoo</a>


                      </div>
                    </div>

                  </div>
                  <div class="cat-child-items">
                    <a href="/chuot-choi-game.html" class="cate-2" title="Chuột chơi game"
                      id="js-menu-1256">Chuột chơi game</a>


                    <div>
                      <div class="cat-child-last">
                        <a href="/chuot-logitech.html" title="Chuột Logitech" id="js-menu-1398">Chuột Logitech</a>


                      </div>
                    </div>

                    <div>
                      <div class="cat-child-last">
                        <a href="/chuot-asus.html" title="Chuột Asus" id="js-menu-1376">Chuột Asus</a>


                      </div>
                    </div>

                    <div>
                      <div class="cat-child-last">
                        <a href="/chuot-razer.html" title="Chuột Razer" id="js-menu-1370">Chuột Razer</a>


                      </div>
                    </div>

                    <div>
                      <div class="cat-child-last">
                        <a href="/chuot-pulsar.html" title="Chuột Pulsar" id="js-menu-2645">Chuột Pulsar</a>


                      </div>
                    </div>

                    <div>
                      <div class="cat-child-last">
                        <a href="/chuot-corsair.html" title="Chuột Corsair" id="js-menu-1373">Chuột Corsair</a>


                      </div>
                    </div>

                    <div>
                      <div class="cat-child-last">
                        <a href="/chuot-cac-hang-khac_dm1377.html" title="Chuột các hãng khác"
                          id="js-menu-1377">Chuột các hãng
                          khác</a>


                      </div>
                    </div>

                    <div>
                      <div class="cat-child-last">
                        <a href="/chuot-zowie.html" title="Chuột Zowie" id="js-menu-1641">Chuột Zowie</a>


                      </div>
                    </div>

                    <div>
                      <div class="cat-child-last">
                        <a href="/chuot-akko.html" title="Chuột Akko" id="js-menu-1756">Chuột Akko</a>


                      </div>
                    </div>

                    <div>
                      <div class="cat-child-last">
                        <a href="/chuot-hyperx_dm1875.html" title="Chuột HyperX" id="js-menu-1875">Chuột
                          HyperX</a>


                      </div>
                    </div>

                    <div>
                      <div class="cat-child-last">
                        <a href="/chuot-dareu.html" title="Chuột DareU" id="js-menu-2894">Chuột DareU</a>


                      </div>
                    </div>

                  </div>
                  <div class="cat-child-items">
                    <a href="/tai-nghe-choi-game.html" class="cate-2" title="Tai nghe chơi game"
                      id="js-menu-1258">Tai nghe chơi game</a>
                    <div>
                      <div class="cat-child-last">
                        <a href="/tai-nghe-gaming-gia-re.html" title="Tai nghe Gaming giá rẻ"
                          id="js-menu-1776">Tai nghe Gaming
                          giá rẻ</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/tai-nghe-razer.html" title="Tai nghe Razer" id="js-menu-1378">Tai nghe Razer</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/tai-nghe-asus_dm1383.html" title="Tai nghe Asus" id="js-menu-1383">Tai nghe
                          Asus</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/tai-nghe-kingston.html" title="Tai nghe HyperX" id="js-menu-1380">Tai nghe
                          HyperX</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/tai-nghe-corsair.html" title="Tai nghe Corsair" id="js-menu-1744">Tai nghe
                          Corsair</a>
                      </div>
                    </div>

                    <div>
                      <div class="cat-child-last">
                        <a href="/tai-nghe-logitech.html" title="Tai nghe Logitech" id="js-menu-1748">Tai nghe
                          Logitech</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/tai-nghe-dareu.html" title="Tai nghe DareU" id="js-menu-1891">Tai nghe DareU</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/tai-nghe-e-dra_dm2239.html" title="Tai nghe E-Dra" id="js-menu-2239">Tai nghe
                          E-Dra</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/tai-nghe-cac-hang-khac_dm1384.html" title="Tai nghe các hãng khác"
                          id="js-menu-1384">Tai nghe các
                          hãng khác</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/tai-nghe-astro_dm1689.html" title="Tai nghe Astro" id="js-menu-1689">Tai nghe
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
                    <a href="/ghe-choi-game.html" class="cate-2" title="Ghế chơi game" id="js-menu-1434">Ghế
                      chơi game</a>
                    <div>
                      <div class="cat-child-last">
                        <a href="/ghe-choi-game-gia-re.html" title="Ghế chơi game giá rẻ" id="js-menu-1451">Ghế
                          chơi game giá rẻ</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/ghe-noblechairs.html" title="Ghế NOBLECHAIRS" id="js-menu-1491">Ghế
                          NOBLECHAIRS</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/ghe-dxracer.html" title="Ghế DXRACER" id="js-menu-1436">Ghế DXRACER</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/ghe-akracing.html" title="Ghế AKRACING" id="js-menu-1435">Ghế AKRACING</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/ghe-warrior.html" title="Ghế WARRIOR" id="js-menu-1802">Ghế WARRIOR</a>
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
                        <a href="/ghe-anda-seat.html" title="Ghế ANDA SEAT" id="js-menu-1548">Ghế ANDA SEAT</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/ghe-corsair.html" title="Ghế CORSAIR" id="js-menu-1518">Ghế CORSAIR</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/ghe-soleseat.html" title="Ghế SOLESEAT" id="js-menu-1636">Ghế SOLESEAT</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/ghe-cougar_dm2276.html" title="Ghế COUGAR" id="js-menu-2276">Ghế COUGAR</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/ghe-msi_dm1847.html" title="Ghế MSI" id="js-menu-1847">Ghế MSI</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/ghe-asus_dm1874.html" title="Ghế Asus" id="js-menu-1874">Ghế Asus</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item bg-white" data-id="393">
              <a href="/thiet-bi-luu-tru_dm393.html" class="pro-cate-1">
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
                    <a href="/loa.html" class="cate-2" title="Phân Loại Loa" id="js-menu-2530">Phân Loại Loa</a>
                    <div>
                      <div class="cat-child-last">
                        <a href="/loa-may-tinh_dm1042.html" title="Loa vi tính" id="js-menu-1042">Loa vi tính</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/loa-vi-tinh-tich-hop-bluetooth.html" title="Loa vi tính tích hợp Bluetooth"
                          id="js-menu-2529">Loa vi
                          tính tích hợp Bluetooth</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/loa-di-dong-bluetooth.html" title="Loa di động bluetooth" id="js-menu-2531">Loa
                          di động bluetooth</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/loa-hoi-nghi_dm2273.html" title="Loa hội nghị" id="js-menu-2273">Loa hội
                          nghị</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/loa-tro-giang.html" title="Loa trợ giảng" id="js-menu-2532">Loa trợ giảng</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/loa-keo-karaoke.html" title="Loa kéo Karaoke" id="js-menu-2533">Loa kéo
                          Karaoke</a>
                      </div>
                    </div>
                  </div>
                  <div class="cat-child-items">
                    <a href="/kieu-loa.html" class="cate-2" title="Kiểu Loa" id="js-menu-2536">Kiểu Loa</a>
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
                        <a href="/soundbar.html" title="Soundbar" id="js-menu-2543">Soundbar</a>
                      </div>
                    </div>
                  </div>
                  <div class="cat-child-items">
                    <a href="/kieu-theo-hang.html" class="cate-2" title="Loa theo hãng" id="js-menu-2534">Loa
                      theo hãng</a>
                    <div>
                      <div class="cat-child-last">
                        <a href="/loa-logitech_dm1803.html" title="Loa LOGITECH" id="js-menu-1803">Loa
                          LOGITECH</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/loa-microlab_dm1805.html" title="Loa MICROLAB" id="js-menu-1805">Loa
                          MICROLAB</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/loa-edifier.html" title="Loa EDIFIER" id="js-menu-2546">Loa EDIFIER</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/loa-creative_dm1806.html" title="Loa CREATIVE" id="js-menu-1806">Loa
                          CREATIVE</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/loa-klipsch.html" title="loa KLIPSCH" id="js-menu-2547">loa KLIPSCH</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/loa-marshall.html" title="Loa Marshall" id="js-menu-2548">Loa Marshall</a>
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
                        <a href="/loa-audioengine.html" title="Loa Audioengine" id="js-menu-2550">Loa
                          Audioengine</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/loa-soundmax_dm1804.html" title="Loa SoundMax" id="js-menu-1804">Loa
                          SoundMax</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/loa-hang-khac_dm1807.html" title="Loa hãng khác" id="js-menu-1807">Loa hãng
                          khác</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/loa-soundmax.html" title="Loa SOUNDMAX" id="js-menu-2916">Loa SOUNDMAX</a>
                      </div>
                    </div>
                  </div>
                  <div class="cat-child-items">
                    <a href="/webcam_dm1181.html" class="cate-2" title="Webcam" id="js-menu-1181">Webcam</a>
                    <div>
                      <div class="cat-child-last">
                        <a href="/webcam-logitech_dm2226.html" title="Webcam Logitech" id="js-menu-2226">Webcam
                          Logitech</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/webcam-asus_dm2221.html" title="Webcam Asus" id="js-menu-2221">Webcam Asus</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/webcam-thronmax_dm2228.html" title="Webcam Thronmax" id="js-menu-2228">Webcam
                          Thronmax</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/webcam-hikvsion_dm2225.html" title="Webcam Hikvsion" id="js-menu-2225">Webcam
                          Hikvsion</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/webcam-rapoo_dm2238.html" title="Webcam Rapoo" id="js-menu-2238">Webcam
                          Rapoo</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/webcam-dahua_dm2222.html" title="Webcam Dahua" id="js-menu-2222">Webcam
                          Dahua</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/webcam-genius_dm2223.html" title="Webcam Genius" id="js-menu-2223">Webcam
                          Genius</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/webcam-e-dra_dm2224.html" title="Webcam E-Dra" id="js-menu-2224">Webcam
                          E-Dra</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/webcam-razer_dm2227.html" title="Webcam Razer" id="js-menu-2227">Webcam
                          Razer</a>
                      </div>
                    </div>
                  </div>
                  <div class="cat-child-items">
                    <a href="/Tivi_dm1264.html" class="cate-2" title="Tivi Led - Smart Tivi - Tivi LCD"
                      id="js-menu-1264">Tivi Led -
                      Smart Tivi - Tivi LCD</a>
                    <div>
                      <div class="cat-child-last">
                        <a href="/sony_dm1299.html" title="Sony" id="js-menu-1299">Sony</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/samsung_dm1300.html" title="Samsung" id="js-menu-1300">Samsung</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/lg_dm1301.html" title="LG" id="js-menu-1301">LG</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/panasonic_dm1302.html" title="Panasonic" id="js-menu-1302">Panasonic</a>
                      </div>
                    </div>
                  </div>
                  <div class="cat-child-items">
                    <a href="/tai-nghe_dm1180.html" class="cate-2" title="Tai nghe" id="js-menu-1180">Tai
                      nghe</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="item bg-white" data-id="397">
              <a href="/cooling-tan-nhiet_dm397.html" class="pro-cate-1">
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
                        <a href="/bo-tan-nhiet-nuoc-custom_dm1389.html" title="Bộ tản nước Custom"
                          id="js-menu-1389">Bộ tản nước
                          Custom</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/tan-nhiet-nuoc-ekwb-made-in-eu_dm1520.html" title="Tản nhiệt nước EKWB"
                          id="js-menu-1520">Tản nhiệt nước
                          EKWB</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/tan-nhiet-nuoc-barrow_dm1521.html" title="Tản nhiệt nước Barrow"
                          id="js-menu-1521">Tản nhiệt nước
                          Barrow</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/tan-nhiet-nuoc-bykski_dm1522.html" title="Tản nhiệt nước Bykski"
                          id="js-menu-1522">Tản nhiệt nước
                          Bykski</a>
                      </div>
                    </div>

                    <div>
                      <div class="cat-child-last">
                        <a href="/tan-nhiet-nuoc-cac-hang_dm1540.html" title="Tản nhiệt nước các hãng"
                          id="js-menu-1540">Tản nhiệt nước
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
                        <a href="/tan-nhiet-nuoc-asus_dm1878.html" title="Tản nhiệt nước Asus"
                          id="js-menu-1878">Tản nhiệt nước
                          Asus</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/tan-nhiet-nuoc-gigabyte_dm1911.html" title="Tản nước Gigabyte"
                          id="js-menu-1911">Tản nước
                          Gigabyte</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/tan-nhiet-nuoc-msi_dm1912.html" title="Tản nhiệt nước MSI" id="js-menu-1912">Tản
                          nhiệt nước MSI</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/tan-nhiet-nuoc-corsair_dm1523.html" title="Tản nước Corsair"
                          id="js-menu-1523">Tản nước Corsair</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/tan-nhiet-nuoc-nzxt_dm1524.html" title="Tản nhiệt nước NZXT"
                          id="js-menu-1524">Tản nhiệt nước
                          NZXT</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/tan-nhiet-nuoc-deepcool_dm1525.html" title="Tản nhiệt nước DeepCool"
                          id="js-menu-1525">Tản nhiệt nước
                          DeepCool</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/tan-nhiet-nuoc-id-cooling_dm1526.html" title="Tản nhiệt nước ID-Cooling"
                          id="js-menu-1526">Tản nhiệt
                          nước ID-Cooling</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/tan-nhiet-nuoc-coolermaster_dm1527.html" title="Tản nước CoolerMaster"
                          id="js-menu-1527">Tản nước
                          CoolerMaster</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/tan-nhiet-nuoc-xigmatek_dm1601.html" title="Tản nhiệt nước Xigmatek"
                          id="js-menu-1601">Tản nhiệt nước
                          Xigmatek</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/tan-nhiet-nuoc-thermaltake_dm1729.html" title="Tản nước Thermaltake"
                          id="js-menu-1729">Tản nước
                          Thermaltake</a>
                      </div>
                    </div>

                    <div>
                      <div class="cat-child-last">
                        <a href="/tan-nhiet-nuoc-sama.html" title="Tản nhiệt nước SAMA" id="js-menu-2743">Tản
                          nhiệt nước SAMA</a>


                      </div>
                    </div>

                    <div>
                      <div class="cat-child-last">
                        <a href="/tan-nhiet-nuoc-lian-li.html" title="Tản nhiệt nước Lian Li"
                          id="js-menu-2735">Tản nhiệt nước
                          Lian Li</a>


                      </div>
                    </div>

                    <div>
                      <div class="cat-child-last">
                        <a href="/tan-nhiet-nuoc-thermalright_dm2350.html" title="Tản nước Thermalright"
                          id="js-menu-2350">Tản nước
                          Thermalright</a>


                      </div>
                    </div>

                    <div>
                      <div class="cat-child-last">
                        <a href="/tan-nhiet-nuoc-jonsbo.html" title="Tản nhiệt nước JONSBO" id="js-menu-2760">Tản
                          nhiệt nước JONSBO</a>


                      </div>
                    </div>

                    <div>
                      <div class="cat-child-last">
                        <a href="/tan-nhiet-nuoc-segotep.html" title="Tản nhiệt nước Segotep"
                          id="js-menu-2802">Tản nhiệt nước
                          Segotep</a>


                      </div>
                    </div>

                    <div>
                      <div class="cat-child-last">
                        <a href="/tan-nhiet-nuoc-cac-hang_dm1528.html" title="Tản nhiệt nước các hãng"
                          id="js-menu-1528">Tản nhiệt nước
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
                        <a href="/tan-nhiet-khi-id-cooling_dm1530.html" title="Tản nhiệt khí ID-Cooling"
                          id="js-menu-1530">Tản nhiệt khí
                          ID-Cooling</a>


                      </div>
                    </div>

                    <div>
                      <div class="cat-child-last">
                        <a href="/tan-nhiet-khi-coolermaster_dm1531.html" title="Tản khí CoolerMaster"
                          id="js-menu-1531">Tản khí
                          CoolerMaster</a>


                      </div>
                    </div>

                    <div>
                      <div class="cat-child-last">
                        <a href="/tan-nhiet-khi-deepcool_dm1529.html" title="Tản nhiệt khí DeepCool"
                          id="js-menu-1529">Tản nhiệt khí
                          DeepCool</a>


                      </div>
                    </div>

                    <div>
                      <div class="cat-child-last">
                        <a href="/tan-nhiet-khi-gamemax_dm1766.html" title="Tản nhiệt khí Gamemax"
                          id="js-menu-1766">Tản nhiệt khí
                          Gamemax</a>


                      </div>
                    </div>

                    <div>
                      <div class="cat-child-last">
                        <a href="/tan-nhiet-khi-noctua_dm1881.html" title="Tản nhiệt khí Noctua"
                          id="js-menu-1881">Tản nhiệt khí
                          Noctua</a>


                      </div>
                    </div>

                    <div>
                      <div class="cat-child-last">
                        <a href="/tan-khi-thermalright_dm1882.html" title="Tản khí Thermalright"
                          id="js-menu-1882">Tản khí
                          Thermalright</a>


                      </div>
                    </div>

                    <div>
                      <div class="cat-child-last">
                        <a href="/tan-nhiet-khi-jonsbo.html" title="Tản nhiệt khí JONSBO" id="js-menu-2761">Tản
                          nhiệt khí JONSBO</a>


                      </div>
                    </div>

                    <div>
                      <div class="cat-child-last">
                        <a href="/tan-nhiet-khi-segotep.html" title="Tản nhiệt khí Segotep" id="js-menu-2803">Tản
                          nhiệt khí Segotep</a>


                      </div>
                    </div>

                    <div>
                      <div class="cat-child-last">
                        <a href="/tan-nhiet-khi-xigmatek.html" title="Tản nhiệt khí Xigmatek"
                          id="js-menu-2817">Tản nhiệt khí
                          Xigmatek</a>


                      </div>
                    </div>

                    <div>
                      <div class="cat-child-last">
                        <a href="/tan-nhiet-khi-cac-hang_dm1532.html" title="Tản nhiệt khí các hãng"
                          id="js-menu-1532">Tản nhiệt khí
                          các hãng</a>
                      </div>
                    </div>
                  </div>

                  <div class="cat-child-items">
                    <a href="/quat-tan-nhiet_dm1519.html" class="cate-2" title="Quạt tản nhiệt"
                      id="js-menu-1519">Quạt tản nhiệt</a>
                    <div>
                      <div class="cat-child-last">
                        <a href="/quat-asus_dm1870.html" title="Quạt Asus" id="js-menu-1870">Quạt Asus</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/quat-tan-nhiet-nzxt_dm1534.html" title="Quạt NZXT" id="js-menu-1534">Quạt
                          NZXT</a>
                      </div>
                    </div>

                    <div>
                      <div class="cat-child-last">
                        <a href="/quat-tan-nhiet-corsair_dm1533.html" title="Quạt Corsair" id="js-menu-1533">Quạt
                          Corsair</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/quat-tan-nhiet-thermaltake_dm1730.html" title="Quạt Thermaltake"
                          id="js-menu-1730">Quạt Thermaltake</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/quat-tan-nhiet-cooler-master_dm1746.html" title="Quạt Cooler Master"
                          id="js-menu-1746">Quạt Cooler
                          Master</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/quat-tan-nhiet-deepcool_dm1764.html" title="Quạt tản nhiệt Deepcool"
                          id="js-menu-1764">Quạt tản nhiệt
                          Deepcool</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/quat-xigmatek_dm1765.html" title="Quạt Xigmatek" id="js-menu-1765">Quạt
                          Xigmatek</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/quat-jonsbo.html" title="Quạt JONSBO" id="js-menu-2762">Quạt JONSBO</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/quat-lian-li.html" title="Quạt Lian Li" id="js-menu-2964">Quạt Lian Li</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/quat-id-cooling.html" title="Quạt ID Cooling" id="js-menu-2965">Quạt ID
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
                    <a href="/keo-tan-nhiet.html" class="cate-2" title="Keo Tản Nhiệt" id="js-menu-2819">Keo Tản
                      Nhiệt</a>
                    <div>
                      <div class="cat-child-last">
                        <a href="/keo-coolermaster.html" title="Keo CoolerMaster" id="js-menu-2820">Keo
                          CoolerMaster</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/keo-noctua.html" title="Keo Noctua" id="js-menu-2821">Keo Noctua</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/keo-arctic.html" title="Keo Arctic" id="js-menu-2822">Keo Arctic</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/keo-corsair.html" title="Keo Corsair" id="js-menu-2823">Keo Corsair</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/keo-thermal-grizzly.html" title="Keo Thermal Grizzly" id="js-menu-2824">Keo
                          Thermal Grizzly</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/keo-thermalright.html" title="Keo Thermalright" id="js-menu-2825">Keo
                          Thermalright</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item bg-white" data-id="2112">
              <a href="/phu-kien-laptop-pc-khac.html" class="pro-cate-1">
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
                    <a href="/linh-kien-mtxt_dm1022.html" class="cate-2" title="Linh kiện Laptop"
                      id="js-menu-1022">Linh kiện Laptop</a>
                    <div>
                      <div class="cat-child-last">
                        <a href="/hdd-laptop_dm1135.html" title="HDD Laptop" id="js-menu-1135">HDD Laptop</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/ram-laptop.html" title="Ram Laptop" id="js-menu-1136">Ram Laptop</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/sac-pin-laptop-adapter_dm1174.html" title="Sạc Laptop" id="js-menu-1174">Sạc
                          Laptop</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/ssd-laptop_dm1909.html" title="SSD Laptop" id="js-menu-1909">SSD Laptop</a>
                      </div>
                    </div>
                  </div>
                  <div class="cat-child-items">
                    <a href="/thiet-bi-chuyen-doi.html" class="cate-2" title="Thiết bị chuyển đổi"
                      id="js-menu-2123">Thiết bị chuyển đổi</a>
                    <div>
                      <div class="cat-child-last">
                        <a href="/tu-usb-sang-cac-loai.html" title="Từ USB Sang Các Loại" id="js-menu-2135">Từ USB
                          Sang Các Loại</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/tu-hdmi-sang-cac-loai.html" title="Từ HDMI Sang Các Loại" id="js-menu-2136">Từ
                          HDMI Sang Các Loại</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/tu-mini-displayport-sang-cac-loai.html" title="Từ Mini Displayport Sang Các Loại"
                          id="js-menu-2137">Từ
                          Mini Displayport Sang Các Loại</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/tu-type-c-sang-cac-loai.html" title="Từ Type C Sang Các Loại"
                          id="js-menu-2138">Từ Type C Sang
                          Các Loại</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/tu-dvi-sang-cac-loai.html" title="Từ DVI Sang Các Loại" id="js-menu-2140">Từ DVI
                          Sang Các Loại</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/tu-displayport-sang-cac-loai.html" title="Từ Displayport Sang Các Loại"
                          id="js-menu-2141">Từ
                          Displayport Sang Các Loại</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/tu-vga-sang-cac-loai.html" title="Từ VGA Sang Các Loại" id="js-menu-2139">Từ VGA
                          Sang Các Loại</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/thiet-bi-chuyen-doi-khac.html" title="Thiết Bị Chuyển Đổi Khác"
                          id="js-menu-2142">Thiết Bị
                          Chuyển Đổi Khác</a>
                      </div>
                    </div>
                  </div>
                  <div class="cat-child-items">
                    <a href="/sac-du-phong_dm1289.html" class="cate-2" title="Sạc dự phòng"
                      id="js-menu-1289">Sạc dự phòng</a>
                    <div>
                      <div class="cat-child-last">
                        <a href="/sac-du-phong-xiaomi.html" title="Sạc Dự Phòng Xiaomi" id="js-menu-2502">Sạc Dự
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
                        <a href="/cap-displayport.html" title="Cáp Displayport" id="js-menu-2127">Cáp
                          Displayport</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/cap-chuyen-doi-cac-loai.html" title="Cáp Chuyển Đổi Các Loại"
                          id="js-menu-2129">Cáp Chuyển Đổi
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
                        <a href="/cap-nguon-cac-loai.html" title="Cáp nguồn các loại" id="js-menu-2133">Cáp nguồn
                          các loại</a>
                      </div>
                    </div>
                    <div>
                      <div class="cat-child-last">
                        <a href="/cap-am-thanh.html" title="Cáp Âm Thanh" id="js-menu-2132">Cáp Âm Thanh</a>
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
        <div class="menu-text-right d-flex align-items-center justify-content-between font-weight-light text-13">
          <a href="#" target="_blank" class="header-history"> Sản phẩm bạn đã xem </a>
          <a href="{{ route('pages.flash-sale') }}"> <img
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
                  <a href="https://zalo.me/0981.335.989" target="_blank" rel="nofollow">Hotline
                    3 - 0966.45.45.03</a>
                  <a href="https://zalo.me/0981.335.989" target="_blank" rel="nofollow">Hotline
                    4 - 0931.678.056</a>
                </div>
              </div>
              <div class="col-item">
                <p class="title">Khách hàng Showroom Hà Nội</p>
                <div class="support-list">
                  <div class="item-left">
                    <div class="support-box">
                      <p class="box-title">◆ 49 Thái Hà</p>
                      <a href="https://zalo.me/0918.557.006" target="_blank" rel="nofollow">Hotline -
                        0918.557.006</a>
                    </div>
                    <div class="support-box">
                      <p class="box-title">◆ 151 Lê Thanh Nghị</p>
                      <a href="https://zalo.me/0983.94.9987" target="_blank" rel="nofollow">Hotline -
                        0983.94.9987</a>
                    </div>
                  </div>
                  <div class="item-right">
                    <div class="support-box">
                      <p class="box-title">◆ 63 Trần Thái Tông</p>
                      <a href="https://zalo.me/0862.136.488" target="_blank" rel="nofollow">Hotline -
                        0862.136.488</a>
                    </div>
                    <div class="support-box">
                      <p class="box-title">◆ Bắc Ninh</p>
                      <a href="https://zalo.me/0972.166.640" target="_blank" rel="nofollow">Hotline -
                        0972.166.640</a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-item">
                <p class="title">Khách hàng Showroom TP.HCM</p>
                <div class="support-list">
                  <div class="item-left">
                    <div class="support-box">
                      <p class="box-title">◆158-160 Lý Thường Kiệt</p>
                      <a href="https://zalo.me/0917.948.081" target="_blank" rel="nofollow">Hotline -
                        0917.948.081</a>
                    </div>
                  </div>
                  <div class="item-right">
                    <div class="support-box">
                      <p class="box-title">◆ 330-332 Võ Văn Tần</p>
                      <a href="https://zalo.me/0931.105.498" target="_blank" rel="nofollow">Hotline -
                        0931.105.498</a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-item">
                <p class="title">Khách hàng Doanh nghiệp - Dự án</p>

                <div class="support-list">
                  <div class="support-box">
                    <p class="box-title">◆ Hà Nội</p>

                    <a href="https://zalo.me/0919.917.001" target="_blank" rel="nofollow">Hotline -
                      0919.917.001</a>
                    <a href="https://zalo.me/0904.155.568" target="_blank" rel="nofollow">Hotline -
                      0904.155.568</a>
                  </div>

                  <div class="support-box">
                    <p class="box-title">◆ TP. HCM</p>

                    <a href="https://zalo.me/0901.118.414" target="_blank" rel="nofollow">Hotline -
                      0901.118.414</a>
                    <a href="https://zalo.me/0909.143.970" target="_blank" rel="nofollow">Hotline -
                      0909.143.970</a>
                  </div>
                </div>
              </div>
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

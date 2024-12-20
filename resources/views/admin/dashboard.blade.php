@extends('admin.app')

@section('content')
    <main class="app-content">
        <div class="row">
            <div class="col-md-12">
                <div class="app-title">
                    <ul class="app-breadcrumb breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><b>Dashboard</b></a></li>
                    </ul>
                    <div id="clock"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <!--Left-->
            <div class="col-md-12 col-lg-6">
                <div class="row">
                    <!-- col-6 -->
                    <div class="col-md-6">
                        <div class="widget-small primary coloured-icon"><i class='icon bx bxs-user-account fa-3x'></i>
                            <div class="info">
                                <h4>Tổng khách hàng</h4>
                                <p><b>132 khách hàng</b></p>
                                <p class="info-tong">Tổng số khách hàng được quản lý.</p>
                            </div>
                        </div>
                    </div>
                    <!-- col-6 -->
                    <div class="col-md-6">
                        <div class="widget-small info coloured-icon"><i class='icon bx bxs-data fa-3x'></i>
                            <div class="info">
                                <h4>Tổng sản phẩm</h4>
                                <p><b>198 sản phẩm</b></p>
                                <p class="info-tong">Tổng số sản phẩm được quản lý.</p>
                            </div>
                        </div>
                    </div>
                    <!-- col-6 -->
                    <div class="col-md-6">
                        <div class="widget-small warning coloured-icon"><i class='icon bx bxs-shopping-bags fa-3x'></i>
                            <div class="info">
                                <h4>Tổng đơn hàng</h4>
                                <p><b>247 đơn hàng</b></p>
                                <p class="info-tong">Tổng số hóa đơn bán hàng trong tháng.</p>
                            </div>
                        </div>
                    </div>
                    <!-- col-6 -->
                    <div class="col-md-6">
                        <div class="widget-small danger coloured-icon"><i class='icon bx bxs-error-alt fa-3x'></i>
                            <div class="info">
                                <h4>Sắp hết hàng</h4>
                                <p><b>4 sản phẩm</b></p>
                                <p class="info-tong">Số sản phẩm cảnh báo hết cần nhập thêm.</p>
                            </div>
                        </div>
                    </div>
                    <!-- col-12 -->
                    <div class="col-md-12">
                        <div class="tile">
                            <h3 class="tile-title">Tình trạng đơn hàng</h3>
                            <div>
                                <img src="/assets/img/AI/ty_le_trang_thai_don_hang.png" alt="Dự đoán doanh số"
                                    style="max-width: 100%; height: auto; display: inline-block;" />
                            </div>
                            <!-- / div trống-->
                        </div>
                    </div>
                    <!-- / col-12 -->
                    <!-- col-12 -->
                    <div class="col-md-12">
                        <div class="tile">
                            <h3 class="tile-title">Khách hàng mới</h3>
                            <div>
                                <img src="/assets/img/AI/ty_le_khach_hang.png" alt="Dự đoán doanh số"
                                    style="max-width: 100%; height: auto; display: inline-block;" />
                            </div>

                        </div>
                    </div>
                    <!-- / col-12 -->
                </div>
            </div>
            <!--END left-->
            <!--Right-->
            <div class="col-md-12 col-lg-6">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tile">
                            <h3 class="tile-title">Doanh số sản phẩm bán chạy nhất</h3>
                            <div class="embed-responsive embed-responsive-16by9">
                                <img class="embed-responsive-item" src="/assets/img/AI/san_pham_ban_chay_nhat.png"
                                    alt="Dự đoán doanh số">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="tile">
                            <h3 class="tile-title">Doanh số sản phẩm bán ra theo tuần</h3>
                            <div class="embed-responsive embed-responsive-16by9">
                                <img class="embed-responsive-item" src="/assets/img/AI/doanh_thu_theo_tuan.png"
                                    alt="Dự đoán doanh số">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            @stack('scripts')
            <script></script>
        </div>
    </main>
@endsection

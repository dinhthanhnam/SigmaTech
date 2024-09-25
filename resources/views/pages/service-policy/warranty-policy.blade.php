@extends('layouts.app')

@section('warranty-policy')
    <div class="container">
        <div id="breadcrumb">
            <ol class="ul clearfix" itemscope="" itemtype="http://schema.org/BreadcrumbList">
                <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                    <a href="/" itemprop="item" class="nopad-l">
                        <span itemprop="name"><i class="fa fa-home"></i> <span style="font-size: 0px">trang
                                chủ</span></span>
                    </a>
                    <meta itemprop="position" content="1">
                </li>

                <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                    <a href="" itemprop="item" class="nopad-l">
                        <span itemprop="name">
                            <h1>Chính sách Bảo hành</h1>
                        </span>
                    </a>
                    <meta itemprop="position" content="2">
                </li>
            </ol>
        </div>

        <div id="static-page">
            <div class="left-side">
                <div class="static-page-box-left">
                    <div class="title-box">Thông tin chung</div>
                    <div class="content-box">
                        {{-- <a href="/huong-dan-dat-hang.html">Hướng dẫn mua hàng online</a>
                    <a href="/mua-tra-gop.html">Hướng dẫn mua trả góp</a>
                    
                    <a href="/chinh-sach-bao-mat.html">Chính sách bảo mật</a>
                    <a href="/cach-thuc-thanh-toan.html">Hình thức thanh toán</a> --}}
                        <a href="{{ route('pages.shipping-policy') }}">Chính sách giao hàng</a>
                        <a href="{{ route('pages.warranty-policy') }} ">Bảo hành - đổi trả</a>
                        <!---<a href="/chinh-sach-game-net.html">Chính sách game net</a>-->
                        {{-- <a href="https://www.anphatpc.com.vn/phong-du-an-va-khach-hang-doanh-nghiep.html">Hỗ trợ khách hàng
                        Dự án - Doanh nghiệp</a> --}}
                    </div>
                </div><!--static-page-box-left-->
            </div><!--left-side-->

            <div class="right-side">
                <h1 class="title-page"></h1>
                <div class="divtin">
                    <p style="text-align: center; line-height: normal; border: none; padding: 0in;"><span
                            style="font-family: arial, helvetica, sans-serif; font-size: 24pt;"><strong>TRUNG TÂM BẢO HÀNH
                                VÀ
                                DỊCH VỤ KHÁCH HÀNG</strong></span></p>
                    <p style="text-align: center; line-height: normal; border: none; padding: 0in;">&nbsp;</p>
                    <p style="text-align: center; line-height: normal; border: none; padding: 0in;"><span
                            style="font-family: arial, helvetica, sans-serif; font-size: 14pt;"><strong><span
                                    style="color: #3366ff;">A. CHÍNH SÁCH ĐỔI TRẢ VÀ BẢO HÀNH:</span></strong></span></p>
                    <p style="text-align: center; line-height: normal; border: none; padding: 0in;"><span
                            style="font-size: 12pt;">&nbsp;</span></p>
                    <p style="line-height: normal;"><span
                            style="font-family: arial, helvetica, sans-serif; font-size: 12pt;"><strong><span
                                    style="color: #3366ff;"><span style="font-size: 14pt;">I. CHÍNH SÁCH ĐỔI TRẢ
                                        MỚI:&nbsp;</span><br> </span></strong></span></p>
                    <p><strong><span style="font-size: 12pt;">I.1. Đổi trả trong 15 ngày:</span></strong><br><span
                            style="font-size: 12pt;">- Sản phẩm mới mua trong vòng 15 ngày, nếu bị lỗi kỹ thuật do nhà sản
                            xuất
                            sẽ được đổi mới luôn ngay lập tức.</span><br><span style="font-size: 12pt;">- Không áp dụng với
                            Máy
                            in, Máy fax, Máy chiếu, Máy photocopy, các sản phẩm bán nguyên seal, các thiết bị tiêu hao và
                            các
                            sản phẩm của Apple ( macbook , imac, ipad, iphone)</span><br><strong><span
                                style="font-size: 12pt;">I.2. Đổi trả linh kiện trong 30 ngày: </span></strong><br><span
                            style="font-size: 12pt;">- Sản phẩm linh kiện máy tính lắp ráp mới mua trong vòng 30 ngày, nếu
                            bị
                            lỗi kỹ thuật do nhà sản xuất sẽ được đổi mới luôn ngay lập tức.</span></p>
                    <p style="text-align: center;"><br><span style="font-size: 14pt;"><strong>ĐIỀU KIỆN ĐỔI TRẢ
                                HÀNG:</strong></span></p>
                    <p style="text-align: left;"><span style="font-size: 12pt;">+ Không vi phạm các điều kiện bảo hành hay
                            lỗi
                            hình thức như xước, móp méo, ố vàng, mờ chữ, nứt, vỡ, vết chữ không tẩy được…</span><br><span
                            style="font-size: 12pt;">+ Hàng phải còn đầy đủ vỏ hộp, sách hướng dẫn, phiếu bảo hành, hóa đơn,
                            đĩa
                            cài đặt (nếu có) và các phụ kiện đi kèm.</span><br><span style="font-size: 12pt;">+ Đối với các
                            trường hợp nhập lại: nếu sản phẩm đã được công ty An Phát viết hóa đơn tài chính, khách hàng
                            muốn
                            trả lại hàng hóa phải viết lại hóa đơn tài chính hoặc làm thủ tục hủy hóa đơn này theo quy định
                            của
                            pháp luật.</span><br><span style="font-size: 12pt;">+ Sau thời gian trên hoặc những trường hợp
                            không
                            đủ điều kiện đổi hàng thì tất cả các sản phẩm sẽ được bảo hành theo chính sách chung của Hãng,
                            NCC
                            và công ty An Phát.</span></p>
                    <p style="text-align: left;">&nbsp;</p>
                    <p><span style="color: #3366ff; font-size: 14pt;"><strong>II. CHÍNH SÁCH BẢO HÀNH CHUNG:</strong></span>
                    </p>
                    <p><span style="font-size: 12pt;">- Thời gian bảo hành sản phẩm trung bình 07 ngày làm việc (Không tính
                            thứ
                            07, chủ nhật và ngày lễ). Sản phẩm bảo hành xong trước 07 ngày An Phát sẽ báo cho khách hàng,
                            muộn
                            hơn 07 ngày An Phát sẽ báo cho khách hàng thời gian cụ thể.</span><br><span
                            style="font-size: 12pt;">- Trong thời gian bảo hành An Phát sẽ cho khách hàng mượn sản phẩm
                            tương
                            ứng để dùng trong thời gian chờ bảo hành (nếu có)</span><br><span style="font-size: 12pt;">-
                            Trong
                            trường hợp sản phẩm Quý khách gửi không còn hàng, An Phát sẽ đổi trả sản phẩm tương đương hoặc
                            nhập
                            lại theo giá thỏa thuận.</span><br><span style="font-size: 12pt;">- Nhận kiểm tra xác định lỗi
                            miễn
                            phí cho khách hàng không mua tại An Phát</span></p>
                    <p><br><span style="color: #3366ff; font-size: 14pt;"><strong>III. CHÍNH SÁCH BẢO HÀNH KHỐI DOANH
                                NGHIỆP:</strong></span></p>
                    <p><span style="font-size: 12pt;">- Bảo hành 12 tháng đầu tại nơi sử dung, không tính số lượng đến,
                            trong
                            bán kính 20km tính từ công ty An Phát (Ngoài bán kính 20km thì thỏa thuận giữa công ty An Phát
                            và
                            Quý khách hàng)</span><br><span style="font-size: 12pt;">- Cho mượn sản phẩm dùng tạm trong thời
                            gian chờ hàng bảo hành tại công ty.</span><br><span style="font-size: 12pt;">- Nếu sản phẩm hết
                            bảo
                            hành, An Phát sẽ qua kiểm tra và xác định lỗi cho khách hàng miễn phí.</span></p>
                    <p>&nbsp;</p>
                    <p><span style="font-size: 14pt;"><strong><span style="color: #3366ff;">IV. CHÍNH SÁCH BẢO HÀNH TẠI
                                    CHỖ:</span></strong></span></p>
                    <p><span style="font-size: 12pt;">- Miễn phí 20km tính từ Trung tâm bảo hành (ngoài 20km thỏa thuận giữa
                            công ty An Phát và khách hàng).</span><br><span style="font-size: 12pt;">- Bảo hành miễn phí cho
                            khách hàng cá nhận mua bộ PC, Máy in trong 30 ngày đầu tại nơi sử dung.</span><br><span
                            style="font-size: 12pt;">- TTBH An Phát chỉ bảo hành phần cứng, không bảo hành phần mềm và dữ
                            liệu
                            của khách hàng.</span><br><span style="font-size: 12pt;">- Trong thời gian lấy sản phẩm về bảo
                            hành
                            tại TTBH, khách hàng sẽ được mượn sản phẩm tương ứng để bảo hành nếu có.</span></p>
                    <table style="width: 100.0%; border-collapse: collapse;" width="100%">
                        <tbody>
                            <tr>
                                <td style="width: 37.55pt; border: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt;"
                                    width="50">
                                    <p style="margin-bottom: 0in; text-align: center; line-height: normal;"><span
                                            style="font-size: 12.0pt; font-family: 'Arial',sans-serif;">STT</span></p>
                                </td>
                                <td style="width: 186.95pt; border: solid windowtext 1.0pt; border-left: none; padding: 0in 5.4pt 0in 5.4pt;"
                                    width="249">
                                    <p style="margin-bottom: 0in; text-align: center; line-height: normal;"><span
                                            style="font-size: 12.0pt; font-family: 'Arial',sans-serif;">Hình thức sử dụng
                                            dịch
                                            vụ</span></p>
                                </td>
                                <td style="width: 242.5pt; border: solid windowtext 1.0pt; border-left: none; padding: 0in 5.4pt 0in 5.4pt;"
                                    width="323">
                                    <p style="margin-bottom: 0in; text-align: justify; line-height: normal;"><span
                                            style="font-size: 12.0pt; font-family: 'Arial',sans-serif;">Chi phí đi lại tới
                                            nơi
                                            sử dụng (NSD) của khách hàng</span></p>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 37.55pt; border: solid windowtext 1.0pt; border-top: none; padding: 0in 5.4pt 0in 5.4pt;"
                                    width="50">
                                    <p style="margin-bottom: 0in; text-align: center; line-height: normal;"><span
                                            style="font-size: 12.0pt; font-family: 'Arial',sans-serif;">1</span></p>
                                </td>
                                <td style="width: 186.95pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt;"
                                    width="249">
                                    <p style="margin-bottom: 0in; text-align: justify; line-height: normal;"><span
                                            style="font-size: 12.0pt; font-family: 'Arial',sans-serif;">Bảo hành tại nơi sử
                                            dụng
                                            cho khối doanh nghiệp</span></p>
                                </td>
                                <td style="width: 242.5pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt;"
                                    width="323">
                                    <p style="margin-bottom: 0in; text-align: justify; line-height: normal;"><span
                                            style="font-size: 12.0pt; font-family: 'Arial',sans-serif;">Miễn phí&nbsp;1 năm
                                            đầu
                                            mua hàng.</span></p>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 37.55pt; border: solid windowtext 1.0pt; border-top: none; padding: 0in 5.4pt 0in 5.4pt;"
                                    width="50">
                                    <p style="margin-bottom: 0in; text-align: center; line-height: normal;"><span
                                            style="font-size: 12.0pt; font-family: 'Arial',sans-serif;">2</span></p>
                                </td>
                                <td style="width: 186.95pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt;"
                                    width="249">
                                    <p style="margin-bottom: 0in; text-align: justify; line-height: normal;"><span
                                            style="font-size: 12.0pt; font-family: 'Arial',sans-serif;">Bảo hành tại nơi sử
                                            dụng
                                            cho khối Game Net</span></p>
                                </td>
                                <td style="width: 242.5pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt;"
                                    width="323">
                                    <p style="margin-bottom: 0in; text-align: justify; line-height: normal;"><span
                                            style="font-size: 12.0pt; font-family: 'Arial',sans-serif;">Miễn phí trong thời
                                            gian
                                            còn bảo hành của sản phẩm</span></p>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 37.55pt; border: solid windowtext 1.0pt; border-top: none; padding: 0in 5.4pt 0in 5.4pt;"
                                    width="50">
                                    <p style="margin-bottom: 0in; text-align: center; line-height: normal;"><span
                                            style="font-size: 12.0pt; font-family: 'Arial',sans-serif;">3</span></p>
                                </td>
                                <td style="width: 186.95pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt;"
                                    width="249">
                                    <p style="margin-bottom: 0in; text-align: justify; line-height: normal;"><span
                                            style="font-size: 12.0pt; font-family: 'Arial',sans-serif;">Hợp đồng bảo hành
                                            tại
                                            nơi sử dụng</span></p>
                                </td>
                                <td style="width: 242.5pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt;"
                                    width="323">
                                    <p style="margin-bottom: 0in; text-align: justify; line-height: normal;"><span
                                            style="font-size: 12.0pt; font-family: 'Arial',sans-serif;">Chi phí thực hiện
                                            dịch
                                            vụ theo nội dung của hợp đồng dịch vụ</span></p>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 37.55pt; border: solid windowtext 1.0pt; border-top: none; padding: 0in 5.4pt 0in 5.4pt;"
                                    width="50">
                                    <p style="margin-bottom: 0in; text-align: center; line-height: normal;"><span
                                            style="font-size: 12.0pt; font-family: 'Arial',sans-serif;">4</span></p>
                                </td>
                                <td style="width: 186.95pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt;"
                                    width="249">
                                    <p style="margin-bottom: 0in; text-align: justify; line-height: normal;"><span
                                            style="font-size: 12.0pt; font-family: 'Arial',sans-serif;">Bảo hành 1
                                            năm</span>
                                    </p>
                                </td>
                                <td style="width: 242.5pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt;"
                                    width="323">
                                    <p style="margin-bottom: 0in; text-align: justify; line-height: normal;"><span
                                            style="font-size: 12.0pt; font-family: 'Arial',sans-serif;">Nếu quý khách mua
                                            phí
                                            dịch vụ trong 290k/năm sử dụng</span></p>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 37.55pt; border: solid windowtext 1.0pt; border-top: none; padding: 0in 5.4pt 0in 5.4pt;"
                                    width="50">
                                    <p style="margin-bottom: 0in; text-align: center; line-height: normal;"><span
                                            style="font-size: 12.0pt; font-family: 'Arial',sans-serif;">5</span></p>
                                </td>
                                <td style="width: 186.95pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt;"
                                    width="249">
                                    <p style="margin-bottom: 0in; text-align: justify; line-height: normal;"><span
                                            style="font-size: 12.0pt; font-family: 'Arial',sans-serif;">Bảo hành 1
                                            lần</span>
                                    </p>
                                </td>
                                <td style="width: 242.5pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt;"
                                    width="323">
                                    <p style="margin-bottom: 0in; text-align: justify; line-height: normal;"><span
                                            style="font-size: 12.0pt; font-family: 'Arial',sans-serif;">Nếu quý khách muốn
                                            bảo
                                            hành 1 lần tại nơi sử dụng, phí là 150k/lần bảo hành.</span></p>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 37.55pt; border: solid windowtext 1.0pt; border-top: none; padding: 0in 5.4pt 0in 5.4pt;"
                                    width="50">
                                    <p style="margin-bottom: 0in; text-align: center; line-height: normal;"><span
                                            style="font-size: 12.0pt; font-family: 'Arial',sans-serif;">6</span></p>
                                </td>
                                <td style="width: 186.95pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt;"
                                    width="249">
                                    <p style="margin-bottom: 0in; text-align: justify; line-height: normal;"><span
                                            style="font-size: 12.0pt; font-family: 'Arial',sans-serif;">Nhận hàng và trả
                                            hàng
                                            bảo hành</span></p>
                                </td>
                                <td style="width: 242.5pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt;"
                                    width="323">
                                    <p style="margin-bottom: 0in; text-align: justify; line-height: normal;"><span
                                            style="font-size: 12.0pt; font-family: 'Arial',sans-serif;">Nếu quý khách hàng
                                            muốn
                                            sử dụng nhận và trả hàng bảo hành tại nơi sử dụng, phí là 150/lần</span></p>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 37.55pt; border: solid windowtext 1.0pt; border-top: none; padding: 0in 5.4pt 0in 5.4pt;"
                                    width="50">
                                    <p style="margin-bottom: 0in; text-align: center; line-height: normal;"><span
                                            style="font-size: 12.0pt; font-family: 'Arial',sans-serif;">7</span></p>
                                </td>
                                <td style="width: 186.95pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt;"
                                    width="249">
                                    <p style="margin-bottom: 0in; text-align: justify; line-height: normal;"><span
                                            style="font-size: 12.0pt; font-family: 'Arial',sans-serif;">Phát sinh</span>
                                    </p>
                                </td>
                                <td style="width: 242.5pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt;"
                                    width="323">
                                    <p style="margin-bottom: 0in; text-align: justify; line-height: normal;"><span
                                            style="font-size: 12.0pt; font-family: 'Arial',sans-serif;">Chi phí đi lại tới
                                            nơi
                                            sử dụng của KH</span></p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <p>&nbsp;</p>
                    <p><span style="color: #3366ff; font-size: 14pt;"><strong>V. CHÍNH SÁCH BẢO HÀNH KHÁCH HÀNG
                                TỈNH:</strong></span></p>
                    <p><span style="font-size: 12pt;">- Áp dụng đổi trả và đổi mới theo chính sách bảo hành của sản
                            phẩm.</span><br><span style="font-size: 12pt;">- Khách hàng có thể chuyển phát nhanh sản phẩm
                            lỗi
                            qua xe khách hoặc đường bưu điện.</span><br><span style="font-size: 12pt;">- Chi phí vận chuyển
                            lượt đi khách hàng thanh toán, lượt ngược lại An Phát thanh toán.</span></p>
                    <p><br><span style="color: #3366ff; font-size: 14pt;"><strong>VI. CHÍNH SÁCH BẢO HÀNH CÁC SẢN PHẨM CỦA
                                APPLE:</strong></span></p>
                    <p><span style="font-size: 12pt;">1. Không áp dụng chính sách đổi trả theo yêu cầu.</span><br><span
                            style="font-size: 12pt;">2. Không áp dụng đổi mới khi hàng đã bóc seal cho tất cả các dòng sản
                            phẩm
                            của Apple (Macbook, Ipad, Mac mini, Imac, Iphone). Riêng với điện thoại Iphone áp dụng đổi mới
                            với
                            sản phẩm bóc seal tại An Phát khi chưa active đã bị lỗi.</span><br><span
                            style="font-size: 12pt;">3. Thủ tục bảo hành</span><br><span style="font-size: 12pt;">a. Quý
                            khách
                            mang sản phẩm của Apple (Macbook, Ipad, Mac mini, Imac, iPhone,…) hoặc phụ kiện đến các điểm của
                            An
                            Phát để bảo hành hoặc trung tâm bảo hành chính hãng của Apple Việt Nam - Địa chỉ: Số 4 Yết Kiêu,
                            Phường Cửa Nam, Quận Hoàn Kiếm, Thành Phố Hà Nội.</span><br><span style="font-size: 12pt;">b.
                            Các
                            thông tin cần có khi yêu cầu dịch vụ bảo hành:</span><br><span style="font-size: 12pt;">i.
                            Thông
                            tin của Quý khách: họ và tên, số điện thoại liên hệ, địa chỉ email, số CMND.</span><br><span
                            style="font-size: 12pt;">ii. Thông tin sản phẩm: loại máy, số IMEI, serial number, ngày mua
                            máy,
                            hóa đơn mua hàng (nếu áp dụng).</span><br><span style="font-size: 12pt;">c. Thời gian bảo hành:
                            Trung bình từ 7 đến 15 ngày từ khi tiếp nhận sản phẩm.</span><br><span
                            style="font-size: 12pt;">4.
                            Vi phạm bảo hành: Bảo hành theo chính sách của hãng.</span><br><span
                            style="font-size: 12pt;">https://www.apple.com/legal/warranty/products/ios-warranty-rest-of-apac-vietnamese.html</span><br><span
                            style="font-size: 12pt;">5. Một số lưu ý:</span><br><span style="font-size: 12pt;">a. Quý
                            khách
                            không mở sản phẩm. Việc mở sản phẩm có thể gây ra những thiệt hại không được bảo
                            hành.</span><br><span style="font-size: 12pt;">b. Trước khi giao sản phẩm của Quý khách cho
                            dịch vụ
                            bảo hành, Quý khách nên duy trì một bản sao lưu các nội dung lưu trữ trên sản phẩm, gỡ bỏ tất cả
                            các
                            thông tin cá nhân mà Quý khách muốn bảo vệ và tắt tất cả các mật khẩu bảo vệ.</span><br><span
                            style="font-size: 12pt;">c. Trong quá trình thực hiện dịch vụ bảo hành, các nội dung lưu trữ
                            trên
                            sản phẩm của Quý khách sẽ bị xóa và định dạng lại. An Phát không chịu trách nhiệm đối với bất kỳ
                            mất
                            mát nào đối với các chương trình phần mềm, dữ liệu hoặc thông tin nào khác lưu trữ trên sản phẩm
                            đang được cung cấp dịch vụ bảo hành.</span><br><span style="font-size: 12pt;">d. Trước khi giao
                            sản
                            phẩm đến trung tâm bảo hành, Quý khách vui lòng thoát tài khoản trên sản phẩm ra khỏi thiết bị.
                            Nếu
                            sản phẩm bị khoá bởi tài khoản thì sẽ từ chối bảo hành.</span></p>
                    <p>&nbsp;</p>
                    <p><span style="color: #3366ff; font-size: 14pt;"><strong>VII. CHÍNH SÁCH BẢO HÀNH SÀN THƯƠNG MẠI ĐIỆN
                                TỬ:</strong></span><br><span style="font-size: 12pt;">- Áp dụng theo chính sách bảo hành
                            của
                            các khách hàng mua lẻ tại An Phát đối với tất các các sản phẩm.</span><br><span
                            style="font-size: 12pt;">- Riêng chính sách đổi trả hàng sẽ áp dụng theo ngày khách hàng nhận
                            được
                            hàng.</span></p>
                    <p>&nbsp;</p>
                    <p style="text-align: center;"><span style="font-size: 14pt;"><strong>ĐIỀU KIỆN BẢO HÀNH
                                CHUNG:</strong></span></p>
                    <p><span style="font-size: 12pt;">Tất cả các sản phẩm do An Phát bán ra đều tuân thủ điều kiện bảo hành
                            của
                            Hãng sản xuất, Nhà cung cấp. Các trường hợp sau đây bị coi là vi phạm điều kiện bảo hành và
                            không
                            được bảo hành:</span><br><span style="font-size: 12pt;">1. Sản phẩm bị tiêu hao trong quá trình
                            sử
                            dụng. (hộp mực, cụm trống từ, băng mực, đầu kim, đầu in phun, quạt, các loại cáp, nắn dòng, công
                            tắc
                            nguồn…)</span><br><span style="font-size: 12pt;">2. Sản phẩm hết thời hạn bảo hành (thời hạn
                            bảo
                            hành sản phẩm được thể hiện trên phiếu xuất kho kiêm bảo hành của An Phát, tem bảo
                            hành…).</span><br><span style="font-size: 12pt;">3. Không có tem bảo hành của An Phát, Nhà phân
                            phối, Hãng sản xuất; hoặc có nhưng tem bảo hành đó không hợp lệ (bị rách, bị tẩy xóa, sửa chữa,
                            mờ
                            không đọc được, bong/ tróc…).</span><br><span style="font-size: 12pt;">4. Số serial, mã vạch,
                            thông
                            số kỹ thuật trên sản phẩm không hợp lệ (bị mờ không đọc được, bị cạo, bị sửa, bị rách, bị bong/
                            tróc, bị thay đổi).</span><br><span style="font-size: 12pt;">5. Sản phẩm bị lỗi do thiên tai
                            (lũ
                            lụt, hỏa hoạn, nguồn điện không bình thường, sai điện áp quy định…).</span><br><span
                            style="font-size: 12pt;">6. Sản phẩm bị lỗi do người sử dụng:</span><br><span
                            style="font-size: 12pt;">• Sản phẩm bị biến dạng vật lý như trầy, xước, lồi, lõm, móp, méo,
                            nứt, vỡ
                            do bị rơi, bị va đập, do vận chuyển/ lắp đặt sai quy cách</span><br><span
                            style="font-size: 12pt;">• Sản phẩm bị mốc, hoen rỉ, ẩm ướt, chất lỏng xâm nhập, ố vàng, mờ
                            chữ,
                            viết chữ không tẩy được…</span><br><span style="font-size: 12pt;">7. Sản phẩm hư hỏng do chuột,
                            bọ
                            hoặc côn trùng xâm nhập.</span><br><span style="font-size: 12pt;">8. Sản phẩm bị tháo dỡ, sửa
                            chữa
                            bởi các cá nhân hoặc kỹ thuật viên không được sự ủy quyền của An Phát.</span><br><span
                            style="font-size: 12pt;">9. Không bảo hành phần mềm không có bản quyền và dữ liệu của khách
                            hàng có
                            trong máy hoặc sản phẩm.</span></p>
                    <p><br><span style="color: #3366ff; font-size: 14pt;"><strong> B. TRUNG TÂM BẢO HÀNH VÀ DỊCH VỤ KHÁCH
                                HÀNG
                                AN PHÁT:</strong></span></p>
                    <p><span style="color: #3366ff;"><strong><span style="font-size: 12pt;">1. Miền
                                    Bắc:</span></strong></span><br><strong><span style="font-size: 12pt;">- Khối khách lẻ:
                            </span></strong><br><span style="font-size: 12pt;">• Địa chỉ 1: Phòng 101, số 49, phố Thái Hà -
                            quận Đống Đa - Hà Nội</span><br><span style="font-size: 12pt;">• Địa chỉ 2: Số 63, phố Trần
                            Thái
                            Tông - quận Cầu Giấy - Hà Nội</span><br><span style="font-size: 12pt;">• Địa chỉ 3: Số 151, phố
                            Lê
                            Thanh Nghị - quận Hai Bà Trưng - Hà Nội</span><br><span style="font-size: 12pt;">• Địa chỉ 4:
                            Số 4
                            Nguyễn Văn Cừ - Ninh Xá - Thành phố Bắc Ninh</span><br><span style="font-size: 12pt;">• Điện
                            thoại:
                            1900.0323 - Phím 5</span><br><span style="font-size: 12pt;">• Hotline:
                            0964.599.915</span><br><span style="font-size: 12pt;">• Mail:
                            baohanh-hn@anphat.com.vn</span><br><strong><span style="font-size: 12pt;">- Khối Phân phối, Dự
                                án: </span></strong><br><span style="font-size: 12pt;">• Địa chỉ: Số 5, Ngõ 95 Chùa Bộc,
                            P.Trung Liệt – quận Đống Đa - Hà
                            Nội</span><br><span style="font-size: 12pt;">• Điện thoại : 0243.5642981</span><br><span
                            style="font-size: 12pt;">• Mail: baohanh@anphatpc.com.vn</span></p>
                    <p><span style="color: #3366ff;"><strong><span style="font-size: 12pt;">2. Miền
                                    Nam:</span></strong></span><br><span style="font-size: 12pt;">• Địa chỉ 1: 158 – 160,
                            phố
                            Lý Thường Kiệt - Phường 14 - Quận 10 - TPHCM</span><br><span style="font-size: 12pt;">• Địa chỉ
                            2:
                            330-332, phố Võ Văn Tần – Quận 3 - TPHCM</span><br><span style="font-size: 12pt;">• Điện thoại:
                            1900.0323 - Phím 6</span><br><span style="font-size: 12pt;">• Hotline:
                            0909.144.560</span><br><span style="font-size: 12pt;">• Mail: baohanh-hcm@anphat.com.vn</span>
                    </p>
                    <p><span style="color: #3366ff;"><strong><span style="font-size: 12pt;">3. Phòng chăm sóc khách
                                    hàng:</span></strong></span><br><span style="font-size: 12pt;">• Địa chỉ: Phòng 101, số
                            49,
                            phố Thái Hà - quận Đống Đa - Hà Nội</span><br><span style="font-size: 12pt;">• Điện thoại:
                            19000323
                            – Phím 0</span><br><span style="font-size: 12pt;">• Mail : CSKH@anphatpc.com.vn</span><br><span
                            style="font-size: 12pt;">4. Thời gian làm việc:</span><br><span style="font-size: 12pt;">•
                            Thời
                            gian tiếp nhận, trả bảo hành từ 8h30 đến 19h00 ( chủ nhật 8h30 – 18h00, trừ tết nguyên
                            đán)</span>
                    </p>
                    <p><span style="color: #3366ff;"><strong><span style="font-size: 12pt;">5. Góp ý khiếu
                                    nại</span></strong></span><br><span style="font-size: 12pt;">• Điện thoại :
                            0904.316.386</span><br><span style="font-size: 12pt;">• Mail: dung@anphatpc.com.vn</span></p>
                </div>
                <div class="divtin">&nbsp;</div>
            </div><!--right-side-->
        </div>
    </div>
@endsection

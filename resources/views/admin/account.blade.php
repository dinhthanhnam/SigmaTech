@extends('admin.app')

@section('content')
    <main class="app-content">
        <div class="app-title">
            <ul class="app-breadcrumb">
                <li class="breadcrumb-item" style = "list-style: none"><a href="#"><b>Danh sách người dùngdùng</b></a>
                </li>
            </ul>
            <div id="clock"></div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <div id="sampleTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">

                            <table class="table table-hover table-bordered" id="resultTable">
                                <thead>
                                    <tr>
                                        <th width="150">Tên tài khoản</th>
                                        <th width="200">Địa chỉ email</th>
                                        <th width="150">Số điện thoại</th>
                                        <th width="350">Địa chỉ mặc định</th>
                                        <th width="150">Lần cuối mua hàng</th>
                                        <th width="200">Sản phẩm trong giỏ</th>
                                        <th width="200">Tổng tiền mua sắm</th>
                                        <th width="150">Tổng số đơn hàng</th>
                                        <!-- Thêm các cột khác nếu cần -->
                                    </tr>
                                </thead>
                                <tbody id="product-list">
                                    @foreach ($paginatedUsers as $user)
                                        <tr class="product-row">
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->phone }}</td>
                                            <td>{{ $user->address }}</td>
                                            @if ($user->recency_days == 0 && $user->frequency == 0)
                                                <td>Chưa mua hàng</td>
                                            @else
                                                <td>{{ $user->recency_days }} ngày trước</td>
                                            @endif
                                            <td>{{ $user->cart_abandon_rate }}</td>
                                            <td>{{ number_format($user->monetary, 0, ',', '.') }}đ</td>
                                            <td>{{ $user->frequency }}</td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="paging bg-white mx-auto" id="paginationLinks">
                                @if ($paginatedUsers->currentPage() > 1)
                                    <a href="{{ $paginatedUsers->previousPageUrl() }}">
                                        <i class="fa fa-angle-left"></i>
                                    </a>
                                @endif
                                <a href="{{ $paginatedUsers->url(1) }}"
                                    class="{{ $paginatedUsers->onFirstPage() ? 'current' : '' }}">
                                    1
                                </a>
                                @for ($page = 2; $page <= $paginatedUsers->lastPage(); $page++)
                                    <a href="{{ $paginatedUsers->url($page) }}"
                                        class="{{ $page == $paginatedUsers->currentPage() ? 'current' : '' }}">
                                        {{ $page }}
                                    </a>
                                @endfor
                                @if ($paginatedUsers->hasMorePages())
                                    <a href="{{ $paginatedUsers->nextPageUrl() }}">
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

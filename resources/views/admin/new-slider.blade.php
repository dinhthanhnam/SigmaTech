@extends('admin.app')
@section('content')
    <main class="app-content">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item">Danh sách slider</li>
                <li class="breadcrumb-item"><b><a href="#">Thêm slider</a></b></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <h3 class="tile-title">Tạo mới slider</h3>
                    <form id="sliderForm" action="{{ route('admin.save-slider') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Tên slider</label>
                                    <input class="form-control" type="text" name="name" placeholder="Nhập tên slider" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Hình ảnh slider</label>
                                    <input type="file" class="form-control-file" name="image" accept="image/*" required>
                                    <small class="form-text text-muted">Vui lòng chọn 1 ảnh duy nhất.</small>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-save" type="submit">Lưu lại</button>
                        <a class="btn btn-cancel" href="{{ route('admin.show-slider') }}">Hủy bỏ</a>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection

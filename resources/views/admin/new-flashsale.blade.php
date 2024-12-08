@extends('admin.app')
@section('content')
    <main class="app-content">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item">Danh sách Flash Sale</li>
                <li class="breadcrumb-item"><b><a href="#">Thêm Flash Sale</a></b></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <h3 class="tile-title">Tạo mới Flash Sale</h3>

                    <div class="tile-body">
                        <div id="sampleTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                            <div class="row d-flex justify-content-between align-items-center">
                                <div class="col-sm-12 col-md-6 text-left">
                                    <div class="dataTables_filter">
                                        <label>Tìm kiếm:
                                            <input type="text" id="searchQuery" class="form-control form-control-sm"
                                                placeholder="Tìm kiếm sản phẩm" aria-controls="sampleTable">
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 d-flex text-right justify-content-end">

                                </div>
                            </div>
                            <table class="table table-hover table-bordered" id="resultTable">
                                <thead>
                                    <tr>
                                        <th width="10">Mã</th>
                                        <th width="330">Tên sản phẩm</th>
                                        <th width="150">Hình ảnh</th>
                                        <th width="200">Loại hàng</th>
                                        <th width="140">Thương hiệu</th>
                                        <th width="140">Giá</th>
                                        <th width="140">Giá niêm yết</th>
                                        <th width="140">Giá sale</th>
                                        <th width="150">Thời điểm kết thúc</th>
                                        <th>Thêm Flash Sale</th>
                                        <!-- Thêm các cột khác nếu cần -->
                                    </tr>
                                </thead>
                                <tbody id="product-list">
                                    @foreach ($paginatedProducts as $product)
                                        <tr class="product-row" data-product-id="{{ $product->id }}"
                                            data-table="{{ $product->data_table }}">
                                            <td>{{ $product->id }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td><img src="{{ $product->attributes->firstWhere('name', 'Image1')->pivot->value ?? 'N/A' }}"
                                                    alt="{{ $product->name }}" width="100"></td>
                                            <td>{{ $product->categories->name ?? 'N/A' }}</td>
                                            </td>
                                            <td>{{ $product->attributes->firstWhere('name', 'Brand')->pivot->value ?? 'N/A' }}
                                            </td>
                                            <td>
                                                {{ number_format($product->attributes->firstWhere('name', 'Price')->pivot->value ?? 'N/A', 0, ',', '.') }}
                                                đ
                                            </td>
                                            <td>
                                                {{ number_format($product->attributes->firstWhere('name', 'Deal Price')->pivot->value ?? 'N/A', 0, ',', '.') }}
                                                đ
                                            </td>
                                            @if (!$product->attributes->firstWhere('name', 'Sale Price'))
                                                <td></td>
                                            @else
                                                <td>
                                                    {{ number_format($product->attributes->firstWhere('name', 'Sale Price')->pivot->value ?? 'N/A', 0, ',', '.') }}
                                                    đ
                                                </td>
                                            @endif
                                            <td>
                                                @php
                                                    // Lấy giá trị ngày từ Sale End Date
                                                    $saleEndDate =
                                                        $product->attributes->firstWhere('name', 'Sale End Date')->pivot
                                                            ->value ?? null;

                                                    // Xử lý định dạng ngày giờ
                                                    if ($saleEndDate) {
                                                        $formattedDate =
                                                            strpos($saleEndDate, 'T') !== false
                                                                ? date(
                                                                    'Y-m-d H:i',
                                                                    strtotime(str_replace('T', ' ', $saleEndDate)),
                                                                )
                                                                : date('Y-m-d H:i', strtotime($saleEndDate));
                                                    } else {
                                                        $formattedDate = '';
                                                    }
                                                @endphp

                                                {{-- Hiển thị ngày đã định dạng hoặc để trống nếu không có giá trị --}}
                                                {{ $formattedDate }}
                                            </td>

                                            <td><button class="btn btn-add btn-sm add" type="button" title="Thêm"
                                                    data-id="{{ $product->id }}"
                                                    data-table="{{ $product->data_table }}"><i class="fas fa-plus"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="paging bg-white mx-auto" id="paginationLinks">
                                @if ($paginatedProducts->currentPage() > 1)
                                    <a href="{{ $paginatedProducts->previousPageUrl() }}">
                                        <i class="fa fa-angle-left"></i>
                                    </a>
                                @endif
                                <a href="{{ $paginatedProducts->url(1) }}"
                                    class="{{ $paginatedProducts->onFirstPage() ? 'current' : '' }}">
                                    1
                                </a>
                                @for ($page = 2; $page <= $paginatedProducts->lastPage(); $page++)
                                    <a href="{{ $paginatedProducts->url($page) }}"
                                        class="{{ $page == $paginatedProducts->currentPage() ? 'current' : '' }}">
                                        {{ $page }}
                                    </a>
                                @endfor
                                @if ($paginatedProducts->hasMorePages())
                                    <a href="{{ $paginatedProducts->nextPageUrl() }}">
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
<div style="display: none;" id="product-update-sale">
    <div id="sale-detail" class="product-form-container">
        <!-- Nội dung form sẽ được chèn vào đây -->
    </div>
</div>
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const editButtons = document.querySelectorAll('.btn.add');

            editButtons.forEach(button => {
                button.addEventListener('click', function(event) {
                    // Ngăn sự kiện click lan sang các phần tử cha
                    event.stopPropagation();

                    const productRow = button.closest('.product-row');
                    const productId = productRow.getAttribute('data-product-id');
                    const table = productRow.getAttribute('data-table');

                    // Gọi API để lấy dữ liệu sản phẩm
                    fetch(`/admin/new-flashsale/${table}/${productId}`)
                        .then(response => response.json())
                        .then(data => {
                            const saleContent = document.getElementById(
                                'sale-detail');
                            let formAttributes = `<div class="row">`;
                            let image = '';
                            data.attributes.forEach(attribute => {
                                let inputField = '';
                                if (attribute.name === 'Price' || attribute
                                    .name === 'Deal Price' || attribute.name ===
                                    'Sale Price') {
                                    inputField = `
                                        <input 
                                            class="form-control" 
                                            name="${convertString(attribute.name)}" 
                                            value="${attribute.pivot.value}"
                                            type="number" 
                                            min="0" 
                                            step="1" 
                                            required
                                        />`;
                                } else if (attribute.name.includes('Date')) {
                                    if (attribute.pivot.value && attribute.pivot.value
                                        .length === 10) {
                                        attribute.pivot.value += ' 00:00';
                                    }
                                    inputField = `
                                        <input 
                                            class="form-control" 
                                            name="${convertString(attribute.name)}" 
                                            value="${attribute.pivot.value}"
                                            type="datetime-local"
                                        />`;
                                } else if (attribute.name.includes('Image')) {
                                    image = attribute.pivot.value;
                                }

                                formAttributes += `
                                    <div class="col-md-6 col-lg-4" style="${attribute.name === 'Image1' ? 'display: none;' : ''}">
                                        <div class="form-group col-md-9">
                                            <label class="control-label">${attribute.name}</label>
                                            ${inputField}
                                        </div>
                                    </div>`;
                            });

                            formAttributes += `</div>`;

                            // Chèn nội dung vào modal
                            saleContent.innerHTML = `
                            <form id="sale-product-form"method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="product-form">
                                    <div class="row">
                                        <div class="col-md-6 ">
                                            <strong style="font-size: 18px"=>${data.name}</strong>
                                            <img src="${image}" alt="Ảnh sản phẩm" style="max-width: 100px; max-height: 100px;">
                                        </div>     
                                    </div>
                                    <br>
                                    
                                    ${formAttributes}  
                                </div>
                                
                                <div class="mt-3 d-flex justify-content-between">
                                    <button type="button" class="btn btn-secondary cancel-edit">Hủy bỏ</button>
                                    <button type="submit" class="btn btn-primary save-edit">Lưu thay đổi</button>
                                </div>
                            </form>`;

                            // Xử lý sự kiện khi submit form
                            document.getElementById('sale-product-form').addEventListener(
                                'submit',
                                function(event) {
                                    event.preventDefault(); // Ngăn reload trang

                                    const formData = new FormData(event.target);

                                    fetch(`/admin/new-flashsale/${table}/${productId}`, {
                                            method: 'POST',
                                            body: formData,
                                            headers: {
                                                'X-CSRF-TOKEN': document.querySelector(
                                                        'meta[name="csrf-token"]')
                                                    .content
                                            }
                                        })
                                        .then(response => response.json())
                                        .then(result => {
                                            if (result.success) {
                                                console.log(formData);
                                                alert(
                                                    'Cập nhật flash sale thành công!'
                                                );
                                                Fancybox.close();
                                                location.reload();
                                            } else {
                                                alert('Cập nhật thất bại!');
                                            }
                                        })
                                        .catch(error => console.error('Lỗi khi cập nhật:',
                                            error));
                                });

                            // Hủy bỏ việc chỉnh sửa
                            document.querySelector('.cancel-edit').addEventListener('click',
                                function() {
                                    Fancybox.close();
                                });

                            // Kích hoạt Fancybox để mở modal
                            Fancybox.show([{
                                src: '#product-update-sale',
                                type: 'inline'
                            }]);
                            document.querySelectorAll('input[required], select[required]')
                                .forEach(input => {
                                    const parentDiv = input.closest(
                                        'div'); // Tìm thẻ cha gần nhất
                                    const label = parentDiv.querySelector(
                                        'label'); // Tìm label trong div đó

                                    if (label) {
                                        const redAsterisk = document.createElement('span');
                                        redAsterisk.textContent = ' *'; // Thêm dấu *
                                        redAsterisk.style.color = 'red'; // Đặt màu đỏ
                                        label.appendChild(
                                            redAsterisk); // Gắn vào cuối label
                                    }
                                });
                        })
                        .catch(error => {
                            console.error("Lỗi khi lấy dữ liệu sản phẩm:", error);
                        });
                });
            });
        });

        function removeDiacritics(str) {
            str = str.replace(/[áàảẩẳãạăằắẵặâầấẫậ]/ug, "a");
            str = str.replace(/[íìĩịỉ]/ug, "i");
            str = str.replace(/[éèẽẻểẹêếềễệ]/ug, "e");
            str = str.replace(/[óòỏõọôốồổỗộơớờỡởợỔ]/ug, "o");
            str = str.replace(/[úùũụủưứừữựử]/ug, "u");
            str = str.replace(/[đĐ]/ug, "d");
            str = str.replace(/[ýỷỹỵ]/ug, "y");
            return str;
        }

        function convertString(str) {
            return removeDiacritics(str) // Bỏ dấu
                .toLowerCase() // Chuyển thành chữ thường
                .replace(/[^a-zA-Z0-9\s]/g, "")
                .replace(/\s+/g, '_');

        }
    </script>
@endpush

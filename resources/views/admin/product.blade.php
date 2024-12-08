@extends('admin.app')

@section('content')
    <main class="app-content">
        <div class="app-title">
            <ul class="app-breadcrumb">
                <li class="breadcrumb-item" style = "list-style: none"><a href="#"><b>Danh sách sản phẩm</b></a></li>
            </ul>
            <div id="clock"></div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
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
                                    <!-- Thêm text-right để căn phải -->
                                    <a class="btn btn-info btn-sm d-flex align-items-center justify-content-center"
                                        href="{{ route('admin.new-product') }}" title="Thêm"
                                        style = "width: 150px; height: 50px; font-size: 14px;"
                                        onclick="handleCreateProductClick(event)">
                                        <i class="fas fa-plus mr-2"></i> Tạo mới sản phẩm
                                    </a>
                                </div>
                            </div>
                            <table class="table table-hover table-bordered" id="resultTable">
                                <thead>
                                    <tr>
                                        <th width="10">Mã</th>
                                        <th width="400">Tên sản phẩm</th>
                                        <th width="250">Hình ảnh</th>
                                        <th width="250">Loại hàng</th>
                                        <th width="150">Thương hiệu</th>
                                        <th width="150">Giá</th>
                                        <th width="150">Giá niêm yết</th>
                                        <th>Chức năng</th>
                                        <!-- Thêm các cột khác nếu cần -->
                                    </tr>
                                </thead>
                                <tbody id="product-list">
                                    @foreach ($paginatedProducts as $product)
                                        <tr class="product-row" data-product-id="{{ $product->id }}"
                                            data-product-type="{{ $product->data_table }}">
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
                                            <td><button class="btn btn-primary btn-sm trash" type="button" title="Xóa"
                                                    data-id="{{ $product->id }}"
                                                    data-table="{{ $product->data_table }}"><i
                                                        class="fas fa-trash-alt"></i>
                                                </button>
                                                <button class="btn btn-primary btn-sm edit" type="button" title="Sửa"><i
                                                        class="fas fa-edit"></i>
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
<div style="display: none;" id="product-edit-modal">
    <div id="product-detail" class="product-form-container">
        <!-- Nội dung form sẽ được chèn vào đây -->
    </div>
</div>



@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const editButtons = document.querySelectorAll('.btn.edit');

            editButtons.forEach(button => {
                button.addEventListener('click', function(event) {
                    // Ngăn sự kiện click lan sang các phần tử cha
                    event.stopPropagation();

                    const productRow = button.closest('.product-row');
                    const productId = productRow.getAttribute('data-product-id');
                    const productType = productRow.getAttribute('data-product-type');

                    // Gọi API để lấy dữ liệu sản phẩm
                    fetch(`/admin/product/${productType}/${productId}`)
                        .then(response => response.json())
                        .then(data => {
                            const productDetailContent = document.getElementById(
                                'product-detail');
                            let formAttributes = `<div class="row">`;

                            data.attributes.forEach(attribute => {
                                let inputField = '';

                                // Kiểm tra loại attribute và hiển thị theo kiểu tương ứng
                                if (attribute.name === 'Brand') {
                                    inputField =
                                        `<select class="form-control" name="${convertString(attribute.name)}" required>
                                            <option value="Asus" ${attribute.pivot.value === 'Asus' ? 'selected' : ''}>Asus</option>
                                            <option value="Lenovo" ${attribute.pivot.value === 'Lenovo' ? 'selected' : ''}>Lenovo</option>   
                                            <option value="Acer" ${attribute.pivot.value === 'Acer' ? 'selected' : ''}>Acer</option>    
                                            <option value="Dell" ${attribute.pivot.value === 'Dell' ? 'selected' : ''}>Dell</option>    
                                            <option value="NVIDIA" ${attribute.pivot.value === 'NVIDIA' ? 'selected' : ''}>NVIDIA</option>
                                            <option value="AMD" ${attribute.pivot.value === 'AMD' ? 'selected' : ''}>AMD</option>    
                                            <option value="Intel" ${attribute.pivot.value === 'Intel' ? 'selected' : ''}>Intel</option>    
                                            <option value="LG" ${attribute.pivot.value === 'LG' ? 'selected' : ''}>LG</option>       
                                            <option value="BenQ" ${attribute.pivot.value === 'BenQ' ? 'selected' : ''}>BenQ</option>    
                                            <option value="Logitech" ${attribute.pivot.value === 'Logitech' ? 'selected' : ''}>Logitech</option>
                                            <option value="HyperX" ${attribute.pivot.value === 'HyperX' ? 'selected' : ''}>HyperX</option>
                                            <option value="Keychron" ${attribute.pivot.value === 'Keychron' ? 'selected' : ''}>Keychron</option>
                                            <option value="SteelSeries" ${attribute.pivot.value === 'SteelSeries' ? 'selected' : ''}>SteelSeries</option>
                                            <option value="Corsair" ${attribute.pivot.value === 'Corsair' ? 'selected' : ''}>Corsair</option>    
                                            <option value="Razer" ${attribute.pivot.value === 'Razer' ? 'selected' : ''}>Razer</option>
                                        </select>`;
                                } else if (attribute.name === 'Sale Price' || attribute
                                    .name === 'Tồn kho'
                                ) {
                                    inputField = `
                                        <input 
                                            class="form-control" 
                                            name="${convertString(attribute.name)}" 
                                            value="${attribute.pivot.value}"
                                            type="number" 
                                            min="0" 
                                            step="1" 
                                        />`;
                                } else if (attribute.name === 'Price' || attribute
                                    .name === 'Deal Price') {
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
                                } else if (attribute.name === 'Rating') {
                                    inputField = `
                                        <input 
                                            class="form-control" 
                                            name="${convertString(attribute.name)}" 
                                            value="${attribute.pivot.value}"
                                            type="number" 
                                            min="0" 
                                            step="any" 
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
s 
                                        />`;
                                } else if (attribute.name === 'On Top') {
                                    inputField =
                                        `<select class="form-control" name="${convertString(attribute.name)}">
                                            <option value="0" ${attribute.pivot.value == '0' ? 'selected' : ''}>Không</option>
                                            <option value="1" ${attribute.pivot.value == '1' ? 'selected' : ''}>Có</option>  

                                        </select>`;
                                } else if (attribute.name.includes('Image')) {
                                    inputField = `<div style="display: flex; align-items: center;">
                                        <img src="${attribute.pivot.value}" alt="Ảnh sản phẩm" style="max-width: 70px; max-height: 70px;">
                                        <input type="file" class="form-control" name="${convertString(attribute.name)}" />                           
                                            </div>`;
                                } else if (attribute.name.includes('Thumbnail')) {
                                    inputField = `<div style="display: flex; align-items: center;">
                                        <img src="${attribute.pivot.value}" alt="Ảnh sản phẩm" style="max-width: 70px; max-height: 70px;">
                                        <input type="file" class="form-control" name="${convertString(attribute.name)}" />                           
                                            </div>`;
                                } else if (attribute.name === '[Laptop] Loại laptop') {
                                    inputField =
                                        `<select class="form-control" name="${convertString(attribute.name)}">
                                            <option value="Gaming" ${attribute.pivot.value == 'Gaming' ? 'selected' : ''}>Gaming</option>
                                            <option value="Office" ${attribute.pivot.value == 'Office' ? 'selected' : ''}>Office</option>   
                                
                                        </select>`;
                                } else if (attribute.name === '[GG] Loại thiết bị') {
                                    inputField =
                                        `<select class="form-control" name="${convertString(attribute.name)}">
                                            <option value="headphone" ${attribute.pivot.value == 'headphone' ? 'selected' : ''}>Headphone</option>
                                            <option value="keyboard" ${attribute.pivot.value == 'keyboard' ? 'selected' : ''}>Keyboard</option>   
                                            <option value="mouse" ${attribute.pivot.value == 'mouse' ? 'selected' : ''}>Mouse</option>                                     
                                        </select>`;
                                } else if (attribute.name ===
                                    '[Cooling] Loại làm mát') {
                                    inputField =
                                        `<select class="form-control" name="${convertString(attribute.name)}">
                                            <option value="Liquid Cooler" ${attribute.pivot.value == 'Liquid Cooler' ? 'selected' : ''}>Liquid Cooler</option>
                                            <option value="Air Cooler" ${attribute.pivot.value == 'Air Cooler' ? 'selected' : ''}>Air Cooler</option>   
                                        </select>`;
                                } else if (attribute.name === '[Media] Loại thiết bị') {
                                    inputField =
                                        `<select class="form-control" name="${convertString(attribute.name)}">
                                            <option value="Webcam" ${attribute.pivot.value == 'Webcam' ? 'selected' : ''}>Webcam</option>
                                            <option value="Microphone" ${attribute.pivot.value == 'Microphone' ? 'selected' : ''}>Microphone</option>   
                                            <option value="Speaker" ${attribute.pivot.value == 'Speaker' ? 'selected' : ''}>Speaker</option>   
                                            <option value="Controller" ${attribute.pivot.value == 'Controller' ? 'selected' : ''}>Controller</option>   

                                            
                                        </select>`;
                                } else if (attribute.name ===
                                    '[Accessory] Loại thiết bị') {
                                    inputField =
                                        `<select class="form-control" name="${convertString(attribute.name)}">
                                            <option value="Cable" ${attribute.pivot.value == 'Cable' ? 'selected' : ''}>Cable</option>
                                            <option value="Microphone" ${attribute.pivot.value == 'Microphone' ? 'selected' : ''}>Microphone</option>   
                                            <option value="Bag" ${attribute.pivot.value == 'Bag' ? 'selected' : ''}>Bag</option>   
                                            <option value="Mount" ${attribute.pivot.value == 'Mount' ? 'selected' : ''}>Mount</option>   
                                            <option value="Controller" ${attribute.pivot.value == 'Controller' ? 'selected' : ''}>Controller</option>   
                                            <option value="Dock" ${attribute.pivot.value == 'Dock' ? 'selected' : ''}>Dock</option>   
                                            <option value="Charger" ${attribute.pivot.value == 'Charger' ? 'selected' : ''}>Charger</option>   
                                            <option value="Memory" ${attribute.pivot.value == 'Memory' ? 'selected' : ''}>Memory</option>   

                                        </select>`;
                                } else {
                                    inputField =
                                        `<input class="form-control" name="${convertString(attribute.name)}" value="${attribute.pivot.value}" />`;
                                }

                                formAttributes += `
                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group col-md-9">
                                            <label class="control-label">${attribute.name}</label>
                                            ${inputField}
                                        </div>
                                    </div>`;
                            });

                            formAttributes += `</div>`;

                            // Chèn nội dung vào modal
                            productDetailContent.innerHTML = `
                            <form id="edit-product-form"method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="product-form">
                                    <div class="row">
                                        <div class="col-md-6 col-lg-4">
                                            <div class="form-group col-md-9">
                                                <label class="control-label">Tên sản phẩm</label>
                                                <input class="form-control" type="text" name="name" value="${data.name}" required/>
                                            </div>
                                        </div>                                                                     
                                    </div>
                                    ${formAttributes}  
                                </div>
                                
                                <div class="mt-3 d-flex justify-content-between">
                                    <button type="button" class="btn btn-secondary cancel-edit">Hủy bỏ</button>
                                    <button type="submit" class="btn btn-primary save-edit">Lưu thay đổi</button>
                                </div>
                            </form>`;

                            // Xử lý sự kiện khi submit form
                            document.getElementById('edit-product-form').addEventListener(
                                'submit',
                                function(event) {
                                    event.preventDefault(); // Ngăn reload trang

                                    const formData = new FormData(event.target);

                                    fetch(`/admin/product/${productType}/${productId}`, {
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
                                                alert('Cập nhật sản phẩm thành công!');
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
                                src: '#product-edit-modal',
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
    <script>
        // Hàm gọi AJAX để xóa sản phẩm
        $(document).on('click', '.trash', function() {
            var table = $(this).data('table'); // Lấy giá trị 'table' từ thuộc tính data-table
            var id = $(this).data('id'); // Lấy giá trị 'id' từ thuộc tính data-id
            var $row = $(this).closest('tr'); // Lưu tham chiếu đến dòng tr cần xóa

            // Gửi yêu cầu xóa thông qua AJAX
            $.ajax({
                url: '/delete-product/' + table + '/' + id,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}',
                },
                success: function(response) {
                    if (response.success) {
                        alert(response.success); // Hiển thị thông báo thành công
                        // Xóa dòng trong bảng
                        $row.remove(); // Dùng biến $row để xóa thẻ <tr>
                    } else if (response.error) {
                        alert(response.error); // Hiển thị thông báo lỗi
                    }
                },
                error: function(xhr, status, error) {
                    alert('An error occurred: ' + xhr.responseText); // Hiển thị lỗi từ server nếu có
                }
            });
        });
    </script>
    <script>
        document.getElementById('searchQuery').addEventListener('input', function() {
            const searchQuery = this.value.trim();

            fetchProducts(searchQuery);

        });

        function fetchProducts(searchQuery) {
            fetch(`/search-products?search=${searchQuery}`)
                .then(response => response.json())
                .then(data => {
                    updateProductList(data.products); // Cập nhật danh sách sản phẩm
                })
                .catch(error => console.error('Error:', error));
        }

        function updateProductList(products) {
            const productList = document.getElementById('product-list');
            productList.innerHTML = ''; // Xóa danh sách sản phẩm hiện tại

            if (products.length > 0) {
                products.forEach(product => {
                    const productRow = document.createElement('tr');

                    // Cập nhật các thông tin sản phẩm (tùy chỉnh các thuộc tính bạn cần hiển thị)
                    productRow.innerHTML = `
        <td>${product.id}</td>
        <td>${product.name}</td>
        <td><img src="${product.image || 'N/A'}" alt="${product.name}" width="150"></td>
        <td>${product.category || 'N/A'}</td>
        <td>${product.brand || 'N/A'}</td>
        <td>${product.model || 'N/A'}</td>
        <td>${product.price ? new Intl.NumberFormat().format(product.price) : 'N/A'} đ</td>
        <td><button class="btn btn-primary btn-sm trash" type="button" title="Xóa" data-id="${product.id}"><i class="fas fa-trash-alt"></i></button></td>
        <td><button class="btn btn-primary btn-sm edit" type="button" title="Sửa" data-toggle="modal" data-target="#ModalUP"><i class="fas fa-edit"></i></button></td>
    `;

                    productList.appendChild(productRow);
                });
            } else {
                productList.innerHTML = '<tr><td colspan="8">Không tìm thấy sản phẩm nào.</td></tr>';
            }
        }
    </script>
@endpush

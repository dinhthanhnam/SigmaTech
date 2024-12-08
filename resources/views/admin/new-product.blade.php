@extends('admin.app')
@section('content')
    <main class="app-content">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item">Danh sách sản phẩm</li>
                <li class="breadcrumb-item"><b><a href="#">Thêm sản phẩm</a></b></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <h3 class="tile-title">Tạo mới sản phẩm</h3>
                    <form id="add-product-form"method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="productType" class="control-label">Chọn loại sản phẩm</label>
                                <select class="form-control" data-table = ''>
                                    <option value="">-- Chọn loại sản phẩm --</option>
                                    <option value="laptops">Laptop</option>
                                    <option value="cpu">Cpu</option>
                                    <option value="gpu">Gpu</option>
                                    <option value="monitors">Màn hình</option>
                                    <option value="gaming-gear">Gaming gear</option>
                                    <option value="cooling">Tản nhiệt</option>
                                    <option value="media">Loa, Tai nghe, Webcam, Tivi</option>
                                    <option value="accessories">Phụ kiện</option>

                                </select>
                            </div>
                        </div>
                        <div style="display: none;" id="product-add-modal">
                            <div id="product-attributes" class="product-form-container">
                                <!-- Nội dung form sẽ được chèn vào đây -->
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </main>
@endsection
@push('scripts')
    <script>
        document.querySelector('select[data-table]').addEventListener('change', function() {
            const table = this.value; // Loại sản phẩm được chọn
            const productDetailContent = document.getElementById('product-attributes');

            if (!table) {
                productDetailContent.innerHTML = '';
                return; // Không có loại sản phẩm, dừng tại đây
            }

            // Fetch attributes từ server
            fetch(`/admin/new-product/${table}`)
                .then(response => response.json())
                .then(data => {
                    let formAttributes = `<div class="row">`;

                    // Tạo các input dựa trên dữ liệu nhận được
                    data.forEach(attribute => {
                        let inputField = '';

                        if (attribute.includes('Image')) {
                            inputField = `
                        <div style="display: flex; align-items: center;">
                            <img src="" alt="Ảnh sản phẩm" style="max-width: 70px; max-height: 70px;">
                            <input type="file" class="form-control" name="${convertString(attribute)}" />
                        </div>`;
                        } else if (attribute === '[Laptop] Loại laptop') {
                            inputField =
                                `<select class="form-control" name="${convertString(attribute)}">
                                            <option value="Gaming">Gaming</option>
                                            <option value="Office">Office</option>   
                                
                                        </select>`;
                        } else if (attribute === '[GG] Loại thiết bị') {
                            inputField =
                                `<select class="form-control" name="${convertString(attribute)}">
                                            <option value="headphone">Headphone</option>
                                            <option value="keyboard">Keyboard</option>   
                                            <option value="mouse">Mouse</option>                                     
                                        </select>`;
                        } else if (attribute ===
                            '[Cooling] Loại làm mát') {
                            inputField =
                                `<select class="form-control" name="${convertString(attribute)}">
                                            <option value="Liquid Cooler">Liquid Cooler</option>
                                            <option value="Air Cooler">Air Cooler</option>   
                                        </select>`;
                        } else if (attribute === '[Media] Loại thiết bị') {
                            inputField =
                                `<select class="form-control" name="${convertString(attribute)}">
                                            <option value="Webcam">Webcam</option>
                                            <option value="Microphone">Microphone</option>   
                                            <option value="Speaker">Speaker</option>   
                                            <option value="Controller">Controller</option>   
                                        </select>`;
                        } else if (attribute ===
                            '[Accessory] Loại thiết bị') {
                            inputField =
                                `<select class="form-control" name="${convertString(attribute)}">
                                            <option value="Cable">Cable</option>
                                            <option value="Microphone">Microphone</option>   
                                            <option value="Bag">Bag</option>   
                                            <option value="Mount">Mount</option>   
                                            <option value="Controller">Controller</option>   
                                            <option value="Dock">Dock</option>   
                                            <option value="Charger">Charger</option>   
                                            <option value="Memory">Memory</option>   

                                        </select>`;
                        } else if (attribute === 'On Top') {
                            inputField =
                                `<select class="form-control" name="${convertString(attribute)}">
                                            <option value="0">Không</option>
                                            <option value="1">Có</option>   
                                </select>`;
                        } else if (attribute === 'Brand') {
                            inputField =
                                `<select class="form-control" name="${convertString(attribute)}" required>
                                            <option value="">-- Chọn hãng --</option>
                                            <option value="Asus">Asus</option>
                                            <option value="Lenovo">Lenovo</option>   
                                            <option value="Acer">Acer</option>    
                                            <option value="Dell">Dell</option>    
                                            <option value="NVIDIA">NVIDIA</option>
                                            <option value="AMD">AMD</option>    
                                            <option value="Intel">Intel</option>    
                                            <option value="LG">LG</option>       
                                            <option value="BenQ">BenQ</option>    
                                            <option value="Logitech">Logitech</option>
                                            <option value="HyperX">HyperX</option>
                                            <option value="Keychron">Keychron</option>
                                            <option value="SteelSeries">SteelSeries</option>
                                            <option value="Corsair">Corsair</option>    
                                            <option value="Razer">Razer</option> 
                                </select>`;
                        } else if (attribute.includes('Thumbnail')) {
                            inputField = `
                            <div style="display: flex; align-items: center;">
                                <img src="" alt="Ảnh sản phẩm" style="max-width: 70px; max-height: 70px;">
                                <input type="file" class="form-control" name="${convertString(attribute)}" />                           
                            </div>`;
                        } else if (attribute === 'Sale Price' || attribute === 'Tồn kho') {
                            inputField = `
                                <input 
                                    class="form-control" 
                                    name="${convertString(attribute)}" 
                                    type="number" 
                                    min="0" 
                                    step="1" 
                                />`;
                        } else if (attribute === 'Price' || attribute === 'Deal Price') {
                            inputField = `
                                <input 
                                    class="form-control" 
                                    name="${convertString(attribute)}" 
                                    type="number" 
                                    min="0" 
                                    step="1" 
                                    required
                                />`;
                        } else if (attribute === 'Rating') {
                            inputField = `
                                <input 
                                    class="form-control" 
                                    name="${convertString(attribute)}" 
                                    type="number" 
                                    min="0" 
                                    step="any" 
                                    required
                                />`;
                        } else if (attribute.includes('Date')) {
                            inputField = `
                            <input 
                                class="form-control" 
                                name="${convertString(attribute)}" 
                                type="datetime-local" 
                            />`;
                        } else {
                            inputField = `
                        <input class="form-control" name="${convertString(attribute)}" value="" />`;
                        }

                        formAttributes += `
                    <div class="col-md-6 col-lg-4">
                        <div class="form-group col-md-9">
                            <label class="control-label">${attribute}</label>
                            ${inputField}
                        </div>
                    </div>`;
                    });

                    formAttributes += `</div>`;

                    // Chèn nội dung vào modal
                    productDetailContent.innerHTML = `
                                <div class="product-form">
                                    <div class="row">
                                        <div class="col-md-6 col-lg-4">
                                            <div class="form-group col-md-9">
                                                <label class="control-label">Tên sản phẩm</label>
                                                <input class="form-control" type="text" name="name" value="" required/>
                                            </div>
                                        </div>                                                                     
                                    </div>
                                    ${formAttributes}  
                                </div>
                                
                                <div class="mt-3 d-flex justify-content-between">
                                    <button class="btn btn-save" type="submit">Lưu lại</button>
                                </div>
                            `;
                    document.getElementById('product-add-modal').style.display = 'block';
                    document.getElementById('add-product-form').addEventListener(
                        'submit',
                        function(event) {
                            event.preventDefault(); // Ngăn reload trang

                            const formData = new FormData(event.target);

                            fetch(`/admin/new-product/${table}`, {
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
                                        location.reload();
                                    } else {
                                        alert('Cập nhật thất bại!');
                                    }
                                })
                                .catch(error => console.error('Lỗi khi cập nhật:',
                                    error));
                        });
                    document.querySelectorAll('input[required], select[required]').forEach(input => {
                        const parentDiv = input.closest('div'); // Tìm thẻ cha gần nhất
                        const label = parentDiv.querySelector('label'); // Tìm label trong div đó

                        if (label) {
                            const redAsterisk = document.createElement('span');
                            redAsterisk.textContent = ' *'; // Thêm dấu *
                            redAsterisk.style.color = 'red'; // Đặt màu đỏ
                            label.appendChild(redAsterisk); // Gắn vào cuối label
                        }
                    });
                })
                .catch(error => console.error('Error fetching attributes:', error));
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

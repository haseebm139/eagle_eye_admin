@extends('layout.master')
@section('title', 'Add New Product')

@section('style')
    <style>
        .custom-active {
            background-color: #5570f129;
            /* Custom green */
            color: rgb(0, 0, 0);

            padding: 5px;
            border-radius: 12px;
            text-align: center;
        }

        .custom-inactive {
            background-color: #fff2e2;
            /* Custom red */
            color: rgb(0, 0, 0);
            padding: 5px;
            border-radius: 12px;
            text-align: center;
        }

        .ql-container {
            background-color: #f6f7fb;
            height: 20vh;
            border-bottom-right-radius: 12px;
            border-bottom-left-radius: 12px;
        }

        .ql-toolbar.ql-snow {
            border-top-right-radius: 12px;
            border-top-left-radius: 12px;
            background-color: #f6f7fb;
        }

        .product {
            font-family: InterLight;
            color: #abafb1;
            background: #f6f7fb;
            margin: 5px 0;
            padding: 1rem;
            border-radius: 15px;
        }

        .product2 {
            background: white;
            margin: 5px 0;
            padding: 1rem;
            border-radius: 15px;
        }

        .product2 h6 {
            font-family: InterMedium;
        }

        .dropdownbtn {
            padding: 5px 0.75rem;
            font-size: 12px;
            color: #000;
            border-color: none;
            border-radius: 21px;
            background-color: #989ea3;
        }

        .Width {
            width: 100%;
        }

        .Width span {
            font-size: 17px;
            font-weight: 700;
        }

        .cancel {
            border-radius: 20px;
            padding: 3px 2px;
            border: none;
        }







        .dropdown-like {
            display: none;
            /* Initially hidden */
            position: absolute;
            right: 79px;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 10px;
            width: 200px;
            z-index: 100;
        }



        .user-avatar {
            width: 30px;
            height: 30px;
            border-radius: 50%;
        }

        .select {
            font-size: 13px;
            outline: none;
            border: 1px solid #d9d9d9;
            width: 100%;
            border-radius: 4px;
            padding: 8px;
        }








        #prev,
        #next {
            width: 20px;
            height: 20px;
            position: relative;
            border: none;
            background: transparent;
            cursor: pointer;
        }

        #prev::before,
        #next::before {
            content: "";
            width: 50%;
            height: 50%;
            position: absolute;
            top: 50%;
            left: 50%;
            border-style: solid;
            border-width: 0.25em 0.25em 0 0;
            border-color: #ccc;
        }

        #next::before {
            transform: translate(-50%, -50%) rotate(45deg);
        }

        #prev::before {
            transform: translate(-50%, -50%) rotate(-135deg);
        }

        #prev:hover::before,
        #next:hover::before {
            border-color: #000;
        }

        .product-wrapper {
            position: relative;
        }

        .product-wrapper input[type="number"]::-webkit-outer-spin-button,
        .product-wrapper input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* For Firefox */
        .product-wrapper input[type="number"] {
            -moz-appearance: textfield;
        }

        .product-wrapper .quantity-controls {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            display: flex;
            gap: 4px;
            flex-direction: column;
        }

        .product-wrapper .quantity-controls img {
            width: 15px;

            cursor: pointer;
        }

        .subFormleft h6 {
            font-family: InterMedium;
            color: #8b8d97;
        }

        .rightForm h6 {
            font-family: InterMedium;
            color: #8b8d97;
        }

        .discount {
            font-family: InterLight;
            color: #8b8d97;
        }

        .Description {
            color: #8b8d97;
        }


        .ql-editor {
            height: 150px !important;
        }
    </style>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endsection
@section('content')



@section('heading', 'Products')
<div id="dynamic-content">
    <div class="tab-content" id="myTabContent">
        <div class="container-fluid">
            <div class="row justify-content-between align-items-center">
                <div class="col-md-6  mb-3">
                    <span class="ml-2" style="font-size: 17px; font-weight: 700">New Product</span>
                </div>
                <div class="col-md-6  mb-3">
                    <div class="d-flex gap-3 justify-content-end">
                        <div class="ProductDropdownLayout">
                            <select id="itemsPerPage" class="form-select form-select-sm ProductDropdown"
                                style="width: auto">
                                <option value="3">Save as Draft</option>
                                <option value="5">Save as Draft</option>
                                <option value="10">Save as Draft</option>
                            </select>
                            <img src="{{ asset('assets/admin/images/svg/whiteDropdown.svg') }} " />
                        </div>
                        <button id="saveProductFormBtn" class="order-btn2 d-flex align-items-center">
                            save & Publish
                        </button>
                    </div>
                </div>

            </div>

            <form class="container-fluid d-flex gap-3 mb-5" id="product-form" action="" method="post"
                enctype="multipart/form-data">
                <div class="row">
                    <div class="col-xxl-9 col-lg-8 col-md-8 col-sm-12">
                        <div class="mainBar">
                            <div class="row">
                                <div class="col-md-6 rightForm">
                                    <div class="row">
                                        <div class="inpuBox col-md-12 mb-3">
                                            <input name="name" class="product" placeholder="Product Name" />
                                        </div>

                                        <div class=" col-md-12 mb-3">
                                            <select id="itemsPerPage" name="category"
                                                class="form-select form-select-sm ProductList">
                                                <option value="3">Select Product Category</option>
                                                <option value="5">page</option>
                                                <option value="10">per page</option>
                                            </select>
                                        </div>

                                        <div class="inpuBox d-flex gap-2  col-md-12 mb-3">
                                            <input class="product" name="sell_price" placeholder="Selling Price" />
                                            <input class="product" name="cost_price" placeholder="Cost Price" />
                                        </div>

                                        <div class="inpuBox product-wrapper col-md-12 mb-3">
                                            <input type="number" class="product quantityInput" name="stock"
                                                id="quantityInput" placeholder="Quantity in Stock" />


                                            <div class="quantity-controls">
                                                <img class="up-btn" id="increaseBtn" aria-label="Increase quantity"
                                                    src="{{ asset('assets/admin/images/svg/Polygon_1_(1).svg') }}" />
                                                <img class="down-btn" id="decreaseBtn" aria-label="Decrease quantity"
                                                    src="{{ asset('assets/admin/images/svg/Polygon_1.svg') }}" />
                                            </div>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <select id="itemsPerPage" class="form-select form-select-sm ProductList">
                                                <option value="3">Order Type</option>
                                                <option value="5">page</option>
                                                <option value="10">per page</option>
                                            </select>
                                        </div>

                                        <div class="d-flex justify-content-between align-items-center">
                                            <h6>Discount</h6>
                                            <div class="d-flex align-items-center gap-3">
                                                <p class="discount">Add Discount</p>
                                                <div class="">
                                                    <label class="switch">
                                                        <input type="checkbox" name="discount" id="toggleSwitch" />
                                                        <span class="slider"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-between align-items-center">
                                            <h6>Expiry Date</h6>
                                            <div class="d-flex align-items-center gap-3">
                                                <p class="discount">Add Expiry Date</p>
                                                <div class="">
                                                    <label class="switch">
                                                        <input type="checkbox" name="expiry_date" id="toggleSwitch1" />
                                                        <span class="slider"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-6 subFormleft">
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <textarea id="w3review" name="short_description" rows="4" class="w-100" cols="50"
                                                placeholder="Short Description"></textarea>

                                        </div>
                                        <div class="col-md-12  mb-3 w-100 h-100">
                                            <label for="productDescription" class="form-label Description ">Product
                                                Long
                                                Description</label>

                                            <div id="toolbar">
                                                <!-- Font options -->
                                                <select class="ql-font"></select>
                                                <!-- Paragraph format -->
                                                <select class="ql-header">
                                                    <option selected></option>
                                                    <option value="1"></option>
                                                    <option value="2"></option>
                                                </select>
                                                <!-- Text formatting options -->
                                                <button class="ql-bold"></button>
                                                <button class="ql-underline"></button>
                                                <button class="ql-italic"></button>
                                                <!-- Alignment options -->
                                                <button class="ql-align" value=""></button>
                                                <button class="ql-align" value="center"></button>
                                                <button class="ql-align" value="right"></button>
                                            </div>
                                            <div id="editor">

                                            </div>


                                            <div class="form-text mt-2 " style="color: #8f8787">Add a long description
                                                for
                                                your
                                                product</div>
                                        </div>
                                        <div class="col-md-12 mb-1">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h6>Return Policy</h6>
                                                <div class="d-flex align-items-center gap-3">
                                                    <p class="discount">Add Discount</p>
                                                    <div class="">
                                                        <label class="switch">
                                                            <input type="checkbox" name="discount2"
                                                                id="toggleSwitch2" />
                                                            <span class="slider"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-md-12 mb-1">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h6>Min Order</h6>
                                                <div class="d-flex align-items-center gap-3">
                                                    <div>
                                                        <label class="switch">
                                                            <input type="checkbox" name="min_order"
                                                                id="toggleSwitch3" onclick="toggleMinOrderValue()"
                                                                aria-label="Toggle Minimum Order" />
                                                            <span class="slider"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column dateTime  " id="minOrderValueContainer"
                                            style="display: none;">
                                            <p>Min Order Value</p>
                                            <div class="d-flex gap-3">
                                                <input name="min_order_value" type="number" class="date"
                                                    value="1" min="1" aria-label="Minimum Order Value" />
                                            </div>
                                        </div>
                                        <div class="col-md-12">

                                            <div class="d-flex flex-column dateTime">
                                                <p>Date & Time</p>
                                                <div class="d-flex gap-3">
                                                    <input name="date" type="date" class="date"
                                                        value="2024-01-01" />
                                                    <input name="time" type="time" class="date"
                                                        value="00:00" />
                                                </div>
                                            </div>

                                        </div>
                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-md-4 col-sm-12">

                        <div class="leftBar w-100">


                            <div class="d-flex flex-column justify-content-center align-items-center image-uploader gap-3"
                                id="imageUploader" onclick="document.getElementById('imageInput').click()">
                                <!-- Preview Image Container -->
                                <img id="previewImage" class="previewImage"
                                    src="{{ asset('assets/admin/images/Image.png') }} "
                                    style="width: 30px; transition: all 0.5s ease;" />

                                <div class="d-flex justify-content-center align-items-center gap-2"
                                    id="uploadPlaceholder">
                                    <img src="{{ asset('assets/admin/images/svg/fi_upload-cloud.svg') }} " />
                                    <h6>Upload Image</h6>
                                </div>

                                <p class="text-center">Upload a cover image for your product. <br />
                                    File Format <span class="bold2">jpeg, png </span>Recommended Size <span
                                        class="bold2">600x600
                                        (1:1)</span>
                                </p>

                                <!-- Hidden Input for Image Upload -->
                                <input type="file" name="image[]" id="imageInput" style="display: none;"
                                    accept="image/jpeg, image/png" onchange="previewUploadedFile(event)" />
                            </div>



                            <div class="mt-3">
                                <h6>Additional Images</h6>
                                <div class="d-flex flex-wrap gap-1 ">

                                    <div class="d-flex flex-column justify-content-center align-items-center image-uploader2 gap-3"
                                        id="imageUploader2" onclick="document.getElementById('imageInput2').click()">
                                        <!-- Preview Image Container -->
                                        <img id="previewImage2" class="previewImage"
                                            src="{{ asset('assets/admin/images/Image.png') }} "
                                            style="width: 30px; transition: all 0.5s ease;" />

                                        <div class="d-flex justify-content-center align-items-center gap-2 flex-wrap"
                                            id="uploadPlaceholder2">
                                            <img src="{{ asset('assets/admin/images/svg/fi_upload-cloud.svg') }} "
                                                style="width: 16px;" />
                                            <p class="bold2 p-0 m-0">Upload Image</p>
                                        </div>

                                        <!-- Hidden Input for Image Upload -->
                                        <input type="file" name="image[]" id="imageInput2" style="display: none;"
                                            accept="image/jpeg, image/png" onchange="previewUploadedFile2(event)" />
                                    </div>


                                    <div class="d-flex flex-column justify-content-center align-items-center image-uploader3 gap-3"
                                        id="imageUploader3" onclick="document.getElementById('imageInput3').click()">
                                        <!-- Preview Image Container -->
                                        <img id="previewImage3" class="previewImage"
                                            src="{{ asset('assets/admin/images/Image.png') }} "
                                            style="width: 0px; transition: all 0.5s ease;" />

                                        <!-- Hidden Input for Image Upload -->
                                        <input type="file" name="image[]" id="imageInput3" style="display: none;"
                                            accept="image/jpeg, image/png" onchange="previewUploadedFile3(event)" />
                                    </div>





                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </form>
        </div>
    </div>

</div>




@endsection
@section('script')
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script>
    function getStatusClass(status) {
        return status === "Active" ? "custom-active" : "custom-inactive";
    }
    var quill = new Quill('#editor', {
        theme: 'snow',
        modules: {
            toolbar: '#toolbar'
        },
        placeholder: 'Your text goes here'
    });
</script>
<script>
    const quantityInput = document.getElementById('quantityInput');
    const increaseBtn = document.getElementById('increaseBtn');
    const decreaseBtn = document.getElementById('decreaseBtn');

    // Function to increase value
    increaseBtn.addEventListener('click', () => {
        const currentValue = parseInt(quantityInput.value) || 0;
        quantityInput.value = currentValue + 1;
    });

    // Function to decrease value
    decreaseBtn.addEventListener('click', () => {
        const currentValue = parseInt(quantityInput.value) || 0;
        if (currentValue > 0) {
            quantityInput.value = currentValue - 1;
        }
    });
</script>


{{-- Haseeb Memon --}}
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                    'content') // Assuming you have the token in a meta tag
            }
        });

        function saveProduct(data) {
            $.ajax({
                url: "{{ route('product.add') }}",
                type: 'POST',
                data: data,
                processData: false, // Prevent jQuery from processing the data
                contentType: false, // Prevent jQuery from setting contentType
                success: function(response) {


                    if (response.success == true) {
                        toastr.success(response.message);
                        $('#product-form')[0].reset();

                        // If you're using a rich text editor like Quill, reset the editor content
                        quill.root.innerHTML = '';

                    }

                    if (response.success == false) {

                        toastr.error(response.message);


                    }


                },

            });

        }
        $('#saveProductFormBtn').on('click', function(e) {
            e.preventDefault(); // Prevent default form submission

            // Collect form data
            let formData = new FormData($('#product-form')[0]);
            formData.append('status', 1);
            let description = quill.root.innerHTML; // Get the editor content
            formData.append('long_description', description);

            // let discountChecked = $('#toggleSwitch').is(':checked'); // Check if the checkbox is checked
            // formData.append('is_discount', discountChecked ? '1' :
            //     '0'); // Append '1' if checked, '0' if unchecked

            // let expiryChecked = $('#toggleSwitch1').is(':checked'); // Check if the checkbox is checked
            // formData.append('is_expire', expiryChecked ? '1' :
            //     '0'); // Append '1' if checked, '0' if unchecked

            // let discountChecked1 = $('#toggleSwitch3').is(
            //     ':checked'); // Check if the checkbox is checked
            // formData.append('is_discount2', discountChecked1 ? '1' :
            //     '0'); // Append '1' if checked, '0' if unchecked
            saveProduct(formData)

            // Post the form data via AJAX

        });


        // Toggle visibility on checkbox change
        $('#toggleSwitch3').on('change', function() {
            if ($(this).is(':checked')) {

                $('#minOrderValueContainer').show();
            } else {
                $('#minOrderValueContainer').hide();
            }
        });

        // Initialize visibility based on the checkbox state when the page loads
        if ($('#toggleSwitch3').is(':checked')) {
            $('#minOrderValueContainer').show();
        } else {
            $('#minOrderValueContainer').hide();
        }
    });
</script>
@endsection

@extends('layout.master')
@section('title', 'Add New Product')

@section('style')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endsection
@section('content')


    <div class="toggle-btn" id="toggle-btn">
        <img src="{{ asset('admin/assets/images/svg/Home.svg') }} " />
    </div>
    <div class="dashboard-header d-flex align-items-center justify-content-between">
        <h3 id="page-title">Add Product</h3>
        <div class="d-flex align-items-center gap-3">
            <div class="dropdown-container position-relative">
                <select id="data-category" class="form-control3 d-inline w-auto">
                    <option value="Revenue">Eagle eye</option>
                    <option value="Expenses">This Week</option>
                    <option value="Profit Margin">This Week</option>
                </select>
                <span class="dropdown-icon"></span>
                <!-- Down arrow icon -->
            </div>
            <img src="{{ asset('admin/assets/images/svg/Notification.svg') }}" class="avatar" alt="Avatar" />
        </div>
    </div>
    <div id="dynamic-content">
        <div class="tab-content" id="myTabContent">
            <!-- //tab of dasboard -->
            <div class="blue tab-pane fade" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                <div class="container-fluid">
                    <div class="d-flex gap-3">
                        <div class="" style="width: 30%">
                            <div class="card text-center">
                                <div class="alignemnt">
                                    <img src="{{ asset('admin/assets/images/svg/icon1.svg') }} " />
                                    <div class="leftAlignement">
                                        <div class="dropdown-container position-relative">
                                            <select id="data-category" class="form-control2 d-inline w-auto">
                                                <option value="Revenue">This Week</option>
                                                <option value="Expenses">This Week</option>
                                                <option value="Profit Margin">This Week</option>
                                            </select>
                                            <span class="dropdown-icon"></span>
                                            <!-- Down arrow icon -->
                                        </div>
                                        <!-- <p class="side-text">This Week</p> -->
                                    </div>
                                </div>

                                <div class="bottomContent">
                                    <span>
                                        <p class="sales">Total Sales</p>
                                        <p class="bold">$4,000,000.00</p>
                                    </span>
                                    <span>
                                        <p class="sales">Volume</p>
                                        <p class="bold">
                                            450 <span class="rates">+20.00%</span>
                                        </p>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class=" " style="width: 30%">
                            <div class="card text-center">
                                <div class="alignemnt">
                                    <img src="{{ asset('admin/assets/images/svg/icon2.svg') }} " />
                                    <div class="leftAlignement">
                                        <div class="dropdown-container position-relative">
                                            <select id="data-category" class="form-control2 d-inline w-auto">
                                                <option value="Revenue">This Week</option>
                                                <option value="Expenses">This Week</option>
                                                <option value="Profit Margin">This Week</option>
                                            </select>
                                            <span class="dropdown-icon"></span>
                                            <!-- Down arrow icon -->
                                        </div>
                                    </div>
                                </div>

                                <div class="bottomContent">
                                    <span>
                                        <p class="sales">Customers</p>
                                        <p class="bold">
                                            1,250 <span class="rates">+15.80%</span>
                                        </p>
                                    </span>
                                    <span>
                                        <p class="sales">Active</p>
                                        <p class="bold">
                                            1,180 <span class="rates"> 85%</span>
                                        </p>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="" style="width: 40%">
                            <div class="card text-center">
                                <div class="alignemnt">
                                    <img src="{{ asset('admin/assets/images/svg/icon2.svg') }} " />
                                    <div class="leftAlignement">
                                        <div class="dropdown-container position-relative">
                                            <select id="data-category" class="form-control2 d-inline w-auto">
                                                <option value="Revenue">This Week</option>
                                                <option value="Expenses">This Week</option>
                                                <option value="Profit Margin">This Week</option>
                                            </select>
                                            <span class="dropdown-icon"></span>
                                            <!-- Down arrow icon -->
                                        </div>
                                    </div>
                                </div>

                                <div class="bottomContent">
                                    <span>
                                        <p class="sales">All Orders</p>
                                        <p class="bold">450</p>
                                    </span>
                                    <span>
                                        <p class="sales">Pending</p>
                                        <p class="bold">5</p>
                                    </span>

                                    <span>
                                        <p class="sales">Completed</p>
                                        <p class="bold">445</p>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex gap-3 layout mt-3">
                        <div class="rightSideContent">
                            <div class="d-flex gap-3">
                                <div class="alignmentOfPIChart">
                                    <div class="card text-center" style="gap: 0; height: 100%">
                                        <div class="alignemnt">
                                            <h6>Marketting</h6>
                                            <div class="leftAlignement">
                                                <div class="dropdown-container position-relative">
                                                    <select id="data-category" class="form-control2 d-inline w-auto">
                                                        <option value="Revenue">This Week</option>
                                                        <option value="Expenses">This Week</option>
                                                        <option value="Profit Margin">This Week</option>
                                                    </select>
                                                    <span class="dropdown-icon"></span>
                                                    <!-- Down arrow icon -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="container text-center">
                                            <div class="legend-container" id="legend-container"></div>
                                            <div class="chart-container mt-4">
                                                <canvas id="myChart"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sec-section d-flex flex-column gap-3">
                                    <div class="card text-center">
                                        <div class="alignemnt">
                                            <img src="{{ asset('admin/assets/images/svg/Folder.svg') }} " />
                                            <div class="leftAlignement">

                                            </div>
                                        </div>

                                        <div class="bottomContent">
                                            <span>
                                                <p class="sales">All Products</p>
                                                <p class="bold">45</p>
                                            </span>

                                            <span>
                                                <p class="sales">Active</p>
                                                <p class="bold">
                                                    32 <span class="rates">+24%</span>
                                                </p>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="card text-center">
                                        <div class="alignemnt">
                                            <img src="{{ asset('admin/assets/images/svg/cart.svg') }}" />
                                            <div class="leftAlignement">
                                                <p class="side-text">This Week</p>
                                                <img src="{{ asset('admin/assets/images/svg/Vector.svg') }} " />
                                            </div>
                                        </div>

                                        <div class="bottomContent">
                                            <span>
                                                <p class="sales" style="color: red">
                                                    Abandoned Cart
                                                </p>
                                                <p class="bold">
                                                    20% <span class="rates">+0.00%</span>
                                                </p>
                                            </span>

                                            <span>
                                                <p class="sales">Customers</p>
                                                <p class="bold">30</p>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row section-three">
                                <div class="container container-2 g-3 mt-3 text-center">
                                    <!-- Dropdowns for selecting data type and date range -->
                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <div class="d-flex gap-3 align-items-center">
                                            <h6>Custom Summary</h6>
                                            <div class="dropdown-container position-relative">
                                                <select id="data-category" class="form-control d-inline w-auto">
                                                    <option value="Revenue">Sales</option>
                                                    <option value="Expenses">Expenses</option>
                                                    <option value="Profit Margin">
                                                        Profit Margin
                                                    </option>
                                                </select>
                                                <span class="dropdown-icon"><img
                                                        src="{{ asset('admin/assets/images/svg/fi_chevron-down.svg') }} " /></span>
                                                <!-- Down arrow icon -->
                                            </div>
                                        </div>
                                        <div>
                                            <select id="time-range" class="form-control d-inline w-auto">
                                                <option value="7">Past 7 Days</option>
                                                <option value="14">Past 14 Days</option>
                                                <option value="30">Past 30 Days</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Chart Container -->
                                    <div class="custom-chart-container">
                                        <div class="custom-chart-card">
                                            <canvas id="customBarChart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="leftSideContent">
                            <div class="side_card">
                                <img src="{{ asset('admin/assets/images/svg/iconContainer.svg') }} " class="lock" />
                                <div>
                                    <h6>No Orders Yet?</h6>
                                    <p>
                                        Add products to your store and start <br />
                                        selling to see orders here.
                                    </p>
                                    <button class="productBtn">+ New Product</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- //tab of orders -->
            <div class="red tab-pane fade e" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between align-items-center" style="width: 100%">
                        <span class="my-2 ml-2" style="font-size: 17px; font-weight: 700">Order Summary</span>
                        <button class="order-btn d-flex align-items-center">
                            +
                            <pre></pre>
                            create a new Order
                        </button>
                    </div>
                    <div class="d-flex gap-3">
                        <div class="" style="width: 35%">
                            <div class="card text-center">
                                <div class="alignemnt">
                                    <img src="{{ asset('admin/assets/images/svg/icon1.svg') }} " />
                                    <div class="leftAlignement">
                                        <div class="dropdown-container position-relative">
                                            <select id="data-category" class="form-control2 d-inline w-auto">
                                                <option value="Revenue">This Week</option>
                                                <option value="Expenses">This Week</option>
                                                <option value="Profit Margin">This Week</option>
                                            </select>
                                            <span class="dropdown-icon"></span>
                                            <!-- Down arrow icon -->
                                        </div>
                                        <!-- <p class="side-text">This Week</p> -->
                                    </div>
                                </div>

                                <div class="bottomContent">
                                    <span>
                                        <p class="sales">Total Sales</p>
                                        <p class="bold">$4,000,000.00</p>
                                    </span>
                                    <span>
                                        <p class="sales">Volume</p>
                                        <p class="bold">
                                            450 <span class="rates">+20.00%</span>
                                        </p>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class=" " style="width: 35%">
                            <div class="card text-center">
                                <div class="alignemnt">
                                    <img src="{{ asset('admin/assets/images/svg/icon2.svg') }} " />
                                    <div class="leftAlignement">
                                        <div class="dropdown-container position-relative">
                                            <select id="data-category" class="form-control2 d-inline w-auto">
                                                <option value="Revenue">This Week</option>
                                                <option value="Expenses">This Week</option>
                                                <option value="Profit Margin">This Week</option>
                                            </select>
                                            <span class="dropdown-icon"></span>
                                            <!-- Down arrow icon -->
                                        </div>
                                    </div>
                                </div>

                                <div class="bottomContent">
                                    <span>
                                        <p class="sales">Customers</p>
                                        <p class="bold">
                                            1,250 <span class="rates">+15.80%</span>
                                        </p>
                                    </span>
                                    <span>
                                        <p class="sales">Active</p>
                                        <p class="bold">
                                            1,180 <span class="rates"> 85%</span>
                                        </p>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="" style="width: 30%">
                            <div class="card text-center">
                                <div class="alignemnt">
                                    <img src="{{ asset('admin/assets/images/svg/icon2.svg') }} " />
                                    <div class="leftAlignement">
                                        <div class="dropdown-container position-relative">
                                            <select id="data-category" class="form-control2 d-inline w-auto">
                                                <option value="Revenue">This Week</option>
                                                <option value="Expenses">This Week</option>
                                                <option value="Profit Margin">This Week</option>
                                            </select>
                                            <span class="dropdown-icon"></span>
                                            <!-- Down arrow icon -->
                                        </div>
                                    </div>
                                </div>

                                <div class="bottomContent">
                                    <span>
                                        <p class="sales">All Orders</p>
                                        <p class="bold">450</p>
                                    </span>
                                    <span>
                                        <p class="sales">Pending</p>
                                        <p class="bold">5</p>
                                    </span>

                                    <span>
                                        <p class="sales">Completed</p>
                                        <p class="bold">445</p>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="red tab-pane fade" id="customers" role="tabpanel" aria-labelledby="customers-tab">
                customers.
            </div>


            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center my-3" style="width: 100%">
                    <span class="my-2 ml-2" style="font-size: 17px; font-weight: 700">New Product</span>
                    <div class="d-flex gap-3">
                        <div class="ProductDropdownLayout">
                            <select id="itemsPerPage" class="form-select form-select-sm ProductDropdown"
                                style="width: auto">
                                <option value="3">Save as Draft</option>
                                <option value="5">Save as Draft</option>
                                <option value="10">Save as Draft</option>
                            </select>
                            <img src="{{ asset('admin/assets/images/svg/whiteDropdown.svg') }} " />
                        </div>
                        <button class="order-btn2 d-flex align-items-center">
                            save & Publish
                        </button>
                    </div>
                </div>

                <div class="container-fluid d-flex gap-3 mb-5">
                    <div class="mainBar">
                        <form class="d-flex gap-5">
                            <div class="d-flex flex-column gap-3 rightForm">
                                <div class="inpuBox">
                                    <input class="product" placeholder="Product Name" />
                                </div>

                                <div class="">
                                    <select id="itemsPerPage" class="form-select form-select-sm ProductList">
                                        <option value="3">Select Product Category</option>
                                        <option value="5">page</option>
                                        <option value="10">per page</option>
                                    </select>
                                </div>

                                <div class="inpuBox d-flex gap-2">
                                    <input class="product" placeholder="Selling Price" />
                                    <input class="product" placeholder="Product Name" />
                                </div>

                                <div class="inpuBox">
                                    <input type="number" class="product" placeholder="Quantity in Stock" />
                                </div>

                                <div class="">
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
                                                <input type="checkbox" id="toggleSwitch" />
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
                                                <input type="checkbox" id="toggleSwitch" />
                                                <span class="slider"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="subFormleft">
                                <textarea id="w3review" name="w3review" rows="4" cols="50" placeholder="Short Description"></textarea>

                                <div class="mb-3 mt-3" style="width: 100%;">
                                    <label for="productDescription" class="form-label Description ">Product Long
                                        Description</label>

                                    <div class="editor-toolbar " style="background-color:#eeeef0;">
                                        <select id="fontFamily" class="form-select d-inline-block  ProductList Fonts">
                                            <option selected>Roboto</option>
                                            <option>Arial</option>
                                            <option>Times New Roman</option>
                                            <option>Verdana</option>
                                        </select>

                                        <select id="fontSize" class="form-select d-inline-block  ProductList Fonts">
                                            <option selected>Paragraph</option>
                                            <option>Heading 1</option>
                                            <option>Heading 2</option>
                                            <option>Heading 3</option>
                                        </select>

                                        <!-- Formatting Buttons -->
                                        <button class="btn btn-light" onclick="formatText('bold')"><b>B</b></button>
                                        <button class="btn btn-light" onclick="formatText('underline')"><u>U</u></button>
                                        <button class="btn btn-light" onclick="formatText('italic')"><img
                                                src="{{ asset('admin/assets/images/svg/fi_italic.svg') }} " /></button>
                                        <button class="btn btn-light" onclick="formatText('justifyCenter')"><img
                                                src="{{ asset('admin/assets/images/svg/fi_align-justify.svg') }} " /></button>
                                        <button class="btn btn-light" onclick="formatText('justifyRight')"><img
                                                src="{{ asset('admin/assets/images/svg/fi_align-right.svg') }} " /></button>
                                        <button class="btn btn-light" onclick="formatText('justifyLeft')"><img
                                                src="{{ asset('admin/assets/images/svg/fi_align-left.svg') }} " /></button>
                                        <button class="btn btn-light" onclick="formatText('createLink')"><img
                                                src="{{ asset('admin/assets/images/svg/fi_link-2.svg') }} " /></button>
                                    </div>
                                    {{-- <div id="toolbar">
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
                                        <p>Your text goes here</p>
                                    </div> --}}
                                    <!-- Editable Content Area -->
                                    <div id="productDescription" class="form-control Productform-control"
                                        contenteditable="true">
                                        Your text goes here
                                    </div>

                                    <div class="form-text mt-2 " style="color: #8f8787">Add a long description for
                                        your product</div>
                                </div>

                                <div class="d-flex justify-content-between align-items-center">
                                    <h6>Return Policy</h6>
                                    <div class="d-flex align-items-center gap-3">
                                        <p class="discount">Add Discount</p>
                                        <div class="">
                                            <label class="switch">
                                                <input type="checkbox" id="toggleSwitch" />
                                                <span class="slider"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex flex-column dateTime">
                                    <p>Date & Time</p>
                                    <div class="d-flex gap-3">
                                        <input type="date" class="date" value="2024-01-01" />
                                        <input type="time" class="date" value="00:00" />
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                    <div class="leftBar">


                        <div class="d-flex flex-column justify-content-center align-items-center image-uploader gap-3"
                            id="imageUploader" onclick="document.getElementById('imageInput').click()">
                            <!-- Preview Image Container -->
                            <img id="previewImage" class="previewImage"
                                src="{{ asset('admin/assets/images/Image.png') }} " />

                            <div class="d-flex justify-content-center align-items-center gap-2" id="uploadPlaceholder">
                                <img src="{{ asset('admin/assets/images/svg/fi_upload-cloud.svg') }} " />
                                <h6>Upload Image</h6>
                            </div>

                            <p class="text-center">Upload a cover image for your product. <br />
                                File Format <span class="bold2">jpeg, png </span>Recommened Size <span
                                    class="bold2">600x600 (1:1)</span>
                            </p>

                            <!-- Hidden Input for Image Upload -->
                            <input type="file" id="imageInput" style="display: none;" accept="image/jpeg, image/png"
                                onchange="previewUploadedFile(event)" />
                        </div>


                        <div class="mt-3">
                            <h6>Additional Images</h6>
                            <div class="d-flex gap-3 ">

                                <div class="d-flex flex-column justify-content-center align-items-center image-uploader2 gap-3"
                                    id="imageUploader" onclick="document.getElementById('imageInput').click()">
                                    <!-- Preview Image Container -->
                                    <img id="previewImage" class="previewImage"
                                        src="{{ asset('admin/assets/images/Image.png') }} " style="width: 30px;" />

                                    <div class="d-flex justify-content-center align-items-center gap-2 flex-wrap"
                                        id="uploadPlaceholder">
                                        <img src="{{ asset('admin/assets/images/svg/fi_upload-cloud.svg') }} "
                                            style="width: 16px;" />
                                        <p class="bold2 p-0 m-0">Upload Image</p>
                                    </div>



                                    <!-- Hidden Input for Image Upload -->
                                    <input type="file" id="imageInput" style="display: none;"
                                        accept="image/jpeg, image/png" onchange="previewUploadedFile(event)" />
                                </div>

                                <div class="d-flex flex-column justify-content-center align-items-center image-uploader3 gap-3"
                                    id="imageUploader" onclick="document.getElementById('imageInput').click()">
                                    <!-- Preview Image Container -->
                                    <img id="previewImage" class="previewImage"
                                        src="{{ asset('admin/assets/images/Image.png') }} " style="display: none;" />

                                    <!-- Hidden Input for Image Upload -->
                                    <input type="file" id="imageInput" style="display: none;"
                                        accept="image/jpeg, image/png" onchange="previewUploadedFile(event)" />
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="purple tab-pane fade" id="settings" role="tabpanel" aria-labelledby="settings-tab">
            settings.
        </div>
    </div>
    </div>



@endsection
@section('script')
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script>
        var quill = new Quill('#editor', {
            theme: 'snow',
            modules: {
                toolbar: '#toolbar'
            }
        });
    </script>
    <script>
        // Inject the fetched page content into the specific area
        async function fetchData() {
            try {
                const response = await fetch("your-api-endpoint-here"); // Replace with your API endpoint
                const data = await response.text(); // Assuming you want to inject HTML
                const dynamicContentArea = document.getElementById("dynamic-content");
                dynamicContentArea.innerHTML = data;
            } catch (error) {
                console.error("Error fetching data:", error);
            }
        }

        fetchData(); // Call the function to fetch an








        document.addEventListener("DOMContentLoaded", function() {
            const products = [{
                    id: 1,
                    name: 'CET 126" UV Printer',
                    category: "Printer",
                    price: "$1,500",
                    stock: 50,
                    discount: "5%",
                    value: "$75,000",
                    status: "Active",
                },
                {
                    id: 2,
                    name: "Graphtec FC8000 Cutter",
                    category: "Cutter",
                    price: "$2,000",
                    stock: 30,
                    discount: "10%",
                    value: "$60,000",
                    status: "Inactive",
                },
                {
                    id: 3,
                    name: "Graphtec FC9000",
                    category: "Cutter",
                    price: "$2,500",
                    stock: 25,
                    discount: "15%",
                    value: "$62,500",
                    status: "Active",
                },
                {
                    id: 4,
                    name: "High-Speed Sewing Machine",
                    category: "Machine",
                    price: "$1,200",
                    stock: 80,
                    discount: "8%",
                    value: "$96,000",
                    status: "Active",
                },
                {
                    id: 5,
                    name: "Wide-Format Laminator",
                    category: "Laminator",
                    price: "$900",
                    stock: 15,
                    discount: "12%",
                    value: "$13,500",
                    status: "Inactive",
                },
                {
                    id: 6,
                    name: "Graphic Cutter",
                    category: "Cutter",
                    price: "$1,700",
                    stock: 20,
                    discount: "20%",
                    value: "$34,000",
                    status: "Active",
                },
                {
                    id: 7,
                    name: "Industrial Printer",
                    category: "Printer",
                    price: "$5,500",
                    stock: 10,
                    discount: "7%",
                    value: "$55,000",
                    status: "Active",
                },
                {
                    id: 8,
                    name: "Laser Cutter",
                    category: "Cutter",
                    price: "$8,500",
                    stock: 5,
                    discount: "5%",
                    value: "$42,500",
                    status: "Inactive",
                },
            ];

            let currentPage = 1;
            let rowsPerPage = 3;

            const tableBody = document.getElementById("table-body");
            const itemsPerPageSelect = document.getElementById("itemsPerPage");
            const showingInfo = document.getElementById("showing-info");
            const prevPageBtn = document.getElementById("prev-page");
            const nextPageBtn = document.getElementById("next-page");
            const selectAllCheckbox = document.getElementById("select-all");
            // Function to render table rows for the current page
            function renderTableRows() {
                tableBody.innerHTML = "";
                const start = (currentPage - 1) * rowsPerPage;
                const end = start + rowsPerPage;
                const visibleProducts = products.slice(start, end);

                visibleProducts.forEach((product) => {
                    const statusClass =
                        product.status === "Active" ? "custom-active" : "custom-inactive";
                    console.log(statusClass, "product");

                    // Custom classes for status
                    const row =
                        `
                                                                                                                                                                                                  <tr>
                                                                                                                                                                                                      <td>
                                                                                                                                                                                                            <label class="custom-checkbox">
                                                                                                                                                                                                                              <input type="checkbox" class="product-checkbox" data-id="${product.id}">
                                                                                                                                                                                                                              <span class="checkmark"></span>
                                                                                                                                                                                                                          </label>

                                                                                                                                                                                                          </td>
                                                                                                                                                                                                      <td><img src="{{ asset('admin/assets/images/Rectangle 3.png') }} " /></td>
                                                                                                                                                                                                      <td>${product.name}</td>
                                                                                                                                                                                                      <td>${product.category}</td>
                                                                                                                                                                                                      <td>${product.price}</td>
                                                                                                                                                                                                      <td>${product.stock}</td>
                                                                                                                                                                                                      <td>${product.discount}</td>
                                                                                                                                                                                                      <td>${product.value}</td>
                                                                                                                                                                                                      <td>
                                                                                                                                                                                                           <div class="dropdown">
                                                                                                                                                                                                          <button style="
                      padding: 5px .75rem;
                      font-size: 12px;
                      color: #000;
                      border-color: none;
  border-radius: 21px;
  background-color: #989ea3;
                      " class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                                                                                                                                              Action
                                                                                                                                                                                                          </button>
                                                                                                                                                                                                          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                                                                                                                                                              <li><a style="font-size: 13px;" class="dropdown-item" href="#">Edit</a></li>
                                                                                                                                                                                                              <li><a style="font-size: 13px;" class="dropdown-item" href="#">Delete</a></li>
                                                                                                                                                                                                              <li><a style="font-size: 13px;" class="dropdown-item" href="#">View</a></li>
                                                                                                                                                                                                          </ul>
                                                                                                                                                                                                      </div>
                                                                                                                                                                                                          </td>
                                                                                                                                                                                                      <td><p class="${statusClass}">${product.status}</p></td>
                                                                                                                                                                                                  </tr>`;
                    tableBody.insertAdjacentHTML("beforeend", row);
                });
                updatePaginationInfo();
            }

            // Function to update the pagination info
            function updatePaginationInfo() {
                const totalItems = products.length;
                const startItem = (currentPage - 1) * rowsPerPage + 1;
                const endItem = Math.min(startItem + rowsPerPage - 1, totalItems);
                const totalPages = Math.ceil(totalItems / rowsPerPage);

                showingInfo.textContent = `${startItem}-${endItem} of ${totalItems} items`;

                prevPageBtn.parentElement.classList.toggle(
                    "disabled",
                    currentPage === 1
                );
                nextPageBtn.parentElement.classList.toggle(
                    "disabled",
                    currentPage === totalPages
                );
            }
            // Event listener for the select-all checkbox
            selectAllCheckbox.addEventListener("change", function() {
                const allCheckboxes = document.querySelectorAll(".product-checkbox");
                allCheckboxes.forEach((checkbox) => {
                    checkbox.checked = selectAllCheckbox.checked;
                });
            });

            // Check if all checkboxes are selected and update the "Select All" checkbox
            function checkIfAllSelected() {
                const rowCheckboxes = document.querySelectorAll(".row-checkbox");
                const allChecked = Array.from(rowCheckboxes).every(
                    (checkbox) => checkbox.checked
                );
                selectAllCheckbox.checked = allChecked;
            }
            // Event listener for items per page change
            itemsPerPageSelect.addEventListener("change", function() {
                rowsPerPage = parseInt(this.value);
                currentPage = 1; // Reset to first page when changing rows per page
                renderTableRows();
            });

            // Event listener for next page button
            nextPageBtn.addEventListener("click", function(e) {
                e.preventDefault();
                const totalPages = Math.ceil(products.length / rowsPerPage);
                if (currentPage < script totalPages) {
                    currentPage++;
                    renderTableRows();
                }
            });

            // Event listener for previous page button
            prevPageBtn.addEventListener("click", function(e) {
                e.preventDefault();
                if (currentPage > 1) {
                    currentPage--;
                    renderTableRows();
                }
            });

            // Initial render
            renderTableRows();
        }); <
        />
    @endsection

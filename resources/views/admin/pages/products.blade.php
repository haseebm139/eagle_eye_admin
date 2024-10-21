@extends('layout.master')
@section('title', 'PRODUCTS')

@section('style')
    <style>
        @font-face {
            font-family: poppinsBold;
            src: url("fonts/Poppins/Poppins-Bold.ttf");
        }

        @font-face {
            font-family: InterMedium;
            src: url("fonts/Inter/static/Inter_18pt-Medium.ttf");
        }

        @font-face {
            font-family: InterLight;
            src: url("fonts/Inter/static/Inter_18pt-ExtraLight.ttf");
        }

        @font-face {
            font-family: poppinsMedium;
            src: url("fonts/Poppins/Poppins-Medium.ttf");
        }

        .viewOrderDetails {
            font-family: InterMedium;
            font-size: 13px;
        }

        .viewOrderDetails span {
            font-family: InterLight;
        }

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

        .NewCompany {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,
                    0,
                    0,
                    0.7);
            /* Dark semi-transparent background */
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 999;
            /* Ensure it appears above other content */
        }

        .model {
            border-radius: 20px;
            background-color: white;
            width: 400px;

            padding: 1.5rem 1.2rem;
            z-index: 2;
        }

        .model span {
            font-family: poppinsBold;
        }

        .model p {
            margin-top: none;
            margin-bottom: 0;
            color: #8b8d97;
            padding: 6px 0;
            font-size: 13px;
            font-family: InterMedium;
        }

        .iti {
            margin: 5px 0;
        }

        .inputBox {
            outline: none;
            margin: 5px 0;
            width: 100%;
            border: none;
            color: #8b8d97;
            font-size: 13px;
            font-family: InterMedium;
            background-color: #eff1f9;
            padding: 10px;
            border-radius: 12px;
        }

        .companyAddress {
            color: #8b8d97;
            font-size: 11px;
        }

        .addressSection {
            display: none;
        }

        .orderCard {
            height: 100vh;
        }

        .Assigned {
            background-color: #d9d9d9;
            padding: 5px 10px;
            border-radius: 15px;
            color: #8b8d97;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
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

        .dropdown-like input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        .dropdown-like ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .dropdown-like ul li {
            padding: 8px 0;
            display: flex;
            align-items: center;
        }

        .dropdown-like ul li:hover {
            background-color: #d9d9d9;
            padding: 8px 0;
            display: flex;
            align-items: center;
        }

        .dropdown-like ul li label {
            font-family: InterMedium;
            display: flex;
            align-items: center;
            gap: 8px;
            color: #8b8d97;
        }

        .user-avatar {
            width: 30px;
            height: 30px;
            border-radius: 50%;
        }

        /* Visible state of dropdown */
        .dropdown-like.show {
            display: block;
        }

        .modal-content {
            display: none;
            position: absolute;
            background-color: white;
            margin: 10% auto;
            padding: 4px;
            border-radius: 8px;
            width: 250px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .modal-content2 {
            display: none;
            position: absolute;
            background-color: white;
            margin: 7% auto;
            padding: 16px;
            width: auto;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .modal-header {
            font-family: InterMedium;
            align-items: center;
            padding-bottom: 5px;
        }

        .filter-group {
            margin-bottom: 15px;
        }

        .filter-group label {
            font-size: 13px;
            color: #53545c;
            font-family: InterMedium;
            display: block;
            margin-bottom: 5px;
        }

        .filter-group2 label {
            font-size: 13px;
            font-family: InterLight !important;
        }

        .amount-fields {
            display: flex;
            gap: 10px;
        }

        .select {
            font-size: 13px;
            outline: none;
            border: 1px solid #d9d9d9;
            width: 100%;
            border-radius: 4px;
            padding: 8px;
        }

        .amount-fields input {
            width: 100px;
            padding: 8px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        .filter-btn-submit {
            background-color: #ffd014;
            border: none;
            width: 100%;
            padding: 10px;
            color: rgb(0, 0, 0);
            border-radius: 12px;
            cursor: pointer;
        }

        .year-select {
            border: none;
            color: gray;
            font-size: 14px;
        }

        .calendar {
            top: 1rem;
            margin: 0 auto;
            width: 300px;
            background: #fff;
        }

        .mainCalendar {
            background-color: #f4f5fa;
            border-radius: 13px;
        }

        .calendar header {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .calendar nav {
            display: flex;
            align-items: center;
        }

        .calendar ul {
            padding-left: 0;
            margin: 0;
            list-style: none;
            display: flex;
            flex-wrap: wrap;
            text-align: center;
        }

        .calendar ul li {
            width: calc(100% / 7);
            position: relative;
            z-index: 2;
            aspect-ratio: 1;
            display: flex;
            align-items: center;
            justify-content: center;
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

        .days {
            font-weight: 600;
        }

        .dates li.today {
            color: #000000;
        }

        .dates li.today::before {
            content: "";
            width: 2rem;
            height: 2rem;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: #ffffff;
            border-radius: 50%;
            z-index: -1;
        }

        .dates li.inactive {
            color: #ccc;
        }

        .selected-range {
            background-color: #b4ddff;
            /* Light blue to indicate selection */
            color: black;
        }

        .start-date {
            border-radius: 50%;
            background-color: #000000;
            /* Green background for start date */
            color: white;
        }

        .end-date {
            border-radius: 50%;
            background-color: #000000;
            /* Red background for end date */
            color: white;
        }

        .nav-tabs {
            background: white;
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
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            display: flex;
            gap: 4px;
            flex-direction: column;
        }

        .product-wrapper .quantity-controls img {
            width: 32px;

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
    </style>
@endsection
@section('content')



@section('heading', 'Add Product')

<div id="dynamic-content">




    <div class="green" id="products">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center my-3" style="width: 100%">
                <span class="my-2 ml-2" style="font-size: 17px; font-weight: 700">Product Summary</span>
                <a href="{{ route('add.product') }}" class="order-btn d-flex align-items-center">
                    +
                    <pre></pre>
                    Add a New Product
                </a>
            </div>

            <div class="d-flex gap-3">
                <div class="" style="width: 50%">
                    <div class="card text-center" style="background-color: black">
                        <div class="alignemnt">
                            <img src="{{ asset('assets/admin/images/svg/stroke_1.svg') }} " />
                        </div>

                        <div class="d-flex align-items-start text-left justify-content-between" style="color: white">
                            <span>
                                <p class="sales" style="color: white">All Products</p>
                                <p class="bold">800s</p>
                            </span>
                            <span>
                                <p class="sales" style="color: white">Active</p>
                                <p class="bold">
                                    316
                                    <span class="rates" style="color: white">+20.00%</span>
                                </p>
                            </span>
                        </div>
                    </div>
                </div>
                <div class=" " style="width: 50%">
                    <div class="card text-center">
                        <div class="alignemnt">
                            <img src="{{ asset('assets/admin/images/svg/stroke_2.svg') }} " />
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
                                <p class="sales" style="color: red">Low Stock Alert</p>
                                <p class="bold">23</p>
                            </span>
                            <span>
                                <p class="sales">Expired</p>
                                <p class="bold">3</p>
                            </span>

                            <span>
                                <p class="sales">1 Start Rating</p>
                                <p class="bold">2</p>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div style=" background: white; margin: 20px 0; padding: 1rem; border-radius: 15px; ">
                <div class="d-flex justify-content-between">
                    <h6>Products</h6>
                    <div class="d-flex gap-2">
                        <div class="search-bar">
                            <img src="{{ asset('assets/admin/images/svg/Search.svg') }} " />
                            <input type="text" id="searchInput" placeholder="Search.." />
                        </div>
                        <button class="filter-btn">
                            <img src="{{ asset('assets/admin/images/svg/filter1.svg') }} " />
                            Filter
                        </button>
                        <button class="filter-btn">
                            <img src="{{ asset('assets/admin/images/svg/Calendar.svg') }} " />
                            Filter
                        </button>
                        <button class="filter-btn">
                            <img src="{{ asset('assets/admin/images/svg/Send.svg') }} " /> send
                        </button>
                        <div>
                            <select id="itemsPerPage" class="form-select form-select-sm filter-dropdown"
                                style="width: auto">
                                <option value="3">bulk Action</option>
                                <option value="5">page</option>
                                <option value="10">per page</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="container mt-4">
                    <div class="table-responsive">
                        <table class="table mt-3">
                            <thead>
                                <tr>
                                    <th scope="col">
                                        <label class="custom-checkbox">
                                            <input type="checkbox" id="select-all">
                                            <span class="checkmark"></span>
                                        </label>
                                    </th>
                                    <th></th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Unit Price</th>
                                    <th scope="col">In-Stock</th>
                                    <th scope="col">Discount</th>
                                    <th scope="col">Total Value</th>
                                    <th scope="col">Action</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody id="table-body">
                                {{-- <tr>
                                        <td>
                                            <label class="custom-checkbox">
                                                <input type="checkbox" class="product-checkbox" data-id="1">
                                                <span class="checkmark"></span>
                                            </label>

                                        </td>
                                        <td><img src="{{ asset('assets/admin/images/Rectangle_3.png') }} "></td>
                                        <td>CET 126" UV Printer</td>
                                        <td>Printer</td>
                                        <td>$1,500</td>
                                        <td>50</td>
                                        <td>5%</td>
                                        <td>$75,000</td>
                                        <td>
                                            <div class="dropdown">
                                                <button
                                                    style="padding: 5px .75rem; font-size: 12px; color: #000; border-color: none; border-radius: 21px; background-color: #989ea3; "
                                                    class="btn btn-secondary dropdown-toggle" type="button"
                                                    id="dropdownMenuButton" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    Action
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <li><a style="font-size: 13px;" class="dropdown-item"
                                                            href="javascript:void(0);">Publish</a></li>
                                                    <li><a style="font-size: 13px;" class="dropdown-item"
                                                            href="javascript:void(0);">Unpublish</a></li>

                                                </ul>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="custom-active">Publish</p>
                                        </td>
                                    </tr> --}}


                            </tbody>
                        </table>

                        <!-- Pagination Controls -->
                        <div id="product-pagination"
                            class="pagination-container d-flex justify-content-between align-items-center d-none">
                            <!-- Items per page dropdown -->
                            <div class="PaginationDropdown d-flex justify-content-center align-items-center gap-2">
                                <select id="itemsPerPage1"
                                    class="form-select productDropdown3 form-select-sm filter-dropdown">
                                    <option value="3">3</option>
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                </select>
                                <p>Items per page</p>
                                <p class="TotalItems">1-10 of 100 items</p>
                            </div>

                            <!-- Showing results text -->
                            <div id="showing-info" class="text-muted"></div>

                            <!-- Pagination -->
                            <nav class="d-flex justify-content align-items-center gap-2" aria-label="Page navigation ">
                                <select id="itemsPerPage"
                                    class="form-select productDropdown3 form-select-sm filter-dropdown">
                                    <option value="3">1</option>
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                </select>
                                <p class="TotalItems">1-10 of 100 items</p>
                                <ul class="pagination mb-0">
                                    <li class="page-item">
                                        <a class="page-link" href="javascript:void(0);" id="prev-page">
                                            <img src="{{ asset('assets/admin/images/svg/Arrow-Down4.svg') }}" />
                                        </a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="javascript:void(0);" id="next-page">
                                            <img src="{{ asset('assets/admin/images/svg/Arrow-Down3.svg') }}" />
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

</div>




@endsection
@section('script')
<script>
    $(document).ready(function() {
        let currentPage = 1;
        let itemsPerPage = 3; // Default items per page
        let searchQuery = '';
        // Function to fetch products from the server
        function fetchProducts(page, itemsPerPage, search) {

            $.ajax({
                url: "{{ route('product.list') }}",
                type: 'GET',
                data: {
                    page: page,
                    items_per_page: itemsPerPage,
                    search: search,
                },
                success: function(response) {




                    renderTable(response.products); // Assume your API returns the product array
                    updatePagination(response.total); // Update pagination based on total products

                },
                error: function(xhr) {

                    updatePagination(1)
                },
            });
        }

        // Function to render the product table
        function renderTable(products) {
            const tableBody = $('#table-body');
            tableBody.empty(); // Clear previous data


            products.forEach(product => {


                const id = product.id || null
                const name = product.name || 'N/A'
                const category = product.category || 'N/A'
                const unit_price = product.sell_price || 1.00
                const stock = product.stock || 0
                const discount = product.discount || '0.00'
                const status = product.status || 0
                const total_value = stock * unit_price
                // const imgPath = product.images[0].path || 'assets/admin/images/Image.png'
                const imageUrl = product.images[0]?.path ? appUrl + '/' + product.images[0].path :
                    appUrl + '/assets/admin/images/Image.png';



                const row = `
                <tr data-id="${id}">
                    <td>
                        <label class="custom-checkbox">
                            <input type="checkbox" class="product-checkbox" data-id="${id}">
                            <span class="checkmark"></span>
                        </label>
                    </td>
                    <td><img src="${imageUrl}" alt="${ name}"></td>
                    <td>${ name}</td>
                    <td>${ category}</td>
                    <td>$${ unit_price}</td>
                    <td>${stock}</td>
                    <td>${discount}</td>
                    <td>$${total_value}</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                Action
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item" href="javascript:void(0);" onclick="publishProduct(${id})">Publish</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0);" onclick="unpublishProduct(${id})">Unpublish</a></li>
                            </ul>
                        </div>
                    </td>
                    <td>
                        <p class="status-text custom-${status == 1 ? 'active' : 'inactive'}">${status == 1 ? 'Publish' : 'Unpublish'} </p>
                    </td>
                </tr>`;
                tableBody.append(row);
            });
        }

        // Function to update pagination info
        function updatePagination(total) {
            const totalItems = total; // Total products from API response
            const totalPages = Math.ceil(totalItems / itemsPerPage);
            $(".TotalItems").text(
                `Showing ${((currentPage - 1) * itemsPerPage) + 1}-${Math.min(currentPage * itemsPerPage, totalItems)} of ${totalItems} items`
            );

            // Disable/Enable pagination buttons
            $('#prev-page').toggleClass('disabled', currentPage === 1);
            $('#next-page').toggleClass('disabled', currentPage === totalPages);
        }



        // Handle pagination button clicks
        $('#prev-page').click(function() {
            if (currentPage > 1) {
                currentPage--;


                fetchProducts(currentPage, itemsPerPage, searchQuery);
            }
        });

        $('#next-page').click(function() {
            currentPage++;

            fetchProducts(currentPage, itemsPerPage, searchQuery);
        });

        // Handle items per page change
        $(document).on('change', '#itemsPerPage', function() {

            itemsPerPage = $(this).val();
            currentPage = 1; // Reset to first page

            fetchProducts(currentPage, itemsPerPage, searchQuery);
        });

        $(document).on('change', '#itemsPerPage1', function() {

            itemsPerPage = $(this).val();
            currentPage = 1; // Reset to first page

            fetchProducts(currentPage, itemsPerPage, searchQuery);
        });

        $('#searchInput').on('input', function() {

            searchQuery = $(this).val(); // Update search query
            currentPage = 1; // Reset to first page
            fetchProducts(currentPage, itemsPerPage, searchQuery); // Fetch products with search
        });


        // Initial fetch of products
        fetchProducts(currentPage, itemsPerPage, searchQuery);
    });
</script>
<script>
    function publishProduct(id) {

        updateProductStatus(id, 1);
    }

    function unpublishProduct(id) {

        updateProductStatus(id, 2);
    }

    function updateProductStatus(id, status) {
        var url = "{{ route('product.change.status', ':id') }}";
        url = url.replace(':id', id);
        $.ajax({
            url: url,

            method: 'POST',
            data: {
                status: status,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.success) {
                    toastr.success(response.message); // Show success message

                    // Optionally, you can refresh the product list or update the status in the table dynamically
                    // Example: Change the status text in the table
                    const statusText = status == 1 ? 'Publish' : 'Unpublish';
                    const statusClass = status == 1 ? 'custom-active' : 'custom-inactive';
                    $ele = $(`tr[data-id="${id}"] .status-text`);

                    $ele.text(statusText)
                    $ele.removeClass('custom-active custom-inactive')
                        .addClass(statusClass);
                }
                if (!response.success) {
                    toastr.error(response.message); // Show success message


                }
            },
            error: function(xhr) {
                toastr.error('Failed to update product status'); // Handle errors
            }
        });

    }
</script>
@endsection

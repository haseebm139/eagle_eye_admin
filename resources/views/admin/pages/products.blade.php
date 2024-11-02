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

        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }

        #global_price_variable_wrapper input[type="number"] {
            width: 80px;
            padding: 5px 10px;
            text-align: center;


        }

        #global_price_variable_wrapper form {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 13px;
        }

        #global_price_variable_wrapper form label {
            font-size: 13px;
        }

        #global_price_variable_wrapper form input[type='submit'] {
            padding: 5px 10px;
        }
    </style>
@endsection
@section('content')



@section('heading', 'Add Product')

<div id="dynamic-content">




    <div class="green" id="products">
        <div class="container-fluid">
            @can('create inventory management')
                <div class="d-flex justify-content-between align-items-center my-3" style="width: 100%">
                    <span class="my-2 ml-2" style="font-size: 17px; font-weight: 700">Product Summary</span>
                    <a href="{{ route('add.product') }}" class="order-btn d-flex align-items-center text-white">
                        <i class="fa-solid fa-plus mr-1"></i>
                        Add a New Product
                    </a>
                </div>
            @endcan
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="card text-center" style="background-color: black">
                        <div class="alignemnt">
                            <img src="{{ asset('assets/admin/images/svg/stroke_1.svg') }} " />
                        </div>

                        <div class="d-flex align-items-start text-left justify-content-between" style="color: white">
                            <span>
                                <p class="sales" style="color: white">All Products</p>
                                <p class="card_counting_numbers">{{ productCount() }}</p>
                            </span>
                            <span>
                                <p class="sales" style="color: white">Publish</p>
                                <p class="card_counting_numbers">
                                    {{ productPublished() }}

                                </p>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card text-center">
                        <div class="alignemnt">
                            <img src="{{ asset('assets/admin/images/svg/stroke_2.svg') }} " />

                        </div>

                        <div class="bottomContent">
                            <span>
                                <p class="sales" style="color: red">Low Stock Alert</p>
                                <p class="card_counting_numbers">{{ productLowStock() }}</p>
                            </span>
                            <span>
                                <p class="sales">Publish Products</p>
                                <p class="card_counting_numbers">{{ productPublished() }}</p>
                            </span>

                            <span>
                                <p class="sales">Un-Publish Products</p>
                                <p class="card_counting_numbers">{{ productUNpublished() }}</p>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div style=" background: white; margin: 20px 0; padding: 1rem; border-radius: 15px; ">
                <div class="row justify-content-between">
                    <div class="col-md-6">
                        <h6>Products</h6>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex gap-2 justify-content-end mob-flex-direction-column">
                            <div class="search-bar">
                                <img src="{{ asset('assets/admin/images/svg/Search.svg') }} " />
                                <input type="text" id="searchInput" placeholder="Search.." />
                            </div>
                            @can('write inventory management')
                                <form action="{{ route('product.update.global.price') }}"method="POST">
                                    @csrf
                                    <label for="">Global Price Variable </label>
                                    <input type="number" step="0.01" name="global_price_variable" placeholder="0.0"
                                        id="global_price_variable">%
                                    <input type="submit" class="btn btn-dark bg-black" value="Apply">
                                </form>
                            @endcan
                        </div>
                    </div>


                </div>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">
                                    <label class="custom-checkbox">
                                        <input type="checkbox" id="select-all">
                                        <span class="checkmark"></span>
                                    </label>
                                </th>
                                <th width='50px'></th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Category</th>
                                <th scope="col">Unit Price</th>
                                <th scope="col">In-Stock</th>
                                <th scope="col">Discount</th>
                                <th scope="col">Total Value</th>
                                <th scope="col">Publish Unpublish</th>
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


                </div>
                <!-- Pagination Controls -->
                <div id="product-pagination"
                    class="pagination-container d-flex justify-content-between align-items-center d-none">
                    <!-- Items per page dropdown -->
                    <div class="PaginationDropdown d-flex justify-content-center align-items-center gap-2">
                        <select id="itemsPerPage1" class="form-select productDropdown3 form-select-sm filter-dropdown">
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="50">50</option>
                        </select>
                        <p>Items per page</p>
                        <p class="TotalItems">1-10 of 100 items</p>
                    </div>

                    <!-- Showing results text -->
                    <div id="showing-info" class="text-muted"></div>

                    <!-- Pagination -->
                    <nav class="d-flex justify-content align-items-center gap-2 mob-flex-direction-column"
                        aria-label="Page navigation ">
                        <select id="itemsPerPage" class="form-select productDropdown3 form-select-sm filter-dropdown">
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="50">50</option>
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




@endsection
@section('script')
<script>
    $(document).ready(function() {
        let currentPage = 1;
        let itemsPerPage = 10; // Default items per page
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
                const sell_price = parseFloat(product.sell_price) || 0.00;
                const cost_price = parseFloat(product.cost_price) || 0.00;
                const global_value = parseFloat(product.global_value) || 0.00;
                const stock = product.stock || 0
                const discount = product.discount || '0.00'
                const status = product.status || 0
                const base_price = product.is_discount ? sell_price : cost_price;
                const extra_price = base_price * (global_value / 100);
                const increased_price = base_price + extra_price;
                const total_value = stock * base_price
                // const imgPath = product.images[0].path || 'assets/admin/images/Image.png'
                const imageUrl = product.images[0]?.path ? appUrl + '/' + product.images[0].path :
                    appUrl + '/assets/admin/images/Image.png';


                let url = "{{ route('product.edit', ':id') }}";
                url = url.replace(':id', id);
                let url1 = "{{ route('product.delete', ':id') }}";
                url1 = url1.replace(':id', id);



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
                    <td>$${ increased_price}</td>
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
                        <a href="${url}"  class="me-2"> <i class="fas fa-edit"></i> </a>
                        <a href="${url1}"  style="color: red;"> <i class="fas fa-trash-alt"></i> </a>
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

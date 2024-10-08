@extends('layout.master')
@section('title', 'PRODUCTS')

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
    </style>
@endsection
@section('content')


    <div class="toggle-btn" id="toggle-btn">
        <img src="{{ asset('assets/admin/images/svg/Home.svg') }} " />
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
            <img src="{{ asset('assets/admin/images/svg/Notification.svg') }}" class="avatar" alt="Avatar" />
        </div>
    </div>
    <div id="dynamic-content">
        <div>



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

                                <div class="d-flex align-items-start text-left justify-content-between"
                                    style="color: white">
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
                                    <input type="text" placeholder="Search.." />
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
                                        <tr>
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
                                                                href="#">Edit</a></li>
                                                        <li><a style="font-size: 13px;" class="dropdown-item"
                                                                href="#">Delete</a></li>
                                                        <li><a style="font-size: 13px;" class="dropdown-item"
                                                                href="#">View</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="custom-active">Publish</p>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <label class="custom-checkbox">
                                                    <input type="checkbox" class="product-checkbox" data-id="2">
                                                    <span class="checkmark"></span>
                                                </label>

                                            </td>
                                            <td><img src="{{ asset('assets/admin/images/Rectangle_3.png') }}"></td>
                                            <td>Graphtec FC8000 Cutter</td>
                                            <td>Cutter</td>
                                            <td>$2,000</td>
                                            <td>30</td>
                                            <td>10%</td>
                                            <td>$60,000</td>
                                            <td>
                                                <div class="dropdown">
                                                    <button
                                                        style=" padding: 5px .75rem; font-size: 12px; color: #000; border-color: none; border-radius: 21px; background-color: #989ea3; "
                                                        class="btn btn-secondary dropdown-toggle" type="button"
                                                        id="dropdownMenuButton" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        Action
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <li><a style="font-size: 13px;" class="dropdown-item"
                                                                href="#">Edit</a></li>
                                                        <li><a style="font-size: 13px;" class="dropdown-item"
                                                                href="#">Delete</a></li>
                                                        <li><a style="font-size: 13px;" class="dropdown-item"
                                                                href="#">View</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="custom-inactive">Inactive</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="custom-checkbox">
                                                    <input type="checkbox" class="product-checkbox" data-id="3">
                                                    <span class="checkmark"></span>
                                                </label>

                                            </td>
                                            <td><img src="{{ asset('assets/admin/images/Rectangle_3.png') }}"></td>
                                            <td>Graphtec FC9000</td>
                                            <td>Cutter</td>
                                            <td>$2,500</td>
                                            <td>25</td>
                                            <td>15%</td>
                                            <td>$62,500</td>
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
                                                                href="#">Edit</a></li>
                                                        <li><a style="font-size: 13px;" class="dropdown-item"
                                                                href="#">Delete</a></li>
                                                        <li><a style="font-size: 13px;" class="dropdown-item"
                                                                href="#">View</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="custom-active">Publish</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <!-- Pagination Controls -->
                                <div class="pagination-container d-flex justify-content-between align-items-center">
                                    <!-- Items per page dropdown -->
                                    <div>
                                        <select id="itemsPerPage" class="form-select form-select-sm" style="width: auto">
                                            <option value="3">3 Items per page</option>
                                            <option value="5">5 Items per page</option>
                                            <option value="10">10 Items per page</option>
                                        </select>
                                    </div>

                                    <!-- Showing results text -->
                                    <div id="showing-info" class="text-muted"></div>

                                    <!-- Pagination -->
                                    <nav aria-label="Page navigation">
                                        <ul class="pagination mb-0">
                                            <li class="page-item">
                                                <a class="page-link" href="#" id="prev-page">&laquo;</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#" id="next-page">&raquo;</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="purple  " id="settings">
                settings.
            </div>
        </div>
    </div>



@endsection
@section('script')
    <script>
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
            });

            // Event listener for next page button
            nextPageBtn.addEventListener("click", function(e) {
                e.preventDefault();
                const totalPages = Math.ceil(products.length / rowsPerPage);
                if (currentPage < totalPages) {
                    currentPage++;
                }
            });

            // Event listener for previous page button
            prevPageBtn.addEventListener("click", function(e) {
                e.preventDefault();
                if (currentPage > 1) {
                    currentPage--;
                }
            });

        });
    </script>
@endsection

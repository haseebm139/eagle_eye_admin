@extends('layout.master')
@section('title', 'Client')

@section('style')
    <style>
        .table td {
            white-space: nowrap !important;
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
            font-family: "Inter", sans-serif;
            font-weight: 500;
            align-items: center;
            padding-bottom: 5px;
        }


        .NewCompany {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 999;
        }


        .model {
            border-radius: 20px;
            background-color: white;
            width: 400px;
            padding: 1.5rem 1.2rem;
            z-index: 2;
        }


        .model span {
            font-family: 'Poppins', sans-serif;
            font-weight: bold;
        }


        .model p {
            margin-top: none;
            margin-bottom: 0;
            color: #8b8d97;
            padding: 6px 0;
            font-size: 13px;
            font-family: "Inter", sans-serif;
            font-weight: 500;
        }
        #customer_popup_form{
            max-height: auto;
        }
        #billingaddressSection{
            display: block;
        }

        @media(max-width:600px){
            #customer_popup_form{
            max-height: 450px;
            overflow-y: scroll
        }
        }
    </style>



@endsection
@section('content')



@section('heading', 'Clients')
<div id="dynamic-content">
    <div class="tab-content" id="myTabContent">
        <div class="black tab-pane fade show active" id="customers" role="tabpanel" aria-labelledby="customers-tab">
            <div class="container-fluid">
                <div class="Width d-flex justify-content-between align-items-center">
                    <span class="my-2 ml-2"> Client Summary</span>
                    @can('create client management')
                        <button class="order-btn d-flex align-items-center" id="addCompanyBtn">
                            <i class="fa-solid fa-plus mr-1"></i>
                            create a New Client
                        </button>
                    @endcan
                </div>
                <div class="row mt-3">
                    <div class="col-md-6 mb-4">
                        <div class="card text-center">
                            <div class="alignemnt">
                                <img src="{{ asset('assets/admin/images/svg/icon2.svg') }} " />

                            </div>

                            <div class="bottomContent">
                                <span>
                                    <p class="sales">All Clients</p>
                                    <p class="card_counting_numbers">
                                        {{ allClients() }}
                                    </p>
                                </span>

                                <span>
                                    <p class="sales">Active</p>
                                    <p class="card_counting_numbers">
                                        {{ activeClients() }}
                                    </p>
                                </span>
                                <span>
                                    <p class="sales">In-Active</p>
                                    <p class="card_counting_numbers">
                                        {{ suspendClients() }}
                                    </p>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="card text-center">
                            <div class="alignemnt">
                                <img src="{{ asset('assets/admin/images/svg/icon3.svg') }} " />
                                <div class="leftAlignement">
                                    <div class="dropdown-container position-relative">
                                        <select id="stats" class="form-control2 d-inline w-auto">

                                            <option value="week" selected>This Week</option>
                                            <option value="month">This Month</option>
                                            <option value="year">This Year</option>

                                        </select>
                                        <span class="dropdown-icon"></span>
                                        <!-- Down arrow icon -->
                                    </div>
                                </div>
                            </div>

                            <div class="bottomContent">
                                <span>
                                    <p class="sales">New Clients</p>
                                    <p class="card_counting_numbers" id="new_clients">
                                        1,250
                                    </p>
                                </span>
                                <span>
                                    <p class="sales">Purchasing</p>
                                    <p class="card_counting_numbers" id="purchasing">657</p>
                                </span>
                                <span>
                                    <p class="sales">Orders</p>
                                    <p class="card_counting_numbers" id="orders">5</p>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product2 mt-4">
                    <div class="row justify-content-between">
                        <div class="col-md-6">
                            <h6>Clients</h6>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex gap-2 mob-flex-direction-column justify-content-end">
                                <div class="search-bar">
                                    <img src="{{ asset('assets/admin/images/svg/Search.svg') }} " />
                                    <input type="text" id="searchInput" placeholder="Search.." />
                                </div>

                            </div>
                        </div>


                    </div>

                    <div class="table-responsive">
                        <table class="table mt-3">
                            <thead>
                                <tr>
                                    <th scope="col">
                                        <label class="custom-checkbox">
                                            <input type="checkbox" id="select-all" />
                                            <span class="checkmark"></span>
                                        </label>
                                    </th>

                                    <th class="" scope="col">
                                        Client Name <img src="{{ asset('assets/admin/images/svg/sort.svg') }} " />
                                    </th>
                                    <th scope="col">
                                        Email <img src="{{ asset('assets/admin/images/svg/sort.svg') }} " />
                                    </th>
                                    <th scope="col">
                                        Phone <img src="{{ asset('assets/admin/images/svg/sort.svg') }}" />
                                    </th>
                                    <th scope="col">
                                        Orders <img src="{{ asset('assets/admin/images/svg/sort.svg') }}" />
                                    </th>
                                    <th scope="col">
                                        Order Total <img src="{{ asset('assets/admin/images/svg/sort.svg') }} " />
                                    </th>
                                    <th scope="col">
                                        Client Since <img src="{{ asset('assets/admin/images/svg/sort.svg') }}" />
                                    </th>

                                    <th scope="col">
                                        Status <img src="{{ asset('assets/admin/images/svg/sort.svg') }}" />
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="table-body">
                                <!-- Table rows will be dynamically generated here -->
                            </tbody>
                        </table>


                    </div>
                    <!-- Pagination Controls -->
                    <div class="pagination-container d-flex justify-content-between align-items-center">
                        <!-- Items per page dropdown -->
                        <div class="PaginationDropdown d-flex justify-content-center align-items-center gap-2">
                            <select id="itemsPerPage"
                                class="form-select productDropdown3 form-select-sm filter-dropdown">
                                <option value="25" selected>25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                            <p>Items per page</p>
                            <p class="TotalItems">1-10 of 100 items</p>
                        </div>

                        <!-- Showing results text -->
                        <div id="showing-info" class="text-muted"></div>

                        <!-- Pagination -->
                        <nav class="d-flex justify-content align-items-center gap-2 mob-flex-direction-column-reverse"
                            aria-label="Page navigation ">
                            <select id="itemsPerPage"
                                class="form-select productDropdown3 form-select-sm filter-dropdown">
                                <option value="50" selected>50</option>
                                <option value="100">100</option>
                                <option value="150">150</option>
                            </select>
                            <p class="TotalItems">1-10 of 100 items</p>
                            <ul class="pagination mb-0">
                                <li class="page-item">
                                    <a class="page-link" href="#" id="prev-page">
                                        <img src="{{ asset('assets/admin/images/svg/Arrow-Down4.svg') }} " />
                                    </a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#" id="next-page">
                                        <img src="{{ asset('assets/admin/images/svg/Arrow-Down3.svg') }} " />
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


<div class="NewCompany" id="newCompanyDiv">
    <div class="model d-flex flex-column">
        <div class="d-flex justify-content-between align-items-center">
            <span class="my-2">Add a New Client</span>
            <button class="cancel" id="cancelBtn">
                <img src="{{ asset('assets/admin/images/svg/Frame_5800.svg') }}" />
            </button>
        </div>
        <form action="{{ route('customer.create') }}" method="post" id="customer_popup_form">
            @csrf
            <div>
                <p class="CustomerPopup">Client Information</p>
                <div class="d-flex flex-column">
                    <input type="text" class="inputBox" name="name" placeholder="Client Name" />
                    <input type="email" class="inputBox" name="email" placeholder="Client Email" />

                    <input class="inputBox" id="phone" name="phone" type="tel" value="" />
                </div>
                <div class="d-flex gap-3 mt-3">
                    <p>Add Address</p>
                    <div class="">
                        <label class="switch switch2">
                            <input type="checkbox" id="toggleSwitch" />
                            <span class="slider"></span>
                        </label>
                    </div>
                </div>
                <div id="addressSection" class="addressSection">

                    <input type="text" class="inputBox" name="address" placeholder="Client Address" />
                    <!--Country -->
                    <div class="select-something">
                        <select class="inputBox" name="state" id="countySel" size="1">
                            <option value="" selected="selected">Country</option>
                        </select>
                    </div>
                    <!--State -->

                    <div class="d-flex gap-3">
                        <select class="inputBox" name="country" id="stateSel" size="1">
                            <option value="" selected="selected">state</option>
                        </select>

                        <!--State -->

                        <select class="inputBox" name="city" id="districtSel" size="1">
                            <option value="" selected="selected">city</option>
                        </select>
                    </div>

                    <div class="d-flex gap-2 mt-3">
                        <p>Billing Address</p>
                        <div class="d-flex gap-2">
                            <p class="companyAddress">Same as Company address</p>
                            <label class="switch switch2" for="toggleSwitch_b_address">
                                <input type="checkbox" id="toggleSwitch_b_address" />
                                <span class="slider"></span>
                            </label>
                        </div>
                    </div>
                    <div id="billingaddressSection" class="addressSection" >
                        <input type="text" class="inputBox" name="baddress" placeholder="Client Address" />
                        <!--Country -->
                        <div class="select-something">
                            <select class="inputBox" name="state" id="countySel2" size="1">
                                <option value="" selected="selected">Country</option>
                            </select>
                        </div>
                        <!--State -->
    
                        <div class="d-flex gap-3">
                            <select class="inputBox" name="country" id="stateSel2" size="1">
                                <option value="" selected="selected">state</option>
                            </select>
    
                            <!--State -->
    
                            <select class="inputBox" name="city" id="districtSel2" size="1">
                                <option value="" selected="selected">city</option>
                            </select>
                        </div>  
                    </div>
                </div>

                <div class="d-flex gap-3 mt-3">
                    <button class="cancel-btn2">Cancel</button>
                    <button type="submit" class="add-btn" id="btn00">Add</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
@section('script')


<script src="{{ asset('assets/admin/js/CountryData.js') }}"></script>
<script>
    window.onload = function () {
    const countySel = document.getElementById("countySel"),
          stateSel = document.getElementById("stateSel"),
          districtSel = document.getElementById("districtSel"),
          countySel2 = document.getElementById("countySel2"),
          stateSel2 = document.getElementById("stateSel2"),
          districtSel2 = document.getElementById("districtSel2");

    function populateCounties(countyDropdown) {
        for (const county in stateObject) {
            countyDropdown.options[countyDropdown.options.length] = new Option(county, county);
        }
    }

    function populateStates(countyDropdown, stateDropdown) {
        stateDropdown.length = 1; // reset states
        districtSel.length = 1; // reset districts
        if (countyDropdown.selectedIndex < 1) return;
        for (const state in stateObject[countyDropdown.value]) {
            stateDropdown.options[stateDropdown.options.length] = new Option(state, state);
        }
    }

    function populateDistricts(countyDropdown, stateDropdown, districtDropdown) {
        districtDropdown.length = 1; // reset districts
        if (stateDropdown.selectedIndex < 1) return;
        const districts = stateObject[countyDropdown.value][stateDropdown.value];
        for (let i = 0; i < districts.length; i++) {
            districtDropdown.options[districtDropdown.options.length] = new Option(districts[i], districts[i]);
        }
    }

    // Populate counties for both selectors
    populateCounties(countySel);
    populateCounties(countySel2);

    // Set up event listeners for the first set of dropdowns
    countySel.onchange = function () {
        populateStates(countySel, stateSel);
    };
    stateSel.onchange = function () {
        populateDistricts(countySel, stateSel, districtSel);
    };
    countySel.onchange(); // trigger change to populate states on load

    // Set up event listeners for the second set of dropdowns
    countySel2.onchange = function () {
        populateStates(countySel2, stateSel2);
    };
    stateSel2.onchange = function () {
        populateDistricts(countySel2, stateSel2, districtSel2);
    };
    countySel2.onchange(); // trigger change to populate states on load
};
    $(document).ready(function() {
  
        $('#toggleSwitch_b_address').change(function() {
            if ($(this).is(':checked')) {
                $('#billingaddressSection').hide(); // Hide
            } else {
                $('#billingaddressSection').show(); // Show
            }
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const addCompanyBtn = document.getElementById("addCompanyBtn");

        const newCompanyDiv = document.getElementById("newCompanyDiv");
        // Show the new company div when the button is clicked
        addCompanyBtn.addEventListener("click", () => {
            newCompanyDiv.style.display = "flex"; // Show the div
        });
        const cancelBtn = document.getElementById("cancelBtn");
        // Hide the new company div when the cancel button is clicked
        cancelBtn.addEventListener("click", () => {
            newCompanyDiv.style.display = "none"; // Hide the div
        });
        const selectAllCheckbox = document.getElementById("select-all");

        // Event listener for the select-all checkbox
        selectAllCheckbox.addEventListener("change", function() {
            const allCheckboxes = document.querySelectorAll(".product-checkbox");
            allCheckboxes.forEach((checkbox) => {
                checkbox.checked = selectAllCheckbox.checked;
            });
        });



        // Show the new company div when the button is clicked
        addCompanyBtn.addEventListener("click", () => {
            newCompanyDiv.style.display = "flex"; // Show the div
        });

        // Hide the new company div when the cancel button is clicked
        cancelBtn.addEventListener("click", () => {
            newCompanyDiv.style.display = "none"; // Hide the div
        });
        document
            .getElementById("toggleSwitch")
            .addEventListener("change", function() {
                const addressSection = document.getElementById("addressSection");

                // Show or hide address section based on the checkbox state
                if (this.checked) {
                    addressSection.style.display = "block";
                } else {
                    addressSection.style.display = "none";
                }
            });



        // Phone number validation
        const inputs = document.querySelectorAll("input[type='tel']");
        if (inputs.length > 0) {
            // Iterate through the inputs and apply intlTelInput plugin
            inputs.forEach((input, index) => {
                const iti = window.intlTelInput(input, {
                    initialCountry: "us",
                });
            });
        } else {
            console.error("No 'tel' inputs found!");
        }

        window.iti = iti; // useful for testing

        const button = document.querySelector("#btn");
        const errorMsg = document.querySelector("#error-msg");
        const validMsg = document.querySelector("#valid-msg");
        const errorMap = [
            "Invalid number",
            "Invalid country code",
            "Too short",
            "Too long",
            "Invalid number",
        ];

        const reset = () => {
            input.classList.remove("error");
            errorMsg.innerHTML = "";
            validMsg.innerHTML = "";
            errorMsg.classList.add("hide");
            validMsg.classList.add("hide");
        };

        const showError = (msg) => {
            input.classList.add("error");
            errorMsg.innerHTML = msg;
            errorMsg.classList.remove("hide");
        };

        // on click button: validate
        button.addEventListener("click", () => {
            reset();
            if (!input.value.trim()) {
                showError("Required");
            } else if (iti.isValidNumber()) {
                validMsg.innerHTML = "✓ Valid";
                validMsg.classList.remove("hide");
            } else {
                const errorCode = iti.getValidationError();
                showError(errorMap[errorCode]);
            }
        });
    });


    const dropdown = document.getElementById("dropdown");


    // Optional: Close the dropdown when clicking outside
    document.addEventListener("click", function(event) {
        if (

            !dropdown.contains(event.target)
        ) {
            dropdown.classList.remove("show");
        }
    });








    // Close the modal when clicking outside of modal content
    window.addEventListener("click", function(event) {
        // Close modal 1 if it's open and clicked outside

    });
    document
        .getElementById("toggleSwitch")
        .addEventListener("change", function() {
            const addressSection = document.getElementById("addressSection");

            // Show or hide address section based on the checkbox state
            if (this.checked) {
                addressSection.style.display = "block";
            } else {
                addressSection.style.display = "none";
            }
        });
</script>

<script>
    $(document).ready(function() {
        let currentPage = 1;
        let itemsPerPage = 50; // Default items per page
        let searchQuery = '';
        // Function to fetch customers from the server
        function fetchCustomer(page, itemsPerPage, search) {

            $.ajax({
                url: "{{ route('customer.index') }}",
                type: 'GET',
                data: {
                    page: page,
                    items_per_page: itemsPerPage,
                    search: search,
                },
                success: function(response) {



                    renderTable(response.user); // Assume your API returns the product array
                    updatePagination(response.total); // Update pagination based on total customers

                },
                error: function(xhr) {

                    updatePagination(1)
                },
            });
        }

        // Function to render the product table
        function renderTable(customers) {
            const tableBody = $('#table-body');
            tableBody.empty(); // Clear previous data

            customers.forEach(customer => {
                const id = customer.id || null
                const name = customer.name || 'N/A'
                const email = customer.email || 'N/A'
                const phone = customer.phone || 'N/A'
                const order = customer.order || 0
                const order_total = customer.order_total || '0.00'
                const status = customer.status || 0
                const since = customer.since || 'N/A'
                const image = "{{ asset('assets/admin/images/Image.png') }}" ||
                    "{{ asset('assets/admin/images/Image.png') }}"
                let url = "{{ route('customers.view', ':id') }}";
                url = url.replace(':id', id);
                const row = `
                <tr data-id="${id}">
                    <td>
                        <label class="custom-checkbox">
                            <input type="checkbox" class="product-checkbox" data-id="${id}">
                            <span class="checkmark"></span>
                        </label>
                    </td>

                    <td><a href="${url}">${ name}</a></td>
                    <td><a href="${url}">${ email}</a></td>
                    <td><a href="${url}">${ phone}</a></td>
                    <td><a href="${url}">${order}</a></td>
                    <td><a href="${url}">${order_total}</td>
                    <td>${since}</td>

                    <td>
                        <p class="status-text custom-${status == 1 ? 'active' : 'inactive'}">${status == 1 ? 'Active' : 'Block'} </p>
                    </td>
                </tr>`;
                tableBody.append(row);
            });
        }

        // Function to update pagination info
        function updatePagination(total) {
            const totalItems = total; // Total customers from API response
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


                fetchCustomer(currentPage, itemsPerPage, searchQuery);
            }
        });

        $('#next-page').click(function() {
            currentPage++;

            fetchCustomer(currentPage, itemsPerPage, searchQuery);
        });

        // Handle items per page change
        $(document).on('change', '#itemsPerPage', function() {

            itemsPerPage = $(this).val();
            currentPage = 1; // Reset to first page

            fetchCustomer(currentPage, itemsPerPage, searchQuery);
        });

        $(document).on('change', '#itemsPerPage1', function() {

            itemsPerPage = $(this).val();
            currentPage = 1; // Reset to first page

            fetchCustomer(currentPage, itemsPerPage, searchQuery);
        });

        $('#searchInput').on('input', function() {

            searchQuery = $(this).val(); // Update search query
            currentPage = 1; // Reset to first page
            fetchCustomer(currentPage, itemsPerPage, searchQuery); // Fetch customers with search
        });

        $('#stats').on('change', function() {
            const selectedValue = $(this).val();
            getStatData(selectedValue)

        });

        function getStatData(data) {
            $.ajax({
                url: "{{ route('product.stats') }}", // Endpoint to fetch data
                type: 'GET',
                data: {
                    period: data
                },
                success: function(response) {
                    $('#new_clients').text(response.new_clients.toLocaleString());
                    $('#purchasing').text(response.purchasing.toLocaleString());
                    $('#orders').text(response.orders.toLocaleString());
                },
                error: function(xhr) {
                    console.error('Error fetching data');
                }
            });
        }
        // Initial fetch of customers
        getStatData('week')
        fetchCustomer(currentPage, itemsPerPage, searchQuery);
    });
</script>
@endsection

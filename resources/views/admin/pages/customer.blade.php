@extends('layout.master')
@section('title', 'Customer')

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



@section('heading', 'Customers')
<div id="dynamic-content">
    <div class="tab-content" id="myTabContent">
        <div class="black tab-pane fade show active" id="customers" role="tabpanel" aria-labelledby="customers-tab">
            <div class="container-fluid">
                <div class="Width d-flex justify-content-between align-items-center">
                    <span class="my-2 ml-2"> Customer Summary</span>
                    <button class="order-btn d-flex align-items-center" id="addCompanyBtn">
                        +
                        <pre></pre>
                        create a New Customer
                    </button>
                </div>
                <div class="d-flex gap-3 mt-3">
                    <div class="" style="width: 50%">
                        <div class="card text-center">
                            <div class="alignemnt">
                                <img src="{{ asset('assets/admin/images/svg/icon2.svg') }} " />
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
                                    <p class="sales">All Customers</p>
                                    <p class="bold">
                                        1,250 <span class="rates">+15.80%</span>
                                    </p>
                                </span>

                                <span>
                                    <p class="sales">Active</p>
                                    <p class="bold">
                                        1,180 <span class="rates">+85%</span>
                                    </p>
                                </span>
                                <span>
                                    <p class="sales">In-Active</p>
                                    <p class="bold">
                                        450 <span class="rates">+20.00%</span>
                                    </p>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class=" " style="width: 50%">
                        <div class="card text-center">
                            <div class="alignemnt">
                                <img src="{{ asset('assets/admin/images/svg/icon3.svg') }} " />
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
                                    <p class="sales">New Customers</p>
                                    <p class="bold">
                                        1,250 <span class="rates">+15.80%</span>
                                    </p>
                                </span>
                                <span>
                                    <p class="sales">Purchasing</p>
                                    <p class="bold">657</p>
                                </span>
                                <span>
                                    <p class="sales">Abandoned Carts</p>
                                    <p class="bold">5</p>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product2 mt-4">
                    <div class="d-flex justify-content-between">
                        <h6>Customers</h6>
                        <div class="d-flex gap-2">
                            <div class="search-bar">
                                <img src="{{ asset('assets/admin/images/svg/Search.svg') }} " />
                                <input type="text" id="searchInput" placeholder="Search.." />
                            </div>
                            <button class="filter-btn" id="addCompanyBtn2">
                                <img src="{{ asset('assets/admin/images/svg/filter1.svg') }} " />
                                Filter
                            </button>
                            <button class="filter-btn">
                                <img src="{{ asset('assets/admin/images/svg/Calendar.svg') }} " />
                                Calendar
                            </button>

                            <button class="filter-btn">
                                <img src="{{ asset('assets/admin/images/svg/Send.svg') }} " />
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
                                                <input type="checkbox" id="select-all" />
                                                <span class="checkmark"></span>
                                            </label>
                                        </th>

                                        <th class="" scope="col">
                                            Customer Name <img src="{{ asset('assets/admin/images/svg/sort.svg') }} " />
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
                                            Customer Since <img
                                                src="{{ asset('assets/admin/images/svg/sort.svg') }}" />
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

                            <!-- Pagination Controls -->
                            <div class="pagination-container d-flex justify-content-between align-items-center">
                                <!-- Items per page dropdown -->
                                <div class="PaginationDropdown d-flex justify-content-center align-items-center gap-2">
                                    <select id="itemsPerPage"
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
                                <nav class="d-flex justify-content align-items-center gap-2"
                                    aria-label="Page navigation ">
                                    <select id="itemsPerPage"
                                        class="form-select productDropdown3 form-select-sm filter-dropdown">
                                        <option value="3">1</option>
                                        <option value="5">5</option>
                                        <option value="10">10</option>
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
    </div>

</div>


<div class="NewCompany" id="newCompanyDiv">
    <div class="model d-flex flex-column">
        <div class="d-flex justify-content-between align-items-center">
            <span class="my-2">Add a New Customer</span>
            <button class="cancel" id="cancelBtn">
                <img src="{{ asset('assets/admin/images/svg/Frame_5800.svg') }}" />
            </button>
        </div>
        <form action="{{ route('customer.create') }}" method="post">
            @csrf
            <div>
                <p class="CustomerPopup">Customer Information</p>
                <div class="d-flex flex-column">
                    <input type="text" class="inputBox" name="name" placeholder="Customer Name" />
                    <input type="email" class="inputBox" name="email" placeholder="Customer Email" />

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
                            <label class="switch switch2">
                                <input type="checkbox" id="toggleSwitch" />
                                <span class="slider"></span>
                            </label>
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
        let itemsPerPage = 3; // Default items per page
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

                    console.log(response.user);

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


        // Initial fetch of customers
        fetchCustomer(currentPage, itemsPerPage, searchQuery);
    });
</script>
@endsection

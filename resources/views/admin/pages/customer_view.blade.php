@extends('layout.master')
@section('title', 'Customer')

@section('style')

    <style>
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

        .custom-blue {
            width: fit-content;
            background-color: #5570f129;
            /* Custom green */
            color: rgb(0, 0, 0);

            padding: 5px;
            border-radius: 12px;
            text-align: center;
        }

        .shipping-active {
            background-color: #55f17c29;
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
            color: #45464e;
            font-size: 16px;
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
            font-family: InterMedium;
            font-size: 16px;
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
            color: #abafb1;
            font-size: 13px;
            font-family: InterMedium;
            background-color: #f6f7fb;
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

        /* /'meri css' */




        .w-search {
            width: 483px;
        }

        .bg-gray {
            background: #efefef;
        }

        .w-o-search {
            width: 100%;
            padding: 7px;
        }

        .w-buttoon {
            width: 170px;
        }

        .export-btn {
            width: 100px;
            height: 44px;
            display: flex;
            justify-content: center;
        }

        .n-emp {
            width: 159px;
            height: 44px;
            display: flex;
            justify-content: center;
            background-color: #000;
            color: #fff;
        }

        .n-emp img {
            width: 22px;
        }

        .pagination-container {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .pagination-container .page-link {
            cursor: pointer;
            text-decoration: none;
            color: #000;
        }

        .pagination {
            display: flex;
            justify-content: center;
            list-style: none;
            padding-left: 0;
        }

        .pagination .page-item {
            margin: 0 5px;
        }

        .pagination .page-item.active .page-link {
            border: 0 solid #000;
            background-color: #ffffff00;
            color: #007bff;
        }

        .pagination .page-link {
            cursor: pointer;
            text-decoration: none;
            border: 0 solid #000;
            padding: 0.5rem 0.75rem;

        }

        .page-link {
            text-decoration: none;
            cursor: pointer;
            margin: 0;

        }

        .semi-bold-name {
            font-size: 14px;
            font-weight: 700;
        }
    </style>

@endsection
@section('content')



@section('heading', 'Customers')
<div id="dynamic-content">
    <div class="tab-content" id="myTabContent">
        <div class="black tab-pane fade show active" id="customers" role="tabpanel" aria-labelledby="customers-tab">
            <div class="container-fluid">
                <div class="Width d-flex justify-content-between align-items-center customer2">
                    <div class="d-flex align-items-center justify-content-center gap-3">
                        @php
                            // Assuming $date is the date variable you want to format
                            $date = $data['user']->since ?? now();
                            $formattedDate = \Carbon\Carbon::parse($data['user']->since)->format('dM Y - h:ia');
                        @endphp
                        <span class="d-flex gap-2">
                            <p class="mediumFont m-0">Customer Since</p>
                            <p class="LightFont m-0">{{ $formattedDate }}</p>
                        </span>


                        <span>
                            <img src="{{ asset('assets/admin/images/svg/copyIconBlue.svg') }}" />
                        </span>
                    </div>
                    <div class="d-flex gap-3">
                        <div class="dropdown-container dropdown2 position-relative">
                            <select id="data-category" class="form-control4 d-inline w-auto">
                                <option value="Revenue">Edit Customer</option>
                                <option value="Expenses">This Week</option>
                                <option value="Profit Margin">This Week</option>
                            </select>
                            <span class="dropdown-icon"></span>
                            <!-- Down arrow icon -->
                        </div>
                        @if ($data['user']->status == 0)
                            <form id="status-toggle-form" method="POST"
                                action="{{ route('customer.toggle-status', $data['user']->id) }}">
                                @csrf
                                <button type="submit" class="unsuspension-btn d-flex align-items-center">
                                    Active Customer
                                </button>
                            </form>
                        @else
                            <form id="status-toggle-form" method="POST"
                                action="{{ route('customer.toggle-status', $data['user']->id) }}">
                                @csrf
                                <button type="submit" class="suspension-btn d-flex align-items-center">
                                    Suspended Customer
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
                <div class="d-flex gap-3 mt-3">
                    <div class="" style="width: 30%">
                        <div class="card text-center">
                            <div class="alignemnt">
                                <div class="d-flex gap-3">
                                    <img src="{{ asset('assets/admin/images/svg/client2.svg') }} " />
                                    <div class="">
                                        <p class="mediumFont2 m-0 p-0 text-left">
                                            {{ $data['user']->name ?? '' }} {{ $data['user']->last_name ?? '' }}
                                        </p>

                                    </div>
                                </div>
                                <div class="leftAlignement">
                                    <button
                                        class="{{ $data['user']->status == 1 ? 'CustomerStatus' : 'CustomerStatusInactive' }} ">{{ $data['user']->status == 1 ? 'Active' : 'Inactive' }}</button>
                                    <!-- <p class="side-text">This Week</p> -->
                                </div>
                            </div>

                            <div class="bottomContent">
                                <span>
                                    <p class="sales">Phone</p>
                                    <p class="bold">{{ $data['user']->phone ?? '' }}</p>
                                </span>

                                <span>
                                    <p class="sales">Email</p>
                                    <p class="bold">{{ $data['user']->email ?? '' }}</p>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class=" " style="width: 40%">
                        <div class="card text-center">
                            <div class="alignemnt">
                                <img src="{{ asset('assets/admin/images/svg/address.svg') }} " />
                            </div>

                            <div class="bottomContent">
                                <span class="bottomSpan">
                                    <p class="sales">Home Address</p>
                                    <p class="bold">
                                        {{ $data['user']->address ?? '' }}
                                    </p>
                                </span>

                                <span class="bottomSpan">
                                    <p class="sales">Billing Address</p>
                                    <p class="bold">
                                        {{ $data['user']->address ?? '' }}
                                    </p>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class=" " style="width: 30%">
                        <div class="card text-center">
                            <div class="d-flex justify-content-between CustomerOrders">
                                <img src="{{ asset('assets/admin/images/svg/orders.svg') }} " />

                                <div class="dropdown-container position-relative">
                                    <select id="data-category" class="form-control2 d-inline w-auto">
                                        <option value="Revenue">All time</option>
                                        <option value="Expenses">This Week</option>
                                        <option value="Profit Margin">This Week</option>
                                    </select>
                                    <span class="dropdown-icon"></span>
                                    <!-- Down arrow icon -->
                                </div>
                            </div>

                            <div class="bottomContent">
                                <span class="bottomSpan">
                                    <p class="sales">Total Orders</p>
                                    <p class="bold3">${{ $data['totalAmount'] }}</p>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex gap-3 mt-3">
                    <div class="" style="width: 30%">
                        <div class="card text-center">
                            <div class="alignemnt">
                                <img src="{{ asset('assets/admin/images/svg/icon3.svg') }} " />
                                <div class="leftAlignement">
                                    <div class="dropdown-container position-relative">
                                        <select id="data-category" class="form-control2 d-inline w-auto">
                                            <option value="Revenue">All time</option>
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
                                <span class="bottomSpan">
                                    <p class="sales">All Orders</p>
                                    <p class="bold">{{ $data['all_order_count'] }}</p>
                                </span>

                                <span class="bottomSpan">
                                    <p class="sales">Pending</p>
                                    <p class="bold">{{ $data['order_pending'] }}</p>
                                </span>
                                <span class="bottomSpan">
                                    <p class="sales">Complete</p>
                                    <p class="bold">{{ $data['order_complete'] }}</p>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class=" " style="width: 40%">
                        <div class="card text-center">
                            <div class="alignemnt">
                                <img src="{{ asset('assets/admin/images/svg/icon3.svg') }} " />
                                <div class="leftAlignement">
                                    <div class="dropdown-container position-relative">
                                        <select id="data-category" class="form-control2 d-inline w-auto">
                                            <option value="Revenue">All time</option>
                                            <option value="Expenses">This Week</option>
                                            <option value="Profit Margin">This Week</option>
                                        </select>
                                        <span class="dropdown-icon"></span>
                                        <!-- Down arrow icon -->
                                    </div>
                                </div>
                            </div>

                            <div class="bottomContent">
                                <span class="bottomSpan">
                                    <p class="sales">Canceled</p>
                                    <p class="bold">{{ $data['order_cancel'] }}</p>
                                </span>

                                <span class="bottomSpan">
                                    <p class="sales">Returned</p>
                                    <p class="bold">{{ $data['order_return'] }}</p>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class=" " style="width: 30%">
                        <div class="card text-center">
                            <div class="alignemnt">
                                <img src="{{ asset('assets/admin/images/svg/cart2.svg') }} " />
                            </div>

                            <div class="bottomContent">
                                <span>
                                    <p class="sales text-danger">Abandoned Carts</p>
                                    <p class="bold">5</p>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product2 mt-4">
                    <div class="d-flex justify-content-between">
                        <h6>{{ $data['user']->name ?? '' }} Orders</h6>
                        <div class="d-flex gap-2">
                            <div class="search-bar">
                                <img src="{{ asset('assets/admin/images/svg/Search.svg') }} " />
                                <input type="text" id="searchInput" placeholder="Search.." />
                            </div>
                            <button class="filter-btn">
                                <img src="{{ asset('assets/admin/images/svg/Calendar.svg') }} " />
                                Filter
                            </button>
                            <button class="filter-btn">
                                <img src="{{ asset('assets/admin/images/svg/Calendar.svg') }} " />
                                Filter
                            </button>
                            <button class="filter-btn">
                                <img src="{{ asset('assets/admin/images/svg/Send.svg') }} " />
                                send
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
                    <div class="">
                        <div class="table-responsive">


                            <table class="table mt-3">
                                <thead>
                                    <tr>
                                        <th scope="col">
                                            <label class="custom-checkbox">
                                                <input type="checkbox" id="select-all-orders" />
                                                <span class="checkmark"></span>
                                            </label>
                                        </th>
                                        <th scope="col">Order Date <img
                                                src="{{ asset('assets/admin/images/svg/sort.svg') }}" />
                                        </th>
                                        <th scope="col">Order Type <img
                                                src="{{ asset('assets/admin/images/svg/sort.svg') }}" />
                                        </th>
                                        <th scope="col">Tracking ID <img
                                                src="{{ asset('assets/admin/images/svg/sort.svg') }}" />
                                        </th>
                                        <th scope="col">Order Total <img
                                                src="{{ asset('assets/admin/images/svg/sort.svg') }}" />
                                        </th>
                                        <th scope="col">Action <img
                                                src="{{ asset('assets/admin/images/svg/sort.svg') }}" />
                                        </th>
                                        <th scope="col">Status <img
                                                src="{{ asset('assets/admin/images/svg/sort.svg') }} " />
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="table-body-order">

                                </tbody>
                            </table>

                            <nav class="d-flex justify-content align-items-center gap-2"
                                aria-label="Page navigation ">
                                <select id="itemsPerPage"
                                    class="form-select productDropdown3 form-select-sm filter-dropdown">
                                    <option value="3">3</option>
                                    <option value="5">5</option>
                                    <option value="10" selected>10</option>
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




@endsection
@section('script')


<script>
    $(document).ready(function() {
        let currentPage = 1;
        let itemsPerPage = 10; // Default items per page
        let searchQuery = '';
        let userId = "{{ $data['user']->id }}"
        // Function to fetch customers from the server
        function fetchCustomer(page, itemsPerPage, search) {

            $.ajax({
                url: "{{ route('order.customer') }}",
                type: 'GET',
                data: {
                    user_id: userId,
                    page: page,
                    items_per_page: itemsPerPage,
                    search: search,
                },
                success: function(response) {


                    renderTable(response.orders); // Assume your API returns the product array
                    updatePagination(response.total); // Update pagination based on total customers

                },
                error: function(xhr) {

                    updatePagination(1)
                },
            });
        }

        function getStatusClass(status) {
            switch (status) {
                case '0':
                    return 'custom-active'; // For status 0 (Pending)
                case '1':
                    return 'custom-active'; // For status 1 (Processing)
                case '2':
                    return 'custom-active'; // For status 2 (Delivered/Active)
                case '3':
                    return 'custom-inactive'; // For status 3 (Shipped)
                case '4':
                    return 'custom-inactive'; // For status 4 (Cancelled)
                case '5':
                    return 'shipping-active'; // For status 5 (Returned)
                default:
                    return 'unknown-status'; // Default case for unknown status
            }
        }

        function getStatusText(status) {
            switch (status) {
                case '0':
                    return 'Pending'; // For status 0 (Pending)
                case '1':
                    return 'Complete'; // For status 1 (Processing)
                case '2':
                    return 'Delivered'; // For status 2 (Delivered/Active)
                case '3':
                    return 'Canceled'; // For status 3 (Shipped)
                case '4':
                    return 'Return'; // For status 4 (Cancelled)
                case '5':
                    return 'Shipped'; // For status 5 (Returned)
                default:
                    return 'unknown-status'; // Default case for unknown status
            }
        }

        function formatDate(dateString) {
            const date = new Date(dateString);

            const options = {
                day: '2-digit',
                month: 'short', // For "Aug"
                year: 'numeric',
                hour: '2-digit',
                minute: '2-digit',
                hour12: true // For AM/PM format
            };

            return date.toLocaleString('en-US', options).replace(',', ' -'); // Format and replace comma
        }

        // Function to render the product table
        function renderTable(orders) {
            const tableBody = $('#table-body-order');
            tableBody.empty(); // Clear previous data

            orders.forEach(item => {
                const statusClass = getStatusClass(item.status);
                const statusText = getStatusText(item.status);
                const id = item.id || null
                const date = item.created_at || 'N/A'
                const order_type = item.order_type || 'Home Delivery'
                const order_number = item.order_number || 'N/A'
                const total = item.total || 0
                const status = item.status || 0

                let url = "{{ route('customers.view', ':id') }}";
                url = url.replace(':id', id);
                const row = `
                    <tr>
                    <td>
                        <label class="custom-checkbox">
                        <input type="checkbox" class="order-checkbox" data-id="${id}">
                        <span class="checkmark"></span>
                        </label>
                    </td>
                    <td>${formatDate(date)}</td>
                    <td>${order_type}</td>
                    <td>${order_number}</td>
                    <td>${total}</td>
                    <td>
                        <select
                                    id="itemsPerPage"
                                    class="form-select form-select-sm filter-dropdown"
                                    style="width: auto"
                                >
                                    <option value="3">bulk Action</option>
                                    <option value="5">page</option>
                                    <option value="10">per page</option>
                                </select>
                    </td>
                    <td><p class="${statusClass}">${statusText}</p></td>
                    </tr>
                `;
                tableBody.append(row);
                console.log(row);

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

        function handleOrderSelectAll() {
            const selectAll = document.getElementById('select-all-orders');
            const checkboxes = document.querySelectorAll('.order-checkbox');

            // Select or deselect all checkboxes
            selectAll.addEventListener('change', function() {
                checkboxes.forEach(checkbox => {
                    checkbox.checked = selectAll.checked;
                });
            });

            // If any checkbox is deselected, uncheck the 'select all' checkbox
            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    if (!this.checked) {
                        selectAll.checked = false;
                    } else if (document.querySelectorAll('.order-checkbox:checked').length ===
                        checkboxes.length) {
                        selectAll.checked = true;
                    }
                });
            });
        }

        handleOrderSelectAll();
    });
</script>


@endsection

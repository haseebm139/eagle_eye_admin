@extends('layout.master')
@section('title', 'Settings')

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

        .Ordermodel {
            width: auto !important;
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

        .item-bp {
            width: 80px;
        }

        .item-pp {
            width: 120px !important;
        }

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
            width: 200px;
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

@section('heading', 'Settings')

<div id="dynamic-content">
    <div class="green tab-pane fade show active" id="settings" role="tabpanel" aria-labelledby="settings-tab">

        <div class="container-fluid ">
            <div class="settingsSubTabs">
                <!-- Tab Navigation -->
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="mediumFontBorder active" id="new-settings-tab" data-bs-toggle="tab"
                            data-bs-target="#new-settings" type="button" role="tab" aria-controls="new-settings"
                            aria-selected="true">
                            Add Courier
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="mediumFontBorder" id="role-management-tab" data-bs-toggle="tab"
                            data-bs-target="#role-management" type="button" role="tab"
                            aria-controls="role-management" aria-selected="false">
                            Role Management
                        </button>
                    </li>

                </ul>

                <!-- Tab Content -->
                <div class="tab-content mt-3  " id="myTabContent">
                    <div class="tab-pane fade show active" id="new-settings" role="tabpanel"
                        aria-labelledby="new-settings-tab">

                        <div>
                            <div class="d-flex justify-content-between ">
                                <h6 class="SettingHeading">
                                    Account Settings
                                </h6>
                                <button class="order-btn2" onclick="submitForm()">
                                    Update
                                </button>
                            </div>
                            <form class="p-4" id="updateForm" action="{{ route('profile') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4 mb-4">
                                        <div>
                                            <label class="Label">First Name</label>
                                            <div class="inputBox">
                                                <img src="{{ asset('assets/admin/images/svg/Profile.svg') }}" />
                                                <input class="settingInput" name="name"
                                                    value="{{ auth()->user()->name ?? '' }}" placeholder="Osborn" />
                                            </div>
                                        </div>
                                        <div>
                                            <label class="Label">Last Name</label>
                                            <div class="inputBox">
                                                <img src="{{ asset('assets/admin/images/svg/Profile.svg') }}" />
                                                <input class="settingInput"
                                                    value="{{ auth()->user()->last_name ?? '' }}" name="last_name"
                                                    placeholder="Osborn" />
                                            </div>
                                        </div>
                                        <div>
                                            <label class="Label">Email</label>
                                            <div class="inputBox">
                                                <img src="{{ asset('assets/admin/images/svg/Message.svg') }}" />
                                                <input class="settingInput" placeholder="Davisbuchanan@gmail.com"
                                                    value="{{ auth()->user()->email ?? '' }}" />
                                            </div>
                                        </div>
                                        <div>
                                            <label class="Label">Phone Number</label>
                                            <div class="inputBox">
                                                <input class="settingInput" name="phone" id="phone2" name="phone"
                                                    value="{{ auth()->user()->phone ?? '' }}" type="tel"
                                                    value="" />
                                            </div>

                                        </div>
                                        <div>
                                            <label class="Label">Address</label>
                                            <div class="inputBox">
                                                <img src="{{ asset('assets/admin/images/svg/Location.svg') }} " />
                                                <input class="settingInput" name="address"
                                                    value="{{ auth()->user()->address ?? '' }}"
                                                    placeholder="No. 93 Skyfield Apartments" />
                                            </div>
                                        </div>
                                        <div>
                                            <!--Country -->
                                            <div class="select-something">
                                                <label class="Label">Country</label>
                                                <select class="inputBox" name="country" id="countySel" size="1">
                                                    <option value="{{ auth()->user()->country ?? '' }}"
                                                        selected="selected">Country
                                                    </option>
                                                </select>
                                            </div>
                                            <!--State -->

                                            <div class="d-flex gap-3">
                                                <div class="w-100">
                                                    <label class="Label">State</label>
                                                    <div class="inputBox">

                                                        <select class="settingInput" name="state" id="stateSel"
                                                            size="1">
                                                            <option value="{{ auth()->user()->state ?? '' }}"
                                                                selected="selected">state</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <!--State -->
                                                <div class="w-100">
                                                    <label class="Label">City</label>
                                                    <div class="inputBox">

                                                        <select class="settingInput" name="city" id="districtSel"
                                                            size="1">
                                                            <option value="{{ auth()->user()->city ?? '' }}"
                                                                selected="selected">city</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8 mb-4">
                                        <div class="d-flex flex-column justify-content-center align-items-center image-uploader5 gap-3"
                                            id="imageUploader5"
                                            onclick="document.getElementById('imageInput5').click()">
                                            <!-- Preview Image Container -->
                                            @php

                                                $img = auth()->user()->profile ?? 'assets/admin/images/Image.png';

                                            @endphp
                                            <img id="previewImage5" class="previewImage" src="{{ asset($img) }} "
                                                alt="Additional Image Preview 1"
                                                style="width: 0px; transition: all 0.5s ease" />

                                            <div class="layer">
                                                <div class=" " id="uploadPlaceholder5">
                                                    <img src="{{ asset('assets/admin/images/svg/uplload.svg') }}"
                                                        alt="Upload Icon" style="width: 25px" />

                                                </div>

                                                <div class="" id="deleteImage">
                                                    <img src="{{ asset('assets/admin/images/svg/delete.svg') }}"
                                                        alt="Upload Icon" style="width: 25px" />

                                                </div>
                                            </div>

                                            <!-- Hidden Input for Image Upload -->
                                            <input type="file" id="imageInput5" name="profile"
                                                style="display: none" accept="image/jpeg, image/png"
                                                onchange="previewUploadedFile5(event)" />
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="role-management" role="tabpanel"
                        aria-labelledby="role-management-tab">
                        <div class="">
                            <div>
                                <div class="d-flex justify-content-between mob-flex-direction-column">
                                    <div
                                        class="d-flex  position-relative align-items-center justify-content-betwee gap-3 w-100 mob-flex-direction-column">
                                        <div
                                            class="search-bar gap-2 d-flex w-o-search justify-content-between align-items-center mob-flex-direction-column">
                                            <div class="d-none-mob">
                                                <img src="{{ asset('assets/admin/images/svg/Search.svg') }}" />
                                                <input type="text" class="w-search" id="searchInput"
                                                    placeholder="Search Employee by name, role, ID or any related keywords" />
                                            </div>
                                            <div class="d-flex justify-content-around w-buttoon">

                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center gap-2">

                                            <button type="button" class="filter-btn n-emp" id="openModalButton_employee">
                                                <img
                                                    src="{{ asset('assets/admin/images/svg/_Avatar_add_button.svg') }}" />
                                                New Employee
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table order mt-3" id="emp_table_1234">
                                    <thead>
                                        <tr class="orderTable">
                                            <th scope="col">
                                                <label class="custom-checkbox" id="click_me"
                                                    for="select-all-emp-role">
                                                    <input type="checkbox" id="select-all-emp-role"
                                                        name="order_[]" />
                                                    <span class="checkmark"></span>
                                                </label>
                                            </th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Employee Id</th>
                                            <th scope="col">Role</th>
                                            <th scope="col">Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody id="table-body-emp-role">

                                    </tbody>
                                </table>


                            </div>
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


<div class="NewCompany" id="add_employees_modal" style="display: none;">
    <div class="model d-flex flex-column">
        <div class="d-flex justify-content-between align-items-center">
            <span class="my-2">Add a New Employee</span>
            <button class="cancel" id="cancelBtn_employyee">
                <img src="/assets/admin/images/svg/Frame_5800.svg">
            </button>
        </div>
        <form action="http://127.0.0.1:8000/admin/add-customer" method="post">
            <input type="hidden" name="_token" value="Xbompr6kE1D9qJth1pywkzZsf5JxESV8I7HiZVof" autocomplete="off">            <div>
                <p class="CustomerPopup">Customer Information</p>
             
                <div class="d-flex flex-column">
                  
                        <input type="text" class="inputBox" name="fname" placeholder="First Name">
                        <input type="text" class="inputBox" name="lname" placeholder="Last Name">
           
                    
                    <input type="email" class="inputBox" name="email" placeholder="Customer Email">

                    <input class="inputBox" id="phone" name="phone" type="tel" value="" />
                    <input type="password" class="inputBox" name="password" placeholder="password">
                   
                    <div class="d-flex gap-3">
                        <input type="text" class="inputBox" name="country" placeholder="country">

                        <!--State -->

                        <input type="text" class="inputBox" name="city" placeholder="city">
                    </div>
                    <input type="text" class="inputBox" name="Address" placeholder="Address">
                    <div class="d-flex gap-3">
                        <input type="text" class="inputBox" name="job_title" placeholder="job title">

                        <!--State -->

                        <input type="text" class="inputBox" name="job_type" placeholder="job type">
                    </div>
                </div>

                <div class="d-flex gap-3 mt-3">
                    <button type="button" class="cancel-btn2" id="close_employee_modal">Cancel</button>
                    <button type="submit" class="add-btn" name="add_new_employee" id="btn00">Add</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@24.6.0/build/js/intlTelInput.min.js"></script>
<script>
  const input = document.querySelector("#phone");
  window.intlTelInput(input, {
    loadUtilsOnInit: "https://cdn.jsdelivr.net/npm/intl-tel-input@24.6.0/build/js/utils.js",
  });
</script>
<script>
    
    $(document).ready(function() {
        $('#add_employees_modal').hide();
        $('#openModalButton_employee').on('click',function(e){
            e.preventDefault();
            $('#add_employees_modal').css('display','flex');
        });
        $('#cancelBtn_employyee').on('click',function(e){
            e.preventDefault();
            $('#add_employees_modal').css('display','none');
        })
        $('#close_employee_modal').on('click',function(e){
            e.preventDefault();
            $('#add_employees_modal').css('display','none');
        })
        // Listen for a change event on the "Select All" checkbox
        $('#select-all-emp-role').on('change', function() {

            // Set the checked status of all checkboxes within the table to match the "Select All" checkbox
            $('#table-body-emp-role').find('input[type="checkbox"]').prop('checked', this.checked);
        });
    });
</script>
<script src="{{ asset('assets/admin/js/CountryData.js') }}"></script>
<script>
    function submitForm() {

        document.getElementById("updateForm").submit(); // Submits the form
    }





    const input1 = document.querySelector("#phone1");
    const iti1 = window.intlTelInput(input1, {
        initialCountry: "us",
        // additional configuration as needed
    });

    const input2 = document.querySelector("#phone2");
    const iti2 = window.intlTelInput(input2, {
        initialCountry: "us",
        // additional configuration as needed
    });

    // Add validation logic for the second phone input
    const validatePhoneInput = (input, itiInstance, errorMsgElement, validMsgElement) => {
        const errorMap = ["Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];

        const reset = () => {
            input.classList.remove("error");
            errorMsgElement.innerHTML = "";
            validMsgElement.innerHTML = "";
            errorMsgElement.classList.add("hide");
            validMsgElement.classList.add("hide");
        };

        const showError = (msg) => {
            input.classList.add("error");
            errorMsgElement.innerHTML = msg;
            errorMsgElement.classList.remove("hide");
        };

        // Validate on button click
        document.querySelector("#btn").addEventListener("click", () => {
            reset();
            if (!input.value.trim()) {
                showError("Required");
            } else if (itiInstance.isValidNumber()) {
                validMsgElement.innerHTML = "Valid number: " + itiInstance.getNumber();
                validMsgElement.classList.remove("hide");
            } else {
                const errorCode = itiInstance.getValidationError();
                const msg = errorMap[errorCode] || "Invalid number";
                showError(msg);
            }
        });

        // Reset on change or keyup
        input.addEventListener("change", reset);
        input.addEventListener("keyup", reset);
    };

    // Initialize validation for both inputs
    validatePhoneInput(input1, iti1, document.querySelector("#error-msg1"), document.querySelector("#valid-msg1"));
    validatePhoneInput(input2, iti2, document.querySelector("#error-msg2"), document.querySelector("#valid-msg2"));
</script>
<script>
    $(document).ready(function() {
        let currentPage = 1;
        let itemsPerPage = 10; // Default items per page
        let searchQuery = '';
        // Function to fetch customers from the server
        function fetchCustomer(page, itemsPerPage, search) {

            $.ajax({
                url: "{{ route('employee.index') }}",
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
        function renderTable(employees) {
            const tableBody = $('#table-body-emp-role');
            tableBody.empty(); // Clear previous data

            employees.forEach(item => {
                const id = item.id || null
                const name = item.name || 'N/A'

                const email = item.email || 'N/A'
                const phone = item.phone || 'N/A'
                const empId = item.employee_id || 'N/A'
                const jobTtitle = item.job_title || 'N/A'
                const jobType = item.job_type || 'N/A'

                const status = item.status || 0
                const since = item.since || 'N/A'
                const image = "{{ asset('assets/admin/images/Image.png') }}" ||
                    "{{ asset('assets/admin/images/Image.png') }}"

                const row = `
                <tr>
                <td>
                    <label class="custom-checkbox">
                    <input type="checkbox" class="emp-role-checkbox"  name="order_[]" data-id="${id}">
                    <span class="checkmark"></span>
                    </label>
                </td>

                <td class="d-flex">

                <img src="${appUrl}${image}"  />
                <div class="pl-3">
                <p class="semi-bold-name mb-0 pb-1 ">${name}</p>
                <small class="mb-0">${email}</small>
                </div>
                </td>
                <td><span class="custom-blue">${empId}</span></td>
                <td>
                <p class="semi-bold-name mb-0 pb-1 ">${jobTtitle}</p>
                <small class="mb-0">${jobType}</small>
            </td>
                <td><p class="status-text custom-${status == 1 ? 'active' : 'inactive'}">${status == 1 ? 'Active' : 'Block'}</p></td>
                <td>
                <img src=${appUrl}/assets/admin/images/svg/TableIcon.svg  />
                </td>
                </tr>

            `;
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

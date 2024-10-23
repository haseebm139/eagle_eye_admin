@extends('layout.master')
@section('title', 'Orders')

@section('style')

    <style>
     
   
    </style>

@endsection
@section('content')

@section('heading', 'Orders')

<div id="dynamic-content">
    <div class="red tab-pane fade show active" id="orders" role="tabpanel" aria-labelledby="orders-tab">
        <div class="container-fluid order-container" id="orderContainer">
            <div class="Width d-flex justify-content-between align-items-center my-3">
                <span class="ml-2 ">Order Summary</span>
                <button class="order-btn d-flex align-items-center" id="addOrderBtn_for_modal">
                    +
                    <pre></pre>
                    create a New Order
                </button>
            </div>
            <div class="row">
            <div class="col-md-4 mb-4">
                <div class="">
                    <div class="card text-center">
                        <div class="alignemnt">
                            <img src="{{ asset('assets/admin/images/svg/icon3.svg') }}" />
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
                                <p class="card_counting_numbers">$4,000,000.00</p>
                            </span>
                            <span>
                                <p class="sales">Volume</p>
                                <p class="card_counting_numbers">
                                    450 <span class="rates">+20.00%</span>
                                </p>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class=" " >
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
                                <p class="sales">Customers</p>
                                <p class="card_counting_numbers">
                                    1,250 <span class="rates">+15.80%</span>
                                </p>
                            </span>
                            <span>
                                <p class="sales">Active</p>
                                <p class="card_counting_numbers">
                                    1,180 <span class="rates"> 85%</span>
                                </p>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="" >
                    <div class="card text-center">
                        <div class="alignemnt">
                            <img src="{{ asset('assets/admin/images/svg/cart2.svg') }} " />
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
                                <p class="card_counting_numbers">450</p>
                            </span>
                            <span>
                                <p class="sales">Pending</p>
                                <p class="card_counting_numbers">5</p>
                            </span>

                            <span>
                                <p class="sales">Completed</p>
                                <p class="card_counting_numbers">445</p>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
             
               
                
            </div>
            <div class="product2 mt-4">
               
                    <div class="row">
                        <div class="col-md-6">
                            <h6 id="customerOrders">Customer Orders</h6>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex gap-2 position-relative mob-flex-direction-column">
                                <div class="search-bar">
                                    <img src="{{ asset('assets/admin/images/svg/Search.svg') }} " />
                                    <input type="text" placeholder="Search.." />
                                </div>
        
                                <button type="button" class="filter-btn" id="openModalButton-filter">
                                    <img src="{{ asset('assets/admin/images/svg/filter1.svg') }}" /> Filter
                                </button>
        
                                <div class="modal-content" id="modal-content-filter">
                                    <div class="modal-header">
                                        <h6>Filter</h6>
                                    </div>
                                    <div class="modal-body">
                                        <form id="filterForm">
                                            <div class="filter-group">
                                                <label>Order Type</label>
                                                <div
                                                    class="d-flex justify-content-between align-items-center mt-1 filter-group2">
                                                    <label><input class="" type="checkbox" /> Home
                                                        Delivery</label>
                                                    <label><input type="checkbox" /> Pick Up</label>
                                                </div>
                                            </div>
        
                                            <div class="filter-group">
                                                <label>Status</label>
                                                <select class="select">
                                                    <option value="all">All</option>
                                                    <option value="delivered">Delivered</option>
                                                    <option value="pending">Pending</option>
                                                </select>
                                            </div>
        
                                            <div class="filter-group">
                                                <label>Customer</label>
                                                <select class="select">
                                                    <option value="all">All</option>
                                                    <option value="customer1">Customer 1</option>
                                                    <option value="customer2">Customer 2</option>
                                                </select>
                                            </div>
        
                                            <div class="filter-group">
                                                <label>Amount</label>
                                                <div class="amount-fields">
                                                    <div class="d-flex flex-column">
                                                        <label>From</label>
                                                        <input type="number" placeholder="0.00" />
                                                    </div>
                                                    <div class="d-flex flex-column">
                                                        <label>To</label>
                                                        <input type="number" placeholder="0.00" />
                                                    </div>
                                                </div>
                                            </div>
        
                                            <button type="submit" class="filter-btn-submit">
                                                Filter
                                            </button>
                                        </form>
                                    </div>
                                </div>
        
                                <button type="button" class="filter-btn" id="openModalButton2-calander">
                                    <img src="{{ asset('assets/admin/images/svg/Calendar.svg') }}" /> Calendar
                                </button>
                                <div id="modal-content2-calander" class="modal-content2">
                                    <h6>By Date</h6>
        
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex flex-column align-items-baseline mt-1 filter-group2">
                                            <label class="custom-checkbox">
                                                <input type="checkbox" class="product-checkbox" data-id="${product.id}" />
                                                <span class="checkmark2"></span>
                                                This Week
                                            </label>
                                            <label class="custom-checkbox">
                                                <input type="checkbox" class="product-checkbox" data-id="${product.id}" />
                                                <span class="checkmark2"></span>
                                                This Month
                                            </label>
        
                                            <label class="custom-checkbox">
                                                <input type="checkbox" class="product-checkbox" data-id="${product.id}" />
                                                <span class="checkmark2"></span>
                                                This Year
                                            </label>
        
                                            <label class="custom-checkbox">
                                                <input type="checkbox" class="product-checkbox" data-id="${product.id}" />
                                                <span class="checkmark2"></span>
                                                Date range
                                            </label>
                                        </div>
        
                                        <div class="d-flex flex-column align-items-baseline mt-1 filter-group2">
                                            <label class="custom-checkbox">
                                                <input type="checkbox" class="product-checkbox" data-id="${product.id}" />
                                                <span class="checkmark2"></span>
                                                Last Week
                                            </label>
        
                                            <label class="custom-checkbox">
                                                <input type="checkbox" class="product-checkbox" data-id="${product.id}" />
                                                <span class="checkmark2"></span>
                                                Last Month
                                            </label>
                                            <label class="custom-checkbox">
                                                <input type="checkbox" class="product-checkbox" data-id="${product.id}" />
                                                <span class="checkmark2"></span>
                                                Last Year
                                            </label>
                                        </div>
                                    </div>
        
                                    <div class="toggle-button">
                                        <button class="toggle-option active" id="from-btn">
                                            From
                                        </button>
                                        <button class="toggle-option" id="to-btn">To</button>
                                    </div>
        
                                    <div class="calendar">
                                        <header>
                                            <h6>
                                                <select class="year-select" id="year-select"></select>
                                                <select class="year-select" id="month-select"></select>
                                            </h6>
                                        </header>
                                        <section class="mainCalendar">
                                            <ul class="days">
                                                <li>S</li>
                                                <li>M</li>
                                                <li>T</li>
                                                <li>W</li>
                                                <li>T</li>
                                                <li>F</li>
                                                <li>S</li>
                                            </ul>
                                            <ul class="dates"></ul>
                                        </section>
                                    </div>
                                    <button class="calendarbtn">filter</button>
                                </div>
                                <button class="filter-btn">
                                    <img src="{{ asset('assets/admin/images/svg/Send.svg') }}" /> Send
                                </button>
                                <div>
                                    <select id="itemsPerPage" class="form-select form-select-sm filter-dropdown"
                                        >
                                        <option value="3">bulk Action</option>
                                        <option value="5">page</option>
                                        <option value="10">per page</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                       
    
    
                       
    
    
                    </div>
                    <div class="">
                        <!-- Tab Navigation -->
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="mediumFontBorder active" id="new-orders-tab" data-bs-toggle="tab"
                                    data-bs-target="#new-orders" type="button" role="tab"
                                    aria-controls="new-orders" aria-selected="true">
                                    New Orders
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="mediumFontBorder" id="assigned-orders-tab" data-bs-toggle="tab"
                                    data-bs-target="#assigned-orders" type="button" role="tab"
                                    aria-controls="assigned-orders" aria-selected="false">
                                    Assigned Orders
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="mediumFontBorder" id="delivered-tab" data-bs-toggle="tab"
                                    data-bs-target="#delivered" type="button" role="tab" aria-controls="delivered"
                                    aria-selected="false">
                                    Delivered
                                </button>
                            </li>
                        </ul>
    
                        <!-- Tab Content -->
                        <div class="tab-content mt-3" id="myTabContent">
                            <div class="tab-pane fade show active" id="new-orders" role="tabpanel"
                                aria-labelledby="new-orders-tab">
                                    <div class="table-responsive">
                                    <table class="table order mt-3">
                                        <thead>
                                            <tr class="orderTable">
                                                <th scope="col">
                                                    <label class="custom-checkbox">
                                                        <input type="checkbox" id="select-all-cm-orders" />
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </th>
                                                <th scope="col">Customer Name</th>
                                                <th scope="col">Order Date</th>
                                                <th scope="col">Shipping</th>
                                                <th scope="col">Location</th>
                                                <th scope="col">Tracking ID</th>
                                                <th scope="col">Qty</th>
                                                <th scope="col">Order Total</th>
                                                <th scope="col">Assign Status</th>
                                            </tr>
                                        </thead>
                                        <tbody id="table-body-cm-order">
                                            <!-- Rows will be generated dynamically here -->
                                        </tbody>
                                    </table>
                                   

                                    </div>
    
                                    <div
                                    class="pagination-container d-flex justify-content-between align-items-center ">
                                        <div class="d-flex align-items-center">
                                            <span id="pagination-info-customer-orders" class="item-pp"></span>
                                            <label for="items-per-page-customer-orders" class="item-pp  label_items_per_page">Items per
                                                page:</label>
                                            <select id="newOrderItemsPerPage1" class="form-select ms-2 item-bp">
                                                <option value="3">3</option>
                                                <option value="5">5</option>
                                                <option value="10" selected>10</option>
                                            </select>
                                        </div>

                                        <nav class="d-flex justify-content align-items-center gap-2 mob-flex-direction-column-reverse"
                                            aria-label="Page navigation ">
                                            <select id="newOrderItemsPerPage"
                                                class="form-select productDropdown3 form-select-sm filter-dropdown">
                                                <option value="3">3</option>
                                                <option value="5">5</option>
                                                <option value="10" selected>10</option>
                                            </select>
                                            <p class="TotalItems " id="newOrderTotalItems">1-10 of 100 items</p>
                                            <ul class="pagination mb-0">
                                                <li class="page-item">
                                                    <a class="page-link" href="#" id="new-order-prev-page">
                                                        <img
                                                            src="{{ asset('assets/admin/images/svg/Arrow-Down4.svg') }} " />
                                                    </a>
                                                </li>
                                                <li class="page-item">
                                                    <a class="page-link" href="#" id="new-order-next-page">
                                                        <img
                                                            src="{{ asset('assets/admin/images/svg/Arrow-Down3.svg') }} " />
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                   
    
    
                           
                            </div>
                            <div class="tab-pane fade" id="assigned-orders" role="tabpanel"
                                aria-labelledby="assigned-orders-tab">
                                <div class="table-responsive">
                                    <table class="table order mt-3">
                                        <thead>
                                            <tr class="orderTable">
                                                <th scope="col">
                                                    <label class="custom-checkbox">
                                                        <input type="checkbox" id="select-all-cm-orders2" />
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </th>
                                                <th scope="col">Customer Name</th>
                                                <th scope="col">Order Date</th>
                                                <th scope="col">Shipping</th>
                                                <th scope="col">Location</th>
                                                <th scope="col">Tracking ID</th>
                                                <th scope="col">Qty</th>
                                                <th scope="col">Order Total</th>
                                                <th scope="col">Assign Work</th>
                                                <th scope="col">Action</th>
                                                <th scope="col">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody id="table-body-cm-order2">
                                            <!-- Rows will be generated dynamically here -->
                                        </tbody>
                                    </table>
    
    
                                    <div
                                        class="pagination-container d-flex justify-content-between align-items-center mt-3">
                                        <div class="d-flex align-items-center">
                                            <span id="pagination-info-customer-orders" class="item-pp"></span>
                                            <label for="items-per-page-customer-orders" class="item-pp ms-3">Items per
                                                page:</label>
                                            <select id="assignOrderItemsPerPage1" class="form-select ms-2 item-bp">
                                                <option value="3">3</option>
                                                <option value="5">5</option>
                                                <option value="10" selected>10</option>
                                            </select>
                                        </div>
    
                                        <nav class="d-flex justify-content align-items-center gap-2 mob-flex-direction-column-reverse"
                                            aria-label="Page navigation ">
                                            <select id="assignOrderItemsPerPage"
                                                class="form-select productDropdown3 form-select-sm filter-dropdown">
                                                <option value="3">3</option>
                                                <option value="5">5</option>
                                                <option value="10" selected>10</option>
                                            </select>
                                            <p class="TotalItems " id="newAssginTotalItems">1-10 of 100 items</p>
                                            <ul class="pagination mb-0">
                                                <li class="page-item">
                                                    <a class="page-link" href="#" id="assign-order-prev-page">
                                                        <img
                                                            src="{{ asset('assets/admin/images/svg/Arrow-Down4.svg') }} " />
                                                    </a>
                                                </li>
                                                <li class="page-item">
                                                    <a class="page-link" href="#" id="assign-order-next-page">
                                                        <img
                                                            src="{{ asset('assets/admin/images/svg/Arrow-Down3.svg') }} " />
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="delivered" role="tabpanel"
                                    aria-labelledby="delivered-tab">
                                    <div>Content for Delivered</div>
                                </div>
                            </div>
                        </div>
    
    
                    </div>
                
             
                
            </div>
            <div class="container-fluid" id="viewSummary" style="display: none;">
                <h6>Order Summary</h6>
                <div class="d-flex gap-3 mt-3">
                    <div class="" style="width: 30%">
                        <div class="card text-center">
                            <div class="alignemnt">
                                <div class="d-flex gap-3">
                                    <img src="{{ asset('assets/admin/images/svg/client2.svg') }} " />
                                    <div class="">
                                        <p class="mediumFont2 m-0 p-0 text-left">
                                            Janet Adebayo
                                        </p>
                                        <p class="mediumFont3 m-0 p-0 text-left">
                                            Last Order <span>12 sept 2022</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="leftAlignement">
                                    <button class="CustomerStatusPending">Pending</button>
                                    <!-- <p class="side-text">This Week</p> -->
                                </div>
                            </div>

                            <div class="bottomContent">
                                <span>
                                    <p class="sales">Phone</p>
                                    <p class="bold">+236365746</p>
                                </span>

                                <span>
                                    <p class="sales">Email</p>
                                    <p class="bold">abc@yopmail.com</p>
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
                                        No.15 Adekunle Street,Yaba, Lagos State
                                    </p>
                                </span>

                                <span class="bottomSpan">
                                    <p class="sales">Billing Address</p>
                                    <p class="bold">
                                        No.15 Adekunle Street,Yaba, Lagos State
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
                                    <p class="bold3">$1,250</p>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="settingsSubTabs my-4 pb-5">
                    <p class="LightFont2 py-3">Order <span class="mediumFont2 m-0">#166559</span> was place on <span
                            class="mediumFont2 m-0">August 14,2018</span>and is currently <span
                            class="mediumFont2 m-0">Completed</span> </p>
                    <h1 class="SettingHeading my-2">Order Details</h1>


                    <div>

                        <table class="table table-bordered invoice-table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="LightFont2">Adhesive Prints <span class="mediumFont2"> ×
                                            2</span><br><small class="mediumFont2">SKU: PR.AP</small></td>
                                    <td>$150.14</td>
                                </tr>
                                <tr>
                                    <td class="LightFont2">Adhesive Prints <span class="mediumFont2">×
                                            1</span><br><small class="mediumFont2">SKU: PR.AP</small></td>
                                    <td>$61.49</td>
                                </tr>
                                <tr>
                                    <td colspan="1"><strong>Subtotal:</strong></td>
                                    <td>$211.63</td>
                                </tr>
                                <tr>
                                    <td colspan="1"><strong>Shipping:</strong></td>
                                    <td>Shipping</td>
                                </tr>
                                <tr>
                                    <td colspan="1"><strong>Discount:</strong></td>
                                    <td>-$105.82</td>
                                </tr>
                                <tr>
                                    <td colspan="1"><strong>Payment method:</strong></td>
                                    <td>Purchase Order</td>
                                </tr>
                                <tr>
                                    <td colspan="1"><strong>Total:</strong></td>
                                    <td><strong>$105.81</strong></td>
                                </tr>
                            </tbody>
                        </table>

                        <div
                            class="invoice-footer d-flex flex-column justify-content-center align-items-start gap-3 text-center">
                            <button type="button" class="btn btn-outline-primary">Print Invoice</button>
                            <button type="button" class="btn btn-outline-primary">Download Invoice</button>
                        </div>
                    </div>
                </div>


                <div class="container settingsSubTabs mt-5 py-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Billing address</h5>
                            <div class="address-box my-3">

                                <p>
                                    Craig Davidson<br>
                                    Eagle Eye Partners<br>
                                    13375 Stemmons Freeway<br>
                                    Dallas<br>
                                    Dallas, TX 75243<br>
                                    <i class="icon fas fa-phone-alt"></i> 9724662100<br>
                                    <i class="icon-envelope fas fa-envelope"></i> miles@eagleeyesigns.net
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h5>Shipping address</h5>
                            <div class="address-box my-3">

                                <p>
                                    Craig Davidson<br>
                                    Eagle Eye Partners<br>
                                    13375 Stemmons Freeway<br>
                                    Dallas<br>
                                    Dallas, TX 75243<br>
                                    <i class="icon fas fa-phone-alt"></i> 9724662100<br>
                                    <i class="icon-envelope fas fa-envelope"></i> miles@eagleeyesigns.net
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- new inner page -->
            <div class="viewOrder px-3" id="viewOrder" style="display: none">
                <div class="Width d-flex flex-wrap gap-3 justify-content-between align-items-center customer2">
                    <div class="d-flex align-items-center justify-content-center gap-3">
                        <span class="d-flex gap-2">
                            <p class="mediumFont m-0">Order Number</p>
                            <p class="LightFont m-0">#88540</p>
                        </span>

                        <span class="d-flex gap-2">
                            <p class="mediumFont m-0">Order Date</p>
                            <p class="LightFont m-0">12Sept 2022 - 12:55pm</p>
                        </span>

                        <span class="d-flex gap-2">
                            <p class="mediumFont m-0">Tracking ID</p>
                            <p class="LightFont m-0">1534ft9</p>
                        </span>
                        <span>
                            <img src="{{ asset('assets/admin/images/svg/copyIcon.svg') }}" />
                        </span>
                    </div>
                    <div class="d-flex gap-3">
                        <div class="dropdown-container dropdown2 position-relative">
                            <select id="data-category" class="form-control4 d-inline w-auto">
                                <option value="Revenue">Ready to Ship</option>
                                <option value="Expenses">This Week</option>
                                <option value="Profit Margin">This Week</option>
                            </select>
                        </div>
                        <button class="order-btn d-flex align-items-center">
                            Print Invoice
                        </button>
                        <button class="suspension-btn d-flex align-items-center">
                            Cancel Order
                        </button>
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
                                            Janet Adebayo
                                        </p>
                                        <p class="mediumFont3 m-0 p-0 text-left">
                                            Last Order <span>12 sept 2022</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="leftAlignement">
                                    <button class="CustomerStatusPending">Pending</button>
                                    <!-- <p class="side-text">This Week</p> -->
                                </div>
                            </div>

                            <div class="bottomContent">
                                <span>
                                    <p class="sales">Phone</p>
                                    <p class="bold">+236365746</p>
                                </span>

                                <span>
                                    <p class="sales">Email</p>
                                    <p class="bold">abc@yopmail.com</p>
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
                                        No.15 Adekunle Street,Yaba, Lagos State
                                    </p>
                                </span>

                                <span class="bottomSpan">
                                    <p class="sales">Billing Address</p>
                                    <p class="bold">
                                        No.15 Adekunle Street,Yaba, Lagos State
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
                                    <p class="bold3">$1,250</p>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="product2 my-4">
                    <div class="d-flex justify-content-between">
                        <h6>Items 3</h6>

                        <div class="d-flex gap-2 position-relative">
                            <div class="search-bar">
                                <img src="{{ asset('assets/admin/images/svg/Search.svg') }} " />
                                <input type="text" placeholder="Search.." />
                            </div>

                            <button type="button" class="filter-btn" id="openModalButton">
                                <img src="{{ asset('assets/admin/images/svg/filter1.svg') }} " /> Filter
                            </button>

                            <button type="button" class="filter-btn" id="openModalButton2">
                                <img src="{{ asset('assets/admin/images/svg/Calendar.svg') }} " /> Calendar
                            </button>

                            <button class="filter-btn">
                                <img src="{{ asset('assets/admin/images/svg/Send.svg') }} " /> Send
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

                    <div class="table-responsive">
                        <table class="table order mt-3">
                            <thead>
                                <tr class="orderTable">
                                    <th scope="col">
                                        <label class="custom-checkbox">
                                            <input type="checkbox" id="select-all" />
                                            <span class="checkmark"></span>
                                        </label>
                                    </th>
                                    <th></th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Shipping Service</th>
                                    <th scope="col">Unit Price</th>
                                    <th scope="col">Qty</th>
                                    <th scope="col">Discount</th>
                                    <th scope="col">Order Total</th>
                                    <th scope="col">Action</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody id="table-body1">

                            </tbody>
                        </table>

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
                                        <a class="page-link" href="#" id="prev-page1">
                                            <img src="{{ asset('assets/admin/images/svg/Arrow-Down4.svg') }} " />
                                        </a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#" id="next-page1">
                                            <img src="{{ asset('assets/admin/images/svg/Arrow-Down3.svg') }} " />
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="NewCompany" id="add_new_order_modal">
                <div class="model Ordermodel d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="my-2">Create New Order</span>
                        <button class="cancel" id="cancelBtn1">
                            <img src="{{ asset('assets/admin/images/svg/Frame_5800.svg') }} " />
                        </button>
                    </div>
                    <form>
                      <style>
                        .position-relative{
                            position: relative;
                        }
                        #product-list{
                            position: absolute;
                            z-index: 1;
                            top:40px;
                            background-color: #fff;
                            width: 100%;
                        }
                        .product-item{
                            display: flex;
                            align-items: center;
                            justify-content: space-between;
                        }
                        .product-item a{
                            cursor: pointer;
                            background-color: #333;
                            color: #fff;
                        }
                        </style>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-between">
                                        <p class="CustomerPopup">Order Details</p>
                                        <div class="d-flex gap-3">
                                            <p class="CustomerPopup">New Customer</p>
                                            <div class="">
                                                <label class="switch switch2">
                                                    <input type="checkbox" id="toggleSwitch" />
                                                    <span class="slider"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <select class="inputBox" id="customer" size="1">
                                            <option value="" selected="selected">
                                                Select Customer
                                            </option>
                                            <option value="" selected="selected">
                                                Select Customer
                                            </option>
                                            <option value="" selected="selected">
                                                Select Customer
                                            </option>
                                        </select>
                                        <div class="d-flex gap-2">
                                            <select class="inputBox" id="customer" size="1">
                                                <option value="" selected="selected">
                                                    Payment Type
                                                </option>
                                                <option value="" selected="selected">
                                                    Select Customer
                                                </option>
                                                <option value="" selected="selected">
                                                    Select Customer
                                                </option>
                                            </select>
                                            <select class="inputBox" id="customer" size="1">
                                                <option value="" selected="selected">
                                                    Order Type
                                                </option>
                                                <option value="" selected="selected">
                                                    Select Customer
                                                </option>
                                                <option value="" selected="selected">
                                                    Select Customer
                                                </option>
                                            </select>
                                        </div>
                                        <div class="mt-3">
                                            <p>Order Date & Time</p>
                                            <div class="d-flex gap-3">
                                                <input type="date" id="date" name="date" class="date"
                                                    value="2024-01-01" />
                                                <input type="time" id="time" name="time" class="date"
                                                    value="00:00" />
                                            </div>
                                        </div>

                                        <div class="mt-3">
                                            <p>Order Status</p>
                                            <select class="inputBox" id="customerPending" size="1">
                                                <option value="" selected="selected">
                                                    Pending
                                                </option>
                                                <option value="" selected="selected">
                                                    Pending
                                                </option>
                                                <option value="" selected="selected">
                                                    Pending
                                                </option>
                                            </select>

                                            <textarea class="NoteDescription" id="OrderNote" name="OrderNote" rows="4" cols="50"
                                                placeholder="Order Note"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 d-flex flex-column">
                                    <p class="CustomerPopup">Items</p>
                                    <div class="w-100 position-relative">
                                        <div class='Search_field_wrapper'>
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                            <input type="search" name="search" placeholder="Search product name" class="form-control" id="search">
                                        </div>
                                        <div id="product-list">
                                            <!-- Filtered products will be displayed here -->
                                          </div>
                                         
                                         
                                    </div>
                                    <div id="selected-products" class="h-100" style="display:none">
                                        <!-- Selected products will be displayed here -->
                                      </div>
                                    
                                      <div style="display:flex"
                                        class="h-100 flex-column text-center justify-content-center align-items-center" id="before_add_product">
                                        <img src="{{ asset('assets/admin/images/iconContainer.png') }} "
                                            class="lock" />
                                        <div>
                                            <h6>Add Products to Your Order</h6>
                                            <p>Search and add products to this order.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-center gap-3 mt-3">
                                <button class="cancel-btn2 w-25">Cancel</button>
                                <button class="add-btn w-25" id="btn00">Add</button>
                            </div>
                       
                    </form>
                </div>
            </div>
        </div>
    </div>




@endsection
@section('script')

    {{-- Begin::New Order JS --}}
    <script>

let products = [
  { id: 1, name: 'Product 1', image: 'https://i.pinimg.com/736x/d9/30/5d/d9305d1b4bb31096c3cb467f88dc343c.jpg', quantity: 1 },
  { id: 2, name: 'Product 2', image: 'https://i.pinimg.com/736x/d9/30/5d/d9305d1b4bb31096c3cb467f88dc343c.jpg', quantity: 1 },
  { id: 3, name: 'Product 3', image: 'https://i.pinimg.com/736x/d9/30/5d/d9305d1b4bb31096c3cb467f88dc343c.jpg', quantity: 1 },
  // Add more products as needed
];

let selectedProducts = [];

// Function to display filtered products
function displayFilteredProducts(productsToShow) {
  let productList = document.getElementById('product-list');
  productList.innerHTML = ''; // Clear previous results

  if (productsToShow.length === 0) return; // Do nothing if no products to show

  productsToShow.forEach(product => {
    let productDiv = document.createElement('div');
    productDiv.className = 'product-item';
    productDiv.innerHTML = `
      <p>${product.name}</p>
      <a onclick="selectProduct(${product.id})">Select</a>
    `;
    productList.appendChild(productDiv);
  });
}

// Function to handle search input
document.getElementById('search').addEventListener('input', function(e) {
  let searchTerm = e.target.value.toLowerCase();

  if (searchTerm === '') {
    // Clear the product list when search is empty
    displayFilteredProducts([]);
  } else {
    // Filter and display products based on search term
    let filteredProducts = products.filter(product => product.name.toLowerCase().includes(searchTerm));
    displayFilteredProducts(filteredProducts);
  }
});

// Function to add product to selected products
function selectProduct(productId) {
  let product = products.find(p => p.id === productId);
  
  if (!selectedProducts.find(p => p.id === productId)) {
    selectedProducts.push(product);
    displaySelectedProducts();

    // Hide the 'before_add_product' div and show the 'selected-products' div
    document.getElementById('before_add_product').style.display = 'none';
    document.getElementById('selected-products').style.display = 'block';
  }
}

// Function to display selected products
function displaySelectedProducts() {
  let selectedProductsDiv = document.getElementById('selected-products');
  selectedProductsDiv.innerHTML = ''; // Clear previous selections

  selectedProducts.forEach(product => {
    let selectedProductDiv = document.createElement('div');
    selectedProductDiv.className = 'selected-product';
    selectedProductDiv.innerHTML = `
      <p>${product.name}</p>
      <img src="${product.image}" alt="${product.name}" style="width: 50px; height: 50px;">
      <p>Quantity: ${product.quantity}</p>
    `;
    selectedProductsDiv.appendChild(selectedProductDiv);
  });
}


        $(document).ready(function() {
            $('#addOrderBtn_for_modal').on('click',function(e){
                e.preventDefault();
                $('#add_new_order_modal').css('display','flex');
            });
            $('#cancelBtn1').on('click',function(e){
                e.preventDefault();
                $('#add_new_order_modal').css('display','none');
            });
            $('.cancel-btn2').on('click',function(e){
                e.preventDefault();
                $('#add_new_order_modal').css('display','none');
                selectedProducts = [];
                    $('#search').val('');
                    document.getElementById('before_add_product').style.display = 'flex';
                        document.getElementById('selected-products').style.display = 'none';
                    displayFilteredProducts([]);
                    // Update the display to remove all selected products
                    document.getElementById('selected-products').innerHTML = '';
            });

            $('#openModalButton-filter').on('click', function(e) {
    e.preventDefault();
    $('#modal-content-filter').toggle(); // This will toggle between show and hide
});
$('#openModalButton2-calander').on('click', function(e) {
    e.preventDefault();
    $('#modal-content2-calander').toggle(); // This will toggle between show and hide
});

            let currentPage = 1;
            let itemsPerPage = 10; // Default items per page
            let searchQuery = '';
            let employeesearchQuery = '';
            let employees = []

            $('#new-orders-tab').on('click', function() {
                fetchNewOrders(currentPage, itemsPerPage, searchQuery);
            });

            // Function to fetch customers from the server
            function fetchNewOrders(page, itemsPerPage, search) {

                $.ajax({
                    url: "{{ route('order.neworder') }}",
                    type: 'GET',
                    data: {
                        page: page,
                        items_per_page: itemsPerPage,
                        search: search,
                    },
                    success: function(response) {




                        renderNewOrdersTable(response
                            .orders); // Assume your API returns the product array
                        updateOrderPagination(response
                            .total); // Update pagination based on total customers

                    },
                    error: function(xhr) {

                        updateOrderPagination(1)
                    },
                });
            }

            // Function to render the product table
            function renderNewOrdersTable(orders) {
                const tableBody = $('#table-body-cm-order');
                tableBody.empty(); // Clear previous data


                orders.forEach(item => {

                    const statusClass = getStatusClass(item.status);
                    const statusText = getStatusText(item.status);
                    const id = item.id || null
                    const customerName = item.customer.name || 'N/A'

                    const orderDate = item.created_at || 'N/A'
                    const orderShipping = item.phone || 'N/A'
                    const orderLocation = item.location || 'N/A'
                    const trackingId = item.order_number || 'N/A'
                    const qty = item.total_qty || 'N/A'
                    const orderTotal = item.total || 'N/A'

                    const status = item.status || 0
                    const since = item.since || 'N/A'
                    const image = "{{ asset('assets/admin/images/Image.png') }}" ||
                        "{{ asset('assets/admin/images/Image.png') }}"
                    let url = "{{ route('orders.view', ':id') }}";
                    url = url.replace(':id', id);
                    const row = `
                    <tr>
                        <td>
                            <label class="custom-checkbox">
                            <input type="checkbox" class="cm-order-checkbox" data-id="${id}">
                            <span class="checkmark"></span>
                            </label>
                        </td>
                        <td id="customerName"><a href="${url}">${customerName}</a></td>
                        <td>${formatDate(orderDate)}</td>
                        <td>${orderShipping}</td>
                        <td>${orderLocation}</td>
                        <td>${trackingId}</td>
                        <td>${qty}</td>
                        <td>${orderTotal}</td>
                        <td>
                            <span class="Assigned" id="assignButton-${id}">
                            Assign too
                            <img src="{{ asset('assets/admin/svg/fi_chevron-down2.svg') }} " />
                            </span>
                            <div class="dropdown-like" id="dropdown-${id}" style="display:none;">
                                <input type="text" class='employee-search' id="searchInput-${id}"  data-id=${id} placeholder="Search"/>
                                <ul id="assignList-${id} " data-order-id=${id}>
                                    ${employees.map(employee => `
                                                                                                                                                                        <li class = >
                                                                                                                                                                            <label>
                                                                                                                                                                                <img src="${appUrl}/${employee.profile}" alt="user-avatar" class="user-avatar employee-li" id="employee-li-${employee.id}" data-id=${employee.id}  />
                                                                                                                                                                                ${employee.name}
                                                                                                                                                                            </label>
                                                                                                                                                                        </li>
                                                                                                                                                                    `).join('')}
                                </ul>
                            </div>
                        </td>
                    </tr>

                `;
                    tableBody.append(row);


                    document.getElementById(`assignButton-${id}`)?.addEventListener('click',
                        function() {


                            const dropdown = document.getElementById(`dropdown-${id}`);

                            if (dropdown) {
                                dropdown.style.display = dropdown.style.display === 'none' ? 'block' :
                                    'none';

                            }
                        });

                    document.getElementById(`assignList-${id}`)?.addEventListener('click', function(
                        e) {
                        if (e.target.tagName === 'LABEL' || e.target.tagName === 'IMG') {
                            const labelElement = e.target.closest('label');
                            if (labelElement) {
                                const selectedName = labelElement.textContent.trim();
                                const assignButton = document.getElementById(
                                    `assignButton-${id}`);
                                if (assignButton) {
                                    assignButton.innerHTML =
                                        `${selectedName}   <img src="{{ asset('assets/admin/svg/fi_chevron-down.svg') }} " />`;
                                    const dropdown = document.getElementById(
                                        `dropdown-${id}`);
                                    if (dropdown) {
                                        dropdown.style.display = 'none';
                                    }
                                }
                            }
                        }
                    });
                });

            }

            // Function to update pagination info
            function updateOrderPagination(total) {

                const totalItems = total; // Total customers from API response
                const totalPages = Math.ceil(totalItems / itemsPerPage);
                $("#newOrderTotalItems").text(
                    `Showing ${((currentPage - 1) * itemsPerPage) + 1}-${Math.min(currentPage * itemsPerPage, totalItems)} of ${totalItems} items`
                );

                // Disable/Enable pagination buttons
                $('#new-order-prev-page').toggleClass('disabled', currentPage === 1);
                $('#new-order-next-page').toggleClass('disabled', currentPage === totalPages);
            }




            // Handle pagination button clicks
            $('#new-order-prev-page').click(function() {
                if (currentPage > 1) {
                    currentPage--;


                    fetchNewOrders(currentPage, itemsPerPage, searchQuery);
                }
            });

            $('#new-order-next-page').click(function() {
                currentPage++;

                fetchNewOrders(currentPage, itemsPerPage, searchQuery);
            });

            // Handle items per page change
            $(document).on('change', '#newOrderItemsPerPage', function() {

                itemsPerPage = $(this).val();
                currentPage = 1; // Reset to first page

                fetchNewOrders(currentPage, itemsPerPage, searchQuery);
            });

            $(document).on('change', '#newOrderItemsPerPage1', function() {

                itemsPerPage = $(this).val();
                currentPage = 1; // Reset to first page

                fetchNewOrders(currentPage, itemsPerPage, searchQuery);
            });



            $('#searchInput').on('input', function() {

                searchQuery = $(this).val(); // Update search query
                currentPage = 1; // Reset to first page
                fetchNewOrders(currentPage, itemsPerPage, searchQuery); // Fetch customers with search
            });


            // Employees List
            $(document).on('input', '.employee-search', function() {

                const searchTerm = $(this).val(); // Get the value from search input
                const id = $(this).data('id'); // Get the id of the element that triggered the search

                fetchEmployees(1, 5, searchTerm, id); // Fetch employees with search term and id
            });

            function fetchEmployees(page, itemsPerPage, search, id) {
                $.ajax({
                    url: "{{ route('employee.index') }}",
                    type: 'GET',
                    data: {
                        page: page,
                        items_per_page: itemsPerPage,
                        search: search,
                    },
                    success: function(response) {
                        employees = response.user; // Assuming 'user' contains employee data
                        if (id > 0) {
                            renderEmployeeDropdown(employees, id)
                        }
                    },
                    error: function(xhr) {
                        console.error("Error fetching employees");
                    },
                });
            }

            function renderEmployeeDropdown(employees, id) {


                const assignList = document.getElementById(
                    `assignList-${id}`); // Get the correct assign list by id
                assignList.innerHTML = ''; // Clear existing list items

                employees.forEach(employee => {
                    const listItem = `
                            <li class ='">
                                <label>
                                    <img src="${appUrl}/${employee.profile}" alt="user-avatar" class="user-avatar employee-li" id="employee-li-${employee.id}  />
                                    ${employee.name}
                                </label>
                            </li>
                        `;
                    assignList.insertAdjacentHTML('beforeend',
                        listItem); // Append each employee to the dropdown
                });

            }
            $(document).on('click', '.employee-li', function() {
                const employeeId = $(this).data('id'); // Get data-id of the clicked employee
                const orderId = $(this).closest('ul').data(
                    'order-id'); // Get order_id from the closest parent <ul>

                const postData = {
                    employee_id: employeeId,
                    order_id: orderId,
                };

                // Send the POST request using AJAX
                $.ajax({
                    url: "{{ route('order.assign.orders.to.employee') }}", // Update this URL to your actual endpoint
                    type: 'POST',
                    data: postData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                            'content'), // Set the CSRF token in the request header
                    },
                    success: function(response) {
                        fetchNewOrders(currentPage, itemsPerPage, searchQuery);
                        if (response.success == true) {
                            toastr.success(response.message);


                        }

                        if (response.success == false) {

                            toastr.error(response.message);


                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle error response
                        console.error('Error assigning employee:', error);
                        toastr.error('Something went wrong');
                        // You can display an error message to the user if needed
                    },
                    beforeSend: function(xhr) {
                        // Optional: Set CSRF token if required (for Laravel, for example)
                        xhr.setRequestHeader('X-CSRF-TOKEN',
                            '{{ csrf_token() }}'); // Ensure to include CSRF token
                    }
                });
            });
            fetchEmployees(1, 5, '', 0)
            // Initial fetch of customers
            fetchNewOrders(currentPage, itemsPerPage, searchQuery);
        });
    </script>
    {{-- End::New Order JS --}}

    {{-- Begin::Assigned Order JS --}}
    <script>
        $(document).ready(function() {
            let currentPage = 1;
            let itemsPerPage = 10; // Default items per page
            let searchQuery = '';

            $('#assigned-orders-tab').on('click', function() {

                fetchAssignOrders(currentPage, itemsPerPage, searchQuery);
            });
            // Function to fetch customers from the server
            function fetchAssignOrders(page, itemsPerPage, search) {

                $.ajax({
                    url: "{{ route('order.assignedorders') }}",
                    type: 'GET',
                    data: {
                        page: page,
                        items_per_page: itemsPerPage,
                        search: search,
                    },
                    success: function(response) {




                        renderAssignOrdersTable(response
                            .orders); // Assume your API returns the product array
                        updateAssignOrderPagination(response
                            .total); // Update pagination based on total customers

                    },
                    error: function(xhr) {

                        updateAssignOrderPagination(1)
                    },
                });
            }

            // Function to render the product table
            function renderAssignOrdersTable(orders) {
                const tableBody = $('#table-body-cm-order2');
                tableBody.empty(); // Clear previous data
                orders.forEach(item => {

                    const statusClass = getStatusClass(item.status);
                    const statusText = getStatusText(item.status);
                    const id = item.id || null
                    const customerName = item.customer.name || 'N/A'

                    const orderDate = item.created_at || 'N/A'
                    const orderShipping = item.phone || 'N/A'
                    const orderLocation = item.location || 'N/A'
                    const trackingId = item.order_number || 'N/A'
                    const qty = item.total_qty || 'N/A'
                    const orderTotal = item.total || 'N/A'

                    const status = item.status || 0
                    const since = item.since || 'N/A'
                    const image = "{{ asset('assets/admin/images/Image.png') }}" ||
                        "{{ asset('assets/admin/images/Image.png') }}"
                    let url = "{{ route('orders.view', ':id') }}";
                    url = url.replace(':id', id);
                    const row = `
                    <tr>
                        <td>
                        <label class="custom-checkbox">
                            <input type="checkbox" class="cm-order-checkbox2" data-id="${id}">
                            <span class="checkmark"></span>
                        </label>
                        </td>
                        <td><a href="${url}">${customerName}</a></td>
                        <td>${formatDate(orderDate)}</td>
                        <td>${orderShipping}</td>
                        <td>${orderLocation}</td>
                        <td>${trackingId}</td>
                        <td>${qty}</td>
                        <td>${orderTotal}</td>
                        <td>
                        <span class="Assigned" id="assignButton2-${id}">
                        Assign too
                        <img src="{{ asset('assets/admin/svg/fi_chevron-down.svg') }} " />
                        </span>
                        <div class="dropdown-like" id="dropdown2-${id}" style="display:none;">
                        <input type="text" id="searchInput2-${id}" placeholder="Search" />
                        <ul id="assignList2-${id}">
                            <li>
                            <label>
                                <img src="{{ asset('assets/admin/images/Image.png') }} " alt="user-avatar" class="user-avatar" />
                                Janet Adebayo
                            </label>
                            </li>
                            <li>
                            <label>
                                <img src="{{ asset('assets/admin/images/image_715.png') }} " alt="user-avatar" class="user-avatar" />
                                Samuel Johnson
                            </label>
                            </li>
                            <li>
                            <label>
                                <img src="{{ asset('assets/admin/images/image_54321') }} " alt="user-avatar" class="user-avatar" />
                                Christian Dior
                            </label>
                            </li>
                        </ul>
                        </div>
                        </td>
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
                        <td><span class="${statusClass}">${statusText}</span></td>
                    </tr>

                `;
                    tableBody.append(row);



                });

            }

            // Function to update pagination info
            function updateAssignOrderPagination(total) {

                const totalItems = total; // Total customers from API response
                const totalPages = Math.ceil(totalItems / itemsPerPage);
                $("#newAssginTotalItems").text(
                    `Showing ${((currentPage - 1) * itemsPerPage) + 1}-${Math.min(currentPage * itemsPerPage, totalItems)} of ${totalItems} items`
                );

                // Disable/Enable pagination buttons
                $('#assign-order-prev-page').toggleClass('disabled', currentPage === 1);
                $('#assign-order-next-page').toggleClass('disabled', currentPage === totalPages);
            }




            // Handle pagination button clicks
            $('#assign-order-prev-page').click(function() {
                if (currentPage > 1) {
                    currentPage--;


                    fetchNewOrders(currentPage, itemsPerPage, searchQuery);
                }
            });

            $('#assign-order-next-page').click(function() {
                currentPage++;

                fetchAssignOrders(currentPage, itemsPerPage, searchQuery);
            });

            // Handle items per page change
            $(document).on('change', '#assignOrderItemsPerPage', function() {

                itemsPerPage = $(this).val();
                currentPage = 1; // Reset to first page

                fetchAssignOrders(currentPage, itemsPerPage, searchQuery);
            });

            $(document).on('change', '#assignOrderItemsPerPage1', function() {

                itemsPerPage = $(this).val();
                currentPage = 1; // Reset to first page

                fetchAssignOrders(currentPage, itemsPerPage, searchQuery);
            });

            $('#searchInput1').on('input', function() {

                searchQuery = $(this).val(); // Update search query
                currentPage = 1; // Reset to first page
                fetchAssignOrders(currentPage, itemsPerPage, searchQuery); // Fetch customers with search
            });


            // Initial fetch of customers
            fetchAssignOrders(currentPage, itemsPerPage, searchQuery);
        });
    </script>
    {{-- End::Assigned Order JS --}}


@endsection

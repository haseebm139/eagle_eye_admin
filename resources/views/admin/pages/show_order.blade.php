@extends('layout.master')
@section('title', 'Orders')

@section('style')


@endsection
@section('content')

@section('heading', 'Orders')

<div id="dynamic-content">
    <div class="red tab-pane fade show active" id="orders" role="tabpanel" aria-labelledby="orders-tab">

        <div class="viewOrder px-3" id="viewOrder">
            <div class="Width d-flex flex-wrap gap-3 justify-content-between align-items-center customer2">
                <div class="d-flex align-items-center justify-content-center gap-3">
                    <span class="d-flex gap-2">
                        <p class="mediumFont m-0">Order Number</p>
                        <p class="LightFont m-0">#{{ $data['orders']->order_number }}</p>
                    </span>

                    <span class="d-flex gap-2">
                        <p class="mediumFont m-0">Order Date</p>
                        <p class="LightFont m-0">
                            {{ \Carbon\Carbon::parse($data['orders']->created_at)->format('d M Y - h:i A') }}</p>
                    </span>

                    <span class="d-flex gap-2">
                        <p class="mediumFont m-0">Tracking ID</p>
                        <p class="LightFont m-0">{{ $data['orders']->order_number }}</p>
                    </span>
                    <span>
                        <img src="{{ asset('assets/admin/images/svg/copyIcon.svg') }}" />
                    </span>
                </div>
                <div class="d-flex gap-3">
                    {{-- <div class="dropdown-container dropdown2 position-relative">
                        <select id="data-category" class="form-control4 d-inline w-auto">
                            <option value="Revenue">Ready to Ship</option>
                            <option value="Expenses">This Week</option>
                            <option value="Profit Margin">This Week</option>
                        </select>
                    </div> --}}
                    <button class="order-btn d-flex align-items-center">
                        Print Invoice
                    </button>
                    <button class="suspension-btn d-flex align-items-center" id="cancelOrderBtn"
                        data-order-id="{{ $data['orders']->id ?? 0 }}">
                        Cancel Order
                    </button>
                </div>
            </div>
            <div class="d-flex
                        gap-3 mt-3">
                <div class="" style="width: 30%">
                    <div class="card text-center">
                        <div class="alignemnt">
                            <div class="d-flex gap-3">
                                <img src="{{ asset('assets/admin/images/svg/client2.svg') }} " />
                                <div class="">
                                    <p class="mediumFont2 m-0 p-0 text-left">
                                        {{ $data['orders']->customer->name }}
                                    </p>

                                </div>
                            </div>
                            <div class="leftAlignement">
                                <button class="CustomerStatusPending">
                                    @switch($data['orders']->status??0)
                                        @case(0)
                                            Pending
                                        @break

                                        @case(1)
                                            Complete
                                        @break

                                        @case(2)
                                            Canceled
                                        @break

                                        @case(3)
                                            Delivered
                                        @break

                                        @case(4)
                                            Return
                                        @break

                                        @case(5)
                                            Shipped
                                        @break

                                        @default
                                            unknown-status
                                    @endswitch
                                </button>
                                <!-- <p class="side-text">This Week</p> -->
                            </div>
                        </div>

                        <div class="bottomContent">
                            <span>
                                <p class="sales">Phone</p>
                                <p class="bold">{{ $data['orders']->customer->phone }}</p>
                            </span>

                            <span>
                                <p class="sales">Email</p>
                                <p class="bold">{{ $data['orders']->customer->email }}</p>
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
                                    {{ $data['orders']->customer->address ?? '' }}<span>,</span>
                                    {{ $data['orders']->customer->city ?? '' }}<span>,</span>
                                    {{ $data['orders']->customer->state ?? '' }}<span>,</span>
                                    {{ $data['orders']->customer->country ?? '' }}

                                </p>
                            </span>

                            <span class="bottomSpan">
                                <p class="sales">Billing Address</p>
                                <p class="bold">
                                    {{ $data['orders']->address ?? '' }}<span>,</span>
                                    {{ $data['orders']->address1 ?? '' }}<span>,</span>
                                    {{ $data['orders']->city ?? '' }}<span>,</span>
                                    {{ $data['orders']->state ?? '' }}<span>,</span>
                                    {{ $data['orders']->country ?? '' }}
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

                                <span class="dropdown-icon"></span>
                                <!-- Down arrow icon -->
                            </div>
                        </div>

                        <div class="bottomContent">
                            <span class="bottomSpan">
                                <p class="sales">Total Orders</p>
                                <p class="bold3">${{ $data['orders']->total ?? '' }}</p>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="product2 my-4">
                <div class="d-flex justify-content-between">

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
                            @foreach ($data['orders']->items as $item)
                                <tr>
                                    <td>
                                        <label class="custom-checkbox">
                                            <input type="checkbox" class="product-checkbox" data-id="${product.id}">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <div class="orderImage">
                                            @php
                                                $img = $item->product->image->path ?? 'assets/profile.png';
                                            @endphp
                                            <img src="{{ asset($img) }}" />
                                        </div>
                                    </td>

                                    <td>{{ $item->product->name ?? '' }}</td>
                                    <td>Home Delivery</td>
                                    <td>{{ $item->product->sell_price ?? '' }}</td>
                                    <td>{{ $item->qty ?? '' }}</td>
                                    <td>0%</td>
                                    <td>{{ ($item->product->sell_price ?? 0) * ($item->product->qty ?? 0) }}
                                    </td>
                                    <td></td>
                                    <td>
                                        @switch($data['orders']->status??0)
                                            @case(0)
                                                Pending
                                            @break

                                            @case(1)
                                                Complete
                                            @break

                                            @case(2)
                                                Canceled
                                            @break

                                            @case(3)
                                                Delivered
                                            @break

                                            @case(4)
                                                Return
                                            @break

                                            @case(5)
                                                Shipped
                                            @break

                                            @default
                                                unknown-status
                                        @endswitch

                                        {{-- <td>
                                        <span class="Assigned" id="assignButton-{{ $data['ordets']->id ?? '' }}">
                                            Assign to
                                            <img src="{{ asset('assets/admin/svg/fi_chevron-down2.svg') }}" />
                                        </span>
                                        <div class="dropdown-like" id="dropdown-{{ $data['ordets']->id ?? '' }}"
                                            style="display:none;">
                                            <input type="text" id="searchInput-{{ $data['ordets']->id ?? '' }}"
                                                placeholder="Search" />
                                            <ul id="assignList-{{ $data['ordets']->id ?? '' }}">
                                                <li><label><img src="{{ asset('assets/admin/images/Image.png') }}"
                                                            class="user-avatar" /> Janet Adebayo</label></li>
                                                <li><label><img src="{{ asset('assets/admin/images/image_726.png') }}"
                                                            class="user-avatar" /> Samuel Johnson</label></li>
                                                <li><label><img src="{{ asset('assets/admin/images/image_715.png') }}"
                                                            class="user-avatar" /> Christian Dior</label></li>
                                            </ul>
                                        </div>
                                    </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{-- <div class="pagination-container d-flex justify-content-between align-items-center">
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
                    </div> --}}
                </div>
            </div>
        </div>
        <div class="NewCompany" id="newCompanyDiv">
            <div class="model d-flex flex-column">
                <div class="d-flex justify-content-between align-items-center">
                    <span class="my-2" id="noteModalLabel">Add New Notes</span>
                    <button class="cancel" id="cancelBtn">
                        <img src="{{ asset('assets/admin/images/svg/Frame_5800.svg') }}" />
                    </button>
                </div>
                <form id="noteForm">
                    @csrf
                    <div>
                        <input type="hidden" id="noteId">
                        <p class="CustomerPopup">Note Description </p>
                        <div class="d-flex flex-column">

                            <textarea name="description" id="description" cols="30" rows="10"></textarea>

                        </div>

                        <div class="d-flex gap-3 mt-3">
                            <button class="cancel-btn2">Cancel</button>
                            <button type="submit" class="add-btn" id="saveNoteBtn">Add</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>



    </div>
</div>




@endsection
@section('script')
<script src="{{ asset('assets/admin/js/CountryData.js') }}"></script>
{{-- Notes --}}
<script></script>
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



        // Show the new company div when the button is clicked
        addCompanyBtn.addEventListener("click", () => {
            newCompanyDiv.style.display = "flex"; // Show the div
        });

        // Hide the new company div when the cancel button is clicked
        cancelBtn.addEventListener("click", () => {
            newCompanyDiv.style.display = "none"; // Hide the div
        });







    });
    document.getElementById('cancelOrderBtn').addEventListener('click', function() {
        const orderId = this.getAttribute('data-order-id');



        if (confirm("Are you sure you want to cancel the order?")) {
            fetch("{{ route('order.cancel', ':id') }}".replace(':id', orderId), {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}' // Laravel CSRF token for security
                    },
                    body: JSON.stringify({
                        status: '3'
                    }) // Set status to '3' for 'Canceled'
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {

                        toastr.success('Order has been canceled!');
                        location.reload(); // Reload page to see the changes (optional)
                    } else {
                        toastr.success('Failed to cancel the order.');
                    }
                })
                .catch(error => console.error('Error:', error));
        }
    });
</script>
<script>
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


    function getStatusClass(status) {
        return status === "Active" ? "custom-active" : "custom-inactive";
    }


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


    const assignButton = document.getElementById("assignButton");
    const dropdown = document.getElementById("dropdown");

    // Toggle the dropdown visibility when the span is clicked
    assignButton.addEventListener("click", function() {
        dropdown.classList.toggle("show");
    });

    // Optional: Close the dropdown when clicking outside
    document.addEventListener("click", function(event) {
        if (
            !assignButton.contains(event.target) &&
            !dropdown.contains(event.target)
        ) {
            dropdown.classList.remove("show");
        }
    });




    //color of status of table

    const statusElement = document.getElementById("status");

    // Get the text content (status)
    const status = statusElement.textContent;

    // Dynamically assign the background color based on status
    if (status === "Published") {
        statusElement.style.backgroundColor = "#e4e8fd";
        statusElement.style.color = "#5570F1";
        statusElement.style.padding = "3px 12px";
        statusElement.style.borderRadius = " 15px";
        // Active status
    } else if (status === "Active") {
        statusElement.style.backgroundColor = "#e4e8fd";
        statusElement.style.color = "#5570F1";
        statusElement.style.padding = "3px 12px";
        statusElement.style.borderRadius = " 15px";
        // Active status
    } else if (status === "In-Progress") {
        statusElement.style.backgroundColor = "#e4e8fd";
        statusElement.style.color = "#5570F1";
        statusElement.style.padding = "3px 12px";
        statusElement.style.borderRadius = " 15px";
        // Active status
    } else if (status === "UnActive") {
        statusElement.style.backgroundColor = "rgb(255, 242, 226)";
        statusElement.style.padding = "3px 12px";
        statusElement.style.borderRadius = " 15px"; // UnActive status
    } else if (status === "UnPublished") {
        statusElement.style.backgroundColor = "rgb(255, 242, 226)";
        statusElement.style.padding = "3px 12px";
        statusElement.style.borderRadius = " 15px"; // UnActive status
    }
</script>

@endsection

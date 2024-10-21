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
                    </div>
                </div>
            </div>
        </div>
        <div class="NewCompany" id="newCompanyDiv1">
            <div class="model Ordermodel d-flex flex-column">
                <div class="d-flex justify-content-between align-items-center">
                    <span class="my-2">Create New Order</span>
                    <button class="cancel" id="cancelBtn1">
                        <img src="{{ asset('assets/admin/images/svg/Frame_5800.svg') }} " />
                    </button>
                </div>
                <form>
                    <div>
                        <div class="d-flex gap-3">
                            <div class="orderLeftConatiner">
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
                            <div class="d-flex flex-column">
                                <p class="CustomerPopup">Order Details</p>
                                <div
                                    class="h-100 d-flex flex-column text-center justify-content-center align-items-center">
                                    <img src="./assests/iconContainer.png" class="lock" />
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
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




@endsection
@section('script')
<script src="{{ asset('assets/admin/js/CountryData.js') }}"></script>
<script>
 document.addEventListener('DOMContentLoaded', function() {
    const orderDetails = [
      { id: 1, name: 'Product A', category: 'Category 1', price: '$100', stock: 10, discount: '10%', value: '$90', action: 'Edit' },
      { id: 2, name: 'Product B', category: 'Category 2', price: '$150', stock: 5, discount: '15%', value: '$127.5', action: 'Edit' },
      { id: 3, name: 'Product C', category: 'Category 3', price: '$200', stock: 8, discount: '5%', value: '$190', action: 'Edit' },
    ];
  
    let rowsPerPageorderDetails = 3;
    let currentPageorderDetails = 1;
  
    function renderorderDetailsTable() {
      const tableBody = document.getElementById('table-body1');
      tableBody.innerHTML = "";
  
      const start = (currentPageorderDetails - 1) * rowsPerPageorderDetails;
      const end = Math.min(start + rowsPerPageorderDetails, orderDetails.length);
      const orderDetailsToDisplay = orderDetails.slice(start, end);
  
      orderDetailsToDisplay.forEach(product => {
        const row = `
          <tr>
            <td>
              <label class="custom-checkbox">
                <input type="checkbox" class="product-checkbox" data-id="${product.id}">
                <span class="checkmark"></span>
              </label>
            </td>
            <td>
              <div class="orderImage">
                <img src="{{ asset('assets/admin/images/image_715.png') }}" />
              </div>
            </td>
            <td>${product.name}</td>
            <td>${product.category}</td>
            <td>${product.price}</td>
            <td>${product.stock}</td>
            <td>${product.discount}</td>
            <td>${product.value}</td>
            <td>${product.action}</td>
            <td>
              <span class="Assigned" id="assignButton-${product.id}">
                Assign to
                <img src="{{ asset('assets/admin/svg/fi_chevron-down2.svg') }}" />
              </span>
              <div class="dropdown-like" id="dropdown-${product.id}" style="display:none;">
                <input type="text" id="searchInput-${product.id}" placeholder="Search" />
                <ul id="assignList-${product.id}">
                  <li><label><img src="{{ asset('assets/admin/images/Image.png') }}" class="user-avatar" /> Janet Adebayo</label></li>
                  <li><label><img src="{{ asset('assets/admin/images/image_726.png') }}" class="user-avatar" /> Samuel Johnson</label></li>
                  <li><label><img src="{{ asset('assets/admin/images/image_715.png') }}" class="user-avatar" /> Christian Dior</label></li>
                </ul>
              </div>
            </td>
          </tr>
        `;
        tableBody.insertAdjacentHTML('beforeend', row);
  
        // Handle dropdown toggle
        document.getElementById(`assignButton-${product.id}`).addEventListener('click', function() {
          const dropdown = document.getElementById(`dropdown-${product.id}`);
          dropdown.style.display = dropdown.style.display === 'none' ? 'block' : 'none';
        });
  
        // Handle selection in dropdown
        document.getElementById(`assignList-${product.id}`).addEventListener('click', function(e) {
          if (e.target.tagName === 'LABEL' || e.target.tagName === 'IMG') {
            const selectedName = e.target.closest('label').textContent.trim();
            const assignButton = document.getElementById(`assignButton-${product.id}`);
            assignButton.innerHTML = `${selectedName} <img src="./assests/svg/fi_chevron-down2.svg" />`;
            document.getElementById(`dropdown-${product.id}`).style.display = 'none';
          }
        });
      });
  
      updateorderDetailsPaginationInfo(start + 1, end, orderDetails.length);
      updateorderDetailsPageSelect();
      updateorderDetailsTotalPagesText();
    }
  
    function updateorderDetailsPaginationInfo(start, end, total) {
      const paginationInfo = document.getElementById('pagination-info-orderDetails');
      if (paginationInfo) {
        paginationInfo.textContent = `${start}-${end} of ${total} items`;
      }
    }
  
    function updateorderDetailsPageSelect() {
      const totalPages = Math.ceil(orderDetails.length / rowsPerPageorderDetails);
      const pageSelect = document.getElementById('page-select-orderDetails');
      if (pageSelect) {
        pageSelect.innerHTML = '';
  
        for (let i = 1; i <= totalPages; i++) {
          const option = `<option value="${i}">${i}</option>`;
          pageSelect.insertAdjacentHTML('beforeend', option);
        }
  
        pageSelect.value = currentPageorderDetails;
        pageSelect.addEventListener('change', function() {
          currentPageorderDetails = parseInt(this.value);
          renderorderDetailsTable();
        });
      }
    }
  
    function updateorderDetailsTotalPagesText() {
      const totalPages = Math.ceil(orderDetails.length / rowsPerPageorderDetails);
      const totalPagesText = document.getElementById('total-pages-text-orderDetails');
      if (totalPagesText) {
        totalPagesText.textContent = `Page ${currentPageorderDetails} of ${totalPages}`;
      }
    }
  
    const itemsPerPageSelect = document.getElementById('items-per-page-orderDetails');
    if (itemsPerPageSelect) {
      itemsPerPageSelect.addEventListener('change', function() {
        rowsPerPageorderDetails = parseInt(this.value);
        currentPageorderDetails = 1;
        renderorderDetailsTable();
      });
    }
  
    const prevPageButton = document.getElementById('prev-page-orderDetails');
    if (prevPageButton) {
      prevPageButton.addEventListener('click', function(event) {
        event.preventDefault();
        if (currentPageorderDetails > 1) {
          currentPageorderDetails--;
          renderorderDetailsTable();
        }
      });
    }
  
    const nextPageButton = document.getElementById('next-page-orderDetails');
    if (nextPageButton) {
      nextPageButton.addEventListener('click', function(event) {
        event.preventDefault();
        const totalPages = Math.ceil(orderDetails.length / rowsPerPageorderDetails);
        if (currentPageorderDetails < totalPages) {
          currentPageorderDetails++;
          renderorderDetailsTable();
        }
      });
    }
  
    function handleorderDetailselectAll() {
      const selectAll = document.getElementById('select-all-orderDetails');
      const checkboxes = document.querySelectorAll('.product-checkbox');
  
      if (selectAll) {
        selectAll.addEventListener('change', function () {
          checkboxes.forEach(checkbox => {
            checkbox.checked = selectAll.checked;
          });
        });
      }
  
      checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function () {
          if (!this.checked) {
            selectAll.checked = false;
          } else if (document.querySelectorAll('.product-checkbox:checked').length === checkboxes.length) {
            selectAll.checked = true;
          }
        });
      });
    }
  
    renderorderDetailsTable();
    handleorderDetailselectAll();
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

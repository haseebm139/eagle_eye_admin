$(document).ready(function() {
    let currentPage = 1;
    let itemsPerPage = 10; // Default items per page
    let searchQuery = '';
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




                renderNewOrdersTable(response.user); // Assume your API returns the product array
                updatePagination(response.total); // Update pagination based on total customers

            },
            error: function(xhr) {

                updatePagination(1)
            },
        });
    }

    // Function to render the product table
    function renderNewOrdersTable(employees) {
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
                <input type="checkbox" class="emp-role-checkbox" data-id="${id}">
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


            fetchNewOrders(currentPage, itemsPerPage, searchQuery);
        }
    });

    $('#next-page').click(function() {
        currentPage++;

        fetchNewOrders(currentPage, itemsPerPage, searchQuery);
    });

    // Handle items per page change
    $(document).on('change', '#itemsPerPage', function() {

        itemsPerPage = $(this).val();
        currentPage = 1; // Reset to first page

        fetchNewOrders(currentPage, itemsPerPage, searchQuery);
    });

    $(document).on('change', '#itemsPerPage1', function() {

        itemsPerPage = $(this).val();
        currentPage = 1; // Reset to first page

        fetchNewOrders(currentPage, itemsPerPage, searchQuery);
    });

    $('#searchInput').on('input', function() {

        searchQuery = $(this).val(); // Update search query
        currentPage = 1; // Reset to first page
        fetchNewOrders(currentPage, itemsPerPage, searchQuery); // Fetch customers with search
    });


    // Initial fetch of customers
    fetchNewOrders(currentPage, itemsPerPage, searchQuery);
});

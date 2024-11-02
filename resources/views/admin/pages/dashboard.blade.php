@extends('layout.master')
@section('title', 'DASHBOARD')

@section('style')
    <style>
        #myChart {
            width: 200px;
            /* Set your desired width */
            height: 300px;
            /* Set your desired height */
            margin: 0 auto;
        }
    </style>
@endsection
@section('content')




@section('heading', 'Dashboard')
<div class="container-fluid" id="dashboard_page">
    <div class="row">
        <div class="col-md-7">
            <div class="row">
                <div class="col-md-6 col-sm-12 mb-4">
                    <div class="">
                        <div class="card text-center">
                            <div class="alignemnt">
                                <img src="{{ asset('assets/admin/images/svg/icon1.svg') }}" />
                                <div class="leftAlignement">

                                    <div class="dropdown-container position-relative">
                                        <select id="stats1" class="form-control2 d-inline w-auto">

                                            <option value="week" selected>This Week</option>
                                            <option value="month">This Month</option>
                                            <option value="year">This Year</option>

                                        </select>
                                        <span class="dropdown-icon"></span> <!-- Down arrow icon -->
                                    </div>
                                    <!-- <p class="side-text">This Week</p> -->

                                </div>
                            </div>

                            <div class="bottomContent">
                                <span>
                                    <p class="sales">Total Sales</p>
                                    <p class="card_counting_numbers" id="total_sale"> </p>
                                </span>
                                <span>
                                    <p class="sales">Volume</p>
                                    <p class="card_counting_numbers" id="volume">

                                    </p>
                                </span>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 mb-4">
                    <div class=" ">
                        <div class="card text-center">
                            <div class="alignemnt">
                                <img src="{{ asset('assets/admin/images/svg/icon2.svg') }}" />

                            </div>

                            <div class="bottomContent">
                                <span>
                                    <p class="sales">Client</p>
                                    <p class="card_counting_numbers">{{ allClients() }}</p>
                                </span>
                                <span>
                                    <p class="sales">Active</p>
                                    <p class="card_counting_numbers">{{ activeClients() }}</p>
                                </span>
                            </div>


                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-5">
            <div class="row">
                <div class="col-md-12 mb-4">
                    <div class="">
                        <div class="card text-center">
                            <div class="alignemnt">
                                <img src="{{ asset('assets/admin/images/svg/icon2.svg') }}" />

                            </div>

                            <div class="bottomContent">
                                <span>
                                    <p class="sales">All Orders</p>
                                    <p class="card_counting_numbers">{{ totalOrder() }}</p>
                                </span>
                                <span>
                                    <p class="sales">Pending</p>
                                    <p class="card_counting_numbers">{{ totalOrderPending() }}</p>
                                </span>

                                <span>
                                    <p class="sales">Completed</p>
                                    <p class="card_counting_numbers">{{ totalOrderComplete() }}</p>
                                </span>
                            </div>


                        </div>
                    </div>

                </div>
            </div>
        </div>



    </div>
    <div class="row">
        <div class="col-md-7">
            <div class="row">
                <div class="col-md-6 col-sm-12  mb-4">


                    <div class="card text-center w-100">
                        <div class="alignemnt">
                            <img src="{{ asset('assets/admin/images/svg/Folder.svg') }}" />
                            <div class="leftAlignement">
                                <!-- <p class="side-text">This Week</p>
                                                                                                                                                 <img src="{{ asset('assets/admin/images/svg/Vector.svg') }}" /> -->
                            </div>
                        </div>

                        <div class="bottomContent">

                            <span>
                                <p class="sales">All Products</p>
                                <p class="card_counting_numbers">{{ productCount() }}</p>
                            </span>

                            <span>
                                <p class="sales">Active</p>
                                <p class="card_counting_numbers">{{ productPublished() }} </p>
                            </span>
                        </div>


                    </div>

                  




                </div>
                <div class="col-md-6 col-sm-12  mb-4">
                    <div class="card text-center w-100">
                        <div class="alignemnt">
                            <img src="{{ asset('assets/admin/images/svg/cart.svg') }}" />

                        </div>

                        <div class="bottomContent">

                            <span>
                                <p class="sales" style="color: red;">Abandoned Cart</p>
                                <p class="card_counting_numbers">{{ abandonedCart() }} </p>
                            </span>

                            <span>
                                <p class="sales">Products</p>
                                <p class="card_counting_numbers">{{ abandonedCartProducts() }}</p>
                            </span>
                        </div>


                    </div>
                </div>
                <div class="col-md-12 col-sm-12 mb-4">
                    <div class="alignmentOfPIChart w-100 h-100">
                        <div class="card  text-center" style="gap: 0; height: 100%;">
                            <div class="alignemnt">
                                <h6>Total Sales</h6>

                            </div>
                            <div class="container  text-center">
                                <div class="chart-container m-0 text-center w-100">
                                    <canvas id="myChart" style="width:100%;height:300px"></canvas>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            
                <div class="col-md-12 mb-5">
                    <div class="container container-2 g-3  text-center m-0">


                        <!-- Dropdowns for selecting data type and date range -->
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="d-flex gap-3 align-items-center">
                                <h6>Clients Summary</h6>

                            </div>

                        </div>

                        <!-- Chart Container -->
                        <div class="custom-chart-container">
                            <div class="custom-chart-card">
                                <canvas id="customBarChart" style="height:300px;"></canvas>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5 mb-5">
            <div class="leftSideContent w-100 h-100">
                <div class="side_card">
                    <img src="{{ asset('assets/admin/images/iconContainer.png') }}" class="lock" />
                    <div>
                        <h6>No Orders Yet?</h6>
                        <p>Add products to your store and start <br /> selling to see orders here.</p>
                        <a href="{{ route('add.product') }}" class="productBtn">+ New Product</a>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>


@endsection
@section('script')
<script>
    const backgroundColors = ['#ff0000', '#fbbd00', '#ff8800']; // Colors for the segments
    const labels = ['Acquisition', 'Purchase', 'Retention']; // Labels

    const customLabels = ['Oct 01', 'Oct 02', 'Oct 03', 'Oct 04', 'Oct 05', 'Oct 06', 'Oct 07'];
    const customDataValues = [50000, 30000, 45000, 25000, 35000, 48000, 52000];

    function fetchUserChartData() {
        $.ajax({
            url: "{{ route('customer.chart') }}", // Your endpoint
            type: 'GET',

            success: function(response) {
                // Update the chart with the new data
                customBarChart.data.labels = response.labels; // e.g., ['Jan', 'Feb', 'Mar']
                customBarChart.data.datasets[0].data = response.data; // e.g., [100, 200, 150]
                customBarChart.update(); // Refresh the chart
            },
            error: function(xhr) {
                console.error('Error fetching data');
            }
        });
    }

    function fetchOrderChartData() {
        $.ajax({
            url: "{{ route('order.chart') }}", // Your endpoint
            type: 'GET',

            success: function(response) {
                // Assuming response contains labels (months) and data values (sales)
                const customLabels = response.labels; // e.g., ['Jan', 'Feb', 'Mar', ...]
                const customDataValues = response.data; // e.g., [50000, 30000, ...]

                // Update the chart with the new data
                myChart.data.labels = customLabels;
                myChart.data.datasets[0].data = customDataValues;
                myChart.update(); // Refresh the chart
            },
            error: function(xhr) {
                console.error('Error fetching data');
            }
        });
    }

    fetchUserChartData()

    fetchOrderChartData()
    fetchUserChartData()




    // Custom plugin to draw the background behind the revenue bars
    const backgroundPlugin = {
        id: 'backgroundPlugin',
        beforeDraw: (chart) => {
            const ctx = chart.ctx;
            const chartArea = chart.chartArea;
            const meta = chart.getDatasetMeta(0); // Bar dataset metadata
            const dataset = chart.data.datasets[0]; // Assuming the dataset for revenue

            ctx.save();
            ctx.fillStyle = 'rgba(200, 200, 200, 0.3)'; // Light gray for the background

            dataset.data.forEach((value, index) => {
                const bar = meta.data[index]; // Get the bar model (position and size)
                const x = bar.x - bar.width / 2; // Bar starting X position
                const y = chartArea.top; // Start from the top of the chart area
                const width = bar.width; // Bar width
                const height = chartArea.bottom - chartArea.top; // Full chart height

                // Draw background rectangle behind each bar
                ctx.fillRect(x, y, width, height);
            });

            ctx.restore();
        }
    };
    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: customLabels,
            datasets: [{
                label: 'Sale',
                data: customDataValues,
                backgroundColor: '#fcbf49', // Custom yellow color for the bars
                borderColor: '#fcbf49',
                borderWidth: 1,
                borderRadius: 8,
            }]
        },
        options: {
             responsive: true,
            maintainAspectRatio: false, 
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 10000,
                        callback: function(value) {
                            return value + 'k';
                        }
                    }
                }
            },
            plugins: {
                legend: {
                    display: false
                }
            },
            barPercentage: 0.2, // Adjust bar width
            categoryPercentage: 0.5, // Adjust spacing between bars
        },
        plugins: [backgroundPlugin] // Register the custom background plugin
    });
    // Chart.js configuration for the custom chart
    const customCtx = document.getElementById('customBarChart').getContext('2d');
    const customBarChart = new Chart(customCtx, {
        type: 'bar',
        data: {
            labels: customLabels,
            datasets: [{
                label: 'Clients',
                data: customDataValues,
                backgroundColor: '#fcbf49', // Custom yellow color for the bars
                borderColor: '#fcbf49',
                borderWidth: 1,
                borderRadius: 8,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false, 
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 10000,
                        callback: function(value) {
                            return value + 'k';
                        }
                    }
                }
            },
            plugins: {
                legend: {
                    display: false
                }
            },
            barPercentage: 0.2, // Adjust bar width
            categoryPercentage: 0.5, // Adjust spacing between bars
        },
        plugins: [backgroundPlugin] // Register the custom background plugin
    });
</script>
@endsection

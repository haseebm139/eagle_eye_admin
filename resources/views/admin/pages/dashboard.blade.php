@extends('layout.master')
@section('title', 'DASHBOARD')

@section('style')
<style>
#myChart {
    width: 200px; /* Set your desired width */
    height: 300px; /* Set your desired height */
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
                                        <select id="data-category" class="form-control2 d-inline w-auto">
                                            <option value="Revenue">This Week</option>
                                            <option value="Expenses">This Week</option>
                                            <option value="Profit Margin">This Week</option>
                                        </select>
                                        <span class="dropdown-icon"></span> <!-- Down arrow icon -->
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
                                    <p class="card_counting_numbers">450 <span class="rates">+20.00%</span></p>
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
                                <div class="leftAlignement">
            
                                    <div class="dropdown-container position-relative">
                                        <select id="data-category" class="form-control2 d-inline w-auto">
                                            <option value="Revenue">This Week</option>
                                            <option value="Expenses">This Week</option>
                                            <option value="Profit Margin">This Week</option>
                                        </select>
                                        <span class="dropdown-icon"></span> <!-- Down arrow icon -->
                                    </div>
                                </div>
                            </div>
            
                            <div class="bottomContent">
                                <span>
                                    <p class="sales">Customers</p>
                                    <p class="card_counting_numbers">1,250 <span class="rates">+15.80%</span></p>
                                </span>
                                <span>
                                    <p class="sales">Active</p>
                                    <p class="card_counting_numbers">1,180 <span class="rates"> 85%</span></p>
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
                                <div class="leftAlignement">
            
                                    <div class="dropdown-container position-relative">
                                        <select id="data-category" class="form-control2 d-inline w-auto">
                                            <option value="Revenue">This Week</option>
                                            <option value="Expenses">This Week</option>
                                            <option value="Profit Margin">This Week</option>
                                        </select>
                                        <span class="dropdown-icon"></span> <!-- Down arrow icon -->
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
        </div>
       
      
    
    </div>
    <div class="row">
        <div class="col-md-7">
            <div class="row">
                <div class="col-md-6 col-sm-12 mb-4">
                    <div class="alignmentOfPIChart w-100 h-100">
                        <div class="card  text-center" style="gap: 0; height: 100%;">
                            <div class="alignemnt">
                                <h6>Marketting</h6>
                                <div class="leftAlignement">
    
                                    <div class="dropdown-container position-relative">
                                        <select id="data-category" class="form-control2 d-inline w-auto">
                                            <option value="Revenue">This Week</option>
                                            <option value="Expenses">This Week</option>
                                            <option value="Profit Margin">This Week</option>
                                        </select>
                                        <span class="dropdown-icon"></span> <!-- Down arrow icon -->
                                    </div>
                                </div>
                            </div>
                            <div class="container  text-center">
                                <div class="legend-container" id="legend-container"></div>
                                <div class="chart-container mt-4 text-center">
                                    <canvas id="myChart" height="250px"></canvas>
                                </div>
                            </div>
    
    
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12  mb-4">
                    

                        <div class="card text-center w-100 mb-4">
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
                                    <p class="card_counting_numbers">45</p>
                                </span>
    
                                <span>
                                    <p class="sales">Active</p>
                                    <p class="card_counting_numbers">32 <span class="rates">+24%</span></p>
                                </span>
                            </div>
    
    
                        </div>
    
                        <div class="card text-center w-100">
                            <div class="alignemnt">
                                <img src="{{ asset('assets/admin/images/svg/cart.svg') }}" />
                                <div class="leftAlignement">
                                    <p class="side-text">This Week</p>
                                    <img src="{{ asset('assets/admin/images/svg/Vector.svg') }}" />
                                </div>
                            </div>
    
                            <div class="bottomContent">
    
                                <span>
                                    <p class="sales" style="color: red;">Abandoned Cart</p>
                                    <p class="card_counting_numbers">20% <span class="rates">+0.00%</span></p>
                                </span>
    
                                <span>
                                    <p class="sales">Customers</p>
                                    <p class="card_counting_numbers">30</p>
                                </span>
                            </div>
    
    
                        </div>
    
    
    
                
                </div>
                <div class="col-md-12 mb-5">
                    <div class="container container-2 g-3  text-center m-0">


                        <!-- Dropdowns for selecting data type and date range -->
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="d-flex gap-3 align-items-center">
                                <h6>Custom Summary</h6>
                                <div class="dropdown-container position-relative">
                                    <select id="data-category" class="form-control d-inline w-auto">
                                        <option value="Revenue">Sales</option>
                                        <option value="Expenses">Expenses</option>
                                        <option value="Profit Margin">Profit Margin</option>
                                    </select>
                                    <span class="dropdown-icon"><img
                                            src="{{ asset('assets/admin/images/svg/fi_chevron-down.svg') }}" /></span>
                                    <!-- Down arrow icon -->
                                </div>
                            </div>
                            <div>
                                <select id="time-range" class="form-control d-inline w-auto">
                                    <option value="7">Past 7 Days</option>
                                    <option value="14">Past 14 Days</option>
                                    <option value="30">Past 30 Days</option>
                                </select>
                            </div>
                        </div>
    
                        <!-- Chart Container -->
                        <div class="custom-chart-container">
                            <div class="custom-chart-card">
                                <canvas id="customBarChart"></canvas>
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
      // Sample data
  const dataValues = [30, 50, 20]; // Change these values as needed
  const backgroundColors = ['#ff0000', '#fbbd00', '#ff8800']; // Colors for the segments
  const labels = ['Acquisition', 'Purchase', 'Retention']; // Labels

  // Create the chart
  const ctx = document.getElementById('myChart').getContext('2d');
  const myChart = new Chart(ctx, {
      type: 'doughnut',
      data: {
        
          datasets: [{
              data: dataValues,
              backgroundColor: backgroundColors,
              borderWidth: 0,
          }]
      },
      options: {
        responsive: false, // Disable responsiveness
          plugins: {
              legend: {
                  position: 'top',
              }
          },
          cutout: '75%' // Adjust this value to change the size of the inner circle
      }
  });
   // Create a custom legend
   const legendContainer = document.getElementById('legend-container');
   labels.forEach((label, index) => {
       const legendItem = document.createElement('div');
       legendItem.classList.add('legend-item');

       const colorCircle = document.createElement('div');
       colorCircle.classList.add('legend-color');
       colorCircle.style.backgroundColor = backgroundColors[index];

       const labelText = document.createElement('span');
       labelText.textContent = label;

       legendItem.appendChild(colorCircle);
       legendItem.appendChild(labelText);
       legendContainer.appendChild(legendItem);
   });
   ///bar chart
       // Initialize custom data arrays
       const customLabels = ['Oct 01', 'Oct 02', 'Oct 03', 'Oct 04', 'Oct 05', 'Oct 06', 'Oct 07'];
    const customDataValues = [50000, 30000, 45000, 25000, 35000, 48000, 52000];

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
       // Chart.js configuration for the custom chart
       const customCtx = document.getElementById('customBarChart').getContext('2d');
    const customBarChart = new Chart(customCtx, {
        type: 'bar',
        data: {
            labels: customLabels,
            datasets: [{
                label: 'Revenue',
                data: customDataValues,
                backgroundColor: '#fcbf49', // Custom yellow color for the bars
                borderColor: '#fcbf49',
                borderWidth: 1,
                borderRadius: 8,
            }]
        },
        options: {
            responsive: true,
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

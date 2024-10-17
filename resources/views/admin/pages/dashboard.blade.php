@extends('layout.master')
@section('title', 'DASHBOARD')

@section('style')@endsection
@section('content')




@section('heading', 'Dashboard')
<div class="container-fluid">
    <div class="d-flex gap-3">
        <div class="" style="width: 30%;">
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
                        <p class="bold">$4,000,000.00</p>
                    </span>
                    <span>
                        <p class="sales">Volume</p>
                        <p class="bold">450 <span class="rates">+20.00%</span></p>
                    </span>
                </div>


            </div>
        </div>
        <div class=" " style="width: 30%;">
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
                        <p class="bold">1,250 <span class="rates">+15.80%</span></p>
                    </span>
                    <span>
                        <p class="sales">Active</p>
                        <p class="bold">1,180 <span class="rates"> 85%</span></p>
                    </span>
                </div>


            </div>
        </div>
        <div class="" style="width: 40%;">
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
                        <p class="bold">450</p>
                    </span>
                    <span>
                        <p class="sales">Pending</p>
                        <p class="bold">5</p>
                    </span>

                    <span>
                        <p class="sales">Completed</p>
                        <p class="bold">445</p>
                    </span>
                </div>


            </div>
        </div>

    </div>



    <div class="d-flex gap-3 layout mt-3">

        <div class="rightSideContent ">

            <div class="d-flex gap-3">
                <div class="alignmentOfPIChart">
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
                            <div class="chart-container mt-4">
                                <canvas id="myChart"></canvas>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="sec-section d-flex flex-column gap-3">

                    <div class="card text-center">
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
                                <p class="bold">45</p>
                            </span>

                            <span>
                                <p class="sales">Active</p>
                                <p class="bold">32 <span class="rates">+24%</span></p>
                            </span>
                        </div>


                    </div>

                    <div class="card text-center ">
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
                                <p class="bold">20% <span class="rates">+0.00%</span></p>
                            </span>

                            <span>
                                <p class="sales">Customers</p>
                                <p class="bold">30</p>
                            </span>
                        </div>


                    </div>



                </div>



            </div>



            <div class="row section-three ">
                <div class="container container-2 g-3  mt-3 text-center">


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

        <div class="leftSideContent ">
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


@endsection
@section('script')
@endsection

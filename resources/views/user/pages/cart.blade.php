@extends('layout.app')
@section('title', 'Cart')

@section('style')

    <style>
        .custom-dropdown {
            display: flex;
            align-items: center;
            background-color: #f8f9fa;
            padding: 5px 10px;
            border-radius: 50px;
            cursor: pointer;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .custom-dropdown img {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            object-fit: cover;
            margin-left: 10px;
        }

        .custom-dropdown .chevron {
            font-size: 14px;
            margin-left: 5px;
            transition: transform 0.3s;
        }

        .dropdown-menu {
            margin-top: 5px;
            border-radius: 8px;
            padding: 10px;
            min-width: 150px;
        }

        .product_back_btn {
            margin-top: 1rem;
            color: black;
            display: flex;
            justify-content: start;
            align-items: center;
            margin: 10px 0;
            gap: 10px;
        }

        a {
            text-decoration: none !important;
        }

        .product_back_btn img {
            width: 20px;
        }

        .container {
            text-align: center;
        }

        .stepper-wrapper {
            position: relative;
            margin: 0 auto;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: relative;
        }

        .screen-indicator p {
            position: absolute;
        }

        .stepper-outer {

            z-index: -1;
            background-color: #D9D9D9;
            border-radius: 20px;
            padding: 4rem 2.5rem;
        }

        .stepper-outer p {
            font-family: InterMedium;
        }

        .cart p {
            font-family: InterMedium;
        }

        .stepper-wrapper::before {
            content: "";
            width: 100%;
            height: 3px;
            background-color: rgb(192, 189, 189);
            position: absolute;
            top: 50%;
            left: 0;
            transform: translateY(-50%);
            z-index: 0;
        }


        .stepper-wrapper::after {
            content: "";
            width: 0;
            /* Initial width set to 0 */
            height: 3px;
            background-color: #0b0b0e;
            /* Change to your preferred progress color */
            position: absolute;
            top: 50%;
            left: 0;
            transform: translateY(-50%);
            z-index: 1;
            /* Ensure this is above the before element */
            transition: width 0.3s ease;
            /* Smooth transition */
        }

        .stepper-header input[type="radio"] {
            position: relative;
            background-color: #000;
            z-index: 2;
            /* Ensure radio buttons appear above the progress bar */
            margin: 0;
            accent-color: black;

            /* Adjust spacing */
        }

        .progress {
            content: "";
            width: 0%;
            height: 3px;
            background-color: rgb(68, 72, 73);
            position: absolute;
            z-index: -1;
            transition: width 1s;
        }

        .screen-indicator {

            border-radius: 50%;
            border: 3px solid rgb(143, 142, 142);
            background-color: white;
            z-index: 1;
            color: gray;
            transition: border-color color;
            transition-duration: 0.7s;
        }

        .completed {
            border-color: rgb(78, 196, 243);
            color: rgb(78, 196, 243);
        }

        .control-btn {
            background-color: rgb(238, 238, 238);
            padding: 5px 10px;
            border: 1px solid gray;
            border-radius: 5px;
            cursor: pointer;
        }

        .control-btn:disabled {
            cursor: not-allowed;

        }

        .control-btn:not(:disabled):hover {
            background-color: rgb(143, 142, 142);
        }

        label {
            display: flex;
            flex-direction: column;
            align-items: center;
            font-size: 14px;
        }

        .upload-section {
            border: 2px dashed #ccc;
            color: #888;
            text-align: center;
            cursor: pointer;
        }

        .upload-section:hover {
            background-color: #f8f8f8;
        }


        .Tableimg {
            width: 170px;
        }

        .table>:not(caption)>*>* {

            border-bottom-width: 0px;

        }

        .table {

            margin: 15px 0;
            position: relative;
            border: 1px solid gray;
            border-collapse: separate;
            border-spacing: 0;
            border-radius: 12px !important;
            /* Adjust the value as needed */
            overflow: scroll;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            /* Optional: add shadow */
        }

        .table .header {
            font-family: InterMedium;
            background-color: #D9D9D9 !important;

            font-size: 13px;
        }

        .upload-container {
            width: 35%;
            background-color: #D9D9D9;
            position: absolute;
            right: 2rem;
            top: 10rem;
            border: 1px solid #ccc;
            padding: 20px;
            text-align: center;
            cursor: pointer;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }

        .upload-container:hover {
            background-color: #f8f8f8;
        }

        .upload-container p {
            margin: 0;
            color: #555;
        }

        .size {
            font-size: 10px;
            color: gray;
        }

        .table td {

            padding: 15px;
        }

        .table .btn {
            padding: 0;
            border: none;
            border-radius: 8px;
            background-color: #D9D9D9;
            color: black;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 20px;
            width: 30px;
            height: 30px;

        }

        td input {
            outline: none;
            border-bottom: 1px solid rgb(173, 173, 173);
            border-top: none;
            border-left: none;
            border-right: none;
            padding: 10px 0;
            font-size: 13px;
        }

        .table thead th {
            vertical-align: bottom;
            border-bottom: none;
        }

        .table td h5 {

            font-family: InterBold;
            font-size: 20px;
        }

        .table td p {
            font-size: 13px;
            margin: 0;
            padding: 5px 0;
            font-family: InterBold;
        }

        .table td .span {
            font-family: InterMedium;
        }

        .table-responsive {
            overflow-x: auto;
        }


        .table2 {

            width: 50%;

        }

        .table3 {
            width: 100% !important;
        }

        .btn-font {
            padding: 10px;
            width: 130px;
            font-family: InterBold;
        }

        .visa img {
            width: 20px;
        }

        .pay {
            border: 1px solid black;
            color: white;
            background-color: #191919;
        }

        .formOuter {
            width: 100%;

        }

        .address {
            font-size: 13px;
        }

        .note {
            font-size: 11px;
            color: #888;
        }

        .paymentForm {
            margin: 25px 0;
            width: 100%;
            display: flex;
            align-items: flex-start;
            gap: 2rem;
        }

        .paymentForm2 {

            width: 100%;
            display: flex;
            align-items: flex-start;
            gap: 10px !important;
        }

        .paymentForm div {
            width: 100%;
        }

        .paymentForm label {
            font-size: 14px;
            font-family: InterMedium;
            color: black;

        }

        .paymentForm input {
            width: 100%;
            outline: none;
            padding: 7px 0;
            font-size: 12px;
            border-top: none;
            border-left: none;
            border-right: none;
            border-bottom: 1px solid #D9D9D9;
        }

        .header2 {
            width: 25%;
            font-family: InterMedium;
            background-color: #D9D9D9 !important;
            font-size: 13px;

        }

        .bottom {
            width: 25%;
            font-family: InterMedium;
            color: white;
            background-color: #000 !important;
            font-size: 13px;

        }

        th.header:first-child {
            border-top-left-radius: 12px;
            /* Add your desired border style */
        }

        /* Target the last th child */
        th.header:last-child {
            border-top-right-radius: 12px;
            /* Add your desired border style */
        }


        th.header2:first-child {
            border-top-left-radius: 12px;
            /* Add your desired border style */
        }

        /* Target the last th child */
        th.header2:last-child {
            border-top-right-radius: 12px;
            /* Add your desired border style */
        }

        tr.bottom td:first-child {
            border-bottom-left-radius: 12px;
        }

        tr.bottom td:last-child {
            border-bottom-right-radius: 12px;
        }

        .astrik {
            color: red;
        }

        /* product description section */
        #product_page_description_section {
            background: #D9D9D9;
            padding: 30px 0px;
        }

        #product_page_description_section .products_details_sec_title {
            color: #191919;
            font-family: "Inter", sans-serif;
            font-weight: 400;
            font-size: 24px;
            line-height: 1;
        }

        #product_page_description_section .description_item_wrapper {
            padding: 15px;
            background: #fff;
            display: flex;
            align-items: center;
            gap: 20px;
        }

        #product_page_description_section .description_item_wrapper img {
            width: 190px;
            height: 343px;
            object-fit: cover;
        }

        #product_page_description_section .description_item_wrapper .description_item_content .description_item_content_heading {
            color: #191919;
            font-family: "Inter", sans-serif;
            font-weight: 600;
            font-size: 40px;
            line-height: 66px;
        }

        #product_page_description_section .description_item_wrapper .description_item_content .description_item_content_paragraph {
            color: #191919;
            font-family: "Inter", sans-serif;
            font-weight: 300;
            font-size: 12px;
            line-height: 25px;
        }

        #product_page_description_section .description_item_list {
            list-style-type: none;
            padding: 0px;
        }

        #product_page_description_section .description_item_list li {
            color: #191919;
            font-family: "Inter", sans-serif;
            font-weight: 300;
            font-size: 13px;
            line-height: 25px;
        }

        #product_page_description_section .description_item_list li b {
            font-weight: 700 !important;
        }

        #product_page_description_section .description_see_more_btn {
            text-decoration: none;
            color: #191919;
            font-size: 24px;
            font-family: "Inter", sans-serif;
            font-weight: 400;
        }

        .visa-align {
            margin: 15px 0;
            width: 100%;
        }

        .payment-outer {
            width: 100%;
        }

        .card {
            border: 1px solid rgb(173, 173, 173);
            font-family: InterMedium;
            color: #000;
            border-radius: 10px;
            width: 100%;
            position: relative;
            display: flex;
            background-color: #F9F9F9;

        }

        .cardAlign {
            width: 100%;
        }

        .card input {
            font-size: 13px;
            padding: 10px 10px;
            border-radius: 10px;
            width: 100%;
            outline: none;
            border: none;
            background-color: #F9F9F9;
        }

        .card img {
            right: 8px;
            top: 13px;
            position: absolute;
            width: 13px;
        }

        .payment {
            width: 100%;
            border: 1px solid rgb(173, 173, 173);
            font-family: InterBold;
            border-radius: 12px;
            padding: 1rem;
        }

        @media(max-width:600px) {

            /* Product Detail Section */
            #products_details_sec .product_images_wrapper .product_extra_images_wrapper {
                width: 100px;
            }

            #products_details_sec .product_details_wrapper {
                padding-top: calc(var(--bs-gutter-x)* .5);
                padding-right: calc(var(--bs-gutter-x)* .5);
                padding-left: calc(var(--bs-gutter-x)* .5);
            }

            #products_details_sec .pl-3 {
                padding-right: calc(var(--bs-gutter-x)* .5);
                padding-left: calc(var(--bs-gutter-x)* .5);
            }

            #products_details_sec .pr-3 {
                padding-right: calc(var(--bs-gutter-x)* .5);
                padding-left: calc(var(--bs-gutter-x)* .5);
            }

            #products_details_sec .col-sm-12 {
                padding-top: calc(var(--bs-gutter-x)* .5);
            }

            /* Product Description Section */
            #product_page_description_section .description_item_wrapper {
                flex-direction: column;
            }

            #product_page_description_section .description_item_wrapper img {
                width: 100%;
            }
        }

        /*  */

        @media only screen and (max-width: 768px) {
            .product_back_btn {
                font-size: 12px;
            }

            .product_back_btn img {
                width: 15px;
            }

            .stepper-outer p {
                font-size: 13px;
            }

            .cart p {
                font-size: 13px;
            }

            .cart img {
                width: 18px;
            }

            .productDetails {
                width: 300px;
            }

            .table2 {
                width: 60%;
            }
        }

        @media only screen and (max-width: 425px) {
            .stepper-outer {
                width: 95%;


                padding: 2rem 2.5rem;
            }

            .table2 {
                width: 100%;
            }
        }

        .qunatity {
            width: 140px;
        }

        .table td h5 {
            font-size: 18px;
        }

        .table td p {
            font-size: 12px;
        }

        .uppertext {
            font-family: InterMedium;
            font-size: 13px;
        }

        .lowertext {
            font-family: InterLight;
            font-size: 11px;
            color: #888;
        }

        /* ::-webkit-scrollbar{
                                                                                                                                                    width: 10px;
                                                                                                                                                    }
                                                                                                                                                    ::-webkit-scrollbar-track{
                                                                                                                                                    background-color: #000;
                                                                                                                                                    } */
    </style>
@endsection
@section('content')



    <section id="back_btn_sec">
        <div class="container">
            <div class="product_page_top_bar">
                <a href="#" class="product_back_btn">

                    <img src="{{ asset('assets/website/images/svg/back.svg') }} ">

                    Cancel Cart
                </a>
            </div>
        </div>

    </section>

    <div class="container stepper-outer">
        <div class="d-flex justify-content-between align-items-center">
            <p>Cart</p>
            <p>Checkout</p>
            <p>Payment</p>
        </div>
        <div class="stepper-wrapper stepper-header">
            <div class="progress"></div>




            <input type="radio" id="step1" checked disabled />



            <input type="radio" id="step2" disabled />


            <input type="radio" id="step3" disabled />


        </div>

    </div>
    <form id="stepperForm">
        <div class="step">
            <div class="container cart">
                <div class="d-flex justify-content-start align-items-start gap-3 mt-5">
                    <span class="d-flex gap-2 justify-content-center align-items-center">
                        <img src="{{ asset('assets/website/images/svg/delete 1.svg') }} " />
                        <p class="p-0 m-0">Remove Item</p>
                    </span>
                    <span class="d-flex gap-2 justify-content-center align-items-center">
                        <img src="{{ asset('assets/website/images/svg/delete 1 (1).svg') }} " />
                        <p class="p-0 m-0">Edit</p>
                    </span>
                </div>
            </div>

            <div class="container">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" class="header"></th>
                                <th scope="col" class="header">Product</th>
                                <th scope="col" class="header">Price</th>
                                <th scope="col" class="header">Qty</th>
                                <th scope="col" class="header">SubTotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <img src="{{ asset('assets/website/images/image2.png') }} " class="Tableimg" />
                                </td>
                                <td>
                                    <div class="productDetails">
                                        <h5>Flatbed Printing</h5>
                                        <p>Height: <Span class="span">50</Span></p>
                                        <p>Width: <Span class="span">50</Span></p>
                                        <p>Material: <Span class="span">Ultraboard 3/16" (up to 60x120)</Span></p>
                                        <p>Printed Sides: <span class="span">Double Sided 4:4</span></p>
                                        <p>Notes: <span class="span">sdgsdgsdg</span></p>
                                    </div>
                                </td>
                                <td>
                                    <p class="span">Price $500</p>
                                    <p class="span">Additional File Notes <span class="astrik">*</span> </p>
                                    <input type="number" placeholder="height" />
                                </td>
                                <td>
                                    <div class="d-flex justify-content-start align-items-center gap-2 quantity">
                                        <button class="btn">-</button>
                                        2
                                        <button class="btn">+</button>
                                    </div>
                                </td>
                                <td>
                                    $756854
                                </td>

                            </tr>

                            <tr class="imageBox">
                                <td>
                                    <div class="upload-container">
                                        <div class="d-flex justify-content gap-3 align-items-center">
                                            <img src="{{ asset('assets/website/images/svg/image 727.svg') }} " />
                                            <span>
                                                <p>Upload Image</p>
                                                <p class="size">Max size: 200 MB</p>
                                            </span>
                                        </div>
                                        <input type="file" id="file-input" style="display: none;"
                                            onchange="handleFileUpload(event)" />
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="container mb-5">
                <div class="table-responsive d-flex flex-column justify-content-end align-items-end ">
                    <table class="table table2">
                        <thead>
                            <tr>

                                <th scope="col" class="header2">subTotal</th>
                                <th scope="col" class="header2">$907.46</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <h5>Shipping</h5>
                                </td>
                                <td>
                                    <div>

                                        <div class="d-flex gap-2">
                                            <input type="radio" />
                                            <p>Pickup from Eagle Eye</p>
                                        </div>
                                        <div class="d-flex gap-2">
                                            <input type="radio" />
                                            <p> Flat Rate Shipping: <Span class="span"> $15.99</Span></p>
                                        </div>
                                        <div class="d-flex gap-2">
                                            <input type="radio" />
                                            <p> Flat Rate: Over 47": <Span class="span">$36.95</Span></p>
                                        </div>
                                        <div class="d-flex gap-2">
                                            <input type="radio" />
                                            <p> Use My Carrier</p>
                                        </div>
                                        <div class="d-flex gap-2">
                                            <input type="radio" />
                                            <p> Air Freight: <span class="span">  $150.00</span></p>
                                        </div>
                                        <p class="span">
                                            Shipping to 13375 N Stemmons, Farmers Branch, TX 75234.
                                        </p>
                                    </div>
                                </td>







                            </tr>
                            <tr class="bottom">
                                <td>Total</td>
                                <td>$904.51</td>
                            </tr>
                        </tbody>
                    </table>

                    <button class="btn btn-warning ms-lg-3 next-step">Process to Checkout
                        <img src= "{{ asset('assets/website/images/Arrow 1.png') }} " />
                    </button>
                </div>
            </div>


        </div>
        <div class="step">

            <div class="container">
                <div class="d-flex gap-5">
                    <div class="formOuter">
                        <form class="">
                            <div class="  paymentForm">
                                <div class="d-flex flex-column  align-items-start">
                                    <label>First Name *</label>
                                    <input placeholder="Enter Height" />
                                </div>
                                <div class="d-flex flex-column align-items-start">
                                    <label>Last Name *</label>
                                    <input placeholder="Enter Width" />
                                </div>
                            </div>

                            <div class="d-flex  align-items-start  paymentForm">

                                <div class="d-flex flex-column align-items-start">
                                    <label>Company name (optional)</label>
                                    <input placeholder="Enter Height" />
                                </div>
                                <div class="d-flex flex-column align-items-start">
                                    <label>Country / Region *</label>
                                    <input placeholder="United Kingdom" />
                                </div>
                            </div>


                            <div class="d-flex flex-column align-items-start paymentForm paymentForm2">
                                <label>Street address *</label>
                                <input placeholder="13375 N Stemmons" />
                                <input placeholder="Apartment , Suit, Unit etc" />
                            </div>


                            <div class="  paymentForm">
                                <div class="d-flex flex-column  align-items-start">
                                    <label>Town / City  *</label>
                                    <input placeholder="Enter Height" />
                                </div>
                                <div class="d-flex flex-column align-items-start">
                                    <label>County (optional)</label>
                                    <input placeholder="Enter Width" />
                                </div>
                            </div>
                            <div class="  paymentForm">
                                <div class="d-flex flex-column  align-items-start">
                                    <label>Postcode *</label>
                                    <input placeholder="123456" />
                                </div>
                                <div class="d-flex flex-column align-items-start">
                                    <label>Phone *</label>
                                    <input placeholder="+1 000 000054" />
                                </div>
                            </div>


                            <div class="  paymentForm">
                                <div class="d-flex flex-column  align-items-start">
                                    <label>Email Address *</label>
                                    <input placeholder="123456" />
                                </div>
                                <div class="d-flex flex-column align-items-start">
                                    <label>Eagle Eye Location*</label>
                                    <input placeholder="Select Location" />
                                </div>
                            </div>

                            <div class="  paymentForm">
                                <div class="d-flex flex-column align-items-start">
                                    <label>Notes (optional)</label>
                                    <input placeholder="Your Order Note Here" />
                                </div>

                            </div>
                        </form>


                    </div>

                    <div class="table3">
                        <div class="d-flex flex-column align-items-start">
                            <div class="d-flex  align-items-start gap-2 address">
                                <input type="checkbox" />
                                <p class="p-0 m-0">Ship to a different address?</p>
                            </div>
                            <p class="note pt-2">Your Order Note Here</p>
                        </div>
                        <div class="table-responsive">
                            <table class="table table3">
                                <thead>
                                    <tr>

                                        <th scope="col" class="header2">subTotal</th>
                                        <th scope="col" class="header2">$907.46</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <h5>Shipping</h5>
                                        </td>
                                        <td>
                                            <div>

                                                <div class="d-flex gap-2">
                                                    <input type="radio" />
                                                    <p>Pickup from Eagle Eye</p>
                                                </div>
                                                <div class="d-flex gap-2">
                                                    <input type="radio" />
                                                    <p> Flat Rate Shipping: <Span class="span"> $15.99</Span></p>
                                                </div>
                                                <div class="d-flex gap-2">
                                                    <input type="radio" />
                                                    <p> Flat Rate: Over 47" : <Span class="span">$36.95</Span></p>
                                                </div>
                                                <div class="d-flex gap-2">
                                                    <input type="radio" />
                                                    <p> Use My Carrier</p>
                                                </div>
                                                <div class="d-flex gap-2">
                                                    <input type="radio" />
                                                    <p> Air Freight: <span class="span">  $150.00</span></p>
                                                </div>
                                                <p class="span">
                                                    Shipping to 13375 N Stemmons, Farmers Branch, TX 75234.
                                                </p>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="bottom">
                                        <td>Total</td>
                                        <td>$904.51</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex flex-column align-items-start">
                            <h6>Rush Services (only select one)</h6>
                            <div class="d-flex  align-items-start gap-2 address">
                                <input type="checkbox" />
                                <p class="p-0 m-0">Ship to a different address?</p>
                            </div>
                            <div class="d-flex  align-items-start gap-2 address">
                                <input type="checkbox" />
                                <p class="p-0 m-0">Same Day Rush for an additional $904.51</p>
                            </div>
                            <div class="d-flex mt-3 justify-content-start align-items-start">

                                <button class="pay prev-step btn-font btn  btn-warning ms-lg-3 next-step">
                                    Back
                                </button>
                                <button class="btn-font next-step btn  btn-warning ms-lg-3 next-step">
                                    Next
                                </button>
                            </div>
                        </div>
                    </div>
                </div>


            </div>


            <!-- <button type="button" class="btn btn-secondary prev-step">Previous</button>
                                                                                                                                                    <button type="button" class="btn btn-primary next-step">Next</button> -->


        </div>
        <div class="step">

            <div class="flex justify-content-center align-items-center">
                <div class="container d-flex justify-content-center align-items-center gap-3 mb-5">
                    <div class="table-responsive">
                        <table class="table table3">
                            <thead>
                                <tr>

                                    <th scope="col" class="header2">subTotal</th>
                                    <th scope="col" class="header2">$907.46</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <h5>Shipping</h5>
                                    </td>
                                    <td>
                                        <div>

                                            <div class="d-flex gap-2">
                                                <input type="radio" />
                                                <p>Pickup from Eagle Eye</p>
                                            </div>
                                            <div class="d-flex gap-2">
                                                <input type="radio" />
                                                <p> Flat Rate Shipping: <Span class="span"> $15.99</Span></p>
                                            </div>
                                            <div class="d-flex gap-2">
                                                <input type="radio" />
                                                <p> Flat Rate: Over 47": <Span class="span">$36.95</Span></p>
                                            </div>
                                            <div class="d-flex gap-2">
                                                <input type="radio" />
                                                <p> Use My Carrier</p>
                                            </div>
                                            <div class="d-flex gap-2">
                                                <input type="radio" />
                                                <p> Air Freight: <span class="span">  $150.00</span></p>
                                            </div>
                                            <p class="span">
                                                Shipping to 13375 N Stemmons, Farmers Branch, TX 75234.
                                            </p>
                                        </div>
                                    </td>







                                </tr>
                                <tr class="bottom">
                                    <td>Total</td>
                                    <td>$904.51</td>
                                </tr>
                            </tbody>
                        </table>


                    </div>


                    <div class="payment-outer d-flex flex-column">
                        <div class="payment d-flex flex-column  align-items-start">
                            <h5>Payment Methods</h5>
                            <div class="d-flex gap-2 align-items-start">
                                <input type="radio" />
                                <div class="d-flex flex-column align-items-start">
                                    <p class="p-0 m-0 uppertext">Pay on Delivery</p>
                                    <p class="p-0 m-0 lowertext">Pay with cash on delivery</p>
                                </div>

                            </div>



                            <div class="d-flex justify-content-between visa-align">
                                <div class="d-flex gap-2 align-items-start">
                                    <input type="radio" />
                                    <div class="d-flex flex-column align-items-start">
                                        <p class="p-0 m-0 uppertext">Credit/Debit Cards</p>
                                        <p class="p-0 m-0 lowertext">Pay with your Credit / Debit Card</p>
                                    </div>

                                </div>
                                <div class="d-flex justify-content-center gap-1 align-items-center visa">
                                    <img src="{{ asset('assets/website/images/image_3.png ') }} " />
                                    <img src="{{ asset('assets/website/images/image_4.png ') }} " />
                                    <img src="{{ asset('assets/website/images/image_5.png ') }} " />
                                </div>
                            </div>
                            <div class="cardAlign mt-3 mb-3">
                                <div class="card">
                                    <input type="number" placeholder="Card Number" />
                                    <img src="./assests/svg/Icon (1).svg" />
                                </div>

                                <div class="d-flex gap-1 mt-2">
                                    <div class="card">
                                        <input type="date" placeholder="MM/YY" />
                                    </div>
                                    <div class="card">
                                        <input type="number" placeholder="CVV" />
                                        <img src="./assests/svg/date.svg" />
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between visa-align">
                                <div class="d-flex gap-2 align-items-start">
                                    <input type="radio" />
                                    <div class="d-flex flex-column align-items-start">
                                        <p class="p-0 m-0 uppertext">Other Payment Methods</p>
                                        <p class="p-0 m-0 lowertext">Make payment through Gpay, Paypal, Paytm etc</p>
                                    </div>

                                </div>
                                <div class="d-flex justify-content-center gap-1 align-items-center visa">
                                    <img src="{{ asset('assets/website/images/Ellipse 14.png ') }} " />
                                    <img src="{{ asset('assets/website/images/Group_3704.png ') }} " />
                                    <img src="{{ asset('assets/website/images/Group_3705.png ') }} " />
                                    <img src="{{ asset('assets/website/images/Group_3706.png ') }} " />
                                </div>
                            </div>
                        </div>
                        <div class="d-flex mt-3 justify-content-start align-items-start">
                            <button class="btn-font btn  prev-step  btn-warning ms-lg-3 next-step">
                                Back
                            </button>
                            <button class="pay btn-font btn btn-success btn-warning ms-lg-3 next-step">
                                Pay
                            </button>
                        </div>
                    </div>

                </div>


            </div>
            <section id="product_page_description_section">

                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="products_details_sec_title">
                                Description
                            </h1>
                        </div>
                    </div>
                    <div class="row  align-items-center">
                        <div class="col-xxl-6 col-xm-6 col-lg-6 col-md-12 col-sm-12  mt-4">
                            <div class="description_item_wrapper">
                                <img src="{{ asset('assets/website/images/Group_1597881064.png ') }} ">
                                <div class="description_item_content">
                                    <h1 class="description_item_content_heading">Dibond</h1>
                                    <p class="description_item_content_paragraph">An excellent and durable material
                                        originally designed for building facades.  It consists of a black polyethylene core
                                        with .012″ aluminum faces on both sides.  Easy to cut and shape with a pleasing
                                        gloss enamel white finish on both sides. It won’t bow or oil can like standard
                                        metals.</p>
                                    <ul class="description_item_list">
                                        <li>
                                            <b>Thickness:</b> 3mm (3/16″)
                                        </li>
                                        <li>
                                            <b>Sheet Size:</b> 48″ x 96, Special order up to 60″ x 120″
                                        </li>
                                        <li><b>Color Front/Back:</b> White/White</li>
                                        <li><b>Finish:</b> Gloss</li>
                                        <li><b>Durability:</b> Long Term</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-6 col-xm-6 col-lg-6 col-md-12 col-sm-12  mt-4">
                            <div class="description_item_wrapper">
                                <img src="{{ asset('assets/website/images/Group_1597881065.png ') }} ">
                                <div class="description_item_content">
                                    <h1 class="description_item_content_heading">Coroplast</h1>
                                    <p class="description_item_content_paragraph">An excellent and durable material
                                        originally designed for building facades.  It consists of a black polyethylene core
                                        with .012″ aluminum faces on both sides.  Easy to cut and shape with a pleasing
                                        gloss enamel white finish on both sides. It won’t bow or oil can like standard
                                        metals.</p>
                                    <ul class="description_item_list">
                                        <li>
                                            <b>Thickness:</b> 3mm (3/16″)
                                        </li>
                                        <li>
                                            <b>Sheet Size:</b> 48″ x 96, Special order up to 60″ x 120″
                                        </li>
                                        <li><b>Color Front/Back:</b> White/White</li>
                                        <li><b>Finish:</b> Gloss</li>
                                        <li><b>Durability:</b> Long Term</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-xxl-6 col-xm-6 col-lg-6 col-md-12 col-sm-12 mt-4">
                            <div class="description_item_wrapper">
                                <img src="{{ asset('assets/website/images/Group_1597881066.png ') }} ">
                                <div class="description_item_content">
                                    <h1 class="description_item_content_heading">Lusterboard</h1>
                                    <p class="description_item_content_paragraph">An excellent and durable material
                                        originally designed for building facades.  It consists of a black polyethylene core
                                        with .012″ aluminum faces on both sides.  Easy to cut and shape with a pleasing
                                        gloss enamel white finish on both sides. It won’t bow or oil can like standard
                                        metals.</p>
                                    <ul class="description_item_list">
                                        <li>
                                            <b>Thickness:</b> 3mm (3/16″)
                                        </li>
                                        <li>
                                            <b>Sheet Size:</b> 48″ x 96, Special order up to 60″ x 120″
                                        </li>
                                        <li><b>Color Front/Back:</b> White/White</li>
                                        <li><b>Finish:</b> Gloss</li>
                                        <li><b>Durability:</b> Long Term</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-6 col-xm-6 col-lg-6 col-md-12 col-sm-12 mt-4">
                            <div class="description_item_wrapper">
                                <img src="{{ asset('assets/website/images/Group_1597881067.png ') }} ">
                                <div class="description_item_content">
                                    <h1 class="description_item_content_heading">PVC aka Sintra</h1>
                                    <p class="description_item_content_paragraph">An excellent and durable material
                                        originally designed for building facades.  It consists of a black polyethylene core
                                        with .012″ aluminum faces on both sides.  Easy to cut and shape with a pleasing
                                        gloss enamel white finish on both sides. It won’t bow or oil can like standard
                                        metals.</p>
                                    <ul class="description_item_list">
                                        <li>
                                            <b>Thickness:</b> 3mm (3/16″)
                                        </li>
                                        <li>
                                            <b>Sheet Size:</b> 48″ x 96, Special order up to 60″ x 120″
                                        </li>
                                        <li><b>Color Front/Back:</b> White/White</li>
                                        <li><b>Finish:</b> Gloss</li>
                                        <li><b>Durability:</b> Long Term</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12 d-flex align-items-center justify-content-center">
                            <a href="#" class="description_see_more_btn">
                                See More
                            </a>
                        </div>
                    </div>
                </div>
            </section>
            <div class="container cart">
                <div class="d-flex justify-content-between align-items-center mt-5 mb-2">
                    <h2>Similar Equipment</h2>
                </div>
                <div class="swiper mySwiper ">
                    <div class="swiper-wrapper swiper-wrapper3 ">
                        <div class="swiper-slide">
                            <div>
                                <img src="{{ asset('assets/website/images/image_(1).png ') }} " />
                                <div class="d-flex justify-content-start align-items-center">
                                    <p> 1 Mimaki UJV100-160 64" UV printer</p>
                                    <a href="#" class="btn1 btn2"><img src="./assests/svg/Vector.svg" /></a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">

                            <div>
                                <img src="{{ asset('assets/website/images/image_(2).png ') }} " />
                                <div class="d-flex justify-content-start align-items-center">
                                    <p> 1 Mimaki UJV100-160 64" UV printer</p>
                                    <a href="#" class="btn1 btn2"><img src="./assests/svg/Vector.svg" /></a>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div>
                                <img src="{{ asset('assets/website/images/image_(3).png ') }} " />

                                <div class="d-flex justify-content-start align-items-center">
                                    <p> 1 Mimaki UJV100-160 64" UV printer</p>
                                    <a href="#" class="btn1 btn2"><img src="./assests/svg/Vector.svg" /></a>
                                </div>

                            </div>
                        </div>


                        <div class="swiper-slide">
                            <div>
                                <img src="{{ asset('assets/website/images/image4.png ') }} " />
                                <div class="d-flex justify-content-start align-items-center">
                                    <p> 1 Mimaki UJV100-160 64" UV printer</p>
                                    <a href="#" class="btn1 btn2"><img src="./assests/svg/Vector.svg" /></a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div>
                                <img src="{{ asset('assets/website/images/image_(1).png ') }} " />
                                <div class="d-flex justify-content-start align-items-center">
                                    <p> 1 Mimaki UJV100-160 64" UV printer</p>
                                    <a href="#" class="btn1 btn2"><img src="./assests/svg/Vector.svg" /></a>
                                </div>
                            </div>
                        </div>


                        <div class="swiper-slide">

                            <div>
                                <img src="{{ asset('assets/website/images/image_(2).png ') }} " />
                                <div class="d-flex justify-content-start align-items-center">
                                    <p> 1 Mimaki UJV100-160 64" UV printer</p>
                                    <a href="#" class="btn1 btn2"><img src="./assests/svg/Vector.svg" /></a>
                                </div>
                            </div>
                        </div>


                        <div class="swiper-slide">
                            <div>
                                <img src="{{ asset('assets/website/images/image_(1).png ') }} " />
                                <div class="d-flex justify-content-start align-items-center">
                                    <p> 1 Mimaki UJV100-160 64" UV printer</p>
                                    <a href="#" class="btn1 btn2"><img src="./assests/svg/Vector.svg" /></a>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide"> <img src="{{ asset('assets/website/images/image4.png ') }} " /></div>
                        <div class="swiper-slide"> <img src="{{ asset('assets/website/images/image_(1).png ') }} " />
                        </div>
                    </div>
                    <!-- <div class="swiper-pagination"></div> -->
                </div>
            </div>







        </div>
    </form>




@endsection
@section('script')

    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 4, // Number of slides visible at a time
            spaceBetween: 30, // Space between each slide
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".next", // Your custom "next" button
                prevEl: ".prev", // Your custom "prev" button
            },
        });
    </script>
    <script>
        // When clicking the div, trigger the hidden input
        document.querySelector('.upload-container').addEventListener('click', function() {
            document.getElementById('file-input').click();
        });

        // Function to handle the file input change (optional)
        function handleFileUpload(event) {
            const file = event.target.files[0];
            if (file) {
                alert(`Selected file: ${file.name}`);
                // You can add more functionality here, like displaying the selected image
            }
        }
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let currentStep = 0;
            const steps = document.querySelectorAll(".step");
            const stepRadios = document.querySelectorAll(".stepper-header input[type='radio']");
            const stepperWrapper = document.querySelector(".stepper-wrapper");

            function showStep(stepIndex) {
                // Hide all steps
                steps.forEach(step => step.classList.remove("active"));
                // Show the current step
                steps[stepIndex].classList.add("active");

                // Update stepper radio buttons
                stepRadios.forEach((radio, index) => {
                    radio.checked = index === stepIndex;
                    radio.disabled = index !== stepIndex;
                });

                // Update the progress width based on the current step
                const progressWidth = (stepIndex / (stepRadios.length - 1)) * 100;
                stepperWrapper.style.setProperty('--progress-width', `${progressWidth}%`);
            }

            // Next step button event
            document.querySelectorAll(".next-step").forEach(button => {
                button.addEventListener("click", function() {
                    if (currentStep < steps.length - 1) {
                        currentStep++;
                        showStep(currentStep);
                    }
                });
            });

            // Previous step button event
            document.querySelectorAll(".prev-step").forEach(button => {
                button.addEventListener("click", function() {
                    if (currentStep > 0) {
                        currentStep--;
                        showStep(currentStep);
                    }
                });
            });

            // Submit form event
            document.getElementById("stepperForm").addEventListener("submit", function(event) {
                event.preventDefault();
                alert("Form submitted!");
            });

            // Initial display of the first step
            showStep(currentStep);
        });
    </script>
@endsection

@extends('layout.app')
@section('title', 'Cart')

@section('style')

    <style>
        .step {
            margin: 50px 0px;
        }

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
            font-family: 'InterMedium';
        }

        .cart p {
            font-family: 'InterMedium';
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
            z-index: 1111111;
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
            font-family: 'InterMedium';
            background-color: #D9D9D9 !important;

            font-size: 13px;
        }

        .upload-container {
            width: 42%;
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


            font-size: 32px;
        }

        .table td p {
            font-size: 14px;
            margin: 0;
            padding: 5px 0;
            font-family: 'GilroyBold';
        }

        .table td {
            text-align: left;
        }

        .table td .span {
            font-family: 'InterMedium';
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
            font-family: 'InterBold';
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
            font-family: 'InterMedium';
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
            font-family: 'InterMedium';
            background-color: #D9D9D9 !important;
            font-size: 13px;

        }

        .bottom {
            width: 25%;
            font-family: 'InterMedium';
            color: white !important;
            background-color: #000 !important;
            font-size: 18px;


        }

        .stepper-header input[type="radio"] {
            transform: scale(1.9);
            /* Adjust the scale to make it bigger */
            margin: 10px;
            /* Optional: adds space around the radio button */
            cursor: pointer;
            /* Change cursor on hover */
        }

        .step input[type="radio"] {
            /* ...existing styles */
            display: grid;
            place-content: center;
        }

        .step input[type="radio"]::before {
            content: "";
            width: 1em;
            height: 1em;
            border-radius: 50%;
            transform: scale(0);
            transition: 120ms transform ease-in-out;
            box-shadow: inset 1em 1em var(--form-control-color);
        }

        .step input[type="radio"]:checked::before {
            transform: scale(1);
            background-color: black;
            /* Change checked color to black */
            border: 2px solid black;
            /* Change outline to black */
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
            margin-top: 300px;
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
            font-family: 'InterMedium';
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

        @media (max-width: 425px) {
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


        .table td p {
            font-size: 14px;
            font-family: 'GilroyBold';
        }

        .uppertext {
            font-family: 'InterMedium';
            font-size: 13px;
        }

        .lowertext {
            font-family: InterLight;
            font-size: 11px;
            color: #888;
        }

        .cart_qty {
            background: #fff;
            border: none;
            outline: none;
            box-shadow: none;
            text-align: center;
            width: 25px;
        }

        .error-message {
            color: red;
            font-size: 12px;
            margin-top: 10px;
            display: none;
            /* Hidden by default */
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
                <a href="{{ route('home') }}" class="product_back_btn">

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
    <form id="stepperForm" action="{{ route('place.order') }}" method="post" class="require-validation"
        data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" enctype='multipart/form-data'>
        @csrf
        <div class="step" id="step01">


            @if (isset($data['cart']))
                @foreach ($data['cart'] as $key => $item)
                    <div class="container">
                        <div class="container cart">
                            <div class="d-flex justify-content-start align-items-start gap-3 mt-5">
                                <span class="d-flex gap-2 justify-content-center align-items-center remove-item"
                                    data-id="{{ $item->id }}">
                                    <img src="{{ asset('assets/website/images/svg/delete_1.svg') }} " />
                                    <p class="p-0 m-0">Remove Item</p>
                                </span>
                                <span class="d-flex gap-2 justify-content-center align-items-center">
                                    <img src="{{ asset('assets/website/images/svg/delete_1_(1).svg') }} " />
                                    <p class="p-0 m-0">Edit</p>
                                </span>
                            </div>
                        </div>
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

                                    @php

                                        $img = $item['attributes']['image'] ?? 'assets/profile.png';
                                        $additional_file = $item['attributes']['additional_file'] ?? null;
                                        $subtotal = $item['price'] * $item['quantity'];

                                    @endphp
                                    <tr>
                                        <td>
                                            <img src="{{ asset($img) }} " class="Tableimg" />
                                        </td>
                                        <td>
                                            <div class="productDetails">
                                                <h5 class="heading">{{ $item['name'] }}</h5>
                                                <p>Height: <Span class="span">{{ $item['attributes']['height'] }}</Span>
                                                </p>
                                                <p>Width: <Span class="span">{{ $item['attributes']['width'] }}</Span>
                                                </p>
                                                <p>Material: <Span
                                                        class="span">{{ $item['attributes']['material'] }}</Span>
                                                </p>
                                                <p>Printed Sides: <span
                                                        class="span">{{ $item['attributes']['printed_sides'] }}</span>
                                                </p>
                                                <p>Notes: <span
                                                        class="span">{{ $item['attributes']['special_instructions'] }}</span>
                                                </p>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="span">Price ${{ $item['price'] }}</p>
                                            {{-- <p class="span">Additional File Notes <span class="astrik">*</span> </p> --}}
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-start align-items-center gap-2 quantity">
                                                <a class="btn minus" data-id="{{ $item['id'] }}">-</a>
                                                <Input type="text" class="cart_qty" value="{{ $item['quantity'] }}"
                                                    readonly min="{{ $item['attributes']['min_order_value'] ?? 1 }}">
                                                <Input type="text" name="quantity" class="cart_qty"
                                                    value="{{ $item['quantity'] }}" hidden
                                                    min="{{ $item['attributes']['min_order_value'] ?? 1 }}">
                                                <a class="btn plus" data-id="{{ $item['id'] }}">+</a>
                                            </div>
                                        </td>
                                        <td>
                                            ${{ number_format($subtotal, 2) }}
                                        </td>

                                    </tr>


                                    {{-- <tr class="imageBox">
                                        <td>
                                            <div class="upload-container" data-key="{{ $key }}">
                                                <div class="d-flex justify-content-center gap-3 align-items-center">
                                                    @if ($additional_file)
                                                        <img id="preview-image-{{ $key }}"
                                                            src="{{ asset($additional_file) }}"
                                                            style="width:50px;height:50px;object-fit:contain" />
                                                    @else
                                                        <img id="preview-image-{{ $key }}"
                                                            src="{{ asset('assets/website/images/svg/image_727.svg') }}"
                                                            style="width:50px;height:50px;object-fit:contain" />
                                                        <span>
                                                            <p>Upload Image</p>
                                                            <p class="size">Max size: 200 MB</p>
                                                        </span>
                                                    @endif
                                                    <input type="file" id="file-input-{{ $key }}"
                                                        name="file" style="display: none;"
                                                        onchange="handleFileUpload(event, '{{ $key }}')" />
                                                </div>
                                            </div>

                                        </td>
                                    </tr> --}}
                                </tbody>
                            </table>

                        </div>
                    </div>
                @endforeach

            @endif

            <div class="container mb-5 ">
                <div class="table-responsive d-flex flex-column justify-content-end align-items-end ">
                    <table class="table table2">
                        <thead>
                            <tr>

                                <th scope="col" class="header2">subTotal</th>
                                <th scope="col" class="header2 subtotal">${{ \Cart::getSubTotal() }}</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <h5 class="heading">Shipping</h5>
                                </td>
                                <td>
                                    <div>
                                        @if (isset($data['shipping_rates'][0]))

                                            @foreach ($data['shipping_rates'] as $key => $item)
                                                <div class="d-flex gap-2">
                                                    <input type="radio" name="shipping_rate"
                                                        data-value="{{ $item->name ?? '' }}" value={{ $item->id ?? '' }}
                                                        data-price={{ $item->price ?? 0.0 }}
                                                        @if ($key == 0) checked @endif
                                                        class="shipping-rate" />
                                                    <p>{{ $item->name ?? '' }}</p>
                                                </div>
                                            @endforeach
                                        @endif
                                        {{-- <div class="d-flex gap-2">
                                            <input type="radio" name="shipping_rate" value="15.99"
                                                class="shipping-rate" />
                                            <p> Flat Rate Shipping: <Span class="span">$15.99</Span></p>
                                        </div>
                                        <div class="d-flex gap-2">
                                            <input type="radio" name="shipping_rate" value="36.95"
                                                class="shipping-rate" />
                                            <p> Flat Rate: Over 47":<Span class="span">$36.95</Span></p>
                                        </div>
                                        <div class="d-flex gap-2">
                                            <input type="radio" name="shipping_rate" value="0"
                                                class="shipping-rate" />
                                            <p> Use My Carrier</p>
                                        </div>
                                        <div class="d-flex gap-2">
                                            <input type="radio" name="shipping_rate" value="150.00"
                                                class="shipping-rate" />
                                            <p> Air Freight: <span class="span"> $150.00</span></p>
                                        </div> --}}
                                        <p class="span">
                                            Shipping to 13375 N Stemmons, Farmers Branch, TX 75234.
                                        </p>
                                    </div>
                                </td>

                            </tr>
                            <tr class="bottom">
                                <td class="bottom">Total</td>
                                <td class="bottom" id="total-amount">${{ \Cart::getSubTotal() }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <a class="btn btn-warning ms-lg-3 next-step" data-step="1">Process to Checkout
                        <img src= "{{ asset('assets/website/images/Arrow 1.png') }} " />
                    </a>
                </div>
            </div>


        </div>
        <div class="step" id="step02">

            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="formOuter">
                            <div class="paymentForm">
                                <div class="d-flex flex-column align-items-start">
                                    <label>First Name *</label>
                                    <input placeholder="Full Name" type="text" name="first_name" id="fname" />
                                </div>
                                <div class="d-flex flex-column align-items-start">
                                    <label>Last Name *</label>
                                    <input placeholder="Last Name" type="text" name="last_name" id="lname" />
                                </div>
                            </div>

                            <div class="d-flex align-items-start paymentForm">
                                <div class="d-flex flex-column align-items-start">
                                    <label>Company name (optional)</label>
                                    <input placeholder="Company Name" type="text" name="company_name"
                                        id="cname" />
                                </div>
                                <div class="d-flex flex-column align-items-start">
                                    <label>Country / Region *</label>
                                    <input placeholder="United Kingdom" type="text" name="region" id="region" />
                                </div>
                            </div>

                            <div class="d-flex flex-column align-items-start paymentForm paymentForm2">
                                <label>Street address *</label>
                                <input placeholder="13375 N Stemmons" type="text" name="streetone" id="streetone" />
                                <input placeholder="Apartment, Suit, Unit etc" type="text" name="streettwo"
                                    id="streettwo" />
                            </div>

                            <div class="paymentForm">
                                <div class="d-flex flex-column align-items-start">
                                    <label>Town / City *</label>
                                    <input placeholder="City" type="text" name="city" id="city" />
                                </div>
                                <div class="d-flex flex-column align-items-start">
                                    <label>Country (optional)</label>
                                    <input placeholder="Country (optional)" type="text" name="country"
                                        id="country" />
                                </div>
                            </div>

                            <div class="paymentForm">
                                <div class="d-flex flex-column align-items-start">
                                    <label>Postcode *</label>
                                    <input placeholder="123456" type="number" name="postcode" id="postcode" />
                                </div>
                                <div class="d-flex flex-column align-items-start">
                                    <label>Phone *</label>
                                    <input placeholder="+1 000 000054" type="number" name="phone" id="phone" />
                                </div>
                            </div>

                            <div class="paymentForm">
                                <div class="d-flex flex-column align-items-start">
                                    <label>Email Address *</label>
                                    <input placeholder="example@example.com" type="text" name="email"
                                        id="email" />
                                </div>
                                <div class="d-flex flex-column align-items-start">
                                    <label>Eagle Eye Location *</label>
                                    <select id="itemsPerPage" name="location"
                                        class="form-select form-select-sm ProductList">
                                        <option value="dallas">Dallas</option>
                                        <option value="houston">Houston</option>
                                        <option value="austin san antonio">Austin San Antonio </option>
                                    </select>

                                </div>
                            </div>

                            <div class="paymentForm">
                                <div class="d-flex flex-column align-items-start">
                                    <label>Notes (optional)</label>
                                    <input placeholder="Your Order Note Here" type="text" name="notes"
                                        id="notes" />
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="table3">
                            {{-- <div class="d-flex flex-column align-items-start">
                                <div class="d-flex  align-items-start gap-2 address">
                                    <input type="checkbox" />
                                    <p class="p-0 m-0">Ship to a different address?</p>
                                </div>
                                <p class="note pt-2">Your Order Note Here</p>
                            </div> --}}
                            <div class="table-responsive ">
                                <table class="table table3">
                                    <thead>
                                        <tr>

                                            <th scope="col" class="header2">subTotal</th>
                                            <th scope="col" class="header2 subtotal">${{ \Cart::getSubTotal() }}</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <h5 class="heading">Shipping</h5>
                                            </td>
                                            <td>
                                                <div>


                                                    @if (isset($data['shipping_rates'][0]))

                                                        @foreach ($data['shipping_rates'] as $key => $item)
                                                            <div class="d-flex gap-2">
                                                                <input type="radio" name="shipping_rate1"
                                                                    data-value="{{ $item->name ?? '' }}"
                                                                    value={{ $item->id ?? '' }}
                                                                    data-price={{ $item->price ?? 0.0 }}
                                                                    @if ($key == 0) checked @endif
                                                                    class="shipping-rate" />
                                                                <p>{{ $item->name ?? '' }}</p>
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                    <p class="span">
                                                        Shipping to 13375 N Stemmons, Farmers Branch, TX 75234.
                                                    </p>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="bottom">
                                            <td class="bottom">Total</td>
                                            <td class="bottom" id="total-amount2">${{ \Cart::getSubTotal() }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex flex-column align-items-start">
                                <h6>Rush Services (only select one)</h6>
                                <div class="d-flex align-items-start gap-2 address">
                                    <input type="radio" name="rush_service" value="452.26" class="rush-service" />
                                    <p class="p-0 m-0">Next Day Rush for an additional $452.26</p>
                                </div>
                                <div class="d-flex align-items-start gap-2 address">
                                    <input type="radio" name="rush_service" value="904.51" class="rush-service" />
                                    <p class="p-0 m-0">Same Day Rush for an additional $904.51</p>
                                </div>
                                <div class="d-flex mt-3 justify-content-start align-items-start">

                                    <a class="pay prev-step btn-font btn  btn-warning ms-lg-3 next-step-back"
                                        data-step="2">
                                        Back
                                    </a>
                                    <a class="btn-font next-step btn  btn-warning ms-lg-3 next-step" data-step="2">
                                        Next
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>


            </div>


            <!-- <button type="button" class="btn btn-secondary prev-step">Previous</button>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <button type="button" class="btn btn-primary next-step">Next</button> -->


        </div>
        <div class="step" id="step03">

            <div class="flex justify-content-center align-items-center">
                <div class="container ">
                    <div class="row  justify-content-center mb-5">
                        <div class="col-md-6 col-sm-12">
                            <table class="table table3 m-0">
                                <thead>
                                    <tr>

                                        <th scope="col" class="header2">subTotal</th>
                                        <th scope="col" class="header2 subtotal">${{ \Cart::getSubTotal() }}</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <h5 class="heading">Shipping</h5>
                                        </td>
                                        <td>
                                            <div>

                                                @if (isset($data['shipping_rates'][0]))

                                                    @foreach ($data['shipping_rates'] as $key => $item)
                                                        <div class="d-flex gap-2">
                                                            <input type="radio" name="shipping_rate2"
                                                                data-value="{{ $item->name ?? '' }}"
                                                                value={{ $item->id ?? '' }}
                                                                data-price={{ $item->price ?? 0.0 }}
                                                                @if ($key == 0) checked @endif
                                                                class="shipping-rate" />
                                                            <p>{{ $item->name ?? '' }}</p>
                                                        </div>
                                                    @endforeach
                                                @endif
                                                <p class="span">
                                                    Shipping to 13375 N Stemmons, Farmers Branch, TX 75234.
                                                </p>
                                            </div>
                                        </td>







                                    </tr>
                                    <tr class="bottom">
                                        <td class="bottom">Total</td>
                                        <td class="bottom" id="total-amount1">${{ \Cart::getSubTotal() }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="payment-outer d-flex flex-column">
                                <div class="payment d-flex flex-column  align-items-start">
                                    <h5>Payment Methods</h5>
                                    <div class="d-flex gap-2 align-items-start">
                                        <input type="radio" name="pay_type" value="cash_on_delivery" checked
                                            onclick="toggleCardInputs(false)" />
                                        <div class="d-flex flex-column align-items-start">
                                            <p class="p-0 m-0 uppertext">Pay on Delivery</p>
                                            <p class="p-0 m-0 lowertext">Pay with cash on delivery</p>
                                        </div>

                                    </div>



                                    <div class="d-flex justify-content-between visa-align">
                                        <div class="d-flex gap-2 align-items-start">
                                            <input type="radio" name="pay_type" value="credit_debit_card"
                                                onclick="toggleCardInputs(true)" />
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
                                    <div class="cardAlign mt-3 mb-3 card-inputs d-none" id="card-fields">
                                        <input type='hidden' name='stripeToken' id='stripe-token-id'>
                                        <div id="card-element" class="form-control"></div>
                                        <div id="card-error" class="error-message" role="alert"></div>
                                    </div>
                                    {{-- <div class="d-flex justify-content-between visa-align">
                                        <div class="d-flex gap-2 align-items-start">
                                            <input type="radio" name="pay_type" value="other_method" />
                                            <div class="d-flex flex-column align-items-start">
                                                <p class="p-0 m-0 uppertext">Other Payment Methods</p>
                                                <p class="p-0 m-0 lowertext">Make payment through Gpay, Paypal, Paytm etc
                                                </p>
                                            </div>

                                        </div>
                                        <div class="d-flex justify-content-center gap-1 align-items-center visa">
                                            <img src="{{ asset('assets/website/images/Group_3703.png ') }} " />
                                            <img src="{{ asset('assets/website/images/Group_3704.png ') }} " />
                                            <img src="{{ asset('assets/website/images/Group_3705.png ') }} " />
                                            <img src="{{ asset('assets/website/images/Ellipse_14.png ') }} " />
                                        </div>
                                    </div> --}}
                                </div>
                                <div class="d-flex mt-3 justify-content-start align-items-start">
                                    <a class="btn-font btn  prev-step  btn-warning ms-lg-3 next-step-back" data-step="3">
                                        Back
                                    </a>
                                    <a class="pay btn-font btn btn-success btn-warning ms-lg-3 next-step" data-step="3">
                                        Pay
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>





                </div>


            </div>







        </div>
    </form>


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
                                originally designed for building facades. It consists of a black polyethylene core
                                with .012″ aluminum faces on both sides. Easy to cut and shape with a pleasing
                                gloss enamel white finish on both sides. It won’t bow or oil can like standard
                                metals.</p>
                            <ul class="description_item_list">
                                <li>
                                    <b>Thickness:</b>3mm (3/16″)
                                </li>
                                <li>
                                    <b>Sheet Size:</b> 48″ x 96, Special order up to 60″ x 120″
                                </li>
                                <li><b>Color Front/Back:</b> White/White</li>
                                <li><b>Finish:</b> Gloss</li>
                                <li><b>Durability:</b> Long Term</li>
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
                                originally designed for building facades. It consists of a black polyethylene core
                                with .012″ aluminum faces on both sides. Easy to cut and shape with a pleasing
                                gloss enamel white finish on both sides. It won’t bow or oil can like standard
                                metals.</p>
                            <ul class="description_item_list">
                                <li>
                                    <b>Thickness:</b> 3mm (3/16″)
                                </li>
                                <li>
                                    <b>Sheet Size:</b> 48″ x 96, Special order up to 60″ x 120″
                                </li>
                                <li><b>Color Front/Back:</b> White/White</li>
                                <li><b>Finish:</b>Gloss</li>
                                <li><b>Durability:</b> Long Term</li>
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
                                originally designed for building facades. It consists of a black polyethylene core
                                with .012″ aluminum faces on both sides. Easy to cut and shape with a pleasing
                                gloss enamel white finish on both sides. It won’t bow or oil can like standard
                                metals.</p>
                            <ul class="description_item_list">
                                <li>
                                    <b>Thickness:</b>3mm (3/16″)
                                </li>
                                <li>
                                    <b>Sheet Size:</b>48″ x 96, Special order up to 60″ x 120″
                                </li>
                                <li><b>Color Front/Back:</b>White/White</li>
                                <li><b>Finish:</b>Gloss</li>
                                <li><b>Durability:</b>Long Term</li>
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
                                originally designed for building facades. It consists of a black polyethylene core
                                with .012″ aluminum faces on both sides. Easy to cut and shape with a pleasing
                                gloss enamel white finish on both sides. It won’t bow or oil can like standard
                                metals.</p>
                            <ul class="description_item_list">
                                <li>
                                    <b>Thickness:</b> 3mm (3/16″)
                                </li>
                                <li>
                                    <b>Sheet Size:</b> 48″ x 96, Special order up to 60″ x 120″
                                </li>
                                <li><b>Color Front/Back:</b> White/White</li>
                                <li><b>Finish:</b> Gloss</li>
                                <li><b>Durability:</b> Long Term</li>
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
            <h2>Similar Your Products</h2>
        </div>
        <div class="swiper mySwiper ">
            <div class="swiper-wrapper swiper-wrapper3 ">
                <div class="swiper-slide">
                    <div>
                        <img src="{{ asset('assets/website/images/image_(1).png ') }} " />
                        <div class="d-flex justify-content-start align-items-center">
                            <p> 1 Mimaki UJV100-160 64" UV printer</p>
                            <a href="#" class="btn1 btn2"><img
                                    src="{{ asset('assets/website/images/svg/Vector.svg') }} " /></a>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">

                    <div>
                        <img src="{{ asset('assets/website/images/image_(2).png ') }} " />
                        <div class="d-flex justify-content-start align-items-center">
                            <p> 1 Mimaki UJV100-160 64" UV printer</p>
                            <a href="#" class="btn1 btn2"><img
                                    src="{{ asset('assets/website/images/svg/Vector.svg') }}" /></a>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div>
                        <img src="{{ asset('assets/website/images/image_(3).png ') }} " />

                        <div class="d-flex justify-content-start align-items-center">
                            <p> 1 Mimaki UJV100-160 64" UV printer</p>
                            <a href="#" class="btn1 btn2"><img
                                    src="{{ asset('assets/website/images/svg/Vector.svg') }}" /></a>
                        </div>

                    </div>
                </div>


                <div class="swiper-slide">
                    <div>
                        <img src="{{ asset('assets/website/images/image4.png ') }} " />
                        <div class="d-flex justify-content-start align-items-center">
                            <p> 1 Mimaki UJV100-160 64" UV printer</p>
                            <a href="#" class="btn1 btn2"><img
                                    src="{{ asset('assets/website/images/svg/Vector.svg') }}" /></a>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div>
                        <img src="{{ asset('assets/website/images/image_(1).png ') }} " />
                        <div class="d-flex justify-content-start align-items-center">
                            <p> 1 Mimaki UJV100-160 64" UV printer</p>
                            <a href="#" class="btn1 btn2"><img
                                    src="{{ asset('assets/website/images/svg/Vector.svg') }} " /></a>
                        </div>
                    </div>
                </div>


                <div class="swiper-slide">

                    <div>
                        <img src="{{ asset('assets/website/images/image_(2).png ') }} " />
                        <div class="d-flex justify-content-start align-items-center">
                            <p> 1 Mimaki UJV100-160 64" UV printer</p>
                            <a href="#" class="btn1 btn2"><img
                                    src="{{ asset('assets/website/images/svg/Vector.svg') }} " /></a>
                        </div>
                    </div>
                </div>


                <div class="swiper-slide">
                    <div>
                        <img src="{{ asset('assets/website/images/image_(1).png ') }} " />
                        <div class="d-flex justify-content-start align-items-center">
                            <p> 1 Mimaki UJV100-160 64" UV printer</p>
                            <a href="#" class="btn1 btn2"><img
                                    src="{{ asset('assets/website/images/svg/Vector.svg') }} " /></a>
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


@endsection
@section('script')
    <script src="https://js.stripe.com/v3/"></script>
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
        document.addEventListener('DOMContentLoaded', function() {
            // Synchronize radio button check between the three groups.
            document.querySelectorAll('input[name="shipping_rate"]').forEach(function(radio) {
                radio.addEventListener('change', function() {
                    // When a radio button in the shipping_rate group is changed
                    var selectedValue = radio.value;

                    // Check the corresponding radio buttons in shipping_rate1 and shipping_rate2
                    document.querySelectorAll('input[name="shipping_rate1"]').forEach(function(
                        radio1) {
                        if (radio1.value == selectedValue) {
                            radio1.checked = true;
                        }
                    });

                    document.querySelectorAll('input[name="shipping_rate2"]').forEach(function(
                        radio2) {
                        if (radio2.value == selectedValue) {
                            radio2.checked = true;
                        }
                    });
                });
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const rushServices = document.querySelectorAll('.rush-service');

            const subTotal = parseFloat('{{ \Cart::getSubTotal() }}'); // Get the subtotal from the server-side



            rushServices.forEach((radio) => {
                radio.addEventListener('change', function() {
                    const rushCost = parseFloat(this.value) || 0; // Handle unselected radio
                    const total = (subTotal + rushCost).toFixed(2);
                    document.getElementById('total-amount2').textContent = `$${total}`;
                    document.getElementById('total-amount1').textContent = `$${total}`;

                });
            });


        });
        document.querySelectorAll('.shipping-rate').forEach((radio) => {


            radio.addEventListener('change', function() {
                const shippingCost = parseFloat(this.value);
                const subTotal = parseFloat('{{ \Cart::getSubTotal() }}');
                const total = (subTotal + shippingCost).toFixed(2);

                // Update the total amount in the DOM
                document.getElementById('total-amount').textContent = `$${total}`;
                console.log(`$${total}`);

            });
        });

        function toggleCardInputs(show) {
            const cardFields = document.getElementById('card-fields');
            if (show) {
                cardFields.classList.remove('d-none');
            } else {
                cardFields.classList.add('d-none');
            }
        }
        document.querySelectorAll('.shipping-rate1').forEach((radio) => {


            radio.addEventListener('change', function() {
                const shippingCost = parseFloat(this.value);
                const subTotal = parseFloat('{{ \Cart::getSubTotal() }}');
                const total = (subTotal + shippingCost).toFixed(2);

                // Update the total amount in the DOM
                document.getElementById('total-amount1').textContent = `$${total}`;
                console.log(`$${total}`);

            });
        });

        document.querySelectorAll('.shipping-rate2').forEach((radio) => {


            radio.addEventListener('change', function() {
                const shippingCost = parseFloat(this.value);
                console.log(shippingCost);

                const subTotal = parseFloat('{{ \Cart::getSubTotal() }}');
                const total = (subTotal + shippingCost).toFixed(2);

                // Update the total amount in the DOM
                document.getElementById('total-amount2').textContent = `$${total}`;


            });
        });

        document.querySelectorAll('.upload-container').forEach(function(container) {
            container.addEventListener('click', function() {
                // Get the data-key value from the clicked container
                const key = this.dataset.key;

                // Use the key to dynamically select the corresponding file input element
                const fileInput = document.getElementById(`file-input-${key}`);

                // Trigger the click event on the corresponding file input
                if (fileInput) {
                    fileInput.click();
                }
            });
        });

        // Function to handle the file input change
        function handleFileUpload1(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    // Update the src of the preview image with the uploaded image
                    document.getElementById('preview-image').src = e.target.result;
                };
                reader.readAsDataURL(file); // Convert the file to a data URL
                alert(`Selected file: ${file.name}`);
            }
        }

        function handleFileUpload(event, key) {
            const fileInput = document.getElementById(`file-input-${key}`);
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    // Update the src of the preview image with the correct id
                    const previewImage = document.getElementById(`preview-image-${key}`);
                    if (previewImage) {
                        previewImage.src = e.target.result;
                    }
                };
                reader.readAsDataURL(file); // Convert the file to a data URL

            }
        }

        $(document).ready(function() {
            // Handle minus button click
            $('.minus').on('click', function() {
                var itemId = $(this).data('id');
                var quantityInput = $(this).siblings('.cart_qty');
                var currentQuantity = parseInt(quantityInput.val());
                var minValue = parseInt(quantityInput.attr(
                    'min')); // Get the minimum value from the input attribute

                // Prevent going below the minimum value
                if (currentQuantity > minValue) {
                    updateCartQuantity(itemId, currentQuantity - 1);
                    quantityInput.val(currentQuantity - 1);
                }
            });

            // Handle plus button click
            $('.plus').on('click', function() {
                var itemId = $(this).data('id');
                var quantityInput = $(this).siblings('.cart_qty');
                var currentQuantity = parseInt(quantityInput.val());

                // Increase quantity
                updateCartQuantity(itemId, currentQuantity + 1);
                quantityInput.val(currentQuantity + 1);
            });

            // Function to update cart quantity
            function updateCartQuantity(itemId, newQuantity) {
                $.ajax({
                    url: "{{ route('cart.update') }}", // Route for updating cart
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: itemId,
                        quantity: newQuantity
                    },
                    success: function(response) {


                        if (response.success) {
                            $('th.header2.subtotal').text('$' + parseFloat(response.data.cartTotal)
                                .toFixed(2));
                            location.reload();
                            // Optionally, update the cart totals or show a success message

                        } else {

                            if (response.success == false) {

                                toastr.error(response.message);


                            }

                        }
                    },
                    error: function() {
                        alert('Error updating cart.');
                    }
                });
            }

            $('.remove-item').on('click', function() {
                var itemId = $(this).data('id'); // Get the item ID

                // Send AJAX request to remove the item from the cart
                $.ajax({
                    url: "{{ route('cart.remove') }}", // Route for removing item from cart
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: itemId
                    },
                    success: function(response) {
                        if (response.success) {
                            // Optionally, you can remove the item from the DOM
                            // $(this).closest('.container').remove(); // This would remove the entire item container
                            location.reload(); // Reload the page to update the cart view
                        } else {
                            alert('Failed to remove item from cart.');
                        }
                    },
                    error: function() {
                        alert('Error removing item from cart.');
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            var stripe = Stripe('{{ env('STRIPE_KEY') }}')


            var elements = stripe.elements();

            var cardElement = elements.create('card', {
                hidePostalCode: true, // Optional: Hide the postal code input field if not needed
            });
            // var cardElement = elements.create('card');
            cardElement.mount('#card-element');


            function createToken() {
                const errorMessage = document.getElementById('card-error');
                errorMessage.style.display = 'none';
                stripe.createToken(cardElement).then(function(result) {
                    if (typeof result.error != 'undefined') {




                        errorMessage.textContent = result.error.message;
                        errorMessage.style.display = 'block';

                    }



                    /* creating token success */

                    if (typeof result.token != 'undefined') {
                        document.getElementById("stripe-token-id").value = result.token.id;
                        $('#stepperForm').submit();

                    }

                });

            }
            $('#step1').prop('checked', true);
            $('#step1').prop('disabled', false);
            $('#step01').show();
            $('#step02').hide();
            $('#step03').hide();
            $('.next-step').on('click', function(e) {
                e.preventDefault();

                if ($('input[name="shipping_rate"]:checked').length === 0) {
                    event.preventDefault(); // Prevent form submission
                    alert('Please select a shipping rate.');
                } else {
                    var shippingRate = $('input[name="shipping_rate"]:checked').data('value');

                    // Reset all checkboxes and enable them initially
                    $('.shipping-checkbox').prop('checked', false).prop('disabled', false);

                    // Define shipping options and their corresponding checkboxes
                    var options = {
                        'Pickup from Eagle Eye': ['#one', '#onee'],
                        'Flat Rate Shipping': ['#two', '#twoo'],
                        'Flat Rate: Over 47': ['#three', '#threee'],
                        'Use My Carrier': ['#four', '#fourr'],
                        'Air Freight': ['#five', '#fivee']
                    };

                    // Check and enable the corresponding checkboxes based on the selected shipping rate
                    if (options[shippingRate]) {
                        options[shippingRate].forEach(function(id) {
                            $(id).prop('checked', true);
                        });

                        // Disable all other checkboxes
                        for (var key in options) {
                            if (key !== shippingRate) {
                                options[key].forEach(function(id) {
                                    $(id).prop('disabled', true);
                                });
                            }
                        }
                    }

                    var step = $(this).data('step');
                    if (step == 1) {
                        $('#step01').hide();
                        $('#step02').show();
                        $('#step03').hide();
                        $('#step2').prop('checked', true);
                        $('#step2').prop('disabled', false);
                        $('.progress').css('background-color', '#000');
                        $('.progress').css('width', '50%');
                    }
                }
                if (step == 2) {
                    // Array of required fields (only using IDs)
                    // Save field values into separate variables
                    const fname = $("#fname").val().trim();
                    const lname = $("#lname").val().trim();
                    const cname = $("#cname").val().trim();
                    const region = $("#region").val().trim();
                    const streetone = $("#streetone").val().trim();
                    const streettwo = $("#streettwo").val().trim();
                    const city = $("#city").val().trim();
                    const country = $("#country").val().trim();
                    const postcode = $("#postcode").val().trim();
                    const phone = $("#phone").val().trim();
                    const email = $("#email").val().trim();
                    const location = $("#location").val();
                    const notes = $("#notes").val().trim();

                    // Array of field values and corresponding selectors for error highlighting
                    const fields = [{
                            value: fname,
                            selector: '#fname'
                        },
                        {
                            value: lname,
                            selector: '#lname'
                        },
                        {
                            value: region,
                            selector: '#region'
                        },
                        {
                            value: streetone,
                            selector: '#streetone'
                        },
                        {
                            value: city,
                            selector: '#city'
                        },
                        {
                            value: postcode,
                            selector: '#postcode'
                        },
                        {
                            value: phone,
                            selector: '#phone'
                        },
                        {
                            value: email,
                            selector: '#email'
                        },
                        {
                            value: location,
                            selector: '#location'
                        }
                    ];

                    let isValid = true;

                    // Clear previous red borders
                    $(fields.map(field => field.selector).join(',')).css('border', '');

                    // Validate required fields
                    $.each(fields, function(index, field) {
                        if (field.value === '') {
                            $(field.selector).css('border', '2px solid red');
                            isValid = false;
                        }
                    });

                    // Validate email format
                    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (!emailPattern.test(email)) {
                        $('#email').css('border', '2px solid red');
                        isValid = false;
                    }
                    if (isValid) {
                        $('#step01').hide();
                        $('#step02').hide();
                        $('#step03').show();
                        $('.progress').css('background-color', '#000');
                        $('.progress').css('width', '100%');
                        $('#step3').prop('checked', true);
                        $('#step3').prop('disabled', false);

                    } else {
                        console.log("Form has errors, please correct them.");
                    }



                }
                if (step == 3) {
                    // Clear previous borders
                    const selectedPayType = $('input[name="pay_type"]:checked').val();
                    console.log('Selected Pay Type:', selectedPayType);
                    if (selectedPayType == 'credit_debit_card') {

                        createToken()
                    }
                    if (selectedPayType == 'cash_on_delivery') {


                        $('#stepperForm').submit();
                    }
                }
            })

            $('.next-step-back').on('click', function(e) {
                e.preventDefault();
                var step = $(this).data('step');
                if (step == 2) {

                    $('#step01').show();
                    $('#step02').hide();
                    $('#step03').hide();
                    $('#step2').prop('checked', false);
                    $('#step2').prop('disabled', true);
                    $('.progress').css('background-color', 'rgb(68, 72, 73)');
                    $('.progress').css('width', '0%');

                }
                if (step == 3) {
                    $('#step01').hide();
                    $('#step02').show();
                    $('#step03').hide();
                    $('.progress').css('background-color', 'rgb(68, 72, 73)');
                    $('.progress').css('width', '50%');
                    $('#step3').prop('checked', false);
                    $('#step3').prop('disabled', true);
                }
            })




            /*------------------------------------------

            --------------------------------------------

            Create Token Code

            --------------------------------------------

            --------------------------------------------*/


        })
    </script>
    <script type="text/javascript"></script>
@endsection

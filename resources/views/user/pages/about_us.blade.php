@extends('layout.app')
@section('title', 'CONTACT US')

@section('style')
    <style>
        #contact_banner {
            background-image: url('assets/website/images/banner.png');
            min-height: 560px;


        }

        #contact_banner ul {
            list-style-type: none;
        }

        #contact_banner h3 {
            font-family: 'GilroyLight';
            color: #fff;
            font-size: 88px;
            line-height: 74px;
        }

        #contact_banner h1 {
            font-family: 'GilroyBold';
            color: #fff;
            font-size: 138px;
            line-height: 138px;
            font-weight: 900;
        }

        #contact_banner .banner_content {
            min-height: 560px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        #contact_banner .social ul {
            display: flex;
            text-decoration: none;
            gap: 20px;
            padding: 0px;
        }

        #contact_form_sec {
            margin-top: -100px;
            margin-bottom: 50px;
        }

        #contact_form_sec .left_image {
            width: 100%;
        }

        #contact_form_sec .contact_form_wrapper {
            padding-left: 50px;
        }

        #contact_form_sec .contact_form_wrapper h1 {
            font-family: 'GilroyLight';
            color: #000;
            font-size: 80px;
            line-height: 74px;
        }

        #contact_form_sec .contact_form_wrapper h1 b {
            font-family: 'GilroyBold';
        }

        #contact_form_sec input,
        #contact_form_sec textarea {
            background: #EDEDED;
            border: none;
            padding: 20px 10px;
        }

        #contact_form_sec form {
            margin-top: 30px;
        }

        #contact_form_sec .btn-yellow {
            padding: 10px 60px;
            border-radius: 50px;
            background: #FFD014;
            color: #111111;
            font-family: 'GilroyMedium';
            font-size: 18px;

        }

        #contact_info_section {
            padding: 80px 0px;
            background: #EDEDED;
        }

        #contact_info_section h3 {
            font-family: "Inter", sans-serif;
            font-size: 24px;
            line-height: 36px;
            color: #000;
        }

        #contact_info_section h1 {
            font-family: "Inter", sans-serif;
            font-size: 56px;
            line-height: 56px;
            color: #000;
            font-weight: bold;
            width: 80%;
        }

        #contact_info_section .title {
            font-family: "Inter", sans-serif;
            font-size: 22px;
            font-weight: 600;
            line-height: 1;
        }

        #contact_info_section .title:before {
            content: "";
            display: block;
            background-color: #000;
            width: 30px;
            height: 5px;
            margin-bottom: -50px;
        }

        #contact_info_section .email {
            font-size: 22px;
            font-weight: 600;
            line-height: 1;
            margin-top: 30px;
        }

        #contact_info_section .timing {
            font-size: 17px;
            font-weight: 400;
            line-height: 32px;
            margin-top: 30px;
            padding-right: 80px;
        }

        #where_we_located_sec {
            padding: 100px 0px;
        }

        #where_we_located_sec .title {
            font-family: "Inter", sans-serif;
            color: #000;
            font-size: 70px;
            line-height: 79px;
            text-align: center;
            font-weight: normal;
        }

        #where_we_located_sec .title b {
            font-weight: bold;
        }

        #where_we_located_sec .image_wrapper img {
            width: 100%;
        }

        #where_we_located_sec .image_wrapper {
            text-align: center;
        }

        #where_we_located_sec .Dallas_title {
            font-family: "Inter", sans-serif;
            color: #000;
            font-size: 40px;
            line-height: 30px;
            text-align: center;
            font-weight: normal;
        }

        #where_we_located_sec .contact_info_anchor {
            font-family: 'GilroyMedium';
            font-size: 18px;
            line-height: 36px;
            color: #000;
            text-decoration: none;
        }

        @media(max-width:600px) {
            #contact_banner h3 {


                font-size: 60px;
                line-height: 30px;
            }

            #contact_banner h1 {

                font-size: 90px;
                line-height: 100px;

            }

            #contact_form_sec .contact_form_wrapper {
                padding-left: 0px;
            }

            #contact_form_sec .contact_form_wrapper h1 {

                font-size: 40px;
                line-height: 40px;
                margin-top: 20px;
            }

            #contact_info_section h1 {

                font-size: 30px;
                line-height: 34px;
                margin-bottom: 20px;
            }

            #where_we_located_sec .title {

                font-size: 50px;
                line-height: 50px;
            }

            #where_we_located_sec .Dallas_title {

                font-size: 30px;
            }

            #where_we_located_sec .contact_info_anchor {

                font-size: 24px;
            }
        }
    </style>
@endsection
@section('content')
    <section id="contact_banner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner_content">
                        <h3>Get In touch</h3>
                        <h1>With us</h1>
                        <div class="social">
                            <ul>
                                <li>
                                    <a href="">
                                        <img src="{{ asset('assets/website/images/svg/fb.svg') }} ">
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <img src="{{ asset('assets/website/images/svg/insta.svg') }} ">
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <img src="{{ asset('assets/website/images/svg/twitter.svg') }} ">
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="contact_form_sec">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-xxl-6 col-lg-6 col-md-12 col-sm-12">
                    <img class="left_image" src="{{ asset('assets/website/images/Mask_group.png') }} ">
                </div>
                <div class="col-xxl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="contact_form_wrapper">
                        <h1><b>Connect with us</b><br>
                            Today!</h1>
                        <form action="">
                            <div class="row">
                                <div class="col-md-6  mb-3">
                                    <input type="text " class="form-control" placeholder="First Name" name="fname"
                                        id="fname">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="text " class="form-control" placeholder="Last Name" name="lname"
                                        id="lname">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <input type="text " class="form-control" placeholder="Phone" name="phone"
                                        id="phone">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="text " class="form-control" placeholder="City" name="City"
                                        id="City">
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md-6 mb-3">
                                    <input type="text " class="form-control" placeholder="State" name="State"
                                        id="State">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="text " class="form-control" placeholder="Zip" name="zip"
                                        id="zip">
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md-12 mb-3">
                                    <textarea class="form-control" name="message" placeholder="Write message here.." id="message"></textarea>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md-12 text-end ">
                                    <input type="submit" name="submit" class="btn btn-lg btn-yellow">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="contact_info_section">
        <div class="container">
            <div class="row">
                <div class="col-xxl-6 col-lg-6 col-md-12 col-sm-12">
                    <h3>Contact Info</h3>
                    <h1>We are always happy to assist you</h1>

                </div>
                <div class="col-xxl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="row align-items-center">
                        <div class="col-xxl-6 col-lg-6 col-md-12 col-sm-12">
                            <h5 class="title mt-5">Email Address</h5>
                            <p class="email">info@eagleeyesigns.net</p>
                            <p class="timing">
                                Assistance hours: <br>
                                Mon-Thurs 8 am to 5 pm EST<br>
                                Fri 9 am to 1pm EST<br>
                            </p>
                        </div>
                        <div class="col-xxl-6 col-lg-6 col-md-12 col-sm-12">
                            <h5 class="title mt-5">Number</h5>
                            <p class="email">+1 (972) 466 2100</p>
                            <p class="timing">
                                Assistance hours: <br>
                                Mon-Thurs 8 am to 5 pm EST<br>
                                Fri 9 am to 1pm EST<br>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="where_we_located_sec">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="title"><b>Where Are </b>We Located</h1>
                </div>
                <div class="col-md-12">
                    <div class="image_wrapper mt-4">
                        <img src="{{ asset('assets/website/images/image.png') }} ">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row mt-3">
                        <div class="col-xxl-4 col-lg-4 col-md-12 col-sm-12">
                            <h1 class="Dallas_title"><b>Dallas </b>(City in Texas)</h1>
                        </div>
                        <div class="col-xxl-8 col-lg-8 col-md-12 col-sm-12">
                            <div class="row">
                                <div class="col-xxl-7 col-lg-7 col-md-12 col-sm-12 text-center">
                                    <a href="#" class="contact_info_anchor">
                                        <img src="{{ asset('assets/website/images/svg/loc.svg') }} " class="mx-3">

                                        Eagle Eye Signs Office: 972-466-2100 / Fax: 469-828-1592
                                        13375 Stemmons Frwy. Suite 400 Dallas, Texas 75234

                                    </a>
                                </div>
                                <div class="col-xxl-5 col-lg-5 col-md-12 col-sm-12 text-center">
                                    <a href="#" class="contact_info_anchor">
                                        <img src="{{ asset('assets/website/images/svg/phone.svg') }} " class="mx-3">
                                        Tel: +1 (972) 466 2100


                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>





@endsection
@section('script')

@endsection

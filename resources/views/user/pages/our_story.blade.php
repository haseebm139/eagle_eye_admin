@extends('layout.app')
@section('title', 'Our Story')

@section('style')
    <style>
        #our_story_banner {
            height: 200px;
            background-color: black;
            display: flex;
            align-items: center;
        }

        #our_story_banner .our_story_banner_heading {
            color: #fff;
            font-family: "Inter", sans-serif;
            font-size: 88px;
            line-height: 80px;
            font-weight: 300;
        }

        #our_story_banner .our_story_banner_heading b {
            font-weight: bold;
        }

        #our_story_sec_two {
            margin: 100px 0px;
        }

        #our_story_sec_two .yellow_small_heading {
            color: #FFD014;
            font-size: 24px;
            letter-spacing: 10px;
        }

        #our_story_sec_two .bigg_heading {
            font-family: 'GilroyBold';
            font-size: 88px;
            line-height: 74px;
        }

        #our_story_sec_two .content_our {
            font-family: "Inter", sans-serif;
            color: #6C6C6C;
            font-size: 21px;

        }

        #our_story_sec_two .our_story_sec_two_content_wrapper {
            display: flex;
            flex-direction: column;
            gap: 45px;
            min-height: 1150px;
        }

        #our_story_sec_two .padding-right {
            padding-right: 100px;
        }

        #our_story_sec_two .padding-left {
            padding-left: 100px;
        }

        @media(max-width:600px) {
            #our_story_banner .our_story_banner_heading {
                font-size: 44px;
                line-height: 37px;
            }

            #our_story_sec_two .padding-right {
                padding-right: 0px;
            }

            #our_story_sec_two .padding-left {
                padding-left: 0px;
            }

            #our_story_sec_two .bigg_heading {
                font-family: 'GilroyBold';
                font-size: 65px;
                line-height: 54px;
            }

            #our_story_sec_two .our_story_sec_two_content_wrapper {

                gap: 20px;
                min-height: auto;
            }

            #our_story_sec_two .row {
                row-gap: 50px;
            }
        }
    </style>
@endsection
@section('content')
    <section id="our_story_banner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="our_story_banner_heading"><b>Our </b>Story</h1>
                </div>
            </div>
        </div>
    </section>
    <section id="our_story_sec_two">
        <div class="container">
            <div class="row">
                <div class="col-xxl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="our_story_sec_two_content_wrapper padding-right">
                        <h4 class="yellow_small_heading">Who We Are</h4>
                        <h1 class="bigg_heading">Who We Are</h1>
                        <p class="content_our">We are a large format digital printing service that creates signs, graphics
                            and banners up to 10' wide! You know our work and you have seen it everywhere. We have been the
                            "go to" shop for most printing, design, and marketing firms since we are a wholesale printer to
                            the trade.
                        </p>
                        <img src="{{ asset('assets/website/images/our_story_one.png') }}">
                    </div>

                </div>
                <div class="col-xxl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="our_story_sec_two_content_wrapper d-flex justify-content-end padding-left"
                        style="flex-direction: column;">
                        <h4 class="yellow_small_heading">Why Us</h4>
                        <h1 class="bigg_heading">Why Us</h1>
                        <p class="content_our"> We are a well respected company in the DFW area with over 30 years of
                            experience in the sign business. Many companies look to us for advice, consultation, and
                            solutions for all their signage needs.</p>
                        <img src="{{ asset('assets/website/images/our_story_two.png') }} ">
                    </div>
                </div>
            </div>
        </div>
    </section>








@endsection
@section('script')

@endsection

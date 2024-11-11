@extends('layout.app')
@section('title', 'Home')

@section('style')
    <style>
        #Equipment_section .category_header {
            font-family: 'GilroyBold';
            font-size: 40px !important;
        }
    </style>
@endsection
@section('content')

    <section class="Equipment" id="Equipment_section">
        <div class="container">
            <div class="row">
                <div class="col-xxl-4 col-xm-4 col-lg-4 col-md-12 col-sm-12">
                    <h2 class="Equipment_heading">Your Products</h2>
                </div>
                <div class="col-xxl-8 col-xm-8 col-lg-8 col-md-12 col-sm-12">
                    <p class="Equipment_para">
                        As a leading sign company in Kansas City, KS, we handle every aspect of <br />the sign creation
                        process. This means we not only fabricate your signs, we <br />also offer complete design
                        assistance, professional installation, and any <br />repairs/maintenance you need to keep your
                        signage looking

                    </p>
                </div>
            </div>
            @if (isset($data['categories'][0]))
                @foreach ($data['categories'] as $category)
                    <div class="row">
                        <div class="col-xxl-4 col-xm-4 col-lg-4 col-md-12 col-sm-12">
                            <h6 class="Equipment_heading category_header">{{ $category->name ?? '' }}</h6>
                        </div>
                        <div class="col-xxl-8 col-xm-8 col-lg-8 col-md-12 col-sm-12">

                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-xxl-4 col-xm-4 col-lg-4 col-md-12 col-sm-12">
                            <div class="Equipment_para_text">
                                {{-- <p> 1 Mimaki UJV55-320 126" UV printer</p>
                                <p> 1 CTE 126" UV printer</p>
                                <p> 1 Mimaki UJV100-160 64" UV printer</p>
                                <p> 5 Epson S60600 64" Eco-Solvent</p>
                                <p> 5 Agfa Titan HS 60" X 120" Flatbed UV Printer</p> --}}

                            </div>
                        </div>
                        <div class="col-xxl-8 col-xm-8 col-lg-8 col-md-12 col-sm-12">
                            <div class="row ">

                                @if (isset($category->products[0]))
                                    @foreach ($category->products as $item)
                                        @php
                                            $img = $item->image->path ?? 'assets/website/images/image_(1).png';
                                        @endphp

                                        <div class="col-xxl-4 col-xm-4 col-lg-4 col-md-12 col-sm-12">
                                            <div class="outer  mb-3">
                                                <img class="Equipment_product_img" src="{{ asset($img) }}" />
                                                <div class="Product_content_wrapper">
                                                    <p class="product_title">
                                                        {{ $item->name ?? '1 Mimaki UJV100-160 64" UV printer' }} </p>

                                                    <a href="{{ route('product_detail', ['slug' => $item->slug ?? '']) }}"
                                                        class="arrow_btn"><img
                                                            src="{{ asset('assets/website/images/svg/Vector.svg') }}" /></a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif


                            </div>

                        </div>
                    </div>
                @endforeach
            @endif
        </div>

    </section>


    @include('user.partial.product_offer')



@endsection
@section('script')
@endsection

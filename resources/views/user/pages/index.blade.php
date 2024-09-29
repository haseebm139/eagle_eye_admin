@extends('layout.app')
@section('title', 'Home')

@section('style')@endsection
@section('content')

    <div class="container-fluid hero">


        <div class="container ">
            <div class="ms-5">
                <p class="heading">
                    High-Quality Custom <br /> Banners. <span class="light"> Fast, Reliable <br /> Printing</span>
                </p>
                <p>
                    You can manage your finances very easily and quickly <br /> with this platform. You can focus on
                    results faster.You can <br /> manage your finances very easily
                </p>

                <div class="d-flex gap-3 mt-5">
                    <a href="{{ route('register') }}" class="btn btn-warning">Register</a>
                    <a href="#" class="btn btn-warning2 ">Contact Us</a>
                </div>

            </div>

        </div>
    </div>

    <div class="container ">
        <div class="d-flex justify-content-between align-items-center mb-2">
            <h2>Equipment</h2>
            <p class="para">
                As a leading sign company in Kansas City, KS, we handle <br /> every aspect of the sign creation
                process.
                This means <br /> we not only fabricate your signs, we also offer complete design <br /> assistance,
                professional installation,
                and any repairs/maintenance <br /> you need to keep your signage looking great.
            </p>

            <div class="controls">
                <button class="btn1 prev"><img src="{{ asset('assets/website/images/svg/Vector.svg') }}"
                        alt="Prev" /></button>
                <button class="btn1 btn2 next"><img src="{{ asset('assets/website/images/svg/Vector.svg') }}"
                        alt="Next" /></button>
            </div>
        </div>
        <div class="swiper mySwiper mt-3">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div>
                        <img src="{{ asset('assets/website/images/image (1).png') }} " />
                        <div class="d-flex justify-content-start align-items-center">
                            <p> 1 Mimaki UJV100-160 64" UV printer</p>
                            <a href="#" class="btn1 btn2"><img
                                    src="{{ asset('assets/website/images/svg/Vector.svg') }}" /></a>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">

                    <div>
                        <img src="{{ asset('assets/website/images/image (2).png') }}" />
                        <div class="d-flex justify-content-start align-items-center">
                            <p> 1 Mimaki UJV100-160 64" UV printer</p>
                            <a href="#" class="btn1 btn2"><img
                                    src="{{ asset('assets/website/images/svg/Vector.svg') }}" /></a>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div>
                        <img src="{{ asset('assets/website/images/image (3).png') }}" />

                        <div class="d-flex justify-content-start align-items-center">
                            <p> 1 Mimaki UJV100-160 64" UV printer</p>
                            <a href="#" class="btn1 btn2"><img
                                    src="{{ asset('assets/website/images/svg/Vector.svg') }}" /></a>
                        </div>

                    </div>
                </div>


                <div class="swiper-slide">
                    <div>
                        <img src="{{ asset('assets/website/images/image4.png') }} " />
                        <div class="d-flex justify-content-start align-items-center">
                            <p> 1 Mimaki UJV100-160 64" UV printer</p>
                            <a href="#" class="btn1 btn2"><img
                                    src="{{ asset('assets/website/images/svg/Vector.svg') }}" /></a>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div>
                        <img src="{{ asset('assets/website/images/image (1).png') }} " />
                        <div class="d-flex justify-content-start align-items-center">
                            <p> 1 Mimaki UJV100-160 64" UV printer</p>
                            <a href="#" class="btn1 btn2"><img
                                    src="{{ asset('assets/website/images/svg/Vector.svg') }}" /></a>
                        </div>
                    </div>
                </div>


                <div class="swiper-slide">

                    <div>
                        <img src="{{ asset('assets/website/images/image (2).png') }} " />
                        <div class="d-flex justify-content-start align-items-center">
                            <p> 1 Mimaki UJV100-160 64" UV printer</p>
                            <a href="#" class="btn1 btn2"><img
                                    src="{{ asset('assets/website/images/svg/Vector.svg') }}" /></a>
                        </div>
                    </div>
                </div>


                <div class="swiper-slide">
                    <div>
                        <img src="{{ asset('assets/website/images/image (1).png') }} " />
                        <div class="d-flex justify-content-start align-items-center">
                            <p> 1 Mimaki UJV100-160 64" UV printer</p>
                            <a href="#" class="btn1 btn2"><img
                                    src="{{ asset('assets/website/images/svg/Vector.svg') }}" /></a>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide"> <img src="{{ asset('assets/website/images/image4.png') }} " /></div>
                <div class="swiper-slide"> <img src="{{ asset('assets/website/images/image (1).png') }} " /></div>
            </div>
            <!-- <div class="swiper-pagination"></div> -->
        </div>
    </div>
    @include('user.partial.product_offer')



@endsection
@section('script')
@endsection

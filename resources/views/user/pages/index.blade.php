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
                    Bring Your Vision to Life with Custom Signs and Banners – Designed <br /> to Impress, Printed to Last!
                </p>

                <div class="d-flex gap-3 mt-5">
                    @guest

                        <a href="{{ route('register') }}" class="btn btn-warning">Register</a>
                    @endguest
                    <a href="{{ route('about.us') }}" class="btn btn-warning2 ">Contact Us</a>
                </div>

            </div>

        </div>
    </div>
    @auth

        <div class="container ">
            <div class="d-flex justify-content-between align-items-center mb-2 flex-direcction-column">
                <h2>Your Products</h2>
                <p class="para">
                    As trusted sign experts, we bring your vision to life <br /> with custom-crafted signs that make a lasting
                    impression.<br /> From innovative designs to high-quality fabrication,<br /> we handle every detail to
                    ensure your
                    signage stands out<br /> and represents your brand with excellence.

                </p>

                <div class="controls">
                    <button class="btn1 prev11"><img src="{{ asset('assets/website/images/svg/Vector.svg') }}"
                            alt="Prev" /></button>
                    <button class="btn1 btn2 next11"><img src="{{ asset('assets/website/images/svg/Vector.svg') }}"
                            alt="Next" /></button>
                </div>
            </div>
            <div class="swiper mySwiper111 mt-3">
                <div class="swiper-wrapper">
                    @if (isset($data['products'][0]))
                        @foreach ($data['products'] as $item)
                            @php
                                $img = $item->image->path ?? 'assets/website/images/image_(1).png';
                            @endphp
                            <div class="swiper-slide">
                                <div>
                                    <img src="{{ asset($img) }} " />
                                    <div class="d-flex justify-content-start align-items-center">
                                        <p> {{ $item->name ?? '1 Mimaki UJV100-160 64" UV printer' }}</p>
                                        <a href="{{ route('product_detail', ['slug' => $item->slug ?? $item->id]) }}"
                                            class="btn1 btn2"><img
                                                src="{{ asset('assets/website/images/svg/Vector.svg') }}" /></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <!-- <div class="swiper-pagination"></div> -->
            </div>
        </div>
    @endauth
    @auth

        @include('user.partial.product_offer')
    @endauth



@endsection
@section('script')
    <script>
        var swiper = new Swiper(".mySwiper111", {
            slidesPerView: 1, // Default number of slides visible at a time
            spaceBetween: 0, // Space between each slide
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".next11", // Your custom "next" button
                prevEl: ".prev11", // Your custom "prev" button
            },
            breakpoints: {
                // When window width is >= 1200px
                1200: {
                    slidesPerView: 4,
                    spaceBetween: 20,
                },
                // When window width is >= 992px
                992: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
                // When window width is >= 768px
                768: {
                    slidesPerView: 2,
                    spaceBetween: 15,
                },
                // When window width is < 768px
                0: {
                    slidesPerView: 1,
                    spaceBetween: 0,
                },
            },
        });
    </script>
@endsection

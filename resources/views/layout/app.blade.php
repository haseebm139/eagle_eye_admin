<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('assets/website/css/style.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <style>
        @font-face {
            font-family: 'InterMedium';
            src: url('https://eagleeye.trangotechdevs.com/public/fonts/Inter/static/Inter_18pt-Medium.ttf') format('truetype');
        }

        @font-face {
            font-family: 'GilroyMedium';

            src: url('https://eagleeye.trangotechdevs.com/public/fonts/gilroy/Gilroy-Medium.ttf') format('truetype');
        }

        @font-face {
            font-family: 'GilroyBold';
            src: url('https://eagleeye.trangotechdevs.com/public/fonts/gilroy/Gilroy-Bold.ttf') format('truetype');

        }

        @font-face {
            font-family: 'GilroyLight';
            src: url('https://eagleeye.trangotechdevs.com/public/fonts/gilroy/Gilroy-Light.ttf') format('truetype');
        }

        @font-face {
            font-family: 'GilroyRegular';
            src: url('https://eagleeye.trangotechdevs.com/public/fonts/gilroy/Gilroy-Regular.ttf') format('truetype');
        }
    </style>
    @yield('style')
    <style>
        @media(max-width:600px) {
            .box {
                width: 100%;
                margin-top: 1rem;
            }

            .flex-direcction-column {
                flex-direction: column;
            }

            .footerLeft {
                width: 100%;
            }

            .footerRight .map {
                width: 100%;
            }

            .RightBottom {
                margin-left: 0px;
                flex-direction: column;
                gap: 1rem;
            }

            .inner {
                width: 100%;
            }

            .hero {
                background-position: top;
                background-size: cover;
            }

            .heading {
                font-size: 28px;

            }

            .para2 {
                width: 100%;

            }

            .subTopbar p {
                font-size: 8px;
            }
        }
    </style>
</head>

<body>

    @include('user.partial.header')

    @yield('content')
    @include('user.partial.analytics')
    @include('user.partial.footer')







    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('assets/website/js/script.js') }}"></script>

    <script>
        const baseUrl = "{{ url('/') }}";
        var swiper = new Swiper(".mySwiper23", {
            slidesPerView: 1, // Default number of slides visible at a time
            spaceBetween: 20, // Space between each slide
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".next2", // Your custom "next" button
                prevEl: ".prev2", // Your custom "prev" button
            },
            breakpoints: {
                // When window width is >= 1200px
                1200: {
                    slidesPerView: 3,
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
                    spaceBetween: 10,
                },
            },
        });
    </script>
    @yield('script')
</body>

</html>

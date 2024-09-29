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
</head>

<body>

    @include('user.partial.header')

    @yield('content')
    @include('user.partial.analytics')
    @include('user.partial.footer')







    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/website/js/script.js') }}"></script>

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

        var swiper2 = new Swiper(".mySwiper2", {
            slidesPerView: 3, // Number of slides visible at a time
            spaceBetween: 30, // Space between each slide
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".next2", // Your custom "next" button
                prevEl: ".prev2", // Your custom "prev" button
            },
        });
    </script>
    @yield('script')
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('assets/website/css/style.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

</head>

<body>
    <div class="container-fluid top-bar">
        <div class="container subTopbar">
            <p class="contact">Contact us</p>
            <div class="leftbar">
                <div class="flexing">
                    <img src="{{ asset('assets/website/images/svg/Mask group.svg') }}" />
                    <p>Talk To Us  (844) 983-0416</p>

                </div>
                <div class="flexing">
                    <img src="{{ asset('assets/website/images/svg/Mask group (1).svg') }}" />
                    <p>Email: info@eagleeye.com</p>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img class="logo" src="{{ asset('assets/admin/images/image 715.png') }}" alt="Logo">

            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 ">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Equipment's</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Products Offered</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Our Story</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About Us</a>
                    </li>
                </ul>
                <a href="#" class="btn btn-warning ms-lg-3">Login</a>
            </div>
        </div>
    </nav>

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
                    <a href="#" class="btn btn-warning">Register</a>
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




    <div class="container  d-flex mt-5 topAlignment">
        <div class="d-flex flex-column para2   mb-2">
            <h2>Products Offered</h2>
            <p class="para">
                As a leading sign company in Kansas City, KS, we handle every aspect of the sign creation process.
                This means we not only fabricate your signs, we also offer complete design assistance, professional
                installation,
                and any repairs/maintenance you need to keep your signage looking great.
            </p>

            <div class="controls">
                <button class="btn1 prev2"><img src="{{ asset('assets/website/images/svg/Vector.svg') }}"
                        alt="Prev" /></button>
                <button class="btn1 btn2 next2"><img src="{{ asset('assets/website/images/svg/Vector.svg') }}"
                        alt="Next" /></button>
            </div>
        </div>
        <div class="swiper mySwiper2 mt-3">
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
                        <img src="./assests/image (3).png" />

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


    <div class="container  d-flex  gap-3 justify-content-center align-items-center">
        <div class="d-flex flex-column justify-content-center align-items-center box ">
            <h1 class="price">3K</h1>
            <p class="indentity">Customer</p>
        </div>


        <div class="d-flex flex-column justify-content-center align-items-center box ">
            <h1 class="price">56K</h1>
            <p class="indentity">Prints & Signs in last 12 Months </p>
        </div>

        <div class="d-flex flex-column justify-content-center align-items-center box ">
            <h1 class="price">22</h1>
            <p class="indentity">States</p>
        </div>
    </div>

    <div class="footer">
        <div class="container d-flex">
            <div class="d-flex flex-column gap-2 footerLeft">
                <div class="d-flex  flex-column">
                    <h5>OFFICE ADDRESS</h5>
                    <p class="para p-0 m-0"> (By Appointment Only)</p>
                </div>
                <p class="d-flex gap-2 para mt-3"> <img
                        src="{{ asset('assets/website/images/svg/image 469.svg') }}" />Lorem Ipsum is simply
                    dummy text of the printing and typesetting industry</p>

                <p class="d-flex gap-2 para"> <img
                        src="{{ asset('assets/website/images/svg/image 469.svg') }}" />Lorem Ipsum is simply dummy
                    text of the printing and typesetting industry</p>
                <ul class="ul">
                    <li>Mon - Fri :<span> 9am - 5pm</span></li>
                    <li>Sat - Sun : <span>Closed</span></li>
                    <li>Contact no : <span>+1 647-689-4646</span></li>
                    <li>Email : <span>+1 647-689-4646</span></li>
                </ul>
                <p class="para">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                    Ipsum has been the industry's standard dummy text ever since the 1500s, </p>

            </div>
            <div>
                <div class="footerRight">
                    <img src="{{ asset('assets/website/images/Rectangle 4126.png') }} " class="map" />
                </div>

                <div class="d-flex justify-content-start RightBottom">
                    <ul class="">
                        <h6 class="">Quick Links</h6>
                        <li class="para color"><a>About Us</a></li>
                        <li class="para color"><a>Portfolio</a></li>
                        <li class="para color"><a>Blog</a></li>
                        <li class="para color"><a>Search</a></li>
                        <li class="para color"><a>Privacy Policy</a></li>
                        <li class="para color"><a>Terms of Services</a></li>
                        <li class="para color"><a>Refund Policy</a></li>


                    </ul>

                    <ul class="">
                        <h6 class="">Services</h6>
                        <li class="para color"><a>Service-1</a></li>
                        <li class="para color"><a>Service-2</a></li>
                        <li class="para color"><a>Service-3</a></li>
                        <li class="para color"><a>Service-4</a></li>
                        <li class="para color"><a>Service-5</a></li>



                    </ul>

                    <div class="d-flex flex-wrap flex-column inner">
                        <h2>Do you have any questions?</h2>
                        <p class="para color">Lorem ipsum dolor sit amet consectetur. Proin lectus lectus lectus
                            imperdiet </p>

                        <div class="searchBar">
                            <input type="search para" placeholder="ENTER YOUR EMAIL"></input>
                            <a class="btn2 btn1 para ">SEND</a>
                        </div>
                        <div class="d-flex justify-content-start align-items-start gap-1  mt-2 icons">
                            <a href="#">
                                <img src="{{ asset('assets/website/images/fb.png') }} " class="pb-1" />
                            </a>
                            <a href="#">
                                <img src="{{ asset('assets/website/images/Group (1).png') }} " class="pb-1" />
                            </a>
                            <a href="#"></a>
                            <img src="{{ asset('assets/website/images/Group (2).png') }}" />
                            </a>
                            <a href="#"></a>
                            <img src="{{ asset('assets/website/images/Group (3).png') }}" />
                            </a>
                            <a href="#"></a>
                            <img src="{{ asset('assets/website/images/Group (4).png') }}" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

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
</body>

</html>

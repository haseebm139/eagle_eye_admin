<div class="container-fluid top-bar">
    <div class="container subTopbar">
        <p class="contact">Contact us</p>
        <div class="leftbar">
            <div class="flexing">
                <img src="{{ asset('assets/website/images/svg/Mask_group.svg') }}" />
                <p>Talk To Us  (844) 983-0416</p>

            </div>
            <div class="flexing">
                <img src="{{ asset('assets/website/images/svg/Mask_group_(1).svg') }}" />
                <p>Email: info@eagleeye.com</p>
            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
            <img class="logo" src="{{ asset('assets/admin/images/image_715.png') }}" alt="Logo">

        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 ">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('equipments') }}">Equipment's</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Products Offered</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('our.story') }}">Our Story</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about.us') }}">About Us</a>
                </li>
            </ul>
            @auth

                <a href="{{ route('cart') }}" class="btn btn-warning ms-lg-3"><img
                        src="{{ asset('assets/website/images/svg/cart-shopping-fast 1.svg') }} " class="ml-2" /> Cart -
                    25</a>



                <div class="dropdown">
                    <!-- The dropdown toggle -->
                    @php
                        $profile = auth()->user()->profile ?? 'assets/profile.png';
                    @endphp
                    <div class="custom-dropdown" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <span class="chevron">&#x25BC;</span> <!-- Unicode character for a down arrow -->
                        <img src="{{ asset($profile) }} " alt="User Image" id="profile-image">
                    </div>
                    <!-- The dropdown menu -->
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Profile</a>
                        <a class="dropdown-item" href="#">Settings</a>
                        <a class="dropdown-item" href="#">Logout</a>
                    </div>
                </div>
            @endauth

            @guest
                <a href="{{ route('login') }}" class="btn btn-warning ms-lg-3">Login</a>
            @endguest
        </div>
    </div>
</nav>

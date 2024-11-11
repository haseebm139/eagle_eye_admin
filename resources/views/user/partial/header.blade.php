<style>
    #dropdownMenuButton img {
        width: 50px;
    }
</style>
<div class="container-fluid top-bar">
    <div class="container subTopbar">
        <p class="contact">Contact us</p>
        <div class="leftbar">
            <div class="flexing">
                <img src="{{ asset('assets/website/images/svg/Mask_group.svg') }}" />
                <p>Talk To Us  972.466.2100</p>

            </div>
            <div class="flexing">
                <img src="{{ asset('assets/website/images/svg/Mask_group_(1).svg') }}" />
                <p>Email: info@eagleeyesigns.net</p>
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
                @auth

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('equipments') }}">Your Product's</a>
                    </li>
                @endauth
                <li class="nav-item dropdown">
                    <a class="nav-link  dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" href="#">Products Offered</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                      </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('our.story') }}">Our Story</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about.us') }}">CONTACT US</a>
                </li>
            </ul>
            <a href="{{ route('cart') }}" class="btn btn-warning ms-lg-3"><img
                    src="{{ asset('assets/website/images/svg/cart-shopping-fast 1.svg') }} " class="ml-2" /> Cart -
                {{ $total_cart_item }}</a>
            @auth




                <div class="dropdown">
                    <!-- The dropdown toggle -->
                    @php
                        $profile = auth()->user()->profile ?? 'assets/profile.png';
                    @endphp
                    <div class="custom-dropdown" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        {{-- <span class="chevron">&#x25BC;</span> <!-- Unicode character for a down arrow --> --}}
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

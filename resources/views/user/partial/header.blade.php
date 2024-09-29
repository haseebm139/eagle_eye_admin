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
                    <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('equipments') }}">Equipment's</a>
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
            <a href="{{ route('login') }}" class="btn btn-warning ms-lg-3">Login</a>
        </div>
    </div>
</nav>

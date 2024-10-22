<div class="sidebar d-flex flex-column" id="sidebar">
    <div class="text-left p-3 border-bottom d-flex align-items-center justify-content-between">
        <img src="{{ asset('assets/admin/images/image_715.png') }}" alt="Logo" class="img-fluid">
        <i class="fa-regular fa-circle-xmark desktop-hide" id="toggle-close"></i>
    </div>
    <nav class="nav flex-column mt-3">
        <div>
            <a href="{{ route('dashboard') }}" class="nav-link {{ Route::is('dashboard') ? 'active' : '' }}">

                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M3 6.5C3 3.87479 3.02811 3 6.5 3C9.97189 3 10 3.87479 10 6.5C10 9.12521 10.0111 10 6.5 10C2.98893 10 3 9.12521 3 6.5Z"
                        stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M14 6.5C14 3.87479 14.0281 3 17.5 3C20.9719 3 21 3.87479 21 6.5C21 9.12521 21.0111 10 17.5 10C13.9889 10 14 9.12521 14 6.5Z"
                        stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M3 17.5C3 14.8748 3.02811 14 6.5 14C9.97189 14 10 14.8748 10 17.5C10 20.1252 10.0111 21 6.5 21C2.98893 21 3 20.1252 3 17.5Z"
                        stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M14 17.5C14 14.8748 14.0281 14 17.5 14C20.9719 14 21 14.8748 21 17.5C21 20.1252 21.0111 21 17.5 21C13.9889 21 14 20.1252 14 17.5Z"
                        stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <span>Dashboard</span>
            </a>
            <a href="{{ route('orders') }}" class="nav-link {{ Route::is('orders', 'orders.view') ? 'active' : '' }}">

                <svg width="25" height="24" viewBox="0 0 25 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M16.9611 21.4998H8.6133C5.54694 21.4998 3.19454 20.3922 3.86273 15.9346L4.64076 9.89339C5.05266 7.66913 6.47143 6.81787 7.71628 6.81787H17.8948C19.1579 6.81787 20.4943 7.7332 20.9703 9.89339L21.7483 15.9346C22.3158 19.8888 20.0275 21.4998 16.9611 21.4998Z"
                        stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path
                        d="M17.0985 6.59824C17.0985 4.21216 15.1642 2.27787 12.7781 2.27787V2.27787C11.6291 2.273 10.5255 2.72603 9.71132 3.53679C8.89714 4.34754 8.43944 5.44923 8.43945 6.59824V6.59824"
                        stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M15.7437 11.1017H15.698" stroke="#53545C" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                    <path d="M9.91317 11.1017H9.8674" stroke="#53545C" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
                <span>Orders</span>
            </a>
            <a href="{{ route('customers') }}"
                class="nav-link {{ Route::is('customers', 'customers.view') ? 'active' : '' }}">

                <svg width="25" height="24" viewBox="0 0 25 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M10.0388 15.207C13.7278 15.207 16.8808 15.766 16.8808 17.999C16.8808 20.232 13.7488 20.807 10.0388 20.807C6.34878 20.807 3.19678 20.253 3.19678 18.019C3.19678 15.785 6.32778 15.207 10.0388 15.207Z"
                        stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M10.0388 12.02C7.61683 12.02 5.65283 10.057 5.65283 7.635C5.65283 5.213 7.61683 3.25 10.0388 3.25C12.4598 3.25 14.4238 5.213 14.4238 7.635C14.4328 10.048 12.4828 12.011 10.0698 12.02H10.0388Z"
                        stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path
                        d="M16.9302 10.8818C18.5312 10.6568 19.7642 9.28277 19.7672 7.61977C19.7672 5.98077 18.5722 4.62077 17.0052 4.36377"
                        stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path
                        d="M19.0425 14.7324C20.5935 14.9634 21.6765 15.5074 21.6765 16.6274C21.6765 17.3984 21.1665 17.8984 20.3425 18.2114"
                        stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <span>Customers</span>
            </a>
            <a href="{{ route('product') }}" class="nav-link @if (Route::is('product') || Route::is('add.product')) active @endif ">
                <img src="{{ asset('assets/admin/images/svg/Folder.svg') }}" /><span>Inventory</span>
            </a>
            <a href="{{ route('settings') }}" class="nav-link {{ Route::is('settings') ? 'active' : '' }}">
                <img src="{{ asset('assets/admin/images/svg/Setting.svg') }}" /><span>Settings</span>
            </a>
        </div>


        {{-- <div class="botton-center">
            <a href="#" class="nav-link mt-auto mb-3">
                <img src="{{ asset('assets/admin/images/svg/fi_headphones.svg') }}" /> <span>Contact Support</span>
            </a>
        </div> --}}
        <a href="{{ route('logout') }}" class="nav-link mt-auto mb-3">
            <i class='bx bx-log-out'></i> <span>Logout</span>
        </a>
    </nav>
</div>

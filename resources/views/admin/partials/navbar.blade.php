<div class="sidebar d-flex flex-column" id="sidebar">
    <div class="text-left p-3 border-bottom">
        <img src="{{ asset('assets/admin/images/image_715.png') }}" alt="Logo" class="img-fluid">
    </div>
    <nav class="nav flex-column mt-3">
        <div>
            <a href="{{ route('dashboard') }}" class="nav-link {{ Route::is('dashboard') ? 'active' : '' }}">
                <img src="{{ asset('assets/admin/images/svg/Category.svg') }}" /> <span>Dashboard</span>
            </a>
            <a href="#" class="nav-link">
                <img src="{{ asset('assets/admin/images/svg/Bag.svg') }}" /> <span>Orders</span>
            </a>
            <a href="{{ route('customers') }}" class="nav-link">
                <img src="{{ asset('assets/admin/images/svg/2_User.svg') }}" /><span>Customers</span>
            </a>
            <a href="{{ route('product') }}" class="nav-link @if (Route::is('product') || Route::is('add.product')) active @endif ">
                <img src="{{ asset('assets/admin/images/svg/Folder.svg') }}" /><span>Inventory</span>
            </a>
            <a href="#" class="nav-link">
                <img src="{{ asset('assets/admin/images/svg/Setting.svg') }}" /><span>Settings</span>
            </a>
        </div>


        <div class="botton-center">
            <a href="#" class="nav-link mt-auto mb-3">
                <img src="{{ asset('assets/admin/images/svg/fi_headphones.svg') }}" /> <span>Contact Support</span>
            </a>
        </div>
        <a href="{{ route('logout') }}" class="nav-link mt-auto mb-3">
            <i class='bx bx-log-out'></i> <span>Logout</span>
        </a>
    </nav>
</div>

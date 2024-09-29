<div class="sidebar d-flex flex-column" id="sidebar">
    <div class="text-left p-3 border-bottom">
        <img src="{{ asset('admin/assets/images/image 715.png') }}" alt="Logo" class="img-fluid">
    </div>
    <nav class="nav flex-column mt-3">
        <div>
            <a href="{{ route('dashboard') }}" class="nav-link {{ Route::is('dashboard') ? 'active' : '' }}">
                <img src="{{ asset('admin/assets/images/svg/Category.svg') }}" /> <span>Dashboard</span>
            </a>
            <a href="#" class="nav-link">
                <img src="{{ asset('admin/assets/images/svg/Bag.svg') }}" /> <span>Orders</span>
            </a>
            <a href="#" class="nav-link">
                <img src="{{ asset('admin/assets/images/svg/2 User.svg') }}" /><span>Customers</span>
            </a>
            <a href="{{ route('product') }}" class="nav-link @if (Route::is('product') || Route::is('add.product')) active @endif ">
                <img src="{{ asset('admin/assets/images/svg/Folder.svg') }}" /><span>Inventory</span>
            </a>
            <a href="#" class="nav-link">
                <img src="{{ asset('admin/assets/images/svg/Setting.svg') }}" /><span>Settings</span>
            </a>
        </div>


        <div class="botton-center">
            <a href="#" class="nav-link mt-auto mb-3">
                <img src="{{ asset('admin/assets/images/svg/fi_headphones.svg') }}" /> <span>Contact Support</span>
            </a>
        </div>
        <a href="{{ route('logout') }}" class="nav-link mt-auto mb-3">
            <i class='bx bx-log-out'></i> <span>Logout</span>
        </a>
    </nav>
</div>

<style>
    .active_show {
        display: block;
    }

    .active_hide {
        display: none;
    }
</style>
<div class="sidebar d-flex flex-column" id="sidebar">
    <div class="text-left p-3 border-bottom d-flex align-items-center justify-content-between">
        <img src="{{ asset('assets/admin/images/image_715.png') }}" alt="Logo" class="img-fluid">
        <i class="fa-regular fa-circle-xmark desktop-hide" id="toggle-close"></i>
    </div>
    <nav class="nav flex-column mt-3">
        <div>
            <a href="{{ route('dashboard') }}" class="nav-link {{ Route::is('dashboard') ? 'active' : '' }}">

                <svg class=" {{ Route::is('dashboard') ? 'active_hide' : 'active_show' }}" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
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

                <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg"
                    class=" {{ Route::is('dashboard') ? 'active_show' : 'active_hide' }}">
                    <path opacity="0.4"
                        d="M14.5229 0H17.9089C19.3111 0 20.4474 1.14585 20.4474 2.55996V5.97452C20.4474 7.38864 19.3111 8.53449 17.9089 8.53449H14.5229C13.1206 8.53449 11.9844 7.38864 11.9844 5.97452V2.55996C11.9844 1.14585 13.1206 0 14.5229 0Z"
                        fill="white" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M2.98579 0H6.37176C7.77402 0 8.91028 1.14585 8.91028 2.55996V5.97452C8.91028 7.38864 7.77402 8.53449 6.37176 8.53449H2.98579C1.58352 8.53449 0.447266 7.38864 0.447266 5.97452V2.55996C0.447266 1.14585 1.58352 0 2.98579 0ZM2.98579 11.4655H6.37176C7.77402 11.4655 8.91028 12.6114 8.91028 14.0255V17.44C8.91028 18.8532 7.77402 20 6.37176 20H2.98579C1.58352 20 0.447266 18.8532 0.447266 17.44V14.0255C0.447266 12.6114 1.58352 11.4655 2.98579 11.4655ZM17.9087 11.4655H14.5228C13.1205 11.4655 11.9843 12.6114 11.9843 14.0255V17.44C11.9843 18.8532 13.1205 20 14.5228 20H17.9087C19.311 20 20.4473 18.8532 20.4473 17.44V14.0255C20.4473 12.6114 19.311 11.4655 17.9087 11.4655Z"
                        fill="white" />
                </svg>



                <span>Dashboard</span>
            </a>

            <a href="{{ route('roles.index') }}" class="nav-link {{ Route::is('roles.*') ? 'active' : '' }}">

                <svg class=" {{ Route::is('roles.*') ? 'active_hide' : 'active_show' }}" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
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

                <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg"
                    class=" {{ Route::is('roles.*') ? 'active_show' : 'active_hide' }}">
                    <path opacity="0.4"
                        d="M14.5229 0H17.9089C19.3111 0 20.4474 1.14585 20.4474 2.55996V5.97452C20.4474 7.38864 19.3111 8.53449 17.9089 8.53449H14.5229C13.1206 8.53449 11.9844 7.38864 11.9844 5.97452V2.55996C11.9844 1.14585 13.1206 0 14.5229 0Z"
                        fill="white" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M2.98579 0H6.37176C7.77402 0 8.91028 1.14585 8.91028 2.55996V5.97452C8.91028 7.38864 7.77402 8.53449 6.37176 8.53449H2.98579C1.58352 8.53449 0.447266 7.38864 0.447266 5.97452V2.55996C0.447266 1.14585 1.58352 0 2.98579 0ZM2.98579 11.4655H6.37176C7.77402 11.4655 8.91028 12.6114 8.91028 14.0255V17.44C8.91028 18.8532 7.77402 20 6.37176 20H2.98579C1.58352 20 0.447266 18.8532 0.447266 17.44V14.0255C0.447266 12.6114 1.58352 11.4655 2.98579 11.4655ZM17.9087 11.4655H14.5228C13.1205 11.4655 11.9843 12.6114 11.9843 14.0255V17.44C11.9843 18.8532 13.1205 20 14.5228 20H17.9087C19.311 20 20.4473 18.8532 20.4473 17.44V14.0255C20.4473 12.6114 19.311 11.4655 17.9087 11.4655Z"
                        fill="white" />
                </svg>



                <span>Role Management</span>
            </a>
            <a href="{{ route('orders') }}" class="nav-link {{ Route::is('orders', 'orders.view') ? 'active' : '' }}">

                <svg width="25" height="24" viewBox="0 0 25 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                    class=" {{ Route::is('orders', 'orders.view') ? 'active_hide' : 'active_show' }}">
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

                <svg width="19" height="20" viewBox="0 0 19 20" fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                    class=" {{ Route::is('orders', 'orders.view') ? 'active_show' : 'active_hide' }}">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M18.2668 14.3147L17.4979 8.12007C17.0295 5.90964 15.7038 5 14.44 5H4.28523C3.00373 5 1.63386 5.84597 1.23615 8.12007L0.45842 14.3147C-0.177908 18.8629 2.16413 20 5.22204 20H13.512C16.5611 20 18.8324 18.3535 18.2668 14.3147ZM6.45051 10.1486C5.96241 10.1486 5.56672 9.74131 5.56672 9.23893C5.56672 8.73655 5.96241 8.32929 6.45051 8.32929C6.93862 8.32929 7.3343 8.73655 7.3343 9.23893C7.3343 9.74131 6.93862 10.1486 6.45051 10.1486ZM11.3555 9.23893C11.3555 9.74131 11.7512 10.1486 12.2393 10.1486C12.7274 10.1486 13.1231 9.74131 13.1231 9.23893C13.1231 8.73655 12.7274 8.32929 12.2393 8.32929C11.7512 8.32929 11.3555 8.73655 11.3555 9.23893Z"
                        fill="white" />
                    <path opacity="0.4"
                        d="M14.3274 4.77432C14.3305 4.85189 14.3156 4.92913 14.2838 5H12.8467C12.8189 4.92794 12.8041 4.85153 12.8032 4.77432C12.8032 2.85682 11.2434 1.30238 9.31927 1.30238C7.39515 1.30238 5.83536 2.85682 5.83536 4.77432C5.84854 4.84898 5.84854 4.92535 5.83536 5H4.3634C4.35022 4.92535 4.35022 4.84898 4.3634 4.77432C4.47524 2.10591 6.67851 0 9.35846 0C12.0384 0 14.2417 2.10591 14.3535 4.77432H14.3274Z"
                        fill="white" />

                </svg>

                <span>Orders</span>
            </a>
            <a href="{{ route('customers') }}"
                class="nav-link {{ Route::is('customers', 'customers.view') ? 'active' : '' }}">

                <svg width="25" height="24" viewBox="0 0 25 24" fill="none"
                    class=" {{ Route::is('customers', 'customers.view') ? 'active_hide' : 'active_show' }}"
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


                <svg width="21" height="18" viewBox="0 0 21 18" fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                    class=" {{ Route::is('customers', 'customers.view') ? 'active_show' : 'active_hide' }}">
                    <path
                        d="M7.7966 11.8578C3.83279 11.8578 0.447266 12.4701 0.447266 14.9174C0.447266 17.3667 3.81127 18.0001 7.7966 18.0001C11.7604 18.0001 15.1459 17.3877 15.1459 14.9404C15.1459 12.4912 11.7819 11.8578 7.7966 11.8578Z"
                        fill="white" />
                    <path opacity="0.4"
                        d="M7.79662 9.52482C10.4962 9.52482 12.6596 7.40617 12.6596 4.76241C12.6596 2.11865 10.4962 0 7.79662 0C5.09798 0 2.93359 2.11865 2.93359 4.76241C2.93359 7.40617 5.09798 9.52482 7.79662 9.52482Z"
                        fill="white" />
                    <path opacity="0.4"
                        d="M14.621 4.84873C14.621 6.19505 14.2081 7.45129 13.484 8.4948C13.4087 8.60212 13.4752 8.74682 13.6064 8.76981C13.7884 8.79952 13.9752 8.81773 14.166 8.82156C16.0643 8.87043 17.7678 7.6736 18.2385 5.87116C18.9361 3.19674 16.8891 0.79541 14.2815 0.79541C13.9987 0.79541 13.7277 0.824157 13.4635 0.87686C13.4273 0.884526 13.3882 0.901774 13.3686 0.932437C13.3431 0.971725 13.3617 1.02251 13.3872 1.05605C14.1709 2.13214 14.621 3.44205 14.621 4.84873Z"
                        fill="white" />
                    <path
                        d="M20.2267 12.1694C19.8793 11.444 19.0408 10.9467 17.7649 10.7023C17.1631 10.5586 15.533 10.3545 14.0173 10.3832C13.9948 10.3861 13.9821 10.4014 13.9801 10.411C13.9772 10.4263 13.984 10.4493 14.0134 10.4656C14.714 10.8049 17.4214 12.2805 17.0809 15.3929C17.0662 15.5289 17.1768 15.6439 17.3148 15.6248C17.9811 15.5318 19.6954 15.1706 20.2267 14.0475C20.5212 13.4534 20.5212 12.7635 20.2267 12.1694Z"
                        fill="white" />
                </svg>

                <span>Customers</span>
            </a>
            <a href="{{ route('product') }}" class="nav-link @if (Route::is('product') || Route::is('add.product')) active @endif ">
                <img src="{{ asset('assets/admin/images/svg/Folder.svg') }}"
                    class="@if (Route::is('product') || Route::is('add.product')) active_hide @else active_show @endif " />

                <svg width="20" height="17" viewBox="0 0 20 17" fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                    class="@if (Route::is('product') || Route::is('add.product')) active_show @else active_hide @endif ">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M18.8321 1.54353C19.1521 1.91761 19.3993 2.34793 19.5612 2.81243C19.8798 3.76711 20.0273 4.77037 19.9969 5.77614V11.0292C19.9956 11.4717 19.963 11.9135 19.8991 12.3513C19.7775 13.1241 19.5057 13.8656 19.0989 14.5342C18.9119 14.8571 18.6849 15.1553 18.4231 15.4215C17.2383 16.5089 15.665 17.0749 14.0574 16.9921H5.93061C4.32049 17.0743 2.74462 16.5086 1.55601 15.4215C1.2974 15.1547 1.07337 14.8566 0.889149 14.5342C0.484751 13.8661 0.21869 13.1238 0.1067 12.3513C0.0354894 11.9142 -0.000192693 11.4721 9.42692e-07 11.0292V5.77614C-0.000172448 5.33743 0.0235732 4.89902 0.0711337 4.46288C0.0811349 4.38636 0.096136 4.31109 0.110982 4.23659C0.135731 4.11241 0.160048 3.99038 0.160048 3.86836C0.250307 3.34204 0.414959 2.83116 0.649079 2.35101C1.34261 0.869157 2.76525 0.114919 5.09481 0.114919H14.8754C16.1802 0.0140072 17.4753 0.406805 18.5032 1.21522C18.6215 1.3156 18.7316 1.4254 18.8321 1.54353ZM4.97033 10.5412H15.0355H15.0533C15.2741 10.5507 15.4896 10.4717 15.6517 10.3217C15.8137 10.1716 15.9088 9.96305 15.9157 9.74255C15.9282 9.54874 15.8644 9.35771 15.7379 9.21014C15.5924 9.01184 15.3618 8.89349 15.1155 8.8907H4.97033C4.51365 8.8907 4.14343 9.26017 4.14343 9.71593C4.14343 10.1717 4.51365 10.5412 4.97033 10.5412Z"
                        fill="white" />
                </svg>

                <span>Inventory</span>
            </a>
            <a href="{{ route('settings') }}" class="nav-link {{ Route::is('settings') ? 'active' : '' }}">
                <img src="{{ asset('assets/admin/images/svg/Setting.svg') }}"
                    class=" {{ Route::is('settings') ? 'active_hide' : 'active_show' }}" />

                <svg width="25" height="24" viewBox="0 0 25 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                    class=" {{ Route::is('settings') ? 'active_show' : 'active_hide' }}">
                    <path
                        d="M12.459 14.8302C10.8545 14.8302 9.55664 13.5802 9.55664 12.0102C9.55664 10.4402 10.8545 9.18018 12.459 9.18018C14.0635 9.18018 15.3307 10.4402 15.3307 12.0102C15.3307 13.5802 14.0635 14.8302 12.459 14.8302Z"
                        fill="white" />
                    <path opacity="0.4"
                        d="M21.6774 14.37C21.4832 14.07 21.2073 13.77 20.8496 13.58C20.5635 13.44 20.3795 13.21 20.216 12.94C19.6948 12.08 20.0014 10.95 20.8701 10.44C21.892 9.87 22.219 8.6 21.6263 7.61L20.9416 6.43C20.3591 5.44 19.0816 5.09 18.0699 5.67C17.1706 6.15 16.0158 5.83 15.4946 4.98C15.331 4.7 15.2391 4.4 15.2595 4.1C15.2902 3.71 15.1675 3.34 14.9836 3.04C14.6055 2.42 13.9207 2 13.1645 2H11.7235C10.9775 2.02 10.2928 2.42 9.91467 3.04C9.7205 3.34 9.60808 3.71 9.62852 4.1C9.64896 4.4 9.55698 4.7 9.39347 4.98C8.87227 5.83 7.71746 6.15 6.82836 5.67C5.8064 5.09 4.53917 5.44 3.94644 6.43L3.26172 7.61C2.67921 8.6 3.00624 9.87 4.01797 10.44C4.88664 10.95 5.19322 12.08 4.68225 12.94C4.50851 13.21 4.32456 13.44 4.03841 13.58C3.69095 13.77 3.38436 14.07 3.22085 14.37C2.84272 14.99 2.86316 15.77 3.24129 16.42L3.94644 17.62C4.32456 18.26 5.02971 18.66 5.76552 18.66C6.11299 18.66 6.52177 18.56 6.84879 18.36C7.10428 18.19 7.41087 18.13 7.74812 18.13C8.75986 18.13 9.60808 18.96 9.62852 19.95C9.62852 21.1 10.5687 22 11.7542 22H13.1441C14.3193 22 15.2595 21.1 15.2595 19.95C15.2902 18.96 16.1384 18.13 17.1501 18.13C17.4772 18.13 17.7837 18.19 18.0494 18.36C18.3765 18.56 18.775 18.66 19.1327 18.66C19.8583 18.66 20.5635 18.26 20.9416 17.62L21.657 16.42C22.0249 15.75 22.0555 14.99 21.6774 14.37Z"
                        fill="white" />
                </svg>

                <span>Settings</span>
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

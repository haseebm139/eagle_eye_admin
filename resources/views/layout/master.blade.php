<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
    <title>Eagle Eye | @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('assets/admin/css/intlTelInput.css') }} " />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('assets/admin/css/style.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @yield('style')
</head>

<body>

    @include('admin.partials.navbar')
    <div class="main-content" id="main-content">
        <div class="toggle-btn" id="toggle-btn">
            <img src="{{ asset('assets/admin/images/svg/Home.svg') }} " />
        </div>
        <div class="dashboard-header d-flex align-items-center justify-content-between">
            <h3 id="page-title">@yield('heading')</h3>
            <div class="d-flex align-items-center gap-3">
                <div class="dropdown-container position-relative">
                    <select id="data-category" class="form-control3 d-inline w-auto">
                        <option value="Revenue">Eagle eye</option>
                        <option value="Expenses">This Week</option>
                        <option value="Profit Margin">This Week</option>
                    </select>
                    <span class="dropdown-icon"></span>
                    <!-- Down arrow icon -->
                </div>
                <img src="{{ asset('assets/admin/images/svg/Notification.svg') }}" class="avatar" alt="Avatar" />
            </div>
        </div>
        @yield('content')
    </div>

    <script src="{{ asset('assets/admin/js/intlTelInputWithUtils.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/admin/js/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <link rel="stylesheet" href="{{ asset('assets/admin/css/toastr.min.css') }}" />
    <script src="{{ asset('assets/admin/js/toastr.min.js') }}"></script>

    <script>
        const appUrl = "{{ url('/') }}";;


        var type = "{{ Session::get('type') }}";
        switch (type) {
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;

            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;

            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;

            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;

        }
    </script>

    @yield('script')
    <script></script>

</body>

</html>

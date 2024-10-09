@extends('layout.guest')
@section('title', 'LOGIN')

@section('style')@endsection
@section('content')
    <div class="container-fluid">
        <div class="text-center">
            <div class="row">
                <div class="col bg-alignment d-flex justify-content-center align-items-center">
                    <div class="d-flex justify-content-between align-items-center flex-column inner-alignment">
                        <p class="text-styling">
                            High-Quality <br /> Custom Banners. <br /><span class="thin-text">Fast, Reliable <br />
                                Printing</span>
                        </p>
                        <img src="{{ asset('assets/admin/images/auth/image_726.png') }}" />
                    </div>
                </div>
                <div class="col bg-alignment2">
                    <div class="d-flex flex-column justify-content-center align-items-center inner-alignment2">

                        <div class="layer font-styling">
                            <img src="{{ asset('assets/admin/images/auth/image_715.png') }}" />
                            <h5>Login Credentials</h5>
                            <form id="loginform" action="{{ route('login.process') }}" method="POST">
                                @csrf
                                <div class="inputLayout input-group">
                                    <img src="{{ asset('assets/admin/images/auth/svg/client.svg') }}" />
                                    <input class="login" name="email" id="email" type="email" required
                                        placeholder="Email Address" />
                                </div>
                                <div class="inputLayout input-group">
                                    <img src="{{ asset('assets/admin/images/auth/svg/key.svg') }}" />
                                    <input class="login" type="password" name="password" id="password" required
                                        placeholder="Password" />
                                </div>
                                <div class="d-flex justify-content-between  ">
                                    <div class="d-flex align-items-center justify-content-center gap-2">
                                        <input type="checkbox" />
                                        <p>Keep me login</p>
                                    </div>
                                    <p>Forgot Password?</p>
                                </div>
                                <button class="submit-btn">Login</button>
                                <p>Or continue with</p>

                                <div class="d-flex justify-content-center gap-2 align-items-center">
                                    <a href="{{ route('auth.google') }}">
                                        <img src="{{ asset('assets/admin/images/auth/Group_9.png') }}"
                                            class="socialLinks" />
                                    </a>

                                    {{-- {{ route('auth.facebook') }} --}}
                                    <img src="{{ asset('assets/admin/images/auth/Group_10.png') }}" class="socialLinks" />

                                    <a href="{{ route('auth.facebook') }}"><img
                                            src="{{ asset('assets/admin/images/auth/Group_11.png') }}"
                                            class="socialLinks" /></a>
                                </div>
                                <p>Haven’t Account? <a href="{{ route('register') }}"><span class="bold"> Create a new
                                            account!</span></a></p>
                            </form>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(function() {

            $('#loginform').validate({
                rules: {

                    email: {
                        required: true,
                        email: true,
                    },

                    password: {
                        required: true,
                        minlength: 5,
                    },


                },
                messages: {

                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.input-group').after(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');

                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');

                }
            });
        });
    </script>
@endsection

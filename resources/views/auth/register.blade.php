@extends('layout.guest')
@section('title', 'Register')

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/intlTelInput.css') }}" />

@endsection
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
                    <form id="registrationForm" action="{{ route('register.process') }}" method="POST">
                        @csrf
                        <div class="d-flex flex-column justify-content-center align-items-center inner-alignment2">
                            <div class="layer font-styling">
                                <img src="{{ asset('assets/admin/images/auth/image_715.png') }}" />
                                <h5>Register Now</h5>
                                <div class="inputLayout input-group">
                                    <input class="login" name="name" id="name" placeholder="First Name" required />

                                </div>
                                <div class="inputLayout input-group">
                                    <input class="login" name="last_name" id="last_name" placeholder="Last Name"
                                        required />
                                </div>
                                <div class="inputLayout input-group">
                                    <input class="login" name="email" id="email" placeholder="Email Address"
                                        required />

                                </div>
                                <div class="inputLayout input-group">
                                    <form>
                                        <input class="login" id="phone" name="phone" type="tel" value=""
                                            required />
                                        <!-- <button class="button" id="btn" type="button">Validate</button> -->
                                        <!-- <span id="valid-msg" class="hide"></span>
                                                                                                                                                                                                                                                                                                                                                                                                <span id="error-msg" class="hide"></span> -->
                                    </form>
                                </div>
                                <div class="inputLayout input-group">
                                    <input class="login" name="password" id="password" placeholder="Password"
                                        type="password" required />
                                </div>



                                <div class="inputLayout input-group">
                                    <input class="login" placeholder="Confirm Password" name="confirm_password"
                                        type="password" id="confirm_password" required />

                                </div>


                            </div>
                            <div class="d-flex justify-content-start gap-2 input-group">
                                <div class="d-flex w-100 ">
                                    <input type="checkbox" name="checkbox" id="terms" required />
                                    <p class="m-0 p-0" style="font-size: 13px;">Agree to<span class="bold"> Sign
                                            Profit</span>
                                        Terms and Conditions & Privacy Policy</p>
                                </div>

                            </div>
                            <button type="submit" class="submit-btn">Register</button>


                            <p>Already a member? <a href="{{ route('login') }}"><span class="bold">Login</span></a></p>
                    </form>
                </div>

            </div>
        </div>

    </div>
    </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('assets/admin/js/intlTelInputWithUtils.js') }}"></script>
    <script>
        const input = document.querySelector("#phone");
        const iti = window.intlTelInput(input, {
            // allowDropdown: false,
            // autoPlaceholder: "off",
            // containerClass: "test",
            // countryOrder: ["jp", "kr"],
            // countrySearch: false,
            // customPlaceholder: function(selectedCountryPlaceholder, selectedCountryData) {
            //   return "e.g. " + selectedCountryPlaceholder;
            // },
            // dropdownContainer: document.querySelector('#custom-container'),
            // excludeCountries: ["us"],
            // fixDropdownWidth: false,
            // formatAsYouType: false,
            // formatOnDisplay: false,
            // geoIpLookup: function(callback) {
            //   fetch("https://ipapi.co/json")
            //     .then(function(res) { return res.json(); })
            //     .then(function(data) { callback(data.country_code); })
            //     .catch(function() { callback(); });
            // },
            // hiddenInput: () => "phone_full",
            // i18n: { 'de': 'Deutschland' },
            initialCountry: "us",
            // nationalMode: false,
            // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
            // placeholderNumberType: "MOBILE",
            // showFlags: false,
            // separateDialCode: true,
            // strictMode: true,
            // useFullscreenPopup: true,
            // utilsScript: "/build/js/utils.js", // leading slash (and http-server) required for this to work in chrome
            // validationNumberType: null,
        });
        window.iti = iti; // useful for testing

        const button = document.querySelector("#btn");
        const errorMsg = document.querySelector("#error-msg");
        const validMsg = document.querySelector("#valid-msg");
        const errorMap = ["Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];

        const reset = () => {
            input.classList.remove("error");
            errorMsg.innerHTML = "";
            validMsg.innerHTML = "";
            errorMsg.classList.add("hide");
            validMsg.classList.add("hide");
        };

        const showError = (msg) => {
            input.classList.add("error");
            errorMsg.innerHTML = msg;
            errorMsg.classList.remove("hide");
        };

        // on click button: validate
        // button.addEventListener('click', () => {
        //     reset();
        //     if (!input.value.trim()) {
        //         showError("Required");
        //     } else if (iti.isValidNumber()) {
        //         validMsg.innerHTML = "Valid number: " + iti.getNumber();
        //         validMsg.classList.remove("hide");
        //     } else {
        //         const errorCode = iti.getValidationError();
        //         const msg = errorMap[errorCode] || "Invalid number";
        //         showError(msg);
        //     }
        // });

        // on keyup / change flag: reset
        input.addEventListener('change', reset);
        input.addEventListener('keyup', reset);
    </script>
    <script>
        $(function() {

            $('#registrationForm').validate({
                rules: {
                    name: {
                        required: true,
                    },
                    last_name: {
                        required: true,
                    },
                    email: {
                        required: true,
                        email: true,
                    },
                    phone: {
                        required: true,

                    },
                    password: {
                        required: true,
                        minlength: 5,
                    },
                    confirm_password: {
                        required: true,
                        equalTo: "#password"
                    },
                    checkbox: {
                        required: true, // Rule to ensure checkbox is checked
                    },

                },
                messages: {
                    phone: {
                        required: "Phone number is required.",

                    },
                    checkbox: {
                        required: "You must agree to the Terms and Conditions." // Custom message for checkbox
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.input-group').after(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                    $(element).css('border-color', 'red'); // Set input field border to red
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                    $(element).css('border-color', ''); // Reset border color to default
                }
            });
        });
    </script>
@endsection

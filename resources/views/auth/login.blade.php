<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login V18</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="/images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/css/util.css">
    <link rel="stylesheet" type="text/css" href="/css/main.css">
    <!--===============================================================================================-->
</head>
<body style="background-color: #666666;">

<div class="limiter">
    <div class="container-login100">
        @if ($errors->has('email'))
            <div class="row" style="padding-top:10px;">
                <div class="alert alert-danger background-danger" style="width:100%;padding-top:10px;text-align:center !important">

                    <span   role="alert">{{ $errors->first('email') }}</span>
                </div>
            </div>
                    @endif
        <div class="wrap-login100">
            <form class="login100-form validate-form" method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                @csrf

                <span class="login100-form-title p-b-43">
                                    <img class="img-fluid" src="/images/kokro-yellow.png" alt="Kokrokoo" />

						Admin Login
					</span>


                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <input class="input100 {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus type="text">
                    <span class="focus-input100"></span>
                    <span class="label-input100">Email</span>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                         </span>
                    @endif
                </div>


                <div class="wrap-input100 validate-input" data-validate="Password is required">
                    <input class="input100 form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                    <span class="focus-input100"></span>
                    <span class="label-input100">Password</span>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="flex-sb-m w-full p-t-3 p-b-32">
                    <div class="contact100-form-checkbox">
                        <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="label-checkbox100" for="ckb1">
                            {{ __('Remember Me') }}
                        </label>
                    </div>

                    <div>
                        <a href="{{ route('password.request') }}" class="txt1">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    </div>
                </div>


                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" >
                        {{ __('Login') }}
                    </button>
                </div>

{{--                <div class="text-center p-t-46 p-b-20">--}}
{{--						<span class="txt2">--}}
{{--							or sign up using--}}
{{--						</span>--}}
{{--                </div>--}}

{{--                <div class="login100-form-social flex-c-m">--}}
{{--                    <a href="#" class="login100-form-social-item flex-c-m bg1 m-r-5">--}}
{{--                        <i class="fa fa-facebook-f" aria-hidden="true"></i>--}}
{{--                    </a>--}}

{{--                    <a href="#" class="login100-form-social-item flex-c-m bg2 m-r-5">--}}
{{--                        <i class="fa fa-twitter" aria-hidden="true"></i>--}}
{{--                    </a>--}}
{{--                </div>--}}
            </form>

            <div class="login100-more" style="background-image: url('/images/bg-01.jpg');">
            </div>
        </div>
    </div>
</div>





<!--===============================================================================================-->
<script src="/js/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="/js/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="/js/vendor/bootstrap/js/popper.js"></script>
<script src="/js/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="/js/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="/js/vendor/daterangepicker/moment.min.js"></script>
<script src="/js/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="/js/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="/js/login_page/main.js"></script>

</body>
</html>

































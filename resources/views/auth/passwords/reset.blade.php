<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login V18</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
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
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="background: #E5E5E5 !important;">
    <a class="navbar-brand" href="#">        <img class="img-fluid pull-left" src="/images/kokro-yellow.png" alt="Kokrokoo" />
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">


    </div>
</nav>
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">

            <form class="login100-form validate-form" method="POST" action="{{ route('password.request') }}" aria-label="{{ __('Login') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                @if (session('status'))
                    <div class="alert alert-success " role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <span class="login100-form-title p-b-43" style="padding-top: 80px;">

						Password Reset
					</span>


                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <input class="input100 {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus type="text">
                    <span class="focus-input100"></span>
                    <span class="label-input100">Email</span>

                    @if ($errors->has('email'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                         </span>
                    @endif
                </div>
                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <input class="input100" name="password"  required autofocus type="password">
                    <span class="focus-input100"></span>
                    <span class="label-input100">Password</span>

                    @if ($errors->has('email'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                         </span>
                    @endif
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <input class="input100" name="password_confirmation" required autofocus type="password">
                    <span class="focus-input100"></span>
                    <span class="label-input100">Confirm Password</span>

                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" >
                        {{ __('Reset Password') }}
                    </button>
                </div>

            </form>

            <div class="login100-more">
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









































































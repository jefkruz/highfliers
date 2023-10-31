<!doctype html>
<html lang="en" dir="ltr">
<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="HighFliers">
    <meta name="author" content="SHighFliers">
    <meta name="keywords" content="HighFliers">

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('favicon.ico')}}" />

    <!-- TITLE -->
    <title>High Fliers</title>

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />

    <!-- STYLE CSS -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/css/skin-modes.css')}}" rel="stylesheet" />

    <!--- FONT-ICONS CSS -->
    <link href="{{asset('assets/css/icons.css')}}" rel="stylesheet"/>

</head>

<body class="ltr login-img">

{{--<!-- GLOABAL LOADER -->--}}
{{--<div id="global-loader">--}}
{{--    <img src="{{asset('images/loader.svg')}}" class="loader-img" alt="Loader">--}}
{{--</div>--}}
{{--<!-- /GLOABAL LOADER -->--}}

<!-- PAGE -->
<div class="page">
    <div>
        <!-- CONTAINER OPEN -->
        <div class="col col-login mx-auto text-center">
            <a href="index.html" class="text-center">
                <img src="{{asset('images/logo.png')}}" class="header-brand-img" alt="">
            </a>
        </div>
        <div class="container-login100">
            <div class="wrap-login100 p-0">
                <div class="card-body">
                    <form class="login100-form validate-form">
                        @csrf
									<span class="login100-form-title">
										Login as Staff
									</span>
                        <div class="wrap-input100 validate-input" >
                            <input class="input100" type="text" name="email" placeholder="Staff Portal ID">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
											<i class="zmdi zmdi-email" aria-hidden="true"></i>
										</span>
                        </div>
                        <div class="wrap-input100 validate-input" data-bs-validate = "Staff Portal Password">
                            <input class="input100" type="password" name="pass" placeholder="Staff Portal Password">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
											<i class="zmdi zmdi-lock" aria-hidden="true"></i>
										</span>
                        </div>

                        <div class="container-login100-form-btn">
                            <button type="submit" class="login100-form-btn text-bold btn-primary-light">
                               Staff Login
                            </button>
                        </div>

                    </form>
                </div>
                <div class="card-footer">

                    <div class="d-flex justify-content-center ">
                        <div class="container-login100-form-btn">
                            <a href="{{route('login')}}" class="login100-form-btn text-bold btn-success-light">
                                Administrative Login
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- CONTAINER CLOSED -->
    </div>
</div>
<!-- End PAGE -->


<!-- BACKGROUND-IMAGE CLOSED -->

<!-- JQUERY JS -->
<script src="{{asset('assets/js/jquery.min.js')}}"></script>

<!-- BOOTSTRAP JS -->
<script src="{{asset('assets/plugins/bootstrap/js/popper.min.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

<!-- Perfect SCROLLBAR JS-->
<script src="{{asset('assets/plugins/p-scroll/perfect-scrollbar.js')}}"></script>

<!-- STICKY JS -->
<script src="{{asset('assets/js/sticky.js')}}"></script>

<!-- COLOR THEME JS -->
<script src="{{asset('assets/js/themeColors.js')}}"></script>

</body>
</html>

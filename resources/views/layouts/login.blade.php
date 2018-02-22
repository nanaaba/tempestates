<!DOCTYPE html>
<html>

    <head>
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="img/favicon.ico"/>
        <!-- Bootstrap -->
        <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
        <!-- end of bootstrap -->
        <!--page level css -->
        <link type="text/css" href="{{asset('vendors/themify/css/themify-icons.css')}}" rel="stylesheet"/>
        <link href="{{asset('vendors/iCheck/css/all.css')}}" rel="stylesheet">
        <link href="{{asset('vendors/bootstrapvalidator/css/bootstrapValidator.min.css')}}" rel="stylesheet"/>
        <link href="{{asset('css/login.css')}}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{asset('vendors/sweetalert2/css/sweetalert2.min.css')}}"/>
        <link rel="stylesheet" type="text/css" href="{{asset('css/custom_css/sweet_alert2.css')}}">

        <!--end page level css-->
    </head>




    <body id="sign-in">
        <div class="preloader">
            <div class="loader_img"><img src="img/loader.gif" alt="loading..." height="64" width="64"></div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-10 col-sm-8 mx-auto login-form">

                    <h2 class="text-center logo_h2">
                        ROTAMAC
                    </h2>



                    @yield('content')

                </div>
            </div>
        </div>
        <!-- global js -->

        <!-- end of page level js -->

        <script src="{{asset('js/jquery.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/popper.min.js')}}" type="text/javascript"></script>

        <script src="{{asset('js/bootstrap.min.js')}}" type="text/javascript"></script>
        <!-- end of global js -->
        <!-- page level js -->
        <script type="text/javascript" src="{{asset('vendors/iCheck/js/icheck.js')}}"></script>
        <script src="{{asset('vendors/bootstrapvalidator/js/bootstrapValidator.min.js')}}" type="text/javascript"></script>
        <script type="text/javascript" src="{{asset('js/custom_js/login.js')}}"></script>
        <script type="text/javascript" src="{{ asset('vendors/sweetalert2/js/sweetalert2.min.js')}}"></script>
        @yield('loginjs')

    </body>

</html>

</html>

<!-- Localized -->
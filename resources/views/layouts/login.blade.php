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
        <link href="{{asset('vendors/bootstrapvalidator/css/bootstrapValidator.css')}}" rel="stylesheet"/>
        <link href="{{asset('css/login.css')}}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{asset('vendors/sweetalert2/css/sweetalert2.min.css')}}"/>
        <link rel="stylesheet" type="text/css" href="{{asset('css/custom_css/sweet_alert2.css')}}">

        <!--end page level css-->
    </head>

    <body id="sign-in">
        @yield('content')
        <!-- global js -->
        <!-- BEGIN VENDOR JS-->
        <!-- global js -->
        <script src="{{asset('js/jquery.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/bootstrap.min.js')}}" type="text/javascript"></script>
        <!-- end of global js -->
        <!-- page level js -->
        <script type="text/javascript" src="{{asset('vendors/iCheck/js/icheck.js')}}"></script>
        <script src="{{asset('vendors/bootstrapvalidator/js/bootstrapValidator.min.js')}}" type="text/javascript"></script>
        <script type="text/javascript" src="{{asset('js/custom_js/login.js')}}"></script>
        <script type="text/javascript" src="{{ asset('vendors/sweetalert2/js/sweetalert2.min.js')}}"></script>

        <!-- end of page level js -->
        @yield('loginjs')
    </body>

</html>

<!-- Localized -->
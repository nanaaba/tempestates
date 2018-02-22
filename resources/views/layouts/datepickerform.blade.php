<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">


        <meta name="_token" content="{{ csrf_token() }}">

        <title>Rotamach</title>
        <link type="text/css" href="{{ asset('css/app.css')}}" rel="stylesheet"/>
        <!-- end of global css -->
        <!--page level css-->
        <!-- end of global css -->
        <!--page level css -->
        <!-- daterange picker -->
        <link href="{{ asset('vendors/daterangepicker/css/daterangepicker.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('vendors/datetimepicker/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet"/>
        <link rel="stylesheet" type="text/css" href="{{ asset('vendors/datedropper/datedropper.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('vendors/timedropper/css/timedropper.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('vendors/jquerydaterangepicker/css/daterangepicker.min.css')}}">
        <!--clock face css-->
        <link rel="stylesheet" type="text/css" href="{{ asset('vendors/clockpicker/css/bootstrap-clockpicker.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css')}}">

        <link rel="stylesheet" type="text/css" href="{{ asset('css/datepicker.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/custom_css/invoice.css')}}">
        <link href="{{asset('vendors/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('vendors/select2/css/select2-bootstrap.css')}}" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{ asset('vendors/animate/animate.min.css')}}"/>
        <link rel="stylesheet" href="{{ asset('vendors/pnotify/css/pnotify.css')}}">
        <link href="{{ asset('vendors/pnotify/css/pnotify.brighttheme.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('vendors/pnotify/css/pnotify.buttons.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('vendors/pnotify/css/pnotify.mobile.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('vendors/pnotify/css/pnotify.history.css')}}" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/custom_css/toastr_notificatons.css')}}">


        <link rel="stylesheet" type="text/css" href="{{asset('vendors/datatables/css/dataTables.bootstrap4.css')}}"/>
        <link rel="stylesheet" type="text/css" href="{{asset('vendors/datatables/css/buttons.bootstrap.css')}}"/>
        <link rel="stylesheet" type="text/css" href="{{asset('vendors/datatables/css/colReorder.bootstrap.css')}}"/>
        <!--        <link rel="stylesheet" type="text/css" href="{{asset('vendors/datatables/css/dataTables.bootstrap.css')}}"/>-->
        <link rel="stylesheet" type="text/css" href="{{asset('vendors/datatables/css/rowReorder.bootstrap.css')}}"/>
        <link rel="stylesheet" type="text/css" href="{{asset('vendors/datatables/css/scroller.bootstrap.css')}}">
        <!--        <link rel="stylesheet" type="text/css" href="{{asset('css/custom_css/advanced_datatables.css')}}"/>-->
    </head>
    <body class="skin-default">
        <div class="preloader">
            <div class="loader_img"><img src="{{asset('img/loader.gif')}}" alt="loading..." height="64" width="64"></div>
        </div>
        @include('layouts.header')
        <div class="wrapper row-offcanvas row-offcanvas-left">
            @include('layouts.nav')



            @yield('content')

        </div>

        <!-- InputMask -->
        <script src="{{ asset('js/app.js')}}" type="text/javascript"></script>

        <script src="{{ asset('vendors/moment/js/moment.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('vendors/inputmask/inputmask/inputmask.js')}}" type="text/javascript"></script>
        <script src="{{ asset('vendors/inputmask/inputmask/jquery.inputmask.js')}}" type="text/javascript"></script>
        <script src="{{ asset('vendors/inputmask/inputmask/inputmask.date.extensions.js')}}" type="text/javascript"></script>
        <script src="{{ asset('vendors/inputmask/inputmask/inputmask.extensions.js')}}" type="text/javascript"></script>
        <!-- date-range-picker -->
        <script src="{{ asset('vendors/daterangepicker/js/daterangepicker.js')}}" type="text/javascript"></script>
        <!-- bootstrap time picker -->
        <script src="{{ asset('vendors/datetimepicker/js/bootstrap-datetimepicker.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('vendors/clockpicker/js/bootstrap-clockpicker.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('vendors/datedropper/datedropper.js')}}" type="text/javascript"></script>
        <script src="{{ asset('vendors/timedropper/js/timedropper.js')}}" type="text/javascript"></script>
        <script src="{{ asset('vendors/datetime/js/jquery.datetimepicker.full.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('js/custom_js/datepickers.js')}}" type="text/javascript"></script>
        <script src="{{asset('vendors/bootstrap-multiselect/js/bootstrap-multiselect.js')}}" type="text/javascript"></script>
        <script src="{{asset('vendors/select2/js/select2.js')}}" type="text/javascript"></script>
        <script type="text/javascript" src="{{asset('vendors/pnotify/js/pnotify.js')}}"></script>
        <script type="text/javascript" src="{{asset('vendors/pnotify/js/pnotify.animate.js')}}"></script>
        <script type="text/javascript" src="{{asset('vendors/pnotify/js/pnotify.buttons.js')}}"></script>
        <script type="text/javascript" src="{{asset('vendors/pnotify/js/pnotify.confirm.js')}}"></script>
        <script type="text/javascript" src="{{asset('vendors/pnotify/js/pnotify.nonblock.js')}}"></script>
        <script type="text/javascript" src="{{asset('vendors/pnotify/js/pnotify.mobile.js')}}"></script>
        <script type="text/javascript" src="{{asset('vendors/pnotify/js/pnotify.desktop.js')}}"></script>
        <script type="text/javascript" src="{{asset('vendors/pnotify/js/pnotify.history.js')}}"></script>
        <script type="text/javascript" src="{{asset('vendors/pnotify/js/pnotify.callbacks.js')}}"></script>
        <script src="{{asset('js/custom_js/notifications.js')}}"></script>
        <script src="{{asset('js/jquery.printElement.min.js')}}"></script>

<!--        <script type="text/javascript" src="{{asset('vendors/datatables/js/jquery.dataTables.js')}}"></script>
        <script type="text/javascript" src="{{asset('vendors/datatables/js/dataTables.bootstrap4.js')}}"></script>
        <script type="text/javascript" src="{{asset('vendors/datatables/js/dataTables.buttons.js')}}"></script>
        <script type="text/javascript" src="{{asset('vendors/datatables/js/dataTables.colReorder.js')}}"></script>
        <script type="text/javascript" src="{{asset('vendors/datatables/js/dataTables.responsive.js')}}"></script>
        <script type="text/javascript" src="{{asset('vendors/datatables/js/dataTables.rowReorder.js')}}"></script>
        <script type="text/javascript" src="{{asset('vendors/datatables/js/buttons.colVis.js')}}"></script>
        <script type="text/javascript" src="{{asset('vendors/datatables/js/buttons.html5.js')}}"></script>
        <script type="text/javascript" src="{{asset('vendors/datatables/js/buttons.bootstrap.js')}}"></script>
        <script type="text/javascript" src="{{asset('vendors/datatables/js/buttons.print.js')}}"></script>
        <script type="text/javascript" src="{{asset('vendors/datatables/js/dataTables.scroller.js')}}"></script>
        <script src="{{asset('js/custom_js/advanced_datatables.js')}}" type="text/javascript"></script>
        -->



        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js" type="text/javascript"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.bootstrap4.min.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js" type="text/javascript"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js" type="text/javascript"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js" type="text/javascript"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.colVis.min.js" type="text/javascript"></script>
        <script src="{{ asset('vendors/jquerydaterangepicker/js/jquery.daterangepicker.min.js')}}" type="text/javascript"></script>

        <script type="text/javascript">
$('.select2').select2();

        </script>
        @yield('userjs')

    </body>
</html>
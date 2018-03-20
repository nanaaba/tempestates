<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">



        <title>Rotamach</title>
        <link type="text/css" href="{{ asset('css/app.css')}}" rel="stylesheet"/>
        <!-- end of global css -->
        <!--page level css-->
        <link href="{{ asset('vendors/jasny-bootstrap/css/jasny-bootstrap.css')}}" type="text/css" rel="stylesheet">
        <link href="{{asset('vendors/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('vendors/select2/css/select2-bootstrap.css')}}" rel="stylesheet" type="text/css">
        <link href="{{ asset('vendors/bootstrapvalidator/css/bootstrapValidator.min.css')}}" type="text/css" rel="s        tylesheet">
        <link href="{{ asset('vendors/datetimepicker/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet">
        <link href="{{ asset('vendors/iCheck/css/all.css')}}" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css" href="{{asset('css/custom_css/sweet_alert2.css')}}">

        <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css')}}">
        <link href="{{ asset('css/custom_css/wizard.css')}}" type="text/css" rel="stylesheet">


        <link rel="stylesheet" href="{{ asset('vendors/animate/animate.min.css')}}"/>
        <link rel="stylesheet" href="{{ asset('vendors/pnotify/css/pnotify.css')}}">
        <link href="{{ asset('vendors/pnotify/css/pnotify.brighttheme.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('vendors/pnotify/css/pnotify.buttons.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('vendors/pnotify/css/pnotify.mobile.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('vendors/pnotify/css/pnotify.history.css')}}" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/custom_css/toastr_notificatons.css')}}">
        <link href="{{ asset('vendors/datetime/css/jquery.datetimepicker.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('vendors/airdatepicker/css/datepicker.min.css')}}" rel="stylesheet"/>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/datepicker.css')}}">

    </head>
    <body class="skin-default">
        <div class="preloader">
            <div class="loader_img"><img src="{{asset('img/loader.gif')}}" alt="loading..." height="64" width="64"></div>
        </div>
        <header class="header">
            @include('layouts.header2')
        </header>        <div class="wrapper row-offcanvas row-offcanvas-left">
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar-->
                <section class="sidebar">
                    <div id="menu" role="navigation">
                        @include('layouts.leftmenu')
                    </div>
                    <!-- menu -->
                </section>
                <!-- /.sidebar -->
            </aside>


            @yield('content')

        </div>

        <div class="modal" id="loaderModal" data-keyboard="false" data-backdrop="static" role="dialog" >
            <div class="modal-dialog" role="document">


                <div  id="loader" style="margin-top:30% ">
                    <i class="fa fa-spinner fa-pulse fa-5x fa-fw"></i>
                    <span class="loader-text">Wait...</span>
                </div>


            </div>

        </div>
       


        <div class="modal " id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form method="post" id="deleteForm">
                        <div class="modal-body">
                            <div>
                                <p>
                                    Are you sure you want to delete?.<span class="holder" id="holdername"></span> 
                                </p>
                            </div>
                            <input type="hidden" class="form-control form-control-lg input-lg" id="token" name="_token" value="<?php echo csrf_token() ?>" />

                            <input type="hidden" id="code" name="code"/>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                            <button type="submit"  class="btn btn-primary">YES</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    
          <script src="{{ asset('js/app.js')}}" type="text/javascript"></script>
        <!-- end of global js -->
        <!-- begining of page level js -->
        <script src="{{ asset('vendors/moment/js/moment.min.js')}}"></script>
        <script src="{{ asset('vendors/datetime/js/jquery.datetimepicker.full.min.js')}}" type="text/javascript"></script>
        <!-- bootstrap time picker -->
        <script src="{{ asset('vendors/airdatepicker/js/datepicker.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('vendors/airdatepicker/js/datepicker.en.js')}}" type="text/javascript"></script>
        <script src="{{ asset('js/custom_js/advanceddate_pickers.js')}}" type="text/javascript"></script>

        <script src="{{ asset('vendors/jasny-bootstrap/js/jasny-bootstrap.js')}}" type="text/javascript"></script>
        <script src="{{asset('vendors/bootstrap-multiselect/js/bootstrap-multiselect.js')}}" type="text/javascript"></script>
        <script src="{{asset('vendors/select2/js/select2.js')}}" type="text/javascript"></script>
        <script src="{{ asset('vendors/bootstrapwizard/js/jquery.bootstrap.wizard.js')}}" type="text/javascript"></script>
        <script src="{{ asset('vendors/bootstrapvalidator/js/bootstrapValidator.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('vendors/datetimepicker/js/bootstrap-datetimepicker.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('vendors/iCheck/js/icheck.js')}}"></script>
        <script src="{{asset('js/custom_js/custom_elements.js')}}" type="text/javascript"></script>
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
        @yield('userjs')

    </body>
</html>
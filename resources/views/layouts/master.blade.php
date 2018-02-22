<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">



        <title>Rotamach</title>
        <link type="text/css" rel="stylesheet" href="{{ asset('css/app.css')}}"/>
        <link type="text/css" rel="stylesheet" href="{{ asset('vendors/iCheck/css/all.css')}}"/>
        <!-- end of global css -->
        <!--page level css -->
        
        
        <link rel="stylesheet" href="{{ asset('vendors/swiper/css/swiper.min.css')}}">
        <link href="{{ asset('vendors/nvd3/css/nv.d3.min.css')}}" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{asset('vendors/lcswitch/css/lc_switch.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/custom.css')}}">
        <link href="{{asset('css/custom_css/dashboard1.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('css/custom_css/dashboard1_timeline.css')}}" rel="stylesheet"/>
        <link rel="stylesheet" type="text/css" href="{{asset('css/custom.css')}}">
        <!--end of page level css-->
        <link href="{{asset('vendors/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('vendors/select2/css/select2-bootstrap.css')}}" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="{{asset('css/custom_css/toastr_notificatons.css')}}">

        <link rel="stylesheet" type="text/css" href="{{asset('vendors/datatables/css/dataTables.bootstrap.css')}}"/>

        <link rel="stylesheet" type="text/css" href="{{asset('css/custom_css/datatables_custom.css')}}">
        <!--end of page level css-->
        <link rel="stylesheet" type="text/css" href="{{asset('vendors/sweetalert2/css/sweetalert2.min.css')}}"/>
        <link rel="stylesheet" type="text/css" href="{{asset('css/custom_css/sweet_alert2.css')}}">
        <!--        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css')}}">-->

        <link rel="stylesheet" type="text/css" href="{{asset('css/form_layouts.css')}}">
        <link rel="stylesheet" href="{{asset('vendors/blueimp-gallery-with-desc/css/blueimp-gallery.min.css')}}"/>
        <!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
        <link rel="stylesheet" href="{{asset('vendors/blueimp-file-upload/css/jquery.fileupload.css')}}"/>
        <link rel="stylesheet" href="{{asset('vendors/blueimp-file-upload/css/jquery.fileupload-ui.css')}}"/>
        <link rel="stylesheet" href="{{asset('vendors/dropify/css/dropify.css')}}">
        <!-- CSS adjustments for browsers with JavaScript disabled -->
        <noscript>
        <link rel="stylesheet" href="{{asset('vendors/blueimp-file-upload/css/jquery.fileupload-noscript.css')}}"/>
        <link rel="stylesheet" href="{{asset('vendors/blueimp-file-upload/css/jquery.fileupload-ui-noscript.css')}}"/>
        </noscript>
        <link rel="stylesheet" type="text/css" href="{{asset('css/custom_css/multiplefile_upload.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/custom_css/widgets.css')}}">

        <link rel="stylesheet" type="text/css" href="{{asset('vendors/gridforms/css/gridforms.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/complex_forms.css')}}">
        <link rel="stylesheet" href="{{asset('vendors/laddabootstrap/css/ladda-themeless.min.css')}}">
        <link href="{{asset('css/buttons_sass.css')}}" rel="stylesheet">
        <link href="{{asset('css/advbuttons.css')}}" rel="stylesheet">


        <link rel="stylesheet" type="text/css" href="{{asset('css/custom_css/invoice.css')}}">

        <link href="{{ asset('vendors/datetime/css/jquery.datetimepicker.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('vendors/airdatepicker/css/datepicker.min.css')}}" rel="stylesheet"/>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/datepicker.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('vendors/datatables/css/dataTables.bootstrap4.css')}}"/>
        <link rel="stylesheet" type="text/css" href="{{asset('vendors/datatables/css/buttons.bootstrap.css')}}"/>
        <link rel="stylesheet" type="text/css" href="{{asset('vendors/datatables/css/colReorder.bootstrap.css')}}"/>
        <!--        <link rel="stylesheet" type="text/css" href="{{asset('vendors/datatables/css/dataTables.bootstrap.css')}}"/>-->
        <link rel="stylesheet" type="text/css" href="{{asset('vendors/datatables/css/rowReorder.bootstrap.css')}}"/>
        <link rel="stylesheet" type="text/css" href="{{asset('vendors/datatables/css/scroller.bootstrap.css')}}">
        <link href="{{asset('css/custom_css/chartjs-charts.css')}}" rel="stylesheet" type="text/css">
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

        <div class="modal fade" id="loaderModal" data-keyboard="false" data-backdrop="static" role="dialog" >
            <div class="modal-dialog" role="document">


                <div  id="loader" style="margin-top:30% ">
                    <img src="{{ asset('img/load.gif')}}">

                    <span class="loader-text">Filtering Results...</span>
                </div>


            </div>
        </div>


        <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
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


        <div class="modal fade" id="messageDetail" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>


                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <!--5th tab bank application starting-->
                            <div class="col-lg-12">
                                <form class="grid-form">
                                    <div class="text-center">
        <!--                                        <img src="img/pages/complexform1.png" alt="bank name" width="200">-->
                                        <h3>Message Detail</h3>
                                    </div>
                                    <fieldset>
                                        <legend>Details</legend>
                                        <div data-row-span="1">
                                            <div data-field-span="1" class="" style="height: auto;">
                                                <label>Sender Name</label>
                                                <label id="sender"> </label>
        <!--                                                <input type="text" readonly id="sender">-->
                                            </div>
                                        </div>
                                        <div data-row-span="1">
                                            <div data-field-span="1" class="" style="height: auto;">
                                                <label>Recipients </label>
                                                <label id="receipients"> </label>
        <!--                                                <input type="text" readonly id="receipients">-->
                                            </div>
                                        </div>

                                        <div data-row-span="1">
                                            <div data-field-span="1" class="" style="height: auto;">
                                                <label>Subject </label>
                                                <label id="subject"> </label>
        <!--                                                <input type="text" readonly id="subject">-->
                                            </div>
                                        </div>
                                        <div data-row-span="1">
                                            <div data-field-span="1" class="" style="height: auto;">
                                                <label>Date Sent: </label>
                                                <label id="date_sent"></label>
        <!--                                                <input type="text" readonly id="date_sent">-->
                                            </div>
                                        </div>

                                        <div data-row-span="1">
                                            <div data-field-span="1" style="height: auto;">
                                                <label>Message</label>
                                                <label id="messageContent">
                                                    I/We confirm having read and understood the account
                                                    rules of The Banking Corporation Limited ('the Bank'), and hereby agree to be
                                                    bound by the terms and conditions and amendments governing the account(s) issued
                                                    by the Bank from time-to-time.</label>
                                            </div>
                                        </div>

                                        <div data-row-span="1">
                                            <div data-field-span="1" class="" style="height: auto;">
                                                <label>Attachments: </label>
                                                <div id="fileattacments">

                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>

                                </form>
                            </div>
                        </div>


                    </div>

                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

        @include('layouts.footer')
        @yield('dashboard')
        @yield('userjs')

    </body>
</html>
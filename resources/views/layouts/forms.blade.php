<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">


        <meta name="_token" content="{{ csrf_token() }}">

        <title>GroundTouch</title>
        <link type="text/css" href="{{ asset('css/app.css')}}" rel="stylesheet"/>
        <!-- end of global css -->
        <!--page level css-->
        <link href="{{ asset('vendors/jasny-bootstrap/css/jasny-bootstrap.css')}}" type="text/css" rel="stylesheet">
        <link href="{{asset('vendors/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('vendors/select2/css/select2-bootstrap.css')}}" rel="stylesheet" type="text/css">
        <link href="{{ asset('vendors/bootstrapvalidator/css/bootstrapValidator.min.css')}}" type="text/css" rel="s        tylesheet">
        <link href="{{ asset('vendors/datetimepicker/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet">
        <link href="{{ asset('vendors/iCheck/css/all.css')}}" rel="stylesheet" type="text/css"/>

        <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css')}}">
        <link href="{{ asset('css/custom_css/wizard.css')}}" type="text/css" rel="stylesheet">
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

        <div class="modal fade" id="loaderModal" data-keyboard="false" data-backdrop="static" role="dialog" >
            <div class="modal-dialog" role="document">


                <div  id="loader" style="margin-top:30% ">
                    <img src="{{ asset('img/load.gif')}}">

                    <span class="loader-text">Filtering Results...</span>
                </div>


            </div>
        </div>

        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="exampleModalLabel">Update </h4>
                    </div>
                    <form id="updateForm" >
                        <div class="modal-body">
                            <input type="hidden" class="form-control form-control-lg input-lg"  name="_token" value="<?php echo csrf_token() ?>" />

                            <div class="form-group">
                                <label for="region" class="control-label">Name:</label>
                                <input type="text" class="form-control" name="name" id="updategroupName" required>
                            </div>

                            <input type="hidden" class="form-control" name="code" id="code">


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
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
                                    Are you sure you want to delete this email group ?.<span class="holder" id="holdername"></span> 
                                </p>

                            </div>
                            <input type="hidden" class="form-control form-control-lg input-lg" id="token" name="_token" value="<?php echo csrf_token() ?>" />

                            <input type="hidden" id="deletedid" name="id"/>


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
        <script src="{{ asset('vendors/jasny-bootstrap/js/jasny-bootstrap.js')}}" type="text/javascript"></script>
        <script src="{{asset('vendors/bootstrap-multiselect/js/bootstrap-multiselect.js')}}" type="text/javascript"></script>
        <script src="{{asset('vendors/select2/js/select2.js')}}" type="text/javascript"></script>
        <script src="{{ asset('vendors/bootstrapwizard/js/jquery.bootstrap.wizard.js')}}" type="text/javascript"></script>
        <script src="{{ asset('vendors/bootstrapvalidator/js/bootstrapValidator.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('vendors/datetimepicker/js/bootstrap-datetimepicker.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('vendors/iCheck/js/icheck.js')}}"></script>
        <script src="{{ asset('js/custom_js/adduser.js')}}" type="text/javascript"></script>

        <script type="text/javascript">
      $('.select2').select2();

        </script>
    </body>
</html>
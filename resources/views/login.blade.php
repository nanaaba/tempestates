@extends('layouts.login')

@section('content')




<div class="preloader">
    <div class="loader_img"><img src="img/loader.gif" alt="loading..." height="64" width="64"></div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1 login-form">
            <div class="panel-header">
                <h2 class="text-center">
<!--                    <img src="img/pages/clear_black.png" alt="Logo">-->
                    GROUNDTOUCH
                </h2>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12" id="parent">
                        <form  id="loginForm" method="post" class="login_validator">
                            <input type="hidden" class="form-control form-control-lg input-lg"  name="_token" value="<?php echo csrf_token() ?>" />

                            <div class="form-group">
                                <label for="email" class="sr-only"> E-mail</label>
                                <input type="email" class="form-control  form-control-lg" id="email" name="email"
                                       placeholder="E-mail" >
                            </div>
                            <div class="form-group">
                                <label for="password" class="sr-only">Password</label>
                                <input type="password" class="form-control form-control-lg" id="password"
                                       name="password" placeholder="Password" >
                            </div>

                            <div class="form-group">
                                <input type="submit" value="Sign In" class="btn btn-primary btn-block sign_in"/>

                            </div>               


<!--                            <span class="pull-right sign-up">
                                <a href="forgot_password.html" id="forgot" class="forgot"> Forgot Password ? </a>
                            </span>-->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="fill_modal" class="modal fade animated" data-backdrop="static" data-keyboard="false"  role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title">Change Password</h4>
                </div>
                <form  id="changePasswordForm" method="post"  class="login_validator">
                    <input type="hidden" class="form-control form-control-lg input-lg"  name="_token" value="<?php echo csrf_token() ?>" />

                    <div class="modal-body">
                        <input type="hidden" name="type" value="changepassword"/>
                        <div class="form-group">
                            <label for="email" class="sr-only"> New Password</label>
                            <input type="password" class="form-control  form-control-lg" name="password"
                                   required>
                        </div>
                        <div class="form-group">
                            <label for="password" class="sr-only">Confirm Password</label>
                            <input type="password"  class="form-control form-control-lg" 
                                   name="confirmPassword" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="form-group">
                            <input type="submit" value="Chane Password" class="btn btn-primary btn-block sign_in"/>

                        </div>               
                    </div>


                </form>


            </div>
        </div>
    </div>

</div>


@endsection

@section('loginjs')

<script src="{{ asset('js/custom_js/login.js')}}" type="text/javascript"></script>

@endsection
@extends('layouts.login')

@section('content')




<div class="card-body">
    <div class="row">
        <div class="col-12">
            <form id="loginForm" method="post" class="login_validator">                        
                <input type="hidden" class="form-control form-control-lg input-lg"  name="_token" value="<?php echo csrf_token() ?>" />

                <div class="form-group">
                    <label for="email" class="sr-only"> E-mail</label>
                    <input type="text" class="form-control  " id="email" name="email"
                           placeholder="E-mail">
                </div>
                <div class="form-group">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" class="form-control" id="password"
                           name="password" placeholder="Password">
                </div>
                <div class="form-group checkbox">
                    <label for="remember">
                        <input type="checkbox" name="remember" id="remember">&nbsp; Remember Me
                    </label>
                </div>
                <div class="form-group">
                    <input type="submit" value="Sign In" class="btn btn-primary btn-block"/>
                </div>
                <a href="forgot_password.html" id="forgot" class="forgot"> Forgot Password ? </a>

            </form>
        </div>
    </div>

</div>
@endsection

@section('loginjs')

<script src="{{ asset('js/custom_js/login.js')}}" type="text/javascript"></script>

@endsection
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>AdminLTE 3 | Log in (v2)</title>
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        @section('css')
            {{ Html::style('plugins/fontawesome-free/css/all.min.css') }}
            {{ Html::style('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}
            {{ Html::style('dist/css/adminlte.min.css')  }}
        @show
    </head>
    <body class="hold-transition login-page">
        <!-- /.card-body -->
        <div class="login-box">
            <!-- /.login-logo -->
            <div class="card card-outline card-primary">
                <div class="card-header text-center">
                    <a href="/" class="h1"><b>Admin</b>LTE</a>
                </div>
                <div class="card-body">
                    <p class="login-box-msg">Sign in to start your session</p>
                    {{ Form::open(['action' => ['Auth\LoginController@postLogin'], 'method' => 'POST','class' => 'form-horizontal']) }}
                        <div class="input-group mb-3">
                            {!! Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Email']) !!}
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        @error('email')
                            <div class="text-danger mt--10">{{ $message }}</div>
                        @enderror
                        <div class="input-group mb-3">
                            {{ Form::password('password', array('id' => 'password', "class" => "form-control", 'placeholder' => 'password')) }}
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        @error('password')
                            <div class="text-danger mt--10">{{ $message }}</div>
                        @enderror
                        <div class="row">
                            <div class="col-8">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="remember">
                                    <label for="remember">
                                    Remember Me
                                    </label>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    {!! Form::close() !!}
                    <div class="social-auth-links text-center mt-2 mb-3">
                        <a href="#" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                        </a>
                        <a href="#" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                        </a>
                    </div>
                    <!-- /.social-auth-links -->
                    <p class="mb-1">
                        <a href="forgot-password.html">I forgot my password</a>
                    </p>
                    <p class="mb-0">
                        <a href="register.html" class="text-center">Register a new membership</a>
                    </p>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.login-box -->
        <!-- jQuery -->
        @section('headerscript')
            {{ Html::script('lugins/jquery/jquery.min.js') }}
            {{ Html::script('plugins/bootstrap/js/bootstrap.bundle.min.js') }}
            {{ Html::script('dist/js/adminlte.min.js') }}
        @show
    </body>
</html>

@extends('layouts.auth.masterauth')

@section('title', 'Forget Password')
@section('content')
<div class="login-page">
    <div class="overlay"></div>
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b></b></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>

                <!-- <form action="{{ route('forgot') }}" method="post"> -->
                <form action="{{route('password.email') }}" method="post">
                @csrf
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Request new password</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <p class="mt-3 mb-1">
                    <a href="/login">Login</a>
                </p>
                <p class="mb-0">
                    <a href="/register" class="text-center">Register a new membership</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
        <div class="login-logo">
            <h5 style="color:white">Powered by:</h5>
            <img src="assets/img/logo-ug.png" class="power" alt="">
        </div>
    </div>
    <!-- /.login-box -->
</div>
@stop
<!-- 
<form action="" method="post">
<div class="form-group">
            <label for="emailPengguna">Email</label>
            <input type="email" name="email" class="form-control" id="emailPengguna" aria-describedby="emailHelp" placeholder="">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" id="password" aria-describedby="emailHelp" placeholder="">
        </div>
        <a href="/register">Mau Daftar?</a>
        <div>
            <button type="submit" class="btn btn-primary">Login</button>
        </div>
</form> -->
@extends('layouts.auth.masterauth')

@section('title', 'Login')
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
        <div class="register-logo">
            <img src="{{url('/')}}/assets/spk/img/core-img/logo.png" alt="logo-web" class="logo-login-web">
        </div>
        <p class="login-box-msg">Sign in to start your session</p>

        <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="input-group mb-3">
            <input type="email" name="email" class="form-control" id="emailPengguna" aria-describedby="emailHelp" placeholder="Email">
            <div class="input-group-append">
                <div class="input-group-text">
                <span class="fas fa-envelope"></span>
                </div>
            </div>
            </div>
            <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" id="password" aria-describedby="emailHelp" placeholder="Password">
            <div class="input-group-append">
                <div class="input-group-text">
                <span class="fas fa-lock"></span>
                </div>
            </div>
            </div>
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
        </form>

        <p class="mb-1">
            <a href="/forgot_password">I forgot my password</a>
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
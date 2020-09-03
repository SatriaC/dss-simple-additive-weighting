@extends('layouts.auth.masterauth')

@section('title', 'Register')

@section('content')
<div class="login-page">
<div class="overlay"></div>
<div class="register-box">

  <div class="card">
    <div class="card-body register-card-body">
        <div class="register-logo">
            <img src="{{url('/')}}/assets/spk/img/core-img/logo.png" alt="logo-web" class="logo-login-web">
        </div>
      <p class="login-box-msg">Register a new membership</p>

      <form action="{{ route('register') }}" method="post">  
        {{csrf_field()}}
        <div class="input-group mb-3">
          <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="namaLengkap" aria-describedby="emailHelp" value="{{ old('name') }}" placeholder="Full name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
          @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="emailPengguna" aria-describedby="emailHelp" value="{{ old('email') }}" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" aria-describedby="emailHelp" value="{{ old('password') }}" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="password" aria-describedby="emailHelp" value="{{ old('password_confirmation') }}" placeholder="Retype password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
            @error('password_confirmation')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <a href="/login" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div>
  <!-- /.card -->
    <div class="login-logo">
        <h5 style="color:white">Powered by:</h5>
            <img src="assets/img/logo-ug.png" class="power" alt="">
    </div>
</div>
</div>
@stop

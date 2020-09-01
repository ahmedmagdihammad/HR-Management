@extends('layouts.app')

@section('content')
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Shabab Million</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group has-feedback">
            <input id="number" type="mobile_1" class="form-control @error('mobile_1') is-invalid @enderror" name="mobile_1" value="{{ old('mobile_1') }}" placeholder="Mobile" required autocomplete="mobile_1" autofocus>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

            @error('mobile_1')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group has-feedback">
            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required autocomplete="current-password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <!-- /.social-auth-links -->


  </div>
  <!-- /.login-box-body -->
</div>
@endsection

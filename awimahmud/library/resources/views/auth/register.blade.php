@extends('layouts.app')

@section('content')
<div class="register-box">
    <div class="register-logo bg-primary">
        <a href="{{ asset('assets/index2.html') }}"><b>Form </b>Register</a>
    </div>

    <div class="card">
        <div class="card-body register-card-body">
            <p class="login-box-msg"><b>Create Your Account</b></p>
            <form method="POST" action="{{ route('register') }}">
			 	@csrf
                <div class="input-group mb-3">
                    <input id="name" type="text" placeholder="Full name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input id="password-confirm" placeholder="Password Confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <!-- /.col -->
                    <div class="col-4 mt-3 mb-4">
                        <button type="submit" class="btn btn-primary btn-block" style="width: 320px;">
                            {{ __('Register') }}
                        </button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
             <div class=" text-center" style="font-size:13px;">
                <p class="mb-2">
                   Already have an account? <a href="login">Login now</a>
                </p>
            </div>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
</div>
<!-- /.register-box -->
@endsection

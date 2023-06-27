@extends('layouts.app')

@section('content')
<div class="login-box">
    <div class="login-logo bg-primary">
        <a href="{{ asset('assets/index2.html') }}"><b>FORM </b>LOGIN</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg"><b>Login to Your Account</b></p>

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="input-group mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                    <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
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
                <div class="input-group mb-2">
                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                    <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
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
                <div class="row">
                    <div class="col-8 mt-2">
                        <div class="form-check" style="font-size:13px;">
                            <input class="form-check-input pt-1" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label"  for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                    <div class="row text-center mb-3">
                        @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}" style="font-size:13px;">
                            {{ __('Forgot password?') }}
                        </a>
                        @endif
                    </div>
                </div>
                <!-- /.col -->
                <div class="row-5" style="">
                    <button type="submit" class="btn btn-primary btn-block mr-4" style="width: 320px;">Sign In</button>
                </div>
                <!-- /.col -->
            </form>
            <div class=" mt-4 text-center" style="font-size:13px;">
                <p class="mb-0">
                    <a href="register">Create new account</a>
                </p>
            </div>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->
@endsection

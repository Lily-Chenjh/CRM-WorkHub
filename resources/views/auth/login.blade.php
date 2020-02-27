@extends('layouts.app')

@section('content')
<body background="images/background_2.png">
<div class="img-login">
                <img src="images/white_logo.png" class="img_hom" style="width: 70%;">
</div>

<div class="container">
    <div class="row justify-content-center" style="text-align:center;"><h6 style="color:white; font-size:28px; padding-left:50px;">Please,</h6><h5 style="color:#00bcd4; font-size:28px; "> Log In</h5></div>
        <div class="col-md-12 justify-content-center">
            <div class="card-transparent">

                <div class="card-body_admin">
                    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                    {{ csrf_field() }}

                            <div class="form-group2">
                            <label for="email" class="col-sm-6 col-form-label text-md-center" style="color:#cccccc;margin-top: 70px;">{{ __('Email') }}</label>

                            <div class="col-md-6 center-block">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus style="background-color:#2d2d5b; color:white;">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group2">
                            <label for="password" class="col-md-6 col-form-label text-md-center" style="color:#cccccc;">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required style="background-color:#2d2d5b; color:white;">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group2">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} >

                                    <label class="form-check-label" for="remember" style="color:#cccccc;">
                                        {{ __('Remember Me') }}
                                    </label>
                                   
                                    
                                </div>
                            </div>
                        </div>


                        <div class="form-group2">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-login col-md-12">
                                    {{ __('Log In') }}
                                </button>
</div>
</div>
                            <div class="form-group2">
                                <div class="col-md-6">
                                    <a class="btn btn-link" href="{{ route('admin') }}">
                                        {{ __('Admin Log In') }}
                                    </a>         
    
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a> 
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
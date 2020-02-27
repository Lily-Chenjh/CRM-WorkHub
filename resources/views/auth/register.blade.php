@extends('layouts.app')

@section('content')
<body background="images/background_2.png">
<div class="img-login">
                <img src="images/white_logo.png" class="img_hom" style="
    width: 70%;" alt="Italian Trulli">
                </div>

<div class="container">
    <div class="row justify-content-center" style="text-align:center;"><h6 style="color:white; font-size:28px; padding-left:50px;">Student</h6><h5 style="color:#00bcd4; font-size:28px; "> Registration</h5></div>
        <div class="col-md-12 justify-content-center">
            <div class="card-transparent">

                <div class="card-body_admin">
                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                    {{ csrf_field() }}

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right" style="color:#cccccc">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus style="background-color:#2d2d5b; color:white;">

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right" style="color:#cccccc">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required style="background-color:#2d2d5b; color:white;">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="admin" class="col-md-4 col-form-label text-md-right" style="color:#cccccc;">Admin
                            </label>
                            <div class="col-md-6">
                                <select id="admin" class="form-control" name="admin" required style="background-color:#2d2d5b; color:white;">
                                    <option value="0">no</option>
                                    <option value="1">yes</option>
                                </select>
                                @if ($errors->has('admin'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('admin') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right" style="color:#cccccc">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required style="background-color:#2d2d5b; color:white;">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right"  style="color:#cccccc">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required style="background-color:#2d2d5b; color:white;">
                            </div>
                        </div>

                        <div class="form-group2">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-login col-md-12">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                        <div class="form-group2">
                                <div class="col-md-6">
                                    <a class="btn btn-link" href="{{ URL('/login') }}">
                                        {{ __('Already Registered? Log In Here') }}
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

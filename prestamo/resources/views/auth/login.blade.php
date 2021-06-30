@extends('layouts.app')

@section('content')



<div class="imagenlogin ">
    <img src="{{asset('img/sinfondo.png')}}" class="rounded float-right lol">
</div>
<br>
<!--Formulario-->
<div class="row">
    <div class="col-lg-1"></div>
    <!--FORMULARIO SIGN IN Y SIGN UP-->
    <div class="col-lg-4">
        <div class="wrapper">
            <div class="form-container">
                <!--<div class="card-header">{{ __('Login') }}</div>-->
                <div class="slide-controls">
                    <input type="radio" name="slide" id="login" checked>
                    <input type="radio" name="slide" id="signup">
                    <label for="login" class="slide login">Sign In</label>
                    <label for="signup" class="slide signup">Sign Up</label>
                    <div class="slider-tab"></div>
                </div>
                <div class="form-inner">
                    <form method="POST" action="{{ route('login') }}" class="login">
                        @csrf
                        <label>Ingresa tus datos para poder acceder.</label>
                        <div class="field">
                            <label>{{ __('E-Mail Address') }} <b class="rojo">*</b></label>
                            <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="field">
                            <label>{{ __('Password') }}<b class="rojo">*</b></label>
                            <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <br>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                            <br>
                            @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                            @endif
                        </div>
                        <div class="field btn">
                            <div class="btn-layer"></div>
                            <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>
                            @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                            @endif
                        </div>
                    </form>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <label>Ingresa tus datos para poder crear una cuenta.</label>
                        <div class="row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <div class="field">
                                    <label for="name">{{ __('Name') }}<b class="rojo">*</b></label>
                                    <input id="name" type="text" class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="field">
                                    <label for="lastname">{{ __('Lastname') }} <b class="rojo">*</b></label>
                                    <input id="lastname" type="lastname" class="@error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>
                                    @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <label for="tel">{{ __('Tel') }} <b class="rojo">*</b></label>
                            <input id="tel" type="tel" class="@error('tel') is-invalid @enderror" name="tel" value="{{ old('tel') }}" required autocomplete="tel" autofocus>
                            @error('tel')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="field">
                            <label for="email">{{ __('E-Mail Address') }} <b class="rojo">*</b></label>
                            <input id="email" type="email" class=" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="field">
                            <label for="password">{{ __('Password') }} <b class="rojo">*</b></label>
                            <input id="password" type="password" class=" @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="field">
                            <label for="password-confirm">{{ __('Confirm Password') }}<b class="rojo">*</b></label>
                            <input id="password-confirm" type="password" class="" name="password_confirmation" required autocomplete="new-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="field btn">
                            <div class="btn-layer"></div>
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--FORMULARIO-->
    <div class="col-lg-1"></div>
</div>
<!--Formulario-->
@endsection
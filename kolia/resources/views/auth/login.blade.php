@extends('layouts.master')

@section('content')
<div class="login-wrap">
    <div class="login-html">
        <input id="tab-1" type="radio" name="tab" class="sign-in" checked ><label for="tab-1" class="tab">Sign In</label>
        <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab" ><a href="register">Sign Up</a></label>
        <div class="login-form">
            <div class="sign-in-htm">

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}"class="form" id="form2">
                        @csrf
                        <br>
                        <br>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="group">
                                <input id="email" type="email"placeholder="Email" class="input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="group">
                                <label for="password" class="col-md-4 col-form-label text-md-right"></label>

                                <!--    <div class="col-md-6">-->
                                        <input id="password" type="password" placeholder="Password"class="input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                            </div>
                        </div>

                        <div class="group">

                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="check">
                                {{ __('Remember Me') }}
                            </label>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="group">
                                <button type="submit" class="button" value="Sign In">
                                    {{ __('Sign In') }}
                                </button>
                                <div class="hr"></div>
                                <div class="foot-lnk">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection














@extends('layouts.master')

@section('content')
<div class="login-wrap">
    <div class="login-html">
        <input id="tab-1" type="radio" name="tab" class="sign-in"><label for="tab-1" class="tab"><a href="login">Sign In</a></label>
        <input id="tab-2" type="radio" name="tab" class="sign-up" checked><label for="tab-2" class="tab" >Sign Up</label>
        <div class="login-form">
            <div class="sign-up-htm">


                    <form method="POST" action="{{ route('register') }}"class="form" id="form2">
                        @csrf

                            <div class="group">
                                <label for="user" class="label">Username</label>
                                <input id="user" type="text" class="input" @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>

                        <div class="group">
                            <label for="pass" class="label">Email Address</label>
                            <input id="pass" type="text" class="input" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="group">
                            <label for="pass" class="label">Password</label>
                            <input id="pass" type="password" class="input" @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="group">
                            <label for="pass" class="label">Repeat Password</label>
                            <input id="pass" type="password" class="input" name="password_confirmation" required autocomplete="new-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>

                            <div class="group">
                                <button type="submit" class="button">
                                    {{ __('Sign Up') }}
                                </button>
                            </div>
                            <div class="hr"></div>
                            <div class="foot-lnk">
                                <label for="tab-1"><a href="login">Already Member?</a></a>
                            </div>

                    </form>

                </div>
            </div>

    </div>
</div>
@endsection

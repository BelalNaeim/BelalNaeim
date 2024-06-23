@extends('layouts.master')

@section('content')
<div class="login-wrap">
    <div class="login-html">


        <div class="login-form">
            <div class="card">
                <div class="form" id="tab-1">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
<br>
<br>

                            <div class="group">
                                <input id="email" type="email"placeholder="Email" class="input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="group">
                                <button type="submit" class="button" >
                                    {{ __('Send Password Reset Link') }}
                                </button>
                                      <div class="hr"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.main')
@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/contact_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles/contact_responsive.css') }}">


    <!-- Contact Form -->

    <div class="contact_form">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 offset-lg-1" style="border: 1px solid gray;padding:20px;border-radius:25px;">
                    <div class="contact_form_container">
                        <div class="contact_form_title text-center">Sign in </div>

                        <form action="{{ url('/login') }}" method="post">@csrf

                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" aria-describedby="emailHelp">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password" value="{{ old('password') }}" aria-describedby="emailHelp">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="contact_form_button">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </form>
                        <br>

                    </div>
                </div>

                <div class="col-lg-5 offset-lg-1" style="border: 1px solid gray;padding:20px;border-radius:25px;">
                    <div class="contact_form_container">
                        <div class="contact_form_title text-center">Sign up </div>

                        <form action="{{ url('/register') }}" method="post">@csrf

                            <div class="form-group">
                                <label for="exampleInputEmail1">First Name</label>
                                <input type="text" name="first_name" class="form-control" value="{{ old('first_name') }}"
                                    placeholder="Enter Your First Name" aria-describedby="emailHelp">
                                @error('first_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Last Name</label>
                                <input type="text" name="last_name" class="form-control" value="{{ old('last_name') }}"
                                    placeholder="Enter Your Last Name" aria-describedby="emailHelp">
                                @error('last_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mobile</label>
                                <input type="text" class="form-control" name="mobile" value="{{ old('phone') }}"
                                    placeholder="Enter You Phone Number" aria-describedby="emailHelp">
                                @error('mobile')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" class="form-control" name="remail" value="{{ old('email') }}"
                                    placeholder="Enter You Email Adderss" aria-describedby="emailHelp">
                                @error('remail')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Password</label>
                                <input type="password" name="rpassword" class="form-control"
                                    placeholder="Enter You Password" aria-describedby="emailHelp">
                                @error('rpassword')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Address</label>
                                <input type="text" name="address" class="form-control" placeholder="Enter your Adrdess"
                                    requied aria-describedby="emailHelp">
                                @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="contact_form_button">
                                <button type="submit" class="btn btn-primary">Sign Up</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <div class="panel"></div>
    </div>
@endsection

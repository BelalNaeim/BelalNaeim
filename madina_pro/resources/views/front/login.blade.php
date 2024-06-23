@extends('layouts.front.auth')

@section('title', 'الدخول |تسجيل الدخول')
@section('content')
    {{-- <div id="preloader">
        <div class="sk-spinner sk-spinner-wave">
            <div class="sk-rect1"></div>
            <div class="sk-rect2"></div>
            <div class="sk-rect3"></div>
            <div class="sk-rect4"></div>
            <div class="sk-rect5"></div>
        </div>
    </div>
    <!-- End Preload --> --}}

    <div class="layer"></div>

    <main>
        <section id="hero" class="login">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-8" style="margin-top:50px;">
                        <h3 style="color:white; font-weight:bold;">مشاريع المدينة منصة إعلامية تختص برصد أخبار وتحديثات
                            مشاريع المدينة المنورة</h3>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-xl-4 col-lg-5 col-md-6 col-sm-8">
                        <div id="login">
                            <div class="text-center"><img src="{{ asset('front/img/logo_sticky.png') }}" alt="Image"
                                    data-retina="true"></div>
                            <hr>

                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <form action="{{ route('dologin') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>البريد الإلكتروني</label>
                                    <input type="email" name="email" class=" form-control "
                                        placeholder="البريد الإلكتروني" required>
                                </div>
                                <div class="form-group">
                                    <label>كلمة السر</label>
                                    <input type="password" name="password" class=" form-control" placeholder="كلمة السر"
                                        required>
                                </div>
                                <button type="submit" class="btn_full">تسجيل الدخول</button>
                                <a href="{{ route('register') }}" class="btn_full_outline">تسجيل حساب جديد</a>
                            </form>
                            @if (Session::has('message'))
                                <div class="alert alert-danger">{{ Session::get('message') }}</div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-8">
                        <h4 style="color:white; font-weight:bold;"> الترخيص الاعلامي (رقم 148323) لدى الهيئة العامة للإعلام
                            المرئي والمسموع</h4>
                        <h4 style="color:white; font-weight:bold;">رقم السجل التجاري : 7024104510</h4>
                    </div>
                </div>
            </div>
            <br /><br />
        </section>
    </main><!-- End main -->


@endsection

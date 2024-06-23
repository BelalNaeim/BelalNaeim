@extends('layouts.front.auth')

@section('title', 'التسجيل |تسجيل عضوية جديدة')
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
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    @foreach ($errors->all() as $err)
                                        <li>{{ $err }}</li>
                                    @endforeach
                                </div>
                            @endif
                            <form action="{{ route('front.register') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>اسم المستخدم</label>
                                    <input type="text" name="name" class=" form-control" placeholder="اسم المستخدم">
                                </div>
                                <div class="form-group">
                                    <label>رقم الجوال</label>
                                    <input type="tel" name="phone" class=" form-control" placeholder="رقم الجوال">
                                </div>
                                <div class="form-group">
                                    <label>البريد الإلكتروني</label>
                                    <input type="email" name="email" class=" form-control"
                                        placeholder="البريد الإلكتروني">
                                </div>
                                <div class="form-group">
                                    <label>الرقم السري</label>
                                    <input type="password" name="password" class=" form-control" id="password1"
                                        placeholder="الرقم السري">
                                </div>
                                <div class="form-group">
                                    <label>تأكيد الرقم السري</label>
                                    <input type="password" name="password_confirmation" class=" form-control" id="password2"
                                        placeholder="تأكيد الرقم السري">
                                </div>
                                <input type="hidden" name="role" value="مستخدم">
                                <div id="pass-info" class="clearfix"></div>
                                <button type="submit" class="btn_full">تسجيل حسابي الجديد</button>
                            </form>
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

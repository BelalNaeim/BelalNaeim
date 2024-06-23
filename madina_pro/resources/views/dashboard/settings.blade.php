
@extends('layouts.dashboard.app')
@section('title', 'الإعدادات')
@section('content')
    <div class="section-body">
        <div class="container-fluid">
            <div class="row">
                @if (count($errors)>0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $err)
                        <li>{{$err}}</li>
                    @endforeach
                </div>
            @endif
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
                <div class="col-md-12 col-lg-12">
                    <form class="card" method="POST" action="{{url('Dashboard/settings')}}">
                        @csrf
                        <div class="card-body">
                            <h3>إعدادات النظام</h3>
                            <hr /><br />
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">رابط الموقع الإلكتروني</label>
                                        <div class="input-icon">
                                            <span class="input-icon-addon"><i class="fe fe-globe"></i></span>
                                            <input type="url" name="website_link" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">رابط صفحة الفيس بوك</label>
                                        <div class="input-icon">
                                            <span class="input-icon-addon"><i class="fa fa-facebook"></i></span>
                                            <input type="url" name="facebook_link" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">رابط حساب الإنستغرام</label>
                                        <div class="input-icon">
                                            <span class="input-icon-addon"><i class="fa fa-instagram"></i></span>
                                            <input type="url" name="instgram_link" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">رابط حساب تويتير</label>
                                        <div class="input-icon">
                                            <span class="input-icon-addon"><i class="fa fa-twitter"></i></span>
                                            <input type="url" name="twitter_link" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">رابط حساب سناب شات</label>
                                        <div class="input-icon">
                                            <span class="input-icon-addon"><i class="fa fa-snapchat"></i></span>
                                            <input type="url" name="snapchat_link" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">رابط قناة اليوتيوب</label>
                                        <div class="input-icon">
                                            <span class="input-icon-addon"><i class="fa fa-youtube"></i></span>
                                            <input type="url" name="youtube_link" class="form-control">
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <br><hr>

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">رقم الجوال 1 </label>
                                        <div class="input-icon">
                                            <span class="input-icon-addon"><i class="fe fe-phone"></i></span>
                                            <input type="tel" name="phones[]" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">رقم الجوال 2 </label>
                                        <div class="input-icon">
                                            <span class="input-icon-addon"><i class="fe fe-phone"></i></span>
                                            <input type="tel" name="phones[]" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">رقم الجوال 3 </label>
                                        <div class="input-icon">
                                            <span class="input-icon-addon"><i class="fe fe-phone"></i></span>
                                            <input type="tel" name="phones[]" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">رقم الجوال 4 </label>
                                        <div class="input-icon">
                                            <span class="input-icon-addon"><i class="fe fe-phone"></i></span>
                                            <input type="tel" name="phones[]" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <br><hr>


                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">البريد الإلكتروني 1 </label>
                                        <div class="input-icon">
                                            <span class="input-icon-addon"><i class="fe fe-mail"></i></span>
                                            <input type="email" name="emails[]" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">البريد الإلكتروني 2 </label>
                                        <div class="input-icon">
                                            <span class="input-icon-addon"><i class="fe fe-mail"></i></span>
                                            <input type="email" name="emails[]" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">البريد الإلكتروني 3 </label>
                                        <div class="input-icon">
                                            <span class="input-icon-addon"><i class="fe fe-mail"></i></span>
                                            <input type="email" name="emails[]" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">البريد الإلكتروني 4 </label>
                                        <div class="input-icon">
                                            <span class="input-icon-addon"><i class="fe fe-mail"></i></span>
                                            <input type="email" name="emails[]" class="form-control">
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">حفظ البيانات</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

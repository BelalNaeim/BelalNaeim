@extends('layouts.front.app')

@section('title', 'إضافة مشروع جديد | مشاريع المدينة')
@section('content')  
 
    <section class="parallax-window" data-parallax="scroll" data-image-src="{{asset('front/img/home_bg_1.jpg')}}" data-natural-width="1400" data-natural-height="470">
        <div class="parallax-content-1">
            <div class="animated fadeInDown">
                <h1>إضافة مشروع جديد</h1>
                <!--<p>إضافة مشروع جديد لمشاريع المدينة </p>-->
            </div>
        </div>
    </section>
    <!-- End section -->

    <main>

        <div id="position">
            <div class="container">
                <ul>
                    <li>
                        <a href="{{ url('/') }}">الرئيسية</a>
                    </li>
                    <li>إضافة مشروع جديد</li>
                </ul>
            </div>
        </div>
        <!-- Position -->

        <div class="container margin_60">
            <div class="row">
                
                    <div class="col-lg-8 add_bottom_15">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="POST" enctype="multipart/form-data" action="{{ url('Front/projects') }}">
                            @csrf
                            <div class="form_title">
                                <h3><strong>1</strong>بياناتك الشخصية</h3>
                                <p>
                                    من فضلك قم بإدخال بياناتك الشخصية
                                </p>
                            </div>
                            <div class="step">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>الإسم بالكامل</label>
                                            <input type="text" class="form-control" id="firstname_booking" name="name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>البريد الإلكتروني</label>
                                            <input type="email" id="email_booking" name="email" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>رقم الهاتف</label>
                                            <input type="text" id="telephone_booking" name="phone" class="form-control">
                                        </div>
                                    </div>
                                    <input type="hidden" name="role" value="مستخدم">

                                </div>
                            </div>
                            <!--End step -->

                            <div class="form_title">
                                <h3><strong>2</strong>بيانات المشروع</h3>
                                <p>
                                    بيانات المشروع من عنوان وصور ... إلخ
                                </p>
                            </div>
                            <div class="step">
                               
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>إسم المشروع</label>
                                            <input type="text" id="" name="pname" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>(اختياري)قطاع المشروع</label>
                                            <select class="form-control" name="status[]" multiple>
                                                @foreach($status as $st )
                                                <option value="{{$st->id}}">{{$st->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>(اختياري)ميزانية المشروع</label>
                                            <input type="text" id="" name="budget" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>المدينة، المنطقة</label>
                                            <select class="form-control" name="governorate_id">
                                                @foreach($areas as $area )
                                                <option value="{{$area->id}}">{{$area->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div> 
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>(اختياري)شعار المالك</label>
                                            <input type="file" id="Upload" class="form-control" name="image" value="">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>(اختياري)إسم المقاول</label>
                                            <input type="text" class="form-control" name="contractor_name" value="">
                                        </div>
                                    </div>
                                </div> 
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                             <label class="form-label">(اختياري)رابط عنوان المشروع على الخريطة</label>
                                            <input type="url" class="form-control" name="location" value=""/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                           <label class="form-label">(اختياري)إسم الإستشاري</label>
                                            <input type="text" class="form-control" name="consultant_name" value="">
                                        </div>
                                    </div>
                                </div> 
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>(اختياري)تفاصيل المشروع</label>
                                            <textarea class="form-control" rows="9" name="description"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>صور المشروع</label>
                                            <input type="file" class="form-control" multiple name="galleries[]" />
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>صورة المشروع الرئيسيه</label>
                                            <input type="file" class="form-control" name="main_photo" />
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!--End step -->

                            <div id="policy">
                                <h4>الموافقة على إتفاقية الإستخدام</h4>
                                <div class="form-group">
                                    <label>
                                        <input type="checkbox" checked name="policy_terms" id="policy_terms">اوافق على إتفاقية الإستخدام
                                    </label>
                                </div>
                                <button type="submit" class="btn_1 green medium">أضف المشروع الان</button>
                            </div>

                       </form>
                    </div>
               
                <aside class="col-lg-4">
                    <div class="box_style_4">
                        <i class="icon_set_1_icon-57"></i><br /><br />
                        <h4>تواجهك مشكلة ؟ <span> تواصل معنا</span></h4>
                        <a href="tel://004542344599" class="phone">+45 423 445 99</a>
                        <small>24 ساعة على مدار أيام الأسبوع</small>
                    </div>
                </aside>

            </div>
            <!--End row -->
        </div>
        <!--End container -->

    </main>
    <!-- End main -->

@endsection

@extends('layouts.front.app')

@section('title', 'اشترك معنا | مشاريع المدينة')
@section('content') 

    <section class="parallax-window" data-parallax="scroll" data-image-src="img/home_bg_1.jpg" data-natural-width="1400" data-natural-height="470">
        <div class="parallax-content-1">
            <div class="animated fadeInDown">
                <h1>إشترك معنا</h1>
                <p>إتشرك معنا في نشرة مشاريع المدينة الدورية</p>
            </div>
        </div>
    </section>
    <!-- End section -->

    <main>

        <div id="position">
            <div class="container">
                <ul>
                    <li>
                        <a href="index.html">الرئيسية</a>
                    </li>
                    <li>اشترك معنا</li>
                </ul>
            </div>
        </div>
        <!-- Position -->

        <div class="container margin_60">
            <div class="row">
                <div class="col-md-8">
                    <div class="form_title">
                        <h3><strong><i class="icon-pencil"></i></strong>إملىء الإستمارة الأتية</h3>
                        <p>
                            إملىء الإستمارة الاتية للإشترك في نشرة مشاريع المدينة الدورية
                        </p>
                    </div>
                    <div class="step">

                        <div id="message-contact"></div>
                        <form method="post" action="assets/contact.php" id="contactform">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>الإسم</label>
                                        <input type="text" class="form-control" id="name_contact" name="name_contact" placeholder="أدخل الإسم هنا">
                                    </div>
                                </div>
                            </div>
                            <!-- End row -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>البريد الإلكتروني</label>
                                        <input type="email" id="email_contact" name="email_contact" class="form-control" placeholder="أدخل البريد الإلكتروني">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>رقم الهاتف</label>
                                        <input type="text" id="phone_contact" name="phone_contact" class="form-control" placeholder="ادخل رقم الهاتف">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>اسم الشركة</label>
                                        <input type="text" id="company_name" name="company_name" class="form-control" placeholder="أدخل اسم الشركة">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>منصبك في الشركة</label>
                                        <input type="text" id="your_role" name="your_role" class="form-control" placeholder="ادخل منصبك في الشركة">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>التأكد إنك لست روبوت</label>
                                    <input type="text" id="verify_contact" class=" form-control add_bottom_30" placeholder="ما هو مجموع 3 + 1">
                                    <input type="submit" value="إشترك الأن" class="btn_1" id="submit-contact">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- End col-md-8 -->
            </div>
            <!-- End row -->
        </div>
        <!-- End container -->

    </main>
    <!-- End main -->

@endsection

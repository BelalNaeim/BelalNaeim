@extends('layouts.front.app')

@section('title', 'التقارير | مشاريع المدينة')
@section('content')  

    <section class="parallax-window" data-parallax="scroll" data-image-src="{{asset('front/img/home_bg_1.jpg')}}" data-natural-width="1400" data-natural-height="470">
        <div class="parallax-content-1">
            <div class="animated fadeInDown">
                <h1>التقارير</h1>
                <p>تقارير أعمال مشاريع المدينة </p>
            </div>
        </div>
    </section>
    <!-- End section -->

    <main>

        <div id="position">
            <div class="container">
                <ul>
                    <li>
                        <a href="{{url('/')}}">الرئيسية</a>
                    </li>
                    <li>التقارير</li>
                </ul>
            </div>
        </div>
        <!-- Position -->

        <div class="container margin_60">
            <!-- End row -->
            <div class="main_title">
                <h2>تقارير أعمال شركة <span>مشاريع المدينة</span></h2>
                <p>
                    من فضلك قم بالضغط على صورة التقرير لمشاهدة فيديو التقرير
                </p>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-4">
                    <div class="img_wrapper_gallery">
                        <div class="img_container_gallery">
                            <a href="video/paris.mp4" class="video" title="Video">
                                <img src="img/notredame.jpg" alt="Image" class="img-fluid"><i class="icon-resize-full-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="img_wrapper_gallery">
                        <div class="img_container_gallery">
                            <a href="video/paris.mp4" class="video" title="Video">
                                <img src="img/senna.jpg" alt="Image" class="img-fluid"><i class="icon-resize-full-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="img_wrapper_gallery">
                        <div class="img_container_gallery">
                            <a href="video/paris.mp4" class="video" title="Video">
                                <img src="img/notredame.jpg" alt="Image" class="img-fluid"><i class="icon-resize-full-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="img_wrapper_gallery">
                        <div class="img_container_gallery">
                            <a href="video/paris.mp4" class="video" title="Video">
                                <img src="img/senna.jpg" alt="Image" class="img-fluid"><i class="icon-resize-full-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="img_wrapper_gallery">
                        <div class="img_container_gallery">
                            <a href="video/paris.mp4" class="video" title="Video">
                                <img src="img/notredame.jpg" alt="Image" class="img-fluid"><i class="icon-resize-full-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End row -->

        </div>
        <!-- End container -->

    </main>
    <!-- End main -->
@endsection

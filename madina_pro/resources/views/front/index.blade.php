<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Almadina Projects">
    <meta name="author" content="Sedra Technology">
    <title> مشاريع المدينة</title>
    <!-- Favicons-->
    <link rel="shortcut icon" href="{{ asset('front/img/favicon.ico') }}" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="{{ asset('img/apple-touch-icon-57x57-precomposed.png') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72"
        href="{{ asset('img/apple-touch-icon-72x72-precomposed.png') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114"
        href="{{ asset('img/apple-touch-icon-114x114-precomposed.png') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144"
        href="{{ asset('img/apple-touch-icon-144x144-precomposed.png') }}">

    <!-- GOOGLE WEB FONT -->
    <link href='https://fonts.googleapis.com/css?family=Cairo' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css?family=Gochi+Hand|Montserrat:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Tajawal&display=swap" rel="stylesheet">

    <!-- COMMON CSS -->
    <link href="{{ asset('front/css/bootstrap-rtl.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('front/css/style-rtl.css') }}" rel="stylesheet">
    <link href="{{ asset('front/css/vendors.css') }}" rel="stylesheet">

    <!-- CUSTOM CSS -->
    <link href="{{ asset('front/css/custom.css') }}" rel="stylesheet">

</head>

<body class="rtl">
    <div id="preloader">
        <div class="sk-spinner sk-spinner-wave">
            <div class="sk-rect1"></div>
            <div class="sk-rect2"></div>
            <div class="sk-rect3"></div>
            <div class="sk-rect4"></div>
            <div class="sk-rect5"></div>
        </div>
    </div>
    <!-- End Preload -->
    <div class="layer"></div>
    <!-- Mobile menu overlay mask -->
    <!-- Header================================================== -->
    <header>
        <div id="top_line">
            <div class="container">
                <div class="row">
                    <div class="col-6"><i class="icon-mail"></i><strong>mail@mail.com</strong></div>
                    <div class="col-6">
                        <ul id="top_links">
                            <li><a href="#"><i class="icon-facebook"></i></a></li>
                            <li><a href="https://twitter.com/med_projects" target="_blank"><i
                                        class="icon-twitter"></i></a></li>
                            <li><a href="#"><i class="icon-google"></i></a></li>
                            <li><a href="https://www.instagram.com/med_projects/" target="_blank"><i
                                        class="icon-instagram"></i></a></li>
                            <li><a href="https://www.youtube.com/channel/UCJX-KrW5obRLs6xVrFgcpWQ" target="_blank"><i
                                        class="icon-youtube-play"></i></a></li>
                            <li><a href="{{ route('front.logout') }}"
                                    onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                    <img src="{{ asset('assets/images/logout.png') }}" alt="" srcset=""
                                        style="width:16px;height:16px;">
                                    تسجيل الخروج</a>
                                <form id="logout-form" action="{{ route('front.logout') }}" method="GET"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </div><!-- End row -->
            </div><!-- End container-->
        </div><!-- End top line-->

        <div class="container">
            <div class="row">
                <div class="col-2">
                    <div id="logo_home">
                        <h1><a href="{{ url('/') }}" title="Almadina Projects">مشاريع المدينة</a></h1>
                    </div>
                </div>
                <nav class="col-10">
                    <a class="cmn-toggle-switch cmn-toggle-switch__htx open_close"
                        href="javascript:void(0);"><span>قائمة الموقع</span></a>
                    <div class="main-menu">
                        <div id="header_menu">
                            <img src="{{ asset('front/img/madinaLogo.png') }}" width="160" height="34"
                                alt="City tours" data-retina="true">
                        </div>
                        <a href="#" class="open_close" id="close_in"><i class="icon_set_1_icon-77"></i></a>
                        <ul>
                            <li class="active">
                                <a href="{{ url('/') }}"><i class="icon-home"></i> الرئيسية</a>
                            </li>

                            <li class="">
                                <a href="{{ url('Front/projects') }}"><i class="icon-th-large"></i> المشاريع</a>
                            </li>

                            <li class="">
                                <a href="{{ url('Front/news') }}">
                                    <i class="icon-book-1"></i> اخبار المشاريع
                                </a>
                            </li>

                            <li class="">
                                <a href="{{ url('Front/states') }}"><i class="icon-location"></i> المحافظات</a>
                            </li>

                            <li class="">
                                <a href="{{ url('Front/categories') }}"><i class="icon-chart-pie-alt"></i>
                                    القطاعات</a>
                            </li>

                            <li class="">
                                <a href="{{ url('Front/services') }}"><i class="icon-wrench-3"></i> الخدمات</a>
                            </li>

                            <li class="">
                                <a href="{{ url('Front/projects/create') }}"><i class="icon-plus"></i> اضف مشروع</a>
                            </li>

                        </ul>
                    </div><!-- End main-menu -->
                    <ul id="top_tools">
                        <li>
                            <a href="javascript:void(0);" class="search-overlay-menu-btn"><i
                                    class="icon_search"></i></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div><!-- container -->
    </header><!-- End Header -->
    <section id="hero555">
        <div class="container margin_60" style="margin-top:100px;">
            <div class="owl-carousel owl-theme list_carousel add_bottom_30">
                @foreach ($projsts as $project)
                    @if ($project->size == 'ضخم')
                        <div class="item">
                            <div class="hotel_container" style="border-radius: 6px 6px;">
                                <div class="img_container"
                                    style="border: 1px solid #fff; height:190px;border-radius: 6px 6px;">
                                    <a href="{{ url('Front/sProjects/' . $project->id) }}">
                                        <img src="{{ asset('public/imgs/projects/' . $project->main_photo) }}"
                                            width="400" class="img-fluid" alt="image">
                                        <div class="short_info hotel"
                                            style="width: 100%;padding: 5px 10px;min-height: 50px;position: absolute;bottom: 0;left: 0;border-radius: 0 0 6px 6px;text-align: right;">
                                            <h3 style="color: #fff;">{{ $project->name }}</h3>
                                            <h2 style="border-top: 1px solid #2de0ae;width: 20%;margin-bottom: 10px;">
                                            </h2>
                                            <h4 style="font-size: 0.68em;font-weight: normal;color: #fff;">
                                                {{ $project->type['name'] }} / @foreach ($project->statuses as $status)
                                                    {{ $status->name }}
                                                @endforeach
                                            </h4>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <!-- End box -->
                        </div>
                    @endif
                @endforeach
            </div>
            <!-- /carousel -->
            <p class="text-center nopadding">
                <a href="Front/projects" style="background-color:white; padding:15px 30px; opacity:0.5;">مشاهدة كافة
                    المشاريع</a>
            </p>
        </div>
        <!-- End container -->
    </section>
    <!-- End hero -->

    <main>
        <div class="container margin_60">

            <div class="main_title">
                <h2>آخر المشاريع</h2>
                <hr />
            </div>

            <div class="row">
                @if (count($projects) == 0)
                    <p>No Projects</p>
                @else
                    @foreach ($projects as $project)
                        <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.4s">
                            <div class="tour_container">
                                @if ($project->size == 'ضخم')
                                    <div class="ribbon_3"><span>مشروع ضخم</span></div>
                                @endif
                                <div class="img_container">
                                    <a href="{{ url('Front/sProjects/' . $project->id) }}">
                                        <img src="{{ asset('public/imgs/projects/' . $project->main_photo) }}"
                                            width="800" height="533" class="img-fluid" alt="image">
                                        <div class="short_info">
                                            <i class="icon_set_1_icon-44"></i> {{ $project->type['name'] }} /
                                            @foreach ($project->statuses as $status)
                                                {{ $status->name }}
                                            @endforeach
                                        </div>
                                    </a>
                                </div>
                                <div class="tour_title">
                                    <h4 style="margin-top:5px;">{{ $project->name }}</h4>
                                    <!-- end rating -->
                                    <div class="wishlist">
                                        <a class="tooltip_flip tooltip-effect-1"
                                            href="{{ url('Front/sProjects/' . $project->id) }}">+<span
                                                class="tooltip-content-flip"><span class="tooltip-back">مشاهدة
                                                    المشروع</span></span></a>
                                    </div>
                                    <!-- End wish list-->
                                </div>
                            </div>
                            <!-- End box tour -->
                        </div>
                        <!-- End col -->
                    @endforeach
                @endif

            </div>
            <!-- End row -->

            <p class="text-center add_bottom_30">
                <a href="{{ url('Front/projects') }}" class="btn_1 medium"><i class="icon-eye-7"></i> مشاهدة كافة
                    المشاريع </a>
            </p>

        </div>
        <!-- End container -->
    </main>
    <!-- End main -->
    <footer class="revealed">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="social_footer">

                        <ul>
                            <li><a href="#"><i class="icon-facebook"></i></a></li>
                            <li><a href="https://twitter.com/med_projects" target="_blank"><i
                                        class="icon-twitter"></i></a></li>
                            <li><a href="#"><i class="icon-google"></i></a></li>
                            <li><a href="https://www.instagram.com/med_projects/" target="_blank"><i
                                        class="icon-instagram"></i></a></li>
                            <li><a href="https://www.youtube.com/channel/UCJX-KrW5obRLs6xVrFgcpWQ" target="_blank"><i
                                        class="icon-youtube-play"></i></a></li>
                        </ul>
                        <p style="color:white;">جميع الحقوق محفوظة لمشاريع المدينة © 2023</p>
                    </div>
                </div>
            </div><!-- End row -->
        </div><!-- End container -->
    </footer><!-- End footer -->

    <div id="toTop"></div><!-- Back to top button -->
    <!-- Search Menu -->
    <div class="search-overlay-menu">
        <span class="search-overlay-close"><i class="icon_set_1_icon-77"></i></span>
        <!--<form role="search" id="searchform" method="get">
                <input value="" name="q" type="search" placeholder="بحث ..." />
                <button type="submit">
                    <i class="icon_set_1_icon-78"></i>
                </button>
            </form>-->
        <form>
            <input value="" name="q" class="search-input" type="search" placeholder="بحث ..." />
            <div class="card">
                <div class="list-group list-group-flush search-result"></div>
            </div>
        </form>
    </div><!-- End Search Menu -->
    <!-- Common scripts -->
    <script src="{{ asset('front/js/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('front/js/common_scripts_min_rtl.js') }}"></script>
    <script src="{{ asset('front/js/functions_rtl.js') }}"></script>

    <!-- Specific scripts -->
    <!-- Cat nav mobile -->
    <script src="{{ asset('front/js/cat_nav_mobile.js') }}"></script>
    <script>
        $('#cat_nav').mobileMenu();
    </script>

    <!-- Map -->
    <script src="http://maps.googleapis.com/maps/api/js"></script>
    <script src="{{ asset('front/js/map.js') }}"></script>
    <script src="{{ asset('front/js/infobox.js') }}"></script>

    <!-- Check box and radio style iCheck -->
    <script>
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-grey',
            radioClass: 'iradio_square-grey'
        });
    </script>
    <script>
        //Search bar
        $(function() {
            "use strict";
            $("#searchDropdownBox").change(function() {
                var Search_Str = $(this).val();
                //replace search str in span value
                $("#nav-search-in-content").text(Search_Str);
            });
        });
    </script>
    <script>
        //search
        $(document).ready(function() {
            $(".search-input").on('keyup', function() {
                var _q = $(this).val();
                if (_q.length >= 1) {
                    $.ajax({
                        url: "{{ url('search') }}",
                        data: {
                            q: _q
                        },
                        dataType: 'json',
                        beforeSend: function() {
                            $(".search-result").html(
                                '<li class="list-group-item">loading...</li>');
                        },
                        success: function(res) {
                            var _html = '';
                            $.each(res.data, function(index, data) {
                                _html +=
                                    '<li class="list-group-item"> <a href="Front/projects/' +
                                    data.id + '">' + data.name + '</a></li>';

                            });
                            $(".search-result").html(_html);
                        }
                    });
                } else {
                    $(".search-result").html('');
                    return false;
                }
            });
        });
    </script>
    <!-- Specific scripts -->
    <!-- Date and time pickers -->
    <script src="{{ asset('front/js/jquery.sliderPro.min.js') }}"></script>
    <script>
        $(document).ready(function($) {
            $('#Img_carousel').sliderPro({
                width: 960,
                height: 500,
                fade: true,
                arrows: true,
                buttons: false,
                fullScreen: false,
                smallSize: 500,
                startSlide: 0,
                mediumSize: 1000,
                largeSize: 3000,
                thumbnailArrows: true,
                rightToLeft: true,
                autoplay: false
            });
        });
    </script>
    <!-- Date and time pickers -->
    <script>
        $('#check_in, #check_out').datepicker({
            rtl: true
        });
    </script>
    <script src="{{ asset('front/js/datepicker_advanced.js') }}"></script>

    <script>
        $('.carousel-thumbs-2').owlCarousel({
            loop: false,
            margin: 5,
            responsiveClass: true,
            nav: false,
            rtl: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 4,
                    nav: false
                }
            }
        });
    </script>
    <!--Review modal validation -->
    <script src="{{ asset('front/assets/validate.js') }}"></script>
</body>

</html>

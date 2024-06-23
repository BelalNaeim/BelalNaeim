<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Almadina Projects">
    <meta name="author" content="Sedra Technology">
    <title> @yield('title')</title>
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



    @yield('content')

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
                        <p style="color:white;">جميع الحقوق محفوظة لمشاريع المدينة © 2023</a></p>
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

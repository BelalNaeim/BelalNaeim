@php
$setting = DB::table('sitesetting')->first();
@endphp
<!-- info section -->
<section class="info_section long_section">

    <div class="container">
        <div class="contact_nav">
            <a href="">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>
                    Call : {{ $setting->phone ?? '' }}
                </span>
                <br>
                <span>
                    Call : {{ $setting->mobile ?? '' }}
                </span>
            </a>
            <a href="">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span>
                    Email : {{ $setting->email ?? '' }}
                </span>
            </a>
            <a href="">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span>
                    Location : {{ $setting->company_address ?? '' }}
                </span>
            </a>
        </div>

        <div class="info_top ">
            <div class="row ">
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="info_links">
                        <h4>
                            QUICK LINKS
                        </h4>
                        <div class="info_links_menu">
                            <a class="" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
                            <a class="" href="{{ route('about') }}"> About</a>
                            <a class="" href="{{ route('products') }}">Furniture</a>

                            <a class="" href="{{ route('cart') }}">Cart</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 mx-auto">
                    <div class="info_post">
                        <h5>
                            INSTAGRAM FEEDS
                        </h5>
                        <div class="post_box">
                            <div class="img-box">
                                <img src="{{ asset('images/f1.png') }}" alt="">
                            </div>
                            <div class="img-box">
                                <img src="{{ asset('images/f2.png') }}" alt="">
                            </div>
                            <div class="img-box">
                                <img src="{{ asset('images/f3.png') }}" alt="">
                            </div>
                            <div class="img-box">
                                <img src="{{ asset('images/f4.png') }}" alt="">
                            </div>
                            <div class="img-box">
                                <img src="{{ asset('images/f5.png') }}" alt="">
                            </div>
                            <div class="img-box">
                                <img src="{{ asset('images/f6.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info_form">
                        <!--   <h4>
                SIGN UP TO OUR NEWSLETTER
              </h4>
              <form action="">
                <input type="text" placeholder="Enter Your Email" />
                <button type="submit">
                  Subscribe
                </button>
              </form> -->
                        <div class="social_box">
                            <a href="{{ $setting->facebook ?? '' }}">
                                <i class="fa fa-facebook" aria-hidden="true"></i>
                            </a>
                            <a href="{{ $setting->youtube ?? '' }}">
                                <i class="fa fa-youtube" aria-hidden="true"></i>
                            </a>
                            <a href="{{ $setting->instagram ?? '' }}">
                                <i class="fa fa-instagram" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end info_section -->





<!-- jQery -->
<script src="{{ asset('js/jquery-3.4.1.mi.js') }}"></script>
<!-- bootstrap js -->
<script src="{{ asset('js/bootstrap.js') }}"></script>
<!-- custom js -->
<script src="{{ asset('js/custom.js') }}"></script>
<script src="{{ asset('js/jquery.validate.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
</script>
<!-- Google Map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
</script>
<!-- End Google Map -->

</body>

</html>

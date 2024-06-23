@extends('layouts.main')
@section('content')
    <!-- slider section -->
    <section class="slider_section long_section">
        <div id="customCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container ">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="detail-box">
                                    <h1>
                                        For All Your <br>
                                        Furniture Needs
                                    </h1>
                                    <p>
                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Minus quidem maiores
                                        perspiciatis, illo maxime voluptatem a itaque suscipit.
                                    </p>
                                    <div class="btn-box">
                                        <a href="" class="btn1">
                                            Shop Now
                                        </a>
                                        <a href="" class="btn2">
                                            About Us
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="img-box">
                                    <img src="{{ asset('images/slider-img.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container ">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="detail-box">
                                    <h1>
                                        For All Your <br>
                                        Furniture Needs
                                    </h1>
                                    <p>
                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Minus quidem maiores
                                        perspiciatis, illo maxime voluptatem a itaque suscipit.
                                    </p>
                                    <div class="btn-box">
                                        <a href="" class="btn1">
                                            Shop
                                        </a>
                                        <a href="" class="btn2">
                                            About Us
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="img-box">
                                    <img src="{{ asset('images/slider-img.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container ">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="detail-box">
                                    <h1>
                                        For All Your <br>
                                        Furniture Needs
                                    </h1>
                                    <p>
                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Minus quidem maiores
                                        perspiciatis, illo maxime voluptatem a itaque suscipit.
                                    </p>
                                    <div class="btn-box">
                                        <a href="" class="btn1">
                                            Contact Us
                                        </a>
                                        <a href="" class="btn2">
                                            About Us
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="img-box">
                                    <img src="{{ asset('images/slider-img.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <ol class="carousel-indicators">
                <li data-target="#customCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#customCarousel" data-slide-to="1"></li>
                <li data-target="#customCarousel" data-slide-to="2"></li>
            </ol>
        </div>
    </section>
    <!-- end slider section -->
    </div>

    <!-- furniture section -->

    <section class="furniture_section layout_padding">
        <div class="container">
            <div class="heading_container">
                <h2>
                    Our Furniture
                </h2>
                <p>
                    which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to
                    be sure there isn't an
                </p>
            </div>
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-md-6 col-lg-4">
                        <div class="box">
                            <div class="img-box">
                                <a href="{{ route('single_product', ['id' => $product->id]) }}">
                                    <img src="{{ asset($product->image_one) }}" alt="">
                                </a>
                            </div>
                            <div class="detail-box">
                                <h5>
                                    {{ $product->product_name }}
                                </h5>
                                <div class="price_box">
                                    <h6 class="price_heading">
                                        @if ($product->discount_price != null)
                                            <div><span>$</span>{{ $product->discount_price }}</div>
                                            <div style="text-decoration: line-through"><span>$</span>
                                                {{ $product->selling_price }}
                                            </div>
                                        @else
                                            <div><span>{{ $product->selling_price }}</span></div>
                                        @endif
                                    </h6>
                                    <form action="{{ route('add_to_cart') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $product->id }}" />
                                        <input type="hidden" name="name" value="{{ $product->product_name }}" />
                                        <input type="hidden" name="price" value="{{ $product->selling_price }}" />
                                        <input type="hidden" name="sale_price" value="{{ $product->discount_price }}" />
                                        <input type="hidden" name="quantity" value="1" />
                                        <input type="hidden" name="image" value="{{ $product->image_one }}" />
                                        <input type="submit" value="Buy Now" class="btn btn-success" />
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        </div>
    </section>

    <!-- end furniture section -->


    <!-- about section -->

    <section class="about_section layout_padding long_section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="img-box">
                        <img src="{{ asset('images/about-img.png') }}" alt="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="detail-box">
                        <div class="heading_container">
                            <h2>
                                About Us
                            </h2>
                        </div>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti dolorem eum consequuntur ipsam
                            repellat dolor soluta aliquid laborum, eius odit consectetur vel quasi in quidem, eveniet ab est
                            corporis tempore.
                        </p>
                        <a href="">
                            Read More
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- end about section -->

    <!-- blog section -->

    <section class="blog_section layout_padding">
        <div class="container">
            <div class="heading_container">
                <h2>
                    Latest Categories
                </h2>
            </div>
            <div class="row">
                @foreach ($category as $row)
                    <div class="col-md-6 col-lg-4 mx-auto">
                        <div class="box">
                            <div class="img-box">
                                <img src="{{ $row->cat_image }}" alt="">
                            </div>
                            <div class="detail-box">
                                <h5>
                                    {{ $row->category_name }}
                                </h5>
                                <p>
                                    alteration in some form, by injected humour, or randomised words which don't look even
                                    slightly believable.
                                </p>
                                <br /><br /> <a href="{{ URL::to('category/single/' . $row->id) }} "
                                    class="btn btn-info btn-block view-more">View More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- end blog section -->

    <!-- client section -->

    <section class="client_section layout_padding-bottom">
        <div class="container">
            <div class="heading_container">
                <h2>
                    Testimonial
                </h2>
            </div>
            <div id="carouselExample2Controls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-md-11 col-lg-10 mx-auto">
                                <div class="box">
                                    <div class="img-box">
                                        <img src="{{ asset('images/client.jpg') }}" alt="" />
                                    </div>
                                    <div class="detail-box">
                                        <div class="name">
                                            <i class="fa fa-quote-left" aria-hidden="true"></i>
                                            <h6>
                                                Siaalya
                                            </h6>
                                        </div>
                                        <p>
                                            It is a long established fact that a reader will be
                                            distracted by the readable cIt is a long established fact
                                            that a reader will be distracted by the readable c
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-md-11 col-lg-10 mx-auto">
                                <div class="box">
                                    <div class="img-box">
                                        <img src="{{ asset('images/client.jpg') }}" alt="" />
                                    </div>
                                    <div class="detail-box">
                                        <div class="name">
                                            <i class="fa fa-quote-left" aria-hidden="true"></i>
                                            <h6>
                                                Siaalya
                                            </h6>
                                        </div>
                                        <p>
                                            It is a long established fact that a reader will be
                                            distracted by the readable cIt is a long established fact
                                            that a reader will be distracted by the readable c
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-md-11 col-lg-10 mx-auto">
                                <div class="box">
                                    <div class="img-box">
                                        <img src="{{ asset('images/client.jpg') }}" alt="" />
                                    </div>
                                    <div class="detail-box">
                                        <div class="name">
                                            <i class="fa fa-quote-left" aria-hidden="true"></i>
                                            <h6>
                                                Siaalya
                                            </h6>
                                        </div>
                                        <p>
                                            It is a long established fact that a reader will be
                                            distracted by the readable cIt is a long established fact
                                            that a reader will be distracted by the readable c
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel_btn-container">
                    <a class="carousel-control-prev" href="#carouselExample2Controls" role="button" data-slide="prev">
                        <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExample2Controls" role="button" data-slide="next">
                        <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- end client section -->
@endsection

@extends('layouts.main')
@section('content')
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
                @foreach ($product_array as $product)
                    <div class="col-md-12 col-lg-12">
                        <div class="box">
                            <div class="img-box">
                                <div class="card-group">

                                    <!--bootstrap card with 3 horizontal images-->
                                    <div class="row">
                                        <div class="card col-md-4">
                                            <img src="{{ asset($product->image_one) }}" alt="">



                                        </div>

                                        <div class="card col-md-4">
                                            <img src="{{ asset($product->image_two) }}" alt="">



                                        </div>

                                        <div class="card col-md-4">
                                            <img src="{{ asset($product->image_three) }}" alt="">

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="detail-box">
                                <h5>
                                    {{ $product->product_name }}
                                </h5>
                                <h2>{{ $product->product_details }}</h2>
                                <br><br>
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
                                    <a href="">
                                        Buy Now
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    <!-- end furniture section -->
@endsection

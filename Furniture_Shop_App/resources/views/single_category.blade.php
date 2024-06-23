@extends('layouts.main')
@section('content')
    <!-- furniture section -->
    <section class="blog_section layout_padding">
        <div class="container">
            <div class="heading_container">
                <h2>
                    Category : {{ $category->category_name }}
                </h2>
            </div>
            <div class="row">
                @if ($category->products->count())
                    @foreach ($category->products as $product)
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
                                            <input type="hidden" name="sale_price"
                                                value="{{ $product->discount_price }}" />
                                            <input type="hidden" name="quantity" value="1" />
                                            <input type="hidden" name="image" value="{{ $product->image_one }}" />
                                            <input type="submit" value="Buy Now" class="btn btn-success" />
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
@endsection

@extends('layouts.front.app')

@section('title', 'الخدمات | مشاريع المدينة')
@section('content') 

    <section class="parallax-window" data-parallax="scroll" data-image-src="{{asset('front/img/home_bg_1.jpg')}}" data-natural-width="1400" data-natural-height="470">
        <div class="parallax-content-1">
            <div class="animated fadeInDown">
                <h1>الخدمات</h1>
                <p>خدمات مشاريع المدينة</p>
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
                    <li>الخدمات</li>
                </ul>
            </div>
        </div>
        <!-- Position -->

        <div class="container margin_60">
            
            <div class="row feature_home_2">
                @if (count($sevices)==0)
                <div class="col-md-4 offset-4 text-center">
                    <h2 >لا يوجد خدمات الان</h2>
                </div>
                @else
                    @foreach ($sevices as $sevice)
                    <div class="col-md-4 text-center">
                        <img src="{{asset('public/imgs/sevicesimg/'.$sevice->image)}}" alt="" width="75" height="75" />
                        <h2>{{ $sevice->title }}</h2>
                        <p>{{ $sevice->description }}</p>
                    </div>
                    @endforeach
                @endif
                
            </div>
            <!-- End row -->

        </div>
        <!-- End container -->

    </main>

@endsection
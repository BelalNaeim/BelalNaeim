@extends('layouts.front.app')

@section('title', 'القطاعات | مشاريع المدينة')
@section('content')  

    <section class="parallax-window" data-parallax="scroll" data-image-src="{{asset('front/img/home_bg_1.jpg')}}" data-natural-width="1400" data-natural-height="470">
        <div class="parallax-content-1">
            <div class="animated fadeInDown">
                <h1>القطاعات</h1>
                <!--<p>قطاعات المشاريع الخاصة بمشاريع المدينة</p>-->
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
                    <li>القطاعات</li>
                </ul>
            </div>
        </div>
        <!-- Position -->

        <div class="container margin_60">

            <div class="row">       
                @if (count($sectors)==0)
                <p>No Sectors</p>
                @else
                    @foreach ($sectors as $sector)
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 wow zoomIn" data-wow-delay="0.6s">
                        <div class="feature_home">
                            <!--<i><img src="{{asset('public/imgs/status/'.$sector->image )}}" width="50" /></i>-->
                            <h3>{{ $sector->name }}</h3>
                            <br />
                            <a href="{{url('Front/categories/'.$sector->id)}}" class="btn_1" style="color:white;">المشاريع : {{count($sector->projects) }}</a><br /><br />
                            <!--<a class="btn_1 outline" style="color:black;">الميزانية المعلنة : 10,000,0000</a>-->
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
            <!-- End row -->
        </div>
        <!-- End container -->
    </main>
    <!-- End main -->

@endsection

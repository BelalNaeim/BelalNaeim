@extends('layouts.front.app')

@section('title', 'اخبار المشاريع | مشاريع المدينة')
@section('content') 

    <section class="parallax-window" data-parallax="scroll" data-image-src="{{asset('front/img/home_bg_1.jpg')}}" data-natural-width="1400" data-natural-height="470">
        <div class="parallax-content-1">
            <div class="animated fadeInDown">
                <h1>اخبار المشاريع</h1>
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
                    <li>الأخبار</li>
                </ul>
            </div>
        </div>
        <!-- Position -->

        <div class="container margin_60">
            
            <div class="row">
                @if (count($news)==0)
                    <p>No News</p>
                @else
                    @foreach ($news as $new)
                        <div class="col-lg-6">
                    <a class="box_news" href="{{url('Front/news/'.$new->id)}}">
                        <figure>
                            <img src="{{asset('public/imgs/news/logos/'.$new->image)}}" alt="">
                        </figure>
                        <ul>
                            <li>مشاريع المدينة</li>
                            <li>{{$new->date}}</li>
                        </ul>
                        <h2>{{$new->title}}</h2>
                        <p>{{$new->description}}</p>
                    </a>
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

@extends('layouts.front.app')

@section('title', 'تطورات المشاريع | مشاريع المدينة')
@section('content') 

    <section class="parallax-window" data-parallax="scroll" data-image-src="{{asset('front/img/home_bg_1.jpg')}}" data-natural-width="1400" data-natural-height="470">
        <div class="parallax-content-1">
            <div class="animated fadeInDown">
                <h1>تطورات المشاريع</h1>
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
                <div class="col-md-6">
                    <div class="media">
                        <a class="box_news" href="{{url('Front/projects/'.$new->project_id)}}">
                            <figure>
                                <img src="{{asset('public/imgs/news/logos/'.$new->image)}}" alt="Generic placeholder image">
                            </figure>
                            
                        </a>
                      <div class="media-body">
                        <h5 class="mt-0">{{$new->title}}</h5>
                        <p>
                        {{$new->description}}.
                        </p>
                        <small>
                            <i class="fas fa-calendar-alt"></i>{{$new->date}} 
                        </small>
                         - 
                        <small>
                            <i class="fas fa-user-alt"></i>
                            {{$new->writer}}
                        </small>
                      </div>
                    </div>
                </div>
                
                @if($new->vedio)
                <div class="col-md-6">
                    <iframe width="560" height="315" src="{{$new->vedio}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                @endif
                
               
            </div>
            <!-- End row -->
            @if($new->photos)
            <div class="row mt-5">
                <div class="col-md-10 offset-md-1">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                @foreach($x as $index=>$image)
                                    <li data-target="#carouselExampleIndicators" data-slide-to="{{$index}}" class="{{$index==0?'active':''}}"></li>
                                @endforeach
                            </ol>
                            <div class="carousel-inner">
                                @foreach($x as $index=>$image)
                                <div class="carousel-item  {{$index==0?'active':''}}">
                                    <img class="d-block w-100" height="350px" src="{{asset('public/imgs/news/gallery/'.$image)}}" alt="">
                                </div>
                                @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">السابق</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">التالي</span>
                            </a>
                        </div>
                    </div>
            </div>
            @endif
        </div>
        <!-- End container -->

    </main>
    <!-- End main -->

@endsection

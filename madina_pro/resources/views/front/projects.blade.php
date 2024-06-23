@extends('layouts.front.app')

@section('title', 'المشاريع | مشاريع المدينة')
@section('content')  

    <section class="parallax-window" data-parallax="scroll" data-image-src="{{asset('front/img/home_bg_1.jpg')}}" data-natural-width="1400" data-natural-height="470">
        <div class="parallax-content-1">
            <div class="animated fadeInDown">
                <h1>المشاريع</h1>
                <!--<p>المشاريع الخاصة بمشاريع المدينة</p>-->
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
                    <li>المشاريع</li>
                </ul>
            </div>
        </div>
        <!-- Position -->

        <div class="container margin_60">

            <div class="row">
                @if (count($projects)==0)
                    <div class="col-12 text-center">
                        <h2>No Projects</h2>
                    </div>
                    
                @else
                    @foreach ($projects as $project)
                        <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.4s">
                            <div class="tour_container">
                                @if( $project->size == 'ضخم')
                                <div class="ribbon_3"><span>مشروع ضخم</span></div>
                                @endif
                                <div class="img_container">
                                    <a href="{{url('Front/sProjects/'.$project->id)}}">
                                        <img src="{{asset('public/imgs/projects/'.$project->main_photo)}}" width="800" height="533" class="img-fluid" alt="image">
                                        <div class="short_info">
                                            <i class="icon_set_1_icon-44"></i>  {{$project->type['name']}}  / 
                                            @foreach($project->statuses as $status)
                                            {{ $status->name }}
                                            @endforeach
                                        </div>
                                    </a>
                                </div>
                                <div class="tour_title">
                                    <h4 style="margin-top:5px;">{{$project->name}}</h4>
                                    <!-- end rating -->
                                    <div class="wishlist">
                                        <a class="tooltip_flip tooltip-effect-1" href="{{url('Front/sProjects/'.$project->id)}}">+<span class="tooltip-content-flip"><span class="tooltip-back">مشاهدة المشروع</span></span></a>
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
        </div>
        <!-- End container -->
    </main>
    <!-- End main -->

@endsection
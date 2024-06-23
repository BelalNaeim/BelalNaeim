@extends('layouts.front.app')

@section('title', 'المحافظات | مشاريع المدينة')
@section('content')  

    <section class="parallax-window" data-parallax="scroll" data-image-src="{{asset('front/img/home_bg_1.jpg')}}" data-natural-width="1400" data-natural-height="470">
        <div class="parallax-content-1">
            <div class="animated fadeInDown">
                <h1>المحافظات</h1>
                <!--<p>المشاريع الخاصة بمشاريع المدينة طبقاً للمحافظات</p>-->
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
                    <li>المحافظات</li>
                </ul>
            </div>
        </div>
        <!-- Position -->

        <div class="container margin_60">
            <div class="row">
                <aside class="col-lg-3">
                    <div class="box_style_cat">
                        <ul id="cat_nav">
                            @if (count($areas)==0)
                                <p>No Areas</p>
                            @else
                                @foreach ($areas as $area)
                                <li >
                                    <a  href="{{url('Front/states/'.$area->id)}}" id=""  data-id="{{ $area->id }}" name={{ $area->id }} value="{{ $area->id }}"><i class="icon_map"></i>{{ $area->name }}</a>
                                </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </aside>
                <!--End aside -->
                <div class="col-lg-9">
                        <div class="row">
                            @if (count($projects)==0)
                            <h1 class="text-center">No Projects in this Area now </h1>
                            @else
                                @foreach ($projects as $project)
                                    <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.4s">
                                        <div class="tour_container">
                                            @if( $project->size == 'ضخم')
                                            <div class="ribbon_3"><span>مشروع ضخم</span></div>
                                            @endif
                                            <div class="img_container">
                                                <a href="{{url('Front/projects/'.$project->id)}}">
                                                    <img src="{{asset('public/imgs/projects/'.$project->main_photo)}}" width="800" height="533" class="img-fluid" alt="image">
                                                    <div class="short_info">
                                                        <i class="icon_set_1_icon-44"></i> 
                                        {{$project->type['name']}}  / 
                                        @foreach($project->statuses as $status)
                                            {{ $status->name }}
                                            @endforeach       </div>
                                                </a>
                                            </div>
                                            <div class="tour_title">
                                                <h4 style="margin-top:5px;">{{$project->name}}</h4>
                                                <!-- end rating -->
                                                <div class="wishlist">
                                                    <a class="tooltip_flip tooltip-effect-1" href="{{url('Front/projects/'.$project->id)}}">+<span class="tooltip-content-flip"><span class="tooltip-back">مشاهدة المشروع</span></span></a>
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
                <!-- End col lg-9 -->
            </div>
            <!-- End row -->
        </div>
        <!-- End container -->
    </main>
    <!-- End main -->
@endsection

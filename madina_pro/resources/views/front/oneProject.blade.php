
@extends('layouts.front.app')

@section('title', 'إسم المشروع - مشاريع المدينة')
@section('content') 

    <section class="parallax-window" data-parallax="scroll" data-image-src="{{asset('front/img/projectbg.jpg')}}" data-natural-width="1400" data-natural-height="470">
        <div class="parallax-content-1">
            <div class="animated fadeInDown">
                <h1>{{$project->name}}</h1>
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
                    <li>
                        <a href="{{url('/Front/projects')}}">المشاريع</a>
                    </li>
                    <li>
                        مشروع {{$project->name}}
                    </li>
                </ul>
            </div>
        </div>
        <!-- Position -->
        <!-- End Position -->
        <div class="collapse" id="collapseMap">
            <div id="map" class="map"></div>
        </div>
        <!-- End Map -->
        <div class="container margin_60">
            <div class="row">
                <div class="col-lg-8" id="single_tour_desc">
                    <div>
                        <h2>{{$project->name}}</h2>
                        <hr />
                        <p class="btn btn-warning">{{$project->type['name']}}</p>
                        <!--<p class="btn btn-warning">حالة المشروع</p>-->
                    </div>
                    
                    <div id="Img_carousel" class="slider-pro">
                        <div class="sp-slides">
                            @foreach($x as $index=>$image)
                                <div class="sp-slide">
                                    <img src="{{asset('public/imgs/gallery/'.$image)}}" alt="Image" class="sp-image"  data-medium="{{asset('public/imgs/gallery/'.$image)}}" data-src="{{asset('public/imgs/gallery/'.$image)}}" data-large="{{asset('public/imgs/gallery/'.$image)}}" data-small="{{asset('public/imgs/gallery/'.$image)}}" data-large="img/slider_single_tour/2_large.jpg" data-small="{{asset('public/imgs/gallery/'.$image)}}" data-large="{{asset('public/imgs/gallery/'.$image)}}" data-small="{{asset('public/imgs/gallery/'.$image)}}" data-retina="{{asset('public/imgs/gallery/'.$image)}}" data-retina="{{asset('public/imgs/gallery/'.$image)}}" data-retina="{{asset('public/imgs/gallery/'.$image)}}">
                                </div>
                            @endforeach
                        </div>
                        <div class="sp-thumbnails">
                            @foreach($x as $index=>$image)
                                <img src="{{asset('public/imgs/gallery/'.$image)}}" alt="Image" class="sp-thumbnail">
                            @endforeach
                        </div> 
                    </div>

                </div>
                <!--End  single_tour_desc-->
                <aside class="col-lg-4">

                    <div class="box_style_3">
                        <img src="{{asset('public/imgs/logos/'.$project->image)}}" height="50" width="50"/>
                        <br /><br />
                        <h4>المالك</h4>
                    </div>

                    <div class="expose ">
                        <h3 >احصائيات المشروع</h3>
                        <hr width="30%" class="mr-0 mt-2" />
                        <div class="row">
                            <div class="col-md-12 bg-white">
                                @if($st != 0)
                                <div class="mt-3">
                                    <p class="text-success mt-2 mb-0">
                                        نوع المشروع
                                    </p>
                                     <hr width="20%" class="mr-0 my-1" />
                                    <p class="mt-0 text-info">
                                        @foreach($project->statuses as $status)
                                            {{ $status->name }} 
                                        @endforeach
                                    </p>
                                </div>
                                @endif
                        
                                @if($project->budget)
                                <div>
                                    <p class="text-success mb-0">
                                        ميزانية المشروع
                                    </p>
                                     <hr width="20%" class="mr-0 my-1" />
                                    <p class="mt-0">
                                        {{$project->budget}}
                                        ريال
                                    </p>
                                </div>
                                @endif
                                @if($project->start_date)
                                <div>
                                    <p class="text-success mb-0">
                                        بداية التنفيذ
                                    </p>
                                     <hr width="20%" class="mr-0 my-1" />
                                    <p class="mt-0">{{$project->start_date}}</p>
                                </div>
                                @endif
                                @if($project->end_date)
                                <div>
                                    <p class="text-success mb-0">
                                        نهاية التنفيذ 
                                    </p>
                                     <hr width="20%" class="mr-0 my-1" />
                                    <p class="mt-0">{{$project->end_date}}</p>
                                </div>
                                @endif  
                                @if($project->space)
                                <div>
                                    <p class="text-success mb-0">
                                        المساحة 
                                    </p>
                                     <hr width="20%" class="mr-0 my-1" />
                                    <p class="mt-0">
                                        {{$project->space}}
                                        متر مربع
                                    </p>
                                </div>
                                @endif
                                @if($project->governorate['name'])     
                                <div>
                                    <p class="text-success mb-0">
                                        المدينة 
                                    </p>
                                     <hr width="20%" class="mr-0 my-1 text-success" />
                                    <p class="mt-0 text-info">{{$project->governorate['name']}}</p>
                                </div>
                                @endif
                                @if($project->contractor_name)
                                <div>
                                    <p class="text-success mb-0">
                                        المقاول 
                                    </p>
                                     <hr width="20%" class="mr-0 my-1" />
                                    <p class="mt-0">{{$project->contractor_name}}</p>
                                </div>
                                @endif
                                @if($project->consultant_name)
                                <div>
                                    <p class="text-success mb-0">
                                        الإستشاري 
                                    </p>
                                     <hr width="20%" class="mr-0 my-1" />
                                    <p class="mt-0">{{$project->consultant_name}}</p>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!--/box_style_1 -->
                </aside>
            </div>
            <!--End row -->
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a style="font-size:20px;" class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">معلومات</a>
                        </li>
                        <li class="nav-item">
                            <a style="font-size:20px;" class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">تطورات المشروع</a>
                        </li>
                        <li class="nav-item">
                            <a style="font-size:20px;" class="nav-link" id="site-tab" data-toggle="tab" href="#site" role="tab" aria-controls="contact" aria-selected="false">الموقع على الخريطة</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div style="font-size:15px;">
                                {{$project->description}}
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="row">
                                @foreach ($project->news as $new)
                                    <div class="col-lg-6">
                                          <a class="box_news" href="{{url('Front/news/'.$new->id)}}">
                                            <figure>
                                                <img src="{{asset('public/imgs/news/logos/'.$new->image)}}" alt="">
                                                <!--<figcaption><strong>28</strong>ديسمبر</figcaption>-->
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
                                <!-- /box_news -->
                            </div>
                        </div>

                        <div class="tab-pane fade row" id="site" role="tabpanel" aria-labelledby="site-tab">
                            <div class="col-4">
                             @if($project->location != null)
                                <a href="{{url('Front/location/'.$project->id)}}"  target="_blank" class="btn btn-success">
                                    عرض المشروع على خرائط جوجل
                                </a>
                                @else
                                <a href="#" class="btn btn-success" disabled >
                                    عرض المشروع على خرائط جوجل
                                </a>
                                @endif
                            </div> 
                        </div>
                    </div>
                </div><!-- End row-->
            </div>

        </div>
        <!--End container -->
        <div id="overlay"></div>
        <!-- Mask on input focus -->
    </main>
    <!-- End main -->
@endsection
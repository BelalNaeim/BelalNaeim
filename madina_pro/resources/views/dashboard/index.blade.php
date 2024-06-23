@extends('layouts.dashboard.app')

@section('title', 'الصفحة الرئيسية')
@section('content')
        <div class="section-body mt-3">
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-lg-12">
                        <div class="mb-4">
                            <h2>رئيسية لوحة تحكم النظام</h2>                            
                            <small>الصفحة الرئيسية للوحة تحكم نظام إدارة مشاريع المدينة</small>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
 
        <div class="section-body">
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-6 col-md-4 col-xl-2">
                        <div class="card">
                            <div class="card-body ribbon">
                                <div class="ribbon-box green counter">{{$projects}}</div>
                                <a class="my_sort_cut text-muted" href="{{url('Dashboard/projects')}}">
                                    <i class="icon-layers"></i>
                                    <span>المشاريع</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-xl-2">
                        <div class="card">
                            <div class="card-body ribbon">
                                <div class="ribbon-box green counter">{{$users}}</div>
                                <a class="my_sort_cut text-muted" href="{{url('Dashboard/users')}}">
                                    <i class="icon-users"></i>
                                    <span>المستخدمين</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-xl-2">
                        <div class="card">
                            <div class="card-body ribbon">
                                <div class="ribbon-box green counter">{{$governorates}}</div>
                                <a class="my_sort_cut text-muted" href="{{url('Dashboard/States')}}">
                                    <i class="icon-map"></i>
                                    <span>المحافظات</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-xl-2">
                        <div class="card">
                            <div class="card-body ribbon">
                                <div class="ribbon-box green counter">{{$services}}</div>
                                <a class="my_sort_cut text-muted" href="{{url('Dashboard/services')}}">
                                    <i class="icon-globe"></i>
                                    <span>الخدمات</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-xl-2">
                        <div class="card">
                            <div class="card-body ribbon">
                                <div class="ribbon-box green counter">{{$types}}</div>
                                <a class="my_sort_cut text-muted" href="{{url('Dashboard/status')}}">
                                    <i class="icon-pencil"></i>
                                    <span>القطاعات</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-xl-2">
                        <div class="card">
                            <div class="card-body ribbon">
                                <div class="ribbon-box green counter">{{$status}}</div>
                                <a class="my_sort_cut text-muted" href="{{url('Dashboard/types')}}">
                                    <i class="icon-link"></i>
                                    <span>حالات المشاريع</span>
                                </a>
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
@endsection
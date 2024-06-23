@extends('layouts.master')

@section('title')
    Dashboard | APK Store Panel
@endsection

@section('content')
    <div class="nk-content-wrap">
        <div class="components-preview wide-md mx-auto">
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-bordered product-card">
                        <div class="product-thumb">
                            <a href="html/addNewServer.html">
                                <img class="card-img-top" src="{{ asset('images/addserver.png') }}" alt="">
                            </a>
                            <ul class="product-badges">
                                <li><span class="badge bg-danger">Important</span></li>
                            </ul>
                        </div>
                        <div class="card-inner text-center">
                            <h5 class="product-title"><a href="{{ url('dashboard/servers/create') }}">Add
                                    Server</a></h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-bordered product-card">
                        <div class="product-thumb">
                            <a href="html/addNewApp.html">
                                <img class="card-img-top" src="{{ asset('images/addapp.png') }}" alt="">
                            </a>
                            <ul class="product-badges">
                                <li><span class="badge bg-danger">Important</span></li>
                            </ul>
                        </div>
                        <div class="card-inner text-center">
                            <h5 class="product-title"><a href="{{ url('dashboard/applications/create') }}">Add
                                    App</a></h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-bordered product-card">
                        <div class="product-thumb">
                            <a href="html/manageNotifications.html">
                                <img class="card-img-top" src="{{ asset('images/sendnoti.png') }}" alt="">
                            </a>
                            <ul class="product-badges">
                                <li><span class="badge bg-success">Good</span></li>
                            </ul>
                        </div>
                        <div class="card-inner text-center">
                            <h5 class="product-title"><a href="#">Send
                                    Notification</a></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .components-preview -->
    </div>
@endsection

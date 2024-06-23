@extends('layouts.master')

@section('title')
    Dashboard | FitRoad App
@endsection

@section('content')
    <div class="nk-content-wrap">
        <div class="components-preview wide-md mx-auto">
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-bordered product-card">
                        <div class="product-thumb">
                            <a href="{{ route('exercieses.create') }}">
                                <img class="card-img-top" src="{{ asset('images/addexcer.png') }}" alt="">
                            </a>
                        </div>
                        <div class="card-inner text-center">
                            <h5 class="product-title"><a href="{{ route('exercieses.create') }}">Add Exercsie</a></h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-bordered product-card">
                        <div class="product-thumb">
                            <a href="{{ route('foodSystems.create') }}">
                                <img class="card-img-top" src="{{ asset('images/addfoodsystem.png') }}" alt="">
                            </a>
                        </div>
                        <div class="card-inner text-center">
                            <h5 class="product-title"><a href="{{ route('foodSystems.create') }}">Add Food System</a></h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-bordered product-card">
                        <div class="product-thumb">
                            <a href="{{ route('trainers.create') }}">
                                <img class="card-img-top" src="{{ asset('images/addtrainer.png') }}" alt="">
                            </a>
                        </div>
                        <div class="card-inner text-center">
                            <h5 class="product-title"><a href="{{ route('trainers.create') }}">Add Trainer</a></h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-bordered product-card">
                        <div class="product-thumb">
                            <a href="{{ route('users.create') }}">
                                <img class="card-img-top" src="{{ asset('images/adduser.png') }}" alt="">
                            </a>
                        </div>
                        <div class="card-inner text-center">
                            <h5 class="product-title"><a href="{{ route('users.create') }}">Add User</a></h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-bordered product-card">
                        <div class="product-thumb">
                            <a href="{{ route('setting') }}">
                                <img class="card-img-top" src="{{ asset('images/appsettings.png') }}" alt="">
                            </a>
                        </div>
                        <div class="card-inner text-center">
                            <h5 class="product-title"><a href="{{ route('setting') }}">App Settings</a></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .components-preview -->
    </div>
</ @endsection

@extends('layouts.master')

@section('title')
    Dashboard | Blind Assistant App
@endsection

@section('content')
    <div class="nk-content-wrap">
        <div class="components-preview wide-md mx-auto">
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-bordered product-card">
                        <div class="product-thumb">
                            <a href="{{ route('monies.create') }}">
                                <img class="card-img-top" src="{{ asset('images/addmoney.png') }}" alt="">
                            </a>
                        </div>
                        <div class="card-inner text-center">
                            <h5 class="product-title"><a href="{{ route('monies.create') }}">Add Cash Money</a></h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-bordered product-card">
                        <div class="product-thumb">
                            <a href="{{ route('monies.index') }}">
                                <img class="card-img-top" src="{{ asset('images/cashmoneylist.png') }}" alt="">
                            </a>
                        </div>
                        <div class="card-inner text-center">
                            <h5 class="product-title"><a href="{{ route('monies.index') }}">Cash Money List</a></h5>
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

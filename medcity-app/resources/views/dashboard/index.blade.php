@extends('layout.master')

@section('page')
    {{ __('site.admins') }}
@endsection

@section('link')
    {{ route('admins.index') }}
@endsection

@section('content')
    <center>
        <h2 class="text-primary">
            Medcity
            <hr>

        </h2>
    </center>

    @role('owner|admin')
        <!-- Small boxes (Stat box) -->
        <div class="row">

            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3>{{ $admins_count }}</h3>

                        <p>{{ __('site.admins') }}</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user"></i>
                    </div>
                    <a href="{{ route('dashboard.admins.index') }}" class="small-box-footer">{{ __('site.more') }} <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->

        </div>
        <!-- /.row -->
    @endrole
@endsection

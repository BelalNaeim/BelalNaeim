@extends('layouts.master')

@section('title')
    App Settings | FitRoad App
@endsection

@section('content')
    <div class="nk-content-wrap">
        <div class="components-preview wide-md mx-auto">
            <div class="nk-block-head nk-block-head-lg wide-sm">
                <div class="nk-block-head-content">
                    <h2 class="nk-block-title fw-normal">App Settings</h2>
                    <small style="color:red;">"please take care where editing this page"</small>
                </div>
            </div><!-- .nk-block-head -->
            <div class="nk-block nk-block-lg">

                <div class="card card-bordered card-preview">
                    <div class="card-inner">
                        <form class="forms-sample" method="POST" action="{{ route('update.websetting') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="preview-block">
                                <div class="row gy-4">
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="col-lg-12 col-sm-12">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <label for="applogo">App Logo ( PNG )</label>
                                                    <input type="file" class="form-control form-control-xl"
                                                        accept="image/png" id="applogo" name="logo">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="exampleInputName1">Old Image</label>
                                                    <img src="{{ asset($setting->logo) }}"
                                                        style="width: 70px; height: 50px;">
                                                    <input type="hidden" name="oldlogo" value="{{ $setting->logo }}">
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br />
                                <div class="row gy-4">
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <label for="co-info">Contact Informations</label>
                                                <textarea class="form-control" id="co-info" name="contact_informations">{{ $setting->contact_informations }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br />
                                <div style="text-align:right;">
                                    <button class="btn btn-lg btn-success" type="submit">Save Data</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div><!-- .card-preview -->

            </div><!-- .nk-block -->
        </div><!-- .components-preview -->
    </div>
@endsection

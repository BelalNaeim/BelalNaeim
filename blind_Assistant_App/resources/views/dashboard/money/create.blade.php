@extends('layouts.master')

@section('title')
    Dashboard | Blind Assistant App
@endsection
@section('content')
    <div class="nk-content-wrap">
        <div class="components-preview wide-md mx-auto">
            <div class="nk-block-head nk-block-head-lg wide-sm">
                <div class="nk-block-head-content">
                    <div class="nk-block-head-sub"><a class="back-to" href="html/cashMoneyList.html"><em
                                class="icon ni ni-arrow-left"></em><span>Cash Money List</span></a></div>
                    <h2 class="nk-block-title fw-normal">Add New Cash Money</h2>
                </div>
            </div><!-- .nk-block-head -->
            <div class="nk-block nk-block-lg">
                <div class="card card-bordered card-preview">
                    <div class="card-inner">
                        <form method="POST" action="{{ route('monies.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="preview-block">
                                <hr>
                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        @foreach ($errors->all() as $err)
                                            <li>{{ $err }}</li>
                                        @endforeach
                                    </div>
                                @endif
                                <div class="preview-block">
                                    <span class="preview-title-lg overline-title">Fill Required Data</span>
                                    <div class="row gy-4">
                                        <div class="col-lg-12 col-sm-12">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <label for="money-name">Money Name</label>
                                                    <input type="text" class="form-control form-control-xl"
                                                        name="moneyName" id="money-name">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-sm-6">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <label for="face-img">Upload Money Face Image</label>
                                                    <input type="file" class="form-control form-control-xl"
                                                        accept="image/png" id="face-img" name="faceImage">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-sm-6">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <label for="back-img">Upload Money Back Image</label>
                                                    <input type="file" class="form-control form-control-xl"
                                                        accept="image/png" id="back-img" name="backImage">
                                                </div>
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="col-lg-12 col-sm-12">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <label for="money-voice">Money Name Voice ( Arabic + MP3 )</label>
                                                    <input type="file" class="form-control form-control-xl"
                                                        accept="audio/mp3" id="money-voice" name="moneyNameVoice">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <hr class="preview-hr">
                                    <div style="text-align:right;">
                                        <button class="btn btn-lg btn-success" type="submit">Save Data</button>
                                        <button class="btn btn-lg btn-danger" type="reset">Clear Data</button>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div><!-- .card-preview -->
            </div><!-- .nk-block -->
        </div><!-- .components-preview -->
    </div>
@endsection

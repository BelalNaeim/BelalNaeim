@extends('layouts.master')

@section('title')
    Food Systems | FitRoad App
@endsection

@section('content')
    <div class="nk-content-wrap">
        <div class="components-preview wide-md mx-auto">
            <div class="nk-block-head nk-block-head-lg wide-sm">
                <div class="nk-block-head-content">
                    <div class="nk-block-head-sub"><a class="back-to" href="html/foodSystems.html"><em
                                class="icon ni ni-arrow-left"></em><span>Food Systems List</span></a></div>
                    <h2 class="nk-block-title fw-normal">Add New Food System</h2>
                </div>
            </div><!-- .nk-block-head -->
            <div class="nk-block nk-block-lg">
                <div class="card card-bordered card-preview">
                    <div class="card-inner">
                        <form method="POST" action="{{ route('foodSystems.store') }}">
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
                                <span class="preview-title-lg overline-title">Fill Required Data</span>
                                <div class="row gy-4">
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <label for="fs-name">Food System Name</label>
                                                <input type="text" class="form-control form-control-xl" id="fs-name"
                                                    name="food_system_name">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <label for="fs-ca">Total Day Calories</label>
                                                <input type="number" class="form-control form-control-xl" id="fs-ca"
                                                    name="total_day_calories">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <label for="fs-mn">Meals Number</label>
                                                <input type="number" class="form-control form-control-xl" id="fs-mn"
                                                    name="meals_number">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <label for="fs-we">For Over Weight +</label>
                                                <input type="text" class="form-control form-control-xl" id="fs-we"
                                                    name="for_over_weight">
                                            </div>
                                        </div>
                                    </div>

                                    <hr />
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <label for="fs-cont">Food System Content</label>
                                                <textarea class="form-control" id="fs-cont" name="food_system_content"></textarea>
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

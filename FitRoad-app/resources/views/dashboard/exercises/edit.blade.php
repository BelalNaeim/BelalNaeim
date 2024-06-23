@extends('layouts.master')

@section('title')
    Exercises | FitRoad App
@endsection

@section('content')
    <div class="nk-content-wrap">
        <div class="components-preview wide-md mx-auto">
            <div class="nk-block-head nk-block-head-lg wide-sm">
                <div class="nk-block-head-content">
                    <div class="nk-block-head-sub"><a class="back-to" href="html/exercises.html"><em
                                class="icon ni ni-arrow-left"></em><span>Exercises List</span></a></div>
                    <h2 class="nk-block-title fw-normal">Edit Exercise</h2>
                </div>
            </div><!-- .nk-block-head -->
            <div class="nk-block nk-block-lg">
                <div class="card card-bordered card-preview">
                    <div class="card-inner">
                        <form method="POST" action="{{ route('exercieses.update', $exercise->id) }}"
                            enctype="multipart/form-data">
                            @method('PUT')
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
                                                <label for="exercise-name">Exercise Name</label>
                                                <input type="text" class="form-control form-control-xl"
                                                    id="exercise-name" name="exercise_name"
                                                    value="{{ $exercise->exercise_name }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <label for="exercise-du">Duration (Seconds)</label>
                                                <input type="number" class="form-control form-control-xl" id="exercise-du"
                                                    name="Duration" value="{{ $exercise->Duration }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <label for="exercise-bu">Burned Calories</label>
                                                <input type="number" class="form-control form-control-xl" id="exercise-bu"
                                                    name="burned_calories" value="{{ $exercise->burned_calories }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <label for="exercise-we">For Over Weight +</label>
                                                <input type="number" class="form-control form-control-xl" id="exercise-we"
                                                    name="for_over_weight" value="{{ $exercise->for_over_weight }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <label for="exercise-tba">Target Body Area</label>
                                                <select class="form-select form-control-xl" id="exercise-tba"
                                                    name="target_body_area">
                                                    <option value="{{ $exercise->target_body_area }}" selected>
                                                        {{ $exercise->target_body_area }}==>[Selected]</option>
                                                    <option value="Chest">Chest</option>
                                                    <option value="Back">Back</option>
                                                    <option value="Arms">Arms</option>
                                                    <option value="Abdominals">Abdominals</option>
                                                    <option value="Sholuders">Sholuders</option>
                                                    <option value="Legs">Legs</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <hr />
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <label for="ex-video">Exercise Video ( MP4 )</label>
                                                <input type="file" class="form-control form-control-xl"
                                                    accept="video/mp4" id="ex-video" name="exercise_video">
                                            </div>
                                            <input type="hidden" name="oldfile"
                                                value="{{ 'app/public/' . $exercise->exercise_video }}">

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

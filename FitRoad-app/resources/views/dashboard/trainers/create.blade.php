@extends('layouts.master')

@section('title')
    Trainers | FitRoad App
@endsection

@section('content')
    <div class="nk-content-wrap">
        <div class="components-preview wide-md mx-auto">
            <div class="nk-block-head nk-block-head-lg wide-sm">
                <div class="nk-block-head-content">
                    <div class="nk-block-head-sub"><a class="back-to" href="html/trainers.html"><em
                                class="icon ni ni-arrow-left"></em><span>Trainers List</span></a></div>
                    <h2 class="nk-block-title fw-normal">Add New Trainer</h2>
                </div>
            </div><!-- .nk-block-head -->
            <div class="nk-block nk-block-lg">
                <div class="card card-bordered card-preview">
                    <div class="card-inner">
                        <form method="POST" action="{{ route('trainers.store') }}">
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
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <label for="full-name">Full Name</label>
                                                <input type="text" class="form-control form-control-xl" id="full-name"
                                                    name="FullName">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <label for="mobile">Mobile Number</label>
                                                <input type="text" class="form-control form-control-xl" id="mobile"
                                                    name="mobile_number">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-sm-4">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <label for="gender">Gender</label>
                                                <select class="form-select form-control-xl" id="gender" name="Gender">
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <label for="age">Age</label>
                                                <input type="text" class="form-control form-control-xl" id="age"
                                                    name="Age">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <label for="stwoda">Start Work Date</label>
                                                <input type="date" class="form-control form-control-xl" id="stwoda"
                                                    name="start_work_date">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <label for="exerspe">Exercise Specialties</label>
                                                <textarea class="form-control" id="exerspe" name="Exercise_specialties"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <label for="certifcates">Certifcates</label>
                                                <textarea class="form-control" id="certifcates" name="certifcates"></textarea>
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
</ @endsection

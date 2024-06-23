@extends('layouts.master')

@section('title')
    Users | FitRoad App
@endsection

@section('content')
    <div class="nk-content-wrap">
        <div class="components-preview wide-md mx-auto">
            <div class="nk-block-head nk-block-head-lg wide-sm">
                <div class="nk-block-head-content">
                    <div class="nk-block-head-sub"><a class="back-to" href="html/users.html"><em
                                class="icon ni ni-arrow-left"></em><span>Users List</span></a></div>
                    <h2 class="nk-block-title fw-normal">Add New User</h2>
                </div>
            </div><!-- .nk-block-head -->
            <div class="nk-block nk-block-lg">
                <div class="card card-bordered card-preview">
                    <div class="card-inner">
                        <form method="POST" action="{{ route('users.store') }}">
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
                                    <p>Personal Data</p>
                                    <div class="col-lg-4 col-sm-4">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <label for="first-name">First Name</label>
                                                <input type="text" class="form-control form-control-xl" id="first-name"
                                                    Name="first_name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <label for="last-name">Last Name</label>
                                                <input type="text" class="form-control form-control-xl" id="last-name"
                                                    Name="last_name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <label for="gender">Gender</label>
                                                <select class="form-select form-control-xl" id="gender" Name="gender">
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-sm-4">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <label for="countr">Country</label>
                                                <input type="text" class="form-control form-control-xl" id="country"
                                                    Name="country">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <label for="gov">Government</label>
                                                <input type="text" class="form-control form-control-xl" id="gov"
                                                    Name="gov">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <label for="city">City</label>
                                                <input type="text" class="form-control form-control-xl" id="city"
                                                    Name="city">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-sm-4">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <label for="age">Age</label>
                                                <input type="text" class="form-control form-control-xl" id="age"
                                                    Name="age">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <label for="weight">Weight</label>
                                                <input type="text" class="form-control form-control-xl" id="weight"
                                                    Name="weight">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <label for="height">Height</label>
                                                <input type="text" class="form-control form-control-xl" id="height"
                                                    Name="height">
                                            </div>
                                        </div>
                                    </div>


                                    <hr />
                                    <p>inBody Results</p>
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <label for="lindate">Last inBody Date</label>
                                                <input type="date" class="form-control form-control-xl" id="lindate"
                                                    Name="lindate">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-sm-3">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <label for="tbw">TBW</label>
                                                <input type="text" class="form-control form-control-xl" id="tbw"
                                                    Name="tbw">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-3">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <label for="prot">Protien</label>
                                                <input type="text" class="form-control form-control-xl" id="prot"
                                                    Name="prot">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-3">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <label for="mineral">Mineral</label>
                                                <input type="text" class="form-control form-control-xl" id="mineral"
                                                    Name="mineral">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-3">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <label for="bfmass">Body Fat Mass</label>
                                                <input type="text" class="form-control form-control-xl" id="bfmass"
                                                    Name="bfmass">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-3">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <label for="bwei">Weight</label>
                                                <input type="text" class="form-control form-control-xl" id="bwei"
                                                    Name="bwei">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-3">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <label for="bmi">BMI</label>
                                                <input type="text" class="form-control form-control-xl" id="bmi"
                                                    Name="bmi">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-3">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <label for="pbfat">Percent Body Fat (%)</label>
                                                <input type="text" class="form-control form-control-xl" id="pbfat"
                                                    Name="pbfat">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-3">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <label for="insco">InBody Score</label>
                                                <input type="text" class="form-control form-control-xl" id="insco"
                                                    Name="insco">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-3">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <label for="weco">Weight Control</label>
                                                <input type="text" class="form-control form-control-xl" id="weco"
                                                    Name="weco">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-3">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <label for="impe">Impedance</label>
                                                <input type="text" class="form-control form-control-xl" id="impe"
                                                    Name="impe">
                                            </div>
                                        </div>
                                    </div>

                                    <hr />
                                    <p>Login Data</p>
                                    <div class="col-lg-4 col-sm-4">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control form-control-xl" id="email"
                                                    Name="email">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <label for="password">Password</label>
                                                <input type="password" class="form-control form-control-xl"
                                                    id="password" Name="password">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <label for="password_confirmation">Confirm Password</label>
                                                <input type="password" class="form-control form-control-xl"
                                                    id="password_confirmation" Name="password_confirmation ">
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

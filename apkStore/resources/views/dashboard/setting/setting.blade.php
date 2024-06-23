@extends('layouts.master')

@section('title')
    Dashboard | APK Store Panel
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
                        <form action="{{ route('change.password') }}" method="POST">
                            @csrf
                            <div class="preview-block">
                                <div class="row gy-4">
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-group">
                                            <div class="form-label-group">
                                                <label class="form-label" for="password">Current Password</label>
                                            </div>
                                            <div class="form-control-wrap">
                                                <a href="#" class="form-icon form-icon-right passcode-switch lg"
                                                    data-target="admin-password">
                                                    <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                    <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                                </a>
                                                <input type="password" class="form-control" id="current_password"
                                                    name="oldpassword">

                                                @error('oldpassword')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <div class="form-label-group">
                                                    <label class="form-label" for="password">New Password</label>
                                                </div>
                                                <div class="form-control-wrap">
                                                    <a href="#" class="form-icon form-icon-right passcode-switch lg"
                                                        data-target="admin-password">
                                                        <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                        <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                                    </a>
                                                    <input type="password" class="form-control" id="password"
                                                        name="password">

                                                    @error('password')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <div class="form-label-group">
                                                        <label class="form-label" for="password">Confirm
                                                            Password</label>
                                                    </div>
                                                    <div class="form-control-wrap">
                                                        <a href="#"
                                                            class="form-icon form-icon-right passcode-switch lg"
                                                            data-target="admin-password">
                                                            <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                            <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                                        </a>
                                                        <input type="password" class="form-control"
                                                            id="password_confirmation" name="password_confirmation">

                                                        @error('password_confirmation')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <br />
                                                    <div style="text-align:right;">
                                                        <button class="btn btn-lg btn-success" type="submit">Save
                                                            Data</button>
                                                        <button class="btn btn-lg btn-danger" type="reset">Clear
                                                            Data</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div><!-- .card-preview -->

                <div class="card card-bordered card-preview">
                    <div class="card-inner">
                        <form action="{{ route('app.status') }}" method="POST">
                            @csrf
                            <div class="preview-block">
                                <div class="row gy-4">
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <label for="app-status">App Status</label>
                                                <select class="form-select form-control-xl" id="app-status" name="status">
                                                    <option value="1">Normal Mode</option>
                                                    <option value="0">Review Mode</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br />
                                <div style="text-align:right;">
                                    <button class="btn btn-lg btn-success" type="submit">Save Data</button>
                                    <button class="btn btn-lg btn-danger" type="reset">Clear Data</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div><!-- .card-preview -->

                <div class="card card-bordered card-preview">
                    <div class="card-inner">
                        <form>
                            <div class="preview-block">
                                <div class="row gy-4">
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <label for="support-link">Support Link</label>
                                                <input type="url" class="form-control form-control-xl"
                                                    id="support-link">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br />
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
    @endsection

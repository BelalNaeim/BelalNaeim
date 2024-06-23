@extends('layouts.master')

@section('title')
    Dashboard | Blind Assistant App
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
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </div>
                @endif
                <div class="card card-bordered card-preview">
                    <div class="card-inner">
                        <form method="POST" action="{{ route('upload.welcomeVoice') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="preview-block">

                                <div class="row gy-4">
                                    <div class="form-control-wrap">
                                        <label for="money-voice">Change Welcome Voice ( Arabic + MP3 )</label>
                                        <input type="file" class="form-control form-control-xl" accept="audio/mp3"
                                            id="money-voice" name="welcome_voice">
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

                <div class="card card-bordered card-preview">
                    <div class="card-inner">
                        <form method="POST" action="{{ route('upload.startVoice') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="preview-block">

                                <div class="row gy-4">
                                    <div class="form-control-wrap">
                                        <label for="money-voice">Change Start Voice ( Arabic + MP3 )</label>
                                        <input type="file" class="form-control form-control-xl" accept="audio/mp3"
                                            id="money-voice" name="start_voice">
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

                <div class="card card-bordered card-preview">
                    <div class="card-inner">
                        <form method="POST" action="{{ route('upload.successVoice') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="preview-block">

                                <div class="row gy-4">
                                    <div class="form-control-wrap">
                                        <label for="money-voice">Change Success Voice ( Arabic + MP3 )</label>
                                        <input type="file" class="form-control form-control-xl" accept="audio/mp3"
                                            id="money-voice" name="success_voice">
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

                <div class="card card-bordered card-preview">
                    <div class="card-inner">
                        <form method="POST" action="{{ route('upload.problemVoice') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="preview-block">
                                <div class="row gy-4">
                                    <div class="form-control-wrap">
                                        <label for="money-voice">Change Problem Voice ( Arabic + MP3 )</label>
                                        <input type="file" class="form-control form-control-xl" accept="audio/mp3"
                                            id="money-voice" name="problem_voice">
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

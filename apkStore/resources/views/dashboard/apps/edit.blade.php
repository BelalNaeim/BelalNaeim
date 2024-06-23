@extends('layouts.master')

@section('title')
    Dashboard | APK Store Panel
@endsection

@section('content')
    <div class="nk-content-wrap">
        <div class="components-preview wide-md mx-auto">
            <div class="nk-block-head nk-block-head-lg wide-sm">
                <div class="nk-block-head-content">
                    <div class="nk-block-head-sub"><a class="back-to" href="html/manageApps.html"><em
                                class="icon ni ni-arrow-left"></em><span>Manage Apps</span></a></div>
                    <h2 class="nk-block-title fw-normal">Edit App</h2>
                </div>
            </div><!-- .nk-block-head -->
            <div class="nk-block nk-block-lg">
                <div class="card card-bordered card-preview">
                    <div class="card-inner">
                        <form method="POST" action="{{ route('applications.update', $app->id) }}"
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
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <label for="app-name">App Name</label>
                                                <input type="text" class="form-control form-control-xl" id="app-name"
                                                    name="app_name" value="{{ $app->app_name }}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <label for="app-server">App Server</label>
                                                <select class="form-select form-control-xl" id="app-server"
                                                    name="server_id">
                                                    <option value="option_select0">--Select Server</option>
                                                    @foreach ($servers as $row)
                                                        <option value="{{ $row->id }}" <?php if ($row->id == $app->server_id) {
                                                            echo 'selected';
                                                        } ?>>
                                                            {{ $row->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <label for="app-version">App Version</label>
                                                <input type="text" class="form-control form-control-xl" id="app-version"
                                                    name="app_version" value="{{ $app->app_version }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <label for="app-file">App Logo</label>
                                                <input class="form-control" type="file"class="custom-file-input"
                                                    name="logo" onchange="readURL(this);"
                                                    style=" height:40px;
                                        margin-bottom:25px;
                                        padding-left:30px;">
                                                <hr>
                                                <label for="exampleInputName1">Old Image</label>
                                                <img src="{{ URL::to($app->logo) }}" style="width: 70px; height: 50px;">
                                                <input type="hidden" name="oldimage" value="{{ $app->logo }}">
                                                <label for="exampleInputName1">Existing Image preview :</label>

                                                <span class="custom-file-control"></span>
                                                <img src="#" id="one" alt="">
                                                <hr>
                                            </div>
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <label for="app-file">Upload Apk File</label>
                                                <input type="file" class="form-control form-control-xl" id="app-file"
                                                    name="apk_file">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <label for="app-link">Apk File Link</label>
                                                <input type="url" class="form-control form-control-xl"
                                                    placeholder="'leave empty if you upload an apk file'" id="app-link"
                                                    name="app_link" value="{{ $app->app_link }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <label for="app-file">Upload App Screenshots</label>
                                                <input type="file" class="form-control form-control-xl"
                                                    id="app-screenshots" accept="image/*" multiple name="screenshots[]">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <label class="form-label-outlined" for="app-descriptions">App
                                                    Information</label>
                                                <textarea id="app-descriptions" class="form-control form-control-outlined" name="app_info">value="{{ $app->app_info }}"</textarea>
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

        <script type="text/javascript">
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#one')
                            .attr('src', e.target.result)
                            .width(80)
                            .height(80);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>
    @endsection

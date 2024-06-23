@extends('layouts.master')

@section('title')
    Dashboard | APK Store Panel
@endsection

@section('content')
    <div class="nk-content-wrap">
        <div class="components-preview wide-md mx-auto">
            <div class="nk-block-head nk-block-head-lg wide-sm">
                <div class="nk-block-head-content">
                    <div class="nk-block-head-sub"><a class="back-to" href="html/manageServers.html"><em
                                class="icon ni ni-arrow-left"></em><span>Manage Servers</span></a></div>
                    <h2 class="nk-block-title fw-normal">Edit Server</h2>
                </div>
            </div><!-- .nk-block-head -->
            <div class="nk-block nk-block-lg">
                <div class="card card-bordered card-preview">
                    <div class="card-inner">
                        <form class="card" enctype="multipart/form-data" method="POST"
                            action="{{ route('servers.update', $server->id) }}">
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
                                                <input type="text"
                                                    class="form-control form-control-xl form-control-outlined"
                                                    id="app-name" name="name" value="{{ $server->name }}">
                                                <label class="form-label-outlined" for="app-name">Server Name</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <label for="app-file">Server Logo</label>
                                                <input class="form-control" type="file"class="custom-file-input"
                                                    name="logo" onchange="readURL(this);"
                                                    style=" height:40px;
                                        margin-bottom:25px;
                                        padding-left:30px;">
                                                <hr>
                                                <label for="exampleInputName1">Old Image</label>
                                                <img src="{{ URL::to($server->logo) }}" style="width: 70px; height: 50px;">
                                                <input type="hidden" name="oldimage" value="{{ $server->logo }}">
                                                <label for="exampleInputName1">Existing Image preview :</label>

                                                <span class="custom-file-control"></span>
                                                <img src="#" id="one" alt="">
                                                <hr>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <label class="form-label-outlined" for="app-descriptions">Additional
                                                    Data</label>
                                                <textarea id="app-descriptions" class="form-control form-control-outlined" name="server_data">{{ $server->server_data }}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <hr class="preview-hr">
                                <div style="text-align:right;">
                                    <button class="btn btn-lg btn-success" type="submit">Update Data</button>
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

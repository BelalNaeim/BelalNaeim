@extends('layout.master')

@section('main-content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h3>{{ __('admin.site_settings') }}</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}"> <i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">{{ __('admin.admin_panel') }}</li>
                        <li class="breadcrumb-item active">{{ __('admin.introductory_site_setting') }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row starter-main">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>{{ __('admin.settings') }}</h5>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger m-2">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (session('success'))
                        <h6 class="alert alert-success">
                            {{ session('success') }}
                        </h6>
                    @endif
                    <div class="card-body">
                        <div class="digital-add needs-validation">
                            <form action="{{ route('dashboard.settings.update', $setting->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')

                                @if ($errors->any())
                                    {!! implode('', $errors->all('<div>:message</div>')) !!}
                                @endif

                                <div class="form-group">
                                    <label for="validationCustom05" class="col-form-label pt-0">
                                        {{ __('admin.logo_image') }}</label>
                                    <input class="form-control dropify" id="validationCustom05" type="file"
                                        name="logo" data-default-file="{{ asset($setting->logo) }}">
                                    {{-- <img style="width: 100px" src="{{ asset($setting->logo) }}" alt=""> --}}
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label"><span>*</span> {{ __('admin.favicon') }}</label>
                                    <input class="form-control dropify" id="validationCustom05" type="file"
                                        name="favicon" data-default-file="{{ asset($setting->favicon) }}">
                                    {{-- <img style="width: 200px" src="{{ asset($setting->favicon) }}" alt=""> --}}
                                </div>



                                <div class="form-group">
                                    <label for="validationCustom01" class="col-form-label pt-0"><span>*</span>
                                        {{ __('admin.site_name') }}</label>
                                    <input class="form-control" id="validationCustom01" type="text" name="name"
                                        value="{{ $setting->name }}">
                                </div>


                                <div class="form-group">
                                    <label class="col-form-label">   {{ __('admin.site_desc') }}</label>
                                    <textarea class="form-control btn-square" id="exampleFormControlTextarea14" rows="5" cols="12"
                                        name="description">{{ $setting->description }}</textarea>

                                </div>
                                <div class="form-group">
                                    <label for="validationCustom02" class="col-form-label"><span>*</span>
                                        {{ __('admin.email') }}</label>
                                    <input class="form-control" id="validationCustom02" type="text" name="email"
                                        value="{{ $setting->email }}">
                                </div>

                                <div class="form-group">
                                    <label for="validationCustomtitle" class="col-form-label pt-0">{{ __('admin.phone') }}</label>
                                    <input class="form-control" id="validationCustomtitle" type="text" name="phone"
                                        value="{{ $setting->phone }}">
                                </div>

                                <div class="form-group">
                                    <label for="validationCustomtitle" class="col-form-label pt-0">{{ __('admin.address') }}</label>
                                    <input class="form-control" id="validationCustomtitle" type="text" name="address"
                                        value="{{ $setting->address }}">
                                </div>

                                <div class="form-group">
                                    <label for="validationCustomtitle" class="col-form-label pt-0"><span>*</span> {{ __('admin.facebook') }}</label>
                                    <input class="form-control" id="validationCustomtitle" type="text" name="facebook"
                                        value="{{ $setting->facebook }}">
                                </div>

                                <div class="form-group">
                                    <label for="validationCustomtitle" class="col-form-label pt-0"><span>*</span> {{ __('admin.twitter') }}</label>
                                    <input class="form-control" id="validationCustomtitle" type="text" name="twitter"
                                        value="{{ $setting->twitter }}">
                                </div>

                                <div class="form-group">
                                    <label for="validationCustomtitle" class="col-form-label pt-0"><span>*</span> {{ __('admin.instagram') }}</label>
                                    <input class="form-control" id="validationCustomtitle" type="text" name="instagram"
                                        value="{{ $setting->instagram }}">
                                </div>

                                <div class="form-group">
                                    <label for="validationCustomtitle" class="col-form-label pt-0"> {{ __('admin.youtube') }}</label>
                                    <input class="form-control" id="validationCustomtitle" type="text" name="youtube"
                                        value="{{ $setting->youtube }}">
                                </div>


                                <div class="form-group">
                                    <label for="validationCustomtitle" class="col-form-label pt-0">{{ __('admin.tiktok') }}</label>
                                    <input class="form-control" id="validationCustomtitle" type="text" name="tiktok"
                                        value="{{ $setting->tiktok }}">
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit">{{ __('admin.save') }}</button>
                                </div>


                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Container-fluid Ends-->
    </div>
    <!-- Container-fluid Ends-->
@endsection

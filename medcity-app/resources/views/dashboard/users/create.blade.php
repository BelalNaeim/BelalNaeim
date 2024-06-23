@extends('layout.master')

@section('page')
    {{ __('users') }}
@endsection

@section('link')
    {{ route('users.index') }}
@endsection

@section('content')
    <div class="card card-primary">
        <div class="card-header" style="background-color: #041C32">
            <h3 class="card-title">{{ __('Add User') }}</h3>
        </div>


        <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">

            @csrf
            {{ method_field('post') }}
            <div class="card-body">
                <div class="form-group">

                    <label for="exampleInputEmail1">{{ __('Name') }}</label>
                    <input type="text" name="name" placeholder="Enter your Name" class="form-control"
                        value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" name="password" id="exampleInputPassword1"
                        placeholder="Password">
                </div>
                <div class="form-group">
                    <label>{{ __('Image') }}</label>
                    <input type="file" class="form-control" name="image" accept="image/*" onchange="loadFile(event)">
                    <img id="output" style="width: 80px" />
                </div>

                @include('layouts.partials.countrySelect')

                <div class="form-group">
                    <label>{{ __('email') }}</label>
                    <input type="text" name="email" placeholder="Enter Your Email" class="form-control"
                        value="{{ old('email') }}">
                </div>

                <div class="form-group">
                    <label>{{ __('mobile') }}</label>
                    <input type="text" name="mobile" placeholder="Enter your mobile Number" class="form-control"
                        value="{{ old('mobile') }}">
                </div>

                <div class="form-group">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">User Language</label>
                    </div>
                    <select class="custom-select" id="inputGroupSelect01" name="lang">
                        <option selected>Choose...</option>
                        <option value="en">English</option>
                        <option value="ar">Arabic</option>
                    </select>
                </div>


                <div class="form-group">
                    <label>{{ __('Permissions') }}</label>
                    <div class="nav-tabs-custom">

                        @php
                            $models = ['users', 'sliders', 'services', 'galleries', 'profiles'];
                            $maps = ['create', 'read', 'update', 'delete'];
                        @endphp

                        <ul class="nav nav-tabs">
                            @foreach ($models as $index => $model)
                                <li class="{{ $index == 0 ? 'active' : '' }}"><a href="#{{ $model }}"
                                        data-toggle="tab" style="margin: 5px">{{ __($model) }}</a></li>
                            @endforeach
                        </ul>

                        <div class="tab-content">

                            @foreach ($models as $index => $model)
                                <div class="tab-pane {{ $index == 0 ? 'active' : '' }}" id="{{ $model }}">

                                    @foreach ($maps as $map)
                                        <label><input type="checkbox" name="permissions[]"
                                                value="{{ $map . '_' . $model }}"> {{ __($map) }}</label>
                                    @endforeach

                                </div>
                            @endforeach

                        </div><!-- end of tab content -->

                    </div><!-- end of nav tabs -->

                </div>

            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary" style="background-color: #041C32">Submit</button>
            </div>
        </form>
    </div>
    <script>
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>
    <script type="text/javascript">
        function display(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(event) {
                    $('#myid').attr('src', event.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#demo").change(function() {
            display(this);
        });
    </script>
@endsection

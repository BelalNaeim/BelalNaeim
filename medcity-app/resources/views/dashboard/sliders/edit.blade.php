@extends('layout.master')

@section('page')
    {{ __('Slider Edit') }}
@endsection

@section('link')
    {{ route('sliders.index') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Slider</h3>
                </div>


                <form action="{{ route('sliders.update', $slider->id) }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('put') }}
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{ __('Title en') }}</label>
                                    <input type="text" name="title_en" class="form-control" id="exampleInputEmail1"
                                        placeholder="Enter English title" value="{{ $slider->title['en'] }}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{ __('Title ar') }}</label>
                                    <input type="text" name="title_ar" class="form-control" id="exampleInputEmail1"
                                        placeholder="Enter Arabic title" value="{{ $slider->title['ar'] }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{ __('Description en') }}</label>
                                    <textarea name="desc_en" class="form-control" id="exampleInputEmail1" placeholder="Enter English Description">{{ $slider->description['en'] }}</textarea>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{ __('Description ar') }}</label>
                                    <textarea name="desc_ar" class="form-control" id="exampleInputEmail1" placeholder="Enter Arabic Description">{{ $slider->description['ar'] }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="form-group">
                            <label for="exampleInputFile">{{ __('Slider Image') }}</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="form-control" name="image" accept="image/*"
                                        onchange="loadFile(event)">
                                    <img id="output" style="width: 80px" />
                                </div>


                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Old Image</label>
                                <img src="{{ URL::to($slider->image) }}" style="width: 70px; height: 50px;">
                                <input type="hidden" name="oldimage" value="{{ $slider->image }}">
                            </div>
                        </div>
                    </div>

            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
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

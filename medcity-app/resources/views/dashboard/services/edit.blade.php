@extends('layout.master')

@section('page')
    {{ __('Services') }}
@endsection

@section('link')
    {{ route('services.index') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Service</h3>
                </div>


                <form action="{{ route('services.update', $service->id) }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('put') }}
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{ __('Name en') }}</label>
                                    <input type="text" name="name_en" class="form-control" id="exampleInputEmail1"
                                        placeholder="Enter English Service Name" value="{{ $service->name['en'] }}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{ __('Name ar') }}</label>
                                    <input type="text" name="name_ar" class="form-control" id="exampleInputEmail1"
                                        placeholder="Enter Arabic Service Name" value="{{ $service->name['ar'] }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{ __('Description en') }}</label>
                                    <textarea name="desc_en" class="form-control" id="exampleInputEmail1" placeholder="Enter English Description">{{ $service->description['en'] }}</textarea>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{ __('Description ar') }}</label>
                                    <textarea name="desc_ar" class="form-control" id="exampleInputEmail1" placeholder="Enter Arabic Description">{{ $service->description['ar'] }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="form-group">
                            <label for="exampleInputFile">{{ __('Service Image') }}</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="form-control" name="image" accept="image/*"
                                        onchange="loadFile(event)">
                                    <img id="output" style="width: 80px" />
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Old Image</label>
                                    <img src="{{ URL::to($service->image) }}" style="width: 70px; height: 50px;">
                                    <input type="hidden" name="oldimage" value="{{ $service->image }}">
                                </div>

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

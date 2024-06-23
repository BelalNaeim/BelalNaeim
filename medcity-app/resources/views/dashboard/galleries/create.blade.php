@extends('layout.master')

@section('page')
    {{ __('Galleries') }}
@endsection

@section('link')
    {{ route('galleries.index') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header" style="background-color: #041C32">
                    <h3 class="card-title">Add Gallery</h3>
                </div>


                <form action="{{ route('galleries.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{ __('Name en') }}</label>
                                    <input type="text" name="name_en" class="form-control" id="exampleInputEmail1"
                                        placeholder="Enter English title">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{ __('Name ar') }}</label>
                                    <input type="text" name="name_ar" class="form-control" id="exampleInputEmail1"
                                        placeholder="Enter Arabic title">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputName1">{{ __('Photo Type') }}</label>
                            <select class="form-control" name="type">

                                <option value="1">Big Photo </option>
                                <option value="0">Small Photo </option>

                            </select>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="form-group">
                            <label for="exampleInputFile">{{ __('Gallery Image') }}</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="form-control" name="photo" accept="image/*"
                                        onchange="loadFile(event)">
                                    <img id="output" style="width: 80px" />
                                </div>

                            </div>
                        </div>
                    </div>

            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary" style="background-color: #041C32">Submit</button>
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

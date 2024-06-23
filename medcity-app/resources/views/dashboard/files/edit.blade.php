@extends('layout.master')

@section('page')
    {{ __('Files') }}
@endsection

@section('link')
    {{ route('files.index') }}
@endsection

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ __('Add File') }}</h3>
        </div>


        <form action="{{ route('files.update', $file->id) }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('put') }}
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">File Name</label>
                    <input type="text" name="filename" class="form-control" id="exampleInputEmail1"
                        placeholder="Enter File Name" value="{{ $file->filename }}">
                </div>

                <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input class="form-control" name="file" type="file" id="formFile">
                            <input type="hidden" name="oldfile" value="{{ $file->path }}">

                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
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

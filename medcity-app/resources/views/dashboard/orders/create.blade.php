@extends('layout.master')

@section('page')
    {{ __('Services') }}
@endsection

@section('link')
    {{ route('orders.index') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header" style="background-color: #041C32">
                    <h3 class="card-title">Add Order</h3>
                </div>


                <form action="{{ route('orders.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{ __('Description en') }}</label>
                                    <textarea name="desc_en" class="form-control" id="exampleInputEmail1" placeholder="Enter English Description"></textarea>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{ __('Description ar') }}</label>
                                    <textarea name="desc_ar" class="form-control" id="exampleInputEmail1" placeholder="Enter Arabic Description"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="form-group">
                            <label for="exampleInputFile">{{ __('Choose Service') }}</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <select class="form-control select2" data-placeholder="Choose country"
                                        name="category_id">
                                        <option label="Choose Category"></option>
                                        @foreach ($services as $service)
                                            <option value="{{ $service->id }}">{{ $service->name['en'] }}</option>
                                        @endforeach
                                    </select>
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

@extends('layouts.main')
@section('content')
    <?php
    $pull = 'float-left';
    ?>
    <ol class="breadcrumb">
        <li class="breadcrumb-item {{ $pull }}"><a href="{{ URL::to('/dashboard') }}"> Home</a></li>
        <li class="breadcrumb-item {{ $pull }}"><a href="{{ URL::to('/slider') }}"> Slider</a></li>
        <li class="breadcrumb-item active {{ $pull }}">Create Slider</li>
    </ol>
    <!-- <div class="content-wrapper"> -->
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add Slider</h4>

                <form method="post" action="{{ route('store.slider') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputUsername1">Slider Title</label>
                        <input type="text" class="form-control" name="title" placeholder="slider title">

                        @if ($errors->has('title'))
                            <span class="text-danger">{{ $errors->first('title') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect2">Description</label>
                        <input name="description" class="form-control" placeholder="Enter Slider Description"
                            type="textarea">
                        @if ($errors->has('description'))
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                        @endif
                    </div>



                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Image One ( Main Thumbnali): <span
                                    class="tx-danger">*</span></label>
                            <label class="custom-file">
                                <input class="btn btn-primary mr-2 pd-x-30 mg-r-5 mg-t-5" type="file" id="file"
                                    class="custom-file-input" name="image_one" onchange="readURL(this);" required="">
                                <span class="custom-file-control"></span>
                                <img src="#" id="one" alt="">
                            </label>

                        </div>
                    </div><!-- col-4 -->


                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Image Two: <span class="tx-danger">*</span></label>
                            <label class="custom-file">
                                <input class="btn btn-primary mr-2 pd-x-30 mg-r-5 mg-t-5" type="file" id="file"
                                    class="custom-file-input" name="image_two" onchange="readURL2(this);" required="">
                                <span class="custom-file-control"></span>
                                <img src="#" id="two" alt="">
                            </label>

                        </div>
                    </div><!-- col-4 -->




                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Image Three: <span class="tx-danger">*</span></label>
                            <label class="custom-file">
                                <input class="btn btn-primary mr-2 pd-x-30 mg-r-5 mg-t-5" type="file" id="file"
                                    class="custom-file-input" name="image_three" onchange="readURL3(this);" required="">
                                <span class="custom-file-control"></span>
                                <img src="#" id="three" alt="">
                            </label>

                        </div>
                    </div><!-- col-4 -->

            </div><!-- row -->

            <hr>
            <br><br>


            <div class="form-group ">
                <button class="btn btn-primary mr-2 pd-x-30 mg-r-5 mg-t-5">Add slider</button>
            </div>
            </form>
        </div>
    </div>
    </div>
    <!-- </div> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="category_id"]').on('change', function() {
                var category_id = $(this).val();
                if (category_id) {

                    $.ajax({
                        url: "{{ url('/get/subcategory/') }}/" + category_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            var d = $('select[name="subcategory_id"]').empty();
                            $.each(data, function(key, value) {

                                $('select[name="subcategory_id"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .subcategory_name + '</option>');

                            });
                        },
                    });

                } else {
                    alert('danger');
                }

            });
        });
    </script>


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

    <script type="text/javascript">
        function readURL2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#two')
                        .attr('src', e.target.result)
                        .width(80)
                        .height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>



    <script type="text/javascript">
        function readURL3(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#three')
                        .attr('src', e.target.result)
                        .width(80)
                        .height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection

@extends('admin.admin_layouts')



@section('admin_content')
    @php
    $category = DB::table('categories')->get();
    $brand = DB::table('brands')->get();
    $subcategory = DB::table('subcategories')->get();

    @endphp


    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="index.html">Starlight</a>
            <span class="breadcrumb-item active">Product Section</span>
        </nav>

        <div class="sl-pagebody">

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Update Product
                    <a href="{{ route('all.product') }}" class="btn btn-success btn-sm pull-right"> All Product</a>
                </h6>
                <p class="mg-b-20 mg-sm-b-30">Update Prodcut From</p>

                <form method="post" action="{{ url('update/product/withoutphoto/' . $product->id) }} "
                    enctype="multipart/form-data">
                    @csrf

                    <div class="form-layout">
                        <div class="row mg-b-25">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="product_name"
                                        value="{{ $product->product_name }}">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="product_code"
                                        value="{{ $product->Product_code }}">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Quantity: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="product_quantity"
                                        value="{{ $product->Product_quantitiy }}">
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Discount Price: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="discount_price"
                                        value="{{ $product->discount_price }}">
                                </div>
                            </div><!-- col-4 -->



                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                                    <select class="form-control select2" data-placeholder="Choose country"
                                        name="category_id">
                                        <option label="Choose Category"></option>
                                        @foreach ($category as $row)
                                            <option value="{{ $row->id }}" <?php if ($row->id == $product->category_id) {
                                                echo 'selected';
                                            } ?>>
                                                {{ $row->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div><!-- col-4 -->









                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Selling Price: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="selling_price"
                                        placeholder="Selling Price" value="{{ $product->selling_price }}">
                                </div>
                            </div><!-- col-4 -->


                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Product Details: <span
                                            class="tx-danger">*</span></label>

                                    <textarea class="form-control" id="summernote" name="product_details">
                 {{ $product->product_details }}
             </textarea>

                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Video Link: <span class="tx-danger">*</span></label>
                                    <input class="form-control" name="video_link" value="{{ $product->video_link }}">
                                </div>
                            </div><!-- col-4 -->




                        </div><!-- row -->

                        <hr>
                        <br><br>




                        <div class="form-layout-footer">
                            <button class="btn btn-info mg-r-5">Update Product</button>

                        </div><!-- form-layout-footer -->
                    </div><!-- form-layout -->
            </div><!-- card -->

            </form>

        </div><!-- row -->




        <div class="sl-pagebody">

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Update Images </h6>
                <form method="post" action="{{ url('update/product/photo/' . $product->id) }} "
                    enctype="multipart/form-data">
                    @csrf


                    <div class="row">
                        <div class="col-lg-6 col-sm-6">

                            <label class="form-control-label">Image One ( Main Thumbnali): <span
                                    class="tx-danger">*</span></label><br>
                            <label class="custom-file">
                                <input type="file" id="file" class="custom-file-input" name="image_one"
                                    onchange="readURL(this);">
                                <span class="custom-file-control"></span>
                                <input type="hidden" name="old_one" value="{{ $product->image_one }}">
                                <img src="#" id="one">
                            </label>
                        </div>

                        <div class="col-lg-6 col-sm-6">
                            <img src=" {{ URL::to($product->image_one) }} " style="width: 80px; height: 80px;">
                        </div>

                    </div><!-- col-4 -->

                    <div class="row">
                        <div class="col-lg-6 col-sm-6">

                            <label class="form-control-label">Image Two: <span class="tx-danger">*</span></label><br>
                            <label class="custom-file">
                                <input type="file" id="file" class="custom-file-input" name="image_two"
                                    onchange="readURL2(this);">
                                <span class="custom-file-control"></span>
                                <input type="hidden" name="old_two" value="{{ $product->image_two }}">
                                <img src="#" id="two">
                            </label>
                        </div>

                        <div class="col-lg-6 col-sm-6">
                            <img src=" {{ URL::to($product->image_two) }} " style="width: 80px; height: 80px;">
                        </div>
                    </div><!-- col-4 -->


                    <div class="row">
                        <div class="col-lg-6 col-sm-6">

                            <label class="form-control-label">Image Three: <span class="tx-danger">*</span></label><br>
                            <label class="custom-file">
                                <input type="file" id="file" class="custom-file-input" name="image_three"
                                    onchange="readURL3(this);">
                                <span class="custom-file-control"></span>
                                <input type="hidden" name="old_three" value="{{ $product->image_three }}">
                                <img src="#" id="three">
                            </label>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <img src=" {{ URL::to($product->image_three) }} " style="width: 80px; height: 80px;">
                        </div>
                    </div><!-- col-4 -->

                    <button type="submit" class="btn btn-sm btn-warning"> Update Photo</button>
                </form>

            </div>
        </div>


    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

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

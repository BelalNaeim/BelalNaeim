@extends('admin.admin_layouts')

@section('admin_content')

    <div class="sl-mainpanel">


        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Category Update</h5>

            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Category Update

                </h6>


                <div class="table-wrapper">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="post" action="{{ route('store.category') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body pd-20">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Category Name</label>
                                <input type="text" class="form-control" id="exampleInputName"
                                    aria-describedby="emailHelp" placeholder="Category" name="category_name">

                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Category Image Upload </label>
                                <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1"> Old Category Image</label>
                                <img src="{{ URL::to($category->cat_image) }}" height="70px;" width="90px;">
                                <input type="hidden" name="old_logo" value="{{ $category->cat_image }}">

                            </div>


                        </div><!-- modal-body -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-info pd-x-20">Sumbit</button>
                            <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
                        </div>
                    </form>


                </div><!-- table-wrapper -->
            </div><!-- card -->




        </div><!-- sl-mainpanel -->





    @endsection

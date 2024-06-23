@extends('admin.admin_layouts')

@section('admin_content')

    <div class="sl-mainpanel">


        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Sliders Table</h5>

            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Slider List
                    <a href="#" class="btn btn-sm btn-warning" style="float: right;" data-toggle="modal"
                        data-target="#modaldemo3">Add New</a>
                </h6>


                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Image_One</th>
                                <th>Image_Two</th>
                                <th>Image_Three</th>
                                <th style="width: 40px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sliders as $key => $slider)
                                <tr>
                                    <td style="width: 10%">{{ $loop->iteration }}</td>
                                    <td style="width: 10%">{{ $slider->title }}</td>
                                    <td style="width: 10%">{{ \Illuminate\Support\Str::limit($slider->description, 10) }}
                                    </td>
                                    <td style="width: 15%"><img src="{{ asset($slider->image_one) }}" alt="">
                                    </td>
                                    <td style="width: 15%"><img src="{{ asset($slider->image_two) }}" alt=""></td>
                                    <td style="width: 15%"><img src="{{ asset($slider->image_three) }}" alt=""></td>
                                    <td>
                                        <a href="{{ route('slider.edit', $slider->id) }}" class="btn btn-info">Edit</a>
                                        <a href='' data-toggle="modal"
                                            data-target="#modal_single_del{{ $key }}"
                                            class='btn btn-danger m-r-1em'>Delete </a>
                                    </td>
                                </tr>


                                @if (isset($key))
                                    <div class="modal" id="modal_single_del{{ $key }}" tabindex="-1"
                                        role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">delete confirmation</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <div class="modal-body">
                                                    Remove {{ $slider->title }} !!!!
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="{{ url('/slider/' . $slider->id) }}" method="post">
                                                        @csrf
                                                        @method('delete')

                                                        <div class="not-empty-record">
                                                            <button type="submit" class="btn btn-primary">Delete</button>
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">close</button>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                        </tbody>
                        @endif
                        @endforeach

                        </tbody>
                    </table>
                </div><!-- table-wrapper -->
            </div><!-- card -->




        </div><!-- sl-mainpanel -->



        <!-- LARGE MODAL -->
        <div id="modaldemo3" class="modal fade">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content tx-size-sm">
                    <div class="modal-header pd-x-20">
                        <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Category Add</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

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




                        </div><!-- modal-body -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-info pd-x-20">Submit</button>
                            <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div><!-- modal-dialog -->
        </div><!-- modal -->



    @endsection

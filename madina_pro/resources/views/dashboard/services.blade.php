
@extends('layouts.dashboard.app')

@section('title', 'الخدمات')
@section('content')

    <div class="section-body">
        <div class="container-fluid">
            @if (count($errors)>0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $err)
                        <li>{{$err}}</li>
                    @endforeach
                </div>
            @endif
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#addModal">إضافة خدمة جديدة</button><br />
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="table-responsive mb-4">
                        <table class="table table-hover js-basic-example dataTable table_custom spacing5">
                            <thead>
                                    <tr>
                                        <th width="10%">#</th>
                                        <th width="20%">صورة الخدمة</th>
                                        <th width="20%">إسم الخدمة</th>
                                        <th width="30%">تفاصيل الخدمة</th>
                                        <th width="20%">عمليات</th>
                                    </tr>
                            </thead>
                            <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>صورة الخدمة</th>
                                        <th>إسم الخدمة</th>
                                        <th>تفاصيل الخدمة</th>
                                        <th>عمليات</th>
                                    </tr>
                            </tfoot>
                            <tbody>
                                    @if (count($services)==0)
                                        <tr>
                                            <td colspan="5" class="text-center">No Services</td>
                                        </tr>
                                    @else
                                        @foreach ($services as $service)
                                            <tr>
                                                <td>{{$service->id}}</td>
                                                <td><img src="{{asset('public/imgs/sevicesimg/'.$service->image)}}" width="100" /></td>
                                                <td>{{$service->title}}</td>
                                                <td>{{$service->description}}</td>
                                                <td>
                                                   <button type="button" data-id="{{$service->id}}" class="btn btn-success" data-toggle="modal" data-target="#editModalservice">تعديل</button>
                                                   <button type="button" data-id="{{$service->id}}" class="btn btn-danger" data-toggle="modal" data-target="#deleteModalservice">حذف</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                            </tbody>
                        </table>
                    </div>
                </div>                
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="deleteModalservice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">حذف خدمة</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>هل أنت متأكد من حذف هذه الخدمة ؟</p>
                </div>
                <div class="modal-footer">
                    <form id="deleteForm" action="" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">تأكيد الحذف</button>
                    </form>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                </div>
            </div>
        </div>
    </div>   

    <!-- Modal -->
    <div class="modal fade" id="editModalservice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">تعديل خدمة</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editForm" action="" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                            <div class="form-group mb-0">
                                <label class="form-label">صورة الخدمة</label>
                                <input type="file" class="form-control" name="image" />
                            </div>
                            <div class="form-group mb-0">
                                <label class="form-label">إسم الخدمة</label>
                                <input type="text" class="form-control" name="title" />
                            </div>
                            <div class="form-group mb-0">
                                <label class="form-label">تفاصيل الخدمة</label>
                                <textarea class="form-control" rows="5" name="description"></textarea>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">تعديل البيانات</button>
                        <button type="button" class="btn btn-secondary mx-2" data-dismiss="modal">إلغاء</button>
                    </div>
                </form>
            </div>
        </div>
    </div>   

    <!-- Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">إضافة خدمة جديدة</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="addForm" action="{{url('Dashboard/services')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="modal-body">
                            <div class="form-group ">
                                <label class="form-label">إسم الخدمة</label>
                                <input type="text" class="form-control" name="title" />
                            </div>
                            <div class="form-group">
                                <label class="form-label">صورة الخدمة</label>
                                <input type="file" id="Upload" class="form-control" name="image" />
                            </div>
                            <div class="form-group">
                                <label class="form-label">تفاصيل الخدمة</label>
                                <textarea class="form-control" rows="5" name="description"></textarea>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">حفظ البيانات</button>
                        <button type="button" class="btn btn-secondary mx-2" data-dismiss="modal">إلغاء</button>
                    </div>
                </form>
            </div>
        </div>
    </div>   
@endsection
@extends('layouts.dashboard.app')

@section('title','قطاعات المشاريع')
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
                <button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#addModal">إضافة قطاع مشاريع جديد</button><br />
                <div class="row clearfix">
                    <div class="col-lg-12">
                        <div class="table-responsive mb-4">
                            <table class="table table-hover js-basic-example dataTable table_custom spacing5">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>إسم القطاع</th>
                                        <th>صورة القطاع</th>
                                        <th>عمليات</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>إسم القطاع</th>
                                        <th>صورة القطاع</th>
                                        <th>عمليات</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @if (count($status)==0)
                                        <tr>
                                            <td colspan="4" class="text-center">No Status</td>
                                        </tr>
                                    @else
                                        @foreach ($status as $st)
                                            <tr>
                                                <td>{{$st->id}}</td>
                                                <td>{{$st->name}}</td>
                                                <td><img src="{{asset('public/imgs/status/'.$st->image)}}" width="100" /></td>
                                                <td>
                                                   <button type="button" data-id="{{$st->id}}" class="btn btn-success" data-toggle="modal" data-target="#editModalstatus">تعديل</button>
                                                   <button type="button" data-id="{{$st->id}}" class="btn btn-danger" data-toggle="modal" data-target="#deleteModalstatus">حذف</button>
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
    <div class="modal fade" id="deleteModalstatus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">حذف قطاع</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>هل أنت متأكد من حذف هذا القطاع ؟</p>
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
    <div class="modal fade" id="editModalstatus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">تعديل قطاع</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editForm" action="" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body"> 
                            <div class="form-group">
                                <label class="form-label">إسم القطاع</label>
                                <input type="text" class="form-control" name="name" />
                            </div>
                            <div class="form-group">
                                <label class="form-label"> صورة القطاع</label>
                                <input type="file" id="Upload" class="form-control" name="image">
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
                    <h5 class="modal-title" id="exampleModalLabel">إضافة قطاع جديد</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form  id="addForm" action="{{url('Dashboard/status')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="modal-body">     
                        <div class="form-group ">
                            <label class="form-label">إسم القطاع</label>
                            <input type="text" class="form-control" name="name" />
                        </div>   
                        <div class="form-group">
                            <label class="form-label"> صورة القطاع</label>
                            <input type="file" id="Upload" class="form-control" name="image">
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
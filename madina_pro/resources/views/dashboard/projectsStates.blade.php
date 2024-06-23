
@extends('layouts.dashboard.app')

@section('title', 'محافظات المشاريع')
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
                <button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#addModal">إضافة محافظة مشاريع جديدة</button><br />
                <div class="row clearfix">
                    <div class="col-lg-12">
                        <div class="table-responsive mb-4">
                            <table class="table table-hover js-basic-example dataTable table_custom spacing5">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>إسم المحافظة</th>
                                        <th>عمليات</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>إسم المحافظة</th>
                                        <th>عمليات</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @if (count($states)==0)
                                        <tr>
                                            <td colspan="3" class="text-center">No States</td>
                                        </tr>
                                    @else
                                        @foreach ($states as $st=>$state)
                                            <tr>
                                                <td>{{$st + 1}}</td>
                                                <td>{{$state->name}}</td>
                                                <td>
                                                   <button type="button" data-id="{{$state->id}}" class="btn btn-success" data-toggle="modal" data-target="#editModalstates">تعديل</button>
                                                   <button type="button" data-id="{{$state->id}}" class="btn btn-danger" data-toggle="modal" data-target="#deleteModalstates">حذف</button>
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
    <div class="modal fade" id="deleteModalstates" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">حذف محافظة مشاريع</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>هل أنت متأكد من حذف هذه المحافظة ؟</p>
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
    <div class="modal fade" id="editModalstates" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">تعديل محافظة المشاريع</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editForm" action="" method="post">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                            <div class="form-group mb-0">
                                <label class="form-label">إسم محافظة المشاريع</label>
                                <input type="text" class="form-control" name="name" />
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">تعديل البيانات</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
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
                    <h5 class="modal-title" id="exampleModalLabel">إضافة محافظة مشاريع جديدة</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form  id="addForm" action="{{url('Dashboard/States')}}" method="post">
                    @csrf
                    @method('POST')
                    <div class="modal-body">
                            <div class="form-group mb-0">
                                <label class="form-label">إسم محافظة المشاريع</label>
                                <input type="text" class="form-control" name="name" />
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">حفظ البيانات</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                    </div>
                </form>
            </div>
        </div>
    </div>   
@endsection
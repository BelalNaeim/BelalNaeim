@extends('layouts.dashboard.app')

@section('title', 'المستخدمين')
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
                @if(auth()->user()->hasPermission('users_create'))
                <button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#addModal">إضافة مستخدم جديد</button><br />
                @else 
                <button type="button" class="btn btn-success btn-block disabled">إضافة مستخدم جديد</button><br />
                @endif
                <div class="row clearfix">
                    <div class="col-lg-12">
                        <div class="table-responsive mb-4">
                            <table class="table table-hover js-basic-example dataTable table_custom spacing5">
                                <thead>
                                    <tr>
                                        <th>إسم المستخدم</th>
                                        <th>البريد الإلكتروني</th>
                                        <th>الرتبة</th>
                                        <th>عمليات</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>إسم المستخدم</th>
                                        <th>البريد الإلكتروني</th>
                                        <th>الرتبة</th>
                                        <th>عمليات</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @if (count($users)==0)
                                        <tr>
                                            <td colspan="4" class="text-center">No Users</td>
                                        </tr>
                                    @else
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->email}}</td>
                                                <td>{{$user->role}}</td>
                                                <td>
                                                   {{-- <button type="button" data-id="{{$user->id}}" class="btn btn-success" data-toggle="modal" data-target="#editModal">تعديل</button> --}}
                                                   @if(auth()->user()->hasPermission('users_update'))
                                                   <button type="button" data-id="{{$user->id}}" class="btn btn-success" data-toggle="modal" data-target="#editModal">تعديل</button>
                                                   @else 
                                                   <button type="button" class="btn btn-success disabled">تعديل</button>
                                                   @endif
                                                   
                                                   @if(auth()->user()->hasPermission('users_delete'))
                                                    <button type="button" data-id="{{$user->id}}" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">حذف</button>
                                                   @else 
                                                   <button type="button" class="btn btn-danger disabled">حذف</button>
                                                   @endif
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
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">حذف مستخدم</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>هل أنت متأكد من حذف هذا المستخدم ؟</p>
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
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">تعديل بيانات مستخدم</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editForm" action="" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="form-group mb-0 col-6">
                                <label class="form-label">إسم المستخدم</label>
                                <input type="text" name="name" class="form-control" />
                            </div>
                            <div class="form-group mb-0 col-6">
                                <label class="form-label">البريد الإلكتروني</label>
                                <input type="email" name="email" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group mb-0">
                            <label class="form-label">الرتبة</label>
                            <select class="form-control" name="role">
                                <option value="مدير عام"  
                                >مدير عام</option>
                                <option value="مشرف"
                                >مشرف</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="form-group mb-0 col-6">
                                <label class="form-label">الرقم السري</label>
                                <input type="password" name="password" class="form-control" />
                            </div>
                            <div class="form-group mb-0 col-6">
                                <label class="form-label">تأكيد الرقم السري</label>
                                <input type="password" name="password_confirmation" class="form-control" />
                            </div>
                        </div>
                        <hr>
                        <div>
                            <button type="submit" class="btn btn-success">تعديل البيانات</button>
                            <button type="button" class="btn btn-secondary mx-2" data-dismiss="modal">إلغاء</button>
                        </div> 
                    </form>
                </div>
            </div>
        </div>
    </div>   

    <!-- Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                 
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">إضافة مستخدم جديد</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addForm" action="{{url('Dashboard/users')}}" method="post">
                        @csrf
                        @method('POST')
                        <div class="row">
                            <div class="form-group mb-0 col-6">
                                <label class="form-label">إسم المستخدم</label>
                                <input type="text" name="name" class="form-control" />
                            </div>
                            <div class="form-group mb-0 col-6">
                                <label class="form-label">البريد الإلكتروني</label>
                                <input type="email" name="email" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group mb-0">
                            <label class="form-label">الرتبة</label>
                            <select class="form-control" name="role">
                                <option value="مدير عام"  
                                >مدير عام</option>
                                <option value="مشرف"
                                >مشرف</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="form-group mb-0 col-6">
                                <label class="form-label">الرقم السري</label>
                                <input type="password" name="password" class="form-control" />
                            </div>
                            <div class="form-group mb-0 col-6">
                                <label class="form-label">تأكيد الرقم السري</label>
                                <input type="password" name="password_confirmation" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="mt-3">الصلاحيات</label>
                            @php 
                                $models=['users','projects'];
                                $maps=['read','create','update','delete'];

                            @endphp
                            <ul class="nav nav-tabs">
                                @foreach ($models as $index=>$model)
                                    <li class="nav-item">
                                        <a class="nav-link {{ $index==0 ? 'active':'' }}" data-toggle="tab" href="#{{ $model }}" >{{ $model }}</a>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="tab-content mt-3" id="myTabContent">    
                                @foreach ($models as $index=>$model)
                                <div class="tab-pane fade show {{ $index==0 ? 'active':'' }}" id="{{ $model }}" role="tabpanel" aria-labelledby="home-tab">
                                    @foreach ($maps as $map)
                                    <label class="my-2"><input type="checkbox" name="permissions[]"checked value="{{ $model .'_'. $map }}"> {{ $map }}</label>
                                    @endforeach
                                </div>
                                @endforeach
                           </div>
                        </div>  {{--end of nav_tabs --}}
                        <hr>
                        <div>
                            <button type="submit" class="btn btn-success">حفظ البيانات</button>
                            <button type="button" class="btn btn-secondary mx-2" data-dismiss="modal">إلغاء</button>
                        </div> 
                    </form>
                </div>
            </div>
        </div>
    </div>   
@endsection

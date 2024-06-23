
@extends('layouts.dashboard.app')

@section('title', 'المشروع')
@section('content')
    
        <div class="section-body">
                <div class="container-fluid">
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="table-responsive mb-4">
                                <table class="table table-hover js-basic-example dataTable table_custom spacing5">
                                    <thead>
                                        <tr>
                                            <th>إسم المشروع</th>
                                            <th>المحافظة</th>
                                            <th>قطاع المشروع</th>
                                            <th>حالة المشروع</th>
                                            <th>عمليات</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>إسم المشروع</th>
                                            <th>المحافظة</th>
                                            <th>قطاع المشروع</th>
                                            <th>حالة المشروع</th>
                                            <th>عمليات</th>
                                        </tr>
                                    </tfoot>
                                    <tbody> 
                                        @if ($project)
                                            <tr>
                                                    <td>{{$project->name}}</td>
                                                    <td>{{$project->governorate['name']}}</td>
                                                    <td>@foreach($project->statuses as $status)
                                            {{ $status->name }}/
                                            @endforeach</td>
                                                    <td>{{$project->type['name']}}</td>
                                                    <td>
                                                       <a href="{{url('Dashboard/projects/')}}" class="btn btn-danger">عرض الكل</a>                                   
                                                       <a href="{{url('Dashboard/projects/'.$project->id.'/edit')}}" class="btn btn-secondary">تعديل</a>
                                                       <button type="button" data-id="{{$project->id}}" class="btn btn-danger" data-toggle="modal" data-target="#deleteModalproject">حذف</button>
                                                    </td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>                
                    </div>
                </div>
        </div>
    
       <!-- Modal -->
        <div class="modal fade" id="deleteModalproject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">حذف عنصر</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>هل أنت متأكد من حذف هذا العنصر ؟</p>
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
@endsection
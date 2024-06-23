@extends('layouts.dashboard.app')

@section('title','إضافة تطورات مشاريع جديدة')
@section('content')

        <div class="section-body">
            <div class="container-fluid">
                <div class="row">
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
                    <div class="col-md-12 col-lg-12">
                        <form class="card" enctype="multipart/form-data" method="POST" action="{{url('Dashboard/projectsNews')}}">
                            @method('POST')
                            @csrf
                            <div class="card-body">
                                <h3>إضافة تطورات مشاريع جديدة</h3>
                                <hr /><br />
                                <div class="row">

                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">المشروع</label>
                                            <select class="form-control" name="project_id">
                                                @foreach($projects as $project)
                                                <option value="{{$project->id}}" >{{$project->name}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label">تاريخ الخبر</label>
                                            <input type="date" class="form-control" name="date"/>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label">كاتب الخبر</label>
                                            <input type="text" class="form-control" value="{{Auth::user()->name}}" name="writer" disabled/>
                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label">عنوان الخبر</label>
                                            <input type="text" class="form-control" name="title">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label">نص الخبر</label>
                                            <textarea rows="7" class="form-control" name="description"></textarea>
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">صورة الخبر الرئيسية</label>
                                            <input type="file" class="form-control" accept="image/x-png,image/gif,image/jpeg,image/jpg" name="image">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">صور الخبر الإضافية</label>
                                            <input type="file" class="form-control" accept="image/x-png,image/gif,image/jpeg,image/jpg" name="photos[]" multiple />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">رابط الفيديو على اليوتيوب</label>
                                            <input type="url" class="form-control" name="vedio"/>
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary btn-block">حفظ البيانات</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
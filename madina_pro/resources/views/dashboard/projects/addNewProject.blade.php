
@extends('layouts.dashboard.app')

@section('title','إضافة مشروع جديد')
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
                        <form class="card" enctype="multipart/form-data" method="POST" action="{{url('Dashboard/projects')}}">
                            @method('POST')
                            @csrf
                            <div class="card-body">
                                <h3> إضافة مشروع جديد</h3>
                                <hr /><br />
                                <div class="row">
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">إسم المشروع</label>
                                            <input type="text" class="form-control" name="name" value="">
                                        </div>
                                    </div>
                                    <div class="col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label class="form-label">محافظة المشروع</label>
                                            <select class="form-control custom-select" name="governorate_id">
                                                @foreach($states as $state)
                                                <option value="{{$state->id}}" >{{$state->name}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label">حجم المشروع</label>
                                            <select class="form-control custom-select" name="size" >
                                                    <option value="عادي">عادي</option>
                                                    <option value="ضخم">ضخم</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">قطاعات المشروع</label>
                                            <select class="form-control custom-select" name="status[]" multiple>
                                                @foreach($status as $st)
                                                    <option value="{{$st->id}}">{{$st->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">حالة المشروع</label>
                                            <select class="form-control custom-select" name="type_id">
                                                @foreach($types as $type)
                                                    <option value="{{$type->id}}" >{{$type->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">مساحة المشروع بالمتر المربع</label>
                                            <input type="text" class="form-control" name="space" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">ميزانية المشروع بالريال السعودي</label>
                                            <input type="number" class="form-control" name="budget" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">بداية التنفيذ</label>
                                            <input type="date" class="form-control" name="start_date" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">نهاية التنفيذ</label>
                                            <input type="date" class="form-control" name="end_date" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">شعار المالك</label>
                                            <input type="file" id="Upload" class="form-control" name="image" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">إسم المقاول</label>
                                            <input type="text" class="form-control" name="contractor_name" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">إسم الإستشاري</label>
                                            <input type="text" class="form-control" name="consultant_name" value="">
                                        </div>
                                    </div>

                                    <div class="col-md-12" style="padding-top:30px;">
                                        <div class="form-group mb-0">
                                            <label class="form-label">رابط عنوان المشروع على الخريطة</label>
                                            <input type="url" class="form-control" name="location" value=""/>
                                        </div>
                                    </div> 
                                    <div class="col-md-6" style="padding-top:30px;">
                                        <div class="form-group mb-0">
                                            <label class="form-label">صور المشروع (يسمح بالإختيارات المتعددة)</label>
                                            <input type="file" class="form-control" multiple name="galleries[]" />
                                        </div>
                                    </div>
                                    <div class="col-md-6" style="padding-top:30px;">
                                        <div class="form-group mb-0">
                                            <label class="form-label">صورة المشروع الرئيسية</label>
                                            <input type="file" class="form-control"  name="main_photo" />
                                        </div>
                                    </div>
                                    <div class="col-md-12" style="padding-top:30px;">
                                        <div class="form-group mb-0">
                                            <label class="form-label">معلومات المشروع</label>
                                            <textarea rows="5" class="form-control" name="description">
                                               
                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">حفظ البيانات</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>
@endsection
<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Status;

class StatusController extends Controller
{
    public function index()
    {
        $status=Status::all();
        return view('dashboard/projectsStatus',compact('status'));
    }

    public function create()
    {
        // 
    }

    public function store(Request $request)
    {
        $data=$request->all();
        $request->validate([
            'name'=>'required|unique:statuses',
            'image'=>'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        if($request->image){
            $name = $request->name;
            $imgName = $name.'.'.$request->image->extension();
            $request->image->move(public_path('imgs/status'),$imgName);
            $data['image']=$imgName;
        }

        $status = Status::create($data);

       return back()->with('status','تم اضافة قطاع جديد بنجاح');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
             'image'=>'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $data=$request->except(['_token','_method']);
        if($request->image){
            $name = $request->name;
            $imgName = $name.'.'.$request->image->extension();
            $request->image->move(public_path('imgs/status'),$imgName);
            $data['image']=$imgName;
        }
        $status = Status::where('id', '=', $id)->update($data);
        
        return back()->with('status','تم تعديل بيانات القطاع بنجاح');
    }

    public function destroy($id)
    {
        $status = Status::find($id);
        $status->delete();
        
         return back()->with('status','تم حذف هذا القطاع بنجاح');
    }
}

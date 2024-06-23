<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $services=Service::all();
        return view('dashboard/services',compact('services'));
    }

    public function create()
    {
        // 
    }

    public function store(Request $request)
    {
        $data=$request->all();
        $request->validate([
            'image'=>'required',
            'title'=>'required',
            'description'=>'required'
        ]); 
        if($request->image){
            $name = $request->title;
            $imgName = $name.'.'.$request->image->extension();
            $request->image->move(public_path('imgs/sevicesimg'),$imgName);
            $data['image']=$imgName;
        }
        $services = Service::create($data);
        return back()->with('status','تم اضافة خدمة جديدة بنجاح');
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
            'image'=>'required',
            'title'=>'required',
            'description'=>'required'
        ]); 
        $data=$request->except(['_token','_method']);
        if($request->image){
            $name = $request->title;
            $imgName = $name.'.'.$request->image->extension();
            $request->image->move(public_path('imgs/sevicesimg'),$imgName);
            $data['image']=$imgName;
        }
        $services = Service::where('id', '=', $id)->update($data);
        
        return back()->with('status','تم تعديل الخدمة بنجاح');
    }

    public function destroy($id)
    {
        $services = Service::find($id);
        $services->delete();

        return back()->with('status','تم حذف هذه الخدمة بنجاح');
   }
}

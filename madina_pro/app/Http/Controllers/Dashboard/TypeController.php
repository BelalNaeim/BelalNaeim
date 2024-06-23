<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;

class TypeController extends Controller
{
    public function index()
    {
        $types=Type::all();
        return view('dashboard/projectsTypes',compact('types'));
    }

    public function create()
    {
        // 
    }

    public function store(Request $request)
    {
        $data=$request->all();
        $request->validate([
            'name'=>'required|unique:types',
        ]);
 
        $type = Type::create($data);

        return back()->with('status','تم اضافة الحالة بنجاح');
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
        ]);
        $data=$request->except(['_token','_method']);
        $type = Type::where('id', '=', $id)->update($data);
        
        return back()->with('status','تم تعديل بيانات الحالة بنجاح');
    }

    public function destroy($id)
    {
        $type = Type::find($id);
        $type->delete();
        
        return back()->with('status','تم حذف بيانات الحالة بنجاح');
    }
}

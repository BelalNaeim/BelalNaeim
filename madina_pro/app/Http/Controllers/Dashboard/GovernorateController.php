<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Governorate;

class GovernorateController extends Controller
{
    public function index()
    {
        $states=Governorate::all();
        return view('dashboard/projectsStates',compact('states'));
    }

    public function create()
    {
        // 
    }

    public function store(Request $request)
    {
        $data=$request->all();
        $request->validate([
            'name'=>'required|unique:governorates',
        ]);
 
        $states = Governorate::create($data);

         return back()->with('status','تم اضافة مدينه جديدة بنجاح');
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
        $states = Governorate::where('id', '=', $id)->update($data);
        
         return back()->with('status','تم تعديل المدينه بنجاح');
    }

    public function destroy($id)
    {
        $states = Governorate::find($id);
        $states->delete();

        return back()->with('status','تم حذف المدينة بنجاح');
    }
}

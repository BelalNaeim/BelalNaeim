<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DistrictController extends Controller
{
    //
    public function index()
    {
        $district = DB::table('districts')->orderBy('id', 'desc')->paginate(5);
        return view('backend.district.index', compact('district'));
    }

    public function AddDistrict()
    {
        return  view('backend.district.create');
    }

    public function StoreDistrict(Request $request)
    {
        $validatedData = $request->validate([
       'district_en' => 'required|unique:districts|max:255',
       'district_ar' => 'required|unique:districts|max:255',
      ]);

        $data = array();
        $data['district_en'] = $request->district_en;
        $data['district_ar'] = $request->district_ar;
        DB::table('districts')->insert($data);

        $notification = array(
            'message' => 'District Inserted Successfully',
            'alert-type' => 'success'
        );

        return Redirect()->route('district')->with($notification);
    }

    public function EditDistrict($id)
    {
        $district = DB::table('districts')->where('id', $id)->first();
        return view('backend.district.edit', compact('district'));
    }

    public function UpdateDistrict(Request $request, $id)
    {
        $validatedData = $request->validate([
            'district_en' => 'required|unique:districts|max:255',
            'district_ar' => 'required|unique:districts|max:255',
           ]);
     
        $data = array();
        $data['district_en'] = $request->district_en;
        $data['district_ar'] = $request->district_ar;
        DB::table('districts')->update($data);
     
        $notification = array(
                 'message' => 'District Updated Successfully',
                 'alert-type' => 'success'
             );
     
        return Redirect()->route('district')->with($notification);
    }

    
    public function DeleteDistrict($id)
    {
        DB::table('districts')->where('id', $id)->delete();
        $notification = array(
            'message' => 'Districts Dleleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('district')->with($notification);
    }
}

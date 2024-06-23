<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubCategoryController extends Controller
{
    //
    public function index()
    {
        $subcategory = DB::table('subcategories')
        ->join('categories', 'subcategories.category_id', 'categories.id')
        ->select('subcategories.*', 'categories.category_en')
        ->orderBy('id', 'desc')->paginate(5);
        return view('backend.subcategory.index', compact('subcategory'));
    }

    public function AddsubCategory()
    {
        $category = DB::table('categories')->get();
        return view('backend.subcategory.create', compact('category'));
    }

    public function StoreSubCategory(Request $request)
    {
        $validatedData = $request->validate([
       'subcategory_en' => 'required|unique:subcategories|max:255',
       'subcategory_ar' => 'required|unique:subcategories|max:255',
      ]);

        $data = array();
        $data['subcategory_en'] = $request->subcategory_en;
        $data['subcategory_ar'] = $request->subcategory_ar;
        $data['category_id'] = $request->category_id;
        DB::table('subcategories')->insert($data);

        $notification = array(
            'message' => 'SubCategory Inserted Successfully',
            'alert-type' => 'success'
        );

        return Redirect()->route('subcategories')->with($notification);
    }
    
    public function EditSubCategory(Request $request, $id)
    {
        $subcategory = DB::table('subcategories')->where('id', $id)->first();
        $category = DB::table('categories')->get();
        return view('backend.subcategory.edit', compact('subcategory', 'category'));
    }

    public function UpdateSubCategory(Request $request, $id)
    {
        $validatedData = $request->validate([
            'subcategory_en' => 'required|unique:subcategories|max:255',
            'subcategory_ar' => 'required|unique:subcategories|max:255',
           ]);
     
        $data = array();
        $data['subcategory_en'] = $request->subcategory_en;
        $data['subcategory_ar'] = $request->subcategory_ar;
        $data['category_id'] = $request->category_id;
        DB::table('subcategories')->where('id', $id)->update($data);
     
        $notification = array(
                 'message' => 'SubCategory Updated Successfully',
                 'alert-type' => 'success'
             );
     
        return Redirect()->route('subcategories')->with($notification);
    }

    public function DeleteٍSubCategory($id)
    {
        DB::table('subcategories')->where('id', $id)->delete();
        $notification = array(
            'message' => 'SubCategory Dleleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('subcategories')->with($notification);
    }
}

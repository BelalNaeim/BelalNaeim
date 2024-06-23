<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\File;
use Image;

class PostController extends Controller
{
    //

    public function index()
    {
        $post = DB::table('posts')
            ->join('categories', 'posts.category_id', 'categories.id')
            ->join('subcategories', 'posts.subcategory_id', 'subcategories.id')
            ->join('districts', 'posts.district_id', 'districts.id')
            ->join('subdistricts', 'posts.subdistrict_id', 'subdistricts.id')
            ->select('posts.*', 'categories.category_en', 'subcategories.subcategory_en', 'districts.district_en', 'subdistricts.subdistrict_en')
            ->orderBy('id', 'desc')->paginate(5);

        return view('backend.post.index', compact('post'));
    }

    public function create()
    {
        $category = DB::table('categories')->get();
        $district = DB::table('districts')->get();
        return view('backend.post.create', compact('category', 'district'));
    }

    public function GetSubCategory($category_id)
    {
        $sub = DB::table('subcategories')->where('category_id', $category_id)->get();
        return response()->json($sub);
    }


    public function GetSubDistrict($district_id)
    {
        $sub = DB::table('subdistricts')->where('district_id', $district_id)->get();
        return response()->json($sub);
    }

    public function StorePost(Request $request)
    {

        $validatedData = $request->validate([
            'category_id' => 'required',
            'district_id' => 'required',
        ]);


        $data['title_en'] = $request->title_en;
        $data['title_ar'] = $request->title_ar;
        $data['user_id'] = Auth::id();
        $data['category_id'] = $request->category_id;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['district_id'] = $request->district_id;
        $data['subdistrict_id'] = $request->subdistrict_id;
        $data['tags_en'] = $request->tags_en;
        $data['tags_ar'] = $request->tags_ar;
        $data['details_en'] = $request->details_en;
        $data['details_ar'] = $request->details_ar;
        $data['headline'] = $request->headline;
        $data['first_section'] = $request->first_section;
        $data['first_section_thumbnail'] = $request->first_section_thumbnail;
        $data['bigthumbnail'] = $request->bigthumbnail;
        $data['post_date'] = date('d-m-Y');
        $data['post_month'] = date("F");



        $image = $request->image;
        if ($image) {
            $image_one = uniqid() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(500, 300)->save('image/postimg/' . $image_one);
            $data['image'] = 'image/postimg/' . $image_one;
            // image/postimg/343434.png
            DB::table('posts')->insert($data);

            $notification = array(
                'message' => 'Post Inserted Successfully',
                'alert-type' => 'success'
            );

            return Redirect()->route('all.post')->with($notification);
        } else {
            return Redirect()->back();
        } // End Condition


    }  // END Method 



    public function EditPost($id)
    {
        $post = DB::table('posts')->where('id', $id)->first();
        $category = DB::table('categories')->get();
        $district = DB::table('districts')->get();
        return view('backend.post.edit', compact('post', 'category', 'district'));
    }

    public function UpdatePost(Request $request, $id)
    {

        $validatedData = $request->validate([
            'category_id' => 'required|',
            'district_id' => 'required'
        ]);
        $data = array();
        $data['title_en'] = $request->title_en;
        $data['title_ar'] = $request->title_ar;
        $data['user_id'] = Auth::id();
        $data['category_id'] = $request->category_id;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['district_id'] = $request->district_id;
        $data['subdistrict_id'] = $request->subdistrict_id;
        $data['tags_en'] = $request->tags_en;
        $data['tags_ar'] = $request->tags_ar;
        $data['details_en'] = $request->details_en;
        $data['details_ar'] = $request->details_ar;
        $data['headline'] = $request->headline;
        $data['first_section'] = $request->first_section;
        $data['first_section_thumbnail'] = $request->first_section_thumbnail;
        $data['bigthumbnail'] = $request->bigthumbnail;
        $data['post_date'] = date('d-m-Y');
        $data['post_month'] = date("F");


        $oldimage = $request->oldimage;
        $image = $request->image;
        if ($image) {
            $image_one = uniqid() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(500, 300)->save('image/postimg/' . $image_one);
            $data['image'] = 'image/postimg/' . $image_one;
            // image/postimg/343434.png
            DB::table('posts')->where('id', $id)->update($data);
            unlink($oldimage);

            $notification = array(
                'message' => 'Post Updated Successfully',
                'alert-type' => 'success'
            );

            return Redirect()->route('all.post')->with($notification);
        } else {
            $data['image'] = $oldimage;
            DB::table('posts')->where('id', $id)->update($data);

            $notification = array(
                'message' => 'Post Updated Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->route('all.post')->with($notification);
        } // End Condition
    }  // End Method



    public function DeletePost($id)
    {
        $post = DB::table('posts')->where('id', $id)->first();
        unlink($post->image);

        DB::table('posts')->where('id', $id)->delete();

        $notification = array(
            'message' => 'Post Deleted Successfully',
            'alert-type' => 'error'
        );

        return Redirect()->route('all.post')->with($notification);
    }
}

<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ExtraController extends Controller
{
	//
	public function Arabic()
	{
		Session::get('lang');
		Session()->forget('lang');
		Session()->put('lang', 'arabic');
		return redirect()->back();
	}


	public function English()
	{
		Session::get('lang');
		Session()->forget('lang');
		Session()->put('lang', 'english');
		return redirect()->back();
	}

	public function SinglePost($id)
	{
		$post = DB::table('posts')
			->join('categories', 'posts.category_id', 'categories.id')
			->join('subcategories', 'posts.subcategory_id', 'subcategories.id')
			->join('users', 'posts.user_id', 'users.id')
			->select('posts.*', 'categories.category_en', 'categories.category_ar', 'subcategories.subcategory_en', 'subcategories.subcategory_ar', 'users.name')
			->where('posts.id', $id)->first();

		return view('main.single_post', compact('post'));
	}
	public function CatPost($id, $category_en)
	{
		$catposts = DB::table('posts')->where('category_id', $id)->orderBy('id', 'desc')->paginate(5);
		return view('main.allpost', compact('catposts'));
	}


	public function SubCatPost($id, $subcategory_en)
	{
		$subcatposts = DB::table('posts')->where('subcategory_id', $id)->orderBy('id', 'desc')->paginate(5);
		return view('main.subpost', compact('subcatposts'));
	}

	public function GetSubDist($district_id){
		$sub = DB::table('subdistricts')->where('district_id',$district_id)->get();
		return response()->json($sub);
	}

	public function SearchDistrict(Request $request){
		$distid = $request->district_id;
		$subdistid = $request->subdistrict_id;
	
	
	  $catposts = DB::table('posts')->where('district_id',$distid)->where('subdistrict_id',$subdistid)->orderBy('id','desc')->paginate(5);
		return view('main.allpost',compact('catposts'));
	
	  }
}

<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\backend\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image as Image;

class CategoryController extends Controller {
    //

    public function __construct() {
        $this->middleware( 'auth:admin' );
    }

    public function category() {
        $category = Category::all();
        return view( 'admin.category.category', compact( 'category' ) );
    }

    public function storecategory( Request $request ) {
        $validateData = validator::make( $request->all(), [
            'category_name' => 'required|unique:categories|max:55',
            'cat_image'=>'required|mimes:jpg,Jpeg|png'

        ] );
        $data[ 'category_name' ] = $request->category_name;
        $image = $request->image;
        if ( $image ) {
            $image_one = uniqid() . '.' . $image->getClientOriginalExtension();
            Image::make( $image )->resize( 500, 300 )->save( 'media/cat/' . $image_one );
            $data[ 'cat_image' ] = 'media/cat/' . $image_one;
            // image/postimg/343434.png
            DB::table( 'categories' )->insert( $data );

            $notification = array(
                'message' => 'Category Inserted Successfully',
                'alert-type' => 'success'
            );

            return Redirect()->route( 'categories' )->with( $notification );
        } else {
            return Redirect()->back();
        }
        // End Condition
    }

    public function Deletecategory( $id ) {
        DB::table( 'categories' )->where( 'id', $id )->delete();
        $notification = array(
            'messege'=>'Category Deleted Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with( $notification );
    }

    public function Editcategory( $id ) {
        $category = DB::table( 'categories' )->where( 'id', $id )->first();
        return view( 'admin.category.edit_category', compact( 'category' ) );
    }

    public function Updatecategory( Request $request, $id ) {
        $validateData = $request->validate( [
            'category_name' => 'required|max:255',
            'cat_image'=>'required|mimes:jpg,Jpeg|png',
        ] );
        $data[ 'category_name' ] = $request->category_name;
        $oldimage = $request->oldimage;
        $image = $request->image;
        if ( $image ) {
            $image_one = uniqid() . '.' . $image->getClientOriginalExtension();
            Image::make( $image )->resize( 500, 300 )->save( 'media/cat/' . $image_one );
            $data[ 'image' ] = 'media/cat/' . $image_one;
            // image/postimg/343434.png
            DB::table( 'categories' )->where( 'id', $id )->update( $data );
            unlink( $oldimage );

            $notification = array(
                'message' => 'Category Updated Successfully',
                'alert-type' => 'success'
            );

            return Redirect()->route( 'categories' )->with( $notification );
        } else {
            $data[ 'image' ] = $oldimage;
            DB::table( 'categories' )->where( 'id', $id )->update( $data );

            $notification = array(
                'message' => 'Category Updated Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->route( 'categories' )->with( $notification );
        }
        // End Condition
    }
}

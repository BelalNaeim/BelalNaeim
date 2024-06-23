<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class ProductController extends Controller {
    public function __construct() {
        $this->middleware( 'auth:admin' );
    }

    public function index() {
        $product = DB::table( 'products' )
        ->join( 'categories', 'products.category_id', 'categories.id' )
        ->select( 'products.*', 'categories.category_name' )
        ->get();
        // return response()->json( $product );
        return view( 'admin.product.index', compact( 'product' ) );
    }

    public function create() {
        $category = DB::table( 'categories' )->get();

        return view( 'admin.product.create', compact( 'category' ) );
    }

    public function store( Request $request ) {
        $data = array();
        $data[ 'product_name' ] = $request->product_name;
        $data[ 'Product_code' ] = $request->product_code;
        $data[ 'Product_quantitiy' ] = $request->product_quantity;
        $data[ 'discount_price' ] = $request->discount_price;
        $data[ 'category_id' ] = $request->category_id;
        $data[ 'selling_price' ] = $request->selling_price;
        $data[ 'product_details' ] = $request->product_details;
        $data[ 'video_link' ] = $request->video_link;
        $data[ 'status' ] = 1;

        $image_one = $request->image_one;
        $image_two = $request->image_two;
        $image_three = $request->image_three;

        // return response()->json( $data );

        if ( $image_one && $image_two && $image_three ) {
            $image_one_name = hexdec( uniqid() ) . '.' . $image_one->getClientOriginalExtension();
            Image::make( $image_one )->resize( 300, 300 )->save( 'media/product/' . $image_one_name );
            $data[ 'image_one' ] = 'media/product/' . $image_one_name;

            $image_two_name = hexdec( uniqid() ) . '.' . $image_two->getClientOriginalExtension();
            Image::make( $image_two )->resize( 300, 300 )->save( 'media/product/' . $image_two_name );
            $data[ 'image_two' ] = 'media/product/' . $image_two_name;

            $image_three_name = hexdec( uniqid() ) . '.' . $image_three->getClientOriginalExtension();
            Image::make( $image_three )->resize( 300, 300 )->save( 'media/product/' . $image_three_name );
            $data[ 'image_three' ] = 'media/product/' . $image_three_name;

            $product = DB::table( 'product' )->insert( $data );
            $notification = array(
                'messege' => 'Product Inserted Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with( $notification );
        }
    }

    public function inactive( $id ) {
        DB::table( 'products' )->where( 'id', $id )->update( [ 'status'=>0 ] );
        $notification = array(
            'messege'=>'Product Successfully inactive',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with( $notification );
    }

    public function active( $id ) {
        DB::table( 'products' )->where( 'id', $id )->update( [ 'status'=>1 ] );
        $notification = array(
            'messege'=>'Product Successfully Active',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with( $notification );
    }

    public function DeleteProduct( $id ) {
        $product = DB::table( 'products' )->where( 'id', $id )->first();
        $image1 = $product->image_one;
        $image2 = $product->image_two;
        $image3 = $product->image_three;
        unlink( $image1 );
        unlink( $image2 );
        unlink( $image3 );

        DB::table( 'products' )->where( 'id', $id )->delete();
        $notification = array(
            'messege'=>'Product Deleted Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with( $notification );
    }

    public function viewProduct( $id ) {
        $product = DB::table( 'product' )
        ->join( 'categories', 'products.category_id', 'categories.id' )
        ->select( 'product.*', 'categories.category_name' )
        ->where( 'product.id', $id )->first();
        //        return response()->json( $product );
        return view( 'admin.product.show', compact( 'product' ) );
    }

    public function EditProduct( $id ) {
        $product = DB::table( 'product' )->where( 'id', $id )->first();
        return view( 'admin.product.edit', compact( 'product' ) );
    }

    public function UpdateProductWithoutPhoto( Request $request, $id ) {
        $data = array();
        $data[ 'product_name' ] = $request->product_name;
        $data[ 'Product_code' ] = $request->product_code;
        $data[ 'Product_quantitiy' ] = $request->product_quantity;
        $data[ 'discount_price' ] = $request->discount_price;
        $data[ 'category_id' ] = $request->category_id;
        $data[ 'selling_price' ] = $request->selling_price;
        $data[ 'product_details' ] = $request->product_details;
        $data[ 'video_link' ] = $request->video_link;

        $image_one = $request->image_one;
        $image_two = $request->image_two;
        $image_three = $request->image_three;
        $update = DB::table( 'product' )->where( 'id', $id )->update( $data );
        if ( $update ) {
            $notification = array(
                'messege' => 'Product Successfully Updated',
                'alert-type' => 'success'
            );
            return Redirect()->route( 'all.product' )->with( $notification );
        } else {
            $notification = array(
                'messege' => 'Nothing To Update',
                'alert-type' => 'success'
            );
            return Redirect()->route( 'all.product' )->with( $notification );
        }
    }

    public function UpdateProductPhoto( Request $request, $id ) {
        $old_one = $request->old_one;
        $old_two = $request->old_two;
        $old_three = $request->old_three;

        $data = array();

        $image_one = $request->file( 'image_one' );
        $image_two = $request->file( 'image_two' );
        $image_three = $request->file( 'image_three' );

        if ( $image_one ) {
            unlink( $old_one );
            $image_name = date( 'dmy_H_s_i' );
            $ext = strtolower( $image_one->getClientOriginalExtension() );
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/media/product/';
            $image_url = $upload_path.$image_full_name;
            $success = $image_one->move( $upload_path, $image_full_name );

            $data[ 'image_one' ] = $image_url;
            $productimg = DB::table( 'product' )->where( 'id', $id )->update( $data );
            $notification = array(
                'messege'=>'Image One Updated Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->route( 'all.product' )->with( $notification );
        }
        if ( $image_two ) {
            unlink( $old_two );
            $image_name = date( 'dmy_H_s_i' );
            $ext = strtolower( $image_two->getClientOriginalExtension() );
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'media/product/';
            $image_url = $upload_path.$image_full_name;
            $success = $image_two->move( $upload_path, $image_full_name );

            $data[ 'image_two' ] = $image_url;
            $productimg = DB::table( 'product' )->where( 'id', $id )->update( $data );
            $notification = array(
                'messege'=>'Image Two Updated Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->route( 'all.product' )->with( $notification );
        }
        if ( $image_three ) {
            unlink( $old_three );
            $image_name = date( 'dmy_H_s_i' );
            $ext = strtolower( $image_three->getClientOriginalExtension() );
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'media/product/';
            $image_url = $upload_path.$image_full_name;
            $success = $image_three->move( $upload_path, $image_full_name );

            $data[ 'image_three' ] = $image_url;
            $productimg = DB::table( 'product' )->where( 'id', $id )->update( $data );
            $notification = array(
                'messege'=>'Image Three Updated Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->route( 'all.product' )->with( $notification );
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;

class SliderController extends Controller {
    //

    public function index() {
        //
        $sliders = Slider::all();
        return view( 'slider.index', compact( 'sliders' ) );
    }

    public function create() {
        return view( 'slider.create' );
    }

    public function store( Request $request ) {
        //
        $slider =  $this->validate( $request, [
            'title'     => 'required|min:3',
            'description'     => 'required|string',
            'image_one'   => 'required|image|mimes:png,jpg,gif',
            'image_two'   => 'required|image|mimes:png,jpg,gif',
            'image_three'   => 'required|image|mimes:png,jpg,gif'
        ] );
        $data = array();
        $data[ 'title' ] = $request->title;
        $data[ 'description' ] = $request->description;

        $image_one = $request->image_one;
        $image_two = $request->image_two;
        $image_three = $request->image_three;

        if ( $image_one && $image_two && $image_three ) {
            $image_one_name = hexdec( uniqid() ) . '.' . $image_one->getClientOriginalExtension();
            Image::make( $image_one )->resize( 300, 300 )->save( 'media/slider/' . $image_one_name );
            $data[ 'image_one' ] = 'media/slider/' . $image_one_name;

            $image_two_name = hexdec( uniqid() ) . '.' . $image_two->getClientOriginalExtension();
            Image::make( $image_two )->resize( 300, 300 )->save( 'media/slider/' . $image_two_name );
            $data[ 'image_two' ] = 'media/slider/' . $image_two_name;

            $image_three_name = hexdec( uniqid() ) . '.' . $image_three->getClientOriginalExtension();
            Image::make( $image_three )->resize( 300, 300 )->save( 'media/slider/' . $image_three_name );
            $data[ 'image_three' ] = 'media/slider/' . $image_three_name;

            $product = DB::table( 'sliders' )->insert( $data );
            $notification = array(
                'messege' => 'Slider Inserted Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->route( 'slider.all' )->with( $notification );
        }
    }

    public function edit( $id ) {
        //
        $slider = Slider::findOrFail( $id );
        return view( 'slider.edit', compact( 'slider' ) );
    }

    public function update( Request $request, $id ) {
        //
        $slider =  $this->validate( $request, [
            'title'     => 'required|min:3',
            'description'     => 'required|string',
            'image'   => 'required|image|mimes:png,jpg,gif'
        ] );
        $old_one = $request->old_one;
        $old_two = $request->old_two;
        $old_three = $request->old_three;

        $data = array();
        $data[ 'title' ] = $request->title;
        $data[ 'description' ] = $request->description;

        $image_one = $request->image_one;
        $image_two = $request->image_two;
        $image_three = $request->image_three;

        if ( $image_one ) {
            unlink( $old_one );
            $image_name = date( 'dmy_H_s_i' );
            $ext = strtolower( $image_one->getClientOriginalExtension() );
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/slider/product/';
            $image_url = $upload_path.$image_full_name;
            $success = $image_one->move( $upload_path, $image_full_name );

            $data[ 'image_one' ] = $image_url;
            $productimg = DB::table( 'sliders' )->where( 'id', $id )->update( $data );
            $notification = array(
                'messege'=>'Image One Updated Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->route( 'slider.all' )->with( $notification );
        }
        if ( $image_two ) {
            unlink( $old_two );
            $image_name = date( 'dmy_H_s_i' );
            $ext = strtolower( $image_two->getClientOriginalExtension() );
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'media/slider/';
            $image_url = $upload_path.$image_full_name;
            $success = $image_two->move( $upload_path, $image_full_name );

            $data[ 'image_two' ] = $image_url;
            $productimg = DB::table( 'sliders' )->where( 'id', $id )->update( $data );
            $notification = array(
                'messege'=>'Image Two Updated Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->route( 'slider.all' )->with( $notification );
        }
        if ( $image_three ) {
            unlink( $old_three );
            $image_name = date( 'dmy_H_s_i' );
            $ext = strtolower( $image_three->getClientOriginalExtension() );
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'media/slider/';
            $image_url = $upload_path.$image_full_name;
            $success = $image_three->move( $upload_path, $image_full_name );

            $data[ 'image_three' ] = $image_url;
            $productimg = DB::table( 'sliders' )->where( 'id', $id )->update( $data );
            $notification = array(
                'messege'=>'Image Three Updated Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->route( 'slider.all' )->with( $notification );
        }
    }
}

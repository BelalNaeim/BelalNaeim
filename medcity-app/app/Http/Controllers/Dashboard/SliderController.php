<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Facades\Validator;

class SliderController extends Controller {
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index() {
        //
        $sliders = Slider::get();
        return view( 'dashboard.sliders.index', compact( 'sliders' ) );

    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function create() {
        //
        return view( 'dashboard.sliders.create' );
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

    public function store( Request $request ) {
        //
        $input = Validator::make( $request->all(), [
            'title_ar' =>'required|string',
            'title_en' =>'required|string',
            'desc_ar' =>'required|text',
            'desc_en' =>'required|text',
            'image' =>'required|mimes:jpg,jpeg,png',

        ] );
        $input = [
            'title' => [
                'en' =>$request->title_en,
                'ar' =>$request->title_ar,
            ],
            'description' => [
                'en' => $request->desc_en,
                'ar' => $request->desc_ar,

            ]
        ];
        $image = $request->image;
        if ( $image ) {
            $img = uniqid(). '.' . $image->getClientOriginalExtension();
            Image::make( $image )->save( 'uploads/sliders'.$img );
            $input[ 'image' ] = 'uploads/sliders'.$img;
            Slider::create( $input );
            toastr()->success( 'user added successfully!', 'Congrats' );
            return redirect()->route( 'sliders.index' );

        } else {
            return Redirect()->back();
        }
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function show( $id ) {
        //
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function edit( $id ) {
        //
        $slider = Slider::find( $id );
        return view( 'dashboard.sliders.edit', compact( 'slider' ) );
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function update( Request $request, $id ) {
        //
        // dd( 'edit' );
        $input = Validator::make( $request->all(), [
            'title_ar' =>'required|string',
            'title_en' =>'required|string',
            'desc_ar' =>'required|text',
            'desc_en' =>'required|text',
            'image' =>'required|mimes:jpg,jpeg,png',

        ] );
        $input = [
            'title' => [
                'en' =>$request->title_en,
                'ar' =>$request->title_ar,
            ],
            'description' => [
                'en' => $request->desc_en,
                'ar' => $request->desc_ar,

            ]
        ];
        $image = $request->image;
        $oldimage = $request->oldimage;
        if ( $image ) {
            $image_one = uniqid() . '.' . $image->getClientOriginalExtension();
            Image::make( $image )->resize( 500, 300 )->save( 'uploads/sliders/' . $image_one );
            $input[ 'image' ] = 'uploads/sliders/' . $image_one;
            // images/Usrimg/343434.png
            unlink( $oldimage );
            $slider = Slider::where( 'id', $id );
            $slider->update( $input );
            toastr()->success( 'slider Updated successfully!', 'Congrats' );
            return redirect()->route( 'sliders.index' );
        } else {
            $slider = Slider::where( 'id', $id );
            $input[ 'image' ] = $oldimage;
            $slider->where( 'id', $id )->update( $input );

            toastr()->success( 'slider Updated successfully!', 'Congrats' );
            return redirect()->route( 'sliders.index' );
        }
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function destroy( $id ) {
        //
        $slider = Slider::where( 'id', $id );
        $slider->delete();
        toastr()->success( 'slider Deleted successfully!', 'Congrats' );
        return redirect()->route( 'sliders.index' );

    }
}

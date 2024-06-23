<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Traits\FileUploaderTrait;
use App\Models\Gallery;

class GalleryController extends Controller {
    use FileUploaderTrait;
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index() {
        //
        $galleries = Gallery::paginate( 5 );
        return view( 'dashboard.galleries.index', compact( 'galleries' ) );
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function create() {
        //
        return view( 'dashboard.galleries.create' );
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
            'name_ar' =>'required|string',
            'name_en' =>'required|string',
            'photo' =>  'required|mimes:png,jpg,jpeg',
            'type' => 'required|number|integer'
        ] );
        $input = [
            'name'=>[
                'en' => $request->name_en,
                'ar'=>$request->name_ar,
            ]
        ];
        $input[ 'type' ] = $request->type;
        $image = $request->photo;
        if ( $image ) {
            $path = public_path( 'uploads/galleries/' );
            $image_up = $this->uploadFile( $image, $path );
            $input[ 'photo' ] = 'uploads/galleries/'.$image_up;

            Gallery::create( $input );
            toastr()->success( 'Gallery added successfully!', 'Congrats' );
            return redirect()->route( 'galleries.index' );

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

        $photo = Gallery::where( 'id', $id )->first();
        return view( 'dashboard.galleries.edit', compact( 'photo' ) );
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
        $input = Validator::make( $request->all(), [
            'name_ar' =>'required|string',
            'name_en' =>'required|string',
            'photo' =>  'required|mimes:png,jpg,jpeg',
            'type' => 'required|number|integer'
        ] );
        $input = [
            'name'=>[
                'en' => $request->name_en,
                'ar'=>$request->name_ar,
            ]
        ];
        $input[ 'type' ] = $request->type;
        $image = $request->photo;
        $oldimage = $request->oldimage;
        if ( $image ) {
            $path = public_path( 'uploads/services/' );
            $image_up = $this->uploadFile( $image, $path );
            $input[ 'photo' ] = 'uploads/services/' . $image_up;
            unlink( $oldimage );
            $gallery = Gallery::where( 'id', $id );
            $gallery->update( $input );
            toastr()->success( 'gallery Updated successfully!', 'Congrats' );
            return redirect()->route( 'galleries.index' );
        } else {
            $gallery = Gallery::where( 'id', $id );
            $input[ 'photo' ] = $oldimage;
            $gallery->where( 'id', $id )->update( $input );

            toastr()->success( 'gallery Updated successfully!', 'Congrats' );
            return redirect()->route( 'galleries.index' );
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
        $gallery = Gallery::find( $id );
        $gallery->delete();
        toastr()->success( 'Gallery Photo Deleted successfully!', 'Congrats' );
        return redirect()->route( 'galleries.index' );
    }
}

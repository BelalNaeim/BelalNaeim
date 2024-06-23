<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\storeMoney;
use Intervention\Image\Facades\Image as Image;
use App\Models\Money;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;

class MoneyController extends Controller {
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index() {
        //
        // dd( 'Hello' );
        $monies = Money::select( 'id', 'moneyName', 'faceImage', 'backImage', 'moneyNameVoice' )->get();
        $title = 'Delete User!';
        $text = 'Are you sure you want to delete?';
        confirmDelete( $title, $text );
        return view( 'dashboard.money.index', compact( 'monies' ) );
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function create() {
        //
        return view( 'dashboard.money.create' );

    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

    public function store( storeMoney $request ) {
        //

        $data = [
            'moneyName'=>$request->moneyName,
            'faceImage'=>$request->faceImage,
            'backImage'=>$request->backImage,
            'moneyNameVoice'=>$request->moneyNameVoice,

        ];

        // dd( $data );
        $image_one = $request->faceImage;
        if ( $request->hasFile( 'faceImage' ) ) {
            $faceImage = uniqid() . '.' . $image_one->getClientOriginalExtension();
            Image::make( $image_one )->resize( 500, 300 )->save( 'money/face/' . $faceImage );
            $data[ 'faceImage' ] = 'money/face/' . $faceImage;
        }
        $image_two = $request->backImage;
        if ( $request->hasFile( 'backImage' ) ) {
            $backImage = uniqid() . '.' . $image_two->getClientOriginalExtension();
            Image::make( $image_two )->resize( 500, 300 )->save( 'money/back/' . $backImage );
            $data[ 'backImage' ] = 'money/back/' . $backImage;
        }
        if ( $request->hasFile( 'moneyNameVoice' ) ) {
            $file  = $request->file( 'moneyNameVoice' );
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $request->moneyNameVoice->move( public_path( 'money/NameVoice/' ), $fileName );
            $data[ 'moneyNameVoice' ] = 'money/NameVoice/' .$fileName;
        }
        $data[ 'algorithms' ] =  mt_rand( 100000000000000, 999999999999999 ).','.mt_rand( 1000000000000, 9999999999999 );

        // dd( $data );
        $money = Money::create( $data );
        Alert::success( 'Money', 'Money Added Successfully' );
        return Redirect()->route( 'monies.index' );
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
        $money = Money::where( 'id', '=', $id )->first();
        return view( 'dashboard.money.edit', compact( 'money' ) );
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
        $data = [
            'moneyName'=>$request->moneyName,

        ];
        $image_one = $request->faceImage;
        if ( $request->hasFile( 'faceImage' ) ) {
            $faceImage = uniqid() . '.' . $image_one->getClientOriginalExtension();
            Image::make( $image_one )->resize( 500, 300 )->save( 'money/face/' . $faceImage );
            $data[ 'faceImage' ] = 'money/face/' . $faceImage;
            $oldimage = $request->oldimage;
            $pathTodelete = public_path( $oldimage );
            // dd( $pathTodelete );
            if ( file_exists( $pathTodelete ) ) {
                unlink( $pathTodelete );
            } else {
                dd( 'File does not exists.' );
            }
        }
        $image_two = $request->backImage;
        if ( $request->hasFile( 'backImage' ) ) {
            $backImage = uniqid() . '.' . $image_two->getClientOriginalExtension();
            Image::make( $image_two )->resize( 500, 300 )->save( 'money/back/' . $backImage );
            $data[ 'backImage' ] = 'money/back/' . $backImage;
            $oldimage2 = $request->oldimage2;
            $pathTodelete2 = public_path( $oldimage2 );
            // dd( $pathTodelete );
            if ( file_exists( $pathTodelete2 ) ) {
                unlink( $pathTodelete2 );
            } else {
                dd( 'File does not exists.' );
            }
        }
        if ( $request->hasFile( 'moneyNameVoice' ) ) {
            $file  = $request->file( 'moneyNameVoice' );
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $request->moneyNameVoice->move( public_path( 'money/NameVoice/' ), $fileName );
            $data[ 'moneyNameVoice' ] = 'money/NameVoice/' .$fileName;
            $oldfile = $request->oldfile;
            $pathTodelete3 = public_path( $oldfile );
            // dd( $pathTodelete );
            if ( file_exists( $pathTodelete3 ) ) {
                unlink( $pathTodelete3 );
            } else {
                dd( 'File does not exists.' );
            }
        }
        // dd( [ $pathTodelete, $pathTodelete2, $pathTodelete3 ] );
        $data[ 'algorithms' ] =  mt_rand( 100000000000000, 999999999999999 ).','.mt_rand( 1000000000000, 9999999999999 );
        // better than rand()
        $app = Money::where( 'id', $id );
        $app->update( $data );
        Alert::success( 'Money', 'Money updated Successfully' );
        return Redirect()->route( 'monies.index' );
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function destroy( $id ) {
        //
        $money = Money::findOrFail( $id );

        $pathTodelete3 = public_path( $money->moneyNameVoice );
        //  dd( $pathTodelete3 );
        if ( File::exists( $pathTodelete3 ) ) {
            // File::delete( $image_path );
            unlink( $pathTodelete3 );
        }
        $money->delete();
        toast( 'Money has been deleted!', 'success' );
        return back();
    }
}

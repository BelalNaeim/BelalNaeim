<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\RequestResource;
use App\Models\Request;
use App\Http\Requests\storeRequset;
use Intervention\Image\Facades\Image as Image;

class RequestController extends BaseController {
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index() {
        //
        $request = Request::paginate( 5 );
        return $this->sendResponse( RequestResource::collection( $request ), 'Request retrieved successfully.' );
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function create() {
        //
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

    public function store( storeRequset $request ) {
        //
        $data = [
            'user_id'=>$request->user_id,
            'adda'=>$request->adda,
            'fromcount'=>$request->fromcount,
            'tocount'=>$request->tocount,
            'tocity'=>$request->tocity,
            'shwe'=>$request->shwe,
            'ndbfda'=>$request->ndbfda,
            'prlink'=>$request->prlink,
            'prname'=>$request->prname,
            'prtype'=>$request->prtype,
            'prprice'=>$request->prprice,
            'prquan'=>$request->prquan,
            'prdet'=>$request->prdet,
            'atdo'=>$request->atdo,

        ];
        $image_one = $request->primage;
        if ( $request->hasFile( 'primage' ) ) {
            $productImage = uniqid() . '.' . $image_one->getClientOriginalExtension();
            Image::make( $image_one )->resize( 200, 200 )->save( 'requests/' . $productImage );
            $data[ 'primage' ] = 'requests/' . $productImage;
        }
        $request = Request::create( $data );
        return $this->sendResponse( new RequestResource( $request ), 'Request created successfully.' );

    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function show( $id ) {
        //
        $request = Request::find( $id );

        if ( is_null( $request ) ) {
            return $this->sendError( 'Product not found.' );
        }

        return $this->sendResponse( new RequestResource( $request ), 'Request retrieved successfully.' );
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function edit( $id ) {
        //
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function update( storeRequset $request, $id ) {
        //
        $data = [
            'user_id'=>$request->user_id,
            'adda'=>$request->adda,
            'fromcount'=>$request->fromcount,
            'fromcity'=>$request->fromcity,
            'tocount'=>$request->tocount,
            'tocity'=>$request->tocity,
            'shwe'=>$request->shwe,
            'ndbfda'=>$request->ndbfda,
            'prlink'=>$request->prlink,
            'prname'=>$request->prname,
            'prtype'=>$request->prtype,
            'prprice'=>$request->prprice,
            'prquan'=>$request->prquan,
            'prdet'=>$request->prdet,
            'dshto'=>$request->dshto,
            'atdo'=>$request->atdo,

        ];

        $image_one = $request->primage;
        if ( $request->hasFile( 'primage' ) ) {
            $productImage = uniqid() . '.' . $image_one->getClientOriginalExtension();
            Image::make( $image_one )->resize( 200, 200 )->save( 'requests/' . $productImage );
            $data[ 'primage' ] = 'requests/' . $productImage;
            $oldimage = $request->oldimage;
            $pathTodelete = public_path( $oldimage );
            // dd( $pathTodelete );
            if ( file_exists( $pathTodelete ) ) {
                unlink( $pathTodelete );
            } else {
                dd( 'File does not exists.' );
            }
        }
        $request = Request::findorfail( $id );
        $request->update( $data );

        return $this->sendResponse( new RequestResource( $request ), 'Request Data  Updated Successfully' );

    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function destroy( $id ) {
        //
        Request::find( $id )->delete();
        return $this->sendResponse( null, 'Request deleted successfully.' );
    }
}

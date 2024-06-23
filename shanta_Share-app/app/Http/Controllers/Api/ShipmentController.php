<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ShipmentResource;
use App\Models\Shipment;
use Illuminate\Http\Request;
use App\Http\Requests\storeShipment;
use Intervention\Image\Facades\Image as Image;

class ShipmentController extends BaseController {
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index() {
        //
        $shipments = Shipment::paginate( 5 );
        // dd( $trips );
        return $this->sendResponse( ShipmentResource::collection( $shipments ), 'Shipments retrieved successfully.' );
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

    public function store( storeShipment $request ) {
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
            'atds'=>$request->atds,

        ];
        $image_one = $request->primage;
        if ( $request->hasFile( 'primage' ) ) {
            $productImage = uniqid() . '.' . $image_one->getClientOriginalExtension();
            Image::make( $image_one )->resize( 200, 200 )->save( 'products/' . $productImage );
            $data[ 'primage' ] = 'products/' . $productImage;
        }
        $shipment = Shipment::create( $data );
        return $this->sendResponse( new ShipmentResource( $shipment ), 'Trip created successfully.' );
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function show( $id ) {
        //
        $shipment = Shipment::find( $id );

        if ( is_null( $shipment ) ) {
            return $this->sendError( 'Shipment not found.' );
        }

        return $this->sendResponse( new ShipmentResource( $shipment ), 'Shipment retrieved successfully.' );
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

    public function update( storeShipment $request, $id ) {
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
            'atds'=>$request->atds,

        ];

        $image_one = $request->primage;
        if ( $request->hasFile( 'primage' ) ) {
            $productImage = uniqid() . '.' . $image_one->getClientOriginalExtension();
            Image::make( $image_one )->resize( 200, 200 )->save( 'products/' . $productImage );
            $data[ 'primage' ] = 'products/' . $productImage;
            $oldimage = $request->oldimage;
            $pathTodelete = public_path( $oldimage );
            // dd( $pathTodelete );
            if ( file_exists( $pathTodelete ) ) {
                unlink( $pathTodelete );
            } else {
                dd( 'File does not exists.' );
            }
        }
        $shipment = Shipment::findorfail( $id );
        $shipment->update( $data );

        return $this->sendResponse( new ShipmentResource( $shipment ), 'Shipment Data  Updated Successfully' );
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function destroy( $id ) {
        //
        Shipment::find( $id )->delete();
        return $this->sendResponse( null, 'Shipment deleted successfully.' );
    }
}

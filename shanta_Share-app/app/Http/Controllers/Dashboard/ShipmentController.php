<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\storeShipment;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as Image;
use App\Models\Shipment;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class ShipmentController extends Controller {
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index() {
        //
        $allshipments =  Shipment::select(
            'shipments.id',
            'shipments.fromcount',
            'shipments.tocount',
            'shipments.ndbfda',
            'shipments.adda',
            'shipments.shwe',
            'shipments.tocity',
            'shipments.primage',
            'shipments.atds',
            'users.full_name as user_full_name'
        )
        ->join( 'users', 'users.id', '=', 'shipments.user_id' )
        ->get();
        // dd( $allshipments );
        $title = 'Delete User!';
        $text = 'Are you sure you want to delete?';
        confirmDelete( $title, $text );
        return view( 'dashboard.shipments.index', compact( 'allshipments' ) );
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function create() {
        //
        $users = DB::table( 'users' )->get();
        return view( 'dashboard.shipments.create', compact( 'users' ) );

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
        Alert::success( 'Shipment', 'Shipment Added Successfully' );
        return Redirect()->route( 'shipments.index' );
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
        $shipment = Shipment::where( 'id', '=', $id )->first();
        $shipment_user = $shipment->user()->get();

        $users = DB::table( 'users' )
        ->leftJoin( 'shipments', 'users.id', '!=', 'shipments.user_id' )
        ->get();
        // dd( $users );
        return view( 'dashboard.shipments.edit', compact( 'shipment', 'shipment_user', 'users' ) );
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
        $shipment = Shipment::where( 'id', $id );
        $shipment->update( $data );
        Alert::success( 'Shipment', 'Shipment updated Successfully' );
        return Redirect()->route( 'shipments.index' );
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
        toast( 'Shipment has been deleted!', 'success' );
        return back();
    }
}

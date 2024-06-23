<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\storeTrip;
use App\Http\Resources\TripResource;
use Illuminate\Http\Request;
use App\Models\Trip;

class TripController extends BaseController {
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index() {
        //
        $trips = Trip::paginate( 5 );
        // dd( $trips );
        return $this->sendResponse( TripResource::collection( $trips ), 'Trips retrieved successfully.' );
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

    public function store( storeTrip $request ) {
        //
        $data = [
            'user_id'=>$request->user_id,
            'avwe'=>$request->avwe,
            'fromcount'=>$request->fromcount,
            'fromcity'=>$request->fromcity,
            'tdt'=>$request->tdt,
            'tocount'=>$request->tocount,
            'tocity'=>$request->tocity,
            'adt'=>$request->adt,
            'notes'=>$request->notes,

        ];
        // dd( $data );
        $trip = Trip::create( $data );
        return $this->sendResponse( new TripResource( $trip ), 'Trip created successfully.' );
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function show( $id ) {
        //

        $trip = Trip::find( $id );

        if ( is_null( $trip ) ) {
            return $this->sendError( 'Trip not found.' );
        }

        return $this->sendResponse( new TripResource( $trip ), 'Trip retrieved successfully.' );
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

    public function update( storeTrip $request, $id ) {
        //
        $data = [
            'user_id'=>$request->user_id,
            'avwe'=>$request->avwe,
            'fromcount'=>$request->fromcount,
            'fromcity'=>$request->fromcity,
            'tdt'=>$request->tdt,
            'tocount'=>$request->tocount,
            'tocity'=>$request->tocity,
            'adt'=>$request->adt,
            'notes'=>$request->notes,

        ];
        $trip = Trip::findorfail( $id );
        $trip->update( $data );

        return $this->sendResponse( new TripResource( $trip ), 'Trip Data  Updated Successfully' );
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function destroy( $id ) {
        //
        Trip::find( $id )->delete();
        return $this->sendResponse( null, 'Trip deleted successfully.' );
    }
}

<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Trip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\storeTrip;
use App\Models\User;

class TripController extends Controller {
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index() {
        //
        $alltrips =  Trip::select(
            'trips.id',
            'trips.avwe',
            'trips.fromcount',
            'trips.fromcity',
            'trips.tdt',
            'trips.tocount',
            'trips.tocity',
            'trips.adt',
            'trips.notes',
            'users.full_name as user_full_name'
        )
        ->join( 'users', 'users.id', '=', 'trips.user_id' )
        ->get();
        $title = 'Delete User!';
        $text = 'Are you sure you want to delete?';
        confirmDelete( $title, $text );
        return view( 'dashboard.trips.index', compact( 'alltrips' ) );

    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function create() {
        //
        $users = DB::table( 'users' )->get();

        return view( 'dashboard.trips.create', compact( 'users' ) );

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
        Alert::success( 'Trip', 'Trip Added Successfully' );
        return Redirect()->route( 'trips.index' );
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
        $trip = Trip::where( 'id', '=', $id )->first();
        $trip_user = $trip->user()->get();

        $users = DB::table( 'users' )
        ->crossJoin( 'trips', 'users.id', '!=', 'trips.user_id' )
        ->get();
        // dd( $users );
        return view( 'dashboard.trips.edit', compact( 'trip', 'trip_user', 'users' ) );
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
        $trip = Trip::where( 'id', $id );
        $trip->update( $data );
        Alert::success( 'Trip', 'Trip updated Successfully' );
        return Redirect()->route( 'trips.index' );
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
        toast( 'Trainer has been deleted!', 'success' );
        return back();
    }
}

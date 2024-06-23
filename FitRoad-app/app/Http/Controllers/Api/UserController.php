<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\UserResource;
use App\Http\Requests\storeUser;

class UserController extends BaseController {
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index() {
        //
        $users = User::paginate( 5 );
        return $this->sendResponse( UserResource::collection( $users ), 'Users retrieved successfully.' );

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

    public function store( storeUser $request ) {
        //

        // dd( 'Hello' );
        $data = [
            'name'=>$request->first_name.' '.$request->last_name,
            'email'=>$request->email,
            'password'=>bcrypt( $request->password ),
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'Gender'=>$request->gender,
            'country'=>$request->country,
            'gov'=>$request->gov,
            'city'=>$request->city,
            'age'=>$request->age,
            'weight'=>$request->weight,
            'height'=>$request->height,
            'lindate'=>$request->lindate,
            'tbw'=>$request->tbw,
            'prot'=>$request->prot,
            'mineral'=>$request->mineral,
            'bfmass'=>$request->bfmass,
            'bwei'=>$request->bwei,
            'bmi'=>$request->bmi,
            'pbfat'=>$request->pbfat,
            'insco'=>$request->insco,
            'impe'=>$request->impe,
            'weco'=>$request->weco,
        ];
        // dd( $data );
        $user = User::create( $data );
        return $this->sendResponse( new UserResource( $user ), 'User created successfully.' );
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function show( $id ) {
        //

        $user = User::find( $id );

        if ( is_null( $user ) ) {
            return $this->sendError( 'Product not found.' );
        }

        return $this->sendResponse( new UserResource( $user ), 'User retrieved successfully.' );
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

    public function update( Request $request, $id ) {
        //
        $data = [
            'name'=>$request->first_name.' '.$request->last_name,
            'email'=>$request->email,
            'password'=>bcrypt( $request->password ),
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'Gender'=>$request->gender,
            'country'=>$request->country,
            'gov'=>$request->gov,
            'city'=>$request->city,
            'age'=>$request->age,
            'weight'=>$request->weight,
            'height'=>$request->height,
            'lindate'=>$request->lindate,
            'tbw'=>$request->tbw,
            'prot'=>$request->prot,
            'mineral'=>$request->mineral,
            'bfmass'=>$request->bfmass,
            'bwei'=>$request->bwei,
            'bmi'=>$request->bmi,
            'pbfat'=>$request->pbfat,
            'insco'=>$request->insco,
            'impe'=>$request->impe,
            'weco'=>$request->weco,
        ];
        $user = User::findorfail( $id );
        $user->update( $data );

        return $this->sendResponse( new UserResource( $user ), 'Server Data  Updated Successfully' );
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function destroy( $id ) {
        //
        User::find( $id )->delete();
        return $this->sendResponse( null, 'Server deleted successfully.' );
    }
}

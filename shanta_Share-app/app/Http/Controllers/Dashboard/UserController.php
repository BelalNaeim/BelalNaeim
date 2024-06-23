<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\storeUser;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller {
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index() {
        //

        $users = User::all();
        $title = 'Delete User!';
        $text = 'Are you sure you want to delete?';
        confirmDelete( $title, $text );
        return view( 'dashboard.users.index', compact( 'users' ) );
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function create() {
        //

        return view( 'dashboard.users.create' );
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

    public function store( storeUser $request ) {
        //
        $data = [
            'full_name'=>$request->full_name,
            'email'=>$request->email,
            'password'=>bcrypt( $request->password ),
            'phone_number'=>$request->phone_number,
        ];
        $user = User::create( $data );
        Alert::success( 'User', 'User Added Successfully' );
        return Redirect()->route( 'users.index' );
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
        $user = User::where( 'id', '=', $id )->first();
        return view( 'dashboard.users.edit', compact( 'user' ) );
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
            'full_name'=>$request->full_name,
            'email'=>$request->email,
            'password'=>bcrypt( $request->password ),
            'phone_number'=>$request->phone_number,
        ];
        $user = User::where( 'id', $id );
        $user->update( $data );
        Alert::success( 'User', 'User updated Successfully' );
        return Redirect()->route( 'users.index' );
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
        toast( 'User has been deleted!', 'success' );
        return back();
    }
}

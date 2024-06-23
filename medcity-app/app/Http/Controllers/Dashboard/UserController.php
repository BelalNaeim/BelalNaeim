<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Traits\FileUploaderTrait;

class UserController extends Controller {
    use FileUploaderTrait;
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function __construct() {
        $this->middleware( [ 'permission:read_users' ] )->only( 'index' );
        $this->middleware( [ 'permission:create_users' ] )->only( 'create' );
        $this->middleware( [ 'permission:update_users' ] )->only( 'edit' );
        $this->middleware( [ 'permission:delete_users' ] )->only( 'destroy' );
    }

    public function index( Request $request ) {
        $users = User::when(
            $request->search,

            function ( $q ) use ( $request ) {
                return $q->where( 'name', 'like', '%' . $request->search . '%' )
                ->orWhere( 'mobile', 'like', '%' . $request->search . '%' )
                ->orWhere( 'country', 'like', '%' . $request->search . '%' );
            }
        )->where( 'role_id', 2 )->latest()->paginate( 5 );

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

    public function store( Request $request ) {
        //
        $request->validate( [
            'name' => 'required|min:3',
            'password' => 'required|min:6',
            'email' => 'required|unique:users',
            'country' => 'required',
            'image' => 'required',
            'mobile' => 'required|min:11|numeric',
            'permissions' => 'required|min:1'
        ] );
        $request_data = $request->except( 'password' );
        $request_data[ 'password' ] = bcrypt( $request->password );
        $request_data[ 'role_id' ] = 1;
        $image = $request->image;

        if ( $image ) {
            $path = public_path( 'uploads/profiles/' );
            $image_up = $this->uploadFile( $image, $path );
            $request_data[ 'image' ] = 'uploads/profiles/' . $image_up;
            $user = User::create( $request_data );
            $user->attachRole( 'super_admin' );
            $user->syncPermissions( $request->permissions );
            toastr()->success( 'User added successfully!', 'Congrats' );
            return redirect()->route( 'users.index' );

        } else {
            return Redirect()->back();
        }
        //end of if

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

    public function edit( User $user ) {
        //
        return view( 'dashboard.users.edit', compact( 'user' ) );
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function update( Request $request, User $user ) {
        //
        $data = $this->validate( $request, [
            'name' =>'required|min:3',
            'password' =>'required|min:6',
            'email'=>'required',
            'country' =>'required',
            'mobile' =>'required|min:11|numeric',
            'lang'=>'required'
        ] );
        $data[ 'password' ] = bcrypt( $request->password );
        $data = $request->except( '_method', '_token' );
        $data[ 'role_id' ] = 1;

        ///////////////////////////////////////////
        $oldimage = $request->oldimage;
        $image = $request->image;

        if ( $image ) {
            $path = public_path( 'uploads/profiles/' );
            $image_up = $this->uploadFile( $image, $path );
            $data[ 'image' ] = 'uploads/profiles/'. $image_up;
            $user->syncPermissions( $request->permissions );
            $user->update( $data );
            unlink( $oldimage );
            toastr()->success( 'User Updated successfully!', 'Congrats' );
            return redirect()->route( 'users.index' );
        } else {
            $data[ 'image' ] = $oldimage;
            $user->attachRole( 'super_admin' );
            $user->syncPermissions( $request->permissions );
            $user->update( $data );
            toastr()->success( 'User Updated successfully!', 'Congrats' );
            return redirect()->route( 'users.index' );
        }
        toastr()->error( 'Some thing Went worng!', 'Congrats' );
        return redirect()->route( 'users.index' );

    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function destroy( $id ) {
        //
        $user = User::find( $id );
        $user->delete();
        toastr()->warning( 'User deleted_successfully ⚡️' );
        return redirect()->route( 'users.index' );
    }
}

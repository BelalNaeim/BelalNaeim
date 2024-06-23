<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\storeServer;
use App\Models\Server;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image as Image;

class ServerController extends Controller {
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index() {
        //
        $servers = Server::select( 'id', 'name', 'logo', 'server_data' )->get();
        $title = 'Delete User!';
        $text = 'Are you sure you want to delete?';
        confirmDelete( $title, $text );
        return view( 'dashboard.servers.index', compact( 'servers' ) );
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function create() {
        //
        return view( 'dashboard.servers.create' );
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

    public function store( storeServer $request ) {
        //
        $data[ 'name' ] = $request->name;
        $data[ 'server_data' ] = $request->server_data;
        if ( $request->hasFile( 'logo' ) ) {
            $image  = $request->file( 'logo' );
            $imgName = time().'.'.$image->getClientOriginalExtension();
            $request->logo->move( public_path( 'server/logos/' ), $imgName );
            $data[ 'logo' ] = 'server/logos/' . $imgName;
            $server = Server::create( $data );
            Alert::success( 'Server', 'Server Added Successfully' );
            return Redirect()->route( 'servers.index' );
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
        $server = Server::where( 'id', '=', $id )->first();
        return view( 'dashboard.servers.edit', compact( 'server' ) );
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function update( storeServer $request, $id ) {
        //
        $data[ 'name' ] = $request->name;
        $data[ 'server_data' ] = $request->server_data;
        $image = $request->logo;
        if ( $image ) {
            $image_one = uniqid() . '.' . $image->getClientOriginalExtension();
            Image::make( $image )->resize( 500, 300 )->save( 'server/logos/' . $image_one );
            $data[ 'logo' ] = 'server/logos/' . $image_one;
            Server::where( 'id', $id )->update( $data );
            $oldimage = $request->oldimage;
            if ( file_exists( $oldimage ) ) {
                File::delete( $oldimage );
            }
            Alert::success( 'Server', 'Server Data  Updated Successfully' );

            return Redirect()->route( 'servers.index' );
        } else {
            $oldimage = $request->oldimage;
            $data[ 'logo' ] = $oldimage;
            Server::where( 'id', $id )->update( $data );

            Alert::success( 'Server', 'Server Data  Updated Successfully' );
            return Redirect()->route( 'servers.index' );
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
        Server::find( $id )->delete();
        toast( 'Server has been deleted!', 'success' );
        return back();

    }
}

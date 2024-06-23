<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\Http\Resources\ServerResource;
use App\Models\Server;
use App\Http\Requests\storeServer;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image as Image;

class ServerController extends BaseController {
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index() {
        //
        $server = Server::all();

        return $this->sendResponse( ServerResource::collection( $server ), 'Servers retrieved successfully.' );
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

    public function store( Request $request ) {
        //
        $input = $request->all();
        $validator = Validator::make( $input, [
            'name'=>'required|min:3|max:100',
            'logo'=>'required|image|mimes:png,jpg,gif',
            'server_data'=>'required|string'
        ] );

        if ( $validator->fails() ) {
            return $this->sendError( 'Validation Error.', $validator->errors() );

        }

        $data[ 'name' ] = $request->name;
        $data[ 'server_data' ] = $request->server_data;
        if ( $request->hasFile( 'logo' ) ) {
            $image  = $request->file( 'logo' );
            $imgName = time().'.'.$image->getClientOriginalExtension();
            $request->logo->move( public_path( 'server/logos/' ), $imgName );
            $data[ 'logo' ] = 'server/logos/' . $imgName;
            $server = Server::create( $data );
            return $this->sendResponse( new ServerResource( $server ), 'Server created successfully.' );

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
        $server = Server::find( $id );

        if ( is_null( $server ) ) {
            return $this->sendError( 'Product not found.' );
        }

        return $this->sendResponse( new ServerResource( $server ), 'Server retrieved successfully.' );
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

    public function update( storeServer $request, $id ) {
        //

        $data[ 'name' ] = $request->name;
        $data[ 'server_data' ] = $request->server_data;

        $image = $request->logo;
        if ( $image ) {
            $image_one = uniqid() . '.' . $image->getClientOriginalExtension();
            Image::make( $image )->resize( 500, 300 )->save( 'server/logos/' . $image_one );
            $data[ 'logo' ] = 'server/logos/' . $image_one;
            $server = Server::findorfail( $id );
            $server->update( $data );
            $oldimage = $request->oldimage;
            if ( file_exists( $oldimage ) ) {
                File::delete( $oldimage );
            }
            return $this->sendResponse( new ServerResource( $server ), 'Server Data  Updated Successfully' );
        } else {
            $oldimage = $request->oldimage;
            $data[ 'logo' ] = $oldimage;
            $server = Server::findorfail( $id );
            $server->update( $data );

            return $this->sendResponse( new ServerResource( $server ), 'Server Data  Updated Successfully' );

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
        return $this->sendResponse( [], 'Server deleted successfully.' );
    }
}

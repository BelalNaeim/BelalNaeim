<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\Http\Requests\storeApp;
use App\Http\Resources\ApplicationResource;
use App\Models\Server;
use App\Http\Requests\storeServer;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image as Image;
use App\Models\Application;
use Illuminate\Support\Facades\DB;

class ApplicationController extends BaseController {
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index() {
        //
        $apps = DB::table( 'apps' )
        ->join( 'servers', 'apps.server_id', 'servers.id' )
        ->select( 'apps.*', 'servers.name' )
        ->orderBy( 'id', 'desc' )->paginate( 5 );
        return $this->sendResponse( ApplicationResource::collection( $apps ), 'Applications retrieved successfully.' );
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

    public function store( storeApp $request ) {
        //
        // dd( $request->all() );
        $data = [
            'app_name'=>$request->app_name,
            'server_id'=>$request->server_id,
            'app_version'=>$request->app_version,
            'app_link'=>$request->app_link,
            'app_info'=>$request->app_info,

        ];
        if ( $request->hasFile( 'logo' ) ) {
            $image  = $request->file( 'logo' );
            $imgName = time().'.'.$image->getClientOriginalExtension();
            $request->logo->move( public_path( 'apps/logos/' ), $imgName );
            $data[ 'logo' ] = 'apps/logos/' . $imgName;
        }
        if ( $request->hasFile( 'apk_file' ) ) {
            $file  = $request->file( 'apk_file' );
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $request->apk_file->move( public_path( 'apps/apks/' ), $fileName );
            $data[ 'apk_file' ] = $fileName;
        }
        $screenshots = array();
        if ( $files = $request->file( 'screenshots' ) ) {
            foreach ( $files as $file ) {
                $name = time().$file->getClientOriginalName();
                $file->move( public_path( 'apps/screenshots' ), $name );
                $screenshots[] = $name;
            }

            $data[ 'screenshots' ] = implode( '|', $screenshots );
        }
        // dd( $data );
        $app = Application::create( $data );
        return $this->sendResponse( new ApplicationResource( $app ), 'App created successfully.' );
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
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function update( storeApp $request, $id ) {
        //
        $data = [
            'app_name'=>$request->app_name,
            'server_id'=>$request->server_id,
            'app_version'=>$request->app_version,
            'app_link'=>$request->app_link,
            'app_info'=>$request->app_info,

        ];
        $oldimage = $request->oldimage;
        $image = $request->logo;
        if ( $image ) {
            $image_one = uniqid() . '.' . $image->getClientOriginalExtension();
            Image::make( $image )->resize( 500, 300 )->save( 'apps/logos/' . $image_one );
            $data[ 'logo' ] = 'apps/logos/' . $image_one;
            if ( file_exists( $oldimage ) ) {
                File::delete( $oldimage );
            }
        }

        $oldfile = $request->oldfile;
        $file = $request->apk_file;
        if ( $file ) {
            $file_one = uniqid() . '.' . $file->getClientOriginalExtension();
            Image::make( $file )->resize( 500, 300 )->save( 'apps/apks/' . $file_one );
            $data[ 'apk_file' ] =  $file_one;
            if ( file_exists( $file_one ) ) {
                File::delete( $file_one );
            }
        }
        $screenshots = array();
        if ( $files = $request->file( 'screenshots' ) ) {
            foreach ( $files as $file ) {
                $name = time().$file->getClientOriginalName();
                $file->move( public_path( 'apps/screenshots' ), $name );
                $screenshots[] = 'apps/logos/'.$name;
            }

            $data[ 'screenshots' ] = implode( '|', $screenshots );
        }
        // dd( $data );
        // dd( $application );
        $application = Application::findorfail( $id );
        $application->update( $data );
        return $this->sendResponse( new ApplicationResource( $application ), 'App updated successfully.' );
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function destroy( $id ) {
        //
        Application::find( $id )->delete();
        return $this->sendResponse( [], 'App deleted successfully.' );
    }

    public function download( Request $request ) {
        $uuid  = $request->uuid;
        $app = Application::where( 'uuid', $uuid )->firstOrFail();
        $pathToFile = public_path( $app->apk_file );
        // dd( $pathToFile );
        return response()->download( $pathToFile );

    }
}

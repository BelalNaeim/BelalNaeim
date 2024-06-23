<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\storeApp;
use App\Models\Server;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Application;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image as Image;
use Webpatser\Uuid\Uuid;

class ApplicationController extends Controller {
    public function index() {
        //
        $apps = DB::table( 'apps' )
        ->join( 'servers', 'apps.server_id', 'servers.id' )
        ->select( 'apps.*', 'servers.name' )
        ->orderBy( 'id', 'desc' )->paginate( 5 );
        $title = 'Delete User!';
        $text = 'Are you sure you want to delete?';
        confirmDelete( $title, $text );
        return view( 'dashboard.apps.index', compact( 'apps' ) );
    }
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function create() {
        //
        $servers = Server::get();
        return view( 'dashboard.apps.create', compact( 'servers' ) );
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

    public function store( storeApp $request ) {
        //
        $data = [
            'app_name'=>$request->app_name,
            'server_id'=>$request->server_id,
            'app_version'=>$request->app_version,
            'app_link'=>$request->app_link,
            'app_info'=>$request->app_info,

        ];
        $data[ 'uuid' ] = ( string )Uuid::generate();

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
            $data[ 'apk_file' ] = 'apps/apks/' .$fileName;
        }
        $screenshots = array();
        if ( $files = $request->file( 'screenshots' ) ) {
            foreach ( $files as $file ) {
                $name = time().$file->getClientOriginalName();
                $file->move( public_path( 'apps/screenshots' ), $name );
                $screenshots[] = 'apps/logos/' .$name;
            }

            $data[ 'screenshots' ] = implode( '|', $screenshots );
        }
        // dd( $data );
        $app = Application::create( $data );
        Alert::success( 'App', 'App Added Successfully' );
        return Redirect()->route( 'applications.index' );
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
        $app = Application::where( 'id', '=', $id )->first();
        $servers = Server::get();
        return view( 'dashboard.apps.edit', compact( 'app', 'servers' ) );
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
        $data[ 'uuid' ] = ( string )Uuid::generate();

        $image = $request->logo;
        if ( $image ) {
            $image_one = uniqid() . '.' . $image->getClientOriginalExtension();
            Image::make( $image )->resize( 500, 300 )->save( 'apps/logos/' . $image_one );
            $data[ 'logo' ] = 'apps/logos/' . $image_one;
            $oldimage = $request->oldimage;
            if ( file_exists( $oldimage ) ) {
                File::delete( $oldimage );
            }
        }

        $file = $request->apk_file;
        if ( $file ) {
            $file_one = uniqid() . '.' . $image->getClientOriginalExtension();
            Image::make( $file )->resize( 500, 300 )->save( 'apps/apks/' . $file_one );
            $data[ 'apk_file' ] =  'apps/apks/' .$file_one;
            $oldfile = $request->oldfile;
            if ( file_exists( $oldfile ) ) {
                File::delete( $oldfile );
            }
        }
        $screenshots = array();
        if ( $files = $request->file( 'screenshots' ) ) {
            foreach ( $files as $file ) {
                $name = time().$file->getClientOriginalName();
                $file->move( public_path( 'apps/screenshots' ), $name );
                $screenshots[] = 'apps/logos/' . $name;
            }

            $data[ 'screenshots' ] = implode( '|', $screenshots );
        }
        // dd( $data );
        $app = Application::where( 'id', $id );
        $app->update( $data );
        Alert::success( 'App', 'App updated Successfully' );
        return Redirect()->route( 'applications.index' );
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
        toast( 'Server has been deleted!', 'success' );
        return back();
    }
}

<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\storeRequset;
use Intervention\Image\Facades\Image as Image;
use App\Models\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RequestController extends Controller {
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index() {
        //
        $allrequests =  Request::select(
            'requests.id',
            'requests.fromcount',
            'requests.tocount',
            'requests.ndbfda',
            'requests.adda',
            'requests.shwe',
            'requests.tocity',
            'requests.primage',
            'requests.atdo',
            'users.full_name as user_full_name'
        )
        ->join( 'users', 'users.id', '=', 'requests.user_id' )
        ->get();
        // dd( $allshipments );
        $title = 'Delete User!';
        $text = 'Are you sure you want to delete?';
        confirmDelete( $title, $text );
        return view( 'dashboard.requests.index', compact( 'allrequests' ) );
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function create() {
        //
        $users = DB::table( 'users' )->get();

        return view( 'dashboard.requests.create', compact( 'users' ) );
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

    public function store( storeRequset $request ) {
        //
        $data = [
            'user_id'=>$request->user_id,
            'adda'=>$request->adda,
            'fromcount'=>$request->fromcount,
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
            'atdo'=>$request->atdo,

        ];
        $image_one = $request->primage;
        if ( $request->hasFile( 'primage' ) ) {
            $productImage = uniqid() . '.' . $image_one->getClientOriginalExtension();
            Image::make( $image_one )->resize( 200, 200 )->save( 'requests/' . $productImage );
            $data[ 'primage' ] = 'requests/' . $productImage;
        }
        $request = Request::create( $data );
        Alert::success( 'Requests', 'Requests Added Successfully' );
        return Redirect()->route( 'requests.index' );
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
        $request = Request::where( 'id', '=', $id )->first();
        $request_user = $request->user()->get();

        $users = DB::table( 'users' )
        ->crossJoin( 'requests', 'users.id', '!=', 'requests.user_id' )
        ->get();
        // dd( $users );
        return view( 'dashboard.requests.edit', compact( 'request', 'request_user', 'users' ) );
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
            'atdo'=>$request->atdo,

        ];

        $image_one = $request->primage;
        if ( $request->hasFile( 'primage' ) ) {
            $productImage = uniqid() . '.' . $image_one->getClientOriginalExtension();
            Image::make( $image_one )->resize( 200, 200 )->save( 'requests/' . $productImage );
            $data[ 'primage' ] = 'requests/' . $productImage;
            $oldimage = $request->oldimage;
            $pathTodelete = public_path( $oldimage );
            // dd( $pathTodelete );
            if ( file_exists( $pathTodelete ) ) {
                unlink( $pathTodelete );
            } else {
                dd( 'File does not exists.' );
            }
        }
        $request = Request::where( 'id', $id );
        $request->update( $data );
        Alert::success( 'Request', 'Request updated Successfully' );
        return Redirect()->route( 'requests.index' );
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function destroy( $id ) {
        //
        Request::find( $id )->delete();
        toast( 'Request has been deleted!', 'success' );
        return back();
    }
}

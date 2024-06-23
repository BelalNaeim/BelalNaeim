<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\storeMessage;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class MessageController extends Controller {
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index() {
        //
        $messages = Message::all();
        $title = 'Delete User!';
        $text = 'Are you sure you want to delete?';
        confirmDelete( $title, $text );
        return view( 'dashboard.messages.index', compact( 'messages' ) );
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function create() {
        //
        $users = DB::table( 'users' )->get();

        return view( 'dashboard.messages.create', compact( 'users' ) );
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

    public function store( storeMessage $request ) {
        //
        $data = [
            'fromusername'=>$request->fromusername,
            'tousername'=>$request->tousername,
            'mdt'=>$request->mdt,
            'mcontent'=>$request->mcontent,
        ];
        if ( $data[ 'fromusername' ] != $data[ 'tousername' ] ) {
            $message = Message::create( $data );
            Alert::success( 'Message', 'Message Added Successfully' );
            return Redirect()->route( 'messages.index' );
        } else {
            return Redirect()->back()->with( 'failure_message', 'User Cannot send Message To her self' );
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
        $users = DB::table( 'users' )->get();
        $message = Message::where( 'id', '=', $id )->first();
        return view( 'dashboard.messages.edit', compact( 'message', 'users' ) );
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
            'fromusername'=>$request->fromusername,
            'tousername'=>$request->tousername,
            'mdt'=>$request->mdt,
            'mcontent'=>$request->mcontent,
        ];
        if ( $data[ 'fromusername' ] != $data[ 'tousername' ] ) {
            $message = Message::where( 'id', $id );
            $message->update( $data );
            Alert::success( 'Message', 'Message updated Successfully' );
            return Redirect()->route( 'messages.index' );
        } else {
            return Redirect()->back()->with( 'failure_message', 'User Cannot send Message To her self' );
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
        Message::find( $id )->delete();
        toast( 'Message has been deleted!', 'success' );
        return back();
    }
}

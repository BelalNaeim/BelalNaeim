<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\MessageResource;
use App\Models\Message;
use App\Http\Requests\storeMessage;

class MessageController extends BaseController {
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index() {
        //
        $message = Message::paginate( 5 );
        return $this->sendResponse( MessageResource::collection( $message ), 'Message retrieved successfully.' );
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
            return $this->sendResponse( new MessageResource( $message ), 'Message created successfully.' );
        } else {
            return $this->sendResponse( null,  'User Cannot send Message To her self' );
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
        $message = Message::find( $id );

        if ( is_null( $message ) ) {
            return $this->sendError( 'Message not found.' );
        }

        return $this->sendResponse( new MessageResource( $message ), 'Message retrieved successfully.' );
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
            'fromusername'=>$request->fromusername,
            'tousername'=>$request->tousername,
            'mdt'=>$request->mdt,
            'mcontent'=>$request->mcontent,
        ];
        if ( $data[ 'fromusername' ] != $data[ 'tousername' ] ) {
            $message = Message::findorfail( $id );
            $message->update( $data );
            return $this->sendResponse( new MessageResource( $message ), 'Message created successfully.' );

        } else {
            return $this->sendResponse( null,  'Message Cannot send Message To her self' );
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
        return $this->sendResponse( null, 'Message deleted successfully.' );
    }
}

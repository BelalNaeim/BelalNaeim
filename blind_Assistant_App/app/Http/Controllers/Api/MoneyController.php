<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Money;
use App\Http\Resources\MoneyResource;

class MoneyController extends  BaseController {
    //

    public function getAllMonies() {
        $money = Money::all();

        return $this->sendResponse( MoneyResource::collection( $money ), 'Monies retrieved successfully.' );
    }

    public function getMoneyById( $id ) {
        $money = Money::find( $id );

        if ( is_null( $money ) ) {
            return $this->sendError( 'Money not found.' );
        }

        return $this->sendResponse( new MoneyResource( $money ), 'Money retrieved successfully.' );
    }

    public function download( Request $request ) {
        $id  = $request->id;
        $money = Money::where( 'id', $id )->firstOrFail();
        $pathToFile = public_path( $money->moneyNameVoice );
        // dd( $pathToFile );
        return response()->download( $pathToFile );

    }
}

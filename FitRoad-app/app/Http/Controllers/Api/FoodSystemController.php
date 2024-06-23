<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FoodSystem;
use App\Http\Resources\FoodSystemResource;

class FoodSystemController extends BaseController {

    //

    public function index() {
        $foodsystem = FoodSystem::all();

        return $this->sendResponse( FoodSystemResource::collection( $foodsystem ), 'FoodSystem retrieved successfully.' );
    }

    public function show( $id ) {
        $foodsystem = FoodSystem::find( $id );

        if ( is_null( $foodsystem ) ) {
            return $this->sendError( 'FoodSystem not found.' );
        }

        return $this->sendResponse( new FoodSystemResource( $foodsystem ), 'FoodSystem retrieved successfully.' );
    }

}

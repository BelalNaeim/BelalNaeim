<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Trainer;
use App\Http\Resources\TrainerResource;

class TrainerController extends BaseController {
    //

    public function index() {
        $trainer = Trainer::all();

        return $this->sendResponse( TrainerResource::collection( $trainer ), 'Trainer retrieved successfully.' );
    }

    public function show( $id ) {
        $trainer = Trainer::find( $id );

        if ( is_null( $trainer ) ) {
            return $this->sendError( 'Trainer not found.' );
        }

        return $this->sendResponse( new TrainerResource( $trainer ), 'Trainer retrieved successfully.' );
    }
}

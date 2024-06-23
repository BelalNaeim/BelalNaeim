<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Exercise;
use App\Http\Resources\ExerciseResource;

class ExerciseController extends BaseController {
    //

    public function index() {
        $exercise = Exercise::all();

        return $this->sendResponse( ExerciseResource::collection( $exercise ), 'Exercises retrieved successfully.' );
    }

    public function show( $id ) {
        $exercise = Exercise::find( $id );

        if ( is_null( $exercise ) ) {
            return $this->sendError( 'Exercises not found.' );
        }

        return $this->sendResponse( new ExerciseResource( $exercise ), 'Exercises retrieved successfully.' );
    }

    public function download( Request $request ) {
        $id  = $request->id;
        $exercise = Exercise::where( 'id', $id )->firstOrFail();
        $pathToFile = storage_path( 'app/public/'.$exercise->exercise_video );
        // dd( $pathToFile );
        return response()->download( $pathToFile );

    }
}

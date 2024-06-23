<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\storeExercise;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Exercise;
use Illuminate\Support\Facades\File;

class ExerciseController extends Controller {
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index() {
        //
        $exercises = Exercise::select( 'id', 'exercise_name', 'Duration', 'burned_calories', 'for_over_weight', 'target_body_area', 'exercise_video' )->get();
        $title = 'Delete User!';
        $text = 'Are you sure you want to delete?';
        confirmDelete( $title, $text );
        return view( 'dashboard.exercises.index', compact( 'exercises' ) );
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function create() {
        //
        return view( 'dashboard.exercises.create' );
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

    public function store( storeExercise $request ) {
        //
        $data = [
            'exercise_name'=>$request->exercise_name,
            'Duration'=>$request->Duration,
            'burned_calories'=>$request->burned_calories,
            'for_over_weight'=>$request->for_over_weight,
            'target_body_area'=>$request->target_body_area,
        ];
        $fileName = $request->exercise_video->getClientOriginalName();
        $filePath = 'videos/' . $fileName;

        $isFileUploaded = Storage::disk( 'public' )->put( $filePath, file_get_contents( $request->exercise_video ) );

        // File URL to access the video in frontend
        $url = Storage::disk( 'public' )->url( $filePath );

        if ( $isFileUploaded ) {
            $data[ 'exercise_video' ] = $filePath;
        }
        $exercise = Exercise::create( $data );
        Alert::success( 'Exercise', 'Exercise Added Successfully' );
        return Redirect()->route( 'exercieses.index' );

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
        $exercise = Exercise::where( 'id', '=', $id )->first();
        return view( 'dashboard.exercises.edit', compact( 'exercise' ) );
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function update( storeExercise $request, $id ) {
        //
        $data = [
            'exercise_name'=>$request->exercise_name,
            'Duration'=>$request->Duration,
            'burned_calories'=>$request->burned_calories,
            'for_over_weight'=>$request->for_over_weight,
            'target_body_area'=>$request->target_body_area,
        ];

        if ( $request->hasFile( 'exercise_video' ) ) {
            $file  = $request->file( 'exercise_video' );
            $fileName = time().'.'.$file->getClientOriginalName();
            $filePath = 'videos/' . $fileName;
            $isFileUploaded = Storage::disk( 'public' )->put( $filePath, file_get_contents( $request->exercise_video ) );

            // File URL to access the video in frontend
            $url = Storage::disk( 'public' )->url( $filePath );
            $data[ 'exercise_video' ] = $filePath;
            $oldfile = $request->oldfile;
            $pathTodelete3 = storage_path( $oldfile );
            // dd( $pathTodelete3 );
            if ( file_exists( $pathTodelete3 ) ) {
                unlink( $pathTodelete3 );
            } else {
                dd( 'File does not exists.' );
            }
        }
        $exercise = Exercise::where( 'id', $id );
        $exercise->update( $data );
        Alert::success( 'Exercise', 'Exercise updated Successfully' );
        return Redirect()->route( 'exercieses.index' );
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function destroy( $id ) {
        //
        Exercise::find( $id )->delete();
        toast( 'Exercise has been deleted!', 'success' );
        return back();
    }
}

<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\storeTrainer;
use App\Models\Trainer;
use RealRashid\SweetAlert\Facades\Alert;

class TrainerController extends Controller {
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index() {
        //
        $trainers = Trainer::select( 'id', 'FullName', 'mobile_number', 'Gender', 'Age', 'start_work_date', 'Exercise_specialties', 'certifcates' )->get();
        $title = 'Delete User!';
        $text = 'Are you sure you want to delete?';
        confirmDelete( $title, $text );
        return view( 'dashboard.trainers.index', compact( 'trainers' ) );
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function create() {
        //
        return view( 'dashboard.trainers.create' );

    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

    public function store( storeTrainer $request ) {
        //
        $data = [
            'FullName'=>$request->FullName,
            'mobile_number'=>$request->mobile_number,
            'Gender'=>$request->Gender,
            'Age'=>$request->Age,
            'start_work_date'=>$request->start_work_date,
            'Exercise_specialties'=>$request->Exercise_specialties,
            'certifcates'=>$request->certifcates,

        ];
        // dd( $data );
        $trainer = Trainer::create( $data );
        Alert::success( 'Trainer', 'Trainer Added Successfully' );
        return Redirect()->route( 'trainers.index' );
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
        $trainer = Trainer::where( 'id', '=', $id )->first();
        return view( 'dashboard.trainers.edit', compact( 'trainer' ) );
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function update( storeTrainer $request, $id ) {
        //
        $data = [
            'FullName'=>$request->FullName,
            'mobile_number'=>$request->mobile_number,
            'Gender'=>$request->Gender,
            'Age'=>$request->Age,
            'start_work_date'=>$request->start_work_date,
            'Exercise_specialties'=>$request->Exercise_specialties,
            'certifcates'=>$request->certifcates,

        ];
        $trainer = Trainer::where( 'id', $id );
        $trainer->update( $data );
        Alert::success( 'Trainer', 'Trainer updated Successfully' );
        return Redirect()->route( 'trainers.index' );
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function destroy( $id ) {
        //
        Trainer::find( $id )->delete();
        toast( 'Trainer has been deleted!', 'success' );
        return back();
    }
}

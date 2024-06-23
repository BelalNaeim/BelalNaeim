<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\storeFoodSystem;
use Illuminate\Http\Request;
use App\Models\FoodSystem;
use RealRashid\SweetAlert\Facades\Alert;

class FoodSystemController extends Controller {
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index() {
        //
        $foodSystems = FoodSystem::select( 'id', 'food_system_name', 'total_day_calories', 'meals_number', 'for_over_weight', 'food_system_content' )->get();
        $title = 'Delete User!';
        $text = 'Are you sure you want to delete?';
        confirmDelete( $title, $text );
        return view( 'dashboard.foodSystems.index', compact( 'foodSystems' ) );
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function create() {
        //
        return view( 'dashboard.foodSystems.create' );

    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

    public function store( storeFoodSystem $request ) {
        //
        $data = [
            'food_system_name'=>$request->food_system_name,
            'total_day_calories'=>$request->total_day_calories,
            'meals_number'=>$request->meals_number,
            'for_over_weight'=>$request->for_over_weight,
            'food_system_content'=>$request->food_system_content,

        ];

        // dd( $data );
        $foodSystems = FoodSystem::create( $data );
        Alert::success( 'FoodSystems', 'FoodSystems Added Successfully' );
        return Redirect()->route( 'foodSystems.index' );

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
        $foodSystem = FoodSystem::where( 'id', '=', $id )->first();
        return view( 'dashboard.foodSystems.edit', compact( 'foodSystem' ) );
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
            'food_system_name'=>$request->food_system_name,
            'total_day_calories'=>$request->total_day_calories,
            'meals_number'=>$request->meals_number,
            'for_over_weight'=>$request->for_over_weight,
            'food_system_content'=>$request->food_system_content,

        ];
        $foodSystem = FoodSystem::where( 'id', $id );
        $foodSystem->update( $data );
        Alert::success( 'FoodSystems', 'FoodSystems updated Successfully' );
        return Redirect()->route( 'foodSystems.index' );
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function destroy( $id ) {
        //
        FoodSystem::find( $id )->delete();
        toast( 'FoodSystems has been deleted!', 'success' );
        return back();
    }
}

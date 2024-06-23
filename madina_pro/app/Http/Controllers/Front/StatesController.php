<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Governorate;
use App\Models\Project;
use DB; 

class StatesController extends Controller
{
    public function index()
    {
        $areas=Governorate::get();
       $projects=Project::where('flage','<>',0)->with(['type','statuses','governorate'])->get();
        return view('front/areas',compact('areas','projects'));
    }

    public function getAraeProjects($id) 
    { 
        $projects=Project::where('governorate_id',$id)
        ->where('flage','=',1)
        ->with(['type','statuses','governorate'])->get();
        return json_encode($projects);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $areas=Governorate::get();
        $projects=Project::where('governorate_id',$id)
        ->where('flage','=',1)
        ->get();
 
        return view('front/area',compact('projects','areas'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}

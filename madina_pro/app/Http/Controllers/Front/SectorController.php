<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Status;
use DB;

class SectorController extends Controller
{
    public function index() 
    {
        $sectors=Status::with('projects')->get();
        return view('front/categories',compact('sectors'));
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
        $projects = Status::find($id)->projects()->where('flage','=', 1)->get();
        return view('front/projects',['projects'=>$projects]);
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

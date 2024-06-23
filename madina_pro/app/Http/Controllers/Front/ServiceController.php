<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Project;

class ServiceController extends Controller
{
    public function index()
    {
        $sevices=Service::get();
 
        return view('front/services',compact('sevices'));
    }

    public function showProjects($id)
    {
     
        $project=Project::where('flage','<>',0)->with(['type','statuses','governorate','news'])->find($id);
        $st=Project::where('id','=',$id)->has('statuses')->count();
        $images=$project->gallery;
        $x= explode('|', $images);
        return view('front/oneProject',['project'=>$project,'x'=>$x,'st'=>$st]);
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
        //
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

<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use DB;
class projectsRequestsController extends Controller
{
    public function index()
    {
        $projects=Project::where('flage','=',0)->with(['type','statuses','governorate','user'])->get();
        return view('dashboard/projectsRequests',compact('projects'));
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
        Project::where('id',$id)->update(['flage' => 1]);
        return redirect('Dashboard/projectsRequests');
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
        $project = Project::find($id);
        DB::table('project_status')->where('project_id', '=', $id)->delete();
        $project->galleries()->delete();
        $project->delete();
        $project->user()->delete();
        return redirect('Dashboard/projectsRequests')->with('succeess','deleted');
    }

    public function acceptModal($id)
    {
        $projects = Project::where('id', 1)->update(['flage' => 1]);
        return redirect('Dashboard/projectsRequests');
    }
}

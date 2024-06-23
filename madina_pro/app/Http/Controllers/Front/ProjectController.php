<?php

namespace App\Http\Controllers\Front;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Governorate;
use App\Models\Status;
use App\User;
use App\Models\Gallery;
use App\Models\Newp;
use DB;

class ProjectController extends Controller
{
    public function search(Request $request){
        if($request->has('q')){
            $q=$request->q;
            $result = Project::where('name','LIKE','%'.$q.'%')->get();
            return response()->json(['data'=>$result]);
        }else{
            return back();
        }
    }

    public function usersHome()
    {
        $projsts=Project::where('flage','<>',0)
        ->with(['statuses','governorate'])->get();


        $projects=Project::where('flage','<>',0)
        ->with(['type','governorate'])->orderBy('created_at', 'desc')
        ->take(3)->get();
        
        $sectors =Status::has('projects')->orderBy('created_at', 'desc')->take(3)->get();
        $news= Newp::with('photos','project')->get();
        return view('front.index',['projsts'=>$projsts,'projects'=>$projects,'sectors'=>$sectors,'news'=>$news]);
    }
    
    public function index()
    {
        $projects=Project::where('flage','<>',0)->with(['type','statuses','governorate'])->get();
        return view('front/projects',['projects'=>$projects]);
    } 

    public function create()
    {
        $areas=Governorate::get();
        $status=Status::get();
        return view('front/addProject',['areas'=>$areas,'status'=>$status]);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'pname'=>'required|unique:projects,name',
            'galleries'=>'required',
            'main_photo'=>'required',
        ]);
        $projectData=$request->except(['name', 'email', 'phone', 'role', 'galleries']);
        $us=User::where('email','=',$request->email)->pluck('id')->first();
        if(!$us){
            $userData=$request->only(['name', 'email', 'phone', 'role']);
            User::create($userData);
            $user=User::get()->last();
            $projectData['user_id'] = $user->id;
        }
        else{
            $projectData['user_id'] = $us;
        }
       
       $projectData['name']=$request->pname;
      if($request->status){
       $projectData['status']=implode("|",$request->status);
      }
       if($request->image){
            $name = $request->name;
            $imgName = $name.'.'.$request->image->extension();
            $request->image->move(public_path('imgs/logos/'),$imgName);
            $projectData['image']=$imgName;
        }
        if($request->main_photo){
            $name = $request->name;
            $imgName = $name.'.'.$request->main_photo->extension();
            $request->main_photo->move(public_path('imgs/projects/'),$imgName);
            $projectData['main_photo']=$imgName;
        }

        $galleries=array();
        if($files=$request->file('galleries')){
            foreach($files as $file){
                $name=time().$file->getClientOriginalName();
                $file->move(public_path('imgs/gallery'),$name);
                $galleries[]=$name;
            }

            $projectData['gallery']=implode("|",$galleries);
        }
        $project=Project::create($projectData);
        $st=$request->status;
        if($request->status){
        foreach($st as $key => $value) {
        	 DB::table('project_status')->insert(
                ['project_id' => $project->id,'status_id' => $st[$key]]
            );
        }
        }
       return back()->with('status', 'تم ارسال المشروع بنجاح سيتم مراجعته قريبا');
    }

    public function show($id)
    {
        $project=Project::where('flage','<>',0)->with(['type','statuses','governorate','news'])->find($id);
        $st=Project::where('id','=',$id)->has('statuses')->count();
        $images=$project->gallery;
        $x= explode('|', $images);
        return view('front/oneProject',['project'=>$project,'x'=>$x,'st'=>$st]);
    }

    public function getProjects($id)
    {
        $project=Project::where('flage','<>',0)->with(['type','statuses','governorate','news'])->find($id);
        $st=Project::where('id','=',$id)->has('statuses')->count();
        $images=$project->gallery;
        $x= explode('|', $images);
        return view('front/oneProject',['project'=>$project,'x'=>$x,'st'=>$st]);
    }

    public function projectLocation($id)
    {
        $project=Project::where('flage','<>',0)->find($id);
        return view('front/projectMap',['project'=>$project]);
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

<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Type;
use App\Models\Status;
use App\Models\Governorate;
use App\Models\Gallery;
use DB;

class ProjectController extends Controller
{
    public function index()
    {
        $projects=Project::where('flage','<>',0)->with(['type','statuses','governorate'])->get();
        return view('dashboard/projects/projects',compact('projects'));
    }
 
    public function create()
    {
        $types= Type::get();
        $status=Status::get();
        $states=Governorate::get();
        return view('dashboard/projects/addNewProject',
        ['types'=>$types,'status'=>$status,'states'=>$states]);
    }

    public function store(Request $request)
    {
        $request->validate([
                'name'=>'required|unique:projects',
                'image'=>'image',
                'main_photo'=>'required|image',
                'galleries'=>'required',
        ]);   
         
        $sdata= $request->except('galleries','status');
        if($request->image){
            $name = $request->name;
            $imgName = $name.'.'.$request->image->extension();
            $request->image->move(public_path('imgs/logos/'),$imgName);
            $sdata['image']=$imgName;
        }
        
        if($request->main_photo){
            $name = $request->name;
            $imgName = $name.'.'.$request->main_photo->extension();
            $request->main_photo->move(public_path('imgs/projects/'),$imgName);
            $sdata['main_photo']=$imgName;
        }
        $sdata['flage']=1;

        $galleries=array();
        if($files=$request->file('galleries')){
            foreach($files as $file){
                $name=time().$file->getClientOriginalName();
                $file->move(public_path('imgs/gallery'),$name);
                $galleries[]=$name;
            }

         $sdata['gallery']=implode("|",$galleries);
        }
        $project = Project::create($sdata);

        if($request->status){
            $st=$request->status;
            foreach($st as $key => $value) {
            	 DB::table('project_status')->insert(
                    ['project_id' => $project->id,'status_id' => $st[$key]]
                );
            }
        }
        return back()->with('status', 'تم اضافة مشروع جديد بنجاح');
    }

    public function show($id)
    {
        $project=Project::with(['type','statuses','governorate'])->find($id);
        return view('dashboard/projects/project',compact('project'));
    }

    public function edit($id)
    {
        $project=Project::with(['type','governorate'])->find($id);

        $types= Type::get();
        $status=Status::get();
        $states=Governorate::get();

        return view('dashboard/projects/editProject',
        ['types'=>$types,'status'=>$status,'states'=>$states,'project'=>$project]);
    }

    public function update(Request $request, $id)
    {
        $data=$request->except('_method','_token','galleries');
        if($request->image){
            $name = $request->name;
            $imgName = $name.'.'.$request->image->extension();
            $request->image->move(public_path('imgs/logos'),$imgName);
            $data['image']=$imgName;
        }
            $galleries=array();
            if($files=$request->file('galleries')){
                foreach($files as $file){
                    $name=time().$file->getClientOriginalName();
                    $file->move(public_path('imgs/gallery'),$name);
                    $galleries[]=$name;
                }
                $data['gallery']=implode("|",$galleries);
            }
        $project = Project::where('id','=', $id)->update($data);
       
        if($request->status){
            DB::table('project_status')->where('project_id', '=', $id)->delete();
            $st=$request->status;
            foreach($st as $key => $value) {
            	 DB::table('project_status')->insert(
                    ['project_id' => $id,'status_id' => $st[$key]]
                );
            }
        }
        return back()->with('status', 'تم تعديل بيانات المشروع بنجاح');
    }

    public function destroy($id)
    {
        $project = Project::find($id);

        $news=DB::table('newps')->where('project_id', '=', $id)->get();
        foreach ($news as $new) {
            if($new!=null){
            DB::table('photos')->where('newp_id', '=', $new->id)->delete();
            $project->news()->delete();
            }
        }
      
        DB::table('project_status')->where('project_id', '=', $id)->delete();
        $project->delete();
        return back()->with('status', 'تم حذف المشروع بنجاح');
    }
}

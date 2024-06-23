<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Type;
use App\Models\Status;
use App\Models\Photo;
use App\Models\Newp;
use DB;
use Auth;
class NewController extends Controller
{
    public function index()
    {
        // 
    }
 
    public function create()
    {
        $projects= Project::where('flage','<>',0)->get();
        return view('dashboard/addNews',['projects'=>$projects]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|unique:newps',
            'image'=>'required|mimes:png,jpg,jpeg,svg|max:1024',
            // 'photos'=>'required',
            'project_id'=>'required',
            'date'=>'required',
            'description'=>'required',
        ]);   
         
        $data= $request->except('photos');
        if($request->image){
            $name = $request->title;
            $imgName = $name.'.'.$request->image->extension();
            $request->image->move(public_path('imgs/news/logos'),$imgName);
            $data['image']=$imgName;
        }
        
        $data['writer']=Auth::user()->name;
  
        Newp::create($data);

        $new = Newp::get()->last();
        $photos=array();
        if($files=$request->file('photos')){
            foreach($files as $file){
                $name=time().$file->getClientOriginalName();
                $file->move(public_path('imgs/news/gallery'),$name);
                $photos[]=$name;
            }
        }
        
        if($files=$request->file('photos')){
            Photo::insert(['image'=>implode("|",$photos),'newp_id'=>$new->id]);
        }
        
        return back()->with('status', 'تم الاضافة بنجاح');
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

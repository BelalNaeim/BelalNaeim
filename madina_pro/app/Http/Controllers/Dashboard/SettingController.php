<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Settings_email;
use App\Models\Settings_phone;

class SettingController extends Controller
{
    public function index()
    {
        //$settings=Setting::with(['emails','phones']);
        return view('dashboard/settings');
    }

    public function create()
    {
        // 
    }

    public function store(Request $request)
    {
        $request->validate([
            'website_link'=>'nullable',
            'facebook_link'=>'nullable',
            'instgram_link'=>'nullable',
            'youtube_link'=>'nullable',
            'snapchat_link'=>'nullable',
            'twitter_link'=>'nullable',
        ]);
       $data= $request->all();
      
       $sdata= $request->except(['phones','emails']);
       Setting::create($sdata);

        $settings = Setting::pluck('id')->last();
        
        foreach ($request->phones as $key=>$phone) {
            if($phone!= null)
               Settings_phone::insert(['phone'=>$phone,'setting_id'=>$settings]);
        }
        foreach ($request->emails as $key=>$email) {
            if($email!= null)
               Settings_email::insert(['email'=>$email,'setting_id'=>$settings]);
        }

        return back()->with('status','تم ادخال بيانات الاعدادات بنجاح');
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

<?php

namespace App\Http\Controllers\Dashboard;

use Image;
use App\Models\Setting;
use App\Utils\ImageUpload;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\Dashboard\SettingUpdateRequest;


class SettingController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware(function($request, $next) {
            if (session('success')) {
                Alert::success(session('success'));
            } 
            if (session('error')) {
                Alert::error(session('error'));
            }
            return $next($request);
        });
    }
    public function index(){
        $setting = Setting::first();
        return view('Dashboard.settings.index',['setting' => $setting]);
    }

    public function update(SettingUpdateRequest $request,Setting $setting){
        $setting->update($request->validated());
        if($request->has('logo')){
            $logo = ImageUpload::uploadImage($request->logo , 100 , 200 , 'logo/');
            $setting->update(['logo' => $logo]);
        }
        if($request->has('favicon')){
            $favicon = ImageUpload::uploadImage($request->favicon , 32 , 32 , 'logo/');
            $setting->update(['favicon' => $favicon]);
        }         
        $msg =  __('admin.settings_updated_successfully');
        return Redirect()->back()->with('success', $msg);
    }
}

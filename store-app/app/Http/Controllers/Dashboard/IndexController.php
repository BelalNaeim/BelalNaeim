<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //

    public function index()
    {
        $setting = Setting::first();
        return view('dashboard.settings.index',compact('setting'));
    }
}

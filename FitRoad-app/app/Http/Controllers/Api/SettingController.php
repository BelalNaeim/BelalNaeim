<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Http\Resources\SettingResource;

class SettingController extends BaseController {
    //

    public function Setting() {
        $setting = Setting::first();
        return $this->sendResponse( new SettingResource( $setting ), 'Setting Data  fetched Successfully' );

    }
}

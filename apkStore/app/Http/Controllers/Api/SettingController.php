<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Http\Controllers\Api\BaseController as BaseController;

class SettingController extends BaseController {
    //

    public function app_status( Request $request ) {
        $status = $request->status;
        if ( $status == 0 ) {
            $status = 0;
        } else {
            $status = 1;
        }
        $setting = Setting::first()->update( [
            'status' => $status,
        ] );
        return $this->sendResponse( null, 'Setting Data  Updated Successfully' );

    }

    public function get_app_status() {
        $app_status = Setting::first()->get();
        if ( $app_status == 0 ) {
            $status = 'Review Mode';
        } else {
            $status = 'Normal Mode';
        }
        return $this->sendResponse( $status, 'Setting Data  fetched Successfully' );

    }
}

<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SettingController extends Controller {
    //

    public function setting_view() {
        $setting  = Setting::first();
        return view( 'dashboard.setting', compact( 'setting' ) );
    }

    public function updateSetting( Request $request ) {
        $data = [
            'contact_informations'=>$request->contact_informations
        ];
        $oldimage = $request->oldlogo;
        $image = $request->logo;
        if ( $image ) {
            $image_one = uniqid().'.'.$image->getClientOriginalExtension();

            Image::make( $image )->resize( 320, 130 )->save( 'logos/'.$image_one );
            $data[ 'logo' ] = 'logos/'.$image_one;
            // image/postimg/343434.png
            Setting::first()->update( $data );
            unlink( $oldimage );

            toast( 'App Setting has been deleted!', 'success' );

            return Redirect()->route( 'setting' );

        } else {
            $data[ 'logo' ] = $oldimage;
            Setting::first()->update( $data );

            toast( 'App Setting has been deleted!', 'success' );

            return Redirect()->route( 'setting' );
        }
    }
}

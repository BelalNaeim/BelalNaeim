<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use Intervention\Image\Facades\Image;

class SettingController extends Controller {
    //

    public function setting_view() {
        $setting  = Setting::first();
        return view( 'dashboard.setting', compact( 'setting' ) );
    }

    public function updateSetting( Request $request ) {
        $this->validate( $request, [

            'applogo' => 'required|mimes:pdf,jpeg,png,jpg',
            'appfeesss' => 'required|string|max:512',
            'supportlink' => 'required|string|max:512',
            'cslink' => 'required|string|max:512',
        ] );
        $data = [
            'applogo'=>$request->applogo,
            'appfeesss'=>$request->appfeesss,
            'supportlink'=>$request->supportlink,
            'cslink'=>$request->cslink,
        ];
        $oldimage = $request->oldlogo;
        $image = $request->applogo;
        if ( $image ) {
            $image_one = uniqid().'.'.$image->getClientOriginalExtension();

            Image::make( $image )->resize( 320, 130 )->save( 'logos/'.$image_one );
            $data[ 'applogo' ] = 'logos/'.$image_one;
            // image/postimg/343434.png
            Setting::first()->update( $data );
            unlink( $oldimage );

            toast( 'App Setting has been deleted!', 'success' );

            return Redirect()->route( 'setting' );

        } else {
            $data[ 'applogo' ] = $oldimage;
            Setting::first()->update( $data );

            toast( 'App Setting has been deleted!', 'success' );

            return Redirect()->route( 'setting' );
        }
    }
}

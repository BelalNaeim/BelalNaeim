<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Facades\DB;

class WebsiteSettingController extends Controller {
    //

    public function MainWebSetting() {
        $websitesetting = DB::table( 'websitesettings' )->first();
        return view( 'backend.setting.website', compact( 'websitesetting' ) );
    }

    public function UpdateWebSetting( Request $request, $id ) {

        $data = array();
        $data[ 'address_en' ] = $request->address_en;
        $data[ 'address_ar' ] = $request->address_ar;
        $data[ 'phone_en' ] = $request->phone_en;
        $data[ 'phone_ar' ] = $request->phone_ar;
        $data[ 'email' ] = $request->email;

        $oldimage = $request->oldlogo;

        $image = $request->logo;
        if ( $image ) {
            $image_one = uniqid().'.'.$image->getClientOriginalExtension();

            Image::make( $image )->resize( 320, 130 )->save( 'image/logo/'.$image_one );
            $data[ 'logo' ] = 'image/logo/'.$image_one;
            // image/postimg/343434.png
            DB::table( 'websitesettings' )->where( 'id', $id )->update( $data );
            unlink( $oldimage );

            $notification = array(
                'message' => 'Website Updated Successfully',
                'alert-type' => 'success'
            );

            return Redirect()->route( 'website.setting' )->with( $notification );

        } else {
            $data[ 'logo' ] = $oldimage;
            DB::table( 'websitesettings' )->where( 'id', $id )->update( $data );

            $notification = array(
                'message' => 'Website Updated Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->route( 'website.setting' )->with( $notification );
        }
        // End Condition

    }
    // End Method

}

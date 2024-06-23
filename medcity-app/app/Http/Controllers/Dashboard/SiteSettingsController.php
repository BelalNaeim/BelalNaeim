<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Settings;
use Illuminate\Support\Facades\Storage;

class SiteSettingsController extends Controller {
    //

    public function index( Request $request ) {
        $setting = Settings::first();

        return view( 'dashboard.settings.index', compact( 'setting' ) );
    }

    public function update( Request $request, $id ) {
        $setting = Settings::findOrFail( $id );

        $old_img = $setting->logo;

        if ( request()->has( 'img' ) ) {
            $photo = $request->img;
            $photo_file = time() . '.' . $photo->getClientOriginalExtension();
            if ( $photo->move( 'pics', $photo_file ) ) {
                if ( $old_img !== 'default.png' ) {
                    Storage::disk( 'public_folder' )->delete( 'pics/'.$old_img );
                }
            }
            $request[ 'logo' ] = $photo_file;
        }

        $setting->update( $request->except( [ 'img' ] ) );

        session()->put( 'success', __( 'site.updated_successfully' ) );

        return \redirect()->route( 'settings.index' );
    }
}

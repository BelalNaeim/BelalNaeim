<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class SettingController extends Controller {
    //

    public function setting_view() {
        return view( 'dashboard.setting.setting' );
    }

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
        Alert::success( 'Settings', 'Setting Data  Updated Successfully' );
        return Redirect()->route( 'setting' );

    }

    public function signOut( Request $request ) {
        Session::flush();
        // Auth::logout();
        auth()->logout();
        Cache::flush();
        $request->session()->regenerate();
        // return Redirect::back();
        //   return Redirect::to( 'admin/login' );
        return Redirect( '/login' );
        // return 'logged out successfully';
    }

    public function ChangePassword( Request $request ) {

        $validatedData = $request->validate( [
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ] );

        $hashedPassword = Auth::user()->password;
        if ( Hash::check( $request->oldpassword, $hashedPassword ) ) {
            $user = User::find( Auth::id() );
            $user->password = Hash::make( $request->password );
            $user->save();
            Auth::logout();

            Alert::success( 'Settings', 'Setting Data  Updated Successfully' );

            return Redirect()->route( 'login' );
        } else {
            return Redirect()->back();
        }
        // End Else

    }
}


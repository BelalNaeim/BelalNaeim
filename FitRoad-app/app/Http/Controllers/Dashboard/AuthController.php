<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cache;

class AuthController extends Controller {
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function showLogin() {
        return view( 'dashboard.login' );
    }

    public function customLogin( Request $request ) {
        $this->validate( $request, [
            'email'   => 'required|email',
            'password'  => 'required|min:3'
        ] );

        $user_data = array(
            'email'  => $request->get( 'email' ),
            'password' => $request->get( 'password' )
        );

        if ( Auth::attempt( $user_data ) ) {
            return redirect()->route( 'home' );
        } else {
            return back()->with( 'error', 'Wrong Login Details' );
        }
    }

    public function logout( Request $request ) {
        Session::flush();

        Auth::logout();
        Cache::flush();
        $request->session()->regenerate();

        return redirect()->route( 'login' );
    }
}

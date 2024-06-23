<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UsersController extends Controller {
    //

    public function loginRegister() {
        return view( 'users.login_register' );
    }

    public function loginUser( Request $request ) {
        if ( $request->isMethod( 'post' ) ) {
            $data =  $this->validate( $request, [
                'email'    => 'required|email',
                'password' => 'required|min:6|max:10',
            ] );
            // dd( $data );
            if ( Auth::attempt( [ 'email' => $data[ 'email' ], 'password' => $data[ 'password' ] ] ) ) {
                return redirect()->route( 'home' );
            } else {
                $message = 'Invalid UserName or Password';
                session()->flash( 'error_message', $message );
                return redirect()->back();
            }
        }
    }

    public function registerUser( Request $request ) {
        if ( $request->isMethod( 'POST' ) ) {
            $data =  $request->validate( [
                'first_name'     => 'required|min:3|regex:/(^[a-zA-Z][a-zA-Z\s]{0,20}[a-zA-Z]$)/',
                'last_name'     => 'required|min:3|regex:/(^[a-zA-Z][a-zA-Z\s]{0,20}[a-zA-Z]$)/',
                'remail'    => 'required|email',
                'rpassword' => 'required|min:6|max:10',
                'mobile' => 'required|min:11|numeric',
                'address'   => 'required|string|max:50'
            ] );
            // dd( $data );
            //check if user already registered
            $userCount = User::where( 'email', $data[ 'remail' ] )->count();
            if ( $userCount > 0 ) {
                $message = 'Email already exists!';
                session()->flash( 'error_message', $message );
                return redirect()->back();
            } else {
                $user = new User;
                $user->email = $data[ 'remail' ];
                $user->first_name = $data[ 'first_name' ];
                $user->last_name = $data[ 'last_name' ];
                $user->mobile = $data[ 'mobile' ];
                $user->password = bcrypt( $data[ 'rpassword' ] );
                $user->address  = $data[ 'address' ];
                $user->status = 1;
                $user->save();

                if ( Auth::attempt( [ 'email'=>$data[ 'remail' ], 'password'=>$data[ 'rpassword' ] ] ) ) {
                    // dd( Auth::user() );
                    return redirect()->route( 'home' );
                }

            }

        }
    }

    public function logout() {
        Auth::logout();
        return Redirect( '/login-register' );
    }
}

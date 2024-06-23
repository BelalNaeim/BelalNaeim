<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends BaseController {
    //

    public function sign_up( Request $request ) {
        $validator = Validator::make( $request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ] );

        if ( $validator->fails() ) {
            return $this->sendError( 'Validation Error.', $validator->errors() );

        }

        $input = $request->all();
        $input[ 'password' ] = bcrypt( $input[ 'password' ] );
        $user = User::create( $input );
        $success[ 'token' ] =  $user->createToken( 'MyApp' )->plainTextToken;
        $success[ 'name' ] =  $user->name;

        return $this->sendResponse( $success, 'User register successfully.' );
    }

    public function login( Request $request ) {
        // return $request->all();
        if ( Auth::attempt( [ 'email' => $request->email, 'password' => $request->password ] ) ) {

            $user = Auth::user();

            $success[ 'token' ] =  $user->createToken( 'MyApp' )->plainTextToken;

            $success[ 'name' ] =  $user->name;

            return $this->sendResponse( $success, 'User login successfully.' );
        } else {

            return $this->sendError( 'Unauthorised.', [ 'error'=>'Unauthorised' ] );
        }

    }

    public function logout( Request $request ) {
        auth( 'sanctum' )->user()->tokens()->delete();
        return $this->sendError( 'Unauthorised.', [ 'error'=>'user logged out' ] );

    }
}

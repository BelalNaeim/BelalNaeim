<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
        |--------------------------------------------------------------------------
        | Login Controller
        |--------------------------------------------------------------------------
        |
        | This controller handles authenticating users for the application and
        | redirecting them to your home screen. The controller uses a trait
        | to conveniently provide its functionality to your applications.
        |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
    */

    // public function index()
    // {
    //     if(auth()->user()->hasRole('client')){
    //         return view(front.index);
    //     }
    //     else{
    //         return view(dashboard.index);
    //     }
    // }
    
    protected $redirectTo = RouteServiceProvider::HOME;


    // protected function redirectTo($request)
    // {
    //     if(auth()->user()->hasRole('client')){
    //         $redirectTo = RouteServiceProvider::Front;
    //     }
    //     else{
    //         $redirectTo= RouteServiceProvider::HOME;
    //     }
    //     return $redirectTo;
    // }
  
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}

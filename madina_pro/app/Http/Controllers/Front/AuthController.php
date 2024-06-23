<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewUserwelcomeMail;

class AuthController extends Controller {
    //

    public function showLogin() {
        return view( 'front.login' );
    }

    public function getRegister() {
        return view( 'front.register' );
    }

    public function customLogin( Request $request ) {
        $request->validate( [
            'email' => 'required',
            'password' => 'required',
        ] );
        $user = User::where( 'email', '=', $request->email )
        ->first();
        if ( $user->approved == 0 ) {

            return redirect()->back()->with( 'message', 'غير مسموح تسجيل الدخول بواسطة هذا المستخدم' );

        }
        $credentials = $request->only( 'email', 'password' );
        if ( Auth::attempt( $credentials ) && $user->approved == 1 ) {
            return redirect()->route( 'front.home' )
            ->with( 'message', 'Signed in' );
        }

        return redirect()->back()->with( 'message', 'معلومات تسجيل الدخول غير صحيحة حاول مرة أخري' );
    }

    public function doRegister( Request $request ) {
        $request->validate( [
            'name'=>'required|string|min:3',
            'phone'=>'required|numeric|digits:11',
            'email'=>'required|email|unique:users',
            'password'=>'required|confirmed',
        ] );
        $user = User::create( [
            'name' => $request[ 'name' ],
            'phone'=> $request[ 'phone' ],
            'email' => $request[ 'email' ],
            'password' => Hash::make( $request[ 'password' ] ),
            'role'=> $request[ 'role' ],
            'approved'=>0
        ] );
        $user->attachRole( 'client' );
        $notApproved = User::where( 'approved', '=', 0 )->first();
        if ( $notApproved ) {
            $mailData = [
                'title' => 'اهلاً ومرحباً بك على موقع مشاريع المدينة 
                            مشاريع المدينة منصة إعلامية تختص برصد أخبار وتحديثات مشاريع المدينة المنورة
                            ',
                'body' => 'شكراً لتسجيلك معنا على موقع مشاريع المدينة, لتفعيل حسابكم برجاء التواصل معنا عبر :
                            الواتساب : https://wa.me/+966507017493
                            البريد الإلكتروني : Info@medprojects.co' ];

                Mail::to( $user->email )->send( new NewUserwelcomeMail( $mailData ) );

                dd( 'Email is sent successfully.' );
            }

            return redirect()->route( 'after.register' )->with( 'status', 'تم اضافة مستخدم جديد يمكنك تسجيل الدخول بعد مراجعة طلبك والموافقة عليه من قبل الأدمن' );

        }

        public function after_register() {
            return view( 'front.after_register' );
        }

        public function logout( Request $request ) {
            Session::flush();

            Auth::logout();
            Cache::flush();
            $request->session()->regenerate();

            return redirect()->route( 'front.login' );
        }
    }

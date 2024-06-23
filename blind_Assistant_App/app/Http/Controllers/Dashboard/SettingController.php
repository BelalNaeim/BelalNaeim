<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\WelcomeVoice;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use App\Models\StartVoice;
use App\Models\ProblemVoice;
use App\Models\SuccessVoice;

class SettingController extends Controller {
    //

    public function setting_view() {
        return view( 'dashboard.setting' );
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
    }
    // End Else

    public function upload_welcomeVoice( Request $request ) {
        $validatedData = $request->validate( [
            'welcome_voice' => 'required',
        ] );
        if ( $request->hasFile( 'welcome_voice' ) ) {
            $welcomeVoice  = $request->file( 'welcome_voice' );
            $welcomefileName = time().'.'.$welcomeVoice->getClientOriginalExtension();
            $request->welcome_voice->move( public_path( 'voice/welcome/' ), $welcomefileName );
            $data[ 'welcome_voice_path' ] = 'voice/welcome/' .$welcomefileName;
        }
        $WelcomeVoice = WelcomeVoice::first()->update( [
            'welcome_voice_path	' => $data[ 'welcome_voice_path' ],
        ] );
        Alert::success( 'Voice', 'Welcome Voice updated Successfully' );
        return Redirect()->route( 'setting' );

    }

    public function upload_startVoice( Request $request ) {
        $validatedData = $request->validate( [
            'start_voice' => 'required',
        ] );
        if ( $request->hasFile( 'start_voice' ) ) {
            $startVoice  = $request->file( 'start_voice' );
            $startfileName = time().'.'.$startVoice->getClientOriginalExtension();
            $request->start_voice->move( public_path( 'voice/start/' ), $startfileName );
            $data[ 'start_voice_path' ] = 'voice/start/' .$startfileName;
        }
        $StartVoice = StartVoice::first()->update( [
            'start_voice_path' => $data[ 'start_voice_path' ],
        ] );
        Alert::success( 'Voice', 'Start Voice updated Successfully' );
        return Redirect()->route( 'setting' );
    }

    public function upload_successVoice( Request $request ) {
        $validatedData = $request->validate( [
            'success_voice' => 'required',
        ] );
        if ( $request->hasFile( 'success_voice' ) ) {
            $successVoice  = $request->file( 'success_voice' );
            $successfileName = time().'.'.$successVoice->getClientOriginalExtension();
            $request->success_voice->move( public_path( 'voice/success/' ), $successfileName );
            $data[ 'success_voice_path' ] = 'voice/success/' .$successfileName;
        }

        $SuccessVoice = SuccessVoice::first()->update( [
            'success_voice_path' => $data[ 'success_voice_path' ],
        ] );
        Alert::success( 'Voice', 'Success Voice updated Successfully' );
        return Redirect()->route( 'setting' );
    }

    public function upload_problemVoice( Request $request ) {
        $validatedData = $request->validate( [
            'problem_voice' => 'required',
        ] );
        if ( $request->hasFile( 'problem_voice' ) ) {
            $problemVoice  = $request->file( 'problem_voice' );
            $problemfileName = time().'.'.$problemVoice->getClientOriginalExtension();
            $request->problem_voice->move( public_path( 'voice/problem/' ), $problemfileName );
            $data[ 'probelm_voice_path' ] = 'voice/problem/' .$problemfileName;
        }

        $ProblemVoice = ProblemVoice::first()->update( [
            'probelm_voice_path' => $data[ 'probelm_voice_path' ],
        ] );
        Alert::success( 'Voice', 'Problem Voice updated Successfully' );
        return Redirect()->route( 'setting' );
    }

}

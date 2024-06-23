<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StartVoice;
use App\Models\ProblemVoice;
use App\Models\SuccessVoice;
use App\Models\WelcomeVoice;
use App\Models\Money;

class SettingController extends BaseController {
    //
    public $custom_url = 'http://blindassistant.coders-island.com/';

    public function getWelcomeVoice( $custom_url ) {
        $WelcomeVoice = WelcomeVoice::first()->get();
        return $this->sendResponse( $custom_url.'public/'.$WelcomeVoice, 'Welcome Voice  fetched Successfully' );

    }

    public function getStartVoice( $custom_url ) {
        $StartVoice = StartVoice::first()->get();
        return $this->sendResponse( $custom_url.'public/'.$StartVoice, 'Start Voice  fetched Successfully' );

    }

    public function getSuccessVoice( $custom_url ) {
        $SuccessVoice = SuccessVoice::first()->get();
        return $this->sendResponse( $custom_url.'public/'.$SuccessVoice, 'Success Voice  fetched Successfully' );

    }

    public function getProblemVoice( $custom_url ) {
        $ProblemVoice = ProblemVoice::first()->get();
        return $this->sendResponse( $custom_url.'public/'.$ProblemVoice, 'Problem Voice  fetched Successfully' );

    }

    public function download( Request $request ) {
        $id  = $request->id;
        $money = Money::where( 'id', $id )->firstOrFail();
        $pathToFile = public_path( $money->moneyNameVoice );
        // dd( $pathToFile );
        return response()->download( $pathToFile );

    }

    public function downloadWelcomeVoice() {
        $welcomeVoice = WelcomeVoice::first();
        // dd( $welcomeVoice );
        $pathToFile = public_path( $welcomeVoice->welcome_voice_path );
        // dd( $pathToFile );
        return response()->download( $pathToFile );

    }

    public function downloadStartVoice() {
        $startVoice = StartVoice::first();
        $pathToFile = public_path( $startVoice->start_voice_path );
        // dd( $pathToFile );
        return response()->download( $pathToFile );

    }

    public function downloadSuccessVoice() {
        $successVoice = SuccessVoice::first();
        $pathToFile = public_path( $successVoice->success_voice_path );
        // dd( $pathToFile );
        return response()->download( $pathToFile );

    }

    public function downloadProblemVoice() {
        $problemVoice = ProblemVoice::first();
        $pathToFile = public_path( $problemVoice->probelm_voice_path );
        // dd( $pathToFile );
        return response()->download( $pathToFile );

    }
}

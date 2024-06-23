<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;

class LocaleController extends Controller {

    protected $previousRequest;
    protected $locale;

    public function switchLang( $locale ) {
        $user = Auth::user();
        if ( array_key_exists( $locale, Config::get( 'locales.languages' ) ) ) {
            App::setLocale( $user->lang );
        }
        return Redirect::back();
    }

}

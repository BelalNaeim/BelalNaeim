<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;

class Localization {
    /**
    * Handle an incoming request.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \Closure( \Illuminate\Http\Request ): ( \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse )  $next
    * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
    */

    /**

    * Handle an incoming request.

    *

    * @param  \Illuminate\Http\Request  $request

    * @param  \Closure $next

    * @return mixed

    */

    public function handle( $request, Closure $next ) {

        if ( Session::has( 'locale' ) ) {

            $current_locale = Session::get( 'locale' );
            //get saved session locale value

            app()->setLocale( $current_locale );
            // set app localization with locale value session

            Carbon::setLocale( $current_locale );
            //set carbon localization for date/time system with locale value session

        } else {

            $app_locale = session( 'locale', config( 'app.locale' ) );
            // set session locale with app localization setting & return the locale value

            Carbon::setLocale( $app_locale );
            //set carbon localization with current app localization configuration

        }

        return $next( $request );

    }
}

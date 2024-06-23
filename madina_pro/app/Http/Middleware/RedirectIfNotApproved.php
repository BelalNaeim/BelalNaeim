<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotApproved {
    /**
    * Handle an incoming request.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \Closure  $next
    * @return mixed
    */

    public function handle( $request, Closure $next ) {
        if ( !( Auth::user() && Auth::user()->approved == 1 ) ) {
            return redirect()->route( 'front.login' );
        }

        return $next( $request );
    }
}

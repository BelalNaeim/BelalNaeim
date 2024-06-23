<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class MemberController extends Controller {
    //

    public function index() {
        //
        $users = User::where( 'approved', '=', 0 )->get();
        // dd( $users );

        return view( 'dashboard/members', compact( 'users' ) );

    }

    public function approve( $user_id ) {
        $user = User::findOrFail( $user_id );
        $user->update( [ 'approved' => 1 ] );

        return redirect()->back()->with( 'status', 'تم تفعيل المستخدم بنجاح' );
    }
}

<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Traits\FileUploaderTrait;

class ProfileController extends Controller {
    use FileUploaderTrait;
    //

    public function index() {
        $id = Auth::user()->id;
        $editData = User::find( $id );
        return view( 'dashboard.profile.index', compact( 'editData' ) );
    }

    public  function ProfileUpdate( Request  $request, User $user ) {
        $data = $this->validate( $request, [
            'name' =>'required|min:3',
            'password' =>'required|min:6|confirmed',
            'image'=>'required|mimes:png,jpg,jpeg',
            'country' =>'required',
            'mobile' =>'required|min:11|numeric'
        ] );
        $data[ 'password' ] = bcrypt( $request->password );

        $oldimage = $request->oldimage;
        $image = $request->image;

        if ( $image ) {
            $path = public_path( 'uploads/profiles/' );
            $image_up = $this->uploadFile( $image, $path );
            $data[ 'image' ] = 'uploads/profiles/'. $image_up;
            $user->update( $data );
            unlink( $oldimage );
            toastr()->success( 'User Updated successfully!', 'Congrats' );
            return redirect()->route( 'profile.index' );
        } else {
            $data[ 'image' ] = $oldimage;
            $user->update( $data );
            toastr()->success( 'User Updated successfully!', 'Congrats' );
            return redirect()->route( 'profile.index' );
        }
        toastr()->error( 'Some thing Went worng!', 'Congrats' );
        return redirect()->route( 'profile.index' );

    }
}

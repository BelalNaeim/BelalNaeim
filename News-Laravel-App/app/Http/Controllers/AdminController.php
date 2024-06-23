<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'User Logout Successfully');
    }

    public function AccountSetting(){
    	$id = Auth::user()->id;
    	$editData = User::find($id);
    	return view('backend.account.profile',compact('editData'));
    }

    public function ProfileEdit()
    {
        $id = Auth::user()->id;
        $editData = User::find($id);
        return view('backend.account.profile_edit', compact('editData'));
    }


    public function ProfileStore(Request $request)
    {

        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->mobile = $request->mobile;
        $data->address = $request->address;
        $data->gender = $request->gender;
        $data->position = $request->position;


        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/user_images/' . $data->image));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file_path =  public_path('upload/user_images');
            $file->move($file_path , $filename);
            $data['image'] = $filename;
        }
        $data->profile_photo_path = $file_path;
        $data->save();
        $notification = array(
            'message' => 'User Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return Redirect()->route('account.setting')->with($notification);
    }



    public function ShowPassword()
    {
        return view('backend.account.show_password');
    }


    public function ChangePassword(Request $request)
    {

        $validatedData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword, $hashedPassword)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();

            $notification = array(
                'message' => 'Password Change Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->route('login')->with($notification);
        } else {
            return Redirect()->back();
        } // End Else 


    }  // End Method
}

<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserController extends Controller
{
    public function _construct(){
        $this->middleware(['permission:users_read'])->only('index');
        $this->middleware(['permission:users_delete'])->only('destroy');
    }//end of construct

    public function index()
    {
        $users=User::whereRoleIs('admin')->get();
        return view('dashboard/users',compact('users'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'role'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|confirmed',
        ]);
        
        $data=$request->except(['password','password_confirmation','permissions']);
        $data['password']= bcrypt($request->password);
        $user = User::create($data);
        $user->attachRole('admin');
        $user->syncPermissions($request->permissions);

        return back()->with('status','تم اضافة مستخدم جديد');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        // 
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'role'=>'required',
            'email'=>'required|email',
            'password'=>'required|confirmed',
        ]);
        $data=$request->except(['_token','_method','password_confirmation']);
        $user = User::where('id', '=', $id)->update($data);
       return back()->with('status','تم تعديل بيانات المستخدم بنجاح');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        
        return back()->with('status','تم حذف هذا المستخدم بنجاح');
    }
}

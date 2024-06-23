<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\User;
use App\Models\Governorate;
use App\Models\Service;
use App\Models\Type;
use App\Models\Status;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
    */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
    */
    public function index()
    {
        //return view('dashboard.index');

        $projects = Project::count();
        $users = User::count();
        $governorates = Governorate::count();
        $services = Service::count();
        $types = Type::count();
        $status = Status::count();

        return view("dashboard.index", 
        compact('users','projects','governorates','services','types','status'));
   
    }

}

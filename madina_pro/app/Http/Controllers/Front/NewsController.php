<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Newp;
use App\Models\Photo;
class NewsController extends Controller
{
    public function index()
    {
       $news= Newp::with('photos','project')->get();
        return view('front/news',['news'=>$news]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $new= Newp::with('photos','project')->find($id);
        $images=Photo::where('newp_id', $id)->pluck('image')->first();
        $x= explode('|', $images);
        return view('front/new',['new'=>$new,'x'=>$x]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}

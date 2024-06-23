<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;


class LanguageController extends Controller
{
    //
    public function change(Request $request): RedirectResponse

    {

        app()->setLocale($request->lang);

        session()->put('locale', $request->lang);



        return redirect()->back();

    }
}

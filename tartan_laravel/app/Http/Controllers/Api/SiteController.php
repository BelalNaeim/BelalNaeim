<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Playground;
use App\Models\SiteContact;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

/**
 * @group Contactus.
 */
class SiteController extends Controller
{
    /**
     * Submit Contact us request
     * @bodyParam name int required name of person.
     * @bodyParam email string nullable email of person.
     * @bodyParam phone string nullable phone of person.
     * @bodyParam message string required message of person.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function submitContactUs()
    {
        $data = request()->validate([
            'name' => 'required',
            'phone' => 'nullable',
            'email' => 'nullable|email',
            'message' => 'required',
        ]);

        SiteContact::create($data);
return response()->json();
        return redirect()->back()->with('status', __('website.sent_successfully'));
    }
}

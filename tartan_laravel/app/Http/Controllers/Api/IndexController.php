<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Playground;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * @group Playgrounds
 */
class IndexController extends Controller
{
    /**
     *
     * @queryParam keyword optional The playground name. Example: "Somuha".
     * @queryParam lat optional The lat of the client. Example: "31.5656".
     * @queryParam lng optional The lng of the client. Example: "-29.5656".
     * @queryParam city_id optional The id of the city. Example: "1".
     * @queryParam area_id optional The id of the city. Example: "2".
     * @queryParam time optional The time of the reservation. Example: "12:00:00".
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $query = Playground::query()
            ->with(['city', 'area', 'main_image', 'gallery_images'])
            ->when($request->input('keyword'), function ($query) use ($request) {
                $query->where('name', 'like', "%{$request->keyword}%");
            })
            ->when($request->input('city_id'), function ($query) use ($request) {
                $query->where('city_id', $request->input('city_id'));
            })
            ->when($request->input('area_id'), function ($query) use ($request) {
                $query->where('area_id', $request->input('area_id'));
            })
            ->when($request->input('time'), function ($query) use ($request) {
                $query->where('times', 'like', "%" . $request->input('time') . "%");
                // TODO: Where it's not reserved.
            })
            ->when($request->input('lat') && $request->input('lng') && !$request->input('city_id') && !$request->input('area_id'), function ($q) use ($request) {
                $q->isWithinMaxDistance([
                    'lat' => $request->input('lat'),
                    'lng' => $request->input('lng'),
                ], null, '*');

                $q->orderBy('distance');
            });

        return response()->json($query->simplePaginate());
    }
}

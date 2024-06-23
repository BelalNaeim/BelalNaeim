<?php


namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Traits\FileUploaderTrait;
use App\Models\Service;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    use FileUploaderTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
        $services = Service::paginate(5);
        return view('dashboard.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        //
        return view('dashboard.services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        //
        $input = Validator::make($request->all(), [
            'name_ar' => 'required|string',
            'name_en' => 'required|string',
            'desc_ar' => 'required|text',
            'desc_en' => 'required|text',
            'image' => 'required|mimes:jpg,jpeg,png',

        ]);
        $input = [
            'name' => [
                'en' => $request->name_en,
                'ar' => $request->name_ar,
            ],
            'description' => [
                'en' => $request->desc_en,
                'ar' => $request->desc_ar,

            ]
        ];
        $image = $request->image;
        if ($image) {
            $path = public_path('uploads/services');
            $image_up = $this->uploadFile($image, $path);
            $input['image'] = 'uploads/services/' . $image_up;

            $input['service_user'] = auth()->user()->id;

            Service::create($input);
            toastr()->success('Service added successfully!', 'Congrats');
            return redirect()->route('services.index');

        } else {
            return Redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        //
        $service = service::find($id);
        return view('dashboard.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        //
        $input = Validator::make($request->all(), [
            'name_ar' => 'required|string',
            'name_en' => 'required|string',
            'desc_ar' => 'required|text',
            'desc_en' => 'required|text',
            'image' => 'required|mimes:jpg,jpeg,png',

        ]);
        $input = [
            'name' => [
                'en' => $request->title_en,
                'ar' => $request->title_ar,
            ],
            'description' => [
                'en' => $request->desc_en,
                'ar' => $request->desc_ar,

            ]
        ];
        $image = $request->image;
        $oldimage = $request->oldimage;
        if ($image) {
            $path = public_path('uploads/services/');
            $image_up = $this->uploadFile($image, $path);
            $input['image'] = 'uploads/services/' . $image_up;
            unlink($oldimage);
            $service = Service::where('id', $id);
            $service->update($input);
            toastr()->success('service Updated successfully!', 'Congrats');
            return redirect()->route('services.index');
        } else {
            $service = Service::where('id', $id);
            $input['image'] = $oldimage;
            $service->where('id', $id)->update($input);

            toastr()->success('service Updated successfully!', 'Congrats');
            return redirect()->route('services.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        //
        $service = Service::find($id);
        $service->delete();
        toastr()->success('slider Deleted successfully!', 'Congrats');
        return redirect()->route('services.index');
    }
}

@php
                                $models = ['users', 'categories', 'products', 'clients', 'orders'];
                                $maps = ['create', 'read', 'update', 'delete'];
                            @endphp

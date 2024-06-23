<?php

namespace App\Http\Controllers;

use App\books;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function book()
    {
       return view('books');
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('homee');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function uploadpage()
    {
        return view('book');
    }
    public function store(Request $request)
    {
        $data = new books();

        $file = $request->file;
        $filename = $file->getClientOriginalName() ;
        $request->file->move('assets', $filename);
        /*  $photo = $request->photo;
        $photoname = time().'.'.$photo->extension();
         $request->photo->move(public_path('images'), $photoname);
        */
        $photo = $request->photo;
        $ext = $photo->getClientOriginalExtension();
        $photoname = 'coverimage' . '_' . time() . '.' . $ext;
        $photo->storeAs('public/storage', $photoname);
        $data->file = $filename;
        $data->name = $request->name;
        $data->photo = $photoname;
        $data->publisher_id = $request->publisher_id;
        $data->category_id = $request->category_id;
        $data->description = $request->description;
        $data->save();
        return redirect()->back();
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\books  $books
     * @return \Illuminate\Http\Response
     */
    public function show(books $books)
    {
        $data = books::all();
        return view('books', compact('data'));
    }
    public function download(Request $request, $file)
    {
        return response()->download(public_path('assets/' . $file));
    }
    public function view($id)
    {
        $data = books::find($id);
        return view('viewbook', compact('data'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\books  $books
     * @return \Illuminate\Http\Response
     */
    public function edit(books $books)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\books  $books
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, books $books)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\books  $books
     * @return \Illuminate\Http\Response
     */
    public function destroy(books $books)
    {
        //
    }
}

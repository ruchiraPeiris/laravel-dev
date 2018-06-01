<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DropzoneController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dropzone.index');
    }

    public function store(Request $request)
    {
        if($request->file('file'))
        {
            $image = $request->file('file');
            $name = time().$image->getClientOriginalName();
            $image->move(public_path().'/images/', $name); 
        }

        $image= new Image();
        $image->image_name = $name;
        $image->save();

        return response()->json(['success' => 'You have successfully uploaded an image'], 200);
    }
}


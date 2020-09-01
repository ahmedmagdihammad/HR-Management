<?php

namespace App\Http\Controllers\Admin\Setting;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Corporate;

class CorpNameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $corporates = Corporate::all();
        return view('pages/setting/corporates', compact('corporates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $corporate = new Corporate();
        $corporate->name = $request->name;
        if ($request->hasFile('image')) {
        $corporate->image = $this->uploadimage($request->image);
        }
        $corporate->save();
        return back();
    }

    public function uploadimage($file)
     {
        $imagename = time().'.'.$file->getClientOriginalExtension();
        $destinationPath = public_path('corporate');
        $file->move($destinationPath, $imagename); 
        $returenurl = 'corporate/'.$imagename; 

        return $returenurl;  
     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $corporate = Corporate::find($id);
        $corporate->name = $request->upname;
        if ($request->hasFile('upimage')) {
        $corporate->image = $this->uploadimage($request->upimage);
        }
        $corporate->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Corporate::find($id)->delete();
        return back();
    }
}

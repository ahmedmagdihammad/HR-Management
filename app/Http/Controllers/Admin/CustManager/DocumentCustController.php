<?php

namespace App\Http\Controllers\Admin\CustManager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Document;
use App\Customer;

class DocumentCustController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $customers = Customer::find($id);
        $documents = Document::where('type', '=' ,'c')->where('recid', $customers->id)->get();
        return view('pages/custManager/documentCust', compact('documents', 'customers', 'id'));
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
        $document = new Document();
        $document->type = $request->type;
        $document->recid = $request->recid;
        $document->description = $request->description;
        if ($request->hasFile('image')) {
        $document->image = $this->uploadimage($request->image);
        }

        $document->save();
        return back();
    }

    public function uploadimage($file)
     {
        $imagename = time().'.'.$file->getClientOriginalExtension();
        $destinationPath = public_path('documents');
        $file->move($destinationPath, $imagename); 
        $returenurl = 'documents/'.$imagename; 

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
        $document = Document::find($id);
        $document->type = $request->uptype;
        $document->recid = $request->uprecid;
        $document->description = $request->updescription;
        if ($request->hasFile('upimage')) {
        $document->image = $this->uploadimage($request->upimage);
        }

        $document->save();
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
        Document::find($id)->delete();
        return back();
    }
}

<?php

namespace App\Http\Controllers\Admin\CustManager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Family;
use App\Customer;

class FamilyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $customer = Customer::find($id);
        $families = Family::where('customer_id', $customer->id)->get();
        return view('pages/custManager/families', compact('families', 'customer', 'id'));
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
        $family = new Family();
        $family->customer_id = $request->customer_id;
        $family->name = $request->name;
        $family->mobile = $request->mobile;
        $family->family = $request->family;

        $family->save();
        return back();
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
        $family = Family::find($id);
        $family->name = $request->upname;
        $family->mobile = $request->upmobile;
        $family->family = $request->upfamily;
        $family->customer_id = $request->upcustomer_id;
        
        $family->save();
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
        Family::find($id)->delete();
        return back();
    }
}

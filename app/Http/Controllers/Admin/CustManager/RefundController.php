<?php

namespace App\Http\Controllers\Admin\CustManager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Refund;
use App\Payment;

class RefundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $payments = Payment::find($id);
        $refunds = Refund::where('payment_id', $payments->id)->get();
        return view('pages/custManager/refunds', compact('refunds', 'payments', 'id'));
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
        $refund = new Refund();
        $refund->customer_id = $request->customer_id;
        $refund->payment_id = $request->payment_id;
        $refund->amount = $request->amount;
        $refund->created_by = $request->created_by;
        $refund->save();
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
        $refund = Refund::find($id);
        $refund->customer_id = $request->upcustomer_id;
        $refund->payment_id = $request->uppayment_id;
        $refund->amount = $request->upamount;
        $refund->created_by = $request->upcreated_by;
        $refund->save();
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
        Refund::find($id)->delete();
        return back();
    }
}

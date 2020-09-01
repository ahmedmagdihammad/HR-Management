<?php

namespace App\Http\Controllers\Admin\CustManager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Lead;
use App\Payment;
use App\Offer;
use App\Customer;

class LeadPayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $lead = Lead::find($id);
        $customer = Customer::find($id);
        $payments = Payment::where('customer_id', $customer->customer_id)->get();
        $offers = Offer::all();

        return view('pages.custManager.leadPayments', compact('lead', 'payments', 'offers', 'customer'));
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
    public function store(Request $request, $id)
    {
        // Update Lead
        $lead = Lead::find($id);
        $lead->status = '1';
        $lead->save();

        // Add new Customer
            $customer = new Customer();
            $customer->name_en = $lead->name_en;
            $customer->name_ar = $lead->name_ar;
            $customer->mobile_1 = $lead->mobile_1;
            $customer->mobile_2 = $lead->mobile_2;
            $customer->address = $lead->address;
            $customer->n_passport_id = $lead->n_passport_id;
            $customer->email = $lead->email;
            $customer->gender = $lead->gender;
            $customer->job = $lead->job;
            $customer->date_birth = $lead->date_birth;
            $customer->nationality = $lead->nationality;
            $customer->notes = $lead->notes;
            $customer->picture = $lead->picture;
            $customer->save();

        // Add Payment
            $payment = new Payment();
            $payment->customer_id = $customer->id;
            $payment->payment = $request->payment;
            $payment->image_id = $request->image_id;
            $payment->employee_id = $request->employee_id;
            $payment->branch_id = $request->branch_id;
            $payment->save();
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

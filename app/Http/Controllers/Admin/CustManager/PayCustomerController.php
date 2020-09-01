<?php

namespace App\Http\Controllers\Admin\CustManager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Payment;
use App\Customer;
use App\Offer;

class PayCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $customers = Customer::find($id);
        $payments = Payment::where('customer_id', $customers->id)->get();
        $offers = Offer::all();

        return view('pages/custManager/paymentCustomer', compact('payments', 'customers', 'offers','id'));
    }

    public function CustPrint($id)
    {
        $customers = Customer::find($id);
        $payments = Payment::all();
        return view('pages/custManager/Custprint', compact('payments', 'customers', 'id'));
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
        $payment = new Payment();
        $payment->customer_id = $request->customer_id;
        $payment->payment = $request->payment;
        $payment->employee_id = $request->employee_id;
        $payment->branch_id = $request->branch_id;
        if ($request->hasFile('image_id')) {
        $payment->image_id = $this->uploadimage($request->image_id);
        }
        $payment->save();
        return back();
    }

    public function uploadimage($file)
     {
        $imagename = time().'.'.$file->getClientOriginalExtension();
        $destinationPath = public_path('payments');
        $file->move($destinationPath, $imagename); 
        $returenurl = 'payments/'.$imagename; 

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
        $payment = Payment::find($id);
        $payment->customer_id = $request->upcustomer_id;
        $payment->payment = $request->uppayment;
        $payment->employee_id = $request->upemployee_id;
        $payment->branch_id = $request->upbranch_id;
        if ($request->hasFile('upimage_id')) {
        $payment->image_id = $this->uploadimage($request->upimage_id);
        }

        $payment->save();
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
        Payment::find($id)->delete();
        return back();
    }

    public function getCustomer(Request $request)
    {
        $getcustomers = Customer::where('code', '=', 'name')->get();
        return $getcustomers;
    }
}

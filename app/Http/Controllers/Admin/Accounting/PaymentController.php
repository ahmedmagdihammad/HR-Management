<?php

namespace App\Http\Controllers\Admin\Accounting;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Payment;
use App\Customer;
use DB;
use App\Offer;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payment::whereMonth('created_at', '=', date('m'))->get();
        $customers = Customer::all();

        return view('pages/accounting/payments', compact('payments', 'customers'));
    }

    public function getPayment(){
        if(request()->ajax())
        {
          if(!empty($request->from_date))
        {
           $data = DB::table('payments')
             ->whereBetween('created_at', array($request->from_date, $request->to_date))->get();
        }else{ $data = DB::table('payments')->get(); } return datatables()->of($data)->make(true); 

        }
         return view('pages/accounting/payments');
    }

    public function getPaymentFilter(Request $request)
    {
        $date = $request->date;
        $date_to = $request->date_to;
        $getpayment = $request->payment;
        $payments = Payment::all();
        foreach($payments as $payment_offer){
            if ($getpayment == $payment_offer->getOffer['amount']) {
                if ($payment_offer->payment == $payment_offer->getOffer['id']) {
                    echo $payment_offer->getOffer['id'];
                    return view('pages/accounting/payments', compact('payment_offer'));
                }
            } 
        }
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
       //
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

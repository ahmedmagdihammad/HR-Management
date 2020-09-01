<?php

namespace App\Http\Controllers\Admin\Setting;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Payment;
use Carbon\Carbon;
use App\Fistscond;
use App\Customer;
use App\Offer;

class FisrtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function firstLine()
    {
        $customers = Customer::where('status','=', '1')->get();
        foreach ($customers as $customer) {
            $offers = Offer::all();
            foreach ($offers as $offer) {
                $allpayment = Payment::get();
                foreach ($allpayment as $payment) {
                    $startYear_count = $payment->created_at->year;
                    $startMonth_count = $payment->created_at->month;
                    $mont_count = $payment->created_at->month(date('m', strtotime(+$offer->month_count ."month")));
                    $from = date($startYear_count.'-'.$startMonth_count.'-01');
                    $firstSetting = Fistscond::find(1)->first()->first;
                    $number = str_pad($firstSetting,2,'0',STR_PAD_LEFT);
                    $to = date($startYear_count.'-'.$mont_count.'-'.$number);
                    $payments = Payment::whereBetween('created_at', [$from, $to])->where('customer_id', '=',$customer->id)->get();
                    $paymentPaginat = Payment::paginate(10);

                    return view('pages/setting/firstLine', compact('payments', 'customers', 'offers', 'paymentPaginat'));
                }
            }
        }
    }

    public function secondtLine()
    {
        $customers = Customer::where('status','=', '1')->get();
        foreach ($customers as $customer) {
            $offers = Offer::all();
            foreach ($offers as $offer) {
                $allpayment = Payment::get();
                foreach ($allpayment as $payment) {
                    $startMonth_count = $payment->created_at->month;
                    $startYear_count = $payment->created_at->year;
                    $mont_count = $payment->created_at->format(date('m', strtotime(+$offer->month_count ."month")));
                    $from = date($startYear_count.'-'.$startMonth_count.'-10');
                    $firstSetting = Fistscond::find(1)->first()->second;
                    $number = str_pad($firstSetting,2,'0',STR_PAD_LEFT);
                    $to = date($startYear_count.'-'.$mont_count.'-'.$number);
                    $payments = Payment::where('created_at', '>=',$from)->where('created_at', '<=',$to)->where('customer_id', '=',$customer->id)->get();
                    $paymentPaginat = Payment::paginate(10);

                    return view('pages/setting/secondLine', compact('payments', 'customers', 'offers', 'paymentPaginat'));
                }
            }
        }
    }

    public function OutPayment()
    {
        $customers = Customer::all();
        $offers = Offer::all();
        $allpayment = Payment::all();
        foreach ($allpayment as $payment) {
            $month = date('m');
            $year = date('Y');
            $payments = Payment::whereMonth('created_at', '!=', $month)->whereYear('created_at', '!=', $year)->get();

            $paymentPaginat = Payment::paginate(10);
            return view('pages/setting/outPayment', compact('payments', 'customers', 'offers', 'paymentPaginat'));
        }
    }

    public function firstLineEdit(Request $request, $id)
    {
        $firstLine = Payment::find($id);
        $firstLine->customer_id = $request->customer_id;
        $firstLine->payment = $request->payment;
        $firstLine->image_id = $request->image_id;
        $firstLine->employee_id = $request->employee_id;
        $firstLine->branch_id = $request->branch_id;
        $firstLine->save();
        return view('pages/setting/firstLine');
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

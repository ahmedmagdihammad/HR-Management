<?php

namespace App\Http\Controllers\Admin\CustManager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Customer;
use App\Payment;
use App\Employee;
use App\Document;
use App\Refund;
use App\Service;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $customers = Customer::find($id);
        $allCustomers = $customers->getPayment;
        $allDocuments = Document::where('type', '=', 'C')->where('recid', '=', $customers['id'])->get();
        $allPayment = Payment::where('customer_id', '=', $customers['id'])->get();
        $allCustomers = Customer::all();
        $refunds = Refund::all();
        $services = Service::where('customer_id', '=', $customers['id'])->get();

        return view('pages/custManager/profiles', compact('customers', 'allCustomers', 'allDocuments', 'allCustomers','id', 'allPayment', 'refunds', 'services'));
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

    public function uploadimage($file)
     {
        $imagename = time().'.'.$file->getClientOriginalExtension();
        $destinationPath = public_path('customers');
        $file->move($destinationPath, $imagename); 
        $returenurl = 'customers/'.$imagename; 

        return $returenurl;  
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
        $customer = Customer::find($id);
        $customer->name_en = $request->name_en;
        $customer->name_ar = $request->name_ar;
        $customer->mobile_1 = $request->mobile_1;
        $customer->mobile_2 = $request->mobile_2;
        $customer->address = $request->address;
        $customer->n_passport_id = $request->n_passport_id;
        $customer->email = $request->email;
        $customer->gender = $request->gender;
        $customer->job = $request->job;
        $customer->date_birth = $request->date_birth;
        $customer->nationality = $request->nationality;
        $customer->notes = $request->notes;
        $customer->reference = $request->reference;
        if ($request->reference == NULL) {
            $customer->commission_id = NULL;
        }else {
        $customer->commission_id = $request->commission_id;
        }
        if ($request->hasFile('picture')) {
        $customer->picture = $this->uploadimage($request->picture);
        }
        $customer->save();
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
        //
    }
}

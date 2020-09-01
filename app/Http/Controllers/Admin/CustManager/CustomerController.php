<?php

namespace App\Http\Controllers\Admin\CustManager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Customer;
use App\Commission;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commissions = Commission::all();
        $customers = Customer::all();
        return view('pages/custManager/customers', compact('customers', 'commissions'));
    }

    public function filterCustomer(Request $request){
        $commissions = Commission::all();
        $customers = Customer::where('mobile_1', $request->mobile_1)
            ->whereBetween('created_at', [$request->date_from, $request->date_to])
            ->get();
        return view('pages/custManager/customers', compact('customers', 'commissions'));
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
        $customer = new Customer();
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

    public function uploadimage($file)
     {
        $imagename = time().'.'.$file->getClientOriginalExtension();
        $destinationPath = public_path('customers');
        $file->move($destinationPath, $imagename); 
        $returenurl = 'customers/'.$imagename; 

        return $returenurl;  
     }

    public function activeCustomer($id)
    {
        $customer = Customer::where('id', $id)
          ->update(['status' => 0]);
        return back();
    }

    public function suspendedCustomer($id)
    {
        $customer = Customer::where('id', $id)
          ->update(['status' => 1]);
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
        $customer = Customer::find($id);
        return view('pages/custManager/customerPRint_cart', compact('customer'));
    }

    public function print_id_card($id)
    {
        $customer = Customer::find($id);
        return view('pages/custManager/customerPrint_id_card', compact('customer'));
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
        $customer->name_en = $request->upname_en;
        $customer->name_ar = $request->upname_ar;
        $customer->mobile_1 = $request->upmobile_1;
        $customer->mobile_2 = $request->upmobile_2;
        $customer->address = $request->upaddress;
        $customer->n_passport_id = $request->upn_passport_id;
        $customer->email = $request->upemail;
        $customer->gender = $request->upgender;
        $customer->job = $request->upjob;
        $customer->date_birth = $request->update_birth;
        $customer->nationality = $request->upnationality;
        $customer->notes = $request->upnotes;
        $customer->reference = $request->upreference;

        if ($request->upreference == NULL) {
            $customer->commission_id = NULL;
        }else {
            $customer->commission_id = $request->upcommission_id;
        }

        if ($request->hasFile('uppicture')) {
        $customer->picture = $this->uploadimage($request->uppicture);
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
        Customer::find($id)->delete();
        return back();
    }
}

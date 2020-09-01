<?php

namespace App\Http\Controllers\Admin\Companies;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Service;
use App\Employee;
use App\Customer;

class ServiceCompController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companyes = Employee::where('type', 1)->get();
        $customers = Customer::all(); 
        return view('pages/companies/services', compact('companyes', 'customers'));
    }

    public function getCustomerComp(Request $request)
    {
        $customers = Customer::where('mobile_1', $request->mobile)->get();
        return view('pages/companies/services', compact('customers'));
    }

    public function indexService($id)
    {
        $services = Service::all();
        $customers = Customer::find($id);
        return view('pages/companies/serviceCust', compact('services', 'customers', 'id'));
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
        $service = new Service();
        $service->desc = $request->desc;
        $service->amount = $request->amount;
        $service->company_id = $request->company_id;
        $service->customer_id = $request->customer_id;
        $service->save();
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
        $service = Service::find($id);
        $service->desc = $request->updesc;
        $service->amount = $request->upamount;
        $service->company_id = $request->upcompany_id;
        $service->customer_id = $request->upcustomer_id;
        $service->save();
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
        Service::find($id)->delete();
        return back();
    }
}

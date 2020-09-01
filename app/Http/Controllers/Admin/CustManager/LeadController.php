<?php

namespace App\Http\Controllers\Admin\CustManager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Lead;
use App\LeadCenter;
use App\Payment;
use App\Customer;
use App\Offer;

class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leads = Lead::all();
        $offers = Offer::all();
        return view('pages.custManager.leads', compact('leads', 'offers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // Update Lead
            $lead = Lead::find($request->lead_id);
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
            if ($request->hasFile('image_id')) {
                $payment->image_id = $this->uploadimage($request->image_id);
            }
            $payment->employee_id = Auth()->user()->id;
            $payment->branch_id = Auth()->user()->branch_id;
            $payment->save();
        
        Lead::find($request->lead_id)->delete();
        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->stuts == true) {

            // Add new Lead
                $lead = new Lead();
                $lead->name_en = $request->name_en;
                $lead->name_ar = $request->name_ar;
                $lead->mobile_1 = $request->mobile_1;
                $lead->mobile_2 = $request->mobile_2;
                $lead->address = $request->address;
                $lead->n_passport_id = $request->n_passport_id;
                $lead->email = $request->email;
                $lead->gender = $request->gender;
                $lead->job = $request->job;
                $lead->date_birth = $request->date_birth;
                $lead->nationality = $request->nationality;
                $lead->notes = $request->notes;
                $lead->social_media = $request->social_media;
                $lead->status = '1';
                if ($request->hasFile('picture')) {
                    $lead->picture = $this->uploadimage($request->picture);
                }
                $lead->save();

            // Add new Customer
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
                $customer->picture = $lead->picture;
                $customer->save();
            
            // Add new Payment
                $call = new LeadCenter();
                $call->lead_id = $lead->id;
                $call->type = $request->type;
                $call->desc = $request->desc;
                $call->save();

            Lead::find($lead->id)->delete();
            return back();
        } else {
            $lead = new Lead();
            $lead->name_en = $request->name_en;
            $lead->name_ar = $request->name_ar;
            $lead->mobile_1 = $request->mobile_1;
            $lead->mobile_2 = $request->mobile_2;
            $lead->address = $request->address;
            $lead->n_passport_id = $request->n_passport_id;
            $lead->email = $request->email;
            $lead->gender = $request->gender;
            $lead->job = $request->job;
            $lead->date_birth = $request->date_birth;
            if ($request->hasFile('picture')) {
                $lead->picture = $this->uploadimage($request->picture);
            }
            $lead->nationality = $request->nationality;
            $lead->notes = $request->notes;
            $lead->social_media = $request->social_media;
            $lead->save();
            
            return back();
        }
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
        $lead = Lead::find($id);
        $lead->name_en = $request->upname_en;
        $lead->name_ar = $request->upname_ar;
        $lead->mobile_1 = $request->upmobile_1;
        $lead->mobile_2 = $request->upmobile_2;
        $lead->address = $request->upaddress;
        $lead->n_passport_id = $request->upn_passport_id;
        $lead->email = $request->upemail;
        $lead->gender = $request->upgender;
        $lead->job = $request->upjob;
        $lead->date_birth = $request->update_birth;
        $lead->nationality = $request->upnationality;
        $lead->notes = $request->upnotes;
        $lead->social_media = $request->upsocial_media;
        if ($request->hasFile('uppicture')) {
            $lead->picture = $this->uploadimage($request->uppicture);
        }
        $lead->save();
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
        Lead::find($id)->delete();
        return back();
    }
}

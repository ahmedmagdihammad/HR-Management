<?php

namespace App\Http\Controllers\Admin\Hrdepartment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Discount;
use App\Employee;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $discounts = Discount::all();
        $employees = Employee::find($id);
        return view('pages/hrdepartment/discounts', compact('discounts', 'employees', 'id'));
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
        $discount = new Discount();
        $discount->employee_id = $request->employee_id;
        $discount->name = $request->name;
        $discount->amount = $request->amount;
        $discount->desc = $request->desc;
        $discount->save();
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
        $discount = Discount::find($id);
        $discount->employee_id = $request->upemployee_id;
        $discount->name = $request->upname;
        $discount->amount = $request->upamount;
        $discount->desc = $request->updesc;
        $discount->save();
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
        Discount::find($id)->delete();
        return back();
    }
}

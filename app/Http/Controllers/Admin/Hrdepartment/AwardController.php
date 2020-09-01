<?php

namespace App\Http\Controllers\Admin\Hrdepartment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Award;
use App\Employee;

class AwardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $awards = Award::all();
        $employees = Employee::find($id);
        return view('pages/hrdepartment/awards', compact('awards', 'employees', 'id'));
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
        $award = new Award();
        $award->employee_id = $request->employee_id;
        $award->name = $request->name;
        $award->amount = $request->amount;
        $award->desc = $request->desc;

        $award->save();
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
        $award = Award::find($id);
        $award->employee_id = $request->upemployee_id;
        $award->name = $request->upname;
        $award->amount = $request->upamount;
        $award->desc = $request->updesc;

        $award->save();
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
        Award::find($id)->delete();
        return back();
    }
}

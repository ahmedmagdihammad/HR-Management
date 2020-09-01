<?php

namespace App\Http\Controllers\Admin\Accounting;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Expense;
use App\Expencestype;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expenses = Expense::all();
        $expencestypes = Expencestype::all();
        return view('pages/accounting/expenses', compact('expenses', 'expencestypes'));
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
        $expense = new Expense();
        $expense->expense_type = $request->expense_type;
        $expense->amount = $request->amount;
        $expense->date = $request->date;
        $expense->employee_id = $request->employee_id;
        $expense->branch_id = $request->branch_id;

        $expense->save();
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
        $expense = Expense::find($id);
        $expense->expense_type = $request->upexpense_type;
        $expense->amount = $request->upamount;
        $expense->date = $request->update;
        $expense->employee_id = $request->upemployee_id;
        $expense->branch_id = $request->upbranch_id;

        $expense->save();
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
        Expense::find($id)->delete();
        return back();
    }
}

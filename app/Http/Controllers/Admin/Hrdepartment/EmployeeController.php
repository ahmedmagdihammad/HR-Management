<?php

namespace App\Http\Controllers\Admin\Hrdepartment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Employee;
use App\Branch;
use App\Job;
use App\Department;
use App\User;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::where('type', 0)->get();
        $branches = Branch::all();
        $jobs = Job::all();
        $departments = Department::all();
        return view('pages/hrdepartment/employees', compact('employees', 'branches', 'jobs', 'departments'));
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
        $employee = new Employee();
        $employee->name = $request->name;
        $employee->mobile_1 = $request->mobile_1;
        $employee->mobile_2 = $request->mobile_2;
        $employee->email = $request->email;
        $employee->address = $request->address;
        $employee->n_passport_id = $request->n_passport_id;
        $employee->job   = $request->job  ;
        $employee->salary = $request->salary;
        $employee->branch_id = $request->branch_id;
        $employee->hiring_Date = $request->hiring_Date;
        $employee->save();

        $user = new User();
        $user->employee_id = $employee->id;
        $user->name = $request->name;
        $user->mobile_1 = $request->mobile_1;
        $user->mobile_2 = $request->mobile_2;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->n_passport_id = $request->n_passport_id;
        $user->job   = $request->job  ;
        $user->salary = $request->salary;
        $user->branch_id = $request->branch_id;
        $user->hiring_Date = $request->hiring_Date;
        $user->save();

        return back();
    }

    public function resetPass(Request $request, $id)
    {
        $employee = Employee::find($id);
        $employee->name = $request->resname;
        $employee->mobile_1 = $request->resmobile_1;
        $employee->mobile_2 = $request->resmobile_2;
        $employee->email = $request->resemail;
        $employee->address = $request->resaddress;
        $employee->n_passport_id = $request->resn_passport_id;
        $employee->job   = $request->resjob  ;
        $employee->salary = $request->ressalary;
        $employee->branch_id = $request->resbranch_id;
        $employee->hiring_Date = $request->reshiring_Date;
        $employee->password = $request->password;
        $employee->save();
        return redirect()->back();
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
        $employee = Employee::find($id);
        $employee->name = $request->upname;
        $employee->mobile_1 = $request->upmobile_1;
        $employee->mobile_2 = $request->upmobile_2;
        $employee->email = $request->upemail;
        $employee->address = $request->upaddress;
        $employee->n_passport_id = $request->upn_passport_id;
        $employee->job   = $request->upjob  ;
        $employee->salary = $request->upsalary;
        $employee->branch_id = $request->upbranch_id;
        $employee->hiring_Date = $request->uphiring_Date;
        $employee->save();

        $user = User::find($id);
        $user->employee_id = $employee->id;
        $user->name = $request->upname;
        $user->mobile_1 = $request->upmobile_1;
        $user->mobile_2 = $request->upmobile_2;
        $user->email = $request->upemail;
        $user->address = $request->upaddress;
        $user->n_passport_id = $request->upn_passport_id;
        $user->job   = $request->upjob  ;
        $user->salary = $request->upsalary;
        $user->branch_id = $request->upbranch_id;
        $user->hiring_Date = $request->uphiring_Date;
        $user->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employee::find($id)->delete();
        return redirect()->back();
    }

    public function getJobs(Request $request)
    {
        $jobs = Job::where('department_id',$request->id)->get();
        return $jobs;
    }
}

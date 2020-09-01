@extends('layout.master')
@section('title')
  Payroll
@endsection
@section('breadcrumb')
	<i class="fa fa-money"></i> Payroll
@endsection
@section('namepage')
  Reports
@endsection
@section('content')

<!-- Table Project -->
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-info">
        <div class="box-header">
          <h3 class="box-title">Payroll List</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body" style="">
          	@if(count($employees)>0)
	        <table id="example1" class="table table-bordered table-hover">
	            <thead>
	            <tr>
	              <th>Employee Name</th>
	              <th>Job</th>
	              <th>Branch</th>
	              <th>Basic salary</th>
	              <th>Award</th>
	              <th>Discount</th>
	              <th>Total Global</th>
	            </tr>
	            </thead>
	            <tbody>
	              	@foreach($employees as $employee)
		            <tr>
		                <td>{{$employee->name}}</td>
		                <td>{{$employee->job}}</td>
		                <td>{{$employee->getBranch['name']}}</td>
		                <td>{{$employee->salary}}</td>
		                <td>{{$employee->getAward->sum('amount')}}</td>
		                <td>{{$employee->getDiscount->sum('amount')}}</td>
		                <td>{{$employee->getAward->sum('amount') - $employee->getDiscount->sum('amount') + $employee->salary}}</td>
		            </tr>
	             	@endforeach
	              	<tr style="background: #F0E8E6">
	              		<td>Total Global The Employee</td>
	              		<td>-</td>
	              		<td>-</td>
	              		<td>{{$employees->sum('salary')}}</td>
	              		<td>@if(empty($awards->amount)) 0 @else {{$awards->sum('amount')}} @endif</td>
	              		<td>@if(empty($discounts->amount)) 0 @else {{$discounts->sum('amount')}} @endif</td>
	              		<td>{{ $employees->sum('salary')}}</td>
	              	</tr>
	            </tbody>
	       	</table>
	       	@else
	            <br><br><br><br><br>
	            <center class="text-danger"><i class="fa fa-frown-o"></i> &nbsp; Not Payroll &nbsp; <i class="fa fa-frown-o"></i></center>
	            <br><br><br><br><br><br><br><br>
	          @endif
        </div>
        <!-- /.box-body -->
      </div>
    </div>
  </div>

@endsection
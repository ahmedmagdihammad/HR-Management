@extends('layout.master')
@section('title')
  Employees
@endsection
@section('breadcrumb')
	<i class="fa fa-industry"></i> Company
@endsection
@section('namepage')
  Company
@endsection
@section('content')

<!-- Table Project -->
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-info">
        <div class="box-header">
          <button type="button" class="btn btn-xs btn-info pull-right" data-toggle="modal" data-target="#modal-add"><i class="fa  fa-plus"></i> Add Company</button>
          <h3 class="box-title">Company List</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body" >
          	@if(count($employees)>0)
	        <table id="example1" class="table table-bordered table-hover" >
	            <thead>
	            <tr>
	              <th>Company Name</th>
	              <th>User Name</th>
	              <th>Mobile</th>
	              <th>Options</th>
	            </tr>
	            </thead>
	            <tbody>
	              @foreach($employees as $employee)
		            <tr>
		                <td>{{$employee->company_name}}</td>
		                <td>{{$employee->name}}</td>
		                <td>{{$employee->mobile_1}}</td>
		                <td>
		                  	<button type="button" class="edit-employee btn btn-xs btn-warning" data-toggle="modal" data-target="#modal-edit{{$employee->id}}"><i class="fa fa-edit"></i> Edit</button>
		                  	<button type="button" class="delete-employee btn btn-xs btn-danger" data-toggle="modal" data-target="#modal-delete{{$employee->id}}"><i class="fa fa-remove"></i> Delete</button>
		                  	<a href="{{route('profileComp', $employee->id)}}" class="delete-paymentment btn btn-xs btn-info"><i class="fa fa-eye"></i> Profile</a>
		                  	<a href="{{route('companies.customer')}}" class=" btn btn-xs btn-success"><i class="fa fa-money"></i> Add Service</a>
		                  	<!-- <a href="#" class="delete-paymentment btn btn-xs btn-danger"><i class="fa fa-frown-o"></i> Add Discount</a> -->
		                </td>
		            </tr>

	              	<!-- Modal add -->
					    <div class="modal fade" id="modal-edit{{$employee->id}}">
					      <div class="modal-dialog">
					        <div class="modal-content">
					          	<div class="modal-header">
					            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					              	<span aria-hidden="true">&times;</span></button>
					            	<h4 class="modal-title"><i class="fa fa-edit"></i> Edit</h4>
					          	</div>
						        <form method="post" action="{{route('company.edit', $employee->id)}}">
						          	<div class="modal-body">
						              {{csrf_field()}}
							            <div class="form-group">
							                <div class="row">
							                  <div class="col-md-2">
							                    <label for="exampleInputEmail1">Comany Name </label>
							                  </div>
							                  <div class="col-md-10">
							                    <input type="text" class="form-control" name="upcompany_name" id="upcompany_name" value="{{$employee->company_name}}" required="">
							                  </div>
							                </div>
							            </div>
							            <div class="form-group">
							                <div class="row">
							                  <div class="col-md-2">
							                    <label for="exampleInputEmail1">User Name</label>
							                  </div>
							                  <div class="col-md-10">
							                    <input type="text" class="form-control" name="upuser_name" id="upuser_name" value="{{$employee->name}}" required="">
							                  </div>
							                </div>
							            </div>
							            <div class="form-group">
							                <div class="row">
							                  <div class="col-md-2">
							                    <label for="exampleInputEmail1">Mobile</label>
							                  </div>
							                  <div class="col-md-10">
							                    <input type="number" class="form-control" name="upmobile" id="upmobile" value="{{$employee->mobile_1}}" required="">
							                  </div>
							                </div>
							            </div>
						          	</div>
						          	<div class="modal-footer">
						            	<button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
						            	<button type="submit" class="btn btn-success save">Save</button>
						          	</div>
						       	</form>
					        </div>
					        <!-- /.modal-content -->
					      </div>
					      <!-- /.modal-dialog -->
					    </div>

					<!-- Modal Delete -->
					    <div class="modal fade" id="modal-delete{{$employee->id}}">
					      <div class="modal-dialog">
					        <div class="modal-content">
					          <div class="modal-header">
					            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					              <span aria-hidden="true">&times;</span></button>
					            <h4 class="modal-title"><i class="fa fa-trash"></i> Delete</h4>
					          </div>
					            <form method="post" action="{{route('company.delete', $employee->id)}}">
					          		<div class="modal-body">
						              	{{csrf_field()}}
							            <div class="form-group">
							                <div class="row">
							                  <div class="col-md-2">
							                    <label for="exampleInputEmail1">Comapny Name </label>
							                  </div>
							                  <div class="col-md-4">
							                  	<p>{{$employee->company_name}}</p>
							                  </div>
							                  <div class="col-md-2">
							                    <label for="exampleInputEmail1">User Name </label>
							                  </div>
							                  <div class="col-md-4">
							                  	<p>{{$employee->name}}</p>
							                  </div>
							              	</div>
							              	<br>
							              	<div class="row">
							                  <div class="col-md-2">
							                    <label for="exampleInputEmail1">Mobile </label>
							                  </div>
							                  <div class="col-md-10">
							                  	<p>{{$employee->mobile_1}}</p>
							                  </div>
							                </div>
							            </div>
						          	</div>
						          	<div class="modal-footer">
						            	<button type="button" class="btn btn-info pull-left" data-dismiss="modal">Close</button>
						            	<button type="submit" class="btn btn-danger">Delete</button>
						          	</div>
					            </form>
					        </div>
					        <!-- /.modal-content -->
					      </div>
					      <!-- /.modal-dialog -->
					    </div>

	              @endforeach
	            </tbody>
	       	</table>
	       	@else
	            <br><br><br><br><br>
	            <center class="text-danger"><i class="fa fa-frown-o"></i> &nbsp; Not Companies &nbsp; <i class="fa fa-frown-o"></i></center>
	            <br><br><br><br><br><br><br><br>
	          @endif
        </div>
        <!-- /.box-body -->
      </div>
    </div>
  </div>

<!-- Modal add -->
    <div class="modal fade" id="modal-add">
      <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              	<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><i class="fa fa-plus"></i> Add</h4>
          	</div>
	        <form method="post" action="{{route('company.store')}}">
	          	<div class="modal-body">
	              {{csrf_field()}}
		            <div class="form-group">
		                <div class="row">
		                  <div class="col-md-2">
		                    <label for="exampleInputEmail1">Company Name </label>
		                  </div>
		                  <div class="col-md-10">
		                    <input type="text" class="form-control" name="company_name" id="company_name" placeholder="Enter Company Name" required="">
		                  </div>
		                </div>
		            </div>
		            <div class="form-group">
		                <div class="row">
		                  <div class="col-md-2">
		                    <label>User Name </label>
		                  </div>
		                  <div class="col-md-10">
		                    <input type="text" class="form-control" name="user_name" id="user_name" placeholder="Enter User Name" required="">
		                  </div>
		                </div>
		            </div>
		            <div class="form-group">
		                <div class="row">
		                  <div class="col-md-2">
		                    <label>Mobile </label>
		                  </div>
		                  <div class="col-md-10">
		                    <input type="number" class="form-control" name="mobile" id="mobile" placeholder="Enter Mobile 1" required="">
		                  </div>
		                </div>
		            </div>
	          	</div>
	          	<div class="modal-footer">
	            	<button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
	            	<button type="submit" class="btn btn-success save">Save</button>
	          	</div>
	       	</form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>

@endsection
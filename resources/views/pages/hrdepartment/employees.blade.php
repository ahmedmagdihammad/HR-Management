@extends('layout.master')
@section('title')
  Employees
@endsection
@section('breadcrumb')
	<i class="fa fa-user-plus"></i> Employee
@endsection
@section('namepage')
  HR Department
@endsection
@section('content')

<!-- Table Project -->
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-info">
        <div class="box-header">
          <button type="button" class="btn btn-xs btn-info pull-right" data-toggle="modal" data-target="#modal-add"><i class="fa  fa-plus"></i> Add Employee</button>
          <h3 class="box-title">Employees List</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body" style="overflow-x: auto;">
          	@if(count($employees)>0)
	        <table id="example1" class="table table-bordered table-hover" >
	            <thead>
	            <tr>
	              <th>Employee Name</th>
	              <th>Branch</th>
	              <th>Mobile 1</th>
	              <th>Mobile 2</th>
	              <th>Email</th>
	              <th>Address</th>
	              <th>NID / Passport Id</th>
	              <th>Job</th>
	              <th>Salary</th>
	              <th>Hiring Date</th>
	              <th>Options</th>
	            </tr>
	            </thead>
	            <tbody>
	              @foreach($employees as $employee)
		            <tr>
		                <td>{{$employee->name}}</td>
		                <td>{{$employee->getBranch['name']}}</td>
		                <td>{{$employee->mobile_1}}</td>
		                <td>{{$employee->mobile_2}}</td>
		                <td>{{$employee->email}}</td>
		                <td>{{$employee->address}}</td>
		                <td>{{$employee->n_passport_id}}</td>
		                <td>{{$employee->job}}</td>
		                <td>{{$employee->salary}}</td>
		                <td>{{$employee->hiring_Date}}</td>
		                <td>
		                  	<button type="button" class="edit-employee btn btn-xs btn-warning" data-toggle="modal" data-target="#modal-edit{{$employee->id}}" title="Edit"><i class="fa fa-edit"></i> Edit</button>
		                  	<button type="button" class="delete-employee btn btn-xs btn-danger" data-toggle="modal" data-target="#modal-delete{{$employee->id}}" title="Delete"><i class="fa fa-remove"></i> Delete</button>
		                  	<a href="{{route('employee.profile',$employee->id)}}" class="delete-paymentment btn btn-xs btn-primary"><i class="fa fa-eye" title="Show Profile"></i> Profile</a>
							<a href="{{route('document',$employee->id)}}" class="delete-paymentment btn btn-xs btn-info"><i class="fa fa-photo" title="Add Document"></i> Add Document</a>
		                  	<a href="{{route('award',$employee->id)}}" class="delete-paymentment btn btn-xs btn-success"><i class="fa fa-plus" title="Add Bonus"></i> Add Bonus</a>
		                  	<a href="{{route('discount',$employee->id)}}" class="delete-paymentment btn btn-xs btn-danger"><i class="fa fa-frown-o" title="Add Deduction"></i> Add Deduction</a>

		                  	<form method="POST" action="{{route('resetPass', $employee->id)}}">
						        {{csrf_field()}}
					            <div class="form-group hidden">
					                <div class="row">
					                  <div class="col-md-2">
					                    <label for="exampleInputEmail1">Employee: <span style="color:red">*</span> </label>
					                  </div>
					                  <div class="col-md-10">
					                    <input type="text" class="form-control" name="resname" id="resname" value="{{$employee->name}}" required="">
					                  </div>
					                </div>
					            </div>
					            <div class="form-group hidden">
					                <div class="row">
					                  <div class="col-md-2">
					                    <label for="exampleInputEmail1">Branch: <span style="color:red">*</span> </label>
					                  </div>
					                  <div class="col-md-10">
					                    <select class="form-control" name="resbranch_id" id="resbranch_id" required="">
					                    	<option id="{{$employee->getBranch['id']}}">{{$employee->getBranch['name']}}</option>
					                    	@foreach($branches as $branch)
					                    	<option value="{{$branch->id}}">{{$branch->name}}</option>
					                    	@endforeach
					                    </select>
					                  </div>
					                </div>
					            </div>
					            <div class="form-group hidden">
					                <div class="row">
					                  <div class="col-md-2">
					                    <label for="exampleInputEmail1">Mobile 1: <span style="color:red">*</span> </label>
					                  </div>
					                  <div class="col-md-10">
					                    <input type="number" class="form-control" name="resmobile_1" id="resmobile_1" value="{{$employee->mobile_1}}" required="">
					                  </div>
					                </div>
					            </div>
					            <div class="form-group hidden">
					                <div class="row">
					                  <div class="col-md-2">
					                    <label for="exampleInputEmail1">Mobile 2: <span style="color:red">*</span> </label>
					                  </div>
					                  <div class="col-md-10">
					                    <input type="number" class="form-control" name="resmobile_2" id="resmobile_2" value="{{$employee->mobile_2}}" required=" ">
					                  </div>
					                </div>
					            </div>
					            <div class="form-group hidden">
					                <div class="row">
					                  <div class="col-md-2">
					                    <label for="exampleInputEmail1">Email: <span style="color:red">*</span> </label>
					                  </div>
					                  <div class="col-md-10">
					                    <input type="email" class="form-control" name="resemail" id="resemail" value="{{$employee->email}}" required="">
					                  </div>
					                </div>
					            </div>
					            <div class="form-group hidden">
					                <div class="row">
					                  <div class="col-md-2">
					                    <label for="exampleInputEmail1">Address: <span style="color:red">*</span> </label>
					                  </div>
					                  <div class="col-md-10">
					                    <input type="text" class="form-control" name="resaddress" id="resaddress" value="{{$employee->address}}" required="">
					                  </div>
					                </div>
					            </div>
					            <div class="form-group hidden">
					                <div class="row">
					                  <div class="col-md-2">
					                    <label for="exampleInputEmail1">NID / Passport id: <span style="color:red">*</span> </label>
					                  </div>
					                  <div class="col-md-10">
					                    <input type="number" class="form-control" name="resn_passport_id" id="resn_passport_id" value="{{$employee->n_passport_id}}" required="">
					                  </div>
					                </div>
					            </div>
					            <div class="form-group hidden">
					                <div class="row">
					                  <div class="col-md-2">
					                    <label for="exampleInputEmail1">Job: <span style="color:red">*</span> </label>
					                  </div>
					                  <div class="col-md-10">
					                    <input type="text" class="form-control" name="resjob" id="resjob" value="{{$employee->job}}" required="">
					                  </div>
					                </div>
					            </div>
					            <div class="form-group hidden">
					                <div class="row">
					                  <div class="col-md-2">
					                    <label for="exampleInputEmail1">Salary: <span style="color:red">*</span> </label>
					                  </div>
					                  <div class="col-md-10">
					                    <input type="number" class="form-control" name="ressalary" id="ressalary" value="{{$employee->salary}}" required="">
					                  </div>
					                </div>
					            </div>
					            <div class="form-group hidden">
					                <div class="row">
					                  <div class="col-md-2">
					                    <label for="exampleInputEmail1">Hiring Date: <span style="color:red">*</span> </label>
					                  </div>
					                  <div class="col-md-10">
					                    <input type="date" class="form-control" name="reshiring_Date" id="reshiring_Date" value="{{$employee->hiring_Date}}" required="">
					                  </div>
					                </div>
					            </div>
					            <div class="form-group hidden">
					                <div class="row">
					                  <div class="col-md-2">
					                    <label for="exampleInputEmail1">Password: </label>
					                  </div>
					                  <div class="col-md-10">
					                    <input type="password" class="form-control" name="password" id="password" value="$1$//UvoXhj$EM0o0SoRxoFVDodpNdWD81" required="">
					                  </div>
					                </div>
					            </div>

				            	<button type="submit" class="btn btn-xs btn-primary" title="Reset Password">Reset Password</button>
						    </form>
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
						        <form method="post" action="{{route('employee.edit', $employee->id)}}">
						          	<div class="modal-body">
						              {{csrf_field()}}
							            <div class="form-group">
							                <div class="row">
							                  <div class="col-md-2">
							                    <label for="exampleInputEmail1">Employee: <span style="color:red">*</span> </label>
							                  </div>
							                  <div class="col-md-10">
							                    <input type="text" class="form-control" name="upname" id="upname" value="{{$employee->name}}" required="">
							                  </div>
							                </div>
							            </div>
							            <div class="form-group">
							                <div class="row">
							                  <div class="col-md-2">
							                    <label for="exampleInputEmail1">Branch: <span style="color:red">*</span> </label>
							                  </div>
							                  <div class="col-md-10">
							                    <select class="form-control" name="upbranch_id" id="upbranch_id" required="">
							                    	<option id="{{$employee->getBranch['id']}}">{{$employee->getBranch['name']}}</option>
							                    	@foreach($branches as $branch)
							                    	<option value="{{$branch->id}}">{{$branch->name}}</option>
							                    	@endforeach
							                    </select>
							                  </div>
							                </div>
							            </div>
							            <div class="form-group">
							                <div class="row">
							                  <div class="col-md-2">
							                    <label for="exampleInputEmail1">Mobile 1: <span style="color:red">*</span> </label>
							                  </div>
							                  <div class="col-md-10">
							                    <input type="number" class="form-control" name="upmobile_1" id="upmobile_1" value="{{$employee->mobile_1}}" required="">
							                  </div>
							                </div>
							            </div>
							            <div class="form-group">
							                <div class="row">
							                  <div class="col-md-2">
							                    <label for="exampleInputEmail1">Mobile 2: <span style="color:red">*</span> </label>
							                  </div>
							                  <div class="col-md-10">
							                    <input type="number" class="form-control" name="upmobile_2" id="upmobile_2" value="{{$employee->mobile_2}}" required=" ">
							                  </div>
							                </div>
							            </div>
							            <div class="form-group">
							                <div class="row">
							                  <div class="col-md-2">
							                    <label for="exampleInputEmail1">Email: <span style="color:red">*</span> </label>
							                  </div>
							                  <div class="col-md-10">
							                    <input type="email" class="form-control" name="upemail" id="upemail" value="{{$employee->email}}" required="">
							                  </div>
							                </div>
							            </div>
							            <div class="form-group">
							                <div class="row">
							                  <div class="col-md-2">
							                    <label for="exampleInputEmail1">Address: <span style="color:red">*</span> </label>
							                  </div>
							                  <div class="col-md-10">
							                    <input type="text" class="form-control" name="upaddress" id="upaddress" value="{{$employee->address}}" required="">
							                  </div>
							                </div>
							            </div>
							            <div class="form-group">
							                <div class="row">
							                  <div class="col-md-2">
							                    <label for="exampleInputEmail1">NID / Passport id: <span style="color:red">*</span> </label>
							                  </div>
							                  <div class="col-md-10">
							                    <input type="number" class="form-control" name="upn_passport_id" id="upn_passport_id" value="{{$employee->n_passport_id}}" required="">
							                  </div>
							                </div>
							            </div>
							            <div class="form-group">
											<div class="row">
											  <div class="col-md-2">
												<label>Department: </label>
											  </div>
											  <div class="col-md-10">
												<select class="form-control " id="updepartment" style="width: 100%; color: #000">
												  <option>- Select Department -</option>
												  @foreach($departments as $department)
												  <option value="{{$department->id}}">{{$department->name}}</option>
												  @endforeach
												</select>
											  </div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
											  <div class="col-md-2">
												<label>Job Title: </label>
											  </div>
											  <div class="col-md-10">
												<select class="form-control " id="upjob" style="width: 100%; color: #000">
													<option value="">- Select Job -</option>
												</select>
											  </div>
											</div>
										</div>
							            <div class="form-group">
							                <div class="row">
							                  <div class="col-md-2">
							                    <label for="exampleInputEmail1">Salary: <span style="color:red">*</span> </label>
							                  </div>
							                  <div class="col-md-10">
							                    <input type="number" class="form-control" name="upsalary" id="upsalary" value="{{$employee->salary}}" required="">
							                  </div>
							                </div>
							            </div>
							            <div class="form-group">
							                <div class="row">
							                  <div class="col-md-2">
							                    <label for="exampleInputEmail1">Hiring Date: <span style="color:red">*</span> </label>
							                  </div>
							                  <div class="col-md-10">
							                    <input type="date" class="form-control" name="uphiring_Date" id="uphiring_Date" value="{{$employee->hiring_Date}}" required="">
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
					            <form method="post" action="{{route('employee.delete', $employee->id)}}">
					          		<div class="modal-body">
						              	{{csrf_field()}}
							            <div class="form-group">
							                <div class="row">
							                  <div class="col-md-2">
							                    <label for="exampleInputEmail1">Employee: </label>
							                  </div>
							                  <div class="col-md-2">
							                  	<p>{{$employee->name}}</p>
							                  </div>
							                  <div class="col-md-2">
							                    <label for="exampleInputEmail1">Branch: </label>
							                  </div>
							                  <div class="col-md-2">
							                  	<p>{{$employee->getBranch['name']}}</p>
							                  </div>
							                  <div class="col-md-2">
							                    <label for="exampleInputEmail1">Job: </label>
							                  </div>
							                  <div class="col-md-2">
							                  	<p>{{$employee->job}}</p>
							                  </div>
							                </div>
							                <br>
							                <div class="row">
							                	<div class="col-md-3">
							                    	<label for="exampleInputEmail1">NID / Passport id: </label>
							                  	</div>
							                  	<div class="col-md-9">
							                  		<p>{{$employee->n_passport_id}}</p>
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
	            <center class="text-danger"><i class="fa fa-frown-o"></i> &nbsp; Not Employees &nbsp; <i class="fa fa-frown-o"></i></center>
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
	        <form method="post" action="{{route('employee.store')}}">
	          	<div class="modal-body">
	              {{csrf_field()}}
		            <div class="form-group">
		                <div class="row">
		                  <div class="col-md-2">
		                    <label for="exampleInputEmail1">Employee: <span style="color:red">*</span> </label>
		                  </div>
		                  <div class="col-md-10">
		                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" required="">
		                  </div>
		                </div>
		            </div>
		            <div class="form-group">
		                <div class="row">
		                  <div class="col-md-2">
		                    <label for="exampleInputEmail1">Branch: <span style="color:red">*</span> </label>
		                  </div>
		                  <div class="col-md-10">
		                    <select class="form-control" name="branch_id" id="branch_id" required="">
		                    	@foreach($branches as $branch)
		                    	<option value="{{$branch->id}}">{{$branch->name}}</option>
		                    	@endforeach
		                    </select>
		                  </div>
		                </div>
		            </div>
		            <div class="form-group">
		                <div class="row">
		                  <div class="col-md-2">
		                    <label for="exampleInputEmail1">Mobile 1: <span style="color:red">*</span> </label>
		                  </div>
		                  <div class="col-md-10">
		                    <input type="number" class="form-control" name="mobile_1" id="mobile_1" placeholder="Enter Mobile 1" required="">
		                  </div>
		                </div>
		            </div>
		            <div class="form-group">
		                <div class="row">
		                  <div class="col-md-2">
		                    <label for="exampleInputEmail1">Mobile 2: <span style="color:red">*</span> </label>
		                  </div>
		                  <div class="col-md-10">
		                    <input type="number" class="form-control" name="mobile_2" id="mobile_2" placeholder="Enter Mobile 1" required=" ">
		                  </div>
		                </div>
		            </div>
		            <div class="form-group">
		                <div class="row">
		                  <div class="col-md-2">
		                    <label for="exampleInputEmail1">Email: <span style="color:red">*</span> </label>
		                  </div>
		                  <div class="col-md-10">
		                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" required="">
		                  </div>
		                </div>
		            </div>
		            <div class="form-group">
		                <div class="row">
		                  <div class="col-md-2">
		                    <label for="exampleInputEmail1">Address: <span style="color:red">*</span> </label>
		                  </div>
		                  <div class="col-md-10">
		                    <input type="text" class="form-control" name="address" id="address" placeholder="Enter Address" required="">
		                  </div>
		                </div>
		            </div>
		            <div class="form-group">
		                <div class="row">
		                  <div class="col-md-2">
		                    <label for="exampleInputEmail1">NID / Passport id: <span style="color:red">*</span> </label>
		                  </div>
		                  <div class="col-md-10">
		                    <input type="number" class="form-control" name="n_passport_id" id="n_passport_id" placeholder="Enter NID / Passport id " required="">
		                  </div>
		                </div>
		            </div>
		            <div class="form-group">
						<div class="row">
						  <div class="col-md-2">
							<label>Department: </label>
						  </div>
						  <div class="col-md-10">
							<select class="form-control " name="department" id="department" style="width: 100%; color: #000">
							  <option>- Select Department -</option>
							  @foreach($departments as $department)
							  <option value="{{$department->id}}">{{$department->name}}</option>
							  @endforeach
							</select>
						  </div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
						  <div class="col-md-2">
							<label>Job Title: </label>
						  </div>
						  <div class="col-md-10">
							<select class="form-control " name="job" id="job" style="width: 100%; color: #000">
							  <option value="">- Select Job -</option>
							</select>
						  </div>
						</div>
					</div>
		            <div class="form-group">
		                <div class="row">
		                  <div class="col-md-2">
		                    <label for="exampleInputEmail1">Salary: <span style="color:red">*</span> </label>
		                  </div>
		                  <div class="col-md-10">
		                    <input type="number" class="form-control" name="salary" id="salary" placeholder="Enter Salary" required="">
		                  </div>
		                </div>
		            </div>
		            <div class="form-group">
		                <div class="row">
		                  <div class="col-md-2">
		                    <label for="exampleInputEmail1">Hiring Date: <span style="color:red">*</span> </label>
		                  </div>
		                  <div class="col-md-10">
		                    <input type="date" class="form-control" name="hiring_Date" id="hiring_Date" placeholder="Enter Hiring Date" required="">
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
	
	<script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
	<script>
		$("#department").on('change', function() {
			var id = $(this).children("option:selected").val();
			$.ajax({
				type: 'get',
				url: '{{route("getJobs")}}',
				data: { 'id': id},
				success: function(data) {alert('success');
					if (data == '') {
						$('#job').html('<option> - There is no jobs here - </option>');
					}else{
						$("#job").html(" ").append('<option>- Select Job -</option>');
						for (var i = 0; i < data.length; i++) {
							var o = new Option(data[i].name, data[i].id);
							$("#job").append(o);
						}
					}          	
				},
				error: function(data) {
					alert('errors');
				}
			}); 
		});

		$("#updepartment").on('change', function() {
			var id = $(this).children("option:selected").val();
			$.ajax({
				type: 'get',
				url: '{{route("getJobs")}}',
				data: { 'id': id, },
				success: function(data) {
					if (data == '') {
						$('#upjob').html('<option> -- There is no jobs here -- </option>');
					}else{
						$("#upjob").html(" ").append('<option >- Select Job -</option>');
						for (var i = 0; i < data.length; i++) {
							var o = new Option(data[i].name, data[i].id);
								$(o).html('<option val='+data[i].id+'>'+data[i].name+'</option>');
								$("#upjob").append(o);
							}
					}
				},
				error: function(data) {
				$('#edit-done').attr('hidden', 'hidden');
				$('#edit-error').removeAttr('hidden', 'hidden').slideDown(700).slideUp(700);
				}
			}); 
		});
	</script>
@endsection
@extends('layout.master')
@section('title')
  Expenses
@endsection
@section('breadcrumb')
	<i class="fa fa-shopping-basket"></i> Expenses
@endsection
@section('namepage')
  Accounting
@endsection
@section('content')

<!-- Table Project -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-info">
            <div class="box-header">
              <button type="button" class="btn btn-xs btn-info pull-right" data-toggle="modal" data-target="#modal-add"><i class="fa  fa-plus"></i> Add Expense</button>
              <h3 class="box-title">Expenses List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
          		@if(count($expenses)>0)
              	<table id="example1" class="table table-bordered table-hover">
	                <thead>
		                <tr>
		                  	<th>Expense Type</th>
							<th>Amount</th>
							<th>Date</th>
							<th>Employe Name</th>
							<th>Branch</th>
							<th>Options</th>
		                </tr>
	                </thead>
	                <tbody>
	               		@foreach($expenses as $expense)
						<tr>
							<td>{{$expense->getExpencestype['name']}}</td>
							<td>{{$expense->amount}}</td>
							<td>{{$expense->date}}</td>
							<td>{{$expense->getEmployee['name']}}</td>
							<td>{{$expense->getEmployee->getBranch['name']}}</td>
		                    <td>
		                    	<button type="button" class="edit-expense btn btn-xs btn-warning" data-toggle="modal" data-target="#modal-edit{{$expense->id}}"><i class="fa fa-edit"></i> Edit</button>
		                    	<button type="button" class="delete-expense btn btn-xs btn-danger" data-toggle="modal" data-target="#modal-delete{{$expense->id}}"><i class="fa fa-trash"></i> Delete</button>
		                    </td>
	                	</tr>

	                	<!-- Modal Edit -->
						    <div class="modal fade" id="modal-edit{{$expense->id}}">
						      <div class="modal-dialog">
						        <div class="modal-content">
						          <div class="modal-header">
						            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						              <span aria-hidden="true">&times;</span></button>
						            <h4 class="modal-title"><i class="fa fa-edit"></i> Edit</h4>
						          </div>
						            <form method="POST" action="{{route('expense.edit', $expense->id)}}"  enctype="multipart/form-data">
							          <div class="modal-body">
							              {{csrf_field()}}
								            <div class="form-group">
								                <div class="row">
								                  <div class="col-md-2">
								                    <label for="exampleInputEmail1">Name: <span style="color:red;">*</span> </label>
								                  </div>
								                  <div class="col-md-10">
								                  	<select class="form-control" name="upexpense_type" id="upexpense_type" >
								                  		<option value="{{$expense->getExpencestype['id']}}">{{$expense->getExpencestype['name']}}</option>
								                  		@foreach($expencestypes as $expenstype)
								                  		<option value="{{$expenstype->id}}">{{$expenstype->name}}</option>
								                  		@endforeach
								                  	</select>
								                  </div>
									            </div>
							              	</div>
							              	<div class="form-group">
								                <div class="row">
								                  <div class="col-md-2">
								                    <label for="exampleInputEmail1">Amount: <span style="color:red;">*</span> </label>
								                  </div>
								                  <div class="col-md-10">
								                    <input type="number" class="form-control" name="upamount" id="upamount" value="{{$expense->amount}}" placeholder="Amount" required="">
								                  </div>
								                </div>
							                </div>
							                <div class="form-group">
								                <div class="row">
								                  <div class="col-md-2">
								                    <label for="exampleInputEmail1">Date: <span style="color:red;">*</span> </label>
								                  </div>
								                  <div class="col-md-10">
								                    <input type="date" class="form-control" name="update" id="update" value="{{$expense->date}}" placeholder="Date" required="">
								                  </div> 
								                </div>
							                </div>
							                <div class="form-group hidden">
								                <div class="row">
								                  <div class="col-md-2">
								                    <label for="exampleInputEmail1">Employee: </label>
								                  </div>
								                  <div class="col-md-10">
								                    <input type="text" class="form-control" name="upemployee_id" id="upemployee_id" value="{{Auth::user()->id}}" required="">
								                  </div>
								                </div>
							                </div>
							                <div class="form-group hidden">
								                <div class="row">
								                  <div class="col-md-2">
								                    <label for="exampleInputEmail1">Branch: </label>
								                  </div>
								                  <div class="col-md-10">
								                    <input type="text" class="form-control" name="upbranch_id" id="upbranch_id" value="{{Auth::user()->branch_id}}" required="">
								                  </div>
								                </div>
							                </div>
							          </div>
							          <div class="modal-footer">
							            <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
							            <button type="submit" class="btn btn-success">Update</button>
							          </div>
						            </form>
						        </div>
						        <!-- /.modal-content -->
						      </div>
						      <!-- /.modal-dialog -->
						    </div>

						<!-- Modal Delete -->
							<div class="modal fade" id="modal-delete{{$expense->id}}">
							  <div class="modal-dialog">
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span></button>
							        <h4 class="modal-title"><i class="fa fa-trash"></i> Dalete </h4>
							      </div>
							      <form method="POST" action="{{route('expense.delete', $expense->id)}}">
							        <div class="modal-body">
							        	{{csrf_field()}}
							            <div class="form-group" >
							                <div class="row">
							                  	<div class="col-md-2">
							                    	<label for="exampleInputEmail1">Amount: </label>
							                  	</div>
							                  	<div class="col-md-2">
							                  		<p>{{$expense->amount}}</p>
							                  	</div>
							                  	<div class="col-md-2">
							                    	<label for="exampleInputEmail1">Employee: </label>
							                  	</div>
							                  	<div class="col-md-2">
							                  		<p>{{$expense->getEmployee['name']}}</p>
							                  	</div>
							                  	<div class="col-md-2">
							                    	<label for="exampleInputEmail1">date: </label>
							                  	</div>
							                  	<div class="col-md-2">
							                  		<p>{{$expense->date}}</p>
							                  	</div>
							                </div>
							                <br>
						                  	<div class="row">
							                  	<div class="col-md-2">
							                    	<label for="exampleInputEmail1">Expense Type: </label>
							                  	</div>
						                  		<div class="col-md-2">
							                  		<p>{{$expense->getExpencestype['name']}}</p>
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
		            <center class="text-danger"><i class="fa fa-frown-o"></i> &nbsp; Not expenses &nbsp; <i class="fa fa-frown-o"></i></center>
		            <br><br><br><br><br><br><br><br>
		        @endif
            </div>
            <!-- /.box-body -->
          </div>
        </div>
      </div>
    </section>

<!-- Modal Add -->
    <div class="modal fade" id="modal-add">
      <div class="modal-dialog">
        <div class="modal-content">
	        <div class="modal-header">
	            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	              <span aria-hidden="true">&times;</span></button>
	            <h4 class="modal-title"><i class="fa fa-plus"></i> Add</h4>
	        </div>
	        <form method="POST" action="{{route('expense.store')}}">
	            <div class="modal-body">
	            	{{csrf_field()}}
	                <div class="form-group">
		                <div class="row">
		                  <div class="col-md-2">
		                    <label for="exampleInputEmail1">Expense Type </label>
		                  </div>
		                  <div class="col-md-10">
		                    <select class="form-control" name="expense_type" required="">
		                    	@foreach($expencestypes as $expense)
		                    	<option value="{{$expense->id}}">{{$expense->name}}</option>
		                    	@endforeach
		                    </select>
		                  </div>
		                </div>
	                </div>
	                <div class="form-group">
		                <div class="row">
		                  <div class="col-md-2">
		                    <label for="exampleInputEmail1">Amount: <span style="color:red;">*</span> </label>
		                  </div>
		                  <div class="col-md-10">
		                    <input type="number" class="form-control" name="amount" id="amount" placeholder="Amount" required="">
		                  </div>
		                </div>
	                </div>
	                <div class="form-group">
		                <div class="row">
		                  <div class="col-md-2">
		                    <label for="exampleInputEmail1">Date: <span style="color:red;">*</span> </label>
		                  </div>
		                  <div class="col-md-10">
		                    <input type="date" class="form-control" name="date" id="date" placeholder="Date" required="">
		                  </div>
		                </div>
	                </div>
	                <div class="form-group hidden">
		                <div class="row">
		                  <div class="col-md-2">
		                    <label for="exampleInputEmail1">Employee: </label>
		                  </div>
		                  <div class="col-md-10">
		                    <input type="text" class="form-control" name="employee_id" id="employee_id" value="{{Auth::user()->id}}" required="">
		                  </div>
		                </div>
	                </div>
	                <div class="form-group hidden">
		                <div class="row">
		                  <div class="col-md-2">
		                    <label for="exampleInputEmail1">Branch: </label>
		                  </div>
		                  <div class="col-md-10">
		                    <input type="text" class="form-control" name="branch_id" id="branch_id" value="{{Auth::user()->branch_id}}" required="">
		                  </div>
		                </div>
	                </div>
	          	</div>
	          	<div class="modal-footer">
	            	<button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
	            	<button type="submit" class="btn btn-success">Save</button>
	          	</div>
	        </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
	
@endsection
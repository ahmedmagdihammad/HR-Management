@extends('layout.master')
@section('title')
  Create New Group
@endsection
@section('breadcrumb')
	<i class="fa fa-users"></i> New Group
	<li><i class="fa fa-users"></i> Create New Group</li>
@endsection
@section('namepage')
  HR New Group
@endsection
@section('content')

<!-- Table Project -->
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-info">
        <div class="box-header">
          <h3 class="box-title">Create Groups List</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          	<table id="example1" class="table table-bordered table-hover">
	            <thead>
		            <div class="form-group">
		                <div class="row">
		                  <div class="col-md-2">
		                    <label for="exampleInputEmail1">Name: </label>
		                  </div>
		                  <div class="col-md-10">
		                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name">
		                  </div>
		                </div>
		            </div>
	            	<div class="row">
	              		<div class="col-md-2">
	                    	<label for="exampleInputEmail1">Branch: </label>
	                  	</div>
	                  	<div class="col-md-1">
	                    	<label for="exampleInputEmail1">Add: </label>
	                  	</div>
	                  	<div class="col-md-1">
	                    	<input type="checkbox" name="name" id="name" >
	                  	</div>
	                  	<div class="col-md-1">
	                    	<label for="exampleInputEmail1">Edit: </label>
	                  	</div>
	                  	<div class="col-md-1">
	                    	<input type="checkbox" name="name" id="name" >
	                  	</div>
	                  	<div class="col-md-1">
	                    	<label for="exampleInputEmail1">Show: </label>
	                  	</div>
	                  	<div class="col-md-1">
	                    	<input type="checkbox" name="name" id="name" >
	                  	</div>
	                  	<div class="col-md-1">
	                    	<label for="exampleInputEmail1">Delete: </label>
	                  	</div>
	                  	<div class="col-md-1">
	                    	<input type="checkbox" name="name" id="name" >
	                  	</div>
	              	</div>
	              	<br>
	              	<div class="row">
	              		<div class="col-md-2">
	                    	<label for="exampleInputEmail1">Commission: </label>
	                  	</div>
	                  	<div class="col-md-1">
	                    	<label for="exampleInputEmail1">Edit: </label>
	                  	</div>
	                  	<div class="col-md-1">
	                    	<input type="checkbox" name="name" id="name" >
	                  	</div>
	                  	<div class="col-md-1">
	                    	<label for="exampleInputEmail1">Show: </label>
	                  	</div>
	                  	<div class="col-md-1">
	                    	<input type="checkbox" name="name" id="name" >
	                  	</div>
	              	</div>
	              	<br>
	              	<div class="row">
	              		<div class="col-md-2">
	                    	<label for="exampleInputEmail1">Corporate Name: </label>
	                  	</div>
	                  	<div class="col-md-1">
	                    	<label for="exampleInputEmail1">Add: </label>
	                  	</div>
	                  	<div class="col-md-1">
	                    	<input type="checkbox" name="name" id="name" >
	                  	</div>
	                  	<div class="col-md-1">
	                    	<label for="exampleInputEmail1">Edit: </label>
	                  	</div>
	                  	<div class="col-md-1">
	                    	<input type="checkbox" name="name" id="name" >
	                  	</div>
	                  	<div class="col-md-1">
	                    	<label for="exampleInputEmail1">Show: </label>
	                  	</div>
	                  	<div class="col-md-1">
	                    	<input type="checkbox" name="name" id="name" >
	                  	</div>
	                  	<div class="col-md-1">
	                    	<label for="exampleInputEmail1">Delete: </label>
	                  	</div>
	                  	<div class="col-md-1">
	                    	<input type="checkbox" name="name" id="name" >
	                  	</div>
	              	</div>
	              	<br>
	              	<div class="row">
	              		<div class="col-md-2">
	                    	<label for="exampleInputEmail1">Leads: </label>
	                  	</div>
	                  	<div class="col-md-1">
	                    	<label for="exampleInputEmail1">Add: </label>
	                  	</div>
	                  	<div class="col-md-1">
	                    	<input type="checkbox" name="name" id="name" >
	                  	</div>
	                  	<div class="col-md-1">
	                    	<label for="exampleInputEmail1">Edit: </label>
	                  	</div>
	                  	<div class="col-md-1">
	                    	<input type="checkbox" name="name" id="name" >
	                  	</div>
	                  	<div class="col-md-1">
	                    	<label for="exampleInputEmail1">Show: </label>
	                  	</div>
	                  	<div class="col-md-1">
	                    	<input type="checkbox" name="name" id="name" >
	                  	</div>
	                  	<div class="col-md-1">
	                    	<label for="exampleInputEmail1">Payment: </label>
	                  	</div>
	                  	<div class="col-md-1">
	                    	<input type="checkbox" name="name" id="name" >
	                  	</div>
	                  	<div class="col-md-1">
	                    	<label for="exampleInputEmail1">Call center: </label>
	                  	</div>
	                  	<div class="col-md-1">
	                    	<input type="checkbox" name="name" id="name" >
	                  	</div>
	                </div>
	              	<div class="row">
              			<div class="col-md-1 ">
                    		<label for="exampleInputEmail1">Delete: </label>
	                  	</div>
	                  	<div class="col-md-1">
	                    	<input type="checkbox" name="name" id="name" >
	                  	</div>
	              	</div>
	              	<br>
	              	<div class="row">
	              		<div class="col-md-2">
	                    	<label for="exampleInputEmail1">Customers: </label>
	                  	</div>
	                  	<div class="col-md-1">
	                    	<label for="exampleInputEmail1">Add: </label>
	                  	</div>
	                  	<div class="col-md-1">
	                    	<input type="checkbox" name="name" id="name" >
	                  	</div>
	                  	<div class="col-md-1">
	                    	<label for="exampleInputEmail1">Edit: </label>
	                  	</div>
	                  	<div class="col-md-1">
	                    	<input type="checkbox" name="name" id="name" >
	                  	</div>
	                  	<div class="col-md-1">
	                    	<label for="exampleInputEmail1">Show: </label>
	                  	</div>
	                  	<div class="col-md-1">
	                    	<input type="checkbox" name="name" id="name" >
	                  	</div>
	                  	<div class="col-md-1">
	                    	<label for="exampleInputEmail1">Add Document: </label>
	                  	</div>
	                  	<div class="col-md-1">
	                    	<input type="checkbox" name="name" id="name" >
	                  	</div>
	                  	<div class="col-md-1">
	                    	<label for="exampleInputEmail1">Add Payment: </label>
	                  	</div>
	                  	<div class="col-md-1">
	                    	<input type="checkbox" name="name" id="name" >
	                  	</div>
	                </div>
	              	<div class="row">
	              		<div class="col-md-1">
	                    	<label for="exampleInputEmail1">Show Profile: </label>
	                  	</div>
	                  	<div class="col-md-1">
	                    	<input type="checkbox" name="name" id="name" >
	                  	</div>
	                  	<div class="col-md-1">
	                    	<label for="exampleInputEmail1">Call Center: </label>
	                  	</div>
	                  	<div class="col-md-1">
	                    	<input type="checkbox" name="name" id="name" >
	                  	</div>
	                  	<div class="col-md-1">
	                    	<label for="exampleInputEmail1">Add Family: </label>
	                  	</div>
	                  	<div class="col-md-1">
	                    	<input type="checkbox" name="name" id="name" >
	                  	</div>
	              		<div class="col-md-1">
	                    	<label for="exampleInputEmail1">Print contract: </label>
	                  	</div>
	                  	<div class="col-md-1">
	                    	<input type="checkbox" name="name" id="name" >
	                  	</div>
	                  	<div class="col-md-1">
	                    	<label for="exampleInputEmail1">Print id cart: </label>
	                  	</div>
	                  	<div class="col-md-1">
	                    	<input type="checkbox" name="name" id="name" >
	                  	</div>
	                  	<div class="col-md-1">
	                    	<label for="exampleInputEmail1">Delete: </label>
	                  	</div>
	                  	<div class="col-md-1">
	                    	<input type="checkbox" name="name" id="name" >
	                  	</div>
	              	</div>
	              	<br>
	              	<div class="row">
	              		<div class="col-md-2">
	                    	<label for="exampleInputEmail1">Department: </label>
	                  	</div>
	                  	<div class="col-md-1">
	                    	<label for="exampleInputEmail1">Add: </label>
	                  	</div>
	                  	<div class="col-md-1">
	                    	<input type="checkbox" name="name" id="name" >
	                  	</div>
	                  	<div class="col-md-1">
	                    	<label for="exampleInputEmail1">Edit: </label>
	                  	</div>
	                  	<div class="col-md-1">
	                    	<input type="checkbox" name="name" id="name" >
	                  	</div>
	                  	<div class="col-md-1">
	                    	<label for="exampleInputEmail1">Show: </label>
	                  	</div>
	                  	<div class="col-md-1">
	                    	<input type="checkbox" name="name" id="name" >
	                  	</div>
	                  	<div class="col-md-1">
	                    	<label for="exampleInputEmail1">Add Manager: </label>
	                  	</div>
	                  	<div class="col-md-1">
	                    	<input type="checkbox" name="name" id="name" >
	                  	</div>
	                  	<div class="col-md-1">
	                    	<label for="exampleInputEmail1">Delete: </label>
	                  	</div>
	                  	<div class="col-md-1">
	                    	<input type="checkbox" name="name" id="name" >
	                  	</div>
	              	</div>
	              	<br>
	              	<br>
	              	<div class="row">
	              		<div class="col-md-2">
	                    	<label for="exampleInputEmail1">Jobs: </label>
	                  	</div>
	                  	<div class="col-md-1">
	                    	<label for="exampleInputEmail1">Add: </label>
	                  	</div>
	                  	<div class="col-md-1">
	                    	<input type="checkbox" name="name" id="name" >
	                  	</div>
	                  	<div class="col-md-1">
	                    	<label for="exampleInputEmail1">Edit: </label>
	                  	</div>
	                  	<div class="col-md-1">
	                    	<input type="checkbox" name="name" id="name" >
	                  	</div>
	                  	<div class="col-md-1">
	                    	<label for="exampleInputEmail1">Show: </label>
	                  	</div>
	                  	<div class="col-md-1">
	                    	<input type="checkbox" name="name" id="name" >
	                  	</div>
	                  	<div class="col-md-1">
	                    	<label for="exampleInputEmail1">Delete: </label>
	                  	</div>
	                  	<div class="col-md-1">
	                    	<input type="checkbox" name="name" id="name" >
	                  	</div>
	              	</div>
	              	<br>
	              	<div class="row">
	              		<div class="col-md-2">
	                    	<label for="exampleInputEmail1">Employees: </label>
	                  	</div>
	                  	<div class="col-md-1">
	                    	<label for="exampleInputEmail1">Add: </label>
	                  	</div>
	                  	<div class="col-md-1">
	                    	<input type="checkbox" name="name" id="name" >
	                  	</div>
	                  	<div class="col-md-1">
	                    	<label for="exampleInputEmail1">Edit: </label>
	                  	</div>
	                  	<div class="col-md-1">
	                    	<input type="checkbox" name="name" id="name" >
	                  	</div>
	                  	<div class="col-md-1">
	                    	<label for="exampleInputEmail1">Show: </label>
	                  	</div>
	                  	<div class="col-md-1">
	                    	<input type="checkbox" name="name" id="name" >
	                  	</div>
	                  	<div class="col-md-1">
	                    	<label for="exampleInputEmail1">Show Profile: </label>
	                  	</div>
	                  	<div class="col-md-1">
	                    	<input type="checkbox" name="name" id="name" >
	                  	</div>
	                  	<div class="col-md-1">
	                    	<label for="exampleInputEmail1">Add Decument: </label>
	                  	</div>
	                  	<div class="col-md-1">
	                    	<input type="checkbox" name="name" id="name" >
	                  	</div>
	                  	
	              	</div>
	              	<div class="row">
	              		<div class="col-md-1">
	                    	<label for="exampleInputEmail1">Add bonus: </label>
	                  	</div>
	                  	<div class="col-md-1">
	                    	<input type="checkbox" name="name" id="name" >
	                  	</div>
	                  	<div class="col-md-1">
	                    	<label for="exampleInputEmail1">Add deduction: </label>
	                  	</div>
	                  	<div class="col-md-1">
	                    	<input type="checkbox" name="name" id="name" >
	                  	</div>
	                  	<div class="col-md-1">
	                    	<label for="exampleInputEmail1">Rest Password: </label>
	                  	</div>
	                  	<div class="col-md-1">
	                    	<input type="checkbox" name="name" id="name" >
	                  	</div>
	                  	<div class="col-md-1">
	                    	<label for="exampleInputEmail1">Delete: </label>
	                  	</div>
	                  	<div class="col-md-1">
	                    	<input type="checkbox" name="name" id="name" >
	                  	</div>
	              	</div>
	              	<br>
	              	<div class="row">
	              		<div class="col-md-2">
	                    	<label for="exampleInputEmail1">Offer: </label>
	                  	</div>
	                  	<div class="col-md-1">
	                    	<label for="exampleInputEmail1">Add: </label>
	                  	</div>
	                  	<div class="col-md-1">
	                    	<input type="checkbox" name="name" id="name" >
	                  	</div>
	                  	<div class="col-md-1">
	                    	<label for="exampleInputEmail1">Edit: </label>
	                  	</div>
	                  	<div class="col-md-1">
	                    	<input type="checkbox" name="name" id="name" >
	                  	</div>
	                  	<div class="col-md-1">
	                    	<label for="exampleInputEmail1">Show: </label>
	                  	</div>
	                  	<div class="col-md-1">
	                    	<input type="checkbox" name="name" id="name" >
	                  	</div>
	                  	<div class="col-md-1">
	                    	<label for="exampleInputEmail1">Delete: </label>
	                  	</div>
	                  	<div class="col-md-1">
	                    	<input type="checkbox" name="name" id="name" >
	                  	</div>
	              	</div>
	              	<br>
	              	<div class="row">
	              		<div class="col-md-2">
	                    	<label for="exampleInputEmail1">Expenses Type: </label>
	                  	</div>
	                  	<div class="col-md-1">
	                    	<label for="exampleInputEmail1">Add: </label>
	                  	</div>
	                  	<div class="col-md-1">
	                    	<input type="checkbox" name="name" id="name" >
	                  	</div>
	                  	<div class="col-md-1">
	                    	<label for="exampleInputEmail1">Edit: </label>
	                  	</div>
	                  	<div class="col-md-1">
	                    	<input type="checkbox" name="name" id="name" >
	                  	</div>
	                  	<div class="col-md-1">
	                    	<label for="exampleInputEmail1">Show: </label>
	                  	</div>
	                  	<div class="col-md-1">
	                    	<input type="checkbox" name="name" id="name" >
	                  	</div>
	                  	<div class="col-md-1">
	                    	<label for="exampleInputEmail1">Delete: </label>
	                  	</div>
	                  	<div class="col-md-1">
	                    	<input type="checkbox" name="name" id="name" >
	                  	</div>
	              	</div>
	              	<br>
	              	<div class="row">
	              		<div class="col-md-2">
	                    	<label for="exampleInputEmail1">Expenses: </label>
	                  	</div>
	                  	<div class="col-md-1">
	                    	<label for="exampleInputEmail1">Add: </label>
	                  	</div>
	                  	<div class="col-md-1">
	                    	<input type="checkbox" name="name" id="name" >
	                  	</div>
	                  	<div class="col-md-1">
	                    	<label for="exampleInputEmail1">Edit: </label>
	                  	</div>
	                  	<div class="col-md-1">
	                    	<input type="checkbox" name="name" id="name" >
	                  	</div>
	                  	<div class="col-md-1">
	                    	<label for="exampleInputEmail1">Show: </label>
	                  	</div>
	                  	<div class="col-md-1">
	                    	<input type="checkbox" name="name" id="name" >
	                  	</div>
	                  	<div class="col-md-1">
	                    	<label for="exampleInputEmail1">Delete: </label>
	                  	</div>
	                  	<div class="col-md-1">
	                    	<input type="checkbox" name="name" id="name" >
	                  	</div>
	              	</div>
	            </tbody>
          	</table>
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
            <h4 class="modal-title"><i class="fa fa-plus"></i> Add </h4>
          </div>
            <form method="POST" action="#">
	          <div class="modal-body">
	              {{csrf_field()}}
	              
	              <div class="form-group">
	              	
	                <div class="row">
	                  <div class="col-md-1">
	                    <label for="exampleInputEmail1">Add: </label>
	                  </div>
	                  <div class="col-md-2">
	                    <input type="checkbox" name="name" id="name" >
	                  </div>

	                  <div class="col-md-1">
	                    <label for="exampleInputEmail1">Edit: </label>
	                  </div>
	                  <div class="col-md-2">
	                    <input type="checkbox" name="name" id="name" >
	                  </div>

	                  <div class="col-md-1">
	                    <label for="exampleInputEmail1">Delete: </label>
	                  </div>
	                  <div class="col-md-2">
	                    <input type="checkbox" name="name" id="name" >
	                  </div>

	                  <div class="col-md-1">
	                    <label for="exampleInputEmail1">Show: </label>
	                  </div>
	                  <div class="col-md-2">
	                    <input type="checkbox" name="name" id="name" >
	                  </div>
	                </div>
	                <div class="row">
	                	<div class="col-md-1">
	                    	<label for="exampleInputEmail1">Add Payment: </label>
	                  	</div>
	                  	<div class="col-md-2">
	                    	<input type="checkbox" name="name" id="name" >
	                  	</div>

	                  	<div class="col-md-1">
	                    	<label for="exampleInputEmail1">Call center: </label>
	                  	</div>
	                  	<div class="col-md-2">
	                    	<input type="checkbox" name="name" id="name" >
	                  	</div>

	                  	<div class="col-md-1">
	                    	<label for="exampleInputEmail1">Add Document: </label>
	                  	</div>
	                  	<div class="col-md-2">
	                    	<input type="checkbox" name="name" id="name" >
	                  	</div>

	                  	<div class="col-md-1">
	                    	<label for="exampleInputEmail1">Show profile: </label>
	                  	</div>
	                  	<div class="col-md-2">
	                    	<input type="checkbox" name="name" id="name" >
	                  	</div>
	                </div>
	                <div class="row">
	                	<div class="col-md-1">
	                    	<label for="exampleInputEmail1">Show profile: </label>
	                  	</div>
	                  	<div class="col-md-2">
	                    	<input type="checkbox" name="name" id="name" >
	                  	</div>

	                  	<div class="col-md-1">
	                    	<label for="exampleInputEmail1">Print contract: </label>
	                  	</div>
	                  	<div class="col-md-2">
	                    	<input type="checkbox" name="name" id="name" >
	                  	</div>

	                  	<div class="col-md-1">
	                    	<label for="exampleInputEmail1">Print ID Cart: </label>
	                  	</div>
	                  	<div class="col-md-2">
	                    	<input type="checkbox" name="name" id="name" >
	                  	</div>
	                </div>
	              </div>
	          </div>
	          <div class="modal-footer">
	            <button type="submit" class="btn btn-success save"><i class="fa fa-check"></i> Save</button>
	            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
	          </div>
            </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>

<!-- Modal edit -->
    <div class="modal fade" id="modal-edit">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"><i class="fa fa-edit"></i> Edit </h4>
          </div>
            <form method="POST" action="#">
	          <div class="modal-body">
	              {{csrf_field()}}
	              <div class="form-group">
	                <div class="row">
	                  <div class="col-md-2">
	                    <label for="exampleInputEmail1">Name: </label>
	                  </div>
	                  <div class="col-md-10">
	                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name">
	                  </div>
	                </div>
	              </div>
	              <div class="form-group">
	              	<div class="row">
	              		<div class="col-md-1">
	                    	<label for="exampleInputEmail1">Branch: </label>
	                  	</div>
	                  	<div class="col-md-1">
	                    	<label for="exampleInputEmail1">Add: </label>
	                 	</div>
	              	</div>
	                <div class="row">
	                  <div class="col-md-1">
	                    <label for="exampleInputEmail1">Add: </label>
	                  </div>
	                  <div class="col-md-2">
	                    <input type="checkbox" name="name" id="name" >
	                  </div>

	                  <div class="col-md-1">
	                    <label for="exampleInputEmail1">Edit: </label>
	                  </div>
	                  <div class="col-md-2">
	                    <input type="checkbox" name="name" id="name" >
	                  </div>

	                  <div class="col-md-1">
	                    <label for="exampleInputEmail1">Delete: </label>
	                  </div>
	                  <div class="col-md-2">
	                    <input type="checkbox" name="name" id="name" >
	                  </div>

	                  <div class="col-md-1">
	                    <label for="exampleInputEmail1">Show: </label>
	                  </div>
	                  <div class="col-md-2">
	                    <input type="checkbox" name="name" id="name" >
	                  </div>
	                </div>
	                <div class="row">
	                	<div class="col-md-1">
	                    	<label for="exampleInputEmail1">Add Payment: </label>
	                  	</div>
	                  	<div class="col-md-2">
	                    	<input type="checkbox" name="name" id="name" >
	                  	</div>

	                  	<div class="col-md-1">
	                    	<label for="exampleInputEmail1">Call center: </label>
	                  	</div>
	                  	<div class="col-md-2">
	                    	<input type="checkbox" name="name" id="name" >
	                  	</div>

	                  	<div class="col-md-1">
	                    	<label for="exampleInputEmail1">Add Document: </label>
	                  	</div>
	                  	<div class="col-md-2">
	                    	<input type="checkbox" name="name" id="name" >
	                  	</div>

	                  	<div class="col-md-1">
	                    	<label for="exampleInputEmail1">Show profile: </label>
	                  	</div>
	                  	<div class="col-md-2">
	                    	<input type="checkbox" name="name" id="name" >
	                  	</div>
	                </div>
	                <div class="row">
	                	<div class="col-md-1">
	                    	<label for="exampleInputEmail1">Show profile: </label>
	                  	</div>
	                  	<div class="col-md-2">
	                    	<input type="checkbox" name="name" id="name" >
	                  	</div>

	                  	<div class="col-md-1">
	                    	<label for="exampleInputEmail1">Print contract: </label>
	                  	</div>
	                  	<div class="col-md-2">
	                    	<input type="checkbox" name="name" id="name" >
	                  	</div>

	                  	<div class="col-md-1">
	                    	<label for="exampleInputEmail1">Print ID Cart: </label>
	                  	</div>
	                  	<div class="col-md-2">
	                    	<input type="checkbox" name="name" id="name" >
	                  	</div>
	                </div>
	              </div>
	          </div>
	          <div class="modal-footer">
	            <button type="submit" class="btn btn-success save"><i class="fa fa-check"></i> Update</button>
	            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
	          </div>
            </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
  
@endsection
@extends('layout.master')
@section('title')
  Family
@endsection
@section('breadcrumb')
<a href="{{route('customer')}}"><i class="fa fa-users"></i>Customers</a>
	<li><i class="fa fa-users"></i> Family</li> 
@endsection
@section('namepage')
  Customers Manager
@endsection
@section('content')

<!-- Table Project -->
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-info">
        <div class="box-header">
          <button type="button" class="btn btn-xs btn-info pull-right" data-toggle="modal" data-target="#modal-add"><i class="fa  fa-plus"></i> Add Family</button>
          <h3 class="box-title">Family List : {{$customer->name_en}}</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body" >
          	@if(count($families)>0)
	        <table id="example1" class="table table-bordered table-hover" >
	            <thead>
	            <tr>
	              <th>Name</th>
	              <th>Mobile</th>
	              <th>Family Name</th>
	              <th>Options</th>
	            </tr>
	            </thead>
	            <tbody>
	              @foreach($families as $family)
		            <tr>
		                <td>{{$family->name}}</td>
		                <td>{{$family->mobile}}</td>
		                <td>{{$family->family}}</td>
		                <td>
		                  	<button type="button" class="edit-family btn btn-xs btn-warning" data-toggle="modal" data-target="#modal-edit{{$family->id}}"><i class="fa fa-edit"></i> Edit</button>
		                  	<button type="button" class="delete-family btn btn-xs btn-danger" data-toggle="modal" data-target="#modal-delete{{$family->id}}"><i class="fa fa-remove"></i> Delete</button>
		                </td>
		            </tr>

	              	<!-- Modal add -->
					    <div class="modal fade" id="modal-edit{{$family->id}}" enctype="multipart/form-data">
					      <div class="modal-dialog">
					        <div class="modal-content">
					          	<div class="modal-header">
					            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					              	<span aria-hidden="true">&times;</span></button>
					            	<h4 class="modal-title"><i class="fa fa-edit"></i> Edit</h4>
					          	</div>
						        <form method="post" action="{{route('family.edit', $family->id)}}">
						          	<div class="modal-body">
						              {{csrf_field()}}
							            <div class="form-group hidden">
							                <div class="row">
							                  <div class="col-md-2">
							                    <label for="exampleInputEmail1">Customer: </label>
							                  </div>
							                  <div class="col-md-10">
							                    <input type="text" class="form-control" name="upcustomer_id" id="upcustomer_id" value="{{$customer->id}}" required="">
							                  </div>
							                </div>
							            </div>
							            <div class="form-group">
							                <div class="row">
							                  <div class="col-md-2">
							                    <label for="exampleInputEmail1">Name: <span style="color:red">*</span> </label>
							                  </div>
							                  <div class="col-md-10">
							                    <input type="text" class="form-control" name="upname" id="upname" value="{{$family->name}}" required="">
							                  </div>
							                </div>
							            </div>
										<div class="form-group">
							                <div class="row">
							                  <div class="col-md-2">
							                    <label for="exampleInputEmail1">Mobile: <span style="color:red">*</span> </label>
							                  </div>
							                  <div class="col-md-10">
							                    <input type="text" class="form-control" name="upmobile" id="upmobile" value="{{$family->mobile}}" required="">
							                  </div>
							                </div>
							            </div>
							            <div class="form-group">
							                <div class="row">
							                  <div class="col-md-2">
							                    <label for="exampleInputEmail1">Family: <span style="color:red">*</span> </label>
							                  </div>
							                  <div class="col-md-10">
							                    <select class="form-control" name="upfamily" required="">
							                    	<option value="{{$family->family}}" disabled selected="">{{$family->family}}</option>
							                    	<option value="wife">wife</option>
		                    						<option value="son">son</option>
		                    						<option value="daughter">daughter</option>
							                    </select>
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
					    <div class="modal fade" id="modal-delete{{$family->id}}">
					      <div class="modal-dialog">
					        <div class="modal-content">
					          <div class="modal-header">
					            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					              <span aria-hidden="true">&times;</span></button>
					            <h4 class="modal-title"><i class="fa fa-trash"></i> Delete</h4>
					          </div>
					            <form method="post" action="{{route('family.delete', $family->id)}}">
					          		<div class="modal-body">
						              	{{csrf_field()}}
							            <div class="form-group">
							                <div class="row">
							                  <div class="col-md-2">
							                    <label for="exampleInputEmail1">Name: </label>
							                  </div>
							                  <div class="col-md-4">
							                  	<p>{{$family->name}}</p>
							                  </div>
							                  <div class="col-md-2">
							                    <label for="exampleInputEmail1">mobile: </label>
							                  </div>
							                  <div class="col-md-4">
							                  	<p>{{$family->mobile}}</p>
							                  </div>
							              	</div>
							              	<br>
							              	<div class="row">
							              		<div class="col-md-2">
							                    <label for="exampleInputEmail1">Family: </label>
							                  </div>
							                  <div class="col-md-10">
							                  	<p>{{$family->family}}</p>
							                  </div>
							              	</div>
							              	<br>
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
	            <center class="text-danger"><i class="fa fa-frown-o"></i> &nbsp; Not Family &nbsp; <i class="fa fa-frown-o"></i></center>
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
	        <form method="post" action="{{route('family.store')}}" enctype="multipart/form-data">
	          	<div class="modal-body">
	              {{csrf_field()}}
		            <div class="form-group hidden">
		                <div class="row">
		                  <div class="col-md-2">
		                    <label for="exampleInputEmail1">Customer: </label>
		                  </div>
		                  <div class="col-md-10">
		                  	<input class="form-control" type="text" name="customer_id" value="{{$customer->id}}" required="">
		                  </div>
		                </div>
		            </div>
		            <div class="form-group">
		                <div class="row">
		                  <div class="col-md-2">
		                    <label for="exampleInputEmail1">Name: <span style="color:red">*</span> </label>
		                  </div>
		                  <div class="col-md-10">
		                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" required="">
		                  </div>
		                </div>
		            </div>
		            <div class="form-group">
		                <div class="row">
		                  <div class="col-md-2">
		                    <label for="exampleInputEmail1">Mobile: <span style="color:red">*</span> </label>
		                  </div>
		                  <div class="col-md-10">
		                    <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Enter Mobile" required="">
		                  </div>
		                </div>
		            </div>
		            <div class="form-group">
		                <div class="row">
		                  <div class="col-md-2">
		                    <label for="exampleInputEmail1">Family: <span style="color:red">*</span> </label>
		                  </div>
		                  <div class="col-md-10">
		                    <select class="form-control" name="family" required="">
		                    	<option value="wife">wife</option>
		                    	<option value="son">son</option>
		                    	<option value="daughter">daughter</option>
		                    </select>
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
@extends('layout.master')
@section('title')
  Branch
@endsection
@section('breadcrumb')
	<i class="fa fa-map-marker"></i> Branch
@endsection
@section('namepage')
  Adminstration
@endsection
@section('content')

<!-- Table Project -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-info">
            <div class="box-header">
              <button type="button" class="btn btn-xs btn-info pull-right" data-toggle="modal" data-target="#modal-add"><i class="fa  fa-plus"></i> Add Branch</button>
              <h3 class="box-title">Branches List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
          		@if(count($branches)>0)
              	<table  id="example1" class="table table-bordered table-hover">
	                <thead>
		                <tr>
		                  	<th>Name</th>
							<th>Mobile:</th>
							<th>Options</th>
		                </tr>
	                </thead>
	                <tbody>
	               		@foreach($branches as $branch)
						<tr class="branch{{$branch->id}}">
							<td>{{$branch->name}}</td>
							<td>{{$branch->phone}}</td>
		                    <td>
		                    	<button type="button" class="edit-branch btn btn-xs btn-warning" data-toggle="modal" data-target="#modal-edit{{$branch->id}}"><i class="fa fa-edit"></i> Edit</button>
		                    	<button type="button" class="delete-branch btn btn-xs btn-danger" data-toggle="modal" data-target="#modal-delete{{$branch->id}}"><i class="fa fa-trash"></i> Delete</button>
		                    </td>
	                	</tr>

	                	<!-- Modal Edit -->
						    <div class="modal fade" id="modal-edit{{$branch->id}}">
						      <div class="modal-dialog">
						        <div class="modal-content">
						          <div class="modal-header">
						            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						              <span aria-hidden="true">&times;</span></button>
						            <h4 class="modal-title"><i class="fa fa-edit"></i> Edit </h4>
						          </div>
						          <form method="POST" action="{{route('branch.edit', $branch->id)}}">
						            <div class="modal-body">
						            	{{csrf_field()}}
						                <div class="form-group">
							                <div class="row">
							                  <div class="col-md-2">
							                    <label for="exampleInputEmail1">Name: <span style="color:red">*</span> </label>
							                  </div>
							                  <div class="col-md-10">
							                    <input type="text" class="form-control" name="upname" id="upname" value="{{$branch->name}}"  required="">
							                  </div>
							                </div>
						                </div>
						                <div class="form-group">
							                <div class="row">
							                  <div class="col-md-2">
							                    <label for="exampleInputEmail1">Mobile: <span style="color:red">*</span> </label>
							                  </div>
							                  <div class="col-md-10">
							                    <input type="number" class="form-control" name="upphone" id="upphone" value="{{$branch->phone}}" required="">
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
							<div class="modal fade" id="modal-delete{{$branch->id}}">
							  <div class="modal-dialog">
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span></button>
							        <h4 class="modal-title"><i class="fa fa-trash"></i> Dalete </h4>
							      </div>
							      <form method="POST" action="{{route('branch.delete', $branch->id)}}">
							        <div class="modal-body">
							        	{{csrf_field()}}
							            <div class="form-group" >
							                <div class="row">
							                	<div class="col-md-2">
							                    	<label for="exampleInputEmail1">Name: <span style="color:red">*</span> </label>
							                  	</div>
							                  	<div class="col-md-4">
							                  		<p>{{$branch->name}}</p>
							                  	</div>
							                  	<div class="col-md-2">
							                    	<label for="exampleInputEmail1">Mobile: <span style="color:red">*</span> </label>
							                  	</div>
							                  	<div class="col-md-4">
							                  		<p>{{$branch->phone}}</p>
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
		            <center class="text-danger"><i class="fa fa-frown-o"></i> &nbsp; Not Branches &nbsp; <i class="fa fa-frown-o"></i></center>
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
	        <form method="POST" action="{{route('branch.store')}}">
	            <div class="modal-body">
	            	{{csrf_field()}}
	                <div class="form-group">
		                <div class="row">
		                  <div class="col-md-2">
		                    <label for="exampleInputEmail1">Name: <span style="color:red">*</span> </label>
		                  </div>
		                  <div class="col-md-10">
		                    <input type="text" class="form-control" name="name" id="name"  required="" placeholder="Name">
		                  </div>
		                </div>
	                </div>
	                <div class="form-group">
		                <div class="row">
		                  <div class="col-md-2">
		                    <label for="exampleInputEmail1">Mobile:	<span style="color:red">*</span> </label>
		                  </div>
		                  <div class="col-md-10">
		                    <input type="number" class="form-control" name="phone" id="phone" required="" placeholder="Mobile">
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
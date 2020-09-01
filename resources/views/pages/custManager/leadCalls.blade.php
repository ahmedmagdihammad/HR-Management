@extends('layout.master')
@section('title')
  Call Center 
@endsection
@section('breadcrumb')
	<a href="{{route('lead.index')}}"><i class="fa fa-users"></i> Lead</a>
    <li class="active"><i class="fa fa-phone"></i>  Call Center</li>
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
          <button type="button" class="btn btn-xs btn-info pull-right" data-toggle="modal" data-target="#modal-add"><i class="fa  fa-plus"></i> Add Call Center</button>
          <h3 class="box-title">Call Center List :  {{$lead->name}}</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          @if(count($callcenters)>0)
          	<table id="" class="table table-bordered table-hover">
	            <thead>
	            <tr>
	              <th>Type</th>
	              <th>description</th>
	              <th>Options</th>
	            </tr>
	            </thead>
	            <tbody>
	            @foreach($callcenters as $callcenter)
	            @if($callcenter->getLead['id'] == $id)
	              <tr>
	                <td>{{$callcenter->type}}</td>
	                <td>{{$callcenter->desc}}</td>
	                <td>
	                  <button type="button" class="edit-callcenterment btn btn-xs btn-warning" data-toggle="modal" data-target="#modal-edit{{$callcenter->id}}"><i class="fa fa-edit"></i> Edit</button>
	                  <button type="button" class="delete-callcenterment btn btn-xs btn-danger" data-toggle="modal" data-target="#modal-delete{{$callcenter->id}}"><i class="fa fa-remove"></i> Delete</button>
	                </td>
	              </tr>

	            <!-- Modal edit -->
				    <div class="modal fade" id="modal-edit{{$callcenter->id}}">
				      <div class="modal-dialog">
				        <div class="modal-content">
				          <div class="modal-header">
				            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				              <span aria-hidden="true">&times;</span></button>
				            <h4 class="modal-title"><i class="fa fa-edit"></i> Edit </h4>
				          </div>
				            <form method="POST" action="{{route('leadCall.edit', $callcenter->id)}}" enctype="multipart/form-data">
					          <div class="modal-body">
					              {{csrf_field()}}
					              	<div class="form-group hidden">
						                <div class="row">
						                  <div class="col-md-2">
						                    <label for="exampleInputEmail1">Lead: </label>
						                  </div>
						                  <div class="col-md-10">
						                  	<input class="form-control" type="text" name="uplead_id" value="{{$lead->id}}">
						                  </div>
						                </div>
					              	</div>
					              	<div class="form-group">
						                <div class="row">
						                  <div class="col-md-2">
						                    <label for="exampleInputEmail1">Type: <span style="color:red;">*</span> </label>
						                  </div>
						                  <div class="col-md-10">
						                    <select class="form-control" name="uptype" id="uptype" required="">
						                    	<option>{{$callcenter->type}}</option>
						                    	<option>In Bound</option>
						                    	<option>Out Bound</option>
						                    </select>
						                  </div>
						                </div>
					              	</div>
					              	<div class="form-group">
						                <div class="row">
						                  <div class="col-md-2">
						                    <label for="exampleInputEmail1">Description: <span style="color:red;">*</span> </label>
						                  </div>
						                  <div class="col-md-10">
						                    <textarea class="form-control" name="updesc" id="updesc" required="">{{$callcenter->desc}}</textarea>
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

				<!-- Modal delete -->
				    <div class="modal fade" id="modal-delete{{$callcenter->id}}">
				      <div class="modal-dialog">
				        <div class="modal-content">
				          <div class="modal-header">
				            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				              <span aria-hidden="true">&times;</span></button>
				            <h4 class="modal-title"><i class="fa fa-trash"></i> Delete </h4>
				          </div>
				            <form method="POST" action="{{route('leadCall.delete', $callcenter->id)}}" enctype="multipart/form-data">
					          <div class="modal-body">
					              {{csrf_field()}}
					              <div class="form-group">
					                <div class="row">
					                	<div class="col-md-2">
					                    	<label for="exampleInputEmail1">Type: </label>
					                  	</div>
					                  	<div class="col-md-4">
					                  		<p>{{$callcenter->type}}</p>
					                  	</div>
					                  	<div class="col-md-2">
					                    	<label for="exampleInputEmail1">Description: </label>
					                  	</div>
					                  	<div class="col-md-4">
					                  		<p>{{$callcenter->desc}}</p>
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
				@endif
	            @endforeach
	            </tbody>
          	</table>
          @else
            <br><br><br><br><br>
            <center class="text-danger"><i class="fa fa-frown-o"></i> &nbsp; Not Call Center &nbsp; <i class="fa fa-frown-o"></i></center>
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
            <h4 class="modal-title"><i class="fa fa-plus"></i> Add </h4>
          </div>
            <form method="POST" action="{{route('leadCall.store')}}" enctype="multipart/form-data">
	          <div class="modal-body">
                {{method_field('POST')}}
	              {{csrf_field()}}
	              	<div class="form-group hidden">
		                <div class="row">
		                  <div class="col-md-2">
		                    <label for="exampleInputEmail1">Lead: </label>
		                  </div>
		                  <div class="col-md-10">
		                    <input class="form-control" type="text" name="lead_id" id="lead_id" value="{{$lead->id}}">
		                  </div>
		                </div>
	              	</div>
	              <div class="form-group">
	                <div class="row">
	                  <div class="col-md-2">
	                    <label for="exampleInputEmail1">type: <span style="color:red;">*</span> </label>
	                  </div>
	                  <div class="col-md-10">
	                    <select class="form-control" name="type" required="">
	                    	<option>In Bound</option>
	                    	<option>Out Bound</option>
	                    </select>
	                  </div>
	                </div>
	              </div>
	              <div class="form-group">
	                <div class="row">
	                  <div class="col-md-2">
	                    <label for="exampleInputEmail1">Description: <span style="color:red;">*</span> </label>
	                  </div>
	                  <div class="col-md-10">
	                    <textarea class="form-control" name="desc" id="desc" placeholder="Enter Description" required=""></textarea>
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
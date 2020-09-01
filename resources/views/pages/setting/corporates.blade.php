@extends('layout.master')
@section('title')
  Corporate Name
@endsection
@section('breadcrumb')
	Corporate Name
@endsection
@section('namepage')
  Setting
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
          	@if(count($corporates)>0)
	        <table id="example1" class="table table-bordered table-hover" >
	            <thead>
	            <tr>
	              <th>Image</th>
	              <th>Corporate Name</th>
	              <th>Options</th>
	            </tr>
	            </thead>
	            <tbody>
	              @foreach($corporates as $corp_name)
		            <tr>
		                <td><img src="{{$corp_name->image}}" style="width: 64px; height: 64px; border-radius: 50%"></td>
		                <td>{{$corp_name->name}}</td>
		                <td>
		                  	<button type="button" class="edit-corp_name btn btn-xs btn-warning" data-toggle="modal" data-target="#modal-edit{{$corp_name->id}}"><i class="fa fa-edit"></i> Edit</button>
		                  	<button type="button" class="delete-corp_name btn btn-xs btn-danger" data-toggle="modal" data-target="#modal-delete{{$corp_name->id}}"><i class="fa fa-remove"></i> Delete</button>
		                </td>
		            </tr>

	              	<!-- Modal add -->
					    <div class="modal fade" id="modal-edit{{$corp_name->id}}" enctype="multipart/form-data">
					      <div class="modal-dialog">
					        <div class="modal-content">
					          	<div class="modal-header">
					            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					              	<span aria-hidden="true">&times;</span></button>
					            	<h4 class="modal-title"><i class="fa fa-edit"></i> Edit</h4>
					          	</div>
						        <form method="post" action="{{route('company.edit', $corp_name->id)}}">
						          	<div class="modal-body">
						              {{csrf_field()}}
							            <div class="form-group">
							                <div class="row">
							                  <div class="col-md-2">
							                    <label for="exampleInputEmail1">Name <span style="color:red;">*</span> </label>
							                  </div>
							                  <div class="col-md-10">
							                    <input type="text" class="form-control" name="up_name" id="up_name" value="{{$corp_name->name}}" required="">
							                  </div>
							                </div>
							            </div>
							            <div class="form-group">
							                <div class="row">
							                  <div class="col-md-2">
							                    <label for="exampleInputEmail1">Image <span style="color:red;">*</span> </label>
							                  </div>
							                  <div class="col-md-7">
							                    <input type="file" class="form-control" name="upimage" id="upimage" required="">
							                  </div>
							                  <div class="col-md-3">
							                  	<img src="{{$corp_name->image}}" style="width: 64px; height: 64px; border-radius: 50%;">
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
					    <div class="modal fade" id="modal-delete{{$corp_name->id}}">
					      <div class="modal-dialog">
					        <div class="modal-content">
					          <div class="modal-header">
					            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					              <span aria-hidden="true">&times;</span></button>
					            <h4 class="modal-title"><i class="fa fa-trash"></i> Delete</h4>
					          </div>
					            <form method="post" action="{{route('company.delete', $corp_name->id)}}">
					          		<div class="modal-body">
						              	{{csrf_field()}}
							            <div class="form-group">
							                <div class="row">
							                  <div class="col-md-2">
							                    <label for="exampleInputEmail1"> Name <span style="color:red;">*</span> </label>
							                  </div>
							                  <div class="col-md-4">
							                  	<p>{{$corp_name->name}}</p>
							                  </div>
							                  <div class="col-md-2">
							                    <label for="exampleInputEmail1">Image <span style="color:red;">*</span> </label>
							                  </div>
							                  <div class="col-md-4">
							                  	<img src="{{$corp_name->image}}" style="width: 64px; height: 64; border-radius: 50%">
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
	            <center class="text-danger"><i class="fa fa-frown-o"></i> &nbsp; Not Corporate Name &nbsp; <i class="fa fa-frown-o"></i></center>
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
	        <form method="post" action="{{route('corp_name.store')}}" enctype="multipart/form-data">
	          	<div class="modal-body">
	              {{csrf_field()}}
		            <div class="form-group">
		                <div class="row">
		                  <div class="col-md-2">
		                    <label for="exampleInputEmail1">Name <span style="color:red;">*</span> </label>
		                  </div>
		                  <div class="col-md-10">
		                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Corporate Name" required="">
		                  </div>
		                </div>
		            </div>
		            <div class="form-group">
		                <div class="row">
		                  <div class="col-md-2">
		                    <label>Image <span style="color:red;">*</span> </label>
		                  </div>
		                  <div class="col-md-10">
		                    <input type="file" class="form-control" name="image" id="image" required="">
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
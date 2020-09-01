@extends('layout.master')
@section('title')
  Jobs
@endsection
@section('breadcrumb')
	<i class="fa fa-lightbulb-o"></i> Job
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
          <button type="button" class="btn btn-xs btn-info pull-right" data-toggle="modal" data-target="#modal-add"><i class="fa fa-plus"></i> Add Job</button>
          <h3 class="box-title">Jobs List</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          @if(count($jobs)>0)
          <table id="example1" class="table table-bordered table-hover">
            <thead>
	            <tr>
	              <th>Job Name</th>
	              <th>Department</th>
	              <th>Options</th>
	            </tr>
            </thead>
            <tbody>
              @foreach($jobs as $job)
              	<tr>
	                <td>{{$job->name}}</td>
	                <td>{{$job->getDepartment['name']}}</td>
	                <td>
	                  <button type="button" class="edit-job btn btn-xs btn-warning" data-toggle="modal" data-target="#modal-edit{{$job->id}}"><i class="fa fa-edit"></i> Edit</button>
	                  <button type="button" class="delete-job btn btn-xs btn-danger" data-toggle="modal" data-target="#modal-delete{{$job->id}}"><i class="fa fa-trash"></i> Delete</button>
	                </td>
              	</tr>

              	<!-- Modal Edit -->
				    <div class="modal fade" id="modal-edit{{$job->id}}">
				      <div class="modal-dialog">
				        <div class="modal-content">
				          <div class="modal-header">
				            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				              <span aria-hidden="true">&times;</span></button>
				            <h4 class="modal-title"><i class="fa fa-edit"></i> Edit</h4>
				          </div>
				            <form method="post" action="{{route('job.edit', $job->id)}}">
					          <div class="modal-body">
					              {{csrf_field()}}
					              <div class="form-group">
					                <div class="row">
					                  <div class="col-md-2">
					                    <label for="exampleInputEmail1">Job Name: <span style="color:red;">*</span></label>
					                  </div>
					                  <div class="col-md-10">
					                    <input type="text" class="form-control" name="upname" id="upname" value="{{$job->name}}" required="">
					                  </div>
					                </div>
					              </div>
					              <div class="form-group">
					                <div class="row">
					                  <div class="col-md-2">
					                    <label for="exampleInputEmail1">Department: <span style="color:red;">*</span> </label>
					                  </div>
					                  <div class="col-md-10">
					                    <select class="form-control " name="updepartment_id" id="updepartment_id" required="">
					                      	<option value="{{$job->getDepartment['id']}}">{{$job->getDepartment['name']}}</option>
					                      	@foreach($departments as $depart)
					                      	<option value="{{$depart->id}}">{{$depart->name}}</option>
					                     	 @endforeach
					                    </select>
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
				  <div class="modal fade" id="modal-delete{{$job->id}}">
				    <div class="modal-dialog">
				      <div class="modal-content">
				        <div class="modal-header">
				          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				            <span aria-hidden="true">&times;</span></button>
				          <h4 class="modal-title"><i class="fa fa-trash"></i> Delete</h4>
				        </div>
				          <form method="post" action="{{route('job.delete', $job->id)}}">
					        <div class="modal-body">
					            {{csrf_field()}}
					            <div class="form-group">
					                <div class="row">
					                  <div class="col-md-2">
					                    <label for="exampleInputEmail1">Job Name: </label>
					                  </div>
					                  <div class="col-md-4">
					                  	<p>{{$job->name}}</p>
					                  </div>
					                  <div class="col-md-2">
					                    <label for="exampleInputEmail1">Department: </label>
					                  </div>
					                  <div class="col-md-4">
					                  	<p>{{$job->getDepartment['name']}}</p>
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
            <center class="text-danger"><i class="fa fa-frown-o"></i> &nbsp; Not Jobs &nbsp; <i class="fa fa-frown-o"></i></center>
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
            <form method="POST" action="{{route('job.store')}}">
          		<div class="modal-body">
	              {{csrf_field()}}
	              <div class="form-group">
	                <div class="row">
	                  <div class="col-md-2">
	                    <label for="exampleInputEmail1">Job Name: <span style="color:red;">*</span> </label>
	                  </div>
	                  <div class="col-md-10">
	                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" required="">
	                  </div>
	                </div>
	              </div>
	              <div class="form-group">
	                <div class="row">
	                  <div class="col-md-2">
	                    <label for="exampleInputEmail1">Department: <span style="color:red;">*</span> </label>
	                  </div>
	                  <div class="col-md-10">
	                    <select class="form-control " name="department_id" id="department_id" required="">
	                      @foreach($departments as $depart)
	                      <option value="{{$depart->id}}">{{$depart->name}}</option>
	                      @endforeach
	                    </select>
	                  </div>
	                </div>
	              </div>
	          </div>
	          <div class="modal-footer">
	            <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
	            <button type="submit" class="btn btn-success save" id="save">Save</button>
	          </div>
            </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
  
@endsection
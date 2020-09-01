@extends('layout.master')
@section('title')
  Commission 
@endsection
@section('breadcrumb')
   <i class="fa fa-money"></i> Commission
@endsection
@section('namepage')
  Settings
@endsection
@section('content')

<!-- Table Project -->
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-info">
        <div class="box-header">
          <h3 class="box-title">Commission List</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          @if(count($commissions)>0)
          	<table id="" class="table table-bordered table-hover">
	            <thead>
	            <tr>
	              <th>Commission</th>
	              <th>Options</th>
	            </tr>
	            </thead>
	            <tbody>
	            @foreach($commissions as $commission)
	              <tr>
	                <td>{{$commission->commission}}</td>
	                <td>
	                  <button type="button" class="edit-commissionment btn btn-xs btn-warning" data-toggle="modal" data-target="#modal-edit{{$commission->id}}"><i class="fa fa-edit"></i> Edit</button>
	                </td>
	              </tr>

	            <!-- Modal edit -->
				    <div class="modal fade" id="modal-edit{{$commission->id}}">
				      <div class="modal-dialog">
				        <div class="modal-content">
				          <div class="modal-header">
				            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				              <span aria-hidden="true">&times;</span></button>
				            <h4 class="modal-title"><i class="fa fa-edit"></i> Edit </h4>
				          </div>
				            <form method="POST" action="{{route('commission.edit', $commission->id)}}" enctype="multipart/form-data">
					          <div class="modal-body">
					              {{csrf_field()}}
					              <div class="form-group">
					                <div class="row">
					                  <div class="col-md-3">
					                    <label for="exampleInputEmail1">Commission <span style="color:red;">*</span> </label>
					                  </div>
					                  <div class="col-md-9">
					                    <input class="form-control" type="number" name="upcommission" id="upcommission" value="{{$commission->commission}}" required="">
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

				<!-- Modal ddelete -->
				    <div class="modal fade" id="modal-delete{{$commission->id}}">
				      <div class="modal-dialog">
				        <div class="modal-content">
				          <div class="modal-header">
				            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				              <span aria-hidden="true">&times;</span></button>
				            <h4 class="modal-title"><i class="fa fa-trash"></i> Delete </h4>
				          </div>
				            <form method="POST" action="{{route('commission.delete', $commission->id)}}" enctype="multipart/form-data">
					          <div class="modal-body">
					              {{csrf_field()}}
					              <div class="form-group">
					                <div class="row">
					                	<div class="col-md-2">
					                    	<label for="exampleInputEmail1">Commission <span style="color:red;">*</span> </label>
					                  	</div>
					                  	<div class="col-md-2">
					                  		<p>{{$commission->commission}}</p>
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
            <center class="text-danger"><i class="fa fa-frown-o"></i> &nbsp; Not Commissions &nbsp; <i class="fa fa-frown-o"></i></center>
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
            <form method="POST" action="{{route('commission.store')}}" enctype="multipart/form-data">
	          <div class="modal-body">
	              {{csrf_field()}}
	              <div class="form-group">
	                <div class="row">
	                  <div class="col-md-3">
	                    <label for="exampleInputEmail1">Commission <span style="color:red;">*</span> </label>
	                  </div>
	                  <div class="col-md-9">
	                    <input class="form-control" type="number" name="commission" id="commission" placeholder="Enter Commission" required="">
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
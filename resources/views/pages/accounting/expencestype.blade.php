@extends('layout.master')
@section('title')
  Expenses Type
@endsection
@section('breadcrumb')
	<i class="fa fa-shopping-basket"></i> Expenses Type
@endsection
@section('namepage')
  Expenses Type
@endsection
@section('content')

<!-- Table Project -->
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-info">
        <div class="box-header">
          <button type="button" class="btn btn-xs btn-info pull-right" data-toggle="modal" data-target="#modal-add"><i class="fa  fa-plus"></i> Add Expenses Type</button>
          <h3 class="box-title">Expenses Type List</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          @if(count($expenses)>0)
          	<table id="example1" class="table table-bordered table-hover">
	            <thead>
	            <tr>
	              <th>Name</th>
	              <th>Options</th>
	            </tr>
	            </thead>
	            <tbody>
	            	@foreach($expenses as $expense)
		              	<tr>
			                <td>{{$expense->name}}</td>
			                <td>
			                  <button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#modal-edit{{$expense->id}}"><i class="fa fa-edit"></i> Edit</button>
			                  <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modal-delete{{$expense->id}}"><i class="fa fa-remove"></i> Delete</button>
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
						            <form method="POST" action="{{route('expensesType.edit', $expense->id)}}"  enctype="multipart/form-data">
							          <div class="modal-body">
							              {{csrf_field()}}
								            <div class="form-group">
								                <div class="row">
								                  <div class="col-md-2">
								                    <label for="exampleInputEmail1">Name: <span style="color:red">*</span> </label>
								                  </div>
								                  <div class="col-md-10">
								                    <textarea class="form-control" name="upname" id="upname">{{$expense->name}}</textarea>
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
								      <h4 class="modal-title"><i class="fa fa-trash"></i> Delete</h4>
								    </div>
								    <form method="POST" action="{{route('expensesType.delete', $expense->id)}}">
								    	<div class="modal-body">
								          {{csrf_field()}}
								          	<div class="form-group">
									            <div class="row">
									              	<div class="col-md-2">
									                	<label for="exampleInputEmail1">Name: </label>
									              	</div>
									              	<div class="col-md-10">
									              		<p>{{$expense->name}}</p>
									              	</div>
									            </div>
								          	</div>
									    </div>
									    <div class="modal-footer">
									      <button type="button" class="btn btn-info pull-left" data-dismiss="modal">Close</button>
									      <button type="submit" class="btn btn-danger" id="delete">Delete</button>
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
            <center class="text-danger"><i class="fa fa-frown-o"></i> &nbsp; Not Offers &nbsp; <i class="fa fa-frown-o"></i></center>
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
            <form method="POST" action="{{route('expensesType.store')}}" enctype="multipart/form-data">
	          <div class="modal-body">
	              {{csrf_field()}}
	              	<div class="form-group">
		                <div class="row">
		                  <div class="col-md-2">
		                    <label for="exampleInputEmail1">Name: <span style="color:red">*</span> </label>
		                  </div>
		                  <div class="col-md-10">
		                    <textarea class="form-control" name="name" id="name" placeholder="Enter Name" required=""></textarea>
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
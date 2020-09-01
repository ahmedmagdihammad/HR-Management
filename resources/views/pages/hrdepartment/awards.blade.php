@extends('layout.master')
@section('title')
  Award
@endsection
@section('breadcrumb')
	<a href="{{route('employee')}}"><i class="fa fa-user-plus"></i> Employee</a>
	<li><i class="fa fa-plus"></i> Bonus</li>
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
          <button type="button" class="btn btn-xs btn-info pull-right" data-toggle="modal" data-target="#modal-add"><i class="fa  fa-plus"></i> Add Bonus</button>
          <h3 class="box-title">Bonus List : {{$employees->name}}</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          	@if(count($awards)>0)
	        <table id="example1" class="table table-bordered table-hover">
	            <thead>
	            <tr>
	              <th>Name</th>
	              <th>Amount</th>
	              <th>Description</th>
	              <th>Options</th>
	            </tr>
	            </thead>
	            <tbody>
	              @foreach($awards as $award)
	              @if($award->getEmployee['id'] == $id)
		            <tr>
		                <td>{{$award->name}}</td>
		                <td>{{$award->amount}}</td>
		                <td>{{$award->desc}}</td>
		                <td>
		                  	<button type="button" class="edit-award btn btn-xs btn-warning" data-toggle="modal" data-target="#modal-edit{{$award->id}}"><i class="fa fa-edit"></i> Edit</button>
		                  	<button type="button" class="delete-award btn btn-xs btn-danger" data-toggle="modal" data-target="#modal-delete{{$award->id}}"><i class="fa fa-remove"></i> Delete</button>
		                </td>
		            </tr>

		            <!-- Modal Delete -->
					    <div class="modal fade" id="modal-delete{{$award->id}}">
					      <div class="modal-dialog">
					        <div class="modal-content">
					          <div class="modal-header">
					            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					              <span aria-hidden="true">&times;</span></button>
					            <h4 class="modal-title"><i class="fa fa-trash"></i> Delete</h4>
					          </div>
					            <form method="post" action="{{route('award.delete', $award->id)}}">
					          		<div class="modal-body">
						              	{{csrf_field()}}
							            <div class="form-group">
							                <div class="row">
							                  <div class="col-md-2">
							                    <label for="exampleInputEmail1">Name: </label>
							                  </div>
							                  <div class="col-md-2">
							                  	<p>{{$award->name}}</p>
							                  </div>
							                  <div class="col-md-2">
							                    <label for="exampleInputEmail1">Amount: </label>
							                  </div>
							                  <div class="col-md-2">
							                  	<p>{{$award->amount}}</p>
							                  </div>
							              	</div>
							              	<br>
							                <div class="row">
								                  <div class="col-md-2">
								                    <label for="exampleInputEmail1">Description: </label>
								                  </div>
								                  <div class="col-md-10">
								                  	<p>{{$award->desc}}</p>
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

	              	<!-- Modal add -->
					    <div class="modal fade" id="modal-edit{{$award->id}}">
					      <div class="modal-dialog">
					        <div class="modal-content">
					          	<div class="modal-header">
					            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					              	<span aria-hidden="true">&times;</span></button>
					            	<h4 class="modal-title"><i class="fa fa-edit"></i> Edit</h4>
					          	</div>
						        <form method="post" action="{{route('award.edit', $award->id)}}">
						          	<div class="modal-body">
						              {{csrf_field()}}
							            <div class="form-group hidden">
							                <div class="row">
							                  <div class="col-md-2">
							                    <label for="exampleInputEmail1">Employee: </label>
							                  </div>
							                  <div class="col-md-10">
							                    <input type="text" class="form-control" name="upemployee_id" id="upemployee_id" value="{{$award->getEmployee['id']}}" required="">
							                  </div>
							                </div>
							            </div>
							            <div class="form-group">
							                <div class="row">
							                  <div class="col-md-2">
							                    <label for="exampleInputEmail1">Name: <span style="color:red">*</span> </label>
							                  </div>
							                  <div class="col-md-10">
							                    <input type="text" class="form-control" name="upname" id="upname" value="{{$award->name}}" required="">
							                  </div>
							                </div>
							            </div>
							            <div class="form-group">
							                <div class="row">
							                  <div class="col-md-2">
							                    <label for="exampleInputEmail1">Amount: <span style="color:red">*</span> </label>
							                  </div>
							                  <div class="col-md-10">
							                    <input type="text" class="form-control" name="upamount" id="upamount" value="{{$award->amount}}" required=" ">
							                  </div>
							                </div>
							            </div>
							            <div class="form-group">
							                <div class="row">
							                  <div class="col-md-2">
							                    <label for="exampleInputEmail1">Description: <span style="color:red">*</span> </label>
							                  </div>
							                  <div class="col-md-10">
							                  	<textarea class="form-control" name="updesc" required="">{{$award->desc}}</textarea>
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

					
				  @endif
	              @endforeach
	            </tbody>
	       	</table>
	       	@else
	            <br><br><br><br><br>
	            <center class="text-danger"><i class="fa fa-frown-o"></i> &nbsp; Not Bonus &nbsp; <i class="fa fa-frown-o"></i></center>
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
	        <form method="post" action="{{route('award.store')}}">
	          	<div class="modal-body">
	              {{csrf_field()}}
		            <div class="form-group hidden">
		                <div class="row">
		                  <div class="col-md-2">
		                    <label for="exampleInputEmail1">Employee: </label>
		                  </div>
		                  <div class="col-md-10">
		                    <input type="text" class="form-control" name="employee_id" id="employee_id" value="{{$employees->id}}" required="">
		                  </div>
		                </div>
		            </div>
		            <div class="form-group">
		                <div class="row">
		                  <div class="col-md-2">
		                    <label for="exampleInputEmail1">Name: <span style="color:red">*</span> </label>
		                  </div>
		                  <div class="col-md-10">
		                    <input type="text" class="form-control" name="name" id="name" placeholder="Name" required="">
		                  </div>
		                </div>
		            </div>
		            <div class="form-group">
		                <div class="row">
		                  <div class="col-md-2">
		                    <label for="exampleInputEmail1">Amount: <span style="color:red">*</span> </label>
		                  </div>
		                  <div class="col-md-10">
		                    <input type="text" class="form-control" name="amount" id="amount" placeholder="Amount" required=" ">
		                  </div>
		                </div>
		            </div>
		            <div class="form-group">
		                <div class="row">
		                  <div class="col-md-2">
		                    <label for="exampleInputEmail1">Description: <span style="color:red">*</span> </label>
		                  </div>
		                  <div class="col-md-10">
		                  	<textarea class="form-control" name="desc" placeholder="Description" required=""></textarea>
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
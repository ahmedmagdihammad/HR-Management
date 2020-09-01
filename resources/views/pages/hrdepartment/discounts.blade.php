@extends('layout.master')
@section('title')
  Discount
@endsection
@section('breadcrumb')
	<a href="{{route('employee')}}"><i class="fa fa-user-plus"></i> Employee</a>
	<li><i class="fa fa-frown-o"></i> Deduction</li>
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
          <button type="button" class="btn btn-xs btn-info pull-right" data-toggle="modal" data-target="#modal-add"><i class="fa  fa-plus"></i> Add Deduction</button>
          <h3 class="box-title">Deduction List : {{$employees->name}}</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          	@if(count($discounts)>0)
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
	              @foreach($discounts as $discount)
	              @if($discount->getEmployee['id'] == $id)
		            <tr>
		                <td>{{$discount->name}}</td>
		                <td>{{$discount->amount}}</td>
		                <td>{{$discount->desc}}</td>
		                <td>
		                  	<button type="button" class="edit-discount btn btn-xs btn-warning" data-toggle="modal" data-target="#modal-edit{{$discount->id}}"><i class="fa fa-edit"></i> Edit</button>
		                  	<button type="button" class="delete-discount btn btn-xs btn-danger" data-toggle="modal" data-target="#modal-delete{{$discount->id}}"><i class="fa fa-remove"></i> Delete</button>
		                </td>
		            </tr>

		            <!-- Modal Delete -->
					    <div class="modal fade" id="modal-delete{{$discount->id}}">
					      <div class="modal-dialog">
					        <div class="modal-content">
					          <div class="modal-header">
					            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					              <span aria-hidden="true">&times;</span></button>
					            <h4 class="modal-title"><i class="fa fa-trash"></i> Delete</h4>
					          </div>
					            <form method="post" action="{{route('discount.delete', $discount->id)}}">
					          		<div class="modal-body">
						              	{{csrf_field()}}
							            <div class="form-group">
							                <div class="row">
							                  <div class="col-md-2">
							                    <label for="exampleInputEmail1">Name:  </label>
							                  </div>
							                  <div class="col-md-2">
							                  	<p>{{$discount->name}}</p>
							                  </div>
							                  <div class="col-md-2">
							                    <label for="exampleInputEmail1">Amount: </label>
							                  </div>
							                  <div class="col-md-2">
							                  	<p>{{$discount->amount}}</p>
							                  </div>
							              	</div>
							              	<br>
							                <div class="row">
							                  <div class="col-md-2">
							                    <label for="exampleInputEmail1">Description: </label>
							                  </div>
							                  <div class="col-md-10">
							                  	<p>{{$discount->desc}}</p>
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
					    <div class="modal fade" id="modal-edit{{$discount->id}}">
					      <div class="modal-dialog">
					        <div class="modal-content">
					          	<div class="modal-header">
					            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					              	<span aria-hidden="true">&times;</span></button>
					            	<h4 class="modal-title"><i class="fa fa-edit"></i> Edit</h4>
					          	</div>
						        <form method="post" action="{{route('discount.edit', $discount->id)}}">
						          	<div class="modal-body">
						              {{csrf_field()}}
							            <div class="form-group hidden">
							                <div class="row">
							                  <div class="col-md-2">
							                    <label for="exampleInputEmail1">Employee: </label>
							                  </div>
							                  <div class="col-md-10">
							                    <input type="text" class="form-control" name="upemployee_id" id="upemployee_id" value="{{$discount->getEmployee['id']}}" required="">
							                  </div>
							                </div>
							            </div>
							            <div class="form-group">
							                <div class="row">
							                  <div class="col-md-2">
							                    <label for="exampleInputEmail1">Name: <span style="color:red">*</span> </label>
							                  </div>
							                  <div class="col-md-10">
							                    <input type="text" class="form-control" name="upname" id="upname" value="{{$discount->name}}" required="">
							                  </div>
							                </div>
							            </div>
							            <div class="form-group">
							                <div class="row">
							                  <div class="col-md-2">
							                    <label for="exampleInputEmail1">Amount: <span style="color:red">*</span> </label>
							                  </div>
							                  <div class="col-md-10">
							                    <input type="text" class="form-control" name="upamount" id="upamount" value="{{$discount->amount}}" required=" ">
							                  </div>
							                </div>
							            </div>
							            <div class="form-group">
							                <div class="row">
							                  <div class="col-md-2">
							                    <label for="exampleInputEmail1">Description: <span style="color:red">*</span> </label>
							                  </div>
							                  <div class="col-md-10">
							                  	<textarea class="form-control" name="updesc" required="">{{$discount->desc}}</textarea>
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
	            <center class="text-danger"><i class="fa fa-frown-o"></i> &nbsp; Not discounts &nbsp; <i class="fa fa-frown-o"></i></center>
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
	        <form method="post" action="{{route('discount.store')}}">
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
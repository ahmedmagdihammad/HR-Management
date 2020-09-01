@extends('layout.master')
@section('title')
  Refunds
@endsection
@section('breadcrumb')
	<a href="{{route('customer')}}"><i class="fa fa-users"></i> Customer</a>
	<li><a href="{{route('payCustomer', $payments->getCustomer['id'])}}"><i class="fa fa-money"></i> Payment</a> </li>
	<li> <i class="fa fa-download"></i> Refunds</li>
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
          <button type="button" class="btn btn-xs btn-info pull-right" data-toggle="modal" data-target="#modal-add"><i class="fa  fa-plus"></i> Add Refund</button>
          <h3 class="box-title">Refunds List</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          @if(count($refunds)>0)
          	<table id="" class="table table-bordered table-hover">
	            <thead>
	            <tr>
	              <th>Amount</th>
	              <th>Date</th>
	              <th>Created by</th>
	              <th>Options</th>
	            </tr>
	            </thead>
	            <tbody>
	            @foreach($refunds as $refund)
		            <tr>
		                <td>{{$refund->amount}}</td>
		                <td>{{$refund->created_at}}</td>
		                <td>@if($refund->created_by == '') -- @else {{$refund->getEmployee['name']}} @endif</td>
		                <td>
		                  <button type="button" class="edit-refundment btn btn-xs btn-warning" data-toggle="modal" data-target="#modal-edit{{$refund->id}}"><i class="fa fa-edit"></i> Edit</button>
		                  <button type="button" class="delete-refundment btn btn-xs btn-danger" data-toggle="modal" data-target="#modal-delete{{$refund->id}}"><i class="fa fa-remove"></i> Delete</button>
		                </td>
		            </tr>

	            <!-- Modal edit -->
				    <div class="modal fade" id="modal-edit{{$refund->id}}">
				      <div class="modal-dialog">
				        <div class="modal-content">
				          <div class="modal-header">
				            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				              <span aria-hidden="true">&times;</span></button>
				            <h4 class="modal-title"><i class="fa fa-edit"></i> Edit </h4>
				          </div>
				            <form method="POST" action="{{route('refund.edit', $refund->id)}}" enctype="multipart/form-data">
					          <div class="modal-body ">
					              {{csrf_field()}}
					              <div class="form-group hidden">
					                <div class="row">
					                  <div class="col-md-2">
					                    <label for="exampleInputEmail1">Customer: </label>
					                  </div>
					                  <div class="col-md-10">
					                    <input class="form-control" type="text" name="upcustomer_id" id="upcustomer_id" value="{{$payments->customer_id}}" required="">
					                  </div>
					                </div>
					              </div>
					              <div class="form-group hidden">
					                <div class="row">
					                  <div class="col-md-2">
					                    <label for="exampleInputEmail1">Payment: </label>
					                  </div>
					                  <div class="col-md-10">
					                    <input class="form-control" type="text" name="uppayment_id" id="uppayment_id" value="{{$payments->id}}" required="">
					                  </div>
					                </div>
					              </div>
					              <div class="form-group ">
					                <div class="row">
					                  <div class="col-md-2">
					                    <label for="exampleInputEmail1">Amount: <span style="color:red;">*</span> </label>
					                  </div>
					                  <div class="col-md-10">
					                  	<input class="form-control" type="text" name="upamount" id="upamount" value="{{$refund->amount}}">
					                  </div>
					                </div>
					              </div>
					              <div class="form-group hidden">
					                <div class="row">
					                  <div class="col-md-2">
					                    <label for="exampleInputEmail1">Created by: </label>
					                  </div>
					                  <div class="col-md-10">
					                  	<input class="form-control" type="text" name="upcreated_by" id="upcreated_by" value="{{Auth::user()->id}}">
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
				    <div class="modal fade" id="modal-delete{{$refund->id}}">
				      <div class="modal-dialog">
				        <div class="modal-content">
				          <div class="modal-header">
				            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				              <span aria-hidden="true">&times;</span></button>
				            <h4 class="modal-title"><i class="fa fa-trash"></i> Delete </h4>
				          </div>
				            <form method="POST" action="{{route('refund.delete', $refund->id)}}" enctype="multipart/form-data">
					          <div class="modal-body">
					              {{csrf_field()}}
					              <div class="form-group">
					                <div class="row">
					                	<div class="col-md-2">
					                    	<label for="exampleInputEmail1">Amount: </label>
					                  	</div>
					                  	<div class="col-md-4">
					                  		<p>{{$refund->amount}}</p>
					                  	</div>
					                  	<div class="col-md-2">
					                    	<label for="exampleInputEmail1">Created by: </label>
					                  	</div>
					                  	<div class="col-md-4">
					                  		<p>@if($refund->created_by == '') -- @else {{$refund->getEmployee['name']}} @endif</p>
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
            <center class="text-danger"><i class="fa fa-frown-o"></i> &nbsp; Not Refunds &nbsp; <i class="fa fa-frown-o"></i></center>
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
            <form method="POST" action="{{route('refund.store')}}" enctype="multipart/form-data">
	          <div class="modal-body">
	              {{csrf_field()}}
	              	<div class="form-group hidden">
		                <div class="row">
		                  <div class="col-md-2">
		                    <label for="exampleInputEmail1">Customer: </label>
		                  </div>
		                  <div class="col-md-10">
		                    <input class="form-control" type="text" name="customer_id" id="customer_id" value="{{$payments->customer_id}}" required="">
		                  </div>
		                </div>
	              	</div>
	              	<div class="form-group hidden">
		                <div class="row">
		                  <div class="col-md-2">
		                    <label for="exampleInputEmail1">Payment: </label>
		                  </div>
		                  <div class="col-md-10">
		                    <input class="form-control" type="text" name="payment_id" id="payment_id" value="{{$payments->id}}" required="">
		                  </div>
		                </div>
	              	</div>
	              	<div class="form-group ">
		                <div class="row">
		                  <div class="col-md-2">
		                    <label for="exampleInputEmail1">Amount: <span style="color:red;">*</span> </label>
		                  </div>
		                  <div class="col-md-10">
		                  	<input class="form-control" type="text" name="amount" id="amount" placeholder="Enter Amount" required="">
		                  </div>
		                </div>
	              	</div>
	              	<div class="form-group hidden">
		                <div class="row">
		                  <div class="col-md-2">
		                    <label for="exampleInputEmail1">Created by: </label>
		                  </div>
		                  <div class="col-md-10">
		                  	<input class="form-control" type="text" name="created_by" id="created_by" value="{{Auth::user()->id}}" required="">
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
 
<script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>

@endsection
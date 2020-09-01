@extends('layout.master')
@section('title')
  Service
@endsection
@section('breadcrumb')
	<a href="{{route('company')}}"><i class="fa fa-industry"></i> Company</a>
	<li><a href="{{route('companies.customer', $id)}}"><i class="fa fa-group"></i> Customers</a></li>
	<li><i class="fa fa-money"></i> Service</li>
@endsection
@section('namepage')
  Service
@endsection
@section('content')

<!-- Table Project -->
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-info">
        <div class="box-header">
          <button type="button" class="btn btn-xs btn-info pull-right" data-toggle="modal" data-target="#modal-add"><i class="fa  fa-plus"></i> Add Service </button>
          <h3 class="box-title">Service List : {{$customers->name}}</h3>
          <div class="row" style="margin-left: 30%">
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body" >
          	@if(count($services)>0)
	        <table id="example1" class="table table-bordered table-hover" >
	            <thead>
	            <tr>
	              <th>Company Name</th>
	              <th>Description</th>
	              <th>Amount</th>
	              <th>Options</th>
	            </tr>
	            </thead>
	            <tbody>
	              @foreach($services as $service)
	              @if($service->getCustomer['id'] == $id)
		            <tr>
		                <td>{{$service->getEmployee['company_name']}}</td>
		                <td>{{$service->desc}}</td>
		                <td>{{$service->amount}}</td>
		                <td>
		                  	<button type="button" class=" btn btn-xs btn-warning" data-toggle="modal" data-target="#modal-edit{{$service->id}}"><i class="fa fa-edit"></i> Edit</button>
		                  	<button type="button" class=" btn btn-xs btn-danger" data-toggle="modal" data-target="#modal-delete{{$service->id}}"><i class="fa fa-remove"></i> Delete</button>
		                </td>
		            </tr>

		            <!-- Modal add -->
					    <div class="modal fade" id="modal-edit{{$service->id}}">
					      <div class="modal-dialog">
					        <div class="modal-content">
					          	<div class="modal-header">
					            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					              	<span aria-hidden="true">&times;</span></button>
					            	<h4 class="modal-title"><i class="fa fa-edit"></i> Edit</h4>
					          	</div>
						        <form method="post" action="{{route('service.edit', $service->id)}}">
						          	<div class="modal-body">
						              {{csrf_field()}}
							            <div class="form-group hidden">
							                <div class="row">
							                  <div class="col-md-2">
							                    <label for="exampleInputEmail1">Company Name </label>
							                  </div>
							                  <div class="col-md-10">
							                    <input type="text" class="form-control" name="upcompany_id" id="upcompany_id" value="{{$service->getEmployee['id']}}" required="">
							                  </div>
							                </div>
							            </div>
							            <div class="form-group hidden">
							                <div class="row">
							                  <div class="col-md-2">
							                    <label for="exampleInputEmail1">Customer Name</label>
							                  </div>
							                  <div class="col-md-10">
							                    <input type="text" class="form-control" name="upcustomer_id" id="upcustomer_id" value="{{$service->getCustomer['id']}}" required="">
							                  </div>
							                </div>
							            </div>
							            <div class="form-group">
							                <div class="row">
							                  <div class="col-md-2">
							                    <label for="exampleInputEmail1">Description</label>
							                  </div>
							                  <div class="col-md-10">
							                    <input type="text" class="form-control" name="updesc" id="updesc" value="{{$service->desc}}" required="">
							                  </div>
							                </div>
							            </div>
							            <div class="form-group">
							                <div class="row">
							                  <div class="col-md-2">
							                    <label for="exampleInputEmail1">Amount</label>
							                  </div>
							                  <div class="col-md-10">
							                    <input type="text" class="form-control" name="upamount" id="upamount" value="{{$service->amount}}" required="">
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
					    <div class="modal fade" id="modal-delete{{$service->id}}">
					      <div class="modal-dialog">
					        <div class="modal-content">
					          <div class="modal-header">
					            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					              <span aria-hidden="true">&times;</span></button>
					            <h4 class="modal-title"><i class="fa fa-trash"></i> Delete</h4>
					          </div>
					            <form method="post" action="{{route('service.delete', $service->id)}}">
					          		<div class="modal-body">
						              	{{csrf_field()}}
							            <div class="form-group">
							                <div class="row">
							                  <div class="col-md-2">
							                    <label for="exampleInputEmail1">Comapny Name </label>
							                  </div>
							                  <div class="col-md-4">
							                  	<p>{{$service->getEmployee['company_name']}}</p>
							                  </div>
							                  <div class="col-md-2">
							                    <label for="exampleInputEmail1">Amount </label>
							                  </div>
							                  <div class="col-md-4">
							                  	<p>{{$service->amount}}</p>
							                  </div>
							              	</div>
							              	<br>
							              	<div class="row">
							                  <div class="col-md-2">
							                    <label for="exampleInputEmail1">Description </label>
							                  </div>
							                  <div class="col-md-10">
							                  	<p>{{$service->desc}}</p>
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
	            <center class="text-danger"><i class="fa fa-frown-o"></i> &nbsp; Not Companies &nbsp; <i class="fa fa-frown-o"></i></center>
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
	        <form method="post" action="{{route('service.store')}}">
	          	<div class="modal-body">
	              {{csrf_field()}}
		            <div class="form-group hidden">
		                <div class="row">
		                  <div class="col-md-2">
		                    <label for="exampleInputEmail1">Company Name </label>
		                  </div>
		                  <div class="col-md-10">
		                    <input type="text" class="form-control" name="company_id" id="company_id" value="{{Auth::user()->id}}" placeholder="Enter Company Name" required="">
		                  </div>
		                </div>
		            </div>
		            <div class="form-group hidden">
		                <div class="row">
		                  <div class="col-md-2">
		                    <label>Customer Name </label>
		                  </div>
		                  <div class="col-md-10">
		                    <input type="text" class="form-control" name="customer_id" id="customer_id" value="{{$customers->id}}" placeholder="Enter User Name" required="">
		                  </div>
		                </div>
		            </div>
		            <div class="form-group">
		                <div class="row">
		                  <div class="col-md-2">
		                    <label>Description </label>
		                  </div>
		                  <div class="col-md-10">
		                  	<textarea class="form-control" name="desc" placeholder="Enter Description"></textarea>
		                  </div>
		                </div>
		            </div>
		            <div class="form-group">
		                <div class="row">
		                  <div class="col-md-2">
		                    <label>Amount </label>
		                  </div>
		                  <div class="col-md-10">
		                  	<input type="nubmer" name="amount" id="amount" class="form-control" placeholder="Enter Amount">
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
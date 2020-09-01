@extends('layout.master')
@section('title')
  Employees
@endsection
@section('breadcrumb')
	<a href="{{route('company')}}"><i class="fa fa-industry"></i> Company</a>
	<li><i class="fa fa-group"></i> Customers</li>
@endsection
@section('namepage')
  Company
@endsection
@section('content')

<!-- Table Project -->
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-info">
        <div class="box-header">
          <!-- <button type="button" class="btn btn-xs btn-info pull-right" data-toggle="modal" data-target="#modal-add"><i class="fa  fa-plus"></i> Add Company</button> -->
          <h3 class="box-title">Company List </h3>
          <div class="row" style="margin-left: 30%">
          	<form method="post" action="{{route('getCustomerComp')}}">
          		@csrf
      			<div class="col-md-4">
      				<div class="input-group">
			          	<input type="number" class="form-control" name="mobile" id="mobile">
		        		<div class="input-group-btn">
				        	<button type="submit" class="btn filter"><i class="fa fa-arrow-right text-muted"></i></button>
      					</div>
					</div>
		      	</div>
		    </form>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body" >
          	@if(count($customers)>0)
	        <table id="example1" class="table table-bordered table-hover" >
	            <thead>
	            <tr>
	              <th>Customer Name</th>
	              <th>Mobile 1</th>
	              <th>Options</th>
	            </tr>
	            </thead>
	            <tbody>
	              @foreach($customers as $customer)
		            <tr>
		                <td>{{$customer->name}}</td>
		                <td>{{$customer->mobile_1}}</td>
		                <td>
		                  	<a href="{{route('service', $customer->id)}}" class=" btn btn-xs btn-success"><i class="fa fa-money"></i> Add Service</a>
		                </td>
		            </tr>

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

@endsection
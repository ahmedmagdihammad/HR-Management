@extends('layout.master')
@section('title')
  Out To Payment
@endsection
@section('breadcrumb')
	<i class="fa fa-credit-card"></i> Out To Payment
@endsection
@section('namepage')
  Reports
@endsection
@section('content')

<!-- Table Project -->
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-info">
        <div class="box-header">
          <h3 class="box-title">Out To Payment List</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          @if(count($payments)>0)
          	<table id="example1" class="table table-bordered table-hover">
	            <thead>
	            <tr>
	              <th>id</th>
	              <th>Customer Name</th>
	              <th>Customer Mobile</th>
	              <th>Offer Name</th>
	              <th>Amount</th>
	              <th>Branch Name</th>
	              <th>Image</th>
	              <th>Date</th>
	              <th>Created by</th>
	              <th>Option</th>
	            </tr>
	            </thead>
	            <tbody>
	            @foreach($payments as $payment)
	              <tr>
	                <td>{{$payment->id}}</td>
	                <td>{{$payment->getCustomer['name_en']}}</td>
	                <td>{{$payment->getCustomer['mobile_1']}}</td>
	                <td>{{$payment->getOffer['name']}}</td>
	                <td>{{$payment->getOffer['amount']}}</td>
	                <td>{{$payment->getEmployee->getBranch['name']}}</td>
	                <td><img src="{{asset($payment->image_id)}}" style="width: 100px; height: 80px"></td>
	                <td>{{$payment->created_at}}</td>
	                <td>{{$payment->getEmployee['name']}}</td>
	                <td>
	                	<button type="button" class=" btn btn-xs btn-warning" data-toggle="modal" data-target="#modal-edit{{$payment->id}}"><i class="fa fa-edit"></i> Edit</button>
	                </td>
	              </tr>

	              <!-- Modal edit -->
				    <div class="modal fade" id="modal-edit{{$payment->id}}">
				      <div class="modal-dialog">
				        <div class="modal-content">
				          <div class="modal-header">
				            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				              <span aria-hidden="true">&times;</span></button>
				            <h4 class="modal-title"><i class="fa fa-edit"></i> Edit </h4>
				          </div>
				            <form method="POST" action="{{route('payCustomer.edit', $payment->id)}}" enctype="multipart/form-data">
					          <div class="modal-body">
					              {{csrf_field()}}
					              <div class="form-group hidden">
					                <div class="row">
					                  <div class="col-md-2">
					                    <label for="exampleInputEmail1">Customer Name</label>
					                  </div>
					                  <div class="col-md-10">
					                  	<input class="form-control" type="text" name="upcustomer_id" value="{{$payment->getCustomer['id']}}">
					                  </div>
					                </div>
					              </div>
					              <div class="form-group hidden">
					                <div class="row">
					                  <div class="col-md-2">
					                    <label for="exampleInputEmail1">Branch Name</label>
					                  </div>
					                  <div class="col-md-10">
					                  	<input class="form-control" type="text" name="upbranch_id" id="upbranch_id" value="{{$payment->getEmployee['branch_id']}}">
					                  </div>
					                </div>
					              </div>
					              <div class="form-group hidden">
					                <div class="row">
					                  <div class="col-md-2">
					                    <label for="exampleInputEmail1">Employee Name</label>
					                  </div>
					                  <div class="col-md-10">
					                  	<input class="form-control" type="text" name="upemployee_id" id="upemployee_id" value="{{$payment->getEmployee['id']}}">
					                  </div>
					                </div>
					              </div>
					              <div class="form-group">
					                <div class="row">
					                  <div class="col-md-2">
					                    <label for="exampleInputEmail1">Payment</label>
					                  </div>
					                  <div class="col-md-10">
					                  		<select class="form-control" name="uppayment" id="uppayment">
					                  			<option value="{{$payment->getOffer['id']}}">{{$payment->getOffer['name']}} - {{$payment->getOffer['amount']}}</option>
					                  			@foreach($offers as $offer)
					                  			<option value="{{$offer->id}}">{{$offer->name}} - {{$offer->amount}}</option>
					                  			@endforeach
					                  		</select>
					                  </div>
					                </div>
					              </div>
					               <div class="form-group">
					                <div class="row">
					                  <div class="col-md-2">
					                    <label for="exampleInputEmail1">Image</label>
					                  </div>
					                  <div class="col-md-7">
					                  	<input class="form-control" type="file" name="upimage_id" id="upimage_id" value="{{$payment->image_id}}">
					                  </div>
					                  <div>
					                  	<img src="{{asset($payment->image_id)}}" style="width: 100px; height: 80px">
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

	            @endforeach
	            </tbody>
          	</table>
          	{{$paymentPaginat->links()}}
          @else
            <br><br><br><br><br>
            <center class="text-danger"><i class="fa fa-frown-o"></i> &nbsp; Not First Line &nbsp; <i class="fa fa-frown-o"></i></center>
            <br><br><br><br><br><br><br><br>
          @endif
        </div>
        <!-- /.box-body -->
      </div>
    </div>
  </div>

@endsection
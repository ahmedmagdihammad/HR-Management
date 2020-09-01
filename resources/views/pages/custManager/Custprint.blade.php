@extends('layout.master')

@section('content')
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<!-- Table Project -->
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-info">
        <div class="box-header">
          <h3 class="box-title"></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          	<center>Corpret Name</center>
          	<p class="pull-right">Invoice</p>
          	<table id="" class="table table-bordered table-hover">
	            <thead>
	            <tr>
	              <th>Offer Name</th>
	              <th>Amount</th>
	              <th>Image</th>
	              <th>Branch</th>
	              <th>Created by</th>
	              <th>Payment Date</th>
	            </tr>
	            </thead>
	            <tbody>
	            @foreach($payments as $payment)
	            @if($payment->getCustomer['id'] == $id)
	              <tr>
	                <td>{{$payment->getOffer['name']}}</td>
	                <td>{{$payment->getOffer['amount']}}</td>
	                <td><img src="{{asset($payment->image_id)}}" style="width: 100px; height: 80px"></td>
	                <td>{{$payment->getEmployee->getBranch['name']}}</td>
	                <td>{{$payment->getEmployee['name']}}</td>
	                <td>{{$payment->created_at}}</td>
	              </tr>

				@endif
	            @endforeach
	            
	            </tbody>
          	</table>
        </div>
        <!-- /.box-body -->
      </div>
    </div>
  </div>
@endsection
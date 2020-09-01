@extends('layout.master')
@section('title')
  Payment
@endsection
@section('breadcrumb')
	<i class="fa fa-credit-card"></i> Payment
@endsection
@section('namepage')
  Accounting
@endsection
@section('content')

<!-- Table Project -->
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-info">
        <div class="box-header">
          	<h3 class="box-title">Payment List</h3>
			
			<button onclick="$('#filter').slideToggle()" class="btn btn-info btn-sm pull-right" data-toggle="tooltip" title="Filter Payments"><i class="fa fa-filter"></i></button>
        	
			<div id="tablelist" class="card ">
				<div class="box-header with-border">
				      <div class="box-tools">
				      </div>
				    </h3>
				</div>
				<form method="post" action="{{route('getPaymentFilter')}}">
					@csrf
					<div id="filter" class="box-header with-border" style="display:none">
					    <div class="row">
					    	<div class="col-xs-2">
					        	<input type="number" name="payment" id="payment" class="date form-control" placeholder="Enter Amount">
					      	</div>
					      	<div class="col-xs-2">
					        	<input type="text" name="date" id="date" class="date form-control" placeholder="Date From">
					      	</div>
					      	<div class="col-xs-2">
					        	<input type="date" name="date_to" id="date_to" class="date form-control" placeholder="Date To">
					      	</div>
					      	<div class="col-xs-2">
					        	<button onclick="paymentSearchNew()" class="btn btn-success">Search</button>
					      	</div>
					    </div>
					</div>
				</form>
			</div>

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
	              </tr>

	            @endforeach
	            </tbody>
          	</table>
          @else
            <br><br><br><br><br>
            <center class="text-danger"><i class="fa fa-frown-o"></i> &nbsp; Not payments &nbsp; <i class="fa fa-frown-o"></i></center>
            <br><br><br><br><br><br><br><br>
          @endif
        </div>
        <!-- /.box-body -->
      </div>
    </div>
  </div>

<script>
function paymentSearchNew(){
 var data = new Array();
 data[0] = $("#tablelist #filter #date").val();
 data[1] = $("#tablelist #filter #date_to").val();
 data[2] = $("#tablelist #filter #payment").val();
 if(data[0]==''&&data[1]==''&&data[2]){ return; }
 $(".box-body").html("<center><br><br><br><i class='fa fa-spin fa-spinner'></i> Loading List...<br><br><br><br></center>");
 $.ajax({
	 	async: true,
	 	type: 'post',
	 	url: 'handler-new.php',
	 	data: {op:'paymentSearch', data: data},
		success: function(data){
		 	setTimeout(function(){
			 	$("#tablelist #body").html(data);
			 	$("#tablelist #total").text($("#tablelist #count").text());
		 	},1000);
		}
	});
}

</script>
@endsection
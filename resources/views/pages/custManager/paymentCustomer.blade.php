@extends('layout.master')
@section('title')
  Payment
@endsection
@section('breadcrumb')
	<a href="{{route('customer')}}"><i class="fa fa-users"></i> Customer</a> 
	<li> <i class="fa fa-credit-card"></i> Payment</li>
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
          <button type="button" class="btn btn-xs btn-info pull-right" data-toggle="modal" data-target="#modal-add"><i class="fa  fa-plus"></i> Add Payment</button>
          <h3 class="box-title">Payments List : {{$customers->name_en}}</h3>
        </div>
        <!-- /.box-header -->
        <div class=" box-body">
          @if(count($payments)>0)
          	<table id="" class="print table table-bordered table-hover">
	            <thead>
	            <tr>
	              <th>Offer Name</th>
	              <th>Amount</th>
	              <th>Image</th>
	              <th>Branch</th>
	              <th>Created by</th>
	              <th>Payment Date</th>
	              <th>Options</th>
	            </tr>
	            </thead>
	            <tbody>
		            @foreach($payments as $payment)
		              <tr>
		                <td>{{$payment->getOffer['name']}}</td>
		                <td>{{$payment->getOffer['amount']}}</td>
		                <td><img src="{{asset($payment->image_id)}}" style="width: 100px; height: 80px"></td>
		                <td>@if($payment->branch_id == '') -- @else {{$payment->getBranch['name']}} @endif</td>
		                <td>@if($payment->employee_id) -- @else {{$payment->getEmployee['name']}} @endif</td>
		                <td>{{$payment->created_at}}</td>
		                <td>
		                  <button type="button" class="edit-paymentment btn btn-xs btn-warning" data-toggle="modal" data-target="#modal-edit{{$payment->id}}"><i class="fa fa-edit"></i> Edit</button>
		                  <button type="button" class="delete-paymentment btn btn-xs btn-danger" data-toggle="modal" data-target="#modal-delete{{$payment->id}}"><i class="fa fa-trash"></i> Delete</button>
		                  <!-- <a href="{{route('documentPay',$payment->id)}}" class="delete-paymentment btn btn-xs btn-info"><i class="fa fa-plus"></i> Document</a> -->
		                  <a href="{{route('refund',$payment->id)}}" class="delete-paymentment btn btn-xs btn-info"><i class="fa fa-plus"></i> Refunds</a>
						  <a href="#" onclick="window.print()" class="btnPrint btn btn-xs btn-primary"><i class="fa fa-print"></i> Print</a>
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
						                    <label for="exampleInputEmail1">Customer: </label>
						                  </div>
						                  <div class="col-md-10">
						                    <input class="form-control" type="text" name="upcustomer_id" id="upcustomer_id" value="{{$customers->id}}" required="">
						                  </div>
						                </div>
						              </div>
						              <div class="form-group">
						                <div class="row">
						                  <div class="col-md-2">
						                    <label for="exampleInputEmail1">Payment: <span style="color:red;">*</span> </label>
						                  </div>
						                  <div class="col-md-10">
						                    <select class="form-control" name="uppayment" id="uppayment" required="">
						                    	<option value="{{$payment->getOffer['id']}}">{{$payment->getOffer['name']}} - {{$payment->payment}}</option>
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
						                    <label for="exampleInputEmail1">Image: <span style="color:red;">*</span> </label>
						                  </div>
						                  <div class="col-md-7">
						                  	<input type="file" class="form-control" name="upimage_id" id="upimage_id">
						                  </div>
						                  <div class="col-xs-2">
						                  	<img src="{{asset($payment->image_id)}}" style="width: 100px; height: 80px">
						                  </div>
						                </div>
						              </div>
						              <div class="form-group hidden">
						                <div class="row">
						                  <div class="col-md-2">
						                    <label for="exampleInputEmail1">Employee: </label>
						                  </div>
						                  <div class="col-md-10">
						                  	<input class="form-control" type="text" name="upemployee_id" id="upemployee_id" value="{{Auth::user()->id}}">
						                  </div>
						                </div>
						              </div>
						              <div class="form-group hidden">
						                <div class="row">
						                  <div class="col-md-2">
						                    <label for="exampleInputEmail1">Branch: </label>
						                  </div>
						                  <div class="col-md-10">
						                  	<input class="form-control" type="text" name="upbranch_id" id="upbranch_id" value="{{Auth::user()->branch_id}}">
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
					    <div class="modal fade" id="modal-delete{{$payment->id}}">
					      <div class="modal-dialog">
					        <div class="modal-content">
					          <div class="modal-header">
					            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					              <span aria-hidden="true">&times;</span></button>
					            <h4 class="modal-title"><i class="fa fa-trash"></i> Delete </h4>
					          </div>
					            <form method="POST" action="{{route('payCustomer.delete', $payment->id)}}" enctype="multipart/form-data">
						          <div class="modal-body">
						              {{csrf_field()}}
						              <div class="form-group">
						                <div class="row">
						                	<div class="col-md-2">
						                    	<label for="exampleInputEmail1">Customer: </label>
						                  	</div>
						                  	<div class="col-md-4">
						                  		<p>@if($payment->customer_id) -- @else {{$payment->getCustomer['name_en']}} @endif</p>
						                  	</div>
						                  	<div class="col-md-2">
						                    	<label for="exampleInputEmail1">Image: </label>
						                  	</div>
						                  	<div class="col-md-4">
						                  		<img src="{{asset($payment->image_id)}}" style="width: 100px; height: 80px">
						                  	</div>
						                </div>
						                <hr>
					                  	<div class="row">
					                  		<div class="col-md-2">
						                    	<label for="exampleInputEmail1">Created by: </label>
						                  	</div>
						                  	<div class="col-md-4">
						                  		<p>@if($payment->employee_id) -- @else {{$payment->getEmployee['name']}} @endif</p>
						                  	</div>
						                  	<div class="col-md-2">
						                    	<label for="exampleInputEmail1">Branch: </label>
						                  	</div>
						                  	<div class="col-md-4">
						                  		<p>@if($payment->branch_id == '') -- @else {{$payment->getBranch['name']}} @endif</p>
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
            <center class="text-danger"><i class="fa fa-frown-o"></i> &nbsp; Not payments &nbsp; <i class="fa fa-frown-o"></i></center>
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
            <form method="POST" action="{{route('payCustomer.store')}}" enctype="multipart/form-data">
	          <div class="modal-body">
	              {{csrf_field()}}
	              <div class="form-group hidden">
	                <div class="row">
	                  <div class="col-md-2">
	                    <label for="exampleInputEmail1">Customer: </label>
	                  </div>
	                  <div class="col-md-10">
	                    <input class="form-control" type="text" name="customer_id" id="customer_id" value="{{$customers->id}}" required="">
	                  </div>
	                </div>
	              </div>
	              <div class="form-group">
	                <div class="row">
	                  <div class="col-md-2">
	                    <label for="exampleInputEmail1">Payment: <span style="color:red;">*</span> </label>
	                  </div>
	                  <div class="col-md-10">
	                    <select class="form-control" name="payment" id="payment" required="">
	                    	@foreach($offers as $offer)
	                    	<option value="{{$offer->id}}" >{{$offer->name}} - {{$offer->amount}}</option>
	                    	@endforeach
	                    </select>
	                  </div>
	                </div>
	              </div>
	              <div class="form-group">
	                <div class="row">
	                  <div class="col-md-2">
	                    <label for="exampleInputEmail1">Image: <span style="color:red;">*</span> </label>
	                  </div>
	                  <div class="col-md-10">
	                  	<input type="file" class="form-control" name="image_id" id="image_id" required="">
	                  </div>
	                </div>
	              </div>
	              <div class="form-group hidden">
	                <div class="row">
	                  <div class="col-md-2">
	                    <label for="exampleInputEmail1">Employee: </label>
	                  </div>
	                  <div class="col-md-10">
	                  	<input class="form-control" type="text" name="employee_id" id="employee_id" value="{{Auth::user()->id}}" required="">
	                  </div>
	                </div>
	              </div>
	              <div class="form-group hidden">
	                <div class="row">
	                  <div class="col-md-2">
	                    <label for="exampleInputEmail1">Branch; </label>
	                  </div>
	                  <div class="col-md-10">
	                  	<input class="form-control" type="text" name="branch_id" id="branch_id" value="{{Auth::user()->branch_id}}" required="">
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

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('print/jquery.js')}}" type="text/javascript"></script>
<script src="{{asset('print/printPage.js')}}" type="text/javascript"></script>
<script>  
   function btnPrint(print)
{
    var mywindow = window.open('', 'PRINT', 'height=600,width=800');

    mywindow.document.write('<h1>' + document.querySelector(".print").innerHTML + '</h1>');

    mywindow.document.close(); // necessary for IE >= 10
    mywindow.focus(); // necessary for IE >= 10*/

    mywindow.print();
    mywindow.close();

    return true;
}
</script>

@endsection
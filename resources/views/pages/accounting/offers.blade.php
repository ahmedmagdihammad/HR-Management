@extends('layout.master')
@section('title')
  Offers
@endsection
@section('breadcrumb')
	<i class="fa fa-money"></i> Offer
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
          <button type="button" class="btn btn-xs btn-info pull-right" data-toggle="modal" data-target="#modal-add"><i class="fa  fa-plus"></i> Add Offer</button>
          <h3 class="box-title">Offers List</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          @if(count($offers)>0)
          	<table id="example1" class="table table-bordered table-hover">
	            <thead>
	            <tr>
	              <th>Name</th>
	              <th>Type</th>
	              <th>Amount</th>
	              <th>Month Count</th>
	              <th>Status</th>
	              <th>Options</th>
	            </tr>
	            </thead>
	            <tbody>
	            	@foreach($offers as $offer)
		              	<tr>
			                <td>{{$offer->name}}</td>
			                <td>@if($offer->type == 'Renewal') <p style="color: green">Renewal</p> @else <p style="color: red">No Renewal</p> @endif</td>
			                <td>{{$offer->amount}}</td>
			                <td>{{$offer->month_count}}</td>
			                <td>@if($offer->status == 1) <a href="{{route('getActiveOffer', $offer->id)}}" class="btn btn-xs btn-info" ><i class="fa fa-check"></i> Active</a> @else <a href="{{route('getUnactiveOffer', $offer->id)}}" class="btn btn-xs btn-danger" ><i class="fa fa-close"></i> Un Active</a> @endif</td>
			                <td>
			                  <button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#modal-edit{{$offer->id}}"><i class="fa fa-edit"></i> Edit</button>
			                  <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modal-delete{{$offer->id}}"><i class="fa fa-remove"></i> Delete</button>
			                </td>
		              	</tr>

		              	<!-- Modal Edit -->
						    <div class="modal fade" id="modal-edit{{$offer->id}}">
						      <div class="modal-dialog">
						        <div class="modal-content">
						          <div class="modal-header">
						            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						              <span aria-hidden="true">&times;</span></button>
						            <h4 class="modal-title"><i class="fa fa-edit"></i> Edit</h4>
						          </div>
						            <form method="POST" action="{{route('offer.edit', $offer->id)}}"  enctype="multipart/form-data">
							          <div class="modal-body">
							              {{csrf_field()}}
								            <div class="form-group">
								                <div class="row">
								                  <div class="col-md-2">
								                    <label for="exampleInputEmail1">Name: <span style="color:red">*</span> </label>
								                  </div>
								                  <div class="col-md-10">
								                    <textarea class="form-control" name="upname" id="upname">{{$offer->name}}</textarea>
								                  </div>
									            </div>
							              	</div>
							              	<div class="form-group">
								                <div class="row">
								                  <div class="col-md-2">
								                    <label for="exampleInputEmail1">Amount: <span style="color:red">*</span>  </label>
								                  </div>
								                  <div class="col-md-10">
								                    <input type="number" class="form-control" name="upamount" id="upamount" value="{{$offer->amount}}" required="">
								                  </div>
								                </div>
							              	</div>
							              	<div class="form-group">
								                <div class="row">
								                  <div class="col-md-2">
								                    <label for="exampleInputEmail1">Month Count: <span style="color:red">*</span> </label>
								                  </div>
								                  <div class="col-md-10">
								                    <input type="text" class="form-control" name="upmonth_count" id="upmonth_count" value="{{$offer->interval}}" required="">
								                  </div>
								                </div>
							              	</div>
							              	<div class="form-group">
								                <div class="row">
								                  <div class="col-md-2">
								                    <label for="exampleInputEmail1">Type: <span style="color:red">*</span> </label>
								                  </div>
								                  <div class="col-md-10">
								                  	<select class="form-control" name="uptype" id="uptype">
								                  		<option>{{$offer->type}}</option>
								                  		<option value="Renewal">Renewal</option>
								                  		<option value="No renewal">No renewal</option>
								                  	</select>
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
							<div class="modal fade" id="modal-delete{{$offer->id}}">
								<div class="modal-dialog">
								  <div class="modal-content">
								    <div class="modal-header">
								      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								        <span aria-hidden="true">&times;</span></button>
								      <h4 class="modal-title"><i class="fa fa-trash"></i> Delete</h4>
								    </div>
								    <form method="POST" action="{{route('offer.delete', $offer->id)}}">
								    	<div class="modal-body">
								          {{csrf_field()}}
								          	<div class="form-group">
									            <div class="row">
									              	<div class="col-md-2">
									                	<label for="exampleInputEmail1">Name: </label>
									              	</div>
									              	<div class="col-md-4">
									              		<p>{{$offer->name}}</p>
									              	</div>
									              	<div class="col-md-2">
									                	<label for="exampleInputEmail1">Amount: </label>
									              	</div>
									              	<div class="col-md-4">
									              		<p>{{$offer->amount}}</p>
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
            <form method="POST" action="{{route('offer.store')}}" enctype="multipart/form-data">
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
	              	<div class="form-group">
		                <div class="row">
		                  <div class="col-md-2">
		                    <label for="exampleInputEmail1">Amount: <span style="color:red">*</span> </label>
		                  </div>
		                  <div class="col-md-10">
		                    <input type="number" class="form-control" name="amount" id="amount" placeholder="Enter Amount"  required="">
		                  </div>
		                </div>
	              	</div>
	              	<div class="form-group">
		                <div class="row">
		                  <div class="col-md-2">
		                    <label for="exampleInputEmail1">Monyh Count: <span style="color:red">*</span> </label>
		                  </div>
		                  <div class="col-md-10">
		                    <input type="text" class="form-control" name="mobyh_count" id="mobyh_count" placeholder="Enter Month Count"  required="">
		                  </div>
		                </div>
	              	</div>
	              	<div class="form-group">
		                <div class="row">
		                  <div class="col-md-2">
		                    <label for="exampleInputEmail1">Type: <span style="color:red">*</span> </label>
		                  </div>
		                  <div class="col-md-10">
		                  	<select class="form-control" name="type" id="type" required="">
		                  		<option value="Renewal">Renewal</option>
		                  		<option value="No renewal">No Renewal</option>
		                  	</select>
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
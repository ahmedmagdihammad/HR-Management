@extends('layout.master')
@section('title')
  All Commission
@endsection
@section('breadcrumb')
	<i class="fa fa-money"></i> All Commission
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
          <h3 class="box-title">All Commission List</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          @if(count($customers)>0)
          	<table id="example1" class="table table-bordered table-hover">
	            <thead>
	            <tr>
	              <th>id</th>
	              <th>Customer Name</th>
	              <th>Mobile</th>
                <th>Commission</th>
	              <th>DOB</th>
	            </tr>
	            </thead>
	            <tbody>
	            @foreach($customers as $customer)
	            @if($customer->commission_id)
	              <tr>
	                <td>{{$customer->getReference['id']}}</td>
	                <td>{{$customer->getReference['name_en']}}</td>
                  <td>{{$customer->getReference['mobile_1']}}</td>
	                <td>{{$customer->getCommission['commission']}}</td>
	                <td>{{$customer->date_birth}}</td>
	              </tr>
	            @endif
	            @endforeach
	            </tbody>
          	</table>
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
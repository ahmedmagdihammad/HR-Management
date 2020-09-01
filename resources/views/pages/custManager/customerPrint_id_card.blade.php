@extends('layout.master')
@section('title')
	ID Card
@endsection
@section('breadcrumb')
	<a href="{{route('customer')}}"><i class="fa fa-users"></i> Customer</a> 
	<li> <i class="fa fa-id-card"></i> Print ID Card</li>
@endsection
@section('namepage')
<div class="text-center">
  <a href="#" class="btn btn-primary" onClick="window.print()"><i class='fa fa-print'> </i>  Print ID Card</a>
</div>
@endsection
@section('content')
	<div class="panel panel-default">
	  <div class="panel-body">
	  	<div class="row">
	  		<div class="col-md-8" style="margin-left: 20px;">
	  			<div class="row">
		  			<label>Name : </label>
		  			<span>{{$customer->name_en}}</span>
	  			</div>
	  			<br>
	  			<div class="row">
	  				<label>n_passport_id : </label>
		  			<span>{{$customer->n_passport_id}}</span>
	  			</div>
	  			<br>
	  			<div class="row">
	  				<label>job : </label>
		  			<span>{{$customer->job}}</span>
	  			</div>
	  			<br>
	  			<div class="row">
	  				<label>gender : </label>
		  			<span>{{$customer->gender}}</span>
	  			</div>
	  		</div>
	  		<div class="col-md-3" style="margin-left: 70px">
	  			<img src="{{asset($customer->picture)}}" alt="not img" style="width: 130px; height: 130px">
	  		</div>
	  	</div>
	  </div>
	  <!-- <div class="panel-footer">Panel footer</div> -->
	</div>
@endsection
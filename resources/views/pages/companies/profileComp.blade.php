@extends('layout.master')
@section('title')
  Profile
@endsection
@section('breadcrumb')
	<a href="{{route('company')}}"><i class="fa fa-industry"></i>Companies</a>
	<li><i class="fa fa-eye"></i> Profile</li>
@endsection
@section('namepage')
  Profile
@endsection
@section('content')
    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
	        <div class="box box-primary">
	            <div class="box-body box-profile">
	              <img class="profile-user-img img-responsive img-circle" src="{{asset('dist/img/user1-128x128.jpg')}}" alt="User profile picture">

	              <h3 class="profile-username text-center">{{$employees->name}}</h3>


	              <ul class="list-group list-group-unbordered">
	                <li class="list-group-item">
	                  <b>Payment</b> <a class="pull-right">-</a>
	                </li>
	                <li class="list-group-item">
	                  <b>Commission</b> <a class="pull-right">-</a>
	                </li>
	              </ul>

	              <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
	            </div>
	            <!-- /.box-body -->
	        </div>
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Basic Info</a></li>
              <!-- <li><a href="#payment" data-toggle="tab">Payment</a></li> -->
            </ul>
            <div class="tab-content">

            	<div class="active tab-pane" id="activity">
	                <form class="form-horizontal" method="POST" action="{{route('company.edit', $employees->id)}}">
	                  {{csrf_field()}}
	                  	<div class="form-group">
		                    <label for="inputName" class="col-sm-2 control-label">Company Name</label>

		                    <div class="col-sm-10">
		                      <input type="text" class="form-control" id="upcompany_name" name="upcompany_name" value="{{$employees->company_name}}" placeholder="Name">
		                    </div>
	                  	</div>
	                  	<div class="form-group">
		                    <label  class="col-sm-2 control-label">Uaser Name</label>

		                    <div class="col-sm-10">
		                      <input type="text" class="form-control" name="upuser_name" value="{{$employees->name}}" placeholder="Enter User Name">
		                    </div>
	                  	</div>
	                  	<div class="form-group">
		                    <label  class="col-sm-2 control-label">Mobile</label>

		                    <div class="col-sm-10">
		                      <input type="number" class="form-control" name="upmobile" value="{{$employees->mobile_1}}" placeholder="Enter Mobile">
		                    </div>
	                  	</div>
	                  
	                  <div class="form-group">
	                    <div class="col-sm-offset-2 col-sm-10">
	                      <button type="submit" class="btn btn-danger">Edit</button>
	                    </div>
	                  </div>
	                </form>
	            </div>

		        <div class=" tab-pane" id="payment">
		            <!-- <section class="content">
					      <div class="row">
					        <div class="col-xs-12">
					          <div class="box box-info">
					            <div class="box-header">
					              <button type="button" class="btn btn-xs btn-info pull-right" data-toggle="modal" data-target="#modal-add"><i class="fa  fa-plus"></i> Add Branch</button>
					              <h3 class="box-title">branch List</h3>
					            </div> -->
					            <!-- /.box-header -->
				            	<div class="row">
				            		<div class="col-md-3">
				            			<input type="number" class="form-control" name="">
				            		</div>
				            	</div>
					            <div class="box-body">
					              	<table  id="" class="table table-bordered table-hover">
						                <thead>
							                <tr>
												<th>Customer Name</th>
							                  	<th>Mobile 1</th>
							                  	<!-- <th>Option</th> -->
							                </tr>
						                </thead>
						                <tbody>
											<tr>
												<td>Ahemd</td>
												<td>01141730359</td>
												<!-- <td>
													<button type="button" class="form-control btn btn-xs btn-info"> Add Service</button>
												</td> -->
						                	</tr>
						                </tbody>
					              	</table>
					            </div>
					            <!-- /.box-body -->
					          <!-- </div>
					        </div>
					      </div>
					    </section> -->

	              <!-- /.tab-pane -->
	            </div>
            <!-- /.tab-content -->
          	</div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>


@endsection
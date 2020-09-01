@extends('layout.master')
@section('title')
  Profile
@endsection
@section('breadcrumb')
	<a href="{{route('employee')}}"><i class="fa fa-user-plus"></i> Employee</a>
	<li><i class="fa fa-eye"></i> Profile</li>
@endsection
@section('namepage')
  HR Department
@endsection
@section('content')
    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
	        <div class="box box-primary">
	            <div class="box-body box-profile">
	              <img class="profile-user-img img-responsive img-circle" src="{{asset('img/2.png')}}" alt="User profile picture">

	              <h3 class="profile-username text-center">{{$employee->name}}</h3>


	              <ul class="list-group list-group-unbordered">
	                <li class="list-group-item">
						<b>Payroll</b> <a class="pull-right">{{$employee->salary + $allBonus->sum('amount') - $alldeduction->sum('amount')}}</a>
	                </li>
	                {{-- <li class="list-group-item">
	                  <b>Commission</b> <a class="pull-right">-</a>
	                </li> --}}
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
              <li><a href="#payroll" data-toggle="tab">Payroll</a></li>
              <li><a href="#document" data-toggle="tab">Document</a></li>
            </ul>
            <div class="tab-content">

				<div class="active tab-pane" id="activity">
					<form class="form-horizontal" method="POST" action="{{route('employee.profile.edit', $employee->id)}}">
						{{csrf_field()}}
						<div class="form-group">
							<label for="inputName" class="col-sm-2 control-label">Name</label>

							<div class="col-sm-10">
							<input type="diabled" disabled class="form-control" id="name" name="name" value="{{$employee->name}}" placeholder="Name">
							</div>
						</div>
						<div class="form-group">
							<label  class="col-sm-2 control-label">Mobile 1</label>

							<div class="col-sm-10">
							<input type="diabled" disabled class="form-control" name="mobile_1" value="{{$employee->mobile_1}}" placeholder="Mobile 1">
							</div>
						</div>
						<div class="form-group">
							<label  class="col-sm-2 control-label">Mobile 2</label>

							<div class="col-sm-10">
							<input type="diabled" disabled class="form-control" name="mobile_1" value="{{$employee->mobile_2}}" placeholder="Mobile 2">
							</div>
						</div>
						<div class="form-group">
							<label for="inputName" class="col-sm-2 control-label">Email</label>

							<div class="col-sm-10">
							<input type="diabled" disabled class="form-control" name="email" value="{{$employee->email}}" placeholder="email">
							</div>
						</div>
						<div class="form-group">
							<label for="inputName" class="col-sm-2 control-label">Address</label>

							<div class="col-sm-10">
							<input type="diabled" disabled class="form-control" name="address" value="{{$employee->address}}" placeholder="Address">
							</div>
						</div>
						<div class="form-group">
							<label for="inputExperience" class="col-sm-2 control-label">NID / Passprot ID</label>

							<div class="col-sm-10">
							<input class="form-control" type="diabled" disabled name="n_passport_id" value="{{$employee->n_passport_id}}" placeholder="NID / Passprot ID">
							</div>
						</div>
						<div class="form-group">
							<label for="inputExperience" class="col-sm-2 control-label">Job</label>

							<div class="col-sm-10">
							<input class="form-control" type="diabled" disabled name="job" value="{{$employee->getJob['name']}}" placeholder="Job">
							</div>
						</div>
						<div class="form-group">
							<label for="inputSkills" class="col-sm-2 control-label">Salary</label>

							<div class="col-sm-10">
							<input class="form-control" type="diabled" disabled name="salary" value="{{$employee->salary}}">
							</div>
						</div>
						<div class="form-group">
							<label for="inputSkills" class="col-sm-2 control-label">Hiring Date</label>

							<div class="col-sm-10">
							<input class="form-control" type="diabled" disabled name="hiring_Date" value="{{$employee->hiring_Date}}">
							</div>
						</div>
						<div class="form-group">
							<label for="inputSkills" class="col-sm-2 control-label">Branch</label>

							<div class="col-sm-10">
							<input type="diabled" disabled class="form-control" name="notes" value="{{$employee->getBranch['name']}}" required="">
							</div>
						</div>
						
						<div class="form-group">
							<label for="inputSkills" class="col-sm-2 control-label">Password</label>

							<div class="col-sm-10">
							<input class="form-control" name="password" placeholder="Enter Password" required="">
							</div>
						</div>
						
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-danger">Update</button>
							</div>
						</div>
						</form>
				</div>

				<div class=" tab-pane" id="payroll">
					<div class="box-body">
						<div class="row">
							<div class="col-12">
								<table id="" class="table table-bordered table-hover table-striped table-responsive">
									<thead>
										<tr>
											<th>Name</th>
											<th>Mobile </th>
											<th>Email</th>
											<th>Address</th>
											<th>NID / Passport Id</th>
											<th>Job</th>
											<th>Salary</th>
											<th>Hiring Date</th>
										</tr>
										
									</thead>
									<tbody>
										<tr>
										<td>{{$employee->name}}</td>
										<td><div class="badge btn-success"> {{$employee->mobile_1}}</div><br> {{$employee->mobile_2}}</td>
										<td>{{$employee->email}}</td>
										<td>{{$employee->address}}</td>
										<td>{{$employee->n_passport_id}}</td>
										<td>{{$employee->job}}</td>
										<td>{{$employee->salary}}</td>
										<td>{{$employee->hiring_Date}}</td>
										</tr>
										
									</tbody>
								</table>

							</div>
							<div class="col-12">
								<table id="" class="table table-bordered table-hover table-striped table-responsive">
									<thead>
										<tr>
											<th>Job </th>
											<th>Branch</th>
											<th>Basic salary</th>
											<th>Bonus</th>
											<th>Deduction</th>
											<th>Total Global</th>
										</tr>
										
									</thead>
									<tbody>
										<tr>
										<td>{{$employee->getJob['name']}}</td>
										<td>{{$employee->getBranch['name']}}</td>
										<td>{{$employee->salary}}</td>
										<td>{{$allBonus->sum('amount')}}</td>
										<td>{{$alldeduction->sum('amount')}}</td>
										<td>{{$employee->salary + $allBonus->sum('amount') - $alldeduction->sum('amount')}} </td>
										</tr>
										
									</tbody>
								</table>

							</div>
						</div>
					</div>
				</div>

	            <div class=" tab-pane" id="document">
	                <!-- Post -->
	                <div class="box-body">
						<table id="" class="table table-bordered table-hover">
						  <thead>
						  <tr>
							<th>image</th>
							<th>Description</th>
						  </tr>
						  </thead>
						  <tbody>
							@foreach ($documentes as $document)
							<tr>
								<td><img src="{{asset($document->image)}}" alt="Not Photo" style="width:100px; hight:100px;"></td>
								<td>{{$document->description}}</td>
							</tr>
							@endforeach
						  </tbody>
						</table>
					  </div>				
	            </div>
	              <!-- /.tab-pane -->

	            
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
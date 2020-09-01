@extends('layout.master')
@section('title')
	Profile
@endsection
@section('breadcrumb')
	<i class="fa fa-eye"></i> Profile
@endsection
@section('content')
	    <meta name="csrf-token" content="{{ csrf_token() }}" />

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
          <!-- /.box -->
	    </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active" ><a href="#activity" data-toggle="tab">Basics info</a></li>
              <li><a href="#payroll" data-toggle="tab">Payroll</a></li>
              <li><a href="#document" data-toggle="tab">Document</a></li>
              {{-- <li><a href="#vacations" data-toggle="tab">Vacations & Leaves</a></li> --}}
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                  <!-- Post -->
                <form class="form-horizontal" action="{{route('profile.user.edit', Auth::user()->id)}}">
                      {{ csrf_field() }}

                      <div class="form-group">
                        <div class="box-header with-border">
                          <h3 class="col-sm-3 control-label box-title">Contact Info</h3>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label ">Name</label>

                        <div class="col-sm-10">
                        <input type="disable" disabled class=" disabled disabled form-control" name="disply" id="name" value="{{$employee->name}}" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Mobile 1</label>

                        <div class="col-sm-10">
                        <input type="disable" disabled class=" disabled disabled form-control" name="mobile_1" id="mobile_1" value="{{$employee->mobile_1}}" placeholder="Mobile 1">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Mobile 2</label>

                        <div class="col-sm-10">
                        <input type="disable" disabled class=" disabled disabled form-control" name="mobile_2" id="mobile_2" value="{{$employee->mobile_2}}" placeholder="Mobile 2">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Email</label>

                        <div class="col-sm-10">
                        <input type="disable" disabled class=" disabled disabled form-control" name="email" id="email" value="{{$employee->email}}" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Address</label>

                        <div class="col-sm-10">
                        <input type="disable" disabled class=" disabled disabled form-control" name="address" id="address" value="{{$employee->address}}" placeholder="Address">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">NID Passport Id</label>

                        <div class="col-sm-10">
                        <input type="disable" disabled class=" disabled disabled form-control" name="n_passport_id" id="n_passport_id" value="{{$employee->n_passport_id}}" placeholder="NID Passport Id">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Job</label>

                        <div class="col-sm-10">
                        <input type="disable" disabled class=" disabled disabled form-control" name="job" id="job" value="{{$employee->getJob['id']}}" placeholder="Job">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Salary</label>

                        <div class="col-sm-10">
                        <input type="disable" disabled class=" disabled disabled form-control" name="salary" id="salary" value="{{$employee->salary}}" placeholder="Salary">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Hiring Date</label>

                        <div class="col-sm-10">
                        <input type="disable" disabled class=" disabled disabled form-control" name="hiring_Date" id="hiring_Date" value="{{$employee->hiring_Date}}" placeholder="Hiring Date">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Branch</label>

                        <div class="col-sm-10">
                        <input type="disable" disabled class=" disabled form-control" name="barnch_id" id="barnch_id" value="{{$employee->getBranch['id']}}" placeholder="Branch">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Password</label>

                        <div class="col-sm-10">
                        <input type="text" class="form-control" name="password" id="password" placeholder="Enter Password">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-danger" id="save-contact"> Update</button>
                        </div>
                      </div>
                    </form>
                    <!-- /.post -->
              </div>
              <!-- /.tab-payroll -->
              <div class=" tab-pane" id="payroll">
                <div class="box-body">
                  <div class="row">
                    <div class="col-12">
                      <table id="" class="table table-bordered table-hover table-striped table-responsive">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Month</th>
                            <th>Bacic Salary </th>
                            <th>Bonus</th>
                            <th>Deduction</th>
                            <th>Net</th>
                            <th>Option</th>
                          </tr>
                          
                        </thead>
                        <tbody>
                          <tr>
                            <td>{{$i}}</td>
                            <td>9</td>
                            <td>100</td>
                            <td><a href="{{url('profile/bonus')}}">20</a></td>
                            <td><a href="{{url('profile/deduction')}}">50</a></td>
                            <td>70</td>
                            <td><button class="btn btn-xs btn-primary">Rest</button></td>
                          </tr>
                          
                        </tbody>
                      </table>
      
                    </div>
                    {{-- <div class="col-12">
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
      
                    </div> --}}
                  </div>
                </div>
              </div>
              <!-- /.tab-document -->
              <div class=" tab-pane" id="document">
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
              <!-- /.nav-tabs-custom -->
            </div>
          <!-- /.col -->
          </div>
      <!-- /.row -->
        </div>
    </section>

<!-- Code Ajax  -->
	
@endsection
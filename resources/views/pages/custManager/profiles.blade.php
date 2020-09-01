@extends('layout.master')
@section('title')
  Profile
@endsection
@section('breadcrumb')
	<a href="{{route('customer')}}"><i class="fa fa-users"></i> Customer</a>
	<li><i class="fa fa-eye"></i> Profile</li>
@endsection
@section('namepage')
  Customers Manager
@endsection
@section('content')
    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
	        <div class="box box-primary">
	            <div class="box-body box-profile">
	              <img class="profile-user-img img-responsive img-circle" src="{{asset($customers->picture)}}" alt="User profile picture">

	              <h3 class="profile-username text-center">{{$customers->name_en}}</h3>


	              <ul class="list-group list-group-unbordered">
	                <li class="list-group-item">
	                  <b>Payment</b> <a class="pull-right">@if($customers->getPayment->sum('payment') == '') 0 @else {{$customers->getPayment->sum('payment')}} @endif</a>
	                </li>
	                <li class="list-group-item">
	                  <b>Commission</b> <a class="pull-right">@if($customers->getCommission == NULL) 0 @else {{$customers->getCommission->sum('commission')}} @endif</a>
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
              <li><a href="#payment" data-toggle="tab">Payment</a></li>
              <li><a href="#commission" data-toggle="tab">Commission</a></li>
              <li><a href="#document" data-toggle="tab">Document</a></li>
              <li><a href="#notes" data-toggle="tab">Notes</a></li>
              <li><a href="#service" data-toggle="tab">Service</a></li>
            </ul>
            <div class="tab-content">

            	<div class="active tab-pane" id="activity">
	                <form class="form-horizontal" method="POST" action="{{route('profile.edit', $customers->id)}}">
	                  {{csrf_field()}}
	                  <div class="form-group">
	                    <label for="inputName" class="col-sm-2 control-label">Name English</label>

	                    <div class="col-sm-10">
	                      <input type="text" class="form-control" id="name_en" name="name_en" value="{{$customers->name_en}}" placeholder="Name">
	                    </div>
					  </div>
					  <div class="form-group">
	                    <label for="inputName" class="col-sm-2 control-label">Name Arabic</label>

	                    <div class="col-sm-10">
	                      <input type="text" class="form-control" id="name_ar" name="name_ar" value="{{$customers->name_ar}}" placeholder="Name">
	                    </div>
	                  </div>
	                  <div class="form-group">
	                    <label  class="col-sm-2 control-label">Mobile 1</label>

	                    <div class="col-sm-10">
	                      <input type="number" class="form-control" name="mobile_1" value="{{$customers->mobile_1}}" placeholder="Mobile 1">
	                    </div>
	                  </div>
	                  <div class="form-group">
	                    <label  class="col-sm-2 control-label">Mobile 2</label>

	                    <div class="col-sm-10">
	                      <input type="number" class="form-control" name="mobile_2" value="{{$customers->mobile_2}}" placeholder="Mobile 2">
	                    </div>
	                  </div>
	                  <div class="form-group">
	                    <label for="inputName" class="col-sm-2 control-label">Address</label>

	                    <div class="col-sm-10">
	                      <input type="text" class="form-control" name="address" value="{{$customers->address}}" placeholder="Address">
	                    </div>
	                  </div>
	                  <div class="form-group">
	                    <label for="inputExperience" class="col-sm-2 control-label">NID / Passprot ID</label>

	                    <div class="col-sm-10">
	                      <input class="form-control" type="number" name="n_passport_id" value="{{$customers->n_passport_id}}" placeholder="NID / Passprot ID">
	                    </div>
	                  </div>
	                  <div class="form-group">
	                    <label for="inputExperience" class="col-sm-2 control-label">Email</label>

	                    <div class="col-sm-10">
	                      <input class="form-control" type="email" name="email" value="{{$customers->email}}" placeholder="Email">
	                    </div>
	                  </div>
	                  <div class="form-group">
	                    <label for="inputSkills" class="col-sm-2 control-label">Gender</label>

	                    <div class="col-sm-10">
	                      <select class="form-control" name="gender" required="">
	                      	<option selected="">{{$customers->gender}}</option>
	                      	<option value="male">male</option>
	                      	<option value="female">female</option>
	                      </select>
	                    </div>
	                  </div>
	                  <div class="form-group">
	                    <label for="inputSkills" class="col-sm-2 control-label">Job</label>

	                    <div class="col-sm-10">
	                      <input class="form-control" type="text" name="job" value="{{$customers->job}}">
	                    </div>
	                  </div>
	                  <div class="form-group">
	                    <label for="inputSkills" class="col-sm-2 control-label">Date Of Birth</label>

	                    <div class="col-sm-10">
	                      <input class="form-control" type="date" name="date_birth" value="{{$customers->date_birth}}">
	                    </div>
	                  </div>
	                  <div class="form-group">
	                    <label for="inputSkills" class="col-sm-2 control-label">Nationality</label>

	                    <div class="col-sm-10">
	                      <input class="form-control" type="text" name="nationality" value="{{$customers->nationality}}">
	                    </div>
	                  </div>
	                  <div class="form-group">
	                    <label for="inputSkills" class="col-sm-2 control-label">Notes</label>

	                    <div class="col-sm-10">
	                      <textarea class="form-control" name="notes" required="">{{$customers->notes}}</textarea>
	                    </div>
					  </div>
					  <div class="form-group">
	                    <label for="inputSkills" class="col-sm-2 control-label">Reference</label>

	                    <div class="col-sm-10">
	                      <select class="form-control" name="reference">
							  @if ($customers->reference == '')
							  <option value="">- Selected Reference -</option>
							  @else 
								<option value="{{$customers->getReference['id']}}">{{$customers->getReference['name_en']}}</option>
								<option value="">- Not Reference -</option>
							  @endif  
							@foreach($allCustomers as $allcustomer)
	                      	<option value="{{$allcustomer->id}}">{{$allcustomer->name_en}}</option>
	                      	@endforeach
	                      </select>
	                    </div>
	                  </div>
		                <div class="form-group hidden">
		                    <label for="inputSkills" class="col-sm-2 control-label">Commission</label>

		                    <div class="col-sm-10">
		                      <input class="form-control" type="number" name="commission_id" value="{{$customers->commission_id}}">
		                    </div>
		                </div>
	                  <div class="form-group">
		                    <label for="inputSkills" class="col-sm-2 control-label">Picture</label>

		                    <div class="col-sm-7">
		                      <input class="form-control" type="file" name="picture" value="{{$customers->picture}}">
		                    </div>
		                    <div class="col-sm-3"></div>
		                      <img src="{{asset($customers->picture)}}" style="width: 100px; height: 80px">
		                </div>
	                  <div class="form-group">
	                    <div class="col-sm-offset-2 col-sm-10">
	                      <button type="submit" class="btn btn-danger">Edit</button>
	                    </div>
	                  </div>
	                </form>
	            </div>

	            <div class=" tab-pane" id="payment">
	                <!-- Post -->
	                
	                	@if(count($allPayment)>0)
		                <!-- <section class="content">
					      <div class="row">
					        <div class="col-xs-12">
					          <div class="box box-info">
					            <div class="box-header">
					              <button type="button" class="btn btn-xs btn-info pull-right" data-toggle="modal" data-target="#modal-add"><i class="fa  fa-plus"></i> Add Branch</button>
					              <h3 class="box-title">branch List</h3>
					            </div> -->
					            <!-- /.box-header -->
					            <div class="box-body">
					              	<table  id="example1" class="table table-bordered table-hover">
						                <thead>
							                <tr>
												<th>Image</th>
												<th>Name</th>
												<th>Offer Name</th>
												<th>Branch</th>
												<th>Amount</th>
												<th>Created by</th>
												<th>Payment Date</th>
												<th>Status</th>
							                </tr>
						                </thead>
						                <tbody>
	                						@foreach($allPayment as $payment)
											<tr>
												<td><img src="{{asset($payment->image_id)}}" class="img-circle" style="width: 100px; height: 80px; "></td>
												<td>{{$payment->getCustomer['name_en']}}</td>
												<td>{{$payment->getOffer['name']}}</td>
												<td>{{$payment->getBranch['name']}}</td>
												<td>{{$payment->getOffer['amount']}}</td>
												<td>{{$payment->getEmployee['name']}}</td>
												<td>{{$payment->created_at}}</td>
												<td>
	                  								<button type="button" class=" btn btn-xs btn-info" data-toggle="modal" data-target="#modal-add"><i class="fa fa-edit"></i> Refunds</button>
												</td>
						                	</tr>
											@endforeach
						                </tbody>
					              	</table>
					            </div>
					            <!-- /.box-body -->
					          <!-- </div>
					        </div>
					      </div>
					    </section> -->
					    @else
					    	<br>
					    	<br>
					    	<br>
					    	<center><i class="fa fa-frown-o"></i> Not Payment <i class="fa fa-frown-o"></i></center>
					    	<br>
					    	<br>
					    	<br>
					    	<br>
					    @endif
					<!-- Modal add -->
					    <div class="modal fade" id="modal-add">
					      <div class="modal-dialog">
					        <div class="modal-content">
					          <div class="modal-header">
					            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					              <span aria-hidden="true">&times;</span></button>
					            <h4 class="modal-title"><i class="fa fa-plus"></i> Add </h4>
					          </div>
						          <div class="modal-body">
						              	@foreach($refunds as $refund)
						              	@if($refund->getPayment['customer_id'] == $id)
							                <!-- <section class="content">
										      <div class="row">
										        <div class="col-xs-12">
										          <div class="box box-info">
										            <div class="box-header">
										              <button type="button" class="btn btn-xs btn-info pull-right" data-toggle="modal" data-target="#modal-add"><i class="fa  fa-plus"></i> Add Branch</button>
										              <h3 class="box-title">branch List</h3>
										            </div> -->
										            <!-- /.box-header -->
										            <div class="box-body">
										              	<table  id="example1" class="table table-bordered table-hover">
											                <thead>
												                <tr>
												                  	<th>Amount</th>
																	<th>Date</th>
																	<th>Created by</th>
												                </tr>
											                </thead>
											                <tbody>
																<tr>
																	<td>{{$refund->amount}}</td>
																	<td>{{$refund->created_at}}</td>
																	<td>{{$refund->getEmployee['name']}}</td>
											                	</tr>
											                </tbody>
										              	</table>
										            </div>
										            <!-- /.box-body -->
										          <!-- </div>
										        </div>
										      </div>
										    </section> -->
										@endif
										@endforeach
						          </div>
						          <div class="modal-footer">
						            <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
						            <!-- <button type="submit" class="btn btn-success save">Save</button> -->
						          </div>
					        </div>
					        <!-- /.modal-content -->
					      </div>
					      <!-- /.modal-dialog -->
					    </div>				
	            </div>

              <!-- /.tab-pane -->
	            <div class=" tab-pane" id="commission">

	                <!-- <section class="content">
				      <div class="row">
				        <div class="col-xs-12">
				          <div class="box box-info">
				            <div class="box-header">
				              <button type="button" class="btn btn-xs btn-info pull-right" data-toggle="modal" data-target="#modal-add"><i class="fa  fa-plus"></i> Add Branch</button>
				              <h3 class="box-title">branch List</h3>
				            </div> -->
				            <!-- /.box-header -->
				            <div class="box-body">
				              	<table  id="example1" class="table table-bordered table-hover">
					                <thead>
						                <tr>
											<th>Gender</th>
						                  	<th>Customer</th>
											<th>Mobile 1</th>
											<th>Mobile 2</th>
											<th>Address</th>
											<th>NID / Passport ID</th>
											<th>Email</th>
											<th>Job</th>
						                </tr>
					                </thead>
					                <tbody>
										<tr>
											<td>@if($customers->gender == 'male') <i class="fa fa-male"></i> @else <i class="fa fa-female"></i> @endif</td>
											<td>{{$customers->name_en}}</td>
											<td>{{$customers->mobile_1}}</td>
											<td>{{$customers->mobile_2}}</td>
											<td>{{$customers->address}}</td>
											<td>{{$customers->n_passport_id}}</td>
											<td>{{$customers->email}}</td>
											<td>{{$customers->job}}</td>
					                	</tr>
					                </tbody>
				              	</table>
				            </div>
				            <!-- /.box-body -->
				          <!-- </div>
				        </div>
				      </div>
				    </section> -->

				    <!-- <section class="content">
				      <div class="row">
				        <div class="col-xs-12">
				          <div class="box box-info">
				            <div class="box-header">
				              <button type="button" class="btn btn-xs btn-info pull-right" data-toggle="modal" data-target="#modal-add"><i class="fa  fa-plus"></i> Add Branch</button>
				              <h3 class="box-title">branch List</h3>
				            </div> -->
				            <!-- /.box-header -->
				            <div class="box-body">
				              	<table  id="example1" class="table table-bordered table-hover">
					                <thead>
						                <tr>
											<th>Date of birth</th>
						                  	<th>Picture</th>
											<th>Nationality</th>
											<th>Notes</th>
											<th>Reference</th>
											<th>Commission</th>
											<th>Status</th>
						                </tr>
					                </thead>
					                <tbody>
										<tr>
											<td>{{$customers->date_birth}}</td>
											<td><img src="{{asset($customers->picture)}}" class="img-circle" style="width: 100px; height: 80px"></td>
											<td>{{$customers->nationality}}</td>
											<td>{{$customers->notes}}</td>
											<td>@if($customers->reference == '') -- @else{{$customers->getReference['name_en']}} @endif</td>
											<td>@if($customers->commission_id == NULL) -- @else {{$customers->getCommission['commission']}} @endif</td>
											<td>@if($customers->status == 1) <p style="color: #3c8dbc"><i class="fa fa-check"></i> Active</p> @else <p style="color: red"><i class="fa fa-close"></i> Un Active</p> @endif</td>
					                	</tr>
					                </tbody>
				              	</table>
				            </div>
				            <!-- /.box-body -->
				          <!-- </div>
				        </div>
				      </div>
				    </section> -->
	            </div>
	              <!-- /.tab-pane -->

	            <div class=" tab-pane" id="document">
	                <!-- The timeline -->
	                @if(count($allDocuments)>0)
	                <!-- <section class="content">
				      <div class="row">
				        <div class="col-xs-12">
				          <div class="box box-info">
				            <div class="box-header">
				              <button type="button" class="btn btn-xs btn-info pull-right" data-toggle="modal" data-target="#modal-add"><i class="fa  fa-plus"></i> Add Branch</button>
				              <h3 class="box-title">branch List</h3>
				            </div> -->
				            <!-- /.box-header -->
				            <div class="box-body">
				              	<table  id="example1" class="table table-bordered table-hover">
					                <thead>
						                <tr>
											<th>Image</th>
											<th>Customer</th>
											<th>Description</th>
						                </tr>
					                </thead>
					                <tbody>
										@foreach($allDocuments as $documnet)
										<tr>
											<td><img src="{{asset($documnet->image)}}" class="img-circle" style="width: 100px; height: 80px"></td>
											<td>{{$documnet->getCustomer['name_en']}}</td>
											<td>{{$documnet->description}}</td>
					                	</tr>
										@endforeach
					                </tbody>
				              	</table>
				            </div>
				            <!-- /.box-body -->
				          <!-- </div>
				        </div>
				      </div>
				    </section> -->
				    @else
				    <br>
				    <br>
				    <br>
				    <center><i class="fa fa-frown-o"></i> Not Document <i class="fa fa-frown-o"></i></center>
				    <br>
				    <br>
				    <br>
				    <br>
				    @endif
	            </div>

	            <div class=" tab-pane" id="notes">
	                <!-- The timeline -->
	                <!-- <section class="content">
				      <div class="row">
				        <div class="col-xs-12">
				          <div class="box box-info">
				            <div class="box-header">
				              <button type="button" class="btn btn-xs btn-info pull-right" data-toggle="modal" data-target="#modal-add"><i class="fa  fa-plus"></i> Add Branch</button>
				              <h3 class="box-title">branch List</h3>
				            </div> -->
				            <!-- /.box-header -->
				            <div class="box-body">
				              	<table  id="example1" class="table table-bordered table-hover">
					                <thead>
						                <tr>
											<th>Notes</th>
						                </tr>
					                </thead>
					                <tbody>
										<tr>
											<td>{{$customers->notes}}</td>
					                	</tr>
					                </tbody>
				              	</table>
				            </div>
				            <!-- /.box-body -->
				          <!-- </div>
				        </div>
				      </div>
				    </section> -->
	            </div>

	            <div class=" tab-pane" id="service">
	                <!-- The timeline -->
	                @if(count($services)>0)
	                <!-- <section class="content">
				      <div class="row">
				        <div class="col-xs-12">
				          <div class="box box-info">
				            <div class="box-header">
				              <button type="button" class="btn btn-xs btn-info pull-right" data-toggle="modal" data-target="#modal-add"><i class="fa  fa-plus"></i> Add Branch</button>
				              <h3 class="box-title">branch List</h3>
				            </div> -->
				            <!-- /.box-header -->
				            <div class="box-body">
				              	<table  id="example1" class="table table-bordered table-hover">
					                <thead>
						                <tr>
											<th>Name Company</th>
											<th>Description</th>
											<th>Amount</th>
						                </tr>
					                </thead>
					                <tbody>
					                	@foreach($services as $service)
										<tr>
											<td>{{$service->getEmployee['company_name']}}</td>
											<td>{{$service->desc}}</td>
											<td>{{$service->amount}}</td>
					                	</tr>
					                	@endforeach
					                </tbody>
				              	</table>
				            </div>
				            <!-- /.box-body -->
				          <!-- </div>
				        </div>
				      </div>
				    </section> -->
				    @else 
				    	<br>
				    	<br>
				    	<br>
				    	<center><i class="fa fa-frown-o"></i> Not Service <i class="fa fa-frown-o"></i></center>
				    	<br>
				    	<br>
				    	<br>
				    	<br>

				    @endif
	            </div>
	            
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
@extends('layout.master')
@section('title')
  Lead 
@endsection
@section('breadcrumb')
    <i class="fa fa-phone"></i>  Lead
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
          <button type="button" class="btn btn-xs btn-info pull-right" data-toggle="modal" data-target="#modal-add"><i class="fa  fa-plus"></i> Add Lead</button>
          <h3 class="box-title">Call Center List </h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          @if(count($leads)>0)
          	<table id="" class="table table-bordered table-hover">
	            <thead>
	            <tr>
	              <th>Gender</th>
	              <th>Name English</th>
	              <th>Name Arbic</th>
	              <th>Mobile 1</th>
				  <th>Source</th>
				  <th>status</th>
				  <th>Options</th>
	            </tr>
	            </thead>
	            <tbody>
	            @foreach($leads as $lead)
	              <tr>
	                <td>@if ($lead->gender == 'male') <i class="fa fa-male"></i> @else <i class="fa fa-female"></i> @endif</td>
	                <td>{{$lead->name_en}}</td>
	                <td>{{$lead->name_ar}}</td>
	                <td>{{$lead->mobile_1}}</td>
	                <td>@if ($lead->social_media == '- Select how did you know about us? -')  -- @else {{$lead->social_media}} @endif </td>
					<th>@if ($lead->status == '0') <p style="color:red;">Lead</p> @else <p style="color: green;">Register</p> @endif</th>
					<td>
	                  <button type="button" class="edit-leadment btn btn-xs btn-warning" data-toggle="modal" data-target="#modal-edit{{$lead->id}}"><i class="fa fa-edit"></i> Edit</button>
	                  <button type="button" class="delete-leadment btn btn-xs btn-danger" data-toggle="modal" data-target="#modal-delete{{$lead->id}}"><i class="fa fa-remove"></i> Delete</button>
	                  <button type="button" class="delete-leadment btn btn-xs btn-info" data-toggle="modal" data-target="#modal-paymnet{{$lead->id}}"><i class="fa fa-money"></i> Payment</button>
                      <a href="{{url('/lead/call_center', $lead->id)}}" class="btn btn-xs btn-warning"><i class="fa fa-phone"></i> Call Center</a>
	                </td>
	              </tr>

	            <!-- Modal edit -->
				    <div class="modal fade" id="modal-edit{{$lead->id}}">
				      <div class="modal-dialog">
				        <div class="modal-content">
				          <div class="modal-header">
				            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				              <span aria-hidden="true">&times;</span></button>
				            <h4 class="modal-title"><i class="fa fa-edit"></i> Edit </h4>
				          </div>
				            <form method="POST" action="{{route('lead.update', $lead->id)}}" enctype="multipart/form-data">
					          <div class="modal-body">
                                    {{method_field('PATCH')}}
                                    {{csrf_field()}}
									<div class="form-group">
										<div class="row">
										  <div class="col-md-2">
											<label for="exampleInputEmail1">Name English <span style="color:red;">*</span> </label>
										  </div>
										  <div class="col-md-4">
											<input type="text" class="form-control" name="upname_en" id="upname_en" value="{{$lead->name_en}}" required="">
										  </div>

										  <div class="col-md-2">
											<label for="exampleInputEmail1">Name Arabic <span style="color:red;">*</span> </label>
										  </div>
										  <div class="col-md-4">
											<input type="text" class="form-control" name="upname_ar" id="upname_ar" value="{{$lead->name_ar}}" required="">
										  </div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
										  <div class="col-md-2">
											<label for="exampleInputEmail1">Mobile 1 <span style="color:red;">*</span> </label>
										  </div>
										  <div class="col-md-4">
											<input type="text" class="form-control" name="upmobile_1" id="upmobile_1" value="{{$lead->mobile_1}}" required="">
										  </div>

										  <div class="col-md-2">
											<label for="exampleInputEmail1">Mobile 2  </label>
										  </div>
										  <div class="col-md-4">
											<input type="text" class="form-control" name="upmobile_2" id="upmobile_2" value="{{$lead->mobile_2}}" required="">
										  </div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">

										  <div class="col-md-2">
											<label for="exampleInputEmail1">Address  </label>
										  </div>
										  <div class="col-md-4">
											<input type="text" class="form-control" name="upaddress" id="upaddress" value="{{$lead->address}}" required="">
										  </div>

										  <div class="col-md-2">
											<label for="exampleInputEmail1">NID / Passport ID  </label>
										  </div>
										  <div class="col-md-4">
											<input type="number" class="form-control" name="upn_passport_id" id="upn_passport_id" value="{{$lead->n_passport_id}}" required="">
										  </div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
										  <div class="col-md-2">
											<label for="exampleInputEmail1">Gender <span style="color:red;">*</span> </label>
										  </div>
										  <div class="col-md-4">
											<select class="form-control" name="upgender" id="upgender" required="">
												<option selected="">{{$lead->gender}}</option>
												<option>male</option>
												<option>female</option>
											</select>
										  </div>

										  <div class="col-md-2">
											<label for="exampleInputEmail1">Job </label>
										  </div>
										  <div class="col-md-4">
											<input type="text" class="form-control" name="upjob" id="upjob" value="{{$lead->job}}" required="">
										  </div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
										  <div class="col-md-2">
											<label for="exampleInputEmail1">Date of Birth </label>
										  </div>
										  <div class="col-md-4">
											<input type="date" class="form-control" name="update_birth" id="update_birth" value="{{$lead->date_birth}}" required="">
										  </div>

										  <div class="col-md-2">
											<label for="exampleInputEmail1">Nationality  </label>
										  </div>
										  <div class="col-md-4">
											<input type="text" class="form-control" name="upnationality" id="upnationality" value="{{$lead->nationality}}" required="">
										  </div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
										  <div class="col-md-2">
											<label for="exampleInputEmail1">Notes  </label>
										  </div>
										  <div class="col-md-10">
											<textarea class="form-control" name="upnotes" id="upnotes" placeholder="Enter Notes" required="">{{$lead->notes}} </textarea>
										  </div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											  <div class="col-md-2">
												<label for="exampleInputEmail1">Picture  </label>
											  </div>
											  <div class="col-md-7">
												<input class="form-control" type="file" name="uppicture" id="uppicture" value="{{asset($lead->picture)}}" >
											  </div>
											  <div class="col-md-2">
												  <img src="{{asset($lead->picture)}}" style="width: 100px; height: 80px">
											</div>
										</div>
									</div>
									<div class="form-group">
										  <div class="row">
											  <div class="col-md-2">
												<label for="exampleInputEmail1">Email   </label>
											</div>
											<div class="col-md-4">
												<input type="text" class="form-control" name="upemail" id="upemail" value="{{$lead->email}}" >
											</div>
						                    <div class="col-md-2">
						                        <label for="exampleInputEmail1">Source <span style="color:red;">*</span> </label>
						                    </div>
						                    <div class="col-md-4">
                                                <select class="form-control" name="upsocial_media" >
													@if ($lead->social_media == '- Select how did you know about us? -') <option>- Select Source -</option> @endif
                                                    <option @if ($lead->social_media == 'Facebook') selected @endif>Facebook</option>
                                                    <option @if ($lead->social_media == 'Ads') selected @endif>Ads</option>
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

				<!-- Modal delete -->
				    <div class="modal fade" id="modal-delete{{$lead->id}}">
				      <div class="modal-dialog">
				        <div class="modal-content">
				          <div class="modal-header">
				            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				              <span aria-hidden="true">&times;</span></button>
				            <h4 class="modal-title"><i class="fa fa-trash"></i> Delete </h4>
				          </div>
				            <form method="POST" action="{{route('lead.destroy', $lead->id)}}" enctype="multipart/form-data">
					          <div class="modal-body">
                                    {{method_field('DELETE')}}
					                {{csrf_field()}}
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label for="exampleInputEmail1">Name <span style="color: red">*</span> </label>
                                            </div>
                                            <div class="col-md-4">
                                                <p>{{$lead->name_en}}</p>
                                            </div>
                                            <div class="col-md-2">
                                                <label for="exampleInputEmail1">Mobile 1 <span style="color:red;">*</span> </label>
                                            </div>
                                            <div class="col-md-4">
                                                <p>{{$lead->mobile_1}}</p>
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
					
				<!-- Modal add Payment-->
					<div class="modal fade" id="modal-paymnet{{$lead->id}}">
						<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title"><i class="fa fa-plus"></i> Add Payment</h4>
							</div>
							<form method="POST" action="{{route('lead.create')}}" enctype="multipart/form-data">
								<div class="modal-body">
									{{csrf_field()}}
									@method('HEAD')
									<input class="form-control" type="hidden" name="lead_id" value="{{$lead->id}}">
									<div class="form-group">
									<div class="row">
										<div class="col-md-2">
										<label for="exampleInputEmail1">Payment </label>
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
										<label for="exampleInputEmail1">Image </label>
										</div>
										<div class="col-md-10">
											<input type="file" class="form-control" name="image_id" id="image_id" required="">
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


				
				@endforeach
	            </tbody>
          	</table>
          @else
            <br><br><br><br><br>
            <center class="text-danger"><i class="fa fa-frown-o"></i> &nbsp; Not Call Center &nbsp; <i class="fa fa-frown-o"></i></center>
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
            <form method="POST" action="{{route('lead.store')}}" enctype="multipart/form-data">
	          <div class="modal-body">
                    {{method_field('POST')}}
	              {{csrf_field()}}
	              <div class="form-group">
					<div class="row">
					  <div class="col-md-2">
						<label for="exampleInputEmail1">Name English <span style="color:red">*</span> </label>
					  </div>
					  <div class="col-md-4">
						<input type="text" class="form-control" name="name_en" id="name_en" placeholder="Enter Name"  required="">
					  </div>

					  <div class="col-md-2">
						<label for="exampleInputEmail1">Name Arabic <span style="color:red;">*</span> </label>
					  </div>
					  <div class="col-md-4">
						<input type="text" class="form-control" name="name_ar" id="name_ar" placeholder="Enter Name Arabic"  required="">
					  </div>
					</div>
				  </div>
				  <div class="form-group">
					<div class="row">
						<div class="col-md-2">
							<label for="exampleInputEmail1">Mobile 1 <span style="color:red;">*</span> </label>
						</div>
						<div class="col-md-4">
							<input type="text" class="form-control" name="mobile_1" id="mobile_1" placeholder="Enter Mobile 1"  required="">
						</div>
						<div class="col-md-2">
							<label for="exampleInputEmail1">Mobile 2  </label>
						</div>
						<div class="col-md-4">
							<input type="text" class="form-control" name="mobile_2" id="mobile_2" placeholder="Enter Mobile 2"  required="">
						</div>
					</div>
				  </div>
				  <div class="form-group">
					<div class="row">
						<div class="col-md-2">
							<label for="exampleInputEmail1">Address  </label>
						</div>
						<div class="col-md-4">
							<input type="text" class="form-control" name="address" id="address" placeholder="Enter Address"  required="">
						</div>
						<div class="col-md-2">
							<label for="exampleInputEmail1">NID / Passport ID  </label>
						</div>
						  <div class="col-md-4">
							<input type="number" class="form-control" name="n_passport_id" id="n_passport_id" placeholder="Enter NID / Passport ID" required="">
						  </div>
					</div>
				  </div>
				  <div class="form-group">
					<div class="row">
					  <div class="col-md-2">
						<label for="exampleInputEmail1">Gender <span style="color:red;">*</span> </label>
					  </div>
					  <div class="col-md-4">
						<select class="form-control" name="gender" id="gender"  required="">
							<option selected="" disabled="">- Selaect -</option>
							<option value="male">male</option>
							<option value="female">female</option>
						</select>
					  </div>
					  <div class="col-md-2">
						<label for="exampleInputEmail1">Job </label>
					  </div>
					  <div class="col-md-4">
						<input type="text" class="form-control" name="job" id="job" placeholder="Enter Job"  required="">
					  </div>
					</div>
				  </div>
				  <div class="form-group">
					<div class="row">
						  <div class="col-md-2">
							<label for="exampleInputEmail1">Date of Birth </label>
						  </div>
						  <div class="col-md-4">
							<input type="date" class="form-control" name="date_birth" id="date_birth" placeholder="Enter Date of Birth"  required="">
						</div>

						  <div class="col-md-2">
							<label for="exampleInputEmail1">Nationality  </label>
						  </div>
						  <div class="col-md-4">
							<input type="text" class="form-control" name="nationality" id="nationality" placeholder="Enter Nationality " required="">
						  </div>
					</div>
				  </div>
				  <div class="form-group">
					<div class="row">
					  <div class="col-md-2">
						<label for="exampleInputEmail1">Picture  </label>
					  </div>
					  <div class="col-md-4">
						<input class="form-control" type="file" name="picture" id="picture" required="
						">
					  </div>
						<div class="col-md-2">
							<label for="exampleInputEmail1">Email   </label>
						</div>
						<div class="col-md-4">
							<input type="email" class="form-control" name="email" id="email" placeholder="Enter Email"  required="">
						</div>
					  </div>
				  </div>
				  <div class="form-group">
	                <div class="row">
	                  <div class="col-md-2">
	                    <label for="exampleInputEmail1">Source <span style="color:red;">*</span> </label>
	                  </div>
	                  <div class="col-md-10">
                        <select class="form-control" name="social_media" required="">
                            <option selected>- Select Source -</option>
                            <option>Facebook</option>
                            <option>Ads</option>
                        </select>
	                  </div>
	                </div>
				  </div>
				  <div class="form-group">
					<div class="row">
					  <div class="col-md-2">
						<label for="exampleInputEmail1">Notes  </label>
					  </div>
					  <div class="col-md-10">
						<textarea class="form-control" name="notes" id="notes" placeholder="Enter Notes..." required=""></textarea>
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

<script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
	
<script>

	$(document).ready(function(){
        $('input[type="checkbox"]').click(function(){
            if($(this).prop("checked") == true){
				$('.colcenterForm').removeClass('hide');
            }
            else if($(this).prop("checked") == false){
				$('.colcenterForm').addClass('hide');
            }
        });
    });
</script>

@endsection
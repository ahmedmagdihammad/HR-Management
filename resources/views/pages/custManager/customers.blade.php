@extends('layout.master')
@section('title')
  Customers
@endsection
@section('breadcrumb')
	<i class="fa fa-users"></i> Customer
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
          <button type="button" class="btn btn-xs btn-info pull-right" data-toggle="modal" data-target="#modal-add"><i class="fa fa-plus"></i> Add Customers</button>
          <h3 class="box-title">Customers List</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body" style="overflow-x: auto;">
          @if(count($customers)>0)
          <table id="example1" class="table table-bordered table-hover ">
            <thead >
	            <tr>
	              <th>ID</th>
	              <th>Name</th>
	              <th>Mobile 1</th>
	              <th>Mobile 2</th>
	              <th>Gender</th>
	              <th>NID</th>
	              <th>DOB</th>
	              <th>Reference By</th>
	              <th>Notes</th>
	              <th>current</th>
	              <th>Status</th>
	              <th>Picture</th>
	              <th>Options</th>
	            </tr>
            </thead>
            <tbody>
              @foreach($customers as $customer)
              	<tr>
	                <td>{{$customer->id}}</td>
	                <td>{{$customer->name_en}}</td>
	                <td>{{$customer->mobile_1}}</td>
	                <td>{{$customer->mobile_2}}</td>
	                <td>@if($customer->gender == 'male') <i class="fa fa-male"></i> (Male) @else <i class="fa fa-female">(Female) </i> @endif</td>
	                <td>{{$customer->n_passport_id}}</td>
	                <td>{{$customer->date_birth}}</td>
	                <td>@if($customer->reference == '') -- @else <a href="{{route('profile', $customer->getReference['id'])}}">{{$customer->getReference['name']}}</a> @endif</td>
	                <td>{{$customer->notes}}</td>
	                <td>@if($customer->updated_at->format('m') == date('m')) <p style="color: red"> New</p> @else <p style="color: green"> Current</p> @endif</td>
	                <td>@if($customer->status == 1) <a href="{{route('activeCustomer', $customer->id)}}" class="btn btn-xs btn-info" ><i class="fa fa-check"></i> Active</a> @else <a href="{{route('suspendedCustomer', $customer->id)}}" class="btn btn-xs btn-danger" ><i class="fa fa-close"></i> Suspended </a> @endif
	                </td>
	                <td><img src="{{$customer->picture}}" style="width: 100px; height: 80px"></td>
	                <td>
	                  <button title="edit" type="button" class="edit-customerment btn btn-xs btn-warning" data-toggle="modal" data-target="#modal-edit{{$customer->id}}"><i class="fa fa-edit"></i></button>
	                  <button title="delete" type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modal-delete{{$customer->id}}"><i class="fa fa-trash"></i> </button>
	                  <a title="add document" href="{{route('documentCust', $customer->id)}}" class=" btn btn-xs btn-success"><i class="fa fa-photo"></i></a>
	                  <a title="add payment" href="{{route('payCustomer', $customer->id)}}" class=" btn btn-xs btn-info"><i class="fa fa-money"></i> </a>
	                  <a title="profile" href="{{route('profile', $customer->id)}}" class=" btn btn-xs btn-primary"><i class="fa fa-eye"></i></a>
	                  <a title="call center" href="{{route('call_center', $customer->id)}}" class=" btn btn-xs btn-warning"><i class="fa fa-phone"></i></a>
	                  <a title="add family" href="{{route('family', $customer->id)}}" class=" btn btn-xs btn-info"><i class="fa fa-users"></i></a>
	                  <a title="print contract" href="{{route('print_cart', $customer->id)}}" class="print btn btn-xs btn-primary"><i class="fa fa-print"></i></a>

	                  <a title="print id cart" href="{{route('print_id_card', $customer->id)}}" class="print btn btn-xs btn-success"><i class="fa fa-id-card"></i></a>
	                </td>
	          	</tr>
              	
	          	<!-- Modal Delete -->
					<div class="modal fade" id="modal-delete{{$customer->id}}">
						<div class="modal-dialog">
						  <div class="modal-content">
						    <div class="modal-header">
						      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						        <span aria-hidden="true">&times;</span></button>
						      <h4 class="modal-title"><i class="fa fa-trash"></i> Delete</h4>
						    </div>
						    <form method="POST" action="{{route('customer.delete', $customer->id)}}">
						    	<div class="modal-body">
						          {{csrf_field()}}
						          	<div class="form-group">
							            <div class="row">
							              	<div class="col-md-2">
							                	<label for="exampleInputEmail1">Name: </label>
							              	</div>
							              	<div class="col-md-4">
							              		<p>{{$customer->name_en}}</p>
							              	</div>
							              	<div class="col-md-3">
							                	<label for="exampleInputEmail1">NID / Passport ID: </label>
							              	</div>
							              	<div class="col-md-3">
							              		<p>{{$customer->n_passport_id}}</p>
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

				<!-- Modal Edit -->
				    <div class="modal fade" id="modal-edit{{$customer->id}}">
				      	<div class="modal-dialog">
					        <div class="modal-content">
						        <div class="modal-header">
						            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						              <span aria-hidden="true">&times;</span></button>
						            <h4 class="modal-title"><i class="fa fa-edit"></i> Edit</h4>
						        </div>
					            <form method="POST" action="{{route('customer.edit', $customer->id)}}"  enctype="multipart/form-data">
							        <div class="modal-body">
							            {{csrf_field()}}
							            <div class="form-group">
							                <div class="row">
							                  <div class="col-md-2">
							                    <label for="exampleInputEmail1">Name English: <span style="color:red;">*</span> </label>
							                  </div>
							                  <div class="col-md-4">
							                    <input type="text" class="form-control" name="upname_en" id="upname_en" value="{{$customer->name_en}}" required="">
							                  </div>

							                  <div class="col-md-2">
							                    <label for="exampleInputEmail1">Name Arabic:  </label>
							                  </div>
							                  <div class="col-md-4">
							                    <input type="text" class="form-control" name="upname_ar" id="upname_ar" value="{{$customer->name_ar}}" required="">
							                  </div>

							                </div>
						              	</div>
						              	<div class="form-group">
							                <div class="row">
							                  <div class="col-md-2">
							                    <label for="exampleInputEmail1">Mobile 1: <span style="color:red;">*</span> </label>
							                  </div>
							                  <div class="col-md-4">
							                    <input type="text" class="form-control" name="upmobile_1" id="upmobile_1" value="{{$customer->mobile_1}}" required="">
							                  </div>

							                  <div class="col-md-2">
							                    <label for="exampleInputEmail1">Mobile 2: <span style="color:red;">*</span> </label>
							                  </div>
							                  <div class="col-md-4">
							                    <input type="text" class="form-control" name="upmobile_2" id="upmobile_2" value="{{$customer->mobile_2}}" required="">
							                  </div>
							                </div>
						              	</div>
						              	<div class="form-group">
							                <div class="row">

							                  <div class="col-md-2">
							                    <label for="exampleInputEmail1">Address:  </label>
							                  </div>
							                  <div class="col-md-4">
							                    <input type="text" class="form-control" name="upaddress" id="upaddress" value="{{$customer->address}}" required="">
							                  </div>

							                  <div class="col-md-2">
							                    <label for="exampleInputEmail1">NID / Passport ID: <span style="color:red;">*</span> </label>
							                  </div>
							                  <div class="col-md-4">
							                    <input type="number" class="form-control" name="upn_passport_id" id="upn_passport_id" value="{{$customer->n_passport_id}}" required="">
							                  </div>

							                  
							                </div>
						              	</div>
						              	<div class="form-group">
							                <div class="row">
							                  <div class="col-md-2">
							                    <label for="exampleInputEmail1">Gender: <span style="color:red;">*</span> </label>
							                  </div>
							                  <div class="col-md-4">
							                    <select class="form-control" name="upgender" id="upgender" required="">
							                    	<option selected="">{{$customer->gender}}</option>
							                    	<option>male</option>
							                    	<option>female</option>
							                    </select>
							                  </div>

							                  <div class="col-md-2">
							                    <label for="exampleInputEmail1">Job: </label>
							                  </div>
							                  <div class="col-md-4">
							                    <input type="text" class="form-control" name="upjob" id="upjob" value="{{$customer->job}}" required="">
							                  </div>
							                </div>
						              	</div>
						              	<div class="form-group">
							                <div class="row">
							                  <div class="col-md-2">
							                    <label for="exampleInputEmail1">Date of Birth: <span style="color:red;">*</span> </label>
							                  </div>
							                  <div class="col-md-4">
							                    <input type="date" class="form-control" name="update_birth" id="update_birth" value="{{$customer->date_birth}}" required="">
							                  </div>

							                  <div class="col-md-2">
							                    <label for="exampleInputEmail1">Nationality:  </label>
							                  </div>
							                  <div class="col-md-4">
							                    <input type="text" class="form-control" name="upnationality" id="upnationality" value="{{$customer->nationality}}" required="">
							                  </div>
							                </div>
						              	</div>
						              	<div class="form-group">
							                <div class="row">
							                  <div class="col-md-2">
							                    <label for="exampleInputEmail1">Notes: <span style="color:red;">*</span> </label>
							                  </div>
							                  <div class="col-md-10">
							                    <textarea class="form-control" name="upnotes" id="upnotes" placeholder="Enter Notes" required="">{{$customer->notes}} </textarea>
							                  </div>
							                </div>
						              	</div>
						              	<div class="form-group">
							                <div class="row">
							                  	<div class="col-md-2">
							                    	<label for="exampleInputEmail1">Picture: <span style="color:red;">*</span> </label>
							                  	</div>
							                  	<div class="col-md-7">
		                    						<input class="form-control" type="file" name="uppicture" id="uppicture" value="{{asset($customer->picture)}}" >
							                  	</div>
							                  	<div class="col-md-2">
							                  		<img src="{{asset($customer->picture)}}" style="width: 100px; height: 80px">
		                    					</div>
							                </div>
						              	</div>
						              	<div class="form-group">
							                <div class="row">
							                  	<div class="col-md-2">
							                    	<label for="exampleInputEmail1">Reference: <span style="color:red;">*</span> </label>
							                  	</div>
							                  	<div class="col-md-4">
		                    						<select class="form-control" name="upreference" id="upreference">
		                    							@if($customer->reference == '') <option value="">- Not Reference -</option> @else <option value="{{$customer->getReference['id']}}">{{$customer->getReference['name_en']}}</option> @endif
		                    							<option value="">- Not Reference -</option>
		                    							@foreach($customers as $customer)
		                    							<option value="{{$customer->id}}">{{$customer->name_en}}</option>
		                    							@endforeach
		                    						</select>
		                    						@foreach($commissions as $customer)
					        						<input type="hidden" name="upcommission_id" id="upcommission_id" value="{{$customer->id}}">
					        						@endforeach
												</div>
												<div class="row">
													<div class="col-md-2">
													  <label for="exampleInputEmail1">Email:  </label>
												  </div>
												  <div class="col-md-4">
													  <input type="text" class="form-control" name="upemail" id="upemail" value="{{$customer->email}}" >
												  </div>
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

              @endforeach
            </tbody>
          </table>
          	@else
	            <br><br><br><br><br>
	            <center class="text-danger"><i class="fa fa-frown-o"></i> &nbsp; Not Customers &nbsp; <i class="fa fa-frown-o"></i></center>
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
            <form method="POST" action="{{route('customer.store')}}" enctype="multipart/form-data">
	          	<div class="modal-body">
	              {{csrf_field()}}
	              	<div class="form-group">
		                <div class="row">
		                  <div class="col-md-2">
		                    <label for="exampleInputEmail1">Name English: <span style="color:red;">*</span> </label>
		                  </div>
		                  <div class="col-md-4">
		                    <input type="text" class="form-control" name="name_en" id="name_en" placeholder="Enter Name"  required="">
		                  </div>

		                  <div class="col-md-2">
		                    <label for="exampleInputEmail1">Name Arabic:  </label>
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
			                    <label for="exampleInputEmail1">Mobile 2 <span style="color:red;">*</span> </label>
			                </div>
			                <div class="col-md-4">
			                    <input type="text" class="form-control" name="mobile_2" id="mobile_2" placeholder="Enter Mobile 2"  required="">
			                </div>
		                </div>
	              	</div>
	              	<div class="form-group">
		                <div class="row">
		                	<div class="col-md-2">
			                    <label for="exampleInputEmail1">Address:  </label>
			                </div>
			                <div class="col-md-4">
			                    <input type="text" class="form-control" name="address" id="address" placeholder="Enter Address"  required="">
			                </div>
			                <div class="col-md-2">
			                    <label for="exampleInputEmail1">NID / Passport ID: <span style="color:red;">*</span> </label>
			                </div>
		                  	<div class="col-md-4">
		                    	<input type="number" class="form-control" name="n_passport_id" id="n_passport_id" placeholder="Enter NID / Passport ID" required="">
		                  	</div>
		                </div>
	              	</div>
	              	<div class="form-group">
		                <div class="row">
		                  <div class="col-md-2">
		                    <label for="exampleInputEmail1">Gender: <span style="color:red;">*</span> </label>
		                  </div>
		                  <div class="col-md-4">
		                    <select class="form-control" name="gender" id="gender"  required="">
		                    	<option selected="" disabled="">- Selaect -</option>
		                    	<option value="male">male</option>
		                    	<option value="female">female</option>
		                    </select>
		                  </div>
		                  <div class="col-md-2">
		                    <label for="exampleInputEmail1">Job: </label>
		                  </div>
		                  <div class="col-md-4">
		                    <input type="text" class="form-control" name="job" id="job" placeholder="Enter Job"  required="">
		                  </div>
		                </div>
	              	</div>
	              	<div class="form-group">
		                <div class="row">
		                  	<div class="col-md-2">
		                    	<label for="exampleInputEmail1">Date of Birth: <span style="color:red;">*</span> </label>
		                  	</div>
		                  	<div class="col-md-4">
		                    	<input type="date" class="form-control" name="date_birth" id="date_birth" placeholder="Enter Date of Birth"  required="">
			                </div>

		                  	<div class="col-md-2">
		                    	<label for="exampleInputEmail1">Nationality:  </label>
		                  	</div>
		                  	<div class="col-md-4">
		                    	<input type="text" class="form-control" name="nationality" id="nationality" placeholder="Enter Nationality " required="">
		                  	</div>
		                </div>
	              	</div>
	              	<div class="form-group">
		                <div class="row">
		                  <div class="col-md-2">
		                    <label for="exampleInputEmail1">Notes: <span style="color:red;">*</span> </label>
		                  </div>
		                  <div class="col-md-10">
		                    <textarea class="form-control" name="notes" id="notes" placeholder="Enter Notes..." required=""></textarea>
		                  </div>
		                </div>
	              	</div>
	              	<div class="form-group">
		                <div class="row">
		                  <div class="col-md-2">
		                    <label for="exampleInputEmail1">Picture: <span style="color:red;">*</span> </label>
		                  </div>
		                  <div class="col-md-10">
		                    <input class="form-control" type="file" name="picture" id="picture" required="
		                    ">
		                  </div>
		                </div>
	              	</div>
	              	<div class="form-group">
		                <div class="row">
		                  	<div class="col-md-2">
		                    	<label for="exampleInputEmail1">Reference: <span style="color:red;">*</span> </label>
		                  	</div>
		                  	<div class="col-md-4">
        						<select class="form-control" name="reference" id="reference">
        							<option class="notReference" value="">- Not Reference -</option>
		                    		@foreach($customers as $customer)
        							<option value="{{$customer->id}}">{{$customer->name_en}}</option>
        							@endforeach
        						</select>
        						<br>
        						@foreach($commissions as $customer)
        						<input type="hidden" name="commission_id" id="commission_id" value="{{$customer->name}}">
        						@endforeach
							  </div>
							  
								<div class="col-md-2">
								  <label for="exampleInputEmail1">Email:   </label>
								</div>
								<div class="col-md-4">
								  <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email"  required="">
								</div>
		                  	
		                </div>
	              	</div>
	              	<div class="form-group">
                  		
                  	</div>
	              	<!-- <div class="form-group" hidden="">
		                <div class="row">
		                  <div class="col-md-2">
		                    <label for="exampleInputEmail1">New / Current </label>
		                  </div>
		                  <div class="col-md-10">
		                    <input class="form-control" name="type" id="type" value="1">
		                  </div>
		                </div>
					</div> -->
					 
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

<!-- <script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
	<script lang='javascript'>
	    $(document).ready(function(){
	        $('#printPage').click(function(){
	            var data = '<input type="button" value="Print this page" onClick="window.print()">';
	            data += '<div id="div_print">';
	            data += $('#report').html();
	            data += '</div>';

	            myWindow=window.open('','','width=2000,height=1000');
	            myWindow.innerWidth = screen.width;
	            myWindow.innerHeight = screen.height;
	            myWindow.screenX = 0;
	            myWindow.screenY = 0;
	            myWindow.document.write(data);
	            myWindow.focus();
	        });
	    });
	</script> -->

@endsection
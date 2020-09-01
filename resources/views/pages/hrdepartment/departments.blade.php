@extends('layout.master')
@section('title')
  Department
@endsection
@section('breadcrumb')
	<i class="fa fa-sitemap"></i> Department
@endsection
@section('namepage')
  HR Department
@endsection
@section('content')

<!-- Table Project -->
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-info">
        <div class="box-header">
          <button type="button" class="btn btn-xs btn-info pull-right" data-toggle="modal" data-target="#modal-add"><i class="fa  fa-plus"></i> Add Department</button>
          <h3 class="box-title">Departments List</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          @if(count($departments)>0)
          	<table id="example1" class="table table-bordered table-hover">
	            <thead>
	            <tr>
	              <th>Name Department</th>
	              <th>Parent</th>
	              <th>Manager</th>
	              <th>Options</th>
	            </tr>
	            </thead>
	            <tbody>
	            @foreach($departments as $depart)
	              <tr>
	                <td>{{$depart->name}}</td>
	                <td>@if($depart->parent==0) No parent @else {{$depart->getParent['name']}} @endif</td>
	                <td>@if($depart->manager == 0)
	                 <button type="button" class="add-manager btn btn-xs btn-info" data-toggle="modal" data-target="#modal_add_manager{{$depart->id}}"><i class="fa fa-user-plus"></i></button>
	                  @else {{$depart->getEmployee['name']}} <button type="button" class="delete-manager btn btn-xs btn-danger" data-toggle="modal" data-target="#modal_delete_manager{{$depart->id}}"><i class="fa fa-trash"></i></button> @endif</td>
	                <td>
	                  <button type="button" class="edit-department btn btn-xs btn-warning" data-toggle="modal" data-target="#modal-edit{{$depart->id}}"><i class="fa fa-edit"></i> Edit</button>
	                  <button type="button" class="delete-department btn btn-xs btn-danger" data-toggle="modal" data-target="#modal-delete{{$depart->id}}"><i class="fa fa-remove"></i> Delete</button>
	                </td>
	              </tr>

	              	<!-- Modal add-manager -->
		                <div class="modal fade" id="modal_add_manager{{$depart->id}}">
		                  <div class="modal-dialog">
		                    <div class="modal-content">
		                      <div class="modal-header">
		                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		                          <span aria-hidden="true">&times;</span></button>
		                        <h4 class="modal-title"><i class="fa fa-user-plus"></i>  Add Manager</h4>
		                      </div>
		                        <form method="post" action="{{route('addManager', $depart->id)}}">
		                          <div class="modal-body">
		                            {{csrf_field()}}
		                            <div class="form-group hidden">
		                              <div class="row">
		                                <div class="col-md-2">
		                                  <label for="exampleInputEmail1">Name: <span style="color:red">*</span> </label>
		                                </div>
		                                <div class="col-md-10">
		                                  <input type="text" class="form-control" name="addmanagname" id="addmanagtitle" value="{{$depart->name}}">
		                                </div>
		                              </div>
		                            </div>
		                            <div class="form-group hidden">
		                              <div class="row">
		                                <div class="col-md-2">
		                                  <label for="exampleInputEmail1">Parent: </label>
		                                </div>
		                                <div class="col-md-10">
		                                  <select class="form-control " name="addmanagparent" id="addmanagparent" style="width: 100%; color: #000">
		                                    @if($depart->parent != 0) <option selected="" value="{{$depart->getParent['id']}}">{{$depart->getParent['title']}}</option> @else <option selected="" value="0">- No Parent -</option> @endif
		                                  </select>
		                                </div>
		                              </div>
		                            </div>
		                            <div class="form-group">
		                              <div class="row">
		                                <div class="col-md-2">
		                                  <label for="exampleInputEmail1">Manager: </label>
		                                </div>
		                                <div class="col-md-10">
		                                  <select class="form-control" name="addmanagmanager" id="addmanagmanager" required="">
		                                    <option value="0">- Add Manager -</option>
		                                    @foreach($employees as $employee)
		                                      <option value="{{$employee->id}}">{{$employee->name}}</option>
		                                    @endforeach
		                                  </select>
		                                </div>
		                              </div>
		                            </div>
		                          </div>
		                          <div class="modal-footer">
		                            <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
		                            <button type="submit" class="btn btn-success modeladdmanager">Add Manager</button>
		                          </div>
		                        </form>
		                    </div>
		                    <!-- /.modal-content -->
		                  </div>
		                  <!-- /.modal-dialog -->
		                  </div> 

		            <!-- Modal delete-manager -->
		                <div class="modal fade" id="modal_delete_manager{{$depart->id}}">
		                  <div class="modal-dialog">
		                    <div class="modal-content">
		                      <div class="modal-header">
		                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		                          <span aria-hidden="true">&times;</span></button>
		                        <h4 class="modal-title">Delete Manager</h4>
		                      </div>
		                        <form id="form-add-manager" method="POST" action="{{route('addManager', $depart->id)}}">
		                          <div class="modal-body">
		                            {{csrf_field()}}
		                            <div class="form-group hidden">
		                              <div class="row">
		                                <div class="col-md-2">
		                                  <label for="exampleInputEmail1">Name: </label>
		                                </div>
		                                <div class="col-md-10">
		                                  <input type="text" class="form-control" name="addmanagname" id="addmanagname" value="{{$depart->name}}">
		                                </div>
		                              </div>
		                            </div>
		                            <div class="form-group " hidden="">
		                              <div class="row">
		                                <div class="col-md-2">
		                                  <label for="exampleInputEmail1">Parent: <span style="color:red">*</span> </label>
		                                </div>
		                                <div class="col-md-10">
		                                  <select class="form-control " name="addmanagparent" id="addmanagparent">
		                                    @if($depart->parent != 0) <option selected="" value="{{$depart->getParent['id']}}">{{$depart->getParent['title']}}</option> @else <option selected="" value="0">- No Parent -</option> @endif
		                                  </select>
		                                </div>
		                              </div>
		                            </div>
		                            <div class="form-group" hidden="">
		                              <div class="row">
		                                <div class="col-md-2">
		                                  <label for="exampleInputEmail1">Manager: </label>
		                                </div>
		                                <div class="col-md-10">
		                                  <select class="form-control" name="addmanagmanager" id="addmanagmanager" required="">
		                                    <option value="0">- Delete:  -</option>
		                                  </select>
		                                </div>
		                              </div>
		                            </div>
		                            <div class="form-group">
		                              <div class="row">
		                                <div class="col-md-3">
		                                  <label for="exampleInputEmail1">Delete Manager: </label>
		                                </div>
		                                <div class="col-md-9">
		                                  <p></p>
		                                </div>
		                              </div>
		                            </div>
		                          </div>
		                          <div class="modal-footer">
		                            <button type="button" class="btn btn-info pull-left" data-dismiss="modal">Close</button>
		                            <button type="submit" class="btn btn-danger modeladdmanager">Delete Manager</button>
		                          </div>
		                        </form>
		                    </div>
		                    <!-- /.modal-content -->
		                  </div>
		                  <!-- /.modal-dialog -->
		                  </div> 

	              	<!-- Modal Edit -->
					    <div class="modal fade" id="modal-edit{{$depart->id}}">
					      <div class="modal-dialog">
					        <div class="modal-content">
					          <div class="modal-header">
					            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					              <span aria-hidden="true">&times;</span></button>
					            <h4 class="modal-title"><i class="fa fa-edit"></i> Edit</h4>
					          </div>
					            <form method="POST" action="{{route('department.edit', $depart->id)}}">
						          <div class="modal-body">
						              {{csrf_field()}}
						              <div class="form-group">
						                <div class="row">
						                  <div class="col-md-2">
						                    <label for="exampleInputEmail1">Name: <span style="color:red">*</span> </label>
						                  </div>
						                  <div class="col-md-10">
						                    <input type="text" class="form-control" name="upname" id="upname" value="{{$depart->name}}">
						                  </div>
						                </div>
						              </div>
						              <div class="form-group">
						                <div class="row">
						                  <div class="col-md-2">
						                    <label for="exampleInputEmail1">Parent: <span style="color:red">*</span> </label>
						                  </div>
						                  <div class="col-md-10">
						                    <select class="form-control " name="upparent" id="upparent">
						                    	@if($depart->parent == 0) <option value="0">No Parent</option> @else <option selected="" value="{{$depart->getParent['id']}}">{{$depart->getParent['name']}}</option> @endif
						                    	<option value="0">No Parent</option>
						                      	<option value="{{$depart->id}}">{{$depart->name}}</option>
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
						<div class="modal fade" id="modal-delete{{$depart->id}}">
						<div class="modal-dialog">
						  <div class="modal-content">
						    <div class="modal-header">
						      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						        <span aria-hidden="true">&times;</span></button>
						      <h4 class="modal-title"><i class="fa fa-trash"></i> Delete</h4>
						    </div>
						    <form method="POST" action="{{route('department.delete', $depart->id)}}">
						    	<div class="modal-body">
						          {{csrf_field()}}
						          	<div class="form-group">
							            <div class="row">
							              	<div class="col-md-4">
							                	<label for="exampleInputEmail1">Name Department: </label>
							              	</div>
							              	<div class="col-md-8">
							              		<p>{{$depart->name}}</p>
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
            <center class="text-danger"><i class="fa fa-frown-o"></i> &nbsp; Not Deplartment &nbsp; <i class="fa fa-frown-o"></i></center>
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
            <form method="POST" action="{{route('department.store')}}">
	          <div class="modal-body">
	              {{csrf_field()}}
	              <div class="form-group">
	                <div class="row">
	                  <div class="col-md-2">
	                    <label for="exampleInputEmail1">Name: <span style="color:red">*</span> </label>
	                  </div>
	                  <div class="col-md-10">
	                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name">
	                  </div>
	                </div>
	              </div>
	              <div class="form-group">
	                <div class="row">
	                  <div class="col-md-2">
	                    <label for="exampleInputEmail1">Parent: <span style="color:red">*</span> </label>
	                  </div>
	                  <div class="col-md-10">
	                    <select class="form-control " name="parent" id="parent" >
	                      <option value="0">No Parent</option>
	                      @foreach($departments as $depart)
	                      <option value="{{$depart->id}}">{{$depart->name}}</option>
	                      @endforeach
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
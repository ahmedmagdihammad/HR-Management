@extends('layout.master')
@section('title')
  First and Second Setting
@endsection
@section('breadcrumb')
	<i class="fa fa-credit-card"></i> First and Second Line
@endsection
@section('namepage')
  First and Second Line
@endsection
@section('content')

<!-- Table Project -->
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-info">
        <div class="box-header">

          <h3 class="box-title">First and Second Line List</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          @if(count($firstscond)>0)
          	<table id="" class="table table-bordered table-hover">
	            <thead>
	            <tr>
	              <th>First Line</th>
	              <th>Second Line</th>
	              <th>Options</th>
	            </tr>
	            </thead>
	            <tbody>
	            @foreach($firstscond as $firstsecond)
	              <tr>
	                <td>{{$firstsecond->first}}</td>
	                <td>{{$firstsecond->second}}</td>
	                <td>
	                  <button type="button" class=" btn btn-xs btn-warning" data-toggle="modal" data-target="#modal-edit{{$firstsecond->id}}"><i class="fa fa-edit"></i> Edit</button>
	                </td>
	              </tr>

	            <!-- Modal edit -->
				    <div class="modal fade" id="modal-edit{{$firstsecond->id}}">
				      <div class="modal-dialog">
				        <div class="modal-content">
				          <div class="modal-header">
				            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				              <span aria-hidden="true">&times;</span></button>
				            <h4 class="modal-title"><i class="fa fa-edit"></i> Edit </h4>
				          </div>
				            <form method="POST" action="{{route('firstSecond.edit', $firstsecond->id)}}" enctype="multipart/form-data">
					          <div class="modal-body">
					              {{csrf_field()}}
					              <div class="form-group">
					                <div class="row">
					                  <div class="col-md-2">
					                    <label for="exampleInputEmail1">Fisrt Line</label>
					                  </div>
					                  <div class="col-md-10">
					                    <input class="form-control" type="number" name="upfirst" id="upfirst" value="{{$firstsecond->first}}" required="">
					                  </div>
					                </div>
					              </div>
					              <div class="form-group">
					                <div class="row">
					                  <div class="col-md-2">
					                    <label for="exampleInputEmail1">Second Line</label>
					                  </div>
					                  <div class="col-md-10">
					                    <input class="form-control" type="number" name="upsecond" id="upsecond" value="{{$firstsecond->second}}" required="">
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

				<!-- Modal ddelete -->
				    <div class="modal fade" id="modal-delete{{$firstsecond->id}}">
				      <div class="modal-dialog">
				        <div class="modal-content">
				          <div class="modal-header">
				            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				              <span aria-hidden="true">&times;</span></button>
				            <h4 class="modal-title"><i class="fa fa-trash"></i> Delete </h4>
				          </div>
				            <form method="POST" action="{{route('firstSecond.delete', $firstsecond->id)}}" enctype="multipart/form-data">
					          <div class="modal-body">
					              {{csrf_field()}}
					              <div class="form-group">
					                <div class="row">
					                	<div class="col-md-2">
					                    	<label for="exampleInputEmail1">Fisrt </label>
					                  	</div>
					                  	<div class="col-md-2">
					                  		<p>{{$firstsecond->first}}</p>
					                  	</div>
					                </div>
					              </div>
					              	<div class="form-group">
						                <div class="row">
						                	<div class="col-md-2">
						                    	<label for="exampleInputEmail1">Second </label>
						                  	</div>
						                  	<div class="col-md-2">
						                  		<p>{{$firstsecond->second}}</p>
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

	            @endforeach
	            </tbody>
          	</table>
          	{{$paymentPaginat->links()}}
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

<!-- Modal add -->
    <div class="modal fade" id="modal-add">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"><i class="fa fa-plus"></i> Add </h4>
          </div>
            <form method="POST" action="{{route('firstSecond.store')}}" enctype="multipart/form-data">
	          <div class="modal-body">
	              {{csrf_field()}}
	              <div class="form-group">
	                <div class="row">
	                  <div class="col-md-2">
	                    <label for="exampleInputEmail1">Fisrt Line </label>
	                  </div>
	                  <div class="col-md-10">
	                    <input class="form-control" type="number" name="first" id="first" placeholder="Enter Fisrt Line" required="">
	                  </div>
	                </div>
	              </div>
	              <div class="form-group">
	                <div class="row">
	                  <div class="col-md-2">
	                    <label for="exampleInputEmail1">Second Line </label>
	                  </div>
	                  <div class="col-md-10">
	                    <input class="form-control" type="number" name="second" id="second" placeholder="Enter Second Line" required="">
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
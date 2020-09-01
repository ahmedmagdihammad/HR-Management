@extends('layout.master')
@section('title')
  Documents 
@endsection
@section('breadcrumb')
	<a href="{{route('customer')}}"><i class="fa fa-users"></i> Customer</a> 
	<li><a href="{{route('payCustomer', $payments->getCustomer['id'])}}"> <i class="fa fa-money"></i> Payment</a> </li>
    <li class="active"> <i class="fa fa-image"></i>  Document</li>
@endsection
@section('namepage')
  Documents
@endsection
@section('content')

<!-- Table Project -->
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-info">
        <div class="box-header">
          <button type="button" class="btn btn-xs btn-info pull-right" data-toggle="modal" data-target="#modal-add"><i class="fa  fa-plus"></i> Add Document</button>
          <h3 class="box-title">Documents List :</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          @if(count($documents)>0)
          	<table id="" class="table table-bordered table-hover">
	            <thead>
	            <tr>
	              <th>description</th>
	              <th>Image</th>
	              <th>Options</th>
	            </tr>
	            </thead>
	            <tbody>
	            @foreach($documents as $document)
	            @if($payments['id'] == $id)
	              <tr>
	                <td>{{$document->description}}</td>
	                <td><img src="{{asset($document->image)}}" style="width: 100px; height: 80px"></td>
	                <td>
	                  <button type="button" class="edit-documentment btn btn-xs btn-warning" data-toggle="modal" data-target="#modal-edit{{$document->id}}"><i class="fa fa-edit"></i> Edit</button>
	                  <button type="button" class="delete-documentment btn btn-xs btn-danger" data-toggle="modal" data-target="#modal-delete{{$document->id}}"><i class="fa fa-remove"></i> Delete</button>
	                </td>
	              </tr>

	            <!-- Modal edit -->
				    <div class="modal fade" id="modal-edit{{$document->id}}">
				      <div class="modal-dialog">
				        <div class="modal-content">
				          <div class="modal-header">
				            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				              <span aria-hidden="true">&times;</span></button>
				            <h4 class="modal-title"><i class="fa fa-edit"></i> Edit </h4>
				          </div>
				            <form method="POST" action="{{route('documentPay.edit', $document->id)}}" enctype="multipart/form-data">
					          <div class="modal-body">
					              {{csrf_field()}}
					              <div class="form-group hidden">
					                <div class="row">
					                  <div class="col-md-2">
					                    <label for="exampleInputEmail1">type </label>
					                  </div>
					                  <div class="col-md-10">
					                    <input class="form-control" type="text" name="uptype" id="uptype" value="p" required="">
					                  </div>
					                </div>
					              </div>
					              <div class="form-group hidden">
					                <div class="row">
					                  <div class="col-md-2">
					                    <label for="exampleInputEmail1">Customer </label>
					                  </div>
					                  <div class="col-md-10">
					                  	<input class="form-control" type="text" name="uprecid" value="{{$payments->getCustomer['id']}}">
					                  </div>
					                </div>
					              </div>
					              <div class="form-group">
					                <div class="row">
					                  <div class="col-md-2">
					                    <label for="exampleInputEmail1">Description </label>
					                  </div>
					                  <div class="col-md-10">
					                    <textarea class="form-control" name="updescription" id="updescription" required="">{{$document->description}}</textarea>
					                  </div>
					                </div>
					              </div>
					              <div class="form-group">
					                <div class="row">
					                  <div class="col-md-2">
					                    <label for="exampleInputEmail1">Image </label>
					                  </div>
					                  <div class="col-md-7">
					                  	<input type="file" class="form-control" name="upimage" id="upimage">
					                  </div>
					                  <div class="col-xs-2">
					                  	<img src="{{asset($document->image)}}" style="width: 100px; height: 80px">
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
				    <div class="modal fade" id="modal-delete{{$document->id}}">
				      <div class="modal-dialog">
				        <div class="modal-content">
				          <div class="modal-header">
				            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				              <span aria-hidden="true">&times;</span></button>
				            <h4 class="modal-title"><i class="fa fa-trash"></i> Delete </h4>
				          </div>
				            <form method="POST" action="{{route('documentPay.delete', $document->id)}}" enctype="multipart/form-data">
					          <div class="modal-body">
					              {{csrf_field()}}
					              <div class="form-group">
					                <div class="row">
					                	<div class="col-md-2">
					                    	<label for="exampleInputEmail1">Customer </label>
					                  	</div>
					                  	<div class="col-md-4">
					                  		<p>{{$payments->getCustomer['name']}}</p>
					                  	</div>
					                  	<div class="col-md-2">
					                    	<label for="exampleInputEmail1">Image </label>
					                  	</div>
					                  	<div class="col-md-4">
					                  		<img src="{{asset($document->image)}}" style="width: 100px; height: 80px">
					                  	</div>
					                </div>
				                  	<div class="row">
					                  	<div class="col-md-2">
					                    	<label for="exampleInputEmail1">Description </label>
					                  	</div>
					                  	<div class="col-md-10">
					                  		<p>{{$document->description}}</p>
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
				@endif
	            @endforeach
	            </tbody>
          	</table>
          @else
            <br><br><br><br><br>
            <center class="text-danger"><i class="fa fa-frown-o"></i> &nbsp; Not Documents &nbsp; <i class="fa fa-frown-o"></i></center>
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
            <form method="POST" action="{{route('documentPay.store')}}" enctype="multipart/form-data">
	          <div class="modal-body">
	              {{csrf_field()}}
	              <div class="form-group hidden">
	                <div class="row">
	                  <div class="col-md-2">
	                    <label for="exampleInputEmail1">type </label>
	                  </div>
	                  <div class="col-md-10">
	                    <input class="form-control" type="type" name="type" id="type" value="p" required="">
	                  </div>
	                </div>
	              </div>
	              <div class="form-group hidden">
	                <div class="row">
	                  <div class="col-md-2">
	                    <label for="exampleInputEmail1">Customer </label>
	                  </div>
	                  <div class="col-md-10">
	                    <input class="form-control" type="text" name="recid" id="recid" value="{{$payments->getCustomer['id']}}">
	                  </div>
	                </div>
	              </div>
	              <div class="form-group">
	                <div class="row">
	                  <div class="col-md-2">
	                    <label for="exampleInputEmail1">Description </label>
	                  </div>
	                  <div class="col-md-10">
	                    <textarea class="form-control" name="description" id="description" placeholder="Enter Description" required=""></textarea>
	                  </div>
	                </div>
	              </div>
	              <div class="form-group">
	                <div class="row">
	                  <div class="col-md-2">
	                    <label for="exampleInputEmail1">Image </label>
	                  </div>
	                  <div class="col-md-10">
	                  	<input type="file" class="form-control" name="image" id="image" required="">
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
@extends('layout.master')
@section('title')
  Documents 
@endsection
@section('breadcrumb')
    <i class="fa fa-image"></i>  Document
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
          <h3 class="box-title">Documents List </h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          @if(count($documents)>0)
          	<table id="" class="table table-bordered table-hover">
	            <thead>
	            <tr>
	              <th>Payment</th>
	              <th>description</th>
	              <th>Image</th>
	            </tr>
	            </thead>
	            <tbody>
	            @foreach($documents as $document)
	              <tr>
	                <td>{{$document->id}}</td>
	                <td>{{$document->description}}</td>
	                <td><img src="{{asset($document->image)}}" style="width: 100px; height: 80px"></td>
	              </tr>
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

@endsection
@extends('layout.master')
@section('title')
  Bonus
@endsection
@section('breadcrumb')
	<i class="fa fa-sitemap"></i> Bonus
@endsection
@section('namepage')
    Bonus
@endsection
@section('content')

<!-- Table Project -->
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-info">
        <div class="box-header">
          <button type="button" class="btn btn-xs btn-info pull-right" data-toggle="modal" data-target="#modal-add"><i class="fa  fa-plus"></i> Add Bonus</button>
          <h3 class="box-title">Bonus List</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          	<table id="example1" class="table table-bordered table-hover">
	            <thead>
	            <tr>
	              <th>#</th>
	              <th>Amount</th>
	              <th>Options</th>
	            </tr>
	            </thead>
	            <tbody>
	              <tr>
	                <td>1</td>
	                <td>100</td>
	                <td>
	                  <button type="button" class="edit-department btn btn-xs btn-warning" data-toggle="modal" data-target="#modal-edit"><i class="fa fa-edit"></i> Edit</button>
	                  <button type="button" class="delete-department btn btn-xs btn-danger" data-toggle="modal" data-target="#modal-delete"><i class="fa fa-remove"></i> Delete</button>
	                </td>
	              </tr>
	            </tbody>
          	</table>
        </div>
        <!-- /.box-body -->
      </div>
    </div>
  </div>
@endsection
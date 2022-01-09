@extends('layouts.admin')
@section('title', 'Members')
@section('wrapper-title', 'Members')

@section('css')
	{{-- <!-- DataTables -->
	<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection --}}

@section('content')
	<div class="container" id="memberVue">
		<div class="row">
			<div class="card w-100 overflow-auto">
				<div class="card-header">
					<a href="#" @click="addData()" class="btn btn-sm btn-primary">Create new member</a>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<table id="dataTable" class="table table-bordered table-striped w-100">
						<thead>
							<tr>
								<th style="width: 10px">#</th>
								<th>Name</th>
								<th>Gender</th>
								<th>Phone Number</th>
								<th>Address</th>
								<th>Email</th>
								<th>Created at</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div>
				<!-- /.card-body -->
			</div>
		</div>

	
@endsection
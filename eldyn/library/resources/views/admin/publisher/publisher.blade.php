@extends('layouts.admin')
@section('title', 'Publishers')
@section('wrapper-title', 'Publishers')

@section('content')
	<div class="container">
		<div class="row">
			<div class="card w-100">
				<div class="card-header">
					<a href="{{ url('publishers/create') }}" class="btn btn-sm btn-primary">Create new publisher</a>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th style="width: 10px">#</th>
								<th>Name</th>
								<th>Email</th>
								<th>Phone Number</th>
								<th>Address</th>
								<th>Total Books</th>
								<th>created at</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($publishers as $key => $publisher)
							<tr>
								<td>{{ $key + 1 }}</td>
								<td>{{ $publisher->name }}</td>
								<td>{{ $publisher->email }}</td>
								<td>{{ $publisher->phone_number }}</td>
								<td>{{ $publisher->address }}</td>
								<td style="text-align: center">{{ count($publisher->books) }}</td>
								<td>{{ date('H:i:s - d F Y', strtotime( $publisher->created_at ))}}</td>
								<td class="d-flex" style="gap: .5rem">
									<a href="{{ url('publishers/'.$publisher->id.'/edit') }}" class="btn btn-sm btn-warning text-white">Edit</a>
									<form action="{{ url('publishers/'.$publisher->id) }}" method="POST">
										@csrf
										@method('delete')
										<button type="submit" class="btn btn-sm btn-danger text-white" onclick="return confirm('Are you sure want to delete this data?')">Delete</button>
									</form>
								</td>
							</tr>	
							@endforeach
						</tbody>
					</table>
				</div>
				<!-- /.card-body -->
				<div class="card-footer clearfix">
					<ul class="pagination pagination-sm m-0 float-right">
						<li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
						<li class="page-item"><a class="page-link" href="#">1</a></li>
						<li class="page-item"><a class="page-link" href="#">2</a></li>
						<li class="page-item"><a class="page-link" href="#">3</a></li>
						<li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
@endsection

@extends('layouts.admin')
@section('title', 'Authors')
@section('wrapper-title', 'Authors')

@section('content')
	<div class="container">
		<div class="row">
			<div class="card w-100">
				<div class="card-header">
					<a href="{{ url('authors/create') }}" class="btn btn-sm btn-primary">Create new author</a>
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
							@foreach ($authors as $key => $author)
							<tr>
								<td>{{ $key + 1 }}</td>
								<td>{{ $author->name }}</td>
								<td>{{ $author->email }}</td>
								<td>{{ $author->phone_number }}</td>
								<td>{{ $author->address }}</td>
								<td style="text-align: center">{{ count($author->books) }}</td>
								<td>{{ date('H:i:s - d F Y', strtotime( $author->created_at ))}}</td>
								<td class="d-flex" style="gap: .5rem">
									<a href="{{ url('authors/'.$author->id.'/edit') }}" class="btn btn-sm btn-warning text-white">Edit</a>
									<form action="{{ url('authors/'.$author->id) }}" method="POST">
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

@extends('layouts.admin')
@section('title', 'Catalogs')
@section('wrapper-title', 'Catalogs')

@section('content')
	<div class="container">
		<div class="row">
			<div class="card w-100">
				<div class="card-header">
					<a href="{{ url('catalogs/create') }}" 
					class="btn btn-sm btn-primary">Create new catalog</a>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<table class="table table-bordered">
						<thead>
							<tr>
									<th style="width: 10px">#</th>
									<th style="text-align:center"> Name</th>
									<th style="text-align:center"> Total Books</th>
									<th style="text-align:center"> Created At</th>
									<th style="text-align:center"> Action</th>
								
							</tr>
						</thead>
						<tbody>
							@foreach ($catalogs as $key => $catalog)
							<tr>
								<td>{{ $key+1}}</td>
								<td>{{ $catalog->name }}</td>
								<td style="text-align: center">{{ count($catalog->books) }}</td>
								<td class="text center">{{ convert_date( $catalog->created_at) }}</td>
								<td class="d-flex" style="gap: .5rem">
									<a href="{{ url('catalogs/'.$catalog->id.'/edit') }}" class="btn btn-sm btn-warning text-white">Edit</a>
									<form action="{{ url('catalogs/'.$catalog->id) }}" method="POST">
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
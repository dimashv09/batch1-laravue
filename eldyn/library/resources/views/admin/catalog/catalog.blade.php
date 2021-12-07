@extends('layouts.admin')
@section('title', 'Catalog')

@section('content')
<div class="container">
    <div class="row">
        <div class="card w-100">
			{{-- <div class="card-header">
				<h3 class="card-title">Bordered Table</h3>
			</div> --}}
			<!-- /.card-header -->
			<div class="card-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th style="width: 10px">#</th>
							<th>Name</th>
							<th>Total Books</th>
							<th>Created At</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($catalogs as $key => $catalog)
						<tr>
							<td>{{ $key + 1 }}</td>
							<td>{{ $catalog->name }}</td>
							<td style="text-align: center">{{ count($catalog->books) }}</td>
							<td>{{ date('H:i:s - d F Y', strtotime( $catalog->created_at ))}}</td>
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

@extends('layouts.admin')
@section('header', 'Catalog')

@section('content')
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-header">
<h3 class="card-title">Data Catalog</h3>
<div class="card-tools">
	<a href="{{ url('catalogs/create') }}" class="btn btn-sm btn-primary pull-left">Create New Catalog</a>
<div class="input-group input-group-sm" style="width: 150px;">
<input type="text" name="table_search" class="form-control float-right" placeholder="Search">
<div class="input-group-append">
<button type="submit" class="btn btn-default">
<i class="fas fa-search"></i>
</button>
</div>
</div>
</div>
</div>

<div class="card-body table-responsive p-0" style="height: 300px;">
<table class="table table-head-fixed text-nowrap">
<thead>
<tr>
<th class="text-center">ID</th>
<th class="text-center">Name</th>
<th class="text-center">Total Books</th>
<th class="text-center">Created Date</th>
<th class="text-center">Update Date</th>
<th class="text-center">Action</th>
</tr>
</thead>
<tbody>
	@foreach($catalogs as $key => $catalog)
<tr>
<td class="text-center">{{ $key+1 }}</td>
<td class="text-center">{{ $catalog->name }}</td>
<td class="text-center">{{ count($catalog->books) }}</td>
<td class="text-center">{{ dateFormat($catalog->created_at) }}</td>
<td class="text-center">{{ dateFormat($catalog->updated_at) }}</td>
<td class="text-center">
	<a href="{{ url('catalogs/'.$catalog->id.'/edit') }}" class="btn btn-warning btn-sm">Edit</a>
	<form action="{{ url('catalogs', ['id' => $catalog->id]) }}" method="post">
		<input class="btn btn-danger btn-sm" type="submit" value="Delete" onclick="return confirm('Are You Sure?')">
		@method('delete')
		@csrf
	</form>
</td>
</tr>
</tbody>
	@endforeach
</table>
</div>

</div>

</div>
</div>
@endsection
@extends('layouts.admin')
@section('header', 'Catalog')

@section('content')
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-header">
<h3 class="card-title">DATA CATALOG</h3>
<div class="card-tools">
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
</tr>
</thead>
<tbody>
	@foreach($catalogs as $key => $catalog)
<tr>
<td class="text-center">{{ $key+1 }}</td>
<td class="text-center">{{ $catalog->name }}</td>
<td class="text-center">{{ count($catalog->books) }}</td>
<td class="text-center">{{ date('H:i:s - d M y', strtotime($catalog->created_at)) }}</td>
<td class="text-center">{{ date('H:i:s - d M y', strtotime($catalog->updated_at)) }}</td>
</tr>
</tbody>
	@endforeach
</table>
</div>

</div>

</div>
</div>
@endsection

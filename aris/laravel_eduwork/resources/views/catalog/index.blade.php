@extends('layouts.admin')
@section('header', 'Catalog')
@section('content')
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-header">
      <!-- ngga bisa detail -->
   <!--  <a href="{{ url('/catalogs/create') }}" class="btn btn-primary pull-right">Create New Catalog</a> -->
   <a href="{{ url('/create') }}" class="btn btn-primary pull-right">Create New Catalog</a>
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
<div class="card-body table-responsive p-0">
 <table class="table table-hover text-nowrap">
<thead>
<tr>
<th>No</th>
<th>Name</th>
<th>Total Books</th>
<th>Created At</th>
</tr>
</thead>
@foreach($catalogs as $key => $catalog)
<tbody>
<tr>
<td>{{$key+1}}</td>
<td>{{ $catalog->name }}</td>
<td>{{ count($catalog->books) }}</td>
<td>{{ date('H:i:s - d M Y', strtotime($catalog->created_at)) }}</td>
@endforeach
</tr>
</tbody>
</table>
</div>

</div>

</div>
</div>
@endsection
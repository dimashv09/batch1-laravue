@extends('layouts.admin')
@section('header', 'Catalog')
@section('content')


<div class="row">
<div class="col-12">
<div class="card">
<div class="card-header">
      <!-- ngga bisa detail -->
    <a href="{{ url('catalogs/create') }}" class="btn btn-primary pull-right">Create New Catalog</a>
   <!-- <a href="{{ url('/create') }}" class="btn btn-primary pull-right">Create New Catalog</a> -->
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
<th>Actions</th>
</tr>
</thead>
@foreach($catalogs as $key => $catalog)
<tbody>
<tr>
<td>{{$key+1}}</td>
<td>{{ $catalog->name }}</td>
<td>{{ count($catalog->books) }}</td>
<td>{{ dateFormat($catalog->created_at) }}</td>
<td>
    <a href="{{ url('catalogs/edit/'.$catalog->id) }}" class="btn btn-warning btn-sm">Edit</a>
    <form action="{{ url('catalogs/delete',['id'=> $catalog->id]) }}" method="post">
        <input class="btn btn-danger btn-sm" type="submit" value="Delete" onclick="return confirm('Are you sure?')">
        @method('delete')
        @csrf
    </form>
</td>
@endforeach
</tr>
</tbody>
</table>
</div>

</div>

</div>
</div>
@endsection
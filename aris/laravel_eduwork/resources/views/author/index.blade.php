@extends('layouts.admin')
@section('header', 'Catalog')
@section('content')
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-header">
      <!-- ngga bisa detail -->
    <a href="{{ route('authors.create') }}" class="btn btn-primary pull-right">Create New Catalog</a>
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
<th>Email</th>
<th>Phone Number</th>
<th>Address</th>
<th>Created At</th>
<th>Actions</th>
</tr>
</thead>
@foreach($authors as $key => $author)
<tbody>
<tr>
<td>{{$key+1}}</td>
<td>{{ $author->name }}</td>
<td>{{ $author->email }}</td>
<td>{{ $author->phone_number }}</td>
<td>{{ $author->address }}</td>
<td>{{ date('H:i:s - d M Y', strtotime($author->created_at)) }}</td>
<td>
    <a href="{{ route('authors.edit',$author->id) }}" class="btn btn-warning btn-sm">Edit</a>
    <form action="{{ url('authors/delete/'. $author->id) }}" method="post">
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
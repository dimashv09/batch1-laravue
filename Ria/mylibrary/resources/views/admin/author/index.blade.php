@extends('layouts.admin')
@section('header', 'Author')

@section('content')
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-header">
<h3 class="card-title">DATA AUTHOR</h3>
<div class="card-tools">
    <a href="{{ url('authors/create') }}" class="btn btn-sm btn-primary pull-left">Create New Author</a>
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
<th class="text-center">Email</th>
<th class="text-center">Phone Number</th>
<th class="text-center">Address</th>
<th class="text-center">Created Date</th>
<th class="text-center">Updated Date</th>
<th class="text-center">Action</th>
</tr>
</thead>
<tbody>
    @foreach($authors as $key => $author)
<tr>
<td class="text-center">{{ $key+1 }}</td>
<td class="text-center">{{ $author->name }}</td>
<td class="text-center">{{ $author->email }}</td>
<td class="text-center">{{ $author->phone_number }}</td>
<td class="text-center">{{ $author->address }}</td>
<td class="text-center">{{ date('H:i:s - d M y', strtotime($author->created_at)) }}</td>
<td class="text-center">{{ date('H:i:s - d M y', strtotime($author->updated_at)) }}</td>
<td class="text-center">
    <a href="{{ url('authors/'.$author->id.'/edit') }}" class="btn btn-warning btn-sm">Edit</a>
    <form action="{{ url('authors', ['id' => $author->id]) }}" method="post">
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
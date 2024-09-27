@extends('layouts.admin')
@section('header','Author')
@section('content')


<html lang="en" style="height: auto;"><head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>AdminLTE 3 | Simple Tables</title>
<div class="row">
<div class="card">
<div class="card-header">
<h3 class="card-title">Data Author</h3>
</br>
    <a href="{{url('authors/create')}}" class="btn btn-sm btn-primary pull-right">Create New Author</a>
</div>

<div class="card-body">
<table class="table table-bordered">
<thead>
<tr>
<th style="width: 10px">ID.</th>
<th class="text-center">Name</th>
<th class="text-center">Email</th>
<th class="text-center">Phone_Number</th>
<th class="text-center">Address</th>
<th class="text-center">Created At</th>
<th class="text-center">Action</th>
</tr>
</thead>
<tbody>
    @foreach($authors as $key => $author)
<tr>
<td>{{ $key+1}}</td>
<td class="text-center">{{$author->name }}</td>
<td class="text-center">{{$author->email }}</td>
<td class="text-center">{{$author->phone_number }}</td>
<td class="text-center">{{$author->address }}</td>
<td class="text-center">{{ date('d/M/Y', strtotime($author->created_at))  }}</td>
<td class="text-center">
    <a href="{{url('authors/'.$author->id.'/edit')}}" class="btn btn-warning btn-sm">Edit</a>
    <form action="{{ url('authors', ['id' => $author->id]) }}"method="post">
        <input class="btn btn-danger btn-sm" type="submit" value="Delete" onclick="return confirm('Are you sure ?')">
        @method('delete')
        @csrf
    </form>
</td>
</tr>
    @endforeach
</tbody>
</table>
</div>

<div class="card-footer clearfix">
</div>
</div>

</body></html>
@endsection
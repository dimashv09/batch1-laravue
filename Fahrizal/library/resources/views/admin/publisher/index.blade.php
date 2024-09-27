@extends('layouts.admin')
@section('header','Publisher')
@section('content')

<html lang="en" style="height: auto;"><head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>AdminLTE 3 | Simple Tables</title>
<div class="row">
<div class="card">
<div class="card-header">
<h3 class="card-title">Data publishers</h3>
</br>
    <a href="{{url('publishers/create')}}" class="btn btn-sm btn-primary pull-right">Create New Publisher</a>
</div>

<div class="card-body">
<table class="table table-bordered">
<thead>
<tr>
<th style="width: 10px">ID.</th>
<th class="text-center">Name</th>
<th class="text-center">Email</th>
<th class="text-center">Phone Number</th>
<th class="text-center">Address</th>
<th class="text-center">Created At</th>
<th class="text-center">Action</th>
</tr>
</thead>
<tbody>
    @foreach($publishers as $key => $publisher)
<tr>
<td>{{ $key+1}}</td>
<td class="text-center">{{$publisher->name }}</td>
<td class="text-center">{{$publisher->email }}</td>
<td class="text-center">{{$publisher->phone_number }}</td>
<td class="text-center">{{$publisher->address }}</td>
<td class="text-center">{{ date('d/M/Y', strtotime($publisher->created_at))  }}</td>
<td class="text-center">
    <a href="{{url('publishers/'.$publisher->id.'/edit')}}" class="btn btn-warning btn-sm">Edit</a>
    
    <form action="{{ url('publishers', ['id' => $publisher->id]) }}"method="post">
        <input class="btn btn-danger btn-sm" type="submit" value="Delete" onclick="return confirm('Are you sure ?')">
        @method('delete')
        @csrf
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
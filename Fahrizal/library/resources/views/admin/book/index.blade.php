@extends('layouts.admin')
@section('header','Book')
@section('content')

<html lang="en" style="height: auto;"><head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>AdminLTE 3 | Simple Tables</title>
<div class="card">
<div class="card-header">
<h3 class="card-title">Data Book</h3>
</br>
    <a href="{{url('books/create')}}" class="btn btn-sm btn-primary pull-right">Create New Book</a>
</div>

<div class="card-body">
<table class="table table-bordered">
<thead>
<tr>
<th style="width: 10px">No.</th>
<th class="text-center">ISBN</th>
<th class="text-center">Tittle</th>
<th class="text-center">Year</th>
<th class="text-center">Publisher Id</th>
<th class="text-center">Author Id</th>
<th class="text-center">Catalog Id</th>
<th class="text-center">Qty</th>
<th class="text-center">Price</th>
<th class="text-center">Created At</th>
<th class="text-center">Action</th>
</tr>
</thead>
<tbody>
    @foreach($books as $key => $book)
<tr>
<td>{{ $key+1}}</td>
<td class="text-center">{{$book->isbn }}</td>
<td class="text-center">{{$book->tittle }}</td>
<td class="text-center">{{$book->year }}</td>
<td class="text-center">{{$book->publisher_id }}</td>
<td class="text-center">{{$book->author_id }}</td>
<td class="text-center">{{$book->catalog_id }}</td>
<td class="text-center">{{$book->qty }}</td>
<td class="text-center">{{$book->price }}</td>
<td class="text-center">{{ date('d/M/Y', strtotime($book->created_at))  }}</td>
<td class="text-center">

<a href="{{url('books/'.$book->id.'/edit')}}" class="btn btn-warning btn-sm">Edit</a>

    <form action="{{ url('books', ['id' => $book->id]) }}"method="post">
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
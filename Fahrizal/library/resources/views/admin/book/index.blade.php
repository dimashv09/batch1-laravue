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
</tr>
</thead>
<tbody>
    @foreach($books as $key => $books)
<tr>
<td>{{ $key+1}}</td>
<td class="text-center">{{$books->isbn }}</td>
<td class="text-center">{{$books->tittle }}</td>
<td class="text-center">{{$books->year }}</td>
<td class="text-center">{{$books->publisher_id }}</td>
<td class="text-center">{{$books->author_id }}</td>
<td class="text-center">{{$books->catalog_id }}</td>
<td class="text-center">{{$books->qty }}</td>
<td class="text-center">{{$books->price }}</td>
<td class="text-center">{{ date('d/M/Y', strtotime($books->created_at))  }}</td>
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
@extends('layouts.admin')
@section('header','Transaction')
@section('content')

<html lang="en" style="height: auto;"><head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>AdminLTE 3 | Simple Tables</title>
<div class="card">
<div class="card-header">
<h3 class="card-title">Data Transaction</h3>
</br>
    <a href="{{url('transactions/create')}}" class="btn btn-sm btn-primary pull-right">Create New Transaction</a>
</div>

<div class="card-body">
<table class="table table-bordered">
<thead>
<tr>
<th style="width: 10px">No.</th>
<th class="text-center">Date Start</th>
<th class="text-center">Date End</th>
<th class="text-center">Member Id</th>
<th class="text-center">Qty</th>
<th class="text-center">Created At</th>
<th class="text-center">Action</th>
</tr>
</thead>
<tbody>
    @foreach($transactions as $key => $transaction)
<tr>
<td>{{ $key+1}}</td>
<td class="text-center">{{$transaction->date_start }}</td>
<td class="text-center">{{$transaction->date_end }}</td>
<td class="text-center">{{$transaction->member_id }}</td>
<td class="text-center">{{$transaction->qty }}</td>
<td class="text-center">{{ date('d/M/Y', strtotime($transaction->created_at))  }}</td>
<td class="text-center">  
<a href="{{url('transactions/'.$transaction->id.'/edit')}}" class="btn btn-warning btn-sm">Edit</a>

    <form action="{{ url('transactions', ['id' => $transaction->id]) }}"method="post">
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
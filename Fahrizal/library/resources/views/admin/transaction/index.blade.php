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
</tr>
</thead>
<tbody>
    @foreach($transactions as $key => $transactions)
<tr>
<td>{{ $key+1}}</td>
<td class="text-center">{{$transactions->date_start }}</td>
<td class="text-center">{{$transactions->date_end }}</td>
<td class="text-center">{{$transactions->member_id }}</td>
<td class="text-center">{{$transactions->qty }}</td>
<td class="text-center">{{ date('d/M/Y', strtotime($transactions->created_at))  }}</td>
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
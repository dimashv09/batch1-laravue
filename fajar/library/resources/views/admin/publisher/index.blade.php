@extends('layouts.admin')

@section('header', 'Publisher')


@push('table')
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#pbls').DataTable();
    });

</script>
@endpush

@push('styleTable')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
@endpush


@section('content')

<div class="card">
    <div class="card-header">
        <a href="{{url('publisher/create')}}" class="btn btn-sm btn-primary pull-right"><i class="fas fa-plus fa-sm text-white-50"></i> Create New Publisher</a>
    </div>

    <div class="card-body">
        <div>
            <table id="pbls" class="table table-bordered table-striped table-responsive-sm">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Phone Number</th>
                        <th class="text-center">Address</th>
                        <th class="text-center">Total Book</th>
                        <th class="text-center">Created At</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($publishers as $key=> $publisher)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$publisher->name}}</td>
                        <td>{{$publisher->email}}</td>
                        <td>{{$publisher->phone_number}}</td>
                        <td>{{$publisher->address}}</td>
                        <td class="text-center">{{count($publisher->books)}}</td>
                        <td>{{date("d M Y , H:i:s",strtotime($publisher->created_at))}}</td>
                        <td style="width:100px">
                            <a href="{{route('publisher.edit',$publisher->id)}}" class="btn btn-warning btn-sm">
                                <i class="fa fa-pencil-alt"></i>
                            </a>
                            <form action="{{route('publisher.destroy', $publisher->id)}}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <button class="btn btn-sm btn-danger" type="submit" value="Delete" onclick="return confirm('Are you sure?')">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

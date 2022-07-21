@extends('layouts.admin')
@section('title')
Member
@endsection
@section('content')
<div class="row">
    <div class="col-md-9">
        <div class="card">
            <div class="card-header">
                <a href="{{ url('members/create') }}" class="btn btn-primary btn-sm"><span class="fas fa-plus"></span>
                    Add New Member</a>
            </div>

            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Phone</th>
                            <th class="text-center" style="width: 100px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($members as $key => $member)
                        <tr>
                            <td class="text-center">{{ $key+1 }}</td>
                            <td>{{ ucwords($member->name) }}</td>
                            <td>{{ $member->email }}</td>
                            <td>{{ $member->phone }}</td>
                            <td class="text-center">
                                <a href="{{ url('members/'. $member->id .'/edit') }}"
                                    class="btn btn-warning btn-sm">edit</a>
                                <form action="{{ url('members', ['id' => $member->id]) }}" method="post">
                                    <input type="submit" onclick="return confirm('Are you sure?')"
                                        class="btn btn-danger btn-sm" value="delete">
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
                <ul class="pagination pagination-sm m-0 float-right">
                    <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

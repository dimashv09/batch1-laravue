@extends('layouts.admin');
@section('header','Author')

@section('content')
<div class="col-md">
    <div class="card">
        <div class="card-header">
            <a href="{{ url('authors/create') }}" class="btn btn-primary btn-sm pull-right">Create New Author</a>
        </div>

        <div class="card-body p-0">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10px">No</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Phone Number</th>
                        <th class="text-center">Address</th>
                        <th class="text-center">Total</th>
                        <th class="text-center">Created_at</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                @foreach ($authors as $key => $author)
                <tbody>
                    <tr>
                        <td class="text-center">{{ $key+1 }}</td>
                        <td class="text-center">{{ $author->name }}</td>
                        <td class="text-center">{{ $author->email }}</td>
                        <td class="text-center">{{ $author->phone_number }}</td>
                        <td class="text-center">{{ $author->address }}</td>
                        <td class="text-center">{{ count($author->books) }}</td>
                        <td class="text-center">{{ date('d M Y', strtotime($author->created_at)) }}</td>
                        <td class="text-center d-flex align-items-center justify-content-center">
                            <a href="{{ url('publishers/'.$author->id.'/edit') }}" class="btn btn-warning btn-md mr-2">Edit</a>
                            <form action="{{ url('publishers',['id' => $author->id]) }}" method="POST">
                                <input type="submit" class="btn btn-danger btn-md mt-3" value="Delete" onclick="return confirm('Are you sure?')">
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
@endsection

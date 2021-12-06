@extends('layouts.admin')

@section('header', 'Publisher')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <div class="card-header">
                <a href="{{ route('publishers.create') }}" class="btn btn-primary">Add new Publisher</a>

                <div class="card-tools">
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
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Address</th>
                            <th class="text-center">Total of Books</th>
                            <th class="text-center">Join Date</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($publishers as $publisher)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $publisher->name }}</td>
                            <td>{{ $publisher->email }}</td>
                            <td>{{ $publisher->phone_number }}</td>
                            <td>{{ $publisher->address }}</td>
                            <td class="text-center">{{ count($publisher->books) }}</td>
                            <td class="text-center">{{ date('d M Y', strtotime($publisher->created_at)) }}</td>
                            <td class="text-center">
                                <a href="{{ route("publishers.edit", $publisher->id) }}" class="badge bg-warning p-2">
                                    edit</a>

                                <form action="{{ route("publishers.destroy", $publisher->id) }}" method="post"
                                    class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="badge bg-danger p-2 border-0"
                                        onclick=" return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->
@endsection

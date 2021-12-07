@extends('layouts.admin')

@section('header', 'Author')

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
                <a href="{{ route('authors.create') }}" class="btn btn-primary">Add new Author</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="align-middle" style="width: 10px;">#</th>
                            <th class="align-middle">Name</th>
                            <th class="align-middle">Email</th>
                            <th class="align-middle">Phone Number</th>
                            <th class="align-middle">Address</th>
                            <th class="align-middle">Total of Books</th>
                            <th class="align-middle">Join Date</th>
                            <th class="align-middle text-center" style="width: 130px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($authors as $author)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $author->name }}</td>
                            <td>{{ $author->email }}</td>
                            <td>{{ $author->phone_number }}</td>
                            <td>{{ $author->address }}</td>
                            <td>{{ count($author->books) }}</td>
                            <td>{{ date('d M Y', strtotime($author->created_at)) }}</td>
                            <td>
                                <a href="{{ route("authors.edit", $author->id) }}" class="badge bg-warning p-2 mb-2">
                                    edit</a>

                                <form action="{{ route("authors.destroy", $author->id) }}" method="post"
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
        </div>
    </div>
</div>
@endsection

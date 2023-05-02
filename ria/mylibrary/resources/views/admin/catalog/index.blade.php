@extends('layouts.admin')

@section('header', 'Catalog')

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
                <a href="{{ route('catalogs.create') }}" class="btn btn-primary">Create new Catalog</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="align-middle" style="width: 10px;">#</th>
                            <th class="align-middle">Name</th>
                            <th class="align-middle">Total of Books</th>
                            {{-- <th>Create Date1</th> --}}
                            {{-- <th>Create Date2</th> --}}
                            <th class="align-middle">Create Date</th>
                            <th class="align-middle text-center" style="width: 130px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($catalogs as $catalog)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $catalog->name }}</td>
                            <td>{{ count($catalog->books) }}</td>
                            {{-- <td>{{ $catalog->created_at->diffForHumans() }}</td> --}}
                            {{-- <td>{{ $catalog->created_at->isoFormat('dddd D') }}</td> --}}
                            <td>{{ date('d M Y', strtotime($catalog->created_at)) }}</td>
                            <td class="text-center">
                                <a href="{{ route("catalogs.edit",$catalog->id) }}" class="badge bg-warning p-2 mb-2">
                                    edit</a>

                                <form action="{{ route("catalogs.destroy", $catalog->id) }}" method="post"
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
</div>
@endsection
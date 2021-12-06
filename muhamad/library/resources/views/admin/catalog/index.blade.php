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
                            <th class="text-center">Total of Books</th>
                            {{-- <th class="text-center">Create Date1</th> --}}
                            {{-- <th class="text-center">Create Date2</th> --}}
                            <th class="text-center">Create Date</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($catalogs as $catalog)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $catalog->name }}</td>
                            <td class="text-center">{{ count($catalog->books) }}</td>
                            {{-- <td class="text-center">{{ $catalog->created_at->diffForHumans() }}</td> --}}
                            {{-- <td class="text-center">{{ $catalog->created_at->isoFormat('dddd D') }}</td> --}}
                            <td class="text-center">{{ date('d M Y', strtotime($catalog->created_at)) }}</td>
                            <td class="text-center">
                                <a href="{{ route("catalogs.edit",$catalog->id) }}" class="badge bg-warning p-2">
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
    <!-- /.col -->
</div>
<!-- /.row -->
@endsection

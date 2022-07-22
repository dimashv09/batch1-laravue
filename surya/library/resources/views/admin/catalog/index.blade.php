@extends('layouts.admin')
@section('title')
Catalog
@endsection
@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <a href="{{ url('catalogs/create') }}" class="btn btn-primary btn-sm"><span class="fas fa-plus"></span>
                    Add New Catalog</a>
            </div>

            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Total Books</th>
                            <th class="text-center">Created at</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($catalogs as $key => $catalog)
                        <tr>
                            <td class="text-center">{{ $key+1 }}</td>
                            <td>{{ $catalog->name }}</td>
                            <td class="text-center">{{ count($catalog->books) }}</td>
                            <td class="text-center">{{ dateFormat($catalog->created_at) }}</td>
                            <td class="text-center">
                                <a href="{{ url('catalogs/'. $catalog->id .'/edit') }}"
                                    class="btn btn-warning btn-sm">edit</a>
                                <form action="{{ url('catalogs', ['id' => $catalog->id]) }}" method="post">
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

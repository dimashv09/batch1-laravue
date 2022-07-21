@extends('layouts.admin')
@section('title')
Author
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">List of Author</h3>
            </div>

            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Phone</th>
                            <th class="text-center">Have a Book</th>
                            <th class="text-center" style="width: 100px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($authors as $key => $author)
                        <tr>
                            <td class="text-center">{{ $key+1 }}</td>
                            <td>{{ $author->name }}</td>
                            <td>{{ $author->email }}</td>
                            <td>{{ $author->phone }}</td>
                            <td class="text-center">{{ count($author->books) }}</td>
                            <td class="text-center">
                                <a href="#" class="btn btn-danger btn-sm"><span class="fas fa-trash"></span></a>
                                <a href="#" class="btn btn-warning btn-sm"><span class="fas fa-edit"></span></a>
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

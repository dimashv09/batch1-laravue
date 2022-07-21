@extends('layouts.admin')
@section('title')
Book
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">List of Book</h3>
            </div>

            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th class="text-center">ISBN</th>
                            <th class="text-center">Title</th>
                            <th class="text-center">Year</th>
                            <th class="text-center">Author</th>
                            <th class="text-center">Publisher</th>
                            <th class="text-center">Catalog</th>
                            <th class="text-center" style="width: 100px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($books as $key => $book)
                        <tr>
                            <td class="text-center">{{ $key+1 }}</td>
                            <td>{{ $book->isbn }}</td>
                            <td>{{ $book->title }}</td>
                            <td class="text-center">{{ $book->year }}</td>
                            <td class="text-center">{{ $book->author_id }}</td>
                            <td class="text-center">{{ $book->publisher_id }}</td>
                            <td class="text-center">{{ $book->catalog_id }}</td>
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

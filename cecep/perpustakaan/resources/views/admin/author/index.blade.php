@extends('layouts.admin')
@section('header', 'Author')

@section('content')
<div class="row">
    <div class="col-md-10">
        <div class="card">
          <div class="card-header">
                <a href="{{ url('authors/create') }}" class="btn btn-sm btn-primary pull-right">Create New Author</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">No</th>
                      <th class="text-center">Name</th>
                      <th class="text-center">Email</th>
                      <th class="text-center">Phone Number</th>
                      <th class="text-center">Address</th>
                      <th class="text-center">Created at</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($authors as $key => $author)
                    <tr>
                      <td>{{ $key+1 }}</td>
                      <td>{{ $author->name }}</td>
                      <td>{{ $author->email }}</td>
                      <td>{{ $author->phone_number }}</td>
                      <td>{{ $author->address }}</td>
                      <td class="text-center">{{ date('d-m-y', strtotime($author->created_at)) }}</td>
                      <td class="text-center">
                        <a href="{{ url('authors/'.$author->id.'/edit') }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ url('authors', ['id' => $author->id]) }}" method="post">
                          <input class="btn btn-danger btn-sm" type="submit" value="Delete" onclick="return confirm('Are you sure?')">
                          @method('delete')
                          @csrf
                        </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <!-- <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
                </div> -->
        </div>
    </div>
</div>
@endsection
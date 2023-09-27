@extends('layouts.admin')
@section('header', 'Catalog')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
          <div class="card-header">
                <a href="{{ url('catalogs/create') }}" class="btn btn-sm btn-primary pull-right">Create New Catalog</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">No</th>
                      <th class="text-center">Name</th>
                      <th class="text-center">Books</th>
                      <th class="text-center">Created at</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($catalogs as $key => $catalog)
                    <tr>
                      <td>{{ $key+1 }}</td>
                      <td>{{ $catalog->name }}</td>
                      <td class="text-center">{{ count($catalog->books) }}</td>
                      <td class="text-center">{{ convert_date($catalog->created_at) }}</td>
                      <td class="text-center">
                        <a href="{{ url('print_catalog/'.$catalog->id.'/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                        
                        <a href="{{ url('catalogs/'.$catalog->id) }}" class="btn btn-primary btn-sm" target="_blank">Print</a>

                        <form action="{{ url('catalogs', ['id' => $catalog->id]) }}" method="post">
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



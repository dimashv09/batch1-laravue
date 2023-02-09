@extends('layouts.admin');
@section('header','Publisher')

@section('content')
    <div class="col-md">
        <div class="card">
            <div class="card-header">
                <a href="{{ url('publishers/create') }}" class="btn btn-primary">Create New Publisher</a>
            </div>
            <!-- /.card-header -->
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
                    @foreach ($publishers as $key => $publisher)
                    <tbody>
                        <tr>
                            <td class="text-center">{{ $key+1 }}</td>
                            <td class="text-center">{{ $publisher->name }}</td>
                            <td class="text-center">{{ $publisher->email }}</td>
                            <td class="text-center">{{ $publisher->phone_number }}</td>
                            <td class="text-center">{{ $publisher->address }}</td>
                            <td class="text-center">{{ count($publisher->books) }}</td>
                            <td class="text-center">{{ date('d M Y', strtotime($publisher->created_at)) }}</td>
                            <td class="text-center d-flex align-items-center justify-content-center">
                                <a href="{{ url('publishers/'.$publisher->id.'/edit') }}" class="btn btn-warning btn-md mr-2">Edit</a>
                                <form action="{{ url('publishers',['id' => $publisher->id]) }}" method="POST">
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
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
  </div>
</div>

@endsection

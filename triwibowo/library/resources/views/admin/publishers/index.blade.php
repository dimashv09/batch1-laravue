@extends('layouts.admin')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <div>
                        <a href="{{ url('publishers/create') }}" class="btn btn-sm btn-primary pull-right">Create New
                            Publisher</a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline"
                                    role="grid" aria-describedby="example1_info">
                                    <thead>
                                        <tr role="row" class="text-center">
                                            <th>
                                                Nomor
                                            </th>
                                            <th>
                                                Name
                                            </th>
                                            <th>
                                                Email
                                            </th>
                                            <th>
                                                Phone Number
                                            </th>
                                            <th>
                                                Address
                                            </th>
                                            <th>
                                                Total Book
                                            </th>
                                            <th>
                                                Created at
                                            </th>
                                            <th>
                                                Action
                                            </th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($publishers as $key => $publisher)
                                            <tr class="odd">
                                                <td class="text-center">{{ $key + 1 }}</td>
                                                <td>{{ $publisher->name }}</td>
                                                <td class="text-center">{{ $publisher->email }}</td>
                                                <td class="text-center">{{ $publisher->phone_number }}</td>
                                                <td class="text-center">{{ $publisher->address }}</td>
                                                <td class="text-center">{{ COUNT($publisher->books) }}</td>
                                                <td class="text-center">
                                                    {{ date('d/m/Y', strtotime($publisher->created_at)) }}
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ url('publishers/' . $publisher->id . '/edit') }}"
                                                        class="btn btn-sm btn-warning">Edit</a>

                                                    <form class="d-inline-flex p-2 bd-highlight"
                                                        action="{{ url('publishers', ['id' => $publisher->id]) }}"
                                                        method="POST">
                                                        <input class="btn btn-sm btn-danger" type="submit" value="Delete"
                                                            onclick="return confirm('Are you sure ?')">
                                                        @method('delete')
                                                        @csrf
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
                <!-- /.card-body -->
            </div>
        </div>
    </div>

@endsection

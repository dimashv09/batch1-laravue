@extends('layouts.admin')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <div>
                        <a href="{{ url('authors/create') }}" class="btn btn-sm btn-primary pull-right">Create New
                            author</a>
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
                                        @foreach ($authors as $key => $author)
                                            <tr class="odd">
                                                <td class="text-center">{{ $key + 1 }}</td>
                                                <td>{{ $author->name }}</td>
                                                <td class="text-center">{{ $author->email }}</td>
                                                <td class="text-center">{{ $author->phone_number }}</td>
                                                <td class="text-center">{{ $author->address }}</td>
                                                <td class="text-center">{{ COUNT($author->books) }}</td>
                                                <td class="text-center">
                                                    {{ date('d/m/Y', strtotime($author->created_at)) }}
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ url('authors/' . $author->id . '/edit') }}"
                                                        class="btn btn-sm btn-warning">Edit</a>

                                                    <form class="d-inline-flex p-2 bd-highlight"
                                                        action="{{ url('authors', ['id' => $author->id]) }}"
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

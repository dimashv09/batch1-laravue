@extends('layouts.admin')

@section('content')

    <div class="card">
        <div class="card-header">
            <div>
                <a href="{{ url('catalogs/create') }}" class="btn btn-sm btn-primary pull-right">Create New Catalog</a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid"
                            aria-describedby="example1_info">
                            <thead>
                                <tr role="row" class="text-center">
                                    <th>
                                        Nomor
                                    </th>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Total Books
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
                                @foreach ($catalogs as $key => $catalog)
                                    <tr class="odd">
                                        <td class="text-center">{{ $key + 1 }}</td>
                                        <td>{{ $catalog->name }}</td>
                                        <td class="text-center">{{ COUNT($catalog->books) }}</td>
                                        <td class="text-center">{{ date('d/m/Y', strtotime($catalog->created_at)) }}
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ url('catalogs/' . $catalog->id . '/edit') }}"
                                                class="btn btn-sm btn-warning">Edit</a>

                                            <form class="d-inline-flex p-2 bd-highlight"
                                                action="{{ url('catalogs', ['id' => $catalog->id]) }}" method="POST">
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


@endsection

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
                {{-- <div class="row">
                    <div class="col-sm-12 col-md-5">
                        <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 10 of
                            57 entries</div>
                    </div>
                    <div class="col-sm-12 col-md-7">
                        <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                            <ul class="pagination">
                                <li class="paginate_button page-item previous disabled" id="example1_previous"><a href="#"
                                        aria-controls="example1" data-dt-idx="0" tabindex="0"
                                        class="page-link">Previous</a></li>
                                <li class="paginate_button page-item active"><a href="#" aria-controls="example1"
                                        data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="2"
                                        tabindex="0" class="page-link">2</a></li>
                                <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="3"
                                        tabindex="0" class="page-link">3</a></li>
                                <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="4"
                                        tabindex="0" class="page-link">4</a></li>
                                <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="5"
                                        tabindex="0" class="page-link">5</a></li>
                                <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="6"
                                        tabindex="0" class="page-link">6</a></li>
                                <li class="paginate_button page-item next" id="example1_next"><a href="#"
                                        aria-controls="example1" data-dt-idx="7" tabindex="0"
                                        class="page-link">Next</a></li>
                            </ul>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
        <!-- /.card-body -->
    </div>


@endsection

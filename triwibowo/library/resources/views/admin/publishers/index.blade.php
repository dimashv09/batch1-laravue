@extends('layouts.admin')

@section('css')

@endsection
@section('content')
    <div id="controller">
        <div class="content-header">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <div>
                            <a href="#" @click="addData()" class="btn btn-sm btn-primary pull-right">Create New
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
                                                <th>Nomor</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone Number</th>
                                                <th>Address</th>
                                                <th>Total Book</th>
                                                <th>Created at</th>
                                                <th>Action</th>
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
                                                        <a href="#" @click="editData({{ $publisher }})"
                                                            class="btn btn-sm btn-warning">Edit</a>
                                                        <a href="#" @click="deleteData({{ $publisher->id }})"
                                                            class="btn btn-sm btn-danger">Delete</a>
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

        <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post" :action="actionUrl" autocomplete="off">
                        <div class="modal-header">

                            <h4 class="modal-title">@{{ judul }}</h4>

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @csrf

                            <input type="hidden" name="_method" value="PUT" v-if="editStatus">
                            {{-- name --}}
                            <div class="form-floating mb-3">
                                <input type="text" name="name" class="form-control" id="floatingInput"
                                    placeholder=" Input your name" :value="data.name">
                            </div>
                            {{-- email --}}
                            <div class="form-floating mb-3">
                                <input type="text" name="email" class="form-control" id="floatingInput"
                                    placeholder="Input email example@email.com" :value="data.email">
                            </div>
                            {{-- phone number --}}
                            <div class="form-floating mb-3">
                                <input type="text" name="phone_number" class="form-control" id="floatingInput"
                                    placeholder="Input phone number" :value="data.phone_number">
                            </div>
                            {{-- address --}}
                            <div class="form-floating mb-3">
                                <input type="text" name="address" class="form-control" id="floatingInput"
                                    placeholder="Input address" :value="data.address">
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    </div>

@endsection
@section('js')

    <script type="text/javascript">
        var controller = new Vue({
            el: '#controller',
            data: {
                data: {},
                actionUrl: '{{ url('publishers') }}',
                editStatus: false,
                judul: ''
            },
            mounted: function() {

            },
            methods: {
                addData() {
                    this.data = {};
                    this.actionUrl = '{{ url('publishers') }}';
                    this.editStatus = false;
                    this.judul = 'Create New Publisher';
                    $('#modal-default').modal();
                },
                editData(data) {
                    this.data = data;
                    this.actionUrl = '{{ url('publishers') }}' + '/' + data.id;
                    this.editStatus = true;
                    this.judul = 'Edit Publisher';
                    $('#modal-default').modal();
                },
                deleteData(id) {
                    this.actionUrl = '{{ url('publishers') }}' + '/' + id;
                    if (confirm("Are you sure ?")) {
                        axios.post(this.actionUrl, {
                            _method: 'DELETE'
                        }).then(response => {
                            location.reload();
                        })
                    }
                }
            }
        });
    </script>
@endsection

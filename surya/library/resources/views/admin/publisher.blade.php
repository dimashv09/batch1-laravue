@extends('layouts.admin')
@section('title', 'Publisher')
@section('css')

@endsection

@section('content')
<div id="controller">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <button type="button" @click="addData()" class="btn btn-primary btn-sm"><span
                            class="fas fa-plus"></span>
                        Add New Publisher</button>
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Phone</th>
                                <th class="text-center">Address</th>
                                <th class="text-center" style="width: 150px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($publishers as $key => $publisher)
                            <tr>
                                <td class="text-center">{{ $key+1 }}</td>
                                <td>{{ $publisher->name }}</td>
                                <td>{{ $publisher->email }}</td>
                                <td>{{ $publisher->phone }}</td>
                                <td>{{ $publisher->address }}</td>
                                <td class="text-center">
                                    <a href="#" @click="editData({{ $publisher }})" class="btn btn-warning btn-sm"><span class="fas fa-edit"></span></a>
                                    <a href="#" @click="deleteData({{ $publisher->id }})" class="btn btn-danger btn-sm"><span class="fas fa-trash"></span></a>
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
    {{-- Modal --}}
    <div class="modal fade" id="modal-publisher">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add New Publisher</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form :action="actionUrl" method="post">
                    @csrf
                    {{-- Hanya muncul ketika edit --}}
                    <input type="hidden" name="_method" value="PUT" v-if="editStatus">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input class="form-control" type="text" name="name" :value="data.name" id="">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input class="form-control" type="email" name="email" :value="data.email" id="">
                        </div>
                        <div class="form-group">
                            <label for="">Phone</label>
                            <input class="form-control" type="number" name="phone" :value="data.phone" id="">
                        </div>
                        <div class="form-group">
                            <label for="">Address</label>
                            <input class="form-control" type="text" name="address" :value="data.address" id="">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><span
                                class="fas fa-ban"></span> Close</button>
                        <button type="submit" class="btn btn-primary btn-sm"><span class="fas fa-save"></span>
                            Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')

    <script type="text/javascript">
        var controller = new Vue({
            el: '#controller',
            data: {
                data: {},
                actionUrl: '{{ url('publishers') }}',
                editStatus: false //Tambahan ketika mau edit data
            },
            mounted: function () {

            },
            methods: {
                addData() {
                    this.data = {};
                    this.actionUrl = '{{ url('publishers') }}';
                    this.editStatus = false;
                    $('#modal-publisher').modal();
                },
                editData(data) {
                    this.data = data;
                    this.actionUrl = '{{ url('publishers') }}'+'/'+data.id;
                    this.editStatus = true;
                    $('#modal-publisher').modal();
                },
                deleteData(id) {
                    this.actionUrl = '{{ url('publishers') }}'+'/'+id;
                    if (confirm("Are you sure?")) {
                        axios.post(this.actionUrl, {_method: 'DELETE'}).then(response => {
                            location.reload();
                        });
                    }
                }
            },
        })

    </script>
@endsection

@extends('layouts.admin')

@section('header', 'Publisher')


@push('table')
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#pbls').DataTable();
    });

</script>
@endpush

@push('styleTable')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
@endpush


@section('content')

<div id="controller">
    <div class="card">
        <div class="card-header">
            <a href="#" @click="addData()" class="btn btn-sm btn-primary pull-right"><i
                    class="fas fa-plus fa-sm text-white-50"></i> Create New publisher</a>
        </div>

        <div class="card-body">
            <div>
                <table id="pbls" class="table table-bordered table-striped table-responsive-sm">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Phone Number</th>
                            <th class="text-center">Address</th>
                            <th class="text-center">Total Book</th>
                            <th class="text-center">Created At</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($publishers as $key=> $publisher)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$publisher->name}}</td>
                            <td>{{$publisher->email}}</td>
                            <td>{{$publisher->phone_number}}</td>
                            <td>{{$publisher->address}}</td>
                            <td class="text-center">{{count($publisher->books)}}</td>
                            <td>{{date("d M Y , H:i:s",strtotime($publisher->created_at))}}</td>
                            <td style="width:100px">
                                <a href="#" @click="editData({{ $publisher }})" class="btn btn-warning btn-sm">
                                    <i class="fa fa-pencil-alt"></i>
                                </a>
                                <a @click="deleteData({{ $publisher->id }})" class="btn btn-sm btn-danger">
                                    <i class="fa fa-trash"></i>
                                </a>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" :action="actionUrl">
                    <div class="modal-header">
                        <h4 class="modal-title">publisher</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="_method" value="PUT" v-if="editStatus">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Name"
                                :value="data.name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter Email" required
                                :value="data.email">
                        </div>
                        <div class="form-group">
                            <label for="phone_number">Phone Number</label>
                            <input type="text" name="phone_number" class="form-control" placeholder="Enter Phone Number"
                                required :value="data.phone_number">
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea class="form-control" name="address" id="exampleFormControlTextarea3" rows="7"
                                :value="data.address"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
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
            actionUrl: '{{url('publisher')}}',
            editStatus: false
        },
        mounted: function() {

        },
        methods: {
            addData() {
                this.data = {};
                this.actionUrl = '{{url('publisher')}}';
                this.editStatus= false;
                $('#modal-default').modal();
            },
            editData(data) {
                this.data = data;
                this.actionUrl = '{{url('publisher')}}'+'/'+data.id;
                this.editStatus= true;
                $('#modal-default').modal();
            },
            deleteData(id) {
                this.actionUrl = '{{url ('publisher') }}'+'/'+id;
                if (confirm("Are You Sure ??")){
                    axios.post(this.actionUrl, {_method: 'Delete'}).then(response =>{
                        location.reload();
                    })
                }
            }
        }

    });

</script>
@endsection
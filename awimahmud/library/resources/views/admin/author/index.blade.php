@extends('layouts.admin')
@section('header','Author')

@section('css')

@endsection
@section('content')
<div id="controller">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="#" @click="addData()" class="btn btn-primary btn-sm pull-right" >Create New Author</a>
                </div>

                <div class="card-body p-0">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 10px">No</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Phone Number</th>
                                <th class="text-center">Address</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        @foreach ($authors as $key => $author)
                        <tbody>
                            <tr>
                                <td class="text-center">{{ $key+1 }}</td>
                                <td class="text-center">{{ $author->name }}</td>
                                <td class="text-center">{{ $author->email }}</td>
                                <td class="text-center">{{ $author->phone_number }}</td>
                                <td class="text-center">{{ $author->address }}</td>
                                <td class="text-center d-flex align-items-center justify-content-center">
                                    <a href="#" @click="editData({{ $author }})" class="btn btn-warning btn-md mr-2">Edit</a>
                                    <a href="#" @click="deleteData({{ $author->id }})" class="btn btn-danger btn-md mr-2">Delete</a>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <form :action="actionUrl" method="post">
                    <div class="modal-header">
                        <h4 class="modal-title">Create New Data</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="_method" value="PUT" v-if="editStatus">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" :value="data.name" name="name" placeholder="Enter name" required="">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" :value="data.email" name="email" placeholder="Enter email" required="">
                        </div>
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="number" class="form-control" :value="data.phone_number" name="phone_number" placeholder="Enter phone number" required="">
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea class="form-control" name="address" :value="data.address" row="4" cols="5" placeholder="Enter address" required=""></textarea>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-end">
                        <button type="button" class="btn btn-secondary mr-3" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
            </div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</div>

@endsection
@section('js')
<script type="text/javascript">
const controller = {
    data() {
        return {
            data: {},
            actionUrl: '{{ url('authors') }}',
            editStatus: false
        }
    },
     methods: {
            addData() {
                this.data = {};
                this.actionUrl = '{{ url('authors') }}';
                this.editStatus = false;
                $('#modal-default').modal();
            },
            
            editData(data) {
                this.data = data;
                this.actionUrl = '{{ url('authors') }}'+'/'+data.id;
                this.editStatus = true;
                $('#modal-default').modal();
            },
            deleteData(id) {
                this.actionUrl = '{{ url('authors') }}'+'/'+id;
                if(confirm("Are you sure ?")) {
                    axios.post(this.actionUrl, {_method: 'DELETE'}).then(response => {
                        location.reload();
                    });
                }
            },

        },
}
Vue.createApp(controller).mount('#controller')

/*   var controller = new Vue({
        el: '#controller',
        data: {
            data: {},
            actionUrl: '{{ url('authors') }}'
        },
        mounted: function() {

        },
        methods: {
            addData() {
                $('#modal-default').modal();
            },
            
            editData() {

            },
            deleteData() {

            },

        },
    });
    */
</script>
@endsection

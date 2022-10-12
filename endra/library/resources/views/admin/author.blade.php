@extends('layouts.admin')
@section('header', 'Author' )

@section('css')

@endsection

@section('content')
<div id="controller">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="#" @click="addData()" class="btn btn-sm btn-primary pull-right">Create New Catalog</a>
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 30px">No.</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Phone Number</th>
                                <th class="text-center">Address</th>
                                <th class="text-center">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($authors as $key => $author)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $author->name }}</td>
                                <td class="text-center">{{ $author->email }}</td>
                                <td class="text-center">{{ $author->phone_number }}</td>
                                <td>{{ $author->address }}</td>
                                <td class="text-right">
                                    <a href="#" @click="editData()" class="btn btn-sm btn-warning">Edit</a>
                                    <a href="{{ url('authors/'.$author->id.'/edit') }}" class="btn btn-sm btn-denger ">Delete</a>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="{{ url('authors') }}" autocomplete="off">
                    <div class="modal-header">

                        <h4 class="modal-title">Author</h4>
                        <button type="button" class="close" data-dissmiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf

                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" value="" required="">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" name="email" value="" required="">
                        </div>
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="text" class="form-control" name="phone_number" value="" required="">
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" class="form-control" name="address" value="" required="">
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dissmiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save change</button>
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
            actionUrl: '{{ url('
            authors ') }}'

        },
        mounted: fuction() {

        },
        methods: {
            addData() {
                $('#modal-default').modal();
            },
            editData() {
                $('#modal-default').modal();
            },
            deleteData() {

            }
        }
    });
</script>

@endsection
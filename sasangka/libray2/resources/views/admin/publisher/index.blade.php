@extends('layouts.admin')
@section('title', 'Publishers')
@section('wrapper-title', 'Publishers')

@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('content')
    <div class="container" id="publisherVue">
        <div class="row">
            <div class="card w-100 overflow-auto">
                <div class="card-header">
                    <a href="#" @click="addData()" class="btn btn-sm btn-primary">Create new publisher</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="dataTable" class="table table-bordered table-striped w-100">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Address</th>
                                {{-- <th>Total Books</th>
                                <th>created at</th> --}}
                                <th>Actions</th>
                                <th style="text-align:center"> CRUD</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($publishers as $key => $publisher)
                            <tr>
                                <td>{{ $key+1}}</td>
                                
                                <td>{{ $publisher->name }}</td>
                                <td>{{ $publisher->email }}</td>
                                <td>{{ $publisher->phone_number }}</td>
                                <td>{{ $publisher->address }}</td>
                                <td style="text-align: center">
                                    {{ count($publisher->books) }}</td>

                                
                                <td class="d-flex" style="gap: .5rem">
                                    <a href="#" @click="editData({{ $publisher }})"  class="btn btn-sm btn-warning text-white">Edit</a>
                                    <a href="#" @click="deleteData({{ $publisher->id }})"  class="btn btn-sm btn-danger text-white">Delete</a>
                                </td>
                            </tr>   
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>

     
@endsection
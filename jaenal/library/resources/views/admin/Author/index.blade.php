@extends('layouts.admin')
@section('header', 'Author');

@section('content')
<div class="row">
    <div class="col-12">
    <div class="card">
    <div class="card-header">
    <a href="#"class="btn btn-sm btn-primary pull-right">Create New Author</a>
    <div class="card-tools">
    <div class="input-group input-group-sm" style="width: 150px;">
    <input type="text" Name="table_search" class="form-control float-right" placeholder="Mencari">
    <div class="input-group-append">
    <button type="submit" class="btn btn-default">
    <i class="fas fa-search"></i>
    </button>
    </div>
    </div>
    </div>
    </div>
    
    <div class="card-body table-responsive p-0">
     <table class="table table-hover text-nowrap">
    <thead>
    <tr>
    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">ID</font></font></th>
    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Name</font></font></th>
    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Email</font></font></th>
    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Phone Number</font></font></th>
    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Address</font></font></th>
    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Action</font></font></th>
    </tr>
    </thead>
    <tbody>
        @foreach ($Authors as $key => $Author)
            
        
    <tr>
    <td>{{$key+1}}</td>
    <td>{{$Author->name}}</td>
    <td>{{$Author->email}}</td>
    <td>{{$Author->phone_Number}}</td>
    <td>{{$Author->address}}</td>
    <td>
        <a href="#" class="btn btn-warning btn-sm">Edit</a>
        <a href="#" class="btn btn-warning btn-sm">Delete</a>
     </td>
    </tr>
    @endforeach
    </tbody>
    </table>
    </div>
    
    </div>
    
    </div>
    </div>
@endsection
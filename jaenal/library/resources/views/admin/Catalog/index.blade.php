@extends('layouts.admin')
@section('header', 'Catalog');

@section('content')
<div class="row">
    <div class="col-12">
    <div class="card">
    <div class="card-header">
    <a href="{{ url('catalogs/create')}}"class="btn btn-sm btn-primary pull-right">Create New Catalog</a>
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
    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Created at</font></font></th>
    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Update at</font></font></th>
    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Total Book</font></font></th>
    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Action</font></font></th>
    </tr>
    </thead>
    <tbody>
        @foreach ($catalogs as $key => $catalog)
            
        
    <tr>
    <td>{{$key+1}}</td>
    <td>{{$catalog->name}}</td>
    <td>{{ convert_date($catalog->created_at)}}</td>
    <td>{{ convert_date($catalog->updated_at)}}</td>
    <td>{{count($catalog->Books)}}</td>
    <td>
        <a href="{{ url('catalogs/'.$catalog->id.'/edit') }}" class="btn btn-warning btn-sm">Edit</a>

        <form action="{{ url('catalogs', ['id' => $catalog->id]) }}" method="post">
            <input class="btn btn-danger btn-sm" type="submit" value="Delete" onclick="return confirm ('Are you sure?')">
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
@endsection
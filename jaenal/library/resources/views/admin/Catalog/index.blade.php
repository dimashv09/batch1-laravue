@extends('layouts.admin')
@section('header', 'Catalog');

@section('content')
<div class="row">
    <div class="col-12">
    <div class="card">
    <div class="card-header">
    <h3 class="card-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Data Catalog</font></font></h3>
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
    </tr>
    </thead>
    <tbody>
        @foreach ($Catalogs as $key => $Catalog)
            
        
    <tr>
    <td>{{$key+1}}</td>
    <td>{{$Catalog->Name}}</td>
    <td>{{date('d M Y', strtotime($Catalog->created_at))}}</td>
    <td>{{date('d M Y', strtotime($Catalog->updated_at))}}</td>
    <td>{{count($Catalog->Books)}}</td>
    </tr>
    @endforeach
    </tbody>
    </table>
    </div>
    
    </div>
    
    </div>
    </div>
@endsection
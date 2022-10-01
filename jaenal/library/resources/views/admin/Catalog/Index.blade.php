@extends('layouts.admin')
@section('header', 'Catalog');

@section('content')
<div class="row">
    <div class="col-12">
    <div class="card">
    <div class="card-header">
    <h3 class="card-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Tabel Catalog</font></font></h3>
    <div class="card-tools">
    <div class="input-group input-group-sm" style="width: 150px;">
    <input type="text" name="table_search" class="form-control float-right" placeholder="Mencari">
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
    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Tanggal Di Buat</font></font></th>
    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Tanggal Update</font></font></th>
    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Status</font></font></th>
    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Alasan</font></font></th>
    </tr>
    </thead>
    <tbody>
    <tr>
    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">183</font></font></td>
    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">John Doe</font></font></td>
    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">11-7-2014</font></font></td>
    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">15-7-2014</font></font></td>
    <td><span class="tag tag-success"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Disetujui</font></font></span></td>
    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</font></font></td>
    </tr>
    <tr>
    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">219</font></font></td>
    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Alexander Pierce</font></font></td>
    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">11-7-2014</font></font></td>
    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">15-7-2014</font></font></td>
    <td><span class="tag tag-warning"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Tertunda</font></font></span></td>
    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</font></font></td>
    </tr>
    <tr>
    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">657</font></font></td>
    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Bob Doe</font></font></td>
    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">11-7-2014</font></font></td>
    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">15-7-2014</font></font></td>
    <td><span class="tag tag-primary"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Disetujui</font></font></span></td>
    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</font></font></td>
    </tr>
    <tr>
    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">175</font></font></td>
    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Mike Doe</font></font></td>
    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">11-7-2014</font></font></td>
    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">15-7-2014</font></font></td>
    <td><span class="tag tag-danger"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Ditolak</font></font></span></td>
    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</font></font></td>
    </tr>
    </tbody>
    </table>
    </div>
    
    </div>
    
    </div>
    </div>
@endsection
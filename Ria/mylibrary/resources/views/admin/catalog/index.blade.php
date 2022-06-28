@extends('layouts.admin')
@section('header', 'Catalog')

@section('content')
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-header">
<h3 class="card-title">CATALOG</h3>
<div class="card-tools">
<div class="input-group input-group-sm" style="width: 150px;">
<input type="text" name="table_search" class="form-control float-right" placeholder="Search">
<div class="input-group-append">
<button type="submit" class="btn btn-default">
<i class="fas fa-search"></i>
</button>
</div>
</div>
</div>
</div>

<div class="card-body table-responsive p-0" style="height: 300px;">
<table class="table table-head-fixed text-nowrap">
<thead>
<tr>
<th>ID</th>
<th>Name</th>
<th>Created Date</th>
<th>Update Date</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td>1</td>
<td>Education</td>
<td>2022-06-22</td>
<td>2022-06-22</td>
<td><span class="tag tag-success">Approved</span></td>
<td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
</tr>

<tr>
<td>2</td>
<td>Programing</td>
<td>2022-06-22</td>
<td>2022-06-22</td>
<td><span class="tag tag-success">Approved</span></td>
<td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
</tr>

<tr>
<td>3</td>
<td>Biography</td>
<td>2022-06-22</td>
<td>2022-06-22</td>
<td><span class="tag tag-success">Approved</span></td>
<td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
</tr>

<tr>
<td>4</td>
<td>Novel</td>
<td>2022-06-22</td>
<td>2022-06-22</td>
<td><span class="tag tag-success">Approved</span></td>
<td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
</tr>

<tr>
<td>5</td>
<td>Encyclopedia</td>
<td>2022-06-22</td>
<td>2022-06-22</td>
<td><span class="tag tag-success">Approved</span></td>
<td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
</tr>
</tbody>
</table>
</div>

</div>

</div>
</div>
@endsection
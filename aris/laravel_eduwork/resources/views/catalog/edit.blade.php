@extends('layouts.admin')
@section('header', 'Catalog')

@section('content')
<div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Catalog</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ url('catalogs/edit/'.$catalog->id) }}" method="post">
              	@csrf
              	{{ method_field('PUT') }}
                <div class="card-body">
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" value="{{$catalog->name }}" class="form-control" placeholder="Input Name" required="">
                  </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
@endsection
@extends('layouts.admin')
@section('header', 'Catalog')

@section('content')
<div class="row">
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Catalog</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{url('catalogs/'.$catalog->id)}}" method="POST">
			@csrf
				{{ method_field('PUT')  }}
                <div class="card-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter name" required="" value="{{ $catalog->name }}">
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
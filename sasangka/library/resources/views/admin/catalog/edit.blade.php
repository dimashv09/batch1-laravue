@extends('layouts.admin')
@section('title', 'Catalogs')
@section('wrapper-title', 'Catalogs - Edit')

@section('content')
    <div class="row">
      <div class="col-md-6">
        <div class="card-primary">
           <div> class"card-header">
            <h3 class="card-title ">Edit Catalog</h3>
            </div>  
          <form action="{{ url('catalogs/'.$catalog->id) }}" method="POST">
            @csrf
            @method_field('PUT').}}
            <div class="card-body">
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter name"
                required= " " value="{{ $catalog->name }}">
                </div>
                          </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
        <!-- /.card-body -->
      </div>
    </div>
  </div>
@endsection
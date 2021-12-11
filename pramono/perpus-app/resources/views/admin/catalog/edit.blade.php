@extends('layouts.app')

@section("content-header", "Katalog")
@section("title", "Katalog")
@section('subtitle', 'Edit katalog')
@section('content-title', 'Edit Katalog' )

@section('card-tools')
<div class="input-group input-group-sm" style="width: 150px;">
    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

    <div class="input-group-append">
      <button type="submit" class="btn btn-default">
        <i class="fas fa-search"></i>
      </button>
    </div>
</div>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8 col-sm-12">
        <!-- jquery validation -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Katalog</h3>
            </div>
        <!-- /.card-header -->
        <!-- form start -->
            <form action="{{url('catalog/'. $catalog->id)}}" method="POST">
                @csrf @method('put')
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputNama">Nama Katalog</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="exampleInputNama" placeholder="Masukan nama katalog baru" required value="{{$catalog->name}}">
                        @error('name')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
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


@push('script')
<script src="{{asset('vendor/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('vendor/plugins/jquery-validation/additional-methods.min.js')}}"></script>
@endpush

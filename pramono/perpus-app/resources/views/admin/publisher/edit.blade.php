@extends('layouts.app')

@section("content-header", "Penerbit")
@section("title", "Penerbit")
@section('subtitle', 'Edit Penerbit')
@section('content-title', 'Edit Penerbit' )

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
                    <h3 class="card-title">Edit Penerbit</h3>
                </div>
            <!-- /.card-header -->
            <!-- form start -->
                <form action="{{url('publisher/'. $publisher->id)}}" method="POST">
                    @csrf @method('put')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputNama">Nama Penerbit</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="exampleInputNama" placeholder="Masukan nama penerbit" value="{{$publisher->name}}" required>
                            @error('name')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail">Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail" placeholder="Masukan email" value="{{$publisher->email}}" required>
                            @error('email')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputphone">No. Telepon</label>
                            <input type="tel" name="phone" class="form-control @error('phone') is-invalid @enderror" id="exampleInputphone" placeholder="Masukan no. telepon" value="{{$publisher->phone}}" required>
                            @error('phone')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                        <label for="address" class="form-label">Alamat</label>
                        <textarea class="form-control @error('address') is-invalid @enderror" name="address" id="address" rows="3">{{$publisher->address}}</textarea>
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

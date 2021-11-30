@extends('layouts.app')

@section('content-header')
    Ini Halaman Katalog
@endsection

@section('title')
    {{$title}}
@endsection
@section('subtitle')
    Daftar Katalog
@endsection

@section('content-title')
    Daftar Katalog
@endsection

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
<table class="table table-hover text-nowrap">
    <thead>
      <tr>
        <th>#</th>
        <th>Nama katalog</th>
        <th>Opsi</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>Lorem ipsum dolor sit amet.</td>
        <td>
            <a href="#" class="btn btn-info btn-sm">Edit</a>
            <a href="#" class="btn btn-danger btn-sm">Hapus</a>
        </td>
      </tr>
      <tr>
        <td>2</td>
        <td>Lorem ipsum dolor sit amet consectetur.</td>
        <td>
            <a href="#" class="btn btn-info btn-sm">Edit</a>
            <a href="#" class="btn btn-danger btn-sm">Hapus</a>
        </td>
      </tr>
      <tr>
        <td>3</td>
        <td>Lorem ipsum dolor sit.</td>
        <td>
            <a href="#" class="btn btn-info btn-sm">Edit</a>
            <a href="#" class="btn btn-danger btn-sm">Hapus</a>
        </td>
      </tr>
      <tr>
        <td>4</td>
        <td>Lorem ipsum dolor sit amet.</td>
        <td>
            <a href="#" class="btn btn-info btn-sm">Edit</a>
            <a href="#" class="btn btn-danger btn-sm">Hapus</a>
        </td>
      </tr>
    </tbody>
  </table>
@endsection

@push('script')
    <script>
        $("#katalog").addClass("active");
    </script>
@endpush

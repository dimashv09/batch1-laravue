@extends('layouts.app')

@section("content-header", "Penerbit")
@section("title", "Penerbit")
@section('subtitle', 'Daftar Penerbit')
@section('content-title', 'Daftar Penerbit' )

@section('content')
<div class="row justify-content-start">
    <div class="col-sm-12">
        @if (session('sukses'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{session('sukses')}}</strong>.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <a href="{{url('/publisher/create')}}" class="btn btn-sm btn-primary">Baru</a>
                </div>
                <div class="card-tools d-flex">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control float-right h-100" placeholder="Search">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered text-center">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Alamat</th>
                        <th>Buku yang diterbitkan</th>
                        <th>Dibuat Pada</th>
                        <th>Opsi</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($publishers as $publisher)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$publisher->name}}</td>
                                <td>{{$publisher->email}}</td>
                                <td>{{$publisher->phone}}</td>
                                <td>{{$publisher->address}}</td>
                                <td>{{date('l, M Y', strtotime($publisher->created_at))}}</td>
                                <td>{{count($publisher->books)}}</td>
                                <td class="d-flex">
                                    <a href="{{url('/publisher/'. $publisher->id. '/edit')}}" class="btn btn-info btn-sm">Edit</a>
                                    <form action="{{url('publisher/'. $publisher->id)}}" method="POST" onsubmit="return confirm('Daftar buku yang diterbitkan oleh penerbit ini akan terhapus. Apakah Anda yakin ingin melanjutkan proses?')">
                                        @csrf @method('delete')
                                        <button class="btn btn-sm btn-danger" type="submit">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">Belum ada data.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection

@push('script')

@endpush

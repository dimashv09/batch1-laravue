@extends('layouts.app')

@section("content-header", "Katalog")
@section("title", "Katalog")
@section('subtitle', 'Daftar Katalog')
@section('content-title', 'Daftar Katalog' )

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
<div class="row justify-content-start">
    <div class="col-md-8 col-sm-12">
        @if (session('sukses'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session('sukses')}}.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <a href="{{url('/catalog/create')}}" class="btn btn-sm btn-primary">Baru</a>
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
                <table class="table table-bordered table-responsive text-nowrap text-center">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Nama Katalog</th>
                        <th>Dibuat Pada</th>
                        <th style="width: 10%">Jumlah Buku</th>
                        <th style="width: 10%">Opsi</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($catalogs as $catalog)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$catalog->name}}</td>
                                <td>{{date('l, M Y', strtotime($catalog->created_at))}}</td>
                                <td>{{count($catalog->books)}}</td>
                                <td class="d-flex">
                                    <a href="{{url('/catalog/'. $catalog->id. '/edit')}}" class="btn btn-info btn-sm">Edit</a>
                                    <form action="{{url('catalog/'. $catalog->id)}}" method="POST" onsubmit="return confirm('Daftar buku yang termasuk dalam katalog ini akan terhapus. Apakah Anda yakin ingin melanjutkan proses?')">
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
        </div>
    </div>
</div>
@endsection

@push('script')

@endpush

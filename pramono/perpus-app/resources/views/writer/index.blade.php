@extends('layouts.app')

@section("content-header", "$title")
@section("title", "$title")
@section('subtitle', 'Daftar Penulis')
@section('content-title', 'Daftar Penulis' )

@section('content')
    @if (session('sukses'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>{{session('sukses')}}</strong>.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="row justify-content-start">
        <div class="col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <a href="{{url('/writer/create')}}" class="btn btn-sm btn-primary">Baru</a>
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
                    <table class="table table-bordered text-nowrap text-center">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Telepon</th>
                            <th>Alamat</th>
                            <th>Dibuat Pada</th>
                            <th>Jumlah Buku</th>
                            <th>Opsi</th>
                          </tr>
                        </thead>
                        <tbody>
                            @forelse ($writers as $writer)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$writer->name}}</td>
                                    <td>{{$writer->email}}</td>
                                    <td>{{$writer->phone}}</td>
                                    <td>{{$writer->address}}</td>
                                    <td>{{date('l, M Y', strtotime($writer->created_at))}}</td>
                                    <td>{{count($writer->books)}}</td>
                                    <td class="d-flex">
                                        <a href="{{url('/writer/'. $writer->id. '/edit')}}" class="btn btn-info btn-sm">Edit</a>
                                        <form action="{{url('writer/'. $writer->id)}}" method="POST" id="form-delete">
                                            @csrf @method('delete')
                                            <button class="btn btn-sm btn-danger">Hapus</button>
                                        </form>
                                        {{-- <a href="" class="btn btn-danger btn-sm">Hapus</a> --}}
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

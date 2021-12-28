@extends('layouts.app')

@section("content-header", "Peminjaman")
@section("title", "Peminjaman")
@section('subtitle', 'Detail Peminjaman')
@section('content-title', 'Detail Peminjaman' )

@section('content')
<div class="row justify-content-center">
    <div class="col-sm-8">
        <div class="card">
            <div class="card-header bg-primary">
                <h4 class="card-title">Detail Peminjaman</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6 my-2">
                        Nama Anggota
                    </div>
                    <div class="col-6 my-2">
                        : {{$transaction->member->name}}
                    </div>
                    <div class="col-6">
                        Tanggal
                    </div>
                    <div class="col-6">
                        : {{ custom_date($transaction->start) }} - {{ custom_date($transaction->end) }}
                    </div>
                    <div class="col-6 my-2">
                        Buku yang dipinjam
                    </div>
                    <div class="col-6 my-2">:
                            @foreach ($transaction->books as $book)
                                <span class="badge badge-info">{{$book->title}}</span>
                            @endforeach
                    </div>
                    <div class="col-6 my-2">
                        Status
                    </div>
                    <div class="col-6 my-2">:
                        @if ($transaction->status == 1)
                            Sudah dikembalikan
                        @else
                            Belum dikembalikan
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{route('transaction.index')}}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection

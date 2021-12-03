@extends('layouts.app')

@section('title')
    {{$title}}
@endsection

@section('subtitle')
    Daftar Anggota
@endsection

@section('content-header')
    Anggota
@endsection

@section('content-title')
    Daftar Anggota
@endsection

@section('content')

@if (session('sukses'))

    <div class="alert alert-success" role="alert">
        {{ session('sukses') }}
    </div>

@endif
<p>
    "INI ADALAH HALAMAN ANGGOTA".
</p>
@endsection

@push('script')

@endpush

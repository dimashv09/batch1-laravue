@extends('layouts.app')

@section('title')
    {{$title}}
@endsection

@section('subtitle')
    Daftar Pengarang
@endsection

@section('content-header')
    Pengarang
@endsection

@section('content-title')
    Daftar Pengarang
@endsection

@section('content')

@if (session('sukses'))

    <div class="alert alert-success" role="alert">
        {{ session('sukses') }}
    </div>

@endif
<p>
    "INI ADALAH HALAMAN PENGARANG".
</p>
@endsection

@push('script')

@endpush

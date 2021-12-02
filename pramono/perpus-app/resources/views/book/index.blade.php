@extends('layouts.app')

@section('title')
    {{$title}}
@endsection

@section('subtitle')
    Daftar Buku
@endsection

@section('content-header')
    {{$title}}
@endsection

@section('content-title')
    Daftar Buku
@endsection

@section('content')

@if (session('sukses'))

    <div class="alert alert-success" role="alert">
        {{ session('sukses') }}
    </div>

@endif
<p>
    "INI ADALAH HALAMAN BUKU".
</p>
@endsection

@push('script')
    <script>
        $("#buku").addClass("active");
    </script>
@endpush

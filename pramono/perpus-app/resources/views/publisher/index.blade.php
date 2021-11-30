@extends('layouts.app')

@section('title')
    {{$title}}
@endsection

@section('subtitle')
    Daftar Penerbit
@endsection

@section('content-header')
    Penerbit
@endsection

@section('content-title')
    Daftar Penerbit
@endsection

@section('content')

@if (session('sukses'))

    <div class="alert alert-success" role="alert">
        {{ session('sukses') }}
    </div>

@endif
<p>
    "INI ADALAH HALAMAN PENERBIT".
</p>
@endsection

@push('script')
    <script>
        $("#penerbit").addClass("active");
    </script>
@endpush

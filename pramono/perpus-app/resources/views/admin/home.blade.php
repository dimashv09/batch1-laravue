@extends('layouts.app')

@section('title')
    Home
@endsection

@section('subtitle')
    Dashboard
@endsection

@section('content-header')
    Selamat Datang, {{Auth::user()->name}}
@endsection

@section('content-title')
    Dashboard
@endsection

@section('content')

@if (session('status'))

    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>

@endif

    <p>
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsam, corporis aperiam soluta consequuntur sit vel ducimus fugiat veritatis laudantium et eaque incidunt. Ipsam.
    </p>
@endsection

@push('script')

@endpush

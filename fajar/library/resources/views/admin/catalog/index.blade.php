@extends('layouts.admin')

@section('header', 'Catalog')

@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Catalog Table</h3>
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Total Books</th>
                    <th class="text-center">Created At</th>
                    <th style="width: 40px" class="text-center">Label</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($catalogs as $key=> $catalog)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$catalog->name}}</td>
                    <td class="text-center">{{count($catalog->books)}}</td>
                    <td class="text-center">{{date("d M Y , H:i:s",strtotime($catalog->created_at))}}</td>
                    <td></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @endsection

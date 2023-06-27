@extends('layouts.admin');
@section('header', 'Catalog');

@section('content')
<div class="container-fluid">
    <div class="col-md-12">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <a href="{{ url('catalogs/create') }}" v-if="hasAnyPermission(['admin.catalog.create'])" class="btn btn-primary btn-sm pull-right">Add New Catalog</a>
                    <div class="card-tools">
                        {{-- <ul class="pagination pagination-sm float-right">
                            <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                        </ul> --}}
                    </div>
                </div>

                <div class="card-body p-0">
                    <table class="table  table-bordered">
                        <thead class="bg-secondary">
                            <tr>
                                <th style="width: 5px">No</th>
                                <th class='text-center'>Nama</th>
                                <th class='text-center'>Total</th>
                                <th class='text-center'>Created_at</th>
                                <th class='text-center'>Actions</th>
                            </tr>
                        </thead>
                        @foreach ($catalogs as $key => $catalog )
                        <tbody>
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td class="text-center">{{ $catalog->name}}</td>
                                <td class="text-center">{{ count($catalog->books)}}</td>
                                <td class="text-center">{{ convert_date($catalog->created_at) }}</td>
                                <td class="text-center justify-content-center" >
                                    <a href="{{ url('catalogs/'.$catalog->id.'/edit') }}" v-if="hasAnyPermission(['admin.catalog.edit'])" class="btn btn-warning btn-sm mr-1">Edit</a>
                                    <form action="{{ url('catalogs',['id' => $catalog->id]) }}" method="POST" class="d-inline-flex"> 
                                        <input class="btn btn-danger btn-sm" type="submit" value="Delete" onclick="return confirm('Are you sure?')">
                                        @method('delete')
                                        @csrf
                                    </form>
                                </td>  
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection

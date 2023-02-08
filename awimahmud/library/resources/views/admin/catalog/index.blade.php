@extends('layouts.admin');
@section('header', 'Catalog');

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Catalog</h3>
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
                        <th class='text-center' style="width: 10px">No</th>
                        <th class='text-center'>Nama</th>
                        <th class='text-center'>Total</th>
                        <th class='text-center'>Created_at</th>
                    </tr>
                </thead>
                @foreach ($catalogs as $key => $catalog )
                <tbody>
                    <tr>
                        <td class="text-center">{{ $key+1 }}</td>
                        <td class="text-center">{{ $catalog->name}}</td>
                        <td class="text-center">{{ count($catalog->books)}}</td>
                        <td class="text-center">{{ date('H:i:s - d M Y', strtotime($catalog->created_at)) }}</td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>

    </div>
</div>
@endsection
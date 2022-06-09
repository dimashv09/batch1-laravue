@extends('layouts.admin')

@section('header', 'Catalog')

@section('content')

<div class="card">
    <div class="card-header">
        <a href="{{url('catalog/create')}}" class="btn btn-sm btn-primary pull-right"><i
                class="fas fa-plus fa-sm text-white-50"></i> Create New Catalog</a>
    </div>

    <div class="card-body">
        <div class="table-responsive-sm">
            <table class="table table-bordered table-striped ">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Total Books</th>
                        <th class="text-center">Created At</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($catalogs as $key=> $catalog)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$catalog->name}}</td>
                        <td class="text-center">{{count($catalog->books)}}</td>
                        <td class="text-center">{{dateFormat($catalog->created_at)}}</td>
                        <td>
                            <a href="{{url('catalog/'.$catalog->id.'/edit')}}" class="btn btn-warning btn-sm">
                                <i class="fa fa-pencil-alt"></i>Edit
                            </a>
                            <form action="{{route('catalog.destroy', $catalog->id)}}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <button class="btn btn-sm btn-danger" type="submit" value="Delete"
                                    onclick="return confirm('Are you sure?')">
                                    <i class="fa fa-trash"></i> Delete
                                </button>
                            </form>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
@extends('layouts.admin')
@section('title', 'Publishers')
@section('wrapper-title', 'Publishers')

@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('content')
    <div class="container" id="publisherVue">
        <div class="row">
            <div class="card w-100 overflow-auto">
                <div class="card-header">
                    <a href="{{ url('publishers/create') }}" 
					class="btn btn-sm btn-primary">Create new Publishers</a>
                    <a href="#" data-target="#modal-default" data-toggle="modal" class="btn btn-sm btn-primary pull-right">Create new Modal publisher</a>
                </div>

                <!-- /.card-header -->
                <div class="card-body">
                    <table id="dataTable" class="table table-bordered table-striped w-100">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Address</th>
                                {{-- <th>Total Books</th>
                                <th>created at</th> --}}
                                <th>Actions</th>
                                <th style="text-align:center"> CRUD</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($publishers as $key => $publisher)
                            <tr>
                                <td>{{ $key+1}}</td>
                                
                                
                                <td>{{ $publisher->name }}</td>
                                <td>{{ $publisher->email }}</td>
                                <td>{{ $publisher->phone_number }}</td>
                                <td>{{ $publisher->address }}</td>
                                <td style="text-align: center">
                                    {{ count($publisher->books) }}</td>
                                    <td class="d-flex" style="gap: .5rem">
                              <a href="{{ url('publishers/'.$publisher->id.'/edit') }}" class="btn btn-sm btn-warning text-white">Edit</a>
									<form action="{{ url('publishers/'.$publisher->id) }}" method="POST">
										@csrf
										@method('delete')
										<button type="submit" class="btn btn-sm btn-danger text-white" onclick="return confirm('Are you sure want to delete this data?')">Delete</button>
                                    </form>
								</td>
							</tr>	
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
<!-- Modal -->
<div class="modal fade show" id="modal-default"> 
    <div class="modal-dialog">
      <div class="modal-content">
          <form method="post" action="{{ url ('publishers') }}" autocomplete="off">
        <div class="modal-header">

          <h4 class="modal-title">Publisher</h4>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            @csrf 
                    <div class="form__group">
                    <label>Name</label>
                     <input type="text" class="form-control" name="name" value=""required="">
                    </div>
                    <div class="form__group">
                     <label>Email</label>
                     <input type="text" class="form-control" name="email" value=""required="">
                     <div class="form__group">
                    </div>
                     <label>Phone Number</label>
                     <input type="text" class="form-control" name="phone_number" value=""required="">
                     <div class="form__group">
                    </div>
                     <label>Address</label>
                     <input type="text" class="form-control" name="address" value=""required="">
                     <div class="form__group">
                    </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

</div>
</div>			
@endsection

@section('js')
 
     
@endsection
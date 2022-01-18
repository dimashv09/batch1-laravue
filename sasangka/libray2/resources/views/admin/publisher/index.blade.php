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
    <div class="container" id="controller">
        <div class="row">
            <div class="card w-100 overflow-auto">
                <div class="card-header">
                    {{-- <a href="{{ url('publishers/create') }}" 
					class="btn btn-sm btn-primary">Create new Publishers</a> --}}
                    <a href="#" @click="addData()" class="btn btn-sm btn-primary pull-right">Create new Modal publisher</a>
                </div>

                <!-- /.card-header -->
                <div class="card-body">
                    <table id="datatable" class="table table-bordered table-striped w-100">
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
                                        <a href="#"@click="editData({{ $publisher }})" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="#"@click="deleteData({{ $publisher->id}})" class="btn btn-danger btn-sm">Delete</a
										@csrf
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
          <form method="post" :action="actionUrl" autocomplete="off">
        <div class="modal-header">

          <h4 class="modal-title">Publisher</h4>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            @csrf 
            <input type="hidden" name="_method" value="PUT" v-if="editStatus">
                    <div class="form__group">
                    <label>Name</label>
                     <input type="text" class="form-control" name="name" :value="data.name"required="">
                    </div>
                    <div class="form__group">
                     <label>Email</label>
                     <input type="text" class="form-control" name="email" :value="data.email" required="">
                     <div class="form__group">
                    </div>
                     <label>Phone Number</label>
                     <input type="text" class="form-control" name="phone_number" :value="data.phone_number" required="">
                     <div class="form__group">
                    </div>
                     <label>Address</label>
                     <input type="text" class="form-control" name="address" :value="data.address" required="">
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
<!-- DataTables  & Plugins -->
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<script type="text/javascript">
 $(function () {
    $("#datatable").DataTable({
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>

<script type="text/javascript">
    var controller = new Vue({
        el: "#controller",
        data: {
            data: {},
            actionUrl:'{{ url ('publishers') }}',
            editStatus: false
        },
        mounted: function() {
            
        },
        methods: {
            addData() {
                this.data = {};
                this.actionUrl='{{ url ('publishers') }}';
                this.editStatus = false
                $( '#modal-default').modal();
            },
            editData(data) {
                this.data = data;
                this.actionUrl = '{{ url ('publishers') }}'+'/'+ data.id;
                this.editStatus = true
                $('#modal-default').modal();
            },
            deleteData(id) {
                this.actionUrl='{{ url ('publishers') }}'+'/'+ id;
                if (confirm("Are you sure?")) {
                    axios.post(this.actionUrl,{_method: 'DELETE'}).then(response => {
                        location.reload();
                    });
                }
            }
        }
    });
</script>
    
 
     
@endsection
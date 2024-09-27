@extends('layouts.admin')
@section('header','Catalog')
@section('content')

@section('css')
	<!-- DataTables -->
	<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection
@section('content')
<div id="controller">
    <div class="row">
        <div class="card w-100 overflow-auto">
            <div class="card-header">
            <a href="#" @click="addData()" class="btn btn-sm btn-primary pull-right">Create New Catalog</a>
            </div>
            <div class="card-body">
                <table id="example2" class="table table-bordered table-striped w-100">
                    <thead>
                        <tr style="text-align: center" >
                            <th>No.</th>
                            <th>Name</th>
							<th>Total Books</th>
							<th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($catalogs as $key => $catalog)
                        <tr style="text-align: center" >
                            <td>{{ $key+1}}</td>
                            <td>{{$catalog->name }}</td>
							<td>{{ count($catalog->books) }}</td>
							<td>{{ convert_date($catalog->created_at ) }}</td>
                            <td class=" width: 10px text-center">
                                <a href="#" @click="editData( {{$catalog}} )" class="btn btn-warning btn-s">Edit</a>
                                <a href="#" @click="deleteData({{ $catalog->id }})"class="btn btn-danger btn-s">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                </table>
            </div>
        </div>
    </div>
	<div class="modal fade" id="modal-default">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="post" :action="actionUrl" autocomplate="off">
					<div class="modal-header">
						<h4 class="modal-tittle">Catalog</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						@csrf
	
						<input type="hidden" name="_method" value="PUT" v-if="editStatus">
	
						<div class="card-body">
							<div class="form-group">
								<label for="name">Catalog's Name</label>
								<input type="text" name="name" :value="data.name"
									class="form-control @error('name') is-invalid @enderror" placeholder="Name">
								@error('name')
								<div class="text-danger mt-1">*{{ $message }}</div>
								@enderror
                                <div class="modal-footer justify-content-between">
						<button typer="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Save Changes</button>
					</div>
	
				</form>
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
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
	<script type="text/javascript">
		var controller = new Vue ({
			el: '#controller',
			data : {
				data: {},
				actionUrl:'{{url('catalogs')}}',
				editStatus:false
		},
		mounted: function() {
		},
		methods: {
			addData() {
				this.data= {};
				this.actionUrl='{{url('catalogs')}}';
				this.editStatus=false;
				$('#modal-default').modal();
			},
			
			editData(data) {
				this.data= data;
				this.actionUrl='{{ url('catalogs') }}'+'/'+data.id;
				this.editStatus=true;
				$('#modal-default').modal();
			},
			deleteData(id){
				this.actionUrl='{{ url('catalogs')}}'+'/'+id;
				if(confirm("Are You Sure ?")){
					axios.post(this.actionUrl,{_method: 'DELETE'}).then(response => 
					{location.reload();
					});
				}
			},
		}
	});
	</script>
@endsection
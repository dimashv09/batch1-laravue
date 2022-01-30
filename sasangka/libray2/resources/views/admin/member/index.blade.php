@extends('layouts.admin')

@section('wrapper-title', 'Member')

@section('css')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

@endsection

@section('content')
<div id="controller">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<a href="#" @click="addData()" class="btn btn-sm btn-primary">Create New Member</a>
				</div>
					<!-- /.card-header -->
                <div class="card-body">
                    <table id="datatable" class="table table-bordered table-striped w-100">
						<thead>
						<tr>
							<th class="align-middle" style="width: 10px;">#</th>
							<th class="align-middle">Name</th>
							<th class="align-middle">Gender</th>
							<th class="align-middle">Phone Number</th>
							<th class="align-middle">Address</th>
							<th class="align-middle">Email</th>
							<th class="align-middle">Join Date</th>
							<th class="align-middle" style="width: 80px;">Action</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal Popup -->
	<div class="modal fade show" id="modalmadul">
		<div class="modal-dialog">
          <div class="modal-content">
			  <form method="post" :action="actionUrl"autocomplete="off" @submit="submitForm($event,data.id)">
				<div class="modal-body">
					@csrf
					<input type="hidden" name="_method" value="PUT" v-if="status" />

					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
							placeholder="Enter Member's name" name="name" required :value="data.name">
						@error('name')
						<div class="invalid-feedback">{{ $message }}</div>
						@enderror
					</div>
					<div class="form-group">
						<label for="gender">Gender</label>
						<select class="form-control" name="gender" id="gender" required>
							<option :selected="data.gender == 'M'" value="M">Male</option>
							<option :selected="data.gender == 'F'" value="F">Female</option>
						</select>
						@error('gender')
						<div class="invalid-feedback">{{ $message }}</div>
						@enderror
					</div>
					<div class="form-group">
						<label for="phone">Phone Number</label>
						<input type="text" class="form-control @error('phone_number') is-invalid @enderror"
							id="phone" placeholder="Enter member's phone" name="phone_number" required
							:value="data.phone_number">
						@error('phone_number')
						<div class="invalid-feedback">{{ $message }}</div>
						@enderror
					</div>
					<div class="form-group">
						<label for="address">Address</label>
						<input type="text" class="form-control @error('address') is-invalid @enderror" id="address"
							placeholder="Enter member's address" name="address" required :value="data.address">
						@error('address')
						<div class="invalid-feedback">{{ $message }}</div>
						@enderror
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
							placeholder="Enter Member's email" name="email" required :value="data.email">
						@error('email')
						<div class="invalid-feedback">{{ $message }}</div>
						@enderror
					</div>
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Add</button>
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
<!-- Page specific script -->
<script>
    $(function () {
        $("#dataTable").DataTable();
    });
</script>

<script>
    const actionUrl = `{{ url('members'); }}`
        const apiUrl = `{{ url('api/members'); }}`
        let columns = [
        {data: 'DT_RowIndex', orderable: true},
        {data: 'name', orderable: false},
        {data: 'gender', orderable: false},
        {data: 'phone_number', orderable: false},
        {data: 'address', orderable: false},
        {data: 'email', orderable: false},
        {data: 'date', orderable: false},
        {render: function(index, row, data, meta) {
        /* html */
        return `
        <a href="#" class="badge bg-warning p-2 mb-2" onclick="controller.editData(event, ${meta.row})">
            Edit</a>
        <a href="#" class="badge bg-danger p-2 mb-2" onclick="controller.deleteData(event, ${data.id})">
            Delete</a>`
        }, width: '130px', orderable: false}
        ]
</script>

<!-- CRUD VueJs -->
<script src="{{ asset("js/data.js") }}"></script>

<!-- Gender's Filter Script -->
<script>
    $('select[name=filter]').on('change', function() {
        gender = $('select[name=filter]').val();
        if (gender == '') {
            controller.table.ajax.url(apiUrl).load()
        } else {
            controller.table.ajax.url(`${apiUrl}?gender=${gender}`).load()
        }
    })
</script>

@endsection
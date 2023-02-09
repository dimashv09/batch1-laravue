@extends('layouts.admin')
@section('title', 'Authors')
@section('wrapper-title', 'Authors')

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
                <a href="#" @click="addData()" class="btn btn-sm btn-primary pull-right">Create New Author</a>
            </div>
            <div class="card-body">
                <table id="example2" class="table table-bordered table-striped w-100">
                    <thead>
                        <tr>
                            <th style="width: 10px">No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Address</th>
                            <th class="text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($authors as $key => $author)
                        <tr>
                            <td>{{ $key+1}}</td>
                            <td>{{$author->name }}</td>
                            <td>{{$author->email }}</td>
                            <td>{{$author->phone_number }}</td>
                            <td>{{$author->address }}</td>
                            <td class=" width: 10px text-right">
                                <a href="#" @click="editData( {{$author}} )" class="btn btn-warning btn-xs">Edit</a>
                                <a href="#" @click="deleteData({{ $author->id }})"class="btn btn-danger btn-xs">Delete</a>
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
						<h4 class="modal-tittle">Author</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						@csrf
	
						<input type="hidden" name="_method" value="PUT" v-if="editStatus">
	
						<div class="card-body">
							<div class="form-group">
								<label for="name">author's Name</label>
								<input type="text" name="name" :value="data.name"
									class="form-control @error('name') is-invalid @enderror" placeholder="Name">
								@error('name')
								<div class="text-danger mt-1">*{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="phone_number">Phone Number</label>
								<input type="number" name="phone_number" :value="data.phone_number"
									class="form-control @error('phone_number') is-invalid @enderror" placeholder="081233">
								@error('phone_number')
								<div class="text-danger mt-1">*{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="name">Email</label>
								<input type="email" name="email" :value="data.email"
									class="form-control @error('email') is-invalid @enderror"
									placeholder="email@exampl.com">
								@error('email')
								<div class="text-danger mt-1">*{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="phone_number">Address</label>
								<input type="text" name="address" :value="data.address"
									class="form-control @error('address') is-invalid @enderror"
									placeholder="5, Buana Street, Antares">
								@error('address')
								<div class="text-danger mt-1">*{{ $message }}</div>
								@enderror
							</div>
						</div>
					</div>
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
	<script type="text/javascript">
		var controller = new Vue ({
			el: '#controller',
			data : {
				data: {},
				actionUrl:'{{url('authors')}}',
				editStatus:false
		},
		mounted: function() {

		},
		methods: {
			addData() {
				this.data= {};
				this.actionUrl='{{url('authors')}}';
				this.editStatus=false;
				$('#modal-default').modal();
			},
			
			editData(data) {
				this.data= data;
				this.actionUrl='{{ url('authors') }}'+'/'+data.id;
				this.editStatus=true;
				$('#modal-default').modal();

			},
			deleteData(id){
				this.actionUrl='{{ url('authors')}}'+'/'+id;
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
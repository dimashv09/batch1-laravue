@extends('layouts.admin')
@section('header','Author')
@section('wrapper-title', 'Authors')

@section('css')
	
@endsection
	
@section('content')
<div id="controller">	
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<a href="#" @click="addData()" class="btn btn-sm btn-primary pull-right">Create New Author</a>
				</div>
					<!-- /.card-header -->
                <div class="card-body">
                    <table id="dataTable" class="table table-bordered table-striped w-100">
						<thead>
						<tr>
							<th width= "30px">NO.</th>
								<th class="text-center">Name</th>
								<th class="text-center">Email</th>
								<th>Phone Number</th>
								<th class="text-center">Address</th>
								<th class="text-center">Action</th>
							</tr>
						</thead>
							<tbody>
								@foreach ($authors as $key => $author)
								<tr>
									<td>{{ $key+1}}</td>
									<td>{{ $author->name }}</td>
									<td>{{ $author->email }}</td>
									<td>{{ $author->phone_number }}</td>
									<td>{{ $author->address }}</td>
									<td class="text-right">
				<a href="#"@click="editData({{ $author }})" class="btn btn-warning btn-sm">Edit</a>
				<a href="#"@click="deleteData({{ $author->id}})" class="btn btn-danger btn-sm">Delete</a>
								</td>
							</tr>
						 @endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>	
	<div class="modal fade show" id="modal"> 
		<div class="modal-dialog">
          <div class="modal-content">
			  <form method="post" :action="actionUrl" autocomplete="off">
            <div class="modal-header">

              <h4 class="modal-title">Author</h4>

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
						 <input type="text" class="form-control" name="email":value="data.email" required="">
						 <div class="form__group">
						</div>
						 <label>Phone Number</label>
						 <input type="text" class="form-control" name="phone_number":value="data.phone_number" required="">
						 <div class="form__group">
						</div>
						 <label>Address</label>
						 <input type="text" class="form-control" name="address":value="data.address" required="">
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
	<script type="text/javascript">
		var controller = new Vue({
			el: "#controller",
			data: {
				data: {},
				actionUrl:'{{ url ('authors') }}',
				editStatus: false
			},
			mounted: function() {
				
			},
			methods: {
				addData() {
					this.data = {};
					this.actionUrl='{{ url ('authors') }}';
					this.editStatus = false
					$( '#modal').modal();
				},
				editData(data) {
					this.data = data;
					this.actionUrl = '{{ url ('authors') }}'+'/'+ data.id;
					this.editStatus = true
					$('#modal').modal();
				},
				deleteData(id) {
					this.actionUrl='{{ url ('authors') }}'+'/'+ id;
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
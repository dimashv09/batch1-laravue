@extends('layouts.admin')
@section('header','Author')

@push('css')
<style type="text/css">
	
</style>
@endpush

@section('content')
<div id="controller">	
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<a href="#" class="btn btn-sm btn-primary pull-right">Create New Author</a>
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
				<a href="#"class="btn btn-warning btn-sm">Edit</a>
				<a href="#"class="btn btn-danger btn-sm">Delete</a>
								</td>
							</tr>
						 @endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>	
</div>			
@endsection
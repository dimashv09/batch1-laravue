@extends('layouts.admin')
@section('header','Books')
@section('tittle', 'Books')
@section('wrapper-tittle', 'Books')

@section('content')
<div class="container" id="bookVue">
    <div class="row">
		<div class="row w-100 mb-3">
			<div class="col-md-5 ml-auto">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fas fa-search"></i></span>
					</div>
					<input type="text" class="form-control" v-model="search">
				</div>
			</div>
			<div class="col-md-2 mr-auto">
				<button @click="addData()" class="btn btn-primary">Create a new book</button>
			</div>
		</div>
        <table id="dataTable" class="table table-bordered table-striped w-100">
       <div class="row w-100 p-3">
			<div class="col-xs-12 col-sm-6 col-md-4" v-for="book in books">
				<div class="info-box shadow-lg poin position-relative">
					<div class="info-box-content" @click="editData(book)" style="cursor: grab;">
						<span class="info-box-text h5 font-weight-bold">@{{ book.tittle }} (@{{ book.qty }})</span>
						<span class="info-box-number font-weight-normal">Rp. @{{ priceSpace(book.price) }}  ,-<samll></small></span>
					</div>
					<span class="badge badge-danger alert-sm position-absolute" @click="deleteData(book.id)" style="right: 5px; top: 5px; cursor: pointer">Delete</span>
				</div>
			</div>
		</div>
    </div>
    </table>
	<!-- Modal create -->
	<div class="modal fade" id="modal-default">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-tittle">@{{ editStatus === false ? 'Insert a new book' : 'Edit current book' }}</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form :action="actionUrl" autocomplete="off" method="POST" @submit="submitForm($event, Book.id)">
					@csrf
					<input v-if="editStatus" type="hidden" name="_method" value="PATCH">
					<div class="modal-body">
						<div class="card-body">
							<div class="form-group">
								<label for="name">isbn</label>
								<input type="number" name="isbn" class="form-control @error('isbn') is-invalid @enderror" placeholder="ISBN" :value="Book.isbn">
								@error('isbn')
									<div class="text-danger mt-1">*{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="tittle">tittle</label>
								<input type="text" name="tittle" class="form-control @error('tittle') is-invalid @enderror" placeholder="Lorem Ipsum" :value="Book.tittle">
								@error('tittle')
									<div class="text-danger mt-1">*{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="year">Year</label>
								<input type="number" name="year" class="form-control @error('year') is-invalid @enderror" placeholder="2023" :value="Book.year">
								@error('year')
									<div class="text-danger mt-1">*{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="publisher_id">Publisher</label>
								<select name="publisher_id" class="form-control @error('publisher_id') is-invalid @enderror" placeholder="Lorem">
									<option selected hidden>None</option>
									@foreach ($publishers as $publisher)
									<option value="{{ $publisher->id }}" :selected="Book.publisher_id === {{ $publisher->id }}">{{ $publisher->name }}</option>
									@endforeach
								</select>
								@error('publisher_id')
									<div class="text-danger mt-1">*{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="author_id">Author</label>
								<select name="author_id" class="form-control @error('author_id') is-invalid @enderror" placeholder="Ipsum">
									<option selected hidden>None</option>
									@foreach ($authors as $author)
									<option value="{{ $author->id }}" :selected="Book.author_id === {{ $author->id }}">{{ $author->name }}</option>
									@endforeach
								</select>
								@error('author_id')
									<div class="text-danger mt-1">*{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="catalog_id">Catalog ID</label>
								<select name="catalog_id" class="form-control @error('catalog_id') is-invalid @enderror" placeholder="Dolor">
									<option selected hidden>None</option>
									@foreach ($catalogs as $catalog)
									<option value="{{ $catalog->id }}" :selected="Book.catalog_id === {{ $catalog->id }}">{{ $catalog->name }}</option>
									@endforeach
								</select>
								@error('catalog_id')
									<div class="text-danger mt-1">*{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="qty">Qty</label>
								<input type="number" name="qty" class="form-control @error('qty') is-invalid @enderror" placeholder="10" :value="Book.qty">
								@error('qty')
									<div class="text-danger mt-1">*{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="price">Price</label>
								<input type="number" name="price" class="form-control @error('price') is-invalid @enderror" placeholder="12.000" :value="Book.price">
								@error('price')
									<div class="text-danger mt-1">*{{ $message }}</div>
								@enderror
							</div>
						</div>
					</div>
					<div class="modal-footer justify-content-between">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">@{{ editStatus === false ? 'Insert' : 'Edit' }}</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

@section('js')
	<script>
	var actionUrl = "{{ url('books') }}";
	var apiUrl = "{{ url('api/books') }}";
	</script>

    <script src="{{ asset ('js/data3.js') }}"></script>
@endsection
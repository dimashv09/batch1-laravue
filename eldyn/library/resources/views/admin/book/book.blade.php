@extends('layouts.admin')
@section('title', 'Books')
@section('wrapper-title', 'Books')

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
       <div class="row w-100 p-3">
			<div class="col-xs-12 col-sm-6 col-md-4" v-for="book in filteredList">
				<div class="info-box shadow-lg poin position-relative">
					<div class="info-box-content" @click="editData(book)" style="cursor: grab;">
						<span class="info-box-text h5 font-weight-bold">@{{ book.title }} (@{{ book.quantity }})</span>
						<span class="info-box-number font-weight-normal">Rp. @{{ priceSpace(book.price )}},-</span>
					</div>
					<span class="badge badge-danger alert-sm position-absolute" @click="deleteData(book.id)" style="right: 5px; top: 5px; cursor: pointer">Delete</span>
				</div>
			</div>
		</div>
    </div>
	<!-- Modal create -->
	<div class="modal fade" id="modal-crud">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">@{{ editStatus === false ? 'Insert a new book' : 'Edit current book' }}</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form :action="actionUrl" autocomplete="off" method="POST" @submit="submitForm($event, singleBook.id)">
					@csrf
					<input v-if="editStatus" type="hidden" name="_method" value="PATCH">
					<div class="modal-body">
						<div class="card-body">
							<div class="form-group">
								<label for="name">isbn</label>
								<input type="number" name="isbn" class="form-control @error('isbn') is-invalid @enderror" placeholder="ISBN" :value="singleBook.isbn">
								@error('isbn')
									<div class="text-danger mt-1">*{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="title">title</label>
								<input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Lorem Ipsum" :value="singleBook.title">
								@error('title')
									<div class="text-danger mt-1">*{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="year">Year</label>
								<input type="number" name="year" class="form-control @error('year') is-invalid @enderror" placeholder="2021" :value="singleBook.year">
								@error('year')
									<div class="text-danger mt-1">*{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="publisher_id">Publisher</label>
								<select name="publisher_id" class="form-control @error('publisher_id') is-invalid @enderror" placeholder="Lorem">
									<option selected hidden>None</option>
									@foreach ($publishers as $publisher)
									<option value="{{ $publisher->id }}" :selected="singleBook.publisher_id === {{ $publisher->id }}">{{ $publisher->name }}</option>
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
									<option value="{{ $author->id }}" :selected="singleBook.author_id === {{ $author->id }}">{{ $author->name }}</option>
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
									<option value="{{ $catalog->id }}" :selected="singleBook.catalog_id === {{ $catalog->id }}">{{ $catalog->name }}</option>
									@endforeach
								</select>
								@error('catalog_id')
									<div class="text-danger mt-1">*{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="quantity">Quantity</label>
								<input type="number" name="quantity" class="form-control @error('quantity') is-invalid @enderror" placeholder="10" :value="singleBook.quantity">
								@error('quantity')
									<div class="text-danger mt-1">*{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="price">Price</label>
								<input type="number" name="price" class="form-control @error('price') is-invalid @enderror" placeholder="12.000" :value="singleBook.price">
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

		var bookVue = new Vue({
			el: '#bookVue',
			data: {
				books: [],
				search: '',
				singleBook: {},
				editStatus: false
			},
			mounted() {
				this.get_books()
				console.log(this.books)
			},
			methods: {
				get_books() {
					const _this = this;

					axios.get('api/books')
					.then(function (response) {
						// handle success
						// console.log(response.data.data)
						_this.books = response.data.data
					})
				},
				priceSpace(x) {
					return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
				},
				addData() {
					this.singleBook = {}
					this.editStatus = false
					$('#modal-crud').modal();
				},
				editData(book) {
					this.singleBook = book
					this.editStatus = true
					$('#modal-crud').modal();
				},
				deleteData(id) {
					Swal.fire({
						title: 'Delete!',
						text: 'Are you sure want to delete this data?',
						icon: 'question',
						showCancelButton: true,
						cancelButtonColor: '#3085d6',
						confirmButtonColor: '#d33',
						cancelButtonText: 'Cancel',
						confirmButtonText: 'Delete',
						reverseButtons: true
					}).then((result) => {
						/* Read more about isConfirmed, isDenied below */
						if (result.isConfirmed) {
							axios.post(actionUrl + '/' + id, {_method: 'DELETE'}).then(response => {
								Swal.fire('Deleted!', '', 'success')
								this.get_books()
							})
							// Swal.fire('Saved!', '', 'success')
						// } else if (result.isDenied) {
						// 	Swal.fire('Changes are not saved', '', 'info')
						}
					});
				},
				submitForm(event, id) {
					const _this = this
					event.preventDefault();
					var url = !this.editStatus ? actionUrl : actionUrl + '/' + id
					axios.post(url, new FormData($(event.target)[0])).then(response => {
						$('#modal-crud').modal('hide')
						this.get_books()
					})
				}
			},
			computed: {
				filteredList() {
					return this.books.filter(book => {
						return book.title.toLowerCase().includes(this.search.toLowerCase())
					})
				}
			}
		})
	</script>
@endsection

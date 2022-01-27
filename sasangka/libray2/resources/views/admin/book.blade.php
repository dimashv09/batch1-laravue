@extends('layouts.admin')
@section('header','Book')

@section('css')
	
@endsection
@section('content')
<div class="container" id="controller">
    <div class="row">
		<div class="row w-100 mb-3">
			<div class="col-md-5 ml-auto">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fas fa-search"></i></span>
					</div>
					<input type="text" class="form-control" autocomplete="off" placeholder="Search from title" v-model="search">
				</div>
			</div>

			<div class="col-md-2 mr-auto">
				<button class="btn btn-primary" @click="addData()">Create a new book</button>
			</div>
		</div>
    </div>
	
<hr>
<div class="row">
	 <div class="col-md-4 col-sm-7 col-xs-8" v-for="book in filteredList">
	 <div class="info-box" v-on:click="editData(book)">
		 <div class="info-box-content">
			 <span class="info-box-text h3">@{{ book.title }} (@{{ book.quantity }}) </span>
			 <span class="info-box-number">Rp.@{{ numberWithSpaces(book.price) }},-<small></small><span>
			 </div>
			</div>
		</div>
	</div>
			 
</div>

<!-- Modal  -->
<div class="modal fade" id="modal-book">
	<div class="modal-dialog">
	  <div class="modal-content">
		  <form method="post" action="" autocomplete="off">
			<div class="modal-header">
			  <h4 class="modal-title">Book</h4>
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>
			<div class="modal-body">
			  @csrf

			  <input type="hidden" name="_method" value="PUT" v-If="editStatus">

			  <div class="form-group">
				<label>ISBN</Label>
				<input type="number" class="form-control" name="isbn" required="" :value="book.isbn">
			  </div>

			  <div class="form-group">
				<label>Title</label>
				<input type="text" class="form-control" name="title" required="" :value="book.title">
			  </div>

			  <div class="form-group">
				<label>Year</label>
				<input type="number" class="form-control" name="year" required="" :value="book.year">
			  </div>

			  <div class="form-group">
				<label>Publisher</label>
				<select name="publisher_id" class="form-control">
					@foreach($publishers as $publisher)
					<option :selected="book.publisher_id" == {{ $publisher->id }} value="{{ $publisher->id }}"> {{ $publisher->name }}</option>
					@endforeach
				</select>
			  </div>

			  <div class="form-group">
				<label>Author</label>
				<select name="author_id" class="form-control">
					@foreach($authors as $author)
					<option :selected="book.author_id" == {{ $author->id }} value="{{ $author->id }}"> {{ $author->name }}</option>
					@endforeach
				</select>
			  </div>

			  <div class="form-group">
				<label>Katalog</label>
				<select name="catalog_id" class="form-control">
					@foreach($catalogs as $catalog)
					<option :selected="book.catalog_id" == {{ $catalog->id }} value="{{ $catalog->id }}"> {{ $catalog->name }}</option>
					@endforeach
				</select>
			  </div>

				<div class="form-group">
			    <label>Qty Stock</label>
			   <input type="number" class="form-control" name="qty" required="" :value="book.quantity">
				</div>

				<div class="form-group">
			     <label> Harga Pinjam/ <label>
				<input type="nuaber" class="form-control" name="price" required="" :value="book.price">
				</div>  

				</div>
			   <div class="modal-footer justify-content-between">
				<button type="button" class="btn btn-default bg-danger" v-if="editStatus" v-on:click"deleteData(book.id)">Delete</button>
				 <button type="submit" class="btn btn-primary">Save changes</button>
</div>
</form>
</div>
</div>
</div>
</div>


@endsection


@section('js')
<script type="text/javascript">
		var actionUrl = '{{ url('books') }}';
		var apiUrl = '{{ url('api/books')}}';
		  
		var app = new Vue({
			el: '#controller',
			data: {
				books:[],
				search: '',
				book:{},
				editStatus: false
			},
			mounted: function() {
				this.get_books();
			},
			methods: {
				get_books() {
					const _this = this;
					$.ajax({
						url: apiUrl,
						method: 'GET',
						success:function (data) {
							_this. books = JSON.parse(data);	
						},
						eror:function (eror) {
							console.log(eror);
						}
					});
				},
				addData() {
					this.book = {};
					this.editStatus = false;
					$('#modal-book').modal();
				},
				editData(book) {
					this.book = book;
					this.editStatus = true;
					$('#modal-book').modal();
				},
				deleteData(id) {
					console.log(id);
				},
				numberWithSpaces (x) {
					return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g,".");
				}
			},
			computed:{
				filteredList(){
					return this.books.filter(book=> { 
						return book.title.toLowerCase().includes(this.search.toLowerCase())
					})
				}
			}
		})
</script>
@endsection
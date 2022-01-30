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
   <!-- Boxes of Books -->
<div class="row">
	<div class="col-lg-4"v-for="book in filteredList">
		<div class="small-box bg-blue" v-on:click="editData(book)">
			<div class="inner">
			 <span class="info-box-text h3">@{{ book.title }} (@{{ book.quantity }}) </span>
			 </div>
			 <div class="icon">
				<i class="fas fa-book"></i>
			</div>
			<p class="small-box-footer">Rp. @{{ numberWithSpaces(book.price) }}</p>
		</div>
	</div>
</div>
</div>

<!-- Modal  -->
<div class="modal fade" id="modal-book">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Book</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post" :action="actionUrl"autocomplete="off" @submit="submitForm($event,book.id)">
				<div class="modal-body">
				
			  @csrf

			  <input type="hidden" name="_method" value="PUT" v-If="editStatus">

			  <div class="form-group">
				<label for="isbn">ISBN</label>
				<input type="number" class="form-control form-control-sm" id="isbn"
					placeholder="Enter Book's ISBN" name="isbn" required :value="book.isbn">
			</div>
			
			<div class="form-group">
				<label for="title">Title</label>
				<input type="text" class="form-control form-control-sm" id="title"
					placeholder="Enter Book's Title" name="title" required :value="book.title">
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
				<label>Catalog</label>
				<select name="catalog_id" class="form-control">
					@foreach($catalogs as $catalog)
					<option :selected="book.catalog_id" == {{ $catalog->id }} value="{{ $catalog->id }}"> {{ $catalog->name }}</option>
					@endforeach
				</select>
			  </div>

				<div class="form-group">
					<label for="qty">Quantity Stock</label>
					<input type="number" class="form-control form-control-sm" id="qty"
						placeholder="Enter Book's Quantity of Stock" name="qty" required
						:value="book.qty">
						</div>  

				<div class="form-group">
			     <label> Harga Pinjam<label>
				<input type="number" class="form-control" name="price" required="" :value="book.price">
				</div>  
				</div>
				<div class="modal-footer justify-content-between" v-if="editStatus">
					<button type="button" class="btn btn-danger"
						@click="deleteData(book.id)">Delete</button>
					<button type="submit" class="btn btn-primary">Save</button>
				</div>
				<div class="modal-footer justify-content-center" v-else>
					<button type="submit" class="col-4 btn btn-primary">Create</button>
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
				actionUrl,
            	apiUrl,
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
					this.data = this.book;
					this.editStatus = true
					$('#modal-book').modal();
				},
				deleteData(id) {
					if (confirm('Are you sure?')) {
						$(event.target).parents('tr').remove();
						axios.post(this.actionUrl + '/' + id, {_method: 'DELETE'}).then(response => {
							location.reload();
					    });
                    }
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
				},
				submitForm(id) {
					event.preventDefault()
					const _this = this
					var url = ! this.editStatus ? this.actionUrl : this.actionUrl + '/' + id
					axios.post(url, new FormData($(event.target)[0])).then(response => {
						$('#modal-book').modal('hide')
						_this.table.ajax.reload();
					})
				}
			}
		})
	</script>
@endsection
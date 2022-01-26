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
	 <div class="info-box">
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
	<div classa"modal-dialog">
	  <div classa"modal-content">
		  <form method="post" action="" autocomplete="off">
			<div class"modal-header">
			  <h4 class="modal-title">Book</h4>
			  <button type="button" class="close" data-dismiss="modal" aria-label-"Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>
			<div class-"modal-body">
			  @csrf

			  <div class="form-group">
				<label>ISBN</Label>
				<input type="number" class="form-control" name="isbn" required="">
			  </div>

			  <div class"form-group">
				<label>Title</label>
				<input type="text" class="form-control" name="title" required="">
			  </div>

			  <div class="form-group">
				<label>Tahun</label>
				<input type="number" class="form-control" name="year" required="">
			  </div>

			  <div class="form-group">
				<label>Publisher</label>
			  </div>

			  <div class="form-group">
				<label>Pengarang</label>
			  </div>

			  <div class="form-group">
				<label>Katalog</label>
			  </div>

				<div class="form-group">
			    <label>Qty Stock</label>
			   <input type="number" class="form-control" name="qty" required="">
				</div>

				<div class="form-group">
			     <label> Harga Pinjam/ <label>
				<input type="nuaber" class="form-control" name="price" required="">
				</div>  

				</div>
			   <div class="modal-footer justify-content-between">
				<button type="button" class="btn btn-default bg-danger">Delete</button>
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
				search: ''
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
					$('#modal-book').modal();
				}
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
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
				<button class="btn btn-primary">Create a new book</button>
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
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
					<input type="text" class="form-control" autocomplete="off" placeholder="Search from title" >
				</div>
			</div>
			<div class="col-md-2 mr-auto">
				<button @click="addData()" class="btn btn-primary">Create a new book</button>
			</div>
		</div>
    </div>
	
  <!-- Modal CRUD BOOK -->
	<div class="modal fade" id="modal-default">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Book

</div>
    
</div>
@endsection

@section('js')
<script type="text/javascript">
		var actionUrl = '{{ url('books') }}';
		   var apiUrl = '{{ url('api/books')}}';
		   !-- CRUD VUE js 2 --> 

		var controller = new Vue({
			el: "#controller",
			data: {
				books:[],
				search :''
			},
			mounted: function() {
				this.get_books();
			},
			methods: {
				get_books() {
				},
				addData() {
					$('#modal-default').modal();
				}
					const _this = this;
					$.ajax({
						url : apiUrl,
						method:'GET'
						success : function (data) {
							_this.books = JSON.parse(data);
						},
						eror function(eror) {
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
					return this.books.filter(books=>{
						return book.title.toLowerCase().includes(this.search.toLowerCase())
					})
				}
			}
		})
</script>
	
@endsection
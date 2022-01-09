@extends('layouts.admin')
@section('header','Books')

@section('css')
	
@endsection
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
    </div>
	
	</script>
@endsection
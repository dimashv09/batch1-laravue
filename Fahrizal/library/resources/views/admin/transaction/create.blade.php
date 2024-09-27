@extends('layouts.admin')
@section('title', 'Transaction')
@section('wrapper-title', 'Transaction - Create')

@section('content')
	<div class="container" id="authorVue">
		<div class="row">
			<div class="card w-100">
				<!-- /.card-header -->
				<div class="card-body">
					<form action="{{ route('transaction.index') }}" method="POST">
                    @csrf
                        <div class="card-body">
                            <div class="row mb-4">
                                <label for="member" class="col-12 col-md-4">Member's Name</label>
                                <select name="member_id" class="form-control col-12 col-md-8 @error('member_id') is-invalid @enderror" id="exampleFormControlSelect1">
                                @foreach ($members as $member)
                                    <option value="{{ $member->id }}">{{ $member->name }}</option>
                                @endforeach
                                </select>
                                @error('member_id')
                                <p class="text-danger mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="row mb-4">
                                <label for="name" class="col-12 col-md-4">Date</label>
                                <div class="col-12 col-md-8 d-flex flex-column flex-md-row px-2">
                                    <div class="d-flex align-items-center w-100 px-0 row">
                                        <div class="col-12 row">
                                            <input type="date" name="date_start" class="form-control col-9 @error('date_start') is-invalid @enderror">
                                            <i class="far fa-calendar-alt ml-3 text-xl col"></i>
                                        </div>
                                        @error('date_start')
                                        <p class="text-danger mt-1 col-12">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <span class="ml-4">—</span>
                                    <div class="d-flex align-items-center w-100 px-0 ml-md-4 row">
                                        <div class="col-12 row">
                                            <input type="date" name="date_end" class="form-control col-9 @error('date_end') is-invalid @enderror">
                                            <i class="far fa-calendar-alt ml-3 text-xl col"></i>
                                        </div>
                                        @error('date_end')
                                        <p class="text-danger mt-1 col-12">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="row mb-4">
                                <label for="books" class="col-12 col-md-4">Books</label>
                                <select name="books[]" class="select2 px-0 col-12 col-md-8 @error('books') is-invalid @enderror" multiple="multiple" data-placeholder="Select a State" >
                                @foreach ($books as $book)
                                    <option value="{{ $book->id }}">{{ $book->title }}</option>
                                @endforeach
                                </select>
                                @error('books')
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="row mb-4">
                                <label for="status" class="col-12 col-md-4">Status</label>
                                <div class="col-12 col-md-8">
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" name="status" id="returned" value="1" checked>
                                        <label class="form-check-label" for="returned">
                                            Returned
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="noReturned" value="0">
                                        <label class="form-check-label" for="noReturned">
                                            Not yet returned
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- /.card-body -->
						<div class="card-footer bg-transparent text-right">
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</form>
				</div>
				<!-- /.card-body -->
			</div>
		</div>
	</div>
@endsection

@section('js')
	<script>
		var actionUrl = "{{ url('authors') }}";
		var apiUrl = "{{ url('api/authors') }}";
    $(function () {
        $('.select2').select2();
        $('.select2').on('select2:select', function (e) {
                var data = e.params.data;
                console.log(data);
            });
    });
		var authorVue = new Vue({
			el: "#authorVue",
			data: {
				dataList: [],
				data: {},
				actionUrl,
				apiUrl,
				editStatus: false
			},
			methods: {
				addData() {
					this.data = []
					this.editStatus = false
					$('#modal-crud').modal();
				},
				editData(event, row) {
					this.data = this.dataList[row]
					this.editStatus = true
					$('#modal-crud').modal();
				},
				deleteData(event, id) {
					if (confirm('Are you sure?')) {
						$(event.target).parents('tr').remove();
						axios.post(this.actionUrl + '/' + id, {_method: 'DELETE'}).then(response => {
							alert("Data has been removed")
						})
					}
				},
				submitForm(event, id) {
					const _this = this
					event.preventDefault();
					var url = !this.editStatus ? this.actionUrl : this.actionUrl + '/' + id
					axios.post(url, new FormData($(event.target)[0])).then(response => {
						$('#modal-crud').modal('hide')
						_this.table.ajax.reload();
					})
				}
			}
		})
	</script>
@endsection
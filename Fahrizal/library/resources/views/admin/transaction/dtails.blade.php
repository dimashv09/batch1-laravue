extends('layouts.admin')
@section('title', 'Transaction')
@section('wrapper-title', 'Transaction - Dtails')

@section('content')
	<div class="container" id="authorVue">
		<div class="row">
			<div class="card w-100">
				<!-- /.card-header -->
				<div class="card-body">
					{{-- <form action="{{ route('transaction') }}" method="POST">
                    @csrf --}}
                        <div class="card-body">
                            <div class="row mb-4">
                                <label for="member" class="col-12 col-md-4">Member's Name</label>
                                <input type="text" class="border-0 bg-light col-12 col-md-8 form-control" value="{{ $transaction->member->name }}" readonly>
                            </div>
                            <div class="row mb-4">
                                <label for="name" class="col-12 col-md-4">Date</label>
                                <div class="col-12 col-md-8 d-flex flex-column flex-md-row px-0">
                                    <div class="d-flex align-items-center w-100 px-0">
                                        <input type="text" name="date_start" class="border-0 bg-light form-control col" value="{{ $transaction->date_start }}">
                                        <i class="far fa-calendar-alt ml-2 text-xl"></i>
                                    </div>
                                    <span class="ml-4">—</span>
                                    <div class="d-flex align-items-center w-100 px-0 ml-md-4">
                                        <input type="text" name="date_start" class="border-0 bg-light form-control col" value="{{ $transaction->date_end }}">
                                        <i class="far fa-calendar-alt ml-2 text-xl"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="books" class="col-12 col-md-4">Books</label>
                                <select type="text" class="border-0 bg-light col-12 col-md-8 form-control" value="{{ $transaction->book_id }}" multiple>
                                    @foreach ($transaction->books as $book)
                                        <option>{{ $book->title }}</option>
                                    @endforeach
                                    <option value=""></option>
                                </select>
                            </div>
                            <div class="row mb-4">
                                <label for="status" class="col-12 col-md-4">Status</label>
                                <input type="text" name="date_start" class="border-0 bg-light form-control col" value="{{ $transaction->status ? 'Returned' : 'Not yet returned' }}">
                            </div>
                        </div>
						<!-- /.card-body -->
						{{-- <div class="card-footer bg-transparent text-right">
							<button type="submit" class="btn btn-primary">Submit</button>
						</div> --}}
					{{-- </form> --}}
				</div>
				<!-- /.card-body -->
			</div>
		</div>
	</div>
@endsection

@section('js')
	<!-- DataTables  & Plugins -->
	<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
	<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
	<script>
		var actionUrl = "{{ url('authors') }}";
		var apiUrl = "{{ url('api/authors') }}";
    $(function () {
      $('.select2').select2()
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
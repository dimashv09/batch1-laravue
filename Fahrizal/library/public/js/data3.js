	var bookVue = new Vue({
			el: '#bookVue',
			data: {
				books: [],
				search: '',
				Book: {},
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
						_this.books = response.data.data
					})
				},
                datatable() {
                    const _this = this;
                    _this.table = $('#dataTable').DataTable({
                        ajax: {
                            url: this.apiUrl,
                            type: 'GET'
                        },
                        columns,
                    }).on('xhr', function() {
                        _this.dataList = _this.table.ajax.json().data;
                    })
                },
				priceSpace(x) {
					return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
				},


				addData() {
					this.Book = {}
					this.editStatus = false
					$('#modal-default').modal();
				},


				editData(book, ) {
					this.Book = book
					this.editStatus = true
					$('#modal-default').modal();
				},


				deleteData(id) {
					Swal.fire({
						tittle: 'Delete!',
						text: 'Are you sure want to delete this data?',
						icon: 'question',
						showCancelButton: true,
						cancelButtonColor: '#3085d6',
						confirmButtonColor: '#d33',
						cancelButtonText: 'Cancel',
						confirmButtonText: 'Delete',
						reverseButtons: true
					}).then((result) => {
						if (result.isConfirmed) {
							axios.post(actionUrl + '/' + id, {_method: 'DELETE'}).then(response => {
								Swal.fire('Deleted!', '', 'success')
								this.get_books()
							})
						}
					});
				},
				submitForm(event, id) {
					const _this = this
					event.preventDefault();
					var url = !this.editStatus ? actionUrl : actionUrl + '/' + id
					axios.post(url, new FormData($(event.target)[0])).then(response => {
						$('#modal-default').modal('hide')
						this.get_books()
					})
				}
			},
			computed: {
				filteredList() {
					return this.books.filter(book => {
						return book.tittle.toLowerCase().includes(this.search.toLowerCase())
					})
				}
			}
		})
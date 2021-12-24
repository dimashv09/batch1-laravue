@extends('layouts.admin')

@section('header', 'Book')

@section('css')
@endsection

@section('content')
<div id="controller">
    <div class="container">
        <!-- Search bar & Add Button -->
        <div class="row justify-content-center">
            <div class="col-md-6">
                <input type="search" class="form-control" placeholder="Search a book by title" v-model="search">
            </div>
            <button class="btn btn-primary" @click="addData()">Add New Book</button>
        </div>
        <hr class="bg-light">

        <!-- Boxes of Books -->
        <div class="row">
            <div class="col-lg-4" v-for="book in bookFilter()">
                <div class="small-box bg-dark" @click="editData(book)">
                    <div class="inner">
                        <h4>@{{ book.title }}</h4>
                        <h5 class="text-muted">Released on (@{{ book.year }})</h5>
                        <h6 class="text-muted">Stock: @{{ book.qty }}</h6>
                    </div>
                    <div class="icon">
                        <i class="fas fa-book"></i>
                    </div>
                    <p class="small-box-footer">Rp. @{{ numberWithSpaces(book.price) }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Popup -->
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Book</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form :action="actionUrl" method="post" @submit.prevent="submitted($event, book.id)">
                    <div class="modal-body">
                        @csrf

                        <input type="hidden" name="_method" value="PUT" v-if="isEdit">

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

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="year">Year</label>
                                    <input type="text" class="form-control form-control-sm" id="year"
                                        placeholder="Enter Book's Year Released" name="year" required
                                        :value="book.year">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="publisher">Publisher</label>
                                    <select name="publisher_id" id="publisher" class="form-control form-control-sm">
                                        @foreach ($publishers as $publisher)
                                        <option :selected="book.publisher_id == {{ $publisher->id }}"
                                            value="{{ $publisher->id }}">{{ $publisher->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="author">Author</label>
                                    <select name="author_id" id="author" class="form-control form-control-sm">
                                        @foreach ($authors as $author)
                                        <option :selected="book.author_id == {{ $author->id }}"
                                            value="{{ $author->id }}">{{ $author->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="catalog">Catalog</label>
                                    <select name="catalog_id" id="catalog" class="form-control form-control-sm">
                                        @foreach ($catalogs as $catalog)
                                        <option :selected="book.catalog_id == {{ $catalog->id }}"
                                            value="{{ $catalog->id }}">{{ $catalog->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="qty">Quantity of Stock</label>
                                    <input type="number" class="form-control form-control-sm" id="qty"
                                        placeholder="Enter Book's Quantity of Stock" name="qty" required
                                        :value="book.qty">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="number" class="form-control form-control-sm" id="price"
                                        placeholder="Enter Book's Price" name="price" required :value="book.price">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between" v-if="isEdit">
                        <button type="button" class="btn btn-danger"
                            @click.prevent="deleteData(book.id)">Delete</button>
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
<script>
    const actionUrl = `{{ url('books') }}`
    const apiUrl = `{{ url('/api/books') }}`

    const controller = new Vue({
        el: '#controller',
        data: {
            actionUrl,
            apiUrl,
            books: [],
            search: '',
            book: {},
            isEdit: false,
        },
        mounted() {
            this.getBooks();
        },
        methods: {
            getBooks() {
                // Using Axios instead of Ajax
                axios
                    .get(apiUrl)
                    .then(response => this.books = response.data)
                    .catch(error => console.log(error))
            },
            numberWithSpaces(num) {
                return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            },
            bookFilter() {
                return this.books.filter(book => {
                    return book.title.toLowerCase().includes(this.search.toLowerCase())
                })
            },
            addData() {
                this.book = {}
                this.isEdit = false
                $('#modal-default').modal();
            },
            editData(book) {
                this.book = book
                this.isEdit = true
                $('#modal-default').modal();
            },
            deleteData(bookID) {
                Swal.fire({
                    title: "Are you sure you want to delete this book?",
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        axios.post(`${actionUrl}/${bookID}`, {_method: 'DELETE'})
                            .then(response => {
                                $('#modal-default').modal('hide')
                                Swal.fire("Book has been Deleted")
                                this.getBooks();
                            })
                    }
                })
            },
            submitted(event, bookID) {
                let actionUrl = this.isEdit ? `${this.actionUrl}/${bookID}` : this.actionUrl
                let successMessage = this.isEdit ? "Data has been Updated" : "Data has been Added"

                axios.post(actionUrl, new FormData($(event.target)[0]))
                    .then(() => {
                        $('#modal-default').modal('hide')
                        Swal.fire(successMessage)
                        this.getBooks();
                    })
                    .catch((error) => {
                        if (error.response) {
                            // get all error messages
                            let errorMessage = error.response.data.errors
                            // extract each error then insert it into error box
                            let errorBox = ''
                            $.each(errorMessage, function (key, val) {
                                errorBox += `<p clas='text-danger'> ${val}</p> <br>`
                            })

                            // Display an Error Messages
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                html: errorBox,
                            })
                        }
                    })
            }
        }
    })
</script>
@endsection

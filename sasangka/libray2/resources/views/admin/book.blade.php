@extends('layouts.admin')
@section('header', 'Book')

@section('css')

@endsection
@section('content')
<div id="controller">
    <div class="row">
        <div class="row w-100 mb-3">
            <div class="col-md-5 ml-auto">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                    </div>
                    <input type="text" class="form-control" autocomplete="off" placeholder="Search from title"
                        v-model="search">
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
        <div class="col-lg-4" v-for="book in filteredList">
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
                <form :action="actionUrl" method="post" @submit.prevent="submitform($event,book.id)">
                    <div class="modal-body">
                        @csrf

                        <input type="hidden" name="_method" value="PUT" v-if="editStatus">

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
                                    <input type="number" class="form-control form-control-sm" id="quantity"
                                        placeholder="Enter Book's Quantity of Stock" name="quantity" required
                                        :value="book.quantity">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="price">Harga Pinjam</label>
                                    <input type="number" class="form-control form-control-sm" id="price"
                                        placeholder="Enter Book's Price" name="price" required :value="book.price">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" v-if="editStatus"
                            v-on:click="deleteData(target,book.id)">Delete</button>
                        <button type="submit" class="btn btn-primary" @submit.prevent="submitform($event, book.id)">Save
                            changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>



@endsection


@section('js')
<script type="text/javascript">
    var actionUrl = '{{ url('books ') }}';
    var apiUrl = '{{ url(' api / books ') }}';
    var app = new Vue({
                el: '#controller',
                data: {
                    books: [],
                    search: '',
                    actionUrl,
                    apiUrl,
                    target: '',
                    editStatus: false,
                    book: {}
                },
                mounted: function () {
                    this.get_books();
                },
                methods: {
                    get_books() {
                        const _this = this;
                        $.ajax({
                            url: apiUrl,
                            method: 'GET',
                            success: function (data) {
                                _this.books = JSON.parse(data);
                            },
                            eror: function (eror) {
                                console.log(eror);
                            }
                        })
                    },
                    numberWithSpaces(num) {
                        return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                    }
                    },
                    computed: {
                        filteredList() {
                            return this.books.filter(book => {
                                return book.title.toLowerCase().includes(this.search.toLowerCase())
                            })
                    },
                    addData() {
                        this.book = {};
                        this.editStatus = false;
                        $('#modal-book').modal();
                    },
                    editData(book) {
                        this.book = book;
                        this.editStatus = true
                        $('#modal-book').modal();
                    },
                    deleteData(target, id) {
                        this.action += "/" + id;
                        const _this = this;
                        if (confirm("Apakah Anda yakin ingin menghapusnya?")) {
                            axios
                                .post(this.action, {
                                    _method: "DELETE"
                                })
                                .then((response) => {
                                    this.message = "Data berhasil dihapus";
                                    $('#modal-book').modal('hide');
                                    Swal.fire(this.message);
                                    this.getBook();
                                })
                        }
                    },
                    submitform(event, id) {
                        event.preventDefault();
                        const _this = this;
                        if (this.editStatus) {
                            axios
                                .post(this.actionUrl + "/" + id, this.book)
                                .then((response) => {
                                    this.message = "Data berhasil diubah";
                                    $('#modal-book').modal('hide');
                                    Swal.fire(this.message);
                                    this.getBook();
                                });
                        } else {
                            axios
                                .post(this.actionUrl, this.book)
                                .then((response) => {
                                        this.message = "Data berhasil ditambahkan";
                                        $('#modal-book').modal('hide');
                                        Swal.fire(this.message);
                                        this.getBook();
                                    })
                                }
                        }
                    }
                })
</script>
@endsection

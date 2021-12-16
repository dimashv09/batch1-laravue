@extends('layouts.admin')

@section('header', 'Book')

@section('css')
@endsection

@section('content')
<div id="controller">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <input type="search" class="form-control" placeholder="Search a book by title" v-model="search">
            </div>
            <button class="btn btn-primary">Add New Book</button>
        </div>

        <hr class="bg-light">

        <div class="row">
            <div class="col-lg-4" v-for="book in bookFilter()">
                <div class="small-box bg-dark">
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
</div>
@endsection

@section('js')
<script>
    const actionUrl = `{{ url('books') }}`
    const apiUrl = `{{ url('/api/books') }}`

    const controller = new Vue({
        el: '#controller',
        data: {
            books: [],
            search: ''
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
            }
        }
    })
</script>
@endsection

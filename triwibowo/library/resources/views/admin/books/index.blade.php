@extends('layouts.admin')

@section('content')
    <div id="controller">
        <div class="row">
            <div class="col-md-5 offset-md-3">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                    </div>
                    <input type="text" class="form-control" autocomplete="off" placeholder="Search from title" v-model="search">
                </div>
            </div>

            <div class="col-md-2">
                <button class="btn btn-primary" @click="addData()">Create New Book</button>
            </div>
        </div>

        <hr>
        <div class="row">
            <div class="col-sm" v-for="book in filteredList">
            <div class="card" style="width: 18rem;" v-on:click="editData(book)">
                <img src="https://source.unsplash.com/random/600x400/?book cover" class="card-img-top" alt="...">
                <div class="card-body">
                  <span class="card-text h3 d-block">@{{ book.title }}</span>
                  <hr>
                  <span class="card-number d-block">Author by <a href="" class="text-decoration-none">@{{ book.author.name}}</a></span>
                  <span class="card-number d-block">Published by <a href="" class="text-decoration-none">@{{ book.publisher.name}}</a></span>
                  <span class="card-number d-block">In Catalog <a href="" class="text-decoration-none">@{{ book.catalog.name}}</a></span>
                  <hr>
                  <div class="row">
                  <div class="col-md">
                    <span class="card-number d-block"><b>Rp.@{{ numberWithCommas(book.price) }},-</b></span>
                    <span class="mt-0"><small>Stock : @{{ book.qty }}</small></span>
                  </div>
                  <div class="col-md">
                      <span class="d-block">Publish at @{{ book.year }}</span>
                      <span class="mt-0"><small>Rating : @{{ book.id }}</small></span>
                  </div>
                </div>
                </div>
              </div>
            </div>
        </div>

        <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post" :action="actionUrl" autocomplete="off" @submit="submitForm($event, book.id)">
                        <div class="modal-header">
                            <h4 class="modal-title">Book</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @csrf
                            <input type="hidden" name="_method" value="PUT" v-if="editStatus">  
                            <div class="form-floating mb-3">
                                <input type="number" name="isbn" class="form-control" id="floatingInput"
                                    placeholder=" Input book ISBN" :value="book.isbn">
                            </div>         
                            <div class="form-floating mb-3">
                                <input type="text" name="title" class="form-control" id="floatingInput"
                                    placeholder="Input book title" :value="book.title">
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="year" class="form-control" id="floatingInput"
                                    placeholder="Input book year" :value="book.year">
                            </div>
                            <div class="form-floating mb-3 d-flex">
                                <select class="form-control" name="publisher_id">
                                    <option selected>Select Publisher</option>
                                    @foreach ($publishers as $publisher)
                                    <option :selected="book.publisher_id == {{ $publisher->id }}"  value="{{ $publisher->id }}">{{ $publisher->name }}</option>
                                    @endforeach
                                  </select>
                            </div>
                            <div class="form-floating mb-3 d-flex">
                                <select class="form-control" name="author_id">
                                    <option selected>Select Author</option>
                                    @foreach ($authors as $author)
                                    <option :selected="book.author_id == {{ $author->id }}" value="{{ $author->id }}">{{ $author->name }}</option>
                                    @endforeach
                                  </select>
                            </div>
                            <div class="form-floating mb-3 d-flex">
                                <select class="form-control" name="catalog_id">
                                    <option selected>Select Catalog</option>
                                    @foreach ($catalogs as $catalog)
                                    <option :selected="book.catalog_id == {{ $catalog->id }}"  value="{{ $catalog->id }}">{{ $catalog->name }}</option>
                                    @endforeach
                                  </select>
                            </div>
                            <div class="row">
                                <div class="col-md form-floating mb-3">
                                    <input type="text" name="qty" class="form-control" id="floatingInput"
                                        placeholder="Input book quantity" :value="book.qty">
                                </div>
                                <div class="col-md form-floating mb-3">
                                    <input type="text" name="price" class="form-control" id="floatingInput"
                                        placeholder="Input book price" :value="book.price">
                                </div>
                            </div>  
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-danger" v-if="editStatus" v-on:click="deleteData(target, book.id)">Delete</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>                   
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">
    var actionUrl = '{{ url('books') }}';
    var apiUrl = '{{ url('api/books') }}';

    var app = new Vue({
        el: '#controller',
        data: {
            books: [],
            search: '',
            actionUrl,
            apiUrl,
            target :'',
            editStatus: false,
            book: {}
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
                    success: function (data) {
                        _this.books = JSON.parse(data);
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            },
            addData(){
                this.book = {};
                this.editStatus = false;
                $('#modal-default').modal();
            },
            editData(book) {
                this.book = book;
                this.editStatus = true;
                $('#modal-default').modal();
            },
            deleteData(target, id) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $(target.target).parents().remove();
                        axios.post(this.actionUrl + '/' + id, {
                            _method: 'DELETE'
                        }).then(response => {
                            Swal.fire(
                                'Good job!',
                                'Your data has been deleted',
                                'success'
                            );
                            $('#modal-default').modal('hide');
                            this.get_books();
                        });
                    };
                });
            },
            numberWithCommas(x) {
                return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            },
            submitForm(event, id) {
                event.preventDefault();
                const _this = this;
                var actionUrl = !this.editStatus ? this.actionUrl : this.actionUrl + '/' + id; 
                axios
                    .post(actionUrl, new FormData($(event.target)[0]))
                    .then(response => {
                        $('#modal-default').modal('hide');
                        _this.get_books();
                        Swal.fire(
                            'Good job!',
                            'Thanks Bro',
                            'success'
                        );
                    })
                    .catch(function(error) {
                        if (error.response) {
                            var message_error = error.response.data.errors;
                            var error_element = "";
                            $.each(
                                // console.log(message_error),
                                message_error,
                                function(indexInArray, valueOfElement) {
                                    // error_element += `<div clas='text-danger'> ${valueOfElement}</div> <br>`;
                                    error_element += `<div class="alert alert-danger" role="alert">
                                    ${valueOfElement} </div>`
                                },
                            );
                                Swal.fire({
                                    position: "top",
                                    icon: "error",
                                    title: 'Oops...',
                                    html: error_element,
                                    confirmButtonText: "Again !",
                            });
                        }
                    });
         },
    },
        computed: {
            filteredList() {
                return this.books.filter(book => {
                    return book.title.toLowerCase().includes(this.search.toLowerCase())
                })
            }
        }
    });
</script>   
@endsection

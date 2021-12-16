@extends('layouts.app')

@section("content-header", "Buku")
@section("title", "Buku")
@section('subtitle', 'Daftar Buku')
@section('content-title', 'Daftar Buku' )

@section('content')
<div id="app">
    <div class="row justify-content-center">
        <div class="col-sm-8 offtets-md-2">
            <form action="" class="d-inline">
                <div class="input-group">
                    <input type="search" class="form-control form-control-md" placeholder="Cari Buku" v-model="search">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-md btn-default">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-sm-2">
            <a href="#" v-on:click="store()" class="btn btn-primary btn-md">Tambah</a>
        </div>
    </div>

    <hr>
    <div class="row">
        <div class="col-md-3" v-for="data in searchBook">
            <div class="info-box shadow" @click="update($event, data.id)">
                <span class="info-box-icon bg-primary"><i class="fas fa-book"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">@{{ data.title }}</span>
                    <small class="info-box-text">Stok @{{ data.stock }}</small>
                    <span class="info-box-number">Rp @{{ currency(data.price) }}</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <validation-errors :errors="validationErrors" v-if="validationErrors"></validation-errors>
            <form :action="action" method="POST" v-on:submit="submitForm( $event, data.id )">
                @csrf
                <input type="hidden" name="_method" value="PUT" v-if="method">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                          <label for="isbn" class="form-label">ISBN</label>
                          <input type="number" name="isbn" id="isbn" class="form-control" :value="data.isbn">
                        </div>
                        <div class="mb-3">
                          <label for="title" class="form-label">Judul</label>
                          <input type="text" class="form-control" name="title" id="title" :value="data.title">
                        </div>
                        <div class="mb-3">
                          <label for="writer_id" class="form-label">Pengarang</label>
                          <select class="form-control" name="writer_id" id="writer">
                              @foreach ($writers as $writer)
                                <option :selected="data.writer_id = {{$writer->id}}" value="{{$writer->id}}">{{$writer->name}}</option>
                              @endforeach
                          </select>
                        </div>
                        <div class="mb-3">
                          <label for="publisher_id" class="form-label">Penerbit</label>
                          <select class="form-control" name="publisher_id" id="publisher">
                              @foreach ($publishers as $publisher)
                                <option :selected="data.publisher_id = {{$publisher->id}}" value="{{$publisher->id}}">{{$publisher->name}}</option>
                              @endforeach
                          </select>
                        </div>
                        <div class="mb-3">
                          <label for="year" class="form-label">Tahun Terbit</label>
                          <input type="year" name="year" id="year" class="form-control" :value="data.year">
                        </div>
                        <div class="mb-3">
                          <label for="catalog_id" class="form-label">Katalog</label>
                          <select class="form-control" name="catalog_id" id="catalog">
                              @foreach ($catalogs as $catalog)
                                <option :selected="data.catalog_id = {{$catalog->id}}" value="{{$catalog->id}}">{{$catalog->name}}</option>
                              @endforeach
                          </select>
                        </div>
                        <div class="mb-3">
                          <label for="price" class="form-label">Harga</label>
                          <input type="number" name="price" id="price" class="form-control" :value="data.price">
                        </div>
                        <div class="mb-3">
                          <label for="stock" class="form-label">Stok</label>
                          <input type="number" name="stock" id="stock" class="form-control" :value="data.stock">
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" v-on:click="destroy(data.id)">Delete</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection

@push('script')
 {{-- vue and axios CDN --}}
 <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
 {{-- sweetalert CDN --}}
 <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

 <script>
    var api =  '{{url('get/book')}}'
    var action = '{{url('book')}}'

    var app = new Vue({
        el: "#app",
        data: {
            search: '',
            datas: [], // variable yang akan menampung smua data penulis
            data: {}, // variable untuk prepare crud
            action, // variable action form
            method: false,
            message: "",
        },
        mounted: function () {
            this.getBook();
        },
        methods: {
            getBook() {
                const _this = this
                $.ajax({
                    type: "GET",
                    url: api,
                    success: function (response) {
                        _this.datas = response
                    },
                    error : function(error){
                        console.log(error)
                    }
                });
            },
            currency(number)
            {
                return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            },
            store() {
                this.data = {};
                this.method = false;
                $(".modal-title").text("Tambah Buku Baru");
                $("#exampleModal").modal();
            },
            update(event, id) {
                var index = this.datas.findIndex(x => x.id === id)
                this.data = this.datas[index]
                console.log(this.data)
                this.method = true;
                $(".modal-title").text("Detail Buku");
                $("#exampleModal").modal();
            },
            destroy(id) {
                this.action += "/" + id;
                const _this = this;
                if (confirm("Apakah Anda yakin ingin menghapusnya?")) {
                    axios
                        .post(this.action, { _method: "DELETE" })
                        .then((response) => {
                            this.message = "Data berhasil dihapus";
                            $("#exampleModal").modal("hide");
                            Swal.fire(this.message);
                        });
                }
            },
            submitForm(event, id) {
                event.preventDefault();
                const _this = this;
                var action = !this.method ? this.action : this.action + "/" + id;
                this.message = !this.method
                    ? "Data Berhasil ditambahkan"
                    : "Data berhasil diubah";
                axios
                .post(action, new FormData($(event.target)[0]))
                    .then((response) => {
                            $("#exampleModal").modal("hide");
                            Swal.fire(this.message);
                    }).catch( function(error) {
                        if (error.response) {
                            var message_error = error.response.data.errors;
                            var error_element = '';
                            $.each(message_error, function (indexInArray, valueOfElement) {
                                error_element += `<div clas='text-danger'> ${valueOfElement}</div> <br>`
                            });

                            Swal.fire({
                                title: 'Gagal!',
                                icon: 'error',
                                html : error_element,
                                confirmButtonText: 'Ulangi'
                            })
                        }
                    });
            },
        },
        computed : {
            searchBook(){
                return this.datas.filter(book => {
                    return book.title.toLowerCase().includes(this.search.toLowerCase());
                })
            },
        }
    });
 </script>
@endpush

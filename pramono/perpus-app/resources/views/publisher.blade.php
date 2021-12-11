@extends('layouts.app')

@section("content-header", "Penerbit")
@section("title", "Penerbit")
@section('subtitle', 'Daftar Penerbit')
@section('content-title', 'Daftar Penerbit' )

@section('content')
<div id="app">
    <div class="row justify-content-start">
        <div class="col-sm-12">
            @if (session('sukses'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{session('sukses')}}</strong>.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <p>Proccess Failed</p>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        Data Penerbit
                    </div>
                    <div class="card-tools ">
                        <a href="#" @click="store()" class="btn btn-sm btn-primary">
                            <i class="fas fa-plus"></i>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-sm table-bordered text-center" id="publishers">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Telepon</th>
                            <th>Alamat</th>
                            <th>Dibuat Pada</th>
                            <th>Buku</th>
                            <th>Opsi</th>
                          </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
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
                          <label for="name" class="form-label">Nama</label>
                          <input type="text" name="name" id="name" class="form-control" placeholder="Masukan Nama Penulis" :value="data.name">
                        </div>
                        <div class="mb-3">
                          <label for="email" class="form-label">Email</label>
                          <input type="email" class="form-control" name="email" id="email"  placeholder="Masukan Email" :value="data.email">
                        </div>
                        <div class="mb-3">
                          <label for="phone" class="form-label">Telepon</label>
                          <input type="tel" name="phone" id="phone" class="form-control" placeholder="Masukan No. Telepon" :value="data.phone">
                        </div>
                        <div class="mb-3">
                          <label for="address" class="form-label">Alamat</label>
                          <input type="text" name="address" id="address" class="form-control" placeholder="Masukan Alamat" :value="data.address">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('css')
    {{-- crud script --}}
    <link rel="stylesheet" href="{{asset('vendor/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection

@push('script')
    {{-- vue and axios CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    {{-- datatables script --}}
    <script src="{{asset('vendor/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('vendor/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('vendor/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    {{-- <script src="{{asset('vendor/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script> --}}
    {{-- <script src="{{asset('vendor/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script> --}}
    {{-- <script src="{{asset('vendor/plugins/jszip/jszip.min.js')}}"></script> --}}
    {{-- <script src="{{asset('vendor/plugins/pdfmake/pdfmake.min.js')}}"></script> --}}
    {{-- <script src="{{asset('vendor/plugins/pdfmake/vfs_fonts.js')}}"></script> --}}
    {{-- <script src="{{asset('vendor/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script> --}}
    {{-- <script src="{{asset('vendor/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script> --}}
    {{-- <script src="{{asset('vendor/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script> --}}

    {{-- prepare variables for datatable DOM & crud --}}
    <script>
        var action = '{{url('publisher')}}';
        var api = '{{url('get/publisher')}}';
        var columns = [
            { data: "DT_RowIndex", name: "id" },
            { data: "name", name: "name" },
            { data: "email", name: "email" },
            { data: "phone", name: "phone" },
            { data: "address", name: "address" },
            { data: "created_at", name: "created_at" },
            { data: "books", name: "books" },
            {
                render: function (i, row, data, meta) {
                    return `
                <a href="#" onclick="app.update(event, ${meta.row})" class="btn btn-info btn-sm">Edit</a>
                <a href="#" onclick="app.destroy(event, ${data.id})" class="btn btn-danger btn-sm">Hapus</a>
                `;
                },
                orderable: false,
            },
        ];
    </script>

    {{-- crud script --}}
    <script src="{{asset('js/myscript.js')}}"></script>
@endpush

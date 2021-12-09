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
                    <table class="table table-bordered text-center" id="publishers">
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
                        <tbody>
                            @forelse ($publishers as $publisher)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$publisher->name}}</td>
                                    <td>{{$publisher->email}}</td>
                                    <td>{{$publisher->phone}}</td>
                                    <td>{{$publisher->address}}</td>
                                    <td>{{date('l, M Y', strtotime($publisher->created_at))}}</td>
                                    <td>{{count($publisher->books)}}</td>
                                    <td>
                                        <a href="#" @click="update({{$publisher}})" class="btn btn-info btn-sm">Edit</a>
                                        <a href="#" @click="destroy({{$publisher}})" class="btn btn-danger btn-sm">Hapus</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">Belum ada data.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form :action="url" method="POST">
                @csrf
                <input type="hidden" name="_method" value="PUT" v-if="method">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">No. Title</h5>
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
<!-- DataTables Css -->
<link rel="stylesheet" href="{{asset('vendor/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('vendor/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('vendor/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection

@push('script')
    {{-- vue's CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.24.0/axios.js"></script>
    {{-- datatables sources --}}
    <script src="{{asset('vendor/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('vendor/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('vendor/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('vendor/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('vendor/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('vendor/plugins/jszip/jszip.min.js')}}"></script>
    <script src="{{asset('vendor/plugins/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{asset('vendor/plugins/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{asset('vendor/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('vendor/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('vendor/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

    <script>
        var app = new Vue({
                el : '#app',
                data : {
                    data : {},
                    url : '',
                    method : false
                },
                methods: {
                    store(){
                        this.data = {}
                        this.url = '{{url('publisher')}}'
                        this.method = false
                        $("#exampleModal").modal()
                    },
                    update(data){
                        this.data = data
                        this.url = '{{url('publisher')}}'+'/'+data.id
                        this.method = true
                        $("#exampleModal").modal()
                    },
                    destroy(data){
                        this.url = '{{url('publisher')}}'+'/'+ data.id
                        if(confirm('Apakah Anda yakin ingin menghapusnya?')) {
                            axios.post(this.url, { _method:'DELETE'}).then(response =>{location.reload();
                            });
                        }
                    },
                }

		});

        // datatable's script
        $("#publishers").DataTable({
            "responsive": true, "lengthChange": true, "autoWidth": false, "info": false,
            "buttons": ["excel", "pdf",
                {
                    extend: 'print',
                    title: function(){
                        var printTitle = 'Data Penerbit';
                        return printTitle
                    },
                }
            ]
        }).buttons().container().appendTo('#publishers_wrapper .col-md-6:eq(0)');
    </script>
@endpush

@extends('layouts.app')

@section("content-header", "$title")
@section("title", "$title")
@section('subtitle', 'Daftar Penulis')
@section('content-title', 'Daftar Penulis' )

@section('content')
<div id="app">
    <div class="row justify-content-start">
        <div class="col-md-12">
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
                        Data Penulis
                    </div>
                    <div class="card-tools">
                        <a href="#" @click="store()" class="btn btn-sm btn-primary">
                            <i class="fas fa-plus"></i>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered text-center" id="writers">
                        <thead>
                            <tr>
                                <th>No</th>
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
                            @forelse ($writers as $writer)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$writer->name}}</td>
                                    <td>{{$writer->email}}</td>
                                    <td>{{$writer->phone}}</td>
                                    <td>{{$writer->address}}</td>
                                    <td>{{date('l, M Y', strtotime($writer->created_at))}}</td>
                                    <td>{{count($writer->books)}}</td>
                                    <td>
                                        <a href="#" @click="update({{$writer}})" class="btn btn-info btn-sm">Edit</a>
                                        <a href="#" @click="destroy({{$writer}})" class="btn btn-danger btn-sm">Hapus</a>
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
        // vue's script
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
                        this.url = '{{url('writer')}}'
                        this.method = false
                        $(".modal-title").text("Tambah Penulis")
                        $("#exampleModal").modal()
                    },
                    update(data){
                        this.data = data
                        this.url = '{{url('writer')}}'+'/'+data.id
                        this.method = true
                        $(".modal-title").text("Edit Penulis")
                        $("#exampleModal").modal()
                    },
                    destroy(data){
                        this.url = '{{url('writer')}}'+'/'+ data.id
                        if(confirm('Apakah Anda yakin ingin menghapusnya?')) {
                            axios.post(this.url, { _method:'DELETE'}).then(response =>{location.reload();
                            });
                        }
                    },
                }

		});

        // datatable's script
        $("#writers").DataTable({
            "responsive": true, "lengthChange": true, "autoWidth": true, "info": false,
            "buttons": ["excel", "pdf",
                {
                    extend: 'print',
                    title: function(){
                        var printTitle = 'Data Penulis';
                        return printTitle
                    },
                }
            ]
        }).buttons().container().appendTo('#writers_wrapper .col-md-6:eq(0)');

    </script>
@endpush

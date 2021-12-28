@extends('layouts.app')

@section("content-header", "Peminjaman")
@section("title", "Peminjaman")
@section('subtitle', 'Daftar Peminjaman')
@section('content-title', 'Daftar Peminjaman' )

@section('content')
<div id="app">
    <div class="row justify-content-start">
        <div class="col-sm-12">
            <div class="alert alert-success alert-dismissible fade" role="alert" id="ajaxAlert">
                <strong></strong>.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></button>
                                <a href="{{route('transaction.create')}}" class="btn btn-sm btn-primary align-middle">
                                   Tambah Peminjaman
                                </a>
                            </div>
                        </div>
                        <div class="col-2">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-control form-control-sm" name="status" id="status">
                              <option value="all">Semua</option>
                              <option value="1">sudah dikembalikan</option>
                              <option value="0">belum dikembalikan</option>
                            </select>
                        </div>
                        <div class="col-2">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <select class="form-control form-control-sm" name="tanggal" id="tanggal">
                              <option>Semua</option>
                              <option></option>
                              <option></option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-sm table-bordered table-striped w-100 text-center">
                        <thead>
                          <tr>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Nama Peminjam</th>
                            <th>Lama Pinjam (Hari)</th>
                            <th>Quantity</th>
                            <th>Total Bayar</th>
                            <th>Status</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                    </table>
                </div>
            </div>
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

    {{-- datatables script --}}
    <script src="{{asset('vendor/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('vendor/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('vendor/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>

    {{-- sweetalert CDN --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(function() {
            var api = '{{url('get/transaction')}}';
            var table = $('.table').DataTable({
                    processing: true,
                    serverSide: true,
                    responsive: true,
                    ajax: api,
                    columns: [
                        { data: "start", name: "start" },
                        { data: "end", name: "end" },
                        { data: "member", name: "member" },
                        { data: "period", name: "period" },
                        { data: "quantity", name: "quantity" },
                        { data: "total_payment", name: "total_payment" },
                        { data: "status", name: "status" },
                        { data: "action", name: "action", orderable: false, searchable: false },
                    ],
                    // columnDefs: [
                    //     { className: 'text-left', targets: [0, 1, 2, 3, 5] },
                    // ],
                });

            // status filter function
            $("#status").change(function (e) {
                var status = $(this).val()
                if ($(this).val() == 'all') { // jika nilai status = all
                    table.ajax.url(api).load() // jalankan ajax tanpa mengirimkan request
                } else { // jika nilai status != all
                    table.ajax.url( api + '?status=' + status ).load() // jalankan ajax datatable dengan mengirimkan nilai status
                }
            });
        });


    </script>
    @if (Session::get('success'))
    <script>
        Swal.fire("{{Session::get('success')}}");
    </script>
    @endif

    {{-- crud script --}}
@endpush

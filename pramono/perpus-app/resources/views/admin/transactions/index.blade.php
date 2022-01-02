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
                        <div class="col-7">
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary border"><i class="fa fa-plus"></i></button>
                                <a href="{{route('transaction.create')}}" class="btn btn-primary border">
                                   Tambah Peminjaman
                                </a>
                            </div>
                        </div>
                        <div class="col-2">
                            <label for="status" class="form-label">Status :</label>
                            <select class="form-control" name="status" id="status" v-on:change="filterStatus()" v-model="status">
                              <option value="all">Semua</option>
                              <option value="selesai">Selesai</option>
                              <option value="belum">Dalam Proses</option>
                            </select>
                        </div>

                        <div class="col-3">
                             <!-- Date range -->
                            <div class="form-group">
                                <label>Tanggal Pinjam</label>
                                <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control float-right" id="reservation">
                                </div>
                                <!-- /.input group -->
                            </div>
                            <!-- /.form group -->
                        </div>


                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-sm table-bordered table-striped w-100 text-center">
                        <thead>
                          <tr>
                            <th>No.</th>
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
    {{-- datatables css --}}
    <link rel="stylesheet" href="{{asset('vendor/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

    <!-- daterpicker -->
    <link rel="stylesheet" href="{{asset('vendor/plugins/daterangepicker/daterangepicker.css')}}">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="{{asset('vendor/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{asset('vendor/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{asset('vendor/plugins/daterangepicker/daterangepicker.css')}}">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{asset('vendor/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{asset('vendor/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">

@endsection

@push('script')
    {{-- datatables script --}}
    <script src="{{asset('vendor/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('vendor/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('vendor/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    {{-- vue and axios CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    {{-- sweetalert CDN --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- datepicker plugins --}}
    <!-- moment -->
    <script src="{{asset('vendor/plugins/moment/moment.min.js')}}"></script>
    <!-- date-range-picker -->
    <script src="{{asset('vendor/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{asset('vendor/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>

    {{-- manual script --}}
    <script>
        // api and crud variables for ajaxs
        var action = '{{url('transaction')}}';
        var api = '{{url('get/transaction')}}';
        var columns = [
                    { data: "DT_RowIndex", name: "DT_RowIndex" },
                    { data: "start", name: "start" },
                    { data: "end", name: "end" },
                    { data: "member", name: "member" },
                    { data: "period", name: "period" },
                    { data: "quantity", name: "quantity" },
                    { data: "total_payment", name: "total_payment" },
                    { data: "status", name: "status" },
                    { data: "action", name: "action", orderable: false, searchable: false },
                ];

        // vue instance
        var app = new Vue({
            el: '#app',
            data: {
                status: "",
                action,
                fromdate: "",
                todate: "",
                start_date: "",
                message: "",
            },
            mounted: function () {
                this.datatable();
                $('#reservation').daterangepicker();
                $('#reservation').on('apply.daterangepicker', function(ev, picker)
                    {   const _this = this;
                        startdate=picker.startDate.format('YYYY-MM-DD');
                        enddate=picker.endDate.format('YYYY-MM-DD');
                        app.filterOnDate(startdate, enddate);
                    });
            },
            methods: {
                datatable() {
                    const _this = this;
                    _this.table = $('.table')
                        .DataTable({
                            processing: true,
                            serverSide: true,
                            responsive: true,
                            ajax: api,
                            columns,
                        });
                },
                destroy(event, id) {
                    this.action += "/" + id;
                    const _this = this;
                    if (confirm("Apakah Anda yakin ingin menghapusnya?")) {
                        axios
                            .post(this.action, { _method: "DELETE" })
                            .then((response) => {
                                _this.table.ajax.reload();
                                this.message = "Data berhasil dihapus";
                                Swal.fire(this.message);
                            });
                    }
                    this.action = action;
                },
                filterStatus() {
                    const _this = this;
                    if (this.status == "all") {
                        this.table.ajax.url(api).load();
                    } else {
                        console.log(this.status)
                        this.table.ajax.url(api + '?status=' + this.status ).load();
                    }
                },
                filterOnDate(start, end) {
                    this.table.ajax.url(api + '?start_date=' + start + '&end_date=' + end ).load();
                }
            }
        });


    </script>

    @if (Session::get('success'))
    <script>
        Swal.fire("{{Session::get('success')}}");
    </script>
    @endif

@endpush

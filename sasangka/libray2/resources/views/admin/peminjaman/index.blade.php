@extends('layouts.admin')

@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}" >  
@endsection
@section('content')
     <div id="controller">
        <div class="content-header">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                        <div class="col-8">
                            <a href="{{ route('transactions.create') }}" class="btn btn-sm btn-primary pull-right">Create New
                                Transaction</a>
                        </div>
                        <div class="col-2">
                            <select class="form-control" name="status">
                                <option value="3">-- All Status --</option>
                                <option value="1">Has Returned</option>
                                <option value="2">Not Returned</option>
                            </select>
                        </div>
                        <div class="col-2">
                            <input type="date" class="form-control" name="date">
                        </div>
                    </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="datatable" class="table table-bordered table-striped dataTable dtr-inline"
                                        role="grid" aria-describedby="example1_info">
                                        <thead>
                                            <tr role="row" class="text-center">
                                                <th class="align-middle" style="width: 10px;">#</th>
                                                <th class="align-middle">Transaction Starts</th>
                                                <th class="align-middle">Transaction Ends</th>
                                                <th class="align-middle">Member's Name</th>
                                                <th class="align-middle">Duration</th>
                                                <th class="align-middle">Total of Books</th>
                                                <th class="align-middle">Total of Purchases</th>
                                                <th class="align-middle">Transaction Status</th>
                                                <th class="align-middle" style="width: 80px;">Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')

    <!-- DataTables  & Plugins -->
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/toastr/toastr.min.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    

    <script>
        $(function() {
            $("#datatable").DataTable({
                    "Destroy": true
                })
                .buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        });

    </script>

    <script type="text/javascript">
        var actionUrl = '{{ url('transactions') }}';
        var apiUrl = '{{ url('api/transactions') }}';
        const error = null;

        var columns = [
        {
            data: 'DT_RowIndex',
            class: 'text-center',
            orderable: true
        },
        {
            data: 'date_start',
            class: 'text-center',
            orderable: true
        },
        {
            data: 'date_end',
            class: 'text-center',
            orderable: true
        },
        {
            data: 'member.name',
            class: 'text-center',
            orderable: true
        },
        {
            data: 'duration',
            class: 'text-center',
            orderable: true
        },
        {
            data: 'transaction_details.length',
            class: 'text-center',
            orderable: true
        },
        {
            data: 'purches',
            class: 'text-center',
            orderable: true
        },
        {
            data: 'statusTransaction',
            class: 'text-center',
            orderable: true
        },
        {
            render: function(index, row, data, meta) {
            return `
            <a href="${actionUrl}/${data.id}" class="badge bg-info py-2 px-3 mb-2">
                <i class="fas fa-eye"></i>
            </a>
            <a href="${actionUrl}/${data.id}/edit" class="badge bg-warning py-2 px-3 mb-2">
                <i class="fas fa-edit"></i>
            </a>
            <a href="#" class="badge bg-danger py-2 px-3 mb-2" onclick = "controller.deleteData(event, ${data.id})">
                <i class="fas fa-trash-alt"></i>
            </a>`;
        }, width: '150px', orderable: false
    },
];


 </script>
 <script src="{{ asset('js/dataku.js') }}"></script>
 <script>
     $('select[name=status]').on('change', function(){
         status = $('select[name=status]').val();

         if (status == 3){
             controller.tabel.ajax.url(apiUrl).load();
         }else{
             controller.table.ajax.url(`${apiUrl}?status=${status}`).load();
         }
     });

     $('input[name=date]').on('change', function() {
        let date= $('input[name=date]').val();
        console.log(date)
        if (date == '') {
        controller.table.ajax.url(apiUrl).load()
        } else {
        controller.table.ajax.url(`${apiUrl}?date_start=${date}`).load()
        }
    });
 </script> 
@endsection
@extends('layouts.admin')

@section('header', 'Detail Transaction')

@section('css')

<link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
@endsection

@section('content')

<div id="controller">
    <div class="card container-fluid col-md-6">
        <div class="card-header border-0">

            <H5 class="font-weight-bold">Detail Transaksi</H5>
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label font-weight-bold">Anggota</label>
                    <div class="col-sm">
                        <p class="col col-form-label ">
                            {{$transactions->member->name}}
                        </p>

                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label font-weight-bold">
                        Anggota
                    </label>
                    <div class="col-sm">
                        <p class="col col-form-label ">
                            {{$transactions->date_start}}
                        </p>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label font-weight-bold">Buku</label>
                    <div class="col-sm">
                        <select class="custom-select" name="" multiple>
                            @foreach ($transactions->details as $item)
                            <option value="">{{$item->book->title}}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label font-weight-bold">Status</label>
                    <div class="col-sm">
                        @if ($transactions->status == 0)
                        <p class="col col-form-label">Belum Kembali</p>
                        @else
                        <p class="col col-form-label">Sudah Kembali</p>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


@endsection


@section('js')
<link rel=" stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
<script src="{{asset('assets/plugins/select2/js/select2.full.min.js')}}"></script>

<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>\
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>

<script type="text/javascript">
    var actionUrl = '{{ url('transaction') }}';
    var apiUrl = '{{ url('api/transaction') }}';
    var columns = [
        {data: 'DT_RowIndex', class: 'text-center', orderable: true},
        {data: 'date_start', class: 'text-center', orderable: true},
        {data: 'date_end', class: 'text-center', orderable: true},
        {data: 'member.name', class: 'text-center', orderable: true},
        {data: 'limit', class: 'text-center', orderable: true},
        {data: 'details.length', class: 'text-center', orderable: false},
        {data: 'purches', class: 'text-center', orderable: true},
        {data: 'status', class: 'text-center', orderable: true},
        // {data: 'date', class: 'text-center', orderable: true},//format DD-MM-YY hh:mm
        {render: function(index, row, data, meta){
            return `
                <a href="#" class="btn btn-info btn-sm"">
                    <i class="fa fa-eye"></i>
                </a>
                <a href="#" class="btn btn-warning btn-sm" onclick="controller.editData(event,${meta.row})">
                    <i class="fa fa-pencil-alt"></i>
                </a>
                <a href="#" class="btn btn-danger btn-sm" onclick="controller.deleteData(event,${data.id})">
                    <i class="fa fa-trash"></i>
                </a>`;
        },orderable: false, width:"100px", class:"text-center"},
    ];

    
    var controller = new Vue({
        el: '#controller',
        data: {
            datas: [], 
            data: {},   
            actionUrl,
            apiUrl, //mengambil variable berisi Api
            
        },
        mounted: function() {
            this.get_transactions();
        },
        methods: {
            datatable() {
                const _this = this;
                _this.table = $('#datatable').DataTable({
                    ajax: {
                        url: _this.apiUrl,
                        type: 'GET',
                    },
                    columns: columns
                }).on('xhr', function(){
                    _this.datas = _this.table.ajax.json().data;
                });
            },
            addData() {
                this.data = {};
                this.editStatus= false;
                $('#modal-default').modal();
            },
            editData(event, row) {
                this.data = this.datas[row];
                this.editStatus= true;
                $('#modal-default').modal();
            },
            deleteData(event, id) {
                
                if (confirm("Are You Sure ??")){
                    $(event.target).parents('tr').remove();
                    axios.post(this.actionUrl+'/'+id, {_method: 'Delete'}).then(response =>{
                        alert('Data Has been removed');
                    })
                }
            },
            submitForm(event, id) {
                event.preventDefault();
                const _this = this;
                var actionUrl = ! this.editStatus ? this.actionUrl : this.actionUrl+'/'+id;
                axios.post(actionUrl, new FormData($(event.target)[0])).then(response => {
                    $('#modal-default').modal('hide');
                    _this.table.ajax.reload();
                });
            }
        }
    });
</script>
<script type="text/javascript">
    //Initialize Select2 Elements
    $('.select2').select2();

</script>

@endsection
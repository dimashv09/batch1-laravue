@extends('layouts.admin')
@section ('header', 'Transaction')

@section('css')
  <!-- Datatables -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('content')
<component id="controller">
  <div class="card">
      <div class="card-header">
        <div class="row"> 
              <div class="col-md-8">
                <a href="{{ url('transaction/create') }}" class="btn btn-sm btn-primary pull-right">Create New Transaction</a>
              </div>
              
              <div class="col-md-2">
                <select class="form-control" name="status_filter">
                  <option value="">All Status</option>
                  <option value="0">Not Been Restored</option>
                  <option value="1">Has Been Returned</option>
                </select>
              </div>

              <div class="col-md-2">
                <select class="form-control" name="date_filter">
                  <option value="">All Date</option>
                  <option value="01">January</option>
                  <option value="02">February</option>
                  <option value="03">March</option>
                  <option value="04">April</option>
                  <option value="05">May</option>
                  <option value="06">June</option>
                  <option value="07">July</option>
                  <option value="08">August</option>
                  <option value="09">September</option>
                  <option value="10">October</option>
                  <option value="11">November</option>
                  <option value="12">December</option>
                </select>
              </div>
            
              <div class="card-body">
                <table id="datatable" class="table table-stripted table-bordered">
                  <thead>
                    <tr>
                      <th class ="text-center">Date Start</th>
                      <th class ="text-center">Date End</th>
                      <th class ="text-center">Name</th>
                      <th class ="text-center">How Long Days</th>                      
                      <th class ="text-center">Total Books</th>
                      <th class ="text-center">Price</th>
                      <th class ="text-center">Status</th>
                      <th class ="text-center">Action</th>
                    </tr>
                  </thead>
                </table>
              </div>
         </div>
    </div>
  </div>    
</component>
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
<script type="text/javascript">
    var actionUrl = '{{ url('transaction') }}';
    var apiUrl = '{{ url('api/transaction') }}';
    var api2Url = '{{ url('api2/transaction') }}';

    var columns = [
      {data: 'date_start', class: 'text-center', orderable: true},
      {data: 'date_end', class: 'text-center', orderable: true},
      {data: 'name', class: 'text-center', orderable: true},
      {data: 'long_borrow', class: 'text-center', orderable: true},
      {data: 'qty', class: 'text-center', orderable: true},
      {data: 'total_price', class: 'text-center', orderable: true},
      {data: 'status_borrow', class: 'text-center', orderable: true},
      {data: 'action', orderable: false, width: '200px', class: 'text-center'},
    ];
</script>
<!-- CRUD JS -->
<script type="text/javascript">
  var controller = new Vue({
    el: '#controller',
    data: {
      datas: [],
      data: {},
      actionUrl,
      apiUrl,
      editStatus: false,
    },
    mounted: function(){
      this.datatable();
    },
    methods: {
      datatable() {
        const _this = this;
        _this.table = $('#datatable').DataTable({
          "serverSide": true,
          "processing": true,
          "searching": false,
          "paging": false,
          ajax: {
            url: _this.apiUrl,
            type: 'GET',
          },
          columns
        }).on('xhr', function() {
          _this.datas = _this.table.ajax.json().data;
        });
      },
   },
  });
</script>
<!-- Filter Date JS -->
<script type="text/javascript">
  $('select[name=date_filter]').on('change', function() {
    date_filter = $('select[name=date_filter]').val();

    if (date_filter == null){
      controller.table.ajax.url(api2Url).load();
    }else{
      controller.table.ajax.url(api2Url+'?date_filter='+date_filter).load();
    }
  });
</script>
<!-- Filter Status JS -->
<script type="text/javascript">
  $('select[name=status_filter]').on('change', function() {
    status_filter = $('select[name=status_filter]').val();

    if (status_filter == null){
      controller.table.ajax.url(apiUrl).load();
    }else{
      controller.table.ajax.url(apiUrl+'?status_filter='+status_filter).load();
    }
  });
</script>
@endsection
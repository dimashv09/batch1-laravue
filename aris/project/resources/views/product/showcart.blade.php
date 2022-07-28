@extends('layouts.app')
@section('css')
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
 @endsection
@section('content')
<div id="controller">
  <div class="card text-center">
  <div class="card-header">
     <div class="row">
      <div class="col-md-1">
      <form action="{{ url('/invoice') }}" >
                <input type="hidden" name="harga" min="0" value="{{$datas}}">
                <input type="hidden" name="total" value="{{$transaction}}">
                <input class="btn btn-primary btn-sm" type="submit" value="Cetak Invoice">
              </form>
      </div>
    </div>
  </div>
 @if(Session::has('success'))
    <div class="alert alert-success">
        {{Session::get('success')}}
    </div>
@endif
  <div class="card-body">
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th>Product Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Action</th>
    </tr>
  </thead>
 
  <tbody>
    @foreach($carts as $key=>$cart)
          <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $cart->product_title }}</td>
            <td>
              <form action="{{url('/updatecart/'.$cart->id)}}" >
                <input name="quantity" type="number" min="1" value="{{ $cart->quantity }}">
                <input name="price" type="hidden" min="1" value="{{ $cart->price }}">

                <input class="btn btn-success btn-sm" type="submit" value="save">
              </form>
            </td>
            <td>{{ $cart->price }}</td>
            <td>
              <a class="btn btn-danger btn-sm" href="{{ url('/delete/'.$cart->id) }}">Delete</a>
            </td>
          </tr>
          @endforeach
  </tbody>
</table>
</div>
</div>
<div class="card">
<div class="card-body">
  <table>
    <tr>
      <td>Total Harga: Rp.{{$total}}&nbsp;&nbsp;&nbsp;</td>
      <td><form action="{{url('/updateharga/')}}" >
                <input type="number" placeholder="Masukan uang anda..." name="harga" min="0">
                <input class="btn btn-success btn-sm" type="submit" value="Bayar">
              </form></td>
      <td>&nbsp;&nbsp;&nbsp;Total Kembalian: Rp.{{$transaction}}</td>
    </tr>
  </table>
</div>
</div>
<div class="card-body">
 <div class="row">
  <div class="col-md-3">
    <!-- <form action="{{ url('/order/product') }}" >
                <input type="hidden" name="harga" value="{{$datas}}">
                <input type="hidden" name="total" value="{{$transaction}}">
                <input type="submit" class="btn btn-primary" value="CheckOut">
              </form> -->
  </div>
</div> 
</div>
</div>
@endsection
@section('js')
<!-- jQuery -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
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
<!-- AdminLTE App -->
<script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('assets/dist/js/demo.js') }}"></script>
<!-- Page specific script -->

<script>
  var actionUrl = '{{ url('products') }}';
  var apiUrl = '{{ url('api/products') }}';

    var controller = new Vue({
      el: '#controller',
      data: {
        datas: [],
        data: {},
        actionUrl,
        apiUrl,
                editStatus: false,

      },
      mounted: function() {
        this.datatable();
      },
      methods: {
        datatable() {
          const _this = this;
          _this.table = $('#datatables').DataTable({
            ajax: {
              url: _this.apiUrl,
              type: 'GET',
            },
            columns: columns
          }).on('xhr', function() {
            _this.datas = _this.table.ajax.json().data;
          });
        },
               deleteData(event, id) {
                    if (confirm("Are you sure ?")) {
                        $(event.target).parents('tr').remove();
                            axios.post(this.actionUrl+'/'+id, {_method: 'DELETE'}).then(response => {
                            // location.reload();
                            alert('Data has been removed');
                    });
                }
             },
               submitForm(event, id){
                event.preventDefault();
                const _this = this;
                var actionUrl = ! this.editStatus ? this.actionUrl : this.actionUrl+'/'+id;
                axios.post(actionUrl, new FormData($(event.target)[0])).then(response => {
                    $('#modal-default').modal('hide');
                    _this.table.ajax.reload();
                });
               },
      }
    });
 
</script>
@endsection





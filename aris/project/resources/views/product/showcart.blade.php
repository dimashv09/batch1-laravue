@extends('layouts.app')
@section('content')
  <div class="card text-center">
  <div class="card-header">
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
                <input type="number" name="harga" min="0">
                <input class="btn btn-success btn-sm" type="submit" value="Bayar">
              </form></td>
      <td>&nbsp;&nbsp;&nbsp;Total Kembalian: Rp.{{$transaction}}</td>
    </tr>
  </table>
</div>
</div>
<div class="card-body">
 <div class="row">
  <div class="col-md-1">
  <a class="btn btn-primary pull-right " href="{{ url('/order/product') }}">CheckOut</a>
  </div>
</div> 
</div>
@endsection


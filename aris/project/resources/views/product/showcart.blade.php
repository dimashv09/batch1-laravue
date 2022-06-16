@extends('layouts.app')
@section('content')
  <div class="card text-center">
  <div class="card-header">
    <div class="row">
      <a class="btn btn-primary btn-sm pull-right" href="{{ url('/invoice') }}">Cetak Invoice</a>
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
<div class="pull-right">
  <h3>Total Harga Keseluruhan: {{$total}}</h3>
</div>

<a class="btn btn-primary " href="{{ url('/order') }}">order</a>
</div>
</div>
@endsection


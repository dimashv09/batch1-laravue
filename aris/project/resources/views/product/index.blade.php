@extends('layouts.admin')
@section('header', 'Data User')
@section('content')
<div class="container text-center">
  <h2>Products</h2>

  <div class="row">
    @foreach($products as $product)
    <div class="col-4">
      <div class="card">
        <img class="card-img-top" src="{{ asset('img/images.jpg') }}" alt="Card image cap">
        <div class="card-body">
          <h4 class="card-text">{{$product->name }}</h4>
          <p class="card-text">Text</p>
        </div>
        <div class="card-body">
          <a href="#" class="card-link">Add to cart</a>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>


@endsection




@extends('layouts.app')

@section('content')

	<h2>Data Cart</h2>

	
		<table class="table">
			<thead>
				<tr>
					<th>Name</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Action</th>
				</tr>
			</thead>
			@foreach($cartItems as $item)
			<tbody>
				<tr>
					<td scope="row">{{ $item->name }}</td>
					<td>
						{{ $item->price }}
						{{Cart::session(auth()->id())->get($item->id)->getPriceSum()}}
					</td>
					<td>
						<form action="{{ url('/cart/update/'. $item->id) }}">
							<input name="quantity" type="number" value="{{ $item->quantity }}">
							<input type="submit" value="save">
						</form>
					</td>
					<td>
						<a href="{{url('cart/delete/'. $item->id) }}">Delete</a>
					</td>
				</tr>
			</tbody>
			@endforeach
		</table>

<h3>
	Total Price : Rp. {{\Cart::session(auth()->id())->getTotal()}}
</h3>

<a href="" class="btn btn-primary btn-sm">Proceed to Checkout</a>
@endsection
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
  <div class="card text-center">
  <div class="card-header">
    Featured
  </div>
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
</body>
</html>



<div class="latest-products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Latest Products</h2>
              <a href="products.html">view all products <i class="fa fa-angle-right"></i></a>

              <form action="{{ url('search') }}" method="get" class="form-inline" style="float: right;padding: 10px;">
                @csrf
                <input type="search" class="form-control" name="search" placeholder="Search...">
                <input type="submit" value="Search" class="btn btn-success">
              </form>
            </div>
          </div>

          @foreach($products as $product)
          <div class="col-md-4">
            <div class="product-item">
              <a href="#"><img height="300" width="150" src="{{ asset('/productimage/'. $product->image) }}" alt=""></a>
              <div class="down-content">
                <a href="#"><h4>{{$product->title}}</h4></a>
                <h6>Rp. {{ $product->price }}</h6>
                <p>{{$product->description }}</p>
                <a class="btn btn-primary btn-sm pull-right" href="#">Add Cart</a>
                <ul class="stars">
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                </ul>
                
              </div>
            </div>
          </div>
          @endforeach

          @if(method_exists($products, 'link'))
          <div class="d-flex justify-content-center">
            {!! $products->links() !!}
          </div>
          @endif
        </div>
      </div>
    </div>
@extends('layouts.mymain')


@section('content')

        
   
    {{-- Products --}}
    <section class="products">
      <div class="container">
          <h1 class="h3">Recommendation for you</h1>
          
          <div class="row">
            @foreach ($products as $product)
                      <div class="col-sm-6 col-md-3 product">
                        <a href="#" class="favorites" data-favorite="inactive"><i class="ion-ios-heart-outline"></i></a>
                        <a href="./"><img src="../assets/img/products/chrome-book-11.jpg" alt="HP Chromebook 11"/></a>

                        <div class="content">
                          <h1 class="h4">{{$product->name}}</h1>
                          <p class="price"> ₱ {{$product->price}}</p>
                          <label>Laptops</label>

                          <a href="{{route('product.show',$product->id)}}" class="btn btn-link"> Details</a>
                          
                          <a href="{{route('cart.add',$product->id)}}" style="padding:0.9rem;" class="btn btn-primary btn-rounded btn-sm"><i class="ion-bag"></i> Add to cart</a>
                        </div>
                      </div>
            @endforeach
      </div>
  </section>
  <br><br>


@endsection
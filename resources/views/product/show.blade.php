@extends('layouts.mymain')

@section('content')
    

<div class="product">
  <div class="container">
    <div class="row">
      <div class="col-sm-7 col-md-7">
        <div class="carousel product" data-count="5" data-current="1">
          <!-- <button class="btn btn-control"></button> -->

          <div class="items">
            <div class="item active" data-marker="1">
              <img src="../assets/img/product/1.jpg" alt="ChromeBook 11"/>
            </div>
            <div class="item" data-marker="2">
              <img src="../assets/img/product/2.jpg" alt="ChromeBook 11"/>
            </div>
            <div class="item" data-marker="3">
              <img src="../assets/img/product/3.jpg" alt="ChromeBook 11"/>
            </div>
            <div class="item" data-marker="4">
              <img src="../assets/img/product/4.jpg" alt="ChromeBook 11"/>
            </div>
            <div class="item" data-marker="5">
              <img src="../assets/img/product/5.jpg" alt="ChromeBook 11"/>
            </div>
            <div class="item" data-marker="6">
              <div class="tiles">
                <a href="#video" data-gallery="#video" data-source="youtube" data-id="hED0N4CFoqs" data-title="An upscale new Chromebook from HP" data-description="The new HP Chromebook 13 runs a Core M CPU inside a slim aluminum body.">
                  <img src="../assets/img/product/video.jpg" alt="ChromeBook 11">

                  <div class="overlay"></div>
                  <div class="content">
                    <div class="content-outside">
                      <div class="content-inside">
                        <i class="ion-ios-play"></i>
                        <h1>Watch video review</h1>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          </div>

          <ul class="markers">
            <li data-marker="1" class="active"><img src="../assets/img/product/1.jpg" alt="Background"/></li>
            <li data-marker="2"><img src="../assets/img/product/2.jpg" alt="Background"/></li>
            <li data-marker="3"><img src="../assets/img/product/3.jpg" alt="Background"/></li>
            <li data-marker="4"><img src="../assets/img/product/4.jpg" alt="Background"/></li>
            <li data-marker="5"><img src="../assets/img/product/5.jpg" alt="Background"/></li>
            <li data-marker="6"><img src="../assets/img/product/video.jpg" alt="Background"/></li>
          </ul>
        </div>
      </div>
      <div class="col-sm-5 col-md-5">
        <img src="../assets/img/brands/hp.png" alt="HP" class="brand hidden-xs" />

        <h1>{{$product->name}}</h1>

        <p> &middot; {{$product->details}}</p>
      
        <p class="price"> ₱{{$product->price}}</p>
        <p class="price through"> ₱ 20 000.00</p>
        <br><br>

        <a href="{{route('cart.add',$product->id)}}" class="btn btn-primary btn-rounded"> <i class="ion-bag"></i> Add to cart</a>
      </div>
    </div>
    <br><br><br>


    <div class="row">
      <div class="col-sm-7">
        <h1>{{$product->name}}</h1>
         <br>

         <p>
           {{$product->description}}
         </p>
         <br>

        
    </div>
  </div>
</div>
<br><br>


{{-- Products --}}


@endsection
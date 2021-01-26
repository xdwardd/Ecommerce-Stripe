 @extends('layouts.mymain')


 
 @section('content')
     

    <div class="box">
      <div class="container">
          <h1>Your Shopping Cart</h1>
          <hr class="offset-sm">
      </div>
    </div>
    <hr class="offset-md">


    <div class="container">
        <div class="row">
            <div class="col-md-8">
              @if (count($cartItems) > 0)
                <div class="panel panel-default">
                 

                            @foreach ($cartItems as $item)
                              <div class="panel-body">
                              <div class="checkout-cart">
                                <div class="content">

                              
                                        <div class="media" style="border-bottom: 1px solid rgb(182, 180, 180)">
                                          <div class="media-left">
                                            <a href="#">
                                              <img class="media-object" src="../assets/img/products/chrome-book-11.jpg" alt="HP Chromebook 11"/>
                                            </a>
                                          </div>
                                          <div class="media-body">
                                            <h2 class="h4 media-heading">{{$item->name}}</h2>
                                            <label>Hybrid</label>
                                            <p class="price">₱ {{Cart::session(auth()->id())->get($item->id)->getPriceSum()}}.00</p>
                                          </div>
                                          <div class="controls">
                                            <form action="{{route('cart.update',$item->id)}}">
                                              <div style="display: flex;">
                                                <input name="quantity" class="form-control input-sm" type="number" value="{{$item->quantity}}">
                                              <input style="margin-left: 0.5rem" type="submit" class="btn btn-sm" value="save">
                                              </div>
                                              
                                          </form>
                                    
                                          <a href="{{route('cart.destroy', $item->id)}}"> <i class="ion-trash-b"></i> Remove </a>
                                            
                                            </div> 
                                          
                                          
                                        </div>
                                
                                    
                                  
                                </div>
                              </div>
                              </div>
                  @endforeach
                 
                </div>
                @else
                <p>No item found..</p>
            @endif
                <a href="/product" class="btn btn-primary "></i>&nbsp;&nbsp; Continue Shopping</a>
            </div>



                  @if (count($cartItems) > 0)
                  <div class="col-sm-8 col-md-4">
                    <hr class="offset-md visible-sm">
                      <div class="panel panel-default">
                        <div class="panel-body">
                          <h2 class="no-margin">Summary</h2>
                          <hr class="offset-md">

                          <div class="container-fluid">
                              <div class="row">
                                  <div class="col-xs-6">
                                      <p>Subtotal ( {{Cart::session(auth()->id())->getContent()->count()}} items)</p>
                                  </div>
                                  <div class="col-xs-6">
                                      <p><b>₱ {{Cart::session(auth()->id())->getTotal()}}.00</b></p>
                                  </div>
                              </div>
                          </div>
                          <hr>

                          <div class="container-fluid">
                              <div class="row">
                                  <div class="col-xs-6">
                                      <h3 class="no-margin">Total sum</h3>
                                  </div>
                                  <div class="col-xs-6">
                                      <h3 class="no-margin">₱ {{Cart::session(auth()->id())->getTotal()}}.00</h3>
                                  </div>
                              </div>
                          </div>
                          <hr class="offset-md">
                          
                            <a href="/checkout" class="btn btn-primary btn-lg justify"><i class="ion-android-checkbox-outline"></i>&nbsp;&nbsp;Proceed to Checkout</a>   
                          
                        
                          <hr class="offset-md">

                          <p>Pay your order in the most convenient way</p>
                          <div class="payment-icons">
                            <img src="../assets/img/payments/icon-paypal.svg" alt="paypal">
                            <img src="../assets/img/payments/icon-visa.svg" alt="visa">
                            <img src="../assets/img/payments/icon-mc.svg" alt="mc">
                            <img src="../assets/img/payments/icon-discover.svg" alt="discover">
                            <img src="../assets/img/payments/icon-ae.svg" alt="ae">
                          </div>
                        </div>
                      </div>
                  </div>
                  @else
                      
                  @endif
          
                    
        </div>
    </div>
    <hr class="offset-lg">
    <hr class="offset-lg">
 @endsection

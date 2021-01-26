
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title> E-istore &middot; Laravel E-Commerce</title>

    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Sunrise Digital">
    <link rel="shortcut icon" type="image/x-icon" href="../favicon.png">
    
    <!-- Bootstrap -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <link href="../assets/css/custom.css" rel="stylesheet">
    <link href="../assets/css/carousel.css" rel="stylesheet">
    <link href="../assets/ionicons-2.0.1/css/ionicons.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Catamaran:400,100,300' rel='stylesheet' type='text/css'>
    <script src="https://js.stripe.com/v3/"></script> 
    <style>
      /**

      Stripe css
 * The CSS shown here will not be introduced in the Quickstart guide, but shows
 * how you can use CSS to style your Element's container.
 */
.StripeElement {
  box-sizing: border-box;

  height: 40px;

  padding: 10px 12px;

  border: 1px solid rgb(168, 168, 168);
  border-radius: 4px;
  background-color: white;

  box-shadow: 0 1px 3px 0 #e6ebf1;
  -webkit-transition: box-shadow 150ms ease;
  transition: box-shadow 150ms ease;
}

.StripeElement--focus {
  box-shadow: 0 1px 3px 0 #cfd7df;
}

.StripeElement--invalid {
  border-color: #fa755a;
}

.StripeElement--webkit-autofill {
  background-color: #fefde5 !important;
}
    </style>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <nav class="navbar navbar-default">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="./"> <i class="ion-cube"></i> E-istore</a>
          </div>

          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li><a href="../">Home</a></li>
              <li><a href="../catalog/">Catalog</a></li>
              <li><a href="../blog/">Blog</a></li>
              <li><a href="../gallery/">Gallery</a></li>
              <li class="dropdown">
                <a href="../catalog/" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">More <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="../catalog/product.html">Product</a></li>
                  <li><a href="../cart/">Cart</a></li>
                  <li class="active"><a href="../checkout/">Checkout</a></li>
                  <li><a href="../faq/">FAQ</a></li>
                  <li><a href="../contacts/">Contacts</a></li>
                  <li role="separator" class="divider"></li>
                  <li class="dropdown-header">Variations</li>
                  <li><a href="../home">Home</a></li>
                  <li><a href="../blog/item-photo.html">Article Photo</a></li>
                  <li><a href="../blog/item-video.html">Article Video</a></li>
                  <li><a href="../blog/item-review.html">Article Review</a></li>
                </ul>
              </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              @auth
              <li class="nav-item">
                  <a class="nav-link p-0 m-0" href="{{ route('cart.index') }}">
                    <i class="ion-bag"></i>  <span style="font-weight: 600; color:rgb(252, 49, 49)">{{Cart::session(auth()->id())->getContent()->count()}}</span>
                  </a>
              </li>
              @endauth
       

              @guest
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('login') }}"><i class="ion-android-person"></i> {{ __('Login') }}</a>
              </li>
              @if (Route::has('register'))
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                  </li>
              @endif
                @else
                  

                <li class="dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                      <i class="ion-android-person"></i>  {{ Auth::user()->name }}  <span class="caret"></span>
                  </a>

                  
                    <ul class="dropdown-menu dropdown-menu-right ">
                      <li>
                      <a  class="dropdown-item" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                      </form>
                      </li>
                    </ul>
                   
              </li>
         
            @endguest
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
    </nav>
    <hr class="offset-md">

    <div class="container">
      @if (session('success'))
      <div class="alert alert-success">{{session('success')}}</div>
    @endif
</div>
    <div class="box">
      <div class="container">
          <h1>Checkout order</h1>
      </div>
    </div>
    <hr class="offset-md">

    <div class="container">
      <div class="row">


          <div class="col-md-8">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="checkout">

                  <form action="{{route('checkout.store')}}" method="POST" id="payment-form">
                    @csrf
                    <div class="addresses box-select">
                        <h2>Billing Details</h2>
                        <hr class="offset-sm">

                    
                        <address class="sm-padding">
                            <div class="row group">
                                <div class="col-sm-4"><h2 class="h4">Receiver</h2></div>
                                <div class="col-sm-8"> <input type="text" style="border: 1px solid rgb(168, 168, 168)" class="form-control" id="name_on_card" name="name" value="" required="" placeholder="John Doe" /></div>
                              </div>
            
                        </address>
                        
                        <address class="sm-padding">
                            <div class="row group">
                                <div class="col-sm-4"><h2 class="h4">Phone</h2></div>
                                <div class="col-sm-8"> <input type="text" style="border: 1px solid rgb(168, 168, 168)" class="form-control" id="phone" name="phone" value="" required=""  placeholder="+45 (555) 8546-25-77" /></div>
                              </div>
            
                        </address>
                        
                        <address class="sm-padding">
                              <div class="row group">
                                <div class="col-sm-4"><h2 class="h4">E-mail</h2></div>
                                <div class="col-sm-8"> <input type="email" style="border: 1px solid rgb(168, 168, 168)" class="form-control" id="email" name="email" value="" required="" placeholder="john@yahoo.com" /></div>
                              </div>
                        </address>
                        
                      

                       
                        <hr class="offset-sm">
                      
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="row group">
                                        <div class="col-sm-4"><h2 class="h4">Province</h2></div>
                                        <div class="col-sm-8">
                                          <!-- <input type="text" class="form-control" name="country" value="" required="" placeholder="" /> -->

                                              <input class="form-control select" style="border: 1px solid rgb(168, 168, 168)" id="province" name="province" required=""  placeholder=""  />
                                         
                                        </div>
                                    </div>

                                    <hr class="offset-sm">
                                    <div class="row">
                                      <div class="col-sm-4">
                                        <p>City</p>

                                        <input type="text" style="border: 1px solid rgb(168, 168, 168)" class="form-control input-sm" id="city" name="city" value="" required=""  placeholder="" />
                                      </div>
                                      <div class="col-sm-4">
                                        <hr class="offset-sm visible-xs">
                                        <p>Street</p>

                                        <input type="text" style="border: 1px solid rgb(168, 168, 168)" class="form-control input-sm" id="street" name="street" value="" required=""   placeholder="" />
                                      </div>
                                      <div class="col-sm-2">
                                        <hr class="offset-sm visible-xs">
                                        <p>Building</p>

                                        <input type="text" style="border: 1px solid rgb(168, 168, 168)" class="form-control input-sm" id="building" name="building" value="" required=""  placeholder="" />
                                      </div>
                                      <div class="col-sm-2">
                                        <hr class="offset-sm visible-xs">
                                        <p>Zip</p>

                                        <input type="text" style="border: 1px solid rgb(168, 168, 168)" class="form-control input-sm" id="zip" name="zip" value="" required=""  placeholder="" />
                                      </div>

                                   
                                    </div>
                                </div>
                            </div>
                            <h2>Payment Details</h2>
                            <div class="form-group">
                              <label for="">Card Name</label>
                              <input type="text" name="name_on_card" id="name_on_card" style="border: 1px solid rgb(168, 168, 168)," class="form-control" required="" placeholder="" aria-describedby="helpId">
                             
                            </div>
                            <div class="form-group">
                              <label for="card-element">
                                Credit or debit card
                              </label>
                              <div id="card-element">
                                <!-- A Stripe Element will be inserted here. -->
                              </div>
                          
                              <!-- Used to display form errors. -->
                              <div id="card-errors" role="alert"></div>
                            </div>
                          
                            <hr class="offset-md">
                          
                            <button type="submit" class="btn btn-primary btn-lg justify"><i class="ion-compose"></i>&nbsp;&nbsp; Confirm order</button>
                          
                        <hr class="offset-sm">
                        <hr>
                     
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-8 col-md-4">
            <hr class="offset-sm visible-sm">
              <div class="panel panel-default">
                <div class="panel-body">
                  <h2 class="no-margin">Summary</h2>
                  <hr class="offset-md">
                 
                          <div class="container-fluid">
                                    <div class="row">
                                                    @foreach ($cartItems as $item)  
                                                            <div class="col-xs-12">
                                                                      
                                                              <div class="media">
                                                                <div class="media-left">
                                                                  <a href="#">
                                                                    <img class="media-object" src="../assets/img/products/chrome-book-11.jpg" alt="HP Chromebook 11"/>
                                                                  </a>
                                                                
                                                                </div>
                                                                <div class="media-body">
                                                                  <h2 class="h4 media-heading">{{$item->name}}</h2>
                                                                  <p class="price">₱ {{Cart::session(auth()->id())->get($item->id)->getPriceSum()}}.00</p>
                                                                
                                                                </div>
                                                                
                                                              </div>
                                                          </div>
                                                            
                                                  @endforeach
                                                
                                                  <div class="col-xs-6">
                                                                        
                                                    <p>Subtotal ({{Cart::session(auth()->id())->getContent()->count()}}) items)</p>
                                                    <p>Discount</p>
                                                    <p>Delivery</p>
                                                  </div>
                                                    <div class="col-xs-6">
                                                        <p><b>₱ {{Cart::session(auth()->id())->getTotal()}} .00</b></p>
                                                        <p><b>$0</b></p>
                                                        <p><b>$0</b></p>
                                                    </div>

                                                             
                                     </div> {{--   endrow --}}

                                   

                          
                                  <hr>

                                  <div class="container-fluid">
                                      <div class="row">
                                          <div class="col-xs-6">
                                              <h3 class="no-margin">Total Price</h3>
                                          </div>
                                          <div class="col-xs-6">
                                              <h3 class="no-margin">₱ {{Cart::session(auth()->id())->getTotal()}}.00</h3>
                                          </div>
                                      </div>
                                  </div>
                                
                          </div>
                    
               </div>
            </div>
          </div>
    <hr class="offset-lg">
    <hr class="offset-lg">

    <footer>
      <div class="about">
        <div class="container">
          <div class="row">
            <hr class="offset-md">

            <div class="col-xs-6 col-sm-3">
              <div class="item">
                <i class="ion-ios-telephone-outline"></i>
                <h1>24/7 free <br> <span>support</span></h1>
              </div>
            </div>
            <div class="col-xs-6 col-sm-3">
              <div class="item">
                <i class="ion-ios-star-outline"></i>
                <h1>Low price <br> <span>guarantee</span></h1>
              </div>
            </div>
            <div class="col-xs-6 col-sm-3">
              <div class="item">
                <i class="ion-ios-gear-outline"></i>
                <h1> Manufacturer’s <br> <span>warranty</span></h1>
              </div>
            </div>
            <div class="col-xs-6 col-sm-3">
              <div class="item">
                <i class="ion-ios-loop"></i>
                <h1> Full refund <br> <span>guarantee</span> </h1>
              </div>
            </div>

            <hr class="offset-md">
          </div>
        </div>
      </div>

      <div class="subscribe">
        <div class="container align-center">
            <hr class="offset-md">

            <h1 class="h3 upp">Join our newsletter</h1>
            <p>Get more information and receive special discounts for our products.</p>
            <hr class="offset-sm">

            <form action="index.php" method="post">
              <div class="input-group">
                <input type="email" name="email" value="" placeholder="E-mail" required="" class="form-control">
                <span class="input-group-btn">
                  <button type="submit" class="btn btn-primary"> Subscribe <i class="ion-android-send"></i> </button>
                </span>
              </div><!-- /input-group -->
            </form>
            <hr class="offset-lg">
            <hr class="offset-md">

            <div class="social">
              <a href="#"><i class="ion-social-facebook"></i></a>
              <a href="#"><i class="ion-social-twitter"></i></a>
              <a href="#"><i class="ion-social-googleplus-outline"></i></a>
              <a href="#"><i class="ion-social-instagram-outline"></i></a>
              <a href="#"><i class="ion-social-linkedin-outline"></i></a>
              <a href="#"><i class="ion-social-youtube-outline"></i></a>
            </div>


            <hr class="offset-md">
            <hr class="offset-md">
        </div>
      </div>


      <div class="container">
        <hr class="offset-md">

        <div class="row menu">
          <div class="col-sm-3 col-md-2">
            <h1 class="h4">Information <i class="ion-plus-round hidden-sm hidden-md hidden-lg"></i> </h1>

            <div class="list-group">
              <a href="#" class="list-group-item">About</a>
              <a href="#" class="list-group-item">Terms</a>
              <a href="#" class="list-group-item">How to order</a>
              <a href="#" class="list-group-item">Delivery</a>
            </div>
          </div>
          <div class="col-sm-3 col-md-2">
            <h1 class="h4">Products <i class="ion-plus-round hidden-sm hidden-md hidden-lg"></i> </h1>

            <div class="list-group">
              <a href="#" class="list-group-item">Laptops</a>
              <a href="#" class="list-group-item">Tablets</a>
              <a href="#" class="list-group-item">Servers</a>
            </div>
          </div>
          <div class="col-sm-3 col-md-2">
            <h1 class="h4">Support <i class="ion-plus-round hidden-sm hidden-md hidden-lg"></i> </h1>

            <div class="list-group">
              <a href="#" class="list-group-item">Returns</a>
              <a href="#" class="list-group-item">FAQ</a>
              <a href="#" class="list-group-item">Contacts</a>
            </div>
          </div>
          <div class="col-sm-3 col-md-2">
            <h1 class="h4">Location</h1>

            <div class="dropdown">
              <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Language
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><a href="#English"> <img src="../assets/img/flags/gb.png" alt="Eng"/> English</a></li>
                <li><a href="#Spanish"> <img src="../assets/img/flags/es.png" alt="Spa"/> Spanish</a></li>
                <li><a href="#Deutch"> <img src="../assets/img/flags/de.png" alt="De"/> Deutch</a></li>
                <li><a href="#French"> <img src="../assets/img/flags/fr.png" alt="Fr"/> French</a></li>
              </ul>
            </div>
            <hr class="offset-xs">

            <div class="dropdown">
              <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Currency
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                <li><a href="#Euro"><i class="ion-social-euro"></i> Euro</a></li>
                <li><a href="#Dollar"><i class="ion-social-usd"></i> Dollar</a></li>
                <li><a href="#Yen"><i class="ion-social-yen"></i> Yen</a></li>
                <li><a href="#Bitcoin"><i class="ion-social-bitcoin"></i> Bitcoin</a></li>
              </ul>
            </div>

          </div>
          <div class="col-sm-3 col-md-3 col-md-offset-1 align-right hidden-sm hidden-xs">
            <h1 class="h4">Unistore, Inc.</h1>

              <address>
                1305 Market Street, Suite 800<br>
                San Francisco, CA 94102<br>
                <abbr title="Phone">P:</abbr> (123) 456-7890
              </address>

              <address>
                <strong>Support</strong><br>
                <a href="mailto:#">sup@example.com</a>
              </address>

          </div>
        </div>
      </div>

      <hr>

      <div class="container">
        <div class="row">
          <div class="col-sm-8 col-md-9 payments">
            <p>Pay your order in the most convenient way</p>

            <div class="payment-icons">
              <img src="../assets/img/payments/paypal.svg" alt="paypal">
              <img src="../assets/img/payments/visa.svg" alt="visa">
              <img src="../assets/img/payments/master-card.svg" alt="mc">
              <img src="../assets/img/payments/discover.svg" alt="discover">
              <img src="../assets/img/payments/american-express.svg" alt="ae">
            </div>
            <br>

          </div>
          <div class="col-sm-4 col-md-3 align-right align-center-xs">
            <hr class="offset-sm hidden-sm">
            <hr class="offset-sm">
            <p>Unistore Pro © 2016 <br> Designed By <a href="http://sunrise.ru.com/" target="_blank">Sunrise Digital</a></p>
            <hr class="offset-lg visible-xs">
          </div>
        </div>
      </div>
    </footer>

    <!-- Modal -->
    <div class="modal fade" id="Modal-ForgotPassword" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="ion-android-close"></i></span></button>
          </div>
          <div class="modal-body">
            <div class="container-fluid">
              <div class="row">
                <div class="col-sm-6">
                  <h4 class="modal-title">Forgot Your Password?</h4>
                  <br>

                  <form class="join" action="index.php" method="post">
                    <input type="email" name="email" value="" placeholder="E-mail" required="" class="form-control" />
                    <br>

                    <button type="submit" class="btn btn-primary btn-sm">Continue</button>
                    <a href="#Sign-In" data-action="Sign-In">Back ></a>
                  </form>
                </div>
                <div class="col-sm-6">
                  <br><br>
                  <p>
                    Enter the e-mail address associated with your account. Click submit to have your password e-mailed to you.
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="Modal-Gallery" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="ion-android-close"></i></span></button>
            <h4 class="modal-title">Title</h4>
          </div>
          <div class="modal-body">
          </div>
          <div class="modal-footer">
          </div>
        </div>
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../assets/js/jquery-latest.min.js"></script>
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/core.js"></script>
    <script src="../assets/js/checkout.js"></script>
    <script src="../assets/js/catalog.js"></script>

    <script type="text/javascript" src="../assets/js/jquery-ui-1.11.4.js"></script>
    <script type="text/javascript" src="../assets/js/jquery.ui.touch-punch.js"></script>
     <script>
                    
                    (function(){
                  
                          // Create a Stripe client.
              var stripe = Stripe('pk_test_8d1dup9d4LZOCQ8kuU5HS7Wm00XAXX9zO9');

              // Create an instance of Elements.
              var elements = stripe.elements();

              // Custom styling can be passed to options when creating an Element.
              // (Note that this demo uses a wider set of styles than the guide below.)
              var style = {
                base: {
                  color: '#32325d',
                  
                  fontFamily: 'sans-serif',
                  fontSmoothing: 'antialiased',
               
                  fontSize: '12px',
                  '::placeholder': {
                    color: '#aab7c4'

                  }
                
                },
                invalid: {
                  color: '#fa755a',
                  iconColor: '#fa755a'
                }
              };

              // Create an instance of the card Element.
              var card = elements.create('card', {
                style: style,
                hidePostalCode:true
                });

              // Add an instance of the card Element into the `card-element` <div>.
              card.mount('#card-element');

              // Handle real-time validation errors from the card Element.
              card.on('change', function(event) {
                var displayError = document.getElementById('card-errors');
                if (event.error) {
                  displayError.textContent = event.error.message;
                } else {
                  displayError.textContent = '';
                }
              });

              // Handle form submission.
              var form = document.getElementById('payment-form');
              form.addEventListener('submit', function(event) {
                event.preventDefault();

                  var options = {
                    name: document.getElementById('name_on_card').value,
                    address_line1: document.getElementById('street').value,
                    address_city: document.getElementById('city').value,
                    address_state: document.getElementById('province').value,
                    address_zip: document.getElementById('zip').value,
                  }

                stripe.createToken(card, options ).then(function(result) {
                  if (result.error) {
                    // Inform the user if there was an error.
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                  } else {
                    // Send the token to your server.
                    stripeTokenHandler(result.token);
                  }
                });
              });

              // Submit the form with the token ID.
              function stripeTokenHandler(token) {
                // Insert the token ID into the form so it gets submitted to the server
                var form = document.getElementById('payment-form');
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', token.id);
                form.appendChild(hiddenInput);

                // Submit the form
                form.submit();
}
          })();
    </script> 
    
  </body>
</html>
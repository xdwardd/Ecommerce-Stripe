
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title> E-istore &middot;Laravel E-Commerce</title>

    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Sunrise.Digital">
    <link rel="shortcut icon" type="image/x-icon" href="../favicon.png">
    
    <!-- Bootstrap -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <link href="../assets/css/custom.css" rel="stylesheet">
    <link href="../assets/css/carousel.css" rel="stylesheet">
    <link href="../assets/ionicons-2.0.1/css/ionicons.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Catamaran:400,100,300' rel='stylesheet' type='text/css'>
    

    
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
            </button>
            <a class="navbar-brand" href="./"> <i class="ion-cube"></i> E-istore</a>
          </div>

          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li><a href="/">Home</a></li>
              <li class="{{Request::is('product*') ? 'active' : '' }}"><a href="{{route('product.index')}}">Products</a></li>
             
              <li  class="{{Request::is('gallery*') ? 'active' : '' }}"> 
                <a  href="/gallery">Gallery</a>
              </li>
              <li  class="{{Request::is('contacts*') ? 'active' : '' }}"> 
                <a  href="/contacts">Contacts</a>
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
    <hr class="offset-lg">
    
    {{-- succcess msg --}}

         <div class="container">

                <div class= "text-center" >
                        <h1 class="">Thank you for <br>
                                Your Order
                                </h1>
                                 <p>A confirmation email was sent</p>
                                <a href="/" class="btn btn-primary"> Home Page</a>
                </div>
               
         </div>
            
      
     
    </body>
  </html>
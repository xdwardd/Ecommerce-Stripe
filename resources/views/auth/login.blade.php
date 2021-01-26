@extends('layouts.main')


@section('content')
    
<hr class="offset-lg hidden-xs">
<hr class="offset-md">

<div class="container">
  <div class="row">
    <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 md-padding">
      <h1 class="align-center">Returning Customer</h1>
      <br>

      <form class="signin" method="POST" action="{{ route('login') }}">
        @csrf
        <div>
        <input id="email" type="email" name="email"  placeholder="E-mail" required="" class="form-control @error('email') is-invalid @enderror"  value="{{ old('email') }}" required autocomplete="email" autofocus/>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong style="color: red">{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <br>

        <div>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"/>
        
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                 @enderror
        </div>
         <br>

        <button type="submit" class="btn btn-primary">  {{ __('Login') }}
            
        </button>
        
      
      
        @if (Route::has('password.request'))
                                <a class="xs-margin" href="#">
                                    {{ __('Forgot Your Password?') }}
                                </a>
        @endif
        

        <br><br>

        <p>
          If you already have an account with us, please login.
        </p>
        <hr class="offset-xs">

        <a href="#facebook" class="btn btn-facebook"> <i class="ion-social-facebook"></i> Login with Facebook </a>
        <hr class="offset-sm">

        <p>
          Don't have an account? Create one now! <a href="../signup/"> Registration > </a>
        </p>

      </form>
    </div>
  </div>
</div>
<br><br>
<br class="hidden-xs">
<br class="hidden-xs">


@endsection
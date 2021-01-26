@extends('layouts.main')

@section('content')
<hr class="offset-lg hidden-xs">
<hr class="offset-md">

<div class="container">
  <div class="row">
    <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 md-padding">
      <h1 class="align-center">New Customer</h1>
      <br>

      <form  action="{{ route('register') }}" method="POST">
        @csrf
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-12">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Fullname" autofocus><br>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
            </div>
            <div class="col-sm-12">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email Address"><br>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                     @enderror
            </div>
            <div class="col-sm-12">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password"><br>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
            </div>
            <div class="col-sm-12">
              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password"><br>
            </div>
          </div>
        </div>
        <br>

        <button type="submit" class="btn btn-primary">{{ __('Register') }}</button>
        <a href="#" class="xs-margin">Terms ></a>

        <br><br>
        <p>
          By creating an account you will be able to shop faster, be up to date on an order's status, and keep track of the orders you have previously made.
        </p>
      </form>

      <br class="hidden-sm hidden-md hidden-lg">
    </div>
  </div>
</div>
<br><br>
<hr class="hidden-xs">
<br class="hidden-xs">
<br class="hidden-xs">


@endsection


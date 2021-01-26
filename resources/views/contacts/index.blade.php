@extends('layouts.mymain')

@section('content')

<hr class="offset-md">

<div class="container">
    <div class="row">
      <div class="col-sm-4">
        <div id="Address">
          <address>
            <label class="h3">E-istore, Inc.</label><br>
            1305 Market Street, Bogo City Cebu<br>
            Guadalupe Bogo, CA 12345<br>
            <abbr title="Phone">P:</abbr> (+63) 955-136- 2555
          </address>

          <address>
            <strong>Support</strong><br>
            <a href="mailto:#">xdwarddd@example.com</a>
            <br><br>

            <strong>Partners</strong><br>
            <a href="mailto:#">catapan@example.com</a>
          </address>
        </div>
      </div>
      <div class="col-sm-8">
        <div id="GoMap"></div>
      </div>
    </div>
    <br>
</div>

<div class="gray">
  <div class="container align-center">

    
    <h1> Need our help? </h1>
    <p> We are here to help you  </p>

    <div class="row">
      <div class="col-sm-4 col-sm-offset-4">
        <form class="contact" action="{{route('contacts.store')}}" method="POST">
          @csrf
          <textarea class="form-control" name="messages" placeholder="Message" required="" rows="5"></textarea>
          <br>

          <input type="email" name="email" value="" placeholder="E-mail" required="" class="form-control" />
          <br>

          <button type="submit" class="btn btn-primary justify"> Send question <i class="ion-android-send"></i> </button>
        </form>

      </div>
    </div>
  </div>
  <br>
</div>
<hr class="offset-lg">
<hr class="offset-lg">


@endsection
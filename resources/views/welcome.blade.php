@extends('layouts.frontEndApp')
@section('pageHeading')
    Deshboard
@endsection
@section('searchpanel')
        <li class="hide-phone app-search">
            <p>Your System Summary</p>
        </li>
@endsection
@section('content')


<div class="col-12">


  <div class="row">
    <div class="col">
      <h4 class="form-control"><b>Total Buy</b></h4>
    </div>
    <p><--></p>
    <div class="col">
      <h4 class="form-control">$ {{$totalbuy}} </h4>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col">
      <h4 class="form-control"><b>Total Sell</b></h4>
    </div>
    <p><--></p>
    <div class="col">
      <h4 class="form-control">$ {{$totalsell}} </h4>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col">
      <h4 class="form-control"><b>Profit</b></h4>
    </div>
    <p><--></p>
    <div class="col">
      <h4 class="form-control">$ {{$totalsell-$totalbuy}} </h4>
    </div>
  </div>
</div>

@endsection

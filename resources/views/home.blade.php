@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
<div class="header py-7">
  <div class="container">
    <div class="row">
      @foreach ($cards as $card)
      <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 mb-3">
        <div class="card">
          <img class="card-img-top" style="height: 150px; object-fit: contain;" src="{{ $card->image}}"
            alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">{{ $card->title }}</h5>
            <p class="card-text">{{ $card->content }}</p>
            <a href="#" class="btn btn-primary">詳細</a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
  <div class="separator separator-bottom separator-skew zindex-100">
    <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
      <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
    </svg>
  </div>
</div>

<div class="container mt--10 pb-5"></div>
@endsection

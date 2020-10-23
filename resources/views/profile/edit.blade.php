@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
<div id="vue-app" class="main-content col-12 col-md-9 col-lg-10 mt-3">
  <div class="container-fluid mt-3 ">
    <div class="row">
      <div class="col-xl-2"></div>
      <profile />
    </div>
  </div>
</div>
@endsection

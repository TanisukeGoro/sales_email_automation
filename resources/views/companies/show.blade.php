@extends('layouts.app', ['title' => __('企業詳細')])

@section('content')
<div id="vue-app" class="main-content col-12 col-md-9 col-lg-10 mt-3">
  <div class="container-fluid mt-3">
    <company-detail :companies="{{ $companies }}">
  </div>
</div>
<script>
</script>
@endsection

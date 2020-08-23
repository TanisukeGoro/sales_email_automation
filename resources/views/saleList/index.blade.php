@extends('layouts.app', ['title' => __('営業先リスト一覧')])

@section('content')
<div id="vue-app" class="main-content col-12 col-md-9 col-lg-10 mt-3">
  <div class="container-fluid mt-3 ">
    <sale-list>
  </div>
</div>
@endsection

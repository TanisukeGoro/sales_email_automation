@extends('layouts.app', ['title' => __('アプローチ先企業フォルダ')])

@section('content')
<div id="vue-app" class="main-content col-12 col-md-9 col-lg-10 mt-3">
  <div class="container-fluid mt-3 ">
    <approach-folders-index :props-folders='@json($approachFolders)' />
  </div>
  @include('layouts.footers.auth')
</div>
@endsection

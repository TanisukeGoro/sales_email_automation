@extends('layouts.app', ['title' => __('営業先リスト一覧')])

@section('content')
<div id="vue-app" class="main-content col-12 col-md-9 col-lg-10 mt-3">
  <div class="container-fluid mt-3 ">
    <sale-list>
  </div>
  @include('layouts.footers.auth')
</div>
<script>
  $('.delete-btn').click(function() {
    const index = this.getAttribute('data-index');
    const name = this.getAttribute('data-name');

    console.log(index)

    $('.delete-form').attr('action', `/salelist/${index}`);
    $('.delete-span').text(`${name}のテンプレートを削除しますか？`);
    $('.delete-input').val(index);
  })
</script>
@endsection

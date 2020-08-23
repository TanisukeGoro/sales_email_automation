@extends('layouts.app', ['title' => __('テンプレート一覧')])

@section('content')
<div id="vue-app" class="main-content col-12 col-md-9 col-lg-10 mt-3">
  <div class="container-fluid mt-3 ">
    <templates>
  </div>
</div>
<script>
  //後でVueに書き換える
  $('.delete-btn').click(function() {
    const index = this.getAttribute('data-index');
    const name = this.getAttribute('data-name');

    $('.delete-form').attr('action', `/template/${index}`);
    $('.delete-span').text(`${name}のテンプレートを削除しますか？`);
    $('.delete-input').val(index);
  })
</script>
@endsection

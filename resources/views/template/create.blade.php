@extends('layouts.app', ['title' => __('営業先企業一覧')])

@section('content')
<div class="main-content col-12 col-md-9 col-lg-10 mt-3">
  <div class="container-fluid mt-3 ">
    <div class="col-xl-12">
      <div class="card bg-secondary shadow pb-4">
        <div class="card-header bg-white border-0">
          <div class="row align-items-center">
            <h3 class="col-4 mb-0">{{ __('テンプレート') }}</h3>
          </div>
        </div>
        <div class="col-10 m-auto">
          <div class="px-4 pt-4">
            <span class="">テンプレート名：</span>
            <div class="col-12 form-group m-0 p-0">
              <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>
          </div>
          <div class="px-4 pt-4">
            <span class="">メールアドレス：</span>
            <div class="col-12 form-group m-0 p-0">
              <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="example@example.com">
            </div>
          </div>
          <div class="px-4 pt-4">
            <span class="">会社名：</span>
            <div class="col-12 form-group m-0 p-0">
              <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="株式会社example">
            </div>
          </div>
          <div class="px-4 pt-4">
            <span class="">部署名：</span>
            <div class="col-12 form-group m-0 p-0">
              <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="人事部">
            </div>
          </div>
          <div class="px-4 pt-4">
            <span class="">件名：</span>
            <div class="col-12 form-group m-0 p-0">
              <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>
          </div>
          <div class="px-4 pt-4">
            <span class="">内容(短文)：</span>
            <div class="col-12 form-group m-0 p-0">
              <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>
          </div>
          <div class="px-4 pt-4">
            <span class="">内容(長文)：</span>
            <div class="col-12 form-group m-0 p-0">
              <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>
          </div>
          <div class="px-4 mt-4 text-right">
            <button type="button" class="btn btn-outline-primary">作成</button>
          </div>
        </div>
      </div>
    </div>
    @include('layouts.footers.auth')
  </div>
</div>
<script>
</script>
@endsection

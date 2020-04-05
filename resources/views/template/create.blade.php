{{--
  createとeditで同じでbladeを使用
  もし別別にする必要があったら別ファイルで作成
  --}}

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
          @if(Route::currentRouteName() == "template.create")
          <form action="{{route('template.confirm')}}" method="GET">
            @elseif(Route::currentRouteName() == "template.edit")
            <form action="{{route('template.update',$template->id)}}" method="POST">
              @method('PUT')
              @endif
              @csrf
              <div class="px-4 pt-4">
                <span class="">テンプレート名：</span>
                <div class="col-12 form-group m-0 p-0">
                  @if($errors->has("name"))
                  <div class="error">
                    <small class="small text-red">※{{$errors->first("name")}}</small>
                  </div>
                  @endif
                  <input type="text" class="form-control" id="exampleFormControlInput1" name="name"
                    value="{{old('name', $template->name) }}" placeholder="">
                </div>
              </div>
              <div class="px-4 pt-4">
                <span class="">メールアドレス：</span>
                <div class="col-12 form-group m-0 p-0">
                  @if($errors->has("email"))
                  <div class="error">
                    <small class="small text-red">※{{$errors->first("email")}}</small>
                  </div>
                  @endif
                  <input type="email" class="form-control" id="exampleFormControlInput1" name="email"
                    value="{{old('email', $template->email) }}" placeholder="example@example.com">
                </div>
              </div>
              <div class="px-4 pt-4">
                <span class="">会社名：</span>
                <div class="col-12 form-group m-0 p-0">
                  @if($errors->has("company"))
                  <div class="error">
                    <small class="small text-red">※{{$errors->first("company")}}</small>
                  </div>
                  @endif
                  <input type="text" class="form-control" id="exampleFormControlInput1" name="company"
                    value="{{old('company', $template->company) }}" placeholder="株式会社example">
                </div>
              </div>
              <div class="px-4 pt-4">
                <span class="">部署名：</span>
                <div class="col-12 form-group m-0 p-0">
                  @if($errors->has("department"))
                  <div class="error">
                    <small class="small text-red">※{{$errors->first("department")}}</small>
                  </div>
                  @endif
                  <input type="text" class="form-control" id="exampleFormControlInput1" name="department"
                    value="{{old('department', $template->department) }}" placeholder="人事部">
                </div>
              </div>
              <div class="px-4 pt-4">
                <span class="">件名：</span>
                <div class="col-12 form-group m-0 p-0">
                  @if($errors->has("subject"))
                  <div class="error">
                    <small class="small text-red">※{{$errors->first("subject")}}</small>
                  </div>
                  @endif
                  <input type="text" class="form-control" id="exampleFormControlInput1" name="subject"
                    value="{{old('subject', $template->subject) }}">
                </div>
              </div>
              <div class="px-4 pt-4">
                <span class="">内容(短文)：</span>
                <div class="col-12 form-group m-0 p-0">
                  @if($errors->has("short_content"))
                  <div class="error">
                    <small class="small text-red">※{{$errors->first("short_content")}}</small>
                  </div>
                  @endif
                  <input type="text" class="form-control" id="exampleFormControlInput1" name="short_content"
                    value="{{old('short_content', $template->short_content) }}" placeholder="">
                </div>
              </div>
              <div class="px-4 pt-4">
                <span class="">内容(長文)：</span>
                <div class="col-12 form-group m-0 p-0">
                  @if($errors->has("long_content"))
                  <div class="error">
                    <small class="small text-red">※{{$errors->first("long_content")}}</small>
                  </div>
                  @endif
                  <input type="text" class="form-control" id="exampleFormControlInput1" name="long_content"
                    value="{{old('long_content', $template->long_content) }}" placeholder="">
                </div>
              </div>
              <div class="px-4 mt-4 text-right">
                @if(Route::currentRouteName() == "template.create")
                <input type="submit" class="btn btn-outline-primary" value="作成">
                @elseif(Route::currentRouteName() == "template.edit")
                <input type="submit" class="btn btn-outline-primary" value="編集">
                @endif
              </div>
            </form>
        </div>
      </div>
    </div>
    @include('layouts.footers.auth')
  </div>
</div>
<script>
</script>
@endsection

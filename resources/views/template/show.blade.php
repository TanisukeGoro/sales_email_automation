{{--
  showとconfirmで同じでbladeを使用
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
            <div class="col-8 text-right">
              @if(Route::currentRouteName() == "template.show")
              <a href="{{route('template.edit', $template->id)}}">
                <button type="button" class="mr-4 btn btn-outline-primary">編集</button>
              </a>
              @endif
              @if(Route::currentRouteName() == "template.confirm")
              <div>
                <form class="d-inline" action="{{ route('template.create') }}" method="GET">
                  <input type="hidden" name="name" value="{{ $template->name }}">
                  <input type="hidden" name="email" value="{{ $template->email }}">
                  <input type="hidden" name="company" value="{{ $template->company }}">
                  <input type="hidden" name="department" value="{{ $template->department }}">
                  <input type="hidden" name="subject" value="{{ $template->subject }}">
                  <input type="hidden" name="redirect_uri" value="{{ $template->redirect_uri }}">
                  <input type="hidden" name="short_content" value="{{ $template->short_content }}">
                  <input type="hidden" name="long_content" value="{{ $template->long_content }}">
                  <input type="submit" class="mr-4 btn btn-outline-primary" value="戻る">
                </form>

                <form class="d-inline" action="{{ route('template.store') }}" method="POST">
                  @csrf
                  <input type="hidden" name="name" value="{{ $template->name }}">
                  <input type="hidden" name="email" value="{{ $template->email }}">
                  <input type="hidden" name="company" value="{{ $template->company }}">
                  <input type="hidden" name="department" value="{{ $template->department }}">
                  <input type="hidden" name="subject" value="{{ $template->subject }}">
                  <input type="hidden" name="redirect_uri" value="{{ $template->redirect_uri }}">
                  <input type="hidden" name="short_content" value="{{ $template->short_content }}">
                  <input type="hidden" name="long_content" value="{{ $template->long_content }}">
                  <input type="submit" class="mr-4 btn btn-outline-primary" value="作成">
                </form>
              </div>
              @endif
            </div>
          </div>
        </div>
        <div class="px-4 pt-4">
          <span class="ml-xl-4">テンプレート名：</span>
          <div class="row px-4">
            <div class="col-4">
            </div>
            <div class="col-8">
              {{ $template->name }}
            </div>
          </div>
        </div>
        <div class="px-4 pt-4">
          <span class="ml-xl-4">メールアドレス：</span>
          <div class="row px-4">
            <div class="col-4">
            </div>
            <div class="col-8">
              {{ $template->email }}
            </div>
          </div>
        </div>
        <div class="px-4 pt-4">
          <span class="ml-xl-4">会社名：</span>
          <div class="row px-4">
            <div class="col-4">
            </div>
            <div class="col-8">
              {{ $template->company }}
            </div>
          </div>
        </div>
        <div class="px-4 pt-4">
          <span class="ml-xl-4">部署：</span>
          <div class="row px-4">
            <div class="col-4">
            </div>
            <div class="col-8">
              {{ $template->department }}
            </div>
          </div>
        </div>
        <div class="px-4 pt-4">
          <span class="ml-xl-4">リダイレクト先URL：</span>
          <div class="row px-4">
            <div class="col-4">
            </div>
            <div class="col-8">
              {{ $template->redirect_uri }}
            </div>
          </div>
        </div>
        <div class="px-4 pt-4">
          <span class="ml-xl-4">件名：</span>
          <div class="row px-4">
            <div class="col-4">
            </div>
            <div class="col-8">
              {{ $template->subject }}
            </div>
          </div>
        </div>
        <div class="px-4 pt-4">
          <span class="ml-xl-4">内容(短文)：</span>
          <div class="row px-4">
            <div class="col-4">
            </div>
            <div class="col-8">
              {{ $template->short_content }}
            </div>
          </div>
        </div>
        <div class="px-4 pt-4">
          <span class="ml-xl-4">内容(長文)：</span>
          <div class="row px-4">
            <div class="col-4">
            </div>
            <div class="col-8">
              {{ $template->long_content }}
            </div>
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

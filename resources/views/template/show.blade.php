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
              <a href="{{route('template.edit', $template->id)}}">
                <button type="button" class="mr-4 btn btn-outline-primary">編集</button>
              </a>
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

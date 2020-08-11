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
              <div>
                <form class="d-inline" action="{{ route('template.back') }}" method="POST">
                  @csrf
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
            </div>
          </div>
        </div>
        @include('template.card-body')
      </div>
    </div>
  </div>
</div>
<script>
</script>
@endsection

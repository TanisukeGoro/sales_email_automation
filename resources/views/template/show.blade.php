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
        <div class="px-4 pt-5 row">
          <span class="ml-xl-4 col-3">テンプレート名：</span>
          <span class="col-7 template-text">{{ $template->name }}</span>
          <div class="">
            <i class="far fa-copy col-1 template" data-toggle="tooltip" data-placement="top" title="コピー"></i>
          </div>
        </div>

        <div class="px-4 pt-5 row">
          <span class="ml-xl-4 col-3">メールアドレス：</span>
          <span class="col-7 email-text">{{ $template->email }}</span>
          <div class="">
            <i class="far fa-copy col-1 email" data-toggle="tooltip" data-placement="top" title="コピー"></i>
          </div>
        </div>

        <div class="px-4 pt-5 row">
          <span class="ml-xl-4 col-3">会社名：</span>
          <span class="col-7 company-text">{{ $template->company }}</span>
          <div class="">
            <i class="far fa-copy col-1 company" data-toggle="tooltip" data-placement="top" title="コピー"></i>
          </div>
        </div>

        <div class="px-4 pt-5 row">
          <span class="ml-xl-4 col-3">部署：</span>
          <span class="col-7 department-text">{{ $template->department }}</span>
          <div class="">
            <i class="far fa-copy col-1 department" data-toggle="tooltip" data-placement="top" title="コピー"></i>
          </div>
        </div>

        <div class="px-4 pt-5 row">
          <span class="ml-xl-4 col-3">リダイレクト先URL：</span>
          <span class="col-7 redirecturi-text">{{ $template->redirect_uri }}</span>
          <div class="">
            <i class="far fa-copy col-1 redirecturi" data-toggle="tooltip" data-placement="top" title="コピー"></i>
          </div>
        </div>

        <div class="px-4 pt-5 row">
          <span class="ml-xl-4 col-3">件名：</span>
          <span class="col-7 subject-text">{{ $template->subject }}</span>
          <div class="">
            <i class="far fa-copy col-1 subject" data-toggle="tooltip" data-placement="top" title="コピー"></i>
          </div>
        </div>

        <div class="px-4 pt-5 row">
          <span class="ml-xl-4 col-3">内容(短文)：</span>
          <div class="col-7 shortcontent-text">{{ $template->short_content }}</div>
          <div class="">
            <i class="far fa-copy col-1 shortcontent" data-toggle="tooltip" data-placement="top" title="コピー"></i>
          </div>
        </div>

        <div class="px-4 pt-5 row">
          <span class="ml-xl-4 col-3">内容(長文)：</span>
          <span class="col-7 longcontent-text">{{ $template->long_content }}</span>
          <div class="">
            <i class="far fa-copy col-1 longcontent" data-toggle="tooltip" data-placement="top" title="コピー"></i>
          </div>
        </div>

      </div>
    </div>
    @include('layouts.footers.auth')
  </div>
</div>
<script>
  $(this).click(function() {
    const target = $(event.target).attr("class").split(" ")[1]

    if(target != "fa-copy") {
      return
    }
    const copyIcon = $(event.target).attr("class").split(" ")[3]
    const copyText = $(`.${copyIcon}-text`).text()
    copy(copyText)
    successCopy()
})

function copy(copyText) {
  //textareaを生成
  var area = document.createElement("textarea");
  //textareaに記述
  area.textContent = copyText;
  //生成したものをdocumentに追加
  document.body.appendChild(area);
  //選択/コピーして・・
  area.select();
  document.execCommand("copy");
  //すぐに消す。
  document.body.removeChild(area);
}

function successCopy() {
const jsFrame = new JSFrame();
    jsFrame.showToast({
    style: {
    // borderRadius: '2px',
    backgroundColor: 'rgba(93,114,226,1)',
    },
    html: 'コピーしました！', align: 'top', duration: 2000
    });
}

</script>
@endsection

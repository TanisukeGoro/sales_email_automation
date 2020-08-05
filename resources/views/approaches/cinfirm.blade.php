@extends('layouts.app', ['title' => __('アプローチ中企業')])

@section('content')
<div class="main-content col-12 col-md-9 col-lg-10 mt-3">
  <div class="container-fluid mt-3 ">
    <div class="col-xl-12">
      <div class="card bg-secondary shadow pb-4">
        <div class="card-header bg-white border-0">
          <div class="row align-items-center">
            <h3 class="col-4 mb-0">{{ __('アプローチ中企業') }}</h3>
            <div class="col-8 text-right">
              <div>
                <form class="d-inline" action="{{ route('approaches.create') }}" method="GET">
                  <input type="hidden" name="name" value="{{ $approach->name }}">
                  <input type="hidden" name="email" value="{{ $approach->email }}">
                  <input type="hidden" name="company" value="{{ $approach->company }}">
                  <input type="hidden" name="department" value="{{ $approach->department }}">
                  <input type="hidden" name="subject" value="{{ $approach->subject }}">
                  <input type="hidden" name="redirect_uri" value="{{ $approach->redirect_uri }}">
                  <input type="hidden" name="short_content" value="{{ $approach->short_content }}">
                  <input type="hidden" name="long_content" value="{{ $approach->long_content }}">
                  <input type="submit" class="mr-4 btn btn-outline-primary" value="戻る">
                </form>

                <form class="d-inline" action="{{ route('approaches.store') }}" method="POST">
                  @csrf
                  <input type="hidden" name="name" value="{{ $approach->name }}">
                  <input type="hidden" name="email" value="{{ $approach->email }}">
                  <input type="hidden" name="company" value="{{ $approach->company }}">
                  <input type="hidden" name="department" value="{{ $approach->department }}">
                  <input type="hidden" name="subject" value="{{ $approach->subject }}">
                  <input type="hidden" name="redirect_uri" value="{{ $approach->redirect_uri }}">
                  <input type="hidden" name="short_content" value="{{ $approach->short_content }}">
                  <input type="hidden" name="long_content" value="{{ $approach->long_content }}">
                  <input type="submit" class="mr-4 btn btn-outline-primary" value="作成">
                </form>
              </div>
            </div>
          </div>
        </div>
        @include('approaches.card-body')
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

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
              <a href="{{route('template.edit', $template->id)}}">
                <button type="button" class="mr-4 btn btn-outline-primary">編集</button>
              </a>
            </div>
          </div>
        </div>
      @include('template.card-body')
      </div>
    </div>
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

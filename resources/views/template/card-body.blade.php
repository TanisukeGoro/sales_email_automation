<div class="card-body">
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

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

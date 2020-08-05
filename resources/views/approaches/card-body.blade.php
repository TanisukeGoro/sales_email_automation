<div class="px-4 pt-5 row">
  <span class="ml-xl-4 col-3">企業名：</span>
  <span class="col-7 approach-text">
    <a href="{{ route('companies.show', $approach->company->id)}}">
      {{ $approach->company->name }}
    </a>
  </span>
</div>

<div class="px-4 pt-5 row">
  <span class="ml-xl-4 col-3">担当者名：</span>
  <span class="col-7 staff-text">{{ $approach->staff }}</span>
  <div class="">
    <i class="far fa-copy col-1 staff" data-toggle="tooltip" data-placement="top" title="コピー"></i>
  </div>
</div>

<div class="px-4 pt-5 row">
  <span class="ml-xl-4 col-3">担当者 E-mail：</span>
  <span class="col-7 email-text">{{ $approach->email }}</span>
  <div class="">
    <i class="far fa-copy col-1 email" data-toggle="tooltip" data-placement="top" title="コピー"></i>
  </div>
</div>

<div class="px-4 pt-5 row">
  <span class="ml-xl-4 col-3">契約確度：</span>
  <span class="col-7 possibility-text">{{ $approach->possibility_label }}</span>
</div>

<div class="px-4 pt-5 row">
  <span class="ml-xl-4 col-3">営業フェーズ：</span>
  <span class="col-7 phase-text">{{ $approach->phase_label }}</span>
</div>

<div class="px-4 pt-5 row">
  <span class="ml-xl-4 col-3">メモ：</span>
  <div class="col-7 memo-text">{{ $approach->memo }}</div>
  <div class="">
    <i class="far fa-copy col-1 memo" data-toggle="tooltip" data-placement="top" title="コピー"></i>
  </div>
</div>

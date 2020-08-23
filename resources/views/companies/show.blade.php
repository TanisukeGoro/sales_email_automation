@extends('layouts.app', ['title' => __('企業詳細')])

@section('content')
<div class="main-content col-12 col-md-9 col-lg-10 mt-3">
  <div class="container-fluid mt-3 ">
    <div class="col-xl-12">
      <div class="card bg-secondary shadow pb-4">
        <div class="card-header bg-white border-0">
          <div class="row align-items-center">
            <h3 class="col-4 mb-0">{{ __('企業詳細') }}</h3>
          </div>
        </div>
        <div class="px-4 pt-5 row">
          <span class="ml-xl-4 col-3">会社名：</span>
          <span class="col-8">{{ $company->name ?? "登録されていません" }}</span>
        </div>

        <div class="px-4 pt-5 row">
          <span class="ml-xl-4 col-3">法人番号：</span>
          <span class="col-8">{{ $company->code ?? "登録されていません" }}</span>
        </div>

        <div class="px-4 pt-5 row">
          <span class="ml-xl-4 col-3">上場：</span>
          <span class="col-8">{{ $company->listingStock->name ?? "登録されていません" }}</span>
        </div>

        <div class="px-4 pt-5 row">
          <span class="ml-xl-4 col-3">業種大カテゴリ：</span>
          <span class="col-8">{{ $company->companyLargeCategory->name ?? "登録されていません" }}</span>
        </div>

        <div class="px-4 pt-5 row">
          <span class="ml-xl-4 col-3">業界中カテゴリ：</span>
          <span class="col-8">{{ $company->companyMiddleCategory->name ?? "登録されていません" }}</span>
        </div>

        <div class="px-4 pt-5 row">
          <span class="ml-xl-4 col-3">住所：</span>
          <span class="col-8">{{ $company->address ?? "登録されていません" }}</span>
        </div>

        <div class="px-4 pt-5 row">
          <span class="ml-xl-4 col-3">従業員数：</span>
          <span class="col-8">{{ $company->maximum_employees ?? "登録されていません" }}</span>
        </div>

        <div class="px-4 pt-5 row">
          <span class="ml-xl-4 col-3">HP：</span>
          @if($company->top_url)
            <a href="{{$company->top_url}}" target="_blank">
              <i class="fas fa-external-link-alt" ></i>
            </a>
          @else
            <span class="col-8">登録されていません</span>
          @endif
        </div>

        <div class="px-4 pt-5 row">
          <span class="ml-xl-4 col-3">お問い合わせURL：</span>
          @if($company->form_url)
            <a href="{{$company->form_url}}" target="_blank">
              <i class="fas fa-external-link-alt" ></i>
            </a>
          @else
            <span class="col-8">登録されていません</span>
          @endif
        </div>

      </div>
    </div>
  </div>
</div>
<script>
</script>
@endsection

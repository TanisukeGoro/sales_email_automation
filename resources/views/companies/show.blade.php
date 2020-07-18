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
        <div class="px-4 pt-4">
          <span class="ml-xl-4">会社名：</span>
          <div class="row px-4">
            <div class="col-4">
            </div>
            <div class="col-8">
              {{ $company->name ?? "登録されていません" }}
            </div>
          </div>
        </div>
        <div class="px-4 pt-4">
          <span class="ml-xl-4">法人番号：</span>
          <div class="row px-4">
            <div class="col-4">
            </div>
            <div class="col-8">
              {{ $company->code ?? "登録されていません" }}
            </div>
          </div>
        </div>
        <div class="px-4 pt-4">
          <span class="ml-xl-4">上場：</span>
          <div class="row px-4">
            <div class="col-4">
            </div>
            <div class="col-8">
              {{ $company->listingStock->name ?? "登録されていません" }}
            </div>
          </div>
        </div>
        <div class="px-4 pt-4">
          <span class="ml-xl-4">業種大カテゴリ：</span>
          <div class="row px-4">
            <div class="col-4">
            </div>
            <div class="col-8">
              {{ $company->companyLargeCategory->name ?? "登録されていません" }}
            </div>
          </div>
        </div>
        <div class="px-4 pt-4">
          <span class="ml-xl-4">業界中カテゴリ：</span>
          <div class="row px-4">
            <div class="col-4">
            </div>
            <div class="col-8">
              {{ $company->companyMiddleCategory->name ?? "登録されていません" }}
            </div>
          </div>
        </div>
        <div class="px-4 pt-4">
          <span class="ml-xl-4">住所：</span>
          <div class="row px-4">
            <div class="col-4">
            </div>
            <div class="col-8">
              {{ $company->address ?? "登録されていません" }}
            </div>
          </div>
        </div>
        <div class="px-4 pt-4">
          <span class="ml-xl-4">従業員数：</span>
          <div class="row px-4">
            <div class="col-4">
            </div>
            <div class="col-8">
              {{ $company->maximum_employees ?? "登録されていません" }}
            </div>
          </div>
        </div>
        <div class="px-4 pt-4">
          <span class="ml-xl-4">HP：</span>
          <div class="row px-4">
            <div class="col-4">
            </div>
            <div class="col-8">
              {{ $company->top_url ?? "登録されていません" }}
            </div>
          </div>
        </div>
        <div class="px-4 pt-4">
          <span class="ml-xl-4">お問い合わせURL：</span>
          <div class="row px-4">
            <div class="col-4">
            </div>
            <div class="col-8">
              {{ $company->form_url ?? "登録されていません" }}
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

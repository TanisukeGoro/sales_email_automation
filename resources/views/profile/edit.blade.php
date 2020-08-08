@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
<div id="vue-app" class="main-content col-12 col-md-9 col-lg-10 mt-3">
  <div class="container-fluid mt-3 ">
    <div class="row">
      <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
        <div class="card card-profile shadow">
          <div class="card-body pt-0 pt-md-4">
            <div class="row">
              <div class="col">
                <div class="card-profile-stats d-flex justify-content-center">
                  <div>
                    <span class="heading">22%</span>
                    <span class="description">{{ __('反応率') }}</span>
                  </div>
                  <div>
                    <span class="heading">10回</span>
                    <span class="description">{{ __('送信回数') }}</span>
                  </div>
                  <div>
                    <span class="heading">89位</span>
                    <span class="description">{{ __('順位') }}</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="text-center">
              <h3>
                {{ auth()->user()->name }}<span class="font-weight-light"></span>
              </h3>
              <div class="h5 font-weight-300">
                <i class="ni location_pin mr-2"></i>[ {{ auth()->user()->company_name }} ]
              </div>
              <div class="h5 mt-4 d-none d-xl-block">
                <i class="ni business_briefcase-24 mr-2"></i>{{ __('') }}
              </div>
              <div class="d-none d-xl-block">
                <i class="ni education_hat mr-2"></i>{{ "@" . date('Y'). " " . config("app.name") }}
              </div>
            </div>
          </div>
        </div>
      </div>
      <profile />
    </div>
  </div>
  @include('layouts.footers.auth')
</div>
@endsection

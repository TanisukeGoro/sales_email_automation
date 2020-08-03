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
      {{-- <div class="col-xl-8 order-xl-1">
        <div class="card bg-secondary shadow">
          <div class="card-header bg-white border-0">
            <div class="row align-items-center">
              <h3 class="col-12 mb-0">{{ __('プロフィール変更') }}</h3>
    </div>
  </div>
  <div class="card-body">
    <form method="post" action="{{ route('profile.update') }}" autocomplete="off">
      @csrf
      @method('put')

      <h6 class="heading-small text-muted mb-4">{{ __('プロフィール情報') }}</h6>

      @if (session('status'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('status') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif

      <div class="pl-lg-4">
        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
          <label class="form-control-label" for="input-name">{{ __('名前') }}</label>
          <input type="text" name="name" id="input-name"
            class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}"
            placeholder="{{ __('名前') }}" value="{{ old('name', auth()->user()->name) }}" required autofocus>

          @if ($errors->has('name'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('name') }}</strong>
          </span>
          @endif
        </div>
        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
          <label class="form-control-label" for="input-email">{{ __('メールアドレス') }}</label>
          <input type="email" name="email" id="input-email"
            class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}"
            placeholder="{{ __('example@example.com') }}" value="{{ old('email', auth()->user()->email) }}" required>

          @if ($errors->has('email'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('email') }}</strong>
          </span>
          @endif
        </div>

        <div class="form-group{{ $errors->has('company_name') ? ' has-danger' : '' }}">
          <label class="form-control-label" for="input-company_name">{{ __('会社名') }}</label>

          <input type="text" name="company_name" id="input-company_name"
            class="form-control form-control-alternative{{ $errors->has('company_name') ? ' is-invalid' : '' }}"
            placeholder="{{ __('株式会社example') }}" value="{{ old('company_name', auth()->user()->company_name) }}"
            required>

          @if ($errors->has('company_name'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('company_name') }}</strong>
          </span>
          @endif
        </div>

        <div class="form-group{{ $errors->has('company_large_category_id') ? ' has-danger' : '' }}">
          <label class="form-control-label" for="input-company_large_category_id">{{ __('業種大カテゴリ') }}</label>

          <select name="company_large_category_id"
            class="custom-select form-control form-control-alternative{{ $errors->has('company_large_category_id') ? ' is-invalid' : '' }}"
            id="input-company_large_category_id" required>
            <option value="">未選択</option>
            @foreach ($company_large_categories as $category)
            <option value="{{ $category->id }}" @if(old("company_large_category_id",auth()->
              user()->company_large_category_id) == $category->id)
              selected @endif>
              {{ $category->name }}
            </option>
            @endforeach
          </select>

          @if ($errors->has('company_large_category_id'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('company_large_category_id') }}</strong>
          </span>
          @endif
        </div>
        <div class="form-group{{ $errors->has('company_middle_category_id') ? ' has-danger' : '' }}">
          <label class="form-control-label" for="input-company_middle_category_id">{{ __('業種中カテゴリ') }}</label>

          <select name="company_middle_category_id"
            class="custom-select form-control form-control-alternative{{ $errors->has('company_middle_category_id') ? ' is-invalid' : '' }}"
            id="input-company_middle_category_id" required>
            <option value="">未選択</option>
            @foreach ($company_middle_categories as $category)
            <option value="{{ $category->id }}" @if(old("company_middle_category_id",auth()->
              user()->company_middle_category_id) == $category->id)
              selected @endif>
              {{ $category->name }}
            </option>
            @endforeach
          </select>

          @if ($errors->has('company_middle_category_id'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('company_middle_category_id') }}</strong>
          </span>
          @endif
        </div>

        <div class="form-group{{ $errors->has('company_address') ? ' has-danger' : '' }}">
          <label class="form-control-label" for="input-company_address">{{ __('会社所在地') }}</label>
          <input type="text" name="company_address" id="input-company_address"
            class="form-control form-control-alternative{{ $errors->has('company_address') ? ' is-invalid' : '' }}"
            placeholder="{{ __('') }}" value="{{ old('company_address', auth()->user()->company_address) }}" required>

          @if ($errors->has('company_address'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('company_address') }}</strong>
          </span>
          @endif
        </div>

        <div class="form-group{{ $errors->has('maximum_employees') ? ' has-danger' : '' }}">
          <label class="form-control-label" for="input-maximum_employees">{{ __('従業員数') }}</label>
          <input type="number" name="maximum_employees" id="input-maximum_employees"
            class="form-control form-control-alternative{{ $errors->has('maximum_employees') ? ' is-invalid' : '' }}"
            placeholder="{{ __('') }}" value="{{ old('maximum_employees', auth()->user()->maximum_employees) }}"
            required>

          @if ($errors->has('maximum_employees'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('maximum_employees') }}</strong>
          </span>
          @endif
        </div>

        <div class="form-group{{ $errors->has('hp_adress') ? ' has-danger' : '' }}">
          <label class="form-control-label" for="input-hp_adress">{{ __('会社HP') }}</label>
          <input type="text" name="hp_adress" id="input-hp_adress"
            class="form-control form-control-alternative{{ $errors->has('hp_adress') ? ' is-invalid' : '' }}"
            placeholder="{{ __('https://example.com') }}" value="{{ old('hp_adress', auth()->user()->hp_adress) }}"
            required>

          @if ($errors->has('hp_adress'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('hp_adress') }}</strong>
          </span>
          @endif
        </div>

        <div class="text-center">
          <button type="submit" class="btn btn-success mt-4">{{ __('変更') }}</button>
        </div>
      </div>
    </form>
    <hr class="my-4" />
    <form method="post" action="{{ route('profile.password') }}" autocomplete="off">
      @csrf
      @method('put')

      <h6 class="heading-small text-muted mb-4">{{ __('パスワード') }}</h6>

      @if (session('password_status'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('password_status') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif

      <div class="pl-lg-4">
        <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
          <label class="form-control-label" for="input-current-password">{{ __('現在のパスワード') }}</label>
          <input type="password" name="old_password" id="input-current-password"
            class="form-control form-control-alternative{{ $errors->has('old_password') ? ' is-invalid' : '' }}"
            placeholder="{{ __("現在のパスワード") }}" value="" required>

          @if ($errors->has('old_password'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('old_password') }}</strong>
          </span>
          @endif
        </div>
        <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
          <label class="form-control-label" for="input-password">{{ __('新しいパスワード') }}</label>
          <input type="password" name="password" id="input-password"
            class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}"
            placeholder="{{ __('新しいパスワード') }}" value="" required>

          @if ($errors->has('password'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('password') }}</strong>
          </span>
          @endif
        </div>
        <div class="form-group">
          <label class="form-control-label" for="input-password-confirmation">{{ __('確認用パスワード') }}</label>
          <input type="password" name="password_confirmation" id="input-password-confirmation"
            class="form-control form-control-alternative" placeholder="{{ __('確認用パスワード') }}" value="" required>
        </div>

        <div class="text-center">
          <button type="submit" class="btn btn-success mt-4">{{ __('変更') }}</button>
        </div>
      </div>
    </form>
  </div>
</div>
</div> --}}
</div>
</div>
@include('layouts.footers.auth')
</div>
@endsection

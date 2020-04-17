<!-- Top navbar -->
<nav class="navbar navbar-top navbar-expand-md navbar-dark border-bottom border-black" id="navbar-main">
  <div class="container-fluid">
    <div class="header-left text-center">
      <!-- Brand -->
      <a class="h4 mb-0 text-inline" href="{{ route('home') }}">{{ config("app.name") }}</a>
      <!-- button -->
      <div class="button-box ml-3 d-none d-md-inline-block">
        <button type="button" class="btn btn-outline-primary btn-sm">営業先リスト</button>
        <a href="{{ route('template.index')}}" class="btn btn-outline-primary btn-sm">テンプレート</a>
        <button type="button" class="btn btn-outline-primary btn-sm">月間レポート</button>
        <button type="button" class="btn btn-outline-primary btn-sm">設定</button>
      </div>
    </div>

    <div class="header-right d-flex align-items-center">
      <p class="remainder-text m-0 d-none d-md-inline-block">送信済み {{$sent_count}}件</p>
      <p class="remainder-text m-0 ml-3 d-none d-md-inline-block">送信可能件数 {{$remaining_send_count}}件</p>
      <!-- User -->
      <ul class="navbar-nav align-items-center d-md-flex">
        <li class="nav-item dropdown">
          <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <div class="media align-items-center">
              <div class="media-body ml-2 d-lg-block">
                <span class="mb-0 text-sm font-weight-bold">{{ auth()->user()->name }}</span>
              </div>
            </div>
          </a>


          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            <div class=" dropdown-header noti-title d-block d-md-none">
              <h6 class="text-overflow m-0">{{ __('残り8件') }}</h6>
            </div>
            <a href="{{ route('profile.edit') }}" class="dropdown-item">
              <i class="ni ni-single-02"></i>
              <span>{{ __('プロフィール') }}</span>
            </a>
            <a href="#" class="dropdown-item">
              <i class="ni ni-collection"></i>
              <span>{{ __('営業先リスト') }}</span>
            </a>
            <a href="{{ route('template.index')}}" class="dropdown-item">
              <i class="ni ni-collection"></i>
              <span>{{ __('テンプレート') }}</span>
            </a>
            <a href="#" class="dropdown-item">
              <i class="ni ni-calendar-grid-58"></i>
              <span>{{ __('月間レポート') }}</span>
            </a>
            <a href="#" class="dropdown-item">
              <i class="ni ni-settings-gear-65"></i>
              <span>{{ __('設定') }}</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
              <i class="ni ni-user-run"></i>
              <span>{{ __('ログアウト') }}</span>
            </a>
          </div>


        </li>
      </ul>
    </div>
  </div>
</nav>

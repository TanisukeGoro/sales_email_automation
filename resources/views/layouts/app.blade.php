<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Argon Dashboard') }}</title>
  <!-- Favicon -->
  <link href="{{ asset('argon') }}/img/brand/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="{{ asset('argon') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="{{ asset('argon') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="{{ asset('argon') }}/css/argon.css?v=1.0.0" rel="stylesheet">
  <!-- jQuery -->
  <script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>
  <script src="{{ asset('argon') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    .main-content {
      height: calc(100vh - 90px);
      overflow: hidden scroll;
    }

    #body::-webkit-scrollbar {
      /* Chrome, Safari 対応 */
      display: none;
    }
  </style>
</head>

<body id="body" class="{{ $class ?? '' }}">

  @include('layouts.navbars.navbar', ['title' => $title ?? ''])

  @auth()
  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
  </form>
  <div class="container-fluid">
    <div class="row">
      @if(request()->path() != "register/profile" && request()->path() != "email/verify")
      @include('layouts.navbars.sidebar')
      @endif
      @yield('content')
    </div>
  </div>
  @endauth

  @guest()
  @yield('content')
  @include('layouts.footers.guest')
  @endguest

  @auth()
  @include('layouts.footers.auth')
  @endauth

  <!-- Argon JS -->
  <script src="https://riversun.github.io/jsframe/jsframe.js"></script>
  <script src="{{ asset('argon') }}/js/argon.js?v=1.0.0"></script>
  <!-- app.js -->
  <script src="{{ mix('js/app.js') }}"></script>

  @stack('js')
</body>

</html>

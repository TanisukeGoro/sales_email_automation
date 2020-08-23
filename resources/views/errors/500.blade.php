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
</head>

<body class="{{ $class ?? '' }}">
  <div class="container" style="height: calc(100vh - 90px);">
      <div class="h-100 d-flex align-items-center ">
          <div class="card card-block text-center w-100 py-4">
              <h1 class="card-title">{{__("500 Server error")}}</h1>
              <div class="card-text error-details mb-4">
                  {{__("Ooops...Something went wrong.")}}
              </div>
              <div class="error-actions">
                  <a href="{{ route('home') }}" class="btn btn-primary btn-lg">
                      <span class="glyphicon glyphicon-home"></span>
                      ホーム画面に戻る
                  </a>
                  <a href="#" class="btn btn-default btn-lg">
                      <span class="glyphicon glyphicon-envelope"></span>
                      お問い合わせ
                  </a>
              </div>
          </div>
    </div>
  </div>
  @include('layouts.footers.guest')

  <script src="{{ asset('argon') }}/js/argon.js?v=1.0.0"></script>

  @stack('js')
</body>

</html>

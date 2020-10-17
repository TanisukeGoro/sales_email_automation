@extends('layouts.app', ['class' => ''])

@section('content')

<div class="container mt-5 pb-5">
  <div class="row justify-content-center">
    <div class="col-lg-5 col-md-7">
      <div class="card bg-secondary shadow border-0">
        <div class="card-body px-lg-5 py-lg-5">
          <div class="text-center text-muted mb-4">
            <small>メールアドレスの確認</small>
          </div>
          <div>
            @if (session('resent'))
            <div class="alert alert-success" role="alert">
              {{ __('A fresh verification link has been sent to your email address.') }}
            </div>
            @endif

            メールアドレスを確認するためのメールを送信しました。
            @if (Route::has('verification.resend'))
            メールが届いていなければ、
            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
              @csrf
              <button type="submit" class="btn btn-link p-0 m-0 align-baseline">こちらをクリックして再送信してください。</button>.
            </form>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

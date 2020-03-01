@extends('layouts.app', ['title' => __('お問い合わせフォーム')])

@section('content')

  <div class="container-fluid mt-3 ">
    <div class="row">
      <div class="col-xl-4 mb-5 mb-xl-0">
        <div class="card shadow">
          <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">

          </div>
          <div class="card-body pt-0 pt-md-4">

          </div>
      </div>
      </div>
      <div class="col-xl-8">
        <div class="card bg-secondary shadow">
          <div class="card-header bg-white border-0">
            <div class="row align-items-center">
              <h3 class="col-12 mb-0">{{ __('Edit Profile') }}</h3>
            </div>
          </div>
          <div class="card-body">
          <iframe
            id="iframeParentID"
            height="600px"
            width="100%"
            srcdoc="{{ $form_dom ?? ''}}"
          >
        </iframe>
          </div>
        </div>
      </div>
    </div>

      @include('layouts.footers.auth')
  </div>
  <script>
    window.addEventListener('message', function(e) {
    if (e.origin == "https://www.example.com"){  //ドメインを記入
    document.getElementById('iframeParentID').height = e.data; //IDを記入
    }
    }, false);
  </script>

@endsection

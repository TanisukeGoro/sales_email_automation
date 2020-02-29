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
            <iframe src="{{$company->form_url ?? ''}}" id="form-frame" frameborder="0" width="100%" height="500px"></iframe>
          </div>
        </div>
      </div>
    </div>

      @include('layouts.footers.auth')
  </div>
  <script>
    window.load = () => {
      console.log('読み込み完了')
      $('#frame').load(function(){
        console.log('iframeロード完了');
        console.log($('#frame'))
        if (typeof $(this).attr('height') == 'undefined') {
            console.log('object');
            $(this).height(this.contentWindow.document.documentElement.scrollHeight);
        }
      })
    }
</script>

@endsection

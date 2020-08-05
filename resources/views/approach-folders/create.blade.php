@extends('layouts.app', ['title' => __('アプローチ中リスト')])

@section('content')
<div class="main-content col-12 col-md-9 col-lg-10 mt-3">
  <div class="container-fluid mt-3 ">
    <div class="col-xl-12">
      <div class="card bg-secondary shadow pb-4">
        <div class="card-header bg-white border-0">
          <div class="row align-items-center">
            <h3 class="col-4 mb-0">{{ __('アプローチ中リスト新規作成') }}</h3>
          </div>
        </div>
        <div class="col-10 m-auto">
          <form action="{{route('approach-folders.store')}}" method="POST">
              @csrf
              <div class="px-4 pt-4">
                <div class="col-12 form-group m-0 p-0">
                  @if($errors->has("title"))
                  <div class="error">
                    <small class="small text-red">※{{$errors->first("title")}}</small>
                  </div>
                  @endif
                  <input type="title" class="form-control" name="title"
                    value="{{old('title', $apprach_folder->title) }}" placeholder="タイトル">
                </div>
              </div>

              <div class="px-4 mt-4 text-right">
                <input type="submit" class="btn btn-outline-primary" value="作成">
              </div>
            </form>
        </div>
      </div>
    </div>
    @include('layouts.footers.auth')
  </div>
</div>
<script>
</script>
@endsection

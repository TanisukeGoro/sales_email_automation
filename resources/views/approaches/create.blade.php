{{--
  createとeditで同じでbladeを使用
  もし別別にする必要があったら別ファイルで作成
  --}}

@extends('layouts.app', ['title' => __('アプローチ中企業')])

@section('content')
<div class="main-content col-12 col-md-9 col-lg-10 mt-3">
  <div class="container-fluid mt-3 ">
    <div class="col-xl-12">
      <div class="card bg-secondary shadow pb-4">
        <div class="card-header bg-white border-0">
          <div class="row align-items-center">
            <h3 class="col-4 mb-0">{{ __('アプローチ中企業') }}</h3>
          </div>
        </div>
        <div class="col-10 m-auto">
          @if(Route::currentRouteName() == "approaches.create")
            <form action="{{route('approaches.confirm')}}" method="GET">
          @elseif(Route::currentRouteName() == "approaches.edit")
            <form action="{{route('approaches.update',[$approach->approach_folder_id, $approach->id])}}" method="POST">
              @method('PUT')
              @csrf
          @endif
              <div class="px-4 pt-4">
                <span class="">企業名：</span>{{$approach->company->name}}
              </div>

              <div class="px-4 pt-4">
                <span class="">担当者：</span>
                <div class="col-12 form-group m-0 p-0">
                  @if($errors->has("staff"))
                  <div class="error">
                    <small class="small text-red">※{{$errors->first("staff")}}</small>
                  </div>
                  @endif
                  <input type="staff" class="form-control" id="exampleFormControlInput1" name="staff"
                    value="{{old('staff', $approach->staff) }}" placeholder="example@example.com">
                </div>
              </div>

              <div class="px-4 pt-4">
                <span class="">担当者メール：</span>
                <div class="col-12 form-group m-0 p-0">
                  @if($errors->has("email"))
                  <div class="error">
                    <small class="small text-red">※{{$errors->first("email")}}</small>
                  </div>
                  @endif
                  <input type="text" class="form-control" id="exampleFormControlInput1" name="email"
                    value="{{old('email', $approach->email) }}" placeholder="example@example.com">
                </div>
              </div>

              <div class="px-4 pt-4">
                <span class="">契約確度：</span>
                <div class="col-12 form-group m-0 p-0">
                  @if($errors->has("possibility"))
                  <div class="error">
                    <small class="small text-red">※{{$errors->first("possibility")}}</small>
                  </div>
                  @endif
                  <select class="form-control" name="possibility">
                    <option value="0">---</option>
                    @foreach(App\Models\Approach::POSSIBILITY as $key => $val)
                      <option value="{{ $key }}" {{ $key == old('possibility', $approach->possibility) ? 'selected' : '' }} >
                        {{ $val['label']}}
                      </option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="px-4 pt-4">
                <span class="">営業フェーズ：</span>
                <div class="col-12 form-group m-0 p-0">
                  @if($errors->has("phase"))
                  <div class="error">
                    <small class="small text-red">※{{$errors->first("phase")}}</small>
                  </div>
                  @endif
                  <select class="form-control" name="phase">
                    <option value="0">---</option>
                    @foreach(App\Models\Approach::PHASE as $key => $val)
                      <option value="{{ $key }}" {{ $key == old('phase', $approach->phase) ? 'selected' : '' }} >
                        {{ $val['label']}}
                      </option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="px-4 pt-4">
                <span class="">メモ：</span>
                <div class="col-12 form-group m-0 p-0">
                  @if($errors->has("memo"))
                  <div class="error">
                    <small class="small text-red">※{{$errors->first("memo")}}</small>
                  </div>
                  @endif
                  <textarea name="memo" class="form-control" id="exampleFormControlInput1"
                    rows="6">{{old('memo', $approach->memo) }}</textarea>
                </div>
              </div>
              <div class="px-4 mt-4 text-right">
                @if(Route::currentRouteName() == "approaches.create")
                <input type="submit" class="btn btn-outline-primary" value="作成">
                @elseif(Route::currentRouteName() == "approaches.edit")
                <input type="submit" class="btn btn-outline-primary" value="保存">
                @endif
              </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
</script>
@endsection

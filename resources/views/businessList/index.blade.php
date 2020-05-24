@extends('layouts.app', ['title' => __('営業先リスト一覧')])

@section('content')
<div class="main-content col-12 col-md-9 col-lg-10 mt-3">
  <div class="container-fluid mt-3 ">
    <div class="row">
      <div class="col">
        <div class="card shadow">
          <div class="card-header border-0">
            <div class="row align-items-center">
              <div class="col-8">
                <p class="mb-0">営業先リスト一覧</p>
              </div>
            </div>
          </div>

          <div class="col-12">
            @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('status') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @endif
          </div>

          <div class="table-responsive">
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th scope="col">{{ __('営業先リスト名') }}</th>
                  <th scope="col">{{ __('作成日') }}</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($search_conditions as $search_condition)
                <tr>
                  <td>
                    <a href="{{route('business-list.show', $search_condition->id)}}">{{ $search_condition->name }}</a>
                  </td>
                  <td>
                    {{ $search_condition->date() }}
                  </td>
                  <td class="text-right">
                    <button type="button" class="delete-btn btn btn-outline-primary" data-toggle="modal"
                      data-index="{{ $search_condition->id }}" data-name="{{ $search_condition->name }}"
                      data-target="#exampleModal">削除</button>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            {{--削除モーダル表示--}}
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-body">
                    <span class="delete-span"></span>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline-default" data-dismiss="modal">キャンセル</button>
                    {{--formのactionはjsで書いている--}}
                    <form class="delete-form" method="POST">
                      @method('DELETE')
                      @csrf
                      <input class="delete-input" type="hidden">
                      <input class="btn btn-outline-primary" type="submit" value="削除">
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer py-4">
            <nav class="d-flex justify-content-end" aria-label="...">
            </nav>
          </div>
        </div>
      </div>
    </div>
    @include('layouts.footers.auth')
  </div>
</div>
<script>
  $('.delete-btn').click(function() {
    const index = this.getAttribute('data-index');
    const name = this.getAttribute('data-name');

    console.log(index)

    $('.delete-form').attr('action', `/business-list/${index}`);
    $('.delete-span').text(`${name}のテンプレートを削除しますか？`);
    $('.delete-input').val(index);
  })
</script>
@endsection

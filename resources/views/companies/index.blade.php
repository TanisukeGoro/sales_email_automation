@extends('layouts.app', ['title' => __('営業先企業一覧')])

@section('content')
<div class="main-content col-12 col-md-9 col-lg-10 mt-3">
  <div class="container-fluid mt-3 ">
    <div class="row">
      <div class="col">
        <div class="card shadow">
          <div class="card-header border-0">
            <div class="row align-items-center">
              <div class="col-8">
                <p class="mb-0">該当件数{{ $search_count }}件</p>
              </div>
              <div class="dropdown col-4 text-right">
                <button class="btn btn-outline-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton"
                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  ーーー
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="#">上場区分</a>
                  <a class="dropdown-item" href="#">従業員数</a>
                  <a class="dropdown-item" href="#">業界カテゴリ</a>
                </div>
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
                  <th scope="col">{{ __('上場区分') }}</th>
                  <th scope="col">{{ __('企業名') }}</th>
                  <th scope="col">{{ __('企業カテゴリ') }}</th>
                  <th scope="col">{{ __('従業員数') }}</th>
                  <th scope="col">{{ __('所在地') }}</th>
                  <th scope="col">{{ __('ホームページ') }}</th>
                  <th scope="col">{{ __('お問い合わせページ') }}</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($companies as $company)
                <tr>
                  <td>
                    {{ $company->listingStock->name }}
                  </td>
                  <td>
                    @if ($company->form_url)
                    <a href="{{route('companies.show', $company->id)}}">{{ $company->name }}</a>
                    @else
                    {{ $company->name }}
                    @endif
                  </td>
                  <td>
                    @if ($company->company_category_id != null)
                    {{ $company->companyCategory->name }}
                    @endif
                  </td>
                  <td>
                    @if ($company->n_employees != null)
                    {{ $company->n_employees }}人
                    @endif
                  </td>
                  <td>
                    @if ($company->address != null)
                    {{ $company->address }}
                    @endif
                  </td>
                  <td>
                    <a href="{{ $company->top_url }}" target="_blank">{{ $company->top_url }}</a>
                  </td>
                  <td class="text-center">
                    @if ($company->form_url)
                    <a href="{{ $company->form_url }}" target="_blank"><i class="fas fa-external-link-alt"></i></a>
                    @else
                    <i class="fas fa-external-link-alt"></i>
                    @endif
                  </td>
                  {{-- 今後使うかもしれないから残しておく↓ --}}
                  {{-- <td class="text-right">
                    <div class="dropdown">
                      <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                        <form action="#" method="post">
                          @csrf
                          @method('delete')

                          <a class="dropdown-item" href="#">{{ __('Edit') }}</a>
                  <button type="button" class="dropdown-item"
                    onclick="confirm('{{ __("Are you sure you want to delete this user?") }}') ? this.parentElement.submit() : ''">
                    {{ __('Delete') }}
                  </button>
                  </form>
          </div>
        </div>
        </td> --}}
        </tr>
        @endforeach
        </tbody>
        </table>
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
</script>
@endsection

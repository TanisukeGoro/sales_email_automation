@extends('layouts.app', ['title' => __('企業 Management')])

@section('content')
  @include('users.partials.header', ['title' => "営業先企業一覧"])

  <div class="container-fluid mt--7">
    <div class="row">
      <div class="col">
        <div class="card shadow">
          <div class="card-header border-0">
            <div class="row align-items-center">
              <div class="col-8">
                <h3 class="mb-0">{{ __('Companies') }}</h3>
              </div>
              <div class="col-4 text-right">
                <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary">{{ __('Add company') }}</a>
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
                    <th scope="col">{{ __('Name') }}</th>
                    <th scope="col">{{ __('トップページ') }}</th>
                    <th scope="col">{{ __('お問い合わせフォーム') }}</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($companies as $company)
                      <tr>
                        <td>
                          @if ($company->form_url)
                            <a href="{{route('companies.show', $company->id)}}">{{ $company->name }}</a>
                          @else
                            {{ $company->name }}
                          @endif
                        </td>
                        <td>
                          <a href="{{ $company->top_url }}" target="_blank">{{ $company->top_url }}</a>
                        </td>
                        <td>
                          @if ($company->form_url)
                            <a href="{{ $company->form_url }}" target="_blank"><i class="fas fa-external-link-alt"></i></a>
                          @else
                            <i class="fas fa-external-link-alt"></i>
                          @endif
                        </td>
                        <td class="text-right">
                          <div class="dropdown">
                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fas fa-ellipsis-v"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                              <form action="#" method="post">
                                @csrf
                                @method('delete')

                                <a class="dropdown-item" href="#">{{ __('Edit') }}</a>
                                <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this user?") }}') ? this.parentElement.submit() : ''">
                                  {{ __('Delete') }}
                                </button>
                              </form>
                            </div>
                          </div>
                        </td>
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
@endsection

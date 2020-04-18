<nav class="side-bar col-3 col-lg-2 border-right border-black d-none d-md-block" id="sidenav-main">
  <div id="vue-sidebar" class="container-fluid p-0 mt-3">
    <div class="search-box">
      <form action="{{ route('companies.index') }}">
        <button type="submit" class="btn btn-primary btn-block">
          <span class="btn-inner--icon"><i class="ni ni-zoom-split-in"></i></span>
          <span class="btn-inner--text">検索</span>
        </button>
        <div class="col-md-12 p-0">
          <div class="form-group my-4">
            <span class="d-block">フリーワード検索</span>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
              </div>
              <input name="name" class="form-control" placeholder="フリーワード検索" type="text" value="{{ old('name', '') }}">
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="large-category">業種大カテゴリ</label>
          <select name="large-category" class="form-control" id="large-category">
            <option value="">未選択</option>
            @foreach ($company_large_categories as $category)
            <option value="{{ $category->id }}" {{ $category->id == old('large-category', '0') ? 'selected' : ''  }}>
              {{ $category->name }}
            </option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="middle-category">業界中カテゴリ</label>
          <select name="middle-category" class="form-control" id="middle-category">
            <option value="">未選択</option>
            @foreach ($company_middle_categories as $category)
            <option value="{{ $category->id }}" {{ $category->id == old('middle-category', '0') ? 'selected' : ''  }}>{{ $category->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="col-md-12 p-0">
          <div class="form-group">
            <span class="d-block">所在地検索</span>
            <div class="input-group mb-4">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
              </div>
              <input name="address" class="form-control" placeholder="所在地検索" type="text" value="{{ old('address', '') }}">
            </div>
          </div>
        </div>
      </form>
    </div>
    <!-- こんな感じで普通に導入できる -->
    <suggest-input>
  </div>
</nav>

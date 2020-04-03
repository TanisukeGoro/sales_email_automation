<nav class="side-bar col-3 col-lg-2 border-right border-black d-none d-md-block" id="sidenav-main">
  <div id="vue-sidebar" class="container-fluid p-0 mt-3">
    <div class="search-box">
      <div class="col-md-12 p-0">
        <div class="form-group">
          <span class="d-block">フリーワード検索</span>
          <div class="input-group mb-4">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
            </div>
            <input class="form-control" placeholder="フリーワード検索" type="text">
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="exampleFormControlSelect1">業界検索</label>
        <select name="searchCategory" class="form-control" id="exampleFormControlSelect1">
          <option value="">未選択</option>
          @foreach ($company_categories as $category)
          <option value="{{ $category->id }}">{{ $category->name }}</option>
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
            <input class="form-control" placeholder="所在地検索" type="text">
          </div>
        </div>
      </div>
    </div>
    <!-- こんな感じで普通に導入できる -->
    <suggest-input>
  </div>
</nav>

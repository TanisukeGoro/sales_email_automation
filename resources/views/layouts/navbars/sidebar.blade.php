<nav class="side-bar col-3 col-lg-2 border-right border-black d-none d-md-block" id="sidenav-main">
  <div id="vue-sidebar" class="container-fluid p-0 mt-3">
    @if(request()->path() == "companies")
    <side-bar>
      @elseif (request()->path() == "salelist")
      <sale-list-side-bar>
        @endif
  </div>
</nav>

<nav class="navbar bg-blu px-3">
  <div class="d-flex align-items-center gap-2">

    <!-- visibile solo cell e tablet -->
    <button class="btn d-md-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('homepage') }}">
      <img src="{{ asset('images/icons8-pannello-di-controllo-48.png') }}" alt="" width="48" height="48">
      <span>FeedFlow</span>
    </a>

  </div>
</nav>

{{-- offcanvar per  cell --}}
<div class="offcanvas offcanvas-start" tabindex="-1" id="mobileSidebar">
  <div class="offcanvas-header bg-blu">
    <h5 class="offcanvas-title">Menu</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
  </div>
  <div class="offcanvas-body  p-0">
    <x-sidebar></x-sidebar>
  </div>
</div>
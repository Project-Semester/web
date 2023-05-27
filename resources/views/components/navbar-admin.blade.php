<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href=""><h3 class="fw-bold">YukNulis</h3></a>
    @guest
        <div class="d-flex gap-3">
          <a href="{{ route('admin.login.page') }}" class="btn btn-primary">Masuk</a>
          <a href="{{ route('admin.register.page') }}" class="btn btn-outline-primary">Daftar</a>
        </div>
    @endguest
    @auth
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link {{ request()->is('admin/stories*') || request()->is('admin/episode*') ? 'active' : '' }}" href="{{ route('admin.story.index') }}">Cerita</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ request()->is('admin/categories*') ? 'active' : '' }}" href="{{ route('admin.category.index') }}">Kategori</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="">Pengguna</a>
            </li>
          </ul>
          <div class="d-flex">
            <a href="" class="text-decoration-none">
              <span class="text-white text-uppercase fw-bold me-2">{{ auth()->user()->username }}</span>
              @if (auth()->user()->photo)
                <span class="overflow-hidden ">
                  <img src="{{ asset('/storage/'.auth()->user()->photo) }}" class="rounded-circle" alt="Profile Picture" width="40px" height="40px">
                </span>
              @else
                  <img src="https://via.placeholder.com/40x40.png/deddda/000000?Text=40x40" class="rounded-circle w-25" alt="">
              @endif
            </a>
          </div>
        </div>
    @endauth
  </div>
</nav>
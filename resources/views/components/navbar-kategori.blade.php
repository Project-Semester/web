<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
    <div class="container">
        <a href="" class="navbar-brand"><h3 class="fw-bold">YukNulis</h3></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" id="themes">Kategori</a>
              <div class="dropdown-menu" aria-labelledby="themes">
                <a class="dropdown-item">Pilih Kategori</a>
                <div class="dropdown-divider"></div>
                @foreach (\App\Models\Category::pluck('name','id') as $key)
                  <a class="dropdown-item" href="">{{ $key }}</a>
                @endforeach
              </div>
          </ul>
          <ul class="navbar-nav ms-md-auto">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-list-4" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="themes" data-bs-toggle="dropdown"
              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img src="{{ url('assets/46r.jpg') }}" width="40" height="40" class="rounded-circle"></a>
              <div class="dropdown-menu" aria-labelledby="themes">
                <a class="dropdown-item" href="home">Dashboard</a>
                <a class="dropdown-item" href="profil">Profil Saya</a>
                <a class="dropdown-item" href="#">Log Out</a>
              </div>
            </li>
            </div>
          </ul>
        </div>
    </div>
</nav>
<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
    <div class="container">
        <a href="" class="navbar-brand"><h3 class="fw-bold">YukNulis</h3></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav">
              <a class="nav-link"  href="kategori" >Kategori</a>
          </ul>
          <ul class="navbar-nav ms-md-auto">
            <div class="d-flex gap-3" style="padding-right: 10px;">
              <li class="nav-item" style="padding-top: 8px;">
                <a class="nav-link" href="tambahcerita">Tambah Cerita<i class="bi bi-plus-circle" style="padding-left: 10px"></i></a>
              </li>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-list-4" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="themes" data-bs-toggle="dropdown"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                @if (auth()->user()->photo)
                  <span class="overflow-hidden ">
                    <img src="{{ asset('/storage/'.auth()->user()->photo) }}" class="rounded-circle" alt="Profile Picture" width="60px" height="60px">
                  </span>
                @else
                  <img src="https://via.placeholder.com/40x40.png/deddda/000000?Text=40x40" class="rounded-circle w-60" alt="">
                @endif
                </a>
                <div class="dropdown-menu" aria-labelledby="themes">
                  <a class="dropdown-item" href="home">Home</a>
                  <a class="dropdown-item" href="profil">Profil Saya</a>
                  <a class="dropdown-item" href="logout">Log Out</a>
                </div>
              </li>
            </div>
          </ul>
        </div>
    </div>
</nav>
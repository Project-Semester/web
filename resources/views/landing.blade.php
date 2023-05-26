<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YukNulis | @yield('title')</title>

    <!-- Styles --->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    @stack('styles')

    <!-- Scripts --->
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
</head>
<body>
  <div class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
    <div class="container">
      <a href="../" class="navbar-brand "><h3 class="fw-bold">YukNulis</h3></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ms-md-auto">
            <div class="d-flex gap-3" style="padding-right: 10px;">
              <li class="nav-item">
                <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                  <button type="button" class="btn btn-primary" fdprocessedid="e270x9">Masuk</button>
                  <div class="btn-group" role="group">
                    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" fdprocessedid="xm6aos"></button>
                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1" style="">
                      <a class="dropdown-item" href="{{ route('admin.login.page') }}">Sebagai Admin</a>
                      <a class="dropdown-item" href="{{ route('author.login.page') }}">Sebagai User</a>
                    </div>
                  </div>
                </div>
              </li>
              <li class="nav-item">
                <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                  <button type="button" class="btn btn-primary" fdprocessedid="e270x9">Daftar</button>
                  <div class="btn-group" role="group">
                    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" fdprocessedid="xm6aos"></button>
                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1" style="">
                      <a class="dropdown-item" href="{{ route('admin.register.page') }}">Sebagai Admin</a>
                      <a class="dropdown-item" href="{{ route('author.register.page') }}">Sebagai User</a>
                    </div>
                  </div>
                </div>
              </li>
            </div>
          </ul>
        </div>
    </div>
  </div>
  
  <div class="container" style="padding-top: 120px;">
    <div class="row">
      <div class="col-lg-8 col-md-7 col-sm-6">
          <h1>Hai, Ini YUKNULIS!</h1>
          <br>
          <h3>Platform sosial untuk bercerita yang paling</h3>
          <h3>disukai</h3>
          <br>
          <h5>YUKNULIS menghubungkan komuitas dari para pembaca dan penulis</h5>
          <h5>melalui ketukan cerita</h5>
      </div>
      <div class="col-sm-4" >
          <div class="container">
            <img src="{{ url('assets/LogoApp.png') }}">
          </div>
      </div>
    </div>
  </div>
  <div class="container" style="padding-top: 50px;">
  <div id="carouselExampleCaptions" class="carousel slide">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="{{ url('assets/download (2).jpg') }}" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>First slide label</h5>
            <p>Some representative placeholder content for the first slide.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="{{ url('assets//c4fedab1-4041-4db5-9245-97439472cf2c.jpg') }}" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>Second slide label</h5>
            <p>Some representative placeholder content for the second slide.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="..." class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>Third slide label</h5>
            <p>Some representative placeholder content for the third slide.</p>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
  <br>
  <br>
    
    <!-- Scripts --->
    @stack('scripts')
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>

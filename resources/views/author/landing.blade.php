@extends('layouts.app')

@push('styles')
    @livewireStyles
@endpush

@section('content')   
  <div class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a href="../" class="navbar-brand">YukNulis</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ms-md-auto">
            <li class="nav-item">
              <a target="_blank" rel="noopener" class="nav-link" href="">Login</a>
            </li>
            <li class="nav-item">
              <a target="_blank" rel="noopener" class="nav-link" href="">Register</a>
            </li>
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
            <img src="/LogoApp.png">
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
          <img src="/download (2).jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>First slide label</h5>
            <p>Some representative placeholder content for the first slide.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="/c4fedab1-4041-4db5-9245-97439472cf2c.jpg" class="d-block w-100" alt="...">
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

@endsection

@push('scripts')
    @livewireScripts
@endpush

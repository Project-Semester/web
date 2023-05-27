@extends('layouts.author')

@push('styles')
    @livewireStyles
@endpush

@section('content')
    <div class="card text-bg-dark border-dark" style="padding-top: 65px;">
        <div class="card-body text-center">
            <img src="{{ url('assets/46r.jpg') }}" width="180" height="180" class="rounded-circle"></a>
            <div class="container text-center" style="padding-top: 5px;">
            <h3 class="text-white fw-bold me-2 text-center">Nama</h3>
            <p class="text-white text-center">email</p>
            <button class="btn btn-outline-light btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-pencil" style="padding-right: 10px"></i>Edit profil</button>
            </div>
        </div>
    </div>
    <div class="container" style="padding-top: 20px;">
        <div class="card text-bg-dark">
            <div class="card-body">
                <div class="row justify-content-between">
                  <div class="col-4">
                    <h3 style="padding-left:40px;">Daftar ceritamu</h3>
                  </div>
                  <div class="col-4" style="padding-left: 200px">
                    <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#addepisode" fdprocessedid="f48mc9">Tambah Episode<i class="bi bi-plus-circle" style="padding-left: 10px"></i></button>
                  </div>
                </div>
                <hr class="solid">
                <div class="container">
                    <div class="row" style="padding-left: 350px;">
                        <div class="col-lg-8">
                            <div class="card mb-3" style="max-width: 540px;">
                              <div class="row g-0">
                                <div class="col-md-4">
                                  <a href="bacacerita"><img src="{{ url('assets/wp1.jpg')}}" class="img-fluid rounded-start" alt=""></a>
                                </div>
                                <div class="col-md-8">
                                  <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                    <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="card mb-3" style="max-width: 540px;">
                              <div class="row g-0">
                                <div class="col-md-4">
                                  <img src="{{ url('assets/wp3.jpg')}}" class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-8">
                                  <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                    <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="card mb-3" style="max-width: 540px;">
                              <div class="row g-0">
                                <div class="col-md-4">
                                  <img src="{{ url('assets/wp5.jpg')}}" class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-8">
                                  <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                    <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Profil-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit profilmu</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Nama</label>
              <input class="form-control" type="text" placeholder="Nama" aria-label="default input example">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Email</label>
              <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Tambah Episode-->
    <div class="modal fade" id="addepisode" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Pilih ceritamu</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="card text-bg-dark">
              <div class="card-body">
                
              </div>
            </div>
            <br>
            <div class="card text-bg-dark">
              <div class="card-body">
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection

@push('scripts')
    @livewireScripts
@endpush
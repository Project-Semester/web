@extends('layouts.author')

@push('styles')
    @livewireStyles
@endpush

@section('title', 'Profil')

@section('content')
    <div class="card text-bg-dark border-dark" style="padding-top: 65px;">
        <div class="card-body text-center">
          @if (auth()->user()->photo)
          <span class="overflow-hidden ">
            <img src="{{ asset('/storage/'.auth()->user()->photo) }}" class="rounded-circle" alt="Profile Picture" width="180px" height="180px">
          </span>
          @else
          <img src="https://via.placeholder.com/180x180.png/c2c2c2/000000?Text=180x180" class="rounded-circle w-60" alt="">
          @endif
            <div class="container text-center" style="padding-top: 5px;">
            <h3 class="text-white fw-bold me-2 text-center">{{ auth()->user()->username }}</h3>
            <p class="text-white text-center">{{ auth()->user()->email }}</p>
            <a href="{{ route('author.profile.update') }}" ><button class="btn btn-outline-light btn-sm"><i class="bi bi-pencil" style="padding-right: 10px"></i>Edit profil</button></a>
            </div>
        </div>
    </div>
    <div class="container-md my-2 py-2 px-2 d-flex justify-content-center">
      <div class="col-12 col-md-10 col-lg-8 my-3">
        <div class="card text-bg-dark">
          <div class="card-body">
              <div class="row justify-content-between">
                <div class="col-4">
                  <h3 style="padding-left:10px;">Daftar ceritamu</h3>
                </div>
              </div>
              <hr class="solid">
              <div class="container">
                  <div class="row d-flex justify-content-center">
                      <div class="col-lg-7">
                        @forelse ($stories as $story)
                          <div class="card mb-3 border" style="max-width: 540px;">
                            <div class="row g-0">
                              <div class="col-md-4">
                                <img src="..." class="card-img-left" alt="cover">
                              </div>
                              <div class="col-md-8">
                                <div class="card-body">
                                  <h5><a href="{{ route('author.story.show', $story->id) }}" class="card-title text-decoration-none text-white fw-bold fs-5">{{ $story->title }}</a></h5>
                                  <p class="card-text">{{ $story->synopsis }}</p>
                                  <p class="card-text"><small class="text-body-secondary">{{ $story->created_at }}</small></p>
                                </div>
                              </div>
                            </div>
                          </div>
                        @empty
                          <p>Anda tidak memiliki cerita</p>
                        @endforelse
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
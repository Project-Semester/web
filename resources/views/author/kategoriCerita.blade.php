@extends('layouts.kategori')

@push('styles')
    @livewireStyles
@endpush

@section('content')
    <div class="container" style="padding-top: 120px;">
      <div class="card text-bg-dark">
        <div class="card-body">
          <div class="container">
            <h2>Cerita Aksi</h2>
            <hr class="solid">
            <br>
            <div class="container">
              <div class="col-lg-12">
                <div class="container" style="padding-left: 150px; ">
                  <div class="row">
                    <div class="card mb-3" style="max-width: 450px;">
                      <div class="row g-0">
                        <div class="col-md-4">
                          <img src="/wp1.jpg" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                          <div class="card-body">
                            <h5 class="card-title">Deskripsi</h5>
                            <p class="card-text"></p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card mb-3" style="max-width: 450px; margin-left: 20px;">
                      <div class="row g-0">
                        <div class="col-md-4">
                          <img src="/wp2.jpg" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                          <div class="card-body">
                            <h5 class="card-title">Deskripsi</h5>
                            <p class="card-text"></p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="card mb-3" style="max-width: 450px;">
                      <div class="row g-0">
                        <div class="col-md-4">
                          <img src="/wp3.jpg" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                          <div class="card-body">
                            <h5 class="card-title">Deskripsi</h5>
                            <p class="card-text"></p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card mb-3" style="max-width: 450px; margin-left: 20px;">
                      <div class="row g-0">
                        <div class="col-md-4">
                          <img src="/wp4.jpg" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                          <div class="card-body">
                            <h5 class="card-title">Deskripsi</h5>
                            <p class="card-text"></p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="card mb-3" style="max-width: 450px;">
                      <div class="row g-0">
                        <div class="col-md-4">
                          <img src="/wp3.jpg" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                          <div class="card-body">
                            <h5 class="card-title">Deskripsi</h5>
                            <p class="card-text"></p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card mb-3" style="max-width: 450px; margin-left: 20px;">
                      <div class="row g-0">
                        <div class="col-md-4">
                          <img src="/wp4.jpg" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                          <div class="card-body">
                            <h5 class="card-title">Deskripsi</h5>
                            <p class="card-text"></p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <br>
        </div>
      </div>
    </div>

@endsection

@push('scripts')
    @livewireScripts
@endpush

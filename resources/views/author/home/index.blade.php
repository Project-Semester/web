@extends('layouts.author')

@push('styles')
    @livewireStyles
@endpush

@section('title', 'Home')

@section('content')
    <div class="container" style="padding-top: 130px;">
      <div class="card text-bg-dark">
        <div class="card-body">
          <br>
          <h1 style="padding-left: 5px">Selamat Datang, {{ auth()->user()->username }}</h1>
          <hr class="solid">
        </div>
        <br>
          <h2 style="padding-left: 20px;">Rekomendasi cerita untukmu</h2>
          <br>
          <div class="container text-center">
            <div class="row">
              <div class="col">
                <div class="text-center">
                  <div class="card text-bg-light">
                    <div class="card-body d-flex">

                    </div>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="text-center">
                  <div class="card text-bg-light">
                    <div class="card-body d-flex">
                      
                    </div>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="text-center">
                  <div class="card text-bg-light">
                    <div class="card-body d-flex">

                    </div>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="text-center">
                  <div class="card text-bg-light">
                    <div class="card-body d-flex">

                    </div>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="text-center">
                  <div class="card text-bg-light">
                    <div class="card-body d-flex">

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <br>
          <br>
      </div>
    </div>

@endsection

@push('scripts')
    @livewireScripts
@endpush

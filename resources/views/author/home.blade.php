@extends('layouts.author')

@push('styles')
    @livewireStyles
@endpush

@section('content')
    <div class="container" style="padding-top: 140px;">
      <div class="card text-bg-dark">
        <div class="card-body">
          <h1>Selamat Datang, User!</h1>
          <hr class="solid">
        </div>
        <br>
          <h2 style="padding-left: 20px;">Rekomendasi cerita untukmu</h2>
          <br>
          <div class="container text-center">
            <div class="row">
              <div class="col">
                <div class="text-center">
                  <img src="" class="rounded" alt="">
                  <h5>Sampul</h5>
                </div>
              </div>
              <div class="col" style="height: 100px;">
                <div class="text-center">
                  <img src="" class="rounded" alt="">
                  <h5>Sampul</h5>
                </div>
              </div>
              <div class="col">
                <div class="text-center">
                  <img src="" class="rounded" alt="">
                  <h5>Sampul</h5>
                </div>
              </div>
              <div class="col">
                <div class="text-center">
                  <img src="" class="rounded" alt="">
                  <h5>Sampul</h5>
                </div>
              </div>
              <div class="col">
                <div class="text-center">
                  <img src="" class="rounded" alt="">
                  <h5>Sampul</h5>
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

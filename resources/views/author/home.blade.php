@extends('layouts.author')

@push('styles')
    @livewireStyles
@endpush

@section('content')
    <div class="container" style="padding-top: 130px;">
      <div class="card text-bg-dark">
        <div class="card-body">
          <br>
          <h1>Selamat Datang, User!</h1>
          <hr class="solid">
        </div>
        <br>
          <h2 style="padding-left: 20px;">Rekomendasi cerita untukmu</h2>
          <br>
          <div class="container text-center">
            <div class="row">
              <div class="col">
                <div class="text-center overflow-hidden">
                  <img src="/wp1.jpg" class="img-fluid rounded" alt="">
                </div>
              </div>
              <div class="col">
                <div class="text-center">
                  <a href="bacacerita"><img src="{{ asset('/wp2.jpg') }}" class="rounded-full" alt=""></a>
                </div>
              </div>
              <div class="col">
                <div class="text-center">
                  <img src="/wp3.jpg" class="rounded" alt="">
                </div>
              </div>
              <div class="col">
                <div class="text-center">
                  <img src="/wp4.jpg" class="rounded" alt="">
                </div>
              </div>
              <div class="col">
                <div class="text-center">
                  <img src="/wp5.jpg" class="rounded" alt="">
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

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
          <h1 style="padding-left: 5px">Selamat datang, {{ auth()->user()->username }}</h1>
          <hr class="solid">
        </div>
        <br>
          <h2 style="padding-left: 20px;">Rekomendasi cerita untukmu</h2>
          <br>
          <div class="container text-center">
            <div class="row">
              <div class="col">
                <div class="text-center">
                  @if (auth()->user()->photo)
                  <span class="overflow-hidden ">
                    <img src="{{ asset('/storage/'.auth()->user()->photo) }}" class="rounded-square" alt="...">
                  </span>
                  @else
                  <img src="https://via.placeholder.com/200x300.png/c2c2c2/000000?Text=200x300" class="rounded-square w-60" alt="">
                  @endif
                </div>
              </div>
              <div class="col">
                <div class="text-center">
                  @if (auth()->user()->photo)
                  <span class="overflow-hidden ">
                    <img src="{{ asset('/storage/'.auth()->user()->photo) }}" class="rounded-square" alt="...">
                  </span>
                  @else
                  <img src="https://via.placeholder.com/200x300.png/c2c2c2/000000?Text=200x300" class="rounded-square w-60" alt="">
                  @endif
                </div>
              </div>
              <div class="col">
                <div class="text-center">
                  @if (auth()->user()->photo)
                  <span class="overflow-hidden ">
                    <img src="{{ asset('/storage/'.auth()->user()->photo) }}" class="rounded-square" alt="...">
                  </span>
                  @else
                  <img src="https://via.placeholder.com/200x300.png/c2c2c2/000000?Text=200x300" class="rounded-square w-60" alt="">
                  @endif
                </div>
              </div>
              <div class="col">
                <div class="text-center">
                  @if (auth()->user()->photo)
                  <span class="overflow-hidden ">
                    <img src="{{ asset('/storage/'.auth()->user()->photo) }}" class="rounded-square" alt="...">
                  </span>
                  @else
                  <img src="https://via.placeholder.com/200x300.png/c2c2c2/000000?Text=200x300" class="rounded-square w-60" alt="">
                  @endif
                </div>
              </div>
              <div class="col">
                <div class="text-center">
                  @if (auth()->user()->photo)
                  <span class="overflow-hidden ">
                    <img src="{{ asset('/storage/'.auth()->user()->photo) }}" class="rounded-square" alt="...">
                  </span>
                  @else
                  <img src="https://via.placeholder.com/200x300.png/c2c2c2/000000?Text=200x300" class="rounded-square w-60" alt="">
                  @endif
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

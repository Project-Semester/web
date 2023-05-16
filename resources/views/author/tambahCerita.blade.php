@extends('layouts.createStory')

@push('styles')
    @livewireStyles
@endpush

@section('content')
    <div class="container" style="padding-top: 100px;">
      <div class="row">
        <div class="col-lg-4 col-md-7 col-sm-6">
          <div class="text-center">
            <img src="" class="rounded" alt="">
            <h5>Sampul</h5>
          </div>
        </div>
        <div class="col-lg-8 col-md-7 col-sm-6">
          <div class="card text-bg-dark">
            <div class="card-body">
              <div class="container">
                <h3>Detail Cerita</h3>
                <hr class="solid">
                <h5>Judul Cerita</h5>
                <input class="form-control form-control-sm" type="text" placeholder="Tulis judul" aria-label=".form-control-sm example">
                <br>
                <h5>Deskripsi</h5>
                  <div class="mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                  </div>
                <h5>Karakter Utama</h5>
                <input class="form-control form-control-sm" type="text" placeholder="Nama karakter utama" aria-label=".form-control-sm example">
                <br>
                <h5>Pilih Kategori</h5>
                <select class="form-select" aria-label="Default select example">
                  <option selected>Pilih kategori</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
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

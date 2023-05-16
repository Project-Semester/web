@extends('layouts.writeStory')

@push('styles')
    @livewireStyles
@endpush

@section('content')
    <div class="container" style="padding-top: 60px; ">
    <div class="card text-bg-dark">
      <div class="card-body">
        <div class="col-lg-10" style="text-align: center; padding-left: 200px;">
          <div class="container-center" >
            <h3 contenteditable="true">Part tak berjudul</h3>
            <hr class="solid">
            <div class="mb-5">
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="40"></textarea>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>

    <!-- Modal -->
    <div class="modal" tabindex="-1" id="modalPublish">
      <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Periksa kembali sebelum dipublish</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-lg-4 col-md-7 col-sm-6">
                <div class="text-center">
                  <img src="" class="rounded" alt="">
                  <h5>Sampul</h5>
                </div>
              </div>
              <div class="col-lg-8 col-md-7 col-sm-6">
                <div class="container" style="box-shadow: 0 0 .10rem">
                  <br>
                  <h5>Detail Cerita</h5>
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
                  <br>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Publish</button>
          </div>
        </div>
      </div>
    </div>

@endsection

@push('scripts')
    @livewireScripts
@endpush

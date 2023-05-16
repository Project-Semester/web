@extends('layouts.author')

@push('styles')
    @livewireStyles
@endpush

@section('content')
    <div class="container" style="padding-top: 140px;">
        <div class="card text-bg-dark">
            <div class="card-body">
                <div class="col-lg-10" style="text-align: center; padding-left: 200px;">
                    <h3 contenteditable="true">Part tak berjudul</h3>
                    <hr class="solid">
                    <div class="mb-3">
                      <label for="exampleFormControlTextarea1" class="form-label" ></label>
                      <textarea class="form-control" id="exampleFormControlTextarea1" rows="30" readonly></textarea>
                    </div>
                    <button type="button" class="btn btn-secondary" fdprocessedid="f93akf">Halaman selanjutnya</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    @livewireScripts
@endpush

@extends('layouts.author')

@push('styles')
    @livewireStyles
@endpush

@section('content')
    <div class="container" style="padding-top: 140px;">
        <div class="card text-bg-dark">
            <div class="card-body">
                <div class="col-lg-10" style="text-align: center; padding-left: 200px;">
                    <br>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="episode ....">
                    <hr class="solid">
                    <div class="mb-3">
                      <label for="exampleFormControlTextarea1" class="form-label" ></label>
                      <textarea class="form-control" id="exampleFormControlTextarea1" rows="30" readonly></textarea>
                    </div>
                </div>
                <div class="row justify-content-end align-items-end">
                    <div class="col-7" style="padding-left: 50px">
                        <button type="button" class="btn btn-outline-primary" fdprocessedid="xvilt">Submit Cerita</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    @livewireScripts
@endpush
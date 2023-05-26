
@extends('layouts.author')

@push('styles')
    @livewireStyles
@endpush

@section('content')
    <div class="container" style="padding-top: 140px;">
        <div class="card text-bg-dark">
            <div class="card-body">
                <div class="col-lg-10" style="text-align: center; padding-left: 200px;">
                    <h3>Part tak berjudul</h3>
                    <hr class="solid">
                    <div class="mb-3">
                      <label for="exampleFormControlTextarea1" class="form-label" ></label>
                      <textarea class="form-control" id="exampleFormControlTextarea1" rows="30" readonly></textarea>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                  <div class="col-md-8 col-lg-6">
                    <div class="card shadow-0 border" style="background-color: #f0f2f5;">
                      <div class="card-body p-4">
                        <div class="form-outline mb-4">
                          <input type="text" id="addANote" class="form-control" placeholder="Type comment..." />
                        </div>
                        <div class="card mb-4">
                          <div class="card-body">
                            <p>Type your note, and hit enter to add it</p>
                            <div class="d-flex justify-content-between">
                              <div class="d-flex flex-row align-items-center">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(4).webp" alt="avatar" width="25"
                                  height="25" />
                                <p class="small mb-0 ms-2">Martha</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
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
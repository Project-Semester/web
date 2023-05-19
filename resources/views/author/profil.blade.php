@extends('layouts.author')

@push('styles')
    @livewireStyles
@endpush

@section('content')
    <div class="card text-bg-light" style="padding-top: 65px;">
        <div class="card-body text-center">
            <img src="/46r.jpg" width="200" height="200" class="rounded-circle"></a>
            <div class="container text-center" style="padding-top: 5px;">
            <h5>Mohamad Taufiq Rahmadi</h5>
            <span>@email.com</span>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    @livewireScripts
@endpush
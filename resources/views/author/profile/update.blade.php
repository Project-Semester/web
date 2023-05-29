@extends('layouts.author')

@push('styles')
    @livewireStyles
@endpush

@section('content')
<div class="container-md my-5 py-5 px-5">
    <div class="row justify-content-center align-items-center">
        <div class="col-12 col-md-10 col-lg-8">
            @if (session()->has('failed'))
                <div class="alert alert-dismissible alert-danger">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong class="fw-bold">Maaf,</strong> {{ session('failed') }}
                </div>
            @endif
            <livewire:author.profile-form :user="$user" />
        </div>
    </div>
    
</div>
@endsection

@push('scripts')
    @livewireScripts
@endpush
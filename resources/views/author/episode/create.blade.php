
@extends('layouts.author')

@push('styles')
    @livewireStyles
@endpush

@section('title', 'Tambah Episode')

@section('content')

@endsection
<div class="container-md my-5 py-5 px-5">
    <div class="row justify-content-center align-items-center">
        <div class="col">
            @if (session()->has('failed'))
                <div class="alert alert-dismissible alert-danger">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong class="fw-bold">Maaf,</strong> {{ session('failed') }}
                </div>
            @endif
        </div>
    </div>
    <livewire:author.episode-form />
</div>
@push('scripts')
    @livewireScripts
@endpush
@extends('layouts.app')

@push('styles')
    @livewireStyles
@endpush

@section('title', 'Penulis')

@section('navbar')
    <x-navbar-admin />
@endsection

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
            </div>
        </div>
        <livewire:admin.author-list />
    </div>
@endsection

@push('scripts')
    @livewireScripts
@endpush
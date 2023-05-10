@extends('layouts.app')

@push('styles')
    @livewireStyles
@endpush

@section('content')
    <div class="container-md">
        <div class="row justify-content-center">
            <div class="col col-md-8">
                @if (session()->has('success'))
                    <div class="alert alert-dismissible alert-success">
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        <strong class="fw-bold">Selamat!</strong> {{ session('success') }}
                    </div>
                @endif
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col col-md-8">
                @if (session()->has('failed'))
                    <div class="alert alert-dismissible alert-danger">
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        <strong class="fw-bold">Maaf,</strong> {{ session('failed') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
    <h1>This is Admin Register Page</h1>
@endsection

@push('scripts')
    @livewireScripts
@endpush
@extends('layouts.app')

@push('styles')
    @livewireStyles
@endpush

@section('content')
    <div class="container-md">
        <div class="row justify-content-center">
            <div class="col col-md-6">
                @if (session()->has('failed'))
                    <div class="alert alert-dismissible alert-danger">
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        <strong class="fw-bold">Maaf,</strong> {{ session('failed') }}
                    </div>
                @endif
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col col-md-6">
                <livewire:admin.login-form>
            </div>
        </div>
    </div>
    
@endsection

@push('scripts')
    @livewireScripts
@endpush
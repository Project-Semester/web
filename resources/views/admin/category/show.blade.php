@extends('layouts.app')

@push('styles')
    @livewireStyles
@endpush

@section('title', 'Kategori')

@section('content')
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
        <div class="row justify-content-center align-items-center">
            {{-- <x-category-card :index="$category->id" :id="$category->id" :name="$category->name" :description="$category->description" :color="$category->color" /> --}}
            <x-category-show-card :$category />
        </div>
    </div>
@endsection

@push('scripts')
    @livewireScripts
@endpush
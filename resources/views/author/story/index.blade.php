@extends('layouts.author')

@push('styles')
    @livewireStyles
@endpush

@section('title', 'Cerita')

@section('content')
    <div class="container-md my-5 py-5 px-5">
        @if (session()->has('failed'))
            <div class="row justify-content-center align-items-center">
                <div class="col-12 col-md-10 col-lg-8">
                    <div class="alert alert-dismissible alert-danger">
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        <strong class="fw-bold">Maaf,</strong> {{ session('failed') }}
                    </div>
                </div>
            </div>
        @endif
        <div class="row justify-content-center align-items-center">
            <div class="col-8">
                <h2 class="text-center fw-bold mb-4">Populer</h2>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    @foreach ($popular_stories as $story)
                        <div class="col">
                            <div class="card text-white bg-dark border h-100">
                                <img src="/assets/cover.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <a href="{{ route('author.story.show', $story->id) }}" class="text-decoration-none text-white">
                                        <h5 class="card-title fw-bold text-truncate">{{ $story->title }}</h5>
                                    </a>
                                    <p class="card-text">{{ $story->excerpt }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <hr class="solid opacity-50 my-4">
            </div>
        </div>
        <livewire:author.story-list />
    </div>
@endsection

@push('scripts')
    @livewireScripts
@endpush
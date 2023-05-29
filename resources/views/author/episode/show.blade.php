@extends('layouts.author')

@push('styles')
    @livewireStyles
@endpush

@section('title', 'Cerita')

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

        <div class="row justify-content-center align-items-center">
            <x-auth-story-card :story="$story" />
        </div>

        <div class="row justify-content-center align-items-center">
            <hr class="border col-8 my-4">

            <h2 class="text-center fw-bold">Episode</h2>

            @foreach ($story->episodes as $episode)
                <x-author-episode-card :episode="$episode" link />
            @endforeach
        </div>
    </div>
@endsection

@push('scripts')
    @livewireScripts
@endpush
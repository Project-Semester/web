@extends('layouts.author')

@push('styles')
    @livewireStyles
@endpush

@section('content')
    <livewire:author.profile-form :user="$user" />
@endsection

@push('scripts')
    @livewireScripts
@endpush
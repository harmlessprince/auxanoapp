@extends('layouts.app')
@push('styles')
    <link href="https://unpkg.com/nprogress@0.2.0/nprogress.css" rel="stylesheet" />
@endpush
@section('page')
    Tickets
@endsection

@section('content')
    <!-- With actions -->
    <div class="flex items-center justify-between">
        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            All tasks
        </h4>
        {{-- <x-link href="{{ route('tasks.create') }}">
            Create Task
        </x-link> --}}
    </div>

    <div id="app">
        <notifications></notifications>
        <tasks :logged-in-user="{{ json_encode(Auth::user()) }}"></tasks>
    </div>
@endsection

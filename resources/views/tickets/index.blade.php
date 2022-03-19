@extends('layouts.app')
@section('page')
    Tickets
@endsection

@section('content')
    <!-- With actions -->
    <div class="flex items-center justify-between">
        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            All tickets
        </h4>
        <x-link href="{{ route('tickets.create') }}">
            Create Ticket
        </x-link>
    </div>

    <div id="app">
        <notifications></notifications>
        <ticket-component></ticket-component>
    </div>
@endsection

@extends('layouts.app')
@section('page')
    Categories
@endsection

@section('content')
    <div class="flex justify-between mb-4 items-center">
        <h4 class="text-lg font-semibold text-gray-600 dark:text-gray-300">
            All Categories
        </h4>
        <x-button @click="openModal">
            Add Category
        </x-button>
    </div>
    @livewire('category-form-modal')
    <div id="app">
        <notifications></notifications>
        <category-component></category-component>
    </div>
@endsection

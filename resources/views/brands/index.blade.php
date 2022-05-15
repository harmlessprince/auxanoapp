@extends('layouts.app')
@section('page')
    Brands
@endsection

@section('content')
    <div class="flex justify-between mb-4 items-center">
        <h4 class="text-lg font-semibold text-gray-600 dark:text-gray-300">
            All Brands
        </h4>
        <x-button @click="openModal">
            Add Brand
        </x-button>
    </div>
    @livewire('brand')
    <div id="app">
        <notifications></notifications>
        <brand-component></brand-component>
    </div>
@endsection

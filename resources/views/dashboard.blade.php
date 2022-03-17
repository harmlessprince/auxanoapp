@extends('layouts.app')
@section('page')
@endsection

@section('content')
    @include('partials.cards')
    @include('partials.charts')
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer></script>
    <script src="{{ asset('template/assets/js/charts-lines.js') }}" defer></script>
    <script src="{{ asset('template/assets/js/charts-pie.js') }}" defer></script>
@endpush

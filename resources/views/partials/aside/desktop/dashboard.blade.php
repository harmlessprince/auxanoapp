@php
$isDashboardActive = strpos(Route::currentRouteName(), 'home') === 0 || strpos(Route::currentRouteName(), 'dashboard') === 0;
@endphp
<x-side-menu url='dashboard' title="Dashboard" :active="$isDashboardActive">
    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round"
        stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
        <path
            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
        </path>
    </svg>
</x-side-menu>

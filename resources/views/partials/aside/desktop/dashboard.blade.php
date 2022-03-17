@php
$isDashboardActive = strpos(Route::currentRouteName(), 'home') === 0 || strpos(Route::currentRouteName(), 'dashboard') === 0;
@endphp
<x-side-menu url='dashboard' title="Dashboard" :active="$isDashboardActive"/>




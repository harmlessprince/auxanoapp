<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />
    @livewireStyles
    <link rel="stylesheet" href="{{ asset('template/assets/css/tailwind.output.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
    <link href="{{ asset('css/app.css') }}{{ '?' . time() }}" rel="stylesheet">
</head>

<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">

        @include('partials.aside.desktop.desktop')
        @include('partials.aside.mobile')
        <div class="flex flex-col flex-1 w-full">
            @include('partials.header')
            <main class="h-full overflow-y-auto">
                <div class="container px-6 mx-auto grid pb-3">
                    <div class="flex justify-between my-6">
                        <h2 class=" text-2xl font-semibold text-gray-700 dark:text-gray-200">
                            @yield('page')
                        </h2>

                        <x-link href="{{ url()->previous() }}" type='secondary'>
                            back
                        </x-link>
                    </div>
                    <!-- CTA -->
                    @include('flash-message')
                    @yield('content')
                </div>
            </main>
        </div>
    </div>
</body>


@stack('scripts')

@livewireScripts
<script>
    window.Laravel = {
        csrfToken: '{{ csrf_token() }}'
    }
</script>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<script src="{{ asset('template/assets/js/init-alpine.js') }}"></script>
<!-- You need focus-trap.js to make the modal accessible -->
<script src="{{ asset('template/assets/js/focus-trap.js') }}" defer></script>

<script src="{{ asset('/js/custom.js') }}"></script>
<script src="{{ mix('/js/app.js') }}"></script>

</html>

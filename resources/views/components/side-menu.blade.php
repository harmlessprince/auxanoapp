<li class="relative px-6 py-3">
    @if ($active)
        <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
    @endif
    <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 {{ $active ? ' text-gray-800 ' : '' }} hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
        href="{{ route($url) }}">
        {{ $slot }}
        <span class="ml-4">{{ $title }}</span>
    </a>
</li>

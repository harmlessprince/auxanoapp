<a
    {{ $attributes->merge(['class' =>'px-5 py-3 capitalize font-medium leading-5 text-white transition-colors duration-150 border border-transparent rounded-lg focus:outline-none ' .$typeClass()]) }}>
    {{ $slot ?? 'button' }}
</a>

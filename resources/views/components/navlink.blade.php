@props(['active'])

@php
$classes = ($active ?? false)
        ? 'inline-flex items-center px-1 pt-1 border-b-2 border-[#f5f5f5] text-base font-medium leading-5 text-[#ffffff] focus:outline-none focus:border-gray-100 transition duration-150 ease-in-out'
        : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-base font-medium leading-5 text-[#ffffffd4] hover:text-[#ffffff] hover:border-[#ffffffb4] focus:outline-none focus:text-gray-100 focus:border-gray-100 transition duration-150 ease-in-out'@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
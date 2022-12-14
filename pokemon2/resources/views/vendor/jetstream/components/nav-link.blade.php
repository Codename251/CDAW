@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-secondary text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-900 transition'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-tertiary focus:outline-none focus:text-gray-700 focus:border-tertiary transition';
@endphp

<a style="text-decoration: none" {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>

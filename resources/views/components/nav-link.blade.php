@props(['active'])

@php
$classes = ($active ?? false)
? 'inline-flex items-center px-1 pt-1 border-b-2 border-accent-cyan text-sm font-medium leading-5 text-accent-cyan
focus:outline-none focus:border-accent-cyan transition duration-150 ease-in-out'
: 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-metallic-silver
hover:text-white hover:border-white/30 focus:outline-none focus:text-white focus:border-white/30 transition duration-150
ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
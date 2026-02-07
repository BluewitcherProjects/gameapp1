@props(['active'])

@php
$classes = ($active ?? false)
? 'block w-full pl-3 pr-4 py-2 border-l-4 border-accent-cyan text-left text-base font-medium text-accent-cyan
bg-primary-teal/20 focus:outline-none focus:text-accent-cyan focus:bg-primary-teal/30 focus:border-accent-cyan
transition duration-150 ease-in-out'
: 'block w-full pl-3 pr-4 py-2 border-l-4 border-transparent text-left text-base font-medium text-metallic-platinum
hover:text-white hover:bg-white/5 hover:border-white/30 focus:outline-none focus:text-white focus:bg-white/5
focus:border-white/30 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
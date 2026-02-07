@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-metallic-silver/30
bg-primary-midnight/50 text-white focus:border-accent-cyan focus:ring-accent-cyan rounded-md shadow-sm backdrop-blur-md
placeholder-metallic-silver/50']) !!}>
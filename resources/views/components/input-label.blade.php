<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-metallic-platinum']) }}>

    {{ $value ?? $slot }}
</label>
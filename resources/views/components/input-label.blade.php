@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-dark-600']) }}>
    {{ $value ?? $slot }}
</label>

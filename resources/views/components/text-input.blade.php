@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-dark-200 focus:border-dark-400 focus:ring-dark-200 rounded-xl shadow-sm']) }}>

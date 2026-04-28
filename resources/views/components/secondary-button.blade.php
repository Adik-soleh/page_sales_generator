<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-2 bg-white border border-dark-200 rounded-xl font-semibold text-xs text-dark-600 uppercase tracking-widest shadow-sm hover:bg-dark-50 focus:outline-none focus:ring-2 focus:ring-dark-300 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>

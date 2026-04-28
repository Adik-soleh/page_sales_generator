<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-dark-800 border border-transparent rounded-xl font-semibold text-xs text-white uppercase tracking-widest hover:bg-dark-700 focus:bg-dark-700 active:bg-dark-900 focus:outline-none focus:ring-2 focus:ring-dark-400 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>

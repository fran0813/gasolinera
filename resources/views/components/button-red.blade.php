<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest btn-red active:bg-red-600 focus:outline-none focus:border-red-600 focus:ring focus:ring-red-300 disabled:opacity-25 transition']) }}>
    {{ $slot }}
</button>

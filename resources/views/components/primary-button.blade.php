<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-gradient-to-r from-accent-cyan to-primary-teal border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:from-primary-teal hover:to-primary-dark focus:bg-primary-dark active:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-accent-cyan focus:ring-offset-2 transition ease-in-out duration-150 shadow-lg hover:shadow-accent-cyan/50']) }}>
    {{ $slot }}
</button>

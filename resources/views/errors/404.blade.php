<x-app-layout>
    <x-slot name="header">
        {{ __('Page Not Found') }}
    </x-slot>

    <div class="py-12 flex flex-col items-center justify-center min-h-[60vh] text-center px-4">
        <div
            class="w-24 h-24 bg-white/5 rounded-full flex items-center justify-center mb-6 border border-white/10 animate-pulse">
            <svg class="w-12 h-12 text-metallic-silver" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                </path>
            </svg>
        </div>

        <h1
            class="text-6xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-accent-gold to-yellow-600 mb-4">
            404</h1>
        <h2 class="text-2xl font-bold text-white mb-4">Page Not Found</h2>
        <p class="text-metallic-silver max-w-md mb-8">The page you are looking for does not exist or has been moved. Use
            the navigation to find your way back.</p>

        <div class="flex gap-4">
            <a href="{{ route('dashboard') }}"
                class="px-6 py-3 bg-accent-gold hover:bg-yellow-500 text-primary-dark font-bold rounded-lg transition-colors shadow-lg shadow-accent-gold/20">
                Go Dashboard
            </a>
            <a href="{{ url()->previous() }}"
                class="px-6 py-3 bg-white/5 hover:bg-white/10 text-white font-bold rounded-lg transition-colors border border-white/10">
                Go Back
            </a>
        </div>
    </div>
</x-app-layout>
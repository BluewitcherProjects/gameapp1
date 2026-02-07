<x-app-layout>
    <x-slot name="header">
        {{ __('My Profile') }}
    </x-slot>

    <div class="py-6 space-y-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- User Info Card -->
            <x-card class="relative overflow-hidden mb-6">
                <div class="absolute inset-0 bg-gradient-to-r from-primary-midnight to-primary-teal opacity-50"></div>
                <div class="relative z-10 p-6 flex items-center space-x-4">
                    <div class="w-16 h-16 rounded-full bg-white/10 p-1 border border-white/20">
                        <img src="{{ asset('pic/head1.jpg') }}" class="w-full h-full rounded-full object-cover"
                            alt="Avatar">
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-white">User ID: {{ user()->phone }}</h3>
                        <p class="text-metallic-silver text-sm">Welcome back to your dashboard.</p>
                        <div
                            class="mt-2 inline-flex items-center px-2 py-1 rounded bg-accent-gold/20 border border-accent-gold/30">
                            <span class="text-xs font-bold text-accent-gold uppercase tracking-wider">VIP Member</span>
                        </div>
                    </div>
                </div>
            </x-card>

            <!-- Balance Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
                <x-card class="bg-gradient-to-br from-primary-dark to-primary-midnight">
                    <div class="p-6">
                        <p class="text-metallic-silver text-sm uppercase tracking-wider mb-1">Recharge Balance</p>
                        <div class="flex justify-between items-baseline">
                            <h2 class="text-3xl font-bold text-white">{{ price(user()->balance) }}</h2>
                            <div class="w-10 h-10 rounded-full bg-accent-cyan/20 flex items-center justify-center">
                                <svg class="w-5 h-5 text-accent-cyan" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                            </div>
                        </div>
                        <p class="text-xs text-metallic-silver mt-2">Total Recharged: {{
                            price(\App\Models\Deposit::where('user_id', user()->id)->where('status',
                            'approved')->sum('amount')) }}</p>
                    </div>
                </x-card>

                <x-card class="bg-gradient-to-br from-primary-dark to-primary-midnight">
                    <div class="p-6">
                        <p class="text-metallic-silver text-sm uppercase tracking-wider mb-1">Withdraw Balance</p>
                        <div class="flex justify-between items-baseline">
                            <h2 class="text-3xl font-bold text-accent-gold">{{ price(user()->income) }}</h2>
                            <div class="w-10 h-10 rounded-full bg-accent-gold/20 flex items-center justify-center">
                                <svg class="w-5 h-5 text-accent-gold" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <p class="text-xs text-metallic-silver mt-2">Total Withdrawn: {{
                            price(\App\Models\Withdrawal::where('user_id', user()->id)->where('status',
                            'approved')->sum('amount')) }}</p>
                    </div>
                </x-card>
            </div>

            <!-- Quick Links Grid -->
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                <a href="{{ route('ordered') }}" class="group">
                    <x-card class="h-full hover:bg-white/5 transition-colors">
                        <div class="p-4 flex flex-col items-center text-center">
                            <div
                                class="w-12 h-12 rounded-full bg-primary-teal/30 flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                                <svg class="w-6 h-6 text-accent-cyan" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                    </path>
                                </svg>
                            </div>
                            <h4 class="text-white font-semibold">My Orders</h4>
                        </div>
                    </x-card>
                </a>

                <a href="{{ route('user.bank') }}" class="group">
                    <x-card class="h-full hover:bg-white/5 transition-colors">
                        <div class="p-4 flex flex-col items-center text-center">
                            <div
                                class="w-12 h-12 rounded-full bg-primary-teal/30 flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                                <svg class="w-6 h-6 text-accent-cyan" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z">
                                    </path>
                                </svg>
                            </div>
                            <h4 class="text-white font-semibold">Bank Settings</h4>
                        </div>
                    </x-card>
                </a>

                <a href="{{ route('user.change.password') }}" class="group">
                    <x-card class="h-full hover:bg-white/5 transition-colors">
                        <div class="p-4 flex flex-col items-center text-center">
                            <div
                                class="w-12 h-12 rounded-full bg-primary-teal/30 flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                                <svg class="w-6 h-6 text-accent-cyan" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                    </path>
                                </svg>
                            </div>
                            <h4 class="text-white font-semibold">Security</h4>
                        </div>
                    </x-card>
                </a>

                <a href="{{ route('history') }}" class="group">
                    <x-card class="h-full hover:bg-white/5 transition-colors">
                        <div class="p-4 flex flex-col items-center text-center">
                            <div
                                class="w-12 h-12 rounded-full bg-primary-teal/30 flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                                <svg class="w-6 h-6 text-accent-cyan" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                    </path>
                                </svg>
                            </div>
                            <h4 class="text-white font-semibold">Funding History</h4>
                        </div>
                    </x-card>
                </a>

                <a href="{{ route('recharge.history') }}" class="group">
                    <x-card class="h-full hover:bg-white/5 transition-colors">
                        <div class="p-4 flex flex-col items-center text-center">
                            <div
                                class="w-12 h-12 rounded-full bg-primary-teal/30 flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                                <svg class="w-6 h-6 text-accent-cyan" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                                    </path>
                                </svg>
                            </div>
                            <h4 class="text-white font-semibold">Recharges</h4>
                        </div>
                    </x-card>
                </a>

                <a href="{{ route('withdraw.history') }}" class="group">
                    <x-card class="h-full hover:bg-white/5 transition-colors">
                        <div class="p-4 flex flex-col items-center text-center">
                            <div
                                class="w-12 h-12 rounded-full bg-primary-teal/30 flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                                <svg class="w-6 h-6 text-accent-cyan" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4">
                                    </path>
                                </svg>
                            </div>
                            <h4 class="text-white font-semibold">Withdrawals</h4>
                        </div>
                    </x-card>
                </a>

                <a href="{{ App\Models\Setting::first()?->telegram ?? 'https://t.me/TNL_LAB_WEBSITE_DEVELOPER' }}" class="group">
                    <x-card class="h-full hover:bg-white/5 transition-colors">
                        <div class="p-4 flex flex-col items-center text-center">
                            <div
                                class="w-12 h-12 rounded-full bg-primary-teal/30 flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                                <svg class="w-6 h-6 text-accent-cyan" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                                    </path>
                                </svg>
                            </div>
                            <h4 class="text-white font-semibold">Support</h4>
                        </div>
                    </x-card>
                </a>
            </div>

            <!-- Logout Button -->
            <form method="POST" action="{{ route('logout') }}" class="mt-8">
                @csrf
                <button type="submit"
                    class="w-full py-4 rounded-xl bg-white/5 border border-white/10 text-red-400 font-bold hover:bg-red-500/10 hover:border-red-500/30 transition-all flex items-center justify-center space-x-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                        </path>
                    </svg>
                    <span>Sign Out</span>
                </button>
            </form>

        </div>
    </div>
</x-app-layout>
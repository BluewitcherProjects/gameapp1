<x-app-layout>
    <x-slot name="header">
        {{ __('Active Investments') }}
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-6">
                @php
                $packages = \App\Models\Package::whereIn('id', my_active_vips())->get();
                @endphp
                @forelse($packages as $package)
                @php
                $purchase = \App\Models\Purchase::where('user_id', user()->id)
                ->where('package_id', $package->id)
                ->where('status', 'active')
                ->first();
                @endphp

                @if($purchase)
                <x-card class="overflow-hidden relative group">
                    <div
                        class="absolute inset-0 bg-gradient-to-r from-primary-midnight via-primary-dark to-primary-teal opacity-0 group-hover:opacity-30 transition-opacity duration-300">
                    </div>

                    <div class="relative z-10 p-6 flex flex-col md:flex-row gap-6">
                        <!-- Image -->
                        <div
                            class="w-full md:w-48 h-48 rounded-xl overflow-hidden shrink-0 border border-white/10 shadow-lg">
                            <img src="{{ asset($package->photo) }}" alt="{{ $package->name }}"
                                class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                        </div>

                        <!-- Content -->
                        <div class="flex-1 flex flex-col justify-between">
                            <div>
                                <div class="flex justify-between items-start mb-2">
                                    <h3
                                        class="text-xl font-bold text-white group-hover:text-accent-cyan transition-colors">
                                        {{ $package->name }}</h3>
                                    <span
                                        class="bg-green-500/20 text-green-400 text-xs px-2 py-1 rounded-full border border-green-500/30 uppercase tracking-widest font-bold">Running</span>
                                </div>

                                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-4">
                                    <div class="bg-white/5 p-3 rounded-lg backdrop-blur-sm">
                                        <p class="text-metallic-silver text-xs uppercase">Daily Income</p>
                                        <p class="text-accent-cyan font-bold">{{ price($purchase->daily_income) }}</p>
                                    </div>
                                    <div class="bg-white/5 p-3 rounded-lg backdrop-blur-sm">
                                        <p class="text-metallic-silver text-xs uppercase">Total Income</p>
                                        <p class="text-accent-gold font-bold">{{
                                            price($package->commission_with_avg_amount) }}</p>
                                    </div>
                                    <div class="bg-white/5 p-3 rounded-lg backdrop-blur-sm">
                                        <p class="text-metallic-silver text-xs uppercase">Invested</p>
                                        <p class="text-white font-bold">{{ price($package->price) }}</p>
                                    </div>
                                    <div class="bg-white/5 p-3 rounded-lg backdrop-blur-sm">
                                        <p class="text-metallic-silver text-xs uppercase">Validity</p>
                                        <p class="text-white font-bold">{{ $package->validity }} Days</p>
                                    </div>
                                </div>
                            </div>

                            <div
                                class="mt-4 pt-4 border-t border-white/10 flex justify-between items-center text-xs text-metallic-silver">
                                <span>Purchased: {{ $purchase->created_at->format('d M Y') }}</span>
                                <span>Expires: {{ \Carbon\Carbon::parse($purchase->validity)->format('d M Y') }}</span>
                            </div>
                        </div>
                    </div>
                </x-card>
                @endif
                @empty
                <div class="text-center py-12">
                    <div class="w-16 h-16 bg-white/5 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-metallic-silver" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-medium text-white mb-2">No Active Investments</h3>
                    <p class="text-metallic-silver mb-6">Start investing today to earn daily returns.</p>
                    <a href="{{ route('vip') }}"
                        class="inline-flex items-center px-4 py-2 bg-accent-gold text-primary-dark font-bold rounded-lg hover:bg-yellow-400 transition-colors">
                        Browse Packages
                    </a>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
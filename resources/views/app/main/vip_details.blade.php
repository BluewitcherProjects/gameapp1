<x-app-layout>
    <x-slot name="header">
        {{ $package->name }}
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <x-card class="relative overflow-hidden">
                <div
                    class="absolute inset-0 bg-gradient-to-br from-primary-midnight via-primary-dark to-primary-teal opacity-50">
                </div>

                <div class="relative z-10 grid grid-cols-1 md:grid-cols-2 gap-8 p-6">
                    <!-- Image Section -->
                    <div class="relative h-64 md:h-auto rounded-xl overflow-hidden shadow-2xl border border-white/10">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent z-10"></div>
                        <img src="{{ asset($package->photo) }}" alt="{{ $package->name }}"
                            class="w-full h-full object-cover">
                        <div class="absolute bottom-4 left-4 z-20">
                            <span class="px-3 py-1 bg-accent-gold text-primary-dark font-bold rounded-full text-sm">
                                {{ $package->validity }} Days Validity
                            </span>
                        </div>
                    </div>

                    <!-- Details Section -->
                    <div class="flex flex-col justify-center">
                        <h2 class="text-3xl font-bold text-white mb-2">{{ $package->name }}</h2>
                        <div class="w-16 h-1 bg-accent-cyan rounded mb-6"></div>

                        <div class="grid grid-cols-2 gap-4 mb-8">
                            <div class="bg-white/5 p-4 rounded-lg border border-white/5 backdrop-blur-sm">
                                <p class="text-metallic-silver text-sm uppercase tracking-wider">Daily ROI</p>
                                <p class="text-xl font-bold text-accent-cyan">{{
                                    price($package->commission_with_avg_amount / $package->validity) }}</p>
                            </div>
                            <div class="bg-white/5 p-4 rounded-lg border border-white/5 backdrop-blur-sm">
                                <p class="text-metallic-silver text-sm uppercase tracking-wider">Total ROI</p>
                                <p class="text-xl font-bold text-accent-gold">{{
                                    price($package->commission_with_avg_amount) }}</p>
                            </div>
                            <div class="bg-white/5 p-4 rounded-lg border border-white/5 backdrop-blur-sm">
                                <p class="text-metallic-silver text-sm uppercase tracking-wider">Investment</p>
                                <p class="text-xl font-bold text-white">{{ price($package->price) }}</p>
                            </div>
                            <div class="bg-white/5 p-4 rounded-lg border border-white/5 backdrop-blur-sm">
                                <p class="text-metallic-silver text-sm uppercase tracking-wider">Type</p>
                                <p class="text-xl font-bold text-metallic-platinum">VIP Plan</p>
                            </div>
                        </div>

                        <div class="mt-auto">
                            <a href="{{ route('purchase.confirmation', ['id' => $package->id]) }}"
                                class="w-full block text-center py-4 rounded-xl bg-gradient-to-r from-accent-gold to-[#F0D070] text-primary-dark font-bold text-xl shadow-[0_0_20px_rgba(201,162,77,0.4)] hover:shadow-[0_0_30px_rgba(201,162,77,0.6)] transform hover:scale-[1.02] transition-all">
                                Confirm Invest Now
                            </a>
                            <p class="text-center text-metallic-silver text-xs mt-4">
                                By clicking Confirm, you agree to our investment terms and conditions.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Description/Info Section -->
                <div class="p-6 border-t border-white/10 relative z-10 pt-8 mt-4">
                    <h3 class="text-xl font-bold text-white mb-4">Package Details</h3>
                    <div class="prose prose-invert max-w-none text-metallic-silver">
                        <p>
                            Invest in the {{ $package->name }} to start earning daily returns. This plan offers a stable
                            and high-yield return on investment over a period of {{ $package->validity }} days.
                            Principal and profit are accrued daily and can be withdrawn according to our withdrawal
                            policy.
                        </p>
                        <ul class="list-disc pl-5 mt-4 space-y-2">
                            <li>Instant activation upon purchase.</li>
                            <li>Daily automated earnings credited to your wallet.</li>
                            <li>24/7 Support for VIP investors.</li>
                        </ul>
                    </div>
                </div>

            </x-card>
        </div>
    </div>
</x-app-layout>
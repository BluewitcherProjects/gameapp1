<x-app-layout>
    <x-slot name="header">
        {{ __('Investment Plans') }}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-white mb-4">Premium Investment Packages</h2>
                <div class="w-24 h-1 bg-gradient-to-r from-transparent via-accent-gold to-transparent mx-auto"></div>
                <p class="text-metallic-silver mt-4 max-w-2xl mx-auto">
                    Accelerate your earnings with our high-performance investment vehicles. Choose the plan that suits
                    your financial goals.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach(\App\Models\Package::where('status', 'active')->get() as $element)
                <x-card
                    class="relative overflow-hidden group hover:border-accent-gold/50 transition-all duration-300 transform hover:-translate-y-2">

                    <!-- Image/Icon Header -->
                    <div class="h-48 w-full relative overflow-hidden rounded-t-xl mb-4">
                        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-primary-dark/90 z-10"></div>
                        <img src="{{ asset($element->photo) }}"
                            class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500"
                            alt="{{ $element->name }}">
                        <div
                            class="absolute top-4 right-4 z-20 bg-accent-gold/90 text-primary-dark font-bold px-3 py-1 rounded-full text-xs shadow-lg">
                            {{ $element->validity }} Days
                        </div>
                    </div>

                    <div class="p-6 pt-0 relative z-20">
                        <h3 class="text-2xl font-bold text-white mb-2 group-hover:text-accent-gold transition-colors">{{
                            $element->name }}</h3>

                        <div class="grid grid-cols-2 gap-4 mb-6">
                            <div class="bg-white/5 rounded-lg p-3 border border-white/5">
                                <p class="text-xs text-metallic-silver uppercase tracking-wider">Daily Income</p>
                                <p class="text-lg font-bold text-accent-cyan">{{
                                    price($element->commission_with_avg_amount / $element->validity) }}</p>
                            </div>
                            <div class="bg-white/5 rounded-lg p-3 border border-white/5">
                                <p class="text-xs text-metallic-silver uppercase tracking-wider">Total Income</p>
                                <p class="text-lg font-bold text-accent-gold">{{
                                    price($element->commission_with_avg_amount) }}</p>
                            </div>
                        </div>

                        <div class="flex items-end justify-between mb-6">
                            <div>
                                <p class="text-sm text-metallic-silver">Investment</p>
                                <p class="text-2xl font-bold text-white">{{ price($element->price) }}</p>
                            </div>
                        </div>

                        <?php
                                $my = \App\Models\Purchase::where('package_id', $element->id)->where('user_id', user()->id)->where('status', 'active')->first();
                            ?>

                        @if(!$my)
                        <a href="{{ url('purchase/vip/'.$element->id) }}"
                            class="block w-full text-center py-3 rounded-lg bg-gradient-to-r from-accent-gold to-[#E6C86E] text-primary-dark font-bold text-lg shadow-[0_0_20px_rgba(201,162,77,0.3)] hover:shadow-[0_0_30px_rgba(201,162,77,0.5)] transform hover:scale-[1.02] transition-all">
                            Invest Now
                        </a>
                        @else
                        <button disabled
                            class="block w-full text-center py-3 rounded-lg bg-white/10 text-metallic-silver font-bold text-lg cursor-not-allowed border border-white/10">
                            Active Plan
                        </button>
                        @endif
                    </div>
                </x-card>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
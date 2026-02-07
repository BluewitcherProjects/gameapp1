<x-app-layout>
    <div class="space-y-4 md:space-y-8" x-data="{ activeTab: 'normal' }">

        <!-- Hero Section / Carousel -->
        <div
            class="relative bg-primary-midnight pb-6 md:pb-12 rounded-b-[3rem] shadow-2xl border-b border-white/5 overflow-hidden">
            <!-- Abstract Background Elements -->
            <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none">
                <div
                    class="absolute top-[-10%] left-[-10%] w-[50%] h-[50%] bg-accent-cyan/10 rounded-full blur-[100px]">
                </div>
                <div
                    class="absolute bottom-[-10%] right-[-10%] w-[50%] h-[50%] bg-accent-gold/10 rounded-full blur-[100px]">
                </div>
            </div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-6 relative z-10">
                <!-- Carousel -->
                <div class="relative rounded-3xl overflow-hidden shadow-2xl border border-white/10 group">
                    <div class="carousel relative w-full h-64 sm:h-80 md:h-96">
                        @foreach(\App\Models\VipSlider::get() as $element)
                        <div
                            class="carousel-item absolute opacity-0 transition-opacity duration-1000 ease-in-out w-full h-full">
                            <img src="{{ asset($element->photo) }}"
                                class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-primary-dark/90 via-primary-dark/20 to-transparent">
                            </div>

                            <!-- Carousel Content Overlay -->
                            <div class="absolute bottom-0 left-0 w-full p-6 sm:p-10">
                                <span
                                    class="inline-block py-1 px-3 rounded-full bg-accent-gold/20 border border-accent-gold/30 text-accent-gold text-xs font-bold mb-2 backdrop-blur-md">
                                    PREMIUM INVESTMENT
                                </span>
                                <h2
                                    class="text-white text-2xl sm:text-4xl font-bold tracking-tight mb-2 drop-shadow-lg">
                                    Grow Your Wealth
                                </h2>
                                <p class="text-metallic-silver text-sm sm:text-base max-w-lg drop-shadow-md">
                                    Experience the next level of financial freedom with our exclusive plans.
                                </p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Quick Actions (Floating Overlap) -->
                <div class="relative -mt-10 mx-auto max-w-6xl">
                    <div
                        class="bg-primary-midnight/80 backdrop-blur-xl border border-white/10 rounded-2xl p-6 shadow-2xl mx-2 sm:mx-0">
                        <div class="grid grid-cols-5 gap-2 sm:gap-6">
                            <a href="{{ route('user.deposit') }}" class="flex flex-col items-center group text-center">
                                <div
                                    class="w-12 h-12 sm:w-14 sm:h-14 rounded-2xl bg-gradient-to-br from-accent-cyan/20 to-primary-teal/20 border border-accent-cyan/30 flex items-center justify-center shadow-lg group-hover:scale-110 group-hover:shadow-accent-cyan/50 transition-all duration-300">
                                    <img src="{{ asset('pic/icon/shiba.png') }}"
                                        class="w-6 h-6 sm:w-7 sm:h-7 drop-shadow-md">
                                </div>
                                <span
                                    class="mt-3 text-[10px] sm:text-xs font-semibold text-metallic-silver group-hover:text-white transition-colors">Recharge</span>
                            </a>
                            <a href="{{ route('user.withdraw') }}" class="flex flex-col items-center group text-center">
                                <div
                                    class="w-12 h-12 sm:w-14 sm:h-14 rounded-2xl bg-gradient-to-br from-accent-gold/20 to-orange-500/20 border border-accent-gold/30 flex items-center justify-center shadow-lg group-hover:scale-110 group-hover:shadow-accent-gold/50 transition-all duration-300">
                                    <img src="{{ asset('pic/icon/rupee1.png') }}"
                                        class="w-6 h-6 sm:w-7 sm:h-7 drop-shadow-md">
                                </div>
                                <span
                                    class="mt-3 text-[10px] sm:text-xs font-semibold text-metallic-silver group-hover:text-white transition-colors">Withdraw</span>
                            </a>
                            <a href="https://t.me/+1fjaTnS-uV85MThl"
                                class="flex flex-col items-center group text-center">
                                <div
                                    class="w-12 h-12 sm:w-14 sm:h-14 rounded-2xl bg-gradient-to-br from-blue-500/20 to-indigo-500/20 border border-blue-400/30 flex items-center justify-center shadow-lg group-hover:scale-110 group-hover:shadow-blue-500/50 transition-all duration-300">
                                    <img src="{{ asset('pic/icon/telegram4.png') }}"
                                        class="w-6 h-6 sm:w-7 sm:h-7 drop-shadow-md">
                                </div>
                                <span
                                    class="mt-3 text-[10px] sm:text-xs font-semibold text-metallic-silver group-hover:text-white transition-colors">Channel</span>
                            </a>
                            <a href="https://t.me/TNL_LAB_WEBSITE_DEVELOPER"
                                class="flex flex-col items-center group text-center">
                                <div
                                    class="w-12 h-12 sm:w-14 sm:h-14 rounded-2xl bg-gradient-to-br from-emerald-500/20 to-teal-500/20 border border-emerald-400/30 flex items-center justify-center shadow-lg group-hover:scale-110 group-hover:shadow-emerald-500/50 transition-all duration-300">
                                    <img src="{{ asset('pic/icon/cs1.png') }}"
                                        class="w-6 h-6 sm:w-7 sm:h-7 drop-shadow-md">
                                </div>
                                <span
                                    class="mt-3 text-[10px] sm:text-xs font-semibold text-metallic-silver group-hover:text-white transition-colors">Support</span>
                            </a>
                            <a href="https://t.me/TNL_LAB_WEBSITE_DEVELOPER"
                                class="flex flex-col items-center group text-center">
                                <div
                                    class="w-12 h-12 sm:w-14 sm:h-14 rounded-2xl bg-gradient-to-br from-purple-500/20 to-pink-500/20 border border-purple-400/30 flex items-center justify-center shadow-lg group-hover:scale-110 group-hover:shadow-purple-500/50 transition-all duration-300">
                                    <img src="{{ asset('pic/icon/downloading.png') }}"
                                        class="w-6 h-6 sm:w-7 sm:h-7 drop-shadow-md">
                                </div>
                                <span
                                    class="mt-3 text-[10px] sm:text-xs font-semibold text-metallic-silver group-hover:text-white transition-colors">App</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Investment Plans Section -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-20">

            <div class="flex flex-col items-center mb-6 md:mb-10">
                <h2
                    class="text-3xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-white to-metallic-silver mb-2">
                    Investment Plans
                </h2>
                <div class="w-24 h-1 bg-gradient-to-r from-accent-cyan to-accent-gold rounded-full mb-6"></div>

                <!-- Premium Tabs -->
                <div
                    class="bg-white/5 backdrop-blur-md p-1.5 rounded-full border border-white/10 inline-flex shadow-inner">
                    <button @click="activeTab = 'normal'"
                        :class="{ 'bg-gradient-to-r from-accent-cyan to-primary-teal text-white shadow-lg': activeTab === 'normal', 'text-metallic-silver hover:text-white': activeTab !== 'normal' }"
                        class="px-8 py-2.5 rounded-full text-sm font-bold tracking-wide transition-all duration-300 flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                        PREMIUM
                    </button>
                    <button @click="activeTab = 'welfare'"
                        :class="{ 'bg-gradient-to-r from-accent-gold to-orange-600 text-white shadow-lg': activeTab === 'welfare', 'text-metallic-silver hover:text-white': activeTab !== 'welfare' }"
                        class="px-8 py-2.5 rounded-full text-sm font-bold tracking-wide transition-all duration-300 flex items-center ml-1">
                        <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7" />
                        </svg>
                        WELFARE
                    </button>
                </div>
            </div>

            <!-- Plans Horizontal Scroll Container -->
            <div class="flex overflow-x-auto gap-6 pb-6 snap-x snap-mandatory scrollbar-hide"
                style="-webkit-overflow-scrolling: touch;">

                <!-- Normal Plans -->
                @foreach(\App\Models\Package::where('type','normal')->get() as $element)
                <div x-show="activeTab === 'normal'" x-transition:enter="transition ease-out duration-500"
                    x-transition:enter-start="opacity-0 transform translate-y-4"
                    x-transition:enter-end="opacity-100 transform translate-y-0" class="relative group">

                    <!-- Glow Effect -->
                    <div
                        class="absolute -inset-0.5 bg-gradient-to-br from-accent-cyan via-primary-teal to-accent-cyan rounded-2xl blur opacity-20 group-hover:opacity-40 transition duration-500">
                    </div>

                    <!-- Card Container -->
                    <div
                        class="relative bg-gradient-to-br from-primary-midnight to-primary-midnight/95 rounded-2xl border border-accent-cyan/20 overflow-hidden hover:border-accent-cyan/40 transition-all duration-300 h-full flex flex-col shadow-xl">

                        <!-- Compact Header with Plan Name & Validity -->
                        <div
                            class="relative bg-gradient-to-r from-accent-cyan/10 to-primary-teal/10 px-5 py-4 border-b border-white/5">
                            <div class="flex items-center justify-between">
                                <h3 class="text-white font-bold text-lg">{{ $element->name ?? 'Premium Plan' }}</h3>
                                <span
                                    class="px-3 py-1 rounded-lg bg-accent-gold/20 border border-accent-gold/30 text-accent-gold text-xs font-bold">
                                    {{ $element->validity }} Days
                                </span>
                            </div>
                        </div>

                        <!-- Compact Image Section -->
                        <div class="relative h-32 overflow-hidden">
                            <img src="{{ asset($element->photo) }}"
                                class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-primary-midnight/80 to-transparent">
                            </div>
                        </div>

                        <!-- Card Body -->
                        <div class="p-5 flex-1 flex flex-col space-y-4">

                            <!-- Investment Amount - Primary Focus -->
                            <div
                                class="text-center py-4 bg-gradient-to-br from-accent-cyan/10 to-transparent rounded-xl border border-accent-cyan/20">
                                <p class="text-xs uppercase tracking-wider text-metallic-silver mb-1">Investment Amount
                                </p>
                                <p class="text-3xl font-bold text-accent-cyan">₹{{ number_format($element->price, 0) }}
                                </p>
                            </div>

                            <!-- Stats Grid -->
                            <div class="grid grid-cols-2 gap-3">
                                <div
                                    class="bg-white/5 rounded-lg p-3 border border-white/5 hover:border-accent-cyan/20 transition-colors">
                                    <p class="text-[10px] uppercase tracking-wider text-metallic-silver mb-1">Daily
                                        Income</p>
                                    <p class="text-white font-bold text-sm">₹{{
                                        number_format($element->commission_with_avg_amount / $element->validity, 0) }}
                                    </p>
                                </div>
                                <div
                                    class="bg-white/5 rounded-lg p-3 border border-white/5 hover:border-accent-gold/20 transition-colors">
                                    <p class="text-[10px] uppercase tracking-wider text-metallic-silver mb-1">Total
                                        Return</p>
                                    <p class="text-accent-gold font-bold text-sm">₹{{
                                        number_format($element->commission_with_avg_amount, 0) }}</p>
                                </div>
                            </div>

                            <!-- ROI Badge -->
                            <div class="flex items-center justify-center py-2">
                                <div class="px-4 py-2 bg-emerald-500/10 rounded-full border border-emerald-500/30">
                                    <span class="text-[10px] uppercase tracking-wider text-emerald-400 mr-2">ROI</span>
                                    <span class="text-emerald-400 font-bold text-base">
                                        {{ number_format((($element->commission_with_avg_amount - $element->price) /
                                        $element->price) * 100, 1) }}%
                                    </span>
                                </div>
                            </div>

                            <!-- Action Button -->
                            <div class="mt-auto pt-2">
                                @if($element->presale == 'yes')
                                <button disabled
                                    class="w-full py-3 rounded-xl bg-gray-700/50 text-gray-400 font-semibold text-sm tracking-wide uppercase border border-white/5 cursor-not-allowed">
                                    Pre-Sale Active
                                </button>
                                @else
                                <button @click="openPurchaseModal({{$element->id}})"
                                    class="w-full py-3 rounded-xl bg-gradient-to-r from-accent-cyan to-primary-teal text-white font-semibold text-sm tracking-wide uppercase shadow-lg shadow-accent-cyan/25 border border-white/10 hover:shadow-accent-cyan/40 hover:scale-[1.02] transition-all duration-300 relative overflow-hidden group/btn">
                                    <span
                                        class="absolute inset-0 w-full h-full bg-gradient-to-r from-transparent via-white/10 to-transparent -translate-x-full group-hover/btn:translate-x-full transition-transform duration-700"></span>
                                    <span class="relative">Invest Now</span>
                                </button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                <!-- Welfare Plans -->
                @foreach(\App\Models\Package::where('type','welfare')->get() as $element)
                <div x-show="activeTab === 'welfare'" style="display: none;"
                    x-transition:enter="transition ease-out duration-500"
                    x-transition:enter-start="opacity-0 transform translate-y-4"
                    x-transition:enter-end="opacity-100 transform translate-y-0" class="relative group">

                    <!-- Glow Effect -->
                    <div
                        class="absolute -inset-0.5 bg-gradient-to-br from-accent-gold via-orange-600 to-accent-gold rounded-2xl blur opacity-20 group-hover:opacity-40 transition duration-500">
                    </div>

                    <!-- Card Container -->
                    <div
                        class="relative bg-gradient-to-br from-primary-midnight to-primary-midnight/95 rounded-2xl border border-accent-gold/20 overflow-hidden hover:border-accent-gold/40 transition-all duration-300 h-full flex flex-col shadow-xl">

                        <!-- Compact Header with Plan Name & Validity -->
                        <div
                            class="relative bg-gradient-to-r from-accent-gold/10 to-orange-600/10 px-5 py-4 border-b border-white/5">
                            <div class="flex items-center justify-between">
                                <h3 class="text-white font-bold text-lg">{{ $element->name ?? 'Welfare Plan' }}</h3>
                                <span
                                    class="px-3 py-1 rounded-lg bg-accent-gold/20 border border-accent-gold/30 text-accent-gold text-xs font-bold">
                                    {{ $element->validity }} Days
                                </span>
                            </div>
                        </div>

                        <!-- Compact Image Section -->
                        <div class="relative h-32 overflow-hidden">
                            <img src="{{ asset($element->photo) }}"
                                class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-primary-midnight/80 to-transparent">
                            </div>
                        </div>

                        <!-- Card Body -->
                        <div class="p-5 flex-1 flex flex-col space-y-4">

                            <!-- Investment Amount - Primary Focus -->
                            <div
                                class="text-center py-4 bg-gradient-to-br from-accent-gold/10 to-transparent rounded-xl border border-accent-gold/20">
                                <p class="text-xs uppercase tracking-wider text-metallic-silver mb-1">Investment Amount
                                </p>
                                <p class="text-3xl font-bold text-accent-gold">₹{{ number_format($element->price, 0) }}
                                </p>
                            </div>

                            <!-- Stats Grid -->
                            <div class="grid grid-cols-2 gap-3">
                                <div
                                    class="bg-white/5 rounded-lg p-3 border border-white/5 hover:border-accent-gold/20 transition-colors">
                                    <p class="text-[10px] uppercase tracking-wider text-metallic-silver mb-1">Daily
                                        Income</p>
                                    <p class="text-white font-bold text-sm">₹{{
                                        number_format($element->commission_with_avg_amount / $element->validity, 0) }}
                                    </p>
                                </div>
                                <div
                                    class="bg-white/5 rounded-lg p-3 border border-white/5 hover:border-accent-gold/20 transition-colors">
                                    <p class="text-[10px] uppercase tracking-wider text-metallic-silver mb-1">Total
                                        Return</p>
                                    <p class="text-accent-gold font-bold text-sm">₹{{
                                        number_format($element->commission_with_avg_amount, 0) }}</p>
                                </div>
                            </div>

                            <!-- ROI Badge -->
                            <div class="flex items-center justify-center py-2">
                                <div class="px-4 py-2 bg-emerald-500/10 rounded-full border border-emerald-500/30">
                                    <span class="text-[10px] uppercase tracking-wider text-emerald-400 mr-2">ROI</span>
                                    <span class="text-emerald-400 font-bold text-base">
                                        {{ number_format((($element->commission_with_avg_amount - $element->price) /
                                        $element->price) * 100, 1) }}%
                                    </span>
                                </div>
                            </div>

                            <!-- Action Button -->
                            <div class="mt-auto pt-2">
                                @if($element->presale == 'yes')
                                <button disabled
                                    class="w-full py-3 rounded-xl bg-gray-700/50 text-gray-400 font-semibold text-sm tracking-wide uppercase border border-white/5 cursor-not-allowed">
                                    Pre-Sale Active
                                </button>
                                @else
                                <button @click="openPurchaseModal({{$element->id}})"
                                    class="w-full py-3 rounded-xl bg-gradient-to-r from-accent-gold to-orange-600 text-white font-semibold text-sm tracking-wide uppercase shadow-lg shadow-accent-gold/25 border border-white/10 hover:shadow-accent-gold/40 hover:scale-[1.02] transition-all duration-300 relative overflow-hidden group/btn">
                                    <span
                                        class="absolute inset-0 w-full h-full bg-gradient-to-r from-transparent via-white/10 to-transparent -translate-x-full group-hover/btn:translate-x-full transition-transform duration-700"></span>
                                    <span class="relative">Invest Now</span>
                                </button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Purchase Confirmation Modal -->
    <div x-data="{ open: false, cid: null }" x-on:open-purchase-modal.window="open = true; cid = $event.detail.cid"
        x-show="open" style="display: none;" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title"
        role="dialog" aria-modal="true">
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                class="fixed inset-0 bg-primary-dark/80 transition-opacity backdrop-blur-sm" aria-hidden="true"></div>

            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <div x-show="open" x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                class="inline-block align-bottom bg-primary-midnight border border-accent-cyan/30 rounded-3xl text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-md w-full relative">

                <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-accent-cyan to-primary-teal"></div>

                <div class="px-6 pt-8 pb-6 sm:p-8">
                    <div class="sm:flex sm:items-start">
                        <div
                            class="mx-auto flex-shrink-0 flex items-center justify-center h-14 w-14 rounded-full bg-accent-cyan/10 border border-accent-cyan/30 sm:mx-0 sm:h-12 sm:w-12">
                            <svg class="h-6 w-6 text-accent-cyan" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="mt-4 text-center sm:mt-0 sm:ml-5 sm:text-left w-full">
                            <h3 class="text-xl leading-8 font-bold text-white mb-2" id="modal-title">
                                Confirm Investigation
                            </h3>
                            <div class="mt-2">
                                <p class="text-sm text-metallic-silver leading-relaxed">
                                    You are about to purchase this investment plan. The amount will be deducted from
                                    your wallet immediately.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-black/20 px-6 py-4 sm:px-8 sm:flex sm:flex-row-reverse border-t border-white/5">
                    <button type="button" @click="window.location.href = '{{ url(" purchase/confirmation") }}/' + cid"
                        class="w-full inline-flex justify-center rounded-xl border border-transparent shadow-lg shadow-accent-cyan/20 px-6 py-3 bg-gradient-to-r from-accent-cyan to-primary-teal text-base font-bold text-white hover:shadow-accent-cyan/40 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-accent-cyan sm:ml-3 sm:w-auto sm:text-sm transition-all duration-300">
                        Confirm & Invest
                    </button>
                    <button type="button" @click="open = false"
                        class="mt-3 w-full inline-flex justify-center rounded-xl border border-white/10 shadow-sm px-6 py-3 bg-white/5 text-base font-medium text-metallic-platinum hover:text-white hover:bg-white/10 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm transition-all duration-300">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Welcome Modal -->
    @if(!session()->has('buy'))
    <div x-data="{ show: true }" x-show="show" style="display: none;" class="fixed inset-0 z-50 overflow-y-auto"
        role="dialog" aria-modal="true">
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-primary-dark/90 transition-opacity backdrop-blur-md" aria-hidden="true"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div
                class="inline-block align-bottom bg-primary-midnight border border-accent-gold/20 rounded-3xl text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg w-full relative">

                <!-- Decoration -->
                <div class="absolute top-0 right-0 -mt-8 -mr-8 w-32 h-32 bg-accent-gold/10 rounded-full blur-2xl"></div>
                <div class="absolute bottom-0 left-0 -mb-8 -ml-8 w-32 h-32 bg-accent-cyan/10 rounded-full blur-2xl">
                </div>

                <div class="relative px-6 pt-8 pb-6 sm:p-8 text-center">
                    <div
                        class="mx-auto w-16 h-16 bg-accent-gold/10 rounded-full flex items-center justify-center mb-6 ring-4 ring-accent-gold/5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-accent-gold" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                        </svg>
                    </div>

                    <h3 class="text-3xl font-bold text-white mb-2 tracking-tight">Welcome to <span
                            class="text-accent-gold">PEDIGREE</span></h3>
                    <p class="text-metallic-silver mb-8 text-sm">
                        Start your journey with our premium investment plans. Daily income, instant withdrawals, and
                        secure returns.
                    </p>

                    <ul
                        class="text-left text-sm text-metallic-platinum space-y-3 mb-8 bg-white/5 p-6 rounded-2xl border border-white/5 mx-auto">
                        <li class="flex items-center">
                            <span
                                class="w-6 h-6 rounded-full bg-emerald-500/20 text-emerald-400 flex items-center justify-center mr-3 text-xs">✓</span>
                            <span>Minimum Recharge: <strong class="text-white">₹580</strong></span>
                        </li>
                        <li class="flex items-center">
                            <span
                                class="w-6 h-6 rounded-full bg-emerald-500/20 text-emerald-400 flex items-center justify-center mr-3 text-xs">✓</span>
                            <span>Minimum Withdrawal: <strong class="text-white">₹150</strong></span>
                        </li>
                        <li class="flex items-center">
                            <span
                                class="w-6 h-6 rounded-full bg-emerald-500/20 text-emerald-400 flex items-center justify-center mr-3 text-xs">✓</span>
                            <span>Level 1 Commission: <strong class="text-accent-gold">20%</strong></span>
                        </li>
                    </ul>

                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="https://t.me/TNL_LAB_WEBSITE_DEVELOPER" target="_blank"
                            class="w-full inline-flex justify-center items-center rounded-xl border border-transparent shadow-lg shadow-blue-500/20 px-6 py-3.5 bg-[#229ED9] text-sm font-bold text-white hover:bg-[#1e8dbf] focus:outline-none transition-all duration-300">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm4.64 6.8c-.15 1.58-.8 5.42-1.13 7.19-.14.75-.42 1-.68 1.03-.58.05-1.02-.38-1.58-.75-.88-.58-1.38-.94-2.23-1.5-.99-.65-.35-1.01.22-1.59.15-.15 2.71-2.48 2.76-2.69a.2.2 0 00-.05-.18c-.06-.05-.14-.03-.21-.02-.09.02-1.49.95-4.22 2.79-.4.27-.76.41-1.08.4-.36-.01-1.04-.2-1.55-.37-.63-.2-1.12-.31-1.08-.66.02-.18.27-.36.74-.55 2.92-1.27 4.86-2.11 5.83-2.51 2.78-1.16 3.35-1.36 3.73-1.36.08 0 .27.02.39.12.1.08.13.19.14.27-.01.06.01.24 0 .38z" />
                            </svg>
                            Join Telegram
                        </a>
                        <button type="button" @click="show = false"
                            class="w-full inline-flex justify-center items-center rounded-xl border border-transparent shadow-lg shadow-accent-gold/20 px-6 py-3.5 bg-gradient-to-r from-accent-gold to-orange-500 text-sm font-bold text-white hover:shadow-accent-gold/40 focus:outline-none transition-all duration-300">
                            Get Started Now
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <script>
        document.addEventListener('alpine:init', () => {
            window.openPurchaseModal = function (id) {
                window.dispatchEvent(new CustomEvent('open-purchase-modal', { detail: { cid: id } }));
            }
        });

        // Enhanced Slider Logic
        const items = document.querySelectorAll('.carousel-item');
        let currentItem = 0;
        if (items.length > 0) {
            items[0].classList.remove('opacity-0');
            setInterval(() => {
                items[currentItem].classList.add('opacity-0');
    
<x-app-layout>
    <div class="space-y-6 md:space-y-8" x-data="{ activeTab: 'normal' }">

        <!-- Hero / Slider -->
        <div
            class="relative bg-primary-midnight pt-2 pb-8 md:pb-10 rounded-b-[3rem] shadow-2xl border-b border-white/5 overflow-hidden">
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
                <div class="relative rounded-3xl overflow-hidden shadow-2xl border border-white/10">
                    <div class="carousel relative w-full h-64 sm:h-80 md:h-96 group">
                        <div class="absolute inset-0 rounded-3xl bg-gradient-to-br from-accent-cyan/10 to-primary-teal/10 opacity-0 group-hover:opacity-100 transition-opacity duration-700 pointer-events-none"></div>
                        @foreach(\App\Models\VipSlider::get() as $index => $element)
                        <div
                            class="carousel-item absolute inset-0 w-full h-full transition-opacity duration-1000 ease-in-out {{ $index === 0 ? 'opacity-100 z-10' : 'opacity-0 z-0' }}">
                            <img src="{{ asset($element->photo) }}"
                                class="w-full h-full object-cover transition-opacity duration-700"
                                style="image-rendering: -webkit-optimize-contrast; image-rendering: crisp-edges; -webkit-backface-visibility: hidden; backface-visibility: hidden; -webkit-transform: translateZ(0); transform: translateZ(0);">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-primary-dark/90 via-primary-dark/20 to-transparent">
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @php $sliderCount = \App\Models\VipSlider::count(); @endphp
                    @if($sliderCount > 1)
                    <div class="carousel-dots absolute bottom-4 left-0 right-0 z-20 flex justify-center gap-2">
                        @foreach(\App\Models\VipSlider::get() as $dotIndex => $el)
                        <button type="button" aria-label="Slide {{ $dotIndex + 1 }}" data-dot-index="{{ $dotIndex }}"
                            class="carousel-dot w-2.5 h-2.5 rounded-full border border-white/30 transition-all duration-300 {{ $dotIndex === 0 ? 'bg-white scale-110' : 'bg-white/40' }}"></button>
                        @endforeach
                    </div>
                    @endif
                </div>

                <!-- Quick Actions (below slider, no overlap) -->
                <div class="relative mt-6 md:mt-8 mx-auto max-w-6xl">
                    <div
                        class="bg-primary-midnight/80 backdrop-blur-xl border border-white/10 rounded-2xl p-6 shadow-2xl mx-2 sm:mx-0">
                        <div class="grid grid-cols-4 gap-2 sm:gap-6">
                            <a href="{{ route('user.deposit') }}" class="flex flex-col items-center group text-center">
                                <div
                                    class="w-12 h-12 sm:w-14 sm:h-14 rounded-2xl bg-gradient-to-br from-accent-cyan/20 to-primary-teal/20 border border-accent-cyan/30 flex items-center justify-center shadow-lg group-hover:scale-110 group-hover:shadow-accent-cyan/50 transition-all duration-300">
                                    <svg class="w-6 h-6 sm:w-7 sm:h-7 drop-shadow-md text-accent-cyan" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <circle cx="12" cy="12" r="9" stroke-width="2" />
                                        <circle cx="12" cy="12" r="5" stroke-width="1.5" />
                                        <circle cx="12" cy="12" r="1.5" stroke-width="1" fill="currentColor" />
                                        <path d="M12 3v2M18 12h-2M12 19v-2M6 12h2" stroke-width="1.5" />
                                        <path d="M15.5 6.5L17 5M17 17l-1.5-1.5M6.5 8.5L5 7M7 17l-2-1.5" stroke-width="1.5" />
                                    </svg>
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
                            <a href="{{ App\Models\Setting::first()?->telegram ?? App\Models\Setting::first()?->whatsapp ?? 'https://t.me/+1fjaTnS-uV85MThl' }}"
                                target="_blank" rel="noopener noreferrer"
                                class="flex flex-col items-center group text-center">
                                <div
                                    class="w-12 h-12 sm:w-14 sm:h-14 rounded-2xl bg-gradient-to-br from-blue-500/20 to-indigo-500/20 border border-blue-400/30 flex items-center justify-center shadow-lg group-hover:scale-110 group-hover:shadow-blue-500/50 transition-all duration-300">
                                    <img src="{{ asset('pic/icon/telegram4.png') }}"
                                        class="w-6 h-6 sm:w-7 sm:h-7 drop-shadow-md">
                                </div>
                                <span
                                    class="mt-3 text-[10px] sm:text-xs font-semibold text-metallic-silver group-hover:text-white transition-colors">Channel</span>
                            </a>

                            <a href="{{ App\Models\Setting::first()?->telegram ?? App\Models\Setting::first()?->whatsapp ?? 'https://t.me/TNL_LAB_WEBSITE_DEVELOPER' }}"
                                target="_blank" rel="noopener noreferrer"
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

        <!-- Investment Plans -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-8">
            <div class="text-center mb-8">
                <h2 class="text-2xl md:text-3xl font-bold text-white mb-2">Investment Plans</h2>
                <div class="w-20 h-0.5 bg-gradient-to-r from-accent-cyan to-accent-gold rounded-full mx-auto mb-6">
                </div>
                <div class="bg-white/5 backdrop-blur-md p-1.5 rounded-full border border-white/10 inline-flex">
                    <button @click="activeTab = 'normal'"
                        :class="activeTab === 'normal' ? 'bg-gradient-to-r from-accent-cyan to-primary-teal text-white shadow-lg' : 'text-gray-400 hover:text-white'"
                        class="px-6 py-2 rounded-full text-sm font-bold transition-all duration-300">PREMIUM</button>
                    <button @click="activeTab = 'welfare'"
                        :class="activeTab === 'welfare' ? 'bg-gradient-to-r from-accent-gold to-orange-600 text-white shadow-lg' : 'text-gray-400 hover:text-white'"
                        class="px-6 py-2 rounded-full text-sm font-bold transition-all duration-300 ml-1">WELFARE</button>
                    <button @click="activeTab = 'offer'"
                        :class="activeTab === 'offer' ? 'bg-gradient-to-r from-red-600 to-rose-600 text-white shadow-lg' : 'text-gray-400 hover:text-white'"
                        class="px-6 py-2 rounded-full text-sm font-bold transition-all duration-300 ml-1 relative">
                        OFFER
                        <span
                            class="absolute -top-3 -right-3 bg-red-600 text-white text-[10px] font-bold px-2 py-0.5 rounded-full animate-pulse border border-white/20 shadow-lg shadow-red-600/50 z-50">HOT</span>
                    </button>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 xl:grid-cols-3 gap-4 md:gap-6">
                @foreach(\App\Models\Package::where('type','normal')->get() as $element)
                <div x-show="activeTab === 'normal'" x-transition
                    class="rounded-2xl border border-white/10 bg-[#0f172a]/90 overflow-hidden hover:border-accent-cyan/40 transition-all duration-300 shadow-lg hover:shadow-accent-cyan/20">
                    <div class="flex flex-col sm:flex-row gap-0 min-h-[180px]">
                        <!-- Image Container -->
                        <div
                            class="flex-shrink-0 w-full sm:w-40 md:w-44 lg:w-48 bg-gradient-to-br from-gray-800/80 to-gray-900/80 border-b sm:border-b-0 sm:border-r border-white/10 overflow-hidden">
                            <img src="{{ asset($element->photo) }}" alt="{{ $element->name }}"
                                class="w-full h-full object-cover">
                        </div>
                        <!-- Content -->
                        <div class="flex-1 min-w-0 flex flex-col justify-between gap-3 p-4">
                            <div class="min-w-0">
                                <h3 class="text-white font-bold text-lg truncate mb-1">{{ $element->name }}</h3>
                                <span
                                    class="inline-block px-2 py-0.5 rounded-full bg-accent-cyan/10 text-accent-cyan text-xs font-medium border border-accent-cyan/20">{{
                                    $element->validity }} Days Plan</span>
                            </div>
                            <div class="grid grid-cols-3 gap-2 mt-auto">
                                <div
                                    class="rounded-lg bg-white/5 border border-white/10 px-2 py-2 text-center hover:bg-white/10 transition-colors">
                                    <p class="text-gray-400 text-xs mb-1">Invest</p>
                                    <p class="text-white font-bold text-sm truncate"
                                        title="₹{{ number_format($element->price, 0) }}">₹{{
                                        number_format($element->price, 0) }}</p>
                                </div>
                                <div
                                    class="rounded-lg bg-white/5 border border-white/10 px-2 py-2 text-center hover:bg-white/10 transition-colors">
                                    <p class="text-gray-400 text-xs mb-1">Daily</p>
                                    <p class="text-accent-cyan font-bold text-sm truncate"
                                        title="₹{{ number_format($element->commission_with_avg_amount / $element->validity, 2) }}">
                                        ₹{{ number_format($element->commission_with_avg_amount / $element->validity, 2)
                                        }}</p>
                                </div>
                                <div
                                    class="rounded-lg bg-white/5 border border-white/10 px-2 py-2 text-center hover:bg-white/10 transition-colors">
                                    <p class="text-gray-400 text-xs mb-1">Total</p>
                                    <p class="text-accent-gold font-bold text-sm truncate"
                                        title="₹{{ number_format($element->commission_with_avg_amount, 0) }}">₹{{
                                        number_format($element->commission_with_avg_amount, 0) }}</p>
                                </div>
                            </div>
                            @if($element->presale == 'yes')
                            <button disabled
                                class="w-full py-2.5 rounded-xl bg-white/5 text-gray-500 text-sm font-bold border border-white/5 cursor-not-allowed">Pre-Sale</button>
                            @else
                            <button @click="openPurchaseModal({{ $element->id }})"
                                class="w-full py-3 rounded-xl bg-gradient-to-r from-[#005f73] to-accent-cyan text-white text-sm font-bold hover:shadow-lg hover:shadow-accent-cyan/30 transform hover:scale-[1.02] transition-all duration-300">Invest
                                Now</button>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach

                @foreach(\App\Models\Package::where('type','welfare')->get() as $element)
                <div x-show="activeTab === 'welfare'" style="display: none;" x-transition
                    class="rounded-2xl border border-white/10 bg-[#0f172a]/90 overflow-hidden hover:border-accent-gold/40 transition-all duration-300 shadow-lg hover:shadow-accent-gold/20">
                    <div class="flex flex-col sm:flex-row gap-0 min-h-[180px]">
                        <!-- Image Container -->
                        <div
                            class="flex-shrink-0 w-full sm:w-40 md:w-44 lg:w-48 bg-gradient-to-br from-gray-800/80 to-gray-900/80 border-b sm:border-b-0 sm:border-r border-white/10 overflow-hidden">
                            <img src="{{ asset($element->photo) }}" alt="{{ $element->name }}"
                                class="w-full h-full object-cover">
                        </div>
                        <!-- Content -->
                        <div class="flex-1 min-w-0 flex flex-col justify-between gap-3 p-4">
                            <div class="min-w-0">
                                <h3 class="text-white font-bold text-lg truncate mb-1">{{ $element->name }}</h3>
                                <span
                                    class="inline-block px-2 py-0.5 rounded-full bg-accent-gold/10 text-accent-gold text-xs font-medium border border-accent-gold/20">{{
                                    $element->validity }} Days Plan</span>
                            </div>
                            <div class="grid grid-cols-3 gap-2 mt-auto">
                                <div
                                    class="rounded-lg bg-white/5 border border-white/10 px-2 py-2 text-center hover:bg-white/10 transition-colors">
                                    <p class="text-gray-400 text-xs mb-1">Invest</p>
                                    <p class="text-white font-bold text-sm truncate"
                                        title="₹{{ number_format($element->price, 0) }}">₹{{
                                        number_format($element->price, 0) }}</p>
                                </div>
                                <div
                                    class="rounded-lg bg-white/5 border border-white/10 px-2 py-2 text-center hover:bg-white/10 transition-colors">
                                    <p class="text-gray-400 text-xs mb-1">Daily</p>
                                    <p class="text-accent-gold font-bold text-sm truncate"
                                        title="₹{{ number_format($element->commission_with_avg_amount / $element->validity, 2) }}">
                                        ₹{{ number_format($element->commission_with_avg_amount / $element->validity, 2)
                                        }}</p>
                                </div>
                                <div
                                    class="rounded-lg bg-white/5 border border-white/10 px-2 py-2 text-center hover:bg-white/10 transition-colors">
                                    <p class="text-gray-400 text-xs mb-1">Total</p>
                                    <p class="text-accent-gold font-bold text-sm truncate"
                                        title="₹{{ number_format($element->commission_with_avg_amount, 0) }}">₹{{
                                        number_format($element->commission_with_avg_amount, 0) }}</p>
                                </div>
                            </div>
                            @if($element->presale == 'yes')
                            <button disabled
                                class="w-full py-2.5 rounded-xl bg-white/5 text-gray-500 text-sm font-bold border border-white/5 cursor-not-allowed">Pre-Sale</button>
                            @else
                            <button @click="openPurchaseModal({{ $element->id }})"
                                class="w-full py-3 rounded-xl bg-gradient-to-r from-accent-gold to-orange-600 text-white text-sm font-bold hover:shadow-lg hover:shadow-accent-gold/30 transform hover:scale-[1.02] transition-all duration-300">Invest
                                Now</button>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach

                @foreach(\App\Models\Package::where('type','offer')->get() as $element)
                <div x-show="activeTab === 'offer'" style="display: none;" x-transition
                    class="rounded-2xl border border-white/10 bg-[#0f172a]/90 overflow-hidden hover:border-red-500/40 transition-all duration-300 shadow-lg hover:shadow-red-500/20 relative group">
                    <div class="absolute top-3 right-3 z-10">
                        <span
                            class="bg-red-600 text-white text-xs font-bold px-2 py-1 rounded-full animate-pulse shadow-lg shadow-red-600/40 border border-white/10">HOT</span>
                    </div>
                    <div class="flex flex-col sm:flex-row gap-0 min-h-[180px]">
                        <!-- Image Container -->
                        <div
                            class="flex-shrink-0 w-full sm:w-40 md:w-44 lg:w-48 bg-gradient-to-br from-gray-800/80 to-gray-900/80 border-b sm:border-b-0 sm:border-r border-white/10 overflow-hidden">
                            <img src="{{ asset($element->photo) }}" alt="{{ $element->name }}"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        </div>
                        <!-- Content -->
                        <div class="flex-1 min-w-0 flex flex-col justify-between gap-3 p-4">
                            <div class="min-w-0 pr-8">
                                <h3 class="text-white font-bold text-lg truncate mb-1">{{ $element->name }}</h3>
                                <span
                                    class="inline-block px-2 py-0.5 rounded-full bg-red-500/10 text-red-500 text-xs font-medium border border-red-500/20">{{
                                    $element->validity }} Days Plan</span>
                            </div>
                            <div class="grid grid-cols-3 gap-2 mt-auto">
                                <div
                                    class="rounded-lg bg-white/5 border border-white/10 px-2 py-2 text-center hover:bg-white/10 transition-colors">
                                    <p class="text-gray-400 text-xs mb-1">Invest</p>
                                    <p class="text-white font-bold text-sm truncate"
                                        title="₹{{ number_format($element->price, 0) }}">₹{{
                                        number_format($element->price, 0) }}</p>
                                </div>
                                <div
                                    class="rounded-lg bg-white/5 border border-white/10 px-2 py-2 text-center hover:bg-white/10 transition-colors">
                                    <p class="text-gray-400 text-xs mb-1">Daily</p>
                                    <p class="text-red-400 font-bold text-sm truncate"
                                        title="₹{{ number_format($element->commission_with_avg_amount / $element->validity, 2) }}">
                                        ₹{{ number_format($element->commission_with_avg_amount / $element->validity, 2)
                                        }}</p>
                                </div>
                                <div
                                    class="rounded-lg bg-white/5 border border-white/10 px-2 py-2 text-center hover:bg-white/10 transition-colors">
                                    <p class="text-gray-400 text-xs mb-1">Total</p>
                                    <p class="text-red-500 font-bold text-sm truncate"
                                        title="₹{{ number_format($element->commission_with_avg_amount, 0) }}">₹{{
                                        number_format($element->commission_with_avg_amount, 0) }}</p>
                                </div>
                            </div>
                            @if($element->presale == 'yes')
                            <button disabled
                                class="w-full py-2.5 rounded-xl bg-white/5 text-gray-500 text-sm font-bold border border-white/5 cursor-not-allowed">Pre-Sale</button>
                            @else
                            <button @click="openPurchaseModal({{ $element->id }})"
                                class="w-full py-3 rounded-xl bg-gradient-to-r from-red-600 to-rose-600 text-white text-sm font-bold hover:shadow-lg hover:shadow-red-600/30 transform hover:scale-[1.02] transition-all duration-300">Grab
                                Offer</button>
                            @endif
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
                    <button type="button" @click="window.location.href = '{{ url('purchase/confirmation') }}/' + cid"
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
                        <a href="{{ App\Models\Setting::first()?->telegram ?? App\Models\Setting::first()?->whatsapp ?? 'https://t.me/TNL_LAB_WEBSITE_DEVELOPER' }}" target="_blank" rel="noopener noreferrer"
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
        window.openPurchaseModal = function (id) {
            window.dispatchEvent(new CustomEvent('open-purchase-modal', { detail: { cid: id } }));
        };

        document.addEventListener('DOMContentLoaded', function () {
            var items = document.querySelectorAll('.carousel-item');
            var dots = document.querySelectorAll('.carousel-dot');
            var currentItem = 0;
            function setSlide(index) {
                currentItem = (index + items.length) % items.length;
                items.forEach(function (el, i) {
                    el.classList.toggle('opacity-100', i === currentItem);
                    el.classList.toggle('z-10', i === currentItem);
                    el.classList.toggle('opacity-0', i !== currentItem);
                    el.classList.toggle('z-0', i !== currentItem);
                });
                dots.forEach(function (el, i) {
                    el.classList.toggle('bg-white', i === currentItem);
                    el.classList.toggle('scale-110', i === currentItem);
                    el.classList.toggle('bg-white/40', i !== currentItem);
                });
            }
            dots.forEach(function (dot, i) {
                dot.addEventListener('click', function () { setSlide(i); });
            });
            if (items.length > 0) {
                setInterval(function () { setSlide(currentItem + 1); }, 4000);
            }
        });
    </script>
</x-app-layout>
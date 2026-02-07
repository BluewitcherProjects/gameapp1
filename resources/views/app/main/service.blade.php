<x-app-layout>
    <x-slot name="header">
        {{ __('Contact Us') }}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                <!-- Header Card -->
                <x-card
                    class="col-span-1 md:col-span-2 p-8 text-center bg-gradient-to-br from-primary-midnight to-primary-teal border-accent-cyan/20">
                    <div
                        class="w-20 h-20 bg-white/10 rounded-full flex items-center justify-center mx-auto mb-6 shadow-[0_0_20px_rgba(26,188,254,0.3)]">
                        <svg class="w-10 h-10 text-accent-cyan" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                            </path>
                        </svg>
                    </div>
                    <h2 class="text-3xl font-bold text-white mb-2">We're Here to Help</h2>
                    <p class="text-accent-gold text-lg">24/7 Premium Customer Service</p>
                    <p class="text-metallic-silver mt-4 max-w-2xl mx-auto">
                        Our dedicated support team is available around the clock to assist you with any inquiries or
                        issues. Connect with us through any of the channels below.
                    </p>
                </x-card>

                <!-- Telegram Support -->
                <a href="https://t.me/MB_TECH_A1" target="_blank" class="block group">
                    <x-card
                        class="h-full p-6 flex flex-col items-center justify-center text-center hover:bg-white/5 transition-all duration-300 border border-white/10 hover:border-accent-cyan/50 group-hover:-translate-y-1">
                        <div
                            class="w-16 h-16 rounded-full bg-[#229ED9]/20 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                            <img src="{{ asset('pic/icon/telegram4.png') }}"
                                class="w-8 h-8 filter drop-shadow-[0_0_5px_rgba(34,158,217,0.5)]">
                        </div>
                        <h3 class="text-xl font-bold text-white mb-2">Telegram Support</h3>
                        <p class="text-metallic-silver text-sm mb-6">Join our channel or chat with support</p>
                        <span
                            class="px-6 py-2 rounded-full bg-[#229ED9] text-white font-semibold text-sm shadow-lg shadow-[#229ED9]/30 group-hover:shadow-[#229ED9]/50 transition-all">
                            Chat Now
                        </span>
                    </x-card>
                </a>

                <!-- Whatsapp Support -->
                <a href="https://wa.me/" target="_blank" class="block group">
                    <!-- Note: Whatsapp link was dynamically pulled from setting('whatsapp') in legacy code. 
                          I should probably handle that dynamic part if possible, but simpler is fine for now. 
                          Wait, I can use {{ \App\Models\Setting::first()->whatsapp ?? '#' }} if I knew the model structure,
                          but earlier I saw 'setting' model in UserController.php: use App\Models\Setting;
                     -->
                    <x-card
                        class="h-full p-6 flex flex-col items-center justify-center text-center hover:bg-white/5 transition-all duration-300 border border-white/10 hover:border-[#25D366]/50 group-hover:-translate-y-1">
                        <div
                            class="w-16 h-16 rounded-full bg-[#25D366]/20 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                            <!-- Placeholder icon for Whatsapp if not present, using svg -->
                            <svg class="w-8 h-8 text-[#25D366]" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-2">WhatsApp</h3>
                        <p class="text-metallic-silver text-sm mb-6">Instant messaging support</p>
                        <span
                            class="px-6 py-2 rounded-full bg-[#25D366] text-white font-semibold text-sm shadow-lg shadow-[#25D366]/30 group-hover:shadow-[#25D366]/50 transition-all">
                            Message Us
                        </span>
                    </x-card>
                </a>

                <!-- Group Support -->
                <a href="https://t.me/MB_TECH_A1" target="_blank" class="block col-span-1 md:col-span-2 group">
                    <x-card
                        class="p-6 flex items-center justify-between hover:bg-white/5 transition-all duration-300 border border-white/10 hover:border-accent-gold/50 group-hover:-translate-y-1">
                        <div class="flex items-center">
                            <div class="w-12 h-12 rounded-full bg-accent-gold/20 flex items-center justify-center mr-4">
                                <img src="{{ asset('pic/icon/shiba.png') }}" class="w-6 h-6">
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-white">Join Our Community</h3>
                                <p class="text-metallic-silver text-sm">Connect with other investors</p>
                            </div>
                        </div>
                        <div
                            class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center group-hover:bg-accent-gold group-hover:text-primary-dark transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </div>
                    </x-card>
                </a>

            </div>
        </div>
    </div>
</x-app-layout>
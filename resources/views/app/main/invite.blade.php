<x-app-layout>
    <x-slot name="header">
        {{ __('Invite Friends') }}
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Referral Info Card -->
                <x-card
                    class="bg-primary-midnight/50 backdrop-blur-md overflow-hidden flex flex-col justify-center items-center text-center p-8 h-full">
                    <div
                        class="w-20 h-20 bg-accent-gold/20 rounded-full flex items-center justify-center mb-6 border border-accent-gold/30">
                        <svg class="w-10 h-10 text-accent-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                    </div>
                    <h2 class="text-3xl font-bold text-white mb-2">Invite & Earn</h2>
                    <p class="text-metallic-silver mb-8">Share your referral link with friends and earn commissions on
                        their investments.</p>

                    <div class="bg-white/5 rounded-lg p-4 w-full mb-6 relative group cursor-pointer hover:bg-white/10 transition-colors"
                        onclick="copyToClipboard('{{ url('register').'?inviteCode='.user()->ref_id }}')">
                        <p class="text-xs text-metallic-silver uppercase mb-1">Your Referral Link</p>
                        <p class="text-accent-cyan font-mono text-sm break-all truncate">{{
                            url('register').'?inviteCode='.user()->ref_id }}</p>
                        <div
                            class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none group-hover:text-accent-gold text-metallic-silver transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3">
                                </path>
                            </svg>
                        </div>
                    </div>

                    <div class="flex gap-4 w-full">
                        <button onclick="copyToClipboard('{{ user()->ref_id }}')"
                            class="flex-1 bg-white/5 hover:bg-white/10 text-white font-bold py-3 px-4 rounded-lg transition-colors border border-white/10">
                            Copy ID: {{ user()->ref_id }}
                        </button>
                        <button onclick="copyToClipboard('{{ url('register').'?inviteCode='.user()->ref_id }}')"
                            class="flex-1 bg-accent-gold/90 hover:bg-accent-gold text-primary-dark font-bold py-3 px-4 rounded-lg transition-colors">
                            Copy Link
                        </button>
                    </div>
                </x-card>

                <!-- Commission Tiers -->
                <x-card class="bg-primary-midnight/50 backdrop-blur-md overflow-hidden p-6">
                    <h3 class="text-xl font-bold text-white mb-6">Commission Tiers</h3>
                    <div class="space-y-4">
                        <div
                            class="bg-gradient-to-r from-primary-dark to-primary-teal p-4 rounded-lg border border-accent-cyan/20 relative overflow-hidden">
                            <div
                                class="absolute -right-4 -bottom-4 opacity-10 text-white text-9xl font-bold leading-none select-none">
                                1</div>
                            <div class="relative z-10 flex justify-between items-center">
                                <div>
                                    <h4 class="text-accent-cyan font-bold text-lg">Level 1</h4>
                                    <p class="text-metallic-silver text-sm">Direct Referrals</p>
                                </div>
                                <div class="text-3xl font-bold text-white">20%</div>
                            </div>
                        </div>
                        <div class="bg-white/5 p-4 rounded-lg border border-white/5 flex justify-between items-center">
                            <div>
                                <h4 class="text-white font-bold text-lg">Level 2</h4>
                                <p class="text-metallic-silver text-sm">Friends of Friends</p>
                            </div>
                            <div class="text-2xl font-bold text-metallic-silver">3%</div>
                        </div>
                        <div class="bg-white/5 p-4 rounded-lg border border-white/5 flex justify-between items-center">
                            <div>
                                <h4 class="text-white font-bold text-lg">Level 3</h4>
                                <p class="text-metallic-silver text-sm">Extended Network</p>
                            </div>
                            <div class="text-2xl font-bold text-metallic-silver">1%</div>
                        </div>
                    </div>
                </x-card>
            </div>
        </div>
    </div>

    <script>
        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(() => {
                // You might want to show a toast/notification here using a proper library or custom Alpine component
                alert('Copied to clipboard!'); // Temporary fallback
            }).catch(err => {
                console.error('Failed to copy: ', err);
            });
        }
    </script>
</x-app-layout>
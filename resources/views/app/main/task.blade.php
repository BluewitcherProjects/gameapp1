<x-app-layout>
    <x-slot name="header">
        {{ __('Rewards Center') }}
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-card class="bg-primary-midnight/50 backdrop-blur-md overflow-hidden mb-6">
                <div class="p-6 text-center">
                    <h2 class="text-2xl font-bold text-white mb-2">Team Statistics</h2>
                    <p class="text-metallic-silver mb-6">Track your team's growth and earnings.</p>

                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <div class="bg-white/5 p-4 rounded-lg">
                            <p class="text-xs text-metallic-silver uppercase">Total Team Size</p>
                            <p class="text-2xl font-bold text-accent-cyan">{{ $team_size }}</p>
                        </div>
                        <div class="bg-white/5 p-4 rounded-lg">
                            <p class="text-xs text-metallic-silver uppercase">Active Members</p>
                            <p class="text-2xl font-bold text-accent-gold">{{ $teamTotalActiveMembers }}</p>
                        </div>
                        <div class="bg-white/5 p-4 rounded-lg">
                            <p class="text-xs text-metallic-silver uppercase">Total Recharge</p>
                            <p class="text-2xl font-bold text-white">{{ price($lv1Recharge + $lv2Recharge +
                                $lv3Recharge) }}</p>
                        </div>
                        <div class="bg-white/5 p-4 rounded-lg">
                            <p class="text-xs text-metallic-silver uppercase">Total Withdraw</p>
                            <p class="text-2xl font-bold text-white">{{ price($lv1Withdraw + $lv2Withdraw +
                                $lv3Withdraw) }}</p>
                        </div>
                    </div>
                </div>
            </x-card>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Registration Rewards -->
                <x-card class="bg-primary-midnight/50 backdrop-blur-md overflow-hidden relative">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-green-500/10 to-transparent pointer-events-none">
                    </div>
                    <div class="p-6 relative z-10">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <h3 class="text-lg font-bold text-white">Registration Rewards</h3>
                                <p class="text-xs text-metallic-silver">Earn for every new active member.</p>
                            </div>
                            <div
                                class="w-10 h-10 bg-green-500/20 rounded-full flex items-center justify-center text-green-400">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z">
                                    </path>
                                </svg>
                            </div>
                        </div>

                        <div class="space-y-4">
                            <div class="flex justify-between text-sm">
                                <span class="text-metallic-silver">Progress</span>
                                <span class="text-white font-bold">{{ \App\Models\User::where('ref_by',
                                    auth()->user()->ref_id)->count() }} / {{ setting('total_member_register_reword')
                                    }}</span>
                            </div>
                            <div class="w-full bg-white/10 rounded-full h-2">
                                <div class="bg-green-500 h-2 rounded-full"
                                    style="width: {{ min(100, (\App\Models\User::where('ref_by', auth()->user()->ref_id)->count() / max(1, setting('total_member_register_reword'))) * 100) }}%">
                                </div>
                            </div>

                            <div class="flex justify-between items-center mt-4">
                                <div>
                                    <p class="text-xs text-metallic-silver">Available Reward</p>
                                    <p class="text-xl font-bold text-white">{{ price(auth()->user()->reword_balance) }}
                                    </p>
                                </div>
                                <button onclick="claimReward('{{ route('received.tareget.member.registered') }}')"
                                    class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg transition-colors text-sm shadow-lg shadow-green-500/30">
                                    Claim
                                </button>
                            </div>
                        </div>
                    </div>
                </x-card>

                <!-- Interest Commission -->
                <x-card class="bg-primary-midnight/50 backdrop-blur-md overflow-hidden relative">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-accent-gold/10 to-transparent pointer-events-none">
                    </div>
                    <div class="p-6 relative z-10">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <h3 class="text-lg font-bold text-white">Interest Commission</h3>
                                <p class="text-xs text-metallic-silver">Earn from your team's earnings.</p>
                            </div>
                            <div
                                class="w-10 h-10 bg-accent-gold/20 rounded-full flex items-center justify-center text-accent-gold">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                    </path>
                                </svg>
                            </div>
                        </div>

                        <div class="bg-white/5 rounded-lg p-3 text-xs text-metallic-silver mb-4">
                            @php $rebate = \App\Models\Rebate::first(); @endphp
                            L1: <span class="text-white">{{$rebate->interest_commission1}}%</span> •
                            L2: <span class="text-white">{{$rebate->interest_commission2}}%</span> •
                            L3: <span class="text-white">{{$rebate->interest_commission3}}%</span>
                        </div>

                        <div class="flex justify-between items-center mt-4">
                            <div>
                                <p class="text-xs text-metallic-silver">Available Commission</p>
                                <p class="text-xl font-bold text-white">{{
                                    price(auth()->user()->interest_cumulative_balance) }}</p>
                            </div>
                            <button onclick="claimReward('{{ route('received.interest.commission') }}')"
                                class="bg-accent-gold hover:bg-yellow-400 text-primary-dark font-bold py-2 px-4 rounded-lg transition-colors text-sm shadow-lg shadow-accent-gold/30">
                                Claim
                            </button>
                        </div>
                    </div>
                </x-card>
            </div>

            <div class="mt-6 text-center">
                <a href="{{ route('team') }}" class="text-accent-cyan hover:underline text-sm">View Detailed Team Report
                    &rarr;</a>
            </div>
        </div>
    </div>

    <script>
        function claimReward(url) {
            fetch(url, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                }
            })
                .then(response => response.json())
                .then(data => {
                    alert(data.message); // Replace with nice toast
                    location.reload(); // Simple reload to update balances
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Something went wrong.');
                });
        }
    </script>
</x-app-layout>